<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Report;
use App\Models\Schedule;
use App\Libraries\Fungsi;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;

class ReportController extends Controller
{
	public function index()
    {
        $reports_today = Report::whereDate('date_time', Carbon::today())->get();
        return view('supervisor.report.index', compact('reports_today'));
    }

	public function export_excel()
	{
		return Excel::download(new ReportExport, 'laporan.xlsx');
	}
}
