<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <meta property="og:type" content="website" />
    <title>
        کوچیتا |
        {{$kindPlace->title}}
        @if($mode != 'country')
            @if($mode == 'state')
                استان
            @else
                شهر
            @endif
            {{$city->name}}
        @else
            ایران من
        @endif
    </title>

    <meta name="title" content="{{$meta['title']}}" />
    <meta name='description' content='{{$meta['description']}}' />
    <meta name='keywords' content='{{$meta['keyword']}}' />
    <meta property="og:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:secure_url" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:width" content="550"/>
    <meta property="og:image:height" content="367"/>
    <meta name="twitter:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>

    <script src="{{URL::asset('js/angular.js')}}"></script>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/hotelLists.css')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/hotelDetail.css?v=2')}}' />

    <title>
        {{$kindPlace->name}}

        @if($mode != 'country')
            @if($mode == "state")
                استان
            @else
                شهر
            @endif
            {{$city->name}}
        @else
            ایران من
        @endif
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

@include('general.forAllPages')

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')

    @include('general.secondHeader')

    <div class=" hotels_lf_redesign ui_container responsive_body">
        
        <div style="height: 100px;">

            {{--@include('general.headerSearch')--}}
            <div class="placeListHeader">
                <div class="placeListTitle">
                    {{$kindPlace->title}}
                    @if($mode != 'country')
                        @if($mode == 'state')
                            استان
                        @else
                            شهر
                        @endif
                        {{$city->name}}
                    @else
                        ایران من
                    @endif
                </div>
                <div style="position: relative; top: -25px">
                    <div>
                        {{--<div id="helpBtnMainDiv" style="top: 0">--}}
                            {{--<a class="link">--}}
                                {{--<div class="circleBase type2 helpBtnIconMainDiv"></div>--}}
                                {{--<b>راهنمای صفحات</b>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        <div class="ui_button sharePageMainDiv" onclick="toggleShareIcon(this)">
                            <div class="sharePageIcon first"></div>
                            <div class="sharePageLabel">
                                اشتراک&zwnj;گذاری صفحه
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="Restaurants prodp13n_jfy_overflow_visible">

            <div class="wrap"></div>

            <div id="BODYCON" ng-app="mainApp">
                <div class="eateryOverviewContent">
                    <div class="ui_columns is-partitioned">
                        <div class="ui_column col-md-9 col-sm-8 PlaceController" ng-controller="PlaceController as cntr" style="direction: rtl; padding: 9px 24px;">
                            <div infinite-scroll="myPagingFunction()" class="coverpage">
                                <div class="ppr_rup ppr_priv_restaurants_coverpage_content">
                                    <div>
                                        <div class="prw_rup prw_restaurants_restaurants_coverpage_content">
                                            <div class="coverpage_widget">
                                                <div class="section">
                                                    <div class="single_filter_pois">
                                                        <div id="FilterTopController" class="title ui_columns hideOnPhone" style="border-bottom: 1px solid lightgray;">
                                                            <div class="ordering sorting" style="font-weight: bold">مرتب سازی بر
                                                                اساس:
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" onclick="selectingOrder($(this),'review')" id="z1">
                                                                    بیشترین نظر
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders selectOrder" onclick="selectingOrder($(this), 'rate')" id="z2">
                                                                    بهترین بازخورد
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" onclick="selectingOrder($(this), 'seen')" id="z3">
                                                                    بیشترین بازدید
                                                                </div>
                                                            </div>
                                                            <div class="ordering">
                                                                <div class="orders" onclick="selectingOrder($(this), 'alphabet')" id="z4" >
                                                                    حروف الفبا
                                                                </div>
                                                            </div>
                                                            @if($kindPlace->id != 10 && $kindPlace->id != 11)
                                                                <div class="ordering"  >
                                                                    <div id="distanceNav" class="orders" style="width: 140% !important;" onclick="openGlobalSearch(); selectingOrder($(this), 'distance')">کمترین فاصله تا
                                                                        <span id="selectDistance">__ __ __</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div  class="option">
                                                            <div class="row">
                                                                <div ng-repeat="place in packets" class="ui_column col-lg-3 col-md-4 col-xs-6 eachPlace">
                                                                    <div class="poi listBoxesMainDivs">
                                                                        <a href="[[place.redirect]]" class="thumbnail" style="margin-bottom: 5px !important;">
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
                                                                                [[place.reviews]]
                                                                                <span>نقد</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="item col-md-12 col-xs-6 itemState" style="float: right;">استان:
                                                                            <span>[[place.state]]</span>
                                                                        </div>
                                                                        <div class="item col-md-12 col-xs-6 itemState">شهر:
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
                        <div class="lhr ui_column col-md-3 col-sm-4 hideOnPhone" id="FilterController" ng-controller="FilterController" style="direction: rtl; padding: 10px;">
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
                                                    <div class="filterShow" style="display: flex; flex-direction: row; flex-wrap: wrap;"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">جستجو‌ی نام</div>
                                                <input id="nameSearch" class="hl_inputBox" placeholder="جستجو کنید" onchange="nameFilterFunc(this.value)">
                                            </div>
                                        </div>
                                        <div class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters"
                                                 class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">امتیاز کاربران</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="filterItem lhrFilter filter selected">
                                                        <input onclick="rateFilterFunc(5)" type="radio" name="AVGrate" id="c5" value="5"/>
                                                        <label for="c5"
                                                               style="display:inline-block;"><span></span></label>
                                                        <div class="rating-widget"
                                                             style="font-size: 1.2em; display: inline-block">
                                                            <div class="prw_rup prw_common_location_rating_simple">
                                                                <span class="ui_bubble_rating bubble_50"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="filterItem lhrFilter filter selected">
                                                        <input  onclick="rateFilterFunc(4)" type="radio" name="AVGrate" id="c4" value="4"/>
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
                                                    <div class="filterItem lhrFilter filter selected">
                                                        <input onclick="rateFilterFunc(3)" type="radio" name="AVGrate" id="c3" value="3"/>
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
                                                    <div class="filterItem lhrFilter filter selected">
                                                        <input onclick="rateFilterFunc(2)" type="radio" name="AVGrate" id="c2" value="2"/>
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
                                                    <div class="filterItem lhrFilter filter selected">
                                                        <input onclick="rateFilterFunc(1)" type="radio" name="AVGrate" id="c1" value="1"/>
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
                                        @elseif($kindPlace->id == 10)
                                            @include('places.list.filters.sogatSanaieFilters')
                                        @elseif($kindPlace->id == 11)
                                            @include('places.list.filters.mahaliFoodFilters')
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
                                                            <div class="filterItem lhrFilter filter selected">
                                                                <input ng-disabled="isDisable()" onclick="doFilterFeature({{$feature->subFeat[$i]->id}})" type="checkbox" id="feat{{$feature->subFeat[$i]->id}}" value="{{$feature->subFeat[$i]->name}}"/>
                                                                <label for="feat{{$feature->subFeat[$i]->id}}"><span></span>&nbsp;&nbsp;{{$feature->subFeat[$i]->name}}  </label>
                                                            </div>
                                                        @endfor

                                                        @if(count($feature->subFeat) > 5)
                                                            @for($i = 5; $i < count($feature->subFeat); $i++)
                                                                <div class="filterItem lhrFilter filter extraItem{{$feature->id}}">
                                                                    <input ng-disabled="isDisable()" onclick="doFilterFeature({{$feature->subFeat[$i]->id}})" type="checkbox" id="feat{{$feature->subFeat[$i]->id}}" value="{{$feature->subFeat[$i]->name}}"/>
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

    @include('hotelDetailsPopUp')

    @include('layouts.placeFooter')
</div>

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

    @if(isset($city->id))
        var cityId = '{{$city->id}}';
    @else
        var cityId = 0;
    @endif

    if(placeMode == 'hotel'){
        specialFilters = [{
            'kind' : 'kind_id',
            'value' : 1
        }];
    }

    function selectingOrder(elem, type) {
        $(".orders").removeClass('selectOrder');
        $("#selectDistance").text('__ __ __');
        $("#selectDistanceMobile").text('__ __ __');
        elem.addClass('selectOrder');
        sort = type;

        if(type != 'distance')
            newSearch();
    }


    app.controller('FilterController', function ($scope, $rootScope) {

        $scope.isDisable = function () {
            return lock;
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
        $scope.packets = [];
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
                $scope.packets = [];

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
                city: cityId,
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

                for(j = 0; j < response.data.places.length; j++){
                    var k = $scope.packets.length;
                    $scope.packets[$scope.packets.length] = response.data.places[j];

                    $scope.packets[k].ngClass = 'ui_bubble_rating bubble_' + $scope.packets[k].avgRate + '0';
                    if($scope.packets[k].inTrip == 1)
                        $scope.packets[k].inTrip = 'red-heart-fill';
                    else
                        $scope.packets[k].inTrip = '';
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
                    city: cityId,
                    mode: '{{$mode}}',
                    kindPlaceId: '{{$kindPlace->id}}'
                });
                $http.post(requestURL, data, config).then(function (response) {
                    if (response.data != null && response.data.places != null && response.data.places.length > 0)
                        $scope.show = true;

                    for(j = 0; j < response.data.places.length; j++){
                        var k = $scope.packets.length;
                        $scope.packets[$scope.packets.length] = response.data.places[j];

                        $scope.packets[k].ngClass = 'ui_bubble_rating bubble_' + $scope.packets[k].avgRate + '0';
                        if($scope.packets[k].inTrip == 1)
                            $scope.packets[k].inTrip = 'red-heart-fill';
                        else
                            $scope.packets[k].inTrip = '';
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
                        city: cityId,
                        mode: '{{$mode}}',
                        kindPlaceId: '{{$kindPlace->id}}'
                    });

                    $http.post(requestURL, data, config).then(function (response) {

                        if (response.data != null && response.data.places != null && response.data.places.length > 0)
                            $scope.show = true;


                        for(j = 0; j < response.data.places.length; j++){
                            var k = $scope.packets.length;
                            $scope.packets[$scope.packets.length] = response.data.places[j];

                            $scope.packets[k].ngClass = 'ui_bubble_rating bubble_' + $scope.packets[k].avgRate + '0';
                            if($scope.packets[k].inTrip == 1)
                                $scope.packets[k].inTrip = 'red-heart-fill';
                            else
                                $scope.packets[k].inTrip = '';
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

    function doKindFilter(_kind, _value){

        var is = false;

        for(var i = 0; i < specialFilters.length; i++){
            //this if for radioboxes
            if((_kind == 'eatable' && specialFilters[i]['kind'] == 'eatable') || (_kind == 'fragile' && specialFilters[i]['kind'] == 'fragile') || (_kind == 'hotOrCold' && specialFilters[i]['kind'] == 'hotOrCold')){
                specialFilters[i] = 0;
                break;
            }
            else if(specialFilters[i]['kind'] == _kind && specialFilters[i]['value'] == _value){
                specialFilters[i] = 0;
                is = true;
                break;
            }
        }

        if(!is){
            var findZero = false;
            for(i = 0; i < specialFilters.length; i++){
                if(specialFilters[i] == 0){
                    findZero = i+1;
                    break;
                }
            }

            if(!findZero)
                findZero = specialFilters.length + 1;

            specialFilters[findZero - 1] = {
                'kind' : _kind,
                'value' : _value
            };
        }

        if(placeMode == 'sogatSanaies')
            onlyForSogatSanaie(); // in sogatSanaieFilters
        else
            newSearch();
    }

    function rateFilterFunc(value){
        rateFilter = value;
        newSearch();
    }

    function doFilterFeature(value){
        if(featureFilter.includes(value))
            featureFilter[featureFilter.indexOf(value)] = 0;
        else{
            if(featureFilter.includes(0))
                featureFilter[featureFilter.indexOf(0)] = value;
            else
                featureFilter[featureFilter.length] = value;
        }

        newSearch();
    }

    function createFilter(){
        var text = '';
        $('.filterShow').html('');
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
                text += '<div class="filtersExist">\n' +
                        '<div>' + name + '</div>\n' +
                        '<div onclick="cancelFeatureFilter(' + featureFilter[i] + ')" class="icons iconClose filterCloseIcon"></div>\n' +
                        '</div>';
            }
        }

        for(i = 0; i < specialFilters.length; i++){
            if(specialFilters[i] != 0) {
                var name = document.getElementById(specialFilters[i]['kind'] + specialFilters[i]['value']).value;
                text += '<div class="filtersExist">\n' +
                        '<div>' + name + '</div>\n' +
                        '<div onclick="cancelKindFilter(\'' + specialFilters[i]['kind'] + '\', \'' + specialFilters[i]['value'] + '\')" class="icons iconClose filterCloseIcon"></div>\n' +
                        '</div>';
            }
        }

        $('.filterShow').html(text);
    }

    function cancelKindFilter(_kind, _value, _ref = 'refresh'){
        if(_kind == 0 && _value == 0){
            for(i = 0; i< specialFilters.length; i++){
                if(specialFilters[i] != 0)
                    $('.' + specialFilters[i]['kind'] + specialFilters[i]['value']).prop("checked", false);
            }
            specialFilters = [];
        }
        else {
            for(var i = 0; i < specialFilters.length; i++){
                if(specialFilters[i]['kind'] == _kind && specialFilters[i]['value'] == _value) {
                    $('.' + specialFilters[i]['kind'] + specialFilters[i]['value']).prop("checked", false);
                    specialFilters[i] = 0;
                    break;
                }
            }
        }

        if(placeMode == 'sogatSanaies' && _kind == 'eatable')
            specialCancelSogataSanaiesFilters();
        else if(_ref == 'refresh')
            newSearch();
    }

    function cancelRateFilter(kind = 'refresh'){
        for(i = 1; i < 6; i++) {
            document.getElementById('c' + i).checked = false;
            document.getElementById('p_c' + i).checked = false;
        }

        rateFilter = 0;
        if(kind == 'refresh')
            newSearch();
    }

    function cancelFeatureFilter(id, kind = 'refresh'){
        if(id == 0){
            for(i = 0; i< featureFilter.length; i++){
                if(featureFilter[i] != 0) {
                    $('#feat' + featureFilter[i]).prop("checked", false);
                    $('#p_feat' + featureFilter[i]).prop("checked", false);
                }
            }
            featureFilter = [];
        }
        else {
            if (featureFilter.includes(id)) {
                featureFilter[featureFilter.indexOf(id)] = 0;
                $('#feat' + id).prop("checked", false);
                $('#p_feat' + id).prop("checked", false);
            }
        }

        if(kind == 'refresh')
            newSearch();
    }

    function cancelNameFilter(){
        document.getElementById('nameSearch').value = '';
        document.getElementById('p_nameSearch').value = '';
        nameFilterFunc('');
    }

    function closeFilters(){
        cancelRateFilter('noRef');
        cancelFeatureFilter(0, 'noRef');
        cancelKindFilter(0, 0, 'noRef');
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
                    'selectedCities': cityId,
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
        $('#selectDistanceMobile').text(name);

        closeSearchInput();

        sort = 'distance';
        newSearch();
    }

    function newSearch(){
        page = 1;
        floor = 1;
        init = true;
        isFinish = false;
        inSearch = false;

        angular.element($('.PlaceController')).scope().myPagingFunction();
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


</body>
</html>