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
                                <a href="" class="nav-link active">话题</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">回复</a>
                            </li>
                        </ul>

                        @include('users._topics', ['topics' => $user->topics()->recent()->paginate(10)])
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
