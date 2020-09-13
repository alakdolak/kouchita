@extends('layouts.bodyPlace')

<?php
//$total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
//if ($total == 0)
//    $total = 1;
//?>
@section('title')

@stop

@section('meta')

@stop

@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/usersActivities.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}">
@stop

@section('main')


    <div class="userPostsPage">
        <div class="userProfilePageCoverImg"></div>
        <center class="mainBodyUserProfile userPosts">
        <div class="mainDivContainerProfilePage">
            @include('notUse.userActivities.sameParts')

            @include('notUse.userActivities.innerParts.userPostsInner')
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
        function showMoreText(element) {
            $(element).parent().toggle();
            $(element).parent().next().toggle();
        }


        function showLessText(element) {
            $(element).parent().toggle();
            $(element).parent().prev().toggle();
        }
    </script>

@stop