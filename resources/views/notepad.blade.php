<x-layouts.landing>

    {{-- Page Header --}}
    <section class="bg-white border-b border-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">Notepad</h1>
                    <p class="text-gray-500 mt-1">Simpan ide, tugas, dan catatan belajar Anda di sini.</p>
                </div>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

    {{-- Notepad Content --}}
    <section class="py-12 bg-blue-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-yellow-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-yellow-100 bg-yellow-50 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <h3 class="font-bold text-yellow-800 text-sm uppercase tracking-wide">Catatan Pribadi</h3>
                </div>
                @livewire('note-manager')
            </div>
        </div>
    </section>

</x-layouts.landing>
