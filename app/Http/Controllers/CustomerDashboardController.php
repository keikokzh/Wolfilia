<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\SeedRequest;
use App\Models\HarvestPrediction;
use App\Models\HarvestLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerDashboardController extends Controller
{
    /**
     * Dashboard Utama — Tampilkan tren dan stats
     */
    public function index()
    {
        $user = auth()->user();

        // Customer's seed requests
        $myRequests = SeedRequest::where('user_id', $user->id)->get();
        // Available seeds from farmers
        $availableSeeds = Farmer::where('status_ketersediaan', 'ada_sisa_bibit')->get();
        $totalPanenKg = HarvestLog::where('user_id', $user->id)->sum('berat_kg');
        $totalBibitGram = HarvestPrediction::where('user_id', $user->id)->sum('berat_bibit_gram');
        $siklusAktif = HarvestPrediction::where('user_id', $user->id)->where('status', '!=', 'sudah_panen')->count();

        // Stats
        $stats = [
            'total_panen_kg' => $totalPanenKg,
            'total_bibit_gram' => $totalBibitGram,
            'siklus_aktif' => $siklusAktif,
            'total_requests' => $myRequests->count(),
            'pending' => $myRequests->where('status', 'pending')->count(),
            'tersedia' => $myRequests->where('status', 'tersedia')->count(),
            'selesai' => $myRequests->where('status', 'selesai')->count(),
            'available_farmers' => $availableSeeds->count(),
        ];

        // Chart Data (30 Hari Terakhir - Khusus Customer)
        $chartData = HarvestLog::where('user_id', $user->id)
            ->where('tanggal_panen', '>=', Carbon::now()->subDays(30))
            ->selectRaw("tanggal_panen, SUM(berat_kg) as total_kg")
            ->groupBy('tanggal_panen')
            ->orderBy('tanggal_panen')
            ->get();

        return view('customer.dashboard', compact('stats', 'chartData'));
    }

    /**
     * Katalog Ikan — Tampilkan katalog ikan peternakan
     */
    public function katalog()
    {
        return view('customer.katalog');
    }

    /**
     * Manajemen Panen — Kalkulator & Log Panen
     */
    public function manajemen(Request $request)
    {
        $user = auth()->user();

        // Predictions
        $predictions = HarvestPrediction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Update prediction statuses automatically
        $today = Carbon::today();
        foreach ($predictions as $prediction) {
            if ($prediction->status === 'menunggu' && $today->gte($prediction->prediksi_panen_awal)) {
                $prediction->update(['status' => 'siap_panen']);
            }
        }

        // Harvest Logs
        $harvestLogs = HarvestLog::where('user_id', $user->id)
            ->orderBy('tanggal_panen', 'desc')
            ->take(30)
            ->get();

        // For editing log
        $log = null;
        if ($request->has('edit_log_id')) {
            $log = HarvestLog::where('user_id', $user->id)->find($request->edit_log_id);
        }

        return view('customer.manajemen', compact('predictions', 'harvestLogs', 'log'));
    }

    /**
     * Request Bibit — Form & Riwayat Permintaan
     */
    public function requestBibit()
    {
        $user = auth()->user();
        
        $myRequests = SeedRequest::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $availableSeeds = Farmer::where('status_ketersediaan', 'ada_sisa_bibit')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'available_farmers' => $availableSeeds->count(),
            'my_requests' => $myRequests->count(),
        ];

        return view('customer.request', compact('myRequests', 'availableSeeds', 'stats'));
    }

    // ── LOGIC REQUEST BIBIT ──

    public function storeSeedRequest(Request $request)
    {
        $request->validate([
            'jenis_bibit' => 'required|string|max:255',
            'jumlah_gram' => 'required|numeric|min:1',
            'keterangan' => 'nullable|string|max:500',
        ]);

        SeedRequest::create([
            'user_id' => auth()->id(),
            'jenis_bibit' => $request->jenis_bibit,
            'jumlah_gram' => $request->jumlah_gram,
            'keterangan' => $request->keterangan,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.request')
            ->with('success', 'Permintaan bibit berhasil dikirim! Admin akan segera memproses.');
    }

    public function deleteSeedRequest(SeedRequest $seedRequest)
    {
        if ($seedRequest->user_id !== auth()->id()) abort(403);

        if ($seedRequest->status !== 'pending') {
            return redirect()->route('customer.request')
                ->withErrors(['request' => 'Hanya permintaan dengan status "Menunggu" yang bisa dibatalkan.']);
        }

        $seedRequest->delete();

        return redirect()->route('customer.request')
            ->with('success', 'Permintaan bibit berhasil dibatalkan.');
    }

    // ── LOGIC KALKULATOR PREDIKSI ──

    public function hitungPrediksi(Request $request)
    {
        $request->validate([
            'tanggal_tebar' => 'required|date',
            'berat_bibit_gram' => 'required|numeric|min:0.1',
        ]);

        $tanggalTebar = Carbon::parse($request->tanggal_tebar);
        $beratBibit = $request->berat_bibit_gram;

        $prediksiAwal = $tanggalTebar->copy()->addHours(24);
        $prediksiAkhir = $tanggalTebar->copy()->addHours(48);
        $estimasiHasil = $beratBibit * 2;

        HarvestPrediction::create([
            'user_id' => auth()->id(),
            'tanggal_tebar' => $tanggalTebar,
            'berat_bibit_gram' => $beratBibit,
            'prediksi_panen_awal' => $prediksiAwal,
            'prediksi_panen_akhir' => $prediksiAkhir,
            'estimasi_hasil_gram' => $estimasiHasil,
            'status' => 'menunggu',
        ]);

        return redirect()->route('customer.manajemen')
            ->with('success', 'Prediksi panen berhasil dihitung! Panen diperkirakan antara ' .
                $prediksiAwal->format('d M Y H:i') . ' — ' . $prediksiAkhir->format('d M Y H:i'));
    }

    public function updateStatusPrediksi(HarvestPrediction $prediction, Request $request)
    {
        if ($prediction->user_id !== auth()->id()) abort(403);

        $request->validate(['status' => 'required|in:menunggu,siap_panen,sudah_panen']);
        $prediction->update(['status' => $request->status]);

        return redirect()->route('customer.manajemen')
            ->with('success', 'Status prediksi berhasil diperbarui.');
    }

    public function hapusPrediksi(HarvestPrediction $prediction)
    {
        if ($prediction->user_id !== auth()->id()) abort(403);
        
        $prediction->delete();
        return redirect()->route('customer.manajemen')
            ->with('success', 'Prediksi berhasil dihapus.');
    }

    // ── LOGIC LOG PANEN ──

    public function simpanPanen(Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'berat_kg' => 'required|numeric|min:0.01',
            'keterangan' => 'nullable|string|max:255',
        ]);

        HarvestLog::create([
            'user_id' => auth()->id(),
            'tanggal_panen' => $request->tanggal_panen,
            'berat_kg' => $request->berat_kg,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('customer.manajemen')
            ->with('success', 'Data panen berhasil disimpan!');
    }

    public function editPanen(HarvestLog $log)
    {
        if ($log->user_id !== auth()->id()) abort(403);
        return redirect()->route('customer.manajemen', ['edit_log_id' => $log->id]);
    }

    public function updatePanen(HarvestLog $log, Request $request)
    {
        if ($log->user_id !== auth()->id()) abort(403);

        $request->validate([
            'tanggal_panen' => 'required|date',
            'berat_kg' => 'required|numeric|min:0.01',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $log->update($request->only('tanggal_panen', 'berat_kg', 'keterangan'));

        return redirect()->route('customer.manajemen')
            ->with('success', 'Data panen berhasil diperbarui!');
    }

    public function hapusPanen(HarvestLog $log)
    {
        if ($log->user_id !== auth()->id()) abort(403);
        
        $log->delete();
        return redirect()->route('customer.manajemen')
            ->with('success', 'Data panen berhasil dihapus!');
    }
}
