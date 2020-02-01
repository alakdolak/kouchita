@extends('layouts.bodyPlace')

<?php
//$total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
//if ($total == 0)
//    $total = 1;
//?>
@section('title')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>--}}
    <link rel="stylesheet" href="{{URL::asset('css/theme2/media_uploader.css')}}">
    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
    {{--    <title>{{$place->name}} | {{$city->name}} | شازده مسافر</title>--}}
@stop

@section('meta')
    {{--    <meta name="keywords" content="{{$place->keyword}}">--}}
    {{--    <meta property="og:description" content="{{$place->meta}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag1}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag2}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag3}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag4}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag5}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag6}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag7}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag8}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag9}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag10}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag11}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag12}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag13}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag14}}"/>--}}
    {{--    <meta property="article:tag" content="{{$place->tag15}}"/>--}}
    {{--    <meta name="twitter:card" content="summary_large_image"/>--}}
    {{--    <meta name="twitter:description" content="{{$place->meta}}"/>--}}
    {{--    <meta name="twitter:title" content="{{$place->name}} | {{$city->name}} | شازده مسافر"/>--}}
    {{--    <meta property="og:url" content="{{Request::url()}}"/>--}}
    {{--    @if(count($photos) > 0)--}}
    {{--        <meta property="og:image" content="{{$photos[0]}}"/>--}}
    {{--        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>--}}
    {{--        <meta property="og:image:width" content="550"/>--}}
    {{--        <meta property="og:image:height" content="367"/>--}}
    {{--        <meta name="twitter:image" content="{{$photos[0]}}"/>--}}
    {{--    @endif--}}
    {{--    <meta content="article" property="og:type"/>--}}
    {{--    <meta property="og:title" content="{{$place->name}} | {{$city->name}} | شازده مسافر"/>--}}



@stop

@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/usersActivities.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}">

    {{--vr--}}

    {{--    @if(isset($video) && $video != null)--}}
    {{--        <link rel="stylesheet" href="{{URL::asset('vr2/video-js.css')}}">--}}
    {{--        <link rel="stylesheet" href="{{URL::asset('vr2/videojs-vr.css')}}">--}}
    {{--        <script src="{{URL::asset('vr2/video.js')}}"></script>--}}
    {{--        <script src="{{URL::asset('vr2/videojs-vr.js')}}"></script>--}}
    {{--    @endif--}}

@stop

@section('main')

    <div class="userArticlesPage">
        <div class="userProfilePageCoverImg"></div>
        <center class="mainBodyUserProfile userArticles">
        <div class="mainDivContainerProfilePage">
            @include('userActivities.sameParts')
            @include('userActivities.innerParts.userArticlesInner')
        </div>
    </center>
    </div>

    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

    <script>
        autosize(document.getElementsByClassName("inputBoxInputSearch"));
        autosize(document.getElementsByClassName("inputBoxInputAnswer"));
        autosize(document.getElementsByClassName("inputBoxInputComment"));

        function showAllItems(element) {
            $(element).parent().next().toggleClass('height-auto')
        }

    </script>

@stop