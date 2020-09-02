<?php $mode = "profile"; $user = Auth::user(); ?>
@extends('layouts.bodyProfile')

@section('header')
    @parent
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/saves-rest-client.css?v=1')}}">
@stop

@section('main')

    @include('layouts.pop-up-create-trip')

    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/bookmark.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}">

    <div id="MAIN" class="Saves prodp13n_jfy_overflow_visible">
        <div id="BODYCON" ng-app="mainApp" class="col easyClear poolB adjust_padding new_meta_chevron_v2">
            <div class="wrpHeader"></div>
            <div id="saves-body" class="styleguide">
                <div id="saves-root-view">
                    <div id="saves-all-trips">
                        <div class="saves-title title">سفرهای من</div>
                        <div id="saves-view-tabs-placeholder"></div>
                        <div id="saves-view-tabs-container">
                            <div class="ui_container">
                                <div class="ui_columns">
                                    <div class="trips-header ui_column">
                                        <div>
                                            <div class="all-trips-header">
                                                <div class="header-sort-container">
{{--                                                    <div class="sort-options">--}}
{{--                                                        <li id="sort-option-name" data-sort="name">نام</li>--}}
{{--                                                        <div id="sort-option-recent" data-sort="recent" class="selected">بازدید اخیر</div>--}}
{{--                                                    </div>--}}
                                                    <div id="targetHelp_9" class="targets">
                                                        <span class="sort-text"> مرتب شده بر اساس: </span>
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
                                    <div id="saves-view-tabs" class="ui_column is-6 ui_tabs">
                                        <div id="targetHelp_6" class="targets">
                                            <div onclick="document.location.href = '{{route('myTrips')}}'" class="ui_tab">سفرهای من</div>
                                            <div id="helpSpan_6" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>از این قسمت می‌توانید به سفرهای خود دسترسی داشته باشید و با دوستانتان سفرهای خود را برنامه‌ریزی کنید.</p>
                                                <button data-val="6" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_6">بعدی</button>
                                                <button data-val="6" class="btn btn-primary backBtnsHelp" id="backBtnHelp_6">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                        <div id="targetHelp_7" class="targets">
                                            <a data-tab-link="recent" href="{{route('recentlyViewTotal')}}" class="ui_tab">بازدیدهای اخیر</a>
                                            <div id="helpSpan_7" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می‌توانید به بازدید‌های اخیر خود دسترسی داشته باشید.</p>
                                                <button data-val="7" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_7">بعدی</button>
                                                <button data-val="7" class="btn btn-primary backBtnsHelp" id="backBtnHelp_7">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                        <div id="targetHelp_8" class="targets">
                                            <a data-tab-link="all_saves" href="{{route('bookmark')}}" class="ui_tab active">نشانه‌گذاری شده‌ها</a>
                                            <div id="helpSpan_8" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می‌توانید صفحاتی را که رجوع بعدی نشانه‌گذاری کرده‌اید مشاهده نمایید.</p>
                                                <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                                                <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui_column helpBtnIcon">
                                        {{--@if($sumTmp == 0)--}}
                                        <a class="link float-left cursor-pointer" onclick="initHelp(12, [1, 2, 3, 4, 5], 'MAIN', 100, 400)">
                                            <div id="initHelpDiv" style="background-image: url('{{URL::asset('images') . '/help_share.png'}}')"></div>
                                        </a>
                                        {{--@else--}}
                                        {{--<a class="cursor-pointer link" onclick="initHelp(16, [], 'MAIN', 100, 400)">--}}
                                                {{--<div id="initHelpDivElse" style="background-image: url('{{URL::asset('images') . 'help_share.png'}}')"></div>--}}
                                            {{--</a>--}}
                                        {{--@endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($placesCount == 0)
                            <div id="saves-itinerary-container">
                                <div id="trip-dates-region"></div>
                                <div id="trip-side-by-side">
                                    <div class="ui_columns">
                                        <div id="trip-items-region" class="ui_column " data-column-name="items">
                                            <div id="trip-item-collection-container" data-bucket-id="unscheduled" class="drag_container">
                                                <div class="no-saves-container">
                                                    <div class="no-saves-content content">
                                                        <div class="ui_icon heart"></div>
                                                        <div class="cta-header">
                                                            هنوز چیزی ذخیره نشده است
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else

                            <div id="saves-all-trips">
                                <div ng-controller="PlaceController as cntr" id="saves-view-tabs-container">
                                    <div infinite-scroll="myPagingFunction()" class="trips-container ui_container">
                                        <div ng-repeat="packet in packets" class="trips-container-inner ui_columns is-multiline">
                                            <div ng-repeat="place in packet.places" class="trip-tile-container ui_column is-3">
                                                <div class="trip-tile ui_card is-fullwidth">
                                                    <div class="trip-header">
                                                        <div class="trip-settings-header">
                                                            <span class="float-right">[[place.name]]</span>
                                                            <div id="[[($index == 0 && packet.no == 1) ? 'targetHelp_10' : '']]" class="targets float-left">
                                                                <button id="manageTripsBtn" ng-click="addToTrip(place.placeId, place.kindPlaceId)" class="ui_button secondary trip-add-dates">
                                                                    <span class="ui_icon my-trips"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="trip-date">&nbsp;</div>
                                                    </div>
                                                    <img class="cursor-pointer" ng-click="redirect(place.url)" ng-src='[[place.placePic]]' width="230px">
                                                    <div class="trip-details ui_columns is-mobile is-fullwidth">
                                                        <div id="[[($index == 0 && packet.no == 1) ? 'targetHelp_11' : '']]" class="targets margin-auto">
                                                            <button class="tripDetailsMoreInfoBtnBookMarkPlace ui_button secondary trip-add-dates"
                                                                    ng-click="showPlaceInfo('showPlaceInfo_' + place.id, place.placeId, place.kindPlaceId, place.x, place.y, -1, packet.no)"
                                                                    id="showPlaceInfo_[[place.id]]" style=" background: url('{{URL::asset('images/tripplace.png')}}') no-repeat;"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="trip-tile-container ui_column is-12 hidden tripsRowExpandableDiv" id="row_[[packet.no]]"></div>
                                        </div>
                                        <center>
                                            <div class="loader hidden"></div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span id="placeInfo" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="header_text direction-rtl">اطلاعات مکان</div>
                    <div class="ui_typeahead" id="placeParameters">
                    </div>
                </div>
            </div>
        </div>
        <div class="ui_close_x" onclick="hideElement('placeInfo')"></div>
    </span>
    <div class="ui_backdrop dark display-none"></div>
    <span id="addPlaceToTripPrompt" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in item hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div id="managePlaceTextDiv" class="header_text">مدیریت مکان</div>
                    <div class="ui_typeahead direction-rtl" id="tripsForPlace">
                    </div>
                </div>
            </div>
        </div>
        <div class="submitOptions direction-rtl">
            <button id="manageTripVerifyBtn" onclick="assignPlaceToTrip()" class="btn btn-success">تایید</button>
            <input type="submit" onclick="hideElement('addPlaceToTripPrompt')" value="خیر" class="btn btn-default">
        </div>
        <div class="ui_close_x" onclick="hideElement('addPlaceToTripPrompt')"></div>
    </span>

    <div class="hideOnScreen footerOptimizer"></div>

    <script>

        var getPlaceTrips = '{{route('placeTrips')}}';
        var assignPlaceToTripDir = '{{route('assignPlaceToTrip')}}';
        var placeInfo = '{{route('placeInfo')}}';
        var tripPlaces = '{{route('bookmark')}}';
        var selectedX;
        var selectedY;

        function initMap() {

            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 14,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(selectedX, selectedY), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "landscape",
                    "stylers": [
                        {"hue": "#FFA800"},
                        {"saturation": 0},
                        {"lightness": 0},
                        {"gamma": 1}
                    ]
                }, {
                    "featureType": "road.highway",
                    "stylers": [
                        {"hue": "#53FF00"},
                        {"saturation": -73},
                        {"lightness": 40},
                        {"gamma": 1}
                    ]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [
                        {"hue": "#FBFF00"},
                        {"saturation": 0},
                        {"lightness": 0},
                        {"gamma": 1}
                    ]
                }, {
                    "featureType": "road.local",
                    "stylers": [
                        {"hue": "#00FFFD"},
                        {"saturation": 0},
                        {"lightness": 30},
                        {"gamma": 1}
                    ]
                }, {
                    "featureType": "water",
                    "stylers": [
                        {"hue": "#00BFFF"},
                        {"saturation": 6},
                        {"lightness": 8},
                        {"gamma": 1}
                    ]
                }, {
                    "featureType": "poi",
                    "stylers": [
                        {"hue": "#679714"},
                        {"saturation": 33.4},
                        {"lightness": -25.4},
                        {"gamma": 1}
                    ]
                }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: 'Shazdemosafer!'
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=initMap"></script>

    <script>

        var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });

        var page = 1;
        var floor = 1;
        var data;
        var init = true;
        var lock = false;

        app.controller('PlaceController', function($scope, $http, $rootScope) {

            $scope.packets = [[]];
            $scope.oldScrollVal = 600;

            $scope.redirect = function (url) {
                document.location.href = url;
            };

            $scope.addToTrip =  function(placeId, kindPlaceId) {

                selectedPlaceId = placeId;
                selectedKindPlaceId = kindPlaceId;

                $.ajax({
                    type: 'post',
                    url: getPlaceTrips,
                    data: {
                        'placeId': placeId,
                        'kindPlaceId': kindPlaceId
                    },
                    success: function (response) {

                        response = JSON.parse(response);
                        newElement = "<div class='row'>";

                        for(i = 0; i < response.length; i++) {

                            newElement += "<div class='col-xs-12'>";
                            newElement += "<div class='ui_input_checkbox'>";

                            if(response[i].select == "0")
                                newElement += "<input type='checkbox' name='selectedTrips[]' id='trip_" + response[i].id + "' value='" + response[i].id + "'>";
                            else
                                newElement += "<input type='checkbox' name='selectedTrips[]' checked id='trip_" + response[i].id + "' value='" + response[i].id + "'>";

                            newElement += "<label class='labelForCheckBox' for='trip_" + response[i].id + "'><span></span>&nbsp;&nbsp;" + response[i].name;
                            newElement += "</label></div></div>";
                        }

                        newElement += "</div>";

                        $("#tripsForPlace").empty().append(newElement);
                        showElement('addPlaceToTripPrompt');

                    }
                });
            };

            $scope.showPlaceInfo = function(id, placeId, kindPlaceId, x, y, tripPlaceId, rowId) {

                if(currButtomInfoKindPlace == kindPlaceId && currButtomInfoPlace == placeId) {
                    if (!$("#row_" + rowId).hasClass('hidden')) {
                        $("#row_" + rowId).empty().addClass('hidden');
                        oldButtonId = -1;
                        $("#" + id).css('background-position-y', '0');
                        return;
                    }
                }

                if(oldButtonId != -1)
                    $("#" + oldButtonId).css('background-position-y', '0');

                $("#" + id).css('background-position-y', '-23px');
                oldButtonId = id;

                currButtomInfoPlace = placeId;
                currButtomInfoKindPlace = kindPlaceId;

                if(!tripPlaceId)
                    tripPlaceId = -1;

                selectedX = x;
                selectedY = y;

                $.ajax({
                    type: 'post',
                    url: placeInfo,
                    data: {
                        'placeId': placeId,
                        'kindPlaceId': kindPlaceId,
                        'tripPlaceId': tripPlaceId
                    },
                    success: function (response) {

                        response = JSON.parse(response);

                        newElement = "<div class='col-xs-12 direction-rtl'>";


                        newElement += "<div class='col-xs-6'>";
                        if(response["date"] != null)
                            newElement += "<p class='expandableTripDate'>تاریخ بازدید: " + response["date"] + "</p>";
                        newElement += "</div>";
                        newElement += "<div class='col-xs-6'>";
                        newElement += "<p id='expandableTripTitleText' onclick='document.location.href = \""+ response['url'] +"\"'>" + response["name"] + "</p>";
                        newElement += "</div>";
                        newElement += "<div class='expandableDivSettings'>";
                        newElement += "<div class='col-xs-6' id='map'></div>";

                        newElement += '<div class="col-xs-6"><DIV class="prw_rup prw_common_bubble_rating overallBubbleRating">';
                        if(response["point"] == 5)
                            newElement += '<span class="ui_bubble_rating bubble_50 font-size-16px" property="ratingValue" content="5" alt="5 of 5 bubbles"></span>';
                        else if(response["point"] == 4)
                            newElement += '<span class="ui_bubble_rating bubble_40 font-size-16px" property="ratingValue" content="5" alt="4 of 5 bubbles"></span>';
                        else if(response["point"] == 3)
                            newElement += '<span class="ui_bubble_rating bubble_30 font-size-16px" property="ratingValue" content="5" alt="3 of 5 bubbles"></span>';
                        else if(response["point"] == 2)
                            newElement += '<span class="ui_bubble_rating bubble_20 font-size-16px" property="ratingValue" content="5" alt="2 of 5 bubbles"></span>';
                        else
                            newElement += '<span class="ui_bubble_rating bubble_10 font-size-16px" property="ratingValue" content="5" alt="1 of 5 bubbles"></span>';
                        newElement += "</DIV>";

                        newElement += "<p>" + response["city"] + "/" + response["state"] + "</p>";
                        newElement += "<p>" + response["address"] + "</p>";
                        newElement += "</div>";
                        newElement += "</div>";
                        // newElement += "<div class='col-xs-4'>";
                        // newElement += "<div><img onclick='document.location.href = \""+ response['url'] +"\"' width='200px' height='200px' class='cursor-pointer' src='" + response["pic"] +  "'></div>";
                        // newElement += "</div>";
                        // newElement += "</div>";

                        if(tripPlaceId != -1) {

                            comments = response["comments"];

                            for(i = 0; i < comments.length; i++) {
                                newElement += "<div class='col-xs-12'>";
                                newElement += "<p>" + comments[i].uId + " میگه : " + comments[i].description + "</p>";

                                newElement += "</div>";
                            }

                            newElement += "<div class='col-xs-2 mg-tp-10'>";
                            newElement += "<button id='sendBtnBookMarkPlace' class='btn btn-primary' onclick='addComment(\"" + tripPlaceId + "\")' data-toggle='tooltip' title='ارسال نظر'>ارسال</button>";
                            newElement += "</div>";

                            newElement += "<div class='col-xs-10 mg-tp-10'>";
                            newElement += "<textarea id='newComment' placeholder='یادداشت خود را وارد نمایید (حداکثر 300 کارکتر)' maxlength='300'></textarea>";
                            newElement += "</div>";
                        }

                        $("#row_" + rowId).empty().append(newElement).removeClass('hidden');
                        initMap();
                    }
                });
            };

            $scope.myPagingFunction = function () {

                if(page == 1) {
                    $scope.packets = [[]];
                }

                var scroll = $(window).scrollTop();

                if(scroll - $scope.oldScrollVal < 100 && !init)
                    return;

                if(init)
                    init = false;
                else
                    $scope.oldScrollVal += scroll;

                $(".loader").removeClass('hidden');

                data = $.param({
                    pageNum: page
                });

                var requestURL = '{{route('getBookmarkElems')}}';

                const config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                };

                $http.post(requestURL, data, config).then(function (response) {

                    $scope.packets[page - 1] = response.data;
                    $scope.packets[page - 1].no = page;
                    $scope.packets[page - 1].places = response.data.places;

                    if(response.data.places.length != 4) {
                        $scope.$broadcast('finalizeReceive');
                        return;
                    }

                    data = $.param({
                        pageNum: ++page
                    });

                    $http.post(requestURL, data, config).then(function (response) {

                        if (response.data != null && response.data.places != null && response.data.places.length > 0)
                            $scope.show = true;

                        $scope.packets[page - 1] = response.data;
                        $scope.packets[page - 1].no = page;
                        $scope.packets[page - 1].places = response.data.places;

                        if(page == 2) {
                            var newElement = '<div id="helpSpan_11" class="helpSpans hidden row"><span class="introjs-arrow"></span>';
                            newElement += '<p>با فشردن این دکمه می توانید جزئیات اماکن را مشاهده نمایید.</p>';
                            newElement += '<button data-val="11" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_11">بعدی</button>';
                            newElement += '<button onclick="show(10, 1)" data-val="11" class="btn btn-primary backBtnsHelp" id="backBtnHelp_11">قبلی</button>';
                            newElement += '<button onclick="myQuit()" class="btn btn-danger exitBtnHelp">خروج</button></div>';
                            $('#targetHelp_11').append(newElement);

                            newElement = '<div id="helpSpan_10" class="helpSpans hidden row"><span class="introjs-arrow"></span>';
                            newElement += '<p> با فشردن این دکمه می توانید اماکن را مستقیما به لیست سفر خود ارسال نمایید.</p>';
                            newElement += '<button onclick="show(11, 1)" data-val="10" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_10">بعدی</button>';
                            newElement += '<button onclick="show(9, 1)" data-val="10" class="btn btn-primary backBtnsHelp" id="backBtnHelp_10">قبلی</button>';
                            newElement += '<button onclick="myQuit()" class="btn btn-danger exitBtnHelp">خروج</button></div>';
                            $('#targetHelp_10').append(newElement);
                        }

                        if(response.data.places.length != 4) {
                            $scope.$broadcast('finalizeReceive');
                            return;
                        }

                        data = $.param({
                            pageNum: ++page
                        });

                        $http.post(requestURL, data, config).then(function (response) {

                            if (response.data != null && response.data.places != null && response.data.places.length > 0)
                                $scope.show = true;

                            $scope.packets[page - 1] = response.data;
                            $scope.packets[page - 1].no = page;
                            $scope.packets[page - 1].places = response.data.places;
                            $scope.$broadcast('finalizeReceive');

                        }).catch(function (err) {
                            console.log(err);
                        });

                    }).catch(function (err) {
                        console.log(err);
                    });
                }).catch(function (err) {
                    console.log(err);
                });
            };

            $scope.$on('finalizeReceive', function(event) {

                page++;

                $(".loader").addClass('hidden');
                floor = page;

            });
        });
    </script>

    <script async>
        var mod;mod=angular.module("infinite-scroll",[]),mod.directive("infiniteScroll",["$rootScope","$window","$timeout",function(i,n,e){return{link:function(t,l,o){var r,c,f,a;return n=angular.element(n),f=0,null!=o.infiniteScrollDistance&&t.$watch(o.infiniteScrollDistance,function(i){return f=parseInt(i,10)}),a=!0,r=!1,null!=o.infiniteScrollDisabled&&t.$watch(o.infiniteScrollDisabled,function(i){return a=!i,a&&r?(r=!1,c()):void 0}),c=function(){var e,c,u,d;return d=n.height()+n.scrollTop(),e=l.offset().top+l.height(),c=e-d,u=n.height()*f>=c,u&&a?i.$$phase?t.$eval(o.infiniteScroll):t.$apply(o.infiniteScroll):u?r=!0:void 0},n.on("scroll",c),t.$on("$destroy",function(){return n.off("scroll",c)}),e(function(){return o.infiniteScrollImmediateCheck?t.$eval(o.infiniteScrollImmediateCheck)?c():void 0:c()},0)}}}])
    </script>

    <script>
        var selectedPlaceId = -1;
        var selectedKindPlaceId = -1;
        var selectedTripPlace;
        var selectedUsername;
        var currButtomInfoPlace;
        var currButtomInfoKindPlace;
        var oldButtonId = -1;

        function showElement(element) {
            $(".pop-up").addClass('hidden');
            $(".item").addClass("hidden");
            $("#" + element).removeClass('hidden');
            $('.dark').show();
        }

        function hideElement() {
            $(".item").addClass('hidden');
            $('.dark').hide();
        }

        function searchPlace(element) {

            $.ajax({
                type: 'post',
                url: getStates,
                success: function (response) {

                    response = JSON.parse(response);

                    newElement = "<div class='row direction-rtl'><div class='float-right col-xs-4'><select id='stateId' onchange='getCities(this.value)'>";

                    newElement += "<option selected value='-1'>استان</option>";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<option value = '" + response[i].id + "'>" + response[i].name + "</option>";
                    }

                    newElement += "</select></div>";

                    newElement += "<div class='col-xs-4 float-right'><select id='cityId'></select></div>";
                    newElement += "<div class='col-xs-4'><select onchange='search()' id='placeKind'></select></div>";

                    newElement += "<div class='col-xs-12' id='keyAndResultMainDiv'>";
                    newElement += "<input id='key' onkeyup='search()' type='text' maxlength='50' placeholder='هتل ، رستوران و اماکن'>";
                    newElement += "<div id='result' class='data_holder'></div>";
                    newElement += "</div>";


                    newElement += "</div>";

                    if(response.length > 0)
                        getCities(response[0].id);

                    getPlaceKinds();

                    $("#parameters").empty().append(newElement);

                    showElement(element);

                }
            });
        }

        function search() {

            key = $("#key").val();

            if(key == null || key.length < 3) {
                $("#result").empty();
                return;
            }

            cityId = $("#cityId").val();
            placeKind = $("#placeKind").val();

            if(placeKind == -1) {
                $("#result").empty().append("<p class='dark-red'>لطفا مکان مورد نظر خود را مشخص کنید</p>");
                return;
            }

            $.ajax({
                type: 'post',
                url: searchPlaceDir,
                data: {
                    "stateId": $("#stateId").val(),
                    "cityId": cityId,
                    "key": key,
                    "placeKind": placeKind
                },
                success: function (response) {

                    response = JSON.parse(response);

                    newElement = "";

                    if(response.length == 0) {
                        $("#placeId").val("");
                        newElement = 'موردی یافت نشد';
                    }

                    else {
                        suggestions = response;
                        currIdx = -1;

                        for(i = 0; i < response.length; i++) {
                            newElement += "<div class='suggest bookMarkPlaceSuggestion' id='suggest_" + i + "'  onclick='addPlace(\"" + response[i].id + "\")'> " + response[i].name + "<span> - </span><span>در</span><span>&nbsp;</span>" + response[i].cityName + "<span>&nbsp;در</span>" + response[i].stateName + "<span>&nbsp;آدرس</span><span>&nbsp;</span>" + response[i].address + "</div>";
                        }

                        $("#result").empty().append(newElement);
                    }
                }
            });
        }

        function addPlace(val) {

            placeKind = $("#placeKind").val();

            $.ajax({
                type: 'post',
                url: addTripPlace,
                data: {
                    "tripId": tripId,
                    "placeId": val,
                    "kindPlaceId": placeKind
                },
                success: function (response) {

                    if(response == "ok")
                        document.location.href = tripPlaces;
                    else {
                        $("#placePromptError").empty().append('مکان مورد نظر در سفر شما موجود است');
                    }
                }
            });
        }

        function getCities(stateId) {

            $.ajax({
                type: 'post',
                url: getCitiesDir,
                data: {
                    stateId: stateId
                },
                success: function (response) {
                    response = JSON.parse(response);

                    newElement = "";

                    if(response.length == 0)
                        newElement = "نتیجه ای حاصل نشد";

                    else
                        newElement += "<option selected value = '-1'>شهر</option>";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<option value='" + response[i].id + "'>" + response[i].name + "</option>";
                    }

                    search();
                    $("#cityId").empty().append(newElement);

                }
            });
        }

        function getPlaceKinds() {

            $.ajax({
                type: 'post',
                url: getPlaceKindsDir,
                success: function (response) {
                    response = JSON.parse(response);

                    newElement = "";
                    newElement += "<option selected value = '-1'>مکان مورد نظر</option>";
                    for(i = 0; i < response.length; i++) {
                        newElement += "<option value='" + response[i].id + "'>" + response[i].name + "</option>";
                    }

                    $("#placeKind").empty().append(newElement);

                }
            });
        }

        function changeClearCheckBox(from, to) {

            val = $("#clearDateId").is(":checked");

            if(val == true) {
                $("#date_input_start_edit").val("");
                $("#date_input_end_edit").val("");
            }
            else {
                $("#date_input_start_edit").val(from);
                $("#date_input_end_edit").val(to);
            }

            val = $("#clearDateId_2").is(":checked");

            if(val == true) {
                $("#date_input_start_edit_2").val("");
                $("#date_input_end_edit_2").val("");
            }
            else {
                $("#date_input_start_edit_2").val(from);
                $("#date_input_end_edit_2").val(to);
            }
        }

        function checkBtnDisable() {

            if($("#tripNameEdit").val() == "")
                $("#editBtn").addClass("disabled");
            else
                $("#editBtn").removeClass("disabled");
        }

        function showEditTrip(from, to) {

            $("#date_input_start_edit").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });
            $("#date_input_end_edit").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });

            $("#date_input_start_edit").val(from);
            $("#date_input_end_edit").val(to);
            $("#error").empty();
            showElement('editTripPrompt');
        }

        function editTrip() {

            date_input_start = $("#date_input_start_edit").val();
            date_input_end = $("#date_input_end_edit").val();
            tripName = $("#tripNameEdit").val();

            if(tripName != "" && date_input_start != "" && date_input_start != "") {

                if(date_input_start > date_input_end) {
                    newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                    $("#error").empty().append(newElement);
                    return;
                }

                $.ajax({
                    type: 'post',
                    url: editTripDir,
                    data: {
                        'tripName': tripName,
                        'dateInputStart' : date_input_start,
                        'dateInputEnd' : date_input_end,
                        'tripId' : tripId
                    },
                    success: function (response) {
                        if(response == "ok") {
                            document.location.href = tripPlaces;
                        }
                        else if(response == "nok3") {
                            newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                            $("#error").empty().append(newElement);
                        }
                    }
                });
            }
            else
                editTripWithOutDate();

        }

        function editTripWithOutDate() {

            tripName = $("#tripNameEdit").val();

            if(tripName != "") {

                $.ajax({
                    type: 'post',
                    url: editTripDir,
                    data: {
                        'tripName': tripName,
                        'tripId' : tripId
                    },
                    success: function (response) {
                        if(response == "ok") {
                            document.location.href = tripPlaces;
                        }
                    }
                });
            }
        }

        function addToTrip(placeId, kindPlaceId) {

            selectedPlaceId = placeId;
            selectedKindPlaceId = kindPlaceId;

            $.ajax({
                type: 'post',
                url: getPlaceTrips,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId
                },
                success: function (response) {

                    response = JSON.parse(response);
                    newElement = "<div class='row'>";

                    for(i = 0; i < response.length; i++) {

                        newElement += "<div class='col-xs-12'>";
                        newElement += "<div class='ui_input_checkbox'>";

                        if(response[i].select == "0")
                            newElement += "<input type='checkbox' name='selectedTrips[]' id='trip_" + response[i].id + "' value='" + response[i].id + "'>";
                        else
                            newElement += "<input type='checkbox' name='selectedTrips[]' checked id='trip_" + response[i].id + "' value='" + response[i].id + "'>";

                        newElement += "<label class='labelForCheckBox' for='trip_" + response[i].id + "'><span></span>&nbsp;&nbsp;" + response[i].name;
                        newElement += "</label></div></div>";
                    }

                    newElement += "</div>";

                    $("#tripsForPlace").empty().append(newElement);
                    showElement('addPlaceToTripPrompt');

                }
            });
        }

        function assignPlaceToTrip() {

            if(selectedPlaceId != -1) {
                var checkedValuesTrips = $("input:checkbox[name='selectedTrips[]']:checked").map(function () {
                    return this.value;
                }).get();

                if(checkedValuesTrips == null || checkedValuesTrips.length == 0)
                    checkedValuesTrips = "empty";

                $.ajax({
                    type: 'post',
                    url: assignPlaceToTripDir,
                    data: {
                        'checkedValuesTrips': checkedValuesTrips,
                        'placeId': selectedPlaceId,
                        'kindPlaceId': selectedKindPlaceId
                    },
                    success: function (response) {
                        if (response == "ok")
                            document.location.href = tripPlaces;
                        else {
                            err = "<p>به جز سفر های زیر که اجازه ی افزودن مکان به آنها را نداشتید بقیه به درستی اضافه شدند</p>";

                            response = JSON.parse(response);

                            for(i = 0; i < response.length; i++)
                                err += "<p>" + response[i] + "</p>";

                            $("#errorAssignPlace").append(err);

                        }
                    }

                });
            }
        }

        function addComment(tripPlaceId) {
            if($("#newComment").val() == "")
                return;
            $.ajax({
                type: 'post',
                url: addCommentDir,
                data: {
                    'tripPlaceId': tripPlaceId,
                    'comment': $("#newComment").val()
                },
                success: function (response) {

                    if(response == "ok")
                        document.location.href = tripPlaces;
                }
            });
        }

        function changeDate() {

            date_input_start = $("#date_input_start_edit_2").val();
            date_input_end = $("#date_input_end_edit_2").val();

            if(date_input_start != "" && date_input_start != "") {

                if(date_input_start > date_input_end) {
                    newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                    $("#error2").empty().append(newElement);
                    return;
                }
            }

            $.ajax({
                type: 'post',
                url: changeDateTripDir,
                data: {
                    'dateInputStart' : date_input_start,
                    'dateInputEnd' : date_input_end,
                    'tripId' : tripId
                },
                success: function (response) {
                    if(response == "ok") {
                        document.location.href = tripPlaces;
                    }
                    else if(response == "nok3") {
                        $("#error2").empty();
                        newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                        $("#error2").append(newElement);
                    }
                }
            });
        }

        function deleteTrip() {

            $(".dark").show();
            $("#deleteTrip").removeClass('hidden');
        }

        function doDeleteTrip() {

            $.ajax({
                type: 'post',
                url: deleteTripDir,
                data: {
                    'tripId': tripId
                },
                success: function (response) {
                    if(response == "ok")
                        document.location.href = myTrips;
                }
            });
        }

        // XMaUcwm2WjjV9WpT

        function doAddNote() {

            $.ajax({
                type: 'post',
                url: addNoteDir,
                data: {
                    'tripId': tripId,
                    'note': $("#tripNote").val()
                },
                success: function (response) {
                    if(response == "ok") {
                        hideElement('note');
                        $("#tripNotePElement").empty();
                        $("#tripNotePElement").append(($("#tripNote").val()));
                    }
                }
            });

        }

        function editDateTrip(from, to) {

            $("#date_input_start_edit_2").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });
            $("#date_input_end_edit_2").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });

            $("#date_input_start_edit_2").val(from);
            $("#date_input_end_edit_2").val(to);
            $("#error2").empty();

            showElement('editDateTripPrompt');
        }

        function assignDateToPlace(tripPlaceId, from, to) {
            selectedPlaceId = tripPlaceId;
            $("#calendar-container-edit-placeDate").css("visibility", "visible");
            $("#date_input").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: from,
                maxDate: to,
                dateFormat: "yy/mm/dd"
            });
            showElement('addDateToPlace');
        }

        function doAssignDateToPlace() {

            if($("#date_input").val() != "") {
                $.ajax({
                    type: 'post',
                    url: assignDateToPlaceDir,
                    data: {
                        'tripPlaceId': selectedPlaceId,
                        'date': $("#date_input").val()
                    },
                    success: function (response) {
                        if(response == "ok")
                            document.location.href = tripPlaces;
                        else if(response == "nok3") {
                            $("#errorText").empty();
                            $("#errorText").append("تاریخ مورد نظر در بازه ی سفر قرار ندارد");
                        }
                    }
                });
            }
        }

        function sortBaseOnPlaceDate(sortMode) {
            if(sortMode == "DESC")
                document.location.href = tripPlaces + "/ASC";
            else
                document.location.href = tripPlaces + "/DESC";
        }

        function inviteFriend() {

            if($("#nickName").val() == "" || $("#friendId").val() == "")
                return;

            $.ajax({
                type: 'post',
                url: inviteFriendDir,
                data: {
                    'nickName' : $("#nickName").val(),
                    'friendId' : $("#friendId").val(),
                    'tripId' : tripId
                },
                success: function(response) {
                    if(response == "ok") {
                        $("#nickName").empty();
                        $("#friendId").empty();
                        $("#errorInvite").empty();
                        hideElement('invitePane');
                    }
                    else if(response == "nok") {
                        $("#errorInvite").empty();
                        $("#errorInvite").append('نام کاربری وارد شده نامعتبر است');
                    }
                    else if(response == "err4") {
                        $("#errorInvite").empty();
                        $("#errorInvite").append('شما هم اکنون عضو این سفر هستید');
                    }
                }
            });
        }

        function showMembers(owner) {

            $.ajax({
                type: 'post',
                url: getMembers,
                data: {
                    'tripId': tripId
                },
                success: function (response) {

                    response = JSON.parse(response);
                    newElement = "";

                    $("#members").empty();

                    for(i = 0; i < response.length; i++) {
                        newElement += "<div class='col-xs-12'>";
                        newElement += "<span>" + response[i]['username'] + "</span>";
                        if(response[i]["delete"] == 1) {
                            newElement += "<button id='eliminateUserBtn' class='ui_button secondary' onclick='deleteMember(\"" + response[i]['username'] + "\")' data-toggle='tooltip' title='حذف عضو'><span class='' ><img src='" + homeURL + "/images/deleteIcon.gif'/> </span></button>";
                            if (owner == 1) {
                                newElement += "<br><a id='DetailsLink' onclick='memberDetails(\"" + response[i]['username'] + "\")'>جزئیات<img src='" + homeURL + "/images/blackNavArrowDown.gif' width='7' height='4' hspace='10' border='0' align='absmiddle'/></a>";
                                newElement += "<div class='hidden' id='details_" + response[i]['username'] + "'></div>"
                            }
                        }
                        newElement += "</div>";
                    }

                    $("#members").append(newElement);

                    showElement('membersPane');
                }
            });
        }

        function deleteMember(username) {

            selectedUsername = username;
            $(".dark").show();
            $("#deleteMember").removeClass('hidden');
        }

        function doDeleteMember() {
            $.ajax({
                type: 'post',
                url: deleteMemberDir,
                data: {
                    'username': selectedUsername,
                    'tripId': tripId
                },
                success: function (response) {
                    if(response == "ok")
                        document.location.href = tripPlaces;
                }
            });
        }

        function memberDetails(username) {

            if(!$("#details_" + username).hasClass('hidden')) {
                $("#details_" + username).addClass('hidden');
                return;
            }


            $.ajax({
                type: 'post',
                url: getMemberAccessLevel,
                data: {
                    'username': username,
                    'tripId': tripId
                },
                success: function (response) {

                    $("#details_" + username).empty();

                    response = JSON.parse(response);

                    newElement = "<div class='row'>";
                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.addPlace == 1)
                        newElement += "<input id='addPlaceLevel' onclick='changeAddPlace(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='addPlaceLevel' onclick='changeAddPlace(\"" + username + "\")' type='checkbox'>";

                    newElement += "<label for='addPlaceLevel' class='labelForCheckBox'><span></span>&nbsp;&nbsp;افزودن مکان</label>";
                    newElement += "</div></div>";

                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.addFriend == 1)
                        newElement += "<input id='addFriendLevel' onclick='changeAddFriend(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='addFriendLevel' onclick='changeAddFriend(\"" + username + "\")' type='checkbox'>";

                    newElement += "<label class='labelForCheckBox' for='addFriendLevel'><span></span>&nbsp;&nbsp;دعوت دوستان</label></div></div>";

                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.changePlaceDate == 1)
                        newElement += "<input id='changePlaceDateLevel' onclick='changePlaceDate(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='changePlaceDateLevel' onclick='changePlaceDate(\"" + username + "\")' type='checkbox'>";
                    newElement += "<label class='labelForCheckBox' for='changePlaceDateLevel'><span></span>&nbsp;&nbsp;تغییر زمان مکان های سفر</label></div></div>";

                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.changeTripDate == 1)
                        newElement += "<input id='changeDate' onclick='changeTripDate(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='changeDate' onclick='changeTripDate(\"" + username + "\")' type='checkbox'>";
                    newElement += "<label class='labelForCheckBox' for='changeDate'><span></span>&nbsp;&nbsp;تغییر زمان سفر</label></div></div>";

                    newElement += "</div>";
                    $("#details_" + username).append(newElement);
                    $("#details_" + username).removeClass('hidden');
                }
            });
        }

        function changeAddPlace(username) {

            $.ajax({
                type: 'post',
                url: changeAddPlaceDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function changeAddFriend(username) {

            $.ajax({
                type: 'post',
                url: changeAddFriendDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function changePlaceDate(username) {

            $.ajax({
                type: 'post',
                url: changePlaceDateDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function changeTripDate(username) {

            $.ajax({
                type: 'post',
                url: changeTripDateDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function deletePlace(tripPlaceId) {
            selectedTripPlace = tripPlaceId;
            $(".dark").show();
            $("#deleteTripPlace").removeClass('hidden');
        }

        function doDeleteTripPlace() {
            $.ajax({
                type: 'post',
                url: deletePlaceDir,
                data: {
                    'tripPlaceId': selectedTripPlace
                },
                success: function (response) {
                    if(response == "ok")
                        document.location.href = tripPlaces;
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
                        newElement += "<div class='filtersDivBookmark'></div>";
                    else
                        newElement += "<div onclick='show(\"" + i + "\", 1)' class='helpBubble filtersDivBookmarkElse'></div>";
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
