<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.topHeader')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <title>صفحه اصلی</title>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>

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
        var searchDir = '{{route('totalSearch')}}';
        var kindPlaceId = '{{$kindPlaceId}}';
        var recentlyUrl =  '{{route("recentlyViewed")}}';
        var getMainPageSuggestion =  '{{route("getMainPageSuggestion")}}';
        var imageBasePath = '{{URL::asset('images')}}';
        var getCitiesDir = "{{route('getCitiesDir')}}";
        var url;

        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        };
    </script>

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging" ng-app="mainApp">

    @include('general.forAllPages')

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
                                            <div class="swiper-slide mobileHeight" style="position: relative">
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

        {{--@foreach($sections as $section)--}}
            {{--fillMyDivWithAdv('{{$section->sectionId}}', -1);--}}
        {{--@endforeach--}}

        changePassengersNo(0);
    });

</script>

<script async src="{{URL::asset('js/middleBanner.js')}}"></script>

<script async src="{{URL::asset('js/slideBar.js')}}"></script>

<script src="{{URL::asset('js/adv.js')}}"></script>

<script defer src="{{URL::asset('js/mainPageSuggestions.js')}}"></script>

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

</body>
</html>

