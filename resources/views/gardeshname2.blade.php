<?php $placeMode = "ticket";
$state = 'اصفهان';
$kindPlaceId = 10; ?>
        <!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/gardeshname.min.css?v=1.1')}}"/>
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

</head>

<body style="background-color: white"
      class="rebrand_2017 desktop HomeRebranded  js_logging rtl home page-template-default page page-id-119 group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

<div class="header">
    @include('layouts.placeHeader')


    <h1 class="non-display-name"><a href="/">شازده مسافر مجله جامع دیجیتال گردشگری، سفر و ایرانشناسی</a></h1>

    <div class="hidden visible-sm visible-xs">
        <div class="im-header-mobile">
            <header class="im-main-header clearfix light">
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
            </header>
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

    <div class="im-content container">
        <div class="im-main-row clearfix">

            <article class="post post-detail post-119 page type-page status-publish hentry" id="post-119">
                <div class="post-content">
                    <div class="content-page" style="direction: rtl">
                        <div class="im-entry-content">
                            <div class="clearfix ">
                                <div class="wpb_column col-md-12 col-sm-12">
                                    <aside class="gap cf" style="height:30px;"></aside>
                                    <div class="im_post_grid_box clearfix">
                                        <div class="clearfix">
                                            <?php $i = 0; ?>
                                            @foreach($bannerPosts as $post)
                                                @if($i < 2)
                                                    <div class="col-md-6 col-sm-12">
                                                        @else
                                                            <div class="col-md-4 col-sm-12">
                                                                @endif
                                                                <article class="im-article grid-carousel grid-2 row post type-post status-publish format-standard has-post-thumbnail hentry">
                                                                    <div class="im-entry-thumb">
                                                                        <a class="im-entry-thumb-link" href="{{route('gardeshnameInner', ['postId' => $post->id])}}" title="{{$post->title}}">
                                                                            <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->alt}}"/>
                                                                        </a>
                                                                        <div class="im-entry-header">
                                                                            <div class="im-entry-category">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="cat-links im-meta-item">
                                                                                        <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;" href="" title="{{$post->category}}">{{$post->category}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h2 class="im-entry-title">
                                                                                <a style="color: {{$post->color}}" href="" rel="bookmark">{{$post->title}}</a>
                                                                            </h2>
                                                                            <div class="im-entry-footer">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="posted-on im-meta-item">
                                                                                        <span class="entry-date published updated">{{$post->date}}</span>
                                                                                    </div>
                                                                                    <div class="comments-link im-meta-item">
                                                                                        <a href="">
                                                                                            <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="author vcard im-meta-item">
                                                                                        <a class="url fn n">
                                                                                            <i class="fa fa-user"></i>{{$post->username}}
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="post-views im-meta-item">
                                                                                        <i class="fa fa-eye"></i>{{$post->seen}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </div>
                                                            @if($i == 1)
                                                    </div>
                                                    <div class="clearfix">
                                                        @endif
                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </div>
                                                    <aside class="gap cf" style="height:30px;"></aside>
                                        </div>
                                    </div>
                                    <div class="clearfix ">
                                        <div class="wpb_column col-md-12 col-sm-12">
                                            <aside class="gap cf" style="height:30px;"></aside>
                                        </div>
                                    </div>
                                    <div class="clearfix ">
                                        <div class="sticky-sidebar wpb_column col-md-3 col-sm-12">

                                        </div>


                                        <div class="wpb_column col-md-9 col-sm-12">
                                            <div class="category-element-holder style1">
                                                <div class="widget-head widget-head-45">
                                                    <strong class="widget-title">پر طرفدار ها</strong>
                                                    <div class="widget-head-bar"></div>
                                                    <div class="widget-head-line"></div>
                                                </div>
                                                <div class="row">
                                                    <?php $i = 0; ?>
                                                    @foreach($mostSeenPosts as $post)
                                                        @if($i == 0)
                                                            <article class="im-article content-2col col-md-6 col-sm-12 post type-post status-publish format-standard has-post-thumbnail hentry category-2068">
                                                                <div class="im-entry-thumb">
                                                                    <a class="im-entry-thumb-link"
                                                                    href="{{route('gardeshnameInner', ['postId' => $post->id])}}"
                                                                    title="{{$post->title}}">

                                                                        <img class="lazy-img" data-src="{{$post->pic}}"
                                                                        alt="{{$post->alt}}"/>
                                                                    </a>
                                                                    <header class="im-entry-header">
                                                                        <div class="im-entry-category">
                                                                            <div class="iranomag-meta clearfix">
                                                                                <div class="cat-links im-meta-item">
                                                                                    <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;" href="" title="{{$post->category}}">{{$post->category}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <h3 class="im-entry-title">
                                                                            <a style="color: {{$post->color}}" href="" rel="bookmark">{{$post->title}}</a>
                                                                        </h3>
                                                                    </header>
                                                                </div>
                                                                <div class="im-entry">
                                                                    <div class="iranomag-meta clearfix">
                                                                        <div class="posted-on im-meta-item">
                                                                            <span class="entry-date published updated">{{$post->date}}</span>
                                                                        </div>

                                                                        <div class="comments-link im-meta-item">
                                                                            <a href="">
                                                                                <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                            </a>
                                                                        </div>

                                                                        <div class="author vcard im-meta-item">
                                                                            <a class="url fn n">
                                                                                <i class="fa fa-user"></i>{{$post->username}}
                                                                            </a>
                                                                        </div>

                                                                        <div class="post-views im-meta-item">
                                                                            <i class="fa fa-eye"></i>{{$post->seen}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                            @else
                                                                @if($i == 1)
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div class="widget">
                                                                            <ul>
                                                                @endif
                                                                                <li class="widget-10104im-widgetclearfix">
                                                                                    <figure class="im-widget-thumb">
                                                                                        <a href="" title="{{$post->title}}">
                                                                                            <img src="{{$post->pic}}" alt="{{$post->alt}}"/>
                                                                                        </a>
                                                                                    </figure>
                                                                                    <div class="im-widget-entry">
                                                                                        <header class="im-widget-entry-header">
                                                                                            <h4 class='im-widget-entry-title'>
                                                                                                <a style="color: {{$post->color}} !important;" href='' title='{{$post->title}}'>{{$post->title}}</a>
                                                                                            </h4>
                                                                                        </header>
                                                                                        <div class="iranomag-meta clearfix">
                                                                                            <div class="posted-on im-meta-item">
                                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                                            </div>
                                                                                            <div class="comments-link im-meta-item">
                                                                                                <a href="">
                                                                                                    <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="author vcard im-meta-item">
                                                                                                <a class="url fn n">
                                                                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="post-views im-meta-item">
                                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                        @if($i == count($mostSeenPosts) - 1)
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                        @endif

                                                    <?php $i++; ?>

                                                    @endforeach

                                                </div>
                                            </div>

                                            <div style="margin-top: 10px" class="wpb_column col-md-6 col-sm-12">
                                                <div class="category-element-holder style2">
                                                    <div class="widget-head widget-head-46">
                                                        <strong class="widget-title">تازه ها</strong>
                                                        <div class="widget-head-bar"></div>
                                                        <div class="widget-head-line"></div>
                                                    </div>
                                                    <div class="row">

                                                        <?php $i = 0; ?>
                                                        @foreach($recentlyPosts as $post)
                                                            @if($i == 0)
                                                                <article class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                                                    <div class="im-entry-thumb">

                                                                        <a class="im-entry-thumb-link"
                                                                           href="{{route('gardeshnameInner', ['postId' => $post->id])}}"
                                                                           title="{{$post->title}}">

                                                                            <img class="lazy-img"
                                                                                 data-src="{{$post->pic}}"
                                                                                 alt="{{$post->alt}}"/>
                                                                        </a>
                                                                        <header class="im-entry-header">
                                                                            <div class="im-entry-category">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="cat-links im-meta-item">
                                                                                        <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;"
                                                                                           href=""
                                                                                           title="{{$post->category}}">{{$post->category}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="im-entry-title">
                                                                                <a style="color: {{$post->color}} !important"
                                                                                   href=""
                                                                                   rel="bookmark">{{$post->title}}</a>
                                                                            </h3>
                                                                        </header>
                                                                    </div>

                                                                    <div class="im-entry">
                                                                        <div class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>

                                                                            <div class="comments-link im-meta-item">
                                                                                <a href=""><i
                                                                                            class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                                </a>
                                                                            </div>

                                                                            <div class="author vcard im-meta-item">
                                                                                <a class="url fn n">
                                                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                                                </a>
                                                                            </div>

                                                                            <div class="post-views im-meta-item">
                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            @else

                                                                @if($i == 1)
                                                                    <div class="col-md-12">
                                                                        <div class="widget">
                                                                            <ul>
                                                                                @endif

                                                                                <li class="widget-10104 im-widget clearfix">
                                                                                    <figure class="im-widget-thumb">
                                                                                        <a href=""
                                                                                           title="{{$post->title}}">
                                                                                            <img src="{{$post->pic}}"
                                                                                                 alt="{{$post->alt}}"/>
                                                                                        </a>
                                                                                    </figure>
                                                                                    <div class="im-widget-entry">
                                                                                        <header class="im-widget-entry-header">
                                                                                            <h4 class='im-widget-entry-title'>
                                                                                                <a style="color: {{$post->color}} !important;"
                                                                                                   href=''
                                                                                                   title='{{$post->title}}'>{{$post->title}}</a>
                                                                                            </h4>
                                                                                        </header>
                                                                                        <p class="im-widget-entry-footer">
                                                                                        <div class="iranomag-meta clearfix">
                                                                                            <div class="posted-on im-meta-item">
                                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                                            </div>

                                                                                            <div class="comments-link im-meta-item">
                                                                                                <a href=""><i
                                                                                                            class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                                                </a>
                                                                                            </div>

                                                                                            <div class="author vcard im-meta-item">
                                                                                                <a class="url fn n">
                                                                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                                                                </a>
                                                                                            </div>

                                                                                            <div class="post-views im-meta-item">
                                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                                            </div>
                                                                                        </div>
                                                                                        </p>
                                                                                    </div>
                                                                                </li>

                                                                                @if($i == count($recentlyPosts) - 1)
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif


                                                            <?php $i++; ?>

                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top: 10px" class="wpb_column col-md-6 col-sm-12">
                                                <div class="category-element-holder style2">
                                                    <div class="widget-head widget-head-46">
                                                        <strong class="widget-title">داغ ترین ها</strong>
                                                        <div class="widget-head-bar"></div>
                                                        <div class="widget-head-line"></div>
                                                    </div>
                                                    <div class="row">

                                                        <?php $i = 0; ?>
                                                        @foreach($favoritePosts as $post)
                                                            @if($i == 0)
                                                                <article
                                                                        class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                                                    <div class="im-entry-thumb">

                                                                        <a class="im-entry-thumb-link"
                                                                           href="{{route('gardeshnameInner', ['postId' => $post->id])}}"
                                                                           title="{{$post->title}}">

                                                                            <img class="lazy-img"
                                                                                 data-src="{{$post->pic}}"
                                                                                 alt="{{$post->alt}}"/>
                                                                        </a>
                                                                        <header class="im-entry-header">
                                                                            <div class="im-entry-category">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="cat-links im-meta-item">
                                                                                        <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;"
                                                                                           href=""
                                                                                           title="{{$post->category}}">{{$post->category}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="im-entry-title">
                                                                                <a style="color: {{$post->color}} !important;"
                                                                                   href=""
                                                                                   rel="bookmark">{{$post->title}}</a>
                                                                            </h3>
                                                                        </header>
                                                                    </div>

                                                                    <div class="im-entry">
                                                                        <div class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>


                                                                            <div class="comments-link im-meta-item">
                                                                                <a href=""><i
                                                                                            class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                                </a>
                                                                            </div>

                                                                            <div class="author vcard im-meta-item">
                                                                                <a class="url fn n">
                                                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                                                </a>
                                                                            </div>

                                                                            <div class="post-views im-meta-item">
                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            @else

                                                                @if($i == 1)
                                                                    <div class="col-md-12">
                                                                        <div class="widget">
                                                                            <ul>
                                                                                @endif

                                                                                <li class="widget-10104 im-widget clearfix">
                                                                                    <figure class="im-widget-thumb">
                                                                                        <a href=""
                                                                                           title="{{$post->title}}">
                                                                                            <img src="{{$post->pic}}"
                                                                                                 alt="{{$post->alt}}"/>
                                                                                        </a>
                                                                                    </figure>
                                                                                    <div class="im-widget-entry">
                                                                                        <header class="im-widget-entry-header">
                                                                                            <h4 class='im-widget-entry-title'>
                                                                                                <a style="color: {{$post->color}} !important;"
                                                                                                   href=''
                                                                                                   title='{{$post->title}}'>{{$post->title}}</a>
                                                                                            </h4>
                                                                                        </header>
                                                                                        <p class="im-widget-entry-footer">
                                                                                        <div class="iranomag-meta clearfix">
                                                                                            <div class="posted-on im-meta-item">
                                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                                            </div>
                                                                                            <div class="post-views im-meta-item">
                                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                                            </div>
                                                                                        </div>
                                                                                        </p>
                                                                                    </div>
                                                                                </li>

                                                                                @if($i == count($favoritePosts) - 1)
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif


                                                            <?php $i++; ?>

                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                <aside class="gap cf" style="height:30px;"></aside>
                                                <div class="widget-head light">
                                                    <strong class="widget-title">همه مطالب</strong>
                                                    <div class="widget-head-bar"></div>
                                                    <div class="widget-head-line"></div>
                                                </div>
                                                <div class="row im-blog">
                                                    <div class="clearfix">

                                                        @foreach($allPosts as $post)

                                                            <div class="small-12 columns">

                                                                <article
                                                                        class="im-article content-column clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                                                                    <div class="im-entry-thumb col-md-5 col-sm-12">

                                                                        <a style="width: 303px !important;"
                                                                           class="im-entry-thumb-link"
                                                                           href="{{route('gardeshnameInner', ['postId' => $post->id])}}"
                                                                           title="{{$post->title}}">

                                                                            <img style="width: 303px !important; height: 189px !important;"
                                                                                 class="lazy-img"
                                                                                 data-src="{{$post->pic}}"
                                                                                 alt="{{$post->alt}}"/>
                                                                        </a>
                                                                    </div>

                                                                    <div class="im-entry col-md-7 col-sm-12">
                                                                        <header class="im-entry-header">
                                                                            <div class="im-entry-category">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="cat-links im-meta-item">
                                                                                        <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;"
                                                                                           href=""
                                                                                           title="{{$post->category}}">{{$post->category}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="im-entry-title">
                                                                                <a style="color: {{$post->color}}"
                                                                                   href=""
                                                                                   rel="bookmark">{{$post->title}}</a>
                                                                            </h3>
                                                                        </header>

                                                                        <div style="max-height: 100px !important; overflow: hidden"
                                                                             class="im-entry-content">
                                                                            <p>{{$post->description}}</p>
                                                                        </div>

                                                                        <div style="margin-top: 7px"
                                                                             class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>
                                                                            <div class="comments-link im-meta-item">

                                                                                <a href="">
                                                                                    <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                                </a>
                                                                            </div>
                                                                            <div class="author vcard im-meta-item">
                                                                                <a class="url fn n">
                                                                                    <i class="fa fa-user"></i>{{$post->username}}

                                                                                </a>
                                                                            </div>
                                                                            <div class="post-views im-meta-item">
                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="clearfix">
                                                        <nav class="navigation pagination">
                                                            <div class="nav-links">
                                                                <?php $beforeMore = false; $afterMore = false; ?>
                                                                @for($i = 1; $i <= $pageLimit; $i++)
                                                                    @if($page == $i)
                                                                        <span aria-current='page'
                                                                              class='page-numbers current'>{{$i}}</span>
                                                                    @elseif(abs($i - $page) <= 2)
                                                                        <a class='page-numbers'
                                                                           href='{{route('gardeshname', ['page' => $i])}}'>{{$i}}</a>
                                                                    @elseif($i == 1)
                                                                        <a class='page-numbers'
                                                                           href='{{route('gardeshname', ['page' => $i])}}'>{{$i}}</a>
                                                                    @elseif(!$beforeMore && $i < $page)
                                                                        <?php $beforeMore = true; ?>
                                                                        <span class="page-numbers dots">&hellip;</span>

                                                                    @elseif($i == $pageLimit)
                                                                        <a class='page-numbers'
                                                                           href='{{route('gardeshname', ['page' => $i])}}'>{{$i}}</a>
                                                                    @elseif(!$afterMore && $i > $page)
                                                                        <?php $afterMore = true; ?>
                                                                        <span class="page-numbers dots">&hellip;</span>
                                                                    @endif
                                                                    {{--<a class='page-numbers' href='/page/3/'>۳</a>--}}
                                                                    {{--<a class='page-numbers' href='/page/318/'>۳۱۸</a>--}}
                                                                    {{--<a class="next page-numbers" href="/page/2/"><span>&larr;</span></a>--}}
                                                                @endfor
                                                            </div>
                                                        </nav>
                                                    </div>
                                                </div>
                                                <aside class="gap cf" style="height:30px;"></aside>
                                            </div>


                                            <aside class="gap cf" style="height:30px;"></aside>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div><!-- im-container -->

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
