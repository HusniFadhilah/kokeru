<?php

namespace App\Http\Controllers\Supervisor;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Libraries\Fungsi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CrudRoomController extends Controller
{

    public function index()
    {
        $room = Room::all();
        return view('supervisor.room.index', compact('room'));
    }

    public function create()
    {
        $room = Room::all();
        return view('supervisor.room.create', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $attr = $request->all();
        $attr['slug'] = Str::slug($request->name);

        Room::create($attr);

        Fungsi::sweetalert('Ruangan berhasil ditambahkan', 'success', 'Berhasil!');
        return redirect(route('supervisor.room.data'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return view('supervisor.room.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $attr = $request->all();

        $room->update($attr);
        Fungsi::sweetalert('Ruangan berhasil diupdate', 'success', 'Berhasil!');
        return redirect(route('supervisor.room.data'));
    }

    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete();
        Fungsi::sweetalert('Ruangan berhasil dihapus', 'success', 'Berhasil!');
        return redirect()->route('supervisor.room.data');
    }
}
