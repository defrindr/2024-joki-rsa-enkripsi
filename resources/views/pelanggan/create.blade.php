@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pelanggan.store') }}" method="post" class="form">
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
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
                                class="form-control @error('alamat') is-invalid @enderror ">
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}"
                                class="form-control @error('no_telp') is-invalid @enderror ">
                            @error('no_telp')
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
