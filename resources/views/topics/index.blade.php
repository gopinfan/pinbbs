@extends('layouts.app')

@section('title','话题')

@section('content')
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header bg-white">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a href="" class="nav-link active">最后回复</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">最新发布</a>
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