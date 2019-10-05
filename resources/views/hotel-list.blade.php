<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/hotelLists.css')}}"/>

    <title>
        @if($placeMode == "hotel")
            هتل های
        @elseif($placeMode == "restaurant")
            رستوران های
        @else
            اماکن
        @endif

        @if($mode == "state")
            استان
        @else
            شهر
        @endif
        {{$city}}
    </title>

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
                                    @if($placeMode == "hotel")
                                        مراکز اقامتی
                                    @elseif($placeMode == "restaurant")
                                        رستوران های
                                    @else
                                        اماکن
                                    @endif

                                    @if($mode == "state")
                                        استان
                                    @else
                                        شهر
                                    @endif
                                    {{$city}}
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

                        <div class="ui_column is-9 rtl" ng-controller="PlaceController as cntr">
                            <div infinite-scroll="myPagingFunction()" class="coverpage">
                                <div class="ppr_rup ppr_priv_restaurants_coverpage_content">
                                    <div>
                                        <div class="prw_rup prw_restaurants_restaurants_coverpage_content">
                                            <div class="coverpage_widget">
                                                <div class="section">

                                                    <div class="single_filter_pois">

                                                        <div class="title ui_columns">
                                                            <span class="titleWrap ui_column is-9">
                                                                <a class="titleLink"></a>
                                                            </span>
                                                            <a class="view_all ui_column is-3"></a>
                                                        </div>

                                                        <div ng-repeat="packet in packets" class="option">
                                                            <div class="Price_3 ui_columns is-mobile">

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
                                                                        <div class="prw_rup prw_meta_saves_badge">
                                                                            <div class="savesButton">
                                                                                <span class="saves-widget-button saves secondary save-location-5247712 ui_icon heart saves-icon-locator"></span>
                                                                            </div>
                                                                        </div>
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

                                                        <center>
                                                            <div class="loader hidden"></div>
                                                        </center>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coverpage_tracking"></div>
                                </div>
                            </div>
                        </div>

                        <div class="lhr ui_column is-3 hideCount reduced_height rtl" ng-controller="FilterController as filterCntl">

                            <div class="ppr_rup ppr_priv_restaurant_filters">
                                <div class="verticalFilters placements">
                                    <div id="EATERY_FILTERS_CONT" class="eatery_filters">
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div class="lhrFilterBlock jfy_filter_bar_selectedFilters selectedFilters">
                                                <div class="filterGroupTitle">
                                                    <img ng-show="showPic" ng-src="{{URL::asset('images/adv.jpg')}}">
                                                    <img ng-show="showPic" ng-src="{{URL::asset('images/bom.jpg')}}">
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle"> مرتب سازی بر اساس</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="c22" value="rate"/>
                                                        <label for="c22"><span></span>&nbsp;&nbsp;امتیاز </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="c23" value="review"/>
                                                        <label for="c23"><span></span>&nbsp;&nbsp; تعداد نقد </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="c24" value="alphabet"/>
                                                        <label for="c24"><span></span>&nbsp;&nbsp; الفبا </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($placeMode == "hotel")
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle"> دسته بندی</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(-1)" type="checkbox" id="c0"
                                                                   checked="checked"/>
                                                            <label for="c0"><span></span>&nbsp;&nbsp;همه</label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(1)" type="checkbox" id="c1"/>
                                                            <label for="c1"><span></span>&nbsp;&nbsp;هتل </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(2)" type="checkbox" id="c25"/>
                                                            <label for="c25"><span></span>&nbsp;&nbsp; هتل آپارتمان
                                                            </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(3)" type="checkbox" id="c2"/>
                                                            <label for="c2"><span></span>&nbsp;&nbsp; مهمانسرا </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(4)" type="checkbox" id="c3"/>
                                                            <label for="c3"><span></span>&nbsp;&nbsp; ویلا </label>
                                                        </div>

                                                        <span onclick="showMoreItems2()" class="moreItems2">نمایش همه ی موارد</span>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(5)" type="checkbox" id="c4"/>
                                                            <label for="c4"><span></span>&nbsp;&nbsp; متل </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(6)" type="checkbox" id="c26"/>
                                                            <label for="c26"><span></span>&nbsp;&nbsp; مجتمع تفریحی
                                                            </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(7)" type="checkbox" id="c27"/>
                                                            <label for="c27"><span></span>&nbsp;&nbsp; پانسیون </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(8)" type="checkbox" id="c28"/>
                                                            <label for="c28"><span></span>&nbsp;&nbsp; بوم گردی </label>
                                                        </div>

                                                    </div>

                                                    <span onclick="showLessItems2()"
                                                          class="lessItems2 hidden extraItem2">پنهان سازی همه ی موارد</span>

                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle"> نوع غذا</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c5" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_farangi')"/>
                                                            <label for="c5"><span></span>&nbsp;&nbsp;فرنگی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c6" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_irani')"/>
                                                            <label for="c6"><span></span>&nbsp;&nbsp; ایرانی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c7" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_mahali')"/>
                                                            <label for="c7"><span></span>&nbsp;&nbsp; محلی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c8" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('coffeeshop')"/>
                                                            <label for="c8"><span></span>&nbsp;&nbsp; کافی شاپ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible"
                                                     data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle"> محدوده قرارگیری</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('hoome')" id="c9"/>
                                                            <label for="c9"><span></span>&nbsp;&nbsp;حومه شهر </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tarikhi')" id="c10"/>
                                                            <label for="c10"><span></span>&nbsp;&nbsp; تاریخی </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible"
                                                     data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">امکانات</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c11" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('parking')"/>
                                                            <label for="c11"><span></span>&nbsp;&nbsp;پارکینگ </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c12" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('club')"/>
                                                            <label for="c12"><span></span>&nbsp;&nbsp; باشگاه ورزشی
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c13" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('anten')"/>
                                                            <label for="c13"><span></span>&nbsp;&nbsp; آنتن دهی موبایل
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c14" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('masazh')"/>
                                                            <label for="c14"><span></span>&nbsp;&nbsp; سالن ماساژ
                                                            </label>
                                                        </div>


                                                        <span onclick="showMoreItems()" class="moreItems">نمایش همه ی موارد</span>


                                                        <div class="ui_input_checkbox filterItem extraItem lhrFilter filter establishmentTypeFilters">
                                                            <input type="checkbox" id="c15" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('pool')"/>
                                                            <label for="c15"><span></span>&nbsp;&nbsp;استخر </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="c16" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tahviye')"/>
                                                            <label for="c16"><span></span>&nbsp;&nbsp; تهویه مطبوع
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="c17" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('breakfast')"/>
                                                            <label for="c17"><span></span>&nbsp;&nbsp; صبحانه مجانی
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="c18" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('mahali')"/>
                                                            <label for="c18"><span></span>&nbsp;&nbsp; امکانات محلی
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="c19" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('maalool')"/>
                                                            <label for="c19"><span></span>&nbsp;&nbsp;امکانات معلولان
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="c20" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('internet')"/>
                                                            <label for="c20"><span></span>&nbsp;&nbsp; اینترنت </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="c21" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('swite')"/>
                                                            <label for="c21"><span></span>&nbsp;&nbsp; سوئیت
                                                                دربست</label>
                                                        </div>

                                                        <span onclick="showLessItems()"
                                                              class="lessItems hidden extraItem">پنهان سازی همه ی موارد</span>

                                                    </div>
                                                </div>
                                            </div>

                                        @elseif($placeMode == "restaurant")

                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle"> دسته بندی</div>
                                                    <div class="filterContent ui_label_group inline">

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(-1)" type="checkbox" id="c0"/>
                                                            <label for="c0"><span></span>&nbsp;&nbsp; همه </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(1)" type="checkbox" id="c2"/>
                                                            <label for="c2"><span></span>&nbsp;&nbsp; رستوران </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(2)" type="checkbox" id="c1"/>
                                                            <label for="c1"><span></span>&nbsp;&nbsp;فست فود </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters"
                                                 data-prwidget-name="restaurants_restaurant_filters"
                                                 data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible"
                                                     data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle"> نوع غذا</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_farangi')"
                                                                   type="checkbox" id="c5"/>
                                                            <label for="c5"><span></span>&nbsp;&nbsp;فرنگی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_irani')"
                                                                   type="checkbox" id="c6"/>
                                                            <label for="c6"><span></span>&nbsp;&nbsp; ایرانی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_mahali')"
                                                                   type="checkbox" id="c7"/>
                                                            <label for="c7"><span></span>&nbsp;&nbsp; محلی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('coffeeshop')"
                                                                   type="checkbox" id="c8"/>
                                                            <label for="c8"><span></span>&nbsp;&nbsp; کافی شاپ</label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters"
                                                 data-prwidget-name="restaurants_restaurant_filters"
                                                 data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible"
                                                     data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle"> محدوده قرارگیری</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('hoome')" type="checkbox"
                                                                   id="c9"/>
                                                            <label for="c9"><span></span>&nbsp;&nbsp;حومه شهر </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tarikhi')" type="checkbox"
                                                                   id="c10"/>
                                                            <label for="c10"><span></span>&nbsp;&nbsp; تاریخی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('shologh')" type="checkbox"
                                                                   id="c11"/>
                                                            <label for="c11"><span></span>&nbsp;&nbsp; شلوغ </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('khalvat')" type="checkbox"
                                                                   id="c12"/>
                                                            <label for="c12"><span></span>&nbsp;&nbsp; خلوت </label>
                                                        </div>

                                                        <span onclick="showMoreItems()" class="moreItems">نمایش همه ی موارد</span>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('markaz')" type="checkbox"
                                                                   id="c13"/>
                                                            <label for="c13"><span></span>&nbsp;&nbsp; مرکز شهر </label>
                                                        </div>

                                                        <span onclick="showLessItems()"
                                                              class="lessItems hidden extraItem">پنهان سازی همه ی موارد</span>


                                                    </div>
                                                </div>
                                            </div>

                                        @elseif($placeMode == "amaken")
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle"> دسته بندی</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tarikhi')" type="checkbox"
                                                                   id="c1"/>
                                                            <label for="c1"><span></span>&nbsp;&nbsp;تاریخی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('mooze')" type="checkbox"
                                                                   id="c2"/>
                                                            <label for="c2"><span></span>&nbsp;&nbsp; موزه </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tabiatgardi')"
                                                                   type="checkbox" id="c3"/>
                                                            <label for="c3"><span></span>&nbsp;&nbsp; طبیعت گردی
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('markazkharid')"
                                                                   type="checkbox" id="c5"/>
                                                            <label for="c5"><span></span>&nbsp;&nbsp; مراکز خرید
                                                            </label>
                                                        </div>

                                                        <span onclick="showMoreItems()" class="moreItems">نمایش همه ی موارد</span>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('')" type="checkbox"
                                                                   id="c6"/>
                                                            <label for="c6"><span></span>&nbsp;&nbsp; زیارتی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tafrihi')" type="checkbox"
                                                                   id="c7"/>
                                                            <label for="c7"><span></span>&nbsp;&nbsp; تفریحی </label>
                                                        </div>

                                                        <span onclick="showLessItems()"
                                                              class="lessItems hidden extraItem">پنهان سازی همه ی موارد</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters"
                                                 data-prwidget-name="restaurants_restaurant_filters"
                                                 data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible"
                                                     data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle"> نوع معماری</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('ghadimi')" type="checkbox"
                                                                   id="c9"/>
                                                            <label for="c9"><span></span>&nbsp;&nbsp;قدیمی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tarikhibana')"
                                                                   type="checkbox" id="c10"/>
                                                            <label for="c10"><span></span>&nbsp;&nbsp; تاریخی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('modern')" type="checkbox"
                                                                   id="c11"/>
                                                            <label for="c11"><span></span>&nbsp;&nbsp; مدرن </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters"
                                                 data-prwidget-name="restaurants_restaurant_filters"
                                                 data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible"
                                                     data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle"> محدوده قرارگیری</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('hoome')" type="checkbox"
                                                                   id="c8"/>
                                                            <label for="c8"><span></span>&nbsp;&nbsp;حومه شهر </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('baftetarikhi')"
                                                                   type="checkbox" id="c12"/>
                                                            <label for="c12"><span></span>&nbsp;&nbsp; تاریخی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('shologh')" type="checkbox"
                                                                   id="c13"/>
                                                            <label for="c13"><span></span>&nbsp;&nbsp; شلوغ </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('khalvat')" type="checkbox"
                                                                   id="c14"/>
                                                            <label for="c14"><span></span>&nbsp;&nbsp; خلوت </label>
                                                        </div>

                                                        <span onclick="showMoreItems2()" class="moreItems">نمایش همه ی موارد</span>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('markaz')" type="checkbox"
                                                                   id="c15"/>
                                                            <label for="c15"><span></span>&nbsp;&nbsp; مرکز شهر </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tabiat')" type="checkbox"
                                                                   id="c16"/>
                                                            <label for="c16"><span></span>&nbsp;&nbsp; طبیعت </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('kooh')" type="checkbox"
                                                                   id="c17"/>
                                                            <label for="c17"><span></span>&nbsp;&nbsp; کوه </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('darya')" type="checkbox"
                                                                   id="c18"/>
                                                            <label for="c18"><span></span>&nbsp;&nbsp; دریا </label>
                                                        </div>

                                                        <span onclick="showLessItems2()"
                                                              class="lessItems2 hidden extraItem2">پنهان سازی همه ی موارد</span>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
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
        <input type="hidden" name="city" value="{{$city}}">
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
                kind_id: filters,
                sort: sort,
                color: colors
            });

            var requestURL = (placeMode == "hotel") ? '{{route('getHotelListElems', ['city' => $city, 'mode' => $mode])}}' :
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
                    switch ($scope.packets[page - 1].places[j].avgRate) {
                        case 5:
                            $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_50';
                            break;
                        case 4:
                            $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_40';
                            break;
                        case 3:
                            $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_30';
                            break;
                        case 2:
                            $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_20';
                            break;
                        default:
                            $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_10';
                    }

                    if (placeMode == "hotel") {
                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/hotel-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    }
                    else if (placeMode == "amaken") {
                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    }
                    else if (placeMode == "restaurant") {
                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/restaurant-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    }
                }

                if (response.data.places.length != 4) {
                    $scope.$broadcast('finalizeReceive');
                    return;
                }

                data = $.param({
                    pageNum: ++page,
                    kind_id: filters,
                    sort: sort,
                    color: colors
                });

                $http.post(requestURL, data, config).then(function (response) {

                    if (response.data != null && response.data.places != null && response.data.places.length > 0)
                        $scope.show = true;

                    $scope.packets[page - 1] = response.data;
                    $scope.packets[page - 1].places = response.data.places;

                    for (j = 0; j < $scope.packets[page - 1].places.length; j++) {
                        switch ($scope.packets[page - 1].places[j].avgRate) {
                            case 5:
                                $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_50';
                                break;
                            case 4:
                                $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_40';
                                break;
                            case 3:
                                $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_30';
                                break;
                            case 2:
                                $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_20';
                                break;
                            default:
                                $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_10';
                        }

                        if (placeMode == "hotel") {
                            $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/hotel-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                        }
                        else if (placeMode == "amaken") {
                            $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                        }
                        else if (placeMode == "restaurant") {
                            $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/restaurant-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                        }
                    }
                    if (response.data.places.length != 4) {
                        $scope.$broadcast('finalizeReceive');
                        return;
                    }

                    data = $.param({
                        pageNum: ++page,
                        kind_id: filters,
                        sort: sort,
                        color: colors
                    });

                    $http.post(requestURL, data, config).then(function (response) {

                        if (response.data != null && response.data.places != null && response.data.places.length > 0)
                            $scope.show = true;

                        $scope.packets[page - 1] = response.data;
                        $scope.packets[page - 1].places = response.data.places;
                        for (j = 0; j < $scope.packets[page - 1].places.length; j++) {
                            switch ($scope.packets[page - 1].places[j].avgRate) {
                                case 5:
                                    $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_50';
                                    break;
                                case 4:
                                    $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_40';
                                    break;
                                case 3:
                                    $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_30';
                                    break;
                                case 2:
                                    $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_20';
                                    break;
                                default:
                                    $scope.packets[page - 1].places[j].ngClass = 'ui_bubble_rating bubble_10';
                            }

                            if (placeMode == "hotel") {
                                $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/hotel-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                            }
                            else if (placeMode == "amaken") {
                                $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                            }
                            else if (placeMode == "restaurant") {
                                $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/restaurant-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                            }
                        }

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

        @foreach($sections as $section)
            fillMyDivWithAdv('{{$section->sectionId}}', '{{$state->id}}');
        @endforeach

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

    function showMoreItems() {
        $(".extraItem").removeClass('hidden').addClass('selected');
        $(".moreItems").addClass('hidden');
    }

    function showLessItems() {
        $(".extraItem").addClass('hidden').removeClass('selected');
        $(".moreItems").removeClass('hidden');
    }

    function showMoreItems2() {
        $(".extraItem2").removeClass('hidden').addClass('selected');
        $(".moreItems2").addClass('hidden');
    }

    function showLessItems2() {
        $(".extraItem2").addClass('hidden').removeClass('selected');
        $(".moreItems2").removeClass('hidden');
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

<script src="{{URL::asset('js/adv.js')}}"></script>
<div class="ui_backdrop dark" id="darkModeMainPage" ></div>
</body>
</html>