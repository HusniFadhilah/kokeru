<?php

namespace App\Http\Controllers\Supervisor;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupervisorController extends Controller
{
    public function index(Request $request)
    {
        $sum_cs = User::where('role_id', 2)->count();
        $sum_room = Room::all()->count();
        $sum_status_sudah = Report::whereDate('date_time', Carbon::today())->where('status', 1)->count();
        $sum_status_belum = Report::whereDate('date_time', Carbon::today())->where('status', 0)->count();
        $reports_today = Report::whereHas('schedule', function ($query) {
            $query->whereDate('date_time', Carbon::today());
        })->get();
        $reports = Report::all();
        return view('supervisor.index', compact('sum_cs', 'sum_room', 'sum_status_sudah', 'sum_status_belum', 'reports_today', 'reports'));
    }
}
