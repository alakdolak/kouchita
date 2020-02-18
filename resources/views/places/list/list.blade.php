<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <script src="{{URL::asset('js/angular.js')}}"></script>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/hotelLists.css')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/hotelDetail.css?v=2')}}' />

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
        .rebrand_2017 .masthead {
            margin-bottom: 0px !important;
        }
        .red-heart-fill::before {
            content: '\e012' !important;
            color: #ff0000 !important;
            float: right;
            font-family: Shazde_Regular2 !important;
            font-size: 22px;
            margin-top: 3px;
        }
        .elements{
            width: 200px;
            height: 200px;
            margin: 20px 5px;
            border: solid gray 3px;
        }
        .filtersExist {
            padding: 2%;
            margin: 2%;
            background-color: #4dc7bc;
            color: white;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .filterCloseIcon {
            font-size: 1.5em;
            margin-right: 5px;
            cursor: pointer;
        }
        .hl_compareBtn {
            background-color: #fcc156;
            padding: 10px;
            border-radius: 5px;
            margin: 5px 0 10px;
            text-align: center;
            font-size: 1.2em;
            cursor: pointer;
        }
        .hl_compareBtn:hover {
            opacity: 0.75;
        }
    </style>

    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>

</head>

<body id="BODY_BLOCK_JQUERY_REFLOW"
      class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset
      rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

@include('general.globalInput')

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class=" hotels_lf_redesign ui_container is-mobile responsive_body">
        <div style="height: 100px;">
            <div id="searchBoxTopPageMainDiv">
                <span>شما در</span>
                <div class="inputBox position-ralative">
                    <div class="select-side">
                        <i class="glyphicon glyphicon-triangle-bottom"></i>
                    </div>
                    <select class="inputBoxInput styled-select text-align-right mg-lt-10" type="text" placeholder="">
                        <option>استان اصفهان</option>
                    </select>
                </div>
                <span>در</span>
                <div class="inputBox position-ralative">
                    <div class="select-side">
                        <i class="glyphicon glyphicon-triangle-bottom"></i>
                    </div>
                    <select class="inputBoxInput styled-select text-align-right mg-lt-10" type="text" placeholder="">
                        <option>شهر اصفهان</option>
                    </select>
                </div>
                <span class="mg-lt-15">هستید. تغییر دهید</span>
                <div id="searchIcon"></div>
            </div>
            <div style="margin-top: 65px; position: relative;">
                <div style="text-align: center;font-size: 2.5em;font-weight: 600;">
                    {{$kindPlace->title}}
                    @if($mode == 'state')
                        استان
                    @else
                        شهر
                    @endif
                    {{$city->name}}
                </div>
                <div style="position: relative; top: -25px">
                    <div>
                        <div id="helpBtnMainDiv" style="top: 0">
                            <a class="link">
                                <div class="circleBase type2 helpBtnIconMainDiv"></div>
                                <b>راهنمای صفحات</b>
                            </a>
                        </div>
                        <div class="ui_button sharePageMainDiv" onclick="toggleShareIcon(this)" style="margin-top: 40px">
                            <div class="sharePageIcon first"></div>
                            <div class="sharePageLabel">
                                اشتراک&zwnj;گذاری صفحه
                            </div>
                        </div>
                    </div>
                    <div style="position: absolute; bottom: 0; right: 0;">
                        <span>نمایش
                            {{$kindPlace->title}}
                                استان
                            {{$state->name}}
                        </span>
                        @if($mode == 'city')
                            <span>></span>
                            <span>نمایش
                                {{$kindPlace->title}}
                                شهر
                                {{$city->name}}
                            </span>
                        @endif
                        {{--<span>></span>--}}
                        {{--<span>نمایش مراکز اقامتی شهریار</span>--}}
                    </div>
                </div>

            </div>
        </div>
{{--        <div class="restaurants_list">--}}
{{--            <div ID="taplc_hotels_redesign_header_0" class="ppr_rup ppr_priv_hotels_redesign_header">--}}
{{--                <div id="hotels_lf_header" class="restaurants_list">--}}
{{--                    <div id="p13n_tag_header_wrap" class="tag_header p13n_no_see_through ontop hotels_lf_header_wrap">--}}
{{--                        <div id="p13n_tag_header" class="restaurants_list no_bottom_padding">--}}
{{--                            <div id="p13n_welcome_message" class="easyClear">--}}
{{--                                <h1 id="HEADING" class="p13n_geo_hotels ">--}}
{{--                                    {{$kindPlace->name}}--}}

{{--                                @if($mode == "state")--}}
{{--                                        استان--}}
{{--                                    @else--}}
{{--                                        شهر--}}
{{--                                    @endif--}}
{{--                                    {{$city->name}}--}}
{{--                                </h1>--}}

{{--                                @if($placeMode == "hotel")--}}
{{--                                    <div>--}}
{{--                                        <div class="srchBox">--}}
{{--                                            <button class="srchBtn" onclick="inputSearch(0)">جستجو</button>--}}
{{--                                        </div>--}}
{{--                                        <div class="roomBox">--}}
{{--                                            <div id="roomDetail" onclick="togglePassengerNoSelectPane()">--}}
{{--                                                <span id="room_number" class="room"></span>&nbsp;--}}
{{--                                                <span>اتاق</span>&nbsp;-&nbsp;--}}
{{--                                                <span id="adult_number" class="adult"></span>--}}
{{--                                                <span>بزرگسال</span>&nbsp;--}}
{{--                                                --}}{{----}}{{---&nbsp;--}}
{{--                                                --}}{{----}}{{--<span class="children">--}}
{{--                                                --}}{{----}}{{--{{$children}}--}}
{{--                                                --}}{{----}}{{--</span>--}}
{{--                                                --}}{{----}}{{--<span>بچه</span>&nbsp;--}}
{{--                                            </div>--}}
{{--                                            <div id="roomCapacityBoxIcon" onclick="togglePassengerNoSelectPane()"--}}
{{--                                                 class="shTIcon passengerIcon"></div>--}}
{{--                                            <div id="passengerArrowDown" onclick="togglePassengerNoSelectPane()"--}}
{{--                                                 class="shTIcon searchBottomArrowIcone arrowPassengerIcone"></div>--}}
{{--                                            <div id="passengerArrowUp" onclick="togglePassengerNoSelectPane()"--}}
{{--                                                 class="shTIcon searchTopArrowIcone arrowPassengerIcone hidden"></div>--}}


{{--                                            <div class="roomPassengerPopUp hidden " id="passengerNoSelectPane"--}}
{{--                                                 onmouseleave="addClassHidden('passengerNoSelectPane'); passengerNoSelect = false;">--}}
{{--                                                <div class="rowOfPopUp">--}}
{{--                                                    <span class="float-right">اتاق</span>--}}
{{--                                                    <div class="float-left">--}}
{{--                                                        <div onclick="changeRoomPassengersNum(-1, 3)"--}}
{{--                                                             class="shTIcon minusPlusIcons minus"></div>--}}
{{--                                                        <span class='numBetweenMinusPlusBtn room' id="roomNumInSelect">--}}
{{--    --}}{{----}}{{--                                                        {{$room}}--}}
{{--                                                        </span>--}}
{{--                                                        <div onclick="changeRoomPassengersNum(1, 3)"--}}
{{--                                                             class="shTIcon minusPlusIcons plus"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="rowOfPopUp">--}}
{{--                                                    <span class="float-right">بزرگسال</span>--}}
{{--                                                    <div class="float-left">--}}
{{--                                                        <div onclick="changeRoomPassengersNum(-1, 2)"--}}
{{--                                                             class="shTIcon minusPlusIcons minus"></div>--}}
{{--                                                        <span class='numBetweenMinusPlusBtn adult'--}}
{{--                                                              id="adultPassengerNumInSelect">--}}
{{--    --}}{{----}}{{--                                                        {{$adult}}--}}
{{--                                                        </span>--}}
{{--                                                        <div onclick="changeRoomPassengersNum(1, 2)"--}}
{{--                                                             class="shTIcon minusPlusIcons plus"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                --}}{{----}}{{--<div class="rowOfPopUp">--}}
{{--                                                --}}{{----}}{{--<span class="float-right">بچه</span>--}}
{{--                                                --}}{{----}}{{--<div class="float-left">--}}
{{--                                                --}}{{----}}{{--<div onclick="changeRoomPassengersNum(-1, 1)"--}}
{{--                                                --}}{{----}}{{--class="shTIcon minusPlusIcons minus"></div>--}}
{{--                                                --}}{{----}}{{--<span class='numBetweenMinusPlusBtn children'--}}
{{--                                                --}}{{----}}{{--id="childrenPassengerNumInSelect">--}}
{{--                                                --}}{{----}}{{--{{$children}}--}}
{{--                                                --}}{{----}}{{--</span>--}}
{{--                                                --}}{{----}}{{--<div onclick="changeRoomPassengersNum(1, 1)"--}}
{{--                                                --}}{{----}}{{--class="shTIcon minusPlusIcons plus"></div>--}}
{{--                                                --}}{{----}}{{--</div>--}}
{{--                                                --}}{{----}}{{--</div>--}}
{{--                                                --}}{{----}}{{--<div class="childrenPopUpAlert">--}}
{{--                                                --}}{{----}}{{--سن بچه را در زمان ورود به هتل وارد کنید--}}
{{--                                                --}}{{----}}{{--</div>--}}
{{--                                                --}}{{----}}{{--<div class="childBox"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="calenderBox">--}}
{{--                                            <label id="calendar-container-edit-1placeDate" class="dateLabel">--}}
{{--                                                <span onclick="changeTwoCalendar(2); nowCalendar()" class="ui_icon calendar calendarIcon"></span>--}}
{{--                                                <input onclick="assignDate('{{convertStringToDate(getToday()["date"])}}', 'calendar-container-edit-1placeDate_phone', 'backDate_phone')" name="date" id="goDate" type="text" class="inputDateLabel" placeholder="تاریخ رفت" required readonly>--}}
{{--                                            </label>--}}
{{--                                            <label id="calendar-container-edit-2placeDate" class="dateLabel">--}}
{{--                                                <span>تا</span>--}}
{{--                                                <input name="date" id="backDate" type="text" class="inputDateLabel" placeholder="تاریخ برگشت" required readonly>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @include('layouts.calendar')--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="Restaurants prodp13n_jfy_overflow_visible">

            <div class="wrap"></div>

            <div id="BODYCON" class="col easyClear poolX adjust_padding new_meta_chevron_v2" ng-app="mainApp">
                <div class="eateryOverviewContent">
                    <div class="ui_columns is-partitioned">
                        <div id="PlaceController" class="ui_column col-md-9" ng-controller="PlaceController as cntr" style="direction: rtl; padding: 9px 24px;">
                            <div  infinite-scroll="myPagingFunction()" class="coverpage hideOnPhone">
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
                                                                <div class="orders" onclick="selectingOrder($(this),'review')" ng-click="sortFunc('review')" id="z1">
                                                                    بیشترین نظر
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders selectOrder" onclick="selectingOrder($(this), 'rate')" ng-click="sortFunc('rate')" id="z2">
                                                                    بهترین بازخورد
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" onclick="selectingOrder($(this), 'seen')" ng-click="sortFunc('seen')" id="z3">
                                                                    بیشترین بازدید
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" ng-click="sortFunc('alphabet')" onclick="selectingOrder($(this), 'alphabet')" id="z4" >
                                                                    حروف الفبا
                                                                </div>
                                                            </div>
                                                            @if($kindPlace->id != 10 && $kindPlace->id != 11)
                                                                <div class="ordering"  >
                                                                <div id="distanceNav" class="orders" style="width: 140% !important;" onclick="openGlobalSearch()">کمترین فاصله تا
                                                                    <span id="selectDistance">__ __ __</span>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <script>
                                                            var check_num = 0;
                                                        </script>
                                                        <div  class="option">
                                                            <div class="row" ng-repeat="packet in packets" style="display: flex; flex-wrap: wrap">
                                                                <div ng-repeat="place in packet.places" class="ui_column is-3 is-mobile">

                                                                    <div class="poi listBoxesMainDivs">
                                                                        <a href="[[place.redirect]]" class="thumbnail">
                                                                            <div class="prw_rup prw_common_centered_thumbnail">
                                                                                <div class="sizing_wrapper">
                                                                                    <div class="centering_wrapper">
                                                                                        <img ng-src='[[place.pic]]'
                                                                                             width="100%" height="100%"
                                                                                             class='photo_image'
                                                                                             alt='[[place.name]]'>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>

                                                                        @if(auth()->check())
                                                                            <div class="prw_rup prw_meta_saves_badge">
                                                                                <div class="savesButton">
                                                                                    {{--red-heart-fill--}}
                                                                                    <span class="saves-widget-button saves secondary save-location-5247712 ui_icon heart saves-icon-locator [[place.inTrip]]" onclick="saveToTripList(this)" value="[[place.id]]"></span>
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        <div class="detail">

                                                                        <div class="item name "
                                                                             title="[[place.name]]">
                                                                            <a class="poiTitle" target="_blank"
                                                                               href="[[place.redirect]]">
                                                                                [[place.name]]
                                                                            </a>
                                                                        </div>

                                                                        <div class="item rating-count">
                                                                            <div class="rating-widget">
                                                                                <div class="prw_rup prw_common_location_rating_simple">
                                                                                    <span class="[[place.ngClass]]"></span>
                                                                                </div>
                                                                            </div>
                                                                            <a target="_blank" class="review_count" href="">
                                                                                [[place.avgRate]]
                                                                                <span>نقد</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="item">استان:
                                                                            <span>[[place.state]]</span>
                                                                        </div>
                                                                        <div class="item">شهر:
                                                                            <span>[[place.city]]</span>
                                                                        </div>
                                                                        <div class="booking"></div>
                                                                    </div>
                                                                    </div>

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
                        <div class="lhr ui_column col-md-3 hideOnPhone" id="FilterController" ng-controller="FilterController" style="direction: rtl; padding: 10px;">
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
                                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" style="display: flex;justify-content: center;margin: 10px;">
                                                <img src="http://localhost/assets/_images/majara/kohmare/f-1.jpg" alt="آبشار کوهمره سرخی" class="image">
                                            </div>
                                        </div>

                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="col-md-12 hl_compareBtn" id="compareButton">هم‌اکنون مقایسه کنید</div>
                                                <div id="filterBox" style="flex-direction: column;">
                                                    <div style="font-size: 15px; margin: 10px 0px;">
                                                        <span>فیلترهای اعمال شده</span>
                                                        <span style="float: left">
                                                            <span>----</span><span style="margin: 0 5px">مورد از</span><span>----</span>
                                                        </span>
                                                    </div>
                                                    <div style="cursor: pointer; font-size: 12px; color: #050c93; margin-bottom: 7px;" onclick="closeFilters()">
                                                        پاک کردن فیلتر ها
                                                    </div>
                                                    <div id="filterShow" style="display: flex; flex-direction: row; flex-wrap: wrap;"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">جستجو‌ی نام</div>
                                                {{--                                                <div class="hl_inputBox">--}}
                                                {{--ng-change="nameFilter(nameSearch)"--}}
                                                {{--ng-model="nameSearch"--}}
                                                <input id="nameSearch" class="hl_inputBox" placeholder="جستجو کنید" onchange="nameFilterFunc(this.value)">
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">امتیاز کاربران</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-click="RateFilter(5)" type="radio" name="AVGrate" id="c5" value="5"/>
                                                        <label for="c5"
                                                               style="display:inline-block;"><span></span></label>
                                                        <div class="rating-widget"
                                                             style="font-size: 1.2em; display: inline-block">
                                                            <div class="prw_rup prw_common_location_rating_simple">
                                                                <span class="ui_bubble_rating bubble_50"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input  ng-click="RateFilter(4)" type="radio" name="AVGrate" id="c4" value="4"/>
                                                        <label for="c4"
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
                                                        <input ng-click="RateFilter(3)" type="radio" name="AVGrate" id="c3" value="3"/>
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
                                                        <input ng-click="RateFilter(2)" type="radio" name="AVGrate" id="c2" value="2"/>
                                                        <label for="c2"
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
                                                        <input ng-click="RateFilter(1)" type="radio" name="AVGrate" id="c1" value="1"/>
                                                        <label for="c1"
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
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <div class="filterGroupTitle">{{$feature->name}}</div>
                                                        @if(count($feature->subFeat) > 5)
                                                            <span onclick="showMoreItems({{$feature->id}})" class="moreItems{{$feature->id}} moreItems">نمایش کامل فیلترها</span>
                                                            <span onclick="showLessItems({{$feature->id}})" class="lessItems hidden extraItem{{$feature->id}} moreItems">پنهان سازی فیلتر‌ها</span>
                                                        @endif
                                                    </div>

                                                    <div class="filterContent ui_label_group inline">
                                                        @for($i = 0; $i < 5 && $i < count($feature->subFeat); $i++)
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                <input ng-disabled="isDisable()" ng-click="doFilterFeature({{$feature->subFeat[$i]->id}})" type="checkbox" id="feat{{$feature->subFeat[$i]->id}}" value="{{$feature->subFeat[$i]->name}}"/>
                                                                <label for="feat{{$feature->subFeat[$i]->id}}"><span></span>&nbsp;&nbsp;{{$feature->subFeat[$i]->name}}  </label>
                                                            </div>
                                                        @endfor

                                                        @if(count($feature->subFeat) > 5)
                                                            @for($i = 5; $i < count($feature->subFeat); $i++)
                                                                <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem{{$feature->id}}">
                                                                    <input ng-disabled="isDisable()" ng-click="doFilterFeature({{$feature->subFeat[$i]->id}})" type="checkbox" id="feat{{$feature->subFeat[$i]->id}}" value="{{$feature->subFeat[$i]->name}}"/>
                                                                    <label for="feat{{$feature->subFeat[$i]->id}}"><span></span>&nbsp;&nbsp; {{$feature->subFeat[$i]->name}} </label>
                                                                </div>
                                                            @endfor
                                                        @endif
                                                    </div>
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

    @include('hotelDetailsPopUp')

    @include('layouts.placeFooter')
</div>

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

<script>

    $('#compareButton').click(function(e) {
        $("#myCloseBtn").removeClass('hidden');
        $('#searchspan').animate({height: '100vh'});
    });

    var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    var specialFilters = [];
    var page = 1;
    var placeMode = '{{$placeMode}}';
    var floor = 1;
    var rateFilter = 0;
    var sort = "rate";
    var featureFilter = [];
    var nameFilter = '';
    var data;
    var init = true;
    var lock = false;
    var take = 4;
    var inSearch = false;
    var isFinish = false;
    var nearPlaceIdFilter = 0;
    var nearKindPlaceIdFilter = 0;
    var kindPlaceId = '{{$kindPlace->id}}';
    var hasLogin = '{{auth()->check() ? 1 : 0}}';

    if(placeMode == 'hotel'){
        specialFilters = [1];
    }

    function selectingOrder(elem, type) {
        $(".orders").removeClass('selectOrder');
        $("#distanceNav").text('selectOrder');
        elem.addClass('selectOrder');

        sort = type;
    }


    app.controller('FilterController', function ($scope, $rootScope) {

        $scope.isDisable = function () {
            return lock;
        };

        $scope.doKindFilter = function (value) {

            if(specialFilters.includes(value))
                specialFilters[specialFilters.indexOf(value)] = 0;
            else{
                if(specialFilters.includes(0))
                    specialFilters[specialFilters.indexOf(0)] = value;
                else
                    specialFilters[specialFilters.length] = value;
            }

            page = 1;
            floor = 1;
            init = true;
            isFinish = false;
            inSearch = false;

            $rootScope.$broadcast('myPagingFunctionAPI');
        };

        $scope.doFilterFeature = function (value) {

            if(featureFilter.includes(value))
                featureFilter[featureFilter.indexOf(value)] = 0;
            else{
                if(featureFilter.includes(0))
                    featureFilter[featureFilter.indexOf(0)] = value;
                else
                    featureFilter[featureFilter.length] = value;
            }

            page = 1;
            floor = 1;
            init = true;
            isFinish = false;
            inSearch = false;

            $rootScope.$broadcast('myPagingFunctionAPI');
        };

        $scope.RateFilter = function(value) {
            rateFilter = value;
            page = 1;
            floor = 1;
            init = true;
            isFinish = false;
            inSearch = false;

            $rootScope.$broadcast('myPagingFunctionAPI');
        };

    });

    app.controller('PlaceController', function ($scope, $http) {

        $scope.show = false;
        $scope.packets = [[]];
        $scope.oldScrollVal = 600;


        $scope.sortFunc = function(value) {
            sort = value;
            page = 1;
            floor = 1;
            init = true;
            isFinish = false;
            inSearch = false;

            $scope.$broadcast('myPagingFunctionAPI');
        };

        $scope.myPagingFunction = function () {

            var errorNum = 3;

            if(isFinish || inSearch)
                return;

            inSearch = true;
            document.getElementById('fullPageLoader').style.display = 'flex';

            createFilter();

            if (page == 1)
                $scope.packets = [[]];

            var scroll = $(window).scrollTop();

            data = $.param({
                pageNum: page,
                take: take,
                specialFilters: specialFilters,
                rateFilter: rateFilter,
                nameFilter: nameFilter,
                sort: sort,
                featureFilter: featureFilter,
                nearPlaceIdFilter: nearPlaceIdFilter,
                nearKindPlaceIdFilter: nearKindPlaceIdFilter,
                city: '{{$city->id}}',
                mode: '{{$mode}}',
                kindPlaceId: '{{$kindPlace->id}}'
            });

            var requestURL = '{{route('getPlaceListElems')}}';

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
                    $scope.packets[page - 1].places[j].redirect = '{{route('home')}}/' + placeMode + '-details/' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    if($scope.packets[page - 1].places[j].inTrip == 1)
                        $scope.packets[page - 1].places[j].inTrip = 'red-heart-fill';
                    else
                        $scope.packets[page - 1].places[j].inTrip = '';
                }

                if (response.data.places.length != 4) {
                    isFinish = true;
                    $scope.$broadcast('finalizeReceive');
                    return;
                }


                data = $.param({
                    pageNum: ++page,
                    take: take,
                    specialFilters: specialFilters,
                    rateFilter: rateFilter,
                    nameFilter: nameFilter,
                    sort: sort,
                    featureFilter: featureFilter,
                    nearPlaceIdFilter: nearPlaceIdFilter,
                    nearKindPlaceIdFilter: nearKindPlaceIdFilter,
                    city: '{{$city->id}}',
                    mode: '{{$mode}}',
                    kindPlaceId: '{{$kindPlace->id}}'
                });
                $http.post(requestURL, data, config).then(function (response) {

                    if (response.data != null && response.data.places != null && response.data.places.length > 0)
                        $scope.show = true;

                    $scope.packets[page - 1] = response.data;
                    $scope.packets[page - 1].places = response.data.places;

                    for (j = 0; j < $scope.packets[page - 1].places.length; j++) {
                        $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_' + $scope.packets[page - 1].places[j].avgRate + '0';
                        $scope.packets[page - 1].places[j].redirect = '{{route('home')}}/' + placeMode + '-details/' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                        if($scope.packets[page - 1].places[j].inTrip == 1)
                            $scope.packets[page - 1].places[j].inTrip = 'red-heart-fill';
                        else
                            $scope.packets[page - 1].places[j].inTrip = '';
                    }

                    if (response.data.places.length != 4) {
                        isFinish = true;
                        $scope.$broadcast('finalizeReceive');
                        return;
                    }

                    data = $.param({
                        pageNum: ++page,
                        take: take,
                        specialFilters: specialFilters,
                        rateFilter: rateFilter,
                        nameFilter: nameFilter,
                        sort: sort,
                        featureFilter: featureFilter,
                        nearPlaceIdFilter: nearPlaceIdFilter,
                        nearKindPlaceIdFilter: nearKindPlaceIdFilter,
                        city: '{{$city->id}}',
                        mode: '{{$mode}}',
                        kindPlaceId: '{{$kindPlace->id}}'
                    });

                    $http.post(requestURL, data, config).then(function (response) {

                        if (response.data != null && response.data.places != null && response.data.places.length > 0)
                            $scope.show = true;

                        $scope.packets[page - 1] = response.data;
                        $scope.packets[page - 1].places = response.data.places;
                        for (j = 0; j < $scope.packets[page - 1].places.length; j++) {
                            $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_' + $scope.packets[page - 1].places[j].avgRate + '0';
                            $scope.packets[page - 1].places[j].redirect = '{{route('home')}}/' + placeMode + '-details/' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                            if($scope.packets[page - 1].places[j].inTrip == 1)
                                $scope.packets[page - 1].places[j].inTrip = 'red-heart-fill';
                            else
                                $scope.packets[page - 1].places[j].inTrip = '';
                        }

                        $scope.$broadcast('finalizeReceive');
                        inSearch = false;

                    }).catch(function (err) {
                        if(errorNum != 0){
                            errorNum--;
                            $scope.myPagingFunction();
                        }
                        else{
                            document.getElementById('fullPageLoader').style.display = 'none';
                            console.log(err);
                        }
                    });

                }).catch(function (err) {
                    if(errorNum != 0){
                        errorNum--;
                        $scope.myPagingFunction();
                    }
                    else{
                        document.getElementById('fullPageLoader').style.display = 'none';
                        console.log(err);
                    }
                });

            }).catch(function (err) {
                if(errorNum != 0){
                    errorNum--;
                    $scope.myPagingFunction();
                }
                else{
                    document.getElementById('fullPageLoader').style.display = 'none';
                    console.log(err);
                }
            });
        };

        $scope.$on('finalizeReceive', function (event) {
            page++;
            document.getElementById('fullPageLoader').style.display = 'none';
            floor = page;
        });

        $scope.$on('myPagingFunctionAPI', function (event) {
            $scope.myPagingFunction();
        });
    });

    function nameFilterFunc(value){
        if(value.trim().length > 2)
            nameFilter = value;
        else
            nameFilter = '';

        newSearch();
    }

    function createFilter(){
        var text = '';
        $('#filterShow').html('');
        if(rateFilter != 0)
            text += '<div class="filtersExist">\n' +
                    '<div>امتیاز کاربر</div>\n' +
                    '<div onclick="cancelRateFilter()" class="icons iconClose filterCloseIcon"></div>\n' +
                    '</div>';

        if(nameFilter.trim().length > 2)
            text += '<div class="filtersExist">\n' +
                    '<div>نام</div>\n' +
                    '<div onclick="cancelNameFilter()" class="icons iconClose filterCloseIcon"></div>\n' +
                    '</div>';

        for(i = 0; i < featureFilter.length; i++){
            if(featureFilter[i] != 0) {
                var name = document.getElementById('feat' + featureFilter[i]).value;
                // text += '<div id="closeMoneyFilter" class="closeXicon filtersExist" onclick="cancelFeatureFilter(' + featureFilter[i] + ')">' + name + '</div>\n';
                text += '<div class="filtersExist">\n' +
                        '<div>' + name + '</div>\n' +
                        '<div onclick="cancelFeatureFilter(' + featureFilter[i] + ')" class="icons iconClose filterCloseIcon"></div>\n' +
                        '</div>';
            }
        }

        $('#filterShow').html(text);
    }

    function cancelRateFilter(kind = 'refresh'){
        for(i = 1; i < 6; i++)
            document.getElementById('c' + i).checked = false;

        rateFilter = 0;
        if(kind == 'refresh')
            newSearch();
    }

    function cancelFeatureFilter(id, kind = 'refresh'){
        if(id == 0){
            for(i = 0; i< featureFilter.length; i++){
                if(featureFilter[i] != 0)
                    $('#feat' + featureFilter[i]).prop("checked", false);
            }
            featureFilter = [];
        }
        else {
            if (featureFilter.includes(id)) {
                featureFilter[featureFilter.indexOf(id)] = 0;
                $('#feat' + id).prop("checked", false);
            }
        }

        if(kind == 'refresh')
            newSearch();
    }

    function cancelNameFilter(){
        document.getElementById('nameSearch').value = '';
        nameFilterFunc('');
    }

    function closeFilters(){
        cancelRateFilter('noRef');
        cancelFeatureFilter(0, 'noRef');
        cancelNameFilter();
    }

    function openGlobalSearch(){
        createSearchInput('searchInPlaces', 'مکان مورد نظر را وارد کنید.');
    }

    function searchInPlaces(element){
        var value = element.value;
        if(value.trim().length > 1){
            $.ajax({
                type: 'post',
                url: "{{route('proSearch')}}",
                data: {
                    'key':  value,
                    'hotelFilter': 1,
                    'amakenFilter': 1,
                    'restaurantFilter': 1,
                    'majaraFilter': 1,
                    'sogatSanaieFilter': 1,
                    'mahaliFoodFilter': 1,
                    'selectedCities': '{{$city->id}}',
                    'mode': '{{$mode}}'
                },
                success: function (response) {
                    $("#resultPlace").empty();

                    if(response.length == 0)
                        return;

                    response = JSON.parse(response);

                    newElement = "";
                    for(i = 0; i < response.length; i++) {

                        if(response[i].kindPlace == 'هتل')
                            icon = '<div class="icons hotelIcon spIcons"></div>';
                        else if(response[i].kindPlace == 'رستوران')
                            icon = '<div class="icons restaurantIcon spIcons"></div>';
                        else if(response[i].kindPlace == 'اماکن')
                            icon = '<div class="icons touristAttractions spIcons"></div>';
                        else if(response[i].kindPlace == 'ماجرا')
                            icon = '<div class="icons adventure spIcons"></div>';
                        else if(response[i].kindPlace == 'غذای محلی')
                            icon = '<div class="icons traditionalFood spIcons"></div>';
                        else if(response[i].kindPlace == 'صنایع سوغات')
                            icon = '<div class="icons souvenirIcon spIcons"></div>';
                        else
                            icon = '<div class="icons touristAttractions spIcons"></div>';

                        newElement += '<div style="padding: 5px 20px; display: flex" onclick="selectSearchInPlace(\'' + response[i]['name'] + '\', ' + response[i]["id"] + ', ' + response[i]["kindPlaceId"] + ')">' +
                            '       <div>' +
                            icon +
                            '       <p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px; display: inline-block;">' + response[i].name + '</p>' +
                            '       <p class="suggest cursor-pointer stateName" id="suggest_1">' + response[i].cityName + ' در ' + response[i].stateName + '</p>' +
                            '       </div>\n' +
                            '</div>';
                    }

                    setResultToGlobalSearch(newElement);
                }
            });
        }
    }

    function selectSearchInPlace(name, id, kindPlaceId){
        nearPlaceIdFilter = id;
        nearKindPlaceIdFilter = kindPlaceId;
        $('#selectDistance').text(name);

        closeSearchInput();
        $(".orders").removeClass('selectOrder');
        $("#distanceNav").addClass('selectOrder');
        sort = 'distance';
        newSearch();
    }

    function newSearch(){
        page = 1;
        floor = 1;
        init = true;
        isFinish = false;
        inSearch = false;

        angular.element(document.getElementById('PlaceController')).scope().myPagingFunction();
    }

    function showElement(element) {
        $(".pop-up").addClass('hidden');
        $("#" + element).removeClass('hidden');
    }

    function saveToTripList(element){
        var placeId = $(element).attr('value');
        saveToTripPopUp(placeId, kindPlaceId)
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
{{--<div class="ui_backdrop dark" id="darkModeMainPage" ></div>--}}

</body>
</html>