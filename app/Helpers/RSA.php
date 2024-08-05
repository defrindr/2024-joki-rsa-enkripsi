<?php

namespace App\Helpers;

class RSA
{
  public static function enkripsi($plainText, $n, $publicKey)
  {
    $hasil_enkripsi = "";
    $listChar = str_split($plainText);

    for ($i = 0; $i < count($listChar); $i++) {
      $ascii = ord($listChar[$i]);
      $faktor = bcpowmod($ascii, $publicKey, $n);
      $hasil_enkripsi .= $faktor . " ";
    }

    return trim($hasil_enkripsi);
  }

  public static function dekripsi($cipherText, $n, $privateKey)
  {
    $hasil_enkripsi = explode(" ", $cipherText);
    $kalimat = "";

    for ($i = 0; $i < count($hasil_enkripsi); $i++) {
      $ascii = bcpowmod($hasil_enkripsi[$i], $privateKey, $n);
      $kalimat .= chr($ascii);
    }

    return $kalimat;
  }

  public static function cariKunci($p, $q)
  {
    // 1.	Menentukan dua bilangan prima p, dan q
    // dari parameter

    // 2.	Hitung modulus n dan fungsi euler’s totient φ (n)
    $n = $p * $q;

    // 3.	Hitung φ(n) = (p-1)(q-1) :
    $en = ($p - 1) * ($q - 1);

    // 4.	Pilih e (kunci publik) yang relatif prima dengan φ(n):
    $e = $p + 1;                        //      <--- Nilai umum yang sering digunakan
    while (self::fpb($e, $en) != 1) { //      <--- Periksa apakah e relatif prima dengan etN
      $e++;
    }

    // 5.	Hitung d (kunci privat) sehingga (d*e) mod φ(n) = 1:
    $d = $p + $q;
    while ((($d * $e) % $en) != 1) { //      <--- Periksa apakah e relatif prima dengan etN
      $d++;
    }

    return [$n, $e, $d];
  }

  protected static function fpb($a, $b)
  {
    while ($b != 0) {
      $t = $b;
      $b = $a % $b;
      $a = $t;
    }
    return $a;
  }
}
