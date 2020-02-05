<div class="mainDivLoader">
    <div class="loader hidden"></div>
</div>

<div  ng-controller="getMainPageSuggestion" class="mainSuggestionMainDiv">

    <div id="newKoochita" class="homepage_shelves_widget ng-scope">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
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
        <img>
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

    <center class="stripedBannerMainDiv">
        <div class="stripedBackgroundDiv mg-lt-5">
            <div class="innerStripedBackGround"></div>
        </div>{{--
    --}}<div class="stripedBackgroundDiv mg-rt-5">
            <div class="innerStripedBackGround"></div>
        </div>
    </center>

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

    <center class="siteArticlesMainDiv">
        <div class="articleBoxes">
            <div class="articleTitle">مقاله‌های ما</div>
            <div class="articleImg">

            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>{{--
    --}}<div class="articleBoxes">
            <div class="articleTitle">مقاله‌های ما</div>
            <div class="articleImg">

            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>{{--
    --}}<div class="articleBoxes">
            <div class="articleTitle">مقاله‌های ما</div>
            <div class="articleImg">

            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>{{--
    --}}<div class="articleBoxes">
            <div class="articleTitle">مقاله‌های ما</div>
            <div class="articleImg">

            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>
    </center>

    <div id="restaurantSuggestion" class="homepage_shelves_widget ng-scope"style="display: none">
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

    <div class="middleBannerDoublePhotoBanner">
        <div class="middleBannerPhotoBanner">
            <img>
        </div>{{--
    --}}<div class="middleBannerPhotoBanner">
            <img>
        </div>
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
                <span>1350</span>
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
        <img>
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
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope" style="width: 100%;">
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