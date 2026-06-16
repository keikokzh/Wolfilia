@extends('layouts.dashboard')
@section('title', isset($catalog) ? 'Edit Katalog Ikan' : 'Tambah Katalog Ikan')
@section('content')
<div style="padding: 24px; max-width: 1000px; margin: 0 auto;">
    <div class="page-header animate-slide-up" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="page-title">
                <div class="gradient-emerald icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                </div>
                {{ isset($catalog) ? 'Edit Ikan' : 'Tambah Ikan' }}
            </h1>
            <p class="page-subtitle">{{ isset($catalog) ? 'Edit data ikan '.$catalog->name : 'Tambahkan ikan baru ke katalog.' }}</p>
        </div>
        <a href="{{ route('admin.catalog.index') }}" class="btn btn-outline">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-error animate-slide-up">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card animate-slide-up stagger-1">
        <form action="{{ isset($catalog) ? route('admin.catalog.update', $catalog->id) : route('admin.catalog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($catalog)) @method('PUT') @endif

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Nama Ikan *</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name', $catalog->name ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Ilmiah</label>
                    <input type="text" name="scientific_name" class="form-input" value="{{ old('scientific_name', $catalog->scientific_name ?? '') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Status Badge</label>
                    <input type="text" name="status_badge" class="form-input" placeholder="Contoh: Tersedia" value="{{ old('status_badge', $catalog->status_badge ?? '') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Popularity Badge</label>
                    <input type="text" name="popularity_badge" class="form-input" placeholder="Contoh: Populer" value="{{ old('popularity_badge', $catalog->popularity_badge ?? '') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi Singkat</label>
                <textarea name="description" class="form-input" rows="4">{{ old('description', $catalog->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Teks Pesan WhatsApp Default</label>
                <textarea name="whatsapp_text" class="form-input" rows="3" placeholder="Halo Wolfilium, saya tertarik untuk membeli ikan...">{{ old('whatsapp_text', $catalog->whatsapp_text ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Gambar Ikan</label>
                @if(isset($catalog) && $catalog->image)
                    <div style="margin-bottom: 12px;">
                        <img src="{{ asset('storage/' . $catalog->image) }}" style="max-height: 100px; border-radius: 8px;">
                    </div>
                @endif
                <input type="file" name="image_file" class="form-input" accept="image/*">
            </div>

            <hr style="margin: 32px 0; border: none; border-top: 1px solid #e2e8f0;">

            <div class="alert" style="background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af; margin-bottom: 24px;">
                <strong>Petunjuk Pengisian:</strong> Anda dapat menambah banyak baris informasi dengan menekan tombol <b>+ Tambah</b> di masing-masing bagian. Kosongkan baris jika tidak diperlukan.
            </div>

            <!-- Habitat & Lingkungan -->
            <div class="form-group" style="background: var(--surface); padding: 20px; border-radius: var(--rounded-lg); border: 1px solid var(--hairline-light);">
                <label class="form-label" style="font-size: 1.1rem; color: var(--primary);">Habitat & Lingkungan</label>
                <div id="habitat-container" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 12px;">
                    @php $habitats = old('habitat', isset($catalog) && is_array($catalog->habitat) ? $catalog->habitat : []); @endphp
                    @forelse($habitats as $k => $v)
                    <div class="dynamic-row" style="display: grid; grid-template-columns: 1fr 2fr auto; gap: 12px;">
                        <input type="text" name="habitat_keys[]" class="form-input" placeholder="Parameter (cth: Suhu Air)" value="{{ $k }}">
                        <input type="text" name="habitat_values[]" class="form-input" placeholder="Nilai (cth: 25 - 30°C)" value="{{ is_array($v) ? '' : $v }}">
                        <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.remove()">X</button>
                    </div>
                    @empty
                    <div class="dynamic-row" style="display: grid; grid-template-columns: 1fr 2fr auto; gap: 12px;">
                        <input type="text" name="habitat_keys[]" class="form-input" placeholder="Parameter (cth: Suhu Air)">
                        <input type="text" name="habitat_values[]" class="form-input" placeholder="Nilai (cth: 25 - 30°C)">
                        <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.remove()">X</button>
                    </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-outline" onclick="addDynamicRow('habitat-container', `<div class='dynamic-row' style='display: grid; grid-template-columns: 1fr 2fr auto; gap: 12px;'><input type='text' name='habitat_keys[]' class='form-input' placeholder='Parameter'><input type='text' name='habitat_values[]' class='form-input' placeholder='Nilai'><button type='button' class='btn btn-outline' style='padding: 8px 12px; border-color: #fca5a5; color: #ef4444;' onclick='this.parentElement.remove()'>X</button></div>`)">+ Tambah Habitat</button>
            </div>

            <!-- Siklus Budidaya -->
            <div class="form-group" style="background: var(--surface); padding: 20px; border-radius: var(--rounded-lg); border: 1px solid var(--hairline-light);">
                <label class="form-label" style="font-size: 1.1rem; color: var(--primary);">Siklus Budidaya</label>
                <div id="cycle-container" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 12px;">
                    @php $cycles = old('cycle', isset($catalog) && is_array($catalog->cycle) ? $catalog->cycle : []); @endphp
                    @forelse($cycles as $k => $v)
                    <div class="dynamic-row" style="display: grid; grid-template-columns: 1fr 2fr auto; gap: 12px;">
                        <input type="text" name="cycle_keys[]" class="form-input" placeholder="Parameter (cth: FCR)" value="{{ $k }}">
                        <input type="text" name="cycle_values[]" class="form-input" placeholder="Nilai (cth: 1.4)" value="{{ is_array($v) ? '' : $v }}">
                        <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.remove()">X</button>
                    </div>
                    @empty
                    <div class="dynamic-row" style="display: grid; grid-template-columns: 1fr 2fr auto; gap: 12px;">
                        <input type="text" name="cycle_keys[]" class="form-input" placeholder="Parameter (cth: FCR)">
                        <input type="text" name="cycle_values[]" class="form-input" placeholder="Nilai (cth: 1.4)">
                        <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.remove()">X</button>
                    </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-outline" onclick="addDynamicRow('cycle-container', `<div class='dynamic-row' style='display: grid; grid-template-columns: 1fr 2fr auto; gap: 12px;'><input type='text' name='cycle_keys[]' class='form-input' placeholder='Parameter'><input type='text' name='cycle_values[]' class='form-input' placeholder='Nilai'><button type='button' class='btn btn-outline' style='padding: 8px 12px; border-color: #fca5a5; color: #ef4444;' onclick='this.parentElement.remove()'>X</button></div>`)">+ Tambah Siklus</button>
            </div>

            <!-- Keunggulan -->
            <div class="form-group" style="background: var(--surface); padding: 20px; border-radius: var(--rounded-lg); border: 1px solid var(--hairline-light);">
                <label class="form-label" style="font-size: 1.1rem; color: var(--primary);">Keunggulan Wolfilium</label>
                <div id="advantages-container" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 12px;">
                    @php $advantages = old('advantages', isset($catalog) && is_array($catalog->advantages) ? $catalog->advantages : []); @endphp
                    @forelse($advantages as $adv)
                    <div class="dynamic-row" style="display: grid; grid-template-columns: 1fr auto; gap: 12px;">
                        <input type="text" name="advantages[]" class="form-input" placeholder="Keunggulan (cth: Tinggi Protein)" value="{{ is_string($adv) ? $adv : '' }}">
                        <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.remove()">X</button>
                    </div>
                    @empty
                    <div class="dynamic-row" style="display: grid; grid-template-columns: 1fr auto; gap: 12px;">
                        <input type="text" name="advantages[]" class="form-input" placeholder="Keunggulan (cth: Tinggi Protein)">
                        <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.remove()">X</button>
                    </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-outline" onclick="addDynamicRow('advantages-container', `<div class='dynamic-row' style='display: grid; grid-template-columns: 1fr auto; gap: 12px;'><input type='text' name='advantages[]' class='form-input' placeholder='Keunggulan'><button type='button' class='btn btn-outline' style='padding: 8px 12px; border-color: #fca5a5; color: #ef4444;' onclick='this.parentElement.remove()'>X</button></div>`)">+ Tambah Keunggulan</button>
            </div>

            <!-- Tabel Harga -->
            <div class="form-group" style="background: var(--surface); padding: 20px; border-radius: var(--rounded-lg); border: 1px solid var(--hairline-light);">
                <label class="form-label" style="font-size: 1.1rem; color: var(--primary);">Tabel Harga</label>
                <div id="pricing-container" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 12px;">
                    @php $pricing = old('pricing', isset($catalog) && is_array($catalog->pricing) ? $catalog->pricing : []); @endphp
                    @forelse($pricing as $p)
                    <div class="dynamic-row" style="display: grid; grid-template-columns: repeat(5, 1fr) auto; gap: 8px; align-items: start; background: var(--surface-hover); padding: 12px; border-radius: 8px;">
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Kategori</label>
                            <input type="text" name="pricing_kategori[]" class="form-input" placeholder="Konsumsi Besar" value="{{ $p['kategori'] ?? '' }}">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Ukuran</label>
                            <input type="text" name="pricing_ukuran[]" class="form-input" placeholder="30 - 40 cm" value="{{ $p['ukuran'] ?? '' }}">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Isi / Kg</label>
                            <input type="text" name="pricing_isi[]" class="form-input" placeholder="3 - 4 ekor" value="{{ $p['isi'] ?? '' }}">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Cocok Untuk</label>
                            <input type="text" name="pricing_cocok[]" class="form-input" placeholder="Lele bakar premium" value="{{ $p['cocok'] ?? '' }}">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Harga</label>
                            <input type="text" name="pricing_harga[]" class="form-input" placeholder="Rp 35.000" value="{{ $p['harga'] ?? '' }}">
                        </div>
                        <div style="padding-top: 24px;">
                            <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.parentElement.remove()">X</button>
                        </div>
                    </div>
                    @empty
                    <div class="dynamic-row" style="display: grid; grid-template-columns: repeat(5, 1fr) auto; gap: 8px; align-items: start; background: var(--surface-hover); padding: 12px; border-radius: 8px;">
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Kategori</label>
                            <input type="text" name="pricing_kategori[]" class="form-input" placeholder="Konsumsi Besar">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Ukuran</label>
                            <input type="text" name="pricing_ukuran[]" class="form-input" placeholder="30 - 40 cm">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Isi / Kg</label>
                            <input type="text" name="pricing_isi[]" class="form-input" placeholder="3 - 4 ekor">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Cocok Untuk</label>
                            <input type="text" name="pricing_cocok[]" class="form-input" placeholder="Lele bakar premium">
                        </div>
                        <div>
                            <label style="font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;">Harga</label>
                            <input type="text" name="pricing_harga[]" class="form-input" placeholder="Rp 35.000">
                        </div>
                        <div style="padding-top: 24px;">
                            <button type="button" class="btn btn-outline" style="padding: 8px 12px; border-color: #fca5a5; color: #ef4444;" onclick="this.parentElement.parentElement.remove()">X</button>
                        </div>
                    </div>
                    @endforelse
                </div>
                <button type="button" class="btn btn-outline" onclick="addDynamicRow('pricing-container', `<div class='dynamic-row' style='display: grid; grid-template-columns: repeat(5, 1fr) auto; gap: 8px; align-items: start; background: var(--surface-hover); padding: 12px; border-radius: 8px;'><div><label style='font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;'>Kategori</label><input type='text' name='pricing_kategori[]' class='form-input' placeholder='Kategori'></div><div><label style='font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;'>Ukuran</label><input type='text' name='pricing_ukuran[]' class='form-input' placeholder='Ukuran'></div><div><label style='font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;'>Isi / Kg</label><input type='text' name='pricing_isi[]' class='form-input' placeholder='Isi'></div><div><label style='font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;'>Cocok Untuk</label><input type='text' name='pricing_cocok[]' class='form-input' placeholder='Cocok untuk'></div><div><label style='font-size: 0.75rem; color: var(--shade-60); display:block; margin-bottom: 4px;'>Harga</label><input type='text' name='pricing_harga[]' class='form-input' placeholder='Harga'></div><div style='padding-top: 24px;'><button type='button' class='btn btn-outline' style='padding: 8px 12px; border-color: #fca5a5; color: #ef4444;' onclick='this.parentElement.parentElement.remove()'>X</button></div></div>`)">+ Tambah Harga</button>
            </div>

            <div style="text-align: right; margin-top: 32px;">
                <button type="submit" class="btn btn-primary">Simpan Ikan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function addDynamicRow(containerId, htmlString) {
        const container = document.getElementById(containerId);
        container.insertAdjacentHTML('beforeend', htmlString);
    }
</script>
@endsection
