@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                @include('users._info', ['user'=>$topic->user])
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="lead text-center">{{$topic->title}}</div>
                        <div class="p-2 text-center">
                            {{$topic->created_at->diffForHumans()}}
                            |
                            <i class="fa fa-fw fa-eye"></i> {{$topic->view_count}}
                            |
                            <i class="far fa-fw fa-comment"></i> {{$topic->reply_count}}
                        </div>

                        <hr>

                        <div class="mt-2">
                            {!! $topic->body !!}
                        </div>

                        <hr>

                        @can('update', $topic)
                            <div class="text-right">
                                <a href="{{route('topics.edit', $topic->id)}}" class="btn btn-outline-primary btn-sm">编辑</a>

                                <form action="{{route('topics.destroy', $topic->id)}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">删除</button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
