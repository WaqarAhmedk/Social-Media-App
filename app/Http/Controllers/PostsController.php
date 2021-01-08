<?php

namespace App\Http\Controllers;

use App\Http\Requests\postrequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts=Post::orderby('created_at' ,'desc')->paginate(5);
        $users=User::all();
        return view('posts.index')->with(compact('posts'))->with(compact('users'));
    }
    public function create(postrequest $request){

        if ($request->has('image')){
            $filename=$request->image->GetClientOriginalName().Auth()->user()->id;
            $path=$request->image->storeAs('images',$filename,'public');
            auth()->user()->Posts()->create([
                'caption'=>$request->caption,
                'image' =>$path
            ]);
        }
        else{
            auth()->user()->Posts()->create([
                'caption'=>$request->caption,
            ]);
        }


        return redirect()->back();

    }
}
