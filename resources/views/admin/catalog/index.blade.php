@extends('layouts.dashboard')
@section('title', 'Manajemen Katalog Ikan — Admin Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
    <div class="page-header animate-slide-up" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="page-title">
                <div class="gradient-emerald icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                Manajemen Katalog Ikan
            </h1>
            <p class="page-subtitle">Kelola daftar ikan yang tampil di halaman customer.</p>
        </div>
        <a href="{{ route('admin.catalog.create') }}" class="btn btn-primary">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Ikan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success animate-slide-up">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="card animate-slide-up stagger-1">
        @if($fishes->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Ikan</th>
                        <th>Nama Ilmiah</th>
                        <th>Status</th>
                        <th>Badge Popularitas</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fishes as $fish)
                    <tr>
                        <td>
                            @if($fish->image)
                                <img src="{{ asset('storage/' . $fish->image) }}" alt="{{ $fish->name }}" style="width: 48px; height: 48px; object-fit: contain; border-radius: 8px; background: #f8fafc;">
                            @else
                                <div style="width: 48px; height: 48px; border-radius: 8px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                            @endif
                        </td>
                        <td style="font-weight: 600; color: #0f172a;">{{ $fish->name }}</td>
                        <td style="font-style: italic; color: #64748b;">{{ $fish->scientific_name ?: '-' }}</td>
                        <td>
                            @if($fish->status_badge)
                                <span class="badge badge-green">{{ $fish->status_badge }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($fish->popularity_badge)
                                <span class="badge badge-amber">{{ $fish->popularity_badge }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="actions" style="justify-content: flex-end;">
                                <a href="{{ route('admin.catalog.edit', $fish->id) }}" class="btn btn-sm btn-outline">Edit</a>
                                <form action="{{ route('admin.catalog.destroy', $fish->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ikan ini?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            <p>Belum ada data ikan di katalog.</p>
        </div>
        @endif
    </div>
</div>
@endsection
