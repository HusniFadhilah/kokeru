<?php

namespace App\Exports;


use App\Models\Report;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportExport implements FromView, ShouldAutoSize
{
	use Exportable;
	private $fileName = "laporan.xlsx";
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('supervisor.report.excel', ['reports'=>Report::all()
    ]);
    }
}
