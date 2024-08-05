<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $title = 'Produk';
        $data = Produk::getData();
        return view('produk.index', compact('data', 'title'));
    }
    public function create()
    {
        $title = 'Tambah Produk';
        return view('produk.create', compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        if (Produk::tambah($request->all())) {
            return redirect()->route('produk.index')->withSuccess('Berhasil ditambahkan');
        }
        return redirect()->back()->withErrors(['kode' => 'Gagal menambahkan data'])->withInput();
    }
    public function edit(Produk $produk)
    {
        $title = 'Tambah Produk';
        $produk = $produk->dekripsi();
        return view('produk.edit', compact('title', 'produk'));
    }
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        if ($produk->edit($request->all())) {
            return redirect()->route('produk.index')->withSuccess('Berhasil ditambahkan');
        }

        return redirect()->back()->withErrors(['kode' => 'Gagal menambahkan data'])->withInput();
    }
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->withSuccess('Berhasil dihapus');
    }
}
