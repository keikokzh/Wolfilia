<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FishCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lele = [
            'name' => 'Ikan Lele',
            'scientific_name' => 'Clarias gariepinus (African Catfish)',
            'status_badge' => 'Tersedia',
            'popularity_badge' => 'Best Seller',
            'description' => 'Ikan Lele (Clarias gariepinus) dari peternakan Wolfilium dibudidayakan dengan pakan Wolffia organik yang kaya protein nabati. Lele kami tumbuh sehat tanpa penggunaan antibiotik dan bahan kimia berbahaya, menghasilkan daging yang lebih padat, gurih, dan bergizi tinggi. Cocok untuk berbagai olahan kuliner seperti lele goreng, pecel lele, lele bakar, maupun produk olahan lainnya.',
            'whatsapp_text' => 'Halo Wolfilium, saya tertarik untuk membeli ikan lele dari peternakan Wolfilium. Bisa info ketersediaan, ukuran, dan harga ikan lele nya?',
            'habitat' => [
                'Suhu Air' => '25 – 30°C (optimal 28°C)',
                'pH Air' => '6.5 – 8.0',
                'Oksigen Terlarut' => '> 3 mg/L',
                'Kedalaman Kolam' => '80 – 120 cm',
                'Tipe Kolam' => 'Terpal, beton, atau tanah',
                'Aktivitas' => 'Nokturnal (aktif malam hari)'
            ],
            'cycle' => [
                'Masa Pembenihan' => '7 – 14 hari',
                'Masa Pendederan' => '21 – 30 hari',
                'Masa Pembesaran' => '60 – 90 hari',
                'Berat Panen' => '150 – 300 g/ekor',
                'FCR' => '1.0 – 1.2 (sangat efisien)',
                'Padat Tebar' => '200 – 400 ekor/m³'
            ],
            'advantages' => [
                'Pakan Wolffia: Tinggi protein 40%',
                'Tanpa Antibiotik: 100% bebas kimia',
                'Daging Padat: Tekstur lebih kenyal',
                'Tanpa Bau Lumpur: Air kolam terkontrol',
                'Traceability: Tercatat digital di Wolfilium',
                'Higienis: Standar sanitasi tinggi'
            ],
            'pricing' => [
                ['kategori' => 'Sortir Kecil', 'ukuran' => '5 – 8 cm', 'isi' => '± 80 ekor', 'cocok' => 'Bibit pembesaran', 'harga' => 'Rp 25.000'],
                ['kategori' => 'Konsumsi Kecil', 'ukuran' => '15 – 20 cm (± 100g)', 'isi' => '8 – 10 ekor', 'cocok' => 'Pecel lele, goreng tepung', 'harga' => 'Rp 28.000'],
                ['kategori' => 'Konsumsi Sedang', 'ukuran' => '20 – 30 cm (± 200g)', 'isi' => '4 – 5 ekor', 'cocok' => 'Lele goreng, bakar', 'harga' => 'Rp 30.000'],
                ['kategori' => 'Konsumsi Besar', 'ukuran' => '30 – 40 cm (± 300g)', 'isi' => '3 – 4 ekor', 'cocok' => 'Lele bakar premium', 'harga' => 'Rp 35.000']
            ],
            'image' => 'katalog/ikanlele_transparent.png'
        ];

        $nila = [
            'name' => 'Ikan Nila',
            'scientific_name' => 'Oreochromis niloticus (Nile Tilapia)',
            'status_badge' => 'Tersedia',
            'popularity_badge' => 'Populer',
            'description' => 'Ikan Nila (Oreochromis niloticus) merupakan salah satu ikan air tawar paling populer di Indonesia. Nila dari peternakan Wolfilium dibudidayakan secara semi-intensif dengan suplemen pakan Wolffia yang kaya protein dan mineral. Dagingnya putih bersih, tebal, dengan rasa yang lembut dan sedikit manis — sangat cocok untuk nila bakar, nila goreng, fillet, maupun olahan modern. Ikan ini juga kaya akan asam amino esensial dan rendah lemak jenuh.',
            'whatsapp_text' => 'Halo Wolfilium, saya tertarik untuk membeli ikan nila dari peternakan Wolfilium. Bisa info ketersediaan, ukuran, dan harga ikan nila nya?',
            'habitat' => [
                'Suhu Air' => '25 – 30°C (optimal 27°C)',
                'pH Air' => '6.5 – 8.5',
                'Oksigen Terlarut' => '> 4 mg/L',
                'Kedalaman Kolam' => '100 – 150 cm',
                'Tipe Kolam' => 'Tanah, beton, jaring apung',
                'Aktivitas' => 'Diurnal (aktif siang hari)'
            ],
            'cycle' => [
                'Masa Pembenihan' => '5 – 7 hari',
                'Masa Pendederan' => '30 – 45 hari',
                'Masa Pembesaran' => '120 – 180 hari',
                'Berat Panen' => '200 – 500 g/ekor',
                'FCR' => '1.4 – 1.7',
                'Padat Tebar' => '15 – 30 ekor/m²'
            ],
            'advantages' => [
                'Suplemen Wolffia: Protein & mineral alami',
                'Daging Putih Bersih: Tebal, lembut, manis',
                'Seleksi Genetik: Strain GIFT unggul',
                'Rendah Lemak: Hanya 1.7 – 3 g/100g',
                'Ramah Lingkungan: Budidaya berkelanjutan',
                'Sertifikasi: Standar CBIB nasional'
            ],
            'pricing' => [
                ['kategori' => 'Bibit / Nener', 'ukuran' => '3 – 5 cm', 'isi' => '± 200 ekor', 'cocok' => 'Bibit pembesaran', 'harga' => 'Rp 300/ekor'],
                ['kategori' => 'Konsumsi Kecil', 'ukuran' => '15 – 20 cm (± 200g)', 'isi' => '4 – 5 ekor', 'cocok' => 'Nila goreng rumahan', 'harga' => 'Rp 32.000'],
                ['kategori' => 'Konsumsi Sedang', 'ukuran' => '20 – 28 cm (± 350g)', 'isi' => '2 – 3 ekor', 'cocok' => 'Nila bakar, pepes', 'harga' => 'Rp 35.000'],
                ['kategori' => 'Konsumsi Besar', 'ukuran' => '28 – 35 cm (± 500g)', 'isi' => '2 ekor', 'cocok' => 'Restoran, fillet premium', 'harga' => 'Rp 40.000']
            ],
            'image' => 'katalog/ikannilav2_transparent.png'
        ];

        \App\Models\FishCatalog::updateOrCreate(['name' => 'Ikan Lele'], $lele);
        \App\Models\FishCatalog::updateOrCreate(['name' => 'Ikan Nila'], $nila);
    }
}
