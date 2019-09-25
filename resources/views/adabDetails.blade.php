@extends('layouts.bodyPlace')

<?php
    $total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
    if($total == 0)
        $total = 1;
?>

@section('title')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/media_uploader.css')}}">
    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
    <title>{{$place->name}}  | شازده مسافر</title>
@stop

@section('meta')
    <meta name="keywords" content="{{$place->keyword}}">
    <meta property="og:description" content="{{$place->meta}}"/>
    <meta property="article:tag" content="{{$place->tag_1}}"/>
    <meta property="article:tag" content="{{$place->tag_2}}"/>
    <meta property="article:tag" content="{{$place->tag_3}}"/>
    <meta property="article:tag" content="{{$place->tag_4}}"/>
    <meta property="article:tag" content="{{$place->tag_5}}"/>
    <meta property="article:tag" content="{{$place->tag_6}}"/>
    <meta property="article:tag" content="{{$place->tag_7}}"/>
    <meta property="article:tag" content="{{$place->tag_8}}"/>
    <meta property="article:tag" content="{{$place->tag_9}}"/>
    <meta property="article:tag" content="{{$place->tag_10}}"/>
    <meta property="article:tag" content="{{$place->tag_11}}"/>
    <meta property="article:tag" content="{{$place->tag_12}}"/>
    <meta property="article:tag" content="{{$place->tag_13}}"/>
    <meta property="article:tag" content="{{$place->tag_14}}"/>
    <meta property="article:tag" content="{{$place->tag_15}}"/>
    <meta property="og:title" content="{{$place->name}} | {{$state->name}} | شازده مسافر"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="{{$place->meta}}"/>
    <meta name="twitter:title" content="{{$place->name}} | {{$state->name}} | شازده مسافر"/>
    <meta property="og:url" content="{{Request::url()}}"/>
    @if(count($photos) > 0)
        <meta property="og:image" content="{{$photos[0]}}"/>
        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>
        <meta property="og:image:width" content="550"/>
        <meta property="og:image:height" content="367"/>
        <meta name="twitter:image" content="{{$photos[0]}}"/>
    @endif
    <meta content="article" property="og:type"/>

@stop

@section('header')
    @parent
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/cropper.css')}}">

    <style>
        .btn-primary:focus {
            box-shadow: 0 0 0 0 !important;
        }
        .btn-success:focus {
            box-shadow: 0 0 0 0 !important;
        }
    </style>
@stop

@section('main')

    @include('layouts.pop-up-create-trip_in_hotel_details')

    <div class="global-nav-no-refresh" id="global-nav-no-refresh-2">
        <div id="taplc_global_nav_onpage_assets_0" class="ppr_rup ppr_priv_global_nav_onpage_assets" data-placement-name="global_nav_onpage_assets">
            <div class="ui_container">
                <div class="ui_columns easyClear">
                    <div class="ui_column" style="direction: rtl;position: relative;">
                        @include('layouts.shareBox')
                        <div ID="taplc_trip_planner_breadcrumbs_0" class="ppr_rup ppr_priv_trip_planner_breadcrumbs">
                            <ul class="breadcrumbs">
                                @if(Auth::check() && Auth::user()->level != 0)
                                    <li class="breadcrumb" itemscope>
                                        <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}
                                           href="http://panel.baligh.ir/changeAlt/{{$place->id}}/8"
                                           itemprop="url">
                                            <span itemprop="title">مدیریت alt ها و تصاویر</span>
                                        </a>&nbsp;
                                        <span class="ui_icon single-chevron-left"></span>&nbsp;
                                    </li>
                                    <li class="breadcrumb" itemscope>
                                        <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}
                                           href="http://panel.baligh.ir/changeContent/{{$state->id}}/8/0/{{$place->name}}"
                                           itemprop="url">
                                            <span itemprop="title">مدیریت محتوا</span>
                                        </a>&nbsp;
                                        <span class="ui_icon single-chevron-left"></span>&nbsp;
                                    </li>
                                    <li class="breadcrumb" itemscope>
                                        <a class="link" target="_blank" {{($config->panelNoFollow) ? 'rel="nofollow"' : ''}}
                                           href="http://panel.baligh.ir/changeSeo/{{$state->id}}/0/{{$place->name}}/8"
                                           itemprop="url">
                                            <span itemprop="title">مدیریت سئو</span>
                                        </a>&nbsp;
                                        <span class="ui_icon single-chevron-left"></span>&nbsp;
                                    </li>
                                @endif
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div ID="taplc_hr_atf_north_star_nostalgic_0" class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic" style="position: relative">
        <div class="atf_header_wrapper" style="position: relative">
            <div class="atf_header ui_container is-mobile full_width" style="position: relative">
                <div ID="taplc_location_detail_header_hotels_0" class="ppr_rup ppr_priv_location_detail_header" style="position: relative">
                    <h1 id="HEADING" class="heading_title" property="name">{{$place->name}}</h1>
                    <div style="position: relative">
                        @if($hasLogin)
                            <div id="targetHelp_7" class="targets" style="float: left;">
                                <span onclick="bookMark()" class="ui_button casino save-location-7306673 ui_icon {{($bookMark) ? "castle" : "red-heart"}} ">نشانه گذاری</span>
                                <div id="helpSpan_7" class="helpSpans hidden row">
                                    <span class="introjs-arrow"></span>
                                    <p style="font-size: 12px; line-height: 1.428 !important;">شاید بعدا بخواهید دوباره به همین مکان باز گردید. پس آن را نشان کنید تا از منوی بالا هر وقت که خواستید دوباره به آن باز گردید.</p>
                                    <button data-val="7" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_7">بعدی</button>
                                    <button data-val="7" class="btn btn-primary backBtnsHelp" id="backBtnHelp_7">قبلی</button>
                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                </div>
                            </div>
                        @endif
                        <div class="rating_and_popularity">
                            <span class="header_rating">
                               <div class="rs rating" rel="v:rating">
                                   <div class="prw_rup prw_common_bubble_rating overallBubbleRating" style="float: right;">
                                        @if($avgRate == 5)
                                           <span class="ui_bubble_rating bubble_50" style="font-size:16px;" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                       @elseif($avgRate == 4)
                                           <span class="ui_bubble_rating bubble_40" style="font-size:16px;" property="ratingValue" content="4" alt='4 of 5 bubbles'></span>
                                       @elseif($avgRate == 3)
                                           <span class="ui_bubble_rating bubble_30" style="font-size:16px;" property="ratingValue" content="3" alt='3 of 5 bubbles'></span>
                                       @elseif($avgRate == 2)
                                           <span class="ui_bubble_rating bubble_20" style="font-size:16px;" property="ratingValue" content="2" alt='2 of 5 bubbles'></span>
                                       @elseif($avgRate == 1)
                                           <span class="ui_bubble_rating bubble_10" style="font-size:16px;" property="ratingValue" content="1" alt='1 of 5 bubbles'></span>
                                       @endif
                                    </div>
                                   <a class="more taLnk" href="#REVIEWS" style="margin-right: 15px;">
                                       <span property="v:count" id="commentCount"></span> نقد
                                   </a>
                               </div>
                            </span>
                            <span class="header_popularity popIndexValidation" style="margin-right: 0 !important">
                                <a>{{$total}} امتیاز</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div ID="taplc_hsx_special_messaging_HotelReview_0" class="ppr_rup ppr_priv_hsx_special_messaging">
                    <div data-targetEvent="update-hsx_special_messaging:HotelReview">
                        <div class="hsx_special_messaging"></div>
                    </div>
                </div>
                <div ID="taplc_new_hotel_promo_header_0" class="ppr_rup ppr_priv_new_hotel_promo_header"></div>
            </div>
        </div>

        <div class="atf_meta_and_photos_wrapper">
            <div class="atf_meta_and_photos ui_container is-mobile easyClear">
                <div class="prw_rup prw_common_location_photos photos">
                    <div id="targetHelp_8" class="targets" style="height: 400px;">
                        <div class="inner" style="max-width: 752px; max-height: 338px;">
                            <div class="primaryWrap" style="width:75%;">
                                <div class="prw_rup prw_common_mercury_photo_carousel">
                                    <div class="carousel bignav" style="max-height: 338px;">
                                        <div class="carousel_images carousel_images_header">
                                            <div class="see_all_count_wrap"><span class="see_all_count"><span class="ui_icon camera"></span>&nbsp;&nbsp;تمام عکس ها {{$userPhotos + $sitePhotos}} </span></div>
                                            <div class="entry_cta_wrap"><span class="entry_cta"><span class="ui_icon expand"></span>اندازه بزرگ عکس </span></div>
                                        </div>
                                        <div onclick="photoRoundRobin(-1)" class="left-nav left-nav-header"></div>
                                        <div onclick="photoRoundRobin(1)" class="right-nav right-nav-header"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="secondaryWrap">
                                <div class="tileWrap" style="height:33.333332%;">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                                @if($sitePhotos != 0)
                                                    <span onclick="getPhotos(-1)" class="imgWrap" style="max-width:200px;max-height:113px;">
                                                    <img alt="{{$place->alt1}}" src="{{$thumbnail}}" class="centeredImg" style=" min-width:152px; " width="100%" />
                                                </span>
                                                @else
                                                    <span class="imgWrap" style="max-width:200px;max-height:113px;"></span>
                                                @endif
                                            </div>
                                            @if($sitePhotos != 0)
                                                <div onclick="getPhotos(-1)" class="albumInfo">
                                                    <span class="ui_icon camera">&nbsp;</span>عکس های سایت {{$sitePhotos}}
                                                </div>
                                            @else
                                                <div class="albumInfo">
                                                    <span class="ui_icon camera">&nbsp;</span>عکس های سایت {{$sitePhotos}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tileWrap" style="height:33.333332%;">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                                <span class="imgWrap " style="max-width:200px;max-height:113px;">
                                                    @if($userPhotos != 0)
                                                        <img onclick="getPhotos('{{$logPhoto['id']}}')" src="{{$logPhoto['pic']}}" class="centeredImg" style=" min-width:152px; " width="100%" />
                                                    @endif
                                                </span>
                                            </div>
                                            <div {{($userPhotos != 0) ? "onclick='getPhotos(\"" . $logPhoto['id'] . "\")'" : "" }}  class="albumInfo"><span class="ui_icon camera">&nbsp;</span>عکس های کاربران {{$userPhotos}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tileWrap" style="height:33.333332%;">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image"><span class="imgWrap "style="max-width:200px;max-height:113px;"><img src="" class="centeredImg" style=" min-width:113px; " width="100%"/></span></div>
                                            <div class="albumInfo"><span class="ui_icon camera">&nbsp;</span>محتواهای تعاملی</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="helpSpan_8" class="helpSpans hidden row">
                            <span class="introjs-arrow"></span>
                            <p>عکس های دوستانتان را از دست ندهید. گاهی وقت ها یک عکس سخن های بسیاری دارد.</p>
                            <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                            <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="MAINWRAP" class=" full_meta_photos_v3  full_meta_photos_v4  big_pic_mainwrap_tweaks horizontal_xsell ui_container is-mobile ">
        <div id="MAIN" class="Hotel_Review prodp13n_jfy_overflow_visible">
            <div id="BODYCON" ng-app="mainApp" class="col easyClear bodLHN poolB adjust_padding new_meta_chevron new_meta_chevron_v2">
                <div class="col-xs-12 menu" style="padding: 15px 0; height: 70px !important; text-align: center;box-shadow: 0px 4px 5px #888888;">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-2"><a href="#ansAndQeustionDiv">سوال و جواب</a></div>
                    <div class="col-xs-2"><a href="#photosDiv">عکس ها</a></div>
                    <div class="col-xs-2"><a href="#shops">فروشگاه ها</a></div>
                    <div class="col-xs-2"><a href="#reviewsDiv">نقدها</a></div>
                    <div class="col-xs-2"><a href="#introduction">معرفی کلی</a></div>
                    <div class="col-xs-1"></div>
                </div>
                <div style="height: 90px;background-color: rgb(248,248,248);"></div>
                <div class="hr_btf_wrap" style="position: relative">
                    <div id="introduction" class="ppr_rup ppr_priv_location_detail_overview">
                        <div class="block_wrap" data-tab="TABS_OVERVIEW">
                            <div class="block_header" style="border: none !important;; padding: 7px 0 !important; margin: 0 !important;">
                                <h3 class="block_title" style="padding-top: 10px;">معرفی کلی </h3>
                            </div>
                            <div style="margin: 15px 0 !important;">
                                <div id="showMore" onclick="showMore2()" style="float: left; cursor: pointer; color:#4dc7bc; font-size: 13px;" class="hidden">بیشتر</div>
                                <div class="overviewContent" id="introductionText" style="direction: rtl; font-size: 14px; max-height: 21px; overflow: hidden;">{!!html_entity_decode($place->description)!!}</div>
                            </div>
                            <div class="overviewContent">
                                <div class="ui_columns is-multiline is-mobile reviewsAndDetails" style="direction: ltr;">
                                    <div class="ui_column is-8 details">
                                        <div class="overviewContent" id="dastoor" style="direction: rtl; line-height: 20px; font-size: 14px; max-height: 190px; overflow: hidden; padding: 10px">{!!html_entity_decode($place->dastoor)!!}</div>
                                        <div id="showMoreDastoor" onclick="showMore3()" style="cursor: pointer;color:#16174f;" class="hidden">بیشتر</div>
                                    </div>
                                    <div class="ui_column  is-4 reviews" style="direction: ltr;border-width: 0 0px 0 1px;">
                                        <div class="rating">
                                            <span class="overallRating">{{$avgRate}} </span>
                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating">
                                                @if($avgRate == 5)
                                                    <span class="ui_bubble_rating bubble_50" style="font-size:28px;" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                                @elseif($avgRate == 4)
                                                    <span class="ui_bubble_rating bubble_40" style="font-size:28px;" property="ratingValue" content="4" alt='4 of 5 bubbles'></span>
                                                @elseif($avgRate == 3)
                                                    <span class="ui_bubble_rating bubble_30" style="font-size:28px;" property="ratingValue" content="3" alt='3 of 5 bubbles'></span>
                                                @elseif($avgRate == 2)
                                                    <span class="ui_bubble_rating bubble_20" style="font-size:28px;" property="ratingValue" content="2" alt='2 of 5 bubbles'></span>
                                                @elseif($avgRate == 1)
                                                    <span class="ui_bubble_rating bubble_10" style="font-size:28px;" property="ratingValue" content="1" alt='1 of 5 bubbles'></span>
                                                @endif
                                            </div>
                                            <a class="seeAllReviews autoResize" href="#REVIEWS"></a>
                                        </div>
                                        <div class="prw_rup prw_common_ratings_histogram_overview overviewHistogram">
                                            <ul class="ratings_chart">
                                                <li class="chart_row highlighted clickable">
                                                    <span class="row_count row_cell">{{ceil($rates[4] * 100 / $total)}} %</span>
                                                    <span class="row_bar row_cell">
                                                        <span class="bar">
                                                            <span class="fill" style="width: {{ceil($rates[4] * 100 / $total)}}%;"></span>
                                                        </span>
                                                    </span>
                                                    <span class="row_label row_cell">عالی</span>
                                                </li>
                                                <li class="chart_row clickable">
                                                    <span class="row_count row_cell">{{ceil($rates[3] * 100 / $total)}} %</span>
                                                    <span class="row_bar row_cell">
                                                        <span class="bar">
                                                            <span class="fill" style="width:{{ceil($rates[3] * 100 / $total)}}%;"></span>
                                                        </span>
                                                    </span>
                                                    <span class="row_label row_cell">خوب</span>
                                                </li>
                                                <li class="chart_row clickable">
                                                    <span class="row_count row_cell">{{ceil($rates[2] * 100 / $total)}} %</span>
                                                    <span class="row_bar row_cell">
                                                        <span class="bar">
                                                            <span class="fill" style="width:{{ceil($rates[2] * 100 / $total)}}%;"></span>
                                                        </span>
                                                    </span>
                                                    <span class="row_label row_cell">معمولی</span></li>
                                                <li class="chart_row clickable">
                                                    <span class="row_count row_cell">{{ceil($rates[1] * 100 / $total)}} %</span>
                                                    <span class="row_bar row_cell">
                                                        <span class="bar">
                                                            <span class="fill" style="width:{{ceil($rates[1] * 100 / $total)}}%;"></span>
                                                        </span>
                                                    </span>
                                                    <span class="row_label row_cell">ضعیف</span></li>
                                                <li class="chart_row">
                                                    <span class="row_count row_cell">{{ceil($rates[0] * 100 / $total)}} %</span>
                                                    <span class="row_bar row_cell">
                                                        <span class="bar">
                                                            <span class="fill" style="width:{{ceil($rates[0] * 100 / $total)}}%;"></span>
                                                        </span>
                                                    </span>
                                                    <span class="row_label row_cell">خیلی بد </span></li>
                                            </ul>
                                        </div>
                                        <div class="address" style="float: right; font-size: 14px">
                                            {{$place->address}}
                                        </div>
                                        <style>
                                            .tag {
                                                margin: 5px;
                                                float: right;
                                                direction: rtl;
                                            }
                                        </style>
                                        <div>
                                            <span class="tag">برچسب ها:</span>
                                            <span class="tag">{{$place->tag_1}}</span>
                                            <span class="tag">{{$place->tag_2}}</span>
                                            <span class="tag">{{$place->tag_3}}</span>
                                            <span class="tag">{{$place->tag_4}}</span>
                                            <span class="tag">{{$place->tag_5}}</span>
                                            <span class="tag">{{$place->tag_6}}</span>
                                            <span class="tag">{{$place->tag_7}}</span>
                                            <span class="tag">{{$place->tag_8}}</span>
                                            <span class="tag">{{$place->tag_9}}</span>
                                            <span class="tag">{{$place->tag_10}}</span>
                                            <span class="tag">{{$place->tag_11}}</span>
                                            <span class="tag">{{$place->tag_12}}</span>
                                            <span class="tag">{{$place->tag_13}}</span>
                                            <span class="tag">{{$place->tag_14}}</span>
                                            <span class="tag">{{$place->tag_15}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="reviewsDiv" style="direction: rtl" class="ppr_rup ppr_priv_location_detail_two_column" style="position: relative;">
                        <div class="column_wrap ui_columns is-mobile" style="direction: rtl; position: relative;">
                            <div class="content_column ui_column is-8" style="margin-top: 20px; position: relative;">
                                <div ID="taplc_location_reviews_container_hotels_0" class="ppr_rup ppr_priv_location_reviews_container" style="position: relative">
                                    <div id="REVIEWS" class="ratings_and_types concepts_and_filters block_wrap" data-tab="TABS_REVIEWS" style="position: relative">
                                        <div class="header_group block_header" style="position: relative">
                                            <div id="targetHelp_9" class="targets row" style="max-width: 100px; float: left">
                                                <a style="color: #FFF !important;" onclick="showAddReviewPage('{{route('review', ['placeId' => $place->id, 'kindPlaceId' => $kindPlaceId])}}')" class="button_war write_review ui_button primary">نوشتن نقد</a>
                                                <div id="helpSpan_9" class="helpSpans hidden">
                                                    <span class="introjs-arrow"></span>
                                                    <p>اگر تجربه ای از این مکان دارید به ما بگویید تا دوستانتان هم ببینند. در ضمن برای هر نقد امتیاز هیجان انگیزی می گیرید. </p>
                                                    <button data-val="9" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_9">بعدی</button>
                                                    <button data-val="9" class="btn btn-primary backBtnsHelp" id="backBtnHelp_9">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                            <h3 class="tabs_header reviews_header block_title"> نقدها <span class="reviews_header_count block_title"></span></h3>
                                        </div>
                                        <div id="targetHelp_10" class="targets">
                                            <div ID="taplc_location_review_filter_controls_hotels_0" class="ppr_rup ppr_priv_location_review_filter_controls">
                                                <div id="filterControls" class="with_histogram">
                                                    <div class="main ui_columns is-mobile">
                                                        <div id="ratingFilter" class="ui_column is-5 rating">
                                                            <div class="colTitle">امتیاز</div>
                                                            <ul>
                                                                <li class="filterItem">
                                                                    <span class="toggle">
                                                                        <div class='ui_input_checkbox'>
                                                                            <input onclick="filter()" id="excellent" type="checkbox" name="filterComment[]" value="rate_5" class="filterInput">

                                                                            <label class='labelForCheckBox' for='excellent'>
                                                                                <span></span>&nbsp;&nbsp;
                                                                            </label>
                                                                        </div>
                                                                    </span>
                                                                    <label class="filterLabel">
                                                                        <div class="row_label">عالی</div>
                                                                        <span class="row_bar">
                                                                            <span class="row_fill" style="width:{{$rates[4] * 100 / $total}}%;"></span>
                                                                        </span>
                                                                        <span>{{$rates[4]}}</span>
                                                                    </label>
                                                                </li>

                                                                <li class="filterItem">
                                                                    <span class="toggle">
                                                                        <div class='ui_input_checkbox'>
                                                                            <input onclick="filter()" type="checkbox" id="very_good" name="filterComment[]" value="rate_4" class="filterInput">

                                                                            <label class='labelForCheckBox' for='very_good'>
                                                                                <span></span>&nbsp;&nbsp;
                                                                            </label>
                                                                        </div>
                                                                    </span>

                                                                    <label class="filterLabel">
                                                                        <div class="row_label">خوب</div>
                                                                        <span class="row_bar">
                                                                            <span class="row_fill" style="width:{{$rates[3] * 100 / $total}}%;"></span>
                                                                        </span>
                                                                        <span>{{$rates[3]}}</span>
                                                                    </label>
                                                                </li>


                                                                <li class="filterItem">
                                                                    <span class="toggle">
                                                                        <div class='ui_input_checkbox'>
                                                                           <input onclick="filter()" type="checkbox" id="average" name="filterComment[]" value="rate_3" class="filterInput">

                                                                            <label class='labelForCheckBox' for='average'>
                                                                                <span></span>&nbsp;&nbsp;
                                                                            </label>
                                                                        </div>
                                                                    </span>
                                                                    <label class="filterLabel">
                                                                        <div class="row_label">معمولی</div>
                                                                        <span class="row_bar">
                                                                            <span class="row_fill" style="width:{{$rates[2] * 100 / $total}}%;"></span>
                                                                        </span>
                                                                        <span>{{$rates[2]}}</span>
                                                                    </label>
                                                                </li>


                                                                <li class="filterItem">
                                                                    <span class="toggle">
                                                                        <div class='ui_input_checkbox'>
                                                                            <input onclick="filter()" type="checkbox" name="filterComment[]" value="rate_2" id="poor" class="filterInput">

                                                                            <label class='labelForCheckBox' for='poor'>
                                                                                <span></span>&nbsp;&nbsp;
                                                                            </label>
                                                                        </div>
                                                                    </span>
                                                                    <label class="filterLabel">
                                                                        <div class="row_label">ضعیف</div>
                                                                        <span class="row_bar">
                                                                            <span class="row_fill" style="width:{{$rates[1] * 100 / $total}}%;"></span>
                                                                        </span>
                                                                        <span>{{$rates[1]}}</span>
                                                                    </label>
                                                                </li>

                                                                <li class="filterItem">
                                                                    <span class="toggle">
                                                                        <div class='ui_input_checkbox'>
                                                                            <input onclick="filter()" type="checkbox" name="filterComment[]" value="rate_1" id="very_poor" class="filterInput">

                                                                            <label class='labelForCheckBox' for='very_poor'>
                                                                                <span></span>&nbsp;&nbsp;
                                                                            </label>
                                                                        </div>
                                                                    </span>
                                                                    <label class="filterLabel">
                                                                        <div class="row_label">خیلی بد</div>
                                                                        <span class="row_bar">
                                                                            <span class="row_fill" style="width:{{$rates[0] * 100 / $total}}%;"></span>
                                                                        </span>
                                                                        <span>{{$rates[0]}}</span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="ui_column is-2 segment">
                                                            <div class="colTitle">نوع سفر</div>
                                                            <ul>
                                                                @foreach($placeStyles as $placeStyle)
                                                                    <li class="filterItem">
                                                                        <div class='ui_input_checkbox'>
                                                                            <input onclick="filter()" type="checkbox" id="placeStyle_{{$placeStyle->id}}" value="placeStyle_{{$placeStyle->id}}" name="filterComment[]" class="filterInput">
                                                                            <label class='labelForCheckBox' for='placeStyle_{{$placeStyle->id}}'>
                                                                                <span></span>&nbsp;&nbsp;{{$placeStyle->name}}
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="ui_column is-2 season">
                                                            <div class="colTitle">زمان سفر</div>
                                                            <ul>
                                                                <li class="filterItem">
                                                                    <div class='ui_input_checkbox'>
                                                                        <input onclick="filter()" value="season_1" id="season_1" type="checkbox" name="filterComment[]" class="filterInput">
                                                                        <label class='labelForCheckBox' for='season_1'>
                                                                            <span></span>&nbsp;&nbsp;بهار
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li class="filterItem">
                                                                    <div class='ui_input_checkbox'>
                                                                        <input onclick="filter()" value="season_2" id="season_2" type="checkbox" name="filterComment[]" class="filterInput">
                                                                        <label class='labelForCheckBox' for='season_2'>
                                                                            <span></span>&nbsp;&nbsp;تابستان
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li class="filterItem">
                                                                    <div class='ui_input_checkbox'>
                                                                        <input onclick="filter()" value="season_3" id="season_3" type="checkbox" name="filterComment[]" class="filterInput">
                                                                        <label class='labelForCheckBox' for='season_3'>
                                                                            <span></span>&nbsp;&nbsp;پاییز
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li class="filterItem">
                                                                    <div class='ui_input_checkbox'>
                                                                        <input onclick="filter()" value="season_4" id="season_4" type="checkbox" name="filterComment[]" class="filterInput">
                                                                        <label class='labelForCheckBox' for='season_4'>
                                                                            <span></span>&nbsp;&nbsp;زمستان
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <input type="hidden" name="filterSeasons" value="">
                                                        </div>
                                                        <div class="ui_column is-3 language">
                                                            <div class="colTitle">مبدا سفر</div>
                                                            <?php $limit = (count($srcCities) > 4) ? 4 : count($srcCities) ?>
                                                            <ul>
                                                                @for($i = 0; $i < $limit; $i++)
                                                                    <li class="filterItem">
                                                                        <div class='ui_input_checkbox'>
                                                                            <input onclick="filter()" value="srcCity_{{$srcCities[$i]->src}}" id="srcCity_{{$srcCities[$i]->src}}" type="checkbox" name="filterComment[]" class="filterInput">
                                                                            <label class='labelForCheckBox' for="srcCity_{{$srcCities[$i]->src}}">
                                                                                <span></span>&nbsp;&nbsp;{{$srcCities[$i]->src}}
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                @endfor
                                                                @if(count($srcCities) > 4)
                                                                    <li class="filterItem"><span class="toggle"></span><span onclick="toggleMoreCities()" id="moreLessSpan" class="taLnk more">شهرهای بیشتر</span></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="moreCities" class="hidden">
                                                    <div class="ppr_rup ppr_priv_location_review_filter_controls">
                                                        <div style="font-size: 18px" class="title">شهر ها</div>
                                                        <ul class="langs">
                                                            @for($i = 4; $i < count($srcCities); $i++)
                                                                <li class="filterItem">
                                                                    <div class='ui_input_checkbox'>
                                                                        <input onclick="filter()" value="srcCity_{{$srcCities[$i]->src}}" id="srcCity_{{$srcCities[$i]->src}}" type="checkbox" name="filterComment[]" class="filterInput">
                                                                        <label class='labelForCheckBox' for="srcCity_{{$srcCities[$i]->src}}">
                                                                            <span></span>&nbsp;&nbsp;{{$srcCities[$i]->src}}
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div ID="taplc_location_review_keyword_search_hotels_0" class="ppr_rup ppr_priv_location_review_keyword_search" style="position: relative">
                                            <div id="taplc_location_review_keyword_search_hotels_0_search">
                                                <label class="title" for="taplc_location_review_keyword_search_hotels_0_q">نمایش جستجو در نقد ها </label>
                                                <div id="taplc_location_review_keyword_search_hotels_0_search_box" class="search_box_container">
                                                    <div class="search">
                                                        <div class="search-input ">
                                                            <div class="search-submit" onclick="comments($('#comment_search_text').val())">
                                                                <div class="submit"><span class="ui_icon search search-icon"/></div>
                                                            </div>
                                                            <input type="text" autocomplete="off" id="comment_search_text" placeholder='جستجو در نقد ها' class="text_input nocloud"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ui_tagcloud_group easyClear">
                                                <span id="taplc_location_review_keyword_search_hotels_0_all_reviews" class="ui_tagcloud selected fl all_reviews" data-content="-1">همه ی نقدها</span>
                                                @foreach($tags as $tag)
                                                    <span class="ui_tagcloud fl" data-content="{{$tag->name}}">{{$tag->name}}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                            <div id="helpSpan_10" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در سریع تر زمان نقدی که مناسب شما باشد را بیابید و با خواندن آن بهتر تصمیم بگیرید. اگر نقد ها کم است سعی کنید بعد از سفر نقد خود را اضافه کنید تا دوستان تان از آن استفاده کنند.</p>
                                                <button data-val="10" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_10">بعدی</button>
                                                <button data-val="10" class="btn btn-primary backBtnsHelp" id="backBtnHelp_10">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                            <div id="reviewsContainer" class="ppr_rup ppr_priv_location_reviews_list"></div>
                                        <div class="unified pagination north_star">
                                            <div class="pageNumbers" id="pageNumCommentContainer"></div>
                                        </div>
                                        <div class="loadingContainer hidden">
                                            <div class="loadingWhiteBox"></div>
                                            <div class="loadingBox">Updating list...<span class="loadingBoxImg"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ppr_rup ppr_priv_new_hotel_promo"></div>
                            </div>
                            <div class="ad_column ui_column is-4" style="margin-top: 45px !important;">
                                <img src="{{URL::asset('images/adv1.gif')}}" style="width: 70%;"/>
                            </div>
                        </div>
                    </div>

                    <div id="shops" class="ppr_rup ppr_priv_hr_btf_similar_hotels">
                        <div class="ui_columns is-mobile recs" style="width: 100%; margin: 0 !important;">
                            <div class="nearbyContainer outerShell block_wrap" style="margin: 30px 0 !important;">
                                <div class="prw_rup prw_common_btf_nearby_poi_grid poiGrid hotel" style="border-color: #CCCCCC !important;" data-prwidget-name="common_btf_nearby_poi_grid" data-prwidget-init="">
                                    <div class="sectionTitleWrap">
                                        <div id="targetHelp_11" class="targets">
                                            <h3 class="sectionTitle" style="font-size: 28px">فروشگاه ها</h3>
                                            <div id="helpSpan_11" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>آدرس فروشگاه های منتخب را از اینجا میتوانید ببینید.</p>
                                                <button data-val="11" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_11">بعدی</button>
                                                <button data-val="11" class="btn btn-primary backBtnsHelp" id="backBtnHelp_11">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui_columns is-multiline container" style="width: 100%; margin: 0 !important;">
                                        @foreach($brands as $itr)
                                            <div class="prw_rup prw_common_btf_nearby_poi_entry ui_column is-6 poiTile" style="width: 33% !important;">
                                                <div class="ui_columns is-gapless is-mobile poiEntry shownOnMap">
                                                    <div class="prw_rup prw_common_centered_image ui_column is-4 thumbnailWrap">
                                                        <span class="imgWrap" style="max-width:94px;max-height:80px;">
                                                            <img src="{{URL::asset('images/shop-icon.jpg')}}" class="centeredImg" style=" min-width:80px; " width="100%"/>
                                                        </span>
                                                    </div>
                                                    <div class="poiInfo ui_column is-8">
                                                        <div class="poiName" style="white-space: normal !important; font-size: 12px !important;">{{$itr[0]}}<br/>{{$itr[1]}}</div>
                                                        <div class="prw_rup prw_meta_location_nearby_xsell_rec_price pricing nearby" data-prwidget-name="meta_location_nearby_xsell_rec_price" data-prwidget-init="">
                                                            <div class="price"></div>
                                                            <div class="loadingPrices"><span class="ui_button nearbyMeta loading disabled">&nbsp;<span class="ui_loader"><span></span><span></span><span></span><span></span><span></span></span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="photosDiv" class="ppr_rup ppr_priv_hr_btf_north_star_photos" style="position: relative">
                        <div class="block_wrap">
                            <div class="block_header" data-tab="TABS_PHOTOS" style="position: relative;">
                                <div id="targetHelp_12" class="targets" style="float: left;">
                                    <a style="color: #FFF !important;" onclick="showAddPhotoPane()" class="ui_button primary button_war">افزودن  عکس</a>
                                    <div id="helpSpan_12" class="helpSpans hidden row">
                                        <span class="introjs-arrow"></span>
                                        <p>اگر عکسی دارید حتما برای دوستان تان به اشتراک بگذارید. از این قسمت می توانید عکس های خود را بارگذاری کنید تا به نام شما و با امتیازی هیجان انگیز نمایش داده شود.</p>
                                        <button data-val="12" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_12">بعدی</button>
                                        <button data-val="12" class="btn btn-primary backBtnsHelp" id="backBtnHelp_12">قبلی</button>
                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                    </div>
                                </div>
                                <h3 class="block_title">عکس ها</h3>
                            </div>
                            <div class="block_body_top" ng-controller="LogPhotoController as logC">
                                <div infinite-scroll="myPagingFunction()" class="ui_columns is-mobile" style="direction: ltr;">
                                    <div class="carousel_wrapper ui_column is-6">
                                        <div class="prw_rup prw_common_mercury_photo_carousel carousel_outer">
                                            <div class="carousel bignav" style="max-height: 424px;">
                                                <div class="carousel-images carousel_images_footer" style="height: 100%">
                                                    <div class="see_all_count_wrap"><span class="see_all_count"><span class="ui_icon camera"></span>همه عکس ها {{$userPhotos}} </span></div>
                                                    <div class="entry_cta_wrap"><span class="entry_cta"><span class="ui_icon expand"></span>اندازه بزرگ عکس </span></div>
                                                </div>
                                                <div onclick="photoRoundRobin2(-1)" class="left-nav left-nav-footer"></div>
                                                <div onclick="photoRoundRobin2(1)" class="right-nav right-nav-footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb_wrapper ui_column ui_columns is-multiline is-mobile">
                                        <div ng-repeat="log in logs" class="prw_rup prw_hotels_flexible_album_thumb albumThumbnailWrap ui_column is-6">
                                            <div class="albumThumbnail">
                                                <div class="prw_rup prw_common_centered_image">
                                                    <span class="imgWrap" style="max-width:267px;max-height:200px;">
                                                        <img ng-click="ngGetPhotos(log.id)" ng-src="[[log.text]]" class="centeredImg" style=" min-width:267px" width="100%"/>
                                                    </span>
                                                </div>
                                                <div ng-click="ngGetPhotos(log.id)" class="albumInfo">
                                                    <span class="ui_icon camera"></span> [[log.name]] [[log.countNum]]
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block_body_bottom">
                                <div class="inner ui_columns is-multiline is-mobile"></div>
                            </div>
                        </div>
                    </div>

                    <div id="ansAndQeustionDiv" class="ppr_rup ppr_priv_location_qa">
                        <div data-tab="TABS_ANSWERS" class="block_wrap" style="position: relative">
                            <div class="block_header" style="position: relative">
                                <div id="targetHelp_13" class="targets" style="float: left;">
                                    <span class="ui_button primary fr" onclick="showAskQuestion()" style="float: left;">سوال بپرس</span>
                                    <div id="helpSpan_13" class="helpSpans hidden row">
                                        <span class="introjs-arrow"></span>
                                        <p>اگر سوالی دارید با فشردن این دکمه از دوستانتان بپرسید تا شما را یاری کنند.</p>
                                        <button data-val="13" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_13">بعدی</button>
                                        <button data-val="13" class="btn btn-primary backBtnsHelp" id="backBtnHelp_13">قبلی</button>
                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                    </div>
                                </div>
                                <h3 class="block_title">سوال و جواب</h3>
                            </div>
                            <div style="max-width: 60%; float: right; direction: rtl;" class="askQuestionForm hidden control">
                                <div class="askExplanation">سوال خودتو بپرس تا کسانی که می دونند کمکت کنند.</div>
                                <div class="overlayNote">سوال شما به صورت عمومی نمایش داده خواهد شد.</div>
                                <textarea style="width: 100%;" name="topicText" id="questionTextId" class="topicText ui_textarea" placeholder="سلام هرچی میخواهی بپرسید. بدون خجالت"></textarea>
                                <span onclick="$('#rules').removeClass('hidden')" class="postingGuidelines" style="float: right;">راهنما و قوانین</span>
                                <div class="underForm" style="float: left;margin-right: 10px;">
                                    <span class="ui_button primary formSubmit" onclick="askQuestion()">ثبت</span>
                                    <span class="ui_button secondary formCancel" onclick="hideAskQuestion()">انصراف</span>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                            <div style="clear: both;"></div>

                            <div class="block_body_top">

                                <div class="prw_rup prw_common_location_topic">
                                    <div style="direction: rtl;" class="question is-mobile ui_column is-12" id="questionsContainer">
                                    </div>
                                </div>

                                <div class="prw_rup prw_common_north_star_pagination" id="pageNumQuestionContainer">
                                </div>
                            </div>

                            <div class="shouldUpdateOnLoad"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });

        var data;
        var requestURL;

        const config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        };

        app.controller('LogPhotoController', function ($scope, $http) {

            $scope.show = false;
            $scope.places = [];
            $scope.kindPlaceId = '{{$kindPlaceId}}';

            requestURL = '{{route('getLogPhotos')}}';

            data = $.param({
                placeId: '{{$place->id}}',
                kindPlaceId: $scope.kindPlaceId
            });

            $scope.disable = false;

            $scope.ngGetPhotos = function(val) {
                getPhotos(val);
            };

            $scope.myPagingFunction = function () {

                var scroll = $(window).scrollTop();

                if(scroll < 1200 || $scope.disable)
                    return;

                $scope.disable = true;

                $http.post(requestURL, data, config).then(function (response) {

                    if (response.data != null && response.data != null && response.data.length > 0)
                        $scope.show = true;

                    $scope.logs = response.data;
                }).catch(function (err) {
                    console.log(err);
                });

            };

        });
    </script>

    <script async>
        var mod;mod=angular.module("infinite-scroll",[]),mod.directive("infiniteScroll",["$rootScope","$window","$timeout",function(i,n,e){return{link:function(t,l,o){var r,c,f,a;return n=angular.element(n),f=0,null!=o.infiniteScrollDistance&&t.$watch(o.infiniteScrollDistance,function(i){return f=parseInt(i,10)}),a=!0,r=!1,null!=o.infiniteScrollDisabled&&t.$watch(o.infiniteScrollDisabled,function(i){return a=!i,a&&r?(r=!1,c()):void 0}),c=function(){var e,c,u,d;return d=n.height()+n.scrollTop(),e=l.offset().top+l.height(),c=e-d,u=n.height()*f>=c,u&&a?i.$$phase?t.$eval(o.infiniteScroll):t.$apply(o.infiniteScroll):u?r=!0:void 0},n.on("scroll",c),t.$on("$destroy",function(){return n.off("scroll",c)}),e(function(){return o.infiniteScrollImmediateCheck?t.$eval(o.infiniteScrollImmediateCheck)?c():void 0:c()},0)}}}])
    </script>

    <script>
        var hasLogin = '{{$hasLogin}}';
        var bookMarkDir = '{{route('bookMark')}}';

        var hotelDetails = '{{route('adabDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
        var hotelDetailsInBookMarkMode = '{{route('adabDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'bookMark'])}}';
        var hotelDetailsInAskQuestionMode = '{{route('adabDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'question'])}}';
        var hotelDetailsInAnsMode = '{{route('adabDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'ans'])}}';

        var getQuestions = '{{route('getQuestions')}}';
        var placeId = '{{$place->id}}';
        var kindPlaceId = '{{$kindPlaceId}}';
        var getCommentsCount = '{{route('getCommentsCount')}}';
        var totalPhotos = '{{$sitePhotos + $userPhotos}}';
        var sitePhotosCount = '{{$sitePhotos}}';
        var opOnComment = '{{route('opOnComment')}}';
        var askQuestionDir = '{{route('askQuestion')}}';
        var sendAnsDir = '{{route('sendAns')}}';
        var showAllAnsDir = '{{route('showAllAns')}}';
        var x = '{{$place->C}}';
        var y = '{{$place->D}}';
        var filterComments = '{{route('filterComments')}}';
        var getReportsDir = '{{route('getReports')}}';
        var sendReportDir = '{{route('sendReport2')}}';
        var getPhotoFilter = '{{route('getPhotoFilter')}}';
        var getPhotosDir = '{{route('getPhotos')}}';
        var showUserBriefDetail = '{{route('showUserBriefDetail')}}';
        var hotelDetailsInAddPhotoMode = '{{route('adabDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'addPhoto'])}}';

        function showMore2() {
            scrollHeight = $('#introductionText').prop('scrollHeight');
            $('#introductionText').css('max-height', '');
            $('#showMore').empty().append('کمتر').attr('onclick', 'showLess2()').css('padding-top', (scrollHeight - 12) + 'px');
        }

        function showLess2() {
            $('#introductionText').css('max-height', '21px');
            $('#showMore').empty().append('بیشتر').attr('onclick', 'showMore2()').css('padding-top', '');
        }

        function showMore3() {
            $('#dastoor').css('max-height', '');
            $('#showMoreDastoor').empty().append('کمتر').attr('onclick', 'showLess3()');
        }

        function showLess3() {
            $('#dastoor').css('max-height', '190px');
            $('#showMoreDastoor').empty().append('بیشتر').attr('onclick', 'showMore3()');
        }

        $(document).ready(function () {

            @foreach($sections as $section)
                fillMyDivWithAdv('{{$section->sectionId}}', '{{$state->id}}');
            @endforeach

            offsetHeight = $('#dastoor').prop('offsetHeight');
            scrollHeight = $('#dastoor').prop('scrollHeight');

            if (offsetHeight < scrollHeight)
                $('#showMoreDastoor').removeClass('hidden');
            else {
                $('#showMoreDastoor').addClass('hidden');
            }

            $('.login-button').click(function() {

                var url = '{{route('adabDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';

                $(".dark").show();
                showLoginPrompt(url);
            });

            @if($mode == "bookMark")
                bookMark();
            @elseif($mode == "question")
                showAskQuestion();
            @elseif($mode == 'err')
                showAddPhotoPane();
            $("#errMsgAddPhoto").append('{{$err}}');
            @elseif($mode == "addPhoto")
                showAddPhotoPane();
            @elseif($mode == "addPhotoSuccessfully")
                $(".dark").css('display', '');
                $("#photoSubmitted").removeClass('hidden');

            @endif

            $("#date_input").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                dateFormat: "yy/mm/dd"
            });

            $("#date_input_end").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                dateFormat: "yy/mm/dd"
            });

        });

    </script>

    <script>
        var selectedPlaceId = -1;
        var selectedKindPlaceId = -1;
        var currPage = 1;
        var currPageQuestions = 1;
        var selectedTag = "";
        var roundRobinPhoto;
        var roundRobinPhoto2;
        var defaultSlideBarPic = -1;
        var idxSlideBar;
        var SliderFilter;
        var selectedTrips;
        var currHelpNo;
        var noAns = false;
        var photos = [];
        var photos2 = [];

        function showElement(element) {
            $(".pop-up").addClass('hidden');
            $("#" + element).removeClass('hidden');
        }

        function hideElement(element) {
            $(".dark").hide();
            $("#" + element).addClass('hidden');
        }

        function init() {

            var mapOptions = {

                zoom: 14,

                center: new google.maps.LatLng(x, y),

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [	{		"featureType":"landscape",		"stylers":[			{				"hue":"#FFA800"			},			{				"saturation":0			},			{				"lightness":0			},			{				"gamma":1			}		]	},	{		"featureType":"road.highway",		"stylers":[			{				"hue":"#53FF00"			},			{				"saturation":-73			},			{				"lightness":40			},			{				"gamma":1			}		]	},	{		"featureType":"road.arterial",		"stylers":[			{				"hue":"#FBFF00"			},			{				"saturation":0			},			{				"lightness":0			},			{				"gamma":1			}		]	},	{		"featureType":"road.local",		"stylers":[			{				"hue":"#00FFFD"			},			{				"saturation":0			},			{				"lightness":30			},			{				"gamma":1			}		]	},	{		"featureType":"water",		"stylers":[			{				"hue":"#00BFFF"			},			{				"saturation":6			},			{				"lightness":8			},			{				"gamma":1			}		]	},	{		"featureType":"poi",		"stylers":[			{				"hue":"#679714"			},			{				"saturation":33.4			},			{				"lightness":-25.4			},			{				"gamma":1			}		]	}]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');
            var mapElementSmall = document.getElementById('map-small');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(x, y),
                map: map,
                title: 'Shazdemosafer!'
            });

            var map2 = new google.maps.Map(mapElementSmall, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(x, y),
                map: map2,
                title: 'Shazdemosafer!'
            });
        }

        function showComments(arr) {

            $("#reviewsContainer").empty();

            var checkedValues = $("input:checkbox[name='filterComment[]']:checked").map(function() {
                return this.value;
            }).get();

            if(checkedValues.length == 0)
                checkedValues = -1;

            $.ajax({
                type: 'post',
                url: getCommentsCount,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId,
                    'tag': selectedTag,
                    'filters': checkedValues
                },
                success: function (response) {

                    response = JSON.parse(response);

                    $(".seeAllReviews").empty().append(response[1] + " نقد");
                    $(".reviews_header_count").empty().append("(" + response[1] + " نقد)");

                    var newElement = "<p id='pagination-details' class='pagination-details' style='clear: both; padding: 12px 0 !important;'><b>" + response[0] + "</b> از <b>" + response[1] + "</b> نقد</p>";

                    if(response[1] == 0) {
                        tmp = "<p style='font-size: 15px; color: #b7b7b7; float: right; margin: 8px 5px 8px 20px !important'>اولین نفری باشید که درباره ی این مکان نقد می نویسید</p>";
                        tmp += "<span style='color: #FFF !important; max-width: 100px; float: right;' onclick='document.location.href = showAddReviewPage('{{route('review', ['placeId' => $place->id, 'kindPlaceId' => $kindPlaceId])}}')' class='button_war write_review ui_button primary col-xs-12'>نوشتن نقد</span>";
                        $("#reviewsContainer").empty().append(tmp);
                    }

                    for(i = 0; i < arr.length; i++) {
                        newElement += "<div style='border-bottom: 1px solid #E3E3E3;' class='review'>";
                        newElement += "<div class='prw_rup prw_reviews_basic_review_hsx'>";
                        newElement += "<div class='reviewSelector'>";
                        newElement += "<div class='review hsx_review ui_columns is-multiline inlineReviewUpdate provider0'>";

                        newElement += "<div class='ui_column is-2' style='float: right;'>";
                        newElement += "<div class='prw_rup prw_reviews_member_info_hsx'>";
                        newElement += "<div class='member_info'>";

                        newElement += "<div class='avatar_wrap'>";
                        newElement += "<div class='prw_rup prw_common_centered_image qa_avatar' onmouseleave='$(\".img_popUp\").addClass(\"hidden\");' onmouseenter='showBriefPopUp(this, \"" + arr[i].visitorId + "\")'>";
                        newElement += "<span class='imgWrap fixedAspect' style='max-width:80px; padding-bottom:100.000%'>";
                        newElement += "<img src='" + arr[i].visitorPic + "' class='centeredImg' height='100%' style='border-radius: 100%;'/>";
                        newElement += "</span></div>";
                        newElement += "<div class='username' style='text-align: center;margin-top: 5px;'>" + arr[i].visitorId + "</div>";
                        newElement += "</div>";

                        newElement += "<div class='memberOverlayLink'>";
                        newElement += "<div class='memberBadgingNoText'><span class='ui_icon pencil-paper'></span><span class='badgetext'>" + arr[i].comments + "</span>&nbsp;&nbsp;";
                        newElement += "<span class='ui_icon thumbs-up-fill'></span><span id='commentLikes_" + arr[i].id + "' data-val='" + arr[i].likes + "' class='badgetext'>" + arr[i].likes + "</span>&nbsp;&nbsp;";
                        newElement += "<span class='ui_icon thumbs-down-fill'></span><span id='commentDislikes_" + arr[i].id + "' data-val='" + arr[i].dislikes + "' class='badgetext'>" + arr[i].dislikes + "</span>";
                        newElement += "</div>";
                        newElement += "</div></div></div></div>";
                        newElement += "<div class='ui_column is-9' style='float: right;'>";
                        newElement += "<div class='innerBubble'>";
                        newElement += "<div class='wrap'>";
                        newElement += "<div class='rating reviewItemInline'>";
                        switch (arr[i].rate) {
                            case 5:
                                newElement += "<span class='ui_bubble_rating bubble_50'></span>";
                                break;
                            case 4:
                                newElement += "<span class='ui_bubble_rating bubble_40'></span>";
                                break;
                            case 3:
                                newElement += "<span class='ui_bubble_rating bubble_30'></span>";
                                break;
                            case 2:
                                newElement += "<span class='ui_bubble_rating bubble_20'></span>";
                                break;
                            default:
                                newElement += "<span class='ui_bubble_rating bubble_10'></span>";
                                break;
                        }
                        newElement += "<span class='ratingDate relativeDate' style='float: right;'>نوشته شده در تاریخ " + arr[i].date + " </span></div>";
                        newElement += "<div class='quote isNew'><a href='" + homeURL + "/showReview/" + arr[i].id + "'><h2 style='font-size: 1em;' class='noQuotes'>" + arr[i].subject + "</h2></a></div>";
                        newElement += "<div class='prw_rup prw_reviews_text_summary_hsx'>";
                        newElement += "<div class='entry'>";
                        newElement += "<p class='partial_entry' id='partial_entry_" + arr[i].id + "' style='line-height: 20px; max-height: 70px; overflow: hidden; padding: 10px; font-size: 12px'>" + arr[i].text;
                        newElement += "</p>";
                        newElement += "<div style='color: #16174f;cursor: pointer;text-align: left;' id='showMoreReview_" + arr[i].id + "' class='hidden' onclick='showMoreReview(" + arr[i].id + ")'>بیشتر</div></div></div>";
                        if(arr[i].pic != -1)
                            newElement += "<div><img id='reviewPic_" + arr[i].id + "' class='hidden' width='150px' height='150px' src='" + arr[i].pic +"'></div>";
                        newElement += "<div class='prw_rup prw_reviews_vote_line_hsx'>";
                        newElement += "<div class='tooltips wrap'><span style='cursor: pointer;font-size: 10px;color: #16174f' onclick='showReportPrompt(\"" + arr[i].id + "\")' class='taLnk no_cpu ui_icon '>گزارش تخلف</span></div>";
                        newElement += "<div class='helpful redesigned hsx_helpful'>";
                        newElement += "<span onclick='likeComment(\"" + arr[i].id + "\")' class='thankButton hsx_thank_button'>";
                        newElement += "<span class='helpful_text'><span class='ui_icon thumbs-up-fill emphasizeWithColor'></span><span class='numHelp emphasizeWithColor'></span><span class='thankUser'>" + arr[i].visitorId + " </span></span>";
                        newElement += "<div class='buttonShade hidden'><img src='https://static.tacdn.com/img2/generic/site/loading_anim_gry_sml.gif'/></div>";
                        newElement += "</span>";
                        newElement += "<span onclick='dislikeComment(\"" + arr[i].id + "\")' class='thankButton hsx_thank_button'>";
                        newElement += "<span class='helpful_text'><span class='ui_icon thumbs-down-fill emphasizeWithColor'></span><span class='numHelp emphasizeWithColor'></span><span class='thankUser'>" + arr[i].visitorId + " </span></span>";
                        newElement += "<div class='buttonShade hidden'><img src='https://static.tacdn.com/img2/generic/site/loading_anim_gry_sml.gif'/></div>";
                        newElement += "</span>";
                        newElement += "</div></div></div>";
                        newElement += "<div class='loadingShade hidden'>";
                        newElement += "<div class='ui_spinner'></div></div></div></div></div></div></div></div>" ;
                    }

                    $("#reviewsContainer").append(newElement);

                    var tmpElem;
                    for(i = 0; i < arr.length; i++) {
                        tmpElem = $("#partial_entry_" + arr[i].id);
                        sc = tmpElem.prop('scrollHeight');
                        sc = tmpElem.prop('offsetHeight');

                        if(offsetHeight < scrollHeight) {
                            $('#showMoreReview_' + arr[i].id).removeClass('hidden');
                        }
                        else {
                            $('#showMoreReview_' + arr[i].id).addClass('hidden');
                        }
                    }

                    newElement = "";
                    limit = Math.ceil(response[0] / 6);
                    preCurr = passCurr = false;

                    for(k = 1; k <= limit; k++) {
                        if(Math.abs(currPage - k) < 4 || k == 1 || k == limit) {
                            if (k == currPage) {
                                newElement += "<span data-page-number='" + k + "' class='pageNum current pageNumComment'>" + k + "</span>";
                            }
                            else {
                                newElement += "<a onclick='changeCommentPage(this)' data-page-number='" + k + "' class='pageNum taLnk pageNumComment'>" + k + "</a>";
                            }
                        }
                        else if(k < currPage && !preCurr) {
                            preCurr = true;
                            newElement += "<span class='separator'>&hellip;</span>";
                        }
                        else if(k > currPage && !passCurr) {
                            passCurr = true;
                            newElement += "<span class='separator'>&hellip;</span>";
                        }
                    }

                    $("#pageNumCommentContainer").empty().append(newElement);

                    if($("#commentCount").empty())
                        $("#commentCount").append(response[1]);
                }
            });
        }

        function bookMark() {

            if(!hasLogin) {
                showLoginPrompt(hotelDetailsInBookMarkMode);
                return;
            }

            $.ajax({
                type: 'post',
                url: bookMarkDir,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId
                },
                success:function (response) {
                    if(response == "ok")
                        document.location.href = hotelDetails;
                }
            })
        }

        function showUpdateReserveResult() {
            $(".update_results_button").removeClass('hidden');
        }

        function changeCommentPage(element) {

            $('.pageNumComment').removeClass('current').addClass('taLnk');
            $(element).removeClass('taLnk');
            $(element).addClass('current');

            if($(element).attr('data-page-number')) {
                currPage = $(element).attr('data-page-number');
                comments(selectedTag);
                location.href = "#taplc_location_review_keyword_search_hotels_0_search";
            }
        }

        function changePageQuestion(element) {

            $('.pageNumComment').removeClass('current').addClass('taLnk');
            $(element).removeClass('taLnk');
            $(element).addClass('current');

            if($(element).attr('data-page-number')) {
                currPageQuestions = $(element).attr('data-page-number');
                questions();
                location.href = "#taplc_location_qa_hotels_0";
            }
        }

        function showAskQuestion() {

            if(!hasLogin) {
                showLoginPrompt(hotelDetailsInAskQuestionMode);
                return;
            }

            $(".askQuestionForm").removeClass('hidden');
            document.href = ".askQuestionForm";
        }

        function hideAskQuestion() {
            $(".askQuestionForm").addClass('hidden');
        }

        function askQuestion() {

            if(!hasLogin) {
                showLoginPrompt(hotelDetailsInAskQuestionMode);
                return;
            }

            if($("#questionTextId").val() == "")
                return;

            $.ajax({
                type: 'post',
                url: askQuestionDir,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId,
                    'text': $("#questionTextId").val()
                },
                success: function (response) {
                    if(response == "ok"){
                        $(".dark").css('display', '');
                        $("#questionSubmitted").removeClass('hidden');
                    }
                }
            });

        }

        function closePublish(){
            document.location.href = '{{route('adabDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
        }

        function comments(tag) {

            selectedTag = tag;
            filter();
        }

        function startHelp() {
            setGreenBackLimit(7);
            if(hasLogin) {
                if(noAns)
                    initHelp2(16, [0, 4, 14, 15], 'MAIN', 100, 400, [13, 15], [50, 100]);
                else
                    initHelp2(16, [0, 4, 14], 'MAIN', 100, 400, [15], [100]);
            }
            else {
                if(noAns)
                    initHelp2(16, [0, 1, 2, 5, 7, 14, 15], 'MAIN', 100, 400, [13, 15], [50, 100]);
                else
                    initHelp2(16, [0, 1, 2, 5, 7, 14], 'MAIN', 100, 400, [15], [100]);
            }
        }

        function questions() {

            $.ajax({
                type: 'post',
                url: getQuestions,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId,
                    'page': currPageQuestions
                },
                success: function (response) {
                    showQuestions(JSON.parse(response));
                }
            });
        }

        $(window).ready(function(){

            checkOverFlow();

            $('.menu').addClass('original').clone().insertAfter('.menu').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

            scrollIntervalID = setInterval(stickIt, 10);

            $(".close_album").click(function(){

                $("#photo_album_span").hide();
            });

            var i;
            photos[0] = '{{$photos[0]}}';

            @if(isset($logPhoto['pic']))
                photos2[0] = '{{$logPhoto['pic']}}';
            @endif

            for(i = 1; i < totalPhotos - sitePhotosCount; i++)
                photos2[i] = -1

            for(i = 1; i < totalPhotos; i++)
                photos[i] = -1;

            currPage = 1;
            comments(-1);
            questions();
            roundRobinPhoto = -1;
            photoRoundRobin(1);

            if(totalPhotos - sitePhotosCount > 0) {
                roundRobinPhoto2 = -1;
                photoRoundRobin2(1);
            }

            $(".img_popUp").on({
                mouseenter: function(){
                    $(".img_popUp").removeClass('hidden');
                },
                mouseleave: function(){
                    $(".img_popUp").addClass('hidden');
                }
            });

            $('.ui_tagcloud').click(function(){
                $(".ui_tagcloud").removeClass('selected');
                $(this).addClass("selected");
                if ($(this).attr("data-content")) {
                    var data_content = $(this).attr("data-content");
                    currPage = 1;
                    comments(data_content);
                }
            });
        });

        function showQuestions(arr) {

            $("#questionsContainer").empty();

            if(arr.length == 0) {
                noAns = true;
                $("#questionsContainer").append('<p class="no-question">با پرسیدن اولین سوال، از دوستان خود کمک بگیرید و به دیگران کمک کنید. سوال شما فقط به اندازه یک کلیک وقت می گیرد</p>');
            }

            var newElement = "";

            for(i = 0; i < arr.length; i++) {
                newElement = "<div class='ui_column is-12' style='position: relative'><div class='ui_column is-2' style='float: right;'>";
                newElement += "<div class='avatar_wrap'>";
                newElement += "<div class='prw_rup prw_common_centered_image qa_avatar' onmouseleave='$(\".img_popUp\").addClass(\"hidden\");' onmouseenter='showBriefPopUp(this, \"" + arr[i].visitorId + "\")'>";
                newElement += "<span class='imgWrap fixedAspect' style='max-width:80px; padding-bottom:100.000%'>";
                newElement += "<img src='" + arr[i].visitorPic + "' class='centeredImg' height='100%'/>";
                newElement += "</span></div>";
                newElement += "<div class='username'>" + arr[i].visitorId + "</div>";
                newElement += "</div></div>";
                newElement += "<div class='ui_column is-8' style='position: relative'><a href='" + homeURL + "/seeAllAns/" + arr[i].id + "'>" + arr[i].text + "</a>";
                newElement += "<div class='question_date'>" + arr[i].date + "<span class='iapSep'>|</span><span style='cursor: pointer;font-size:10px;' onclick='showReportPrompt(\"" + arr[i].id + "\")' class='ui_icon'>گزارش تخلف</span></div>";
                if(i == 0) {
                    newElement += "<div id='targetHelp_15' style='max-width: 100px; margin: 0 !important; float: right;' class='targets row'><span class='col-xs-12 ui_button primary small answerButton' onclick='showAnsPane(\"" + arr[i].id + "\")'>پاسخ ";
                    newElement += "</span>";
                    newElement += '<div id="helpSpan_15" class="helpSpans hidden">';
                    newElement += '<span class="introjs-arrow"></span>';
                    newElement += "<p>";
                    newElement += "می توانید با این دکمه به سوال ها پاسخ دهید تا دوستا ن تان هم به سوالات شما پاسخ دهند.";
                    newElement += "</p>";
                    newElement += '<button data-val="15" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_15">بعدی</button>';
                    newElement += '<button onclick="show(14, -1)" data-val="15" class="btn btn-primary backBtnsHelp" id="backBtnHelp_15">قبلی</button>';
                    newElement += '<button onclick="myQuit();" class="btn btn-danger exitBtnHelp">خروج</button>';
                    newElement += '</div>';
                    newElement += "</div>";
                }
                else {
                    newElement += "<span class='ui_button primary small answerButton' style='float: right;' onclick='showAnsPane(\"" + arr[i].id + "\")'>پاسخ ";
                    newElement += "</span>";
                }
                newElement += "<span style='float: right; margin-top: 12px' class='ui_button secondary small' id='showAll_" + arr[i].id + "' onclick='showAllAns(\"" + arr[i].id + "\", -1)'>نمایش " + arr[i].ansNum + " جواب</span> ";
                newElement += "<span class='ui_button secondary small hidden' id='hideAll_" + arr[i].id + "' onclick='showAllAns(\"" + arr[i].id + "\", 1)'>پنهان کردن جواب ها</span>";
                newElement += "<div class='confirmDeleteExplanation hidden'>آیا می خواهی این سوال حذف شود ؟</div>";
                newElement += "<span class='ui_button primary small delete hidden'>Delete</span>";
                newElement += "<span class='ui_button primary small confirmDelete hidden'>Confirm</span>";
                newElement += "<span class='ui_button secondary small cancelDelete hidden'>Cancel</span>";
                newElement += "<div class='answerForm hidden' id='answerForm_" + arr[i].id + "'>";
                newElement += "<div class='whatIsYourAnswer'>جواب شما چیست ؟</div>";
                newElement += "<textarea class='answerText ui_textarea' id='answerText_" + arr[i].id + "' placeholder='سلام ، جواب خود را وارد کنید'></textarea>";
                newElement += "<ul class='errors hidden'></ul>";
                newElement += "<a target='_blank' href='" + soon + "' class='postingGuidelines' style='float: left;'>راهنما  و قوانین</a>";
                newElement += "<div><span class='ui_button primary small formSubmit' onclick='sendAns(\"" + arr[i].id + "\")'>ارسال</span>";
                newElement += "<span class='ui_button secondary small' onclick='hideAnsPane()'>لغو</span></div>";
                newElement += "<div class='captcha_here'></div>";
                newElement += "</div>";

                newElement += "<div id='response_" + arr[i].id + "' style='clear: both;' class='answerList'>";
                newElement += "</div><p id='ans_err_" + arr[i].id + "'></p></div></div><div style='clear: both;'></div> ";
                $("#questionsContainer").append(newElement);

                showAllAns(arr[i].id, 1);
            }

            $("#pageNumQuestionContainer").empty();

            // newElement = "";
            // limit = Math.ceil(response[0] / 6);
            // preCurr = passCurr = false;
            //
            // for(k = 1; k <= limit; k++) {
            //     if(Math.abs(currPageQuestions - k) < 4 || k == 1 || k == limit) {
            //         if (k == currPageQuestions) {
            //             newElement += "<span data-page-number='" + k + "' class='pageNum current pageNumQuestion'>" + k + "</span>";
            //         }
            //         else {
            //             newElement += "<a onclick='changePageQuestion(this)' data-page-number='" + k + "' class='pageNum taLnk pageNumQuestion'>" + k + "</a>";
            //         }
            //     }
            //     else if(k < currPage && !preCurr) {
            //         preCurr = true;
            //         newElement += "<span class='separator'>&hellip;</span>";
            //     }
            //     else if(k > currPage && !passCurr) {
            //         passCurr = true;
            //         newElement += "<span class='separator'>&hellip;</span>";
            //     }
            // }
            //
            // $("#pageNumQuestionContainer").append(newElement);
        }

        function toggleMoreCities() {
            if($('#moreCities').hasClass('hidden')) {
                $('#moreCities').removeClass('hidden');
                $('#moreLessSpan').empty().append('شهر های کمتر');
            }
            else {
                $('#moreCities').addClass('hidden');
                $('#moreLessSpan').empty().append('شهر های بیشتر');
            }
        }

        function customReport() {

            if($("#custom-checkBox").is(':checked')) {
                var newElement = "<div class='col-xs-12'>";
                newElement += "<textarea id='customDefinedReport' style='width: 375px; height:120px; padding: 5px !important; margin-top: 5px;' maxlength='1000' required placeholder='حداکثر 1000 کاراکتر'></textarea>";
                newElement += "</label></div>";
                $("#custom-define-report").empty().append(newElement).css("visibility", "visible");
            }
            else {
                $("#custom-define-report").empty().css("visibility", "hidden");
            }
        }

        function getReports(logId) {

            $("#reports").empty();

            $.ajax({
                type: 'post',
                url: getReportsDir,
                data: {
                    'logId': logId
                },
                success: function (response) {

                    if(response != "")
                        response = JSON.parse(response);

                    var newElement = "<div id='reportContainer' class='row'>";

                    if(response != "") {
                        for (i = 0; i < response.length; i++) {
                            newElement += "<div class='col-xs-12'>";
                            newElement += "<div class='ui_input_checkbox'>";
                            if(response[i].selected == true)
                                newElement += "<input id='report_" + response[i].id + "' type='checkbox' name='reports' checked value='" + response[i].id + "'>";
                            else
                                newElement += "<input id='report_" + response[i].id + "' type='checkbox' name='reports' value='" + response[i].id + "'>";
                            newElement += "<label class='labelForCheckBox' for='report_"  + response[i].id + "'>";
                            newElement += "<span></span>&nbsp;&nbsp;";
                            newElement += response[i].description;
                            newElement += "</label>";
                            newElement += "</div></div>";
                        }
                    }

                    newElement += "<div class='col-xs-12'>";
                    newElement += "<div class='ui_input_checkbox'>";

                    newElement += "<input id='custom-checkBox' onchange='customReport()' type='checkbox' name='reports' value='-1'>";

                    newElement += "<label class='labelForCheckBox' for='custom-checkBox'>";
                    newElement += "<span></span>&nbsp;&nbsp;";
                    newElement += "سایر موارد</label>";
                    newElement += "</div></div>";

                    newElement += "<div id='custom-define-report' style='visibility: hidden'></div>";

                    newElement += "</div>";

                    $("#reports").append(newElement);

                    if(response != "" && response.length > 0 && response[0].text != "") {
                        customReport();
                        $("#customDefinedReport").val(response[0].text);
                    }

                }
            });
        }

        function sendReport() {

            customMsg = "";

            if($("#customDefinedReport").val() != null)
                customMsg = $("#customDefinedReport").val();

            var checkedValuesReports = $("input:checkbox[name='reports']:checked").map(function() {
                return this.value;
            }).get();

            if(checkedValuesReports.length <= 0)
                return;

            if(!hasLogin) {
                url = homeURL + "/seeAllAns/" + questionId + "/report/" + selectedLogId;
                showLoginPrompt(url);
                return;
            }

            $.ajax({
                type: 'post',
                url: sendReportDir,
                data: {
                    "logId": selectedLogId,
                    "reports": checkedValuesReports,
                    "customMsg" : customMsg
                },
                success: function (response) {
                    if(response == "ok") {
                        closeReportPrompt();
                    }
                    else {
                        $("#errMsgReport").append('مشکلی در انجام عملیات مورد نظر رخ داده است');
                    }
                }
            });
        }

        function closeReportPrompt() {
            $("#custom-checkBox").css("visibility", 'hidden');
            $("#custom-define-report").css("visibility", 'hidden');
            $("#reportPane").addClass('hidden');
            $('.dark').hide();
        }

        function showReportPrompt(logId) {

            if(!hasLogin) {
                url = homeURL + "/seeAllAns/" + questionId + "/report/" + logId;
                showLoginPrompt(url);
                return;
            }
            $('.dark').show();
            selectedLogId = logId;
            getReports(logId);
            showElement('reportPane');
        }

        function showAnsPane(logId) {
            $(".answerForm").addClass('hidden');
            $("#answerForm_" + logId).removeClass('hidden');
        }

        function hideAnsPane() {
            $(".answerForm").addClass('hidden');
        }

        function sendAns(logId) {

            if(!hasLogin) {
                showLoginPrompt(hotelDetailsInAnsMode);
                return;
            }

            if($("#answerText_" + logId).val() == "")
                return;

            $.ajax({
                type: 'post',
                url: sendAnsDir,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId,
                    'text': $("#answerText_" + logId).val(),
                    'relatedTo': logId
                },
                success: function (response) {
                    if(response == "ok"){
                        $(".dark").css('display', '');
                        $('#ansSubmitted').removeClass('hidden');
                    }
                    else {
                        $("#ans_err_" + logId).empty().append('تنها یکبار می توانید به هر سوال پاسخ دهید');
                    }
                }
            });
        }

        function showAllAns(logId, num) {

            $.ajax({
                type: 'post',
                url: showAllAnsDir,
                data: {
                    'logId': logId,
                    'num': num
                },
                success: function (response) {

                    if (num == -1) {
                        $("#hideAll_" + logId).removeClass('hidden');
                        $("#showAll_" + logId).addClass('hidden');
                    }
                    else {
                        $("#hideAll_" + logId).addClass('hidden');
                        $("#showAll_" + logId).removeClass('hidden');
                    }

                    response = JSON.parse(response);

                    var newElement = "";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<div class='prw_rup prw_common_location_posting'>";
                        newElement += "<div class='response'>";
                        newElement += "<div class='header' style='margin-right: 22%'><span>پاسخ از " + response[i].visitorId +"</span> | ";
                        newElement += "<span class='iapSep'>|</span>";
                        newElement += "<span style='cursor: pointer;font-size:10px;' onclick='showReportPrompt(\"" + response[i].id + "\")' class='ui_icon '>گزارش تخلف</span>";
                        newElement += "</div>";
                        newElement += "<div class='content'>";
                        newElement += "<div class='abbreviate'>" + response[i].text;
                        newElement += "</div></div>";
                        newElement += "<div class='confirmDeleteExplanation hidden'>آیا می خواهی این سوال حذف شود ؟</div>";
                        newElement += "<span class='ui_button primary small delete hidden'>حذف</span> <span class='ui_button primary small confirmDelete hidden'>ثبت</span> <span class='ui_button secondary small cancelDelete hidden'>لغو</span>";
                        newElement += "<div class='votingForm'>";
                        newElement += "<div class='voteIcon' onclick='likeAns(" + response[i].id + ")'>";
                        newElement += "<div class='ui_icon single-chevron-up-circle'></div>";
                        newElement += "<div class='ui_icon single-chevron-up-circle-fill'></div>";
                        newElement += "<div class='contents hidden'>پاسخ مفید</div>";
                        newElement += "</div>";
                        newElement += "<div class='voteCount'>";
                        newElement += "<div class='score' data-val='" + response[i].rate + "' id='score_" + response[i].id + "'>" + response[i].rate + "</div>";
                        newElement += "<div>نقد من</div>";
                        newElement += "</div>";
                        newElement += "<div class='voteIcon' onclick='dislikeAns(" + response[i].id + ")'>";
                        newElement += "<div class='ui_icon single-chevron-down-circle-fill'></div>";
                        newElement += "<div class='ui_icon single-chevron-down-circle'></div>";
                        newElement += "<div class='contents hidden'>پاسخ غیر مفید</div>";
                        newElement += "</div></div></div></div>";
                    }

                    $("#response_" + logId).empty().append(newElement);
                }
            });
        }

        function getSliderPhoto(mode, val, mode2) {

            var url = (mode2 == 2) ? '{{route('getSlider2Photo')}}' : '{{route('getSlider1Photo')}}';

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    'placeId': '{{$place->id}}',
                    'kindPlaceId': '{{$kindPlaceId}}',
                    'val': val
                },
                success: function (response) {
                    if (response != "nok") {
                        if (mode == 1) {
                            photos[roundRobinPhoto] = response;
                            $(".carousel_images_header").css('background', "url(" + photos[roundRobinPhoto] + ") no-repeat")
                                    .css('background-size', "cover");
                        }
                        else {
                            photos2[roundRobinPhoto2] = response;
                            $(".carousel_images_footer").css('background', "url(" + photos2[roundRobinPhoto2] + ") no-repeat")
                                    .css('background-size', "cover");
                        }
                    }
                }
            });
        }

        function photoRoundRobin(val) {

            if (roundRobinPhoto + val < totalPhotos && roundRobinPhoto + val >= 0)
                roundRobinPhoto += val;

            if (photos[roundRobinPhoto] != -1) {
                $(".carousel_images_header").css('background', "url(" + photos[roundRobinPhoto] + ") no-repeat")
                        .css('background-size', "cover");
            }
            else {
                if(roundRobinPhoto + 1 <= sitePhotosCount)
                    getSliderPhoto(1, roundRobinPhoto + 1, 1);
                else
                    getSliderPhoto(1, roundRobinPhoto + 1 - sitePhotosCount, 2);
            }

            if (roundRobinPhoto + 1 >= totalPhotos)
                $('.right-nav-header').addClass('hidden');
            else
                $('.right-nav-header').removeClass('hidden');

            if (roundRobinPhoto - 1 < 0)
                $('.left-nav-header').addClass('hidden');
            else
                $('.left-nav-header').removeClass('hidden');
        }

        function photoRoundRobin2(val) {

            if (roundRobinPhoto2 + val < totalPhotos - sitePhotosCount && roundRobinPhoto2 + val >= 0)
                roundRobinPhoto2 += val;

            if (photos2[roundRobinPhoto2] != -1) {
                $(".carousel_images_footer").css('background', "url(" + photos2[roundRobinPhoto2] + ") no-repeat")
                        .css('background-size', "cover");
            }
            else {
                getSliderPhoto(2, roundRobinPhoto2, 2);
            }

            if (roundRobinPhoto2 + 1 >= totalPhotos - sitePhotosCount)
                $('.right-nav-footer').addClass('hidden');
            else
                $('.right-nav-footer').removeClass('hidden');

            if (roundRobinPhoto2 - 1 < 0)
                $('.left-nav-footer').addClass('hidden');
            else
                $('.left-nav-footer').removeClass('hidden');
        }

        function likeComment(logId) {

            $.ajax({
                type: 'post',
                url: opOnComment,
                data: {
                    'logId': logId,
                    'mode': 'like'
                },
                success: function (response) {
                    if(response == "1") {
                        $("#commentLikes_" + logId).empty()
                                .attr('data-val', parseInt($("#commentLikes_" + logId).attr('data-val')) + 1)
                                .append($("#commentLikes_" + logId).attr('data-val'));
                    }
                    else if(response == "2") {
                        $("#commentLikes_" + logId).empty()
                                .attr('data-val', parseInt($("#commentLikes_" + logId).attr('data-val')) + 1)
                                .append($("#commentLikes_" + logId).attr('data-val'));

                        $("#commentDislikes_" + logId).empty()
                                .attr('data-val', parseInt($("#commentDislikes_" + logId).attr('data-val')) - 1)
                                .append($("#commentDislikes_" + logId).attr('data-val'));
                    }
                }
            });
        }

        function likeAns(logId) {

            $.ajax({
                type: 'post',
                url: opOnComment,
                data: {
                    'logId': logId,
                    'mode': 'like'
                },
                success: function (response) {
                    if(response == "1") {
                        $("#score_" + logId).empty()
                                .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) + 1)
                                .append($("#score_" + logId).attr('data-val'));
                    }
                    else if(response == "2") {
                        $("#score_" + logId).empty()
                                .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) + 2)
                                .append($("#score_" + logId).attr('data-val'));
                    }
                }
            });
        }

        function dislikeAns(logId) {

            $.ajax({
                type: 'post',
                url: opOnComment,
                data: {
                    'logId': logId,
                    'mode': 'dislike'
                },
                success: function (response) {
                    if(response == "1") {
                        $("#score_" + logId).empty()
                                .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) - 1)
                                .append($("#score_" + logId).attr('data-val'));
                    }
                    else if(response == "2") {
                        $("#score_" + logId).empty()
                                .attr('data-val', parseInt($("#score_" + logId).attr('data-val')) - 2)
                                .append($("#score_" + logId).attr('data-val'));
                    }
                }
            });
        }

        function dislikeComment(logId) {

            $.ajax({
                type: 'post',
                url: opOnComment,
                data: {
                    'logId': logId,
                    'mode': 'dislike'
                },
                success: function (response) {
                    if(response == "1") {
                        $("#commentDislikes_" + logId).empty()
                                .attr('data-val', parseInt($("#commentDislikes_" + logId).attr('data-val')) + 1)
                                .append($("#commentDislikes_" + logId).attr('data-val'));
                    }
                    else if(response == "2") {
                        $("#commentDislikes_" + logId).empty()
                                .attr('data-val', parseInt($("#commentDislikes_" + logId).attr('data-val')) + 1)
                                .append($("#commentDislikes_" + logId).attr('data-val'));

                        $("#commentLikes_" + logId).empty()
                                .attr('data-val', parseInt($("#commentLikes_" + logId).attr('data-val')) - 1)
                                .append($("#commentLikes_" + logId).attr('data-val'));
                    }
                }
            });
        }

        function filter() {

            var checkedValues = $("input:checkbox[name='filterComment[]']:checked").map(function() {
                return this.value;
            }).get();

            if(checkedValues.length == 0)
                checkedValues = -1;

            $.ajax({
                type: 'post',
                url: filterComments,
                data: {
                    'filters': checkedValues,
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId,
                    'tag': selectedTag,
                    'page': currPage
                },
                success: function (response) {
                    showComments(JSON.parse(response));
                }
            });

        }

        function showAddPhotoPane() {

            if(!hasLogin) {
                showLoginPrompt(hotelDetailsInAddPhotoMode);
                return;
            }
            $('.dark').show();

            showElement('photoEditor');
            getPhotoFilters();
        }

        function checkSendPhotoBtnAbility() {

            var checkedValues = $("input:radio[name='filter']:checked").map(function () {
                return this.value;
            }).get();

            if (checkedValues.length == 0) {
                $("#sendPhotoBtn").attr('disabled', 'disabled');
            }
            else {
                $("#sendPhotoBtn").removeAttr('disabled');
            }

        }

        function getPhotoFilters() {
            $.ajax({
                type: 'post',
                url: getPhotoFilter,
                data: {
                    'kindPlaceId': kindPlaceId
                },
                success: function (response) {

                    response = JSON.parse(response);
                    newElement = "";

                    for (i = 0; i < response.length; i++) {
                        newElement += '<div class="ui_input_checkbox radioOption" style="float: right !important;">';
                        newElement += '<input type="radio" name="mask" value="' + response[i].id + '" id="cat_file_' + response[i].id + '">';
                        newElement += '<label class="labelForCheckBox" for="cat_file_' + response[i].id + '">';
                        newElement += '<span></span>&nbsp;&nbsp;';
                        newElement +=  response[i].name + '</label>'
                        newElement += '</div><div style="clear: both"></div>';
                    }

                    $("#photoTags").empty().append(newElement);
                }
            });
        }

        function nxtPhotoSlideBar() {

            idxSlideBar = parseInt(idxSlideBar);
            if (idxSlideBar + 1 < SliderFilter.length) {
                idxSlideBar++;
                setMainPic(idxSlideBar);
            }
        }

        function prvPhotoSlideBar() {
            idxSlideBar = parseInt(idxSlideBar);
            if (idxSlideBar - 1 >= 0) {
                idxSlideBar--;
                setMainPic(idxSlideBar);
            }
        }

        var logPhotosFetched = [];
        var logPics = [[]];

        function showPhotoLists(picItemId, idx) {

            var newElement = "";
            sliderPics = [];
            var sitesPhoto = 0;
            var i;

            if (idx != -1) {
                for (i = 0; i < logPics[idx].length; i++) {

                    if (picItemId == -1) {
                        sitesPhoto++;
                        alts[alts.length] = logPics[idx][i].alt;
                    }

                    newElement += "<div class='tinyThumb filter_" + picItemId + "' id='tinyThumb_" + i + "' data-val='" + i + "' onclick='setMainPic($(this).attr(\"data-val\"))'><img style='cursor:pointer' src='" + logPics[idx][i].picT + "' width='50' height='50'></div>";
                    sliderPics[i] = [picItemId, logPics[idx][i].pic, logPics[idx][i].owner, logPics[idx][i].ownerPic];
                }
            }

            SliderFilter = sliderPics;

            $(".inHeroList").empty().append(newElement);

            newElement = "<li class='ab101 ab_-1'>";
            newElement += "<span onclick='getPhotos(-1)' class='tabText'>همه (" + totalPhotos + ")</span>";
            newElement += "</li>";

            newElement += "<li class='ab101 ab_-2'>";
            newElement += "<span onclick='getPhotos(-2)' style='direction: rtl' class='tabText'>سایت (" + sitePhotosCount + ")</span>";
            newElement += "</li>";

            if (idx != -1) {
                newElement += "<li class='ab101 ab_-3'>";
                newElement += "<span onclick='getPhotos(-3)' style='direction: rtl' class='tabText'>عکس های کاربران (" + (totalPhotos - sitePhotosCount) + ")</span>";
                newElement += "</li>";
            }

            for (i = 0; i < filters.length; i++) {
                if (picItemId == 0 && i == 0)
                    defaultSlideBarPic = filters[i].id;
                newElement += "<li class='ab101 ab_" + filters[i].id + "'>";
                newElement += "<span onclick='getPhotos(" + filters[i].id + ")' class='tabText' style='direction: rtl'>" + filters[i].name + "(" + filters[i].countNum + ")</span>";
                newElement += "</li>";
            }

            $(".tabCount3").empty().append(newElement);
            $("#photo_album_span").show();

            if (idx == -1)
                setMainPic(-1);

            filterSlideBar(picItemId);
        }

        function getPhotos(picItemId) {

            var i;

            for (i = 0; i < logPhotosFetched.length; i++) {
                if (logPhotosFetched[i] == picItemId) {
                    showPhotoLists(picItemId, i);
                    return;
                }
            }

            $.ajax({
                type: 'post',
                url: getPhotosDir,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId,
                    'picItemId': picItemId
                },
                success: function (response) {

                    logPhotosFetched[i] = picItemId;
                    response = JSON.parse(response);
                    filters = response["filters"];
                    logPics[i] = response["pics"];
                    alts = [];
                    idxSlideBar = 0;

                    showPhotoLists(picItemId, i);
                }
            });

            showPhotoLists(picItemId, -1);
        }

        function setMainPic(idx) {

            idxSlideBar = parseInt(idx);

            if (idxSlideBar <= 0) {
                $(".heroNavLeft").addClass('hidden');
            }
            else {
                $(".heroNavLeft").removeClass('hidden');
            }

            if (idxSlideBar == SliderFilter.length - 1) {
                $(".heroNavRight").addClass('hidden');
            }
            else {
                $(".heroNavRight").removeClass('hidden');
            }

            if (idxSlideBar > -1) {
                var pic = SliderFilter[idxSlideBar][1];
                var owner = SliderFilter[idxSlideBar][2];
                var ownerPic = SliderFilter[idxSlideBar][3];
            }

            var newElement = "<div class='member_info'>";
            newElement += "<div class='memberOverlayLink'>";

            if (idxSlideBar == -1) {
                newElement += "<div class='avatar' style='float: right !important; padding: 0 !important; border: none !important'>";
                $(".mainImg").empty().append("<div style='margin-top: 40vh; right: 45%; position: absolute' class='loader'></div>");
            }
            else if (SliderFilter[idxSlideBar][0] != -1) {
                newElement += "<div class='avatar' onmouseleave='$(\".img_popUp\").addClass(\"hidden\");' onmouseenter='showBriefPopUp(this, \"" + owner + "\")' style='float: right !important; padding: 0 !important; border: none !important'>";
                $(".mainImg").empty().append("<img src='" + pic + "' width='1000' height='1500'>");
            }
            else {
                newElement += "<div class='avatar' style='float: right !important; padding: 0 !important; border: none !important'>";
                $(".mainImg").empty().append("<img alt='" + alts[idxSlideBar] + "' src='" + pic + "' width='1000' height='1500'>");
            }

            if (idxSlideBar != -1) {
                newElement += "<img width='74' class='avatar' height='74' src='" + ownerPic + "'/>";
                newElement += "</div>";
                newElement += "<div class='username mo'></div></div>";
                newElement += "<div class='location'>" + owner + "</div>";
                newElement += "</div>";
            }
            $(".captionProvider").empty().append(newElement);

        }

        function filterSlideBar(id) {

            if (id == 0)
                id = defaultSlideBarPic;

            $(".ab101").removeClass('current');
            $(".ab_" + id).addClass('current');
            $(".tinyThumb").addClass('hidden');
            $(".filter_" + id).removeClass('hidden');

            SliderFilter = [];
            idxSlideBar = 0;

            for (i = 0; i < sliderPics.length; i++) {
                if (sliderPics[i][0] == id) {
                    SliderFilter[SliderFilter.length] = sliderPics[i];
                    $("#tinyThumb_" + i).attr('data-val', SliderFilter.length - 1);
                }
            }

            if (SliderFilter.length > 0)
                setMainPic(0);
        }

        function showDetails(username) {

            if (username == null)
                return;

            $.ajax({
                type: 'post',
                url: showUserBriefDetail,
                data: {
                    'username': username
                },
                success: function (response) {

                    if(response.length == 0)
                        return;

                    response = JSON.parse(response);
                    total = response.excellent + response.veryGood + response.average + response.bad + response.veryBad;
                    total /= 100;

                    var newElement = "<div class='arrow' style='margin: 0 30px 155px 0;'></div>";
                    newElement += "<div class='body_text'>";
                    newElement += "<div class='memberOverlay simple container moRedesign'>";
                    newElement += "<div class='innerContent'>";
                    newElement += "<div class='memberOverlayRedesign g10n'>";
                    newElement += "<a href='" + homeURL + "/otherProfile/" + username + "'>";
                    newElement += "<h3 class='username reviewsEnhancements'>" + username + "</h3>";
                    newElement += "</a>";
                    newElement += "<div class='memberreviewbadge'>";
                    newElement += "<div class='badgeinfo'>";
                    newElement += "سطح <span>" + response.level + "</span>";
                    newElement += "</div></div>";
                    newElement += "<ul class='memberdescriptionReviewEnhancements'>";
                    newElement += "<li>تاریخ عضویت در سایت " + response.created + "</li>";
                    newElement += "<li>از " + response.city + " در " + response.state + " </li>";
                    newElement += "</ul>";
                    newElement += "<ul class='countsReviewEnhancements'>";
                    newElement += "<li class='countsReviewEnhancementsItem'>";
                    newElement += "<span class='ui_icon pencil-paper iconReviewEnhancements'></span>";
                    newElement += "<span class='badgeTextReviewEnhancements'>" + response.rates + " نقد</span>";
                    newElement += "</li>";
                    newElement += "<li class='countsReviewEnhancementsItem'>";
                    newElement += "<span class='ui_icon globe-world iconReviewEnhancements'></span>";
                    newElement += "<span class='badgeTextReviewEnhancements'>" + response.seen + " مشاهده</span>";
                    newElement += "</li>";
                    newElement += "<li class='countsReviewEnhancementsItem'>";
                    newElement += "<span class='ui_icon thumbs-up-fill iconReviewEnhancements'></span>";
                    newElement += "<span class='badgeTextReviewEnhancements'>" + response.likes + " رای مثبت</span>";
                    newElement += "</li>";
                    newElement += "<li class='countsReviewEnhancementsItem'>";
                    newElement += "<span class='ui_icon thumbs-down-fill iconReviewEnhancements'></span>";
                    newElement += "<span class='badgeTextReviewEnhancements'>" + response.dislikes + " رای منفی</span>";
                    newElement += "</li>";
                    newElement += "</ul>";
                    newElement += "<div class='wrap'>";
                    newElement += "<ul class='memberTagsReviewEnhancements'>";
                    newElement += "</ul></div>";
                    newElement += "<div class='wrap'>";
                    newElement += "<div class='wrap container histogramReviewEnhancements'>";
                    newElement += "<div class='barlogoReviewEnhancements'>";
                    newElement += "<span>پراکندگی نقدها</span>";
                    newElement += "</div><ul>";
                    newElement += "<div class='chartRowReviewEnhancements'>";
                    newElement += "<span class='rowLabelReviewEnhancements rowCellReviewEnhancements'>عالی</span>";
                    newElement += "<span class='rowBarReviewEnhancements rowCellReviewEnhancements'>";
                    newElement += "<span class='barReviewEnhancements'>";
                    newElement += "<span class='fillReviewEnhancements' style='width:" + response.excellent / total + "%;'></span>";
                    newElement += "</span></span>";
                    newElement += "<span class='rowCountReviewEnhancements rowCellReviewEnhancements'> " + response.excellent + "</span>";
                    newElement += "</div>";
                    newElement += "<div class='chartRowReviewEnhancements'>";
                    newElement += "<span class='rowLabelReviewEnhancements rowCellReviewEnhancements'>خوب</span>";
                    newElement += "<span class='rowBarReviewEnhancements rowCellReviewEnhancements'>";
                    newElement += "<span class='barReviewEnhancements'>";
                    newElement += "<span class='fillReviewEnhancements' style='width:" + response.veryGood / total + "%;'></span>";
                    newElement += "</span></span>";
                    newElement += "<span class='rowCountReviewEnhancements rowCellReviewEnhancements'> " + response.veryGood + "</span>";
                    newElement += "</div>";
                    newElement += "<div class='chartRowReviewEnhancements'>";
                    newElement += "<span class='rowLabelReviewEnhancements rowCellReviewEnhancements'>معمولی</span>";
                    newElement += "<span class='rowBarReviewEnhancements rowCellReviewEnhancements'>";
                    newElement += "<span class='barReviewEnhancements'>";
                    newElement += "<span class='fillReviewEnhancements' style='width:" + response.average / total + "%;'></span>";
                    newElement += "</span></span>";
                    newElement += "<span class='rowCountReviewEnhancements rowCellReviewEnhancements'> " + response.average + "</span>";
                    newElement += "</div>";
                    newElement += "<div class='chartRowReviewEnhancements'>";
                    newElement += "<span class='rowLabelReviewEnhancements rowCellReviewEnhancements'>ضعیف</span>";
                    newElement += "<span class='rowBarReviewEnhancements rowCellReviewEnhancements'>";
                    newElement += "<span class='barReviewEnhancements'>";
                    newElement += "<span class='fillReviewEnhancements' style='width:" + response.bad / total + "%;'></span>";
                    newElement += "</span></span>";
                    newElement += "<span class='rowCountReviewEnhancements rowCellReviewEnhancements'> " + response.bad + "</span>";
                    newElement += "</div>";
                    newElement += "<div class='chartRowReviewEnhancements'>";
                    newElement += "<span class='rowLabelReviewEnhancements rowCellReviewEnhancements'>خیلی بد</span>";
                    newElement += "<span class='rowBarReviewEnhancements rowCellReviewEnhancements'>";
                    newElement += "<span class='barReviewEnhancements'>";
                    newElement += "<span class='fillReviewEnhancements' style='width:" + response.veryBad / total + "%;'></span>";
                    newElement += "</span></span>";
                    newElement += "<span class='rowCountReviewEnhancements rowCellReviewEnhancements'> " + response.veryBad + "</span>";
                    newElement += "</div></ul></div></div></div></div></div></div>";

                    $(".img_popUp").empty().append(newElement).removeClass('hidden');
                }
            });

        }

        function showBriefPopUp(thisVar, owner) {

            var bodyRect = document.body.getBoundingClientRect(),
                    elemRect = thisVar.getBoundingClientRect(),
                    offset = elemRect.top - bodyRect.top,
                    offset2 = elemRect.left - bodyRect.left;

            if (offset < 0)
                offset = Math.abs(offset);

            $(".img_popUp").css("top", offset).css("left", offset2 - 450);
            showDetails(owner);
        }

        function stickIt() {

            var orgElementPos = $('.original').offset();
            orgElementTop = orgElementPos.top;

            if ($(window).scrollTop() >= (orgElementTop)) {
                // scrolled past the original position; now only show the cloned, sticky element.

                // Cloned element should always have same left position and width as original element.
                orgElement = $('.original');
                coordsOrgElement = orgElement.offset();
                leftOrgElement = coordsOrgElement.left;
                widthOrgElement = orgElement.css('width');
                $('.cloned').addClass('my_moblie_hidden')
                        .css('left','0%').css('top',0).css('font-size', '13px').css('right', '0%').css('width','auto').show()
                        .css('visibility','hidden');
            } else {
                // not scrolled past the menu; only show the original menu.
                $('.cloned').hide();
                $('.original').css('visibility','visible');
            }
        }

        function checkOverFlow() {

            offsetHeight = $('#introductionText').prop('offsetHeight');
            scrollHeight = $('#introductionText').prop('scrollHeight');

            if (offsetHeight < scrollHeight)
                $('#showMore').removeClass('hidden');
            else {
                $('#showMore').addClass('hidden');
            }
        }

        function showMore() {
            $('#introductionText').css('max-height', '');
            $('#showMore').empty().append('کمتر').attr('onclick', 'showLess()');
        }

        function showLess() {
            $('#introductionText').css('max-height', '30px');
            $('#showMore').empty().append('بیشتر').attr('onclick', 'showMore()');
        }

        function showMoreReview(idx) {
            $('#partial_entry_' + idx).css('max-height', '');
            $('#showMoreReview_' + idx).empty().append('کمتر').attr('onclick', 'showLessReview("' + idx + '")');
            $("#reviewPic_" + idx).removeClass('hidden');
        }

        function showLessReview(idx) {
            $('#partial_entry_' + idx).css('max-height', '70px');
            $('#showMoreReview_' + idx).empty().append('بیشتر').attr('onclick', 'showMoreReview(' + idx + ')');
            $("#reviewPic_" + idx).addClass('hidden');
        }

        function showAddReviewPage(url) {

            if(!hasLogin) {
                showLoginPrompt(url);
            }
            else {
                document.location.href = url;
            }
        }

        $(document).ready(function () {



            $('#share_pic').click(function(){

                if($('#share_box').is( ":hidden" )){
                    $('#share_box').show();
                }else{
                    $('#share_box').hide();
                }
            });


        });
    </script>

    <script>

        var total;
        var filters = [];
        var hasFilter = false;
        var topContainer;
        var marginTop;
        var helpWidth;
        var greenBackLimit = 5;
        var pageHeightSize = window.innerHeight;
        var additional = [];
        var indexes = [];

        $(".nextBtnsHelp").click(function () {
            show(parseInt($(this).attr('data-val')) + 1, 1);
        });

        $(".backBtnsHelp").click(function () {
            show(parseInt($(this).attr('data-val')) - 1, -1);
        });

        $(".exitBtnHelp").click(function () {
            myQuit();
        });

        function myQuit() {
            clear();
            $(".dark").hide();
            enableScroll();
        }

        function setGreenBackLimit(val) {
            greenBackLimit = val;
        }

        function initHelp(t, sL, topC, mT, hW) {
            total = t;
            filters = sL;
            topContainer = topC;
            marginTop = mT;
            helpWidth = hW;

            if(sL.length > 0)
                hasFilter = true;

            $(".dark").show();
            show(1, 1);
        }

        function initHelp2(t, sL, topC, mT, hW, i, a) {
            total = t;
            filters = sL;
            topContainer = topC;
            marginTop = mT;
            helpWidth = hW;
            additional = a;
            indexes = i;

            if(sL.length > 0)
                hasFilter = true;

            $(".dark").show();
            show(1, 1);
        }

        function isInFilters(key) {

            key = parseInt(key);

            for(j = 0; j < filters.length; j++) {
                if (filters[j] == key)
                    return true;
            }
            return false;
        }

        function getBack(curr) {

            for(i = curr - 1; i >= 0; i--) {
                if(!isInFilters(i))
                    return i;
            }
            return -1;
        }

        function getFixedFromLeft(elem) {

            if(elem.prop('id') == topContainer || elem.prop('id') == 'PAGE') {
                return parseInt(elem.css('margin-left').split('px')[0]);
            }

            return elem.position().left +
                    parseInt(elem.css('margin-left').split('px')[0]) +
                    getFixedFromLeft(elem.parent());
        }

        function getFixedFromTop(elem) {

            if(elem.prop('id') == topContainer) {
                return marginTop;
            }

            if(elem.prop('id') == "PAGE") {
                return 0;
            }

            return elem.position().top +
                    parseInt(elem.css('margin-top').split('px')[0]) +
                    getFixedFromTop(elem.parent());
        }

        function getNext(curr) {

            curr = parseInt(curr);

            for(i = curr + 1; i < total; i++) {
                if(!isInFilters(i))
                    return i;
            }
            return total;
        }

        function bubbles(curr) {

            if(total <= 1)
                return "";

            t = total - filters.length;
            newElement = "<div class='col-xs-12' style='position: relative'><div class='col-xs-12 bubbles' style='padding: 0; margin-right: 0; margin-left: " + ((400 - (t * 18)) / 2) + "px'>";

            for (i = 1; i < total; i++) {
                if(!isInFilters(i)) {
                    if(i == curr)
                        newElement += "<div style='border: 1px solid #ccc; background-color: #ccc; border-radius: 50%; margin-right: 2px; width: 12px; height: 12px; float: left'></div>";
                    else
                        newElement += "<div onclick='show(\"" + i + "\", 1)' class='helpBubble' style='border: 1px solid #333; background-color: black; border-radius: 50%; margin-right: 2px; width: 12px; height: 12px; float: left'></div>";
                }
            }

            newElement += "</div></div>";

            return newElement;
        }

        function clear() {

            $('.bubbles').remove();

            $(".targets").css({
                'position': '',
                'border': '',
                'padding': '',
                'background-color': '',
                'z-index': '',
                'cursor': '',
                'pointer-events': 'auto'
            });

            $(".helpSpans").addClass('hidden');
            $(".backBtnsHelp").attr('disabled', 'disabled');
            $(".nextBtnsHelp").attr('disabled', 'disabled');
        }

        function show(curr, inc) {

            clear();

            if(hasFilter) {
                while (isInFilters(curr)) {
                    curr += inc;
                }
            }

            if(getBack(curr) <= 0) {
                $("#backBtnHelp_" + curr).attr('disabled', 'disabled');
            }
            else {
                $("#backBtnHelp_" + curr).removeAttr('disabled');
            }

            if(getNext(curr) > total - 1) {
                $("#nextBtnHelp_" + curr).attr('disabled', 'disabled');
            }
            else {
                $("#nextBtnHelp_" + curr).removeAttr('disabled');
            }

            if(curr < greenBackLimit) {
                $("#targetHelp_" + curr).css({
                    'position': 'relative',
                    'border': '5px solid #333',
                    'padding': '10px',
                    'background-color': '#4dc7bc',
                    'z-index': 1000001,
                    'cursor': 'auto'
                });
            }
            else {
                $("#targetHelp_" + curr).css({
                    'position': 'relative',
                    'border': '5px solid #333',
                    'padding': '10px',
                    'background-color': 'white',
                    'z-index': 100000001,
                    'cursor': 'auto'
                });
            }

            var targetWidth = $("#targetHelp_" + curr).css('width').split('px')[0];

            var targetHeight = parseInt($("#targetHelp_" + curr).css('height').split('px')[0]);

            for(j = 0; j < indexes.length; j++) {
                if(curr == indexes[j]) {
                    targetHeight += additional[j];
                    break;
                }
            }

            if($("#targetHelp_" + curr).offset().top > 200) {
                $("html, body").scrollTop($("#targetHelp_" + curr).offset().top - 100);
                $("#helpSpan_" + curr).css({
                    'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                    'top': targetHeight + 120 + "px"
                }).removeClass('hidden').append(bubbles(curr));
            }
            else {
                $("#helpSpan_" + curr).css({
                    'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                    'top': ($("#targetHelp_" + curr).offset().top + targetHeight + 20) % pageHeightSize + "px"
                }).removeClass('hidden').append(bubbles(curr));
            }



            $(".helpBubble").on({

                mouseenter: function () {
                    $(this).css('background-color', '#ccc');
                },
                mouseleave: function () {
                    $(this).css('background-color', '#333');
                }

            });

            disableScroll();
        }

        // left: 37, up: 38, right: 39, down: 40,
        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36

        var keys = {37: 1, 38: 1, 39: 1, 40: 1};

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault)
                e.preventDefault();
            e.returnValue = false;
        }

        function preventDefaultForScrollKeys(e) {
            if (keys[e.keyCode]) {
                preventDefault(e);
                return false;
            }
        }

        function disableScroll() {
            if (window.addEventListener) // older FF
                window.addEventListener('DOMMouseScroll', preventDefault, false);
            window.onwheel = preventDefault; // modern standard
            window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
            window.ontouchmove  = preventDefault; // mobile
            document.onkeydown  = preventDefaultForScrollKeys;
        }

        function enableScroll() {
            if (window.removeEventListener)
                window.removeEventListener('DOMMouseScroll', preventDefault, false);
            window.onmousewheel = document.onmousewheel = null;
            window.onwheel = null;
            window.ontouchmove = null;
            document.onkeydown = null;
        }

    </script>

    <script src="{{URL::asset('js/adv.js')}}"></script>

    @include('hotelDetailsPopUp')
    @include('editor')
@stop