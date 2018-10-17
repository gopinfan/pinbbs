@extends('layouts.app')

@section('title', '我的消息')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                @include('users._info')
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header bg-white">
                        我的消息
                    </div>
                    <div class="card-body">
                        @if($notifications->count())
                            <div class="notification-list">
                                @foreach($notifications as $notification)
                                    @include('notifications.types._'.snake_case(class_basename($notification->type)))
                                @endforeach
                            </div>
                            <div class="notification-paginate">
                                {!! $notifications->render() !!}
                            </div>
                        @else
                            <div class="p-3">没有消息~</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop