<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item text-center">
            <a href="{{route('users.show', $user->id)}}">
                <img src="{{$user->avatar}}" alt="{{$user->name}}" class="img-thumbnail img-responsive">
            </a>
            <h5 class="text-center pt-3">{{$user->name}}</h5>
            <div class="text-muted text-center">{{$user->email}}</div>
        </li>
        <li class="list-group-item">
            <h6>个人简介</h6>
            <div class="text-muted small">{{$user->introduction}}</div>
        </li>
        <li class="list-group-item">
            <h6>注册时间</h6>
            <div class="text-muted small">{{$user->created_at->diffForHumans()}}</div>
        </li>
    </ul>
</div>