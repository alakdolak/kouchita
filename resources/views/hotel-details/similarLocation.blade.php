<div id="similarLocationsMainDiv" class="tabContentMainWrap">

    <div class="topBarContainerSimilarLocations display-none"></div>

    <div class="mainSuggestion swiper-container">
        <div class="shelf_header">
            <div class="shelf_title">
                <div class="shelf_title_container h3">
                    <a href="{{route('mainArticle')}}">
                        <h3>مقالات برتر</h3>
                    </a>
                </div>
            </div>
        </div>
        <div id="articleSwiperContent" class="swiper-wrapper"></div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="mainSuggestion swiper-container tabContentMainWrap similarLocationsMainDiv">
        <div class="shelf_header">
            <div class="shelf_title">
                <div class="shelf_title_container h3">
                    <h3>مکان‌های نزدیک</h3>
                </div>
            </div>
        </div>
        <div id="amakenSwiperContent" class="swiper-wrapper"></div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="mainSuggestion swiper-container">
        <div class="shelf_header">
            <div class="shelf_title">
                <div class="shelf_title_container h3">
                    <h3>رستوران‌های نزدیک</h3>
                </div>
            </div>
        </div>
        <div id="restaurantSwiperContent" class="swiper-wrapper"></div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="mainSuggestion swiper-container">
        <div class="shelf_header">
            <div class="shelf_title">
                <div class="shelf_title_container h3">
                    <h3>هتل‌های نزدیک</h3>
                </div>
            </div>
        </div>

        <div id="hotelSwiperContent" class="swiper-wrapper"></div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="mainSuggestion swiper-container">
        <div class="shelf_header">
            <div class="shelf_title">
                <div class="shelf_title_container h3">
                    <h3>ماجراهای نزدیک</h3>
                </div>
            </div>
        </div>

        <div id="majaraSwiperContent" class="swiper-wrapper"></div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<div class="footerOptimizer display-none"></div>

<script>

    function initSwiper() {
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
                    spaceBetween: 15,
                },

                520: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },

                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },

                992: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },

                10000: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                }
            }
        });
    }

    function createSwiperContent(_places, _kind){

        var text = '';
        if(_kind == 'article'){
            for(var i = 0; i < _places.length; i++){
                text += '<div class="swiper-slide">\n' +
                    '                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">\n' +
                    '                    <div class="poi">\n' +
                    '                        <a href="' + _places[i]["url"] + '"\n' +
                    '                           class="thumbnail">\n' +
                    '                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">\n' +
                    '                                <div class="prv_thumb has_image">\n' +
                    '                                    <div class="image_wrapper landscape landscapeWide">\n' +
                    '                                        <img src="' + _places[i]["pic"] + '" alt="' + _places[i]["keyword"] + '" class="image" style="width: 100%;">\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                        </a>\n' +
                    '                        <div class="detail rtl">\n' +
                    '                            <a href="' + _places[i]["url"] + '"\n' +
                    '                               class="item poi_name ui_link ng-binding" style="width: 200px;">' + _places[i]["title"] + '</a>\n' +
                    '                            <div class="item rating-widget">\n' +
                    '                                <span class="reviewCount ng-binding">' + _places[i]["msgs"] + '</span>\n' +
                    '                                <span>نقد </span>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n';
            }
            document.getElementById('articleSwiperContent').innerHTML = text;
        }
        else {
            for (var i = 0; i < _places.length; i++) {
                text += '<div class="swiper-slide">\n' +
                    '                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">\n' +
                    '                    <div class="poi">\n' +
                    '                        <a href="' + _places[i]["url"] + '"\n' +
                    '                           class="thumbnail">\n' +
                    '                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">\n' +
                    '                                <div class="prv_thumb has_image">\n' +
                    '                                    <div class="image_wrapper landscape landscapeWide">\n' +
                    '                                        <img src="' + _places[i]["pic"] + '" alt="' + _places[i]["alt1"] + '" class="image">\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                        </a>\n' +
                    '                        <div class="detail rtl">\n' +
                    '                            <a href="' + _places[i]["url"] + '"\n' +
                    '                               class="item poi_name ui_link ng-binding">' + _places[i]["name"] + '</a>\n' +
                    '                            <div class="item rating-widget">\n' +
                    '                                <div class="prw_rup prw_common_location_rating_simple">\n' +
                    '                                    <span class="ui_bubble_rating bubble_' + _places[i]["rate"] + '0"></span>\n' +
                    '                                </div>\n' +
                    '                                <span class="reviewCount ng-binding">' + _places[i]["reviews"] + '</span>\n' +
                    '                                <span>نقد </span>\n' +
                    '                            </div>\n' +
                    '                            <div class="item tags ng-binding">' + _places[i]["city"]["name"] + '\n' +
                    '                                <span>در </span>\n' +
                    '                                <span class="ng-binding">' + _places[i]["state"]["name"] + '</span>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n';
            }

            if (_kind == 'hotel')
                document.getElementById('hotelSwiperContent').innerHTML = text;
            else if (_kind == 'restuarant')
                document.getElementById('restaurantSwiperContent').innerHTML = text;
            else if (_kind == 'amaken')
                document.getElementById('amakenSwiperContent').innerHTML = text;
            else if (_kind == 'majara')
                document.getElementById('majaraSwiperContent').innerHTML = text;
        }
    }
</script>

{{--if (placeMode == "hotel") {--}}
{{--this.title = "هتل های مشابه";--}}
{{--requestURL = '{{route('getSimilarsHotel')}}';--}}
{{--}--}}
{{--if (placeMode == "amaken") {--}}
{{--this.title = "اماکن مشابه";--}}
{{--requestURL = '{{route('getSimilarsAmaken')}}';--}}
{{--}--}}
{{--if (placeMode == "restaurant") {--}}
{{--this.title = "رستوران های مشابه";--}}
{{--requestURL = '{{route('getSimilarsRestaurant')}}';--}}
{{--}--}}
{{--if (placeMode == "majara") {--}}
{{--this.title = "ماجراجویی های مشابه";--}}
{{--requestURL = '{{route('getSimilarsMajara')}}';--}}
{{--}--}}