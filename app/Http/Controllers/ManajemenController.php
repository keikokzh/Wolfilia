<?php

namespace App\Http\Controllers;

use App\Models\HarvestLog;
use App\Models\HarvestPrediction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManajemenController extends Controller
{
    /**
     * Dashboard view — shows prediction form, active predictions, and harvest chart
     */
    public function index()
    {
        $predictions = HarvestPrediction::orderBy('created_at', 'desc')->get();
        $harvestLogs = HarvestLog::orderBy('tanggal_panen', 'desc')->take(30)->get();

        // Prepare chart data (last 30 days)
        $chartData = HarvestLog::selectRaw("tanggal_panen, SUM(berat_kg) as total_kg")
            ->where('tanggal_panen', '>=', Carbon::now()->subDays(30))
            ->groupBy('tanggal_panen')
            ->orderBy('tanggal_panen')
            ->get();

        // Update prediction statuses automatically
        $today = Carbon::today();
        foreach ($predictions as $prediction) {
            if ($prediction->status === 'menunggu' && $today->gte($prediction->prediksi_panen_awal)) {
                $prediction->update(['status' => 'siap_panen']);
            }
        }

        return view('manajemen.index', compact('predictions', 'harvestLogs', 'chartData'));
    }

    /**
     * Kalkulator Prediksi Panen — calculate harvest date from seed date + weight
     */
    public function hitungPrediksi(Request $request)
    {
        $request->validate([
            'tanggal_tebar' => 'required|date',
            'berat_bibit_gram' => 'required|numeric|min:0.1',
        ]);

        $tanggalTebar = Carbon::parse($request->tanggal_tebar);
        $beratBibit = $request->berat_bibit_gram;

        // Wolffia doubles every 24-48 hours
        // Prediksi panen: 24-48 jam setelah tebar
        $prediksiAwal = $tanggalTebar->copy()->addHours(24);
        $prediksiAkhir = $tanggalTebar->copy()->addHours(48);

        // Estimasi hasil: Wolffia bisa 2x lipat setiap siklus
        $estimasiHasil = $beratBibit * 2;

        HarvestPrediction::create([
            'tanggal_tebar' => $tanggalTebar,
            'berat_bibit_gram' => $beratBibit,
            'prediksi_panen_awal' => $prediksiAwal,
            'prediksi_panen_akhir' => $prediksiAkhir,
            'estimasi_hasil_gram' => $estimasiHasil,
            'status' => 'menunggu',
        ]);

        return redirect()->route('manajemen.index')
            ->with('success', 'Prediksi panen berhasil dihitung! Panen diperkirakan antara ' .
                $prediksiAwal->format('d M Y H:i') . ' — ' . $prediksiAkhir->format('d M Y H:i'));
    }

    /**
     * Update prediction status to harvested
     */
    public function updateStatusPrediksi(HarvestPrediction $prediction, Request $request)
    {
        $request->validate(['status' => 'required|in:menunggu,siap_panen,sudah_panen']);
        $prediction->update(['status' => $request->status]);

        return redirect()->route('manajemen.index')
            ->with('success', 'Status prediksi berhasil diperbarui.');
    }

    /**
     * Delete prediction
     */
    public function hapusPrediksi(HarvestPrediction $prediction)
    {
        $prediction->delete();
        return redirect()->route('manajemen.index')
            ->with('success', 'Prediksi berhasil dihapus.');
    }

    // ── HARVEST LOG CRUD ──

    public function simpanPanen(Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'berat_kg' => 'required|numeric|min:0.01',
            'keterangan' => 'nullable|string|max:255',
        ]);

        HarvestLog::create($request->only('tanggal_panen', 'berat_kg', 'keterangan'));

        return redirect()->route('manajemen.index')
            ->with('success', 'Data panen berhasil disimpan!');
    }

    public function editPanen(HarvestLog $log)
    {
        $predictions = HarvestPrediction::orderBy('created_at', 'desc')->get();
        $harvestLogs = HarvestLog::orderBy('tanggal_panen', 'desc')->take(30)->get();
        $chartData = HarvestLog::selectRaw("tanggal_panen, SUM(berat_kg) as total_kg")
            ->where('tanggal_panen', '>=', Carbon::now()->subDays(30))
            ->groupBy('tanggal_panen')
            ->orderBy('tanggal_panen')
            ->get();

        return view('manajemen.index', compact('predictions', 'harvestLogs', 'chartData', 'log'));
    }

    public function updatePanen(HarvestLog $log, Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'berat_kg' => 'required|numeric|min:0.01',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $log->update($request->only('tanggal_panen', 'berat_kg', 'keterangan'));

        return redirect()->route('manajemen.index')
            ->with('success', 'Data panen berhasil diperbarui!');
    }

    public function hapusPanen(HarvestLog $log)
    {
        $log->delete();
        return redirect()->route('manajemen.index')
            ->with('success', 'Data panen berhasil dihapus!');
    }
}
