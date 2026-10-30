
@extends('layouts.main')

@section('title', 'Data Kelas')

@section('content')
<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-door-open text-primary mr-2"></i>
            Data Kelas
        </h1>

        <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm mr-1"></i> Tambah Kelas
        </a>
    </div>

    {{-- Pesan berhasil --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan gagal --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Kelas SISFO Akademik
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">

                    <thead class="text-white" style="background-color: #4e73df;">
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Tahun Ajaran</th>
                            <th>Jumlah Siswa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kelas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong class="text-primary">
                                        {{ $item->nama_kelas }}
                                    </strong>
                                </td>

                                <td>
                                    <span class="badge badge-info">
                                        {{ $item->tingkat }}
                                    </span>
                                </td>

                                <td>{{ $item->jurusan }}</td>

                                <td>{{ $item->tahun_ajaran }}</td>

                                <td>
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-user-graduate"></i>
                                        {{ $item->siswas_count }} Siswa
                                    </span>
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('kelas.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('kelas.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Belum ada data kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
@endsection
