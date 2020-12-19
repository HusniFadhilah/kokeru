<?php

namespace App\Http\Controllers\Supervisor;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Report;
use App\Models\Schedule;
use App\Libraries\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    public function index()
    {
        $schedules = Schedule::all();
        return view('supervisor.schedule.index', compact('schedules'));
    }

    public function create()
    {
        $cs = User::where('role_id', 2)->get();
        $schedules = Schedule::pluck('room_id')->all();
        $rooms = Room::whereNotIn('id', $schedules)->select()->get();
        return view('supervisor.schedule.create', compact('cs', 'rooms'));
    }

    public function store(Request $request)
    {
        $date_now = Carbon::parse('now', 'Asia/Jakarta')->toDateTimeString();

        Schedule::create([
            'cs_id' => $request->cs_id,
            'room_id' => $request->room_id,
            'date_time' => $date_now,
        ]);

        $schedule = Schedule::latest()->first();

        Report::create([
            'schedule_id' => $schedule->id,
            'cs_id' => $schedule->cs_id,
            'room_id' => $schedule->room_id,
            'date_time' => $schedule->date_time,
            'status' => 0
        ]);

        Fungsi::sweetalert('Jadwal berhasil ditambahkan', 'success', 'Berhasil!');
        return redirect(route('supervisor.schedule.data'));
    }

    public function edit(Schedule $schedule)
    {
        $cs = User::where('role_id', 2)->get();
        $schedules = Schedule::pluck('room_id')->all();
        $rooms = Room::whereNotIn('id', $schedules)->select()->get();
        $schedules2 = Schedule::get(['room_id']);
        $rooms2 = Room::whereIn('id', $schedules2)->select()->get()[0];
        $rooms->push($rooms2);
        return view('supervisor.schedule.edit', compact('schedule', 'rooms', 'cs'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        // $reports = Report::where('schedule_id', $schedule->id)->get()[0];
        // if ($reports->status == 1) {
        //     Fungsi::sweetalert('Jadwal tidak dapat diupdate karena', 'error', 'Gagal!');
        //     return redirect(route('supervisor.schedule.data'));
        // }
        $attr = $request->all();

        $schedule->update($attr);
        Fungsi::sweetalert('Jadwal berhasil diupdate', 'success', 'Berhasil!');
        return redirect(route('supervisor.schedule.data'));
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        Fungsi::sweetalert('Jadwal berhasil dihapus', 'success', 'Berhasil!');
        return redirect()->route('supervisor.schedule.data');
    }

    public function reset()
    {
        $reports = Report::whereDate('date_time', Carbon::today())->get();

        foreach ($reports as $report) {
            $data = [
                'id' => $report->id,
                'status' => 0,
            ];

            if (Fungsi::slice_string_by_word($report["file_1"]) != null) {
                unlink(storage_path('app/public/' . Fungsi::slice_string_by_word($report["file_1"])));
                $data['file_1'] = null;
            }
            if (Fungsi::slice_string_by_word($report["file_2"]) != null) {
                unlink(storage_path('app/public/' . Fungsi::slice_string_by_word($report["file_2"])));
                $data['file_2'] = null;
            }
            if (Fungsi::slice_string_by_word($report["file_3"]) != null) {
                unlink(storage_path('app/public/' . Fungsi::slice_string_by_word($report["file_3"])));
                $data['file_3'] = null;
            }
            if (Fungsi::slice_string_by_word($report["file_4"]) != null) {
                unlink(storage_path('app/public/' . Fungsi::slice_string_by_word($report["file_4"])));
                $data['file_4'] = null;
            }
            if (Fungsi::slice_string_by_word($report["file_5"]) != null) {
                unlink(storage_path('app/public/' . Fungsi::slice_string_by_word($report["file_5"])));
                $data['file_5'] = null;
            }
            if (Fungsi::slice_string_by_word($report["video"]) != null) {
                unlink(storage_path('app/public/' . Fungsi::slice_string_by_word($report["video"])));
                $data['video'] = null;
            }
            $report->update($data);
        }

        Fungsi::sweetalert('Jadwal berhasil direset', 'success', 'Berhasil!');
        return redirect(route('supervisor.schedule.data'));
    }
}
