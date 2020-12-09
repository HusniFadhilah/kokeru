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

    public function reset()
    {
        $schedules = Schedule::all();

        foreach ($schedules as $s) {
            $id = $s->id;
            $schedule = new Schedule();
            $data = [
                'id' => $id,
                'date_time' => Carbon::parse('+1 days', 'Asia/Jakarta'),
            ];
            $schedule->update($data);
        }

        $schedules = Schedule::all();
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
