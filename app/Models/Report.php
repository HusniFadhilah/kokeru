<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controllers;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id', 'cs_id', 'schedule_id', 'date_time', 'file_1', 'file_2', 'file_3', 'file_4', 'file_5', 'video', 'status',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'cs_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
