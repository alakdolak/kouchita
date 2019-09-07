<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/eatery_overview.css?v=2')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <title>لیست صنایع دستی</title>
<style>
    .moreItems{
        display: block;
        text-align: center;
        margin-top: 5px;
        cursor: pointer;
    }
    .lessItems{
        display: block;
        text-align: center;
        margin-top: 5px;
        cursor: pointer;
    }
</style>
</head>
<body id="BODY_BLOCK_JQUERY_REFLOW" class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class=" hotels_lf_redesign ui_container is-mobile responsive_body">
        <div class="restaurants_list">
            <DIV ID="taplc_hotels_redesign_header_0" class="ppr_rup ppr_priv_hotels_redesign_header">
                <div id="hotels_lf_header" class="restaurants_list">
                    <div id="p13n_tag_header_wrap" class="tag_header p13n_no_see_through ontop hotels_lf_header_wrap">
                        <div id="p13n_tag_header" class="restaurants_list no_bottom_padding">
                            <div id="p13n_welcome_message" class="easyClear">
                                <h1 id="HEADING" class="p13n_geo_hotels ">
                                    @if($placeMode == "hotel")
                                        هتل های
                                    @elseif($placeMode == "restaurant")
                                        رستوران های
                                    @else
                                        اماکن
                                    @endif

                                    @if($mode == "state")
                                         استان
                                    @else
                                         شهر
                                    @endif
                                    {{$city}}
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="map_launch_stub"></div>
                </div>
            </DIV>
            <!--etk-->
        </div>
        <div  class="Restaurants prodp13n_jfy_overflow_visible">
            <div class="wrap"></div>
            <div id="BODYCON" class="col easyClear poolX adjust_padding new_meta_chevron_v2">
                <div class="tmHide">
                    <div id="HAC_INLINE_FRIEND_CONTENT_PLACEHOLDER"></div>
                </div>

                @if($placeMode == "hotel")
                    <form method="post" action="{{route('hotelList', ['city' => $city, 'mode' => $mode])}}">
                        {{csrf_field()}}
                @elseif($placeMode == "restaurant")
                    <form method="post" action="{{route('restaurantList', ['city' => $city, 'mode' => $mode])}}">
                        {{csrf_field()}}
                @else
                    <form method="post" action="{{route('amakenList', ['city' => $city, 'mode' => $mode])}}">
                        {{csrf_field()}}
                @endif
                    <div class="eateryOverviewContent">
                        <div class="ui_columns is-partitioned is-mobile">
                            <div class="ui_column is-9" style="direction: rtl;">
                                <div class="coverpage" id="COVERPAGE_BOX">
                                    <DIV ID="taplc_restaurants_coverpage_content_0" class="ppr_rup ppr_priv_restaurants_coverpage_content">
                                        <div>
                                            <DIV class="prw_rup prw_restaurants_restaurants_coverpage_content">
                                                <div class="coverpage_widget">
                                                    <div class="section">
                                                        <?php $i = 0; ?>
                                                        <div class="single_filter_pois">
                                                            @foreach($hotels as $hotel)
                                                                @if($i % 4 == 0)
                                                                    <div class="title ui_columns"><span class="titleWrap ui_column is-9"><a class="titleLink"></a></span><a class="view_all ui_column is-3" ></a></div>
                                                                    <div class="option">
                                                                        <div class="Price_3 ui_columns is-mobile">
                                                                @endif
                                                                        <div class="ui_column is-3">
                                                                            <div class="poi">
                                                                                @if($placeMode == "hotel")
                                                                                    <a href="{{route('hotelDetails', ['placeId' => $hotel->id, 'placeName' => $hotel->name])}}" class="thumbnail">
                                                                                @elseif($placeMode == "restaurant")
                                                                                    <a href="{{route('restaurantDetails', ['placeId' => $hotel->id, 'placeName' => $hotel->name])}}" class="thumbnail">
                                                                                @else
                                                                                    <a href="{{route('amakenDetails', ['placeId' => $hotel->id, 'placeName' => $hotel->name])}}" class="thumbnail">
                                                                                @endif
                                                                                    <DIV class="prw_rup prw_common_centered_thumbnail" >
                                                                                        <div class="sizing_wrapper" style="width:200px;height:120px;">
                                                                                            <div class="centering_wrapper" style="margin-top:-66px;">
                                                                                                <img src='{{$hotel->pic}}' width="100%" height="100%" class='photo_image' alt='{{$hotel->name}}' style='' >
                                                                                            </div>
                                                                                        </div>
                                                                                    </DIV>
                                                                                </a>
                                                                                <DIV class="prw_rup prw_meta_saves_badge">
                                                                                    <div class="savesButton">
                                                                                        <span class="saves-widget-button saves secondary save-location-5247712 ui_icon heart saves-icon-locator"></span>
                                                                                    </div>
                                                                                </DIV>
                                                                                <div class="detail">

                                                                                    @if($placeMode == "hotel")
                                                                                        <div class="item name " title="{{$hotel->name}}"><a class="poiTitle" target="_blank" href="{{route('hotelDetails', ['placeId' => $hotel->id, 'placeName' => $hotel->name])}}">{{$hotel->name}}</a></div>
                                                                                    @elseif($placeMode == "restaurant")
                                                                                        <div class="item name " title="{{$hotel->name}}"><a class="poiTitle" target="_blank" href="{{route('restaurantDetails', ['placeId' => $hotel->id, 'placeName' => $hotel->name])}}">{{$hotel->name}}</a></div>
                                                                                    @else
                                                                                        <div class="item name " title="{{$hotel->name}}"><a class="poiTitle" target="_blank" href="{{route('amakenDetails', ['placeId' => $hotel->id, 'placeName' => $hotel->name])}}">{{$hotel->name}}</a></div>
                                                                                    @endif
                                                                                    <div class="item rating-count">
                                                                                        <div class="rating-widget">
                                                                                            <DIV class="prw_rup prw_common_location_rating_simple">
                                                                                                @if($hotel->avgRate == 5)
                                                                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                                                                @elseif($hotel->avgRate == 4)
                                                                                                    <span class="ui_bubble_rating bubble_40"></span>
                                                                                                @elseif($hotel->avgRate == 3)
                                                                                                    <span class="ui_bubble_rating bubble_30"></span>
                                                                                                @elseif($hotel->avgRate == 2)
                                                                                                    <span class="ui_bubble_rating bubble_20"></span>
                                                                                                @elseif($hotel->avgRate == 1)
                                                                                                    <span class="ui_bubble_rating bubble_10"></span>
                                                                                                @endif
                                                                                            </DIV>
                                                                                        </div>
                                                                                        <a target="_blank" class="review_count" href="">{{$hotel->reviews}} <span style="color: #16174F;">نقد</span> </a>
                                                                                    </div>
                                                                                    <div class="item">استان: {{$hotel->state}}</div>
                                                                                    <div class="item">شهر: {{$hotel->city}}</div>
                                                                                    <div class="booking"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                @if($i % 4 == 3 || $i == count($hotels) - 1)
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <?php $i++; ?>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                        <div class="coverpage_tracking"></div>
                                    </DIV>
                                </div>
                                <div class="list" id="EATERY_OVERVIEW_BOX">
                                    <div class="eateryOverviewRACMarker hidden"></div>
                                    <div id="EATERY_OVERVIEW" class="deckA eatery_overview">

                                        <div class="geobroaden_state hidden"> </div>
                                        <div id="EATERY_LIST_CONTENTS" style="text-align: center;">
                                            <div id="HAC_FRIEND_SUMMARY_BUBBLE_PLACEHOLDER" class="hidden"></div>
                                            <div id="EATERY_SEARCH_RESULTS">
                                            </div>
                                            <div class="deckTools btm">
                                                <div class="unified pagination js_pageLinks">
                                                    <?php
                                                    $limit = ceil($hotelsCount / 40);
                                                    $passPage = false;
                                                    ?>

                                                    @if($limit == 0)
                                                        <h3 style="color: #963019">موردی یافت نشده</h3>
                                                    @endif

                                                    @if($currPage != $limit && $limit != 0)
                                                        <button value="{{$currPage + 1}}" name="pageNum" class="nav next rndBtn ui_button primary taLnk" style="float: right !important; background-color: #4DC7BC !important; border-color: #4DC7BC !important;">
        بعدی
                                                        </button>
                                                    @endif
                                                    @if($currPage != 1 && $limit != 0)
                                                        <button value="{{$currPage - 1}}" name="pageNum" class="nav next rndBtn ui_button primary taLnk prePage" style="float: left !important;">
                                                            قبلی
                                                        </button>
                                                    @endif

                                                    <div class="pageNumbers">
                                                        @for($i = 1; $i <= $limit; $i++)
                                                            @if(abs($currPage - $i) < 4 || $i == 1 || $i == $limit)
                                                                @if($i == $currPage)
                                                                    <span class="pageNum current" style="background-color: #4DC7BC !important; float: left;">{{$i}}</span>
                                                                @else
                                                                    <button value="{{$i}}" name="pageNum" class="pageNum taLnk" style="float: left; background-color: transparent; border: none">{{$i}}</button>
                                                                @endif
                                                            @elseif($i < $currPage)
                                                                <span class='separator'>&hellip;</span>
                                                            @elseif($i > $currPage && !$passPage)
                                                                <?php
                                                                $passPage = true;
                                                                ?>
                                                                <span class='separator'>&hellip;</span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="LHR" class="lhr ui_column is-3 hideCount reduced_height" style="direction: rtl;">
                                <style>
                                    input[type="checkbox"], input[type="radio"]{
                                        display:none !important;
                                    }

                                    input[type="checkbox"] + label, input[type="radio"] + label{
                                        color:#666666;
                                    }

                                    input[type="checkbox"] + label span, input[type="radio"] + label span {
                                        display:inline-block;
                                        width:19px;
                                        height:19px;
                                        margin:-2px 10px 0 0;
                                        vertical-align:middle;
                                        background:url('{{URL::asset('images/check_radio_sheet.png')}}') left top no-repeat;
                                        cursor:pointer;
                                    }

                                    input[type="checkbox"]:checked + label span, input[type="radio"]:checked + label span{
                                        background:url('{{URL::asset('images/check_radio_sheet.png')}}') -19px top no-repeat;

                                    }

                                </style>

                                <DIV ID="taplc_restaurant_filters_0" class="ppr_rup ppr_priv_restaurant_filters">
                                <div class="verticalFilters placements">
                                    <div id="EATERY_FILTERS_CONT" class="eatery_filters" >
                                        <DIV class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_selectedFilters" class="lhrFilterBlock jfy_filter_bar_selectedFilters selectedFilters" >
                                                @if($placeMode == "amaken")
                                                    <div class="filterGroupTitle">
                                                        <img src="{{URL::asset('images/adv.jpg')}}" style="width: 100%;"/>
                                                        <img src="{{URL::asset('images/bom.jpg')}}" style="margin-top: 18px;width: 100%;"/>
                                                    </div>
                                                    <br>
                                                @endif
                                            </div>
                                        </DIV>

                                        <DIV class="prw_rup prw_restaurants_restaurant_filters">
                                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                                <div class="filterGroupTitle">  مرتب سازی بر اساس</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        @if($sort == "rate")
                                                            <input onChange="this.form.submit()" type="radio" id="c22" name="sort" checked value="rate" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="radio" id="c22" name="sort" value="rate" />
                                                        @endif
                                                        <label for="c22"><span></span>&nbsp;&nbsp;امتیاز  </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        @if($sort == "review")
                                                            <input onChange="this.form.submit()" type="radio" id="c23" name="sort" checked value="review" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="radio" id="c23" name="sort" value="review" />
                                                        @endif
                                                        <label for="c23"><span></span>&nbsp;&nbsp; تعداد نقد </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        @if($sort == "alphabet")
                                                            <input onChange="this.form.submit()" type="radio" id="c24" name="sort" checked value="alphabet" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="radio" id="c24" name="sort" value="alphabet" />
                                                        @endif
                                                        <label for="c24"><span></span>&nbsp;&nbsp; الفبا </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </DIV>

                                        @if($placeMode == "hotel")
                                            <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">  دسته بندی</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c1" name="c1" />
                                                            <label for="c1"><span></span>&nbsp;&nbsp;هتل  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c2" name="" />
                                                            <label for="c2"><span></span>&nbsp;&nbsp; مهمانسرا </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c3" name="c3" />
                                                            <label for="c3"><span></span>&nbsp;&nbsp; ویلا </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            <input type="checkbox" id="c4" name="c4" />
                                                            <label for="c4"><span></span>&nbsp;&nbsp; خانه اجاره ای </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </DIV>
                                            <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">   نوع غذا</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('food_farangi', $selectedColors))
                                                                <input onChange="this.form.submit()" type="checkbox" id="c5" checked name="color[]" value="food_farangi" />
                                                            @else
                                                                <input onChange="this.form.submit()" type="checkbox" id="c5" name="color[]" value="food_farangi" />
                                                            @endif
                                                            <label for="c5"><span></span>&nbsp;&nbsp;فرنگی  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('food_irani', $selectedColors))
                                                                <input onChange="this.form.submit()" type="checkbox" id="c6" checked name="color[]" value="food_irani" />
                                                            @else
                                                                <input onChange="this.form.submit()" type="checkbox" id="c6" name="color[]" value="food_irani" />
                                                            @endif
                                                            <label for="c6"><span></span>&nbsp;&nbsp; ایرانی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('food_mahali', $selectedColors))
                                                                <input type="checkbox" onChange="this.form.submit()" id="c7" name="color[]" checked value="food_mahali" />
                                                            @else
                                                                <input type="checkbox" onChange="this.form.submit()" id="c7" name="color[]" value="food_mahali" />
                                                            @endif
                                                            <label for="c7"><span></span>&nbsp;&nbsp; محلی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('coffeeshop', $selectedColors))
                                                                <input type="checkbox" onChange="this.form.submit()" id="c8" value="coffeeshop" checked name="color[]" />
                                                            @else
                                                                <input type="checkbox" onChange="this.form.submit()" id="c8" value="coffeeshop" name="color[]" />
                                                            @endif
                                                            <label for="c8"><span></span>&nbsp;&nbsp; کافی شاپ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </DIV>
                                            <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">   محدوده قرارگیری </div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('hoome', $selectedColors))
                                                                <input checked onChange="this.form.submit()" type="checkbox" value="hoome" id="c9" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" type="checkbox" value="hoome" id="c9" name="color[]" />
                                                            @endif
                                                            <label for="c9"><span></span>&nbsp;&nbsp;حومه شهر  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('tarikhi', $selectedColors))
                                                                <input checked onChange="this.form.submit()" type="checkbox" name="color[]" value="tarikhi" id="c10" />
                                                            @else
                                                                <input onChange="this.form.submit()" type="checkbox" name="color[]" value="tarikhi" id="c10" />
                                                            @endif
                                                            <label for="c10"><span></span>&nbsp;&nbsp; تاریخی  </label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </DIV>
                                            <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                            <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                <div class="filterGroupTitle">امکانات</div>
                                                <div class="filterContent ui_label_group inline">
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        @if(in_array('parking', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c11" value="parking" checked name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c11" value="parking" name="color[]" />
                                                        @endif
                                                        <label for="c11"><span></span>&nbsp;&nbsp;پارکینگ  </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        @if(in_array('club', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c12" value="club" checked name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c12" value="club" name="color[]" />
                                                        @endif
                                                        <label for="c12"><span></span>&nbsp;&nbsp; باشگاه ورزشی </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        @if(in_array('anten', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c13" value="anten" checked name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c13" value="anten" name="color[]" />
                                                        @endif
                                                        <label for="c13"><span></span>&nbsp;&nbsp;  آنتن دهی موبایل   </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                        @if(in_array('masazh', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c14" value="masazh" checked name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c14" value="masazh" name="color[]" />
                                                        @endif
                                                        <label for="c14"><span></span>&nbsp;&nbsp; سالن ماساژ    </label>
                                                    </div>


                                                    <span onclick="showMoreItems()" class="moreItems">نمایش همه ی موارد</span>


                                                    <div class="ui_input_checkbox filterItem extraItem lhrFilter filter establishmentTypeFilters">
                                                        @if(in_array('pool', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c15" value="pool" checked name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c15" value="pool" name="color[]" />
                                                        @endif
                                                        <label for="c15"><span></span>&nbsp;&nbsp;استخر  </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                        @if(in_array('tahviye', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c16" checked value="tahviye" name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c16" value="tahviye" name="color[]" />
                                                        @endif
                                                        <label for="c16"><span></span>&nbsp;&nbsp; تهویه مطبوع  </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                        @if(in_array('breakfast', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c17" checked value="breakfast" name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c17" value="breakfast" name="color[]" />
                                                        @endif
                                                        <label for="c17"><span></span>&nbsp;&nbsp;  صبحانه مجانی     </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                        @if(in_array('mahali', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c18" checked value="mahali" name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c18" value="mahali" name="color[]" />
                                                        @endif
                                                        <label for="c18"><span></span>&nbsp;&nbsp; امکانات محلی  </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                        @if(in_array('maalool', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c19" checked value="maalool" name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c19" value="maalool" name="color[]" />
                                                        @endif
                                                        <label for="c19"><span></span>&nbsp;&nbsp;امکانات معلولان </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                        @if(in_array('internet', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c20" checked value="internet" name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c20" value="internet" name="color[]" />
                                                        @endif
                                                        <label for="c20"><span></span>&nbsp;&nbsp; اینترنت    </label>
                                                    </div>
                                                    <div class="ui_input_checkbox filterItem lhrFilter extraItem filter">
                                                        @if(in_array('swite', $selectedColors))
                                                            <input onChange="this.form.submit()" type="checkbox" id="c21" value="swite" checked name="color[]" />
                                                        @else
                                                            <input onChange="this.form.submit()" type="checkbox" id="c21" value="swite" name="color[]" />
                                                        @endif
                                                        <label for="c21"><span></span>&nbsp;&nbsp;  سوئیت دربست</label>
                                                    </div>



                                                    <span onclick="showLessItems()" class="lessItems hidden extraItem">پنهان سازی همه ی موارد</span>


                                                </div>
                                            </div>
                                        </DIV>

                                        @elseif($placeMode == "restaurant")
                                                <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                    <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                        <div class="filterGroupTitle">  دسته بندی</div>
                                                        <div class="filterContent ui_label_group inline">
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if($kind_id == 1)
                                                                    <input checked onChange="this.form.submit()" value="1" type="radio" id="c2" name="kind_id" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="1" type="radio" id="c2" name="kind_id" />
                                                                @endif
                                                                <label for="c2"><span></span>&nbsp;&nbsp; رستوران </label>
                                                            </div>
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if($kind_id == 2)
                                                                    <input checked onChange="this.form.submit()" value="2" type="radio" id="c1" name="kind_id" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="2" type="radio" id="c1" name="kind_id" />
                                                                @endif
                                                                <label for="c1"><span></span>&nbsp;&nbsp;فست فود  </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </DIV>
                                                <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                        <div class="filterGroupTitle">   نوع غذا</div>
                                                        <div class="filterContent ui_label_group inline">
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('food_farangi', $selectedColors))
                                                                    <input onChange="this.form.submit()" value="food_farangi" type="checkbox" id="c5" checked name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="food_farangi" type="checkbox" id="c5" name="color[]" />
                                                                @endif
                                                                <label for="c5"><span></span>&nbsp;&nbsp;فرنگی  </label>
                                                            </div>
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('food_irani', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="food_irani" type="checkbox" id="c6" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="food_irani" type="checkbox" id="c6" name="color[]" />
                                                                @endif
                                                                <label for="c6"><span></span>&nbsp;&nbsp; ایرانی </label>
                                                            </div>
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('food_mahali', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="food_mahali" type="checkbox" id="c7" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="food_mahali" type="checkbox" id="c7" name="color[]" />
                                                                @endif
                                                                <label for="c7"><span></span>&nbsp;&nbsp; محلی </label>
                                                            </div>
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('coffeeshop', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="coffeeshop"  type="checkbox" id="c8" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="coffeeshop"  type="checkbox" id="c8" name="color[]" />
                                                                @endif
                                                                <label for="c8"><span></span>&nbsp;&nbsp; کافی شاپ</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </DIV>
                                                <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                        <div class="filterGroupTitle">   محدوده قرارگیری </div>
                                                        <div class="filterContent ui_label_group inline">
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('hoome', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="hoome" type="checkbox" id="c9" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="hoome" type="checkbox" id="c9" name="color[]" />
                                                                @endif
                                                                <label for="c9"><span></span>&nbsp;&nbsp;حومه شهر  </label>
                                                            </div>
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('tarikhi', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="tarikhi" type="checkbox" id="c10" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="tarikhi" type="checkbox" id="c10" name="color[]" />
                                                                @endif
                                                                <label for="c10"><span></span>&nbsp;&nbsp; تاریخی  </label>
                                                            </div>
                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('shologh', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="shologh" type="checkbox" id="c11" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()"  value="shologh" type="checkbox" id="c11" name="color[]" />
                                                                @endif
                                                                <label for="c11"><span></span>&nbsp;&nbsp; شلوغ  </label>
                                                            </div>

                                                            <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                                @if(in_array('khalvat', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="khalvat" type="checkbox" id="c12" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="khalvat" type="checkbox" id="c12" name="color[]" />
                                                                @endif
                                                                <label for="c12"><span></span>&nbsp;&nbsp; خلوت  </label>
                                                            </div>

                                                            <span onclick="showMoreItems()" class="moreItems">نمایش همه ی موارد</span>

                                                            <div class="ui_input_checkbox filterItem lhrFilter filter extraItem">
                                                                @if(in_array('markaz', $selectedColors))
                                                                    <input checked onChange="this.form.submit()" value="markaz" type="checkbox" id="c13" name="color[]" />
                                                                @else
                                                                    <input onChange="this.form.submit()" value="markaz" type="checkbox" id="c13" name="color[]" />
                                                                @endif
                                                                <label for="c13"><span></span>&nbsp;&nbsp; مرکز شهر  </label>
                                                            </div>

                                                            <span onclick="showLessItems()" class="lessItems hidden extraItem">پنهان سازی همه ی موارد</span>


                                                        </div>
                                                    </div>
                                                </DIV>
                                        @else

                                            <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">  دسته بندی</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('tarikhi', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="tarikhi" type="checkbox" id="c1" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="tarikhi" type="checkbox" id="c1" name="color[]" />
                                                            @endif
                                                            <label for="c1"><span></span>&nbsp;&nbsp;تاریخی  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('mooze', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="mooze" type="checkbox" id="c2" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="mooze" type="checkbox" id="c2" name="color[]" />
                                                            @endif
                                                            <label for="c2"><span></span>&nbsp;&nbsp; موزه </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('tabiatgardi', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="tabiatgardi" type="checkbox" id="c3" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="tabiatgardi" type="checkbox" id="c3" name="color[]" />
                                                            @endif
                                                            <label for="c3"><span></span>&nbsp;&nbsp; طبیعت گردی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('markazkharid', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="markazkharid" type="checkbox" id="c5" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="markazkharid" type="checkbox" id="c5" name="color[]" />
                                                            @endif
                                                            <label for="c5"><span></span>&nbsp;&nbsp; مراکز خرید </label>
                                                        </div>

                                                        <span onclick="showMoreItems()" class="moreItems">نمایش همه ی موارد</span>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem">
                                                            @if(in_array('', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="" type="checkbox" id="c6" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="" type="checkbox" id="c6" name="color[]" />
                                                            @endif
                                                            <label for="c6"><span></span>&nbsp;&nbsp; زیارتی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem">
                                                            @if(in_array('tafrihi', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="tafrihi" type="checkbox" id="c7" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="tafrihi" type="checkbox" id="c7" name="color[]" />
                                                            @endif
                                                            <label  for="c7"><span></span>&nbsp;&nbsp; تفریحی </label>
                                                        </div>

                                                        <span onclick="showLessItems()" class="lessItems hidden extraItem">پنهان سازی همه ی موارد</span>
                                                    </div>
                                                </div>
                                            </DIV>
                                            <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">   نوع معماری</div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('ghadimi', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="ghadimi" type="checkbox" id="c9" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="ghadimi" type="checkbox" id="c9" name="color[]" />
                                                            @endif
                                                            <label for="c9"><span></span>&nbsp;&nbsp;قدیمی  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('tarikhibana', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="tarikhibana" type="checkbox" id="c10" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="tarikhibana" type="checkbox" id="c10" name="color[]" />
                                                            @endif
                                                            <label for="c10"><span></span>&nbsp;&nbsp; تاریخی </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('modern', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="modern" type="checkbox" id="c11" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="modern" type="checkbox" id="c11" name="color[]" />
                                                            @endif
                                                            <label for="c11"><span></span>&nbsp;&nbsp; مدرن </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </DIV>
                                            <DIV class="prw_rup prw_restaurants_restaurant_filters" data-prwidget-name="restaurants_restaurant_filters" data-prwidget-init="handlers">
                                                <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible" data-name="establishmentTypeFilters" data-ui="d_list_multi">
                                                    <div class="filterGroupTitle">   محدوده قرارگیری </div>
                                                    <div class="filterContent ui_label_group inline">
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('hoome', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="hoome" type="checkbox" id="c8" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="hoome" type="checkbox" id="c8" name="color[]" />
                                                            @endif
                                                            <label for="c8"><span></span>&nbsp;&nbsp;حومه شهر  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('baftetarikhi', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="baftetarikhi" type="checkbox" id="c12" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="baftetarikhi" type="checkbox" id="c12" name="color[]" />
                                                            @endif
                                                            <label for="c12"><span></span>&nbsp;&nbsp; تاریخی  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('shologh', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="shologh" type="checkbox" id="c13" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="shologh" type="checkbox" id="c13" name="color[]" />
                                                            @endif
                                                            <label for="c13"><span></span>&nbsp;&nbsp; شلوغ  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter establishmentTypeFilters establishmentTypeFilters_10591 selected 0 index_0 alwaysShowItem">
                                                            @if(in_array('khalvat', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="khalvat" type="checkbox" id="c14" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="khalvat" type="checkbox" id="c14" name="color[]" />
                                                            @endif
                                                            <label for="c14"><span></span>&nbsp;&nbsp; خلوت  </label>
                                                        </div>

                                                        <span onclick="showMoreItems2()" class="moreItems2">نمایش همه ی موارد</span>

                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            @if(in_array('markaz', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="markaz" type="checkbox" id="c15" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="markaz" type="checkbox" id="c15" name="color[]" />
                                                            @endif
                                                            <label for="c15"><span></span>&nbsp;&nbsp; مرکز شهر  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            @if(in_array('tabiat', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="tabiat" type="checkbox" id="c16" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="tabiat" type="checkbox" id="c16" name="color[]" />
                                                            @endif
                                                            <label for="c16"><span></span>&nbsp;&nbsp;  طبیعت  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            @if(in_array('kooh', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="kooh" type="checkbox" id="c17" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="kooh" type="checkbox" id="c17" name="color[]" />
                                                            @endif
                                                            <label for="c17"><span></span>&nbsp;&nbsp;  کوه  </label>
                                                        </div>
                                                        <div class="ui_input_checkbox filterItem lhrFilter filter extraItem2">
                                                            @if(in_array('darya', $selectedColors))
                                                                <input checked onChange="this.form.submit()" value="darya" type="checkbox" id="c18" name="color[]" />
                                                            @else
                                                                <input onChange="this.form.submit()" value="darya" type="checkbox" id="c18" name="color[]" />
                                                            @endif
                                                            <label for="c18"><span></span>&nbsp;&nbsp;  دریا  </label>
                                                        </div>

                                                        <span onclick="showLessItems2()" class="lessItems2 hidden extraItem2">پنهان سازی همه ی موارد</span>
                                                    </div>
                                                </div>
                                            </DIV>
                                        @endif

                                    </div>
                                </div>
                            </DIV>
                            <div class="ad iab_medRec">
                                <div id="gpt-ad-300x250-300x600-bottom" class="adInner gptAd delayAd"></div>
                            </div>
                            <div class="ad iab_supSky">
                                <div id="gpt-ad-160x600" class="adInner gptAd delayAd"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="clearFix"></div>
            <div id='lazyload_1836056822_32'>
            </div>
        </div>
    </div>
    <div class="ad iab_leaBoa adAlignNormal">
        <div id="gpt-ad-728x90-d" class="adInner gptAd"></div>
    </div>
    @include('layouts.placeFooter')
</div>
@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif
<script>

    $('.login-button').click(function() {

        var url;
        @if($placeMode == "hotel")
            url = '{{route('hotelList', ['city' => $city, 'mode' => $mode])}}';
        @elseif($placeMode == "amaken")
            url = '{{route('amakenList', ['city' => $city, 'mode' => $mode])}}';
        @else
            url = '{{route('restaurantList', ['city' => $city, 'mode' => $mode])}}';
        @endif

        $(".dark").show();
        showLoginPrompt(url);
    });

    $(document).ready(function() {
        $("#global-nav-hotels").attr('href', '{{route('hotelList', ['city' => $city, 'mode' => $mode])}}');
        $("#global-nav-restaurants").attr('href', '{{route('restaurantList', ['city' => $city, 'mode' => $mode])}}');
        $("#global-nav-amaken").attr('href', '{{route('amakenList', ['city' => $city, 'mode' => $mode])}}');
    });

    function hideElement(val) {
        $("#" + val).addClass('hidden');
        $(".dark").hide();
    }

    function showElement(val) {
        $(".dark").show();
        $("#" + val).removeClass('hidden');
    }

    function showMoreItems() {
        $(".extraItem").removeClass('hidden');
        $(".extraItem").addClass('selected');
        $(".moreItems").addClass('hidden');
    }

    function showLessItems() {
        $(".extraItem").addClass('hidden');
        $(".extraItem").removeClass('selected');
        $(".moreItems").removeClass('hidden');
    }

    function showMoreItems2() {
        $(".extraItem2").removeClass('hidden');
        $(".extraItem2").addClass('selected');
        $(".moreItems2").addClass('hidden');
    }

    function showLessItems2() {
        $(".extraItem2").addClass('hidden');
        $(".extraItem2").removeClass('selected');
        $(".moreItems2").removeClass('hidden');
    }
</script>
<div class="ui_backdrop dark" style="display: none; z-index: 10000000"></div>
</body>
</html>