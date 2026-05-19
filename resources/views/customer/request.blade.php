@extends('layouts.dashboard')
@section('title', 'Request Bibit — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-emerald icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            Request Bibit
        </h1>
        <p class="page-subtitle">Kirim permintaan bibit Wolffia atau pantau ketersediaan dari peternak terdekat.</p>
    </div>

    <div class="grid-2" style="margin-bottom: 32px;">
        {{-- Form Input Kebutuhan Bibit --}}
        <div class="card animate-slide-up stagger-1" style="border-top: 4px solid #10b981;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:6px;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/></svg>
                Input Kebutuhan Bibit
            </h2>
            <p style="font-size:0.8rem;color:#64748b;margin-bottom:20px;">Kirim permintaan bibit Wolffia yang Anda butuhkan. Admin akan memproses permintaan Anda.</p>
            <form action="{{ route('customer.seed-request.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Jenis Bibit *</label>
                    <select name="jenis_bibit" class="form-input form-select" required>
                        <option value="" disabled selected>Pilih jenis bibit...</option>
                        <option value="Wolffia globosa">🌿 Wolffia globosa</option>
                        <option value="Wolffia arrhiza">🌱 Wolffia arrhiza</option>
                        <option value="Wolffia microscopica">🍀 Wolffia microscopica</option>
                        <option value="Wolffia angusta">🌾 Wolffia angusta</option>
                        <option value="Campuran (Mixed)">🌿 Campuran (Mixed)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Jumlah yang Dibutuhkan (gram) *</label>
                    <input type="number" step="0.1" name="jumlah_gram" class="form-input" placeholder="mis. 500" required min="1">
                </div>
                <div class="form-group">
                    <label class="form-label">Keterangan (Opsional)</label>
                    <input type="text" name="keterangan" class="form-input" placeholder="Jelaskan kebutuhan Anda...">
                </div>
                <div class="info-tip" style="margin-bottom:20px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    Permintaan akan diproses oleh admin dalam 1-2 hari kerja
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    Kirim Permintaan
                </button>
            </form>
        </div>

        {{-- Info Ketersediaan --}}
        <div class="card animate-slide-up stagger-2" style="border-top: 4px solid #06b6d4;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:6px;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Ketersediaan Bibit
                <span class="badge badge-green">{{ $stats['available_farmers'] }} peternak</span>
            </h2>
            <p style="font-size:0.8rem;color:#64748b;margin-bottom:20px;">Peternak yang memiliki sisa bibit Wolffia tersedia untuk distribusi.</p>

            @if($availableSeeds->count() > 0)
            <div style="display:flex;flex-direction:column;gap:12px;max-height:400px;overflow-y:auto; padding-right: 4px;">
                @foreach($availableSeeds as $farmer)
                @php
                    $initials = collect(explode(' ', $farmer->nama))->map(fn($w)=>strtoupper(substr($w,0,1)))->take(2)->join('');
                @endphp
                <div style="display:flex;align-items:center;gap:14px;padding:16px;border-radius:12px;background:#f8fafc;border:1px solid #e2e8f0;transition:all 0.2s;" onmouseover="this.style.borderColor='#10b981';this.style.boxShadow='0 4px 12px rgba(16,185,129,0.1)'" onmouseout="this.style.borderColor='#e2e8f0';this.style.boxShadow='none'">
                    <div class="farmer-avatar" style="width:42px;height:42px;border-radius:10px;font-size:0.75rem;">{{ $initials }}</div>
                    <div style="flex:1;min-width:0;">
                        <p style="font-weight:700;font-size:0.9rem;color:#0f172a;">{{ $farmer->nama }}</p>
                        <p style="font-size:0.75rem;color:#94a3b8;display:flex;align-items:center;gap:4px;">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $farmer->lokasi }}
                        </p>
                        @if($farmer->catatan)
                        <p style="font-size:0.7rem;color:#64748b;margin-top:4px;">💬 {{ Str::limit($farmer->catatan, 60) }}</p>
                        @endif
                    </div>
                    <span class="badge badge-green" style="font-size:0.65rem;">🌱 Tersedia</span>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state" style="padding:30px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:48px;height:48px;"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/></svg>
                <p>Belum ada peternak dengan bibit tersedia saat ini.</p>
            </div>
            @endif
        </div>
    </div>

    {{-- Riwayat Permintaan --}}
    <div class="card animate-slide-up stagger-3">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0891b2" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                Riwayat Permintaan Bibit
                <span class="badge badge-cyan">{{ $myRequests->count() }} permintaan</span>
            </h2>
        </div>

        @if($myRequests->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Jenis Bibit</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Catatan Admin</th>
                        <th>Tanggal</th>
                        <th style="text-align:right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myRequests as $req)
                    <tr>
                        <td style="font-weight:600;">{{ $req->jenis_bibit }}</td>
                        <td><span class="badge badge-cyan">{{ number_format($req->jumlah_gram, 1) }} g</span></td>
                        <td style="color:#64748b;max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $req->keterangan ?: '—' }}</td>
                        <td><span class="badge {{ $req->status_badge_class }}">{{ $req->status_label }}</span></td>
                        <td style="color:#64748b;max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $req->catatan_admin ?: '—' }}</td>
                        <td style="color:#94a3b8;font-size:0.8rem;">{{ $req->created_at->format('d M Y') }}</td>
                        <td>
                            @if($req->status === 'pending')
                            <form action="{{ route('customer.seed-request.delete', $req) }}" method="POST" onsubmit="return confirm('Batalkan permintaan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    Batalkan
                                </button>
                            </form>
                            @else
                            <span style="color:#94a3b8;font-size:0.8rem;">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            <p>Belum ada permintaan bibit. Mulai kirim permintaan pertama Anda!</p>
        </div>
        @endif
    </div>
</div>
@endsection
