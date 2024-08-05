<?php

namespace App\Models;

use App\Helpers\RSA;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    // protected $fillable = [
    //     'kode',
    //     'nama',
    //     'harga',
    //     'stok',
    // ];


    public static function tambah($payload)
    {
        try {
            $instance = new Produk();
            $instance->enkripsi($payload);
            return $instance->save();
        } catch (\Throwable $th) {
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
        $produks = Produk::all();

        foreach ($produks as $index => $p) {
            $produks[$index] = $produks[$index]->dekripsi();
        }

        return $produks;
    }

    public function enkripsi($payload)
    {
        $kunci = RSA::cariKunci(17, 11);
        $this->kode = RSA::enkripsi($payload['kode'], $kunci['n'], $kunci['d']);
        $this->nama = RSA::enkripsi($payload['nama'], $kunci['n'], $kunci['d']);
        $this->harga = RSA::enkripsi($payload['harga'], $kunci['n'], $kunci['d']);
        $this->stok = RSA::enkripsi($payload['stok'], $kunci['n'], $kunci['d']);
    }

    public function dekripsi()
    {
        $kunci = RSA::cariKunci(17, 11);
        $this->kode = RSA::dekripsi($this->kode, $kunci['n'], $kunci['e']);
        $this->nama = RSA::dekripsi($this->nama, $kunci['n'], $kunci['e']);
        $this->harga = RSA::dekripsi($this->harga, $kunci['n'], $kunci['e']);
        $this->stok = RSA::dekripsi($this->stok, $kunci['n'], $kunci['e']);

        return $this;
    }
}
