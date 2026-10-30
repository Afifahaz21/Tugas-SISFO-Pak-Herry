<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();

        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|string|max:50|unique:mapels,kode_mapel',
            'nama_mapel' => 'required|string|max:255',
            'kkm' => 'required|numeric|min:0|max:100',
        ]);

        Mapel::create($validated);

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $validated = $request->validate([
            'kode_mapel' => [
                'required',
                'string',
                'max:50',
                Rule::unique('mapels', 'kode_mapel')->ignore($mapel->id),
            ],
            'nama_mapel' => 'required|string|max:255',
            'kkm' => 'required|numeric|min:0|max:100',
        ]);

        $mapel->update($validated);

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil dihapus.');
    }
}
