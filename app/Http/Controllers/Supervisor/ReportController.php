<?php

namespace App\Http\Controllers\Supervisor;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Schedule;
use Barryvdh\DomPDF\Facade as PDF;
use App\Libraries\Fungsi;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $reports = Report::query();
        $date = Carbon::today();
        $status = '';
        if ($request->input('status') != '') {
            $status = $request->input('status');
            $reports->where('status', $status);
        }
        if ($request->input('date') != '') {
            $date = Carbon::parse($request->input('date'))->format('Y-m-d H:i:s');
        }
        $reports->whereDate('date_time', $date);

        $reports = $reports->get();
        return view('supervisor.report.index', compact('reports', 'date', 'status'));
    }

    public function export_excel()
    {
        return Excel::download(new ReportExport, 'laporan.xlsx');
    }

    public function export_pdf(Request $request)
    {
        $reports = Report::query();
        $date = Carbon::today();
        $status = '';
        if ($request->input('status') != '') {
            $status = $request->input('status');
            $reports->where('status', $status);
        }
        if ($request->input('date') != '') {
            $date = Carbon::parse($request->input('date'))->format('Y-m-d H:i:s');
        }
        $reports->whereDate('date_time', $date);

        $reports = $reports->get();
        $pdf = PDF::loadview('supervisor.report.pdf', compact('reports', 'date', 'status'));
        return $pdf->stream();
    }
}
