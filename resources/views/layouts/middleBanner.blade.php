<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/middleBanner.css')}}'/>

<div style="clear: both;اصطلاحات محلی"></div>
<div class="ui_container">
    <div class="ppr_rup ppr_priv_homepage_shelves">

        <div class="homepage_shelves_widget hideOnPhone">
            <div class="prw_rup prw_homepage_messaging_brand">
                <div id="brand_messaging" class="ui_columns is-hidden-mobile">
                    <div class="ui_column is-12">
                        <div id="3box" class="swiper-container threeBox">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '1.jpg'}}" alt="1">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '2.jpg'}}" alt="2">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '3.jpg'}}" alt="3">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '4.jpg'}}" alt="4">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '5.jpg'}}" alt="5">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '6.jpg'}}" alt="6">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '7.jpg'}}" alt="7">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '8.jpg'}}" alt="8">
                                </div>
                                <div class="swiper-slide">
                                    <img class="eachPicOf3Box" src="{{URL::asset('images') . '9.jpg'}}" alt="9">
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
                                <div  onclick="chooseState('soghat')" class="thumbnail otherServicesBoxes">
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
            <div class="col-xs-12">
                <a class="col-xs-4 squareDiv" href="{{route('mainMode', ['mode' => 'amaken'])}}">
                    <div class="phoneIcon atraction"></div>
                    <div class="textIcon">جاذبه ها</div>
                </a>
                <a class="col-xs-4 squareDiv" href="{{route('tickets')}}">
                    <div class="phoneIcon ticket"></div>
                    <div class="textIcon">بلیط</div>
                </a>
                <a class="col-xs-4 squareDiv" href="{{route('main')}}">
                    <div class="phoneIcon hotel"></div>
                    <div class="textIcon">هتل</div>
                </a>
                {{--<div class="col-xs-4 squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">--}}
                {{--<div class="phoneIcon atraction"></div>--}}
                {{--<div class="textIcon">جاذبه ها</div>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4 squareDiv">--}}
                {{--<a href="{{route('tickets')}}">--}}
                {{--<div class="phoneIcon ticket"></div>--}}
                {{--<div class="textIcon">بلیط</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4 squareDiv">--}}
                {{--<a href="{{route('main')}}">--}}
                {{--<div class="phoneIcon hotel"></div>--}}
                {{--<div class="textIcon">هتل</div>--}}
                {{--</a>--}}
                {{--</div>--}}
            </div>
            <div class="clear-both"></div>
            <div class="col-xs-12">
                <div class="col-xs-4 squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                    <div class="phoneIcon ghazamahali"></div>
                    <div class="textIcon">غذای محلی</div>
                </div>
                <div class="col-xs-4 squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                    <div class="phoneIcon soghat"></div>
                    <div class="textIcon">سوغات</div>
                </div>
                <a class="col-xs-4 squareDiv" href="{{route('mainMode', ['mode' => 'restaurant'])}}" >
                    <div class="phoneIcon restaurant"></div>
                    <div class="textIcon">رستوران</div>
                </a>
                {{--<div class="col-xs-4 squareDiv">--}}
                {{--<a href="{{route('mainMode', ['mode' => 'restaurant'])}}">--}}
                {{--<div class="phoneIcon restaurant"></div>--}}
                {{--<div class="textIcon">رستوران</div>--}}
                {{--</a>--}}
                {{--</div>--}}
            </div>
            <div class="clear-both"></div>
            <div class="col-xs-4"></div>
            <div class="col-xs-4 moreOptionsSquareDiv" onclick="$('#phoneMenuBarPopUp').removeClass('hidden')">
                <span><span class="phoneIcon downArrow"></span>گزینه های بیشتر</span>
            </div>
            <div class="col-xs-4"></div>
        </div>
        @include('layouts.mainSuggestions')
    </div>

</div>