<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Course; // Sesuaikan dengan model kursus Anda

class AiRecommendationController extends Controller
{
    /**
     * Helper untuk memanggil API Python
     */ 
    private function callLocalPythonAi($prompt, $isAhp = false)
    {
        $endpoint = $isAhp ? "/generate-ahp" : "/generate";
        $url = "http://skillconnect.my.id/" . $endpoint; 

        try {
            $response = Http::timeout(300)
                ->connectTimeout(300)
                ->post($url, [
                    'prompt' => $prompt,
                    'max_tokens' => 1500 
                ]);

            if ($response->failed()) {
                Log::error('Python AI Error: ' . $response->body());
                throw new \Exception('Gagal menghubungi Server AI (Status: ' . $response->status() . ')');
            }

            return $response->json();

        } catch (\Exception $e) {
            Log::error('Controller Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * FITUR 1: Rekomendasi Kursus dari Database Internal (SESUAI STRUKTUR DB)
     */
    public function recommendCourse(Request $request)
    {
        try {
            $data = $request->validate([
                'interest' => 'required',
                'level' => 'required',
                'purpose' => 'required',
                'time' => 'required'
            ]);

            // 1. QUERY SESUAI KOLOM YANG ADA: title, category, duration, participants, price
            $courses = Course::where(function($query) use ($data) {
                    $query->where('title', 'LIKE', '%' . $data['interest'] . '%')
                          ->orWhere('category', 'LIKE', '%' . $data['interest'] . '%');
                })
                ->limit(10)
                ->get()
                ->map(function($course) {
                    // Parse duration dari string "8 Minggu" ke jam (estimasi)
                    $durationHours = 10; // default
                    if (preg_match('/(\d+)\s*(minggu|bulan|hari|jam)/i', $course->duration, $matches)) {
                        $value = intval($matches[1]);
                        $unit = strtolower($matches[2]);
                        
                        switch($unit) {
                            case 'minggu': $durationHours = $value * 10; break;
                            case 'bulan': $durationHours = $value * 40; break;
                            case 'hari': $durationHours = $value * 2; break;
                            case 'jam': $durationHours = $value; break;
                        }
                    }

                    return [
                        'id' => $course->id,
                        'title' => $course->title,
                        'platform' => 'SkillConnect.id',
                        'category' => $course->category,
                        'instructor' => 'Tim SkillConnect', // Tidak ada kolom instructor
                        'price' => $course->price,
                        'rating' => 4.5, // Default karena tidak ada kolom rating
                        'students_count' => $course->participants,
                        'duration_hours' => $durationHours,
                        'duration_text' => $course->duration, // Format asli "8 Minggu"
                        'difficulty' => 'intermediate', // Default karena tidak ada kolom difficulty
                        'description' => "Kursus {$course->title} di kategori {$course->category}",
                        'url' => url('/courses/' . $course->id),
                        'thumbnail' => '/images/default-course.jpg',
                        'icon_class' => $course->icon_class ?? 'fa-book'
                    ];
                });

            // Jika tidak ada kursus
            if ($courses->isEmpty()) {
                return response()->json([
                    'summary' => "Maaf, belum ada kursus tentang '{$data['interest']}' di platform kami saat ini.",
                    'recommendations' => [],
                    'tips' => [
                        'Coba kata kunci: "Web Development", "Data Science", "Design", "Marketing"',
                        'Hubungi admin untuk request kursus baru',
                        'Lihat semua kategori kursus yang tersedia'
                    ]
                ]);
            }

            // 2. BUAT PROMPT UNTUK AI (AI HANYA KASIH RATING, BUKAN GENERATE KURSUS BARU)
            $prompt = "Role: Expert Education Consultant.

Task: Berikan rating AHP untuk setiap kursus berikut berdasarkan profil user.

User Profile:
- Minat: {$data['interest']}
- Level: {$data['level']}
- Tujuan: {$data['purpose']}
- Waktu tersedia: {$data['time']}

Daftar Kursus dari Database (JANGAN GENERATE BARU, HANYA BERI RATING):
" . json_encode($courses->toArray(), JSON_PRETTY_PRINT) . "

INSTRUKSI PENTING:
1. Gunakan EXACT data kursus di atas (jangan ubah title, url, atau data lainnya)
2. Tambahkan field rating berikut untuk SETIAP kursus:
   - harga_rating: ['Sangat Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Kurang']
   - rating_rating: Sesuaikan dengan nilai 'rating' asli kursus
   - peminat_rating: Sesuaikan dengan 'students_count'
   - durasi_rating: Sesuaikan dengan 'duration_hours' dan waktu user
   - kesulitan_rating: Sesuaikan dengan 'difficulty' dan level user
3. Tambahkan 'reason': Penjelasan singkat kenapa kursus ini cocok/tidak cocok

Kriteria Rating:
- C1 (Harga): Bandingkan 'price' dengan budget umum. Gratis = Sangat Baik, >500k = Kurang
- C2 (Rating): Gunakan field 'rating'. >4.5 = Sangat Baik, <3.0 = Kurang
- C3 (Peminat): Gunakan 'students_count'. >1000 = Sangat Baik, <50 = Kurang
- C4 (Durasi): Cocokkan 'duration_hours' dengan waktu user. Efisien = Sangat Baik
- C5 (Kesulitan): Cocokkan 'difficulty' dengan level user. Match = Sangat Baik

Format JSON Output:
{
    \"summary\": \"Analisis singkat mengapa kursus tertentu lebih cocok\",
    \"recommendations\": [
        {
            \"id\": <id_asli>,
            \"title\": \"<title_asli>\",
            \"platform\": \"SkillConnect.id\",
            \"url\": \"<url_asli>\",
            \"thumbnail\": \"<thumbnail_asli>\",
            \"harga_rating\": \"Sangat Baik\",
            \"rating_rating\": \"Baik\",
            \"peminat_rating\": \"Cukup\",
            \"durasi_rating\": \"Sangat Baik\",
            \"kesulitan_rating\": \"Baik\",
            \"reason\": \"Alasan singkat\",
            \"original_data\": {
                \"price\": <harga_asli>,
                \"rating\": <rating_asli>,
                \"students\": <jumlah_siswa>,
                \"duration\": <durasi_jam>
            }
        }
    ],
    \"tips\": [\"Tip 1\", \"Tip 2\"]
}";

            // 3. KIRIM KE AI UNTUK RATING & AHP RANKING
            $result = $this->callLocalPythonAi($prompt, true);

            // 4. TAMBAHKAN METADATA
            $result['source'] = 'internal_database';
            $result['total_courses_analyzed'] = $courses->count();

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error('Recommend Course Error: ' . $e->getMessage());
            return response()->json([
                'message' => $e->getMessage(),
                'summary' => 'Terjadi kesalahan saat menganalisis kursus'
            ], 500);
        }
    }

    /**
     * FITUR 2: Analisis Skill Gaps (Tetap seperti sebelumnya)
     */
    public function recommendSkill(Request $request)
    {
        try {
            $data = $request->validate([
                'position' => 'required',
                'level' => 'required',
                'goal' => 'required',
                'currentSkills' => 'nullable'
            ]);

            $prompt = "Role: Career Consultant Expert.

Analyze skill gap untuk profile berikut:
- Posisi saat ini: {$data['position']}
- Level: {$data['level']}
- Goal: {$data['goal']}
- Current Skills: {$data['currentSkills']}

Format JSON:
{
    \"summary\": \"Analisis profil dan gap yang ditemukan\",
    \"skillGaps\": [\"skill1\", \"skill2\"],
    \"recommendations\": [
        {
            \"skill\": \"Nama Skill\",
            \"priority\": \"High/Medium/Low\",
            \"reason\": \"Kenapa penting\",
            \"learningPath\": \"Cara belajar\",
            \"timeframe\": \"Estimasi waktu\"
        }
    ],
    \"tips\": [\"Tip 1\"]
}";

            $result = $this->callLocalPythonAi($prompt, false);
            return response()->json($result);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * OPTIONAL: Endpoint untuk cek kursus tersedia
     */
    public function checkAvailableCourses(Request $request)
    {
        $interest = $request->input('interest', '');
        
        $count = Course::where('status', 'active')
            ->where(function($query) use ($interest) {
                $query->where('title', 'LIKE', '%' . $interest . '%')
                      ->orWhere('description', 'LIKE', '%' . $interest . '%');
            })
            ->count();

        return response()->json([
            'available' => $count > 0,
            'count' => $count,
            'message' => $count > 0 
                ? "Ditemukan {$count} kursus tentang '{$interest}'" 
                : "Belum ada kursus tentang '{$interest}'"
        ]);
    }
}