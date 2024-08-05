<?php

namespace App\Models;

use App\Helpers\RSA;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    // kode
    // tanggal
    // jumlah
    // pelangganId
    // produkId

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, "pelangganId");
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, "produkId");
    }


    public static function tambah($payload)
    {
        try {
            $instance = new Penjualan();
            $instance->enkripsi($payload);

            // tidak ikut di enkripsi
            $instance->pelangganId = $payload['pelangganId'];
            $instance->produkId = $payload['produkId'];
            return $instance->save();
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }

    public function edit($payload)
    {
        try {
            $this->enkripsi($payload);
            return $this->save();
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function getData()
    {
        $produks = Penjualan::all();

        foreach ($produks as $index => $p) {
            $produks[$index] = $produks[$index]->dekripsi();
        }

        return $produks;
    }

    public function enkripsi($payload)
    {
        $kunci = RSA::cariKunci(17, 11);
        $this->kode = RSA::enkripsi($payload['kode'], $kunci['n'], $kunci['d']);
        $this->tanggal = RSA::enkripsi($payload['tanggal'], $kunci['n'], $kunci['d']);
        $this->jumlah = RSA::enkripsi($payload['jumlah'], $kunci['n'], $kunci['d']);
    }

    public function dekripsi()
    {
        $kunci = RSA::cariKunci(17, 11);
        $this->kode = RSA::dekripsi($this->kode, $kunci['n'], $kunci['e']);
        $this->tanggal = RSA::dekripsi($this->tanggal, $kunci['n'], $kunci['e']);
        $this->jumlah = RSA::dekripsi($this->jumlah, $kunci['n'], $kunci['e']);

        return $this;
    }
}
