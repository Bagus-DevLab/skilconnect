@extends('admin.layout')

@section('title', 'Pesan Kontak')

@section('content')
<div class="mb-4">
    <h2><i class="fas fa-envelope"></i> Pesan Kontak</h2>
    <p class="text-muted">Total pesan: {{ $contacts->total() }}</p>
</div>

<div class="stat-card">
    @if($contacts->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-inbox fs-1 text-muted mb-3"></i>
            <p class="text-muted">Belum ada pesan masuk.</p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr class="{{ $contact->status === 'new' ? 'table-warning' : '' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($contact->status === 'new')
                                <span class="badge badge-new">Baru</span>
                            @elseif($contact->status === 'read')
                                <span class="badge badge-read">Dibaca</span>
                            @else
                                <span class="badge badge-replied">Dibalas</span>
                            @endif
                        </td>
                        <td><strong>{{ $contact->name }}</strong></td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->subject, 40) }}</td>
                        <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
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
            {{ $contacts->links() }}
        </div>
    @endif
</div>
@endsection