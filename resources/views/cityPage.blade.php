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
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/cityPage.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('mainPageStyles.css')}}'/>

    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/article.min.css?v=1.1')}}"/>

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
        {{--css of left side--}}
        .widget ul li {
            position: relative;
            margin: 20px 0 40px;
        }

        /*css of {ng-app="mainApp"}*/
        .homepage_shelves_widget {
            min-height: 0px;
        }

        .image_wrapper {
            height: 130px;
        }

        .map_list {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
            background-color: #f3f3f3;
        }

        .map_category {
            width: 50px;
            cursor: pointer;
        }
    </style>
</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging">

<div class="header hideOnPhone">
    @include('layouts.placeHeader')
</div>
<div class="ui_container cpBody">
    <div class="cpBorderBottom cpHeader">
        <div class="cpHeaderRouteOfCityName">
            <span>استان {{$city->state}}</span>
            <span> > </span>
            <span>شهر {{$city->name}}</span>
            {{--<div class="ui_close_x" style="left: 30px !important; top: 15px !important;"></div>--}}
        </div>
        <div class="cpHeaderCityName">شهر {{$city->name}}</div>
    </div>
    <div class="row">
        <div class="col-lg-9 cpBorderLeft">
            <div class="row cpMainBox">
                <div class="col-xs-8 pd-0Imp">
                    <img class="cpPic" src="{{URL::asset('_images/city/'.$city->image)}}">
                </div>
                <div class="col-xs-4 pd-0Imp">
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('hotelList/' . $city->name . '/city')}}">
                            <div class="cityPageIcon hotel"></div>
                            <div class="textCityPageIcon">هتل</div>
                            <div class="textCityPageIcon">{{count($allHotels)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{route('tickets')}}">
                            <div class="cityPageIcon ticket"></div>
                            <div class="textCityPageIcon">بلیط</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('amakenList/' . $city->name . '/city')}}">
                            <div class="cityPageIcon atraction"></div>
                            <div class="textCityPageIcon">جاذبه ها</div>
                            <div class="textCityPageIcon">{{count($allAmaken)}}</div>
                        </a>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('restaurantList/' . $city->name . '/city')}}">
                            <div class="cityPageIcon restaurant"></div>
                            <div class="textCityPageIcon">رستوران</div>
                            <div class="textCityPageIcon">{{count($allRestaurant)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('/adab-list/' . $city->state . '/soghat')}}">
                            <div class="cityPageIcon soghat"></div>
                            <div class="textCityPageIcon">سوغات</div>
                            <div class="textCityPageIcon">{{$city->soghat_count}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('/adab-list/' . $city->state . '/ghazamahali')}}">
                            <div class="cityPageIcon ghazamahali"></div>
                            <div class="textCityPageIcon">غذای محلی</div>
                            <div class="textCityPageIcon">{{$city->ghazamahali_count}}</div>
                        </a>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('/majaraList/' . $city->name . '/city')}}">
                            <div class="cityPageIcon majara"></div>
                            <div class="textCityPageIcon">ماجراجویی</div>
                            <div class="textCityPageIcon">{{count($allMajara)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('/adab-list/' . $city->state . '/sanaye')}}">
                            <div class="cityPageIcon sanaye"></div>
                            <div class="textCityPageIcon">صنایع دستی</div>
                            <div class="textCityPageIcon">{{$city->sanaye_count}}</div>
                        </a>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon lebas"></div>
                            <div class="textCityPageIcon">لباس محلی</div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon boom"></div>
                            <div class="textCityPageIcon">بوم گردی</div>
                        </div>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon estelah"></div>
                            <div class="textCityPageIcon">اصطلاحات محلی</div>
                        </div>
                        {{--<div class="col-xs-4 cpLittleMenu"></div>--}}
                    </div>
                </div>
            </div>
            <div class="cpDescription cpBorderBottom">
                {{$city->description}}
            </div>
            <div ng-app="mainApp" class="cpBorderBottom">
                @include('layouts.mainSuggestions')
            </div>
            <div id="outher_people" class="cpBorderBottom">
                <div class="cpTitle">دوستان شما چه می گویند</div>
                <div id="people_pic_div" class="full-width display-none">
                    <div class="cpFriendsBoxPic">
                        <div class="cpFriendsEachPic"
                             style="background: url('{{URL::asset('images') . '1.jpg'}}');"></div>
                        <div class="cpFriendsEachPic"
                             style="background: url('{{URL::asset('images') . '2.jpg'}}');"></div>
                        <div class="cpFriendsEachPic"
                             style="background: url('{{URL::asset('images') . '3.jpg'}}');"></div>
                        <div class="cpFriendsEachPic"
                             style="background: url('{{URL::asset('images') . '4.jpg'}}');"></div>
                    </div>
                    <div id="more_people_pic_button" class="cpFriendsOthersPic">
                        به اضافه
                        <br>
                        <span id="more_people_pic_count"></span>
                        <br>
                        عکس دیگر
                    </div>
                </div>
                <div class="cpFriendsFooter">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="opinion" class="col-md-10"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cpBorderBottom">
                <div class="cpMap">
                    <div id="cpMap" class="prv_map clickable full-width full-height"></div>
                </div>
                <div class="cpMapList" id="show">
                    <img class="cpMapCategory" id="hotelImg" src="{{URL::asset('images/mhotel.png')}}"
                         onclick="toggleIconInMap('hotelImg')">
                    <img class="cpMapCategory" id="restImg" src="{{URL::asset('images/mrest.png')}}"
                         onclick="toggleIconInMap('restImg')">
                    <img class="cpMapCategory" id="fastImg" src="{{URL::asset('images/mfast.png')}}"
                         onclick="toggleIconInMap('fastImg')">
                    <img class="cpMapCategory" id="musImg" src="{{URL::asset('images/matr_mus.png')}}"
                         onclick="toggleIconInMap('musImg')">
                    <img class="cpMapCategory" id="plaImg" src="{{URL::asset('images/matr_pla.png')}}"
                         onclick="toggleIconInMap('plaImg')">
                    <img class="cpMapCategory" id="shcImg" src="{{URL::asset('images/matr_shc.png')}}"
                         onclick="toggleIconInMap('shcImg')">
                    <img class="cpMapCategory" id="funImg" src="{{URL::asset('images/matr_fun.png')}}"
                         onclick="toggleIconInMap('funImg')">
                    <img class="cpMapCategory" id="advImg" src="{{URL::asset('matr_adv.png')}}"
                         onclick="toggleIconInMap('advImg')">
                    <img class="cpMapCategory" id="natImg" src="{{URL::asset('images/matr_nat.png')}}"
                         onclick="toggleIconInMap('natImg')">
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-align-right">
            {{--<div style="font-weight: 500"></div>--}}
            <div class="cpTitle">تازه های گردشنامه</div>
            <div class="position-relative">
                <?php $i = 0; ?>
                @foreach($cityPost as $post)
                    @if($i == 0)
                        <article class="im-article grid-carousel grid-2 post type-post status-publish format-standard has-post-thumbnail hentry">
                            <div class="im-entry-thumb">
                                <a class="im-entry-thumb-link"
                                   href="{{route('gardeshnameInner', ['postId' => $post->id])}}"
                                   title="{{$post->title}}">
                                    <img class="lazy-img opacity-1Imp full-width" src="{{$post->pic}}" alt="{{$post->alt}}">
                                </a>
                                <div class="im-entry-header">
                                    <div class="im-entry-category">
                                        <div class="iranomag-meta clearfix">
                                            <div class="cat-links im-meta-item">
                                                <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;"
                                                   href="" title="{{$post->category}}">{{$post->category}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="im-entry-title">
                                        <a style="color: {{$post->color}}" href="" rel="bookmark">{{$post->title}}</a>
                                    </h2>
                                    <div class="im-entry-footer">
                                        <div class="iranomag-meta clearfix">
                                            <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">{{$post->date}}</span>
                                            </div>
                                            <div class="comments-link im-meta-item">
                                                <a href="">
                                                    <i class="fa fa-comment-o"></i>
                                                    {{$post->msgs}}
                                                </a>
                                            </div>
                                            <div class="author vcard im-meta-item">
                                                <a class="url fn n">
                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                </a>

                                            </div>
                                            <div class="post-views im-meta-item">
                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @else
                        @if($i == 1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <ul>
                                            @endif
                                            <li class="widget-10104im-widgetclearfix">
                                                <figure class="im-widget-thumb">
                                                    <a href="" title="{{$post->title}}">
                                                        <img src="{{$post->pic}}" alt="{{$post->alt}}"/>
                                                    </a>
                                                </figure>
                                                <div class="im-widget-entry">
                                                    <header class="im-widget-entry-header">
                                                        <h4 class='im-widget-entry-title'>
                                                            <a style="color: {{$post->color}} !important;" href=''
                                                               title='{{$post->title}}'>{{$post->title}}</a>
                                                        </h4>
                                                    </header>
                                                    <div class="iranomag-meta clearfix">
                                                        <div class="posted-on im-meta-item">
                                                            <span class="entry-date published updated">{{$post->date}}</span>
                                                        </div>
                                                        <div class="comments-link im-meta-item">
                                                            <a href="">
                                                                <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                            </a>
                                                        </div>
                                                        <div class="author vcard im-meta-item">
                                                            <a class="url fn n">
                                                                <i class="fa fa-user"></i>{{$post->username}}
                                                            </a>
                                                        </div>
                                                        <div class="post-views im-meta-item">
                                                            <i class="fa fa-eye"></i>{{$post->seen}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($i == count($cityPost) - 1)
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    <?php $i++; ?>

                @endforeach

                <div class="row cpBorderBottom mg-0Imp">
                    <div class="col-md-12 text-align-center pd-20">
                        <button class="btn btn-success">
                            مشاهده همه مقالات
                        </button>
                    </div>
                </div>

                <div class="row mg-0Imp">
                    <div class="cpTitle">بیشترین بازدید</div>
                </div>
                <?php $i = 0; ?>
                @foreach($mostSeenPosts as $post)
                    @if($i == 0)
                        <div class="col-md-12">
                            <div class="widget">
                                <ul>
                                    @endif
                                    <li class="widget-10104im-widgetclearfix">
                                        <figure class="im-widget-thumb">
                                            <a href="" title="{{$post->title}}">
                                                <img src="{{$post->pic}}" alt="{{$post->alt}}"/>
                                            </a>
                                        </figure>
                                        <div class="im-widget-entry">
                                            <header class="im-widget-entry-header">
                                                <h4 class='im-widget-entry-title'>
                                                    <a style="color: {{$post->color}} !important;" href=''
                                                       title='{{$post->title}}'>{{$post->title}}</a>
                                                </h4>
                                            </header>
                                            <div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                    <span class="entry-date published updated">{{$post->date}}</span>
                                                </div>
                                                <div class="comments-link im-meta-item">
                                                    <a href="">
                                                        <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                    </a>
                                                </div>
                                                <div class="author vcard im-meta-item">
                                                    <a class="url fn n">
                                                        <i class="fa fa-user"></i>{{$post->username}}
                                                    </a>
                                                </div>
                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>{{$post->seen}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @if($i == count($cityPost) - 1)
                                </ul>
                            </div>
                        </div>
                    @endif

                    <?php $i++; ?>

                @endforeach

                @if(count($mostSeenPosts) != 0)
                    <div class="row mg-bt-10">
                        <div class="col-md-12 pd-20Imp text-align-center">
                            <button class="btn btn-success seeAllArticlesBtn" style="">
                                مشاهده همه مقالات
                            </button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@include('layouts.placeFooter')

<span id="statePane1" class="statePane ui_overlay ui_modal editTags hidden pop-up-Panes">

            <div class="header_text">استان مورد نظر</div>
            <div class="subheader_text">
           استان مورد نظر خود را از بین استان های موجود انتخاب کنید
            </div>
            <div class="body_text">

                <select id="states"></select>

                <div class="submitOptions">
                    <button onclick="document.location.href = $('#states').val()" class="btn btn-success">تایید</button>
                    <input type="submit" onclick="$('.dark').hide(); $('#statePane').addClass('hidden')" value="خیر"
                           class="btn btn-default">
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

@include('hotelDetailsPopUp')


@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

{{--@include('layouts.phonePopUp')--}}


{{--<script defer src="{{URL::asset('js/mainPageSuggestions.js')}}"></script>--}}
<script defer src="{{URL::asset('js/cityPage/cityPageOffer.js')}}"></script>

<script async src="{{URL::asset('js/middleBanner.js')}}"></script>

<script async src="{{URL::asset('js/slideBar.js')}}"></script>

<script src="{{URL::asset('js/adv.js')}}"></script>


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
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                            }
                            else if ("city" == response[i].mode) {
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")'>شهر " + response[i].targetName + " در " + response[i].stateName + " </p>";
                            }
                            else
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].targetName + " در " + response[i].cityName + " در " + response[i].stateName + "</p>";
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
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                        }
                        else if ("city" == response[i].mode) {
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")'>شهر " + response[i].targetName + " در " + response[i].stateName + " </p>";
                        }
                        else
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].targetName + " در " + response[i].cityName + " در " + response[i].stateName + "</p>";
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
    var getAdviceMainPath = '{{route('getAdviceCity')}}';
    var getHotelsMainPath = '{{route('getRandomHotel')}}';
    var getAmakensMainPath = '{{route('getRandomAmaken')}}';
    var getRestaurantsMainPath = '{{route('getRestaurantsMain')}}';
    {{--var getFoodsMainPath = '{{route('getRandomFood')}}';--}}
    var getCitiesDir = "{{route('getCitiesDir')}}";

    var config = {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    };

    var data = $.param({
        cityId: '{{$city->id}}',
    });
</script>

<script>
    var _token = '{!! csrf_token() !!}';
    var hasLogin = {{Auth::check() ? 1 : 0}};
    var getReportsDir = '{{route('getReports')}}';
    var sendReportDir = '{{route('sendReport2')}}';
    var opOnComment = '{{route('opOnComment')}}';


    function getCityOpinion(){
        $.ajax({
            type: 'post',
            url: '{{route("cityPage.getCityOpinion")}}',
            data:{
                '_token' : _token,
                'cityId' : '{{$city->id}}'
            },
            success: function (response){
                response = JSON.parse(response);

                if((response[0] == null || response[0].length == 0 ) && (response[1] == null || response[1].length == 0 )){
                    document.getElementById('outher_people').style.display = 'none';
                }
                else {
                    fillOpinion(response[0]);
                    fillPeoplePic(response[1]);
                }
            }
        })
    }

    function fillPeoplePic(_pics){
        if(_pics.length != 0){
            document.getElementById('people_pic_div').style.display = 'block';
            if(_pics.length > 4) {
                document.getElementById('more_people_pic_button').style.display = 'block';
                document.getElementById('more_people_pic_count').innerText = _pics.length - 4;
            }
        }
    }

    function fillOpinion(opinion){
        var newElement = '';

        for (i = 0; i < opinion.length; i++) {
            newElement += "<div class='border-bottom-grey inline-block full-width' class='review'>";
            newElement += "<div class='prw_rup prw_reviews_basic_review_hsx'>";
            newElement += "<div class='reviewSelector'>";
            newElement += "<div class='review hsx_review ui_columns is-multiline inlineReviewUpdate provider0'>";
            newElement += "<div class='ui_column is-2 float-right'>";
            newElement += "<div class='prw_rup prw_reviews_member_info_hsx'>";
            newElement += "<div class='member_info'>";
            newElement += "<div class='avatar_wrap'>";
            newElement += "<div class='prw_rup prw_common_centered_image qa_avatar' onmouseleave='$(\".img_popUp\").addClass(\"hidden\");' onmouseenter='showBriefPopUp(this, \"" + opinion[i].visitorId + "\")'>";
            newElement += "<span class='imgWrap fixedAspect'>";
            newElement += "<img src='" + opinion[i].visitorPic + "' class='centeredImg border-radius-100' height='100%'/>";
            newElement += "</span></div>";
            newElement += "<div class='username text-align-center mg-bt-5'>" + opinion[i].visitorId + "</div>";
            newElement += "</div>";
            newElement += "<div class='memberOverlayLink'>";
            newElement += "<div class='memberBadgingNoText'><span class='ui_icon pencil-paper'></span><span class='badgetext'>" + opinion[i].comments + "</span>&nbsp;&nbsp;";
            newElement += "<span class='ui_icon thumbs-up-fill'></span><span id='commentLikes_" + opinion[i].id + "' data-val='" + opinion[i].likes + "' class='badgetext'>" + opinion[i].likes + "</span>&nbsp;&nbsp;";
            newElement += "<span class='ui_icon thumbs-down-fill'></span><span id='commentDislikes_" + opinion[i].id + "' data-val='" + opinion[i].dislikes + "' class='badgetext'>" + opinion[i].dislikes + "</span>";
            newElement += "</div>";
            newElement += "</div></div></div></div>";
            newElement += "<div class='ui_column is-9 float-right text-align-right'>";
            newElement += "<div class='innerBubble'>";
            newElement += "<div class='wrap'>";
            newElement += "<div class='rating reviewItemInline'>";
            switch (opinion[i].rate) {
                case 5:
                    newElement += "<span class='ui_bubble_rating bubble_50'></span>";
                    break;
                case 4:
                    newElement += "<span class='ui_bubble_rating bubble_40'></span>";
                    break;
                case 3:
                    newElement += "<span class='ui_bubble_rating bubble_30'></span>";
                    break;
                case 2:
                    newElement += "<span class='ui_bubble_rating bubble_20'></span>";
                    break;
                default:
                    newElement += "<span class='ui_bubble_rating bubble_10'></span>";
                    break;
            }
            newElement += "<span class='ratingDate relativeDate float-right'>نوشته شده در تاریخ " + opinion[i].date + " در <a href='" + opinion[i].url + "' target='_blank'>" + opinion[i].name + "</a></span></div>";
            newElement += "<div class='quote isNew'><a href='" + homeURL + "/showReview/" + opinion[i].id + "'><h3 class='font-size-1em noQuotes'>" + opinion[i].subject + "</h3></a></div>";
            newElement += "<div class='prw_rup prw_reviews_text_summary_hsx'>";
            newElement += "<div class='entry'>";
            newElement += "<p class='partial_entry partial-entry-paragraph' id='partial_entry_" + opinion[i].id + "'>" + opinion[i].text;
            newElement += "</p>";
            newElement += "<div id='showMoreReview_" + opinion[i].id + "' class='hidden showMoreReviewDiv' onclick='showMoreReview(" + opinion[i].id + ")'>بیشتر</div></div></div>";
            if (opinion[i].pic != -1)
                newElement += "<div><img id='reviewPic_" + opinion[i].id + "' class='hidden' width='150px' height='150px' src='" + opinion[i].pic + "'></div>";
            newElement += "<div class='prw_rup prw_reviews_vote_line_hsx'>";
            newElement += "<div class='tooltips wrap'><span id='reportSpanReviews' onclick='showReportPrompt(\"" + opinion[i].id + "\")' class='taLnk no_cpu ui_icon '>گزارش تخلف</span></div>";
            newElement += "<div class='helpful redesigned hsx_helpful'>";
            newElement += "<span onclick='likeComment(\"" + opinion[i].id + "\")' class='thankButton hsx_thank_button'>";
            newElement += "<span class='helpful_text'><span class='ui_icon thumbs-up-fill emphasizeWithColor'></span><span class='numHelp emphasizeWithColor'></span><span class='thankUser'>" + opinion[i].visitorId + " </span></span>";
            newElement += "<div class='buttonShade hidden'><img src='https://static.tacdn.com/img2/generic/site/loading_anim_gry_sml.gif'/></div>";
            newElement += "</span>";
            newElement += "<span onclick='dislikeComment(\"" + opinion[i].id + "\")' class='thankButton hsx_thank_button'>";
            newElement += "<span class='helpful_text'><span class='ui_icon thumbs-down-fill emphasizeWithColor'></span><span class='numHelp emphasizeWithColor'></span><span class='thankUser'>" + opinion[i].visitorId + " </span></span>";
            newElement += "<div class='buttonShade hidden'><img src='https://static.tacdn.com/img2/generic/site/loading_anim_gry_sml.gif'/></div>";
            newElement += "</span>";
            newElement += "</div></div></div>";
            newElement += "<div class='loadingShade hidden'>";
            newElement += "<div class='ui_spinner'></div></div></div></div></div></div></div></div>";
            newElement += '<hr>';
        }

        document.getElementById('opinion').innerHTML = newElement;
    }

    getCityOpinion();

    function showReportPrompt(logId) {
        if (!{{Auth::check() ? 1 : 0}}) {
            url = homeURL + "/seeAllAns/" + questionId + "/report/" + logId;
            showLoginPrompt(url);
            return;
        }
        $('.dark').show();
        selectedLogId = logId;
        getReports(logId);
        showElement('reportPane');
    }

    function getReports(logId) {
        $("#reports").empty();
        $.ajax({
            type: 'post',
            url: getReportsDir,
            data: {
                'logId': logId
            },
            success: function (response) {
                if (response != "")
                    response = JSON.parse(response);
                var newElement = "<div id='reportContainer' class='row'>";
                if (response != "") {
                    for (i = 0; i < response.length; i++) {
                        newElement += "<div class='col-xs-12'>";
                        newElement += "<div class='ui_input_checkbox'>";
                        if (response[i].selected == true)
                            newElement += "<input id='report_" + response[i].id + "' type='checkbox' name='reports' checked value='" + response[i].id + "'>";
                        else
                            newElement += "<input id='report_" + response[i].id + "' type='checkbox' name='reports' value='" + response[i].id + "'>";
                        newElement += "<label class='labelForCheckBox' for='report_" + response[i].id + "'>";
                        newElement += "<span></span>&nbsp;&nbsp;";
                        newElement += response[i].description;
                        newElement += "</label>";
                        newElement += "</div></div>";
                    }
                }
                newElement += "<div class='col-xs-12'>";
                newElement += "<div class='ui_input_checkbox'>";
                newElement += "<input id='custom-checkBox' onchange='customReport()' type='checkbox' name='reports' value='-1'>";
                newElement += "<label class='labelForCheckBox' for='custom-checkBox'>";
                newElement += "<span></span>&nbsp;&nbsp;";
                newElement += "سایر موارد</label>";
                newElement += "</div></div>";
                newElement += "<div id='custom-define-report'></div>";
                newElement += "</div>";
                $("#reports").append(newElement);
                if (response != "" && response.length > 0 && response[0].text != "") {
                    customReport();
                    $("#customDefinedReport").val(response[0].text);
                }
            }
        });
    }

    function customReport() {
        if ($("#custom-checkBox").is(':checked')) {
            var newElement = "<div class='col-xs-12'>";
            newElement += "<textarea id='customDefinedReport' maxlength='1000' required placeholder='حداکثر 1000 کاراکتر'></textarea>";
            newElement += "</label></div>";
            $("#custom-define-report").empty().append(newElement).css("visibility", "visible");
        }
        else {
            $("#custom-define-report").empty().css("visibility", "hidden");
        }
    }

    function closeReportPrompt() {
        $("#custom-checkBox").css("visibility", 'hidden');
        $("#custom-define-report").css("visibility", 'hidden');
        $("#reportPane").addClass('hidden');
        $('.dark').hide();
    }

    function sendReport() {
        customMsg = "";
        if ($("#customDefinedReport").val() != null)
            customMsg = $("#customDefinedReport").val();
        var checkedValuesReports = $("input:checkbox[name='reports']:checked").map(function () {
            return this.value;
        }).get();
        if (checkedValuesReports.length <= 0)
            return;
        if (!hasLogin) {
            url = homeURL + "/seeAllAns/" + questionId + "/report/" + selectedLogId;
            showLoginPrompt(url);
            return;
        }
        $.ajax({
            type: 'post',
            url: sendReportDir,
            data: {
                "logId": selectedLogId,
                "reports": checkedValuesReports,
                "customMsg": customMsg
            },
            success: function (response) {
                if (response == "ok") {
                    alert('گزارش شما با موفقیت ثبت شد.')
                    closeReportPrompt();
                }
                else {
                    $("#errMsgReport").append('مشکلی در انجام عملیات مورد نقد رخ داده است');
                }
            }
        });
    }

    function likeComment(logId) {
        $.ajax({
            type: 'post',
            url: opOnComment,
            data: {
                'logId': logId,
                'mode': 'like'
            },
            success: function (response) {
                if (response == "1") {
                    $("#commentLikes_" + logId).empty()
                        .attr('data-val', parseInt($("#commentLikes_" + logId).attr('data-val')) + 1)
                        .append($("#commentLikes_" + logId).attr('data-val'));
                }
                else if (response == "2") {
                    $("#commentLikes_" + logId).empty()
                        .attr('data-val', parseInt($("#commentLikes_" + logId).attr('data-val')) + 1)
                        .append($("#commentLikes_" + logId).attr('data-val'));
                    $("#commentDislikes_" + logId).empty()
                        .attr('data-val', parseInt($("#commentDislikes_" + logId).attr('data-val')) - 1)
                        .append($("#commentDislikes_" + logId).attr('data-val'));
                }
            }
        });
    }

    function likeAns(logId) {
        $.ajax({
            type: 'post',
            url: opOnComment,
            data: {
                'logId': logId,
                'mode': 'like'
            },
            success: function (response) {
                if (response == "1") {
                    $("#score_" + logId).empty()
                        .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) + 1)
                        .append($("#score_" + logId).attr('data-val'));
                }
                else if (response == "2") {
                    $("#score_" + logId).empty()
                        .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) + 2)
                        .append($("#score_" + logId).attr('data-val'));
                }
            }
        });
    }

    function dislikeAns(logId) {
        $.ajax({
            type: 'post',
            url: opOnComment,
            data: {
                'logId': logId,
                'mode': 'dislike'
            },
            success: function (response) {
                if (response == "1") {
                    $("#score_" + logId).empty()
                        .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) - 1)
                        .append($("#score_" + logId).attr('data-val'));
                }
                else if (response == "2") {
                    $("#score_" + logId).empty()
                        .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) - 2)
                        .append($("#score_" + logId).attr('data-val'));
                }
            }
        });
    }

    function dislikeComment(logId) {
        $.ajax({
            type: 'post',
            url: opOnComment,
            data: {
                'logId': logId,
                'mode': 'dislike'
            },
            success: function (response) {
                if (response == "1") {
                    $("#commentDislikes_" + logId).empty()
                        .attr('data-val', parseInt($("#commentDislikes_" + logId).attr('data-val')) + 1)
                        .append($("#commentDislikes_" + logId).attr('data-val'));
                }
                else if (response == "2") {
                    $("#commentDislikes_" + logId).empty()
                        .attr('data-val', parseInt($("#commentDislikes_" + logId).attr('data-val')) + 1)
                        .append($("#commentDislikes_" + logId).attr('data-val'));
                    $("#commentLikes_" + logId).empty()
                        .attr('data-val', parseInt($("#commentLikes_" + logId).attr('data-val')) - 1)
                        .append($("#commentLikes_" + logId).attr('data-val'));
                }
            }
        });
    }

</script>


{{--map--}}
<script>
    var x = '{{$city->x}}';
    var y = '{{$city->y}}';
    var all_amaken = {!! $allAmaken !!};
    var all_majara = {!! $allMajara !!};
    var all_hotels = {!! $allHotels !!};
    var all_restaurant = {!! $allRestaurant !!};
    var iconBase = '{{URL::asset('images') . '/'}}';
    var icons = {
        hotel: {
            icon: iconBase + 'mhotel.png'
        },
        amaken1: {
            icon: iconBase + 'matr_pla.png'
        },
        amaken2: {
            icon: iconBase + 'matr_mus.png'
        },
        amaken3: {
            icon: iconBase + 'matr_shc.png'
        },
        amaken4: {
            icon: iconBase + 'matr_nat.png'
        },
        amaken5: {
            icon: iconBase + 'matr_fun.png'
        },
        fastfood: {
            icon: iconBase + 'mfast.png'
        },
        rest: {
            icon: iconBase + 'mrest.png'
        },
        adv: {
            icon: iconBase + 'matr_adv.png'
        },
    };

    var markersHotel = [];
    var markersRest = [];
    var markersFast = [];
    var markersMus = [];
    var markersPla = [];
    var markersShc = [];
    var markersFun = [];
    var markersAdv = [];
    var markersNat = [];
    var majaraMap = [];
    var map2;


    function init() {
        var x = '{{$city->x}}';
        var y = '{{$city->y}}';
        var place_name = '{{ $city->name }}';
        var mapOptions = {
            zoom: 10,
            center: new google.maps.LatLng(x, y),
            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{
                "featureType": "landscape",
                "stylers": [{"hue": "#FFA800"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
            }, {
                "featureType": "road.highway",
                "stylers": [{"hue": "#53FF00"}, {"saturation": -73}, {"lightness": 40}, {"gamma": 1}]
            }, {
                "featureType": "road.arterial",
                "stylers": [{"hue": "#FBFF00"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
            }, {
                "featureType": "road.local",
                "stylers": [{"hue": "#00FFFD"}, {"saturation": 0}, {"lightness": 30}, {"gamma": 1}]
            }, {
                "featureType": "water",
                "stylers": [{"hue": "#00BFFF"}, {"saturation": 6}, {"lightness": 8}, {"gamma": 1}]
            }, {
                "featureType": "poi",
                "stylers": [{"hue": "#679714"}, {"saturation": 33.4}, {"lightness": -25.4}, {"gamma": 1}]
            }]
        };
        var mapElementSmall = document.getElementById('map-small');
        map2 = new google.maps.Map(mapElementSmall, mapOptions);

        var marker;

        // set amaken marker
        for (i = 0; i < all_amaken.length; i++) {
            if (all_amaken[i].mooze == 1)
                kindAmaken = 'amaken2';
            else if (all_amaken[i].tarikhi == 1)
                kindAmaken = 'amaken1';
            else if (all_amaken[i].tabiatgardi == 1) {
                kindAmaken = 'amaken4';
            }
            else if (all_amaken[i].tafrihi == 1)
                kindAmaken = 'amaken5';
            else if (all_amaken[i].markazkharid == 1)
                kindAmaken = 'amaken3';
            else
                kindAmaken = 'amaken2';

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_amaken[i]['C'], all_amaken[i]['D']),
                icon: {
                    url: icons[kindAmaken].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_amaken[i]['name']
            });

            if (all_amaken[i].mooze == 1)
                markersMus[markersMus.length] = marker;
            else if (all_amaken[i].tarikhi == 1)
                markersPla[markersPla.length] = marker;
            else if (all_amaken[i].tabiatgardi == 1)
                markersNat[markersNat.length] = marker;
            else if (all_amaken[i].tafrihi == 1)
                markersFun[markersFun.length] = marker;
            else if (all_amaken[i].markazkharid == 1)
                markersShc[markersShc.length] = marker;
            else
                markersMus[markersMus.length] = marker;
        }

        // set hotels marker
        for (i = 0; i < all_hotels.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_hotels[i]['C'], all_hotels[i]['D']),
                icon: {
                    url: icons['hotel'].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_hotels[i]['name']
            });
            markersHotel[i] = marker;
        }

        // set majara marker
        for (i = 0; i < all_majara.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_majara[i]['C'], all_majara[i]['D']),
                icon: {
                    url: icons['adv'].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_majara[i]['name']
            });
            majaraMap[i] = marker;
        }

        // set restaurant marker
        for (i = 0; i < all_restaurant.length; i++) {
            if (all_restaurant[i].kind_id == 1)
                kindRestaurant = 'rest';
            else
                kindRestaurant = 'fastfood';

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_restaurant[i]['C'], all_restaurant[i]['D']),
                icon: {
                    url: icons[kindRestaurant].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_restaurant[i]['name']
            });


            if (all_restaurant[i].kind_id == 1)
                markersRest[markersRest.length] = marker;
            else
                markersFast[markersFast.length] = marker;
        }
    }

    function toggleIconInMap(_id) {
        var src = document.getElementById(_id).src;
        var sec = src.split('.');
        var kind;

        if (sec[0].includes('off')) {
            sec[0] = sec[0].replace('off', '');
            src2 = sec[0] + '.' + sec[1];
            kind = 1;
        }
        else {
            src2 = sec[0] + 'off.' + sec[1];
            kind = 0;
        }
        document.getElementById(_id).src = src2;

        if (_id == 'hotelImg') {
            setInMap(kind, markersHotel);
        }
        else if (_id == 'restImg') {
            setInMap(kind, markersRest);
        }
        else if (_id == 'fastImg') {
            setInMap(kind, markersFast);
        }
        else if (_id == 'musImg') {
            setInMap(kind, markersMus);
        }
        else if (_id == 'plaImg') {
            setInMap(kind, markersPla);
        }
        else if (_id == 'shcImg') {
            setInMap(kind, markersShc);
        }
        else if (_id == 'funImg') {
            setInMap(kind, markersFun);
        }
        else if (_id == 'advImg') {
            setInMap(kind, majaraMap);
        }
        else if (_id == 'natImg') {
            setInMap(kind, markersNat);
        }
    }

    function setInMap(isSet, marker) {
        if (isSet == 1) {
            for (var i = 0; i < marker.length; i++) {
                marker[i].setMap(map2);
            }
        }
        else {
            for (var i = 0; i < marker.length; i++) {
                marker[i].setMap(null);
            }
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=init"></script>



</body>
</html>

