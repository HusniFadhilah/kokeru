<?php

namespace App\Libraries;

use Illuminate\Support\Str;

/**
 * Format response.
 */
class Date
{
    public static function pukul($date)
    {
        $d = substr($date, 11, 5);
        return $d;
    }

    public static function tanggal($date)
    {
        $d = substr($date, 8, 2);
        return $d;
    }

    public static function bulan($date)
    {
        $m = substr($date, 5, 2);
        switch ($m) {
            case 1:
                return "Januari";
            case 2:
                return "Februari";
            case 3:
                return "Maret";
            case 4:
                return "April";
            case 5:
                return "Mei";
            case 6:
                return "Juni";
            case 7:
                return "Juli";
            case 8:
                return "Agustus";
            case 9:
                return "September";
            case 10:
                return "Oktober";
            case 11:
                return "November";
            case 12:
                return "Desember";
        }
    }

    public static function month($date)
    {
        $m = substr($date, 5, 2);
        switch ($m) {
            case 1:
                return "Jan";
            case 2:
                return "Feb";
            case 3:
                return "Mar";
            case 4:
                return "Apr";
            case 5:
                return "Mei";
            case 6:
                return "Jun";
            case 7:
                return "Jul";
            case 8:
                return "Aug";
            case 9:
                return "Sep";
            case 10:
                return "Oct";
            case 11:
                return "Nov";
            case 12:
                return "Des";
        }
    }

    public static function bulan_angka($date)
    {
        $y = substr($date, 5, 2);
        return $y;
    }

    public static function tahun($date)
    {
        $y = substr($date, 0, 4);
        return $y;
    }

    public static function tgl_indo($date)
    {
        $d = self::tanggal($date);
        $m = self::month($date);
        $y = self::tahun($date);
        return $d . " " . $m . " " . $y;
    }

    public static function indo_date($date)
    {
        $d = self::tanggal($date);
        $m = self::bulan($date);
        $y = self::tahun($date);
        return $d . " " . $m . " " . $y;
    }

    public static function tgl_default($date)
    {
        $d = self::tanggal($date);
        $m = self::bulan_angka($date);
        $y = self::tahun($date);
        return $d . "/" . $m . "/" . $y;
    }
}
