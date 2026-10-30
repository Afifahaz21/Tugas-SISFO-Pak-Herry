@extends('layouts.main')

@section('title', 'Data Siswa')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-graduate text-primary"></i>
            Data Siswa
        </h1>

        <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Siswa Terdaftar
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                    <thead style="background-color: #4e73df; color: white;">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>No HP</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="badge badge-secondary">
                                        {{ $item->nis }}
                                    </span>
                                </td>

                                <td>
                                    <strong>{{ $item->nama }}</strong>
                                </td>

                                <td>
                                    @if ($item->jenis_kelamin == 'L')
                                        <span class="badge badge-primary">Laki-Laki</span>
                                    @else
                                        <span class="badge badge-danger">Perempuan</span>
                                    @endif
                                </td>

                                <td>
                                    <span class="badge badge-info">
                                        {{ $item->kelas->nama_kelas ?? '-' }}
                                    </span>
                                </td>

                                <td>{{ $item->no_hp ?? '-' }}</td>

                                <td class="text-center text-nowrap">
                                    <a href="{{ route('siswa.show', $item->id) }}"
                                       class="btn btn-info btn-sm"
                                       title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('siswa.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('siswa.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
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
                                <td colspan="7" class="text-center">
                                    Belum ada data siswa.
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