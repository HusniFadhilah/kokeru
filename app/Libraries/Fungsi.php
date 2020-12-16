<?php

namespace App\Libraries;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

/**
 * Format response.
 */
class Fungsi
{
    public static function sweetalert($text, $icon, $title, $href = null)
    {
        if ($href != null) {
            session()->setFlashdata('href', $href);
        }
        session()->flash('text', $text);
        session()->flash('icon', $icon);
        session()->flash('title', $title);
    }

    public static function slice_string_by_word($string)
    {
        return Str::after($string, 'http://localhost:8000/storage/');
    }

    public static function get_role_session()
    {
        return strtolower(Auth::user()->role->name);
    }

    public static function get_schedule_now()
    {
        $schedule = Schedule::latest()->first();
        if ($schedule != null) {
            $schedule = Carbon::parse($schedule->date_time)->format('Y-m-d');
        } else {
            $schedule = '';
        }
        return $schedule;
    }
}
