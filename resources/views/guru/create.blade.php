```blade
@extends('layouts.main')

@section('title', 'Tambah Data Guru')

@section('content')
<div class="container-fluid">

    {{-- Judul halaman --}}
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-plus text-primary mr-2"></i>
        Tambah Data Guru
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Tambah Guru / Tenaga Pendidik
            </h6>
        </div>

        <div class="card-body">

            {{-- Menampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali input kamu:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('guru.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text"
                           name="nip"
                           id="nip"
                           class="form-control"
                           value="{{ old('nip') }}"
                           placeholder="Masukkan NIP guru"
                           maxlength="50"
                           required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           value="{{ old('nama') }}"
                           placeholder="Masukkan nama lengkap guru"
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
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="contoh@email.com">
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text"
                           name="no_hp"
                           id="no_hp"
                           class="form-control"
                           value="{{ old('no_hp') }}"
                           placeholder="Masukkan nomor HP">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat"
                              id="alamat"
                              class="form-control"
                              rows="3"
                              placeholder="Masukkan alamat guru">{{ old('alamat') }}</textarea>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>

                <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </form>

        </div>
    </div>

</div>
@endsection
```