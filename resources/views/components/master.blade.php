<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home Inventory</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="{{asset('js/app.js')}}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #card:hover{
            transform: rotateY(180deg);
        }
    </style>
</head>
<body>
<div id="app">
    @include('partials._header')
    {{$slot}}
</div>
@include('sweetalert::alert')
</body>
</html>
