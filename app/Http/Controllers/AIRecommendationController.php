<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiRecommendationController extends Controller
{
    private function callLocalPythonAi($prompt)
    {
        // URL ke Python FastAPI (Port 8001)
        $url = "https://lfmafic-production.up.railway.app/generate";

        try {
            // PERBAIKAN 1: Tambahkan timeout()
            // Kita set 300 detik (5 menit) agar tidak error saat CPU lambat
            $response = Http::timeout(300) 
                ->connectTimeout(300) // Waktu tunggu koneksi
                ->post($url, [
                    'prompt' => $prompt,
                    // PERBAIKAN 2: Kurangi max_tokens
                    // 1200 terlalu banyak dan bikin lama. 600 cukup untuk JSON rekomendasi.
                    'max_tokens' => 600 
                ]);

            if ($response->failed()) {
                Log::error('Python AI Error: ' . $response->body());
                throw new \Exception('Gagal menghubungi Server AI Lokal (Pastikan main.py sudah dijalankan).');
            }

            return $response->json();

        } catch (\Exception $e) {
            Log::error('Controller Error: ' . $e->getMessage());
            
            // Pesan error khusus jika timeout
            if (str_contains($e->getMessage(), 'timed out')) {
                throw new \Exception('AI terlalu lama merespon (Timeout). Laptop sedang bekerja keras, coba kurangi panjang permintaan.');
            }
            
            if (str_contains($e->getMessage(), 'Connection refused')) {
                throw new \Exception('Server AI (Python) belum dinyalakan. Jalankan "python main.py" dulu.');
            }
            throw $e;
        }
    }

    public function recommendSkill(Request $request)
    {
        try {
            $data = $request->validate([
                'position' => 'required', 'level' => 'required', 
                'goal' => 'required', 'currentSkills' => 'nullable'
            ]);
            
            $prompt = "Role: Senior Tech Recruiter Indonesia.
            Task: Analyze candidate profile for modern tech role.

            Candidate Profile:
            - Role: {$data['position']}
            - Level: {$data['level']}
            - Goal: {$data['goal']}
            - Skills: {$data['currentSkills']}

            IMPORTANT RULES:
            1. Use FORMAL INDONESIAN (Bahasa Indonesia Baku). Do NOT use Malay words like 'pentadbiran' or 'kerajaan'.
            2. Focus on modern tech (2025).
            3. Output VALID JSON ONLY.

            JSON Structure:
            {
            \"summary\": \"Tulis analisis profesional 2 kalimat dalam Bahasa Indonesia Baku\",
            \"skillGaps\": [\"Sebutkan 3 skill teknis modern\"],
            \"recommendations\": [
                {
                \"skill\": \"Nama Skill Utama\",
                \"priority\": \"High\",
                \"reason\": \"Alasan dalam Bahasa Indonesia\",
                \"learningPath\": \"Langkah belajar konkrit\",
                \"timeframe\": \"Estimasi waktu (minggu/bulan)\"
                }
            ],
            \"industryTrends\": [\"Tren teknologi 1\", \"Tren teknologi 2\"],
            \"nextSteps\": [\"Langkah pertama yang harus dilakukan\"]
            }";
            
            return response()->json($this->callLocalPythonAi($prompt));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function recommendCourse(Request $request)
    {
        try {
            $data = $request->validate([
                'interest' => 'required', 'level' => 'required', 
                'purpose' => 'required', 'time' => 'required'
            ]);

            $prompt = "Role: Education Consultant Indonesia.
            Task: Recommend online courses.

            User Profile:
            - Interest: {$data['interest']}
            - Level: {$data['level']}
            - Goal: {$data['purpose']}
            - Time: {$data['time']}

            IMPORTANT RULES:
            1. Use FORMAL INDONESIAN (Bahasa Indonesia Baku).
            2. Recommend real platforms (Udemy, Coursera, Dicoding, BuildWithAngga).
            3. Output VALID JSON ONLY.

            JSON Structure:
            {
            \"summary\": \"Saran penyemangat dalam Bahasa Indonesia Baku\",
            \"courses\": [
                {
                \"title\": \"Nama Kursus Spesifik\",
                \"platform\": \"Nama Platform\",
                \"level\": \"{$data['level']}\",
                \"duration\": \"Estimasi durasi\",
                \"matchScore\": 95,
                \"keyTopics\": [\"Topik 1\", \"Topik 2\"],
                \"whyRecommended\": \"Alasan rekomendasi dalam Bahasa Indonesia\",
                \"estimatedPrice\": \"Gratis / Berbayar\"
                }
            ],
            \"learningPath\": \"Urutan belajar\",
            \"tips\": [\"Tips belajar 1\"]
            }";

            return response()->json($this->callLocalPythonAi($prompt));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}