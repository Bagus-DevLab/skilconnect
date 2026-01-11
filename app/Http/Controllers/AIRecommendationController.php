<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiRecommendationController extends Controller
{
    /**
     * Helper untuk memanggil API Python
     */
    private function callLocalPythonAi($prompt, $isAhp = false)
    {
        // Gunakan IP Internal Docker Bridge agar stabil di VPS
        $endpoint = $isAhp ? "/generate-ahp" : "/generate";
        $url = "http://skilconnect.smartfarmingpalcomtech.my.id" . $endpoint; 

        try {
            $response = Http::timeout(300)
                ->connectTimeout(300)
                ->post($url, [
                    'prompt' => $prompt,
                    'max_tokens' => 1200 
                ]);

            if ($response->failed()) {
                Log::error('Python AI Error: ' . $response->body());
                throw new \Exception('Gagal menghubungi Server AI (Status: ' . $response->status() . ')');
            }

            // Hasil dari Python sudah berupa JSON Object (sudah diproses AHP)
            return $response->json();

        } catch (\Exception $e) {
            Log::error('Controller Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * FITUR 1: Rekomendasi Kursus (Menggunakan Full AHP dari Tugas Akhir)
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

            // PROMPT KHUSUS AHP (Sesuai Kriteria C1-C5 di Excel Anda)
            $prompt = "Role: Education Consultant Indonesia.
Task: Berikan 3-5 rekomendasi kursus berdasarkan kriteria AHP.

User Profile:
- Minat: {$data['interest']}
- Level: {$data['level']}
- Tujuan: {$data['purpose']}
- Waktu: {$data['time']}

Aturan Rating (WAJIB):
Gunakan salah satu label ini untuk kriteria C1-C5: ['Sangat Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Kurang']

Definisi Kriteria:
- C1 (Harga): 'Sangat Baik' jika murah/gratis, 'Sangat Kurang' jika sangat mahal.
- C2 (Rating): Kualitas review kursus.
- C3 (Peminat): Popularitas/Jumlah siswa.
- C4 (Durasi): 'Sangat Baik' jika efisien/cepat, 'Sangat Kurang' jika terlalu bertele-tele.
- C5 (Kesulitan): Kesesuaian materi dengan level user.

JSON Format:
{
    \"summary\": \"Ringkasan saran dalam Bahasa Indonesia Baku.\",
    \"recommendations\": [
        {
            \"title\": \"Nama Kursus\",
            \"platform\": \"Nama Platform\",
            \"harga_rating\": \"Sangat Baik\",
            \"rating_rating\": \"Baik\",
            \"peminat_rating\": \"Cukup\",
            \"durasi_rating\": \"Baik\",
            \"kesulitan_rating\": \"Sangat Baik\",
            \"url\": \"Link kursus\",
            \"reason\": \"Alasan singkat\"
        }
    ],
    \"learningPath\": \"Langkah belajar\",
    \"tips\": [\"Tips 1\"]
}";

            $result = $this->callLocalPythonAi($prompt, true);
            return response()->json($result);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * FITUR 2: Analisis Skill Gaps (Rekomendasi Karir)
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

            $prompt = "Role: Senior Tech Recruiter Indonesia.
Analisislah profil kandidat berikut untuk mencapai target karirnya.

Profil:
- Posisi: {$data['position']}
- Level: {$data['level']}
- Target: {$data['goal']}
- Skill Saat Ini: {$data['currentSkills']}

Output harus valid JSON dengan key: summary, skillGaps (array), recommendations (array of objects with skill, priority, reason, learningPath, timeframe), industryTrends (array), dan nextSteps (array). Gunakan Bahasa Indonesia Baku.";

            // Untuk skill gaps, kita gunakan endpoint /generate biasa (tanpa ranking AHP)
            $result = $this->callLocalPythonAi($prompt, false);
            return response()->json($result);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}   