@if($replies->count())
    <ul class="media-list list-unstyled pt-3">
        @foreach($replies as $reply)
            <li class="media border-bottom pb-3 mb-3">
                <div class="media-body">
                    <h5 class="media-heading">
                        <a href="{{$reply->topic->link()}}">{{$reply->topic->title}}</a>
                        <span class="float-right small text-muted" title="{{$reply->created_at}}">{{$reply->updated_at->diffForHumans()}}</span>
                    </h5>
                    {!! $reply->content !!}
                </div>
            </li>
        @endforeach
    </ul>

    {!! $replies->appends(Request::except('page'))->render() !!}
@else
    <div class="p-3 text-center">
        暂无数据
    </div>
@endif