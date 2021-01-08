@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 pl-3">

                <div class="align-content-end d-flex float-right">
                    <img src="/storage/{{Auth()->user()->avatar}}" class="rounded-circle" height="50px" width="50px">
                    <button><a href="{{route('updateform',auth()->user()->id)}}" class="btn btn-primary m-2">Update Profile</a></button>


                </div>
                <div class="card">
                    <x-message/>



                    <div class="card-body">

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
                </div>
            </div>
        </div>
    </div>
@endsection
