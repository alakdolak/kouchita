<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.topHeader')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>--}}
    <script src="{{URL::asset('js/angular.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <title>صفحه اصلی</title>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>

{{--    <link rel="manifest" href="{{URL::asset('offlineMode/manifest.json')}}">--}}

    <script>
        var searchDir = '{{route('totalSearch')}}';
        var kindPlaceId = '{{$kindPlaceId}}';
        var getStates = '{{route('getStates')}}';
        var getGoyesh = '{{route('getGoyesh')}}';
        var url;

        @if($placeMode == "hotel")
            url = '{{route('main')}}';
        @elseif($placeMode == "restaurant")
            url = '{{route('mainMode', ['mode' => 'restaurant'])}}';
        @else
            url = '{{route('mainMode', ['mode' => 'amaken'])}}';
        @endif
    </script>

    <style>
        .mainBannerSlider {
            position: absolute;
            top: 0;
            width: 100%;
            height: 450px;
            margin-bottom: 40px;
        }

        .eachPicOfSlider {
            width: 100%;
        }

        .textInSlideMain {
            position: absolute;
            left: 0px;
            bottom: 0px;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.6) 0%, transparent 70%);
        }

        .textInSlide {
            position: absolute;
            left: 10px;
            bottom: 10px;
            padding: 30px;
            font-size: 20px;
        }

        .stateName {
            font-size: 12px;
            padding-right: 21px;
        }
    </style>

    {{--urls--}}
    <script>
        var recentlyUrl =  '{{route("recentlyViewed")}}';
        var getMainPageSuggestion =  '{{route("getMainPageSuggestion")}}';
        var imageBasePath = '{{URL::asset('images')}}';
        var getLastRecentlyMainPath = '{{route('getLastRecentlyMain')}}';
        var getAdviceMainPath = '{{route('getAdviceMain')}}';
        var getHotelsMainPath = '{{route('getHotelsMain')}}';
        var getAmakensMainPath = '{{route('getAmakensMain')}}';
        var getRestaurantsMainPath = '{{route('getRestaurantsMain')}}';
        {{--var getFoodsMainPath = '{{route('getFoodsMain')}}';--}}
        var getCitiesDir = "{{route('getCitiesDir')}}";

        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        };
    </script>

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging" ng-app="mainApp">

    @include('general.globalInput')

    <div class="header hideOnPhone">
        @include('layouts.header1')
    </div>

    <div class="hideOnScreen">
        @include('layouts.header1Phone')
    </div>

{{--        <div class="page" ng-app="mainApp">--}}
    <div class="ppr_rup ppr_priv_homepage_hero ">
        <div id="homeHero-id" class="homeHero default_home">
            <div class="ui_container container" id="mainDivContainerMainPage">
                <div class="placement_wrap">
                    <div class="placement_wrap_row">
                        <div class="placement_wrap_cell">
                            {{--<div id="sliderBarDIV" class="ppr_rup ppr_priv_trip_search hideOnPhone">--}}
                            <div class="ppr_rup ppr_priv_trip_search mainBannerSlider">
                                <!-- Swiper -->
                                <div id="mainSlider" class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($sliderPic as $item)
                                            <div class="swiper-slide" style="position: relative">
                                                <img class="eachPicOfSlider" src="{{URL::asset('_images/sliderPic/' . $item->pic)}}" alt="{{$item->alt}}">
                                                @if($item->text != null && $item->text != '')
                                                    <div class="textInSlide" style="background-color: {{$item->textBackground}}; color: {{$item->textColor}};">
                                                        {{$item->text}}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="ui_columns datepicker_box trip_search metaDatePicker rounded_lockup usePickerTypeIcons preDates noDates with_children mainDivSearchInputMainPage">
                                    <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column is-4 search_typeahead wctx-tripsearch searchDivForScrollClass mainSearchDivPcSize">
                                        @if($kindPlaceId == 0)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">به کجا می‌روید؟</div>
                                        @elseif($kindPlaceId == 1)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام جاذبه را می‌خواهید تجربه کنید؟</div>
                                        @elseif($kindPlaceId == 3)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">در کدام رستوران دوست دارید غذا بخورید؟</div>
                                        @elseif($kindPlaceId == 4)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">در کدام هتل دوست دارید اقامت کنید؟</div>
                                        @elseif($kindPlaceId == 6)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام ماجرا را می‌خواهید تجربه کنید؟</div>
                                        @elseif($kindPlaceId == 10)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام صنایع دستی را دوست دارید بشناسید؟</div>
                                        @elseif($kindPlaceId == 11)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام غذای محلی را می‌خواهید تجربه کنید؟</div>
                                        @endif
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                            <div class="ppr_rup ppr_priv_trip_search display-none hideOnScreen">
                                <!-- Swiper -->
                                <div id="mainSlider" class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($sliderPic as $item)
                                            <div class="swiper-slide">
                                                <img class="eachPicOfSlider" src="{{URL::asset('_images/sliderPic/' . $item->pic)}}" alt="{{$item->alt}}">
                                            </div>
                                            @if($item->text != null && $item->text != '')
                                                <div class="textInSlide" style="background-color: {{$item->textBackground}}; color: {{$item->textColor}};">
                                                    {{$item->text}}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.middleBanner')

    @include('layouts.placeFooter')

    @if(!Auth::check())
        @include('layouts.loginPopUp')
    @endif

    <span id="searchPane" class="statePane ui_overlay ui_modal editTags hidden searchPanes">
        <div id="searchDivForScroll" class="prw_rup prw_search_typeahead spSearchDivForScroll">
            <div class="ui_picker">
                <div class="typeahead_align ui_typeahead full-width display-flex">

                    @if($placeMode == 'hotel')
                        <div class="spGoWhere">در کدام هتل</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="دوست دارید اقامت کنید؟"/>
                    @elseif($placeMode == 'amaken')
                        <div class="spGoWhere">کدام جاذبه</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="را می‌خواهید تجربه کنید؟"/>
                    @elseif($placeMode == 'restaurant')
                        <div class="spGoWhere">در کدام رستوران</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="دوست دارید غذا بخورید؟"/>
                    @elseif($placeMode == 'mahaliFood')
                        <div class="spGoWhere">کدام غذای محلی</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="را می‌خواهید تجربه کنید؟"/>
{{--                    @elseif($placeMode == 'majara')--}}
{{--                        <div class="spGoWhere"></div>--}}
{{--                        <input onkeyup="search(event, this.value)" type="text" id="placeName"--}}
{{--                               class="typeahead_input searchPaneInput" placeholder="دوست دارید به کدام هتل کنید؟"/>--}}
                    @elseif($placeMode == 'sogatsanaie')
                        <div class="spGoWhere">کدام صنایع‌دستی</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="را دوست دارید بشناسید؟"/>
                    @else
                        <div class="spGoWhere">به کجا</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="دوست دارید سفر کنید؟"/>
                    @endif

                    <input type="hidden" id="placeId">
                </div>
                <div class="spBorderBottom"></div>
                <div class="mainContainerSearch">

                    <div id="result" class="data_holder display-noneImp"></div>

                        <div class="visitSuggestionDiv" ng-app="mainApp" ng-controller="recentlyShowController">
                            @if(Auth::check())
                                <div class="visitSuggestionText">بازدید های اخیر شما</div>
                            @else
                                <div class="visitSuggestionText">پر بازدیدترین های هفته</div>
                            @endif
                            <div id="recentlyRow1" class="visitSuggestion4Box">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget spBoxOfSuggestion" ng-repeat="place in records1">
                                    <div class="poi">
                                        <a href="[[place.placeRedirect]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper spImageWrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.placeName]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail direction-rtl" style="padding: 4px 0px 10px 0px;">
                                            <div class="item tags ng-binding" style="color: black; margin: 0px">[[place.placeName]]</div>
                                            <div class="item tags ng-binding" style="font-size: 9px; padding: 0px">[[place.placeCity]] در [[place.placeState]]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
        <div onclick="$('#searchPane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <span id="statePane1" class="statesearchDivForScrollPane ui_overlay ui_modal editTags hidden pop-up-Panes">
        <div class="header_text">استان مورد نظر</div>
        <div class="subheader_text">
       استان مورد نظر خود را از بین استان های موجود انتخاب کنید
        </div>
        <div class="body_text">

            <select id="states"></select>

            <div class="submitOptions">
                <button onclick="document.location.href = $('#states').val()" class="btn btn-success">تایید</button>
                <input type="submit" onclick="$('.dark').hide(); $('#statePane1').addClass('hidden')" value="خیر"
                       class="btn btn-default">
            </div>
        </div>
        <div onclick="$('#statePane1').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <span id="statePane2" class="statePane ui_overlay ui_modal editTags hidden pop-up-Panes">
        <div class="header_text">شهر مورد نظر</div>
        <div class="subheader_text">
       شهر مورد نظر خود را از بین شهر های موجود انتخاب کنید
        </div>
        <div class="body_text">

            <select onchange="getCities()" id="states2"></select>

            <select id="cities"></select>

            <div class="submitOptions">
                <button onclick="document.location.href = $('#cities').val()" class="btn btn-success">تایید</button>
                <input type="submit" onclick="$('.dark').hide(); $('#statePane2').addClass('hidden')" value="خیر"
                       class="btn btn-default">
            </div>
        </div>
        <div onclick="$('#statePane2').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <span id="goyeshPane" class="ui_overlay ui_modal editTags hidden pop-up-Panes">
        <div class="header_text">گویش مورد نظر</div>
        <div class="subheader_text">
       گویش مورد نظر خود را از بین گویش های موجود انتخاب کنید
        </div>
        <div class="body_text">

            <select id="goyesh"></select>

            <div class="submitOptions">
                <button onclick="document.location.href = $('#goyesh').val()" class="btn btn-success">تایید</button>
                <input type="submit" onclick="$('.dark').hide(); $('#goyeshPane').addClass('hidden')" value="خیر"
                       class="btn btn-default">
            </div>
        </div>
        <div onclick="$('#goyeshPane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <div class="ui_backdrop dark" id="darkModeMainPage"></div>

{{--@include('errors.alerts')--}}

<script defer>
    var passenger = 0;

    function redirect() {
        "" != $("#placeId").val() && (document.location.href = $("#placeId").val())
    }

    function search(e, val = '') {

        if (val == '')
            val = $("#placeName").val();

        $(".suggest").css("background-color", "transparent").css("padding", "0").css("border-radius", "0");
        if (null == val || "" == val || val.length < 2) {
            $('#result').addClass('display-noneImp');
            $("#result").empty();
        }
        else {
            var scrollVal = $("#searchDivForScroll").scrollTop();

            if (13 == e.keyCode && -1 != currIdx) {
                $("#placeId").val(suggestions[currIdx].url);
                return redirect();
            }

            if (13 == e.keyCode && -1 == currIdx && suggestions.length > 0) {
                $("#placeId").val(suggestions[0].url);
                return redirect();
            }

            if (40 == e.keyCode) {
                if (currIdx + 1 < suggestions.length) {
                    currIdx++;
                    $("#searchDivForScroll").scrollTop(scrollVal + 25);
                }
                else {
                    currIdx = 0;
                    $("#searchDivForScroll").scrollTop(0);
                }

                if (currIdx >= 0 && currIdx < suggestions.length) {
                    $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px");
                }

                return;
            }
            if (38 == e.keyCode) {
                if (currIdx - 1 >= 0) {
                    currIdx--;
                    $("#searchDivForScroll").scrollTop(scrollVal - 25);
                }
                else {
                    currIdx = suggestions.length - 1;
                    $("#searchDivForScroll").scrollTop(25 * suggestions.length);
                }

                if (currIdx >= 0 && currIdx < suggestions.length)
                    $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px");
                return;
            }

            if ("ا" == val[0]) {
                for (val2 = "آ", i = 1; i < val.length; i++) val2 += val[i];
                $.ajax({
                    type: "post",
                    url: searchDir,
                    data: {
                        kindPlaceId: "{{$kindPlaceId}}",
                        key: val,
                        key2: val2,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {

                        newElement = "";

                        if (response.length == 0) {
                            newElement = "موردی یافت نشد";
                            $("#placeId").val("");
                            return;
                        }

                        response = JSON.parse(response);
                        currIdx = -1;
                        suggestions = response;

                        for (i = 0; i < response.length; i++) {
                            if ("state" == response[i].mode) {
                                newElement += '<div class="icons location spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                            }
                            else if ("city" == response[i].mode) {
                                newElement += '<div class="icons location spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")' style='margin: 0px'>شهر " + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'amaken') {
                                newElement += '<div class="icons touristAttractions spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'restaurant') {
                                newElement += '<div class="icons restaurantIcon spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'hotel') {
                                newElement += '<div class="icons hotelIcon spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'sogatSanaies') {
                                newElement += '<div class="icons souvenirIcon spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'mahaliFood') {
                                newElement += '<div class="icons traditionalFood spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'majara') {
                                newElement += '<div class="icons adventure spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                        }

                        if (response.length != 0) {
                            $('#result').removeClass('display-noneImp')
                        }
                        else {
                            $('#result').addClass('display-noneImp');
                        }

                        $("#result").empty().append(newElement)
                    }
                })
            }
            else $.ajax({
                type: "post",
                url: searchDir,
                data: {
                    kindPlaceId: "{{$kindPlaceId}}",
                    key: val,
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {

                    newElement = "";

                    if (response.length == 0) {
                        newElement = "موردی یافت نشد";
                        $("#placeId").val("");
                        return;
                    }

                    response = JSON.parse(response);
                    currIdx = -1;
                    suggestions = response;

                    for (i = 0; i < response.length; i++) {
                        if (response[i].mode == "state") {
                            newElement += '<div class="icons location spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                        }
                        else if (response[i].mode == "city") {
                            newElement += '<div class="icons location spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")' style='margin: 0px'>شهر " + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'amaken') {
                            newElement += '<div class="icons touristAttractions spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'restaurant') {
                            newElement += '<div class="icons restaurantIcon spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'hotel') {
                            newElement += '<div class="icons hotelIcon spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'sogatSanaies') {
                            newElement += '<div class="icons souvenirIcon spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'mahaliFood') {
                            newElement += '<div class="icons traditionalFood spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'majara') {
                            newElement += '<div class="icons adventure spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                    }

                    if (response.length != 0) {
                        $('#result').removeClass('display-noneImp')
                    }
                    else {
                        $('#result').addClass('display-noneImp');
                    }

                    $("#result").empty().append(newElement)
                }
            })
        }

    }

    function setInput(e, t) {
        $("#placeName").val(t), $("#placeId").val(e), $("#result").empty(), redirect()
    }

    {{--function chooseState(e) {--}}
    {{--    $.ajax({--}}
    {{--        type: "post", url: getStates, success: function (t) {--}}
    {{--            for (t = JSON.parse(t), newElement = "", i = 0; i < t.length; i++) newElement += "<option value='{{route('home') . '/adab-list/'}}" + t[i].name + "/" + e + "'>" + t[i].name + "</option>";--}}
    {{--            $("#states").empty().append(newElement), $("#statePane").removeClass("hidden"), $(".dark").show()--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    {{--function chooseStateAmaken() {--}}
    {{--    $.ajax({--}}
    {{--        type: "post", url: getStates, success: function (e) {--}}
    {{--            for (e = JSON.parse(e), newElement = "", i = 0; i < e.length; i++) newElement += "<option value='{{route('home') . '/amakenList/'}}" + e[i].name + "/state'>" + e[i].name + "</option>";--}}
    {{--            $("#states").empty().append(newElement), $("#statePane").removeClass("hidden"), $(".dark").show()--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    {{--function getCities() {--}}
    {{--    var e = $("#states2").val(), t = $("#states2 option:selected").attr("data-val");--}}
    {{--    $.ajax({--}}
    {{--        type: "post", url: "{{route('getCitiesDir')}}", data: {stateId: e}, success: function (e) {--}}
    {{--            for (e = JSON.parse(e), newElement = "<option value='{{route('home') . '/majaraList/'}}" + t + "/state'> استان " + t + "</option>", i = 0; i < e.length; i++) newElement += "<option value='{{route('home') . '/majaraList/'}}" + e[i].name + "/city'>شهر " + e[i].name + "</option>";--}}
    {{--            $("#cities").empty().append(newElement)--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    {{--function chooseStateMajara() {--}}
    {{--    $.ajax({--}}
    {{--        type: "post", url: getStates, success: function (e) {--}}
    {{--            for (e = JSON.parse(e), newElement = "", i = 0; i < e.length; i++) newElement += "<option data-val='" + e[i].name + "' value='" + e[i].id + "'>" + e[i].name + "</option>";--}}
    {{--            $(".dark").show(), $("#states2").empty().append(newElement), e.length > 0 && getCities(), $("#statePane2").removeClass("hidden")--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    {{--function chooseGoyesh() {--}}
    {{--    $.ajax({--}}
    {{--        type: "post", url: getGoyesh, success: function (e) {--}}
    {{--            for (e = JSON.parse(e), newElement = "", i = 0; i < e.length; i++) newElement += "<option value='{{route('home') . '/estelahat/'}}" + e[i].name + "'>" + e[i].name + "</option>";--}}
    {{--            $(".dark").show(), $("#goyesh").empty().append(newElement), $("#goyeshPane").removeClass("hidden")--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    {{--function showBookMarks(e) {--}}
    {{--    $("#" + e).empty(), $.ajax({--}}
    {{--        type: "post", url: getBookMarksPath, success: function (t) {--}}
    {{--            for (t = JSON.parse(t), i = 0; i < t.length; i++) element = "<div>", element += "<a class='masthead-recent-card' target='_self' href='" + t[i].placeRedirect + "'>", element += "<div class='media-left'>", element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>", element += "</div>", element += "<div class='content-right'>", element += "<div class='poi-title'>" + t[i].placeName + "</div>", element += "<div class='rating'>", element += "<div class='ui_bubble_rating bubble_45'></div><br/>" + t[i].placeReviews + " مشاهده ", element += "</div>", element += "<div class='geo'>" + t[i].placeCity + "</div>", element += "</div>", element += "</a></div>", $("#" + e).append(element)--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    {{--function getRecentlyViews(e) {--}}
    {{--    $("#" + e).empty(), $.ajax({--}}
    {{--        type: "post", url: getRecentlyPath, success: function (t) {--}}
    {{--            for (t = JSON.parse(t), i = 0; i < t.length; i++) element = "<div>", element += "<a class='masthead-recent-card' style='text-align: right !important;' target='_self' href='" + t[i].placeRedirect + "'>", element += "<div class='media-left' style='padding: 0 12px !important; margin: 0 !important;'>", element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>", element += "</div>", element += "<div class='content-right'>", element += "<div class='poi-title'>" + t[i].placeName + "</div>", element += "<div class='rating'>", 5 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_50'></div>" : 4 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_40'></div>" : 3 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_30'></div>" : 2 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_20'></div>" : element += "<div class='ui_bubble_rating bubble_10'></div>", element += "<br/>" + t[i].placeReviews + " نقد ", element += "</div>", element += "<div class='geo'>" + t[i].placeCity + "/ " + t[i].placeState + "</div>", element += "</div>", element += "</a></div>", $("#" + e).append(element)--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    // function showRecentlyViews(e) {
    //     $("#my-trips-not").is(":hidden") ? ($("#alert").hide(), $("#my-trips-not").show(), $("#profile-drop").hide(), $("#bookmarkmenu").hide(), getRecentlyViews(e)) : ($("#alert").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide())
    // }
    //    For Date
    function assignDate(from, id, btnId) {
        $("#" + id).css("visibility", "visible");

        if (btnId == "date_input2" && $("#date_input1").val().length != 0)
            from = $("#date_input1").val();

        if (btnId == "date_input2_phone" && $("#date_input1_phone").val().length != 0)
            from = $("#date_input1_phone").val();

        $("#" + btnId).datepicker({
            numberOfMonths: 2,
            showButtonPanel: true,
            minDate: from,
            dateFormat: "yy/mm/dd"
        });
    }

    //    For change passenger for room of hotel
    function changePassengersNo(inc) {
        if (passenger + inc >= 0)
            passenger += inc;
        $("#passengerNoSelect").empty().append(passenger);
        $("#passengerNoSelect_phone").empty().append(passenger);
    }

    $(document).ready(function () {

        @foreach($sections as $section)
        fillMyDivWithAdv('{{$section->sectionId}}', -1);
        @endforeach

        changePassengersNo(0);
    });

    // $(".login-button").click(function () {
    //     $(".dark").show(), showLoginPrompt(url)
    // }), $(document).ready(function () {
    //     $("#Settings").on({
    //         mouseenter: function () {
    //             $(".settingsDropDown").show()
    //         }, mouseleave: function () {
    //             $(".settingsDropDown").hide()
    //         }
    //     }), $("#nameTop").click(function (e) {
    //         $("#profile-drop").is(":hidden") ? ($("#profile-drop").show(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide()) : ($("#profile-drop").hide(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide())
    //     }), $("#memberTop").click(function (e) {
    //         $("#profile-drop").is(":hidden") ? ($("#profile-drop").show(), $("#my-trips-not").hide(), $("#bookmarkmenu").hide(), $("#alert").hide()) : ($("#profile-drop").hide(), $("#my-trips-not").hide(), $("#bookmarkmenu").hide(), $("#alert").hide())
    //     }), $("#bookmarkicon").click(function (e) {
    //         $("#bookmarkmenu").is(":hidden") ? ($("#bookmarkmenu").show(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#alert").hide(), showBookMarks("bookMarksDiv")) : ($("#bookmarkmenu").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#alert").hide())
    //     }), $(".notification-bell").click(function (e) {
    //         $("#alert").is(":hidden") ? ($("#alert").show(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide()) : ($("#alert").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide())
    //     }), $("#close_span_search").click(function (e) {
    //         $("#searchspan").animate({height: "0vh"}), $("#myCloseBtn").addClass("hidden")
    //     }), $("#openSearch").click(function (e) {
    //         $("#myCloseBtn").removeClass("hidden"), $("#searchspan").animate({height: "100vh"})
    //     })
    // }), $("body").on("click", function () {
    //     $("#profile-drop").hide(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide()
    // }), $(".global-nav-actions").on("click", function (e) {
    //     e.stopPropagation()
    // });

</script>

<script async src="{{URL::asset('js/middleBanner.js')}}"></script>

<script async src="{{URL::asset('js/slideBar.js')}}"></script>

<script src="{{URL::asset('js/adv.js')}}"></script>

<script defer src="{{URL::asset('js/mainPageSuggestions.js')}}"></script>

<script>
    {{--if ('serviceWorker' in navigator) {--}}
    {{--window.addEventListener('load', function(){--}}
    {{--navigator.serviceWorker.register('{{URL::asset("ServiceWorker.js")}}').then(--}}
    {{--registration => {--}}
    {{--console.log('Service Worker is registered', registration);--}}
    {{--}).catch(--}}
    {{--err => {--}}
    {{--console.error('Registration failed:', err);--}}
    {{--});--}}
    {{--})--}}
    {{--}--}}
</script>

<!-- Initialize Swiper Of mainSlider -->
<script>
    var swiper = new Swiper('#mainSlider', {
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

<!-- Initialize Swiper Of 3Box -->
<script>
    var swiper = new Swiper('#3box', {
        slidesPerView: 3,
        spaceBetween: 3,
        slidesPerGroup: 1,
        loop: true,
        autoplay: {
            delay: 7500,
            disableOnInteraction: false,
        },
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });
</script>

</body>
</html>

