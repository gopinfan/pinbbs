@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul class="mb-0 pl-0">
            @foreach($errors->all() as $error)
                <li class="list-unstyled"><i class="fa fa-fw fa-times"></i>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif