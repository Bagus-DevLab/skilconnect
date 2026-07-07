<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $courses      = Course::latest()->get();
        $totalUsers   = User::where('role', 'user')->count();
        $totalCourses = Course::count();

        $recentUsers  = User::where('role', 'user')->latest()->take(5)->get();

        $pendingPaymentsCount = Payment::where('status', 'pending')->count();
        $totalRevenue         = Payment::where('status', 'success')->sum('amount');

        $recentPayments = Payment::with(['user', 'course'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'courses',
            'totalUsers',
            'totalCourses',
            'recentUsers',
            'pendingPaymentsCount',
            'totalRevenue',
            'recentPayments'
        ));
    }
}
