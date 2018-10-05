@foreach(['success','danger','info','warning'] as $type)
    @if(session()->has($type))
        <div class="container mt-3">
            <div class="alert alert-{{$type}} alert-dismissible fade show" role="alert">
                {{session()->get($type)}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
@endforeach