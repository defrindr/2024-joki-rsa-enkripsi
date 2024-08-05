@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="post" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" value="{{ old('kode') }}"
                                class="form-control @error('kode') is-invalid @enderror ">
                            @error('kode')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                class="form-control @error('nama') is-invalid @enderror ">
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" value="{{ old('harga') }}"
                                class="form-control @error('harga') is-invalid @enderror ">
                            @error('harga')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" value="{{ old('stok') }}"
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
