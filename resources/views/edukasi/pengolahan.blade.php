@extends('layouts.dashboard')
@section('title', 'Pengolahan Produk — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1200px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-cyan icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg></div>
            Pengolahan Produk
        </h1>
        <p class="page-subtitle">SOP mengolah Wolffia basah menjadi Dried Protein Flour untuk campuran pakan mandiri.</p>
    </div>

    <div class="card card-gradient animate-slide-up stagger-1" style="margin-bottom: 32px;">
        <h2 style="font-size: 1.2rem; font-weight: 700; color: #0f172a; margin-bottom: 8px;">Dari Wolffia Basah ke Dried Protein Flour</h2>
        <p style="font-size: 0.9rem; color: #64748b; line-height: 1.8;">Proses pengolahan melibatkan 5 tahap utama. Hasil akhirnya adalah <strong>Dried Protein Flour (DPF)</strong> dengan kadar protein 30-45% yang bisa dicampurkan langsung ke pakan ikan konvensional.</p>
    </div>

    <div class="grid-3" style="margin-bottom: 40px;">
        @php $steps = [
            ['s'=>'1','t'=>'Pencucian','time'=>'15-30 mnt','d'=>'Cuci Wolffia dengan air bersih. Gunakan saringan halus untuk menghilangkan kotoran dan alga.','c'=>'#10b981','bg'=>'#d1fae5'],
            ['s'=>'2','t'=>'Penirisan','time'=>'1-2 jam','d'=>'Tiriskan di atas kain bersih. Tekan perlahan untuk mengurangi kadar air berlebih.','c'=>'#0891b2','bg'=>'#cffafe'],
            ['s'=>'3','t'=>'Pengeringan','time'=>'6-12 jam','d'=>'Keringkan dengan oven suhu rendah (50-60°C) atau dijemur matahari hingga rapuh.','c'=>'#f59e0b','bg'=>'#fef3c7'],
            ['s'=>'4','t'=>'Penggilingan','time'=>'15-30 mnt','d'=>'Giling Wolffia kering menjadi tepung halus. Saring untuk tekstur seragam.','c'=>'#8b5cf6','bg'=>'#ede9fe'],
            ['s'=>'5','t'=>'Pengemasan','time'=>'10-15 mnt','d'=>'Kemas DPF dalam wadah kedap udara. Simpan di tempat kering dan sejuk.','c'=>'#e11d48','bg'=>'#fee2e2'],
            ['s'=>'✓','t'=>'Pencampuran Pakan','time'=>'Siap Pakai','d'=>'Campurkan DPF 20-30% dengan pakan konvensional. Aduk rata sebelum diberikan.','c'=>'#059669','bg'=>'#ecfdf5'],
        ]; @endphp
        @foreach($steps as $i => $step)
        <div class="card animate-slide-up stagger-{{ min($i+1,5) }}" style="position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;left:0;right:0;height:4px;background:{{$step['c']}};"></div>
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                <div style="width:40px;height:40px;border-radius:50%;background:{{$step['bg']}};display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.9rem;color:{{$step['c']}};">{{$step['s']}}</div>
                <div><h3 style="font-weight:700;color:#0f172a;font-size:1rem;">{{$step['t']}}</h3><span class="badge" style="background:{{$step['bg']}};color:{{$step['c']}};">⏱ {{$step['time']}}</span></div>
            </div>
            <p style="font-size:0.85rem;color:#64748b;line-height:1.7;">{{$step['d']}}</p>
        </div>
        @endforeach
    </div>

    <div class="card animate-slide-up stagger-4">
        <h2 style="font-size:1.2rem;font-weight:700;color:#0f172a;margin-bottom:20px;">⚠️ Catatan Penting</h2>
        <div class="grid-2">
            <div style="padding:20px;border-radius:12px;background:#fee2e2;border:1px solid #fecaca;">
                <h4 style="font-weight:700;color:#991b1b;margin-bottom:8px;font-size:0.9rem;">Suhu Pengeringan</h4>
                <p style="font-size:0.85rem;color:#7f1d1d;line-height:1.7;">Jangan melebihi 60°C. Suhu terlalu tinggi merusak protein dan menurunkan nilai nutrisi.</p>
            </div>
            <div style="padding:20px;border-radius:12px;background:#dbeafe;border:1px solid #bfdbfe;">
                <h4 style="font-weight:700;color:#1e40af;margin-bottom:8px;font-size:0.9rem;">Penyimpanan</h4>
                <p style="font-size:0.85rem;color:#1e3a5f;line-height:1.7;">DPF tahan 6 bulan dalam wadah kedap udara di tempat kering. Hindari sinar matahari langsung.</p>
            </div>
        </div>
    </div>
</div>
@endsection
