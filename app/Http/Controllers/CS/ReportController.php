<?php

namespace App\Http\Controllers\CS;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Schedule;
use App\Libraries\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports_today = Report::where('cs_id', Auth::user()->id)
            ->whereDate('date_time', Carbon::today())
            ->get();
        return view('cs.report.index', compact('reports_today'));
    }

    public function edit(Request $request, Report $report)
    {
        return view('cs.report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'foto' => 'required',
            'foto.*' => ['required', 'mimetypes:image/*'],
            'video' => ['mimetypes:video/*'],
        ]);
        $attr = $request->all();
        if ($request->hasfile('foto')) {
            if (count($request->file('foto')) > 5) {
                return redirect()->back()->withErrors("Hanya boleh mengupload 5 file");
            }
            foreach ($request->file('foto') as $file) {
                $data[] = $file->store('assets/img/proof', 'public');
            }
            if (count($data) == 1) {
                $attr['file_1'] = $data[0];
            }
            if (count($data) == 2) {
                $attr['file_1'] = $data[0];
                $attr['file_2'] = $data[1];
            }
            if (count($data) == 3) {
                $attr['file_1'] = $data[0];
                $attr['file_2'] = $data[1];
                $attr['file_3'] = $data[2];
            }
            if (count($data) == 4) {
                $attr['file_1'] = $data[0];
                $attr['file_2'] = $data[1];
                $attr['file_3'] = $data[2];
                $attr['file_4'] = $data[3];
            }
            if (count($data) == 5) {
                $attr['file_1'] = $data[0];
                $attr['file_2'] = $data[1];
                $attr['file_3'] = $data[2];
                $attr['file_4'] = $data[3];
                $attr['file_5'] = $data[4];
            }
        }
        if ($request->file('video')) {
            $attr['video'] = $request->file('video')->store('assets/video/proof', 'public');
        }

        $attr['status'] = 1;
        $report->update($attr);

        Fungsi::sweetalert('Bukti berhasil diupload', 'success', 'Berhasil!');
        return redirect(route('cs.report.data'));
    }
}
