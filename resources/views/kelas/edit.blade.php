
@extends('layouts.main')

@section('title', 'Edit Data Kelas')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kelas</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Kelas</h6>
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

            <form action="{{ route('kelas.update', $kela->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas"
                           class="form-control"
                           value="{{ old('nama_kelas', $kela->nama_kelas) }}" required>
                </div>

                <div class="form-group">
                    <label for="tingkat">Tingkat</label>
                    <input type="text" name="tingkat" id="tingkat"
                           class="form-control"
                           value="{{ old('tingkat', $kela->tingkat) }}" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan"
                           class="form-control"
                           value="{{ old('jurusan', $kela->jurusan) }}" required>
                </div>

                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" id="tahun_ajaran"
                           class="form-control"
                           value="{{ old('tahun_ajaran', $kela->tahun_ajaran) }}"
                           placeholder="Contoh: 2026/2027" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>

                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
