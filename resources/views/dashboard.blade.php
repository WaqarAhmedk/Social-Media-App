@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pl-3">
                <div class="align-content-end d-flex float-right">
                    <img src="/storage/{{Auth()->user()->avatar}}" class="rounded-circle" height="50px" width="50px">
                    <button><a href="" class="btn btn-primary m-2">Update Profile</a></button>


                </div>
                <div class="card">
                    <div class="card-header d-flex">

                    </div>



                    <div class="card-body">

                        @foreach($posts as $post)
                            <div class="pb-4">
                                <strong>{{auth()->user()->name}}</strong>
                                <span>{{$post->caption}}</span>
                                <img src="/storage/{{$post->image}}" class="rounded" height="40px" width="500px" >
                                <div class="justify-content-between pt-3 pl-4">
                                    <span>3</span>
                                    <span class="far fa-thumbs-up"></span>
                                    <span class="pl-3">3</span>
                                    <span class="far fa-thumbs-down"></span>
                                    <form class="hidden" method="post" action="">
                                        <input type="submit">
                                    </form>
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
