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
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/article.min.css?v=1.2')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/article.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>خانه - شازده مسافر</title>

    <link rel='stylesheet' id='google-font-css' href='//fonts.googleapis.com/css?family=Dosis%3A200' type='text/css' media='all'/>
    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>
</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging rtl home page-template-default page page-id-119 group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

<div class="header">
    @include('layouts.placeHeader')

    <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic position-relative">
        {{--        @include('layouts.placeMainBodyHeader')--}}
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
            <a href="{{route('mainArticle')}}">
                <div class="col-md-12 gnReturnBackBtn">بازگشت به صفحه اصلی</div>
            </a>
            <div class="col-md-12 gnWhiteBox">
                <div class="widget-head widget-head-44">
                    <strong class="widget-title">دسته‌بندی مطالب</strong>
                    <div class="widget-head-bar"></div>
                    <div class="widget-head-line"></div>
                </div>
                <div class="gnContentsCategory">
                    <div class="row" style="width: 100%; margin: 0px;">
                        <div id="rightCategory" class="col-md-6" style="padding: 0px 5px"></div>
                        <div id="leftCategory" class="col-md-6" style="padding: 0px 5px"></div>
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
                <div class="gnInput">
                    <input type="text" class="gnInputonInput" id="pcSearchInput" placeholder="عبارت مورد نظر خود را">
                    <button class="gnSearchInputBtn" type="submit" onclick="searchInArticle('pcSearchInput')">جستجو کنید</button>
                </div>
            </div>

            <div class="col-md-12 gnWhiteBox gnAdvertise">
                <div class="gnAdvertiseText">تبلیغات</div>
                <div>
                    <img class="gnAdvertiseImage" src="{{URL::asset('images/adv2.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12" style="padding-left: 0 !important;">
            <div class="col-md-12 gnWhiteBox" style="padding: 15px;">
                <div class="row im-blog">

                    <div id="samplePost" class="clearfix">
                        <div class="small-12 columns">
                            <article class="im-article content-column clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                                <div class="im-entry-thumb col-md-5 col-sm-12">
                                    <a style="width: 303px !important;"
                                       class="im-entry-thumb-link"
                                       href="##url##"
                                       title="##title##">
                                        <img style="width: 303px !important; height: 189px !important;"
                                             data-src="##pic##"
                                             src="##pic##"
                                             alt="##keyword##"/>
                                    </a>
                                </div>
                                <div class="im-entry col-md-7 col-sm-12">
                                    <header class="im-entry-header">
                                        <div class="im-entry-category">
                                            <div class="iranomag-meta clearfix">
                                                <div class="cat-links im-meta-item">
                                                    <a style="background-color: #666; color: #fff !important;" href="{{url('/article/list/category/')}}/##category##" title="##category##">##category##</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="im-entry-title">
                                            <a href="##url##"
                                               rel="bookmark">##title##</a>
                                        </h3>
                                    </header>

                                    <div style="max-height: 100px !important; overflow: hidden"
                                         class="im-entry-content">
                                        <p>##meta##</p>
                                    </div>

                                    <div style="margin-top: 7px"
                                         class="iranomag-meta clearfix">
                                        <div class="posted-on im-meta-item">
                                            <span class="entry-date published updated">##date##</span>
                                        </div>
                                        <div class="comments-link im-meta-item">

                                            <a href="">
                                                <i class="fa fa-comment-o"></i>##msgs##
                                            </a>
                                        </div>
                                        <div class="author vcard im-meta-item">
                                            <a class="url fn n">
                                                <i class="fa fa-user"></i>##username##
                                            </a>
                                        </div>
                                        <div class="post-views im-meta-item">
                                            <i class="fa fa-eye"></i>##seen##
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="clearfix">
                        <nav class="navigation pagination">
                            <div id="allPostPagination" class="nav-links"></div>
                        </nav>
                    </div>

                </div>
                <div class="gap cf height-30"></div>
            </div>
        </div>
    </div>

    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>
    <script type='text/javascript' src='{{URL::asset('js/article/searchArticle.js')}}'></script>
    <script>
        var page = 1;
        var type = '{{$type}}';
        var search = '{{$search}}';
        var _token = '{{csrf_token()}}';
        var getPostUrl = '{{route("article.list.pagination")}}';
        var getLisPostUrl = '{{route("article.list")}}';
        var totalPage = {{$pageLimit}};
        getPost(1);
    </script>

    <script type='text/javascript' src='{{URL::asset('js/article.js')}}'></script>


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

<script>
    var category = {!! $category !!}

    function createCategoryList(){
        for(var i = 0; i < category.length; i++){
            var text = '<div class="gnColOFContentsCategory">\n' +
                '<div>\n' +
                '<div>\n' +
                '<span id="CategoryName_' + category[i]["id"] + '" class="gnTitleOfPlaces" onclick="searchInCategory(this)"  style="cursor: pointer">' + category[i]["name"] + '</span>\n' +
                '<span class="gnNumberOfPlaces">' + category[i]["postCount"] + '</span>\n' +
                '</div>\n';

            if(category[i]["subCategory"].length > 0)
                text +='<ul class="gnUl">\n';

            for(var j = 0; j < category[i]["subCategory"].length; j++){
                var sub = category[i]["subCategory"][j];
                text += '<li class="gnLi">\n' +
                    '<span id="CategoryName_' + sub["id"] + '"  onclick="searchInCategory(this)" style="cursor: pointer">' + sub["name"] + '</span>\n' +
                    '<span class="gnNumberOfPlaces">' + sub["postCount"] + '</span>\n' +
                    '</li>\n';
            }
            if(category[i]["subCategory"].length > 0)
                text += '</ul>\n';

            text +='</div>\n' +
                '</div>';

            if(i % 4 == 0 || i % 4 == 3)
                $("#rightCategory").append(text);
            else
                $("#leftCategory").append(text);
        }
    }

    createCategoryList()
</script>

<div class="ui_backdrop dark" style="display: none; z-index: 10000000;"></div>

</body>
</html>


