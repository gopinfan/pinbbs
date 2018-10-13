@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-white">
                @if($topic->id) <i class="fa fa-fw fa-edit"></i>编辑话题 @else <i class="fa fa-fw fa-plus"></i>新建话题 @endif
            </div>
            <div class="card-body">
                @include('common.error')

                <form action="{{$topic->id ? route('topics.update', $topic->id) : route('topics.store')}}" method="post" accept-charset="UTF-8">
                    @csrf

                    <div class="form-group">
                        <label for="title">话题标题</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title', $topic->title)}}" placeholder="请输入话题标题" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">话题分类</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="body">话题内容</label>
                        <textarea name="body" id="body" class="form-control" rows="5" placeholder="请输入话题内容">{{old('body', $topic->body)}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary px-4">保存</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('editor/css/simditor.css')}}">
@stop

@section('scripts')
    <script src="{{asset('editor/js/module.js')}}"></script>
    <script src="{{asset('editor/js/hotkeys.js')}}"></script>
    <script src="{{asset('editor/js/uploader.js')}}"></script>
    <script src="{{asset('editor/js/simditor.js')}}"></script>

    <script>
        $(document).ready(function () {
            var editor = new Simditor({
                textarea: $('#body'),
                upload: {
                    url: '{{route('topics.upload')}}',
                    params: {_token: '{{csrf_token()}}'},
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
            })
        })
    </script>

@stop