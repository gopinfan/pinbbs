@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                @include('users._info')
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="{{route('users.show', $user->id)}}" class="nav-link {{active_class(if_query('tab', null))}}">话题</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.show', [$user->id, 'tab'=>'replies'])}}" class="nav-link {{active_class(if_query('tab', 'replies'))}}">回复</a>
                            </li>
                        </ul>

                        @if(if_query('tab', 'replies'))
                            @include('users._replies', ['replies' => $user->replies()->with('topic')->latest()->paginate(10)])
                        @else
                            @include('users._topics', ['topics' => $user->topics()->recent()->paginate(10)])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
