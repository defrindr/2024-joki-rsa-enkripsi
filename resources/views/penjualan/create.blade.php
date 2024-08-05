@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('penjualan.store') }}" method="post" class="form">
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
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}"
                                class="form-control @error('tanggal') is-invalid @enderror ">
                            @error('tanggal')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}"
                                class="form-control @error('jumlah') is-invalid @enderror ">
                            @error('jumlah')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="produkId">Produk</label>
                            <select name="produkId" id="produkId"
                                class="form-control @error('stok') is-invalid @enderror ">
                                <option value=""> -- Pilih -- </option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == old('produkId')) selected @endif>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('produkId')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pelangganId">Pelanggan</label>
                            <select name="pelangganId" id="pelangganId"
                                class="form-control @error('stok') is-invalid @enderror ">
                                <option value=""> -- Pilih -- </option>
                                @foreach ($pelanggans as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == old('pelangganId')) selected @endif>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('pelangganId')
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
