<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Report;
use App\Models\Schedule;
use App\Libraries\Fungsi;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
<<<<<<< HEAD
        $reports_today = Report::whereDate('date_time', Carbon::today())->get();
        return view('supervisor.room', compact('reports_today'));
=======
    	$reports_today = Report::whereDate('date_time', Carbon::today())->get();
        $reports = Report::all();
        return view('supervisor.monitor', 
            [
                "report" => $reports_today
            ]);
>>>>>>> 4c0da2b11b989049fa24ba4f3c94c70a7c0e3dca
    }
}
