@extends('layouts.dashboard')
@section('title', 'Katalog Ikan — Wolfilium')
@section('content')
<div style="padding: 24px; max-width: 1400px; margin: 0 auto;">
    <div class="page-header animate-slide-up">
        <h1 class="page-title">
            <div class="gradient-emerald icon-box">
                <img src="{{ asset('Wolfilium_Logo.png') }}" alt="Wolfilium" style="width: 28px; height: 28px; object-fit: contain;">
            </div>
            Katalog Ikan Peternakan
        </h1>
        <p class="page-subtitle">Jelajahi koleksi ikan berkualitas tinggi dari peternakan Wolfilium. Diberi pakan Wolffia organik untuk kualitas terbaik.</p>
    </div>

    {{-- Stats Overview --}}
    <div class="grid-3" style="margin-bottom: 32px;">
        <div class="card animate-slide-up stagger-1" style="border-top: 4px solid #3b82f6; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #dbeafe, #bfdbfe); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6"/><path d="M2 12C2 6.5 6.5 2 12 2a10 10 0 0 1 8 4"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--ink);">2</p>
                    <p style="font-size: 0.7rem; font-weight: 600; color: var(--shade-60); text-transform: uppercase; letter-spacing: 0.03em;">Jenis Ikan</p>
                </div>
            </div>
        </div>

        <div class="card animate-slide-up stagger-2" style="border-top: 4px solid #10b981; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #d1fae5, #a7f3d0); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.9C15.5 4.9 17 3.5 17 3.5s.5 3.5-2 7"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--ink);">100%</p>
                    <p style="font-size: 0.7rem; font-weight: 600; color: var(--shade-60); text-transform: uppercase; letter-spacing: 0.03em;">Pakan Wolffia Organik</p>
                </div>
            </div>
        </div>

        <div class="card animate-slide-up stagger-3" style="border-top: 4px solid #f59e0b; padding: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #fef3c7, #fde68a); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                </div>
                <div>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--ink);">Premium</p>
                    <p style="font-size: 0.7rem; font-weight: 600; color: var(--shade-60); text-transform: uppercase; letter-spacing: 0.03em;">Kualitas Grade A</p>
                </div>
            </div>
        </div>
    </div>

    @foreach($fishes as $index => $fish)
    <div class="card animate-slide-up stagger-{{ ($index % 4) + 1 }}" style="margin-bottom: 32px; overflow: hidden;">
        {{-- Header --}}
        <div style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); padding: 32px; position: relative; overflow: hidden;">
            <div style="position: absolute; top: -30px; right: -30px; width: 200px; height: 200px; border-radius: 50%; background: radial-gradient(circle, rgba(59,130,246,0.15), transparent); pointer-events: none;"></div>
            <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                <div style="width: 72px; height: 72px; border-radius: 20px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 2px solid rgba(59,130,246,0.3); background: rgba(59,130,246,0.1);">
                    @if($fish->image)
                        <img src="{{ asset('storage/' . $fish->image) }}" alt="{{ $fish->name }}" style="width: 90%; height: 90%; object-fit: contain;">
                    @else
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.5)" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                    @endif
                </div>
                <div style="flex: 1;">
                    <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 8px;">
                        <h2 style="font-size: 1.5rem; font-weight: 800; color: white; letter-spacing: -0.02em;">{{ $fish->name }}</h2>
                        @if($fish->status_badge)
                            <span class="badge badge-blue" style="font-size: 11px;">{{ $fish->status_badge }}</span>
                        @endif
                        @if($fish->popularity_badge)
                            <span class="badge badge-green" style="font-size: 11px;">{{ $fish->popularity_badge }}</span>
                        @endif
                    </div>
                    <p style="font-size: 0.85rem; color: #94a3b8; font-style: italic;">{{ $fish->scientific_name }}</p>
                </div>
                @php
                    $waText = $fish->whatsapp_text ?: "Halo Wolfilium, saya tertarik untuk membeli ikan {$fish->name} dari peternakan Wolfilium. Bisa info ketersediaan, ukuran, dan harganya?";
                @endphp
                <a href="https://wa.me/6282218410603?text={{ urlencode($waText) }}" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; border-radius: 12px; background: #25D366; color: white; text-decoration: none; font-weight: 700; font-size: 0.85rem; font-family: inherit; transition: all 0.2s; flex-shrink: 0;" onmouseover="this.style.background='#128C7E'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#25D366'; this.style.transform='translateY(0)'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Beli {{ $fish->name }}
                </a>
            </div>
        </div>

        {{-- Detail Content --}}
        <div style="padding: 32px;">
            {{-- Deskripsi --}}
            @if($fish->description)
            <div style="margin-bottom: 32px;">
                <h3 style="font-size: 1rem; font-weight: 700; color: var(--ink); margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    Deskripsi
                </h3>
                <p style="color: var(--shade-60); line-height: 1.7; font-size: 0.9rem;">
                    {!! nl2br(e($fish->description)) !!}
                </p>
            </div>
            @endif

            {{-- Habitat & Budidaya --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 32px;">
                @if($fish->habitat)
                <div style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border-radius: var(--rounded-md); padding: 24px; border: 1px solid rgba(59,130,246,0.2);">
                    <h4 style="font-size: 0.85rem; font-weight: 700; color: #1e40af; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1e40af" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Habitat & Lingkungan
                    </h4>
                    <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.8rem; color: #1e3a5f;">
                        @foreach($fish->habitat as $key => $val)
                            <p><strong>{{ $key }}:</strong> {{ $val }}</p>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($fish->cycle)
                <div style="background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-radius: var(--rounded-md); padding: 24px; border: 1px solid rgba(16,185,129,0.2);">
                    <h4 style="font-size: 0.85rem; font-weight: 700; color: #166534; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#166534" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                        Siklus Budidaya
                    </h4>
                    <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.8rem; color: #14532d;">
                        @foreach($fish->cycle as $key => $val)
                            <p><strong>{{ $key }}:</strong> {{ $val }}</p>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($fish->advantages)
                <div style="background: linear-gradient(135deg, #fefce8, #fef9c3); border-radius: var(--rounded-md); padding: 24px; border: 1px solid rgba(245,158,11,0.2);">
                    <h4 style="font-size: 0.85rem; font-weight: 700; color: #92400e; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#92400e" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        Keunggulan Wolfilium
                    </h4>
                    <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.8rem; color: #78350f;">
                        @foreach($fish->advantages as $adv)
                            <p>✅ {{ $adv }}</p>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Ukuran & Harga --}}
            @if($fish->pricing)
            <div style="background: var(--surface-elevated); border-radius: var(--rounded-md); padding: 24px; border: 1px solid var(--hairline-light);">
                <h4 style="font-size: 0.85rem; font-weight: 700; color: var(--ink); margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    Ukuran Tersedia & Estimasi Harga
                </h4>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 0.85rem;">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--hairline-light);">
                                <th style="text-align: left; padding: 12px 16px; font-weight: 700; color: var(--ink); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Kategori</th>
                                <th style="text-align: center; padding: 12px 16px; font-weight: 700; color: var(--ink); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Ukuran/Ekor</th>
                                <th style="text-align: center; padding: 12px 16px; font-weight: 700; color: var(--ink); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Isi per Kg</th>
                                <th style="text-align: center; padding: 12px 16px; font-weight: 700; color: var(--ink); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Cocok Untuk</th>
                                <th style="text-align: right; padding: 12px 16px; font-weight: 700; color: var(--ink); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Harga/Kg</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fish->pricing as $price)
                            <tr style="border-bottom: 1px solid var(--hairline-light); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='var(--surface-hover)'" onmouseout="this.style.backgroundColor='transparent'">
                                <td style="padding: 16px; color: var(--ink); font-weight: 600;">{{ $price['kategori'] ?? '-' }}</td>
                                <td style="padding: 16px; text-align: center; color: var(--shade-60);">{{ $price['ukuran'] ?? '-' }}</td>
                                <td style="padding: 16px; text-align: center; color: var(--shade-60);">{{ $price['isi'] ?? '-' }}</td>
                                <td style="padding: 16px; text-align: center; color: var(--shade-60);">{{ $price['cocok'] ?? '-' }}</td>
                                <td style="padding: 16px; text-align: right; color: var(--primary); font-weight: 800;">{{ $price['harga'] ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
    {{-- CTA Bottom --}}
    <div class="card animate-slide-up" style="background: linear-gradient(135deg, #064e3b, #022c22); padding: 40px; text-align: center; border: 1px solid rgba(16,185,129,0.2);">
        <h3 style="font-size: 1.25rem; font-weight: 800; color: white; margin-bottom: 12px;">Tertarik Membeli Ikan Kami?</h3>
        <p style="color: #94a3b8; font-size: 0.9rem; margin-bottom: 24px; max-width: 500px; margin-left: auto; margin-right: auto;">
            Hubungi kami via WhatsApp untuk informasi ketersediaan, harga terbaru, dan pemesanan ikan segar langsung dari peternakan Wolfilium.
        </p>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            <a href="https://wa.me/6282218410603?text=Halo%20Wolfilium,%20saya%20tertarik%20untuk%20membeli%20ikan%20lele%20dari%20peternakan%20Wolfilium.%20Bisa%20info%20ketersediaan,%20ukuran,%20dan%20harga%20ikan%20lele%20nya?" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 10px; padding: 14px 28px; border-radius: 12px; background: #25D366; color: white; text-decoration: none; font-weight: 700; font-size: 0.9rem; font-family: inherit; transition: all 0.2s;" onmouseover="this.style.background='#128C7E'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#25D366'; this.style.transform='translateY(0)'">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Pesan Ikan Lele
            </a>
            <a href="https://wa.me/6282218410603?text=Halo%20Wolfilium,%20saya%20tertarik%20untuk%20membeli%20ikan%20nila%20dari%20peternakan%20Wolfilium.%20Bisa%20info%20ketersediaan,%20ukuran,%20dan%20harga%20ikan%20nila%20nya?" target="_blank" rel="noopener" style="display: inline-flex; align-items: center; gap: 10px; padding: 14px 28px; border-radius: 12px; background: rgba(255,255,255,0.12); color: white; text-decoration: none; font-weight: 700; font-size: 0.9rem; font-family: inherit; border: 1px solid rgba(255,255,255,0.2); transition: all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(255,255,255,0.12)'; this.style.transform='translateY(0)'">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Pesan Ikan Nila
            </a>
        </div>
    </div>
</div>
@endsection
