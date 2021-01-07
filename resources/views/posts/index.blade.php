@extends('layouts.app')
@section('content')
    <div class="flex justify-center ">
        <div class="w-8/12  p-6 rounded-lg pl-4">
            @auth()
                <form action="{{route('post_create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>

                        <textarea name="caption" class="w-100 rounded  border border-black-500 " value="{{old('caption')}}"></textarea>
                        @error('caption')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror

                        <input type="file" name="image" class="btn btn-primary">
                        @error('image')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class=" btn btn-primary mt-3" type="submit">Submit</button>
                </form>
                <hr class="mt-3">
            @endauth
            @foreach($posts as $post)
                <div class=" mt-3 border border-balck rounded ml-4 pt-2">
                    <div class="d-inl pl-2">
                        <img src="storage/{{$post->user->avatar}}" class="rounded-circle d-inline" height="50px" width="50px">
                        <strong class="d-inline"><a href="{{route('dashboard')}}">{{$post->user->name}}</a></strong>
                        posted
                        <span>{{$post->created_at->diffForHumans()}}</span>
                    </div>

                    <div class="pl-5 pt-2">
                    @if($post->image)
                        <p>{{$post->caption}}</p>
                        <img src="/storage/{{$post->image}}" class="rounded" width="500px">
                    @else
                        <p>{{$post->caption}}</p>
                    @endif
                    </div>
                    <div class="justify-content-between pt-3 pl-4">
                        <span>{{$post->likes()->count()}}</span>
                        @if($post->likedBy(auth()->user()))
                            <a href="{{route('unlike',$post->id)}}" class="text-primary"><span class="far fa-thumbs-up fa-2x"/></a>
                        @else
                            <a href="{{route('like',$post->id)}}"  class="text-black-90"><span class="far fa-thumbs-up fa-2x"/></a>
                        @endif

                    </div>

                </div>
            @endforeach
            {{$posts->links()}}
        </div>
        <div class="w-24 bg-grey p-6 rounded-lg">
           <h1>Follow These Users</h1>
        </div>
    </div>

@endsection
