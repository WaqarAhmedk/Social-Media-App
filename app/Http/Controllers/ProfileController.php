<?php

namespace App\Http\Controllers;

use App\Http\Requests\postrequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(User $user)
    {
        return view('profile.updateform')->with(compact('user'));
    }
    public function store(Request $request,User $user){
      $request->validate(
          [
              'name'=>'required',
              'email' =>'unique:users,email,'.$user->id,
          ]
      );
      $user->update(
          [
              'name'=>$request->name,
              'email'=>$request->email
          ]
      );
    }
}
