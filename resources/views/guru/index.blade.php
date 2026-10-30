@extends('layouts.main')

@section('title', 'Data Guru')

@section('content')
<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-chalkboard-teacher text-primary"></i>
            Data Guru
        </h1>

        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus"></i> Tambah Guru
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
                Daftar Guru / Tenaga Pendidik
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                    <thead style="background-color: #4e73df; color: white;">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($guru as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="badge badge-secondary">
                                        {{ $item->nip }}
                                    </span>
                                </td>

                                <td>
                                    <strong>{{ $item->nama }}</strong>
                                </td>

                                <td>
                                    @if ($item->jenis_kelamin == 'L')
                                        <span class="badge badge-primary">Laki-Laki</span>
                                    @elseif ($item->jenis_kelamin == 'P')
                                        <span class="badge badge-danger">Perempuan</span>
                                    @else
                                        {{ $item->jenis_kelamin }}
                                    @endif
                                </td>

                                <td>{{ $item->email ?? '-' }}</td>

                                <td>{{ $item->no_hp ?? '-' }}</td>

                                <td class="text-center text-nowrap">
                                    <a href="{{ route('guru.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('guru.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">
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
                                    <i class="fas fa-info-circle"></i>
                                    Belum ada data guru.
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