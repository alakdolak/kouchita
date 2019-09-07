<!DOCTYPE html>
<html>
    <head>
    @include('layouts.topHeader')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <title>صفحه اصلی</title>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/icons.css?v=1')}}' />

    <style>
        .homepage_shelves_widget {
            min-height: 100px
        }

        .icon-mainpage {
            width: 50px;
            height: 50px;
            background: #FFF;
            position: absolute;
            bottom: -14%;
            right: 43%;
            border-radius: 100%;
            border: 1px solid #CCC
        }

        .icon-mainpage span {
            color: #4DC7BC;
            font-size: 26px;
            line-height: 50px
        }

        #middle-box:hover {
            background: #ededed !important
        }

        .o-slider-next {
            left: 24%;
            right: auto
        }

        .o-slider-prev span {
            top: 250px !important
        }

        .o-slider-next span {
            top: 250px !important
        }

        .o-slider-pagination {
            width: 25% !important;
            top: 450px
        }

        .loader {
            background-image: url("{{URL::asset('images/loading.svg')}}");
            width: 100px;
            height: 100px;
        }
    </style>

    <style>
        .phoneBanner {
            background-image: url("{{URL::asset('images/phoneBanner.jpg')}}");
            background-size: 100% 100%;
            height: 90vh;
        }

        @media screen and (max-width: 600px) {
            /*DIV.ppr_rup.ppr_priv_homepage_hero .placement_wrap .placement_wrap_cell {*/
                /*display: grid !important;*/
            /*}*/
            /*.o-sliderContainer {*/
                /*height: 250px;*/
            /*}*/
            .nearby_cuisines .ui_columns.is-multiline .ui_column, .recently_viewed .ui_columns.is-multiline .ui_column, .recommended_poi_list .ui_columns.is-multiline .ui_column, .poi_by_tag .ui_columns.is-multiline .ui_column, .flights_airline_reviews .ui_columns.is-multiline .ui_column, .attraction_products_by_group .ui_columns.is-multiline .ui_column, .poi_by_taxonomy .ui_columns.is-multiline .ui_column {
                width: 386px !important;
            }
            .image_wrapper.landscape.landscapeWide .image {
                width: -webkit-fill-available !important;
            }
            .ui_column .thumbnail {
                height: 250px !important;
            }
            .image_wrapper {
                height: -webkit-fill-available;
            }
            DIV.prw_rup.prw_shelves_rebrand_poi_shelf_item_widget .detail .item.poi_name {
                font-size: 30px;
                line-height: 30px;
            }
            DIV.prw_rup.prw_shelves_shelf_widget .shelf_container.rebrand .shelf_header .ui_icon.travelers-choice-badge {
                display: inherit;
            }
            h3 {
                font-size: 200%;
            }
            DIV.prw_rup.prw_shelves_rebrand_poi_shelf_item_widget .detail .item.poi_name {
                font-size: 32px;
                line-height: 40px;
            }
            DIV.prw_rup.prw_shelves_rebrand_poi_shelf_item_widget .detail .item.tags {
                padding-top: 4px;
                font-size: 24px;
                line-height: 32px;
            }
            DIV.prw_rup.prw_shelves_rebrand_poi_shelf_item_widget .detail .item.rating-widget .reviewCount {
                font-size: 24px;
                line-height: 32px;
                margin: 0 10px;
            }
            body {
                font-size: x-large;
            }
        }
    </style>
    {{--calender in phone--}}
    <style>
        @media screen and (max-width: 600px) {
            #ui-datepicker-div {
                width: 17em !important;
            }
            .ui-datepicker-multi-2 .ui-datepicker-group {
                width: 100% !important;
            }
        }
    </style>

    <script>
        var homePath = '{{route('home')}}';
        var searchDir = '{{route('heyYou')}}';
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
        .dateLabel {
            position: relative;
            width: 150px;
            height: 30px;
            /*border: 1px solid #e5e5e5;*/
            border-radius: 3px;
            /*box-shadow: 0 7px 12px -7px #e5e5e5 inset;*/
            margin: 0 !important;
            cursor: pointer;
            float: right;
            max-width: 40%;
        }
        .dateLabel_phone {
            height: 30px;
        }
        .inputDateLabel {
            background: transparent;
            width: 100px;
            border: none;
            /*font-size: 75%;*/
            position: absolute;
            top: 5px;
            right: 35px;
            cursor: pointer;
        }
        .inputDateLabel_phone {
            width: 85%;
            border: none;
            font-size: 30px;
            line-height: 40px;
            position: absolute;
            top: 7px;
            right: 65px;
        }
        .minusPlusBtn {
            width: 17px;
            height: 17px;
            cursor: pointer;
            display: inline-block;
            background-image: url('{{URL::asset('images/icons.jpg')}}');
            background-size: 72px;
        }
        @media screen and (max-width: 600px){
            .minusPlusBtn {
                width: 44px;
                height: 44px;
                background-size: 185px;
            }
        }
        {{--.minusPlusBtn_phone {--}}
            {{--width: 26px;--}}
            {{--height: 26px;--}}
            {{--display: inline-block;--}}
            {{--background-image: url('{{URL::asset('images') . 'icons.jpg'}}');--}}
            {{--background-size: 115px;--}}
            {{--background-repeat: no-repeat;--}}
        {{--}--}}
        .searchDivForScroll {
            max-height: 390px;
            overflow: auto;
            float: right;
            border: solid #E5E5E5 !important;
            border-radius:  0px 10px 10px 0px !important;
        }
        .searchDivForScroll_phone {
            max-height: 290px;
            overflow: auto;
            border: solid #E5E5E5 !important;
            border-radius:  10px 10px 0px 0px !important;
        }
        .searchDivForScroll-button {
            float: right;
            border-style: inherit !important;
            border-radius:  10px 0px 0px 10px !important;
            margin-bottom: 8px;
        }
        .searchDivForScroll-phoneButton {
            width: 42%;
            margin: 0 !important;
            border-style: inherit !important;
            border-radius:  0px 0px 0px 10px !important;
            font-size: 20px;
        }
    </style>

    </head>

    <body class="rebrand_2017 desktop HomeRebranded  js_logging">

        <div class="header hideOnPhone">
            @include('layouts.header1')
        </div>

        <div class="hideOnScreen">
            @include('layouts.header1Phone')
        </div>

        <div class="page" ng-app="mainApp">
            <div class="ppr_rup ppr_priv_homepage_hero">
                <div class="homeHero default_home" style="padding: 0 !important;/*background-image: url('`s://static.tacdn.com/img2/branding/homepage/home-tab1-hero-1367x520-beach-prog.jpg');*/width: 100%; background-position:50% bottom">
                    <div class="ui_container container" style="width: 100%; max-width: 100%; padding: 0px;">
                        <div class="placement_wrap">
                            <div class="placement_wrap_row">
                                <div class="placement_wrap_cell">
                                    <div id="sliderBarDIV" class="ppr_rup ppr_priv_trip_search hideOnPhone" style="max-width: 100%; overflow: hidden">
                                        @if($placeMode == "hotel")
                                            <div class="ui_columns datepicker_box trip_search metaDatePicker rounded_lockup usePickerTypeIcons preDates noDates with_children hideOnPhone" style="position: absolute;right: 6%;top: 20%;width: 68%;z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column is-4 search_typeahead wctx-tripsearch searchDivForScroll">
                                                    <div class="ui_picker">
                                                        <span class="typeahead_align ui_typeahead">
                                                            <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" placeholder="شهر یا نام هتل"/>
                                                            <input type="hidden" id="placeId">
                                                            <span class="ui_icon map-pin-fill pickerType typeahead_icon"></span>
                                                        </span>
                                                        <div id="result" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                <div class="is-2 prw_rup prw_common_form_submit ui_column submit_wrap searchDivForScroll-button">
                                                    <button onclick="redirect()" class="autoResize form_submit ">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span onclick="window.location = '{{route('main', ['mode' => 'hotel'])}}'" class="submit_text">جستجو هتل</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                                <div style="clear: both"></div>
                                                {{--<div class="ui_column" style="width: 35%;padding: 10px !important;float: right;border-radius:  0px 10px 10px 0px;">--}}
                                                    {{--<div class="ui_picker" style="color: #b7b7b7 !important;">--}}
                                                        {{--<label id="calendar-container-edit-1placeDate" class="dateLabel">--}}
                                                            {{--<span class="ui_icon calendar" style="color: #30b4a6 !important; font-size: 20px; line-height: 32px; position: absolute; right: 7px;"></span>--}}
                                                            {{--<input name="date" id="date_input1" type="text" onclick="assignDate('{{convertStringToDate(getToday()["date"])}}', 'calendar-container-edit-1placeDate', 'date_input1')" class="inputDateLabel" placeholder="تاریخ رفت" required readonly>--}}
                                                        {{--</label>--}}
                                                        {{--<label id="calendar-container-edit-2placeDate" class="dateLabel" style="margin-right: 14px !important;">--}}
                                                            {{--<span class="ui_icon calendar" style="color: #30b4a6 !important; font-size: 20px; line-height: 32px; position: absolute; right: 7px;"></span>--}}
                                                            {{--<input name="date" id="date_input2" type="text" onclick="assignDate('{{convertStringToDate(getToday()["date"])}}', 'calendar-container-edit-2placeDate', 'date_input2')" class="inputDateLabel" placeholder="تاریخ برگشت" required readonly>--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="ui_column" style="min-width: 15%; max-width: 40%; float: right;border-radius:  10px 0px 0px 10px;">--}}
                                                    {{--<div class="ui_picker" style="padding: 4px 0 0 0;">--}}
                                                        {{--<span class="ui_icon friends pickerType" style="margin: 0 !important;float: right"></span>--}}
                                                        {{--<div style="float: right;">--}}
                                                            {{--<span style="float:right; margin-right: 5px">نفر</span>--}}
                                                            {{--<div style="float: left; margin-right: 35px">--}}
                                                                {{--<div onclick="changePassengersNo(1)" class="minusPlusBtn" style="background-position: -1px -6px;"></div>--}}
                                                                {{--<span id="passengerNoSelect"></span>--}}
                                                                {{--<div onclick="changePassengersNo(-1)" class="minusPlusBtn" style="background-position: -18px -6px;"></div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <div style="clear: both"></div>
                                            </div>
                                        @elseif($placeMode == "restaurant")
                                            <div class="ui_columns datepicker_box trip_search metaDatePicker rounded_lockup usePickerTypeIcons preDates noDates with_children hideOnPhone" style="position: absolute;right: 6%;top: 20%;width: 68%;z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column is-4 search_typeahead wctx-tripsearch searchDivForScroll">
                                                    <div class="ui_picker">
                                                                <span class="typeahead_align ui_typeahead">
                                                                    <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" placeholder="شهر یا نام رستوران"/>
                                                                    <input type="hidden" id="placeId">
                                                                    <span class="ui_icon map-pin-fill pickerType typeahead_icon"></span>
                                                                </span>
                                                        <div id="result" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                <div class="is-2 prw_rup prw_common_form_submit ui_column submit_wrap searchDivForScroll-button">
                                                    <button onclick="redirect()" class="autoResize form_submit ">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span class="submit_text">جستجو رستوران</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        @elseif($placeMode == "tour")
                                            <div class="ui_columns datepicker_box trip_search metaDatePicker rounded_lockup usePickerTypeIcons preDates noDates with_children hideOnPhone" style="position: absolute;right: 6%;top: 20%;width: 68%;z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column is-4 search_typeahead wctx-tripsearch searchDivForScroll">
                                                    <div class="ui_picker">
                                                                <span class="typeahead_align ui_typeahead">
                                                                    <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" placeholder="شهر یا نام رستوران"/>
                                                                    <input type="hidden" id="placeId">
                                                                    <span class="ui_icon map-pin-fill pickerType typeahead_icon"></span>
                                                                </span>
                                                        <div id="result" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                <div class="is-2 prw_rup prw_common_form_submit ui_column submit_wrap searchDivForScroll-button">
                                                    <button onclick="redirect()" class="autoResize form_submit ">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span class="submit_text">جستجو رستوران</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        @else
                                            <div class="ui_columns datepicker_box trip_search metaDatePicker rounded_lockup usePickerTypeIcons preDates noDates with_children hideOnPhone" style="position: absolute;right: 6%;top: 20%;width: 68%;z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column is-4 search_typeahead wctx-tripsearch searchDivForScroll">
                                                    <div class="ui_picker">
                                                                <span class="typeahead_align ui_typeahead">
                                                                    <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" placeholder="شهر یا نام مکان موردنظر"/>
                                                                    <input type="hidden" id="placeId">
                                                                    <span class="ui_icon map-pin-fill pickerType typeahead_icon"></span>
                                                                </span>
                                                        <div id="result" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                <div class="is-2 prw_rup prw_common_form_submit ui_column submit_wrap searchDivForScroll-button">
                                                    <button onclick="redirect()" class="autoResize form_submit ">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span class="submit_text">جستجو اماکن</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ppr_rup ppr_priv_trip_search phoneBanner hideOnScreen">
                                        @if($placeMode == "hotel")
                                            <div class="ui_columns trip_search rounded_lockup usePickerTypeIcons" style="width: 45%;position: absolute;top: 44%;left: 50%;transform: translate(-50%, -50%);z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column search_typeahead wctx-tripsearch searchDivForScroll_phone">
                                                    <div class="ui_picker">
                                                                <span class="typeahead_align ui_typeahead">
                                                                    <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" style="padding: 8px 10px; font-size: 30px; line-height: 30px;" placeholder="شهر یا نام هتل"/>
                                                                    <input type="hidden" id="placeId">
                                                                    <span class="ui_icon map-pin-fill pickerType typeahead_icon"></span>
                                                                </span>
                                                        <div id="result" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                {{--<div class="ui_column" style="padding: 15px 10px !important;">--}}
                                                    {{--<div class="ui_picker" style="color: #b7b7b7 !important;">--}}
                                                        {{--<label id="calendar-container-edit-1placeDate_phone" class="dateLabel_phone">--}}
                                                            {{--<span class="ui_icon calendar" style="color: #30b4a6 !important; font-size: 40px; line-height: 40px; position: absolute; right: 10px;"></span>--}}
                                                            {{--<input name="date" id="date_input1_phone" type="text" onclick="assignDate('{{convertStringToDate(getToday()["date"])}}', 'calendar-container-edit-1placeDate_phone', 'date_input1_phone')" class="inputDateLabel_phone" placeholder="تاریخ رفت" required readonly>--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="ui_column" style="padding: 15px 10px !important;">--}}
                                                    {{--<div class="ui_picker" style="color: #b7b7b7 !important;">--}}
                                                        {{--<label id="calendar-container-edit-2placeDate_phone" class="dateLabel_phone">--}}
                                                            {{--<span class="ui_icon calendar" style="color: #30b4a6 !important; font-size: 40px; line-height: 40px; position: absolute; right: 10px;"></span>--}}
                                                            {{--<input name="date" id="date_input2_phone" type="text" onclick="assignDate('{{convertStringToDate(getToday()["date"])}}', 'calendar-container-edit-2placeDate_phone', 'date_input2_phone')" class="inputDateLabel_phone" placeholder="تاریخ برگشت" required readonly>--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="ui_column" style="width: 58%;float: right;border-radius:  0px 0px 10px 0px;">--}}
                                                    {{--<div class="ui_picker" style="padding: 10px 10px 5px 0;">--}}
                                                        {{--<span class="ui_icon friends pickerType" style="margin: 0 !important;float: right;font-size: 50px"></span>--}}
                                                        {{--<div style="float: right;">--}}
                                                            {{--<span style="float:right; margin:7px 5px 0 0; font-size: 30px; line-height: 45px">نفر</span>--}}
                                                            {{--<div style="float: left; margin-right: 30px">--}}
                                                                {{--<div onclick="changePassengersNo(1)" class="minusPlusBtn" style="background-position: -1px -15px;"></div>--}}
                                                                {{--<span id="passengerNoSelect_phone" style="font-size: 35px"></span>--}}
                                                                {{--<div onclick="changePassengersNo(-1)" class="minusPlusBtn" style="background-position: -48px -15px;"></div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="prw_rup prw_common_form_submit ui_column submit_wrap searchDivForScroll-phoneButton">
                                                    <button onclick="redirect()" class="autoResize form_submit" style="font-size: 30px; line-height: 54px;">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span onclick="window.location = '{{route('main', ['mode' => 'hotel'])}}'" class="submit_text">جستجو هتل</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                            </div>
                                        @elseif($placeMode == "restaurant")
                                            <div class="trip_search rounded_lockup usePickerTypeIcons hideOnScreen" style="width: 60%;position: absolute;top: 44%;left: 50%;transform: translate(-50%, -50%);z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column" onclick="$('#phoneSearchPopUp').removeClass('hidden')" style="width: 70%; float: right; max-height: 300px; overflow: auto;border-radius: 0 25px 25px 0;">
                                                    <div class="ui_picker" style="padding: 10px !important;">
                                                                <span class="typeahead_align ui_typeahead">
                                                                    <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" style="width: 100%;font-size: 35px; line-height: 50px !important; float:right; border: none; margin-right: 5px" placeholder="شهر یا نام رستوران"/>
                                                                    <input type="hidden" id="placeId">
                                                                </span>
                                                        <div id="resultPhone" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                <div class="prw_rup prw_common_form_submit ui_column submit_wrap" style="width: 30%;border-radius: 25px 0 0 25px;margin: 0 !important;">
                                                    <button onclick="redirect()" class="form_submit" style="font-size: 35px; line-height: 64px">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span class="submit_text">جستجو</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                            </div>
                                        @elseif($placeMode == "tour")
                                            <div class="trip_search rounded_lockup usePickerTypeIcons hideOnScreen" style="width: 60%;position: absolute;top: 44%;left: 50%;transform: translate(-50%, -50%);z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column" onclick="$('#phoneSearchPopUp').removeClass('hidden')" style="width: 70%; float: right; max-height: 300px; overflow: auto;border-radius: 0 25px 25px 0;">
                                                    <div class="ui_picker" style="padding: 10px !important;">
                                                                <span class="typeahead_align ui_typeahead">
                                                                    <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" style="width: 100%;font-size: 35px; line-height: 50px !important; float:right; border: none; margin-right: 5px" placeholder="شهر یا نام رستوران"/>
                                                                    <input type="hidden" id="placeId">
                                                                </span>
                                                        <div id="resultPhone" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                <div class="prw_rup prw_common_form_submit ui_column submit_wrap" style="width: 30%;border-radius: 25px 0 0 25px;margin: 0 !important;">
                                                    <button onclick="redirect()" class="form_submit" style="font-size: 35px; line-height: 64px">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span class="submit_text">جستجو</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="trip_search rounded_lockup usePickerTypeIcons hideOnScreen" style="width: 60%;position: absolute;top: 44%;left: 50%;transform: translate(-50%, -50%);z-index: 10000000;">
                                                <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column" onclick="$('#phoneSearchPopUp').removeClass('hidden')" style="width: 70%; float: right; max-height: 300px; overflow: auto;border-radius: 0 25px 25px 0;">
                                                    <div class="ui_picker" style="padding: 10px !important;">
                                                                <span class="typeahead_align ui_typeahead">
                                                                    <input onkeyup="search(event)" type="text" id="placeName" class="typeahead_input" style="width: 100%;font-size: 35px; line-height: 50px !important; float:right; border: none; margin-right: 5px" placeholder="شهر یا نام مکان موردنظر"/>
                                                                    <input type="hidden" id="placeId">
                                                                </span>
                                                        <div id="resultPhone" class="data_holder"></div>
                                                    </div>
                                                </div>
                                                <div class="prw_rup prw_common_form_submit ui_column submit_wrap" style="width: 30%;border-radius: 25px 0 0 25px;margin: 0 !important;">
                                                    <button onclick="redirect()" class="form_submit" style="font-size: 35px; line-height: 64px">
                                                        <span class="ui_icon search submit_icon"></span>
                                                        <span class="submit_text">جستجو</span>
                                                    </button>
                                                    <span class="ui_loader dark fill"></span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui_container">
                <div class="ppr_rup ppr_priv_homepage_shelves">

                    <div class="homepage_shelves_widget hideOnPhone">
                        <div class="prw_rup prw_homepage_messaging_brand">
                            <div id="brand_messaging" class="ui_columns is-hidden-mobile">
                                <div class="ui_column is-12">
                                    <div style="direction: rtl;text-align: center;" class="brand_header green"><h1>ایران را باهم بشناسیم</h1></div>
                                    <div style="direction: rtl;text-align: center;"> همین حالا با اشتراک تجربیات خود به عنوان یک گردشگر ، خود را به دوستانتان معرفی کنید.</div>
                                    @if(!Auth::check())
                                        <div class="login-button" style="cursor: pointer; direction: rtl;text-align: center;font-size: 13px;color: #4DC7BC;">
                                            <span class="ui_icon arrow-left"></span> ساخت پروفایل
                                        </div>
                                    @endif
                                </div>
                                <div class="ui_column is-4 right-col" style="overflow: visible;direction: rtl;text-align: center;float: left;position: relative">
                                    <div style="overflow: visible;" class="inner">
                                        <div class="icon-mainpage"><span class="ui_icon my-trips"></span></div>
                                        <div class="text">
                                            <h2 style="margin-top: 22px;" class="en_US large white">برنامه ریزی کنید</h2>
                                            <div class="en_US small white">تمامی مراحل سفر خود را از خرید بلیط تا رزرو هتل با بهترین قیمت ها برنامه ریزی کنید.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui_column is-4 right-col" style="overflow: visible; direction: rtl;text-align: center;float: left;position: relative;">
                                    <div style="overflow: visible;background: #FFF ;border:  1px solid #4DC7BC;" class="inner" id="middle-box">
                                        <div class="icon-mainpage" style="background:#4DC7BC;">
                                            <span style="color:#FFF;" class="ui_icon seat-flat-bed"></span>
                                        </div>
                                        <div style="color:#4dc7bc;" class="text">
                                            <h2 style="color:#4dc7bc;margin-top: 22px;" class="en_US large white">خواندن نقد گردشگران</h2>
                                            <div style="color:#4dc7bc;" class="en_US small white">با خواندن نقد دوستان خود ، بهتر و راحت تر انتخاب کنید</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui_column is-4 right-col" style="direction: rtl;text-align: center;float: left;position: relative;">
                                    <div style="overflow: visible;" class="inner">
                                        <div class="icon-mainpage"><span class="ui_icon search"></span></div>
                                        <div class="text">
                                            <h2 style="margin-top: 22px;" class="en_US large white"> مقصد سفر </h2>
                                            <div class="en_US small white">فقط کافیست مقصد خود را وارد کنید</div>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="homepage_shelves_widget hideOnPhone">
                        <div class="prw_rup prw_shelves_shelf_widget">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_2">
                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                        <div class="shelf_title_container">
                                            <a href="" class="ui_link ui_header h2">
                                                <h3>سایرخدمات</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                                        <div class="poi">
                                            <div style="cursor: pointer" onclick="chooseState('sanaye')" class="thumbnail">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide">
                                                            <img src="{{URL::asset('images/sanayedasti.jpg')}}" alt="" class="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz">صنایع دستی </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                                        <div class="poi">
                                            <div style="cursor: pointer" onclick="chooseState('soghat')" class="thumbnail">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide">
                                                            <img src="{{URL::asset('images/soghat.jpg')}}" alt="" class="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz"> سوغات</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                                        <div class="poi">
                                            <div class="thumbnail" style="cursor: pointer"
                                                 onclick="chooseState('ghazamahali')">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide">
                                                            <img src="{{URL::asset('images/lfood.jpg')}}" alt="" class="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz"> غذای محلی</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile"
                                         onclick="chooseGoyesh()">
                                        <div class="poi">
                                            <a class="thumbnail" style="cursor: pointer">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide">
                                                            <img src="{{URL::asset('images/estelahat.jpg')}}" alt="" class="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz"> اصطلاحات محلی</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 20px;" class="shelf_container poi_by_tag rebrand shelf_row_2">
                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                        <div class="shelf_title_container">
                                            <a class="ui_link ui_header h2"><h3>شاید خوشتان بیاید</h3></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                                        <div class="poi">
                                            <a href="{{route('soon')}}" class="thumbnail">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/lebas.jpg')}}" alt="" class="image"></div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz">لباس محلی </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                                        <div class="poi">
                                            <div onclick="chooseStateAmaken()" class="thumbnail" style="cursor: pointer">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/tarikhi.jpg')}}" alt="" class="image"></div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz">  جاذبه ها</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                                        <div class="poi">
                                            <div onclick="chooseStateMajara()" class="thumbnail" style="cursor: pointer">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/majarajooi.jpg')}}" alt="" class="image"></div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz"> سفرهای ماجراجویانه </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                                        <div class="poi">
                                            <a href="{{route('soon')}}" class="thumbnail">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/boom.jpg')}}" alt="" class="image"></div>
                                                    </div>
                                                </div>
                                                <span style="direction: rtl;" class="item name" title="Santa Cruz"> بوم گردی </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hideOnScreen row">
                        <div class="col-xs-12">
                            <a class="col-xs-4 squareDiv" href="{{route('mainMode', ['mode' => 'amaken'])}}" style="color: #30b4a6 !important;">
                                <div class="phoneIcon atraction"></div>
                                <div class="textIcon">جاذبه ها</div>
                            </a>
                            <a class="col-xs-4 squareDiv" href="{{route('tickets')}}" style="color: #30b4a6 !important;">
                                <div class="phoneIcon ticket"></div>
                                <div class="textIcon">بلیط</div>
                            </a>
                            <a class="col-xs-4 squareDiv" href="{{route('main')}}" style="color: #30b4a6 !important;">
                                <div class="phoneIcon hotel"></div>
                                <div class="textIcon">هتل</div>
                            </a>
                            {{--<div class="col-xs-4 squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">--}}
                            {{--<div class="phoneIcon atraction"></div>--}}
                            {{--<div class="textIcon">جاذبه ها</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 squareDiv">--}}
                            {{--<a href="{{route('tickets')}}">--}}
                            {{--<div class="phoneIcon ticket"></div>--}}
                            {{--<div class="textIcon">بلیط</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 squareDiv">--}}
                            {{--<a href="{{route('main')}}">--}}
                            {{--<div class="phoneIcon hotel"></div>--}}
                            {{--<div class="textIcon">هتل</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                        </div>
                        <div style="clear: both"></div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                                <div class="phoneIcon ghazamahali"></div>
                                <div class="textIcon">غذای محلی</div>
                            </div>
                            <div class="col-xs-4 squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                                <div class="phoneIcon soghat"></div>
                                <div class="textIcon">سوغات</div>
                            </div>
                            <a class="col-xs-4 squareDiv" href="{{route('mainMode', ['mode' => 'restaurant'])}}" style="color: #30b4a6 !important;">
                                <div class="phoneIcon restaurant"></div>
                                <div class="textIcon">رستوران</div>
                            </a>
                            {{--<div class="col-xs-4 squareDiv">--}}
                            {{--<a href="{{route('mainMode', ['mode' => 'restaurant'])}}">--}}
                            {{--<div class="phoneIcon restaurant"></div>--}}
                            {{--<div class="textIcon">رستوران</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                        </div>
                        <div style="clear: both"></div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4" onclick="$('#phoneMenuBarPopUp').removeClass('hidden')" style="margin-top: -2px; text-align: center;">
                            <span style="font-size: 30px; font-weight: bold"><span class="phoneIcon downArrow"></span>گزینه های بیشتر</span>
                        </div>
                        <div class="col-xs-4"></div>
                    </div>

                    <center>
                        <div class="loader hidden"></div>
                    </center>

                    <div id="AdviceControllerId" class="homepage_shelves_widget" ng-controller="AdviceController">
                        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                        <div class="shelf_title_container">
                                            <a class="ui_link ui_header h2">
                                                <h3>پیشنهاد های ویژه</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                        <div class="poi">
                                            <a href="[[itr.url]]" class="thumbnail">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide">
                                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="detail" style="direction: rtl">
                                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                <div class="item rating-widget">
                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                        <span class="[[itr.classRate]]"></span>
                                                    </div>
                                                    <span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>
                                                </div>
                                                <div class="item tags">[[itr.city]] <span>در </span>
                                                    <span>[[itr.state]]</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($placeMode == "hotel")
                        <div id="HotelControllerId" class="homepage_shelves_widget" ng-controller="HotelController">
                            <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                                <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                    <div class="shelf_header">
                                        <div class="shelf_title">
                                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                            <div class="shelf_title_container">
                                                <a class="ui_link ui_header h2">
                                                    <h3>هتل های دیدنی</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                            <div class="poi">
                                                <a href="[[itr.url]]" class="thumbnail">
                                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                        <div class="prv_thumb has_image">
                                                            <div class="image_wrapper landscape landscapeWide">
                                                                <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="detail" style="direction: rtl">
                                                    <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                    <div class="item rating-widget">
                                                        <div class="prw_rup prw_common_location_rating_simple">
                                                            <span class="[[itr.classRate]]"></span>
                                                        </div>
                                                        <span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>
                                                    </div>
                                                    <div class="item tags">[[itr.city]] <span>در </span>
                                                        <span>[[itr.state]]</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($placeMode == "restaurant")
                        <div id="RestaurantControllerId" class="homepage_shelves_widget"
                             ng-controller="RestaurantController">
                            <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                                <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                    <div class="shelf_header">
                                        <div class="shelf_title">
                                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                            <div class="shelf_title_container">
                                                <a class="ui_link ui_header h2">
                                                    <h3>رستوران های دیدنی</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                            <div class="poi">
                                                <a href="[[itr.url]]" class="thumbnail">
                                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                        <div class="prv_thumb has_image">
                                                            <div class="image_wrapper landscape landscapeWide">
                                                                <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="detail" style="direction: rtl">
                                                    <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                    <div class="item rating-widget">
                                                        <div class="prw_rup prw_common_location_rating_simple">
                                                            <span class="[[itr.classRate]]"></span>
                                                        </div>
                                                        <span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>
                                                    </div>
                                                    <div class="item tags">[[itr.city]] <span>در </span>
                                                        <span>[[itr.state]]</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="AmakenControllerId" class="homepage_shelves_widget" ng-controller="AmakenController">
                            <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                                <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                    <div class="shelf_header">
                                        <div class="shelf_title">
                                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                            <div class="shelf_title_container">
                                                <a class="ui_link ui_header h2">
                                                    <h3>اماکن دیدنی</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                            <div class="poi">
                                                <a href="[[itr.url]]" class="thumbnail">
                                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                        <div class="prv_thumb has_image">
                                                            <div class="image_wrapper landscape landscapeWide">
                                                                <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="detail" style="direction: rtl">
                                                    <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                    <div class="item rating-widget">
                                                        <div class="prw_rup prw_common_location_rating_simple">
                                                            <span class="[[itr.classRate]]"></span>
                                                        </div>
                                                        <span class="reviewCount">[[itr.reviews]] </span>
                                                        <span>نقد </span>
                                                    </div>
                                                    <div class="item tags">[[itr.city]] <span>در </span>
                                                        <span>[[itr.state]]</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(Auth::check())
                        <div id="RecentlyControllerId" class="homepage_shelves_widget" ng-controller="RecentlyController">
                            <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                                <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                    <div class="shelf_header">
                                        <div class="shelf_title">
                                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                            <div class="shelf_title_container">
                                                <a class="ui_link ui_header h2">
                                                    <h3>بازدید های اخیر</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                            <div class="poi">
                                                <a href="[[itr.url]]" class="thumbnail">
                                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                        <div class="prv_thumb has_image">
                                                            <div class="image_wrapper landscape landscapeWide">
                                                                <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="detail" style="direction: rtl">
                                                    <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                    <div class="item rating-widget">
                                                        <div class="prw_rup prw_common_location_rating_simple">
                                                            <span class="[[itr.classRate]]"></span>
                                                        </div>
                                                        <span class="reviewCount">[[itr.reviews]] </span>
                                                        <span>نقد </span>
                                                    </div>
                                                    <div class="item tags">[[itr.city]] <span>در </span>
                                                        <span>[[itr.state]]</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($placeMode == "hotel" || $placeMode == "restaurant")
                        <div id="AmakenControllerId" class="homepage_shelves_widget" ng-controller="AmakenController">
                            <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                                <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                    <div class="shelf_header">
                                        <div class="shelf_title">
                                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                            <div class="shelf_title_container">
                                                <a class="ui_link ui_header h2"><h3>اماکن دیدنی</h3></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                            <div class="poi">
                                                <a href="[[itr.url]]" class="thumbnail">
                                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                        <div class="prv_thumb has_image">
                                                            <div class="image_wrapper landscape landscapeWide">
                                                                <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="detail" style="direction: rtl">
                                                    <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                    <div class="item rating-widget">
                                                        <div class="prw_rup prw_common_location_rating_simple">
                                                            <span class="[[itr.classRate]]"></span>
                                                        </div>
                                                        <span class="reviewCount">[[itr.reviews]]</span>
                                                        <span>نقد </span>
                                                    </div>
                                                    <div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="HotelControllerId" class="homepage_shelves_widget" ng-controller="HotelController">
                            <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                                <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                    <div class="shelf_header">
                                        <div class="shelf_title">
                                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                            <div class="shelf_title_container">
                                                <a class="ui_link ui_header h2"><h3>هتل های دیدنی</h3></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                            <div class="poi">
                                                <a href="[[itr.url]]" class="thumbnail">
                                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                        <div class="prv_thumb has_image">
                                                            <div class="image_wrapper landscape landscapeWide">
                                                                <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="detail" style="direction: rtl">
                                                    <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                    <div class="item rating-widget">
                                                        <div class="prw_rup prw_common_location_rating_simple">
                                                            <span class="[[itr.classRate]]"></span>
                                                        </div>
                                                        <span class="reviewCount">[[itr.reviews]]</span>
                                                        <span>نقد </span>
                                                    </div>
                                                    <div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div id="FoodControllerId" class="homepage_shelves_widget" ng-controller="FoodController">
                        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff" style="direction: rtl;">
                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                                        <div class="shelf_title_container">
                                            <a class="ui_link ui_header h2"><h3>غذاهای لذیذ</h3></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                                        <div class="poi">
                                            <a href="[[itr.url]]" class="thumbnail">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide">
                                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="detail" style="direction: rtl">
                                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                                <div class="item rating-widget">
                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                        <span class="[[itr.classRate]]"></span>
                                                    </div>
                                                    <span class="reviewCount">[[itr.reviews]]</span><span>نقد </span>
                                                </div>
                                                <div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('layouts.placeFooter')

        @if(!Auth::check())
            @include('layouts.loginPopUp')
        @endif

        {{--@include('layouts.phonePopUp')--}}

        <script defer>
            var currIdx = 0, suggestions = [];
            var passenger = 0;

            function redirect() {
                "" != $("#placeId").val() && (document.location.href = $("#placeId").val())
            }

            function search(e) {

                val = $("#placeName").val();
                $(".suggest").css("background-color", "transparent").css("padding", "0").css("border-radius", "0");

                if (null == val || "" == val || val.length < 2)
                    $("#result").empty();
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
                            data: {kindPlaceId: "{{$kindPlaceId}}", key: val, key2: val2},
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
                                        newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                                    }
                                    else if ("city" == response[i].mode) {
                                        newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")'>شهر " + response[i].targetName + " در " + response[i].stateName + " </p>";
                                    }
                                    else
                                        newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].targetName + " در " + response[i].cityName + " در " + response[i].stateName + "</p>";
                                }

                                $("#result").empty().append(newElement)
                            }
                        })
                    }
                    else $.ajax({
                        type: "post",
                        url: searchDir,
                        data: {kindPlaceId: "{{$kindPlaceId}}", key: val},
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
                                    newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                                }
                                else if ("city" == response[i].mode) {
                                    newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")'>شهر " + response[i].targetName + " در " + response[i].stateName + " </p>";
                                }
                                else
                                    newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].targetName + " در " + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }

                            $("#result").empty().append(newElement)
                        }
                    })
                }
            }

            function setInput(e, t) {
                $("#placeName").val(t), $("#placeId").val(e), $("#result").empty(), redirect()
            }

            function hideElement(e) {
                $(".dark").hide(), $("#" + e).addClass("hidden")
            }

            function showElement(e) {
                $("#" + e).removeClass("hidden"), $(".dark").show()
            }

            function chooseState(e) {
                $.ajax({
                    type: "post", url: getStates, success: function (t) {
                        for (t = JSON.parse(t), newElement = "", i = 0; i < t.length; i++) newElement += "<option value='{{route('home') . '/adab-list/'}}" + t[i].name + "/" + e + "'>" + t[i].name + "</option>";
                        $("#states").empty().append(newElement), $("#statePane").removeClass("hidden"), $(".dark").show()
                    }
                })
            }

            function chooseStateAmaken() {
                $.ajax({
                    type: "post", url: getStates, success: function (e) {
                        for (e = JSON.parse(e), newElement = "", i = 0; i < e.length; i++) newElement += "<option value='{{route('home') . '/amakenList/'}}" + e[i].name + "/state'>" + e[i].name + "</option>";
                        $("#states").empty().append(newElement), $("#statePane").removeClass("hidden"), $(".dark").show()
                    }
                })
            }

            function getCities() {
                var e = $("#states2").val(), t = $("#states2 option:selected").attr("data-val");
                $.ajax({
                    type: "post", url: "{{route('getCitiesDir')}}", data: {stateId: e}, success: function (e) {
                        for (e = JSON.parse(e), newElement = "<option value='{{route('home') . '/majaraList/'}}" + t + "/state'> استان " + t + "</option>", i = 0; i < e.length; i++) newElement += "<option value='{{route('home') . '/majaraList/'}}" + e[i].name + "/city'>شهر " + e[i].name + "</option>";
                        $("#cities").empty().append(newElement)
                    }
                })
            }

            function chooseStateMajara() {
                $.ajax({
                    type: "post", url: getStates, success: function (e) {
                        for (e = JSON.parse(e), newElement = "", i = 0; i < e.length; i++) newElement += "<option data-val='" + e[i].name + "' value='" + e[i].id + "'>" + e[i].name + "</option>";
                        $(".dark").show(), $("#states2").empty().append(newElement), e.length > 0 && getCities(), $("#statePane2").removeClass("hidden")
                    }
                })
            }

            function chooseGoyesh() {
                $.ajax({
                    type: "post", url: getGoyesh, success: function (e) {
                        for (e = JSON.parse(e), newElement = "", i = 0; i < e.length; i++) newElement += "<option value='{{route('home') . '/estelahat/'}}" + e[i].name + "'>" + e[i].name + "</option>";
                        $(".dark").show(), $("#goyesh").empty().append(newElement), $("#goyeshPane").removeClass("hidden")
                    }
                })
            }

            function showBookMarks(e) {
                $("#" + e).empty(), $.ajax({
                    type: "post", url: getBookMarksPath, success: function (t) {
                        for (t = JSON.parse(t), i = 0; i < t.length; i++) element = "<div>", element += "<a class='masthead-recent-card' target='_self' href='" + t[i].placeRedirect + "'>", element += "<div class='media-left'>", element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>", element += "</div>", element += "<div class='content-right'>", element += "<div class='poi-title'>" + t[i].placeName + "</div>", element += "<div class='rating'>", element += "<div class='ui_bubble_rating bubble_45'></div><br/>" + t[i].placeReviews + " مشاهده ", element += "</div>", element += "<div class='geo'>" + t[i].placeCity + "</div>", element += "</div>", element += "</a></div>", $("#" + e).append(element)
                    }
                })
            }

            function getRecentlyViews(e) {
                $("#" + e).empty(), $.ajax({
                    type: "post", url: getRecentlyPath, success: function (t) {
                        for (t = JSON.parse(t), i = 0; i < t.length; i++) element = "<div>", element += "<a class='masthead-recent-card' style='text-align: right !important;' target='_self' href='" + t[i].placeRedirect + "'>", element += "<div class='media-left' style='padding: 0 12px !important; margin: 0 !important;'>", element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>", element += "</div>", element += "<div class='content-right'>", element += "<div class='poi-title'>" + t[i].placeName + "</div>", element += "<div class='rating'>", 5 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_50'></div>" : 4 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_40'></div>" : 3 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_30'></div>" : 2 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_20'></div>" : element += "<div class='ui_bubble_rating bubble_10'></div>", element += "<br/>" + t[i].placeReviews + " نقد ", element += "</div>", element += "<div class='geo'>" + t[i].placeCity + "/ " + t[i].placeState + "</div>", element += "</div>", element += "</a></div>", $("#" + e).append(element)
                    }
                })
            }

            function showRecentlyViews(e) {
                $("#my-trips-not").is(":hidden") ? ($("#alert").hide(), $("#my-trips-not").show(), $("#profile-drop").hide(), $("#bookmarkmenu").hide(), getRecentlyViews(e)) : ($("#alert").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide())
            }
            //    For Date
            function assignDate(from, id, btnId) {
                $("#" + id).css("visibility", "visible");

                if(btnId == "date_input2" && $("#date_input1").val().length != 0)
                    from = $("#date_input1").val();

                if(btnId == "date_input2_phone" && $("#date_input1_phone").val().length != 0)
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
                if(passenger + inc >= 0)
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

            $(".login-button").click(function () {
                $(".dark").show(), showLoginPrompt(url)
            }), $(document).ready(function () {
                $("#Settings").on({
                    mouseenter: function () {
                        $(".settingsDropDown").show()
                    }, mouseleave: function () {
                        $(".settingsDropDown").hide()
                    }
                }), $("#nameTop").click(function (e) {
                    $("#profile-drop").is(":hidden") ? ($("#profile-drop").show(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide()) : ($("#profile-drop").hide(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide())
                }), $("#memberTop").click(function (e) {
                    $("#profile-drop").is(":hidden") ? ($("#profile-drop").show(), $("#my-trips-not").hide(), $("#bookmarkmenu").hide(), $("#alert").hide()) : ($("#profile-drop").hide(), $("#my-trips-not").hide(), $("#bookmarkmenu").hide(), $("#alert").hide())
                }), $("#bookmarkicon").click(function (e) {
                    $("#bookmarkmenu").is(":hidden") ? ($("#bookmarkmenu").show(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#alert").hide(), showBookMarks("bookMarksDiv")) : ($("#bookmarkmenu").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#alert").hide())
                }), $(".notification-bell").click(function (e) {
                    $("#alert").is(":hidden") ? ($("#alert").show(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide()) : ($("#alert").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide())
                }), $("#close_span_search").click(function (e) {
                    $("#searchspan").animate({height: "0vh"}), $("#myCloseBtn").addClass("hidden")
                }), $("#openSearch").click(function (e) {
                    $("#myCloseBtn").removeClass("hidden"), $("#searchspan").animate({height: "100vh"})
                })
            }), $("body").on("click", function () {
                $("#profile-drop").hide(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide()
            }), $(".global-nav-actions").on("click", function (e) {
                e.stopPropagation()
            });

        </script>

        <script>

            const config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            };

            const data = $.param({});

            (function () {
                var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
                    $interpolateProvider.startSymbol('[[');
                    $interpolateProvider.endSymbol(']]')
                });

                app.config(['$qProvider', function ($qProvider) {
                    $qProvider.errorOnUnhandledRejections(!1)
                }]);

                app.controller('RecentlyController', function ($scope, $http) {
                    $scope.show = !1;
                    $scope.disable = !1;
                    $scope.firstTime = true;

                    $scope.myPagingFunction = function () {
                        if ($scope.disable)
                            return;
                        var top = $("#RecentlyControllerId").position().top;
                        var scroll = $(window).scrollTop() + window.innerHeight;

                        if($scope.firstTime) {
                            $scope.firstTime = false;
                            if(top > scroll)
                                return;
                        }
                        else {
                            if (scroll < top || (scroll - top) / window.innerHeight < 0.4)
                                return;
                        }
                        $scope.disable = !0;
                        $http.post('{{route('getLastRecentlyMain')}}', {}).then(function (response) {
                            if (response.data != null && response.data.length > 0)
                                $scope.show = !0;
                            for (i = 0; i < response.data.length; i++) {
                                response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
                            }
                            $scope.data = response.data
                        }).catch(function (err) {
                            console.log(err)
                        })
                    }
                });

                app.controller('AdviceController', function ($scope, $http) {
                    $scope.show = !1;
                    $scope.disable = !1;
                    $scope.myPagingFunction = function () {

                        if ($scope.disable)
                            return;

                        var top = $("#AdviceControllerId").position().top;
                        var scroll = $(window).scrollTop() + window.innerHeight;

                        if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
                            return;

                        $('.loader').removeClass('hidden');

                        $scope.disable = !0;
                        $http.post('{{route('getAdviceMain')}}', data, config).then(function (response) {
                            if (response.data != null && response.data.length > 0)
                                $scope.show = !0;
                            for (i = 0; i < response.data.length; i++) {
                                response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
                            }
                            $scope.data = response.data;

                            $('.loader').addClass('hidden');
                        }).catch(function (err) {
                            console.log(err)
                        })
                    }
                });

                app.controller('HotelController', function ($scope, $http) {
                    $scope.show = !1;
                    $scope.disable = !1;
                    $scope.firstTime = true;

                    $scope.myPagingFunction = function () {
                        if ($scope.disable)
                            return;
                        var top = $("#HotelControllerId").position().top;
                        var scroll = $(window).scrollTop() + window.innerHeight;

                        if($scope.firstTime) {
                            $scope.firstTime = false;
                            if(top > scroll)
                                return;
                        }
                        else {
                            if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
                                return;
                        }

                        $scope.disable = !0;
                        $http.post('{{route('getHotelsMain')}}', data, config).then(function (response) {
                            if (response.data != null && response.data.length > 0)
                                $scope.show = !0;
                            for (i = 0; i < response.data.length; i++) {
                                response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
                            }
                            $scope.data = response.data
                        }).catch(function (err) {
                            console.log(err)
                        })
                    }
                });

                app.controller('AmakenController', function ($scope, $http) {
                    $scope.show = !1;
                    $scope.disable = !1;
                    $scope.firstTime = true;

                    $scope.myPagingFunction = function () {
                        if ($scope.disable)
                            return;
                        var top = $("#AmakenControllerId").position().top;
                        var scroll = $(window).scrollTop() + window.innerHeight;

                        if($scope.firstTime) {
                            $scope.firstTime = false;
                            if(top > scroll)
                                return;
                        }
                        else {
                            if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
                                return;
                        }
                        $scope.disable = !0;
                        $http.post('{{route('getAmakensMain')}}', data, config).then(function (response) {
                            if (response.data != null && response.data.length > 0)
                                $scope.show = !0;
                            for (i = 0; i < response.data.length; i++) {
                                response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
                            }
                            $scope.data = response.data
                        }).catch(function (err) {
                            console.log(err)
                        })
                    }
                });
                app.controller('RestaurantController', function ($scope, $http) {
                    $scope.show = !1;
                    $scope.disable = !1;
                    $scope.firstTime = true;

                    $scope.myPagingFunction = function () {
                        if ($scope.disable)
                            return;
                        var top = $("#RestaurantControllerId").position().top;
                        var scroll = $(window).scrollTop() + window.innerHeight;
                        if($scope.firstTime) {
                            $scope.firstTime = false;
                            if(top > scroll)
                                return;
                        }
                        else {
                            if (scroll < top || (scroll - top) / window.innerHeight < 0.6)
                                return;
                        }
                        $scope.disable = !0;
                        $http.post('{{route('getRestaurantsMain')}}', data, config).then(function (response) {
                            if (response.data != null && response.data.length > 0)
                                $scope.show = !0;
                            for (i = 0; i < response.data.length; i++) {
                                response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
                            }
                            $scope.data = response.data
                        }).catch(function (err) {
                            console.log(err)
                        })
                    }
                });
                app.controller('FoodController', function ($scope, $http) {
                    $scope.show = !1;
                    $scope.disable = !1;
                    $scope.myPagingFunction = function () {
                        if ($scope.disable)
                            return;
                        var top = $("#FoodControllerId").position().top;
                        var scroll = $(window).scrollTop() + window.innerHeight;

                        if($scope.firstTime) {
                            $scope.firstTime = false;
                            if(top > scroll)
                                return;
                        }
                        else {
                            if (scroll < top || (scroll - top) / window.innerHeight < 0.2)
                                return;
                        }
                        $scope.disable = !0;
                        $http.post('{{route('getFoodsMain')}}', data, config).then(function (response) {
                            if (response.data != null && response.data.length > 0)
                                $scope.show = !0;
                            for (i = 0; i < response.data.length; i++) {
                                response.data[i].classRate = (response.data[i].rate == 0) ? 'ui_bubble_rating bubble_00' : (response.data[i].rate == 1) ? 'ui_bubble_rating bubble_10' : (response.data[i].rate == 2) ? 'ui_bubble_rating bubble_20' : (response.data[i].rate == 3) ? 'ui_bubble_rating bubble_30' : (response.data[i].rate == 4) ? 'ui_bubble_rating bubble_40' : 'ui_bubble_rating bubble_50'
                            }
                            $scope.data = response.data
                        }).catch(function (err) {
                            console.log(err)
                        })
                    }
                })
            })()
        </script>

        <script async>
            var currIdx, newElement, thisVal, imgPath = ["1.jpg", "2.jpg", "3.jpg", "4.jpg"],
                    titles = ["گیلان", "بندر ترکمن", "قشم", "گردنه حیران"],
                    photoGraphers = [" ", "عکس از علی مهدی حقدوست", "عکس از منصور وحدانی", "عکس از مصطفی قوینامین"], options = {
                        slider_Wrap: "#pbSlider0",
                        slider_Threshold: 10,
                        slider_Speed: 600,
                        slider_Ease: "ease-out",
                        slider_Drag: !0,
                        slider_Arrows: {enabled: !0},
                        slider_Dots: {class: ".o-slider-pagination", enabled: !0, preview: !0},
                        slider_Breakpoints: {
                            default: {height: 500},
                            tablet: {height: 350, media: 1024},
                            smartphone: {height: 250, media: 768}
                        }
                    }, slider_Opts = $.extend({
                        slider_Wrap: "pbSlider0",
                        slider_Item: ".o-slider--item",
                        slider_Drag: !0,
                        slider_Dots: {class: ".o-slider-pagination", enabled: !0, preview: !0},
                        slider_Arrows: {class: ".o-slider-arrows", enabled: !0},
                        slider_Threshold: 25,
                        slider_Speed: 1e3,
                        slider_Ease: "cubic-bezier(0.5, 0, 0.5, 1)",
                        slider_Breakpoints: {
                            default: {height: 500},
                            tablet: {height: 400, media: 1024},
                            smartphone: {height: 300, media: 768}
                        }
                    }, options), pbSlider = {};

            function changeSlider(e) {
                $(".o-slider--item").removeClass("isActive"), $("#sliderItem_" + e).addClass("isActive")
            }

            pbSlider.slider_Wrap = slider_Opts.slider_Wrap, pbSlider.slider_Item = slider_Opts.slider_Item, pbSlider.slider_Dots = slider_Opts.slider_Dots, pbSlider.slider_Threshold = slider_Opts.slider_Threshold, pbSlider.slider_Active = 0, pbSlider.slider_Count = 0, pbSlider.slider_NavWrap = '<div class="o-slider-controls"></div>', pbSlider.slider_NavPagination = '<ul class="o-slider-pagination"></ul>', pbSlider.slider_NavArrows = '<ul class="o-slider-arrows"><li class="o-slider-prev"><span class="icon-left-open-big"></span></li><li class="o-slider-next"><span class="icon-right-open-big"></span></li></ul>';
            var loaderHtml = '<div class="loaderWrap"><div class="ball-scale-multiple"><div></div><div></div><div></div><div></div></div></div>';

            function pbTouchSlider() {
                for (newElement = "<div class='o-sliderContainer' id='pbSliderWrap0' style='margin-top: 0'>", newElement += "<div class='o-slider' style='display: block !important;' id='pbSlider0'></div></div", $("#sliderBarDIV").append(newElement), pbSlider.pbInit = function (e) {
                    pbSlider.slider_Draggable = e, pbSlider.slider_Count = $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).length, $("#pbSliderWrap0").css("width", 100 * pbSlider.slider_Count + "%");
                    for (var i = 0; i < pbSlider.slider_Count; i++) $("#sliderItem_" + i).css({width: 100 / pbSlider.slider_Count + "%"});
                    var r = 0;
                    if ($(pbSlider.slider_Wrap).find(pbSlider.slider_Item).each(function () {
                                $(this).attr("data-id", "slide-" + r++)
                            }), !0 !== slider_Opts.slider_Arrows.enabled && !0 !== slider_Opts.slider_Dots.enabled || $(pbSlider.slider_Wrap).append(pbSlider.slider_NavWrap), !0 === slider_Opts.slider_Arrows.enabled && $(pbSlider.slider_Wrap).append(pbSlider.slider_NavArrows), !0 === slider_Opts.slider_Dots.enabled) {
                        var l = 0;
                        for ($(pbSlider.slider_Wrap).append(pbSlider.slider_NavPagination); l < pbSlider.slider_Count; l++) {
                            var d = l === pbSlider.slider_Active ? ' class="isActive"' : "", s = 'data-increase="' + [l] + '"',
                                    a = $(pbSlider.slider_Wrap).find("[data-id='slide-" + l + "']").attr("data-image");
                            !0 === slider_Opts.slider_Dots.preview ? $(pbSlider.slider_Wrap).find(pbSlider.slider_Dots.class).append("<li " + d + " " + s + '><span class="o-slider--preview" style="background-image:url(' + a + ')"></span></li>') : $(pbSlider.slider_Wrap).find(pbSlider.slider_Dots.class).append("<li " + d + " " + s + "></li>")
                        }
                    }
                    setTimeout(function () {
                        $(pbSlider.slider_Item + "[data-id=slide-" + pbSlider.slider_Active + "]").addClass("isActive")
                    }, 400), $(pbSlider.slider_Wrap + " .o-slider-pagination li").on("click", function () {
                        var e = $(this).attr("data-increase");
                        $(this).hasClass("isActive") || pbSlider.pbGoslide(e)
                    }), $(pbSlider.slider_Wrap + " .o-slider-prev").addClass("isDisabled"), $(pbSlider.slider_Wrap + " .o-slider-arrows li").on("click", function () {
                        $(this).hasClass("o-slider-next") ? pbSlider.pbGoslide(pbSlider.slider_Active + 1) : pbSlider.pbGoslide(pbSlider.slider_Active - 1)
                    })
                }, pbSlider.pbGoslide = function (e) {
                    if ($(pbSlider.slider_Wrap + " .o-slider-arrows li").removeClass("isDisabled"), e < 0 ? pbSlider.slider_Active = 0 : e > pbSlider.slider_Count - 1 ? pbSlider.slider_Active = pbSlider.slider_Count - 1 : pbSlider.slider_Active = e, pbSlider.slider_Active >= pbSlider.slider_Count - 1) {
                        $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).first();
                        $(pbSlider.slider_Wrap + " .o-slider-next").addClass("isDisabled")
                    } else pbSlider.slider_Active <= 0 ? $(pbSlider.slider_Wrap + " .o-slider-prev").addClass("isDisabled") : $(pbSlider.slider_Wrap + " .o-slider-arrows li").removeClass("isDisabled");
                    pbSlider.slider_Active != pbSlider.slider_Count - 1 && 0 != pbSlider.slider_Active && $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).addClass("isMoving"), $(pbSlider.slider_Item).css("transform", ""), pbSlider.slider_Draggable = "#sliderItem_" + e, $(pbSlider.slider_Draggable).addClass("isAnimate");
                    var i = -100 * pbSlider.slider_Active;
                    if ($(pbSlider.slider_Draggable).css({
                                perspective: "1000px",
                                "backface-visibility": "hidden",
                                transform: "translateX( " + i + "% )"
                            }), clearTimeout(pbSlider.timer), pbSlider.timer = setTimeout(function () {
                                $(pbSlider.slider_Wrap).find(pbSlider.slider_Draggable).removeClass("isAnimate"), $(pbSlider.slider_Wrap).find(pbSlider.slider_Item).removeClass("isActive").removeClass("isMoving"), $(pbSlider.slider_Wrap).find(pbSlider.slider_Item + "[data-id=slide-" + pbSlider.slider_Active + "]").addClass("isActive"), $(pbSlider.slider_Wrap + " .o-slider--item img").css("transform", "translateX(0px )")
                            }, slider_Opts.slider_Speed), !0 === slider_Opts.slider_Dots.enabled) {
                        for (var r = $(pbSlider.slider_Wrap).find(pbSlider.slider_Dots.class + " > *"), l = 0; l < r.length; l++) {
                            var d = l == pbSlider.slider_Active ? "isActive" : "";
                            $(pbSlider.slider_Wrap).find(r[l]).removeClass("isActive").addClass(d), $(pbSlider.slider_Wrap).find(r[l]).children().removeClass("isActive").addClass(d)
                        }
                        setTimeout(function () {
                            $(pbSlider.slider_Wrap).find(r).children().removeClass("isActive")
                        }, 500)
                    }
                    pbSlider.slider_Active = Number(pbSlider.slider_Active)
                }, pbSlider.auto = function () {
                    pbSlider.autoTimer = setInterval(function () {
                        pbSlider.slider_Active >= pbSlider.slider_Count - 1 ? pbSlider.pbGoslide(0) : $(pbSlider.slider_Wrap + " .o-slider-next").trigger("click")
                    }, 3e3)
                }, currIdx = 0; currIdx < 4; currIdx++) {
                    thisVal = "#sliderItem_" + currIdx, newElement = "<div class='o-slider--item' id='sliderItem_" + currIdx + "' data-image='{{URL::asset('images') . '/'}}" + imgPath[currIdx] + "' style='background-image: url(\"{{URL::asset('images') . '/'}}" + imgPath[currIdx] + "\");'>", newElement += "<div class='o-slider-textWrap'>", newElement += "<span class='a-divider'></span>", newElement += "<h2 class='o-slider-subTitle'>" + titles[currIdx] + "</h2>", newElement += "<span class='a-divider'></span>", newElement += "<p class='o-slider-paragraph'>" + photoGraphers[currIdx] + "</p>", newElement += "</div></div>", $("#pbSlider0").append(newElement), 0 == currIdx && $("head").append("<style>" + pbSlider.slider_Wrap + " .o-slider.isAnimate{-webkit-transition: all " + slider_Opts.slider_Speed + "ms " + slider_Opts.slider_Ease + ";transition: all " + slider_Opts.slider_Speed + "ms " + slider_Opts.slider_Ease + ";</style>"), setTimeout(function () {
                        var e = $(slider_Opts.slider_Wrap + " .loaderWrap");
                        $(e).hide()
                    }, 200), $(pbSlider.slider_Wrap + " .o-slider-controls").addClass("isVisible"), $(pbSlider.slider_Draggable).addClass("isVisible");
                    var e = document.documentElement.clientWidth;
                    e >= slider_Opts.slider_Breakpoints.tablet.media ? $(pbSlider.slider_Wrap + ".o-sliderContainer," + pbSlider.slider_Wrap + " " + pbSlider.slider_Item).css({height: slider_Opts.slider_Breakpoints.default.height}) : e >= slider_Opts.slider_Breakpoints.smartphone.media ? $(pbSlider.slider_Wrap + ".o-sliderContainer," + pbSlider.slider_Wrap + " " + pbSlider.slider_Item).css({height: slider_Opts.slider_Breakpoints.tablet.height}) : $(pbSlider.slider_Wrap + ".o-sliderContainer," + pbSlider.slider_Wrap + " " + pbSlider.slider_Item).css({height: slider_Opts.slider_Breakpoints.smartphone.height}), 3 == currIdx && pbSlider.pbInit(thisVal)
                }
            }

            $(slider_Opts.slider_Wrap).each(function () {
                $("#pbSlider0").append(loaderHtml)
            }), pbTouchSlider();
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
        <script src=""/>

        <script>
            var imageBasePath = '{{URL::asset('images')}}';
        </script>
        <script async src="{{URL::asset('js/slideBar.js')}}"/>

        <span id="statePane" class="ui_overlay ui_modal editTags hidden"
              style="position: fixed; left: 30%; right: 30%; top:19%; bottom: auto;overflow: auto;max-height: 500px;z-index: 10000001;">

            <div class="header_text">استان مورد نظر</div>
            <div class="subheader_text">
           استان مورد نظر خود را از بین استان های موجود انتخاب کنید
            </div>
            <div class="body_text">

                <select style="margin-top: 25px;" id="states"></select>

                <div style="margin-top: 25px;" class="submitOptions">
                    <button onclick="document.location.href = $('#states').val()"
                            style="color: #FFF;background-color: #4dc7bc;border-color:#4dc7bc;"
                            class="btn btn-success">تایید</button>
                    <input type="submit" onclick="$('.dark').hide(); $('#statePane').addClass('hidden')" value="خیر"
                           class="btn btn-default">
                </div>
            </div>
            <div onclick="$('#statePane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
        </span>

        <span id="statePane2" class="ui_overlay ui_modal editTags hidden"
              style="position: fixed; left: 30%; right: 30%; top:19%; bottom: auto;overflow: auto;max-height: 500px;z-index: 10000001;">

            <div class="header_text">شهر مورد نظر</div>
            <div class="subheader_text">
           شهر مورد نظر خود را از بین شهر های موجود انتخاب کنید
            </div>
            <div class="body_text">

                <select style="margin-top: 25px;" onchange="getCities()" id="states2"></select>

                <select style="margin-top: 25px;" id="cities"></select>

                <div style="margin-top: 25px;" class="submitOptions">
                    <button onclick="document.location.href = $('#cities').val()"
                            style="color: #FFF;background-color: #4dc7bc;border-color:#4dc7bc;"
                            class="btn btn-success">تایید</button>
                    <input type="submit" onclick="$('.dark').hide(); $('#statePane2').addClass('hidden')" value="خیر"
                           class="btn btn-default">
                </div>
            </div>
            <div onclick="$('#statePane2').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
        </span>

        <span id="goyeshPane" class="ui_overlay ui_modal editTags hidden" style="position: fixed; left: 30%; right: 30%; top:19%; bottom: auto;overflow: auto;max-height: 500px;z-index: 10000001;">
            <div class="header_text">گویش مورد نظر</div>
            <div class="subheader_text">
           گویش مورد نظر خود را از بین گویش های موجود انتخاب کنید
            </div>
            <div class="body_text">

                <select style="margin-top: 25px;" id="goyesh"></select>

                <div style="margin-top: 25px;" class="submitOptions">
                    <button onclick="document.location.href = $('#goyesh').val()"
                            style="color: #FFF;background-color: #4dc7bc;border-color:#4dc7bc;"
                            class="btn btn-success">تایید</button>
                    <input type="submit" onclick="$('.dark').hide(); $('#goyeshPane').addClass('hidden')" value="خیر"
                           class="btn btn-default">
                </div>
            </div>
            <div onclick="$('#goyeshPane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
        </span>

        <div class="ui_backdrop dark" style="display: none; z-index: 10000000;"></div>

        <script src="{{URL::asset('js/adv.js')}}"></script>
    </body>
</html>

