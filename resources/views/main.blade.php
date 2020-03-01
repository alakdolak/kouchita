<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.topHeader')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    {{--<meta name="description" content="متن توضیحات متا"/>--}}
    {{--<meta name="keywords" content="کیورد 1, کیورد دو, کی ورد سه">--}}
    <meta property="og:locale" content="fa_IR" />
    {{--<meta property="og:locale:alternate" content="fa_IR" />--}}
    <meta property="og:type" content="website" />
    <title> کوچیتا، سامانه جامع گردشگری ایران </title>
    <meta name="title" content="کوچیتا | سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران" />
    <meta name='description' content='کوچیتا، سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران. اطلاعات اماکن و جاذبه ها، هتل ها، بوم گردی، ماجراجویی، آموزش سفر، فروشگاه صنایع دستی ، پادکست سفر' />
    <meta name='keywords' content='کوچیتا، هتل، تور ، سفر ارزان، سفر در ایران، بلیط، تریپ، نقد و بررسی، سفرنامه، کمپینگ، ایران گردی، آموزش سفر، مجله گردشگری، مسافرت، مسافرت داخلی, ارزانترین قیمت هتل ، مقایسه قیمت ، بهترین رستوران ها ، بلیط ارزان ، تقویم تعطیلات' />
    <meta property="og:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:secure_url" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:width" content="550"/>
    <meta property="og:image:height" content="367"/>
    <meta name="twitter:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>


    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>

    <script src="{{URL::asset('js/main/middleBanner.js')}}"></script>

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

<body class="rebrand_2017 desktop HomeRebranded  js_logging" ng-app="mainApp" style="background-color: #EAFBFF;">

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
                                <div id="mainSlider" class="swiper-container backgroundColorForSlider">
                                    <div class="swiper-wrapper">
                                    @foreach($sliderPic as $item)
                                        <div class="swiper-slide mobileHeight" style="position: relative; background: none;">
                                            <img src="{{$item->pic}}" style="height: 100%; position: absolute; left: 0px;">
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
                                        <div onclick="openMainSearch(0)">به کجا می‌روید؟</div>
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div style="position: absolute; right: 1%; top: 30%; z-index: 9; font-size: 35px">
                                    <div class="console-container">
                                        <span id='text'></span>
                                    </div>
                                </div>

                            </div>

                            <div class="ppr_rup ppr_priv_trip_search display-none hideOnScreen">
                                <!-- Swiper -->
                                <div id="mainSlider" class="swiper-container backgroundColorForSlider">
                                    <div class="swiper-wrapper">
                                        @foreach($sliderPic as $item)
                                            <div class="swiper-slide mobileHeight" style="position: relative; background: none;">
                                                <img src="{{$item->pic}}" style="position: absolute; left: 0px; bottom: 0px;">
                                            </div>
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

                    <div id="firstPanSearchText" class="spGoWhere">به کجا</div>
                    <input onkeyup="search(event, this.value)" type="text" id="placeName" class="typeahead_input searchPaneInput" placeholder="دوست دارید سفر کنید؟"/>
                    <input type="hidden" id="kindPlaceIdForMainSearch" value="0">
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

    function openMainSearch(_kindPlaceId){
        var fpst;
        var pn;
        switch (_kindPlaceId){
            case 0:
                fpst = 'به کجا';
                pn = 'دوست دارید سفر کنید؟';
                break;
            case 1:
                fpst = 'کدام جاذبه';
                pn = 'را می‌خواهید تجربه کنید؟';
                break;
            case 3:
                fpst = 'در کدام رستوران';
                pn = 'دوست دارید غذا بخورید؟';
                break;
            case 4:
                fpst = 'در کدام هتل';
                pn = 'دوست دارید اقامت کنید؟';
                break;
            case 10:
                fpst = 'کدام صنایع‌دستی یا سوغات ';
                pn = 'را دوست دارید بشناسید؟';
                break;
            case 11:
                fpst = 'کدام غذای محلی';
                pn = 'را می‌خواهید تجربه کنید؟';
                break;
        }

        $('#kindPlaceIdForMainSearch').val(_kindPlaceId);
        $('#firstPanSearchText').text(fpst);
        $('#placeName').attr('placeholder', pn);

        $('#searchPane').removeClass('hidden');
        $('#darkModeMainPage').toggle();
        $('#placeName').val('');
        $('#placeName').focus();

        $("#result").empty();
    }

    function redirect() {
        "" != $("#placeId").val() && (document.location.href = $("#placeId").val())
    }

    function search(e, val = '') {
        if (val == '')
            val = $("#placeName").val();

        var kindPlaceId = $('#kindPlaceIdForMainSearch').val();

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
                        kindPlaceId: kindPlaceId,
                        key: val,
                        key2: val2,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        createSearchResponse(response);
                    }
                })
            }
            else $.ajax({
                type: "post",
                url: searchDir,
                data: {
                    kindPlaceId: kindPlaceId,
                    key: val,
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    createSearchResponse(response);
                }
            })
        }

    }

    function createSearchResponse(response){
        newElement = "";

        if (response.length == 0) {
            newElement = "موردی یافت نشد";
            $("#placeId").val("");
            return;
        }

        response = JSON.parse(response);
        currIdx = -1;
        suggestions = response;

        var icon;
        for (i = 0; i < response.length; i++) {
            if (response[i].mode == "state") {
                newElement += '<a href="' + response[i].url + '" style="color: black;"><div class="icons location spIcons"></div>\n';
                newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "'>استان " + response[i].targetName + "</p></a>";
            }
            else if (response[i].mode == "city") {
                newElement += '<a href="' + response[i].url + '" style="color: black;"><div class="icons location spIcons"></div>\n';
                newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' style='margin: 0px'>شهر " + response[i].targetName + "</p>";
                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "'>" + response[i].stateName + "</p></a>";
            }
            else {
                if (response[i].mode == 'amaken')
                    icon = 'touristAttractions';
                else if (response[i].mode == 'restaurant')
                    icon = 'touristAttractions';
                else if (response[i].mode == 'hotel')
                    icon = 'hotelIcon';
                else if (response[i].mode == 'sogatSanaies')
                    icon = 'souvenirIcon';
                else if (response[i].mode == 'mahaliFood')
                    icon = 'traditionalFood';
                else if (response[i].mode == 'majara')
                    icon = 'adventure';

                newElement += '<a href="' + response[i].url + '" style="color: black;"><div class="icons ' + icon + ' spIcons"></div>\n';
                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' style='margin: 0px'>" + response[i].targetName + "</p>";
                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "'>" + response[i].cityName + " در " + response[i].stateName + "</p></a>";
            }
        }

        if (response.length != 0)
            $('#result').removeClass('display-noneImp')
        else
            $('#result').addClass('display-noneImp');

        $("#result").empty().append(newElement);
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

</script>

<script async src="{{URL::asset('js/middleBanner.js')}}"></script>

<script async src="{{URL::asset('js/slideBar.js')}}"></script>

<script src="{{URL::asset('js/adv.js')}}"></script>

<script defer src="{{URL::asset('js/mainPageSuggestions.js')}}"></script>

<!-- Initialize Swiper Of mainSlider -->
<script>
    var mainSliderPics = {!! $sliderPic !!};

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

    swiper.on('slideChange', function(){
        $('.backgroundColorForSlider').css('background-color', mainSliderPics[swiper.realIndex]['textBackground'])
        consoleText(mainSliderPics[swiper.realIndex]['text'], 'text', 'black');
    });

    var setInterText = 0;
    consoleText(mainSliderPics[0]['text'], 'text', 'black');
    $('.backgroundColorForSlider').css('background-color', mainSliderPics[0]['textBackground']);
    function consoleText(words, id, colors) {
        document.getElementById('text').innerHTML = '';

        if(setInterText != 0)
            clearInterval(setInterText);

        document.getElementById(id).innerHTML = '';
        if (colors === undefined) colors = ['#fff'];
        var visible = true;
        var con = document.getElementById('console');
        var letterCount = 1;
        var x = 1;
        var waiting = false;
        var target = document.getElementById(id);
        target.setAttribute('style', 'color:' + colors);

        setInterText = window.setInterval(function() {
            if (letterCount === 0 && waiting === false) {
                waiting = true;
                target.innerHTML = words.substring(0, letterCount);
                window.setTimeout(function() {
                    var usedColor = colors.shift();
                    colors.push(usedColor);
                    var usedWord = words.shift();
                    words.push(usedWord);
                    x = 1;
                    target.setAttribute('style', 'color:' + color)
                    letterCount += x;
                    waiting = false;
                }, 10)
            }
            else if (waiting === false) {
                target.innerHTML = words.substring(0, letterCount);
                letterCount += x;
            }
        }, 100);
    }

</script>

</body>
</html>

