<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    // Menampilkan halaman pembayaran
    public function showPaymentPage($courseId)
    {
        $course = DB::table('courses')->where('id', $courseId)->first();
        
        if (!$course) {
            return redirect()->route('home')->with('error', 'Kursus tidak ditemukan');
        }

        // Cek apakah user sudah terdaftar
        $enrollment = DB::table('enrollments')
            ->where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->first();

        if ($enrollment && $enrollment->payment_status === 'confirmed') {
            return redirect()->route('my.courses')->with('info', 'Anda sudah terdaftar di kursus ini');
        }

        return view('payment', compact('course', 'enrollment'));
    }

    // Proses pembayaran
    public function processPayment(Request $request, $courseId)
    {
        try {
            // Log untuk debug
            Log::info('Payment process started', [
                'user_id' => Auth::id(),
                'course_id' => $courseId,
                'payment_method' => $request->payment_method
            ]);

            // Validasi
            $request->validate([
                'payment_method' => 'required|in:bca,mandiri,bni,bri,gopay,ovo,dana,shopeepay',
                'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $course = DB::table('courses')->where('id', $courseId)->first();

            if (!$course) {
                Log::error('Course not found', ['course_id' => $courseId]);
                return back()->with('error', 'Kursus tidak ditemukan');
            }

            // Cek apakah folder payment_proofs ada
            $uploadPath = public_path('payment_proofs');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
                Log::info('Created payment_proofs directory');
            }

            // Upload bukti pembayaran
            $paymentProof = $request->file('payment_proof');
            $fileName = time() . '_' . Str::random(10) . '.' . $paymentProof->getClientOriginalExtension();
            
            Log::info('Uploading file', ['filename' => $fileName]);
            
            $paymentProof->move(public_path('payment_proofs'), $fileName);

            Log::info('File uploaded successfully');

            // Cek apakah sudah ada enrollment
            $enrollment = DB::table('enrollments')
                ->where('user_id', Auth::id())
                ->where('course_id', $courseId)
                ->first();

            if ($enrollment) {
                // Update enrollment yang sudah ada
                Log::info('Updating existing enrollment', ['enrollment_id' => $enrollment->id]);
                
                DB::table('enrollments')
                    ->where('id', $enrollment->id)
                    ->update([
                        'payment_method' => $request->payment_method,
                        'payment_proof' => $fileName,
                        'payment_status' => 'pending',
                        'updated_at' => now(),
                    ]);
            } else {
                // Buat enrollment baru
                Log::info('Creating new enrollment');
                
                DB::table('enrollments')->insert([
                    'user_id' => Auth::id(),
                    'course_id' => $courseId,
                    'payment_method' => $request->payment_method,
                    'payment_proof' => $fileName,
                    'payment_status' => 'pending',
                    'progress' => 0,
                    'completed_lessons' => 0,
                    'total_lessons' => 0,
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Log::info('Payment processed successfully');

            return redirect()->route('payment.status', $courseId)
                ->with('success', 'Pembayaran berhasil dikirim. Menunggu konfirmasi admin.');

        } catch (\Exception $e) {
            // Log error detail
            Log::error('Payment processing failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Halaman status pembayaran
    public function paymentStatus($courseId)
    {
        $enrollment = DB::table('enrollments')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->where('enrollments.user_id', Auth::id())
            ->where('enrollments.course_id', $courseId)
            ->select('enrollments.*', 'courses.title as course_title', 'courses.price')
            ->first();

        if (!$enrollment) {
            return redirect()->route('home')->with('error', 'Data pembayaran tidak ditemukan');
        }

        return view('payment-status', compact('enrollment'));
    }

    // Admin: Konfirmasi pembayaran
    public function confirmPayment($enrollmentId)
    {
        DB::table('enrollments')
            ->where('id', $enrollmentId)
            ->update([
                'payment_status' => 'confirmed',
                'status' => 'active',
                'confirmed_at' => now(),
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi');
    }

    // Admin: Tolak pembayaran
    public function rejectPayment(Request $request, $enrollmentId)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        DB::table('enrollments')
            ->where('id', $enrollmentId)
            ->update([
                'payment_status' => 'rejected',
                'rejection_reason' => $request->rejection_reason,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Pembayaran ditolak');
    }

    // Admin: Daftar pembayaran pending
    public function pendingPayments()
    {
        $pendingPayments = DB::table('enrollments')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->where('enrollments.payment_status', 'pending')
            ->select(
                'enrollments.*',
                'courses.title as course_title',
                'courses.price',
                'users.name as user_name',
                'users.email as user_email'
            )
            ->orderBy('enrollments.created_at', 'desc')
            ->get();

        return view('admin.pending-payments', compact('pendingPayments'));
    }
}