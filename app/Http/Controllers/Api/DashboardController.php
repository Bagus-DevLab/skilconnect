<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats(Request $request)
    {
        $user = $request->user();

        $activeCoursesCount = $user->courses()
            ->wherePivot('status', 'active')
            ->count();

        $finishedCoursesCount = $user->courses()
            ->wherePivot('status', 'finished')
            ->count();

        // Bug fix: status 'success' bukan 'paid'
        $totalInvestment = Payment::where('user_id', $user->id)
            ->where('status', 'success')
            ->sum('amount');

        // Bug fix: orderByPivot pakai last_accessed_at, fallback ke updated_at
        $lastCourse = $user->courses()
            ->withPivot('progress', 'status', 'last_accessed_at')
            ->orderByPivot('last_accessed_at', 'desc')
            ->first();

        $recentCourses = $user->courses()
            ->withPivot('progress', 'status', 'last_accessed_at')
            ->orderByPivot('last_accessed_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($course) {
                return [
                    'id'        => $course->id,
                    'title'     => $course->title,
                    // Bug fix: pakai 'image' bukan 'thumbnail'
                    'thumbnail' => $course->image ? asset('storage/' . $course->image) : null,
                    'image_url' => $course->image ? asset('storage/' . $course->image) : null,
                    'category'  => $course->category ?? 'General',
                    'progress'  => $course->pivot->progress ?? 0,
                ];
            });

        return response()->json([
            'stats' => [
                'active_courses'   => $activeCoursesCount,
                'finished_courses' => $finishedCoursesCount,
                'total_investment' => $totalInvestment,
            ],
            'last_course' => $lastCourse ? [
                'id'       => $lastCourse->id,
                'title'    => $lastCourse->title,
                'category' => $lastCourse->category,
                // Bug fix: pakai 'image' bukan 'thumbnail'
                'image'    => $lastCourse->image ? asset('storage/' . $lastCourse->image) : null,
                'progress' => $lastCourse->pivot->progress ?? 0,
            ] : null,
            'recent_courses' => $recentCourses,
        ]);
    }
}
