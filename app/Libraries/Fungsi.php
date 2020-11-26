<?php

namespace App\Libraries;

use Illuminate\Support\Str;

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
}