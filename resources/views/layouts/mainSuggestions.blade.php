{{--banner_1--}}
<div class="cont ">
    <div data-target='1' class="slide slide--1">
        <div class="slide__text slide__text--1">quis risus</div>
        <div class="slide__bg"></div>
        <div class="slide__img">
            <div class="slide__close"></div>
            <div class="slide__img-wrapper">

            </div>
        </div>
        <div class="slide__bg-dark"></div>
        <a href="https://www.instagram.com/koochitatravel/" target="_blank" class="icon-link icon-link--twitter">
            <img src="{{URL::asset('images/icons/instagram.png')}}">
        </a>
    </div>

    <div data-target='2' class="slide slide--2">
        <div class="slide__text">Lorem ipsum</div>
        <div class="slide__bg"></div>
        <div class="slide__img">
            <div class="slide__close"></div>
            <div class="slide__img-wrapper">

            </div>
        </div>
        <div class="slide__bg-dark"></div>
        <a href="https://www.instagram.com/koochitatravel/" target="_blank" class="icon-link icon-link--twitter">
            <img src="{{URL::asset('images/icons/instagram.png')}}">
        </a>
    </div>

    <div data-target='3' class="slide slide--3">
        <div class="slide__text">Sed tincidunt</div>
        <div class="slide__bg"></div>
        <div class="slide__img">
            <div class="slide__close"></div>
            <div class="slide__img-wrapper">

            </div>
        </div>
        <div class="slide__bg-dark"></div>
        <a href="https://www.instagram.com/koochitatravel/" target="_blank" class="icon-link icon-link--twitter">
            <img src="{{URL::asset('images/icons/instagram.png')}}">
        </a>
    </div>

    <div data-target='4' class="slide slide--4">
        <div class="slide__text">Vivamus dui</div>
        <div class="slide__bg"></div>
        <div class="slide__img">
            <div class="slide__close"></div>
            <div class="slide__img-wrapper">

            </div>
        </div>
        <div class="slide__bg-dark"></div>
        <a href="https://www.instagram.com/koochitatravel/" target="_blank" class="icon-link icon-link--twitter">
            <img src="{{URL::asset('images/icons/instagram.png')}}">
        </a>
    </div>

    <div data-target='5' class="slide slide--5">
        <div class="slide__text">Viva</div>
        <div class="slide__bg"></div>
        <div class="slide__img">
            <div class="slide__close"></div>
            <div class="slide__img-wrapper">

            </div>
        </div>
        <div class="slide__bg-dark"></div>
        <a href="https://www.instagram.com/koochitatravel/" target="_blank" class="icon-link icon-link--twitter">
            <img src="{{URL::asset('images/icons/instagram.png')}}">
        </a>
    </div>

</div>

<div class="mainDivLoader">
    <div class="loader hidden"></div>
</div>

<div  ng-controller="getMainPageSuggestion" class="mainSuggestionMainDiv">

    <div id="newKoochita" class="homepage_shelves_widget ng-scope">
        <div class="prw_rup prw_shelves_shelf_widget" ng-show="show">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>تازه‌های کوچیتا</h3>
                        </div>
                    </div>
                </div>
                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper position-relative">
                            <div class="swiper-slide position-relative" ng-repeat="place in records">
                                <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope position-relative">
                                    <div class="poi">
                                        <a href="[[place.url]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.alt]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="[[place.url]]" class="item poi_name ui_link ng-binding">[[place.name]]</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_[[place.placeRate]]0"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">[[place.placeReviews]] </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">[[place.placeCity]] <span>در </span>
                                                <span class="ng-binding">[[place.placeState]]</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    {{--banner_2--}}
    <div class="siteArticlesMainDiv">
        <div class="card transition">
            <h2 class="h2MidBanerArticle transition">Awesome Headline</h2>
            <p class="pMidBanerArticle">
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
            </p>
            <div class="cta-container transition" style="left: 0px">
                <a href="#" class="cta">Call to action</a>
            </div>
            <div class="card_circle transition"></div>
        </div>
        <div class="card transition">
            <h2 class="h2MidBanerArticle transition">Awesome Headline</h2>
            <p class="pMidBanerArticle">
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
            </p>
            <div class="cta-container transition" style="left: 0px">
                <a href="#" class="cta">Call to action</a>
            </div>
            <div class="card_circle transition"></div>
        </div>
        <div class="card transition">
            <h2 class="h2MidBanerArticle transition">Awesome Headline</h2>
            <p class="pMidBanerArticle">
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
                Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.
            </p>
            <div class="cta-container transition" style="left: 0px">
                <a href="#" class="cta">Call to action</a>
            </div>
            <div class="card_circle transition"></div>
        </div>
    </div>

    <div id="foodSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div class="prw_rup prw_shelves_shelf_widget">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>محبوب‌ترین غذا‌ها</h3>
                        </div>
                    </div>
                </div>
                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                    <div id="mainSuggestion" class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in foodRecords">
                                <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="[[place.url]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.alt]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="[[place.url]]" class="item poi_name ui_link ng-binding">[[place.name]]</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_[[place.placeRate]]0"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">[[place.placeReviews]] </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">[[place.placeCity]] <span>در </span>
                                                <span class="ng-binding">[[place.placeState]]</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    {{--banner_6--}}
    <div class="middleBannerPhotoBanner" style="display: flex; justify-content: center; align-items: center">
        <div class="dropping-texts">
            <div>بشینیم</div>
            <div>برنامه ریزی کنیم</div>
            <div>سفر کنیم</div>
            <div>بخندیم</div>
        </div>
        با هم
    </div>

    <div id="tabiatSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>سفر طبیعت‌گردی</h3>
                        </div>
                    </div>
                </div>
                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in tabiatRecords">
                                <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="[[place.url]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.alt]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="[[place.url]]" class="item poi_name ui_link ng-binding">[[place.name]]</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_[[place.placeRate]]0"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">[[place.placeReviews]] </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">[[place.placeCity]] <span>در </span>
                                                <span class="ng-binding">[[place.placeState]]</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    {{--banner_3--}}
    <div class='parent'>
        <div class='slider' style="width: 100%;">
            <button type="button" id='banner3_right' class='rightButton' name="button">

                <svg version="1.1" id="Capa_1" width='40px' height='40px ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
       <g>
           <path style='fill: #9d9d9d;' d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
          "/>
       </g>

       </svg>

            </button>
            <button type="button" id='banner3_left' class='leftButton' name="button">
                <svg version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
       <g>
           <path style='fill: #9d9d9d;' d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/>
       </g>
       </svg>
            </button>
            <svg id='svg2' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <circle id='circle1' class='circle1 steap' cx="34px" cy="49%" r="20"  />
                <circle id='circle2' class='circle2 steap' cx="34px" cy="49%" r="100"  />
                <circle id='circle3' class='circle3 steap' cx="34px" cy="49%" r="180"  />
                <circle id='circle4' class='circle4 steap' cx="34px" cy="49%" r="260"  />
                <circle id='circle5' class='circle5 steap' cx="34px" cy="49%" r="340"  />
                <circle id='circle6' class='circle6 steap' cx="34px" cy="49%" r="420"  />
                <circle id='circle7' class='circle7 steap' cx="34px" cy="49%" r="500"  />
                <circle id='circle8' class='circle8 steap' cx="34px" cy="49%" r="580"  />
                <circle id='circle9' class='circle9 steap' cx="34px" cy="49%" r="660"  />
            </svg>
            <svg id='svg1' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <circle id='circle10' class='circle10 steap' cx="648px" cy="49%" r="20"  />
                <circle id='circle11' class='circle11 steap' cx="648px" cy="49%" r="100"  />
                <circle id='circle12' class='circle12 steap' cx="648px" cy="49%" r="180"  />
                <circle id='circle13' class='circle13 steap' cx="648px" cy="49%" r="260"  />
                <circle id='circle14' class='circle14 steap' cx="648px" cy="49%" r="340"  />
                <circle id='circle15' class='circle15 steap' cx="648px" cy="49%" r="420"  />
                <circle id='circle16' class='circle16 steap' cx="648px" cy="49%" r="500"  />
                <circle id='circle17' class='circle17 steap' cx="648px" cy="49%" r="580"  />
                <circle id='circle18' class='circle18 steap' cx="648px" cy="49%" r="660"  />
            </svg>

            <div id='slide1' class='slide1 up1'>MOUNTAIN</div>
            <div id='slide2' class='slide2'>BEACH</div>
            <div id='slide3' class='slide3'>FOREST</div>
            <div id='slide4' class='slide4'>DESERT</div>
        </div>
    </div>

    <script>

        var curpage = 1;
        var sliding = false;
        var click = true;
        var left = document.getElementById("banner3_left");
        var right = document.getElementById("banner3_right");
        var pagePrefix = "slide";
        var pageShift = 500;
        var transitionPrefix = "circle";
        var svg = true;

        function leftSlide() {
            if (click) {
                if (curpage == 1) curpage = 5;
                sliding = true;
                curpage--;
                svg = true;
                click = false;
                for (k = 1; k <= 4; k++) {
                    var a1 = document.getElementById(pagePrefix + k);
                    a1.className += " tran";
                }
                setTimeout(() => {
                    move();
                }, 200);
                setTimeout(() => {
                    for (k = 1; k <= 4; k++) {
                        var a1 = document.getElementById(pagePrefix + k);
                        a1.classList.remove("tran");
                    }
                }, 1400);
            }
        }

        function rightSlide() {
            if (click) {
                if (curpage == 4) curpage = 0;
                sliding = true;
                curpage++;
                svg = false;
                click = false;
                for (k = 1; k <= 4; k++) {
                    var a1 = document.getElementById(pagePrefix + k);
                    a1.className += " tran";
                }
                setTimeout(() => {
                    move();
                }, 200);
                setTimeout(() => {
                    for (k = 1; k <= 4; k++) {
                        var a1 = document.getElementById(pagePrefix + k);
                        a1.classList.remove("tran");
                    }
                }, 1400);
            }
        }

        function move() {
            if (sliding) {
                sliding = false;
                if (svg) {
                    for (j = 1; j <= 9; j++) {
                        var c = document.getElementById(transitionPrefix + j);
                        c.classList.remove("steap");
                        c.setAttribute("class", transitionPrefix + j + " streak");
                    }
                } else {
                    for (j = 10; j <= 18; j++) {
                        var c = document.getElementById(transitionPrefix + j);
                        c.classList.remove("steap");
                        c.setAttribute("class", transitionPrefix + j + " streak");
                    }
                }
                setTimeout(() => {
                    for (i = 1; i <= 4; i++) {
                        if (i == curpage) {
                            var a = document.getElementById(pagePrefix + i);
                            a.className += " up1";
                        } else {
                            var b = document.getElementById(pagePrefix + i);
                            b.classList.remove("up1");
                        }
                    }
                    sliding = true;
                }, 600);
                setTimeout(() => {
                    click = true;
                }, 1700);

                setTimeout(() => {
                    if (svg) {
                        for (j = 1; j <= 9; j++) {
                            var c = document.getElementById(transitionPrefix + j);
                            c.classList.remove("streak");
                            c.setAttribute("class", transitionPrefix + j + " steap");
                        }
                    } else {
                        for (j = 10; j <= 18; j++) {
                            var c = document.getElementById(transitionPrefix + j);
                            c.classList.remove("streak");
                            c.setAttribute("class", transitionPrefix + j + " steap");
                        }
                        sliding = true;
                    }
                }, 850);
                setTimeout(() => {
                    click = true;
                }, 1700);
            }
        }

        left.onmousedown = () => {
            leftSlide();
        };

        right.onmousedown = () => {
            rightSlide();
        };

        document.onkeydown = e => {
            if (e.keyCode == 37) {
                leftSlide();
            } else if (e.keyCode == 39) {
                rightSlide();
            }
        };
        setInterval(function (){
            rightSlide();
        }, 8000);
    </script>

    <div id="restaurantSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>محبوب‌ترین رستوران‌ها</h3>
                        </div>
                    </div>
                </div>
                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in restaurantRecords">
                                <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="[[place.url]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.alt]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="[[place.url]]" class="item poi_name ui_link ng-binding">[[place.name]]</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_[[place.placeRate]]0"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">[[place.placeReviews]] </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">[[place.placeCity]] <span>در </span>
                                                <span class="ng-binding">[[place.placeState]]</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    {{--banner_4--}}
    <div class="banner4Style">
        <figure class="snip1091 red"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample6.jpg" alt="sq-sample6"/>
            <figcaption>
                <h2>Lizbeth  <span>Kent</span></h2>
            </figcaption><a href="#"></a>
        </figure>
        <figure class="snip1091 green"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample14.jpg" alt="sq-sample14"/>
            <figcaption>
                <h2>Annalee   <span>Weis</span></h2>
            </figcaption><a href="#"></a>
        </figure>
        <figure class="snip1091 navy"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample10.jpg" alt="sq-sample10"/>
            <figcaption>
                <h2>Carmen  <span>Glenn</span></h2>
            </figcaption><a href="#"></a>
        </figure>
    </div>

    <div id="tarikhiSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>سفر تاریخی-فرهنگی</h3>
                        </div>
                    </div>
                </div>
                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in tarikhiRecords">
                                <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="[[place.url]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.alt]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="[[place.url]]" class="item poi_name ui_link ng-binding">[[place.name]]</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_[[place.placeRate]]0"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">[[place.placeReviews]] </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">[[place.placeCity]] <span>در </span>
                                                <span class="ng-binding">[[place.placeState]]</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <center class="mainPageStatistics">
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons articleStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['article']}}</span>
            </div>
            <div class="eachPartStatisticTitle">مقاله</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons friendStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['userCount']}}</span>
            </div>
            <div class="eachPartStatisticTitle">دوست</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons commentStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['comment']}}</span>
            </div>
            <div class="eachPartStatisticTitle">نظر</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons traditionalFoodStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['mahaliFood']}}</span>
            </div>
            <div class="eachPartStatisticTitle">غذای محلی</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons souvenirStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['sogatSanaie']}}</span>
            </div>
            <div class="eachPartStatisticTitle">سوغات</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons handcraftStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['sogatSanaie']}}</span>
            </div>
            <div class="eachPartStatisticTitle">صنایع دستی</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons attractionStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['amaken']}}</span>
            </div>
            <div class="eachPartStatisticTitle">جاذبه</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons restaurantStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['restaurant']}}</span>
            </div>
            <div class="eachPartStatisticTitle">رستوران</div>
        </div>{{--
    --}}<div class="eachPartStatistic">
            <div class="eachPartStatisticIcons residenceStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>{{$count['hotel']}}</span>
            </div>
            <div class="eachPartStatisticTitle">اقامت‌گاه</div>
        </div>
    </center>

    <div id="kharidSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>مراکز خرید</h3>
                        </div>
                    </div>
                </div>
                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in kharidRecords">
                                <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="[[place.url]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.alt]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="[[place.url]]" class="item poi_name ui_link ng-binding">[[place.name]]</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_[[place.placeRate]]0"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">[[place.placeReviews]] </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">[[place.placeCity]] <span>در </span>
                                                <span class="ng-binding">[[place.placeState]]</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <div class="middleBannerPhotoBanner">
        <a href="{{isset($middleBannerLink['61']) ? $middleBannerLink['61'] : '#'}}" target="{{isset($middleBannerLink['61']) ? '_blank' : ''}}" >
            <img class="middleImg61" src="{{isset($middleBannerPic['61']) ? $middleBannerPic['61'] : ''}}" style="width: 100%; height: 100%;">
        </a>
    </div>

    <div id="articleSuggestion" class="homepage_shelves_widget ng-scope">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>محبوب‌ترین سفرنامه‌ها</h3>
                        </div>
                    </div>
                </div>

                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                        <div class="mainSuggestion swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide position-relative" ng-repeat="place in articleRecords">
                                    <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                        <div class="poi">
                                            <a href="[[place.url]]" class="thumbnail">
                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                    <div class="prv_thumb has_image">
                                                        <div class="image_wrapper landscape landscapeWide">
                                                            <img src="[[place.placePic]]" alt="[[place.keyword]]" class="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="detail rtl">
                                                <a href="[[place.url]]" class="item poi_name ui_link ng-binding">[[place.title]]</a>
                                                <div class="item rating-widget">
                                                    {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                                        {{--<span class="ui_bubble_rating bubble_[[place.placeRate]]0"></span>--}}
                                                    {{--</div>--}}
                                                    <span class="reviewCount ng-binding">[[place.msg]] </span><span>نقد </span>
                                                </div>
                                                <div class="item tags ng-binding">
                                                        {{--[[place.placeCity]] --}}
                                                        {{--<span>در </span>--}}
                                                        {{--<span class="ng-binding">[[place.placeState]]</span>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

@if(auth()->check() && auth()->user()->role == 0)
    <div class="modal" id="middleBannerModal" style="direction: rtl">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">تغییر عکس بنر</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="#" id="showMiddleBannerInput" style="width: 100%;">
                        </div>
                        <div class="col-md-6">
                            <input type="file" id="uploadImgBanner" accept="image/*" onchange="changeInputImg(this)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="linkForBanner">لینک:</label>
                            <input type="text" id="linkForBanner" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                    <button type="button" class="btn btn-success" onclick="saveMiddleBannerImg()">تغییر</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        var editIcon = "{{URL::asset('images/edit.png')}}";
        var middleBannerSectionId = 0;
        var middleBannerNum = 0;
        var data;
        var newImageReplace = null;

        for(var i = 11; i < 100; i++) {
            var img = $('.middleImg' + i);
            if(img.length != 0) {
                var section = Math.floor(i/10);
                var number = i % 10;
                var text = '<div style="position: absolute; width: 20px; height: 20px; background: white; text-align: center; cursor: pointer; right: 0px" onclick="editMiddleBannerPic(' + section + ', ' + number + ')">\n' +
                    '<img src="' + editIcon + '" style="width: 100%; height: 100%;">\n' +
                    '</div>';

                var imgParent = img.parent().parent();
                imgParent.prepend(text);
            }
        }

        function editMiddleBannerPic(_section, _num){
            middleBannerNum = _num;
            middleBannerSectionId = _section;

            data = new FormData();
            data.append('section', middleBannerSectionId);
            data.append('number', middleBannerNum);

            $('#uploadImgBanner').val('');
            $('#linkForBanner').val('');
            $('#showMiddleBannerInput').attr('src', '');

            $('#middleBannerModal').modal('show');
        }

        function changeInputImg(input){
            if (input.files && input.files[0] && middleBannerNum != 0 && middleBannerSectionId != 0) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    newImageReplace =  e.target.result;
                    $('#showMiddleBannerInput').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                data.append('pic', input.files[0]);
            }
        }

        function saveMiddleBannerImg(){
            var link = $('#linkForBanner').val();

            if (middleBannerNum != 0 && middleBannerSectionId != 0) {

                if(link.trim().length == 0)
                    link = "#";

                data.append('link', link);
                data.append('page', 'mainPage');

                $.ajax({
                    type: 'post',
                    url: '{{route("middleBanner.image.store")}}',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        if(response == 'ok'){
                            alert('عکس با موفقیت بارگزاری شد');
                            $('#showMiddleBannerInput').attr('src', '');
                            $('#uploadImgBanner').val('');
                            $('#linkForBanner').val('');
                            $('.middleImg' + middleBannerSectionId + '' + middleBannerNum).attr('src', newImageReplace);
                            middleBannerSectionId = 0;
                            middleBannerNum = 0;
                        }

                        $('#middleBannerModal').modal('hide');
                    },
                    error: function(){
                    }
                });
            }

        }


    </script>
@endif


@include('layouts.calendar')

<script>
    var swiper = new Swiper('.mainSuggestion', {
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            450: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            520: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            10000: {
                slidesPerView: 4,
                spaceBetween: 20,
            }
        }
    });
</script>