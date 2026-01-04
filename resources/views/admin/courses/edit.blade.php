@extends('admin.layout')

@section('title', 'Edit Kursus')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.courses') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="stat-card">
    <h4 class="mb-4"><i class="fas fa-edit"></i> Edit Kursus: {{ $course->title }}</h4>

    <form action="{{ route('admin.courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Judul Kursus <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title', $course->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" 
                       value="{{ old('category', $course->category) }}" required>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Durasi <span class="text-danger">*</span></label>
                <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" 
                       value="{{ old('duration', $course->duration) }}" required>
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Jumlah Peserta</label>
                <input type="number" name="participants" class="form-control @error('participants') is-invalid @enderror" 
                       value="{{ old('participants', $course->participants) }}" min="0">
                @error('participants')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                       value="{{ old('price', $course->price) }}" min="0" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Icon Class (Font Awesome)</label>
                <input type="text" name="icon_class" class="form-control @error('icon_class') is-invalid @enderror" 
                       value="{{ old('icon_class', $course->icon_class) }}">
                <small class="text-muted">
                    Gunakan kelas Font Awesome seperti: fa-bullhorn, fa-laptop-code, fa-paint-brush
                </small>
                @error('icon_class')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update Kursus
            </button>
            <a href="{{ route('admin.courses') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection