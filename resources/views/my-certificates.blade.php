<x-layouts.landing>

    {{-- Page Header --}}
    <section class="bg-white border-b border-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">My Certificates</h1>
                    <p class="text-gray-500 mt-1">Koleksi sertifikat kompetensi yang telah Anda raih.</p>
                </div>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

    {{-- Info Banner --}}
    <section class="py-8 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl p-5 border border-blue-100 shadow-sm flex items-center gap-4">
                <div class="p-3 rounded-xl bg-green-100 flex-shrink-0">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-gray-700 font-medium">
                    Anda telah memiliki <strong class="text-green-600">{{ $certificates->count() }} Sertifikat Kompetensi</strong> yang diakui industri.
                </p>
            </div>
        </div>
    </section>

    {{-- Grid Sertifikat --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                @forelse ($certificates as $cert)
                    <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-400">

                        {{-- Preview --}}
                        <div class="relative bg-gray-50 h-56 flex items-center justify-center border-b border-gray-100 overflow-hidden">
                            <img src="https://img.freepik.com/free-vector/modern-certificate-appreciation-template-golden-shapes_1017-38367.jpg" alt="Sertifikat" class="h-full object-contain p-4 opacity-90 group-hover:opacity-100 transition group-hover:scale-105 duration-500">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <a href="{{ route('certificate.download', $cert->id) }}" class="bg-white text-blue-600 rounded-full p-3 hover:bg-blue-600 hover:text-white shadow-lg transition" title="Unduh Sertifikat">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </a>
                            </div>
                        </div>

                        {{-- Detail --}}
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-black text-gray-900 group-hover:text-blue-600 transition">{{ $cert->title }}</h3>
                                    <p class="text-gray-500 text-sm mt-1">{{ $cert->category }}</p>
                                </div>
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Tersertifikasi</span>
                            </div>

                            <div class="grid grid-cols-2 gap-3 mb-5 text-sm bg-gray-50 p-3 rounded-xl">
                                <div>
                                    <span class="block text-xs text-gray-400 uppercase tracking-wider mb-1">Tanggal Lulus</span>
                                    <span class="font-semibold text-gray-800">{{ $cert->pivot->updated_at->format('d M Y') }}</span>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-400 uppercase tracking-wider mb-1">ID Sertifikat</span>
                                    <span class="font-mono font-semibold text-gray-800 text-xs">SC-{{ $cert->id }}{{ $cert->pivot->id }}-{{ Auth::id() }}</span>
                                </div>
                            </div>

                            <a href="{{ route('certificate.download', $cert->id) }}"
                                class="flex items-center justify-center gap-2 w-full bg-blue-600 text-white text-sm font-bold py-3 px-4 rounded-xl hover:bg-blue-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Unduh Sertifikat
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <h3 class="text-gray-800 font-bold text-lg mb-1">Belum Ada Sertifikat</h3>
                        <p class="text-gray-500 text-sm mb-4">Selesaikan kursus Anda hingga 100% untuk mendapatkan sertifikat.</p>
                        <a href="{{ route('my-courses') }}" class="inline-block bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-blue-700 transition">Lanjut Belajar &rarr;</a>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

</x-layouts.landing>
