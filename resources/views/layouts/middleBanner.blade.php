
<div class="ui_container">
    <div class="ppr_rup ppr_priv_homepage_shelves">

        <div class="homepage_shelves_widget hideOnPhone">
            <div class="prw_rup prw_homepage_messaging_brand">
                <div id="brand_messaging" class="ui_columns is-hidden-mobile">
                    <div class="ui_column is-12">
                        <div  class="brand_header green" id="knewIranTogetherText"><h1>ایران را باهم بشناسیم</h1></div>
                        <div  id="shareInfoTitleText"> همین حالا با اشتراک تجربیات خود به عنوان یک گردشگر ، خود را به دوستانتان معرفی کنید.</div>
                        @if(!Auth::check())
                            <div class="login-button" id="createAccountMiddleBanner">
                                <span class="ui_icon arrow-left"></span> ساخت پروفایل
                            </div>
                        @endif
                    </div>
                    <div class="ui_column is-4 right-col tripleBoxMiddleBanner" id="tripPlanBoxMiddleBanner">
                        <div class="inner">
                            <div class="icon-mainpage">
                                <span class="ui_icon my-trips"></span>
                            </div>
                            <div class="text">
                                <h2 class="en_US large white">برنامه ریزی کنید</h2>
                                <div class="en_US small white">تمامی مراحل سفر خود را از خرید بلیط تا رزرو هتل با بهترین قیمت ها برنامه ریزی کنید.</div>
                            </div>
                        </div>
                    </div>
                    <div class="ui_column is-4 right-col tripleBoxMiddleBanner">
                        <div class="inner" id="middle-box">
                            <div class="icon-mainpage">
                                <span class="ui_icon seat-flat-bed"></span>
                            </div>
                            <div class="text">
                                <h2 class="en_US large white">خواندن نقد گردشگران</h2>
                                <div class="en_US small white">با خواندن نقد دوستان خود ، بهتر و راحت تر انتخاب کنید</div>
                            </div>
                        </div>
                    </div>
                    <div class="ui_column is-4 right-col tripleBoxMiddleBanner">
                        <div class="inner">
                            <div class="icon-mainpage"><span class="ui_icon search"></span></div>
                            <div class="text">
                                <h2 class="en_US large white"> مقصد سفر </h2>
                                <div class="en_US small white">فقط کافیست مقصد خود را وارد کنید</div>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>

        <div class="homepage_shelves_widget hideOnPhone">
            <div class="prw_rup prw_shelves_shelf_widget">
                <div class="shelf_container poi_by_tag rebrand shelf_row_2">
                    <div class="shelf_header">
                        <div class="shelf_title">
                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                            <div class="shelf_title_container">
                                <a href="" class="ui_link ui_header h2">
                                    <h3>سایرخدمات</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                            <div class="poi">
                                <div onclick="chooseState('sanaye')" class="thumbnail otherServicesBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('images/sanayedasti.jpg')}}" alt="" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">صنایع دستی </span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                            <div class="poi">
                                <div  onclick="chooseState('soghat')" class="thumbnail otherServicesBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('images/soghat.jpg')}}" alt="" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz"> سوغات</span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                            <div class="poi">
                                <div class="thumbnail otherServicesBoxes" "
                                     onclick="chooseState('ghazamahali')">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('images/lfood.jpg')}}" alt="" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz"> غذای محلی</span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile"
                             onclick="chooseGoyesh()">
                            <div class="poi">
                                <a class="thumbnail otherServicesBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('images/estelahat.jpg')}}" alt="" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz"> اصطلاحات محلی</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shelf_container poi_by_tag rebrand shelf_row_2" id="youMayLikeIt">
                    <div class="shelf_header">
                        <div class="shelf_title">
                            <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                            <div class="shelf_title_container">
                                <a class="ui_link ui_header h2"><h3>شاید خوشتان بیاید</h3></a>
                            </div>
                        </div>
                    </div>
                    <div class="shelf_item_container ui_columns is-mobile is-multiline">
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                            <div class="poi">
                                <a href="{{route('soon')}}" class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/lebas.jpg')}}" alt="" class="image"></div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">لباس محلی </span>
                                </a>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                            <div class="poi">
                                <div onclick="chooseStateAmaken()" class="thumbnail youMayLikeItBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/tarikhi.jpg')}}" alt="" class="image"></div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz">  جاذبه ها</span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                            <div class="poi">
                                <div onclick="chooseStateMajara()" class="thumbnail youMayLikeItBoxes">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/majarajooi.jpg')}}" alt="" class="image"></div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz"> سفرهای ماجراجویانه </span>
                                </div>
                            </div>
                        </div>
                        <div class="prw_rup prw_shelves_geo_shelf_item_widget ui_column is-3-tablet is-6-mobile">
                            <div class="poi">
                                <a href="{{route('soon')}}" class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive" data-prwidget-name="common_thumbnail_no_style_responsive" data-prwidget-init="">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide"><img src="{{URL::asset('images/boom.jpg')}}" alt="" class="image"></div>
                                        </div>
                                    </div>
                                    <span class="item name rtl" title="Santa Cruz"> بوم گردی </span>
                                </a>
                            </div>
                        </div>
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
            <div style="clear: both"></div>
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
            <div style="clear: both"></div>
            <div class="col-xs-4"></div>
            <div class="col-xs-4 moreOptionsSquareDiv" onclick="$('#phoneMenuBarPopUp').removeClass('hidden')">
                <span><span class="phoneIcon downArrow"></span>گزینه های بیشتر</span>
            </div>
            <div class="col-xs-4"></div>
        </div>
        @include('layouts.mainSuggestions')
    </div>

</div>