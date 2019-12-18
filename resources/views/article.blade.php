<?php $placeMode = "ticket";
$state = 'اصفهان';
$kindPlaceId = 10; ?>
        <!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=1')}}' data-rup='hr_north_star_v1'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/hotelDetail.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/gardeshname.min.css?v=1.2')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/gardeshname.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>خانه - شازده مسافر</title>

    <link rel='stylesheet' id='google-font-css' href='//fonts.googleapis.com/css?family=Dosis%3A200' type='text/css'
          media='all'/>

    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>

    <style>
        .gnTopPics {
            direction: rtl;
            background-color: #d3d2d2;
        }

        .gnWhiteBox {
            background-color: white;
            margin: 20px 0 0;
        }

        .gnContentsCategory {
            display: flex;
            justify-content: space-between;
        }
        .gnColOFContentsCategory {
            width: 47%;
        }
        .gnUl {
            list-style: none;
            padding: 5px;
            margin: 5px 5px 10px 0px;
            background-color: #f3f3f3;
        }
        .gnLi {
            padding: 2px 0;
        }
        .gnTitleOfPlaces {
            font-size: 1.2em;
            font-weight: 400;
        }
        .gnNumberOfPlaces {
            color: #92321b;
            float: left;
        }

        .gnInput {
            width: 100%;
            padding: 2px 7px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            background-color: #ebebeb;
            line-height: 30px;
            margin: 5px 0;
        }

        .gnAdvertise {
            padding-bottom: 12px;
        }
        .gnAdvertiseText {
            color: #30b4a6;
        }
        .gnAdvertiseImage {
            width: 100%;
            height: auto;
        }
    </style>

    <style>
        #helpBtnMainDiv {
            display: none;
        }
    </style>

    {{--just gardeshname style--}}
    <style>
        .gnReturnBackBtn {
            background-color: #fcc156;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0 0;
            text-align: center;
            font-size: 1.2em;
            cursor: pointer;
        }
        .gnReturnBackBtn:hover {
            opacity: 0.75;
        }
    </style>

    {{--just article style--}}
    <style>
        .gnMainPicOfArticle {
            position: relative;
            padding: 15px 0;
        }
        .gnMainPicOfArticleText {
            width: 96%;
            position: absolute;
            bottom: -35px;
            left: 50%;
            margin-left: -48%;
            padding: 20px 20px 10px;
            background: white;
            border-bottom: 3px solid #f3f3f3;
            opacity: 0.9;
        }
    </style>

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging rtl home page-template-default page page-id-119 group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

<div class="header">
    @include('layouts.placeHeader')

    <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic position-relative">
        @include('layouts.placeMainBodyHeader')
    </div>

    <h1 class="non-display-name"><a href="/">شازده مسافر مجله جامع دیجیتال گردشگری، سفر و ایرانشناسی</a></h1>

    <div class="hidden visible-sm visible-xs">
        <div class="im-header-mobile">
            <div class="im-main-header clearfix light">
                <div class='container'>
                    <div class="row">
                        <div class="im-off-canvas col-sm-2 col-xs-2">
                            <button id="off-canvas-on" class="off-canvas-on"><i class="fa fa-navicon"></i></button>
                        </div>
                        <div class="im-mobile-logo col-sm-8 col-xs-8">
                        </div>
                        <div class="im-search im-slide-block col-sm-2 col-xs-2">
                            <div class="search-btn slide-btn">
                                <i class="fa fa-search"></i>
                                <div class="im-search-panel im-slide-panel">
                                    <form action="" name="searchform" method="get">
                                        <fieldset class="search-fieldset">
                                            <div class="input-group">
                                                <input type="search" class="form-control" name="s"
                                                       placeholder="عبارت جستجو را اینجا وارد کنید..." required/>
                                                <span class="input-group-btn">
                                                    <input type="submit" class="btn btn-default" value="بگرد"/>
                                                </span>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="im-header-mobile-ad col-md-12 text-center">
                <p>
                    <img class="aligncenter size-full wp-image-4151" src="{{URL::asset('images/gardeshname_banner.jpg')}}" alt="شازده مسافر" width="1600" height="365"/>
                </p>
            </div>
        </div>
    </div>

    <div class="hidden visible-sm visible-xs">
        <div id="im-header-offconvas" class="im-header-offconvas">
            <div class="im-header-offconvas-off clearfix">
                <button id="off-canvas-off" class="off-canvas-off">
                    <i class="fa fa-navicon"></i>
                </button>
            </div>
            <nav class="clearfix">
                <div class="mobile-menu">
                    <ul id="mobile-menu" class="menu">
                        <li id="menu-item-537"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-537 menu-item-category-44">
                            <a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/" aria-haspopup="true">اماکن گردشگری </a>
                            <ul class="sub-menu">
                                <li id="menu-item-538"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-538 menu-item-category-45">
                                    <a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d8%aa%d8%a7%d8%b1%db%8c%d8%ae%db%8c/">اماکن
                                        تاریخی</a>
                                </li>
                                <li id="menu-item-539"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-539 menu-item-category-46">
                                    <a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d8%aa%d9%81%d8%b1%db%8c%d8%ad%db%8c/">اماکن
                                        تفریحی</a>
                                </li>
                                <li id="menu-item-540"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-540 menu-item-category-47">
                                    <a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d9%85%d8%b0%d9%87%d8%a8%db%8c/">اماکن
                                        مذهبی</a>
                                </li>
                                <li id="menu-item-541"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-541 menu-item-category-50">
                                    <a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%b7%d8%a8%db%8c%d8%b9%d8%aa-%da%af%d8%b1%d8%af%db%8c/">طبیعت
                                        گردی</a><
                                    /li>
                                <li id="menu-item-542"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-542 menu-item-category-49">
                                    <a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d9%85%d8%b1%d8%a7%da%a9%d8%b2-%d8%ae%d8%b1%db%8c%d8%af/">مراکز
                                        خرید</a>
                                </li>
                                <li id="menu-item-543"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-543 menu-item-category-48">
                                    <a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d9%85%d9%88%d8%b2%d9%87/">موزه</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-7408"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-7408">
                            <a href="#" aria-haspopup="true">هتل و رستوران </a>
                            <ul class="sub-menu">
                                <li id="menu-item-7409"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7409 menu-item-category-33">
                                    <a href="/category/%d9%87%d8%aa%d9%84-%d9%88-%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86/%d9%87%d8%aa%d9%84/">هتل</a>
                                </li>
                                <li id="menu-item-7410"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7410 menu-item-category-40">
                                    <a href="/category/%d9%87%d8%aa%d9%84-%d9%88-%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86/%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86-%d9%87%d8%a7/%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86-%d8%b4%d9%87%d8%b1%db%8c/%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86/">رستوران</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-3016"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3016">
                            <a href="#" aria-haspopup="true">آداب و رسوم </a>
                            <ul class="sub-menu">
                                <li id="menu-item-532"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-532 menu-item-category-65">
                                    <a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%b3%d9%88%d8%ba%d8%a7%d8%aa-%d9%85%d8%ad%d9%84%db%8c/">سوغات
                                        محلی</a>
                                </li>
                                <li id="menu-item-533"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-533 menu-item-category-66">
                                    <a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%b5%d9%86%d8%a7%db%8c%d8%b9-%d8%af%d8%b3%d8%aa%db%8c/">صنایع
                                        دستی</a>
                                </li>
                                <li id="menu-item-534"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-534 menu-item-category-62">
                                    <a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%ba%d8%b0%d8%a7%d9%87%d8%a7%db%8c-%d9%85%d8%ad%d9%84%db%8c/">غذاهای
                                        محلی</a>
                                </li>
                                <li id="menu-item-536"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-536 menu-item-category-67">
                                    <a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d9%84%d8%a8%d8%a7%d8%b3-%d9%85%d8%ad%d9%84%db%8c/">لباس
                                        محلی</a>
                                </li>
                                <li id="menu-item-535"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-535 menu-item-category-64">
                                    <a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%da%af%d9%88%db%8c%d8%b4-%d9%85%d8%ad%d9%84%db%8c/">گویش
                                        محلی</a>
                                </li>
                                <li id="menu-item-531"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-531 menu-item-category-63">
                                    <a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%a7%d8%b5%d8%b7%d9%84%d8%a7%d8%ad%d8%a7%d8%aa-%d9%85%d8%ad%d9%84%db%8c/">اصطلاحات
                                        محلی</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-3017"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3017">
                            <a href="#" aria-haspopup="true">جشنواره و آیین </a>
                            <ul class="sub-menu">
                                <li id="menu-item-547"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-547 menu-item-category-60">
                                    <a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%d8%b1%d8%b3%d9%88%d9%85-%d9%85%d8%ad%d9%84%db%8c/">رسوم
                                        محلی</a>
                                </li>
                                <li id="menu-item-546"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-546 menu-item-category-57">
                                    <a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87/">جشنواره</a>
                                </li>
                                <li id="menu-item-545"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-545 menu-item-category-58">
                                    <a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%d8%aa%d9%88%d8%b1/">تور</a>
                                </li>
                                <li id="menu-item-548"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-548 menu-item-category-59">
                                    <a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%da%a9%d9%86%d8%b3%d8%b1%d8%aa/">کنسرت</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-549"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-549 menu-item-category-51">
                            <a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/" aria-haspopup="true">حمل و
                                نقل </a>
                            <ul class="sub-menu">
                                <li id="menu-item-550"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-550 menu-item-category-54">
                                    <a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d8%a7%d8%aa%d9%88%d8%a8%d9%88%d8%b3/">اتوبوس</a>
                                </li>
                                <li id="menu-item-551"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-551 menu-item-category-53">
                                    <a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d9%82%d8%b7%d8%a7%d8%b1/">قطار</a>
                                </li>
                                <li id="menu-item-552"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-552 menu-item-category-55">
                                    <a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%b3%d9%88%d8%a7%d8%b1%db%8c/">ماشین
                                        سواری</a>
                                </li>
                                <li id="menu-item-553"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-553 menu-item-category-52">
                                    <a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d9%87%d9%88%d8%a7%db%8c%db%8c/">هوایی</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-8780"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-8780 menu-item-category-6582">
                            <a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/" aria-haspopup="true">بین
                                الملل </a>
                            <ul class="sub-menu">
                                <li id="menu-item-8781"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-8781 menu-item-category-6583">
                                    <a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a2%d8%b3%db%8c%d8%a7/">قاره
                                        آسیا</a>
                                </li>
                                <li id="menu-item-10047"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10047 menu-item-category-6998">
                                    <a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a7%d8%b1%d9%88%d9%be%d8%a7/">قاره
                                        اروپا</a>
                                </li>
                                <li id="menu-item-10049"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10049 menu-item-category-7121">
                                    <a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a2%d9%85%d8%b1%db%8c%da%a9%d8%a7/">قاره
                                        آمریکا</a>
                                </li>
                                <li id="menu-item-10048"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10048 menu-item-category-7076">
                                    <a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a7%d9%82%db%8c%d8%a7%d9%86%d9%88%d8%b3%db%8c%d9%87/">قاره
                                        اقیانوسیه</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-7398"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-7398 menu-item-category-554">
                            <a href="/category/%d8%b1%d8%a7%d9%87%d9%86%d9%85%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d8%ae%d8%a8%d8%a7%d8%b1-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/"
                               aria-haspopup="true">راهنمای گردشگری </a>
                            <ul class="sub-menu">
                                <li id="menu-item-7412"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7412 menu-item-category-1260">
                                    <a href="/category/%d8%b1%d8%a7%d9%87%d9%86%d9%85%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%af%d8%a7%d9%86%d8%b4-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/">دانش
                                        گردشگری</a>
                                </li>
                                <li id="menu-item-7399"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7399 menu-item-category-1908">
                                    <a href="/category/%d8%b1%d8%a7%d9%87%d9%86%d9%85%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%af%d8%a7%d9%86%d8%b4-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d8%af%d8%a8%db%8c%d8%a7%d8%aa-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/">ادبیات
                                        گردشگری</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <hr/>
                <div class="mobile-menu">
                    <ul class="im-social-links-mobile clearfix">
                        <li>
                            <a href="https://www.facebook.com/Sahzde-Mosafer-1318952388224559/">
                                <span class="im-facebook" title="فیسبوک">
                                    <i class="fa fa-facebook"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="im-twitter" title="توییتر">
                                    <i class="fa fa-twitter"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/113786987503996741617">
                                <span class="im-google" title="گوگل +">
                                    <i class="fa fa-google-plus"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/shazde-mosafer-652817143/">
                                <span class="im-linkedin" title="لینکداین">
                                    <i class="fa fa-linkedin"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/shazdehmosafer/?hl=en">
                                <span class="im-instagram" title="اینستاگرام">
                                    <i class="fa fa-instagram"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://t.me/shazdemosafer">
                                <span class="im-telegram" title="تلگرام">
                                    <i class="fa fa-paper-plane"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/shazdemosafer/">
                                <span class="im-aparat" title="آپارات">
                                    <i class="fa fa-spinner"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="im-youtube" title="یوتیوب">
                                    <i class="fa fa-youtube"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="container" style="direction: rtl">
        <div class="col-md-3 col-sm-12" style="padding-right: 0 !important;">
            <div class="col-md-12 gnReturnBackBtn">بازگشت به صفحه اصلی</div>
            <div class="col-md-12 gnWhiteBox">
                <div class="widget-head widget-head-44">
                    <strong class="widget-title">دسته‌بندی مطالب</strong>
                    <div class="widget-head-bar"></div>
                    <div class="widget-head-line"></div>
                </div>
                <div class="gnContentsCategory">
                    <div class="gnColOFContentsCategory">
                        <div>
                            <div>
                                <span class="gnTitleOfPlaces">اماکن گردشگری</span>
                                <span class="gnNumberOfPlaces">0</span>
                            </div>
                            <ul class="gnUl">
                                <li class="gnLi">
                                    <span>اماکن تاریخی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>اماکن مذهبی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>اماکن تفریحی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>طبیعت گردی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>مراکز خرید</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>موزه ها</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div>
                                <span class="gnTitleOfPlaces">هتل و رستوران</span>
                                <span class="gnNumberOfPlaces">0</span>
                            </div>
                            <ul class="gnUl">
                                <li class="gnLi">
                                    <span>هتل</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>رستوران</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div>
                                <span class="gnTitleOfPlaces">حمل و نقل</span>
                                <span class="gnNumberOfPlaces">0</span>
                            </div>
                            <ul class="gnUl">
                                <li class="gnLi">
                                    <span>هواپیما</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>اتوبوس</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>سواری</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>قطار</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="gnColOFContentsCategory">
                        <div>
                            <div>
                                <span class="gnTitleOfPlaces">آداب و رسوم</span>
                                <span class="gnNumberOfPlaces">0</span>
                            </div>
                            <ul class="gnUl">
                                <li class="gnLi">
                                    <span>سوغات محلی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>صنایع دستی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>اماکن تفریحی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>غذای محلی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>لباس محلی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>گویش محلی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>اصطلاحات محلی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div>
                                <span class="gnTitleOfPlaces">جشنواره و آیین</span>
                                <span class="gnNumberOfPlaces">0</span>
                            </div>
                            <ul class="gnUl">
                                <li class="gnLi">
                                    <span>رسم محلی</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>جشنواره</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>تور</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                                <li class="gnLi">
                                    <span>کنسرت</span>
                                    <span class="gnNumberOfPlaces">0</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div>
                                <span class="gnTitleOfPlaces">راهنمای گردشگری</span>
                                <span class="gnNumberOfPlaces">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 gnWhiteBox">
                <div>شما در استان اصفهان - شهر مورچه خورد - هتل عباسی هستید</div>
                <div>
                    <a href="">نمایش محتوای استان اصفهان</a>
                </div>
                <div>
                    <a href="">نمایش محتوای شهر اصفهان</a>
                </div>
                <input type="text" class="gnInput" placeholder="شهر موردنظر خود را وارد کنید">
            </div>
            <div class="col-md-12 gnWhiteBox">
                <div class="content-2col">
                    <div class="im-entry-thumb">
                        <div class="im-entry-header">
                            <div class="im-entry-category">
                                <div class="iranomag-meta clearfix">
                                    <div class="cat-links im-meta-item">
                                        <a class="im-catlink-color-2079" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%b7%d8%a8%db%8c%d8%b9%d8%aa-%da%af%d8%b1%d8%af%db%8c/%d8%a2%d8%a8%d8%b4%d8%a7%d8%b1/">آبشار</a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="im-entry-title">
                                <a href="/%d8%b1%d9%88%d8%b3%d8%aa%d8%a7%db%8c-%d8%a8%d9%86%d9%87-%da%a9%d9%85%d8%b1-%d9%81%d8%b1%db%8c%d8%af%d9%88%d9%86%d8%b4%d9%87%d8%b1/" rel="bookmark">
                                    روستای بنه کمر در منطقه پیشکوه
                                    شهرستان فریدونشهر واقع در استان اصفهان
                                </a>
                            </h3>
                        </div>
                    </div>
                    <div class="im-entry">
                        <div class="im-entry-content">
                            <p>
                                روستای بنه کمر امروز به روستای بنه کمر در منطقه پیشکوه
                                شهرستان فریدونشهر می رویم. همراه شازده مسافر باشید و از این
                                روستای زیبا دیدن&#8230;
                            </p>
                        </div>

                        <p class="im-entry-footer">
                        <div class="iranomag-meta clearfix">
                            <div class="posted-on im-meta-item">
                                <span class="entry-date published updated">سه شنبه, ۱۲ تیر ۱۳۹۷</span>
                            </div>
                            <div class="comments-link im-meta-item">
                                <a href="/%d8%b1%d9%88%d8%b3%d8%aa%d8%a7%db%8c-%d8%a8%d9%86%d9%87-%da%a9%d9%85%d8%b1-%d9%81%d8%b1%db%8c%d8%af%d9%88%d9%86%d8%b4%d9%87%d8%b1/#respond">
                                    <i class="fa fa-comment-o"></i>۰
                                </a>
                            </div>
                            <div class="author vcard im-meta-item">
                                <a class="url fn n" href="/author/writer/">
                                    <i class="fa fa-user"></i>
                                    شازده مسافر
                                </a>
                            </div>
                            <div class="post-views im-meta-item">
                                <i class="fa fa-eye"></i>۱۵۱
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="content-2col">
                    <div class="im-entry-thumb">
                        <div class="im-entry-header">
                            <div class="im-entry-category">
                                <div class="iranomag-meta clearfix">
                                    <div class="cat-links im-meta-item">
                                        <a class="im-catlink-color-2068" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%da%af%db%8c%d9%84%d8%a7%d9%86/">
                                            استان گیلان
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="im-entry-title">
                                <a href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/"
                                   rel="bookmark">
                                    غار آویشوی در نزدیکی روستای ماسال
                                    واقع در استان سرسبز گیلان
                                </a>
                            </h3>
                        </div>
                    </div>
                    <div class="im-entry">
                        <div class="im-entry-content">
                            <p>
                                غار آویشوی غار آویشوی در گیلان یکی از پدیده های زیبایی است که
                                در نوع خود بی نظیر است. غار آویشوی از بی نظیرترین غارهای&#8230;
                            </p>
                        </div>

                        <p class="im-entry-footer">
                        <div class="iranomag-meta clearfix">
                            <div class="posted-on im-meta-item">
                                <span class="entry-date published updated">یکشنبه, ۱۰ تیر ۱۳۹۷</span>
                            </div>
                            <div class="comments-link im-meta-item">
                                <a href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/#respond">
                                    <i class="fa fa-comment-o"></i>۰
                                </a>
                            </div>
                            <div class="author vcard im-meta-item">
                                <a class="url fn n" href="/author/writer/">
                                    <i class="fa fa-user"></i>
                                    شازده مسافر
                                </a>
                            </div>
                            <div class="post-views im-meta-item">
                                <i class="fa fa-eye"></i>۲۸۱
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 gnWhiteBox">
            <div class="gnMainPicOfArticle">
                <img class="gnAdvertiseImage" src="{{URL::asset('images/adv1.jpg')}}" alt="">
                <div class="gnMainPicOfArticleText">
                    <div>
                        <div class="im-entry-category" style="margin: 0 0 0 20px;">
                            <div class="iranomag-meta">
                                <a class="im-catlink-color-2079" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%b7%d8%a8%db%8c%d8%b9%d8%aa-%da%af%d8%b1%d8%af%db%8c/%d8%a2%d8%a8%d8%b4%d8%a7%d8%b1/">آبشار</a>
                            </div>
                        </div>
                        <div class="iranomag-meta" style="display: inline-block">
                            <div class="posted-on im-meta-item">
                                <span class="entry-date published updated">سه شنبه, ۱۲ تیر ۱۳۹۷</span>
                            </div>
                            <div class="comments-link im-meta-item">
                                <a href="/%d8%b1%d9%88%d8%b3%d8%aa%d8%a7%db%8c-%d8%a8%d9%86%d9%87-%da%a9%d9%85%d8%b1-%d9%81%d8%b1%db%8c%d8%af%d9%88%d9%86%d8%b4%d9%87%d8%b1/#respond">
                                    <i class="fa fa-comment-o"></i>۰
                                </a>
                            </div>
                            <div class="author vcard im-meta-item">
                                <a class="url fn n" href="/author/writer/">
                                    <i class="fa fa-user"></i>
                                    شازده مسافر
                                </a>
                            </div>
                            <div class="post-views im-meta-item">
                                <i class="fa fa-eye"></i>۱۵۱
                            </div>
                        </div>
                    </div>
                    <h3 class="im-entry-title">
                        <a style="color: black" href="/%d8%b1%d9%88%d8%b3%d8%aa%d8%a7%db%8c-%d8%a8%d9%86%d9%87-%da%a9%d9%85%d8%b1-%d9%81%d8%b1%db%8c%d8%af%d9%88%d9%86%d8%b4%d9%87%d8%b1/" rel="bookmark">روستای بنه کمر در منطقه پیشکوه شهرستان فریدونشهر واقع در استان اصفهان</a>
                    </h3>
                </div>
            </div>
            <div style="height: 800px">
                <div class="quantityOfLikes">
                    <span>31</span>
                    نفر دوست داشتند،
                    <span>31</span>
                    نفر دوست نداشتند و
                    <span>31</span>
                    نفر نظر دادند.
                </div>
                <div class="commentFeedbackChoices" style="position: absolute; bottom: 0;">
                    <div class="postsActionsChoices postLikeChoice col-xs-3">
                        <span class="commentsLikeIconFeedback"></span>
                        <span class="mg-rt-20 cursor-pointer">دوست داشتم</span>
                    </div>
                    <div class="postsActionsChoices postDislikeChoice col-xs-3">
                        <span class="commentsDislikeIconFeedback"></span>
                        <span class="mg-rt-20 cursor-pointer">دوست نداشتم</span>
                    </div>
                    <div class="postsActionsChoices postCommentChoice col-xs-3">
                        <span class="showCommentsIconFeedback" onclick="showPostsComments(this)"></span>
                        <span class="mg-rt-20 cursor-pointer" onclick="showPostsComments(this)">مشاهده نظرها</span>
                    </div>
                    <div class="postsActionsChoices postShareChoice col-xs-3">
                        <span class="commentsShareIconFeedback"></span>
                        <span class="mg-rt-20 cursor-pointer">اشتراک‌گذاری</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>

    <script type='text/javascript' src='{{URL::asset('js/gardeshname.js')}}'></script>


    <script type="text/javascript">
        jQuery('.lazy-img').unveil(300, function () {
            "use strict";
            jQuery(this).load(function () {
                this.style.opacity = 1;
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(".sticky-sidebar").stick_in_parent({offset_top: fixed_header_height});
    </script>

    @include('layouts.placeFooter')

</div>

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif


<script>

    $(".login-button").click(function () {
        $(".dark").show();
        showLoginPrompt('{{Request::url()}}');
    });

    function hideElement(e) {
        $(".dark").hide(), $("#" + e).addClass("hidden")
    }

    function showElement(e) {
        $("#" + e).removeClass("hidden"), $(".dark").show()
    }

</script>

<div class="ui_backdrop dark" style="display: none; z-index: 10000000;"></div>

</body>
</html>


