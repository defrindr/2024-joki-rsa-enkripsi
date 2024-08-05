@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('penjualan.create') }}" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <td>Kode</td>
                                <td>Tanggal</td>
                                <td>Jumlah</td>
                                <td>Pelanggan</td>
                                <td>Produk</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) == 0)
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @endif
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->pelanggan->dekripsi()->nama }}</td>
                                    <td>{{ $item->produk->dekripsi()->nama }}</td>
                                    <td>
                                        <a href="{{ route('penjualan.edit', $item) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('penjualan.destroy', $item) }}" method="POST"
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
