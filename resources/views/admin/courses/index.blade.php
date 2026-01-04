@extends('admin.layout')

@section('title', 'Kelola Kursus')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-book"></i> Kelola Kursus</h2>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Kursus Baru
    </a>
</div>

<div class="stat-card">
    @if($courses->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-inbox fs-1 text-muted mb-3"></i>
            <p class="text-muted">Belum ada kursus. Silakan tambah kursus baru.</p>
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Kursus Pertama
            </a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Durasi</th>
                        <th>Peserta</th>
                        <th>Harga</th>
                        <th>Icon</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $course->title }}</strong></td>
                        <td><span class="badge bg-info">{{ $course->category }}</span></td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ $course->participants }} orang</td>
                        <td>Rp {{ number_format($course->price, 0, ',', '.') }}</td>
                        <td>
                            @if($course->icon_class)
                                <i class="fas {{ $course->icon_class }} fs-4"></i>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $courses->links() }}
        </div>
    @endif
</div>
@endsection