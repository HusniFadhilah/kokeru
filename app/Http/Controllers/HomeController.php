<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $reports_today = Report::join('schedules', 'schedules.id', '=', 'reports.schedule_id')
            ->join('rooms', 'rooms.id', '=', 'reports.room_id')->orderBy('rooms.name', 'asc')
            ->whereHas('schedule', function ($query) {
                $query->whereDate('date_time', Carbon::today());
            })->get();
        return view('supervisor.monitor', compact('reports_today'));
    }
}
