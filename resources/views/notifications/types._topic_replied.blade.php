<div class="media">
    <a href="{{route('users.show', $notification->data['user_id'])}}">
        <img src="{{$notification->data['user_avatar']}}" alt="{{$notification->data['user_name']}}" class="avatar-list rounded-circle">
    </a>
    <div class="media-body">
        <h5 class="media-heading">
            <a href="{{route('users.show', $notification->data['user_id'])}}">{{$notification->data['user_name']}}</a>
            评论了
            <a href="{{$notification->data['topic_link']}}">{{$notification->data['topic_title']}}</a>
        </h5>
        {!! $notification->data['reply_content'] !!}
    </div>
</div>