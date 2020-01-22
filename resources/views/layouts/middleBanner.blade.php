<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/middleBanner.css')}}'/>

<div class="clear-both"></div>

<div class="ui_container">
    <div class="ppr_rup ppr_priv_homepage_shelves">

        <div class="homepage_shelves_widget hideOnPhone">
            <div class="prw_rup prw_homepage_messaging_brand">
                <div id="brand_messaging" class="ui_columns is-hidden-mobile">
                    <div class="ui_column is-12">
                        <div id="3box" class="swiper-container threeBox">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/1.jpg')}}" alt="1">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/2.jpg')}}" alt="2">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/3.jpg')}}" alt="3">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/4.jpg')}}" alt="4">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/5.jpg')}}" alt="5">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/6.jpg')}}" alt="6">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/7.jpg')}}" alt="7">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/8.jpg')}}" alt="8">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('defaultPic/9.jpg')}}" alt="9">
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>

        <div class="homepage_shelves_widget hideOnPhone">
            <div class="prw_rup prw_shelves_shelf_widget">
                <div class="shelf_container poi_by_tag rebrand shelf_row_2">
                    {{--<div class="shelf_header">--}}
                        {{--<div class="shelf_title">--}}
                            {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                            {{--<div class="shelf_title_container">--}}
                                {{--<a href="" class="ui_link ui_header h2">--}}
                                    {{--<h3>سایرخدمات</h3>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                        <div class="col-lg-1"></div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column col-lg-3 is-6-mobile">
                            <div class="poi">
                                <div onclick="chooseState('sanaye')" class="thumbnail otherServicesBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('images/sanayedasti.jpg')}}" alt="" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">صنایع دستی</span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column col-lg-3 is-6-mobile">
                            <div class="poi">
                                <div onclick="chooseState('soghat')" class="thumbnail otherServicesBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('images/soghat.jpg')}}" alt="" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">سوغات</span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column col-lg-3 is-6-mobile">
                            <div class="poi">
                                <div class="thumbnail otherServicesBoxes" onclick="chooseState('ghazamahali')">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('images/lfood.jpg')}}" alt="" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">غذای محلی</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        {{--<div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile"--}}
                             {{--onclick="chooseGoyesh()">--}}
                            {{--<div class="poi">--}}
                                {{--<a class="thumbnail otherServicesBoxes">--}}
                                    {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">--}}
                                        {{--<div class="prv_thumb has_image">--}}
                                            {{--<div class="image_wrapper landscape landscapeWide">--}}
                                                {{--<img src="{{URL::asset('images/estelahat.jpg')}}" alt="" class="image">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<span class="item name rtl" title="Santa Cruz">اصطلاحات محلی</span>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="shelf_container poi_by_tag rebrand shelf_row_2" id="youMayLikeIt">
                    {{--<div class="shelf_header">--}}
                        {{--<div class="shelf_title">--}}
                            {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                            {{--<div class="shelf_title_container">--}}
                                {{--<a class="ui_link ui_header h2"><h3>شاید خوشتان بیاید</h3></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                        {{--<div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">--}}
                            {{--<div class="poi">--}}
                                {{--<a href="{{route('soon')}}" class="thumbnail">--}}
                                    {{--<div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">--}}
                                        {{--<div class="prv_thumb has_image">--}}
                                            {{--<div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/lebas.jpg')}}" alt="" class="image"></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<span class="item name rtl" title="Santa Cruz">لباس محلی</span>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-lg-1"></div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column col-lg-3 is-6-mobile">
                            <div class="poi">
                                <div onclick="chooseStateAmaken()" class="thumbnail youMayLikeItBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/tarikhi.jpg')}}" alt="" class="image"></div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">جاذبه</span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column col-lg-3 is-6-mobile">
                            <div class="poi">
                                <div onclick="chooseStateMajara()" class="thumbnail youMayLikeItBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/majarajooi.jpg')}}" alt="" class="image"></div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">سفر ماجراجویانه</span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column col-lg-3 is-6-mobile">
                            <div class="poi">
                                <a href="{{route('soon')}}" class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/boom.jpg')}}" alt="" class="image"></div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">بوم گردی</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hideOnScreen row">
            <div class="boxOFSqureDiv">
                <div class="squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                    <div class="phoneIcon ghazamahali"></div>
                    <div class="textIcon">غذای محلی</div>
                </div>
                <div class="squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                    <div class="phoneIcon soghat"></div>
                    <div class="textIcon">سوغات</div>
                </div>
                <a class="squareDiv" href="{{route('mainMode', ['mode' => 'amaken'])}}">
                    <div class="phoneIcon atraction"></div>
                    <div class="textIcon">جاذبه</div>
                </a>
                <a class="squareDiv" href="{{route('mainMode', ['mode' => 'restaurant'])}}" >
                    <div class="phoneIcon restaurant"></div>
                    <div class="textIcon">رستوران</div>
                </a>
                <a class="squareDiv" href="{{route('main')}}">
                    <div class="phoneIcon hotel"></div>
                    <div class="textIcon">هتل</div>
                </a>
                {{--<a class="col-xs-4 squareDiv" href="{{route('tickets')}}">--}}
                    {{--<div class="phoneIcon ticket"></div>--}}
                    {{--<div class="textIcon">بلیط</div>--}}
                {{--</a>--}}
            </div>
            <div class="phoneMenuBar">
                <div data-toggle="modal" data-target="#others">
                    <span>سایر امکانات</span>
                    <span class="ui_icon more-horizontal"></span>
                </div>
                <div data-toggle="modal" data-target="#register">
                    <span>ثبت نام</span>
                    <span class="ui_icon plus-circle"></span>
                </div>
                <div data-toggle="modal" data-target="#search">
                    <span>جست‌و‌جو</span>
                    <span class="ui_icon search"></span>
                </div>
                <div data-toggle="modal" data-target="#profile">
                    <span>ورود</span>
                    <span class="ui_icon member"></span>
                </div>
            </div>
            <div class="clear-both"></div>
        </div>
        @include('layouts.mainSuggestions')
    </div>
</div>

<div class="container">
    <!-- The Modals -->

    <div class="modal fade" id="others">
        <div class="mainPopUp leftPopUp">

            <div class="lp_phoneMenuBar">
                <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_myTravel', this)">
                    <div class="ui_icon my-trips lp_icons"></div>
                    <div>سفرهای من</div>
                </div>
                <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_mark', this)">
                    <div class="ui_icon casino lp_icons"></div>
                    <div>نشان‌گذاری شده‌ها</div>
                </div>
                <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_messages', this)">
                    <div class="ui_icon notification-bell lp_icons"></div>
                    <div>اعلانات</div>
                </div>
                <div class="lp_eachMenu lp_selectedMenu" onclick="lp_selectMenu('lp_others_recentlyViews', this)">
                    <div class="ui_icon search lp_icons"></div>
                    <div>بازدیدهای اخیر</div>
                </div>
            </div>

            {{--each menu--}}
            <div class="lp_others_content" id="lp_others_recentlyViews">
                <div class="lp_others_titles"> بازدید‌های اخیر </div>
            </div>

            <div class="lp_others_content hidden" id="lp_others_messages">
                <div class="lp_others_titles"> اعلانات </div>
                <div class="lp_others_noMessages">هیچ پیامی موجود نیست</div>
            </div>

            <div class="lp_others_content hidden" id="lp_others_mark">
                <div class="lp_others_titles"> نشان‌گذاری شده‌ها </div>
                <div id="masthead-recent">
                    <a class="lp_others_recentView" target="_self" href="">
                        <div class="lp_others_rvPicBox">
                            <div class="lp_others_rvPic" style="background-image: url(http://localhost:8080/assets/_images/hotels/hotel_kowsar/f-1.jpg);"></div>
                        </div>
                        <div class="">
                            <div class="">هتل کوثر</div>
                            <div class="lp_others_rating">
                                <div class="ui_bubble_rating bubble_45"></div>
                                <br>3 مشاهده
                            </div>
                            <div class="">اصفهان</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="lp_others_content hidden" id="lp_others_myTravel">
                <div class="lp_others_titles"> سفرهای من </div>
                <div>
                    <div class="lp_others_createTrip">
                        <span class="ui_icon plus"></span>
                        <div class="lp_others_createTripText">ایجاد سفر</div>
                    </div>
                    {{--<div onclick="document.location.href = 'http://localhost:8080/shazde/public/tripPlaces/1'" class="trip-images ui_columns is-gapless is-multiline is-mobile">--}}
                        {{--<div class="trip-image ui_column is-6 placeCount0" style="background: url('http://localhost:8080/assets/_images/hotels/hotel_a_pedari/1')"></div>--}}
                        {{--<div class="trip-image trip-image-empty ui_column is-6  placeCount0Else"></div>--}}
                        {{--<div class="trip-image trip-image-empty ui_column is-6 placeCount0Else"></div>--}}
                        {{--<div class="trip-image trip-image-empty ui_column is-6 placeCount0Else"></div>--}}
                    {{--</div>--}}
                    {{--<div class="lp_others_createTripText">یزد </div>--}}
                    {{--<div class="lp_others_createTripText">--}}
                        {{--1398/08/17--}}
                        {{--<p>الی</p>--}}
                        {{--1398/08/14--}}
                    {{--</div>--}}
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="register">
        <div class="mainPopUp leftPopUp">
            <div id="lp_register">
                <button type="button" class="btn btn-warning pp_btns">ثبت نام</button>
                <button type="button" class="btn btn-primary pp_btns">ورود</button>
                <a style="font-size: 1.25em">ویرایش اطلاعات</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="search">
        <div class="mainPopUp leftPopUp">

            <div class="pSC_tilte">
                <div>شما در حال حاضر در شهر <span class="pSC_cityTilte">اصفهان </span>هستید</div>
                <button type="button" class="btn btn-danger" style="font-size: 0.75em">تغییر دهید</button>
            </div>
            <div class="pSC_cityDescription">شما می توانید به راحتی صفحات زیر را در  <span>استان اصفهان </span>مشاهده نمایید</div>
            <div class="pSC_boxOfDetails">
                <div class="pSC_choiseDetailsText">به سادگی انتخاب کنید</div>
                <div class="pSC_boxOfCityDetailsText">
                    <span>مشاهده صفحه شهر اصفهان</span>
                    <span class="pSC_boxOfCityDetailsText2">در استان اصفهان</span>
                </div>
                <div>
                    <div class="pSC_boxOfCityDetails">
                        <div class="pSC_cityDetails">جاذبه‌های اصفهان</div>
                        <div class="pSC_cityDetails">هتل‌های اصفهان</div>
                    </div>
                    <div class="pSC_boxOfCityDetails">
                        <div class="pSC_cityDetails">مقاله‌های اصفهان</div>
                        <div class="pSC_cityDetails">رستوران‌های اصفهان</div>
                    </div>
                    <div class="pSC_boxOfCityDetails">
                        <div class="pSC_cityDetails">صنایع دستی‌های اصفهان</div>
                        <div class="pSC_cityDetails">غذای محلی‌های اصفهان</div>
                    </div>
                </div>
            </div>

            @include('layouts.placeFooter')

        </div>
    </div>

    <div class="modal fade" id="profile">
        <div class="mainPopUp rightPopUp">
            <div id="lp_register">
                <button type="button" class="btn btn-warning pp_btns">صفحه پروفایل</button>
                <button type="button" class="btn btn-primary pp_btns">صفحه من</button>
                <button type="button" class="btn btn-danger pp_btns">خروج</button>
                <a style="font-size: 1.25em">ویرایش اطلاعات</a>
            </div>
        </div>
    </div>

</div>
