<?php $kindPlaceId = 4; $placeMode = 4; $state = 2; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.topHeader')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <title>صفحه اصلی</title>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/icons.css?v=1')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/mainPageModifiedStyles.css')}}' />

    <script>
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

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging">

<div class="header hideOnPhone">
    @include('layouts.placeHeader')
</div>
<div class="ui_container" style="background-color: white; direction: rtl;">
    <div class="border-bottom-grey" style="text-align: right; background-color: white; padding: 5px 0px 7px;">
        <div style="font-size: 0.8em; font-weight: 500">
            <div style="display: inline-block">شهر مقصد</div>
            <div style="display: inline-block"> < </div>
            <div style="display: inline-block">نام استان</div>
            <div class="ui_close_x" style="left: 30px !important; top: 15px !important;"></div>
        </div>
        <div style="margin-top: 20px; font-size: 1.5em; font-weight: 800">شهر مقصد</div>
    </div>
    <div class="row">
        <div class="col-lg-4" style="text-align: right;">
            <div style="font-weight: 500">تازه های گردشنامه</div>
            <div style="position: relative">
                <div style="width: 100%; height: 40vh;">

                </div>
                <div style="position: absolute; bottom: 0; padding: 10px;">
                    <div style="font-size: 0.9em; padding: 2px; background-color: gray; width: 25%; text-align: center; margin: 5px; border-radius: 3px; opacity: .9; color: white;">
                        استان گیلان
                    </div>
                    <div>
                        مناره گسکر یا مناره بازار، یکی از زیباترین و با شکوه ترین بناهای به جا مانده از دوره سلجوقی
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 border-left-grey">
            <div class="row" style="background-color: #e5e5e5; margin-right: 0;">
                <div class="col-xs-5" style="padding: 15px 0 !important;">
                    <div class="col-xs-12">
                        <a class="col-xs-4 cityPageLittleMenu" href="{{route('mainMode', ['mode' => 'amaken'])}}" style="color: #30b4a6 !important;">
                            <div class="cityPageIcon atraction"></div>
                            <div class="textCityPageIcon">جاذبه ها</div>
                        </a>
                        <a class="col-xs-4 cityPageLittleMenu" href="{{route('tickets')}}" style="color: #30b4a6 !important;">
                            <div class="cityPageIcon ticket"></div>
                            <div class="textCityPageIcon">بلیط</div>
                        </a>
                        <a class="col-xs-4 cityPageLittleMenu" href="{{route('main')}}" style="color: #30b4a6 !important;">
                            <div class="cityPageIcon hotel"></div>
                            <div class="textCityPageIcon">هتل</div>
                        </a>
                    </div>
                    <div style="clear: both"></div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 cityPageLittleMenu">
                            <div class="cityPageIcon ghazamahali"></div>
                            <div class="textCityPageIcon">غذای محلی</div>
                        </div>
                        <div class="col-xs-4 cityPageLittleMenu">
                            <div class="cityPageIcon soghat"></div>
                            <div class="textCityPageIcon">سوغات</div>
                        </div>
                        <a class="col-xs-4 cityPageLittleMenu" href="{{route('mainMode', ['mode' => 'restaurant'])}}" style="color: #30b4a6 !important;">
                            <div class="cityPageIcon restaurant"></div>
                            <div class="textCityPageIcon">رستوران</div>
                        </a>
                    </div>
                    <div style="clear: both"></div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 cityPageLittleMenu">
                            <div class="cityPageIcon lebas"></div>
                            <div class="textCityPageIcon">لباس محلی</div>
                        </div>
                        <div class="col-xs-4 cityPageLittleMenu">
                            <div class="cityPageIcon sanaye"></div>
                            <div class="textCityPageIcon">صنایع دستی</div>
                        </div>

                        <div class="col-xs-4 cityPageLittleMenu">
                            <div class="cityPageIcon majara"></div>
                            <div class="textCityPageIcon">ماجراجویی</div>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 cityPageLittleMenu"></div>
                        <div class="col-xs-4 cityPageLittleMenu">
                            <div class="cityPageIcon estelah"></div>
                            <div class="textCityPageIcon">اصطلاحات محلی</div>
                        </div>
                        <div class="col-xs-4 cityPageLittleMenu">
                            <div class="cityPageIcon boom"></div>
                            <div class="textCityPageIcon">بوم گردی</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-7">

                </div>
            </div>
            <div>
                 لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگر ها و متون بلکه روزنامه و مجله در ستون و سطر آنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز وکاربرد های متنوع با هدف بهبود ابزار های کاربردی می باشد. کتاب های زیادی در شصت و سه درصد گزشته، را می طلبد
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

<script>
    var imageBasePath = '{{URL::asset('images')}}';
    var getLastRecentlyMainPath = '{{route('getLastRecentlyMain')}}';
    var getAdviceMainPath = '{{route('getAdviceMain')}}';
    var getHotelsMainPath = '{{route('getHotelsMain')}}';
    var getAmakensMainPath = '{{route('getAmakensMain')}}';
    var getRestaurantsMainPath = '{{route('getRestaurantsMain')}}';
    var getFoodsMainPath = '{{route('getFoodsMain')}}';
    var getCitiesDir = "{{route('getCitiesDir')}}";

    var config = {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    };
</script>

<script defer src="{{URL::asset('js/mainPageSuggestions.js')}}"></script>

<script async src="{{URL::asset('js/middleBanner.js')}}"></script>

<script async src="{{URL::asset('js/slideBar.js')}}"></script>

<span id="statePane1" class="statePane ui_overlay ui_modal editTags hidden pop-up-Panes">

            <div class="header_text">استان مورد نظر</div>
            <div class="subheader_text">
           استان مورد نظر خود را از بین استان های موجود انتخاب کنید
            </div>
            <div class="body_text">

                <select  id="states"></select>

                <div class="submitOptions">
                    <button onclick="document.location.href = $('#states').val()" class="btn btn-success">تایید</button>
                    <input type="submit" onclick="$('.dark').hide(); $('#statePane').addClass('hidden')" value="خیر" class="btn btn-default">
                </div>
            </div>
            <div onclick="$('#statePane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
        </span>

<span id="statePane2" class="statePane ui_overlay ui_modal editTags hidden pop-up-Panes">

            <div class="header_text">شهر مورد نظر</div>
            <div class="subheader_text">
           شهر مورد نظر خود را از بین شهر های موجود انتخاب کنید
            </div>
            <div class="body_text">

                <select  onchange="getCities()" id="states2"></select>

                <select  id="cities"></select>

                <div class="submitOptions">
                    <button onclick="document.location.href = $('#cities').val()" class="btn btn-success">تایید</button>
                    <input type="submit" onclick="$('.dark').hide(); $('#statePane2').addClass('hidden')" value="خیر" class="btn btn-default">
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
                    <input type="submit" onclick="$('.dark').hide(); $('#goyeshPane').addClass('hidden')" value="خیر" class="btn btn-default">
                </div>
            </div>
            <div onclick="$('#goyeshPane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
        </span>

<div class="ui_backdrop dark" id="darkModeMainPage"></div>

<script src="{{URL::asset('js/adv.js')}}"></script>
</body>
</html>

