<div class="mainDivLoader">
    <div class="loader hidden"></div>
</div>

<div  ng-controller="getMainPageSuggestion">

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

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper position-relative">
                            <div class="swiper-slide position-relative" ng-repeat="place in records">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
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

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div id="mainSuggestion" class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in foodRecords">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
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

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in tabiatRecords">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
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

    <div id="restaurantSuggestion" class="homepage_shelves_widget ng-scope"style="display: none;">
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

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in restaurantRecords">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
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

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in tarikhiRecords">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
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

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="mainSuggestion swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative" ng-repeat="place in kharidRecords">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
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

    <div id="safaranameSuggestions" class="homepage_shelves_widget ng-scope">
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
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <img src="{{URL::asset('_images/pin.png')}}" class="imageGoldPin">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope">
                                    <div class="poi">
                                        <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper landscape landscapeWide">
                                                        <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}" alt="هتل عباسی" class="image" src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail rtl">
                                            <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C" class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                            <div class="item rating-widget">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                                <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                            </div>
                                            <div class="item tags ng-binding">اصفهان <span>در </span>
                                                <span class="ng-binding">اصفهان</span></div>
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

    <div class="mainPageStatistics">
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons articleStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">مقاله</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons friendStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">دوست</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons commentStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">نظر</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons traditionalFoodStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">غذای محلی</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons souvenirStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">سوغات</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons handcraftStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">صنایع دستی</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons attractionStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">جاذبه</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons restaurantStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">رستوران</div>
        </div>
        <div class="eachPartStatistic">
            <div class="eachPartStatisticIcons residenceStatisticIcon"></div>
            <div class="eachPartStatisticNums">
                <span>بیش از</span>
                <span>1350</span>
            </div>
            <div class="eachPartStatisticTitle">اقامت‌گاه</div>
        </div>
    </div>
</div>

</div>



{{--<div id="AdviceControllerId" class="homepage_shelves_widget" ng-controller="AdviceController">--}}
    {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
        {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
            {{--<div class="shelf_header">--}}
                {{--<div class="shelf_title">--}}
                    {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                    {{--<div class="shelf_title_container h3">--}}
                        {{--<h3>پیشنهاد های ویژه</h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                    {{--<div class="poi">--}}
                        {{--<a href="[[itr.url]]" class="thumbnail">--}}
                            {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                {{--<div class="prv_thumb has_image">--}}
                                    {{--<div class="image_wrapper landscape landscapeWide">--}}
                                        {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<div class="detail rtl">--}}
                            {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                            {{--<div class="item rating-widget">--}}
                                {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                    {{--<span class="[[itr.classRate]]"></span>--}}
                                {{--</div>--}}
                                {{--<span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>--}}
                            {{--</div>--}}
                            {{--<div class="item tags">[[itr.city]] <span>در </span>--}}
                                {{--<span>[[itr.state]]</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--@if($placeMode == "hotel")--}}
    {{--<div id="HotelControllerId" class="homepage_shelves_widget" ng-controller="HotelController">--}}
        {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
            {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
                {{--<div class="shelf_header">--}}
                    {{--<div class="shelf_title">--}}
                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                        {{--<div class="shelf_title_container h3">--}}
                            {{--<h3>تازه‌های کوچیتا</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                    {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                        {{--<div class="poi">--}}
                            {{--<a href="[[itr.url]]" class="thumbnail">--}}
                                {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                    {{--<div class="prv_thumb has_image">--}}
                                        {{--<div class="image_wrapper landscape landscapeWide">--}}
                                            {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<div class="detail rtl">--}}
                                {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                                {{--<div class="item rating-widget">--}}
                                    {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                        {{--<span class="[[itr.classRate]]"></span>--}}
                                    {{--</div>--}}
                                    {{--<span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>--}}
                                {{--</div>--}}
                                {{--<div class="item tags">[[itr.city]] <span>در </span>--}}
                                    {{--<span>[[itr.state]]</span></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@elseif($placeMode == "restaurant")--}}
    {{--<div id="RestaurantControllerId" class="homepage_shelves_widget"--}}
         {{--ng-controller="RestaurantController">--}}
        {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
            {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
                {{--<div class="shelf_header">--}}
                    {{--<div class="shelf_title">--}}
                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                        {{--<div class="shelf_title_container h3">--}}
                            {{--<h3>محبوب‌ترین رستوران‌ها</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                    {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                        {{--<div class="poi">--}}
                            {{--<a href="[[itr.url]]" class="thumbnail">--}}
                                {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                    {{--<div class="prv_thumb has_image">--}}
                                        {{--<div class="image_wrapper landscape landscapeWide">--}}
                                            {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<div class="detail rtl">--}}
                                {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                                {{--<div class="item rating-widget">--}}
                                    {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                        {{--<span class="[[itr.classRate]]"></span>--}}
                                    {{--</div>--}}
                                    {{--<span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>--}}
                                {{--</div>--}}
                                {{--<div class="item tags">[[itr.city]] <span>در </span>--}}
                                    {{--<span>[[itr.state]]</span></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@else--}}
    {{--<div id="AmakenControllerId" class="homepage_shelves_widget" ng-controller="AmakenController">--}}
        {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
            {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
                {{--<div class="shelf_header">--}}
                    {{--<div class="shelf_title">--}}
                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                        {{--<div class="shelf_title_container h3">--}}
                            {{--<h3>سفر تاریخی-فرهنگی</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                    {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                        {{--<div class="poi">--}}
                            {{--<a href="[[itr.url]]" class="thumbnail">--}}
                                {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                    {{--<div class="prv_thumb has_image">--}}
                                        {{--<div class="image_wrapper landscape landscapeWide">--}}
                                            {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<div class="detail rtl">--}}
                                {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                                {{--<div class="item rating-widget">--}}
                                    {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                        {{--<span class="[[itr.classRate]]"></span>--}}
                                    {{--</div>--}}
                                    {{--<span class="reviewCount">[[itr.reviews]] </span>--}}
                                    {{--<span>نقد </span>--}}
                                {{--</div>--}}
                                {{--<div class="item tags">[[itr.city]] <span>در </span>--}}
                                    {{--<span>[[itr.state]]</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}

{{--@if(Auth::check())--}}

    {{--<div id="RecentlyControllerId" class="homepage_shelves_widget" ng-controller="RecentlyController">--}}
        {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
            {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
                {{--<div class="shelf_header">--}}
                    {{--<div class="shelf_title">--}}
                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                        {{--<div class="shelf_title_container h3">--}}
                            {{--<h3>بازدید های اخیر</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                    {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                        {{--<div class="poi">--}}
                            {{--<a href="[[itr.url]]" class="thumbnail">--}}
                                {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                    {{--<div class="prv_thumb has_image">--}}
                                        {{--<div class="image_wrapper landscape landscapeWide">--}}
                                            {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<div class="detail rtl">--}}
                                {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                                {{--<div class="item rating-widget">--}}
                                    {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                        {{--<span class="[[itr.classRate]]"></span>--}}
                                    {{--</div>--}}
                                    {{--<span class="reviewCount">[[itr.reviews]] </span>--}}
                                    {{--<span>نقد </span>--}}
                                {{--</div>--}}
                                {{--<div class="item tags">[[itr.city]] <span>در </span>--}}
                                    {{--<span>[[itr.state]]</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}

{{--@if($placeMode == "hotel" || $placeMode == "restaurant")--}}
    {{--<div id="AmakenControllerId" class="homepage_shelves_widget" ng-controller="AmakenController">--}}
        {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
            {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
                {{--<div class="shelf_header">--}}
                    {{--<div class="shelf_title">--}}
                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                        {{--<div class="shelf_title_container h3">--}}
                            {{--<h3>اماکن دیدنی</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                    {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                        {{--<div class="poi">--}}
                            {{--<a href="[[itr.url]]" class="thumbnail">--}}
                                {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                    {{--<div class="prv_thumb has_image">--}}
                                        {{--<div class="image_wrapper landscape landscapeWide">--}}
                                            {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<div class="detail rtl">--}}
                                {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                                {{--<div class="item rating-widget">--}}
                                    {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                        {{--<span class="[[itr.classRate]]"></span>--}}
                                    {{--</div>--}}
                                    {{--<span class="reviewCount">[[itr.reviews]]</span>--}}
                                    {{--<span>نقد </span>--}}
                                {{--</div>--}}
                                {{--<div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@else--}}
    {{--<div id="HotelControllerId" class="homepage_shelves_widget" ng-controller="HotelController">--}}
        {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
            {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
                {{--<div class="shelf_header">--}}
                    {{--<div class="shelf_title">--}}
                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                        {{--<div class="shelf_title_container h3">--}}
                            {{--<h3>هتل های دیدنی</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                    {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                        {{--<div class="poi">--}}
                            {{--<a href="[[itr.url]]" class="thumbnail">--}}
                                {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                    {{--<div class="prv_thumb has_image">--}}
                                        {{--<div class="image_wrapper landscape landscapeWide">--}}
                                            {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<div class="detail rtl">--}}
                                {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                                {{--<div class="item rating-widget">--}}
                                    {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                        {{--<span class="[[itr.classRate]]"></span>--}}
                                    {{--</div>--}}
                                    {{--<span class="reviewCount">[[itr.reviews]]</span>--}}
                                    {{--<span>نقد </span>--}}
                                {{--</div>--}}
                                {{--<div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}

{{--<div id="FoodControllerId" class="homepage_shelves_widget" ng-controller="FoodController">--}}
    {{--<div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">--}}
        {{--<div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">--}}
            {{--<div class="shelf_header">--}}
                {{--<div class="shelf_title">--}}
                    {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                    {{--<div class="shelf_title_container h3">--}}
                        {{--<h3>غذاهای لذیذ</h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="shelf_item_container ui_columns is-mobile is-multiline">--}}
                {{--<div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">--}}
                    {{--<div class="poi">--}}
                        {{--<a href="[[itr.url]]" class="thumbnail">--}}
                            {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive">--}}
                                {{--<div class="prv_thumb has_image">--}}
                                    {{--<div class="image_wrapper landscape landscapeWide">--}}
                                        {{--<img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<div class="detail rtl">--}}
                            {{--<a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>--}}
                            {{--<div class="item rating-widget">--}}
                                {{--<div class="prw_rup prw_common_location_rating_simple">--}}
                                    {{--<span class="[[itr.classRate]]"></span>--}}
                                {{--</div>--}}
                                {{--<span class="reviewCount">[[itr.reviews]]</span><span>نقد </span>--}}
                            {{--</div>--}}
                            {{--<div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

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