<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Halaman Profil
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Halaman Sertifikat Pengguna
     */
    public function certificates()
    {
        $user = Auth::user();

        // Jika model User punya relasi certificates() -> pakai itu
        if (method_exists($user, 'certificates')) {
            $certificates = $user->certificates()->get()->toArray();
        } else {
            // Fallback: ambil dari relasi courses() dan ambil yang completed
            $certificates = [];

            if (method_exists($user, 'courses')) {
                $courses = $user->courses()->get();

                foreach ($courses as $course) {
                    $status = $course->pivot->status ?? null;
                    if ($status === 'completed') {
                        $certificates[] = [
                            'course_id'       => $course->id,
                            'title'           => $course->title ?? ($course->name ?? 'Untitled Course'),
                            'issued_at'       => $course->pivot->completed_at ?? ($course->updated_at ?? null),
                            'certificate_url' => $this->routeExists('certificates.download') ? route('certificates.download', $course->id) : null,
                        ];
                    }
                }
            }
        }

        $certificates = $certificates ?? [];

        return view('profile.certificates', compact('certificates'));
    }

    /**
     * Halaman Settings Profil
     */
    public function settings()
    {
        $user = Auth::user();
        return view('profile.settings', compact('user'));
    }

    /**
     * UPDATE SETTINGS (Nama, Email)
     */
    public function updateSettings(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);

        return back()->with('success', 'Informasi akun berhasil diperbarui!');
    }

    /**
     * UPDATE PASSWORD
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => ['required'],
            'password'         => ['required', 'confirmed', Password::min(8)],
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password saat ini salah'
            ]);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }

    /**
     * UPDATE PROFIL (untuk halaman profile yang lain, bukan settings)
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone'     => ['nullable', 'string', 'max:20'],
            'bio'       => ['nullable', 'string', 'max:500'],
            'address'   => ['nullable', 'string', 'max:255'],
            'photo'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Jika upload foto
        if ($request->hasFile('photo')) {
            // Hapus foto lama
            if ($user->photo && file_exists(public_path('storage/profile/' . $user->photo))) {
                unlink(public_path('storage/profile/' . $user->photo));
            }

            // Simpan foto baru
            $file = $request->file('photo');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/profile', $filename);

            $validated['photo'] = $filename;
        }

        $user->update($validated);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Hapus Foto Profil
     */
    public function deletePhoto()
    {
        $user = Auth::user();

        if ($user->photo && file_exists(public_path('storage/profile/' . $user->photo))) {
            unlink(public_path('storage/profile/' . $user->photo));
        }

        $user->photo = null;
        $user->save();

        return back()->with('success', 'Foto profil berhasil dihapus!');
    }

    /**
     * Helper: cek apakah route ada
     */
    private function routeExists($name)
    {
        try {
            return \Illuminate\Support\Facades\Route::has($name);
        } catch (\Throwable $e) {
            return false;
        }
    }
}