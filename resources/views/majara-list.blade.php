<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/majara.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}"/>
    <title>لیست اماکن</title>

</head>
<body id="BODY_BLOCK_JQUERY_REFLOW" class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class=" hotels_lf_redesign ui_container is-mobile responsive_body">
        <div class="restaurants_list">
            <DIV class="ppr_rup ppr_priv_hotels_redesign_header">
                <div class="restaurants_list">
                    <div class="tag_header p13n_no_see_through ontop hotels_lf_header_wrap">
                        <div class="restaurants_list no_bottom_padding">
                            <div class="easyClear">
                                <h1 id="HEADING" class="p13n_geo_hotels ">
                                    ماجراهای

                                    @if($mode == "state")
                                        استان
                                    @else
                                        شهر
                                    @endif
                                    {{$city}}
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="map_launch_stub"></div>
                </div>
            </DIV>
            <!--etk-->
        </div>
        <div  class="Restaurants prodp13n_jfy_overflow_visible">
            <div class="wrap"></div>
            <div id="BODYCON" ng-app="mainApp" class="col easyClear poolX adjust_padding new_meta_chevron_v2">
                <div class="tmHide">
                    <div id="HAC_INLINE_FRIEND_CONTENT_PLACEHOLDER"></div>
                </div>

                <form method="post" action="{{route('majaraList', ['city' => $city, 'mode' => $mode])}}">
                    {{csrf_field()}}
                    <div class="eateryOverviewContent">
                        <div class="ui_columns is-partitioned is-mobile">
                            <div class="ui_column is-9 direction-rtl" ng-controller="PlaceController as cntr">
                                <div infinite-scroll="myPagingFunction()" class="coverpage">
                                    <DIV class="ppr_rup ppr_priv_restaurants_coverpage_content">
                                        <div>
                                            <DIV class="prw_rup prw_restaurants_restaurants_coverpage_content">
                                                <div class="coverpage_widget">
                                                    <div class="section">
                                                        <div class="single_filter_pois">
                                                            <div class="title ui_columns">
                                                                <span class="titleWrap ui_column is-9">
                                                                    <a class="titleLink"></a>
                                                                </span>
                                                                <a class="view_all ui_column is-3" ></a>
                                                            </div>
                                                            <div ng-repeat="packet in packets" class="option">
                                                                <div class="Price_3 ui_columns is-mobile">
                                                                    <div ng-repeat="place in packet.places" class="ui_column is-3">
                                                                        <div class="poi">
                                                                            <a href="[[place.redirect]]" class="thumbnail">
                                                                                <DIV class="prw_rup prw_common_centered_thumbnail" >
                                                                                    <div class="sizing_wrapper width-200 height-120">
                                                                                        <div class="centering_wrapper mg-tp--66">
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
                                                                                    <a target="_blank" class="review_count dark-blueImp" href="">[[place.avgRate]]
                                                                                        <span class="dark-blue">نقد</span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="item">استان: [[place.state]]</div>
                                                                                <div class="item">شهر: [[place.city]]</div>
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
                                            </DIV>
                                        </div>
                                        <div class="coverpage_tracking"></div>
                                    </DIV>
                                </div>
                            </div>
                            <div id="LHR" class="lhr ui_column is-3 hideCount reduced_height direction-rtl">
                                <div class="ppr_rup ppr_priv_restaurant_filters">
                                    <div class="verticalFilters placements">
                                        <div class="eatery_filters" >
                                            <DIV class="prw_rup prw_restaurants_restaurant_filters">
                                            </DIV>
                                            <DIV ng-controller="FilterController as filterCntr" class="prw_rup prw_restaurants_restaurant_filters">
                                                <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle">  مرتب سازی بر اساس</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input ng-model="sort" type="radio" id="c22" value="rate" />
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
                                            </DIV>

                                            <DIV ng-controller="ColorController as colorCntr" class="prw_rup prw_restaurants_restaurant_filters">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                    <div class="filterGroupTitle">  دسته بندی</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('manategh')" id="c1" />
                                                            <label for="c1"><span></span>&nbsp;&nbsp; مناطق</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">

                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('kooh')" id="c2"/>
                                                            <label for="c2"><span></span>&nbsp;&nbsp; کوه</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('darya')" id="c3"/>
                                                            <label for="c3"><span></span>&nbsp;&nbsp; دریا</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('daryache')" id="c4"/>
                                                            <label for="c4"><span></span>&nbsp;&nbsp; دریاچه</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('hayatevahsh')" id="c5"/>
                                                            <label for="c5"><span></span>&nbsp;&nbsp; حیات وحش</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('shahri')" id="c6"/>
                                                            <label for="c6"><span></span>&nbsp;&nbsp; شهری</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('hefazat')" id="c7"/>
                                                            <label for="c7"><span></span>&nbsp;&nbsp; حفاظت</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('kavir')" id="c8"/>
                                                            <label for="c8"><span></span>&nbsp;&nbsp; کویر</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('raml')" id="c9"/>
                                                            <label for="c9"><span></span>&nbsp;&nbsp; رمل</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('jangal')" id="c10"/>
                                                            <label for="c10"><span></span>&nbsp;&nbsp; جنگل</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('kamp')" id="c11"/>
                                                            <label for="c11"><span></span>&nbsp;&nbsp; کمپ</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('koohnavardi')" id="c12"/>
                                                            <label for="c12"><span></span>&nbsp;&nbsp; کوه نوردی</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('abshar')" id="c13"/>
                                                            <label for="c13"><span></span>&nbsp;&nbsp; آبشار</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('darre')" id="c14"/>
                                                            <label for="c14"><span></span>&nbsp;&nbsp; دره</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('piknik')" id="c15"/>
                                                            <label for="c15"><span></span>&nbsp;&nbsp; پیک نیک</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('bekr')" id="c16"/>
                                                            <label for="c16"><span></span>&nbsp;&nbsp; بکر</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('dasht')" id="c17"/>
                                                            <label for="c17"><span></span>&nbsp;&nbsp; دشت</label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox"  ng-disabled="isDisable()" ng-click="doFilter('sahranavardi')" id="c18"/>
                                                            <label for="c18"><span></span>&nbsp;&nbsp; صحرانوردی</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </DIV>

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
                </form>
            </div>
            <div class="clearFix"></div>
            <div id='lazyload_1836056822_32'>
            </div>
        </div>
    </div>
    <div class="ad iab_leaBoa adAlignNormal">
        <div id="gpt-ad-728x90-d" class="adInner gptAd"></div>
    </div>
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

    var colors = [];
    var page = 1;
    var floor = 1;
    var sort = "rate";
    var data;
    var init = true;
    var lock = false;

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

        $scope.isDisable = function() {
            return lock;
        };

        $scope.doFilter = function (value) {

            var i;

            for(i = 0; i < colors.length; i++) {
                if(colors[i] == value) {
                    colors.splice(i);
                    break;
                }
            }

            if(i == colors.length)
                colors[i] = value;

            page = 1;
            floor = 1;
            init = true;

            $rootScope.$broadcast('myPagingFunctionAPI');
        };
    });

    app.controller('PlaceController', function($scope, $http) {

        $scope.packets = [[]];
        $scope.oldScrollVal = 600;

        $scope.myPagingFunction = function () {

            var scroll = $(window).scrollTop();

            if(scroll - $scope.oldScrollVal < 100 && !init)
                return;

            lock = true;
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
                sort: sort,
                color: colors
            });

            var requestURL =  '{{route('getMajaraListElems', ['city' => $city, 'mode' => $mode])}}';

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

                    $scope.packets[page - 1].places[j].redirect = '{{route('home')}}' + '/majara-details/' + $scope.packets[page - 1].places[j].id + '/' + $scope.packets[page - 1].places[j].name;
                }

                if(response.data.places.length != 4) {
                    $scope.$broadcast('finalizeReceive');
                    return;
                }

                data = $.param({
                    pageNum: ++page,
                    sort: sort,
                    color: colors
                });

                $http.post(requestURL, data, config).then(function (response) {

                    $scope.packets[page - 1] = response.data;
                    $scope.packets[page - 1].places = response.data.places;

                    if(response.data.places.length != 4) {
                        $scope.$broadcast('finalizeReceive');
                        return;
                    }

                    data = $.param({
                        pageNum: ++page,
                        sort: sort,
                        color: colors
                    });

                    $http.post(requestURL, data, config).then(function (response) {

                        $scope.packets[page - 1] = response.data;
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

        var url = '{{route('majaraList', ['city' => $city, 'mode' => $mode])}}';

        $(".dark").show();
        showLoginPrompt(url);
    });

    $(document).ready(function() {

        @foreach($sections as $section)
            fillMyDivWithAdv('{{$section->sectionId}}', '{{$state->id}}');
        @endforeach

        $("#global-nav-hotels").attr('href', '{{route('majaraList', ['city' => $city, 'mode' => $mode])}}');
        $("#global-nav-restaurants").attr('href', '{{route('majaraList', ['city' => $city, 'mode' => $mode])}}');
        $("#global-nav-amaken").attr('href', '{{route('majaraList', ['city' => $city, 'mode' => $mode])}}');
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

<script src="{{URL::asset('js/adv.js')}}"></script>

<div class="ui_backdrop dark display-none z-index-100"></div>
</body>
</html>