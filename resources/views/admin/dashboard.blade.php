@extends('layouts.dashboard')
@section('title', 'Admin Dashboard — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-emerald icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></div>
            Admin Dashboard
        </h1>
        <p class="page-subtitle">Monitoring & kontrol penuh semua data Wolfilium. Selamat datang, {{ auth()->user()->name }}!</p>
    </div>

    {{-- Stat Cards --}}
    <div class="grid-4" style="margin-bottom: 32px;">
        <div class="card animate-slide-up stagger-1" style="border-top: 4px solid #10b981; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #d1fae5, #a7f3d0); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: #0f172a;">{{ $stats['total_customers'] }}</p>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.03em;">Customer</p>
                </div>
            </div>
        </div>

        <div class="card animate-slide-up stagger-2" style="border-top: 4px solid #f59e0b; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #fef3c7, #fde68a); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7"/><path d="M11.7 10.4C12.6 7 16 5.2 17 3.5c1.3 2.5 2 5.8.5 9.5"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: #0f172a;">{{ $stats['pending_requests'] }}</p>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.03em;">Permintaan Pending</p>
                </div>
            </div>
        </div>

        <div class="card animate-slide-up stagger-3" style="border-top: 4px solid #06b6d4; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #cffafe, #a5f3fc); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0891b2" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: #0f172a;">{{ number_format($stats['total_harvest_kg'], 1) }}</p>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.03em;">Total Panen (kg)</p>
                </div>
            </div>
        </div>

        <div class="card animate-slide-up stagger-4" style="border-top: 4px solid #8b5cf6; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #ede9fe, #ddd6fe); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: #0f172a;">{{ $stats['total_farmers'] }}</p>
                    <p style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.03em;">Peternak</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Harvest Chart --}}
    <div class="card animate-slide-up stagger-5" style="margin-bottom: 32px;">
        <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Tren Produksi Panen (30 Hari)
        </h2>
        <div class="chart-container">
            <canvas id="harvestChart"></canvas>
        </div>
    </div>

    {{-- Seed Requests Management --}}
    <div class="card animate-slide-up" style="margin-bottom: 32px;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;">
            <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:10px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/></svg>
                Permintaan Bibit dari Customer
                <span class="badge badge-amber">{{ $stats['pending_requests'] }} pending</span>
            </h2>
        </div>

        @if($recentRequests->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Jenis Bibit</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th style="text-align:right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentRequests as $req)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <div style="width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,#34d399,#059669);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.7rem;">
                                    {{ strtoupper(substr($req->user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <p style="font-weight:600;font-size:0.85rem;">{{ $req->user->name }}</p>
                                    <p style="font-size:0.7rem;color:#94a3b8;">{{ $req->user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:600;">{{ $req->jenis_bibit }}</td>
                        <td><span class="badge badge-cyan">{{ number_format($req->jumlah_gram, 1) }} g</span></td>
                        <td style="color:#64748b;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $req->keterangan ?: '—' }}</td>
                        <td><span class="badge {{ $req->status_badge_class }}">{{ $req->status_label }}</span></td>
                        <td style="color:#94a3b8;font-size:0.8rem;">{{ $req->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="actions" style="justify-content:flex-end;">
                                <button onclick="openStatusModal({{ $req->id }}, '{{ $req->status }}', '{{ addslashes($req->catatan_admin ?? '') }}')" class="btn btn-sm btn-outline" title="Update Status">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/></svg>
            <p>Belum ada permintaan bibit dari customer.</p>
        </div>
        @endif
    </div>

    {{-- Recent Users --}}
    <div class="card animate-slide-up">
        <h2 style="font-size:1.15rem;font-weight:700;color:#0f172a;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Customer Terbaru
        </h2>
        @if($recentUsers->count() > 0)
        <div style="display:flex;flex-direction:column;gap:12px;">
            @foreach($recentUsers as $user)
            <div style="display:flex;align-items:center;gap:14px;padding:14px;border-radius:12px;background:#f8fafc;transition:all 0.2s;" onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='#f8fafc'">
                <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#34d399,#059669);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.8rem;">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
                <div style="flex:1;">
                    <p style="font-weight:600;font-size:0.9rem;color:#0f172a;">{{ $user->name }}</p>
                    <p style="font-size:0.75rem;color:#94a3b8;">{{ $user->email }} · Bergabung {{ $user->created_at->diffForHumans() }}</p>
                </div>
                <span class="badge badge-green">Customer</span>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state" style="padding: 30px;">
            <p>Belum ada customer terdaftar.</p>
        </div>
        @endif
    </div>
</div>

{{-- Status Update Modal --}}
<div id="statusModal" class="modal-backdrop" style="display:none;" onclick="if(event.target===this)this.style.display='none'">
    <div class="modal-content">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
            <h3 style="font-size:1.2rem;font-weight:700;color:#0f172a;">Update Status Permintaan</h3>
            <button onclick="document.getElementById('statusModal').style.display='none'" style="padding:8px;border-radius:8px;background:none;border:none;cursor:pointer;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="statusForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" id="modalStatus" class="form-input form-select" required>
                    <option value="pending">⏳ Menunggu</option>
                    <option value="diproses">🔄 Diproses</option>
                    <option value="tersedia">✅ Tersedia</option>
                    <option value="selesai">📦 Selesai</option>
                    <option value="ditolak">❌ Ditolak</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Catatan Admin</label>
                <input type="text" name="catatan_admin" id="modalCatatan" class="form-input" placeholder="Catatan untuk customer...">
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;">Simpan Perubahan</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
function openStatusModal(id, status, catatan) {
    document.getElementById('statusForm').action = '/admin/seed-request/' + id;
    document.getElementById('modalStatus').value = status;
    document.getElementById('modalCatatan').value = catatan;
    document.getElementById('statusModal').style.display = 'flex';
}

document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('harvestChart');
    if (ctx) {
        const chartData = @json($chartData);
        new Chart(ctx.getContext('2d'), {
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
    }
});
</script>
@endpush
@endsection
