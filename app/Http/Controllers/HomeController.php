<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $reports_today = Report::whereDate('date_time', Carbon::today())->get();
        return view('supervisor.room', compact('reports_today'));
    }
}
