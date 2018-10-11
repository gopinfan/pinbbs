@extends('layouts.app')

@section('title',(isset($category) ? $category->name . ' - ' : '') . '话题')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-9">

                @if(isset($category))
                    <div class="alert alert-info">
                        <a href="{{route('topics.index')}}">话题</a>
                        >
                        {{$category->name}}
                        <small class="text-muted">{{$category->description}}</small>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header bg-white">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="{{Request::url()}}?order=default" class="nav-link {{active_class(!if_query('order','recent'))}}">最后回复</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Request::url()}}?order=recent" class="nav-link {{active_class(if_query('order','recent'))}}">最新发布</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pb-1">
                        @include('topics._list')

                        {!! $topics->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header bg-white">右侧导航栏</div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection