@extends('layouts.dashboard')
@section('title', 'Pemecahan Masalah — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1200px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-amber icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
            Pemecahan Masalah
        </h1>
        <p class="page-subtitle">Edukasi soal limbah pakan konvensional dan bagaimana ekonomi sirkular menekan biaya.</p>
    </div>

    {{-- Problem Statement --}}
    <div class="card animate-slide-up stagger-1" style="margin-bottom: 32px; border-left: 4px solid #f43f5e;">
        <h2 style="font-size:1.2rem;font-weight:700;color:#0f172a;margin-bottom:12px;">🔴 Masalah Utama: Limbah Pakan Konvensional</h2>
        <p style="font-size:0.9rem;color:#64748b;line-height:1.8;margin-bottom:16px;">Pakan ikan konvensional yang berbasis tepung ikan impor memiliki beberapa masalah kritis:</p>
        <div class="grid-3">
            @foreach([
                ['icon'=>'⚡','title'=>'Amonia Tinggi','desc'=>'Limbah pakan konvensional meningkatkan kadar amonia di kolam, menyebabkan stress dan kematian ikan.','bg'=>'#fee2e2','color'=>'#991b1b'],
                ['icon'=>'💰','title'=>'Biaya Mahal','desc'=>'Harga pakan impor terus naik dan membebani peternak kecil hingga 60-70% dari biaya operasional.','bg'=>'#fef3c7','color'=>'#92400e'],
                ['icon'=>'🌍','title'=>'Tidak Berkelanjutan','desc'=>'Overfishing untuk tepung ikan merusak ekosistem laut dan rantai makanan alami.','bg'=>'#dbeafe','color'=>'#1e40af'],
            ] as $problem)
            <div style="padding:20px;border-radius:12px;background:{{$problem['bg']}};">
                <span style="font-size:1.5rem;">{{$problem['icon']}}</span>
                <h4 style="font-weight:700;color:{{$problem['color']}};margin:8px 0;font-size:0.95rem;">{{$problem['title']}}</h4>
                <p style="font-size:0.85rem;color:{{$problem['color']}};line-height:1.7;opacity:0.8;">{{$problem['desc']}}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Solution: Circular Economy --}}
    <div class="card animate-slide-up stagger-2" style="margin-bottom: 32px; border-left: 4px solid #10b981;">
        <h2 style="font-size:1.2rem;font-weight:700;color:#0f172a;margin-bottom:12px;">🟢 Solusi: Model Ekonomi Sirkular Wolfilium</h2>
        <p style="font-size:0.9rem;color:#64748b;line-height:1.8;margin-bottom:20px;">Wolfilium menerapkan model ekonomi sirkular dimana limbah menjadi sumber daya:</p>
        <div style="display:flex;flex-direction:column;gap:16px;">
            @foreach([
                ['num'=>'1','title'=>'Wolffia Menyerap Limbah','desc'=>'Wolffia tumbuh di air limbah kolam dan menyerap amonia, nitrat, dan fosfat — membersihkan air sekaligus tumbuh.'],
                ['num'=>'2','title'=>'Biomassa Jadi Pakan','desc'=>'Wolffia yang dipanen diolah menjadi Dried Protein Flour — pakan berprotein tinggi dari sumber lokal.'],
                ['num'=>'3','title'=>'Air Bersih Kembali','desc'=>'Air yang sudah disaring Wolffia kembali bersih dan bisa digunakan ulang untuk kolam ikan.'],
                ['num'=>'4','title'=>'Biaya Turun Drastis','desc'=>'Dengan memproduksi pakan sendiri, peternak bisa menekan biaya operasional hingga 40-60%.'],
            ] as $sol)
            <div class="sop-step" style="padding:20px;border:1px solid #d1fae5;border-radius:12px;background:#f0fdfa;margin:0;">
                <div class="step-number">{{$sol['num']}}</div>
                <div class="step-content">
                    <h4>{{$sol['title']}}</h4>
                    <p>{{$sol['desc']}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Comparison Table --}}
    <div class="card animate-slide-up stagger-3" style="margin-bottom: 32px;">
        <h2 style="font-size:1.2rem;font-weight:700;color:#0f172a;margin-bottom:20px;">📊 Perbandingan: Pakan Konvensional vs Wolfilium</h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Aspek</th>
                        <th>Pakan Konvensional</th>
                        <th>Wolfilium (DPF)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td style="font-weight:600;">Sumber Protein</td><td><span class="badge badge-red">Tepung ikan impor</span></td><td><span class="badge badge-green">Wolffia lokal</span></td></tr>
                    <tr><td style="font-weight:600;">Kadar Protein</td><td>28-32%</td><td>30-45%</td></tr>
                    <tr><td style="font-weight:600;">Biaya/kg</td><td>Rp 12.000-15.000</td><td>Rp 5.000-8.000</td></tr>
                    <tr><td style="font-weight:600;">Limbah Amonia</td><td><span class="badge badge-red">Tinggi</span></td><td><span class="badge badge-green">Rendah</span></td></tr>
                    <tr><td style="font-weight:600;">Waktu Produksi</td><td>Bergantung impor</td><td>24-48 jam (mandiri)</td></tr>
                    <tr><td style="font-weight:600;">Keberlanjutan</td><td><span class="badge badge-red">Tidak</span></td><td><span class="badge badge-green">Sirkular</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- FAQ --}}
    <div class="card animate-slide-up stagger-4">
        <h2 style="font-size:1.2rem;font-weight:700;color:#0f172a;margin-bottom:20px;">❓ FAQ Troubleshooting</h2>
        @foreach([
            ['q'=>'Wolffia tidak tumbuh setelah 48 jam?','a'=>'Periksa pH air (harus 6.5-7.5) dan suhu (20-30°C). Pastikan ada nutrisi cukup dan cahaya tidak langsung. Hindari air berklorin.'],
            ['q'=>'Air kolam berbau amonia setelah pakai pakan konvensional?','a'=>'Ini masalah umum. Kurangi porsi pakan, tingkatkan sirkulasi air, dan pertimbangkan transisi ke DPF Wolfilium yang menghasilkan lebih sedikit limbah.'],
            ['q'=>'DPF menggumpal saat disimpan?','a'=>'Kadar air terlalu tinggi. Pastikan proses pengeringan tuntas (kadar air < 10%) dan gunakan wadah kedap udara dengan silica gel.'],
            ['q'=>'Ikan menolak pakan DPF?','a'=>'Transisi bertahap: mulai campuran 10% DPF, naikkan 5% setiap 3 hari hingga mencapai rasio 20-30%. Ikan butuh adaptasi.'],
        ] as $faq)
        <div class="accordion-item">
            <button class="accordion-btn" onclick="this.parentElement.classList.toggle('open');this.querySelector('svg').style.transform=this.parentElement.classList.contains('open')?'rotate(180deg)':''">
                {{$faq['q']}}
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" style="transition:transform 0.3s;flex-shrink:0;"><path d="M6 9l6 6 6-6"/></svg>
            </button>
            <div class="accordion-content" style="display:none;">{{$faq['a']}}</div>
        </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.accordion-item').forEach(item => {
    item.querySelector('.accordion-btn').addEventListener('click', () => {
        const content = item.querySelector('.accordion-content');
        content.style.display = item.classList.contains('open') ? 'block' : 'none';
    });
});
</script>
@endpush
@endsection
