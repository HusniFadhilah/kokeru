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
        $schedules = Schedule::all();

        foreach ($schedules as $s) {
            $id = $s->id;
            $data = [
                'id' => $id,
                'date_time' => Carbon::parse('+1 days', 'Asia/Jakarta'),
            ];
            $s->update($data);
        }

        foreach ($schedules as $schedule) {
            Report::create([
                'cs_id' => $schedule->cs_id,
                'room_id' => $schedule->room_id,
                'schedule_id' => $schedule->id,
                'date_time' => $schedule->date_time,
                'status' => 0
            ]);
        }

        Fungsi::sweetalert('Jadwal berhasil direset', 'success', 'Berhasil!');
        return redirect(route('supervisor.schedule.data'));
    }
}
