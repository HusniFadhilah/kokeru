<?php

namespace App\Http\Controllers\CS;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CsController extends Controller
{
    public function index(Request $request)
    {
        $reports_today = Report::join('schedules', 'schedules.id', '=', 'reports.schedule_id')
            ->join('rooms', 'rooms.id', '=', 'reports.room_id')->orderBy('rooms.name', 'asc')
            ->where('schedules.cs_id', Auth::user()->id)->whereHas('schedule', function ($query) {
                $query->whereDate('date_time', Carbon::today());
            })->get();
        return view('cs.index', compact('reports_today'));
    }
}
