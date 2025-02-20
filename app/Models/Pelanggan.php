<?php

namespace App\Models;

use App\Helpers\RSA;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    // protected $fillable = [
    //     'kode', 'nama', 'alamat', 'no_telp'
    // ];

    public static function tambah($payload)
    {
        try {
            $instance = new Pelanggan();
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
        $pelanggans = Pelanggan::all();

        foreach ($pelanggans as $index => $p) {
            $pelanggans[$index] = $pelanggans[$index]->dekripsi();
        }

        return $pelanggans;
    }

    public function enkripsi($payload)
    {
        $kunci = RSA::cariKunci(17, 11);
        $this->kode = RSA::enkripsi($payload['kode'], $kunci['n'], $kunci['d']);
        $this->nama = RSA::enkripsi($payload['nama'], $kunci['n'], $kunci['d']);
        $this->alamat = RSA::enkripsi($payload['alamat'], $kunci['n'], $kunci['d']);
        $this->no_telp = RSA::enkripsi($payload['no_telp'], $kunci['n'], $kunci['d']);
    }

    public function dekripsi()
    {
        $kunci = RSA::cariKunci(17, 11);
        $this->kode = RSA::dekripsi($this->kode, $kunci['n'], $kunci['e']);
        $this->nama = RSA::dekripsi($this->nama, $kunci['n'], $kunci['e']);
        $this->alamat = RSA::dekripsi($this->alamat, $kunci['n'], $kunci['e']);
        $this->no_telp = RSA::dekripsi($this->no_telp, $kunci['n'], $kunci['e']);

        return $this;
    }
}
