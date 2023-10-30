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
}
