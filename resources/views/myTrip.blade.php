<?php  $mode = 'profile'; $user = Auth::user(); ?>
@extends('layouts.bodyProfile')

@section('header')
    @parent
@stop

<?php
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

@section('main')

    @include('layouts.pop-up-create-trip')

    <style>
        #saves-all-trips .all-trips-header .header-sort-container .sort-options li.selected:after {
            position: relative !important;
            right: -65px !important;
        }
        .ui_tabs {
            white-space: inherit !important;
        }
        .helpSpans p{
            font-size: 14px;
            line-height: 2em;
            text-align: justify;
        }
        .nextBtnsHelp{
            margin-left: 5px !important;
        }
    </style>

    <div id="MAIN" class="Saves prodp13n_jfy_overflow_visible" style="position: relative">
        <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2" style="position: relative">
            <div class="wrpHeader"></div>
            <div id="saves-body" class="styleguide" style="position: relative">
                <div id="saves-root-view" style="position: relative">
                    <div id="saves-all-trips" style="position: relative">
                        <div class="saves-title title" style="position: relative">سفرهای من</div>
                        <div id="saves-view-tabs-placeholder" style="position: relative"></div>
                        <div id="saves-view-tabs-container" class="" style="position: relative">
                            <div class="ui_container" style="position: relative">
                                <div class="ui_columns" style="position: relative">
                                    <div class="trips-header ui_column" style="position: relative;">
                                        <div style="position: relative;">
                                            <div class="all-trips-header" style="position: relative;">
                                                <div class="header-sort-container" style="position: relative;">
                                                    <ul class="sort-options" style="margin-top: 12px;">
                                                        <li id="sort-option-name" data-sort="name">نام</li>
                                                        <li id="sort-option-recent" data-sort="recent" class="selected" style="padding-right: 20px; border-radius: 2px">بازدید اخیر</li>
                                                    </ul>
                                                    <div id="targetHelp_9" class="targets" style="float: left;">
                                                        <span class="sort-text"> :مرتب شده بر اساس </span>
                                                        <div id="helpSpan_9" class="helpSpans hidden row">
                                                            <span class="introjs-arrow"></span>
                                                            <p>در این قسمت می توانید اطلاعات را با فیلتر های موجود مرتب کنید.</p>
                                                            <button data-val="9" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_9">بعدی</button>
                                                            <button data-val="9" class="btn btn-primary backBtnsHelp" id="backBtnHelp_9">قبلی</button>
                                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="saves-view-tabs" class="ui_column is-6 ui_tabs" style="position: relative; margin-right: 12px;">
                                        <div id="targetHelp_6" class="targets" style="width: 30%; float: right;">
                                            <div onclick="document.location.href = '{{route('myTrips')}}'" class="ui_tab active">سفرهای من</div>
                                            <div id="helpSpan_6" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>از این قسمت می توانید به سفر های خود دسترسی داشته باشید و با دوستانتان سفر های خود را برنامه ریزی کنید.</p>
                                                <button data-val="6" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_6">بعدی</button>
                                                <button data-val="6" class="btn btn-primary backBtnsHelp" id="backBtnHelp_6">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                        <div id="targetHelp_7" class="targets" style="width: 33%; float: right;">
                                            <a data-tab-link="recent" href="{{route('recentlyViewTotal')}}" class="ui_tab">بازدید های اخیر</a>
                                            <div id="helpSpan_7" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می توانید به بازدید ای اخیر خود دسترسی داشته باشید.</p>
                                                <button data-val="7" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_7">بعدی</button>
                                                <button data-val="7" class="btn btn-primary backBtnsHelp" id="backBtnHelp_7">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                        <div id="targetHelp_8" class="targets" style="width: 37%; float: right;">
                                            <a data-tab-link="all_saves" href="{{route('bookmark')}}" class="ui_tab">نشانه گذاری شده ها</a>
                                            <div id="helpSpan_8" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می توانید صفحاتی را که رجوع بعدی نشانه گذاری کرده اید مشاهده نمایید.</p>
                                                <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                                                <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui_column">
                                        {{--@if($sumTmp == 0)--}}
                                            <a style="cursor: pointer; float: left;" class="link" onclick="initHelp(10, [1, 2, 3, 4, 5], 'MAIN', 100, 400)">
                                                <div style="background-size: 28px;background-position:  0 -29px;width: 28px;height:  28px;background-image: url('{{URL::asset('images') . '/help_share.png'}}');background-repeat:  no-repeat;"></div>
                                            </a>
                                        {{--@else--}}
                                            {{--<a style="cursor: pointer" class="link" onclick="initHelp(16, [], 'MAIN', 100, 400)">--}}
                                                    {{--<div style="background-size: 28px;background-position:  0 -29px;width: 28px;height:  28px;background-image: url('{{URL::asset('images') . 'help_share.png'}}');background-repeat:  no-repeat;"></div>--}}
                                                {{--</a>--}}
                                        {{--@endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($trips == null || count($trips) == 0)
                            <div class="trips-container ui_container">
                                <div class="trips-container-inner ui_columns is-multiline">
                                    <div class="no-saves-container">
                                        <div class="no-saves-content content">
                                            <div class="ui_icon heart"></div>
                                            <div class="cta-header">هنوز چیزی ذخیره نشده است </div>
                                            <div onclick="showPopUp()" class="header-create-trip ui_button primary is-hidden-mobile">+ ایجاد سفر </div>
                                        </div>
                                        <div class="mapAside is-hidden-mobile">
                                            <div class="mapHolder"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="trips-container ui_container">
                            <div class="trips-container-inner ui_columns is-multiline">
                                <div onclick="showPopUp()" class="trip-tile-container ui_column is-4 is-hidden-mobile">
                                    <div class="trip-tile ui_card is-fullwidth new-trip">
                                        <span class="ui_icon plus"></span>
                                        <p>ایجاد سفر</p>
                                    </div>
                                </div>
                                @foreach($trips as $trip)
                                    <div class="trip-tile-container ui_column is-4">
                                        <a href="{{route('tripPlaces', ['tripId' => $trip->id])}}" class="trip-tile ui_card is-fullwidth">
                                            <div class="trip-header">
                                                <div class="trip-name">{{$trip->name}}</div>
                                                <div class="trip-date">&nbsp;</div>
                                            </div>
                                            <div style="cursor: pointer;" class="trip-images ui_columns is-gapless is-multiline is-mobile">
                                                @if($trip->placeCount > 0)
                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic1}}') repeat 0 0; background-size: 100% 100%"></div>
                                                @else
                                                    <div class="trip-image trip-image-empty ui_column is-6"></div>
                                                @endif
                                                @if($trip->placeCount > 1)
                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic2}}')  repeat 0 0; background-size: 100% 100%"></div>
                                                @else
                                                    <div class="trip-image trip-image-empty ui_column is-6"></div>
                                                @endif
                                                @if($trip->placeCount > 2)
                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic3}}') repeat 0 0; background-size: 100% 100%"></div>
                                                @else
                                                    <div class="trip-image trip-image-empty ui_column is-6"></div>
                                                @endif
                                                @if($trip->placeCount > 3)
                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic4}}') repeat 0 0; background-size: 100% 100%"></div>
                                                @else
                                                    <div class="trip-image trip-image-empty ui_column is-6"></div>
                                                @endif
                                            </div>
                                            <div class="trip-details ui_columns is-mobile is-fullwidth">
                                                <div class="trip-itemcount ui_column">تعداد اماکن موجود : {{$trip->placeCount}}</div>
                                                <div class="trip-last-modified ui_column">آخرین بازید : {{getLastSeen($trip->lastSeen)}} </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="notification-container"></div>
                </div>
            </div>
            <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/saves-rest-client.css?v=1')}}' data-rup='saves-rest-client'/>
            <div class="ui_backdrop dark" style="display: none;"></div>
        </div>
    </div>
    <script>
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
            $("#tripStyle_" + id).css("background-color", '#4dc7bc').css("color", 'white');
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
            newElement = "<div class='col-xs-12' style='position: relative'><div class='col-xs-12 bubbles' style='padding: 0; margin-right: 0; margin-left: " + ((400 - (t * 18)) / 2) + "px'>";

            for (i = 1; i < total; i++) {
                if(!isInFilters(i)) {
                    if(i == curr)
                        newElement += "<div style='border: 1px solid #ccc; background-color: #ccc; border-radius: 50%; margin-right: 2px; width: 12px; height: 12px; float: left'></div>";
                    else
                        newElement += "<div onclick='show(\"" + i + "\", 1)' class='helpBubble' style='border: 1px solid #333; background-color: black; border-radius: 50%; margin-right: 2px; width: 12px; height: 12px; float: left'></div>";
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
                    'background-color': '#4dc7bc',
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