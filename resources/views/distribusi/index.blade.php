@extends('layouts.dashboard')
@section('title', 'Katalog Peternak — Distribution Bridge — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
    <div class="page-header animate-slide-up" style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:16px;">
        <div>
            <h1 class="page-title">
                <div class="gradient-emerald icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
                Katalog Peternak
            </h1>
            <p class="page-subtitle">Distribution Bridge — direktori gotong royong digital antar peternak Wolffia.</p>
        </div>
        <button onclick="document.getElementById('addFarmerModal').style.display='flex'" class="btn btn-primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Peternak
        </button>
    </div>

    {{-- Stats --}}
    <div style="display:flex;gap:16px;margin-bottom:24px;flex-wrap:wrap;" class="animate-slide-up stagger-1">
        <div class="stat-box" style="background:#d1fae5;border-radius:12px;min-width:120px;">
            <p class="stat-value" style="color:#065f46;">{{ $stats['total'] }}</p>
            <p class="stat-label" style="color:#065f46;">Total Peternak</p>
        </div>
        <div class="stat-box" style="background:#cffafe;border-radius:12px;min-width:120px;">
            <p class="stat-value" style="color:#155e75;">{{ $stats['ada_bibit'] }}</p>
            <p class="stat-label" style="color:#155e75;">Ada Sisa Bibit</p>
        </div>
        <div class="stat-box" style="background:#fef3c7;border-radius:12px;min-width:120px;">
            <p class="stat-value" style="color:#92400e;">{{ $stats['butuh_bibit'] }}</p>
            <p class="stat-label" style="color:#92400e;">Butuh Bibit</p>
        </div>
    </div>

    {{-- Search & Filter --}}
    <div style="display:flex;gap:12px;margin-bottom:24px;flex-wrap:wrap;" class="animate-slide-up stagger-2">
        <form action="{{ route('distribusi.index') }}" method="GET" style="display:flex;gap:12px;flex:1;flex-wrap:wrap;">
            <div style="position:relative;flex:1;min-width:200px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" name="cari" class="form-input" style="padding-left:40px;margin:0;" placeholder="Cari nama atau lokasi..." value="{{ request('cari') }}">
            </div>
            <select name="status" class="form-input form-select" style="width:auto;min-width:180px;margin:0;">
                <option value="">Semua Status</option>
                <option value="ada_sisa_bibit" {{ request('status') === 'ada_sisa_bibit' ? 'selected' : '' }}>🌱 Ada Sisa Bibit</option>
                <option value="butuh_bibit" {{ request('status') === 'butuh_bibit' ? 'selected' : '' }}>🙋 Butuh Bibit</option>
                <option value="tidak_tersedia" {{ request('status') === 'tidak_tersedia' ? 'selected' : '' }}>⏸ Tidak Tersedia</option>
            </select>
            <button type="submit" class="btn btn-secondary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                Cari
            </button>
            @if(request()->hasAny(['cari','status']))
            <a href="{{ route('distribusi.index') }}" class="btn btn-outline">Reset</a>
            @endif
        </form>
    </div>

    {{-- Farmer Cards --}}
    @if($farmers->count() > 0)
    <div class="grid-3">
        @foreach($farmers as $i => $farmer)
        @php
            $initials = collect(explode(' ', $farmer->nama))->map(fn($w)=>strtoupper(substr($w,0,1)))->take(2)->join('');
            $statusMap = [
                'ada_sisa_bibit' => ['label'=>'🌱 Ada Sisa Bibit','class'=>'badge-green'],
                'butuh_bibit' => ['label'=>'🙋 Butuh Bibit','class'=>'badge-amber'],
                'tidak_tersedia' => ['label'=>'⏸ Tidak Tersedia','class'=>'badge-slate'],
            ];
            $status = $statusMap[$farmer->status_ketersediaan] ?? $statusMap['tidak_tersedia'];
        @endphp
        <div class="farmer-card animate-slide-up stagger-{{ min(($i % 4) + 1, 5) }}">
            <div style="display:flex;align-items:flex-start;gap:14px;margin-bottom:20px;">
                <div class="farmer-avatar">{{ $initials }}</div>
                <div style="flex:1;min-width:0;">
                    <p style="font-weight:700;color:#0f172a;font-size:1rem;">{{ $farmer->nama }}</p>
                    <p style="font-size:0.8rem;color:#94a3b8;display:flex;align-items:center;gap:4px;margin-top:2px;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        {{ $farmer->lokasi }}
                    </p>
                </div>
                <span class="badge {{ $status['class'] }}">{{ $status['label'] }}</span>
            </div>

            @if($farmer->kontak)
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px;font-size:0.85rem;color:#64748b;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                {{ $farmer->kontak }}
            </div>
            @endif

            @if($farmer->catatan)
            <div style="padding:12px;border-radius:8px;background:#f8fafc;font-size:0.8rem;color:#64748b;line-height:1.6;margin-bottom:12px;">
                💬 {{ $farmer->catatan }}
            </div>
            @endif

            <div class="actions" style="margin-top:auto;padding-top:12px;border-top:1px solid #f1f5f9;">
                <button onclick="openEditModal({{ json_encode($farmer) }})" class="btn btn-sm btn-outline" style="flex:1;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Edit
                </button>
                <form action="{{ route('distribusi.destroy', $farmer) }}" method="POST" style="flex:1;" onsubmit="return confirm('Hapus data peternak ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" style="width:100%;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="empty-state">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        <p>Belum ada peternak terdaftar. Tambahkan peternak pertama!</p>
    </div>
    @endif
</div>

{{-- Add Farmer Modal --}}
<div id="addFarmerModal" class="modal-backdrop" style="display:none;" onclick="if(event.target===this)this.style.display='none'">
    <div class="modal-content">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
            <h3 style="font-size:1.2rem;font-weight:700;color:#0f172a;">Tambah Peternak Baru</h3>
            <button onclick="document.getElementById('addFarmerModal').style.display='none'" style="padding:8px;border-radius:8px;background:none;border:none;cursor:pointer;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <form action="{{ route('distribusi.store') }}" method="POST">
            @csrf
            <div class="form-group"><label class="form-label">Nama Peternak *</label><input type="text" name="nama" class="form-input" placeholder="mis. Pak Budi Santoso" required></div>
            <div class="form-group"><label class="form-label">Lokasi *</label><input type="text" name="lokasi" class="form-input" placeholder="mis. Subang, Jawa Barat" required></div>
            <div class="form-group"><label class="form-label">Kontak (HP/WA)</label><input type="text" name="kontak" class="form-input" placeholder="mis. 08xx-xxxx-xxxx"></div>
            <div class="form-group">
                <label class="form-label">Status Ketersediaan *</label>
                <select name="status_ketersediaan" class="form-input form-select" required>
                    <option value="ada_sisa_bibit">🌱 Ada Sisa Bibit</option>
                    <option value="butuh_bibit">🙋 Butuh Bibit</option>
                    <option value="tidak_tersedia" selected>⏸ Tidak Tersedia</option>
                </select>
            </div>
            <div class="form-group"><label class="form-label">Catatan</label><input type="text" name="catatan" class="form-input" placeholder="Informasi tambahan..."></div>
            <button type="submit" class="btn btn-primary" style="width:100%;">Tambah Peternak</button>
        </form>
    </div>
</div>

{{-- Edit Farmer Modal --}}
<div id="editFarmerModal" class="modal-backdrop" style="display:none;" onclick="if(event.target===this)this.style.display='none'">
    <div class="modal-content">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
            <h3 style="font-size:1.2rem;font-weight:700;color:#0f172a;">Edit Peternak</h3>
            <button onclick="document.getElementById('editFarmerModal').style.display='none'" style="padding:8px;border-radius:8px;background:none;border:none;cursor:pointer;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="editFarmerForm" method="POST">
            @csrf @method('PUT')
            <div class="form-group"><label class="form-label">Nama *</label><input type="text" name="nama" id="editNama" class="form-input" required></div>
            <div class="form-group"><label class="form-label">Lokasi *</label><input type="text" name="lokasi" id="editLokasi" class="form-input" required></div>
            <div class="form-group"><label class="form-label">Kontak</label><input type="text" name="kontak" id="editKontak" class="form-input"></div>
            <div class="form-group">
                <label class="form-label">Status Ketersediaan *</label>
                <select name="status_ketersediaan" id="editStatus" class="form-input form-select" required>
                    <option value="ada_sisa_bibit">🌱 Ada Sisa Bibit</option>
                    <option value="butuh_bibit">🙋 Butuh Bibit</option>
                    <option value="tidak_tersedia">⏸ Tidak Tersedia</option>
                </select>
            </div>
            <div class="form-group"><label class="form-label">Catatan</label><input type="text" name="catatan" id="editCatatan" class="form-input"></div>
            <button type="submit" class="btn btn-primary" style="width:100%;">Simpan Perubahan</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
function openEditModal(farmer) {
    document.getElementById('editFarmerForm').action = '/distribusi/' + farmer.id;
    document.getElementById('editNama').value = farmer.nama;
    document.getElementById('editLokasi').value = farmer.lokasi;
    document.getElementById('editKontak').value = farmer.kontak || '';
    document.getElementById('editStatus').value = farmer.status_ketersediaan;
    document.getElementById('editCatatan').value = farmer.catatan || '';
    document.getElementById('editFarmerModal').style.display = 'flex';
}
</script>
@endpush
@endsection
