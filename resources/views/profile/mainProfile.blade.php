@extends('layouts.bodyPlace')

@section('title')

@stop

@section('meta')

@stop

@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/pages/profile.css')}}">
{{--    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}">--}}
@stop

@section('main')


    <div class="userPostsPage">
        <div class="userProfilePageCoverImg"></div>
        <div class="mainBodyUserProfile userPosts">
            <div class="mainDivContainerProfilePage">
                @include('profile.layout.sameParts')

                @include('profile.innerParts.userPostsInner')
            </div>
        </div>
    </div>

    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

    <script>
        autosize(document.getElementsByClassName("inputBoxInputSearch"));
        autosize(document.getElementsByClassName("inputBoxInputAnswer"));
        autosize(document.getElementsByClassName("inputBoxInputComment"));

        function showAllItems(element) {
            $(element).parent().next().toggleClass('height-auto')
        }

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