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
        $reports_today = Report::whereDate('date_time', Carbon::today())->get();
        $reports = Report::all();
        return view('supervisor.monitor', 
            [
                "report" => $reports_today
            ]);
    }
}
?>