<div>
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <span class="alert alert-danger">{{$error}}</span>
            @endforeach
        </div>

    @endif
</div>
