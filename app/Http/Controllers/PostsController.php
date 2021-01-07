<?php

namespace App\Http\Controllers;

use App\Http\Requests\postrequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts=Post::paginate(5);


        return view('posts.index')->with(compact('posts'));
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
