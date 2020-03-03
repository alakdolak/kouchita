{{--banner_1--}}
@if(isset($middleBan['1']) && count($middleBan['1']) > 0)
    <style>
        .slide__text--1 {
            /*left: 10%;*/
        }
        @for($i = 1; $i <= count($middleBan['1']); $i++)
        .slide {
            left: 100%;
        }
        .slide--{{$i}} {
            z-index: {{$i}};
        }
        .slide--{{$i}} .slide__img-wrapper {
            background: url({{$middleBan['1'][$i-1]['pic']}}) center center no-repeat;
            background-size: 100% auto;
        }
        .active .slide--{{$i}} {
            -webkit-transform: translate3d(-{{100 - ((100/count($middleBan['1'])) * ($i-1) )}}%, 0, 0);
            transform: translate3d(-{{100 - ((100/count($middleBan['1'])) * ($i-1) )}}%, 0, 0);
            -webkit-transition: -webkit-transform 950ms {{1235 * ($i-1)}}ms;
            transition: -webkit-transform 950ms {{1235 * ($i-1)}}ms;
            transition: transform 950ms {{1235 * ($i-1)}}ms;
            transition: transform 950ms {{1235 * ($i-1)}}ms, -webkit-transform 950ms {{1235 * ($i-1)}}ms;
        }
        .active .slide--{{$i}} .slide__bg {
            -webkit-transform: scale(0, 1);
            transform: scale(0, 1);
            -webkit-transition: 1900ms {{1235 * ($i-1)}}ms;
            transition: 1900ms {{1235 * ($i-1)}}ms;
        }
        .active .slide-{{$i}} .slide__img-wrapper {
            -webkit-transform: translate3d(-150px, 0, 0);
            transform: translate3d(-150px, 0, 0);
            -webkit-transition: 2000ms {{1235 * ($i-1)}}ms;
            transition: 2000ms {{1235 * ($i-1)}}ms;
        }
        @endfor

        .slide__text:hover{
            color: #fbe5c8 !important;
        }
    </style>
    <div class="cont ">

        @for($i = 1; $i <= count($middleBan['1']); $i++)
            <div data-target='{{$i}}' class="slide slide--{{$i}}">
                @if($middleBan['1'][$i-1]['link'] != '')
                    <a href="{{$middleBan['1'][$i-1]['link']}}" class="slide__text slide__text--{{$i}}" target="_blank">
                        {{$middleBan['1'][$i-1]['text']}}
                    </a>
                @else
                    <div class="slide__text slide__text--{{$i}}">
                        {{$middleBan['1'][$i-1]['text']}}
                    </div>
                @endif

                <div class="slide__bg"></div>
                <div class="slide__img">
                    <div class="slide__close"></div>
                    <div class="slide__img-wrapper"></div>
                </div>
                <div class="slide__bg-dark"></div>
                <a href="https://www.instagram.com/koochitatravel/" target="_blank" class="icon-link icon-link--twitter">
                    <img src="{{URL::asset('images/icons/instagram.png')}}">
                </a>
            </div>
        @endfor

    </div>
    <script>
        const $cont = $('.cont');
        const $slide = $('.slide');
        const $closeBtn = $('.slide__close')
        const $text = $('.slide__text');
        const $iconTwitter = $('.icon-link--twitter');
        const numSlides = {{count($middleBan['1'])}};
        const initialAnimDur = 7131;
        const animDelay = 1000;
        let initialAnim = true;
        let clickAnim = false;

        $(document).on('click', '.slide__bg-dark', function() {
            if (initialAnim || clickAnim) return;
            let _this = $(this).parent();
            let target = +_this.attr('data-target');
            clickAnim = true;

            _this.css({
                'transform': 'translate3d(-100%, 0, 0)',
                'transition': '750ms',
                'cursor': 'default'
            })

            _this.find('.slide__img-wrapper').css({
                'transform': 'translate3d(0, 0, 0) scale(.95, .95)',
                'transition': '2000ms'
            })

            for(let i = target, length = $slide.length; i < length; i++) {
                $('.slide--' + (i + 1)).css({
                    'transform': 'translate3d(0, 0, 0)',
                    'transition': '750ms'
                })
            }

            for(let i = target, length = $slide.length; i > 1; i--) {
                $('.slide--' + (i - 1)).css({
                    'transform': 'translate3d(-150%, 0, 0)',
                    'transition': '750ms'
                })
            }

            setTimeout(function() {
                $slide.not(_this).find('.slide__bg-dark').css({
                    'opacity': '0'
                })
            }, 750)

            $closeBtn.addClass('show-close');
            $iconTwitter.addClass('icon-show');

            _this.find('.slide__text').css({
                'transform': 'translate3d(150px, -40%, 0)',
                'opacity': '1',
                'transition': '2000ms',
                '-webkit-transition': '2000ms'
            })
        });

        $(document).on('mousemove', '.slide', function() {
            if(initialAnim || clickAnim) return;
            let _this = $(this);
            let target = +_this.attr('data-target');

            _this.css({
                'transform': 'translate3d(-' + (((100 / numSlides) * (numSlides - (target - 1))) + numSlides) + '%, 0, 0)',
                'transition': '750ms'
            })

            _this.find('.slide__text').css({
                'transform': 'translate3d(0, -40%, 0) rotate(0.01deg)',
                '-moz-transform': 'translate3d(0, -40%, 0) rotate(0.01deg)',
                'opacity': '1',
                'transition': '750ms',
                '-webkit-transition': '750ms'
            })

            for(let i = target, length = $slide.length; i < length; i++) {
                $('.slide--' + (i + 1)).css({
                    'transform': 'translate3d(-' + (((100 / numSlides) * (numSlides - ((i + 1) - 1))) - numSlides) + '%, 0, 0)',
                    'transition': '750ms'
                })
            }

            for(let i = target; i > 1; i--) {
                $('.slide--' + (i - 1)).css({
                    'transform': 'translate3d(-' + (((100 / numSlides) * (numSlides - ((i - 1) - 1))) + numSlides) + '%, 0, 0)',
                    'transition': '750ms'
                })
            }

            _this.find('.slide__img-wrapper').css({
                'transform': 'translate3d(-200px, 0, 0) scale(.85, .85)',
                'transition': '750ms'
            })

            $slide.not(_this).find('.slide__img-wrapper').css({
                'transform': 'translate3d(-200px, 0, 0) scale(.90, .90)',
                'transition': '1000ms'
            })

            $slide.not(_this).find('.slide__bg-dark').css({
                'opacity': '.75'
            })
        });

        $(document).on('mouseleave', '.slide', function() {
            if(initialAnim || clickAnim) return;
            let _this = $(this);
            let target = +_this.attr('data-target');

            console.log('------');
            for(let i = 1, length = $slide.length; i <= length; i++) {

                $('.slide--' + i).css({
                    'transform': 'translate3d(-' + (100 / numSlides) * (numSlides - (i - 1)) + '%, 0, 0)',
                    'transition': '1000ms'
                })
            }

            $slide.find('.slide__img-wrapper').css({
                'transform': 'translate3d(-200px, 0, 0) scale(1, 1)',
                'transition': '750ms'
            })

            $slide.find('.slide__bg-dark').css({
                'opacity': '0'
            })

            $text.css({
                'transform': 'translate3d(0, -50%, 0) rotate(0.01deg)',
                'opacity': '0',
                'transition': '200ms',
                '-webkit-transition': '200ms'
            })
        });

        $(document).on('click', '.slide__close', function() {

            setTimeout(function() {
                clickAnim = false;
            }, 1000);

            $closeBtn.removeClass('show-close');
            $iconTwitter.removeClass('icon-show');

            for(let i = 1, length = $slide.length; i <= length; i++) {
                $('.slide--' + i).css({
                    'transform': 'translate3d(-' + (100 / numSlides) * (numSlides - (i - 1)) + '%, 0, 0)',
                    'transition': '1000ms',
                    'cursor': 'pointer'
                })
            }

            $text.css({
                'transform': 'translate3d(150px, -40%, 0)',
                'opacity': '0',
                'transition': '200ms',
                '-webkit-transition': '200ms'
            })

            setTimeout(function() {
                $text.css({
                    'transform': 'translate3d(0, -50%, 0)'
                })
            }, 200)
        })

        setTimeout(function() {
            $cont.addClass('active');
        }, animDelay);

        setTimeout(function() {
            initialAnim = false;
        }, initialAnimDur + animDelay);

    </script>
@endif

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
        @if(isset($articleBanner) && count($articleBanner) > 0)
            <div class="mainSuggestion swiper-container">
                <div class="swiper-wrapper position-relative">
            @foreach($articleBanner as $item)
                <div class="swiper-slide position-relative">
                    <div class="card transition">
                        <h2 class="h2MidBanerArticle transition">{{$item->title}}</h2>
                        <p class="pMidBanerArticle">
                            {{$item->meta}}
                        </p>
                        <div class="cta-container transition" style="left: 0px">
                            <a href="{{$item->url}}" class="cta">مشاهده مقاله</a>
                        </div>
                        <div class="card_circle transition" style="background: url('{{$item->pic}}') no-repeat center bottom; background-size: cover;"></div>
                    </div>
                </div>
            @endforeach
                </div>
            </div>
        @endif
    </div>

    <div id="foodSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div class="prw_rup prw_shelves_shelf_widget">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <a class="shelf_title" href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => 'country'])}}" target="_blank">
                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                            <div class="shelf_title_container h3">
                                <h3>محبوب‌ترین غذا‌ها</h3>
                            </div>
                        </a>
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
                    <div class="shelf_title" >
                        <a class="shelf_title" href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => 'country'])}}" target="_blank">
                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                            <div class="shelf_title_container h3">
                                <h3>سفر طبیعت‌گردی</h3>
                            </div>
                        </a>
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
    @if(isset($middleBan['4']) && count($middleBan['4']) > 0)
        <div class='parent'>
            <div class='slider' style="width: 100%;">
                <button type="button" id='banner3_right' class='rightButton sliderButton' name="button">
                    <svg version="1.1" id="Capa_1" width='40px' height='40px ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                   <g>
                       <path style='fill: #9d9d9d;' d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                      "/>
                   </g>

                </svg>
                </button>
                <button type="button" id='banner3_left' class='leftButton sliderButton' name="button">
                    <svg version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                   <g>
                       <path style='fill: #9d9d9d;' d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/>
                   </g>
                </svg>
                </button>

                <svg id='svg2' class='up2 slidesvg' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                <svg id='svg1' class='up2 slidesvg' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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

                <div id='slide1' class='mainBlubSlider up1' style="background-image: url('{{$middleBan['4'][0]['pic']}}'); ">{{$middleBan['4'][0]['text']}}</div>
                @for($i = 1; $i < count($middleBan['4']); $i++)
                    <div id='slide{{$i+1}}' class='mainBlubSlider' style="background-image: url('{{$middleBan['4'][$i]['pic']}}'); ">{{$middleBan['4'][$i]['text']}}</div>
                @endfor
            </div>
        </div>
        <script>

            var curpage = 1;
            var totalPageSlide = {{count($middleBan['4'])}};
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
                    if (curpage == 1) curpage = totalPageSlide+1;
                    sliding = true;
                    curpage--;
                    svg = true;
                    click = false;
                    for (k = 1; k <= totalPageSlide; k++) {
                        var a1 = document.getElementById(pagePrefix + k);
                        a1.className += " tran";
                    }
                    setTimeout(() => {
                        move();
                    }, 200);
                    setTimeout(() => {
                        for (k = 1; k <= totalPageSlide; k++) {
                            var a1 = document.getElementById(pagePrefix + k);
                            a1.classList.remove("tran");
                        }
                    }, 1400);
                }
            }

            function rightSlide() {
                if (click) {
                    if (curpage == totalPageSlide) curpage = 0;
                    sliding = true;
                    curpage++;
                    svg = false;
                    click = false;
                    for (k = 1; k <= totalPageSlide; k++) {
                        var a1 = document.getElementById(pagePrefix + k);
                        a1.className += " tran";
                    }
                    setTimeout(() => {
                        move();
                    }, 200);
                    setTimeout(() => {
                        for (k = 1; k <= totalPageSlide; k++) {
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
                        for (i = 1; i <= totalPageSlide; i++) {
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
    @endif

    <div id="restaurantSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <a class="shelf_title" href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => 'country'])}}" target="_blank">
                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                            <div class="shelf_title_container h3">
                                <h3>محبوب‌ترین رستوران‌ها</h3>
                            </div>
                        </a>
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

    {{--banner_5--}}
    @if(isset($middleBan['5']) && count($middleBan['5']) > 0)
        <div class="banner4Style">
            <?php
                $middleBanColor5 = ['red', 'green', 'navy'];
            ?>
            @for($i = 0; $i < count($middleBan['5']); $i++)
                <figure class="snip1091 {{$middleBanColor5[$i]}}">
                    <img src="{{$middleBan['5'][$i]['pic']}}" alt="sq-sample6"/>
                    <figcaption>
                        <h2>
                            {{$middleBan['5'][$i]['text']}}
                        </h2>
                    </figcaption>
                    @if($middleBan['5'][$i]['link'] != '')
                        <a href="{{$middleBan['5'][$i]['link']}}"></a>
                    @endif
                </figure>
            @endfor
        </div>
    @endif

    <div id="tarikhiSuggestion" class="homepage_shelves_widget ng-scope" style="display: none">
        <div class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <a class="shelf_title" href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => 'country'])}}" target="_blank">
                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                            <div class="shelf_title_container h3">
                                <h3>سفر تاریخی-فرهنگی</h3>
                            </div>
                        </a>
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

    @if(isset($middleBan['6']))
        <div class="middleBannerPhotoBanner">
            @if($middleBan['6']['link'] != '')
                <a href="{{$middleBan['6']['link']}}" target="_blank" >
                    <img src="{{$middleBan['6']['pic']}}" style="width: 100%;">
                </a>
            @else
                <img src="{{$middleBan['6']['pic']}}" style="width: 100%;">
            @endif
        </div>
    @endif

    <div id="articleSuggestion" class="homepage_shelves_widget ng-scope">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" style="">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <a class="shelf_title" href="{{route('mainArticle')}}" target="_blank">
                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                            <div class="shelf_title_container h3">
                                <h3>محبوب‌ترین سفرنامه‌ها</h3>
                            </div>
                        </a>
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