
@extends('layouts.main')

@section('title', 'Edit Data Mata Pelajaran')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Mata Pelajaran</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Mapel</h6>
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

            <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kode_mapel">Kode Mapel</label>
                    <input type="text" name="kode_mapel" id="kode_mapel"
                           class="form-control"
                           value="{{ old('kode_mapel', $mapel->kode_mapel) }}" required>
                </div>

                <div class="form-group">
                    <label for="nama_mapel">Nama Mapel</label>
                    <input type="text" name="nama_mapel" id="nama_mapel"
                           class="form-control"
                           value="{{ old('nama_mapel', $mapel->nama_mapel) }}" required>
                </div>

                <div class="form-group">
                    <label for="kkm">Nilai KKM</label>
                    <input type="number" name="kkm" id="kkm"
                           class="form-control"
                           value="{{ old('kkm', $mapel->kkm) }}"
                           min="0" max="100" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>

                <a href="{{ route('mapel.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
