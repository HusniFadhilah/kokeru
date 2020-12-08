<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'cs_id', 'room_id', 'date_time'
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

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
