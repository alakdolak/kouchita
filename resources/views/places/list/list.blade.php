<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <script src="{{URL::asset('js/angular.js')}}"></script>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/hotelLists.css')}}"/>


    <title>
        {{$kindPlace->name}}

        @if($mode == "state")
            استان
        @else
            شهر
        @endif
        {{$city->name}}
    </title>

    <style>
        .elements{
            width: 200px;
            height: 200px;
            margin: 20px 5px;
            border: solid gray 3px;
        }
    </style>

    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>

</head>

<body id="BODY_BLOCK_JQUERY_REFLOW"
      class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset
      rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class=" hotels_lf_redesign ui_container is-mobile responsive_body">
        <div class="restaurants_list">
            <div ID="taplc_hotels_redesign_header_0" class="ppr_rup ppr_priv_hotels_redesign_header">
                <div id="hotels_lf_header" class="restaurants_list">
                    <div id="p13n_tag_header_wrap" class="tag_header p13n_no_see_through ontop hotels_lf_header_wrap">
                        <div id="p13n_tag_header" class="restaurants_list no_bottom_padding">
                            <div id="p13n_welcome_message" class="easyClear">
                                <h1 id="HEADING" class="p13n_geo_hotels ">
                                    {{$kindPlace->name}}

                                @if($mode == "state")
                                        استان
                                    @else
                                        شهر
                                    @endif
                                    {{$city->name}}
                                </h1>

                                @if($placeMode == "hotel")
                                    <div>
                                        <div class="srchBox">
                                            <button class="srchBtn" onclick="inputSearch(0)">جستجو</button>
                                        </div>
                                        <div class="roomBox">
                                            <div id="roomDetail" onclick="togglePassengerNoSelectPane()">
                                                <span id="room_number" class="room"></span>&nbsp;
                                                <span>اتاق</span>&nbsp;-&nbsp;
                                                <span id="adult_number" class="adult"></span>
                                                <span>بزرگسال</span>&nbsp;
                                                {{---&nbsp;--}}
                                                {{--<span class="children">--}}
                                                {{--{{$children}}--}}
                                                {{--</span>--}}
                                                {{--<span>بچه</span>&nbsp;--}}
                                            </div>
                                            <div id="roomCapacityBoxIcon" onclick="togglePassengerNoSelectPane()"
                                                 class="shTIcon passengerIcon"></div>
                                            <div id="passengerArrowDown" onclick="togglePassengerNoSelectPane()"
                                                 class="shTIcon searchBottomArrowIcone arrowPassengerIcone"></div>
                                            <div id="passengerArrowUp" onclick="togglePassengerNoSelectPane()"
                                                 class="shTIcon searchTopArrowIcone arrowPassengerIcone hidden"></div>


                                            <div class="roomPassengerPopUp hidden " id="passengerNoSelectPane"
                                                 onmouseleave="addClassHidden('passengerNoSelectPane'); passengerNoSelect = false;">
                                                <div class="rowOfPopUp">
                                                    <span class="float-right">اتاق</span>
                                                    <div class="float-left">
                                                        <div onclick="changeRoomPassengersNum(-1, 3)"
                                                             class="shTIcon minusPlusIcons minus"></div>
                                                        <span class='numBetweenMinusPlusBtn room' id="roomNumInSelect">
    {{--                                                        {{$room}}--}}
                                                        </span>
                                                        <div onclick="changeRoomPassengersNum(1, 3)"
                                                             class="shTIcon minusPlusIcons plus"></div>
                                                    </div>
                                                </div>
                                                <div class="rowOfPopUp">
                                                    <span class="float-right">بزرگسال</span>
                                                    <div class="float-left">
                                                        <div onclick="changeRoomPassengersNum(-1, 2)"
                                                             class="shTIcon minusPlusIcons minus"></div>
                                                        <span class='numBetweenMinusPlusBtn adult'
                                                              id="adultPassengerNumInSelect">
    {{--                                                        {{$adult}}--}}
                                                        </span>
                                                        <div onclick="changeRoomPassengersNum(1, 2)"
                                                             class="shTIcon minusPlusIcons plus"></div>
                                                    </div>
                                                </div>
                                                {{--<div class="rowOfPopUp">--}}
                                                {{--<span class="float-right">بچه</span>--}}
                                                {{--<div class="float-left">--}}
                                                {{--<div onclick="changeRoomPassengersNum(-1, 1)"--}}
                                                {{--class="shTIcon minusPlusIcons minus"></div>--}}
                                                {{--<span class='numBetweenMinusPlusBtn children'--}}
                                                {{--id="childrenPassengerNumInSelect">--}}
                                                {{--{{$children}}--}}
                                                {{--</span>--}}
                                                {{--<div onclick="changeRoomPassengersNum(1, 1)"--}}
                                                {{--class="shTIcon minusPlusIcons plus"></div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="childrenPopUpAlert">--}}
                                                {{--سن بچه را در زمان ورود به هتل وارد کنید--}}
                                                {{--</div>--}}
                                                {{--<div class="childBox"></div>--}}
                                            </div>
                                        </div>
                                        <div class="calenderBox">
                                            <label id="calendar-container-edit-1placeDate" class="dateLabel">
                                                <span onclick="changeTwoCalendar(2); nowCalendar()" class="ui_icon calendar calendarIcon"></span>
                                                <input onclick="assignDate('{{convertStringToDate(getToday()["date"])}}', 'calendar-container-edit-1placeDate_phone', 'backDate_phone')" name="date" id="goDate" type="text" class="inputDateLabel" placeholder="تاریخ رفت" required readonly>
                                            </label>
                                            <label id="calendar-container-edit-2placeDate" class="dateLabel">
                                                <span>تا</span>
                                                <input name="date" id="backDate" type="text" class="inputDateLabel" placeholder="تاریخ برگشت" required readonly>
                                            </label>
                                        </div>
                                    </div>
                                    @include('layouts.calendar')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Restaurants prodp13n_jfy_overflow_visible">

            <div class="wrap"></div>

            <div id="BODYCON" class="col easyClear poolX adjust_padding new_meta_chevron_v2" ng-app="mainApp">
                <div class="eateryOverviewContent">
                    <div class="ui_columns is-partitioned is-mobile">
                        <div id="PlaceController" class="ui_column is-9" ng-controller="PlaceController as cntr" style="direction: rtl;">
                            <div  infinite-scroll="myPagingFunction()" class="coverpage">
                                <div class="ppr_rup ppr_priv_restaurants_coverpage_content">
                                    <div>
                                        <div class="prw_rup prw_restaurants_restaurants_coverpage_content">
                                            <div class="coverpage_widget">
                                                <div class="section">
                                                    <div class="single_filter_pois">
                                                        <div id="FilterTopController" class="title ui_columns" style="border-bottom: 1px solid lightgray;">
                                                            <div class="ordering" style="font-weight: bold">مرتب سازی بر
                                                                اساس:
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" onclick="selectingOrder($(this),'price')" ng-click="sortFunc('price')" id="z1">
                                                                    بیشترین نظر
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" onclick="selectingOrder($(this), 'review')" ng-click="sortFunc('review')" id="z2">
                                                                    بهترین بازخورد
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" onclick="selectingOrder($(this), 'review')" ng-click="sortFunc('review')" id="z2">
                                                                    بیشترین بازدید
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders selectOrder" ng-click="sortFunc('offer')" id="z3" onclick="selectingOrder($(this), 'offer')" >
                                                                    حروف الفبا
                                                                </div>
                                                            </div>
                                                            <div class="ordering" onclick="showLowDistancePopUp()" >
                                                                <div class="orders" style="width: 140% !important;"
                                                                     onclick="selectingOrder($(this),'leastDist')">کمترین فاصله تا
                                                                    <span id="selectDistance">__ __ __</span></div>
                                                                <div class="shTIcon bottomArrowIcon"></div>
                                                                <div id="lowDistance" class="lowDistance hidden"
                                                                     onmouseleave="$('#lowDistance').addClass('hidden');">
                                                                    <input id="inputDistancePlace" class="inputDistance"
                                                                           type="text"
                                                                           placeholder="مکان مورد نظر را وارد کنید"
                                                                           oninput="searchPlace(this.value)" >
                                                                    <div class="textDistance"> توجه کنید این مکان می
                                                                        بایست در محدوده مقصد باشد.
                                                                    </div>
                                                                    <div id="distance"></div>
                                                                    <div id="errorDistance" class="errDistance">
                                                                        متاسفانه مکان مورد نظر در دسترس نمی باشد.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            var check_num = 0;
                                                        </script>
                                                        <div  class="option">
                                                            <div class="row" ng-repeat="packet in packets" style="display: flex; flex-wrap: wrap">
                                                                <div class="elements" ng-repeat="place in packet.places">
                                                                    <a href="[[place.redirect]]">
                                                                        <div>
                                                                            <img src="[[place.pic]]" alt="[[place.keyword]]" style="width: 100%;">
                                                                        </div>
                                                                        <div>
                                                                            [[place.name]]
                                                                        </div>
                                                                        <div>
                                                                            <span class="[[place.ngClass]]"></span>
                                                                            [[place.avgRate]]
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div>
                                                            <div class="loader hidden"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coverpage_tracking"></div>
                                </div>
                            </div>
                            <div id="bottomMainList" style="width: 100%; height: 5px;"></div>
                        </div>

                        <div class="lhr ui_column is-3 hideCount reduced_height" id="FilterController" ng-controller="FilterController" style="direction: rtl;">
                            <div class="ppr_rup ppr_priv_restaurant_filters">
                                <div class="verticalFilters placements">
                                    <div id="EATERY_FILTERS_CONT" class="eatery_filters">
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle" style="padding: 0 0 11px !important;">
                                                    جستجو خود را محدود تر کنید
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div id="filterBox" style="display: none; flex-direction: column;">
                                                    <div style="font-size: 15px; margin: 10px 0px;">
                                                        <span>
                                                            فیلترهای اعمال شده
                                                        </span>
                                                    </div>
                                                    <div style="cursor: pointer; font-size: 12px; color: #050c93;" onclick="closeFilters()">
                                                        پاک کردن فیلتر ها
                                                    </div>
                                                    <div id="filterShow" style="display: flex; flex-direction: row; flex-wrap: wrap;">
                                                        <div id="closeMoneyFilter" class="closeXicon" style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;" onclick="cancelMoneyFilter()"> قیمت</div>
                                                        <div id="closeRateFilter" class="closeXicon" style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;" onclick="cancelRateFilter()"> امتیاز کاربران </div>
                                                        <div id="closeKindFilter" class="closeXicon" style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;" onclick="cancelKindFilter()"> نوع</div>
                                                        <div id="closeRangeFilter" class="closeXicon" style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;" onclick="cancelRangeFilter()"> محدوده</div>
                                                        <div id="closeFoodFilter" class="closeXicon" style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;" onclick="cancelFoodFilter()"> غذا</div>
                                                        <div id="closeFacilitiesFilter" class="closeXicon" style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;" onclick="cancelFacilitiesFilter()"> امکانات</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterContent ui_label_group inline"
                                                     style="padding-top: 23px">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="a1" value="rate"/>
                                                        <label for="a1"><span></span>&nbsp;&nbsp; نمایش گزینه های رزرو
                                                            آنی </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="a23" value="review"/>
                                                        <label for="a23"><span></span>&nbsp;&nbsp; نمایش موارد دارای
                                                            تخفیف </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="a3" value="alphabet"/>
                                                        <label for="a3"><span></span>&nbsp;&nbsp; نمایش پیشنهادات ویژه
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">جستجو‌ی نام</div>
                                                {{--                                                <div class="hl_inputBox">--}}
                                                <input class="hl_inputBox" placeholder="جستجو کنید">
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">امتیاز کاربران</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input onclick="RateFilter(5)" type="radio" name="AVGrate" id="c1" value="5"/>
                                                        <label for="c1"
                                                               style="display:inline-block;"><span></span></label>
                                                        <div class="rating-widget"
                                                             style="font-size: 1.2em; display: inline-block">
                                                            <div class="prw_rup prw_common_location_rating_simple">
                                                                <span class="ui_bubble_rating bubble_50"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input  onclick="RateFilter(4)" type="radio" name="AVGrate" id="c2" value="4"/>
                                                        <label for="c2"
                                                               style="display:inline-block;"><span></span></label>
                                                        <div class="rating-widget"
                                                             style="font-size: 1.2em; display: inline-block">
                                                            <div class="prw_rup prw_common_location_rating_simple">
                                                                <span class="ui_bubble_rating bubble_40"></span>
                                                            </div>
                                                        </div>
                                                        <span> به بالا</span>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input onclick="RateFilter(3)" type="radio" name="AVGrate" id="c3" value="3"/>
                                                        <label for="c3"
                                                               style="display:inline-block;"><span></span></label>
                                                        <div class="rating-widget"
                                                             style="font-size: 1.2em; display: inline-block">
                                                            <div class="prw_rup prw_common_location_rating_simple">
                                                                <span class="ui_bubble_rating bubble_30"></span>
                                                            </div>
                                                        </div>
                                                        <span> به بالا</span>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input onclick="RateFilter(2)" type="radio" name="AVGrate" id="c4" value="2"/>
                                                        <label for="c4"
                                                               style="display:inline-block;"><span></span></label>
                                                        <div class="rating-widget"
                                                             style="font-size: 1.2em; display: inline-block">
                                                            <div class="prw_rup prw_common_location_rating_simple">
                                                                <span class="ui_bubble_rating bubble_20"></span>
                                                            </div>
                                                        </div>
                                                        <span> به بالا</span>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input onclick="RateFilter(1)" type="radio" name="AVGrate" id="c5" value="1"/>
                                                        <label for="c5"
                                                               style="display:inline-block;"><span></span></label>
                                                        <div class="rating-widget"
                                                             style="font-size: 1.2em; display: inline-block">
                                                            <div class="prw_rup prw_common_location_rating_simple">
                                                                <span class="ui_bubble_rating bubble_10"></span>
                                                            </div>
                                                        </div>
                                                        <span> به بالا</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($kindPlace->id == 4)
                                            @include('places.list.filters.hotelFilters')
                                        @endif

                                        @foreach($features as $feature)
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle">{{$feature->name}}</div>
                                                    <div class="filterContent ui_label_group inline">

                                                        @for($i = 0; $i < 5 && $i < count($feature->subFeat); $i++)
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                       ng-click="doFilter(1)" type="checkbox" id="x1"/>
                                                                <label for="x1"><span></span>&nbsp;&nbsp;{{$feature->subFeat[$i]->name}}  </label>
                                                            </div>
                                                        @endfor

                                                        @if(count($feature->subFeat) > 5)
                                                            <span onclick="showMoreItems({{$feature->id}})" class="moreItems{{$feature->id}}" style="cursor: pointer">نمایش همه ی موارد</span>

                                                            @for($i = 5; $i < count($feature->subFeat); $i++)
                                                                <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem{{$feature->id}}">
                                                                    <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                           ng-click="doFilter(5)" type="checkbox" id="x5"/>
                                                                    <label for="x5"><span></span>&nbsp;&nbsp; {{$feature->subFeat[$i]->name}} </label>
                                                                </div>
                                                            @endfor
                                                        @endif

                                                    </div>

                                                    <span onclick="showLessItems({{$feature->id}})" class="lessItems hidden extraItem{{$feature->id}}">پنهان سازی همه ی موارد</span>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="ad iab_medRec">
                                <div id="gpt-ad-300x250-300x600-bottom" class="adInner gptAd delayAd"></div>
                            </div>
                            <div class="ad iab_supSky">
                                <div id="gpt-ad-160x600" class="adInner gptAd delayAd"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearFix"></div>

        </div>
    </div>
    <form id="form_hotel" method="post" action="{{route('makeSessionHotel')}}">
        {{csrf_field()}}
        <input type="hidden" name="adult" id="form_adult">
        <input type="hidden" name="room" id="form_room">
        <input type="hidden" name="children" id="form_children">
        <input type="hidden" name="goDate" id="form_goDate">
        <input type="hidden" name="backDate" id="form_backDate">
        <input type="hidden" name="ageOfChild" id="form_ageOfChild">
        <input type="hidden" name="city" value="{{$city->name}}">
        <input type="hidden" name="mode" value="{{$mode}}">
    </form>

    @include('layouts.placeFooter')
</div>

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

<script>

    var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    var filters = [-1];
    var page = 1;
    var placeMode = '{{$placeMode}}';
    var floor = 1;
    var sort = "rate";
    var colors = [];
    var data;
    var init = true;
    var lock = false;
    var take = 4;

    function selectingOrder(elem, type) {
        $(".orders").removeClass('selectOrder');
        elem.addClass('selectOrder');

        if(type == 'leastDist')
            sort = 'dist'
        else if(type == 'offer')
            sort = 'offer';
        else if(type == 'price')
            sort = 'price';
        else if(type == 'review')
            sort = 'review';
    }

    app.controller('FilterController', function ($scope, $rootScope) {

        $scope.showPic = false;
        $scope.placeMode = '{{$placeMode}}';

        if ($scope.placeMode == "amaken")
            $scope.showPic = true;

        $scope.sort = sort;

        $scope.$watch('sort', function (value) {

            if (value == null || sort == value || lock) {
                $scope.sort = sort;
                return;
            }

            sort = value;
            page = 1;
            floor = 1;
            init = true;
            $rootScope.$broadcast('myPagingFunctionAPI');
        });

        $scope.isDisable = function () {
            return lock;
        };

        $scope.doFilter = function (value) {

            var i;
            var duplicate = false;

            for (i = 0; i < filters.length; i++) {
                if (filters[i] == value) {
                    filters.splice(i);
                    duplicate = true;
                    break;
                }
            }

            if (!duplicate)
                filters[i] = value;

            page = 1;
            floor = 1;
            init = true;

            $rootScope.$broadcast('myPagingFunctionAPI');
        };

        $scope.doFilterColor = function (value) {

            var i;

            for (i = 0; i < colors.length; i++) {
                if (colors[i] == value) {
                    colors.splice(i);
                    break;
                }
            }

            if (i == colors.length)
                colors[i] = value;

            page = 1;
            floor = 1;
            init = true;

            $rootScope.$broadcast('myPagingFunctionAPI');
        };

    });

    app.controller('PlaceController', function ($scope, $http) {

        $scope.show = false;
        $scope.packets = [[]];
        $scope.oldScrollVal = 600;

        $scope.myPagingFunction = function () {

            if (page == 1) {
                $scope.packets = [[]];
            }

            var scroll = $(window).scrollTop();

            if (scroll - $scope.oldScrollVal < 100 && !init)
                return;

            if (init)
                init = false;
            else
                $scope.oldScrollVal += scroll;

            $(".loader").removeClass('hidden');

            data = $.param({
                pageNum: page,
                take: take,
                kind_id: filters,
                sort: sort,
                color: colors,
                city: '{{$city->id}}',
                mode: '{{$mode}}',
                kindPlaceId: '{{$kindPlace->id}}'
            });

            var requestURL = (placeMode == "hotel") ? '{{route('getPlaceListElems')}}' :
                (placeMode == "amaken") ? '{{route('getAmakenListElems', ['city' => $city, 'mode' => $mode])}}' :
                    '{{route('getRestaurantListElems', ['city' => $city, 'mode' => $mode])}}'
            ;

            const config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            };

            $http.post(requestURL, data, config).then(function (response) {

                if (response.data != null && response.data.places != null && response.data.places.length > 0)
                    $scope.show = true;

                $scope.packets[page - 1] = response.data;
                $scope.packets[page - 1].places = response.data.places;

                for (j = 0; j < $scope.packets[page - 1].places.length; j++) {
                    $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_' + $scope.packets[page - 1].places[j].avgRate + '0';

                    if (placeMode == "hotel")
                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/hotel-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    else if (placeMode == "amaken")
                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    else if (placeMode == "restaurant")
                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/restaurant-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                }

                if (response.data.places.length != 4) {
                    $scope.$broadcast('finalizeReceive');
                    return;
                }

                {{--data = $.param({--}}
                    {{--pageNum: ++page,--}}
                    {{--kind_id: filters,--}}
                    {{--sort: sort,--}}
                    {{--color: colors--}}
                {{--});--}}

                {{--$http.post(requestURL, data, config).then(function (response) {--}}

                    {{--if (response.data != null && response.data.places != null && response.data.places.length > 0)--}}
                        {{--$scope.show = true;--}}

                    {{--$scope.packets[page - 1] = response.data;--}}
                    {{--$scope.packets[page - 1].places = response.data.places;--}}

                    {{--for (j = 0; j < $scope.packets[page - 1].places.length; j++) {--}}
                        {{--switch ($scope.packets[page - 1].places[j].avgRate) {--}}
                            {{--case 5:--}}
                                {{--$scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_50';--}}
                                {{--break;--}}
                            {{--case 4:--}}
                                {{--$scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_40';--}}
                                {{--break;--}}
                            {{--case 3:--}}
                                {{--$scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_30';--}}
                                {{--break;--}}
                            {{--case 2:--}}
                                {{--$scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_20';--}}
                                {{--break;--}}
                            {{--default:--}}
                                {{--$scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_10';--}}
                        {{--}--}}

                        {{--if (placeMode == "hotel") {--}}
                            {{--$scope.packets[page - 1].places[j].redirect = '{{route('home') . '/hotel-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;--}}
                        {{--}--}}
                        {{--else if (placeMode == "amaken") {--}}
                            {{--$scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;--}}
                        {{--}--}}
                        {{--else if (placeMode == "restaurant") {--}}
                            {{--$scope.packets[page - 1].places[j].redirect = '{{route('home') . '/restaurant-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;--}}
                        {{--}--}}
                    {{--}--}}
                    {{--if (response.data.places.length != 4) {--}}
                        {{--$scope.$broadcast('finalizeReceive');--}}
                        {{--return;--}}
                    {{--}--}}

                    {{--data = $.param({--}}
                        {{--pageNum: ++page,--}}
                        {{--kind_id: filters,--}}
                        {{--sort: sort,--}}
                        {{--color: colors--}}
                    {{--});--}}

                    {{--$http.post(requestURL, data, config).then(function (response) {--}}

                        {{--if (response.data != null && response.data.places != null && response.data.places.length > 0)--}}
                            {{--$scope.show = true;--}}

                        {{--$scope.packets[page - 1] = response.data;--}}
                        {{--$scope.packets[page - 1].places = response.data.places;--}}
                        {{--for (j = 0; j < $scope.packets[page - 1].places.length; j++) {--}}
                            {{--$scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_' + $scope.packets[page - 1].places[j].avgRate + '0';--}}

                            {{--if (placeMode == "hotel") {--}}
                                {{--$scope.packets[page - 1].places[j].redirect = '{{route('home') . '/hotel-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;--}}
                            {{--}--}}
                            {{--else if (placeMode == "amaken") {--}}
                                {{--$scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;--}}
                            {{--}--}}
                            {{--else if (placeMode == "restaurant") {--}}
                                {{--$scope.packets[page - 1].places[j].redirect = '{{route('home') . '/restaurant-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;--}}
                            {{--}--}}
                        {{--}--}}

                        {{--$scope.$broadcast('finalizeReceive');--}}

                    {{--}).catch(function (err) {--}}
                        {{--console.log(err);--}}
                    {{--});--}}

                {{--}).catch(function (err) {--}}
                    {{--console.log(err);--}}
                {{--});--}}
            }).catch(function (err) {
                console.log(err);
            });
        };

        $scope.$on('finalizeReceive', function (event) {

            page++;
            $(".loader").addClass('hidden');
            floor = page;

        });

        $scope.$on('myPagingFunctionAPI', function (event) {
            $scope.myPagingFunction();
        });
    });
</script>

<script>
    function showLowDistancePopUp() {
        $('#lowDistance').removeClass('hidden');
    }
</script>

<script async>
    var mod;
    mod = angular.module("infinite-scroll", []), mod.directive("infiniteScroll", ["$rootScope", "$window", "$timeout", function (i, n, e) {
        return {
            link: function (t, l, o) {
                var r, c, f, a;
                return n = angular.element(n), f = 0, null != o.infiniteScrollDistance && t.$watch(o.infiniteScrollDistance, function (i) {
                    return f = parseInt(i, 10)
                }), a = !0, r = !1, null != o.infiniteScrollDisabled && t.$watch(o.infiniteScrollDisabled, function (i) {
                    return a = !i, a && r ? (r = !1, c()) : void 0
                }), c = function () {
                    var e, c, u, d;
                    return d = n.height() + n.scrollTop(), e = l.offset().top + l.height(), c = e - d, u = n.height() * f >= c, u && a ? i.$$phase ? t.$eval(o.infiniteScroll) : t.$apply(o.infiniteScroll) : u ? r = !0 : void 0
                }, n.on("scroll", c), t.$on("$destroy", function () {
                    return n.off("scroll", c)
                }), e(function () {
                    return o.infiniteScrollImmediateCheck ? t.$eval(o.infiniteScrollImmediateCheck) ? c() : void 0 : c()
                }, 0)
            }
        }
    }])
</script>

<script>

    $('.login-button').click(function () {

        var url;
        @if($placeMode == "hotel")
            url = '{{route('hotelList', ['city' => $city, 'mode' => $mode])}}';
        @elseif($placeMode == "amaken")
            url = '{{route('amakenList', ['city' => $city, 'mode' => $mode])}}';
        @else
            url = '{{route('restaurantList', ['city' => $city, 'mode' => $mode])}}';
        @endif

        $(".dark").show();
        showLoginPrompt(url);
    });

    $(document).ready(function () {

        {{--@foreach($sections as $section)--}}
            {{--fillMyDivWithAdv('{{$section->sectionId}}', '{{$state->id}}');--}}
        {{--@endforeach--}}

        $("#global-nav-hotels").attr('href', '{{route('hotelList', ['city' => $city, 'mode' => $mode])}}');
        $("#global-nav-restaurants").attr('href', '{{route('restaurantList', ['city' => $city, 'mode' => $mode])}}');
        $("#global-nav-amaken").attr('href', '{{route('amakenList', ['city' => $city, 'mode' => $mode])}}');
    });

    function hideElement(val) {
        $("#" + val).addClass('hidden');
        $(".dark").hide();
    }

    function showElement(val) {
        $(".dark").show();
        $("#" + val).removeClass('hidden');
    }

    function showMoreItems(_id) {
        $(".extraItem" + _id).removeClass('hidden').addClass('selected');
        $(".moreItems" + _id).addClass('hidden');
    }
    function showLessItems(_id) {
        $(".extraItem" + _id).addClass('hidden').removeClass('selected');
        $(".moreItems" + _id).removeClass('hidden');
    }

</script>

<script>
    var room = parseInt('0');
    var adult = parseInt('0');
    var children = parseInt('0');
    var passengerNoSelect = false;

    $(".room").html(room);
    $(".adult").html(adult);
    $(".children").html(children);

    for (var i = 0; i < children; i++) {
        $(".childBox").append("" +
            "<div class='childAge' data-id='" + i + "'>" +
            "<div>سن بچه</div>" +
            "<div><select class='selectAgeChild' name='ageOfChild' id=''>" +
            "<option value='0'>1<</option>" +
            "<option value='1'>1</option>" +
            "<option value='2'>2</option>" +
            "<option value='3'>3</option>" +
            "<option value='4'>4</option>" +
            "<option value='5'>5</option>" +
            "</select></div>" +
            "</div>");
    }


    function togglePassengerNoSelectPane() {
        if (!passengerNoSelect) {
            passengerNoSelect = true;
            $("#passengerNoSelectPane").removeClass('hidden');
            $("#passengerArrowUp").removeClass('hidden');
            $("#passengerArrowDown").addClass('hidden');
        }
        else {
            $("#passengerNoSelectPane").addClass('hidden');
            $("#passengerArrowDown").removeClass('hidden');
            $("#passengerArrowUp").addClass('hidden');
            passengerNoSelect = false;
        }
    }

    function addClassHidden(element) {
        $("#" + element).addClass('hidden');
        if (element == 'passengerNoSelectPane'){
            $("#passengerArrowDown").removeClass('hidden');
            $("#passengerArrowUp").addClass('hidden');
        }
    }

    function changeRoomPassengersNum(inc, mode) {
        switch (mode) {
            case 3:
            default:
                if (room + inc >= 0)
                    room += inc;
                $("#roomNumInSelect").empty().append(room);
                break;
            case 2:
                if (adult + inc >= 0)
                    adult += inc;
                $("#adultPassengerNumInSelect").empty().append(adult);
                break;
            case 1:
                if (children + inc >= 0)
                    children += inc;
                if (inc >= 0) {
                    $(".childBox").append("<div class='childAge' data-id='" + (children - 1) + "'>" +
                        "<div>سن بچه</div>" +
                        "<div><select class='selectAgeChild' name='ageOfChild' id=''>" +
                        "<option value='0'>1<</option>" +
                        "<option value='1'>1</option>" +
                        "<option value='2'>2</option>" +
                        "<option value='3'>3</option>" +
                        "<option value='4'>4</option>" +
                        "<option value='5'>5</option>" +
                        "</select></div>" +
                        "</div>");
                } else {
                    $(".childAge[data-id='" + (children) + "']").remove();
                }
                $("#childrenPassengerNumInSelect").empty().append(children);


                break;
        }
        while((4*room) < adult){
            room++;
            $("#roomNumInSelect").empty().append(room);
        }
        document.getElementById('adult_number').innerText = adult;
        document.getElementById('room_number').innerText = room;
        // document.getElementById('roomDetail').innerHTML = '<span style="float: right;">' + room + '</span>&nbsp;\n' +
        //     '                                                <span>اتاق</span>&nbsp;-&nbsp;\n' +
        //     '                                                <span id="childPassengerNo">' + adult + '</span>\n' +
        //     '                                                <span>بزرگسال</span>&nbsp;-&nbsp;\n';
        // '                                                <span id="infantPassengerNo">' + children + '</span>\n' +
        // '                                                <span>بچه</span>&nbsp;';
    }

    function inputSearch() {
        var ageOfChild = [];
        var goDate;
        var backDate;
        var childSelect = document.getElementsByName('ageOfChild');

        for(var i = 0; i < children; i++)
            ageOfChild[i] = childSelect[i].value;

        goDate = document.getElementById('goDate').value;
        backDate = document.getElementById('backDate').value;

        document.getElementById('form_room').value = room;
        document.getElementById('form_adult').value = adult;
        document.getElementById('form_children').value = children;
        document.getElementById('form_goDate').value = goDate;
        document.getElementById('form_backDate').value = backDate;
        document.getElementById('form_ageOfChild').value = ageOfChild;

        document.getElementById('form_hotel').submit();
    }

</script>

{{--<script src="{{URL::asset('js/adv.js')}}"></script>--}}
<div class="ui_backdrop dark" id="darkModeMainPage" ></div>

</body>
</html>