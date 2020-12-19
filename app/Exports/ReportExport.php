<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;

class ReportExport implements FromView, Responsable
{
    use Exportable;
    protected $reports;
    protected $supervisor;
    protected $date;
    protected $status;

    function __construct($reports, $date, $status, $supervisor)
    {
        $this->reports = $reports;
        $this->supervisor = $supervisor;
        $this->date = $date;
        $this->status = $status;
    }

    public function view(): View
    {
        $reports = $this->reports;
        $date = $this->date;
        $supervisor = $this->supervisor;
        $status = $this->status;
        return view('supervisor.report.excel', compact('reports', 'date', 'status', 'supervisor'));
    }
}
