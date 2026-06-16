@extends('layouts.app')

@section('title', 'Wolfilium — Digitalisasi Protein Hijau untuk Akuakultur Berkelanjutan')

@section('body')
<div class="landing-aurora" style="min-height: 100vh;">
    {{-- ── Hero Section (Cinematic Track) ── --}}
    <section class="landing-aurora__hero" style="position: relative; overflow: hidden; padding-bottom: var(--spacing-huge);">
        
        {{-- Navbar --}}
        <nav class="lp-nav" style="background: transparent;">
            <a href="{{ url('/') }}" class="lp-brand">
                <span class="lp-brand__mark" aria-hidden="true">
                    <img src="{{ asset('Wolfilium_Logo.png') }}" alt="Wolfilium Logo" style="width: 28px; height: 28px; object-fit: contain;">
                </span>
                <span class="lp-brand__name">Wolfilium</span>
            </a>

            <div class="lp-nav__links" aria-hidden="true" style="display: none;">
            </div>

            <div class="lp-nav__actions">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="lp-btn lp-btn--ghost">Dashboard</a>
                        <a href="{{ route('manajemen.index') }}" class="lp-btn lp-btn--join">Join Now</a>
                    @else
                        <a href="{{ route('customer.dashboard') }}" class="lp-btn lp-btn--ghost">Dashboard</a>
                        <a href="{{ route('customer.manajemen') }}" class="lp-btn lp-btn--join">Join Now</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="lp-btn lp-btn--ghost">Log In</a>
                    <a href="{{ route('register') }}" class="lp-btn lp-btn--join">Join Now</a>
                @endauth
            </div>
        </nav>

        {{-- Hero Content --}}
        <div class="lp-hero" style="max-width: 1400px; margin: 0 auto; padding: 128px 24px 64px;">
            <div class="lp-hero__copy" style="max-width: 800px;">
                <div class="pill-tag-mint" style="margin-bottom: var(--spacing-xxl);">
                    Teknologi Akuakultur Berkelanjutan
                </div>
                <h1 class="display-xxl" style="margin-bottom: var(--spacing-xl);">
                    Digitalisasi Protein Hijau
                </h1>
                <p class="body-lg" style="color: var(--shade-40); max-width: 600px; margin-bottom: var(--spacing-xxl);">
                    Wolfilium mengubah budidaya Wolffia menjadi proses berbasis data — menghadirkan pakan tinggi protein yang ramah lingkungan untuk pembudidaya ikan di seluruh Indonesia.
                </p>
                <div style="display: flex; gap: 16px; flex-wrap: wrap;">
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
                    @auth
                    <a href="{{ route('customer.katalog') }}" class="button-outline-on-dark" style="display: inline-flex; align-items: center; gap: 10px; border-color: rgba(96, 165, 250, 0.4); box-shadow: 0 0 28px rgba(96, 165, 250, 0.25);">
                    @else
                    <a href="{{ route('login') }}" class="button-outline-on-dark" style="display: inline-flex; align-items: center; gap: 10px; border-color: rgba(96, 165, 250, 0.4); box-shadow: 0 0 28px rgba(96, 165, 250, 0.25);">
                    @endauth
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6"/>
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M2 12C2 6.5 6.5 2 12 2a10 10 0 0 1 8 4"/>
                            <path d="M22 12c0 5.5-4.5 10-10 10a10 10 0 0 1-8-4"/>
                            <circle cx="12" cy="12" r="2"/>
                        </svg>
                        <span>Beli Ikan Segar</span>
                    </a>
                </div>
            </div>

            <div class="lp-orbit" aria-hidden="true">
                <div class="lp-orbit__ring lp-orbit__ring--1"></div>
                <div class="lp-orbit__ring lp-orbit__ring--2"></div>
                <div class="lp-orbit__ring lp-orbit__ring--3"></div>
                <div class="lp-orbit__ring lp-orbit__ring--4"></div>

                <div class="lp-orbit__center">
                    <div class="lp-orbit__stat">20k+</div>
                    <div class="lp-orbit__label">Mitra Pembudidaya</div>
                </div>

                <div class="lp-orbit__avatar lp-orbit__avatar--1">A</div>
                <div class="lp-orbit__avatar lp-orbit__avatar--2">D</div>
                <div class="lp-orbit__avatar lp-orbit__avatar--3">R</div>

                <div class="lp-orbit__node lp-orbit__node--1">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v6"/><path d="M12 16v6"/><path d="M4.93 4.93l4.24 4.24"/><path d="M14.83 14.83l4.24 4.24"/><path d="M2 12h6"/><path d="M16 12h6"/><path d="M4.93 19.07l4.24-4.24"/><path d="M14.83 9.17l4.24-4.24"/></svg>
                </div>
                <div class="lp-orbit__node lp-orbit__node--2">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21V7"/><path d="M12 21V3"/><path d="M4 21v-9"/></svg>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Features Section (Light/Transactional Track) ── --}}
    <section id="kenapa" class="canvas-cream" style="padding: 128px 0; border-top-left-radius: 40px; border-top-right-radius: 40px;">
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
    <section id="panduan" class="canvas-cream" style="padding: 0 0 128px;">
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
                    <div class="lp-edu-media">
                        <img
                            class="lp-edu-media__img"
                            src="{{ asset('images/landing/panduan-sop.png') }}"
                            alt="Ilustrasi panduan budidaya dan SOP"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Footer (Dark Track) ── --}}
    <footer id="kontak" class="footer-dark">
        <div style="max-width: 1400px; margin: 0 auto; text-align: center;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 12px; margin-bottom: 24px;">
                <div style="width: 36px; height: 36px; border-radius: var(--rounded-md); overflow: hidden; flex-shrink: 0;">
                    <img src="{{ asset('Wolfilium_Logo.png') }}" alt="Wolfilium Logo" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <span class="heading-lg" style="font-weight: 800; color: white;">Wolfilium</span>
            </div>
            <p class="caption" style="color: var(--shade-50); margin-bottom: 32px;">Digitalisasi protein hijau untuk akuakultur berkelanjutan di Indonesia.</p>
            <p class="micro" style="color: var(--shade-60);">© 2026 Wolfilium. Hak cipta dilindungi.</p>
        </div>
    </footer>
</div>

<style>
.landing-aurora {
    --bg-dark: #070510;
    --text-primary: #ffffff;
    --text-muted: rgba(255, 255, 255, 0.68);
    --gradient-color-1: #87d99e;
    --gradient-color-2: #43a28a;
    --gradient-color-3: #053813;
    --accent-glow: rgba(98, 241, 139, 0.4);
    --btn-cta: #110E24;

    color: var(--text-primary);
    background-color: var(--bg-dark);
    background-image:
        radial-gradient(at 0% 20%, var(--gradient-color-2) 0px, transparent 40%),
        radial-gradient(at 40% 30%, var(--gradient-color-1) 0px, transparent 60%),
        radial-gradient(at 100% 100%, var(--gradient-color-3) 0px, transparent 70%);
    background-attachment: fixed;
}

.landing-aurora__hero {
    background: transparent;
}

.lp-nav {
    max-width: 1400px;
    margin: 0 auto;
    padding: 18px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 24px;
}

.lp-brand {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: var(--text-primary);
}

.lp-brand__mark {
    width: 40px;
    height: 40px;
    border-radius: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 0 24px rgba(135, 217, 158, 0.22);
}

.lp-brand__mark svg { color: white; }

.lp-brand__name {
    font-family: var(--font-ui);
    font-weight: 800;
    letter-spacing: 0.2px;
}

.lp-nav__links {
    display: flex;
    justify-content: center;
    gap: 26px;
}

.lp-nav__link {
    color: var(--text-muted);
    text-decoration: none;
    font-family: var(--font-ui);
    font-size: 14px;
    font-weight: 500;
}

.lp-nav__link:hover { color: var(--text-primary); }

.lp-nav__actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    align-items: center;
}

.lp-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-family: var(--font-ui);
    font-size: 14px;
    font-weight: 600;
    padding: 10px 16px;
    border-radius: var(--rounded-pill);
}

.lp-btn--ghost {
    color: var(--text-muted);
}

.lp-btn--ghost:hover { color: var(--text-primary); }

.lp-btn--join {
    color: var(--text-primary);
    background: rgba(17, 14, 36, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.22);
    box-shadow: 0 0 0 1px rgba(135, 217, 158, 0.12), 0 0 28px var(--accent-glow);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.lp-btn--join:hover {
    box-shadow: 0 0 0 1px rgba(135, 217, 158, 0.18), 0 0 42px var(--accent-glow);
}

.lp-hero {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 64px;
    align-items: start;
}

.lp-hero__copy { padding-right: 12px; }

.lp-orbit {
    position: relative;
    width: min(520px, 100%);
    height: min(520px, 72vw);
    margin-left: auto;
    margin-top: 12px;
}

.lp-orbit__ring {
    position: absolute;
    inset: 0;
    border-radius: 9999px;
    border: 1px solid rgba(255, 255, 255, 0.14);
}

.lp-orbit__ring--1 { inset: 0; opacity: 0.5; }
.lp-orbit__ring--2 { inset: 44px; opacity: 0.35; }
.lp-orbit__ring--3 { inset: 92px; opacity: 0.25; }
.lp-orbit__ring--4 { inset: 140px; opacity: 0.18; }

.lp-orbit__center {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.lp-orbit__stat {
    font-family: var(--font-ui);
    font-weight: 800;
    font-size: 64px;
    letter-spacing: -0.02em;
}

.lp-orbit__label {
    font-family: var(--font-ui);
    font-size: 14px;
    font-weight: 500;
    color: var(--text-muted);
}

.lp-orbit__avatar {
    position: absolute;
    width: 46px;
    height: 46px;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-ui);
    font-weight: 800;
    color: rgba(255, 255, 255, 0.9);
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
}

.lp-orbit__avatar--1 { top: 34px; left: 90px; }
.lp-orbit__avatar--2 { top: 150px; right: 24px; }
.lp-orbit__avatar--3 { bottom: 62px; left: 26px; }

.lp-orbit__node {
    position: absolute;
    width: 44px;
    height: 44px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.92);
    background: rgba(17, 14, 36, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.22);
    box-shadow: 0 0 32px var(--accent-glow);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.lp-orbit__node--1 { top: 70px; right: 98px; }
.lp-orbit__node--2 { bottom: 104px; right: 44px; }

.lp-edu-media {
    background: var(--canvas-light);
    border-radius: var(--rounded-lg);
    border: 1px solid var(--hairline-light);
    box-shadow: 0 8px 8px rgba(0,0,0,0.02), 0 4px 4px rgba(0,0,0,0.02);
    overflow: hidden;
    aspect-ratio: 16 / 10;
}

.lp-edu-media__img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.footer-dark {
    background: transparent;
}

.lp-client-logos {
    margin: 0 auto 28px;
    max-width: 980px;
    display: flex;
    flex-wrap: wrap;
    gap: 18px 28px;
    justify-content: center;
    opacity: 0.55;
    font-family: var(--font-ui);
    letter-spacing: 0.12em;
    text-transform: uppercase;
    font-size: 12px;
}

@media (max-width: 900px) {
    .lp-nav {
        grid-template-columns: 1fr auto;
        grid-template-areas:
            "brand actions"
            "links links";
    }

    .lp-brand { grid-area: brand; }
    .lp-nav__actions { grid-area: actions; }
    .lp-nav__links { grid-area: links; justify-content: flex-start; overflow-x: auto; padding-bottom: 6px; }

    .lp-hero {
        grid-template-columns: 1fr;
        gap: 36px;
        padding-top: 20px;
    }

    .lp-orbit {
        width: min(520px, 100%);
        height: min(520px, 92vw);
        margin: 0;
    }
}

@media (max-width: 768px) {
    .display-xxl { font-size: 56px; line-height: 1.1; }
    .display-xl { font-size: 48px; }
    .display-md { font-size: 36px; }
    section { padding: 64px 0 !important; }
}
</style>
@endsection
