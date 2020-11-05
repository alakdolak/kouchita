<?php
    $mode = 'profile'; $user = Auth::user();
    function getLastSeen($lastSeen) {
    $day = floor((time() - $lastSeen) / (3600 * 24));
    $hour = floor(((time() - $lastSeen) -  $day * 3600 * 24) / 3600);
    $min = floor(((time() - $lastSeen) -  $day * 3600 * 24 - $hour * 3600) / 60);
    $out = "";
    if($day != 0)
        $out .= $day . " روز ";
    if($hour != 0)
        $out .= $hour . " ساعت ";
    if($min != 0)
        $out .= $min . " دقیقه ";
    if($day != 0 || $hour != 0 || $min != 0)
        $out .= "قبل";
    return $out;
}
?>

@extends('layouts.bodyProfile')

@section('header')
    @parent

    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/myTrips.css?v='.$fileVersions)}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v='.$fileVersions)}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/saves-rest-client.css?v='.$fileVersions)}}' data-rup='saves-rest-client'/>

    <style>
        #saves-all-trips .trip-tile-container .trip-tile.new-trip{
            padding: 120px 0;
        }
        .ui_column{
            float: right;
        }
        .cardFooter{
            display: flex;
            flex-direction: column;
        }
        .cardFooter > div{
            padding: 5px !important;
        }
        .cardPics{
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border: solid white 1px;
        }
        .cardPics > img{
            width: 100%;
            max-width: none !important;
        }
        .trip-name{
            display: flex;
            justify-content: space-between;
        }
        .trip-name .iconSec{
            display: flex;
            font-weight: 100;
        }
        .trip-header{
            padding: 5px 10px !important;
        }
        .trip-header .icons{
            display: flex;
            position: relative;
            top: auto;
            right: auto;
            justify-content: center;
            align-items: center;
            border: solid 1px;
            width: 25px;
            margin-right: 3px;
            transition: .3s;
        }
        .trip-header .delete{
            color: red;
        }
        .trip-header .settingIcon{
            color: gray;
        }
        .trip-header .delete:hover{
            color: white;
            background: red;
            border-color: red;
        }
        .trip-header .edit{
            color: var(--koochita-blue);
        }
        .trip-header .edit:hover{
            color: white;
            background: var(--koochita-blue);
            border-color:  var(--koochita-blue);
        }
        .tripDate{
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            direction: rtl;
            width: 100%;
            text-align: right;
            position: relative;
            font-size: 12px;
        }

        .tripDate .date{
            direction: ltr;
            color: black;
            font-style: normal;
        }
        .tripDate .date > span{
            display: inline-flex;
        }
        .cardPics-1{
            width: 100%;
        }
        .cardPics-2{
            width: 50%;
        }
        .picSec.row{
            display: flex !important;
            flex-wrap: wrap !important;
            width: 100% !important;
            margin: 0 !important;
        }
        @media (max-width: 768px) {
            .ui_column{
                float: none;
            }

        }
    </style>
@stop


@section('main')

    @include('general.addToTripModal')

    <div id="MAIN" class="Saves prodp13n_jfy_overflow_visible position-relative">
        <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2 position-relative">
            <div class="wrpHeader"></div>
            <div id="saves-body" class="styleguide position-relative">
                <div id="saves-root-view"  class="position-relative">
                    <div id="saves-all-trips"  class="position-relative">
                        <div class="saves-title title position-relative">سفرهای من</div>

                        @if($trips == null || count($trips) == 0)
                            <div class="trips-container ui_container">
                                <div class="trips-container-inner ui_columns is-multiline">
                                    <div class="no-saves-container">
                                        <div class="no-saves-content content">
                                            <div class="ui_icon heart"></div>
                                            <div class="cta-header">هنوز چیزی ذخیره نشده است </div>
                                            <div onclick="createNewTrip(refreshThisPage)" class="header-create-trip ui_button primary is-hidden-mobile">+ ایجاد سفر </div>
                                        </div>
                                        <div class="mapAside is-hidden-mobile">
                                            <div class="mapHolder"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="trips-container ui_container">
                                <div class="container">
                                    <div class="row">
                                        <div onclick="createNewTrip(refreshThisPage)" class="trip-tile-container ui_column col-lg-3 col-md-4 col-sm-6">
                                            <div class="trip-tile ui_card is-fullwidth new-trip">
                                                <span class="ui_icon plus"></span>
                                                <p>ایجاد سفر</p>
                                            </div>
                                        </div>
                                        @foreach($trips as $trip)
                                            <div class="trip-tile-container ui_column col-lg-3 col-md-4 col-sm-6">
                                                <a href="{{route('tripPlaces', ['tripId' => $trip->id])}}" class="trip-tile ui_card is-fullwidth">
                                                    <div class="trip-header">
                                                        <div class="trip-name">
                                                            <div>{{$trip->name}}</div>
                                                            <div class="iconSec">
                                                                {{--<div class="editIcon icons edit"></div>--}}
                                                                {{--<div class="trashIcon icons delete"></div>--}}
                                                                {{--<div class="settingIcon"></div>--}}
                                                            </div>
                                                        </div>
                                                        <div class="tripDate">
                                                            <div class="date calendarIconA">
                                                                @if(isset($trip->to_) && $trip->to_ != null)
                                                                    <span>{{$trip->to_}}</span>
                                                                @endif
                                                                @if(isset($trip->from_) && isset($trip->to_) && $trip->from_ != null && $trip->to_ != null)
                                                                    <span>تا</span>
                                                                @endif
                                                                @if( isset($trip->from_) && $trip->from_ != null)
                                                                    <span>{{$trip->from_}}</span>
                                                                @endif
                                                            </div>
                                                            <div class="userIconA user">{{$trip->member}}</div>
                                                        </div>
                                                    </div>
{{--                                                    <div class="cursor-pointer trip-images ui_columns is-gapless is-multiline is-mobile">--}}
                                                    <div class="row picSec">
                                                        @if(count($trip->placePic) == 0)
                                                            <div class="cardPics cardPics-1" style="height: 200px; background: gainsboro;">
                                                                <img src="{{URL::asset('images/icons/KOFAV0.svg')}}">
                                                            </div>
                                                        @elseif(count($trip->placePic) == 1)
                                                            <div class="cardPics cardPics-1" style="height: 200px;">
                                                                <img src="{{$trip->placePic[0]}}" class="resizeImgClass">
                                                            </div>
                                                        @elseif(count($trip->placePic) == 2)
                                                            <div class=" cardPics-1 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[0]}}" class="resizeImgClass">
                                                            </div>
                                                            <div class=" cardPics-1 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[1]}}" class="resizeImgClass">
                                                            </div>
                                                        @elseif(count($trip->placePic) == 3)
                                                            <div class=" cardPics-2 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[0]}}" class="resizeImgClass">
                                                            </div>
                                                            <div class="cardPics-2 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[1]}}" class="resizeImgClass">
                                                            </div>
                                                            <div class="cardPics-1 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[2]}}" class="resizeImgClass">
                                                            </div>
                                                        @elseif(count($trip->placePic) == 4)
                                                            <div class="cardPics-2 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[0]}}" class="resizeImgClass">
                                                            </div>
                                                            <div class="cardPics-2 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[1]}}" class="resizeImgClass">
                                                            </div>
                                                            <div class="cardPics-2 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[2]}}" class="resizeImgClass">
                                                            </div>
                                                            <div class="cardPics-2 cardPics" style="height: 100px;">
                                                                <img src="{{$trip->placePic[3]}}" class="resizeImgClass">
                                                            </div>
                                                        @endif

                                                        {{--                                                    @if(count($trip->placePic) > 0)--}}
                                                        {{--                                                        <div class="trip-image ui_column is-6" style="background: url('{{$trip->placePic[0]}}') repeat 0 0; background-size: 100% 100%"></div>--}}
                                                        {{--                                                    @else--}}
                                                        {{--                                                        <div class="trip-image trip-image-empty ui_column is-12" style="background: url('{{URL::asset('images/icons/KOFAV0.svg')}}') repeat 0 0; background-size: cover"></div>--}}
                                                        {{--                                                    @endif--}}
                                                        {{--                                                    @if(count($trip->placePic) > 1)--}}
                                                        {{--                                                        <div class="trip-image ui_column is-6" style="background: url('{{$trip->placePic[1]}}')  repeat 0 0; background-size: 100% 100%"></div>--}}
                                                        {{--                                                    @else--}}
                                                        {{--                                                        <div class="trip-image trip-image-empty ui_column is-6"></div>--}}
                                                        {{--                                                    @endif--}}
                                                        {{--                                                    @if(count($trip->placePic) > 2)--}}
                                                        {{--                                                        <div class="trip-image ui_column is-6" style="background: url('{{$trip->placePic[2]}}') repeat 0 0; background-size: 100% 100%"></div>--}}
                                                        {{--                                                    @else--}}
                                                        {{--                                                        <div class="trip-image trip-image-empty ui_column is-6"></div>--}}
                                                        {{--                                                    @endif--}}
                                                        {{--                                                    @if(count($trip->placePic) > 3)--}}
                                                        {{--                                                        <div class="trip-image ui_column is-6" style="background: url('{{$trip->placePic[3]}}') repeat 0 0; background-size: 100% 100%"></div>--}}
                                                        {{--                                                    @else--}}
                                                        {{--                                                        <div class="trip-image trip-image-empty ui_column is-6"></div>--}}
                                                        {{--                                                    @endif--}}
                                                    </div>
                                                    <div class="trip-details ui_columns is-mobile is-fullwidth cardFooter">
                                                        <div class="trip-itemcount ui_column">تعداد اماکن موجود : {{$trip->placeCount}}</div>
                                                        <div class="trip-last-modified ui_column">آخرین بازید : {{getLastSeen($trip->lastSeen)}} </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="notification-container"></div>
                </div>
            </div>
            <div class="ui_backdrop dark display-none" ></div>
        </div>
    </div>
    <script>
        function refreshThisPage(){
            location.reload();
        }

        function showElement(id) {
            $(".item").addClass('hidden');
            $("#" + id).removeClass('hidden');
        }

        function hideElement(id) {
            $("#" + id).addClass('hidden');
        }

        function showElement2(id) {
            $("#" + id).show();
        }

        function hideElement2(id) {
            $("#" + id).hide();
        }

        var tripStyles = [];

        function toggleTripStyles(id) {
            for(i = 0; i < tripStyles.length; i++) {

                if(tripStyles[i] == id) {
                    $("#tripStyle_" + id).css("background-color", 'white').css("color", 'black');
                    $("#tripStylePic_" + id).css("visibility", 'hidden');
                    tripStyles.splice(i, 1);
                    if(tripStyles.length < 3) {
                        $("#submitBtnTripStyle").attr("disabled", true);
                    }
                    return;
                }

            }

            tripStyles[tripStyles.length] = id;
            $("#tripStyle_" + id).css("background-color", 'var(--koochita-light-green)').css("color", 'white');
            $("#tripStylePic_" + id).css("visibility", 'visible');
            if(tripStyles.length >= 3) {
                $("#submitBtnTripStyle").attr("disabled", false);
            }
        }

        function closeTripStyles(element) {

            for(i = 0; i < tripStyles.length; i++) {
                $("#tripStylePic_" + tripStyles[i]).css("visibility", "hidden");
            }
            $('.dark').hide();
            hideElement(element);
        }

        function updateMyTripStyle(uId, element) {

            $.ajax({
                type: 'post',
                url: 'updateTripStyles',
                data: {
                    uId: uId,
                    tripStyles : tripStyles
                },
                success: function (response) {
                    closeTripStyles(element);
                }
            });
        }

    </script>
    <script>

        var total;
        var filters = [];
        var hasFilter = false;
        var topContainer;
        var marginTop;
        var helpWidth;
        var greenBackLimit = 5;
        var pageHeightSize = window.innerHeight;
        var additional = [];
        var indexes = [];

        $(".nextBtnsHelp").click(function () {
            show(parseInt($(this).attr('data-val')) + 1, 1);
        });

        $(".backBtnsHelp").click(function () {
            show(parseInt($(this).attr('data-val')) - 1, -1);
        });

        $(".exitBtnHelp").click(function () {
            myQuit();
        });

        function myQuit() {
            clear();
            $(".dark").hide();
            enableScroll();
        }

        function setGreenBackLimit(val) {
            greenBackLimit = val;
        }

        function initHelp(t, sL, topC, mT, hW) {
            total = t;
            filters = sL;
            topContainer = topC;
            marginTop = mT;
            helpWidth = hW;

            if(sL.length > 0)
                hasFilter = true;

            $(".dark").show();
            show(1, 1);
        }

        function initHelp2(t, sL, topC, mT, hW, i, a) {
            total = t;
            filters = sL;
            topContainer = topC;
            marginTop = mT;
            helpWidth = hW;
            additional = a;
            indexes = i;

            if(sL.length > 0)
                hasFilter = true;

            $(".dark").show();
            show(1, 1);
        }

        function isInFilters(key) {

            key = parseInt(key);

            for(j = 0; j < filters.length; j++) {
                if (filters[j] == key)
                    return true;
            }
            return false;
        }

        function getBack(curr) {

            for(i = curr - 1; i >= 0; i--) {
                if(!isInFilters(i))
                    return i;
            }
            return -1;
        }

        function getFixedFromLeft(elem) {

            if(elem.prop('id') == topContainer || elem.prop('id') == 'PAGE') {
                return parseInt(elem.css('margin-left').split('px')[0]);
            }

            return elem.position().left +
                    parseInt(elem.css('margin-left').split('px')[0]) +
                    getFixedFromLeft(elem.parent());
        }

        function getFixedFromTop(elem) {

            if(elem.prop('id') == topContainer) {
                return marginTop;
            }

            if(elem.prop('id') == "PAGE") {
                return 0;
            }

            return elem.position().top +
                    parseInt(elem.css('margin-top').split('px')[0]) +
                    getFixedFromTop(elem.parent());
        }

        function getNext(curr) {

            curr = parseInt(curr);

            for(i = curr + 1; i < total; i++) {
                if(!isInFilters(i))
                    return i;
            }
            return total;
        }

        function bubbles(curr) {

            if(total <= 1)
                return "";

            t = total - filters.length;
            newElement = "<div class='col-xs-12 position-relative'><div class='col-xs-12 bubbles pd-0 mg-rt-0' style='margin-left: " + ((400 - (t * 18)) / 2) + "px'>";

            for (i = 1; i < total; i++) {
                if(!isInFilters(i)) {
                    if(i == curr)
                        newElement += "<div class='isNotInFilterCurrent'></div>";
                    else
                        newElement += "<div onclick='show(\"" + i + "\", 1)' class='helpBubble isNotInFilter'></div>";
                }
            }

            newElement += "</div></div>";

            return newElement;
        }

        function clear() {

            $('.bubbles').remove();

            $(".targets").css({
                'position': '',
                'border': '',
                'padding': '',
                'background-color': '',
                'z-index': '',
                'cursor': '',
                'pointer-events': 'auto'
            });

            $(".helpSpans").addClass('hidden');
            $(".backBtnsHelp").attr('disabled', 'disabled');
            $(".nextBtnsHelp").attr('disabled', 'disabled');
        }

        function show(curr, inc) {

            clear();

            if(hasFilter) {
                while (isInFilters(curr)) {
                    curr += inc;
                }
            }

            if(getBack(curr) <= 0) {
                $("#backBtnHelp_" + curr).attr('disabled', 'disabled');
            }
            else {
                $("#backBtnHelp_" + curr).removeAttr('disabled');
            }

            if(getNext(curr) > total - 1) {
                $("#nextBtnHelp_" + curr).attr('disabled', 'disabled');
            }
            else {
                $("#nextBtnHelp_" + curr).removeAttr('disabled');
            }

            if(curr < greenBackLimit) {
                $("#targetHelp_" + curr).css({
                    'position': 'relative',
                    'border': '5px solid #333',
                    'padding': '10px',
                    'background-color': 'var(--koochita-light-green)',
                    'z-index': 1000001,
                    'cursor': 'auto'
                });
            }
            else {
                $("#targetHelp_" + curr).css({
                    'position': 'relative',
                    'border': '5px solid #333',
                    'padding': '10px',
                    'background-color': 'white',
                    'z-index': 100000001,
                    'cursor': 'auto'
                });
            }

            var targetWidth = $("#targetHelp_" + curr).css('width').split('px')[0];

            var targetHeight = parseInt($("#targetHelp_" + curr).css('height').split('px')[0]);

            for(j = 0; j < indexes.length; j++) {
                if(curr == indexes[j]) {
                    targetHeight += additional[j];
                    break;
                }
            }

            if($("#targetHelp_" + curr).offset().top > 200) {
                $("html, body").scrollTop($("#targetHelp_" + curr).offset().top - 100);
                $("#helpSpan_" + curr).css({
                    'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                    'top': targetHeight + 120 + "px"
                }).removeClass('hidden').append(bubbles(curr));
            }
            else {
                $("#helpSpan_" + curr).css({
                    'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                    'top': ($("#targetHelp_" + curr).offset().top + targetHeight + 20) % pageHeightSize + "px"
                }).removeClass('hidden').append(bubbles(curr));
            }



            $(".helpBubble").on({

                mouseenter: function () {
                    $(this).css('background-color', '#ccc');
                },
                mouseleave: function () {
                    $(this).css('background-color', '#333');
                }

            });

            disableScroll();
        }

        // left: 37, up: 38, right: 39, down: 40,
        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36

        var keys = {37: 1, 38: 1, 39: 1, 40: 1};

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault)
                e.preventDefault();
            e.returnValue = false;
        }

        function preventDefaultForScrollKeys(e) {
            if (keys[e.keyCode]) {
                preventDefault(e);
                return false;
            }
        }

        function disableScroll() {
            if (window.addEventListener) // older FF
                window.addEventListener('DOMMouseScroll', preventDefault, false);
            window.onwheel = preventDefault; // modern standard
            window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
            window.ontouchmove  = preventDefault; // mobile
            document.onkeydown  = preventDefaultForScrollKeys;
        }

        function enableScroll() {
            if (window.removeEventListener)
                window.removeEventListener('DOMMouseScroll', preventDefault, false);
            window.onmousewheel = document.onmousewheel = null;
            window.onwheel = null;
            window.ontouchmove = null;
            document.onkeydown = null;
        }

    </script>

@stop