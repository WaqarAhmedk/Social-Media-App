@extends('layouts.app')
@section('content')
    <form action="{{route('storeupdateform',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="w-full bg-grey-lightest" style="padding-top: 4rem;">
            <div class="container mx-auto py-8">
                <div class="w-5/6 lg:w-1/2 mx-auto bg-white rounded shadow">
                    <div class="py-4 px-8 text-black text-xl border-b border-grey-lighter">Update Your Profile</div>
                    <div class="py-4 px-8">
                        <div class="flex mb-4">
                            <div class="w-1/2 mr-1">
                                <label class="block text-grey-darker text-sm font-bold mb-2"
                                       for="name">Name</label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                       id="name" name="name" type="text" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="email">Email
                                Address</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="email" id="email"
                                   type="email" value="{{$user->email}}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="avatar">Avatar</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"  name="avatar" id="avatar"
                                   type="file" value="{{$user->avatar}}">
                        </div>
                        <div class="flex items-center justify-between mt-8">
                            <button class="bg-blue hover:bg-blue-dark btn-primary font-bold py-2 px-4 rounded-full"
                                    type="submit">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
                <p class="text-center my-4">
                    <a href="#" class="text-grey-dark text-sm no-underline hover:text-grey-darker">I already have an
                        account</a>
                </p>
            </div>
        </div>
    </form>

@endsection
