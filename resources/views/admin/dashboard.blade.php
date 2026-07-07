<x-layouts.landing>

    {{-- ===== HEADER BANNER ===== --}}
    <section class="bg-white border-b border-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h1 class="text-2xl font-extrabold text-gray-900">Admin Dashboard</h1>
                        <span class="bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded-full border border-red-200 uppercase tracking-wide">Administrator</span>
                    </div>
                    <p class="text-gray-500 text-sm">Selamat datang, <span class="font-semibold text-blue-600">{{ Auth::user()->name }}</span>. Pantau dan kelola seluruh platform di sini.</p>
                </div>
                <div class="flex items-center gap-2 text-xs text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ now()->isoFormat('dddd, D MMMM Y') }}
                </div>
            </div>
        </div>
    </section>

    {{-- ===== STATS CARDS ===== --}}
    <section class="py-8 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                {{-- Total User --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-blue-100 group-hover:bg-blue-600 transition">
                            <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="text-xs text-blue-600 font-semibold hover:underline">Lihat semua</a>
                    </div>
                    <p class="text-3xl font-black text-gray-900">{{ $totalUsers }}</p>
                    <p class="text-sm text-gray-500 font-medium mt-1">Total User Terdaftar</p>
                </div>

                {{-- Total Revenue --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-green-100 group-hover:bg-green-600 transition">
                            <svg class="w-6 h-6 text-green-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="text-xs text-green-600 font-semibold bg-green-50 px-2 py-0.5 rounded-full">Lunas</span>
                    </div>
                    <p class="text-2xl font-black text-gray-900">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500 font-medium mt-1">Total Pendapatan</p>
                </div>

                {{-- Pending Payment --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border {{ $pendingPaymentsCount > 0 ? 'border-yellow-200' : 'border-gray-100' }} hover:shadow-md transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl {{ $pendingPaymentsCount > 0 ? 'bg-yellow-100 group-hover:bg-yellow-500' : 'bg-gray-100' }} transition">
                            <svg class="w-6 h-6 {{ $pendingPaymentsCount > 0 ? 'text-yellow-600 group-hover:text-white' : 'text-gray-400' }} transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </div>
                        <a href="{{ route('admin.payments.index') }}" class="text-xs text-yellow-600 font-semibold hover:underline">Konfirmasi</a>
                    </div>
                    <p class="text-3xl font-black {{ $pendingPaymentsCount > 0 ? 'text-yellow-600' : 'text-gray-900' }}">{{ $pendingPaymentsCount }}</p>
                    <p class="text-sm text-gray-500 font-medium mt-1">Menunggu Konfirmasi</p>
                </div>

                {{-- Total Kursus --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-purple-100 group-hover:bg-purple-600 transition">
                            <svg class="w-6 h-6 text-purple-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <a href="{{ route('admin.courses.index') }}" class="text-xs text-purple-600 font-semibold hover:underline">Kelola</a>
                    </div>
                    <p class="text-3xl font-black text-gray-900">{{ $totalCourses }}</p>
                    <p class="text-sm text-gray-500 font-medium mt-1">Total Kursus Aktif</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== MAIN CONTENT ===== --}}
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- LEFT: TABEL KURSUS --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- Kursus Table --}}
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                            <div>
                                <h2 class="font-bold text-gray-800">Manajemen Kursus</h2>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $courses->count() }} kursus terdaftar</p>
                            </div>
                            <a href="{{ route('admin.courses.create') }}" class="inline-flex items-center gap-1.5 bg-blue-600 text-white text-xs font-bold px-3.5 py-2 rounded-xl hover:bg-blue-700 transition shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Tambah Kursus
                            </a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-white border-b border-gray-100 text-gray-400 text-[10px] uppercase font-bold tracking-wider">
                                    <tr>
                                        <th class="px-6 py-3">Kursus</th>
                                        <th class="px-6 py-3">Kategori</th>
                                        <th class="px-6 py-3 text-right">Harga</th>
                                        <th class="px-6 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 text-sm">
                                    @forelse ($courses as $course)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    @if($course->image)
                                                        <img src="{{ asset('storage/' . $course->image) }}" class="w-12 h-8 object-cover rounded-lg shadow-sm flex-shrink-0">
                                                    @else
                                                        <div class="w-12 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-[8px] text-gray-400 flex-shrink-0">NO IMG</div>
                                                    @endif
                                                    <span class="font-semibold text-gray-900 line-clamp-1">{{ $course->title }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-semibold">{{ $course->category }}</span>
                                            </td>
                                            <td class="px-6 py-4 text-right font-bold text-gray-700">
                                                Rp {{ number_format($course->price, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex justify-center items-center gap-2">
                                                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition" title="Edit">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                    </a>
                                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Hapus kursus ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="p-2 bg-red-50 text-red-500 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                                <svg class="w-10 h-10 mx-auto mb-2 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13"/></svg>
                                                Belum ada kursus. <a href="{{ route('admin.courses.create') }}" class="text-blue-600 font-semibold hover:underline">Tambah sekarang</a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Recent Payments Table --}}
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                            <div>
                                <h2 class="font-bold text-gray-800">Transaksi Terbaru</h2>
                                <p class="text-xs text-gray-400 mt-0.5">5 transaksi terakhir masuk</p>
                            </div>
                            <a href="{{ route('admin.payments.index') }}" class="text-xs text-blue-600 font-bold hover:underline">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-white border-b border-gray-100 text-gray-400 text-[10px] uppercase font-bold tracking-wider">
                                    <tr>
                                        <th class="px-6 py-3">User</th>
                                        <th class="px-6 py-3">Kursus</th>
                                        <th class="px-6 py-3 text-right">Total</th>
                                        <th class="px-6 py-3 text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 text-sm">
                                    @forelse($recentPayments as $payment)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2.5">
                                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-black text-xs flex-shrink-0">
                                                        {{ strtoupper(substr($payment->user->name ?? '?', 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-800 text-xs">{{ $payment->user->name ?? '-' }}</p>
                                                        <p class="text-[10px] text-gray-400">{{ $payment->created_at->format('d M Y') }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="text-gray-700 font-medium text-xs line-clamp-1">{{ $payment->course->title ?? '-' }}</span>
                                            </td>
                                            <td class="px-6 py-4 text-right font-bold text-gray-800 text-xs">
                                                Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                @if($payment->status === 'success')
                                                    <span class="px-2.5 py-1 text-[10px] font-bold rounded-full bg-green-100 text-green-700">Lunas</span>
                                                @elseif($payment->status === 'pending')
                                                    <a href="{{ route('admin.payments.show', $payment->id) }}" class="px-2.5 py-1 text-[10px] font-bold rounded-full bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">Pending</a>
                                                @else
                                                    <span class="px-2.5 py-1 text-[10px] font-bold rounded-full bg-red-100 text-red-700">Ditolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-10 text-center text-gray-400 text-sm">Belum ada transaksi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                {{-- RIGHT SIDEBAR --}}
                <div class="space-y-6">

                    {{-- Quick Actions --}}
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 mb-5">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.courses.create') }}" class="flex items-center gap-3 w-full bg-blue-600 text-white py-3 px-4 rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm text-sm">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Tambah Kursus Baru
                            </a>
                            <a href="{{ route('admin.payments.index') }}" class="flex items-center gap-3 w-full bg-yellow-50 text-yellow-700 border border-yellow-200 py-3 px-4 rounded-xl font-semibold hover:bg-yellow-100 transition text-sm">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                                Konfirmasi Payment
                                @if($pendingPaymentsCount > 0)
                                    <span class="ml-auto bg-yellow-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $pendingPaymentsCount }}</span>
                                @endif
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 w-full bg-gray-50 text-gray-700 border border-gray-200 py-3 px-4 rounded-xl font-semibold hover:bg-gray-100 transition text-sm">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                Kelola User
                            </a>
                            <a href="{{ route('admin.courses.index') }}" class="flex items-center gap-3 w-full bg-gray-50 text-gray-700 border border-gray-200 py-3 px-4 rounded-xl font-semibold hover:bg-gray-100 transition text-sm">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"/></svg>
                                Semua Kursus
                            </a>
                        </div>
                    </div>

                    {{-- User Baru --}}
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="font-bold text-gray-800">User Baru Bergabung</h3>
                            <a href="{{ route('admin.users.index') }}" class="text-xs text-blue-600 font-semibold hover:underline">Lihat semua</a>
                        </div>
                        <div class="space-y-4">
                            @forelse($recentUsers as $user)
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center font-black text-white text-sm flex-shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-400">{{ $user->created_at->diffForHumans() }}</p>
                                    </div>
                                    <span class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0"></span>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <p class="text-sm text-gray-400">Belum ada user baru.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Platform Overview --}}
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-3xl p-6 text-white shadow-lg">
                        <h3 class="font-bold mb-4 text-sm uppercase tracking-wider opacity-80">Ringkasan Platform</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b border-white/10">
                                <span class="text-sm text-blue-100">Total Enrollment</span>
                                <span class="font-black text-lg">{{ $courses->sum('students_count') }}+</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-white/10">
                                <span class="text-sm text-blue-100">Rata-rata Rating</span>
                                <span class="font-black text-lg">{{ $courses->count() > 0 ? number_format($courses->avg('rating'), 1) : '0.0' }}/5</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-sm text-blue-100">Kursus Aktif</span>
                                <span class="font-black text-lg">{{ $totalCourses }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</x-layouts.landing>
