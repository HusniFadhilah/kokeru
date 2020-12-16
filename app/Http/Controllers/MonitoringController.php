<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Report;
use App\Models\Schedule;
use App\Libraries\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonitoringController extends Controller
{
    public function index(Request $request)
    {
        $reports_today = Report::join('schedules', 'schedules.id', '=', 'reports.schedule_id')
            ->join('rooms', 'rooms.id', '=', 'reports.room_id')->orderBy('rooms.name', 'asc')
            ->whereHas('schedule', function ($query) {
                $query->whereDate('date_time', Carbon::today());
            })->get();
        return view(
            'supervisor.monitor',
            [
                "report" => $reports_today
            ]
        );
    }
}
