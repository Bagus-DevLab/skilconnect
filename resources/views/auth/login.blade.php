<x-guest-layout>
    <div class="min-h-screen flex">

        {{-- KIRI: Branding Panel --}}
        <div class="hidden lg:flex w-1/2 relative overflow-hidden" style="background: linear-gradient(135deg, #6C63FF 0%, #9B91FF 50%, #5A52E8 100%);">
            {{-- Dekorasi background --}}
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-20 -left-20 w-80 h-80 rounded-full opacity-10" style="background:white;"></div>
                <div class="absolute -bottom-10 -right-10 w-60 h-60 rounded-full opacity-10" style="background:white;"></div>
                <div class="absolute top-1/3 right-8 w-32 h-32 rounded-full opacity-5" style="background:white;"></div>
            </div>

            <div class="relative z-10 flex flex-col justify-between p-12 w-full">
                {{-- Logo --}}
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

                {{-- Tengah: Headline & Features --}}
                <div class="flex-1 flex flex-col justify-center">
                    <h1 class="text-4xl font-extrabold text-white leading-tight mb-4">
                        Belajar, Tumbuh, dan<br>
                        <span class="text-yellow-300">Tersertifikasi</span>
                    </h1>
                    <p class="text-purple-100 text-base leading-relaxed mb-10">
                        Platform pelatihan kerja online dengan sertifikasi resmi yang diakui industri. Fleksibel, terjangkau, dan praktis.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-lg flex-shrink-0 flex items-center justify-center" style="background:rgba(255,255,255,0.15)">
                                <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm">Sertifikat Resmi</p>
                                <p class="text-purple-200 text-xs">Diakui industri dan dapat diverifikasi</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-lg flex-shrink-0 flex items-center justify-center" style="background:rgba(255,255,255,0.15)">
                                <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm">Rekomendasi AI</p>
                                <p class="text-purple-200 text-xs">AHP algorithm untuk kursus terbaik untukmu</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-lg flex-shrink-0 flex items-center justify-center" style="background:rgba(255,255,255,0.15)">
                                <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm">Belajar Fleksibel</p>
                                <p class="text-purple-200 text-xs">Akses kursus 24/7 kapan saja, di mana saja</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bawah: Stats --}}
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-3 rounded-xl" style="background:rgba(255,255,255,0.12)">
                        <p class="text-2xl font-bold text-white">10K+</p>
                        <p class="text-purple-200 text-xs">Peserta Aktif</p>
                    </div>
                    <div class="text-center p-3 rounded-xl" style="background:rgba(255,255,255,0.12)">
                        <p class="text-2xl font-bold text-white">95%</p>
                        <p class="text-purple-200 text-xs">Tingkat Kepuasan</p>
                    </div>
                    <div class="text-center p-3 rounded-xl" style="background:rgba(255,255,255,0.12)">
                        <p class="text-2xl font-bold text-white">100%</p>
                        <p class="text-purple-200 text-xs">Sertifikat Resmi</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KANAN: Form Login --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-gray-50 px-6 md:px-12 py-12">
            <div class="w-full max-w-md">

                {{-- Mobile: Logo --}}
                <div class="lg:hidden mb-8 text-center">
                    <a href="/" class="inline-flex items-center gap-2">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:#6C63FF">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold" style="color:#6C63FF">SkillConnect<span class="text-gray-700">.id</span></span>
                    </a>
                </div>

                {{-- Header Form --}}
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Selamat Datang Kembali!</h2>
                    <p class="text-gray-500 mt-2 text-sm">Masuk untuk melanjutkan perjalanan belajar Anda</p>
                </div>

                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 text-sm text-green-700 p-3 bg-green-50 rounded-xl border border-green-200 flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4.5 h-4.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                placeholder="nama@email.com"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-white text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-transparent transition duration-150"
                                style="focus:ring-color:#6C63FF"
                                onfocus="this.style.boxShadow='0 0 0 2px #6C63FF33'; this.style.borderColor='#6C63FF';"
                                onblur="this.style.boxShadow=''; this.style.borderColor='#E5E7EB';">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-medium hover:underline" style="color:#6C63FF">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4.5 h-4.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                placeholder="••••••••"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-white text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition duration-150"
                                onfocus="this.style.boxShadow='0 0 0 2px #6C63FF33'; this.style.borderColor='#6C63FF';"
                                onblur="this.style.boxShadow=''; this.style.borderColor='#E5E7EB';">
                        </div>
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600 cursor-pointer">Ingat saya</label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full py-3 px-4 text-white text-sm font-bold rounded-xl transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:translate-y-0"
                        style="background: linear-gradient(135deg, #6C63FF, #9B91FF);"
                        onmouseover="this.style.background='linear-gradient(135deg, #5A52E8, #8880FF)'"
                        onmouseout="this.style.background='linear-gradient(135deg, #6C63FF, #9B91FF)'">
                        Masuk Sekarang →
                    </button>
                </form>

                {{-- Divider --}}
                <div class="my-6 flex items-center gap-3">
                    <div class="flex-1 h-px bg-gray-200"></div>
                    <span class="text-xs text-gray-400 font-medium">ATAU</span>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>

                {{-- Register link --}}
                <div class="text-center">
                    <p class="text-sm text-gray-500">
                        Belum memiliki akun?
                        <a href="{{ route('register') }}" class="font-bold hover:underline ml-1" style="color:#6C63FF">
                            Daftar Gratis →
                        </a>
                    </p>
                </div>

                {{-- Back to home --}}
                <div class="mt-6 text-center">
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
