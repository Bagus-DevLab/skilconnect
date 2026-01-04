<section class="courses" id="courses">
    <div class="courses-container">
        <div class="section-title">
            <h2>Kursus Populer</h2>
            <p>Pilihan kursus terbaik untuk meningkatkan keterampilan profesional Anda</p>
        </div>
        <div class="courses-grid">
            {{-- Loop melalui data kursus yang dilewatkan dari Controller --}}
            @forelse ($courses as $course)
                <div class="course-card">
                    <div class="course-image">
                        <i class="fas {{ $course->icon_class ?? 'fa-book-open' }}"></i>
                    </div>
                    <div class="course-content">
                        <span class="course-category">{{ $course->category }}</span>
                        <h3>{{ $course->title }}</h3>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                            <span><i class="fas fa-user"></i> {{ number_format($course->participants, 0, ',', '.') }} Peserta</span>
                        </div>
                        <div class="course-price">Rp {{ number_format($course->price, 0, ',', '.') }}</div>
                    </div>
                </div>
            @empty
                <p>Belum ada kursus yang tersedia saat ini.</p>
            @endforelse
        </div>
        {{-- Tombol Lihat Semua Kursus --}}
        <div style="text-align: center; margin-top: 3rem;">
            <a href="{{ route('courses.index') }}" class="btn-primary" style="padding: 1rem 3rem;">
                Lihat Semua Kursus <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>