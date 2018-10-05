@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <img src="http://placekitten.com/180/180" alt="{{$user->name}}" class="img-thumbnail">
                            <h5 class="text-center pt-3">{{$user->name}}</h5>
                        </li>
                        <li class="list-group-item">
                            注册时间：<span class="text-muted">{{$user->created_at->diffForHumans()}}</span>
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
