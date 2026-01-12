<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseApiController;
use App\Http\Controllers\EnrollmentController;
// PERBAIKAN: Pastikan menggunakan Ai... (i kecil) sesuai perbaikan sebelumnya
use App\Http\Controllers\AiRecommendationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Route ini stateless (tidak pakai session/cookie), cocok untuk Flutter.
| URL prefix otomatis: /api/
|
*/

// ==============================
// Health Check (Cek Koneksi)
// ==============================
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'API is running',
        'timestamp' => now()
    ]);
});

// ==============================
// Auth Routes (Public)
// ==============================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ==============================
// AI Recommendation Routes (Public)
// ==============================
// PERBAIKAN: Nama method disamakan dengan Controller (recommendSkill & recommendCourse)
Route::prefix('ai')->group(function () {
    Route::post('/recommend-skill', [AiRecommendationController::class, 'recommendSkill']);
    Route::post('/recommend-course', [AiRecommendationController::class, 'recommendCourse']);
});

// ==============================
// Courses - Public Access
// ==============================
Route::get('/courses', [CourseApiController::class, 'index']);
Route::get('/courses/{id}', [CourseApiController::class, 'show']);

// ==============================
// ENROLLMENT PUBLIC (Tanpa Login)
// ==============================
Route::post('/enrollments', [EnrollmentController::class, 'store']);

// ==============================
// Protected Routes (Butuh Login / Token Bearer)
// ==============================
Route::middleware('auth:sanctum')->group(function () {
    
    // Logout & Profile
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    // Enrollments (untuk user yang sudah login)
    Route::get('/my-enrollments', [EnrollmentController::class, 'myEnrollments']);
    Route::get('/enrollments', [EnrollmentController::class, 'getAllEnrollments']); // Admin/Reviewer
    Route::put('/enrollments/{id}/status', [EnrollmentController::class, 'updateStatus']); // Admin
    
    // Course Management (Admin)
    Route::post('/courses', [CourseApiController::class, 'store']);
    Route::put('/courses/{id}', [CourseApiController::class, 'update']);
    Route::delete('/courses/{id}', [CourseApiController::class, 'destroy']);
});