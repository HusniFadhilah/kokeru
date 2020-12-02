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

    public function create()
    {
        $cs = User::where('role_id', 2)->get()[0];
        $rooms = Room::all();
        return view('supervisor.cs.create', compact('cs', 'rooms'));
    }

    public function store(Request $request)
    {
        $date = Schedule::last();

        if (empty($date)) {
            $date_now = Carbon::parse('now', 'Asia/Jakarta')->toDateTimeString();
        } else {
            $date_now = $date['date_time'];
        }

        Schedule::create([
            'cs_id' => $request->cs_id,
            'room_id' => $request->room_id,
            'date_time' => $date_now,
        ]);

        $schedule = Schedule::last();

        Report::create([
            'cs_id' => $schedule['cs_id'],
            'room_id' => $schedule['room_id'],
            'date_time' => $schedule['date_time'],
            'status' => 'Belum'
        ]);

        Fungsi::sweetalert('Jadwal berhasil ditambahkan', 'success', 'Berhasil!');
        return redirect(route('supervisor.schedule.data'));
    }
}
