<div class="media-list">
    @foreach($replies as $reply)
        <div class="media border-bottom pb-2 mb-2" name="reply-{{$reply->id}}" id="reply-{{$reply->id}}">
            <a href="{{route('users.show', $reply->user_id)}}">
                <img src="{{$reply->user->avatar}}" alt="{{$reply->user->name}}" class="mr-3 avatar-list rounded-circle">
            </a>
            <div class="media-body">
                <h5>
                    <a href="{{route('users.show', $reply->user_id)}}">{{$reply->user->name}}</a>
                    <span class="text-muted small" title="{{$reply->created_at}}">{{$reply->created_at->diffForHumans()}}</span>
                    <span class="float-right">
                        <a href="#"><i class="fa fa-trash-alt text-muted"></i></a>
                    </span>
                </h5>
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach
</div>