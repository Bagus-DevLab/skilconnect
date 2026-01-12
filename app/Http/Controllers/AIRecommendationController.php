<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Course;

class AiRecommendationController extends Controller
{
    // ==========================================
    // BAGIAN 1: KONFIGURASI & HELPER
    // ==========================================

    // Bobot AHP
    private $weights = [
        'c1_price'        => 0.515,
        'c2_rating'       => 0.239,
        'c3_participants' => 0.133,
        'c4_duration'     => 0.074,
        'c5_difficulty'   => 0.039
    ];

    // Helper: Parse Angka
    private function parseNumber($value) {
        return (float) preg_replace('/[^0-9]/', '', (string)$value);
    }

    // Helper: Parse Durasi ke Jam
    private function parseDurationToHours($durationText) {
        $text = strtolower((string)$durationText);
        $val = (int) preg_replace('/[^0-9]/', '', $text);
        if (strpos($text, 'minggu') !== false) return $val * 10;
        if (strpos($text, 'bulan') !== false) return $val * 40;
        if (strpos($text, 'hari') !== false) return $val * 2;
        return $val ?: 10;
    }

    // Helper: Prediksi Level
    private function inferLevelFromTitle($title) {
        if (preg_match('/(basic|beginner|dasar|pemula)/i', $title)) return 'beginner';
        if (preg_match('/(advance|mahir|lanjut|expert)/i', $title)) return 'advanced';
        return 'intermediate';
    }

    // Helper: Label Rating (PENTING UNTUK FRONTEND)
    private function getLabel($score) {
        if ($score >= 5) return 'Sangat Baik';
        if ($score >= 4) return 'Baik';
        if ($score >= 3) return 'Cukup';
        if ($score >= 2) return 'Kurang';
        return 'Sangat Kurang';
    }

    // Helper: Generate Analisis Text Kursus
    private function generateCourseAnalysis($scores) {
        $reasons = [];
        if ($scores['price'] >= 4) $reasons[] = "harga sangat kompetitif";
        if ($scores['rating'] >= 4) $reasons[] = "reputasi rating tinggi";
        if ($scores['participants'] >= 4) $reasons[] = "sangat diminati peserta";
        if ($scores['duration'] >= 4) $reasons[] = "waktu belajar efisien";
        if ($scores['difficulty'] >= 4) $reasons[] = "tingkat kesulitan pas";

        if (empty($reasons)) return "Pilihan alternatif yang seimbang.";
        return "Direkomendasikan karena " . implode(" dan ", array_slice($reasons, 0, 2)) . ".";
    }

    // Helper: Mapping Skill Manual (Agar terlihat pintar tanpa AI)
    private function getSkillsByGoal($goal) {
        $goal = strtolower($goal);
        $skills = [];

        if (preg_match('/(web|fullstack|backend|frontend)/', $goal)) 
            $skills = ['HTML & CSS', 'JavaScript / React', 'PHP / Laravel', 'Database MySQL', 'API Development'];
        elseif (preg_match('/(data|scientist|analyst)/', $goal)) 
            $skills = ['Python Programming', 'Data Visualization', 'SQL', 'Machine Learning Basics', 'Statistics'];
        elseif (preg_match('/(design|ui|ux|graphic)/', $goal)) 
            $skills = ['Figma / Adobe XD', 'Color Theory', 'User Research', 'Prototyping', 'Wireframing'];
        elseif (preg_match('/(mobile|android|ios|flutter)/', $goal)) 
            $skills = ['Dart / Flutter', 'Kotlin', 'Mobile UI Design', 'API Integration', 'Play Store Deployment'];
        elseif (preg_match('/(marketing|seo|digital)/', $goal)) 
            $skills = ['SEO / SEM', 'Social Media Strategy', 'Content Writing', 'Google Analytics', 'Copywriting'];
        else 
            // Default skills jika goal tidak dikenali
            $skills = ['Project Management', 'Communication', 'Problem Solving', 'Basic Tech Skills'];

        return $skills;
    }

    // ==========================================
    // BAGIAN 2: FITUR REKOMENDASI KURSUS (AHP)
    // ==========================================
    public function recommendCourse(Request $request)
    {
        try {
            $input = $request->validate([
                'interest' => 'required|string',
                'level'    => 'required|string',
            ]);

            // 1. Cari Kursus
            $courses = Course::where('title', 'LIKE', '%' . $input['interest'] . '%')
                ->orWhere('category', 'LIKE', '%' . $input['interest'] . '%')
                ->limit(15)->get();

            // Fallback Search
            if ($courses->isEmpty()) {
                $keywords = explode(' ', $input['interest']);
                $courses = Course::where(function($q) use ($keywords) {
                    foreach($keywords as $word) {
                        if(strlen($word) > 3) $q->orWhere('title', 'LIKE', "%$word%");
                    }
                })->limit(10)->get();
                
                $summary = $courses->isEmpty() 
                    ? "Belum ada kursus spesifik '{$input['interest']}', berikut rekomendasi populer:" 
                    : "Menampilkan kursus yang relevan dengan kata kunci Anda.";
            } else {
                $summary = "Rekomendasi terbaik untuk minat '{$input['interest']}'.";
            }

            if ($courses->isEmpty()) $courses = Course::inRandomOrder()->limit(5)->get();

            // 2. Scoring AHP
            $results = [];
            foreach ($courses as $course) {
                // Prepare Data
                $price = $this->parseNumber($course->price);
                $students = $this->parseNumber($course->participants);
                $duration = $this->parseDurationToHours($course->duration);
                $level = $this->inferLevelFromTitle($course->title);
                
                // Simulasi Rating
                $rating = ($students > 100) ? 4.8 : (($students > 50) ? 4.5 : 4.0);

                // --- SCORING (1-5) ---
                $s1 = ($price < 150000) ? 5 : (($price < 500000) ? 4 : (($price < 800000) ? 3 : 2)); // Price
                $s2 = ($rating >= 4.5) ? 5 : 4; // Rating
                $s3 = ($students > 200) ? 5 : (($students > 100) ? 4 : 3); // Participants
                $s4 = ($duration <= 40) ? 5 : 3; // Duration
                $s5 = (strtolower($level) == strtolower($input['level'])) ? 5 : 3; // Difficulty

                // Hitung Final Score
                $finalScore = ($s1 * 0.515) + ($s2 * 0.239) + ($s3 * 0.133) + ($s4 * 0.074) + ($s5 * 0.039);
                
                $analysisText = $this->generateCourseAnalysis([
                    'price' => $s1, 'rating' => $s2, 'participants' => $s3, 'duration' => $s4, 'difficulty' => $s5
                ]);

                // --- FORMAT DATA UNTUK FRONTEND ---
                $results[] = [
                    'id' => $course->id,
                    'title' => $course->title,
                    'platform' => 'SkillConnect', 
                    'instructor' => 'Expert Mentor',
                    'category' => $course->category,
                    'price_format' => 'Rp ' . number_format($price, 0, ',', '.'),
                    'duration' => $course->duration,
                    'level' => ucfirst($level),
                    'thumbnail' => $course->icon_class ? null : '/images/default.jpg',
                    'icon_class' => $course->icon_class ?? 'fa-book',
                    'url' => url('/courses/' . $course->id),
                    
                    // LABEL KUALITATIF (Agar tidak undefined)
                    'harga_rating' => $this->getLabel($s1),       
                    'rating_rating' => $this->getLabel($s2),      
                    'peminat_rating' => $this->getLabel($s3),     
                    'durasi_rating' => $this->getLabel($s4),      
                    'kesulitan_rating' => $this->getLabel($s5),   
                    
                    'ahp_score' => round($finalScore, 2),
                    'match_percentage' => round(($finalScore/5)*100),
                    'analysis' => $analysisText,
                    'reason' => $analysisText
                ];
            }

            usort($results, function($a, $b) { return $b['ahp_score'] <=> $a['ahp_score']; });

            return response()->json([
                'success' => true,
                'summary' => $summary,
                'recommendations' => array_slice($results, 0, 10),
                'tips' => ['Pilih kursus sesuai budget', 'Cek durasi belajar']
            ]);

        } catch (\Exception $e) {
            Log::error("Rec Course Error: " . $e->getMessage());
            return response()->json([
                'success' => false, 
                'summary' => 'Terjadi kesalahan sistem.', 
                'recommendations' => []
            ]);
        }
    }

    // ==========================================
    // BAGIAN 3: FITUR REKOMENDASI SKILL (BARU)
    // ==========================================
    public function recommendSkill(Request $request)
    {
        try {
            $data = $request->validate([
                'position' => 'required', // Posisi saat ini
                'goal' => 'required',     // Tujuan Karir
                'currentSkills' => 'nullable'
            ]);

            // 1. Tentukan Skill Gap berdasarkan Goal
            // Kita gunakan helper getSkillsByGoal untuk mapping otomatis
            $requiredSkills = $this->getSkillsByGoal($data['goal']);

            // 2. Filter Skill yang User SUDAH punya
            $userSkills = array_map('trim', explode(',', strtolower($data['currentSkills'] ?? '')));
            
            $skillGaps = [];
            foreach ($requiredSkills as $skill) {
                // Jika skill belum ada di list user, masukkan ke Gap
                $skillClean = strtolower($skill);
                $alreadyHas = false;
                foreach($userSkills as $us) {
                    if (strpos($skillClean, $us) !== false || strpos($us, $skillClean) !== false) {
                        $alreadyHas = true;
                        break;
                    }
                }
                
                if (!$alreadyHas) {
                    $skillGaps[] = $skill;
                }
            }

            // Jika user sudah punya semua skill dasar
            if (empty($skillGaps)) {
                $skillGaps = ['Advanced ' . $data['goal'] . ' Techniques', 'Leadership & Management'];
            }

            // 3. Cari Kursus Pendukung di Database
            // Untuk setiap skill gap, cari 1 kursus yang relevan
            $recommendations = [];
            foreach ($skillGaps as $index => $gap) {
                // Cari kursus di DB yang judul/kategorinya mirip nama Skill
                // Pecah nama skill jadi kata kunci. Misal "React JS" -> cari "React"
                $keywords = explode(' ', $gap);
                $searchWord = $keywords[0]; // Ambil kata pertama saja biar chance ketemu gede
                
                $course = Course::where('title', 'LIKE', "%{$searchWord}%")
                                ->orWhere('category', 'LIKE', "%{$searchWord}%")
                                ->first();

                // Tentukan prioritas
                $priority = ($index == 0) ? 'High' : (($index == 1) ? 'Medium' : 'Low');

                $recommendations[] = [
                    'skill' => $gap,
                    'priority' => $priority,
                    'reason' => "Skill ini fundamental untuk mencapai posisi {$data['goal']}.",
                    'learningPath' => $course ? "Pelajari via kursus: " . $course->title : "Cari referensi online atau bootcamp.",
                    'course_url' => $course ? url('/courses/' . $course->id) : '#'
                ];
            }

            // 4. Buat Summary Otomatis
            $summary = "Untuk beralih dari posisi '{$data['position']}' ke '{$data['goal']}', kami menemukan " . count($skillGaps) . " skill utama yang perlu Anda pelajari.";

            return response()->json([
                'success' => true,
                'summary' => $summary,
                'skillGaps' => $skillGaps,
                'recommendations' => $recommendations, // Pastikan frontend baca key ini
                'tips' => [
                    'Fokus pada skill prioritas High terlebih dahulu.',
                    'Praktekkan skill dengan membuat portofolio nyata.'
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Recommend Skill Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menganalisis skill.',
                'summary' => 'Sistem sedang sibuk, coba lagi nanti.',
                'recommendations' => []
            ], 500);
        }
    }
}