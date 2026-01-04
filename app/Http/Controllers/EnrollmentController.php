<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    // Tampilkan halaman kursus saya
    public function index()
    {
        return view('courses.my-courses');
    }

    // Simpan pendaftaran kursus (DIPERBAIKI: bisa tanpa login)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_name' => 'required|string',
            'course_price' => 'required|string',
            'course_duration' => 'required|string',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'occupation' => 'nullable|string',
            'goals' => 'nullable|string',
            'payment_method' => 'required|in:transfer,ewallet'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // ✅ PERBAIKAN: user_id boleh null jika belum login
        $enrollment = Enrollment::create([
            'user_id' => auth()->check() ? auth()->id() : null, // ← UBAH INI
            'course_name' => $request->course_name,
            'course_price' => $request->course_price,
            'course_duration' => $request->course_duration,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'goals' => $request->goals,
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.',
            'data' => $enrollment
        ], 201);
    }

    // Get user enrollments
    public function myEnrollments()
    {
        $enrollments = Enrollment::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $enrollments
        ]);
    }

    // Get all enrollments (admin)
    public function getAllEnrollments()
    {
        $enrollments = Enrollment::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $enrollments
        ]);
    }

    // Update status enrollment
    public function updateStatus(Request $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,approved,rejected'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $enrollment->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diupdate',
            'data' => $enrollment
        ]);
    }
}