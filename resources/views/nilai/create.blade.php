@extends('layouts.main')

@section('title', 'Input Nilai Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-star text-primary mr-2"></i>Input Nilai Siswa
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Nilai</h6>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="siswa_id">Pilih Siswa</label>
                    <select name="siswa_id" id="siswa_id" class="form-control" required>
                        <option value="">-- Pilih Siswa --</option>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}"
                                {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->nis }} - {{ $siswa->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="mapel_id">Pilih Mata Pelajaran</label>
                    <select name="mapel_id" id="mapel_id" class="form-control" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach ($mapels as $mapel)
                            <option value="{{ $mapel->id }}"
                                {{ old('mapel_id') == $mapel->id ? 'selected' : '' }}>
                                {{ $mapel->kode_mapel }} - {{ $mapel->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nilai_tugas">Nilai Tugas (30%)</label>
                    <input type="number" name="nilai_tugas" id="nilai_tugas"
                           class="form-control" min="0" max="100"
                           value="{{ old('nilai_tugas') }}" required>
                </div>

                <div class="form-group">
                    <label for="nilai_uts">Nilai UTS (30%)</label>
                    <input type="number" name="nilai_uts" id="nilai_uts"
                           class="form-control" min="0" max="100"
                           value="{{ old('nilai_uts') }}" required>
                </div>

                <div class="form-group">
                    <label for="nilai_uas">Nilai UAS (40%)</label>
                    <input type="number" name="nilai_uas" id="nilai_uas"
                           class="form-control" min="0" max="100"
                           value="{{ old('nilai_uas') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan Nilai
                </button>

                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
