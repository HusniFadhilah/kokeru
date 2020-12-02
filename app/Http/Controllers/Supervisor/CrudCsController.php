<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Role;
use App\Models\User;
use App\Libraries\Fungsi;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CrudCsController extends Controller
{

    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('supervisor.cs.index', compact('users'));
    }

    public function create()
    {
        $role = Role::find(2);
        return view('supervisor.cs.create', compact('role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['required', 'max:30'],
            'password' => 'required',
            'avatar' => ['required', 'image'],
        ]);

        $attr = $request->all();
        $attr['avatar'] = $request->file('avatar')->store('assets/img/user', 'public');
        $attr['password'] = Hash::make($request->password);
        $attr['slug'] = Str::slug($request->name);

        User::create($attr);

        Fungsi::sweetalert('Cleaning Service berhasil ditambahkan', 'success', 'Berhasil!');
        return redirect(route('supervisor.cs.data'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('supervisor.cs.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:30'],
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
        Fungsi::sweetalert('Cleaning Service berhasil diupdate', 'success', 'Berhasil!');
        return redirect(route('supervisor.cs.data'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user["avatar"] != 'assets/img/user/default.jpg') {
            unlink(storage_path('app/public/' . $user["avatar"]));
        }

        $user->delete();
        Fungsi::sweetalert('Cleaning Service berhasil dihapus', 'success', 'Berhasil!');
        return redirect()->route('supervisor.cs.data');
    }
}
