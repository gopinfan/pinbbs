@if($activeUsers->count())
    <div class="card">
        <div class="card-header bg-white text-center">
            <strong>活跃用户</strong>
        </div>
        <div class="card-body">
            @foreach($activeUsers as $user)
                <div class="media border-bottom pb-1 mb-2">
                    <a href="{{route('users.show', $user->id)}}">
                        <img src="{{$user->avatar}}" alt="{{$user->name}}" class="rounded-circle mr-2 avatar-sidebar">
                    </a>
                    <div class="media-body">
                        <h6 class="media-heading mb-0 py-1">
                            <a href="{{route('users.show', $user->id)}}">{{$user->name}}</a>
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif