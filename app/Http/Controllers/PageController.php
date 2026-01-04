<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Pastikan Anda telah membuat Model Course

class PageController extends Controller
{
    /**
     * Tampilkan halaman utama (home page) dengan data kursus.
     * Mengambil 3 kursus terbaru dari database.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Mengambil 3 entri kursus terbaru dari tabel 'courses'
        $courses = Course::latest()->limit(3)->get(); 

        // Mengirimkan variabel $courses ke view 'home.blade.php'
        return view('home', compact('courses'));
    }

    /**
     * Tampilkan halaman tentang kami (about page).
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Tampilkan halaman kontak (contact page).
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Tampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Tampilkan halaman registrasi (register page).
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('register');
    }
}