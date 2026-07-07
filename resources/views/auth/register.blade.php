<x-guest-layout>
    <div class="min-h-screen flex">

        {{-- KIRI: Branding Panel --}}
        <div class="hidden lg:flex w-1/2 relative overflow-hidden" style="background: linear-gradient(135deg, #5A52E8 0%, #6C63FF 50%, #9B91FF 100%);">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-16 -right-16 w-72 h-72 rounded-full opacity-10" style="background:white;"></div>
                <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full opacity-10" style="background:white;"></div>
            </div>

            <div class="relative z-10 flex flex-col justify-between p-12 w-full">
                <div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <span class="text-white text-xl font-bold tracking-tight">SkillConnect<span class="text-purple-200">.id</span></span>
                    </div>
                </div>

                <div class="flex-1 flex flex-col justify-center">
                    <h1 class="text-4xl font-extrabold text-white leading-tight mb-4">
                        Mulai Perjalanan<br>
                        <span class="text-yellow-300">Belajarmu</span> Sekarang
                    </h1>
                    <p class="text-purple-100 text-base leading-relaxed mb-10">
                        Buat akun gratis dan dapatkan akses ke ratusan kursus berkualitas dengan sertifikasi yang diakui industri.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3 p-3 rounded-xl" style="background:rgba(255,255,255,0.1)">
                            <div class="w-8 h-8 rounded-lg flex-shrink-0 flex items-center justify-center" style="background:rgba(255,255,255,0.2)">
                                <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm">Daftar 100% Gratis</p>
                                <p class="text-purple-200 text-xs">Tidak ada biaya pendaftaran</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-xl" style="background:rgba(255,255,255,0.1)">
                            <div class="w-8 h-8 rounded-lg flex-shrink-0 flex items-center justify-center" style="background:rgba(255,255,255,0.2)">
                                <svg class="w-4 h-4 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm">Data Aman & Terlindungi</p>
                                <p class="text-purple-200 text-xs">Privasi Anda adalah prioritas kami</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-xl" style="background:rgba(255,255,255,0.1)">
                            <div class="w-8 h-8 rounded-lg flex-shrink-0 flex items-center justify-center" style="background:rgba(255,255,255,0.2)">
                                <svg class="w-4 h-4 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm">Langsung Bisa Belajar</p>
                                <p class="text-purple-200 text-xs">Akses kursus segera setelah daftar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-4 rounded-xl" style="background:rgba(255,255,255,0.1)">
                    <div class="flex -space-x-2">
                        @foreach(['A','B','C','D'] as $l)
                            <div class="w-8 h-8 rounded-full border-2 border-white flex items-center justify-center text-xs font-bold text-white" style="background:rgba(255,255,255,0.3)">{{$l}}</div>
                        @endforeach
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold">Bergabung dengan 10.000+ peserta</p>
                        <p class="text-purple-200 text-xs">yang sudah meningkatkan karier mereka</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KANAN: Form Register --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-gray-50 px-6 md:px-12 py-10 overflow-y-auto">
            <div class="w-full max-w-md">

                {{-- Mobile Logo --}}
                <div class="lg:hidden mb-6 text-center">
                    <a href="/" class="inline-flex items-center gap-2">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:#6C63FF">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold" style="color:#6C63FF">SkillConnect<span class="text-gray-700">.id</span></span>
                    </a>
                </div>

                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Buat Akun Baru</h2>
                    <p class="text-gray-500 mt-1 text-sm">Isi data di bawah untuk mulai belajar gratis</p>
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Nama --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                placeholder="Nama lengkap Anda"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-white text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition duration-150"
                                onfocus="this.style.boxShadow='0 0 0 2px #6C63FF33'; this.style.borderColor='#6C63FF';"
                                onblur="this.style.boxShadow=''; this.style.borderColor='#E5E7EB';">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="nama@email.com"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-white text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition duration-150"
                                onfocus="this.style.boxShadow='0 0 0 2px #6C63FF33'; this.style.borderColor='#6C63FF';"
                                onblur="this.style.boxShadow=''; this.style.borderColor='#E5E7EB';">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                placeholder="Minimal 8 karakter"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-white text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition duration-150"
                                onfocus="this.style.boxShadow='0 0 0 2px #6C63FF33'; this.style.borderColor='#6C63FF';"
                                onblur="this.style.boxShadow=''; this.style.borderColor='#E5E7EB';">
                        </div>
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                placeholder="Ulangi password"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-white text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition duration-150"
                                onfocus="this.style.boxShadow='0 0 0 2px #6C63FF33'; this.style.borderColor='#6C63FF';"
                                onblur="this.style.boxShadow=''; this.style.borderColor='#E5E7EB';">
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start gap-2">
                            <input type="checkbox" name="terms" id="terms" required
                                class="mt-0.5 w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="terms" class="text-xs text-gray-600 cursor-pointer">
                                {!! __('Saya menyetujui :terms_of_service dan :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-bold hover:underline" style="color:#6C63FF">'.__('Syarat Layanan').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-bold hover:underline" style="color:#6C63FF">'.__('Kebijakan Privasi').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    @endif

                    <button type="submit"
                        class="w-full py-3 px-4 text-white text-sm font-bold rounded-xl transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:translate-y-0 mt-2"
                        style="background: linear-gradient(135deg, #6C63FF, #9B91FF);"
                        onmouseover="this.style.background='linear-gradient(135deg, #5A52E8, #8880FF)'"
                        onmouseout="this.style.background='linear-gradient(135deg, #6C63FF, #9B91FF)'">
                        Daftar Sekarang →
                    </button>
                </form>

                <div class="my-5 flex items-center gap-3">
                    <div class="flex-1 h-px bg-gray-200"></div>
                    <span class="text-xs text-gray-400 font-medium">ATAU</span>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-500">
                        Sudah memiliki akun?
                        <a href="{{ route('login') }}" class="font-bold hover:underline ml-1" style="color:#6C63FF">
                            Masuk di sini →
                        </a>
                    </p>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('landing') }}" class="inline-flex items-center gap-1 text-xs text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
