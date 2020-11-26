<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Libraries\Fungsi;
use Illuminate\Support\Facades\Hash;

class CrudCsController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('supervisor.crud_cs.index', compact('users'));
    }

    public function create()
    {
        return view('supervisor.crud_cs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            'avatar' => ['required', 'image'],
        ]);

        $attr = $request->all();
        $attr['role_id'] = 2;
        $attr['password'] = Hash::make(request('password'));

        $attr['avatar'] = $request->file('avatar')->store('assets/img/user', 'public');

        User::create($attr);

        Fungsi::sweetalert('Karyawan berhasil ditambahkan', 'success', 'Berhasil!');
        return redirect(route('supervisor.cs'));
    }

    public function edit(User $user)
    {
        // dd($user);
        return view('supervisor.crud_cs.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'image'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $attr = $request->all();

        if ($request->file('avatar')) {
            unlink(storage_path('app/public/' . $user["avatar"]));
            $attr['avatar'] = $request->file('avatar')->store('assets/img/user', 'public');
        } else {
            $attr['avatar'] = Fungsi::slice_string_by_word($user->avatar);
        }

        $user->update($attr);
        Fungsi::sweetalert('Karyawan berhasil diupdate', 'success', 'Berhasil!');
        return redirect(route('supervisor.cs'));
    }

    public function destroy(User $user)
    {
        // if ($user["avatar"] != 'assets/img/user/default.jpg') {
        //     unlink(storage_path('app/public/' . $user["avatar"]));
        // }
        // $user->update([
        //     'avatar' => 'assets/img/user/default.jpg'
        // ]);

        $user->delete();
        Fungsi::sweetalert('Karyawan berhasil dihapus', 'success', 'Berhasil!');
        return redirect()->route('supervisor.cs');
    }
}
