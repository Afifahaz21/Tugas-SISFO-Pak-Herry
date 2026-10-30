<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with(['siswa.kelas', 'mapel'])->get();

        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $mapels = Mapel::all();

        return view('nilai.create', compact('siswas', 'mapels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mapel_id' => 'required|exists:mapels,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        $mapel = Mapel::findOrFail($validated['mapel_id']);

        $nilaiAkhir = ($validated['nilai_tugas'] * 0.3)
                    + ($validated['nilai_uts'] * 0.3)
                    + ($validated['nilai_uas'] * 0.4);

        $validated['nilai_akhir'] = $nilaiAkhir;
        $validated['keterangan'] = $nilaiAkhir >= $mapel->kkm
            ? 'Lulus'
            : 'Tidak Lulus';

        Nilai::create($validated);

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::all();
        $mapels = Mapel::all();

        return view('nilai.edit', compact('nilai', 'siswas', 'mapels'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mapel_id' => 'required|exists:mapels,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        $mapel = Mapel::findOrFail($validated['mapel_id']);

        $nilaiAkhir = ($validated['nilai_tugas'] * 0.3)
                    + ($validated['nilai_uts'] * 0.3)
                    + ($validated['nilai_uas'] * 0.4);

        $validated['nilai_akhir'] = $nilaiAkhir;
        $validated['keterangan'] = $nilaiAkhir >= $mapel->kkm
            ? 'Lulus'
            : 'Tidak Lulus';

        $nilai->update($validated);

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil dihapus.');
    }
}
