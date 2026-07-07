<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- Logo --}}
            <div class="flex-shrink-0 flex items-center gap-2">
                @auth
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : url('/') }}" class="text-2xl font-bold text-blue-600">
                        SkillConnect<span class="text-gray-800">.id</span>
                    </a>
                @else
                    <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
                        SkillConnect<span class="text-gray-800">.id</span>
                    </a>
                @endauth
            </div>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-1">
                @auth
                    @if(Auth::user()->role === 'admin')
                        {{-- ===== ADMIN MENU ===== --}}
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:text-blue-600 hover:bg-gray-50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.courses.create') }}"
                            class="px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('admin.courses.create') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:text-blue-600 hover:bg-gray-50' }}">
                            Tambah Kursus
                        </a>
                        <a href="{{ route('admin.courses.index') }}"
                            class="px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('admin.courses.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:text-blue-600 hover:bg-gray-50' }}">
                            Kelola Kursus
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                            class="px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:text-blue-600 hover:bg-gray-50' }}">
                            Kelola User
                        </a>
                        <a href="{{ route('admin.payments.index') }}"
                            class="relative px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('admin.payments.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:text-blue-600 hover:bg-gray-50' }}">
                            Konfirmasi Payment
                        </a>
                    @else
                        {{-- ===== USER MENU ===== --}}
                        <a href="{{ url('/') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Beranda</a>
                        <a href="{{ url('/#courses') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Kursus</a>
                        <a href="{{ url('/#recommendation-form') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">AI Rekomendasi</a>
                        <a href="{{ url('/#features') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Tentang</a>
                        <a href="{{ url('/#contact') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Kontak</a>
                    @endif
                @else
                    {{-- ===== GUEST MENU ===== --}}
                    <a href="{{ url('/') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Beranda</a>
                    <a href="{{ url('/#courses') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Kursus</a>
                    <a href="{{ url('/#recommendation-form') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">AI Rekomendasi</a>
                    <a href="{{ url('/#features') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Tentang</a>
                    <a href="{{ url('/#contact') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition text-gray-600 hover:text-blue-600 hover:bg-gray-50">Kontak</a>
                @endauth
            </div>

            {{-- Right Side: Auth Dropdown / Buttons --}}
            <div class="hidden lg:flex items-center gap-3">
                @auth
                    @if(Auth::user()->role === 'admin')
                        {{-- Admin Badge + Dropdown --}}
                        <span class="bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded-full border border-red-200 uppercase tracking-wide">Admin</span>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.outside="open = false"
                                class="flex items-center gap-2 px-3 py-2 rounded-xl border border-gray-200 hover:border-blue-300 hover:bg-blue-50 transition text-sm font-semibold text-gray-700">
                                <div class="w-7 h-7 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-black">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                {{ Auth::user()->name }}
                                <svg class="w-3.5 h-3.5 text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                                <a href="{{ route('profile.show') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Profil Saya
                                </a>
                                <div class="border-t border-gray-100 mt-1 pt-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- User Dropdown --}}
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.outside="open = false"
                                class="flex items-center gap-2 px-3 py-2 rounded-xl border border-gray-200 hover:border-blue-300 hover:bg-blue-50 transition text-sm font-semibold text-gray-700">
                                <div class="w-7 h-7 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-black">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                {{ Auth::user()->name }}
                                <svg class="w-3.5 h-3.5 text-gray-400 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open" x-transition class="absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                                <div class="px-4 py-2 border-b border-gray-100 mb-1">
                                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Menu Saya</p>
                                </div>
                                <a href="{{ route('my-courses') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('my-courses') ? 'bg-blue-50 text-blue-600' : '' }}">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"/></svg>
                                    My Courses
                                </a>
                                <a href="{{ route('my-certificates') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('my-certificates') ? 'bg-blue-50 text-blue-600' : '' }}">
                                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    My Certificates
                                </a>
                                <a href="{{ route('payment-history') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('payment-history') ? 'bg-blue-50 text-blue-600' : '' }}">
                                    <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    History Payment
                                </a>
                                <a href="{{ route('notepad') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('notepad') ? 'bg-blue-50 text-blue-600' : '' }}">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Notepad
                                </a>
                                <div class="border-t border-gray-100 mt-1 pt-1">
                                    <a href="{{ route('profile.show') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        Profil Saya
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">Daftar</a>
                    @endif
                @endauth
            </div>

            {{-- Mobile Hamburger --}}
            <div class="lg:hidden">
                <button @click="open = !open" class="p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition class="lg:hidden border-t border-gray-100 bg-white shadow-lg">
        <div class="px-4 py-3 space-y-1">
            @auth
                @if(Auth::user()->role === 'admin')
                    {{-- Admin Mobile --}}
                    <div class="px-3 py-2 mb-1">
                        <span class="bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded-full border border-red-200 uppercase">Admin — {{ Auth::user()->name }}</span>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2.5 text-sm font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Dashboard</a>
                    <a href="{{ route('admin.courses.create') }}" class="block px-3 py-2.5 text-sm font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Tambah Kursus</a>
                    <a href="{{ route('admin.courses.index') }}" class="block px-3 py-2.5 text-sm font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Kelola Kursus</a>
                    <a href="{{ route('admin.users.index') }}" class="block px-3 py-2.5 text-sm font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Kelola User</a>
                    <a href="{{ route('admin.payments.index') }}" class="block px-3 py-2.5 text-sm font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Konfirmasi Payment</a>
                    <a href="{{ route('profile.show') }}" class="block px-3 py-2.5 text-sm font-semibold text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Profil Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2.5 text-sm font-semibold text-red-600 hover:bg-red-50 rounded-lg transition">Keluar</button>
                    </form>
                @else
                    {{-- User Mobile --}}
                    <a href="{{ url('/') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Beranda</a>
                    <a href="{{ url('/#courses') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Kursus</a>
                    <a href="{{ url('/#recommendation-form') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">AI Rekomendasi</a>
                    <a href="{{ url('/#features') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Tentang</a>
                    <a href="{{ url('/#contact') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Kontak</a>
                    <div class="border-t border-gray-100 pt-3 mt-1">
                        <div class="px-3 py-1 mb-2">
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Menu Saya — {{ Auth::user()->name }}</p>
                        </div>
                        <a href="{{ route('my-courses') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">My Courses</a>
                        <a href="{{ route('my-certificates') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">My Certificates</a>
                        <a href="{{ route('payment-history') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">History Payment</a>
                        <a href="{{ route('notepad') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Notepad</a>
                        <a href="{{ route('profile.show') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Profil Saya</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">Keluar</button>
                        </form>
                    </div>
                @endif
            @else
                {{-- Guest Mobile --}}
                <a href="{{ url('/') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Beranda</a>
                <a href="{{ url('/#courses') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Kursus</a>
                <a href="{{ url('/#recommendation-form') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">AI Rekomendasi</a>
                <a href="{{ url('/#features') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Tentang</a>
                <a href="{{ url('/#contact') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Kontak</a>
                <div class="border-t border-gray-100 pt-3 mt-3 flex gap-3 px-3">
                    <a href="{{ route('login') }}" class="flex-1 text-center px-4 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="flex-1 text-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">Daftar</a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
