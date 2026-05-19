@extends('layouts.dashboard')
@section('title', 'Settings — Wolfilium Admin')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #8b5cf6, #6d28d9); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
            </div>
            Settings
        </h1>
        <p class="page-subtitle">Kelola pengguna dan konfigurasi sistem Wolfilium.</p>
    </div>

    {{-- User Management --}}
    <div class="card animate-slide-up stagger-1">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Manajemen Pengguna
                <span class="badge badge-purple">{{ $users->count() }} total</span>
            </h2>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Bergabung</th>
                        <th style="text-align:right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <div style="width:36px;height:36px;border-radius:10px;background:{{ $user->isAdmin() ? 'linear-gradient(135deg,#8b5cf6,#6d28d9)' : 'linear-gradient(135deg,#34d399,#059669)' }};display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.7rem;">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <p style="font-weight:600;">{{ $user->name }}</p>
                                    @if($user->id === auth()->id())
                                    <span style="font-size:0.7rem;color:#10b981;">(Anda)</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="color:#64748b;">{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->isAdmin() ? 'badge-purple' : 'badge-green' }}">
                                {{ $user->isAdmin() ? '🛡️ Admin' : '👤 Customer' }}
                            </span>
                        </td>
                        <td style="color:#94a3b8;font-size:0.85rem;">{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            @if($user->id !== auth()->id())
                            <div class="actions" style="justify-content:flex-end;">
                                <form action="{{ route('admin.user.role', $user) }}" method="POST" style="display:inline;">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="role" value="{{ $user->isAdmin() ? 'customer' : 'admin' }}">
                                    <button type="submit" class="btn btn-sm btn-outline" title="Toggle Role" onclick="return confirm('Ubah role {{ $user->name }} menjadi {{ $user->isAdmin() ? 'customer' : 'admin' }}?')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
                                        {{ $user->isAdmin() ? 'Jadikan Customer' : 'Jadikan Admin' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.user.delete', $user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus user {{ $user->name }}? Aksi ini tidak bisa dibatalkan.')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    </button>
                                </form>
                            </div>
                            @else
                            <span style="font-size:0.8rem;color:#94a3b8;">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
