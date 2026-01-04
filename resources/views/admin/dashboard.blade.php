@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-chart-line"></i> Dashboard</h2>
    <span class="text-muted">Selamat datang, {{ auth()->user()->name }}</span>
</div>

<div class="row g-4">
    <!-- Total Kursus -->
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Kursus</h6>
                    <h2 class="mb-0">{{ $stats['total_courses'] }}</h2>
                </div>
                <div class="fs-1 text-primary">
                    <i class="fas fa-book"></i>
                </div>
            </div>
            <a href="{{ route('admin.courses') }}" class="btn btn-sm btn-outline-primary mt-3 w-100">
                Kelola Kursus
            </a>
        </div>
    </div>

    <!-- Total Pesan -->
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Pesan</h6>
                    <h2 class="mb-0">{{ $stats['total_contacts'] }}</h2>
                </div>
                <div class="fs-1 text-success">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
            <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-outline-success mt-3 w-100">
                Lihat Pesan
            </a>
        </div>
    </div>

    <!-- Pesan Baru -->
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Pesan Baru</h6>
                    <h2 class="mb-0">{{ $stats['new_contacts'] }}</h2>
                </div>
                <div class="fs-1 text-warning">
                    <i class="fas fa-bell"></i>
                </div>
            </div>
            <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-outline-warning mt-3 w-100">
                Cek Sekarang
            </a>
        </div>
    </div>

    <!-- Total Users -->
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-2">Total Users</h6>
                    <h2 class="mb-0">{{ $stats['total_users'] }}</h2>
                </div>
                <div class="fs-1 text-info">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-info mt-3 w-100">
                Kelola Users
            </a>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="stat-card">
            <h5 class="mb-3"><i class="fas fa-info-circle"></i> Quick Actions</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kursus Baru
                </a>
                <a href="{{ route('admin.contacts') }}" class="btn btn-success">
                    <i class="fas fa-envelope-open"></i> Lihat Pesan Masuk
                </a>
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <i class="fas fa-globe"></i> Lihat Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection