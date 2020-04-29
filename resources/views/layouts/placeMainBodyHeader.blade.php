<div class="global-nav-no-refresh" id="global-nav-no-refresh-2">
    <div id="taplc_global_nav_onpage_assets_0" class="ppr_rup ppr_priv_global_nav_onpage_assets"
         data-placement-name="global_nav_onpage_assets">

        @include('general.secondHeader')

        {{--<div class="ui_container">--}}
            {{--<div class="ui_columns easyClear">--}}
                {{--<div class="ui_column direction-rtl position-relative">--}}
                    {{--<center ID="taplc_trip_planner_breadcrumbs_0" class="ppr_rup ppr_priv_trip_planner_breadcrumbs">--}}
                    {{--</center>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
</div>
<div class="atf_header_wrapper position-relative">
    <div class="atf_header ui_container is-mobile full_width position-relative">

        <div class="ppr_rup ppr_priv_location_detail_header position-relative">
            <h1 id="HEADING" class="heading_title " property="name">
                {{$place->name}}
            </h1>

            <div class="rating_and_popularity">
                <span class="header_rating">
                   <div class="rs rating" rel="v:rating">
                       <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">
                               <span class="ui_bubble_rating bubble_{{$avgRate}}0 font-size-16"
                                     property="ratingValue" content="{{$avgRate}}" alt='{{$avgRate}} of {{$avgRate}} bubbles'></span>
                       </div>
                       <a class="more taLnk" id="moreTaLnkReviewHeader" href="#REVIEWS">
                           <span property="v:count" id="commentCount"></span> امتیاز
                       </a>
                   </div>
                </span>
                <span class="header_popularity popIndexValidation" id="scoreSpanHeader">
                    <a>
                        {{$reviewCount}}
{{--                                {{$total}}--}}
                        نقد
                    </a>
                </span>
                {{--<div class="header heading" id="helpBtnMainDiv">--}}
                    {{--<a class="link" onclick="startHelp()">--}}
                        {{--<div class="circleBase type2 helpBtnIconMainDiv"></div>--}}
                        {{--<b>راهنمای صفحات</b>--}}
                    {{--</a>--}}
                {{--</div>--}}
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
                        <span onclick="saveToTrip()" id="addToFavouriteTripsMainDiv" class="ui_button saves ui_icon">
                            <div class="circleBase type2 addToFavouriteTripsIcon {{($save) ? "red-heart-fill" : "red-heart"}}"></div>
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
{{--                            @if($hasLogin)--}}
                        <div id="targetHelp_8" class="targets float-left col-xs-6 pd-0 mobile-mode">
                                <span onclick="bookMark(); changeBookmarkIcon()"
                                      class="ui_button save-location-7306673 saveAsBookmarkMainDiv">
                                    <div class="saveAsBookmarkIcon {{($bookMark) ? "castle-fill" : "castles"}} "></div>
                                    <div class="saveAsBookmarkLabel">
                                        ذخیره این صفحه
                                    </div>
                                </span>
                                <div id="helpSpan_8" class="helpSpans hidden row">
                                    <span class="introjs-arrow"></span>
                                    <p>شاید بعدا بخواهید دوباره به همین مکان باز گردید. پس آن را نشان کنید تا از منوی بالا هر وقت که خواستید دوباره به آن باز گردید.</p>
                                    <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                                    <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                </div>
                            </div>
{{--                            @endif--}}
{{--                            @if($hasLogin)--}}

                        <div id="share_box_mobile" class="display-none">

                            <a target="_blank" class="link mg-tp-5" {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}}
                            href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}">
                                <img src="{{URL::asset("images/shareBoxImg/facebook.png")}}" class="display-inline-block float-right">
                                <div>اشتراک صفحه در فیسبوک</div>
                            </a>
                            <a target="_blank" class="link mg-tp-5" {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}}
                            href="https://twitter.com/home?status={{Request::url()}}">
                                <img src="{{URL::asset("images/shareBoxImg/twitter.png")}}" class="display-inline-block float-right">
                                <div>اشتراک صفحه در توییتر</div>
                            </a>
                            <a target="_blank" class="link mg-tp-5" {{($config->whatsAppFollow) ? 'rel="nofollow"' : ''}}
                                href="https://whatsApp.com/share?url={{str_replace('%20', '', Request::url())}}">

                                <img src="{{URL::asset("images/shareBoxImg/whatsapp.png")}}" class="display-inline-block float-right">
                                <div>اشتراک صفحه واتس اپ</div>
                            </a>
                            <a target="_blank" class="link mg-tp-5" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}}
                            href="https://telegram.me/share/url?url={{Request::url()}}">
                                <img src="{{URL::asset("images/shareBoxImg/telegram.png")}}" class="display-inline-block float-right">
                                <div>اشتراک صفحه تلگرام</div>
                            </a>
                            <a target="_blank" class="link mg-tp-5" {{($config->instagramFollow) ? 'rel="nofollow"' : ''}}
                                    {{--    href="https://instagram.com/share?url={{ str_replace('%20', '', Request::url())}}"--}}
                            >
                                <img src="{{URL::asset("images/shareBoxImg/instagram.png")}}" class="display-inline-block float-right">
                                <div>اشتراک صفحه اینستاگرام</div>
                            </a>
                            <a target="_blank" class="link mg-tp-5" {{($config->pinterestFollow) ? 'rel="nofollow"' : ''}}
                                    {{--    href="https://pinterest.com/home?status={{Request::url()}}"--}}
                            >
                                <img src="{{URL::asset("images/shareBoxImg/pinterest.png")}}" class="display-inline-block float-right">
                                <div>اشتراک صفحه پین ترست</div>
                            </a>
                            <div class="position-relative inputBoxSharePage mg-tp-5">
                                <input class="full-width inputBoxInputSharePage" placeholder="www.koochita.com/abhoes">
                                <img src="{{URL::asset("images/tourCreation/copy.png")}}" id="copyImgInputShareLink">
                            </div>
                        </div>
                        <div id="share_pic_mobile" class="targets float-left col-xs-6 pd-0">
                            <span class="ui_button save-location-7306673 sharePageMainDiv" onclick="toggleShareIcon(this)">
                                <div class="sharePageIcon first"></div>
                                <div class="sharePageLabel">
                                    اشتراک‌گذاری صفحه
                                </div>
                            </span>
                            <div id="helpSpan_8" class="helpSpans hidden row">
                                <span class="introjs-arrow"></span>
                                <p>شاید بعدا بخواهید دوباره به همین مکان باز گردید. پس آن را نشان کنید تا از منوی بالا هر وقت که خواستید دوباره به آن باز گردید.</p>
                                <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                                <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                            </div>
                        </div>

{{--                            @endif--}}
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
                        <div class="blEntry blEn address  clickable colCnt3" onclick="showExtendedMap()" style="min-height: 20px">
                            @if($placeMode != 'mahaliFood' && $placeMode != 'sogatSanaies')
                                <span class="ui_icon map-pin"></span>
                                <span class="street-address">آدرس : </span>
                                @if($placeMode == 'majara')
                                    <span>
                                        {{$place->dastresi}}
                                    </span>
                                @else
                                    <span>
                                        {{$place->address}}
                                    </span>
                                @endif
                            @endif
                        </div>
                        @if(!empty($place->phone))
                            <div class="blEntry blEn phone truePhone">
                                <span class="ui_icon phone"></span>
                                <a href="tel:{{$place->phone}}">
                                    {{$place->phone}}
                                </a>
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


<script>

    function changeBookmarkIcon() {
            // $('.saveAsBookmarkIcon').toggleClass('castle-fill');
            // $('.saveAsBookmarkIcon').toggleClass('castles');

        var icon = $('.saveAsBookmarkIcon').hasClass('castles');

        if(icon) {
            $('.saveAsBookmarkIcon').addClass('castle-fill').removeClass('castles');
        }
        else {
            $('.saveAsBookmarkIcon').addClass('castles').removeClass('castle-fill');
        }
    }

    function toggleShareIcon(elmt) {
        $(elmt).children('div.first').toggleClass('sharePageIcon');
        $(elmt).children('div.first').toggleClass('sharePageIconFill');
    }

    $('#share_pic_mobile').click(function () {
        if ($('#share_box_mobile').is(":hidden")) {
            $('#share_box_mobile').show();
        } else {
            $('#share_box_mobile').hide();
        }
    });
</script>