<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $title = 'Pelanggan';
        $data = Penjualan::getData();
        return view('penjualan.index', compact('data', 'title'));
    }
    public function create()
    {
        $title = 'Tambah Pelanggan';
        $products = Produk::getData();
        $pelanggans = Pelanggan::getData();
        return view('penjualan.create', compact('title', 'products', 'pelanggans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'pelangganId' => 'required',
            'produkId' => 'required',
        ]);

        if (Penjualan::tambah($request->all())) {
            return redirect()->route('penjualan.index')->withSuccess('Berhasil ditambahkan');
        }
        return redirect()->back()->withErrors(['kode' => 'Gagal menambahkan data'])->withInput();
    }
    public function edit(Penjualan $penjualan)
    {
        $title = 'Tambah Penjualan';
        $penjualan = $penjualan->dekripsi();
        $products = Produk::getData();
        $pelanggans = Pelanggan::getData();
        return view('penjualan.edit', compact('title', 'penjualan', 'products', 'pelanggans'));
    }
    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'kode' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'pelangganId' => 'required',
            'produkId' => 'required',
        ]);

        if ($penjualan->edit($request->all())) {
            return redirect()->route('penjualan.index')->withSuccess('Berhasil ditambahkan');
        }

        return redirect()->back()->withErrors(['kode' => 'Gagal menambahkan data'])->withInput();
    }
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->withSuccess('Berhasil dihapus');
    }
}
