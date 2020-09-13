@extends('layouts.bodyPlace')

<?php
//$total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
//if ($total == 0)
//    $total = 1;
//?>
@section('title')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>--}}
    <link rel="stylesheet" href="{{URL::asset('css/theme2/media_uploader.css?v=1')}}">
    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
    {{--    <title>{{$place->name}} | {{$city->name}} | کوچیتا</title>--}}
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
    {{--    <meta name="twitter:title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>--}}
    {{--    <meta property="og:url" content="{{Request::url()}}"/>--}}
    {{--    @if(count($photos) > 0)--}}
    {{--        <meta property="og:image" content="{{$photos[0]}}"/>--}}
    {{--        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>--}}
    {{--        <meta property="og:image:width" content="550"/>--}}
    {{--        <meta property="og:image:height" content="367"/>--}}
    {{--        <meta name="twitter:image" content="{{$photos[0]}}"/>--}}
    {{--    @endif--}}
    {{--    <meta content="article" property="og:type"/>--}}
    {{--    <meta property="og:title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>--}}



@stop

@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/usersActivities.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}">

    {{--vr--}}

    {{--    @if(isset($video) && $video != null)--}}
    {{--        <link rel="stylesheet" href="{{URL::asset('vr2/video-js.css?v=1')}}">--}}
    {{--        <link rel="stylesheet" href="{{URL::asset('vr2/videojs-vr.css?v=1')}}">--}}
    {{--        <script src="{{URL::asset('vr2/video.js')}}"></script>--}}
    {{--        <script src="{{URL::asset('vr2/videojs-vr.js')}}"></script>--}}
    {{--    @endif--}}

@stop

@section('main')



    <div class="userQuestionsPage">
        <div class="userProfilePageCoverImg"></div>
        <center class="mainBodyUserProfile userQuestions">
            <div class="mainDivContainerProfilePage">
                @include('notUse.userActivities.sameParts')
                @include('notUse.userActivities.innerParts.userQuestionsInner')
            </div>
        </center>
    </div>


    <script>
        autosize(document.getElementsByClassName("inputBoxInputSearch"));
        autosize(document.getElementsByClassName("inputBoxInputAnswer"));
        autosize(document.getElementsByClassName("inputBoxInputComment"));

        function showAllItems(element) {
            $(element).parent().next().toggleClass('height-auto')
        }
    </script>

    <script>
        function showAnswersActionBox(element) {
            $(element).next().toggle() ,
                $(element).toggleClass("bg-color-darkgrey")
        }

        function showAllAnswers(element) {
            $(element).parent().next().children('div.theOne').not('div.last').toggle()
        }

        function replyToAnswers(element) {
            $(element).parent().siblings("div.last").toggle();
            $(element).parent().siblings('div.last').children().toggleClass('mg-tp-0')
        }

        function dislikeTheAnswers(element) {
            $(element).children().toggle(),
                $(element).toggleClass('dark-red')
        }

        function likeTheAnswers(element) {
            $(element).children().toggle(),
                $(element).toggleClass('color-red')
        }

        function seePrevAnswers(element) {
            $(element).parent().parent().prevAll().toggle()
        }

        function seeNextAnswers(element) {
            $(element).parent().parent().nextAll().toggle()
        }

    </script>

@stop