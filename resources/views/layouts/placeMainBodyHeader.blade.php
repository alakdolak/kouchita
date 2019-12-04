
<div class="global-nav-no-refresh" id="global-nav-no-refresh-2">
    <div id="taplc_global_nav_onpage_assets_0" class="ppr_rup ppr_priv_global_nav_onpage_assets"
         data-placement-name="global_nav_onpage_assets">
        <div class="ui_container">
            <div class="ui_columns easyClear">
                <div class="ui_column direction-rtl position-relative">
                    <center ID="taplc_trip_planner_breadcrumbs_0" class="ppr_rup ppr_priv_trip_planner_breadcrumbs">
                        <div id="searchBoxTopPageMainDiv">
                            <span>شما در</span>
                            <div class="inputBox position-ralative">
                                <div class="select-side">
                                    <i class="glyphicon glyphicon-triangle-bottom"></i>
                                </div>
                                <select class="inputBoxInput styled-select text-align-right mg-lt-10" type="text" placeholder="">
                                    <option>استان اصفهان</option>
                                </select>
                            </div>
                            <span>در</span>
                            <div class="inputBox position-ralative">
                                <div class="select-side">
                                    <i class="glyphicon glyphicon-triangle-bottom"></i>
                                </div>
                                <select class="inputBoxInput styled-select text-align-right mg-lt-10" type="text" placeholder="">
                                    <option>شهر اصفهان</option>
                                </select>
                            </div>
                            <span class="mg-lt-15">هستید. تغییر دهید</span>
                            <div id="searchIcon"></div>
                        </div>
                        {{--                            <ul class="breadcrumbs">--}}
                        {{--                                @if($placeMode == "hotel")--}}
                        {{--                                    <li class="breadcrumb" itemscope>--}}
                        {{--                                        <a class="link" {{($config->backToHotelListNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                           href="{{route('hotelList', ['city' => $state->name, 'mode' => 'state'])}}"--}}
                        {{--                                           itemprop="url">--}}
                        {{--                                            <span itemprop="title">{{$state->name}}</span>--}}
                        {{--                                        </a>&nbsp--}}
                        {{--                                        <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                    </li>--}}
                        {{--                                    <li class="breadcrumb" itemscope>--}}
                        {{--                                        <a class="link" {{($config->backToHotelListNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                           href="{{route('hotelList', ['city' => $city->name, 'mode' => 'city'])}}"--}}
                        {{--                                           itemprop="url">--}}
                        {{--                                            <span itemprop="title">{{$city->name}}</span>--}}
                        {{--                                        </a>&nbsp;--}}
                        {{--                                        <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                    </li>--}}
                        {{--                                    @if(Auth::check() && Auth::user()->level != 0)--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeAlt/{{$place->id}}/4"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت alt ها و تصاویر</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeContent/{{$city->id}}/4/1/{{$place->name}}"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت محتوا</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeSeo/{{$city->id}}/1/{{$place->name}}/4"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت سئو</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                    @endif--}}
                        {{--                                @elseif($placeMode == "amaken")--}}
                        {{--                                    <li class="breadcrumb" itemscope>--}}
                        {{--                                        <a class="link" {{($config->backToHotelListNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                           href="{{route('amakenList', ['city' => $state->name, 'mode' => 'state'])}}"--}}
                        {{--                                           itemprop="url">--}}
                        {{--                                            <span itemprop="title">{{$state->name}}</span>--}}
                        {{--                                        </a>&nbsp;--}}
                        {{--                                        <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                    </li>--}}
                        {{--                                    <li class="breadcrumb" itemscope>--}}
                        {{--                                        <a class="link" {{($config->backToHotelListNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                           href="{{route('amakenList', ['city' => $city->name, 'mode' => 'city'])}}"--}}
                        {{--                                           itemprop="url">--}}
                        {{--                                            <span itemprop="title">{{$city->name}}</span>--}}
                        {{--                                        </a>&nbsp;--}}
                        {{--                                        <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                    </li>--}}
                        {{--                                    @if(Auth::check() && Auth::user()->level != 0)--}}

                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeAlt/{{$place->id}}/{{$kindPlaceId}}"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت alt ها و تصاویر</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeContent/{{$city->id}}/{{$kindPlaceId}}/1/{{$place->name}}"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت محتوا</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeSeo/{{$city->id}}/1/{{$place->name}}/{{$kindPlaceId}}"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت سئو</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                    @endif--}}
                        {{--                                @else--}}
                        {{--                                    <li class="breadcrumb" itemscope>--}}
                        {{--                                        <a class="link" {{($config->backToHotelListNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                           href="{{route('restaurantList', ['city' => $state->name, 'mode' => 'state'])}}"--}}
                        {{--                                           itemprop="url">--}}
                        {{--                                            <span itemprop="title">{{$state->name}}</span>--}}
                        {{--                                        </a>&nbsp;--}}
                        {{--                                        <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                    </li>--}}
                        {{--                                    <li class="breadcrumb" itemscope>--}}
                        {{--                                        <a class="link" {{($config->backToHotelListNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                           href="{{route('restaurantList', ['city' => $city->name, 'mode' => 'city'])}}"--}}
                        {{--                                           itemprop="url">--}}
                        {{--                                            <span itemprop="title">{{$city->name}}</span>--}}
                        {{--                                        </a>&nbsp;--}}
                        {{--                                        <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                    </li>--}}

                        {{--                                    @if(Auth::check() && Auth::user()->level != 0)--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeAlt/{{$place->id}}/3"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت alt ها و تصاویر</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeContent/{{$city->id}}/3/1/{{$place->name}}"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت محتوا</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="breadcrumb" itemscope>--}}
                        {{--                                            <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}--}}
                        {{--                                               href="http://panel.baligh.ir/changeSeo/{{$city->id}}/1/{{$place->name}}/3"--}}
                        {{--                                               itemprop="url">--}}
                        {{--                                                <span itemprop="title">مدیریت سئو</span>--}}
                        {{--                                            </a>&nbsp;--}}
                        {{--                                            <span class="ui_icon single-chevron-left"></span>&nbsp;--}}
                        {{--                                        </li>--}}
                        {{--                                    @endif--}}
                        {{--                                @endif--}}
                        {{--                            </ul>--}}
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="atf_header_wrapper position-relative">
    <div class="atf_header ui_container is-mobile full_width position-relative">

        <div class="ppr_rup ppr_priv_location_detail_header position-relative">
            <h1 id="HEADING" class="heading_title " property="name">{{$place->name}}</h1>

            <div class="rating_and_popularity">
                        <span class="header_rating">
                           <div class="rs rating" rel="v:rating">
                               <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">
                                    @if($avgRate == 5)
                                       <span class="ui_bubble_rating bubble_50 font-size-16"
                                             property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                   @elseif($avgRate == 4)
                                       <span class="ui_bubble_rating bubble_40 font-size-16"
                                             property="ratingValue" content="4" alt='4 of 5 bubbles'></span>
                                   @elseif($avgRate == 3)
                                       <span class="ui_bubble_rating bubble_30 font-size-16"
                                             property="ratingValue" content="3" alt='3 of 5 bubbles'></span>
                                   @elseif($avgRate == 2)
                                       <span class="ui_bubble_rating bubble_20 font-size-16"
                                             property="ratingValue" content="2" alt='2 of 5 bubbles'></span>
                                   @elseif($avgRate == 1)
                                       <span class="ui_bubble_rating bubble_10 font-size-16"
                                             property="ratingValue" content="1" alt='1 of 5 bubbles'></span>
                                   @endif
                               </div>
                               <a class="more taLnk" id="moreTaLnkReviewHeader" href="#REVIEWS">
                                   <span property="v:count" id="commentCount"></span> نقد
                               </a>
                           </div>
                        </span>
                <span class="header_popularity popIndexValidation" id="scoreSpanHeader">
                            <a> {{$total}} امتیاز</a>
                        </span>
                <div class="header heading" id="helpBtnMainDiv">
                    <a class="link" onclick="startHelp()">
                        <div class="circleBase type2 helpBtnIconMainDiv"></div>
                        <b>راهنمای صفحات</b>
                    </a>
                </div>
            </div>
            <div class="position-relative">

                {{--<div style="width: 110px;height: 29px;position: absolute;left: 100px;border: 1px solid black;cursor: pointer;" onclick="changeStatetoReserved()">--}}
                {{--<span class="ui_button" style="padding: 0">تغییر به حالت رزرو</span>--}}
                {{--</div>--}}
                {{--<div style="width: 130px;height: 29px;position: absolute;left: 215px;border: 1px solid black;cursor: pointer;" onclick="changeStatetounReserved()">--}}
                {{--<span class="ui_button" style="padding: 0">تغییر به حالت غیر رزرو</span>--}}
                {{--</div>--}}

                <span class="ui_button_overlay position-relative float-left">
                            <div id="targetHelp_7" class="targets position-relative float-right">
                                <span onclick="saveToTrip()" id="addToFavouriteTripsMainDiv"
                                      class="ui_button saves ui_icon {{($save) ? "red-heart-fill" : "red-heart"}} ">
                                    <div class="circleBase type2 addToFavouriteTripsIcon"></div>
                                    <div class="addToFavouriteTripsLabel">
                                        افزودن به لیست سفر
                                    </div>
                                </span>
                                <div id="helpSpan_7" class="helpSpans row hidden">
                                    <span class="introjs-arrow"></span>
                                    <p class="col-xs-12">
                                        در هر مکانی که هستید با زدن این دکمه می توانید، آن مکان را به لیست سفرهای خود اضافه کنید. به سادگی همراه با دوستان تان سفر های خود را برنامه ریزی کنید. به سادگی همین دکمه...
                                    </p>
                                    <button data-val="7" class="btn btn-success nextBtnsHelp"
                                            id="nextBtnHelp_7">بعدی</button>
                                    <button data-val="7" class="btn btn-primary backBtnsHelp"
                                            id="backBtnHelp_7">قبلی</button>
                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                </div>
                            </div>
                            <span class="btnoverlay loading">
                                <span class="bubbles small">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </span>
                        </span>
                <div class="prw_rup prw_common_atf_header_bl headerBL">
                    <div class="blRow">
                        <div class="blEntry blEn address  clickable colCnt3" onclick="showExtendedMap()">
                            <span class="ui_icon map-pin"></span>
                            <span class="street-address">آدرس : </span>
                            <span>{{$place->address}}</span>
                        </div>
                        @if(!empty($place->phone))
                            <div class="blEntry blEn phone">
                                <span class="ui_icon phone"></span>
                                <span>{{$place->phone}}</span>
                            </div>
                        @endif
                        @if(!empty($place->site))
                            <div class="blEntry blEn website">
                                <span class="ui_icon laptop"></span>
                                <?php
                                if (strpos($place->site, 'http') === false)
                                    $place->site = 'http://' . $place->site;
                                ?>
                                <a target="_blank" href="{{$place->site}}" {{($config->externalSiteNoFollow) ? 'rel="nofollow"' : ''}}>
                                    <span>{{$place->site}}</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>