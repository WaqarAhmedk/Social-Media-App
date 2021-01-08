<?php

namespace App\Http\Controllers;

use App\Http\Requests\postrequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(User $user)
    {
        return view('profile.updateform')->with(compact('user'));
    }

    public function store(Request $request, User $user)
    {
        if ($request->has('avatar')) {
            $request->validate([
                'avatar' => 'mimes:jpg,jpeg,png',
                'name' => 'required',
                'email' => 'unique:users,email,' . $user->id,
            ]);
            $name = $request->avatar->getClientOriginalName();
            $avatar = Auth::user()->email.$name;
            $path=$request->avatar->storeAs('avatar' ,$avatar,'public');

            $user->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'avatar' => $path,
                ]
            );
            return redirect('dashboard')->with('message', 'Profile Updated');
        } else {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'unique:users,email,' . $user->id,
                ]
            );
            $user->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                ]
            );
            return redirect('dashboard')->with('message', 'Profile Updated');
        }


        return redirect('dashboard')->with('message', 'Profile Updated');
    }
}
