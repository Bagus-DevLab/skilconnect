<?php

namespace App\Http\Controllers;

use App\Models\Contact; // ← Pastikan ada ini
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'subject.required' => 'Subjek wajib dipilih',
            'message.required' => 'Pesan wajib diisi',
        ]);

        // Simpan ke database
        Contact::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Terima kasih! Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}