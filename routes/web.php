<?php
use App\Http\Controllers\AIRecommendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;

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
// AI Recommendation Page (Halaman AI Recommendation Hub)
// =======================
Route::get('/ai-recommendation', function () {
    return view('ai-recommendation');
})->name('ai.recommendation');

// =======================
// AI RECOMMENDATION API ROUTES (Public - bisa diakses tanpa login)
// =======================
Route::prefix('api/ai')->group(function () {
    Route::post('/recommend-skills', [AIRecommendationController::class, 'recommendSkills'])->name('api.ai.recommend.skills');
    Route::post('/recommend-jobs', [AIRecommendationController::class, 'recommendJobs'])->name('api.ai.recommend.jobs');
    Route::post('/recommend-courses', [AIRecommendationController::class, 'recommendCourses'])->name('api.ai.recommend.courses');
});

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
    // Kursus Saya - HANYA 1 ROUTE INI SAJA
    Route::get('/my-courses', [CourseController::class, 'myCourses'])->name('my.courses');
    
    // Sertifikat
    Route::get('/certificates', [ProfileController::class, 'certificates'])->name('certificates');
    
    // ===============================
    // PROFILE & SETTINGS
    // ===============================
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    
    // Pengaturan (Settings)
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [ProfileController::class, 'updateSettings'])->name('settings.update');
    Route::post('/settings/password', [ProfileController::class, 'updatePassword'])->name('settings.password');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ===============================
    // PAYMENT ROUTES (User - harus login)
    // ===============================
    // Halaman pembayaran kursus
    Route::get('/payment/{courseId}', [PaymentController::class, 'showPaymentPage'])->name('payment.show');
    
    // Proses pembayaran (upload bukti transfer)
    Route::post('/payment/{courseId}', [PaymentController::class, 'processPayment'])->name('payment.process');
    
    // Status pembayaran
    Route::get('/payment-status/{courseId}', [PaymentController::class, 'paymentStatus'])->name('payment.status');
});

// =======================
// ADMIN ROUTES (Protected - harus login)
// =======================
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // ===============================
    // COURSES MANAGEMENT
    // ===============================
    Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
    Route::get('/courses/create', [AdminController::class, 'createCourse'])->name('courses.create');
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('courses.store');
    Route::get('/courses/{course}/edit', [AdminController::class, 'editCourse'])->name('courses.edit');
    Route::put('/courses/{course}', [AdminController::class, 'updateCourse'])->name('courses.update');
    Route::delete('/courses/{course}', [AdminController::class, 'destroyCourse'])->name('courses.destroy');

    // ===============================
    // CONTACTS MANAGEMENT
    // ===============================
    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::get('/contacts/{contact}', [AdminController::class, 'showContact'])->name('contacts.show');
    Route::patch('/contacts/{contact}/status', [AdminController::class, 'updateContactStatus'])->name('contacts.status');
    Route::delete('/contacts/{contact}', [AdminController::class, 'destroyContact'])->name('contacts.destroy');

    // ===============================
    // USERS MANAGEMENT
    // ===============================
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // ===============================
    // PAYMENT MANAGEMENT (Admin)
    // ===============================

    // Route untuk enrollment baru 
    Route::post('/api/enrollments', [PaymentController::class, 'createEnrollment'])->name('enrollment.create');

    // Daftar pembayaran pending
    Route::get('/pending-payments', [PaymentController::class, 'pendingPayments'])->name('pending.payments');
    
    // Konfirmasi pembayaran (Approve)
    Route::post('/payment/confirm/{enrollmentId}', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');
    
    // Tolak pembayaran (Reject)
    Route::post('/payment/reject/{enrollmentId}', [PaymentController::class, 'rejectPayment'])->name('payment.reject');
});