@extends('layouts.dashboard')

@section('title', 'Panduan Budidaya Wolffia — Wolfilium')

@section('content')
<div style="padding: 24px; max-width: 1200px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-emerald icon-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            </div>
            Panduan Budidaya Wolffia
        </h1>
        <p class="page-subtitle">Cara menanam dan merawat Fresh Wolffia yang punya kecepatan tumbuh eksponensial (24-48 jam).</p>
    </div>

    {{-- Overview Card --}}
    <div class="card card-gradient animate-slide-up stagger-1" style="margin-bottom: 32px;">
        <div style="display: flex; align-items: flex-start; gap: 20px;">
            <div style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #10b981, #059669); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/><path d="M11.7 10.4C12.6 7 16 5.2 17 3.5c1.3 2.5 2 5.8.5 9.5-1.5 3.5-4.5 5.5-7 6.5"/></svg>
            </div>
            <div>
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 8px;">Apa itu Wolffia?</h2>
                <p style="font-size: 0.9rem; color: #64748b; line-height: 1.8;">
                    <strong>Wolffia</strong> (duckweed) adalah tumbuhan air terkecil di dunia yang kaya akan protein (30-45% berat kering).
                    Tumbuhan ini mampu berkembang biak secara <strong>eksponensial</strong> — populasinya bisa berlipat ganda hanya dalam
                    <strong>24-48 jam</strong> dalam kondisi optimal. Inilah yang menjadikannya sumber protein hijau paling efisien
                    untuk pakan akuakultur berkelanjutan.
                </p>
            </div>
        </div>
    </div>

    {{-- Key Facts --}}
    <div class="grid-4 animate-slide-up stagger-2" style="margin-bottom: 40px;">
        @foreach([
            ['value' => '24-48 jam', 'label' => 'Waktu Panen', 'color' => '#10b981', 'bg' => '#d1fae5'],
            ['value' => '30-45%', 'label' => 'Kadar Protein', 'color' => '#0891b2', 'bg' => '#cffafe'],
            ['value' => '20-30°C', 'label' => 'Suhu Optimal', 'color' => '#f59e0b', 'bg' => '#fef3c7'],
            ['value' => '6.5-7.5', 'label' => 'pH Air Ideal', 'color' => '#8b5cf6', 'bg' => '#ede9fe'],
        ] as $fact)
        <div class="stat-box" style="background: {{ $fact['bg'] }}; border-radius: 16px;">
            <p class="stat-value" style="color: {{ $fact['color'] }};">{{ $fact['value'] }}</p>
            <p class="stat-label" style="color: {{ $fact['color'] }};">{{ $fact['label'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- SOP Steps --}}
    <div class="card animate-slide-up stagger-3">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 24px; display: flex; align-items: center; gap: 12px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            Langkah-langkah Budidaya
        </h2>

        <div class="sop-step">
            <div class="step-number">1</div>
            <div class="step-content">
                <h4>Persiapan Wadah / Kontainer</h4>
                <p>Siapkan wadah datar berukuran minimal 30×50 cm dengan kedalaman air <strong>5-10 cm</strong>. Bisa menggunakan bak plastik, nampan, atau kontainer modular. Pastikan wadah bersih dari kontaminan dan mendapat <strong>cahaya matahari tidak langsung</strong> (teduh parsial).</p>
            </div>
        </div>

        <div class="sop-step">
            <div class="step-number">2</div>
            <div class="step-content">
                <h4>Persiapan Air & Nutrisi</h4>
                <p>Gunakan air bersih dengan pH <strong>6.5-7.5</strong>. Tambahkan pupuk organik cair sebagai nutrisi dasar (50 ml per 10 liter air). Suhu air ideal adalah <strong>20-30°C</strong>. Hindari air yang mengandung klorin tinggi — diamkan air keran selama 24 jam sebelum digunakan.</p>
            </div>
        </div>

        <div class="sop-step">
            <div class="step-number">3</div>
            <div class="step-content">
                <h4>Penebaran Bibit Wolffia</h4>
                <p>Tebar bibit Wolffia secara merata di permukaan air. Gunakan rasio <strong>1:4</strong> (bibit menutupi 25% permukaan air). Jangan terlalu padat agar sirkulasi udara dan cahaya tetap optimal. Catat <strong>tanggal tebar</strong> dan <strong>berat bibit</strong> di sistem manajemen.</p>
            </div>
        </div>

        <div class="sop-step">
            <div class="step-number">4</div>
            <div class="step-content">
                <h4>Perawatan Harian</h4>
                <p>Periksa kondisi air secara rutin: pH, suhu, dan kejernihan. Pastikan tidak ada alga atau hama yang mengganggu. Aduk perlahan permukaan air <strong>1-2 kali sehari</strong> untuk sirkulasi nutrisi. Tambahkan nutrisi setiap <strong>3-4 hari</strong> sekali.</p>
            </div>
        </div>

        <div class="sop-step">
            <div class="step-number">5</div>
            <div class="step-content">
                <h4>Pemanenan</h4>
                <p>Wolffia siap dipanen setelah <strong>24-48 jam</strong> sejak penebaran (saat menutupi 80-100% permukaan). Gunakan jaring halus atau saringan untuk memanen. Sisakan <strong>25% populasi</strong> di wadah sebagai bibit untuk siklus berikutnya. Segera proses hasil panen.</p>
            </div>
        </div>

        <div class="sop-step">
            <div class="step-number">6</div>
            <div class="step-content">
                <h4>Pencatatan & Monitoring</h4>
                <p>Catat <strong>berat panen</strong> setiap siklus di sistem. Gunakan fitur <a href="{{ route('manajemen.index') }}" style="color: #10b981; font-weight: 600; text-decoration: underline;">Kalkulator Prediksi Panen</a> untuk memprediksi waktu panen berikutnya. Monitor tren produksi lewat grafik untuk optimasi berkelanjutan.</p>
            </div>
        </div>
    </div>

    {{-- Tips Section --}}
    <div class="card animate-slide-up stagger-4" style="margin-top: 32px;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 20px; display: flex; align-items: center; gap: 12px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7V17h8v-2.3A7 7 0 0 0 12 2z"/></svg>
            Tips & Trik
        </h2>
        <div class="grid-2">
            @foreach([
                ['title' => 'Cahaya Optimal', 'desc' => 'Wolffia tumbuh paling baik di bawah cahaya tidak langsung. Hindari sinar matahari langsung yang bisa meningkatkan suhu air berlebihan.'],
                ['title' => 'Sirkulasi Air', 'desc' => 'Aduk permukaan air 1-2x sehari untuk memastikan distribusi nutrisi merata dan mencegah stagnasi.'],
                ['title' => 'Pencegahan Alga', 'desc' => 'Jaga kepadatan Wolffia yang cukup — permukaan yang tertutup Wolffia secara alami mencegah pertumbuhan alga.'],
                ['title' => 'Siklus Berkesinambungan', 'desc' => 'Selalu sisakan 25% populasi saat panen untuk memastikan produksi berkelanjutan tanpa perlu membeli bibit baru.'],
            ] as $tip)
            <div style="padding: 20px; border-radius: 12px; background: #fffbeb; border: 1px solid #fef3c7;">
                <h4 style="font-weight: 700; color: #92400e; margin-bottom: 8px; font-size: 0.9rem;">💡 {{ $tip['title'] }}</h4>
                <p style="font-size: 0.85rem; color: #78716c; line-height: 1.7;">{{ $tip['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
