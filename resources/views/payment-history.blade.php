<x-layouts.landing>

    {{-- Page Header --}}
    <section class="bg-white border-b border-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">History Payment</h1>
                    <p class="text-gray-500 mt-1">Riwayat semua transaksi pembelian kursus Anda.</p>
                </div>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

    {{-- Filter --}}
    <section class="py-6 bg-blue-50 border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-3 items-center">
                <div class="relative flex-1 w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" class="pl-9 block w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 text-sm" placeholder="Cari No. Invoice atau Kursus...">
                </div>
                <div class="flex gap-2 w-full md:w-auto">
                    <select class="rounded-xl border-gray-200 shadow-sm text-sm text-gray-600 focus:border-blue-500">
                        <option>Semua Status</option>
                        <option>Berhasil</option>
                        <option>Menunggu</option>
                        <option>Gagal</option>
                    </select>
                    <input type="date" class="rounded-xl border-gray-200 shadow-sm text-sm text-gray-600 focus:border-blue-500">
                </div>
            </div>
        </div>
    </section>

    {{-- Tabel Transaksi --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No. Invoice</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kursus</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Metode</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($payments as $payment)
                            <tr class="hover:bg-gray-50 transition {{ $payment->status === 'rejected' ? 'opacity-60' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold {{ $payment->status === 'success' ? 'text-blue-600' : 'text-gray-500' }}">
                                    #INV-{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900">{{ $payment->course->title }}</div>
                                    <div class="text-xs text-gray-400">{{ $payment->course->category }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $payment->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ ucwords(str_replace('_', ' ', $payment->payment_method)) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800">
                                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($payment->status === 'success')
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Lunas</span>
                                    @elseif($payment->status === 'pending')
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">Menunggu</span>
                                    @else
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">Gagal</span>
                                    @endif
                                    @if($payment->status === 'rejected')
                                        <p class="text-xs text-gray-400 mt-1 max-w-[180px] truncate">{{ $payment->rejection_reason ?? 'Tidak ada alasan' }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if($payment->status === 'success')
                                        <a href="{{ route('course.learn', $payment->course->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center gap-1">
                                            Akses Kursus
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                        </a>
                                    @elseif($payment->status === 'pending')
                                        <a href="{{ route('payment.upload', $payment->id) }}" class="bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-blue-700 transition">
                                            Upload Bukti
                                        </a>
                                    @else
                                        <span class="text-gray-300 cursor-not-allowed text-xs">Tidak tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    <svg class="w-14 h-14 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    <p class="text-gray-500 font-medium">Belum ada riwayat pembayaran.</p>
                                    <a href="{{ url('/') }}" class="text-blue-600 hover:underline text-sm mt-2 inline-block font-semibold">Jelajahi Kursus &rarr;</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</x-layouts.landing>
