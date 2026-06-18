@extends('layouts.dashboard')
@section('title', 'Dashboard Customer — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
@push('styles')
<style>
    @media (max-width: 768px) {
        .cust-dash-wrap { padding: 16px !important; }
        .cust-dash-wrap .stat-icon-box { width: 40px !important; height: 40px !important; border-radius: 10px !important; }
        .cust-dash-wrap .stat-icon-box svg { width: 20px !important; height: 20px !important; }
        .cust-dash-wrap .stat-number { font-size: 1.35rem !important; }
        .cust-dash-wrap .stat-number span { font-size: 0.8rem !important; }
        .cust-dash-wrap .stat-label-text { font-size: 0.65rem !important; }
    }
</style>
@endpush
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-emerald icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/><path d="M11.7 10.4C12.6 7 16 5.2 17 3.5c1.3 2.5 2 5.8.5 9.5-1.5 3.5-4.5 5.5-7 6.5"/></svg></div>
            Selamat Datang, {{ auth()->user()->name }}!
        </h1>
        <p class="page-subtitle">Pantau aktivitas budidaya Wolffia Anda di Wolfilium.</p>
    </div>

    {{-- Stats --}}
    <div class="grid-2" style="margin-bottom: 32px;">
        <div class="card animate-slide-up stagger-1" style="border-top: 4px solid #10b981; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #d1fae5, #a7f3d0); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--ink);">{{ number_format($stats['total_panen_kg'], 1) }} <span style="font-size:1rem;color:var(--shade-60);font-weight:600;">kg</span></p>
                    <p style="font-size: 0.7rem; font-weight: 600; color: var(--shade-60); text-transform: uppercase; letter-spacing: 0.03em;">Total Panen</p>
                </div>
            </div>
        </div>

        <div class="card animate-slide-up stagger-2" style="border-top: 4px solid #f59e0b; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #fef3c7, #fde68a); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--ink);">{{ number_format($stats['total_bibit_gram'], 1) }} <span style="font-size:1rem;color:var(--shade-60);font-weight:600;">g</span></p>
                    <p style="font-size: 0.7rem; font-weight: 600; color: var(--shade-60); text-transform: uppercase; letter-spacing: 0.03em;">Bibit Ditanam</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Harvest Chart --}}
    <div class="card animate-slide-up stagger-4" style="margin-bottom: 32px;">
        <h2 style="font-size:1.15rem;font-weight:700;color:var(--ink);margin-bottom:20px;display:flex;align-items:center;gap:10px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Tren Produksi Panen Saya (30 Hari)
        </h2>
        @if($chartData->count() > 0)
        <div class="chart-container">
            <canvas id="harvestChart"></canvas>
        </div>
        @else
        <div class="empty-state" style="padding:40px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:48px;height:48px;"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            <p>Belum ada data panen Anda dalam 30 hari terakhir.</p>
        </div>
        @endif
    </div>
</div>

@push('scripts')
@if($chartData->count() > 0)
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
@endif
@endpush
@endsection
