@extends('layouts.main')

@section('title', 'Data Mata Pelajaran')

@section('content')
<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-book text-primary mr-2"></i>
            Data Mata Pelajaran
        </h1>

        <a href="{{ route('mapel.create') }}"
           class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm mr-1"></i>
            Tambah Mapel
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
                Daftar Mata Pelajaran
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead style="background-color: #4e73df; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>KKM Minimum</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($mapel as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="badge badge-secondary">
                                        {{ $item->kode_mapel }}
                                    </span>
                                </td>

                                <td>{{ $item->nama_mapel }}</td>

                                <td>
                                    <span class="badge badge-warning"
                                          style="color: #000 !important;">
                                        {{ $item->kkm }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('mapel.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('mapel.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')">
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
                                <td colspan="5" class="text-center py-4">
                                    Belum ada data mata pelajaran.
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