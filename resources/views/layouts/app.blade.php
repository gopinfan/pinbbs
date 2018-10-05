<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PinBBS') - PinBBS</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body class="with-fixed-top with-fixed-bottom">
<div id="app" class="app-{{route_class()}}">

    @include('layouts._header')

    @include('common.message')

    @yield('content')

    @include('layouts._footer')

</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>