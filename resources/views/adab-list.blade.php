<?php $placeMode = $selectedColor; ?>
<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    @if($selectedColor == "soghat")
        <title>لیست سوغات</title>
    @elseif($selectedColor == "sanaye")
        <title>لیست صنایع دستی</title>
    @else
        <title>لیست غذاهای محلی</title>
    @endif
    <style>
        .moreItems{
            display: block;
            text-align: center;
            margin-top: 5px;
            cursor: pointer;
        }
        .lessItems{
            display: block;
            text-align: center;
            margin-top: 5px;
            cursor: pointer;
        }
        .loader {
            background-image: url("{{URL::asset('images/loading.svg')}}");

            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body id="BODY_BLOCK_JQUERY_REFLOW" class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class=" hotels_lf_redesign ui_container is-mobile responsive_body">
        <div class="restaurants_list">
            <div ID="taplc_hotels_redesign_header_0" class="ppr_rup ppr_priv_hotels_redesign_header">
                <div id="hotels_lf_header" class="restaurants_list">
                    <div id="p13n_tag_header_wrap" class="tag_header p13n_no_see_through ontop hotels_lf_header_wrap">
                        <div id="p13n_tag_header" class="restaurants_list no_bottom_padding">
                            <div id="p13n_welcome_message" class="easyClear">
                                <h1 id="HEADING" class="p13n_geo_hotels">
                                    <span id="headerOfPage"></span>
                                    <span>
                                     استان
                                    {{$city}}
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="map_launch_stub"></div>
                </div>
            </div>
            <!--etk-->
        </div>
        <div  class="Restaurants prodp13n_jfy_overflow_visible">
            <div class="wrap"></div>
            <div id="BODYCON" ng-app="mainApp" class="col easyClear poolX adjust_padding new_meta_chevron_v2">
                <div class="tmHide">
                    <div id="HAC_INLINE_FRIEND_CONTENT_PLACEHOLDER"></div>
                </div>

                <div class="eateryOverviewContent">
                    <div class="ui_columns is-partitioned is-mobile">
                        <div class="ui_column is-9" ng-controller="PlaceController as cntr" style="direction: rtl;">
                            <div infinite-scroll="myPagingFunction()" class="coverpage">
                                <DIV class="ppr_rup ppr_priv_restaurants_coverpage_content">
                                    <div>
                                        <div class="prw_rup prw_restaurants_restaurants_coverpage_content">
                                            <div class="coverpage_widget">
                                                <div class="section">
                                                    <div class="single_filter_pois">
                                                        <div class="title ui_columns"><span class="titleWrap ui_column is-9"><a class="titleLink"></a></span><a class="view_all ui_column is-3" ></a></div>
                                                        <div ng-repeat="packet in packets" class="option">
                                                            <div class="Price_3 ui_columns is-mobile">
                                                                <div ng-repeat="place in packet.places" class="ui_column is-3">
                                                                    <div class="poi">
                                                                        <a href="[[place.redirect]]" class="thumbnail">
                                                                            <DIV class="prw_rup prw_common_centered_thumbnail" >
                                                                                <div class="sizing_wrapper" style="width:200px;height:120px;">
                                                                                    <div class="centering_wrapper" style="margin-top:-66px;">
                                                                                        <img ng-src='[[place.pic]]' width="100%" height="100%" class='photo_image' alt='[[place.name]]'>
                                                                                    </div>
                                                                                </div>
                                                                            </DIV>
                                                                        </a>
                                                                        <DIV class="prw_rup prw_meta_saves_badge">
                                                                            <div class="savesButton">
                                                                                <span class="saves-widget-button saves secondary save-location-5247712 ui_icon heart saves-icon-locator"></span>
                                                                            </div>
                                                                        </DIV>
                                                                        <div class="detail">
                                                                            <div class="item name " title="[[place.name]]"><a class="poiTitle" target="_blank" href="[[place.redirect]]">[[place.name]]</a></div>
                                                                            <div class="item rating-count">
                                                                                    <div class="rating-widget">
                                                                                        <DIV class="prw_rup prw_common_location_rating_simple">
                                                                                            <span class="[[place.ngClass]]"></span>
                                                                                        </DIV>
                                                                                    </div>
                                                                                    <a target="_blank" class="review_count" href="">[[place.avgRate]] <span style="color: #16174F;">نقد</span> </a>
                                                                                </div>
                                                                            <div class="booking"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                    <div class="coverpage_tracking"></div>
                                </div>
                            </div>
                        </div>
                        <div class="lhr ui_column is-3 hideCount reduced_height" style="direction: rtl;">
                            <style>
                                input[type="checkbox"], input[type="radio"]{
                                    display:none !important;
                                }

                                input[type="checkbox"] + label, input[type="radio"] + label{
                                    color:#666666;
                                }

                                input[type="checkbox"] + label span, input[type="radio"] + label span {
                                    display:inline-block;
                                    width:19px;
                                    height:19px;
                                    margin:-2px 10px 0 0;
                                    vertical-align:middle;
                                    background:url('{{URL::asset('images/check_radio_sheet.png')}}') left top no-repeat;
                                    cursor:pointer;
                                }

                                input[type="checkbox"]:checked + label span, input[type="radio"]:checked + label span{
                                    background:url('{{URL::asset('images/check_radio_sheet.png')}}') -19px top no-repeat;

                                }

                            </style>

                            <DIV class="ppr_rup ppr_priv_restaurant_filters">
                                <div class="verticalFilters placements">
                                    <div id="EATERY_FILTERS_CONT" class="eatery_filters" >
                                        <DIV class="prw_rup prw_restaurants_restaurant_filters">
                                            <div class="lhrFilterBlock jfy_filter_bar_selectedFilters selectedFilters" >
                                            </div>
                                        </div>

                                        <DIV class="prw_rup prw_restaurants_restaurant_filters" ng-controller="FilterController as filterCntl">
                                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">  مرتب سازی بر اساس</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="c22" value="rate"/>
                                                        <label for="c22"><span></span>&nbsp;&nbsp;امتیاز  </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="c23" value="review" />
                                                        <label for="c23"><span></span>&nbsp;&nbsp; تعداد نقد </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="sort" type="radio" id="c24" value="alphabet" />
                                                        <label for="c24"><span></span>&nbsp;&nbsp; الفبا </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="prw_rup prw_restaurants_restaurant_filters" ng-controller="ColorController as colorCntl">
                                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                <div class="filterGroupTitle">  دسته بندی</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="color" ng-click="filterColor($event)" value="sanaye" type="radio" id="c1"/>
                                                        <label for="c1"><span></span>&nbsp;&nbsp;صنایع دستی  </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="color" ng-click="filterColor($event)" value="ghazamahali" type="radio" id="c2"/>
                                                        <label for="c2"><span></span>&nbsp;&nbsp; غذای محلی </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        <input ng-model="color" ng-click="filterColor($event)" value="soghat" type="radio" id="c3" />
                                                        <label for="c3"><span></span>&nbsp;&nbsp; سوغات </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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
    <div class="ad iab_leaBoa adAlignNormal">
        <div id="gpt-ad-728x90-d" class="adInner gptAd"></div>
    </div>
    @include('layouts.placeFooter')
</div>
<div id="em-script"></div>
@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif


<script>
    var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    var filter = '{{$selectedColor}}';
    var page = 1;
    var placeMode = '{{$placeMode}}';
    var city = '{{$city}}';
    var floor = 1;
    var sort = "rate";
    var data;
    var init = true;
    var lock = false;

    $(document).ready(function(){
        @foreach($sections as $section)
            fillMyDivWithAdv('{{$section->sectionId}}', '{{$state->id}}');
        @endforeach
    });

    app.controller('FilterController', function ($scope, $rootScope) {

        $scope.sort = sort;

        $scope.$watch('sort', function (value) {

            if(value == null || sort == value || lock) {
                $scope.sort = sort;
                return;
            }

            sort = value;
            page = 1;
            floor = 1;
            init = true;
            $rootScope.$broadcast('myPagingFunctionAPI');
        });
    });



    app.controller('ColorController', function ($scope, $rootScope) {

        $scope.color = filter;

        $scope.filterColor = function (event) {

            var value = event.target.value;

            if(value == null || filter == value || lock) {
                $scope.color = filter;
                return;
            }

            filter = value;
            switch (filter) {
                case "soghat":
                    $("#headerOfPage").empty().append('سوغات');
                    break;
                case "sanaye":
                    $("#headerOfPage").empty().append('صنایع دستی');
                    break;
                case "ghazamahali":
                default:
                    $("#headerOfPage").empty().append('غذا محلی');
                    break;
            }
            init = true;
            page = 1;
            floor = 1;
            $rootScope.$broadcast('myPagingFunctionAPI');
        };
    });

    app.controller('PlaceController', function($scope, $http) {

        $scope.packets = [[]];
        $scope.oldScrollVal = 600;

        $scope.myPagingFunction = function () {

            var scroll = $(window).scrollTop();
            lock = true;

            if(scroll - $scope.oldScrollVal < 100 && !init)
                return;

            if(page == 1) {
                $scope.packets = [[]];
            }

            if(init)
                init = false;
            else
                $scope.oldScrollVal += scroll;

            $(".loader").removeClass('hidden');

            data = $.param({
                pageNum: page,
                sort: sort
            });

            var requestURL =  '{{route('home')}}' + '/getAdabListElems/' + city + "/" + filter;

            const config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            };

            $http.post(requestURL, data, config).then(function (response) {

                $scope.packets[page - 1] = response.data;
                $scope.packets[page - 1].places = response.data.places;

                for(j = 0; j < $scope.packets[page - 1].places.length; j++) {
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

                    $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/adab-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                }

                if(response.data.places.length != 4) {
                    $scope.$broadcast('finalizeReceive');
                    return;
                }

                data = $.param({
                    pageNum: ++page,
                    sort: sort
                });

                $http.post(requestURL, data, config).then(function (response) {

                    $scope.packets[page - 1] = response.data;
                    $scope.packets[page - 1].places = response.data.places;

                    for(j = 0; j < $scope.packets[page - 1].places.length; j++) {
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

                        $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/adab-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                    }

                    if(response.data.places.length != 4) {
                        $scope.$broadcast('finalizeReceive');
                        return;
                    }

                    data = $.param({
                        pageNum: ++page,
                        sort: sort,
                        color: filters
                    });

                    $http.post(requestURL, data, config).then(function (response) {

                        $scope.packets[page - 1] = response.data;
                        $scope.packets[page - 1].places = response.data.places;

                        for(j = 0; j < $scope.packets[page - 1].places.length; j++) {
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

                            $scope.packets[page - 1].places[j].redirect = '{{route('home') . '/adab-details/'}}' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
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

        $scope.$on('finalizeReceive', function () {

            page++;
            lock = false;
            $(".loader").addClass('hidden');
            floor = page;
        });

        $scope.$on('myPagingFunctionAPI', function (event) {
            $scope.myPagingFunction();
        });
    });
</script>

<script async>
    var mod;mod=angular.module("infinite-scroll",[]),mod.directive("infiniteScroll",["$rootScope","$window","$timeout",function(i,n,e){return{link:function(t,l,o){var r,c,f,a;return n=angular.element(n),f=0,null!=o.infiniteScrollDistance&&t.$watch(o.infiniteScrollDistance,function(i){return f=parseInt(i,10)}),a=!0,r=!1,null!=o.infiniteScrollDisabled&&t.$watch(o.infiniteScrollDisabled,function(i){return a=!i,a&&r?(r=!1,c()):void 0}),c=function(){var e,c,u,d;return d=n.height()+n.scrollTop(),e=l.offset().top+l.height(),c=e-d,u=n.height()*f>=c,u&&a?i.$$phase?t.$eval(o.infiniteScroll):t.$apply(o.infiniteScroll):u?r=!0:void 0},n.on("scroll",c),t.$on("$destroy",function(){return n.off("scroll",c)}),e(function(){return o.infiniteScrollImmediateCheck?t.$eval(o.infiniteScrollImmediateCheck)?c():void 0:c()},0)}}}])
</script>

<script>

    $('.login-button').click(function() {

        var url = '{{route('adabList', ['city' => $city])}}';

        $(".dark").show();
        showLoginPrompt(url);
    });

    function hideElement(val) {
        $("#" + val).addClass('hidden');
        $(".dark").hide();
    }

    function showElement(val) {
        $(".dark").show();
        $("#" + val).removeClass('hidden');
    }
</script>

<script src="{{URL::asset('js/adv.js')}}"></script>

<div class="ui_backdrop dark" style="display: none; z-index: 10000000"></div>
</body>
</html>