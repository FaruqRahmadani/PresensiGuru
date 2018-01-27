<?php
namespace App\Helpers;

use App\Absensi;

class RekapAbsensi {
    public static function Count($IdSekolah, $Tahun, $Bulan, $IdPegawai, $IdKategoriAbsensi){
      return count(
                  Absensi::where('sekolah_id', $IdSekolah)
                              ->whereYear('tanggal', $Tahun)
                              ->whereMonth('tanggal', $Bulan)
                              ->where('pegawai_id', $IdPegawai)
                              ->where('kategori_absen_id', $IdKategoriAbsensi)
                              ->get()
                  );
    }
}
