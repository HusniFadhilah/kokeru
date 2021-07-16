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

    public function edit(User $user)
    {
        return view('supervisor.profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $attr = $request->all();
        if ($request->file('avatar')) {
            if (
                Fungsi::slice_string_by_word($user["avatar"]) !=
                'assets/img/user/default.jpg'
            ) {
                unlink(storage_path('app/public/' . Fungsi::slice_string_by_word($user["avatar"])));
            }
            $attr['avatar'] = $request->file('avatar')->store('assets/img/user', 'public');
        } else {
            $attr['avatar'] = Fungsi::slice_string_by_word($user->avatar);
        }
        if ($request->input('password')) {
            $attr['password'] = Hash::make($request->input('password'));
        } else {
            $attr['password'] = $user["password"];
        }
        $user->update($attr);
        Fungsi::sweetalert('Profile berhasil diupdate', 'success', 'Berhasil!');
        return redirect()->back();
    }
}
