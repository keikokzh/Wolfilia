@extends('layouts.app')
@section('title', 'Daftar Akun — Wolfilium')
@section('body')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #064e3b 0%, #0f172a 50%, #022c22 100%); padding: 24px; position: relative; overflow: hidden;">
    {{-- Background decoration --}}
    <div style="position: absolute; top: -100px; left: -100px; width: 400px; height: 400px; border-radius: 50%; background: radial-gradient(circle, rgba(16,185,129,0.15), transparent); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -100px; right: -100px; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, rgba(6,182,212,0.1), transparent); pointer-events: none;"></div>

    <div class="animate-bounce-in" style="width: 100%; max-width: 440px;">
        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 36px;">
            <div style="width: 64px; height: 64px; border-radius: 20px; background: linear-gradient(135deg, #10b981, #047857); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; box-shadow: 0 8px 32px rgba(16,185,129,0.3);" class="animate-pulse-glow">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7c-1.5 2.1-3.5 3.5-5 4.5"/><path d="M11.7 10.4C12.6 7 16 5.2 17 3.5c1.3 2.5 2 5.8.5 9.5-1.5 3.5-4.5 5.5-7 6.5"/></svg>
            </div>
            <h1 style="font-size: 1.75rem; font-weight: 800; color: white; letter-spacing: -0.02em;">Buat Akun</h1>
            <p style="font-size: 0.85rem; color: #94a3b8; margin-top: 4px;">Daftar sebagai customer untuk mulai menggunakan Wolfilium</p>
        </div>

        {{-- Register Card --}}
        <div style="background: rgba(255,255,255,0.95); backdrop-filter: blur(20px); border-radius: 24px; padding: 40px; box-shadow: 0 25px 60px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2);">
            @if($errors->any())
                <div class="alert alert-error" style="margin-bottom: 20px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    <div>
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" style="display: inline-block; vertical-align: -2px; margin-right: 4px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" class="form-input" placeholder="Nama Anda" value="{{ old('name') }}" required autofocus id="register-name">
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" style="display: inline-block; vertical-align: -2px; margin-right: 4px;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        Email
                    </label>
                    <input type="email" name="email" class="form-input" placeholder="nama@email.com" value="{{ old('email') }}" required id="register-email">
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" style="display: inline-block; vertical-align: -2px; margin-right: 4px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Password
                    </label>
                    <input type="password" name="password" class="form-input" placeholder="Minimal 8 karakter" required id="register-password">
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" style="display: inline-block; vertical-align: -2px; margin-right: 4px;"><polyline points="20 6 9 17 4 12"/></svg>
                        Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password" required id="register-password-confirm">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; font-size: 0.95rem;" id="register-submit">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    Daftar Sekarang
                </button>
            </form>

            <div style="margin-top: 24px; text-align: center; padding-top: 24px; border-top: 1px solid #e2e8f0;">
                <p style="font-size: 0.85rem; color: #64748b;">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" style="color: #10b981; font-weight: 600; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Masuk di sini</a>
                </p>
            </div>
        </div>

        {{-- Back to home --}}
        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('landing') }}" style="font-size: 0.85rem; color: #94a3b8; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#34d399'" onmouseout="this.style.color='#94a3b8'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
