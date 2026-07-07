<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // 1. LIST SEMUA KURSUS
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    // 2. DETAIL KURSUS - Bug fix: method 'show' sebelumnya tidak ada
    public function show($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json(['message' => 'Kursus tidak ditemukan'], 404);
        }
        return response()->json($course);
    }

    // 3. LESSONS KURSUS
    public function lessons(Request $request, $course_id)
    {
        $course = Course::find($course_id);
        if (!$course) {
            return response()->json(['message' => 'Kursus tidak ditemukan'], 404);
        }

        $enrollment = $request->user()->courses()
            ->where('course_id', $course_id)
            ->first();

        return response()->json([
            'course'      => $course,
            'is_enrolled' => $enrollment ? true : false,
            'progress'    => $enrollment ? ($enrollment->pivot->progress ?? 0) : 0,
            'lessons'     => $course->lessons ?? [],
        ]);
    }

    // 4. UPDATE PROGRESS (complete lesson)
    public function completeLesson(Request $request, $id)
    {
        $user   = $request->user();
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Kursus tidak ditemukan'], 404);
        }

        $enrollment = $user->courses()->where('course_id', $course->id)->first();

        if (!$enrollment) {
            return response()->json(['message' => 'Anda belum terdaftar di kursus ini'], 403);
        }

        $currentProgress = $enrollment->pivot->progress ?? 0;
        $newProgress     = min($currentProgress + 10, 100);
        $status          = $newProgress >= 100 ? 'finished' : 'active';

        $user->courses()->updateExistingPivot($course->id, [
            'progress'         => $newProgress,
            'status'           => $status,
            'last_accessed_at' => now(),
        ]);

        return response()->json([
            'message'      => 'Progress berhasil diupdate',
            'progress'     => $newProgress,
            'status'       => $status,
            'is_completed' => $newProgress >= 100,
        ]);
    }

    // 5. MY COURSES - Bug fix: sebelumnya tidak include pivot data (progress/status)
    public function myCourses(Request $request)
    {
        $courses = $request->user()
            ->courses()
            ->withPivot('progress', 'status', 'last_accessed_at')
            ->get()
            ->map(function ($course) {
                $data           = $course->toArray();
                $data['pivot']  = [
                    'progress'         => $course->pivot->progress ?? 0,
                    'status'           => $course->pivot->status ?? 'active',
                    'last_accessed_at' => $course->pivot->last_accessed_at,
                ];
                // Tambahkan progress & status langsung di root untuk kemudahan Flutter
                $data['progress'] = $course->pivot->progress ?? 0;
                $data['status']   = $course->pivot->status ?? 'active';
                return $data;
            });

        return response()->json(['data' => $courses]);
    }

    // 6. AI RECOMMENDATIONS - AHP algorithm sama seperti web
    public function recommendations(Request $request)
    {
        $query = Course::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $filteredCourses = $query->get();

        if ($filteredCourses->isEmpty()) {
            return response()->json(['data' => [], 'best_match' => null, 'categories' => Course::distinct()->pluck('category')]);
        }

        $pPrice  = (float) $request->get('pref_price', 1);
        $pRating = (float) $request->get('pref_rating', 1);

        $minPrice  = Course::min('price')  ?: 1;
        $maxRating = Course::max('rating') ?: 1;

        $baseWeights = ['price' => 0.515, 'rating' => 0.222];

        $results = $filteredCourses->map(function ($course) use ($minPrice, $maxRating, $baseWeights, $pPrice, $pRating) {
            $nPrice  = $minPrice / ($course->price  ?: 1);
            $nRating = ($course->rating ?: 0) / $maxRating;

            $course->user_match_score = ($nPrice  * ($baseWeights['price']  * $pPrice))
                                      + ($nRating * ($baseWeights['rating'] * $pRating));
            return $course;
        })->sortByDesc('user_match_score')->values();

        return response()->json([
            'categories' => Course::distinct()->pluck('category'),
            'best_match' => $results->first(),
            'data'       => $results,
        ]);
    }

    // 7. MY CERTIFICATES - Bug fix: method ini sebelumnya tidak ada sama sekali!
    public function myCertificates(Request $request)
    {
        $certificates = $request->user()
            ->courses()
            ->withPivot('progress', 'status', 'last_accessed_at')
            ->wherePivot('status', 'finished')
            ->get()
            ->map(function ($course) {
                $data           = $course->toArray();
                $data['pivot']  = [
                    'progress'         => $course->pivot->progress ?? 100,
                    'status'           => $course->pivot->status ?? 'finished',
                    'last_accessed_at' => $course->pivot->last_accessed_at,
                ];
                $data['progress'] = $course->pivot->progress ?? 100;
                $data['status']   = 'finished';
                return $data;
            });

        return response()->json(['data' => $certificates]);
    }
}
