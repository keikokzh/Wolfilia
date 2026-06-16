<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FishCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FishCatalogController extends Controller
{
    public function index()
    {
        $fishes = FishCatalog::all();
        return view('admin.catalog.index', compact('fishes'));
    }

    public function create()
    {
        return view('admin.catalog.form');
    }

    public function store(Request $request)
    {
        $this->prepareArrayData($request);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'popularity_badge' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'whatsapp_text' => 'nullable|string',
            'habitat' => 'nullable|array',
            'cycle' => 'nullable|array',
            'advantages' => 'nullable|array',
            'pricing' => 'nullable|array',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('katalog', 'public');
            $data['image'] = $imagePath;
        }

        unset($data['image_file']);
        FishCatalog::create($data);

        return redirect()->route('admin.catalog.index')->with('success', 'Katalog ikan berhasil ditambahkan.');
    }

    public function edit(FishCatalog $catalog)
    {
        return view('admin.catalog.form', compact('catalog'));
    }

    public function update(Request $request, FishCatalog $catalog)
    {
        $this->prepareArrayData($request);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'popularity_badge' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'whatsapp_text' => 'nullable|string',
            'habitat' => 'nullable|array',
            'cycle' => 'nullable|array',
            'advantages' => 'nullable|array',
            'pricing' => 'nullable|array',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            if ($catalog->image) {
                Storage::disk('public')->delete($catalog->image);
            }
            $imagePath = $request->file('image_file')->store('katalog', 'public');
            $data['image'] = $imagePath;
        }

        unset($data['image_file']);
        $catalog->update($data);

        return redirect()->route('admin.catalog.index')->with('success', 'Katalog ikan berhasil diperbarui.');
    }

    public function destroy(FishCatalog $catalog)
    {
        if ($catalog->image) {
            Storage::disk('public')->delete($catalog->image);
        }
        $catalog->delete();

        return redirect()->route('admin.catalog.index')->with('success', 'Katalog ikan berhasil dihapus.');
    }

    private function prepareArrayData(Request $request)
    {
        // Advantages
        if ($request->has('advantages') && is_array($request->advantages)) {
            $adv = array_filter($request->advantages, fn($val) => !empty(trim($val)));
            $request->merge(['advantages' => empty($adv) ? null : array_values($adv)]);
        } else {
            $request->merge(['advantages' => null]);
        }

        // Habitat
        if ($request->has('habitat_keys') && $request->has('habitat_values')) {
            $habitat = [];
            foreach ($request->habitat_keys as $index => $key) {
                if (!empty(trim($key)) && isset($request->habitat_values[$index]) && !empty(trim($request->habitat_values[$index]))) {
                    $habitat[trim($key)] = trim($request->habitat_values[$index]);
                }
            }
            $request->merge(['habitat' => empty($habitat) ? null : $habitat]);
        } else {
            $request->merge(['habitat' => null]);
        }

        // Cycle
        if ($request->has('cycle_keys') && $request->has('cycle_values')) {
            $cycle = [];
            foreach ($request->cycle_keys as $index => $key) {
                if (!empty(trim($key)) && isset($request->cycle_values[$index]) && !empty(trim($request->cycle_values[$index]))) {
                    $cycle[trim($key)] = trim($request->cycle_values[$index]);
                }
            }
            $request->merge(['cycle' => empty($cycle) ? null : $cycle]);
        } else {
            $request->merge(['cycle' => null]);
        }

        // Pricing
        if ($request->has('pricing_kategori')) {
            $pricing = [];
            foreach ($request->pricing_kategori as $index => $kat) {
                if (!empty(trim($kat))) {
                    $pricing[] = [
                        'kategori' => trim($kat),
                        'ukuran' => trim($request->pricing_ukuran[$index] ?? ''),
                        'isi' => trim($request->pricing_isi[$index] ?? ''),
                        'cocok' => trim($request->pricing_cocok[$index] ?? ''),
                        'harga' => trim($request->pricing_harga[$index] ?? '')
                    ];
                }
            }
            $request->merge(['pricing' => empty($pricing) ? null : $pricing]);
        } else {
            $request->merge(['pricing' => null]);
        }
    }
}
