<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();

        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:50|unique:siswas,nis',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        return redirect()->route('siswa.index');
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nis' => [
                'required',
                'string',
                'max:50',
                Rule::unique('siswas', 'nis')->ignore($siswa->id),
            ],
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
