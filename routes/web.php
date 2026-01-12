<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
// Pastikan nama file controller Anda: AiRecommendationController.php
use App\Http\Controllers\AiRecommendationController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =======================
// Halaman Utama (Home)
// =======================
Route::get('/', [PageController::class, 'home'])->name('home');

// =======================
// Halaman Tentang (About)
// =======================
Route::get('/about', [PageController::class, 'about'])->name('about');

// =======================
// Halaman Kontak (Contact)
// =======================
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// =======================
// KURSUS (Menampilkan semua kursus)
// =======================
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// =======================
// AI RECOMMENDATION (PERBAIKAN)
// =======================

// 1. Tampilan Halaman (View Blade)
Route::get('/ai-recommendation', function () {
    return view('ai-recommendation'); 
})->name('ai.view');

// 2. Proses Logic AI (POST) - URL disesuaikan dengan JavaScript
Route::post('/ai/recommend-skill', [AiRecommendationController::class, 'recommendSkill'])->name('ai.skill');
Route::post('/ai/recommend-course', [AiRecommendationController::class, 'recommendCourse'])->name('ai.course');


// =======================
// Halaman Login & Register (Guest Only)
// =======================
Route::middleware('guest')->group(function () {
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::get('/register', [PageController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// =======================
// Protected routes (harus login)
// =======================
Route::middleware(['auth'])->group(function () {
    
    // ===============================
    // KURSUS SAYA & CERTIFICATES
    // ===============================
    Route::get('/my-courses', [CourseController::class, 'myCourses'])->name('my.courses');
    Route::get('/certificates', [ProfileController::class, 'certificates'])->name('certificates');
    
    // ===============================
    // PROFILE & SETTINGS
    // ===============================
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [ProfileController::class, 'updateSettings'])->name('settings.update');
    Route::post('/settings/password', [ProfileController::class, 'updatePassword'])->name('settings.password');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ===============================
    // PAYMENT ROUTES (User)
    // ===============================
    Route::get('/payment/{courseId}', [PaymentController::class, 'showPaymentPage'])->name('payment.show');
    Route::post('/payment/{courseId}', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment-status/{courseId}', [PaymentController::class, 'paymentStatus'])->name('payment.status');
});

// =======================
// ADMIN ROUTES (Protected)
// =======================
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Courses Management
    Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
    Route::get('/courses/create', [AdminController::class, 'createCourse'])->name('courses.create');
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('courses.store');
    Route::get('/courses/{course}/edit', [AdminController::class, 'editCourse'])->name('courses.edit');
    Route::put('/courses/{course}', [AdminController::class, 'updateCourse'])->name('courses.update');
    Route::delete('/courses/{course}', [AdminController::class, 'destroyCourse'])->name('courses.destroy');

    // Contacts Management
    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::get('/contacts/{contact}', [AdminController::class, 'showContact'])->name('contacts.show');
    Route::patch('/contacts/{contact}/status', [AdminController::class, 'updateContactStatus'])->name('contacts.status');
    Route::delete('/contacts/{contact}', [AdminController::class, 'destroyContact'])->name('contacts.destroy');

    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Payment Management
    Route::post('/api/enrollments', [PaymentController::class, 'createEnrollment'])->name('enrollment.create');
    Route::get('/pending-payments', [PaymentController::class, 'pendingPayments'])->name('pending.payments');
    Route::post('/payment/confirm/{enrollmentId}', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');
    Route::post('/payment/reject/{enrollmentId}', [PaymentController::class, 'rejectPayment'])->name('payment.reject');
});

// Route Debugging (Optional)
Route::get('/cek-model', [AiRecommendationController::class, 'checkModels']);