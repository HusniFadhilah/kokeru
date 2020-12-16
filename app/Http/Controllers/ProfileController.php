<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Libraries\Fungsi;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller 
{

    public function edit()
    {
        return view('supervisor.profile', [
            'user' => $request->user()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['required', 'max:30'],
            'password' => 'required',
            'avatar' => ['image'],
        ]);

        $attr = $request->all();
        if ($request->file('avatar')) {
            $attr['avatar'] = $request->file('avatar')->store('assets/img/user', 'public');
        } else {
            $attr['avatar'] = 'assets/img/user/default.jpg';
        }
        $attr['password'] = Hash::make($request->password);
        $attr['slug'] = Str::slug($request->name);

        User::create($attr);

        Fungsi::sweetalert('Profile berhasil diedit', 'success', 'Berhasil!');
        return redirect(route('supervisor.profile.data'));
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
        Fungsi::sweetalert('Profile berhasil diupdate', 'success', 'Berhasil!');
        return redirect(route('supervisor.profile'));
    }

}
