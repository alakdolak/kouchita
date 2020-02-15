<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
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
                                                <span onclick="changeTwoCalendar(2); nowCalendar()"
                                                      class="ui_icon calendar calendarIcon"></span>
                                                <input onclick="assignDate('{{convertStringToDate(getToday()["date"])}}', 'calendar-container-edit-1placeDate_phone', 'backDate_phone')"
                                                       name="date" id="goDate" type="text" class="inputDateLabel"
                                                       placeholder="تاریخ رفت" required readonly>
                                            </label>
                                            <label id="calendar-container-edit-2placeDate" class="dateLabel">
                                                <span>تا</span>
                                                <input name="date" id="backDate" type="text" class="inputDateLabel"
                                                       placeholder="تاریخ برگشت" required readonly>
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
                        <div id="PlaceController" class="ui_column is-9" ng-controller="PlaceController as cntr"
                             style="direction: rtl;">
                            <div infinite-scroll="myPagingFunction()" class="coverpage">
                                <div class="ppr_rup ppr_priv_restaurants_coverpage_content">
                                    <div>
                                        <div class="prw_rup prw_restaurants_restaurants_coverpage_content">
                                            <div class="coverpage_widget">
                                                <div class="section">
                                                    <div class="single_filter_pois">
                                                        <div id="FilterTopController" class="title ui_columns"
                                                             ng-controller="FilterTopController as filterCntlTop"
                                                             style="border-bottom: 1px solid lightgray;">
                                                            <div class="ordering" style="font-weight: bold">مرتب سازی بر
                                                                اساس:
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders"
                                                                     onclick="selectingOrder($(this),'price')"
                                                                     ng-click="sortFunc('price')" id="z1">
                                                                    بیشترین نظر
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders"
                                                                     onclick="selectingOrder($(this), 'review')"
                                                                     ng-click="sortFunc('review')" id="z2">
                                                                    بهترین بازخورد
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders"
                                                                     onclick="selectingOrder($(this), 'review')"
                                                                     ng-click="sortFunc('review')" id="z2">
                                                                    بیشترین بازدید
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders selectOrder"
                                                                     ng-click="sortFunc('offer')" id="z3"
                                                                     onclick="selectingOrder($(this), 'offer')">
                                                                    حروف الفبا
                                                                </div>
                                                            </div>
                                                            <div class="ordering" onclick="showLowDistancePopUp()">
                                                                <div class="orders" style="width: 140% !important;"
                                                                     onclick="selectingOrder($(this),'leastDist')">
                                                                    کمترین فاصله تا
                                                                    <span id="selectDistance">__ __ __</span></div>
                                                                <div class="shTIcon bottomArrowIcon"></div>
                                                                <div id="lowDistance" class="lowDistance hidden"
                                                                     onmouseleave="$('#lowDistance').addClass('hidden');">
                                                                    <input id="inputDistancePlace" class="inputDistance"
                                                                           type="text"
                                                                           placeholder="مکان مورد نظر را وارد کنید"
                                                                           oninput="searchPlace(this.value)">
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
                                                        <div class="option">
                                                            {{-- ng-repeat="packet in packets"--}}
                                                            <div id="show_elements" class="Price_3 ui_columns is-mobile"
                                                                 style="flex-direction: column;">
                                                                    <div id="place_[[place.id]]"
                                                                     ng-repeat="place in packet.places"
                                                                     class="ui_column is-12 is-mobile"
                                                                     style="display: block;">
                                                                    <div class="poi"
                                                                         style="background-color: #f2f2f2; border: 1px solid lightgray; border-radius: 5px;  padding: 5px;">
                                                                        <a href="#" class="thumbnail"
                                                                           style="display: inline-block; margin: 0 !important; float: right">
                                                                            <div class="prw_rup prw_common_centered_thumbnail">
                                                                                <div class="sizing_wrapper"
                                                                                     style="width:200px;height:130px;">
                                                                                    <div class="centering_wrapper"
                                                                                         style="margin-top:-66px;">
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
                                                                        <div class="Boxes" style="width: 20%;">
                                                                            <div class="name " title="[[place.name]]">
                                                                                <a class="poiTitle" target="_blank"
                                                                                   href="[[place.redirect]]">[[place.name]][[place.id]]</a>
                                                                            </div>
                                                                            <div class="rating-count">
                                                                                <div class="rating-widget">
                                                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                                                        <span class="[[place.ngClass]]"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <a target="_blank" class="review_count"
                                                                                   href=""
                                                                                   style="padding-left: 7px; border-left: 1px solid lightgray;">[[place.reviews]]
                                                                                    <span style="color: #16174F;">نقد</span></a>
                                                                                <div style="display: inline;padding-right: 7px;">
                                                                                    [[place.avgRate]] <span
                                                                                            style="color: #16174F;">امتیاز</span>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <span style="color: #4dc7bc">درجه هتل: </span>
                                                                                <span>پنج ستاره</span>
                                                                            </div>
                                                                            <div>
                                                                                <div class="icons location"
                                                                                     style="display: inline-block"></div>
                                                                                <a>[[place.address]]</a>
                                                                            </div>
                                                                            <div>
                                                                                <span style="color: #4dc7bc; margin-left: 5px">فاصله</span>
                                                                                [[place.distance]]
                                                                            </div>
                                                                        </div>
                                                                        <div class="Boxes"
                                                                             style="width: 35%;position: absolute;">
                                                                            <div style="color: #963019">بهترین قیمت
                                                                            </div>
                                                                            <div style="display: inline-block; float: right;">
                                                                                شروع برای هر شب از
                                                                            </div>
                                                                            <div style="display: inline-block; font-size: 1.2em; margin-right: 8px; color: black">
                                                                                [[place.minPrice]]
                                                                                <div id="sale"
                                                                                     style="border-top: 2px solid red; margin-top: -11px; color: red">
                                                                                    <div style="margin-top: 8px">
                                                                                        550000
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tenPercentSave">
                                                                                <div style="display: inline-block; float: left; margin-left: 35px">
                                                                                    [[place.savePercent]] درصد ذخیره
                                                                                </div>
                                                                                <div style="display: inline-block; float: right">
                                                                                    ده درصد تخفیف ویزه نوروز
                                                                                </div>
                                                                            </div>
                                                                            <div style="float: left">
                                                                                <a href="[[place.redirect]]">
                                                                                    <button class="btn viewOfferBtn"
                                                                                            type="button">مشاهده
                                                                                        پیشنهادها
                                                                                    </button>
                                                                                </a>
                                                                                <a class="otherOffer">به همراه
                                                                                    [[place.otherRoom]] پیشنهاد دیگر</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Boxes"
                                                                             style="width: 15%;position: absolute; top: 10%; left: 3%; border-left: 0px !important;">
                                                                            <button class="btn specOfferBtn"
                                                                                    type="button">[[place.service]]
                                                                            </button>
                                                                            <button class="btn reservBtn" type="button">
                                                                                رزرو آنی
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div id="boxAlarm"></div>
                                                                    <script>
                                                                        check_num++;
                                                                        if (check_num == 2) {
                                                                            document.getElementById('boxAlarm').innerHTML = text;
                                                                        }
                                                                    </script>
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

                        <div class="lhr ui_column is-3 hideCount reduced_height" id="FilterController"
                             ng-controller="FilterController as filterCntl" style="direction: rtl;">
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
                                                <div id="filterBox" style="flex-direction: column;">
                                                    <div style="font-size: 15px; margin: 10px 0px;">
                                                        <span>فیلترهای اعمال شده</span>
                                                        <span>
                                                            <span>----</span><span>مورد از</span><span>----</span>
                                                        </span>
                                                    </div>
                                                    <div style="cursor: pointer; font-size: 12px; color: #050c93;"
                                                         onclick="closeFilters()">
                                                        پاک کردن فیلتر ها
                                                    </div>
                                                    <div id="filterShow"
                                                         style="display: flex; flex-direction: row; flex-wrap: wrap;">
                                                        <div id="closeMoneyFilter" class="closeXicon"
                                                             style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;"
                                                             onclick="cancelMoneyFilter()"> قیمت
                                                        </div>
                                                        <div id="closeRateFilter" class="closeXicon"
                                                             style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;"
                                                             onclick="cancelRateFilter()"> امتیاز کاربران
                                                        </div>
                                                        <div id="closeKindFilter" class="closeXicon"
                                                             style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;"
                                                             onclick="cancelKindFilter()"> نوع
                                                        </div>
                                                        <div id="closeRangeFilter" class="closeXicon"
                                                             style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;"
                                                             onclick="cancelRangeFilter()"> محدوده
                                                        </div>
                                                        <div id="closeFoodFilter" class="closeXicon"
                                                             style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;"
                                                             onclick="cancelFoodFilter()"> غذا
                                                        </div>
                                                        <div id="closeFacilitiesFilter" class="closeXicon"
                                                             style="padding: 2%; margin: 2%; background-color: #4dc7bc; color: white; flex-direction: row; justify-content: center; align-items: center; display: none;"
                                                             onclick="cancelFacilitiesFilter()"> امکانات
                                                        </div>
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
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
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
                                                        <input onclick="RateFilter(5)" type="radio" name="AVGrate"
                                                               id="c1" value="5"/>
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
                                                        <input onclick="RateFilter(4)" type="radio" name="AVGrate"
                                                               id="c2" value="4"/>
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
                                                        <input onclick="RateFilter(3)" type="radio" name="AVGrate"
                                                               id="c3" value="3"/>
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
                                                        <input onclick="RateFilter(2)" type="radio" name="AVGrate"
                                                               id="c4" value="2"/>
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
                                                        <input onclick="RateFilter(1)" type="radio" name="AVGrate"
                                                               id="c5" value="1"/>
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

                                        @if($placeMode == "hotel")

                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle">نوع مرکز اقامتی</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()"
                                                                   ng-click="doFilter(-1)" type="checkbox" id="x0"
                                                                   checked="checked"/>
                                                            <label for="x0"><span></span>&nbsp;&nbsp; همه </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(1)" type="checkbox" id="x1"/>
                                                            <label for="x1"><span></span>&nbsp;&nbsp; هتل </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(2)" type="checkbox" id="x2"/>
                                                            <label for="x2"><span></span>&nbsp;&nbsp; هتل آپارتمان
                                                            </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(3)" type="checkbox" id="x3"/>
                                                            <label for="x3"><span></span>&nbsp;&nbsp; مهمانسرا </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(4)" type="checkbox" id="x4"/>
                                                            <label for="x4"><span></span>&nbsp;&nbsp; ویلا </label>
                                                        </div>

                                                        <span onclick="showMoreItems2()" class="moreItems2">نمایش همه ی موارد</span>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(5)" type="checkbox" id="x5"/>
                                                            <label for="x5"><span></span>&nbsp;&nbsp; متل </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(6)" type="checkbox" id="x6"/>
                                                            <label for="x6"><span></span>&nbsp;&nbsp; مجتمع تفریحی
                                                            </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(7)" type="checkbox" id="x7"/>
                                                            <label for="x7"><span></span>&nbsp;&nbsp; پانسیون </label>
                                                        </div>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters extraItem2">
                                                            <input ng-disabled="isDisable()" ng-disabled="isDisable()"
                                                                   ng-click="doFilter(8)" type="checkbox" id="x8"/>
                                                            <label for="x8"><span></span>&nbsp;&nbsp; بوم گردی </label>
                                                        </div>

                                                    </div>

                                                    <span onclick="showLessItems2()"
                                                          class="lessItems2 hidden extraItem2">پنهان سازی همه ی موارد</span>

                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle">نوع غذا</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="b1" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_farangi')"
                                                                   onclick="doFoodFilter()"/>
                                                            <label for="b1"><span></span>&nbsp;&nbsp; فرنگی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="b2" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_irani')"
                                                                   onclick="doFoodFilter()"/>
                                                            <label for="b2"><span></span>&nbsp;&nbsp; ایرانی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="b3" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('food_mahali')"
                                                                   onclick="doFoodFilter()"/>
                                                            <label for="b3"><span></span>&nbsp;&nbsp; محلی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="b4" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('coffeeshop')"
                                                                   onclick="doFoodFilter()"/>
                                                            <label for="b4"><span></span>&nbsp;&nbsp; کافی شاپ </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible"
                                                     data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">محدوده قرارگیری</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('hoome')"
                                                                   onclick="doRangeFilter()" id="d1"/>
                                                            <label for="d1"><span></span>&nbsp;&nbsp; حومه شهر </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tarikhi')"
                                                                   onclick="doRangeFilter()" id="d2"/>
                                                            <label for="d2"><span></span>&nbsp;&nbsp; تاریخی </label>
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
                                                            <input type="checkbox" id="e1" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('parking')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e1"><span></span>&nbsp;&nbsp; پارکینگ </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="e2" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('club')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e2"><span></span>&nbsp;&nbsp; باشگاه ورزشی
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="e3" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('anten')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e3"><span></span>&nbsp;&nbsp; آنتن دهی موبایل
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="e4" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('masazh')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e4"><span></span>&nbsp;&nbsp; سالن ماساژ
                                                            </label>
                                                        </div>


                                                        <span onclick="showMoreItems()" class="moreItems">نمایش همه ی موارد</span>


                                                        <div class="ui_input_checkbox filterItem extraItem lhrFilter filter establishmentTypeFilters">
                                                            <input type="checkbox" id="e5" ng-disabled="isDisable()"
                                                                   ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('pool')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e5"><span></span>&nbsp;&nbsp; استخر </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="e6" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('tahviye')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e6"><span></span>&nbsp;&nbsp; تهویه مطبوع
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="e7" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('breakfast')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e7"><span></span>&nbsp;&nbsp; صبحانه مجانی
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="e8" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('mahali')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e8"><span></span>&nbsp;&nbsp; امکانات محلی
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="e9" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('maalool')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e9"><span></span>&nbsp;&nbsp; امکانات معلولان
                                                            </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="e10" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('internet')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e10"><span></span>&nbsp;&nbsp; اینترنت </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                            <input type="checkbox" id="e11" ng-disabled="isDisable()"
                                                                   ng-click="doFilterColor('swite')"
                                                                   onclick="doFacilitiesFilter()"/>
                                                            <label for="e11"><span></span>&nbsp;&nbsp; سوئیت دربست
                                                            </label>
                                                        </div>

                                                        <span onclick="showLessItems()"
                                                              class="lessItems hidden extraItem">پنهان سازی همه ی موارد</span>

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

    function selectingOrder(elem, type) {
        $(".orders").removeClass('selectOrder');
        elem.addClass('selectOrder');

        if (type == 'leastDist')
            sort = 'dist'
        else if (type == 'offer')
            sort = 'offer';
        else if (type == 'price')
            sort = 'price';
        else if (type == 'review')
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
                    } else if (placeMode == "amaken") {
                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    } else if (placeMode == "restaurant") {
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
                        } else if (placeMode == "amaken") {
                            $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                        } else if (placeMode == "restaurant") {
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
                            } else if (placeMode == "amaken") {
                                $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/amaken-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                            } else if (placeMode == "restaurant") {
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
        } else {
            $("#passengerNoSelectPane").addClass('hidden');
            $("#passengerArrowDown").removeClass('hidden');
            $("#passengerArrowUp").addClass('hidden');
            passengerNoSelect = false;
        }
    }

    function addClassHidden(element) {
        $("#" + element).addClass('hidden');
        if (element == 'passengerNoSelectPane') {
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
        while ((4 * room) < adult) {
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

        for (var i = 0; i < children; i++)
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
<div class="ui_backdrop dark" id="darkModeMainPage"></div>
</body>
</html>