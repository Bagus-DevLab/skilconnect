<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseApiController;
use App\Http\Controllers\AIRecommendationController;
use App\Http\Controllers\EnrollmentController;


// ==============================
// Health Check
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
Route::prefix('ai')->group(function () {
    Route::post('/recommend-skills', [AIRecommendationController::class, 'recommendSkills']);
    Route::post('/recommend-jobs', [AIRecommendationController::class, 'recommendJobs']);
    Route::post('/recommend-courses', [AIRecommendationController::class, 'recommendCourses']);
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
// Protected Routes (Butuh Login)
// ==============================
Route::middleware('auth:sanctum')->group(function () {
    
    // Logout & Profile
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    // Courses CRUD (Admin)
    Route::post('/courses', [CourseApiController::class, 'store']);
    Route::put('/courses/{id}', [CourseApiController::class, 'update']);
    Route::delete('/courses/{id}', [CourseApiController::class, 'destroy']);

    // Enrollments (untuk user yang sudah login)
    Route::get('/my-enrollments', [EnrollmentController::class, 'myEnrollments']);
    Route::get('/enrollments', [EnrollmentController::class, 'getAllEnrollments']);
    Route::put('/enrollments/{id}/status', [EnrollmentController::class, 'updateStatus']);
});