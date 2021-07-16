<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Schedule;
use App\Libraries\Fungsi;
use Illuminate\Http\Request;

class ResetScheduleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
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
        return redirect(route('home'));
    }
}
