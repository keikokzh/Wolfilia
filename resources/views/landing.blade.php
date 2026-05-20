@extends('layouts.app')

@section('title', 'Wolfilium — Digitalisasi Protein Hijau untuk Akuakultur Berkelanjutan')

@section('body')
<div class="canvas-night" style="min-height: 100vh;">
    {{-- ── Hero Section (Cinematic Track) ── --}}
    <section class="canvas-night" style="position: relative; overflow: hidden; padding-bottom: var(--spacing-huge);">
        
        {{-- Navbar --}}
        <nav class="nav-bar-dark" style="background: transparent;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; border-radius: var(--rounded-lg); display: flex; align-items: center; justify-content: center; background: var(--primary);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/><path d="M11.7 10.4C12.6 7 16 5.2 17 3.5c1.3 2.5 2 5.8.5 9.5-1.5 3.5-4.5 5.5-7 6.5"/></svg>
                </div>
                <span class="heading-lg" style="font-weight: 800; color: white;">Wolfilium</span>
            </div>
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="button-outline-on-dark">
                        Masuk Dashboard Admin →
                    </a>
                @else
                    <a href="{{ route('customer.dashboard') }}" class="button-outline-on-dark">
                        Masuk Dashboard Saya →
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="button-outline-on-dark">
                    Masuk Dashboard →
                </a>
            @endauth
        </nav>

        {{-- Hero Content --}}
        <div style="max-width: 1400px; margin: 0 auto; padding: 128px 24px 64px;">
            <div style="max-width: 800px; margin-bottom: var(--spacing-huge);">
                <div class="pill-tag-mint" style="margin-bottom: var(--spacing-xxl);">
                    Teknologi Akuakultur Berkelanjutan
                </div>
                <h1 class="display-xxl" style="margin-bottom: var(--spacing-xl);">
                    Digitalisasi Protein Hijau
                </h1>
                <p class="body-lg" style="color: var(--shade-40); max-width: 600px; margin-bottom: var(--spacing-xxl);">
                    Wolfilium mengubah budidaya Wolffia menjadi proses berbasis data — menghadirkan pakan tinggi protein yang ramah lingkungan untuk pembudidaya ikan di seluruh Indonesia.
                </p>
                <div style="display: flex; gap: 16px;">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('manajemen.index') }}" class="button-primary-pill">
                                Catat Panen
                            </a>
                        @else
                            <a href="{{ route('customer.manajemen') }}" class="button-primary-pill">
                                Catat Panen
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="button-primary-pill">
                            Catat Panen
                        </a>
                    @endauth
                    <a href="https://wa.me/6282218410603?text=Halo%20Wolfilium,%20saya%20tertarik%20untuk%20bekerja%20sama." class="button-outline-on-dark" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 10px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span>Jadi Mitra Pembudidaya</span>
                    </a>
                </div>
            </div>

            {{-- Full Bleed Photography Element --}}
            <div class="card-photo-frame animate-slide-up stagger-2" style="position: relative; width: 100%; height: 500px;">
                <img src="https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?q=80&w=2574&auto=format&fit=crop" alt="Budidaya Wolffia" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.6; mix-blend-mode: luminosity;">
                <div style="position: absolute; inset: 0; background: linear-gradient(to top, var(--canvas-night), transparent);"></div>
                
                <div style="position: absolute; bottom: var(--spacing-xxl); left: var(--spacing-xxl);">
                    <p class="display-md" style="color: var(--on-primary);">42.5 kg</p>
                    <p class="eyebrow-cap" style="color: var(--shade-40);">Total Biomassa Aktif</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Features Section (Light/Transactional Track) ── --}}
    <section class="canvas-cream" style="padding: 128px 0; border-top-left-radius: 40px; border-top-right-radius: 40px;">
        <div style="max-width: 1400px; margin: 0 auto; padding: 0 24px;">
            <div style="text-align: center; margin-bottom: 80px; max-width: 640px; margin-left: auto; margin-right: auto;">
                <h2 class="display-xl" style="color: var(--ink); margin-bottom: 24px;">Kenapa Wolfilium?</h2>
                <p class="body-lg" style="color: var(--shade-60);">Infrastruktur digital menyeluruh untuk budidaya duckweed yang berkelanjutan.</p>
            </div>
            
            <div class="grid-3">
                @foreach([
                    ['icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>', 'title' => 'Optimasi Pertumbuhan', 'desc' => 'Kalkulator prediksi panen otomatis berdasarkan kecepatan tumbuh eksponensial Wolffia.'],
                    ['icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>', 'title' => 'Analitik Data', 'desc' => 'Dashboard visual untuk memantau kurva pertumbuhan dan tren produksi panen.'],
                    ['icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>', 'title' => 'Jaringan Distribusi', 'desc' => 'Katalog peternak dan portal gotong royong digital untuk distribusi Wolffia.'],
                ] as $i => $feature)
                <div style="background: var(--canvas-light); border-radius: var(--rounded-lg); padding: var(--spacing-xxl); border: 1px solid var(--hairline-light); transition: transform 0.3s;" class="animate-slide-up stagger-{{ $i + 1 }}">
                    <div style="width: 56px; height: 56px; border-radius: var(--rounded-md); background: var(--aloe-10); color: var(--ink); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                        {!! $feature['icon'] !!}
                    </div>
                    <h3 class="heading-xl" style="color: var(--ink); margin-bottom: 16px;">{{ $feature['title'] }}</h3>
                    <p class="body-md" style="color: var(--shade-60);">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── Edukasi Section (Light Track) ── --}}
    <section class="canvas-cream" style="padding: 0 0 128px;">
        <div style="max-width: 1400px; margin: 0 auto; padding: 0 24px;">
            <div style="background: var(--pistachio-10); border-radius: var(--rounded-lg); padding: 64px; display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center;">
                <div class="animate-slide-up stagger-1">
                    <h2 class="display-md" style="color: var(--ink); margin-bottom: 24px;">Panduan Budidaya & SOP Lengkap</h2>
                    <p class="body-lg" style="color: var(--shade-60); margin-bottom: 32px;">
                        Baru mulai membudidayakan Wolffia? Jangan khawatir. Wolfilium menyediakan panduan komprehensif mulai dari persiapan media, penumbuhan bibit, pemeliharaan harian, hingga prosedur panen yang efektif.
                    </p>
                    <div style="display: flex; gap: 16px;">
                        @auth
                            <a href="{{ route('edukasi.panduan') }}" class="button-primary-pill" style="background: var(--ink); color: white;">
                                Pelajari Panduan
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="button-outline-on-light">
                                Masuk untuk Panduan
                            </a>
                        @endauth
                    </div>
                </div>
                <div class="animate-slide-up stagger-2">
                    <div style="background: var(--canvas-light); border-radius: var(--rounded-lg); padding: 32px; border: 1px solid var(--hairline-light); box-shadow: 0 8px 8px rgba(0,0,0,0.02), 0 4px 4px rgba(0,0,0,0.02);">
                        <div style="width: 60%; height: 24px; background: var(--shade-30); border-radius: var(--rounded-xs); margin-bottom: 24px;"></div>
                        <div style="width: 100%; height: 12px; background: var(--aloe-10); border-radius: var(--rounded-xs); margin-bottom: 12px;"></div>
                        <div style="width: 90%; height: 12px; background: var(--aloe-10); border-radius: var(--rounded-xs); margin-bottom: 12px;"></div>
                        <div style="width: 80%; height: 12px; background: var(--aloe-10); border-radius: var(--rounded-xs); margin-bottom: 32px;"></div>
                        <div style="width: 40px; height: 40px; border-radius: var(--rounded-pill); background: var(--ink);"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Footer (Dark Track) ── --}}
    <footer class="footer-dark">
        <div style="max-width: 1400px; margin: 0 auto; text-align: center;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 12px; margin-bottom: 24px;">
                <div style="width: 32px; height: 32px; border-radius: var(--rounded-md); background: var(--primary); display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/></svg>
                </div>
                <span class="heading-lg" style="font-weight: 800; color: white;">Wolfilium</span>
            </div>
            <p class="caption" style="color: var(--shade-50); margin-bottom: 32px;">Digitalisasi protein hijau untuk akuakultur berkelanjutan di Indonesia.</p>
            <p class="micro" style="color: var(--shade-60);">© 2026 Wolfilium. Hak cipta dilindungi.</p>
        </div>
    </footer>
</div>

<style>
@media (max-width: 768px) {
    .display-xxl { font-size: 56px; line-height: 1.1; }
    .display-xl { font-size: 48px; }
    .display-md { font-size: 36px; }
    .card-photo-frame { height: 300px !important; }
    section { padding: 64px 0 !important; }
}
</style>
@endsection
