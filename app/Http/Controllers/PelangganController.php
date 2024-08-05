<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $title = 'Pelanggan';
        $data = Pelanggan::getData();
        return view('pelanggan.index', compact('data', 'title'));
    }
    public function create()
    {
        $title = 'Tambah Pelanggan';
        return view('pelanggan.create', compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        if (Pelanggan::tambah($request->all())) {
            return redirect()->route('pelanggan.index')->withSuccess('Berhasil ditambahkan');
        }
        return redirect()->back()->withErrors(['kode' => 'Gagal menambahkan data'])->withInput();
    }
    public function edit(Pelanggan $pelanggan)
    {
        $title = 'Tambah Pelanggan';
        $pelanggan = $pelanggan->dekripsi();
        return view('pelanggan.edit', compact('title', 'pelanggan'));
    }
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        if ($pelanggan->edit($request->all())) {
            return redirect()->route('pelanggan.index')->withSuccess('Berhasil ditambahkan');
        }

        return redirect()->back()->withErrors(['kode' => 'Gagal menambahkan data'])->withInput();
    }
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->withSuccess('Berhasil dihapus');
    }
}
