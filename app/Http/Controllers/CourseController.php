<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function learn(Course $course)
    {
        // Pastikan user sudah enroll di kursus ini
        if (!auth()->user()->courses()->where('course_id', $course->id)->exists()) {
            return redirect()->route('dashboard')
                ->with('error', 'Anda belum terdaftar di kursus ini.');
        }

        // Ambil data enrollment user
        $enrollment = auth()->user()->courses()
            ->where('course_id', $course->id)
            ->first();
            

        return view('courses.learn', compact('course', 'enrollment'));
    }

        public function completeLesson(Course $course)
    {
        $user = auth()->user();
        
        // Pastikan user sudah enroll
        $enrollment = $user->courses()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return redirect()->route('dashboard')
                ->with('error', 'Anda belum terdaftar di kursus ini.');
        }
        
        // Update progress (tambah 10% setiap kali complete lesson)
        $currentProgress = $enrollment->pivot->progress;
        $newProgress = min($currentProgress + 10, 100); // Maksimal 100%
        
        // Update status jadi finished kalau sudah 100%
        $status = $newProgress >= 100 ? 'finished' : 'active';
        
        $user->courses()->updateExistingPivot($course->id, [
            'progress' => $newProgress,
            'status' => $status
        ]);
        
        // Redirect dengan pesan sukses
        if ($newProgress >= 100) {
            return redirect()->route('course.learn', $course->id)
                ->with('success', '🎉 Selamat! Anda telah menyelesaikan kursus ini. Sertifikat sudah tersedia!');
        }
        
        return redirect()->route('course.learn', $course->id)
            ->with('success', '✅ Materi berhasil diselesaikan! Progress: ' . $newProgress . '%');
    }

    public function downloadCertificate($courseId)
    {
        // Support session auth (web) dan Bearer token (Flutter mobile)
        $user = auth()->user();

        if (!$user && request()->has('token')) {
            $tokenModel = \Laravel\Sanctum\PersonalAccessToken::findToken(request('token'));
            $user = $tokenModel?->tokenable;
        }

        if (!$user) {
            return redirect()->route('login');
        }

        $course = $user->courses()
            ->where('course_id', $courseId)
            ->wherePivot('status', 'finished')
            ->firstOrFail();

        $data = [
            'name'         => $user->name,
            'course_title' => $course->title,
            'date'         => now()->format('d F Y'),
            'cert_id'      => 'SC-' . $course->id . str_pad($user->id, 3, '0', STR_PAD_LEFT) . '-' . $user->id,
        ];

        try {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.certificate', $data)
                ->setPaper('a4', 'landscape');
            return $pdf->download('Sertifikat-SkillConnect-' . str_replace(' ', '-', $course->title) . '.pdf');
        } catch (\Exception $e) {
            return view('pdf.certificate', $data);
        }
    }

    public function recommend(Request $request)
{
    // 1. Ambil semua kategori unik untuk ditampilkan di dropdown form
    $categories = Course::distinct()->pluck('category');

    // 2. Filter Kursus berdasarkan Kategori yang dipilih user
    $query = Course::query();
    
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $filteredCourses = $query->get();

    // Jika tidak ada kursus di kategori tersebut
    if ($filteredCourses->isEmpty()) {
        return redirect()->back()->with('error', 'Maaf, belum ada kursus di kategori tersebut.');
    }

    // 3. Ambil Preferensi User
    $pPrice = $request->get('pref_price', 1);
    $pRating = $request->get('pref_rating', 1);

    // 4. Hitung Skor AHP & SAW hanya untuk kursus yang sudah difilter
    $minPrice = Course::min('price') ?: 1;
    $maxRating = Course::max('rating') ?: 1;
    $baseWeights = ['price' => 0.515, 'rating' => 0.222];

    $results = $filteredCourses->map(function($course) use ($minPrice, $maxRating, $baseWeights, $pPrice, $pRating) {
        $nPrice = $minPrice / ($course->price ?: 1);
        $nRating = ($course->rating ?: 0) / $maxRating;

        $finalScore = ($nPrice * ($baseWeights['price'] * $pPrice)) + 
                      ($nRating * ($baseWeights['rating'] * $pRating));

        $course->user_match_score = $finalScore;
        return $course;
    });

    // 5. Urutkan hasil
    $recommended = $results->sortByDesc('user_match_score');

    return view('landing', [
        'courses' => $recommended,
        'categories' => $categories,
        'bestMatch' => $recommended->first(),
        'isFiltered' => true
    ]);
}
}