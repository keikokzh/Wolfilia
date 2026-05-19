<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HarvestLog;
use App\Models\HarvestPrediction;
use App\Models\Farmer;
use Carbon\Carbon;

class WolfiliumSeeder extends Seeder
{
    public function run(): void
    {
        // ── Harvest Logs (sample data for chart) ──
        $dates = collect(range(0, 14))->map(fn($i) => Carbon::now()->subDays($i));
        $weights = [2.1, 3.5, 1.8, 4.2, 3.0, 2.8, 5.1, 3.7, 4.5, 2.9, 3.3, 4.0, 2.5, 3.8, 4.7];

        foreach ($dates as $i => $date) {
            HarvestLog::create([
                'tanggal_panen' => $date,
                'berat_kg' => $weights[$i],
                'keterangan' => 'Panen batch WFC-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
            ]);
        }

        // ── Harvest Predictions ──
        HarvestPrediction::create([
            'tanggal_tebar' => Carbon::now()->subHours(20),
            'berat_bibit_gram' => 500,
            'prediksi_panen_awal' => Carbon::now()->addHours(4),
            'prediksi_panen_akhir' => Carbon::now()->addHours(28),
            'estimasi_hasil_gram' => 1000,
            'status' => 'menunggu',
        ]);

        HarvestPrediction::create([
            'tanggal_tebar' => Carbon::now()->subDays(2),
            'berat_bibit_gram' => 750,
            'prediksi_panen_awal' => Carbon::now()->subDay(),
            'prediksi_panen_akhir' => Carbon::now(),
            'estimasi_hasil_gram' => 1500,
            'status' => 'siap_panen',
        ]);

        // ── Farmers (Katalog Peternak) ──
        $farmers = [
            ['nama' => 'Pak Budi Santoso', 'lokasi' => 'Subang, Jawa Barat', 'kontak' => '0822-1234-5678', 'status_ketersediaan' => 'ada_sisa_bibit', 'catatan' => 'Memiliki 3 kolam nila. Siap berbagi bibit Wolffia.'],
            ['nama' => 'Bu Sari Dewi', 'lokasi' => 'Sumedang, Jawa Barat', 'kontak' => '0813-9876-5432', 'status_ketersediaan' => 'butuh_bibit', 'catatan' => 'Baru mulai budidaya, butuh bibit awal.'],
            ['nama' => 'Pak Agus Hermawan', 'lokasi' => 'Bandung, Jawa Barat', 'kontak' => '0856-7777-8888', 'status_ketersediaan' => 'ada_sisa_bibit', 'catatan' => 'Pembudidaya koi premium. Punya surplus Wolffia.'],
            ['nama' => 'Bu Rina Kartika', 'lokasi' => 'Garut, Jawa Barat', 'kontak' => '0878-1111-2222', 'status_ketersediaan' => 'tidak_tersedia', 'catatan' => 'Kolam sedang dalam perbaikan.'],
            ['nama' => 'Pak Dedi Kurniawan', 'lokasi' => 'Cimahi, Jawa Barat', 'kontak' => '0821-3333-4444', 'status_ketersediaan' => 'ada_sisa_bibit', 'catatan' => 'Multi spesies ikan. Aktif di komunitas.'],
            ['nama' => 'Bu Ani Suryani', 'lokasi' => 'Purwakarta, Jawa Barat', 'kontak' => '0812-5555-6666', 'status_ketersediaan' => 'butuh_bibit', 'catatan' => 'Peternak nila skala kecil, tertarik ekonomi sirkular.'],
        ];

        foreach ($farmers as $farmer) {
            Farmer::create($farmer);
        }
    }
}
