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
    $pecah   = explode("-", $date);
    $tahun = $pecah[0];
    $bulan   = $pecah[1];
    $tanggal   = $pecah[2];
    return $tanggal . '/' . $bulan . '/' . $tahun;
  }

  public static function change_date2($date)
  {
    $pecah   = explode("/", $date);
    $tanggal = $pecah[0];
    $bulan   = $pecah[1];
    $tahun   = $pecah[2];
    return $tahun . '-' . $bulan . '-' . $tanggal;
  }
}
