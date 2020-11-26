<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id', 'cs_id', 'schedule_id', 'date_time', 'file_1', 'file_2', 'file_3', 'file_4', 'file_5', 'video', 'status',
    ];
}
