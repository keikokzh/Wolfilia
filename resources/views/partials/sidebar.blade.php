{{-- Sidebar Overlay (Mobile) --}}
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

{{-- Sidebar --}}
<aside class="sidebar" id="sidebar">
    {{-- Logo --}}
    <div style="padding: 24px; border-bottom: 1px solid var(--hairline-dark);">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; border-radius: var(--rounded-lg); overflow: hidden; flex-shrink: 0;">
                    <img src="{{ asset('Wolfilium_Logo.png') }}" alt="Wolfilium Logo" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <div>
                    <h1 style="font-size: 1.1rem; font-weight: 800; letter-spacing: -0.02em;">Wolfilium</h1>
                    <p style="font-size: 0.7rem; color: #34d399; font-weight: 500;">
                        @auth
                            {{ auth()->user()->isAdmin() ? 'Admin Panel' : 'Customer Panel' }}
                        @else
                            Sistem Manajemen
                        @endauth
                    </p>
                </div>
            </div>
            <button onclick="toggleSidebar()" style="display: none; padding: 6px; border-radius: 8px; background: none; border: none; color: white; cursor: pointer;" class="mobile-close-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    {{-- Navigation --}}
    <nav style="flex: 1; padding: 20px; overflow-y: auto;">
        <div style="margin-bottom: 28px;">
            <p class="nav-section-title">Menu Utama</p>
            <div style="display: flex; flex-direction: column; gap: 4px;">
                <a href="{{ route('landing') }}" class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9,22 9,12 15,12 15,22"/></svg>
                    Beranda
                </a>

                @auth
                    @if(auth()->user()->isAdmin())
                        {{-- Admin Menu --}}
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                            Dashboard Admin
                        </a>
                        <a href="{{ route('manajemen.index') }}" class="nav-link {{ request()->routeIs('manajemen.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                            Manajemen Panen
                        </a>
                        <a href="{{ route('distribusi.index') }}" class="nav-link {{ request()->routeIs('distribusi.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            Katalog Peternak
                        </a>
                        <a href="{{ route('admin.catalog.index') }}" class="nav-link {{ request()->routeIs('admin.catalog.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6"/><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M2 12C2 6.5 6.5 2 12 2a10 10 0 0 1 8 4"/><path d="M22 12c0 5.5-4.5 10-10 10a10 10 0 0 1-8-4"/></svg>
                            Katalog Ikan
                        </a>
                        <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                            Settings
                        </a>
                    @else
                        {{-- Customer Menu --}}
                        <a href="{{ route('customer.dashboard') }}" class="nav-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/><path d="M11.7 10.4C12.6 7 16 5.2 17 3.5c1.3 2.5 2 5.8.5 9.5-1.5 3.5-4.5 5.5-7 6.5"/></svg>
                            Dashboard Saya
                        </a>
                        <a href="{{ route('customer.katalog') }}" class="nav-link {{ request()->routeIs('customer.katalog') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6"/><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M2 12C2 6.5 6.5 2 12 2a10 10 0 0 1 8 4"/><path d="M22 12c0 5.5-4.5 10-10 10a10 10 0 0 1-8-4"/></svg>
                            Katalog Ikan
                        </a>
                        <a href="{{ route('customer.manajemen') }}" class="nav-link {{ request()->routeIs('customer.manajemen') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                            Manajemen Panen
                        </a>
                        <a href="{{ route('customer.request') }}" class="nav-link {{ request()->routeIs('customer.request') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            Request Bibit
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        @auth
        <div style="margin-bottom: 28px;">
            <p class="nav-section-title">Edukasi & SOP</p>
            <div style="display: flex; flex-direction: column; gap: 4px;">
                <a href="{{ route('edukasi.panduan') }}" class="nav-link {{ request()->routeIs('edukasi.panduan') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    Panduan Budidaya
                </a>
                <a href="{{ route('edukasi.pengolahan') }}" class="nav-link {{ request()->routeIs('edukasi.pengolahan') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                    Pengolahan Produk
                </a>
                <a href="{{ route('edukasi.pemecahan') }}" class="nav-link {{ request()->routeIs('edukasi.pemecahan') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    Pemecahan Masalah
                </a>
            </div>
        </div>
        @endauth
    </nav>

    {{-- User Card --}}
    <div style="padding: 16px; border-top: 1px solid var(--hairline-dark);">
        @auth
        <div style="display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: var(--rounded-lg); background: var(--surface-elevated-dark); margin-bottom: 8px;">
            <div style="width: 40px; height: 40px; border-radius: 50%; background: {{ auth()->user()->isAdmin() ? 'linear-gradient(135deg, #8b5cf6, #6d28d9)' : 'var(--primary)' }}; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; color: var(--on-primary);">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <div style="flex: 1; min-width: 0;">
                <p style="font-size: 14px; font-weight: 500; color: var(--on-primary); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ auth()->user()->name }}</p>
                <p style="margin-top: 4px;">
                    <span class="badge {{ auth()->user()->isAdmin() ? 'badge-purple' : 'badge-green' }}" style="padding: 2px 8px; font-size: 10px;">
                        {{ auth()->user()->isAdmin() ? '🛡️ Admin' : '👤 Customer' }}
                    </span>
                </p>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="width: 100%; padding: 10px; border-radius: 10px; background: rgba(239,68,68,0.15); border: 1px solid rgba(239,68,68,0.3); color: #fca5a5; font-size: 0.8rem; font-weight: 600; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px; font-family: inherit;" onmouseover="this.style.background='rgba(239,68,68,0.25)'" onmouseout="this.style.background='rgba(239,68,68,0.15)'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Keluar
            </button>
        </form>
        @else
        <div style="display: flex; flex-direction: column; gap: 8px;">
            <a href="{{ route('login') }}" class="btn btn-primary" style="width: 100%; padding: 10px; font-size: 0.85rem; text-align: center;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Masuk
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary" style="width: 100%; padding: 10px; font-size: 0.85rem; text-align: center; color: #94a3b8; background: rgba(30,41,59,0.5); border: 1px solid rgba(71,85,105,0.3);">
                Daftar Akun
            </a>
        </div>
        @endauth
    </div>
</aside>

{{-- Mobile Header --}}
<div class="mobile-header" style="background: var(--canvas-light); border-bottom: 1px solid var(--hairline-light);">
    <button onclick="toggleSidebar()" style="padding: 8px; border-radius: var(--rounded-md); background: none; border: none; cursor: pointer; color: var(--ink);">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <div style="display: flex; align-items: center; gap: 8px;">
        <div style="width: 32px; height: 32px; border-radius: var(--rounded-md); overflow: hidden; flex-shrink: 0;">
            <img src="{{ asset('Wolfilium_Logo.png') }}" alt="Wolfilium Logo" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <span class="heading-sm" style="color: var(--ink);">Wolfilium</span>
    </div>
    <div style="width: 40px;"></div>
</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('show');
}
</script>

<style>
@media (max-width: 1023px) {
    .mobile-close-btn { display: block !important; }
}
</style>
