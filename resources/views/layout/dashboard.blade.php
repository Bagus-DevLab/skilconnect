@extends('layouts.app') 

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <div class="flex flex-col md:flex-row gap-6">
        
        {{-- Sidebar Navigasi User --}}
        <aside class="w-full md:w-64 bg-white shadow-lg rounded-lg p-4 h-full md:sticky md:top-4">
            {{-- Navigasi Sidebar (Profil, Kursus Saya, Sertifikat, Pengaturan) --}}
            <nav class="space-y-2">
                
                {{-- Link Profil Saya (Cek kode lengkap di respons sebelumnya) --}}
                <a href="{{ route('profile.show') }}" class="flex items-center p-3 rounded-lg ...">Profil Saya</a>
                
                {{-- Link Kursus Saya --}}
                <a href="{{ route('my-courses.index') }}" class="flex items-center p-3 rounded-lg ...">Kursus Saya</a>
                
                {{-- Link Sertifikat --}}
                <a href="{{ route('certificates.index') }}" class="flex items-center p-3 rounded-lg ...">Sertifikat</a>
                
                {{-- Link Pengaturan --}}
                <a href="{{ route('settings.index') }}" class="flex items-center p-3 rounded-lg ...">Pengaturan</a>

            </nav>
        </aside>
        
        {{-- Area Konten Utama --}}
        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</div>
@endsection