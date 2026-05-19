<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index(Request $request)
    {
        $query = Farmer::query();

        if ($request->filled('cari')) {
            $search = $request->cari;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status_ketersediaan', $request->status);
        }

        $farmers = $query->orderBy('created_at', 'desc')->get();

        $stats = [
            'total' => Farmer::count(),
            'ada_bibit' => Farmer::where('status_ketersediaan', 'ada_sisa_bibit')->count(),
            'butuh_bibit' => Farmer::where('status_ketersediaan', 'butuh_bibit')->count(),
        ];

        return view('distribusi.index', compact('farmers', 'stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status_ketersediaan' => 'required|in:ada_sisa_bibit,butuh_bibit,tidak_tersedia',
            'catatan' => 'nullable|string|max:500',
        ]);

        Farmer::create($request->only('nama', 'lokasi', 'kontak', 'status_ketersediaan', 'catatan'));

        return redirect()->route('distribusi.index')
            ->with('success', 'Peternak berhasil ditambahkan!');
    }

    public function update(Farmer $farmer, Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status_ketersediaan' => 'required|in:ada_sisa_bibit,butuh_bibit,tidak_tersedia',
            'catatan' => 'nullable|string|max:500',
        ]);

        $farmer->update($request->only('nama', 'lokasi', 'kontak', 'status_ketersediaan', 'catatan'));

        return redirect()->route('distribusi.index')
            ->with('success', 'Data peternak berhasil diperbarui!');
    }

    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        return redirect()->route('distribusi.index')
            ->with('success', 'Data peternak berhasil dihapus!');
    }
}
