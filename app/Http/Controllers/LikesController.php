<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Post $post , Request $request){
        $post->Likes()->create([
            'post_id' =>$post->id,
            'user_id' =>auth()->user()->id,

        ]);
        return redirect()->back();
    }
    public function unlike(Post $post,Request $request)
    {
        $request->user()->likes()->where('user_id',auth()->user()->id)->delete();
        return redirect()->back();
    }
}
