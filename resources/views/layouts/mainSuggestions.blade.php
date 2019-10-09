
<center>
    <div class="loader hidden"></div>
</center>

<div id="AdviceControllerId" class="homepage_shelves_widget" ng-controller="AdviceController">
    <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
        <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
            <div class="shelf_header">
                <div class="shelf_title">
                    <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                    <div class="shelf_title_container">
                        <a class="ui_link ui_header h2">
                            <h3>پیشنهاد های ویژه</h3>
                        </a>
                    </div>
                </div>
            </div>

            <div class="shelf_item_container ui_columns is-mobile is-multiline">
                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                    <div class="poi">
                        <a href="[[itr.url]]" class="thumbnail">
                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                <div class="prv_thumb has_image">
                                    <div class="image_wrapper landscape landscapeWide">
                                        <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="detail rtl">
                            <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                            <div class="item rating-widget">
                                <div class="prw_rup prw_common_location_rating_simple">
                                    <span class="[[itr.classRate]]"></span>
                                </div>
                                <span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>
                            </div>
                            <div class="item tags">[[itr.city]] <span>در </span>
                                <span>[[itr.state]]</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($placeMode == "hotel")
    <div id="HotelControllerId" class="homepage_shelves_widget" ng-controller="HotelController">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container">
                            <a class="ui_link ui_header h2">
                                <h3>هتل های دیدنی</h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                        <div class="poi">
                            <a href="[[itr.url]]" class="thumbnail">
                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                    <div class="prv_thumb has_image">
                                        <div class="image_wrapper landscape landscapeWide">
                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="detail rtl">
                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                <div class="item rating-widget">
                                    <div class="prw_rup prw_common_location_rating_simple">
                                        <span class="[[itr.classRate]]"></span>
                                    </div>
                                    <span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>
                                </div>
                                <div class="item tags">[[itr.city]] <span>در </span>
                                    <span>[[itr.state]]</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($placeMode == "restaurant")
    <div id="RestaurantControllerId" class="homepage_shelves_widget"
         ng-controller="RestaurantController">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container">
                            <a class="ui_link ui_header h2">
                                <h3>رستوران های دیدنی</h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                        <div class="poi">
                            <a href="[[itr.url]]" class="thumbnail">
                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                    <div class="prv_thumb has_image">
                                        <div class="image_wrapper landscape landscapeWide">
                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="detail rtl">
                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                <div class="item rating-widget">
                                    <div class="prw_rup prw_common_location_rating_simple">
                                        <span class="[[itr.classRate]]"></span>
                                    </div>
                                    <span class="reviewCount">[[itr.reviews]] </span><span>نقد </span>
                                </div>
                                <div class="item tags">[[itr.city]] <span>در </span>
                                    <span>[[itr.state]]</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div id="AmakenControllerId" class="homepage_shelves_widget" ng-controller="AmakenController">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container">
                            <a class="ui_link ui_header h2">
                                <h3>اماکن دیدنی</h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                        <div class="poi">
                            <a href="[[itr.url]]" class="thumbnail">
                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                    <div class="prv_thumb has_image">
                                        <div class="image_wrapper landscape landscapeWide">
                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="detail rtl">
                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                <div class="item rating-widget">
                                    <div class="prw_rup prw_common_location_rating_simple">
                                        <span class="[[itr.classRate]]"></span>
                                    </div>
                                    <span class="reviewCount">[[itr.reviews]] </span>
                                    <span>نقد </span>
                                </div>
                                <div class="item tags">[[itr.city]] <span>در </span>
                                    <span>[[itr.state]]</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Auth::check())
    <div id="RecentlyControllerId" class="homepage_shelves_widget" ng-controller="RecentlyController">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container">
                            <a class="ui_link ui_header h2">
                                <h3>بازدید های اخیر</h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                        <div class="poi">
                            <a href="[[itr.url]]" class="thumbnail">
                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                    <div class="prv_thumb has_image">
                                        <div class="image_wrapper landscape landscapeWide">
                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="detail rtl">
                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                <div class="item rating-widget">
                                    <div class="prw_rup prw_common_location_rating_simple">
                                        <span class="[[itr.classRate]]"></span>
                                    </div>
                                    <span class="reviewCount">[[itr.reviews]] </span>
                                    <span>نقد </span>
                                </div>
                                <div class="item tags">[[itr.city]] <span>در </span>
                                    <span>[[itr.state]]</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if($placeMode == "hotel" || $placeMode == "restaurant")
    <div id="AmakenControllerId" class="homepage_shelves_widget" ng-controller="AmakenController">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container">
                            <a class="ui_link ui_header h2"><h3>اماکن دیدنی</h3></a>
                        </div>
                    </div>
                </div>

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                        <div class="poi">
                            <a href="[[itr.url]]" class="thumbnail">
                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                    <div class="prv_thumb has_image">
                                        <div class="image_wrapper landscape landscapeWide">
                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="detail rtl">
                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                <div class="item rating-widget">
                                    <div class="prw_rup prw_common_location_rating_simple">
                                        <span class="[[itr.classRate]]"></span>
                                    </div>
                                    <span class="reviewCount">[[itr.reviews]]</span>
                                    <span>نقد </span>
                                </div>
                                <div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div id="HotelControllerId" class="homepage_shelves_widget" ng-controller="HotelController">
        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container">
                            <a class="ui_link ui_header h2"><h3>هتل های دیدنی</h3></a>
                        </div>
                    </div>
                </div>

                <div class="shelf_item_container ui_columns is-mobile is-multiline">
                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                        <div class="poi">
                            <a href="[[itr.url]]" class="thumbnail">
                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                    <div class="prv_thumb has_image">
                                        <div class="image_wrapper landscape landscapeWide">
                                            <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="detail rtl">
                                <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                                <div class="item rating-widget">
                                    <div class="prw_rup prw_common_location_rating_simple">
                                        <span class="[[itr.classRate]]"></span>
                                    </div>
                                    <span class="reviewCount">[[itr.reviews]]</span>
                                    <span>نقد </span>
                                </div>
                                <div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div id="FoodControllerId" class="homepage_shelves_widget" ng-controller="FoodController">
    <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
        <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">
            <div class="shelf_header">
                <div class="shelf_title">
                    <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                    <div class="shelf_title_container">
                        <a class="ui_link ui_header h2"><h3>غذاهای لذیذ</h3></a>
                    </div>
                </div>
            </div>

            <div class="shelf_item_container ui_columns is-mobile is-multiline">
                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-3-tablet is-6-mobile" ng-repeat="itr in data">
                    <div class="poi">
                        <a href="[[itr.url]]" class="thumbnail">
                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                <div class="prv_thumb has_image">
                                    <div class="image_wrapper landscape landscapeWide">
                                        <img ng-src="[[itr.pic]]" alt="[[itr.name]]" class="image"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="detail rtl">
                            <a href="[[itr.url]]" class="item poi_name ui_link">[[itr.name]]</a>
                            <div class="item rating-widget">
                                <div class="prw_rup prw_common_location_rating_simple">
                                    <span class="[[itr.classRate]]"></span>
                                </div>
                                <span class="reviewCount">[[itr.reviews]]</span><span>نقد </span>
                            </div>
                            <div class="item tags">[[itr.city]] <span>در </span><span>[[itr.state]]</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.calendar')