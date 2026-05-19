@extends('layouts.dashboard')
@section('title', 'Manajemen Panen — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-emerald icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></div>
            Wolfilium Management System
        </h1>
        <p class="page-subtitle">Kalkulator prediksi panen otomatis & pencatatan hasil panen harian.</p>
    </div>

    <div class="grid-2" style="margin-bottom: 32px;">
        {{-- Kalkulator Prediksi Panen --}}
        <div class="card animate-slide-up stagger-1" style="border-top: 4px solid #10b981;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:6px;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="16" y1="14" x2="16" y2="18"/><line x1="8" y1="10" x2="8" y2="10.01"/><line x1="12" y1="10" x2="12" y2="10.01"/><line x1="16" y1="10" x2="16" y2="10.01"/><line x1="8" y1="14" x2="8" y2="14.01"/><line x1="12" y1="14" x2="12" y2="14.01"/><line x1="8" y1="18" x2="8" y2="18.01"/><line x1="12" y1="18" x2="12" y2="18.01"/></svg>
                Kalkulator Prediksi Panen
            </h2>
            <p style="font-size:0.8rem;color:#64748b;margin-bottom:20px;">Input tanggal tebar & berat bibit — sistem otomatis menghitung kapan harus panen.</p>
            <form action="{{ route('manajemen.prediksi') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Tanggal Tebar</label>
                    <input type="date" name="tanggal_tebar" class="form-input" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Berat Bibit (gram)</label>
                    <input type="number" step="0.1" name="berat_bibit_gram" class="form-input" placeholder="mis. 500" required min="0.1">
                </div>
                <div class="info-tip" style="margin-bottom:20px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    Wolffia berlipat ganda setiap 24-48 jam
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    Hitung Prediksi Panen
                </button>
            </form>
        </div>

        {{-- Form Catat Panen --}}
        <div class="card animate-slide-up stagger-2" style="border-top: 4px solid #0891b2;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:6px;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0891b2" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                {{ isset($log) ? 'Edit Data Panen' : 'Catat Hasil Panen' }}
            </h2>
            <p style="font-size:0.8rem;color:#64748b;margin-bottom:20px;">Catat berapa kg hasil panen hari ini untuk tracking tren produksi.</p>
            <form action="{{ isset($log) ? route('manajemen.panen.update', $log) : route('manajemen.panen.simpan') }}" method="POST">
                @csrf
                @if(isset($log)) @method('PUT') @endif
                <div class="form-group">
                    <label class="form-label">Tanggal Panen</label>
                    <input type="date" name="tanggal_panen" class="form-input" value="{{ isset($log) ? $log->tanggal_panen->format('Y-m-d') : date('Y-m-d') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Berat Panen (kg)</label>
                    <input type="number" step="0.01" name="berat_kg" class="form-input" placeholder="mis. 2.5" value="{{ isset($log) ? $log->berat_kg : '' }}" required min="0.01">
                </div>
                <div class="form-group">
                    <label class="form-label">Keterangan (Opsional)</label>
                    <input type="text" name="keterangan" class="form-input" placeholder="mis. Panen batch WFC-003" value="{{ isset($log) ? $log->keterangan : '' }}">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;background:linear-gradient(135deg,#06b6d4,#0891b2);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    {{ isset($log) ? 'Update Data Panen' : 'Simpan Data Panen' }}
                </button>
                @if(isset($log))
                <a href="{{ route('manajemen.index') }}" class="btn btn-secondary" style="width:100%;margin-top:8px;">Batal Edit</a>
                @endif
            </form>
        </div>
    </div>

    {{-- Active Predictions --}}
    @if($predictions->count() > 0)
    <div class="card animate-slide-up stagger-3" style="margin-bottom: 32px;">
        <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            Prediksi Panen Aktif
            <span class="badge badge-amber">{{ $predictions->where('status','!=','sudah_panen')->count() }} aktif</span>
        </h2>
        <div class="grid-3">
            @foreach($predictions as $pred)
            @php
                $cardClass = '';
                if($pred->status === 'siap_panen') $cardClass = 'ready-card';
                elseif($pred->status === 'menunggu') $cardClass = 'alert-card';
            @endphp
            <div class="prediction-card {{ $cardClass }}">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                    <span class="badge {{ $pred->status === 'sudah_panen' ? 'badge-slate' : ($pred->status === 'siap_panen' ? 'badge-green' : 'badge-amber') }}">
                        {{ $pred->status === 'sudah_panen' ? '✅ Sudah Panen' : ($pred->status === 'siap_panen' ? '🌿 Siap Panen!' : '⏳ Menunggu') }}
                    </span>
                    <form action="{{ route('manajemen.prediksi.hapus', $pred) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus prediksi ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm" style="background:none;color:#94a3b8;padding:4px 8px;" title="Hapus">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        </button>
                    </form>
                </div>
                <div style="font-size:0.8rem;color:#64748b;display:flex;flex-direction:column;gap:8px;">
                    <div style="display:flex;justify-content:space-between;"><span>📅 Tanggal Tebar</span><span style="font-weight:600;color:#0f172a;">{{ $pred->tanggal_tebar->format('d M Y') }}</span></div>
                    <div style="display:flex;justify-content:space-between;"><span>🌱 Berat Bibit</span><span style="font-weight:600;color:#0f172a;">{{ number_format($pred->berat_bibit_gram, 1) }} g</span></div>
                    <div style="display:flex;justify-content:space-between;"><span>📊 Estimasi Hasil</span><span style="font-weight:600;color:#10b981;">{{ number_format($pred->estimasi_hasil_gram, 1) }} g</span></div>
                    <div style="display:flex;justify-content:space-between;"><span>🕐 Panen Antara</span><span style="font-weight:600;color:#0f172a;">{{ $pred->prediksi_panen_awal->format('d/m') }} — {{ $pred->prediksi_panen_akhir->format('d/m') }}</span></div>
                </div>
                @if($pred->status !== 'sudah_panen')
                <form action="{{ route('manajemen.prediksi.status', $pred) }}" method="POST" style="margin-top:16px;">
                    @csrf @method('PATCH')
                    <input type="hidden" name="status" value="sudah_panen">
                    <button type="submit" class="btn btn-sm btn-primary" style="width:100%;">✅ Tandai Sudah Panen</button>
                </form>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Harvest Chart --}}
    <div class="card animate-slide-up stagger-4" style="margin-bottom: 32px;">
        <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Tren Produksi Panen (30 Hari)
        </h2>
        <div class="chart-container">
            <canvas id="harvestChart"></canvas>
        </div>
    </div>

    {{-- Harvest Log Table --}}
    <div class="card animate-slide-up stagger-5">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0891b2" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                Log Pencatatan Panen
            </h2>
            <span class="badge badge-cyan">{{ $harvestLogs->count() }} entri</span>
        </div>
        @if($harvestLogs->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Berat (kg)</th>
                        <th>Keterangan</th>
                        <th style="text-align:right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($harvestLogs as $entry)
                    <tr>
                        <td style="font-weight:600;">{{ $entry->tanggal_panen->format('d M Y') }}</td>
                        <td><span class="badge badge-green">{{ number_format($entry->berat_kg, 2) }} kg</span></td>
                        <td style="color:#64748b;">{{ $entry->keterangan ?: '—' }}</td>
                        <td>
                            <div class="actions" style="justify-content:flex-end;">
                                <a href="{{ route('manajemen.panen.edit', $entry) }}" class="btn btn-sm btn-outline" title="Edit">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                </a>
                                <form action="{{ route('manajemen.panen.hapus', $entry) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data panen ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    </button>
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
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            <p>Belum ada data panen. Mulai catat hasil panen Anda!</p>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('harvestChart').getContext('2d');
    const chartData = @json($chartData);
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.map(d => {
                const date = new Date(d.tanggal_panen);
                return date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short' });
            }),
            datasets: [{
                label: 'Hasil Panen (kg)',
                data: chartData.map(d => parseFloat(d.total_kg)),
                borderColor: '#10b981',
                backgroundColor: 'rgba(16,185,129,0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#10b981',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(255,255,255,0.95)',
                    titleColor: '#0f172a',
                    bodyColor: '#64748b',
                    borderColor: '#e2e8f0',
                    borderWidth: 1,
                    padding: 12,
                    cornerRadius: 12,
                    callbacks: { label: ctx => ctx.parsed.y + ' kg' }
                }
            },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 11 } } },
                y: { grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 }, callback: v => v + ' kg' }, beginAtZero: true }
            }
        }
    });
});
</script>
@endpush
@endsection
