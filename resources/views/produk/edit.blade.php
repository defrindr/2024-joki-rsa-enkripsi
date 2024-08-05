@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('produk.update', $produk) }}" method="post" class="form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" value="{{ old('kode') ?? $produk->kode }}"
                                class="form-control @error('kode') is-invalid @enderror ">
                            @error('kode')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama"
                                value="{{ old('nama') ?? $produk->nama }}"
                                class="form-control @error('nama') is-invalid @enderror ">
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="number" name="harga" id="harga"
                                value="{{ old('harga') ?? $produk->harga }}"
                                class="form-control @error('harga') is-invalid @enderror ">
                            @error('harga')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok"
                                value="{{ old('stok') ?? $produk->stok }}"
                                class="form-control @error('stok') is-invalid @enderror ">
                            @error('stok')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
