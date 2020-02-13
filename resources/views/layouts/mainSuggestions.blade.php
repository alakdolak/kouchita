<div class="mainDivLoader">
    <div class="loader hidden"></div>
</div>

<div class="middleBannerPhotoDiv">
    <div>
        <div class="smallOne">
            <a href="{{isset($middleBannerLink['11']) ? $middleBannerLink['11'] : '#'}}" target="{{isset($middleBannerLink['11']) ? '_blank' : ''}}" >
                <img class="middleImg11" src="{{isset($middleBannerPic['11']) ? $middleBannerPic['11'] : ''}}" style="width: 100%; height: 100%;">
            </a>
        </div>{{--
            --}}<div class="middleOne">
            <a href="{{isset($middleBannerLink['12']) ? $middleBannerLink['12'] : '#'}}" target="{{isset($middleBannerLink['12']) ? '_blank' : ''}}" >
                <img class="middleImg12" src="{{isset($middleBannerPic['12']) ? $middleBannerPic['12'] : ''}}" style="width: 100%; height: 100%;">
            </a>
        </div>{{--
            --}}<div class="largeOne">
            <a href="{{isset($middleBannerLink['13']) ? $middleBannerLink['13'] : '#'}}" target="{{isset($middleBannerLink['13']) ? '_blank' : ''}}" >
                <img class="middleImg13" src="{{isset($middleBannerPic['13']) ? $middleBannerPic['13'] : ''}}" style="width: 100%; height: 100%;">
            </a>
        </div>{{--
            --}}<div class="clear-both"></div>{{--
            --}}<div class="largeOne">
            <a href="{{isset($middleBannerLink['14']) ? $middleBannerLink['14'] : '#'}}" target="{{isset($middleBannerLink['14']) ? '_blank' : ''}}" >
                <img class="middleImg14" src="{{isset($middleBannerPic['14']) ? $middleBannerPic['14'] : ''}}" style="width: 100%; height: 100%;">
            </a>
        </div>{{--
            --}}<div class="middleOne">
            <a href="{{isset($middleBannerLink['15']) ? $middleBannerLink['15'] : '#'}}" target="{{isset($middleBannerLink['15']) ? '_blank' : ''}}" >
                <img class="middleImg15" src="{{isset($middleBannerPic['15']) ? $middleBannerPic['15'] : ''}}" style="width: 100%; height: 100%;">
            </a>
        </div>{{--
            --}}<div class="smallOne">
            <a href="{{isset($middleBannerLink['16']) ? $middleBannerLink['16'] : '#'}}" target="{{isset($middleBannerLink['16']) ? '_blank' : ''}}" >
                <img class="middleImg16" src="{{isset($middleBannerPic['16']) ? $middleBannerPic['16'] : ''}}" style="width: 100%; height: 100%;">
            </a>
        </div>
    </div>
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
        <a href="{{isset($middleBannerLink['21']) ? $middleBannerLink['21'] : '#'}}" target="{{isset($middleBannerLink['21']) ? '_blank' : ''}}" >
            <img class="middleImg21" src="{{isset($middleBannerPic['21']) ? $middleBannerPic['21'] : ''}}">
        </a>
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
            <div class="innerStripedBackGround">
                <a href="{{isset($middleBannerLink['31']) ? $middleBannerLink['31'] : '#'}}" target="{{isset($middleBannerLink['31']) ? '_blank' : ''}}" >
                    <img class="middleImg31" src="{{isset($middleBannerPic['31']) ? $middleBannerPic['31'] : ''}}" style="width: 100%; height: 100%;">
                </a>
            </div>
        </div>{{--
    --}}<div class="stripedBackgroundDiv mg-rt-5">
            <div class="innerStripedBackGround">
                <a href="{{isset($middleBannerLink['32']) ? $middleBannerLink['32'] : '#'}}" target="{{isset($middleBannerLink['32']) ? '_blank' : ''}}" >
                    <img class="middleImg32" src="{{isset($middleBannerPic['32']) ? $middleBannerPic['32'] : ''}}" style="width: 100%; height: 100%;">
                </a>
            </div>
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
            <div class="articleImgMainDiv">
                <a class="articleImgLink" href="{{isset($middleBannerLink['41']) ? $middleBannerLink['41'] : '#'}}" target="{{isset($middleBannerLink['41']) ? '_blank' : ''}}" >
                    <img class="middleImg41" src="{{isset($middleBannerPic['41']) ? $middleBannerPic['41'] : ''}}">
                </a>
            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>{{--
    --}}<div class="articleBoxes">
            <div class="articleTitle">مقاله‌های ما</div>
            <div class="articleImgMainDiv">
                <a class="articleImgLink" href="{{isset($middleBannerLink['42']) ? $middleBannerLink['42'] : '#'}}" target="{{isset($middleBannerLink['42']) ? '_blank' : ''}}" >
                    <img class="middleImg42" src="{{isset($middleBannerPic['42']) ? $middleBannerPic['42'] : ''}}">
                </a>
            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>{{--
    --}}<div class="articleBoxes">
            <div class="articleTitle">مقاله‌های ما</div>
            <div class="articleImgMainDiv">
                <a class="articleImgLink" href="{{isset($middleBannerLink['43']) ? $middleBannerLink['43'] : '#'}}" target="{{isset($middleBannerLink['43']) ? '_blank' : ''}}" >
                    <img class="middleImg43" src="{{isset($middleBannerPic['43']) ? $middleBannerPic['43'] : ''}}">
                </a>
            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>{{--
    --}}<div class="articleBoxes">
            <div class="articleTitle">مقاله‌های ما</div>
            <div class="articleImgMainDiv">
                <a class="articleImgLink" href="{{isset($middleBannerLink['44']) ? $middleBannerLink['44'] : '#'}}" target="{{isset($middleBannerLink['44']) ? '_blank' : ''}}" >
                    <img class="middleImg44" src="{{isset($middleBannerPic['44']) ? $middleBannerPic['44'] : ''}}">
                </a>
            </div>
            <a class="articleLink">هم اکنون ببینید</a>
        </div>
    </center>

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

    <div class="middleBannerDoublePhotoBanner">
        <div class="middleBannerPhotoBanner">
            <a href="{{isset($middleBannerLink['51']) ? $middleBannerLink['51'] : '#'}}" target="{{isset($middleBannerLink['51']) ? '_blank' : ''}}" >
                <img class="middleImg51" src="{{isset($middleBannerPic['51']) ? $middleBannerPic['51'] : ''}}" style="width: 100%; height: 100%;">
            </a>
        </div>{{--
    --}}<div class="middleBannerPhotoBanner">
            <a href="{{isset($middleBannerLink['52']) ? $middleBannerLink['52'] : '#'}}" target="{{isset($middleBannerLink['52']) ? '_blank' : ''}}" >
                <img class="middleImg52" src="{{isset($middleBannerPic['52']) ? $middleBannerPic['52'] : ''}}" style="width: 100%; height: 100%;">
            </a>
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
            console.log(img.length != 0)
            console.log(img)
            console.log(img.length)
            if(img.length != 0) {
                var section = Math.floor(i/10);
                console.log(section);
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
                            console.log('#middleImg' + middleBannerSectionId + '' + middleBannerNum);
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