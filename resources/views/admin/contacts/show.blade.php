@extends('admin.layout')

@section('title', 'Detail Pesan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.contacts') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="stat-card">
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h4><i class="fas fa-envelope-open"></i> Detail Pesan</h4>
            <small class="text-muted">Diterima: {{ $contact->created_at->format('d F Y, H:i') }}</small>
        </div>
        <form action="{{ route('admin.contacts.status', $contact) }}" method="POST">
            @csrf
            @method('PATCH')
            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>Baru</option>
                <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Dibaca</option>
                <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Dibalas</option>
            </select>
        </form>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="fw-bold">Nama Pengirim:</label>
            <p>{{ $contact->name }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <label class="fw-bold">Email:</label>
            <p>
                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </p>
        </div>

        @if($contact->phone)
        <div class="col-md-6 mb-3">
            <label class="fw-bold">No. Telepon:</label>
            <p>
                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
            </p>
        </div>
        @endif

        <div class="col-md-12 mb-3">
            <label class="fw-bold">Subjek:</label>
            <p>{{ $contact->subject }}</p>
        </div>

        <div class="col-md-12">
            <label class="fw-bold">Pesan:</label>
            <div class="border rounded p-3 bg-light">
                {!! nl2br(e($contact->message)) !!}
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="d-flex gap-2">
        <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary">
            <i class="fas fa-reply"></i> Balas via Email
        </a>
        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Hapus Pesan
            </button>
        </form>
    </div>
</div>
@endsection