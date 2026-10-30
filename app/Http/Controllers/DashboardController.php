<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $totalMapel = Mapel::count();

        $recentSiswa = Siswa::with('kelas')
            ->orderBy('id', 'asc')
            ->take(5)
            ->get();

        $recentNilai = Nilai::with(['siswa', 'mapel'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalMapel',
            'recentSiswa',
            'recentNilai'
        ));
    }
}