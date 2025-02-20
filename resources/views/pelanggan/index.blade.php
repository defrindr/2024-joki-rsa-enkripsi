@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <td>Kode</td>
                                <td>Nama</td>
                                <td>Alamat</td>
                                <td>No Telp</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) == 0)
                                <tr>
                                    <td colspan="5" class="text-center">Data Kosong</td>
                                </tr>
                            @endif
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>
                                        <a href="{{ route('pelanggan.edit', $item) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('pelanggan.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Yakin ?')" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
