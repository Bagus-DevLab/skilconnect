<x-layouts.landing>

    {{-- Page Header --}}
    <section class="bg-white border-b border-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">My Courses</h1>
                    <p class="text-gray-500 mt-1">Kelola dan lanjutkan kursus yang sedang Anda ikuti.</p>
                </div>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

    {{-- Statistik --}}
    <section class="py-8 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white rounded-2xl p-5 flex items-center gap-4 shadow-sm border border-blue-100">
                    <div class="p-3 rounded-xl bg-blue-100">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"/></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Kursus</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalCourses }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-5 flex items-center gap-4 shadow-sm border border-yellow-100">
                    <div class="p-3 rounded-xl bg-yellow-100">
                        <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Sedang Dipelajari</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $ongoingCount }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-5 flex items-center gap-4 shadow-sm border border-green-100">
                    <div class="p-3 rounded-xl bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Selesai</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $finishedCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Daftar Kursus --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($enrollments as $course)
                    <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-xl transition duration-400 {{ $course->pivot->status === 'finished' ? 'opacity-90' : '' }}">

                        <div class="h-48 bg-gray-100 relative overflow-hidden {{ $course->pivot->status === 'finished' ? 'grayscale' : '' }}">
                            @if($course->image)
                                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                            <span class="absolute bottom-3 left-3 bg-white/20 backdrop-blur-md text-white text-[10px] font-black px-2.5 py-1 rounded-lg uppercase border border-white/30">
                                {{ $course->category }}
                            </span>
                            @if($course->pivot->status === 'finished')
                                <span class="absolute top-3 right-3 bg-green-500 text-white text-xs font-bold px-2.5 py-1 rounded-full shadow">Selesai</span>
                            @endif
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-lg font-black text-gray-900 mb-2 group-hover:text-blue-600 transition">{{ $course->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>

                            <div class="mt-auto">
                                <div class="flex justify-between text-xs text-gray-500 mb-1 font-semibold">
                                    <span>Progress</span>
                                    <span class="{{ $course->pivot->progress == 100 ? 'text-green-600' : 'text-blue-600' }} font-bold">{{ $course->pivot->progress }}%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2 mb-4">
                                    <div class="{{ $course->pivot->status === 'finished' ? 'bg-green-500' : 'bg-blue-600' }} h-2 rounded-full transition-all duration-500" style="width: {{ $course->pivot->progress }}%"></div>
                                </div>

                                @if($course->pivot->status === 'finished')
                                    <div class="flex gap-2">
                                        <button class="flex-1 bg-gray-100 text-gray-700 text-sm font-bold py-2.5 px-3 rounded-xl hover:bg-gray-200 transition">Review</button>
                                        <a href="{{ route('my-certificates') }}" class="flex-1 bg-green-600 text-white text-sm font-bold py-2.5 px-3 rounded-xl hover:bg-green-700 transition text-center flex items-center justify-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            Sertifikat
                                        </a>
                                    </div>
                                @else
                                    <a href="{{ route('course.learn', $course->id) }}"
                                        class="block w-full bg-blue-600 text-white text-sm font-bold py-2.5 px-4 rounded-xl hover:bg-blue-700 transition text-center">
                                        Lanjutkan Belajar &rarr;
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"/></svg>
                        <p class="text-gray-500 font-medium mb-3">Anda belum memiliki kursus yang diikuti.</p>
                        <a href="{{ url('/') }}" class="inline-block bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-blue-700 transition">Cari Kursus Sekarang &rarr;</a>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

</x-layouts.landing>
