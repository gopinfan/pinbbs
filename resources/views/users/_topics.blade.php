@if($topics->count())
    <ul class="media-list list-unstyled pt-3">
        @foreach($topics as $topic)
            <li class="media border-bottom pb-3 mb-3">
                <div class="media-body">
                    <h5 class="media-heading">
                        <a href="{{$topic->link()}}">{{$topic->title}}</a>
                        <span class="float-right small text-muted">{{$topic->updated_at->diffForHumans()}}</span>
                    </h5>
                    <div class="media-meta">
                        <a href="{{route('categories.show', $topic->category_id)}}" title="{{$topic->category->name}}">
                            <i class="far fa-folder-open"></i>
                            {{$topic->category->name}}
                        </a>
                        <span class="text-muted d-inline-block px-2">|</span>
                        <a href="#">
                            <i class="far fa-eye"></i>
                            {{$topic->view_count}}
                        </a>
                        <span class="text-muted d-inline-block px-2">|</span>
                        <a href="#">
                            <i class="far fa-comment"></i>
                            {{$topic->reply_count}}
                        </a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    {!! $topics->render() !!}
@else
    <div class="p-3 text-center">
        暂无数据
    </div>
@endif