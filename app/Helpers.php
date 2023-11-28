<?php

namespace App\Helpers;

class Helper
{
  public static function currentDay()
  {
    date_default_timezone_set('Asia/Jakarta');
    $week = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $day = date("w");
    $today = $week[$day];
    return $today;
  }

  public static function currentDate()
  {
    date_default_timezone_set("Asia/Jakarta");
    $dateNow = date('Y-m-d H:i:s');
    return $dateNow;
  }

  public static function change_date1($date)
  {
    $pecah = explode("-", $date);
    $tahun = $pecah[0];
    $bulan = $pecah[1];
    $tanggal = $pecah[2];
    return $tanggal . '/' . $bulan . '/' . $tahun;
  }

  public static function change_date2($date)
  {
    $pecah = explode("/", $date);
    $tanggal = $pecah[0];
    $bulan = $pecah[1];
    $tahun = $pecah[2];
    return $tahun . '-' . $bulan . '-' . $tanggal;
  }

  function tgl_indo($tgl)
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d', strtotime($tgl));
    $pecah = explode("-", $date);
    $tanggal = $pecah[2];
    $bulan = bulan($pecah[1]);
    $tahun = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
  }

}

if (!function_exists('bulan')) {
  function bulan($bln)
  {
    switch ($bln) {
      case 1:
        return "Januari";
        break;
      case 2:
        return "Februari";
        break;
      case 3:
        return "Maret";
        break;
      case 4:
        return "April";
        break;
      case 5:
        return "Mei";
        break;
      case 6:
        return "Juni";
        break;
      case 7:
        return "Juli";
        break;
      case 8:
        return "Agustus";
        break;
      case 9:
        return "September";
        break;
      case 10:
        return "Oktober";
        break;
      case 11:
        return "Nopember";
        break;
      case 12:
        return "Desember";
        break;
    }
  }
}