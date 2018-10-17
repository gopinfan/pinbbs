@include('common.error')

<div class="reply-box border-bottom mb-3 pb-3">
    <form action="{{route('replies.store')}}" method="post">
        @csrf
        <input type="hidden" name="topic_id" value="{{$topic->id}}">
        <div class="form-group">
            <textarea name="content" id="content" rows="3" class="form-control" placeholder="分享你的想法"></textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-primary px-3">回复</button>
    </form>
</div>