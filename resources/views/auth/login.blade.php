@extends('layouts.app')
@section('title', 'Login — Wolfilium')
@section('body')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #064e3b 0%, #0f172a 50%, #022c22 100%); padding: 24px; position: relative; overflow: hidden;">
    {{-- Background decoration --}}
    <div style="position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; border-radius: 50%; background: radial-gradient(circle, rgba(16,185,129,0.15), transparent); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -150px; left: -150px; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, rgba(6,182,212,0.1), transparent); pointer-events: none;"></div>

    <div class="animate-bounce-in" style="width: 100%; max-width: 440px;">
        {{-- Logo --}}
        <div style="text-align: center; margin-bottom: 36px;">
            <div style="width: 80px; height: 80px; border-radius: 20px; overflow: hidden; margin: 0 auto 16px; box-shadow: 0 8px 32px rgba(16,185,129,0.3);" class="animate-pulse-glow">
                <img src="{{ asset('Wolfilium_Logo.png') }}" alt="Wolfilium Logo" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <h1 style="font-size: 1.75rem; font-weight: 800; color: white; letter-spacing: -0.02em;">Wolfilium</h1>
            <p style="font-size: 0.85rem; color: #94a3b8; margin-top: 4px;">Masuk ke akun Anda</p>
        </div>

        {{-- Login Card --}}
        <div style="background: rgba(255,255,255,0.95); backdrop-filter: blur(20px); border-radius: 24px; padding: 40px; box-shadow: 0 25px 60px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2);">
            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom: 20px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    {{ session('success') }}
                </div>
            @endif

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

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" style="display: inline-block; vertical-align: -2px; margin-right: 4px;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        Email
                    </label>
                    <input type="email" name="email" class="form-input" placeholder="nama@email.com" value="{{ old('email') }}" required autofocus id="login-email">
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" style="display: inline-block; vertical-align: -2px; margin-right: 4px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Password
                    </label>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required id="login-password">
                </div>

                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 24px;">
                    <input type="checkbox" name="remember" id="remember" style="width: 16px; height: 16px; accent-color: #10b981; cursor: pointer;">
                    <label for="remember" style="font-size: 0.85rem; color: #64748b; cursor: pointer;">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; font-size: 0.95rem;" id="login-submit">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                    Masuk
                </button>
            </form>

            <div style="margin-top: 24px; text-align: center; padding-top: 24px; border-top: 1px solid #e2e8f0;">
                <p style="font-size: 0.85rem; color: #64748b;">
                    Belum punya akun?
                    <a href="{{ route('register') }}" style="color: #10b981; font-weight: 600; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Daftar sekarang</a>
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
