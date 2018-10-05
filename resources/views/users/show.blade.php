@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <img src="{{$user->avatar}}" alt="{{$user->name}}" class="img-thumbnail img-responsive">
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
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="h3">
                            {{$user->name}} <small class="text-muted">{{$user->email}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
