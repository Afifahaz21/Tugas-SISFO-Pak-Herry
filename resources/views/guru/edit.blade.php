```blade
@extends('layouts.main')

@section('title', 'Edit Data Guru')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-edit text-primary mr-2"></i>
        Edit Data Guru
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Edit Guru / Tenaga Pendidik
            </h6>
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

            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text"
                           name="nip"
                           id="nip"
                           class="form-control"
                           value="{{ old('nip', $guru->nip) }}"
                           maxlength="50"
                           required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           value="{{ old('nama', $guru->nama) }}"
                           maxlength="255"
                           required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                            id="jenis_kelamin"
                            class="form-control"
                            required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           value="{{ old('email', $guru->email) }}">
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text"
                           name="no_hp"
                           id="no_hp"
                           class="form-control"
                           value="{{ old('no_hp', $guru->no_hp) }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat"
                              id="alamat"
                              class="form-control"
                              rows="3">{{ old('alamat', $guru->alamat) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                </button>

                <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
```