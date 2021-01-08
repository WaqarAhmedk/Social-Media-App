<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @elseif(session()->has('error'))

        <div class="alert alert-success">
            {{session()->get('error')}}
        </div>
    @endif
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <span class="alert alert-danger">{{$error}}</span>
            @endforeach
        </div>

    @endif
</div>
