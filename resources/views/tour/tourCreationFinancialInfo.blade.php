<?php $placeMode = "ticket";
$state = "تهران";
$kindPlaceId = 10; ?>
        <!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    @include('layouts.phonePopUp')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <title>صفحه اصلی</title>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/passStyle.css?v=1')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/tourCreation.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}"/>

    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>
</head>

<body id="BODY_BLOCK_JQUERY_REFLOW"
      class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic">

        <div class="atf_header_wrapper">
            <div class="atf_header ui_container is-mobile full_width">

                <div class="ppr_rup ppr_priv_location_detail_header relative-position">
                    <h1 id="HEADING" property="name">
                        <b class="tourCreationMainTitle">شما در حال ایجاد یک تور جدید هستید</b>
                    </h1>
                    <div class="tourAgencyLogo circleBase type2"></div>
                    <b class="tourAgencyName">آژانس ستاره طلایی</b>
                </div>
            </div>
        </div>

        <div class="atf_meta_and_photos_wrapper">
            <div class="atf_meta_and_photos ui_container is-mobile easyClear">
                <div class="prw_rup darkGreyBox tourDetailsMainFormHeading">
                    <b class="formName">اطلاعات مالی</b>
                    <div class="tourCreationStepInfo">
                        <span>
                            گام
                            <span>--</span>
                            از
                            <span>--</span>
                        </span>
                        <span>
                            آخرین ویرایش
                            <span>تاریخ</span>
                            <span>ساعت</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tourDetailsMainForm3rdtStepMainDiv" class="Hotel_Review prodp13n_jfy_overflow_visible lightGreyBox">
        <form method="" action="">
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        قیمت پایه
                    </div>
                    <div class="inboxHelpSubtitle">
                        قیمت پایه‌ی تور قیمتی است که فارغ از هرگونه امکانات اضافه بدست آمده است و کمترین قیمتی است که کاربران می‌توانند تور را با آن خریداری نمایند. اگر برخی امکانات و یا کیفیت اقامتگاه تور، قیمت تور را تغییر می‌دهد، آن‌ها را در قسمت‌های بعدی وارد نمایید.
                    </div>
                    <div class="tourBasicPriceTourCreation col-xs-6">
                        <div class="inputBox col-xs-10" id="">
                            <div class="inputBoxText">
                                <div>
                                    قیمت پایه
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="ریال">
                        </div>
                        <div id="tourInsuranceConfirmation" class="col-xs-10 pd-0">
                            <span>آیا تور شما دارای بیمه می‌باشد؟</span>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option1" autocomplete="off">خیر
                                </label>
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tourTicketKindTourCreation col-xs-6">
                        <div class="inputBox col-xs-10" id="">
                            <div class="inputBoxText">
                                <div>
                                    نوع بلیط
                                    <span>*</span>
                                </div>
                            </div>
                            <div class="select-side">
                                <i class="glyphicon glyphicon-triangle-bottom"></i>
                            </div>
                            <select class="inputBoxInput styled-select" type="text" placeholder="انتخاب کنید">
                            </select>
                        </div>
                        <div class="col-xs-10 pd-0">
                            <span class="inboxHelpSubtitleBlue">نیاز به راهنمایی دارید؟</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        اقامتگاه‌ها
                    </div>
                    <div class="inboxHelpSubtitle">
                        نحوه‌ی اسکان مسافران را در طول تور تعیین نمایید. اگر چند نوع اقامتگاه مدنظر دارید، همگی را وارد نموده و میزان تغییرات قیمت را با توجه به انتخاب آن‌ها ذکر کنید.
                    </div>
                    <div class="tourOccupationDetailsTourCreation mg-tp-15 col-xs-12">
                        <div class="col-xs-2">
                            <img src="">
                        </div>
                        <div class="col-xs-2 pd-0 mg-tp-20">
                            <b class="fullwidthDiv font-size-20">هتل آناهیتا</b>
                            <span class="tourOccupationGradeTitle">درجه هتل:</span>
                            <span class="tourOccupationGrade">پنج ستاره</span>
                        </div>
                        <div class="inputBox col-xs-3 mg-30-10" id="">
                            <div class="inputBoxText">
                                <div>
                                    نوع اتاق
                                    <span>*</span>
                                </div>
                            </div>
                            <div class="select-side">
                                <i class="glyphicon glyphicon-triangle-bottom"></i>
                            </div>
                            <select class="inputBoxInput styled-select" type="text" placeholder="انتخاب کنید">
                                <option>انتخاب کنید</option>
                            </select>
                        </div>
                        <div class="mg-tp-20 mg-rt-10 col-xs-3 pd-0">
                            <div class="inputBox full-width" id="">
                                <div class="inputBoxText">
                                    <div>
                                        قیمت
                                        <span>*</span>
                                    </div>
                                </div>
                                <input class="inputBoxInput" type="text" placeholder="ریال">
                            </div>
                            <div class="inboxHelpSubtitle">قیمت تور با احتساب این اقامتگاه</div>
                        </div>
                        <button class="tourOccupationDetailsBtn copyBtnTourCreation">
                            <img src="{{"images/tourCreation/copy.png"}}">
                        </button>
                        <button class="tourOccupationDetailsBtn deleteBtnTourCreation">
                            <img src="{{"images/tourCreation/delete.png"}}">
                        </button>
                    </div>

                    <center class="addTourPlacesBtnDivTourCreation pd-0 col-xs-4">
                        <div class="addTourPlacesBtnCreation circleBase type2">
                            <img src="{{"images/tourCreation/add.png"}}">
                            <div>اضافه کنید</div>
                        </div>
                    </center>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        <span>امکانات اضافه</span>
                    </div>
                    <div class="inboxHelpSubtitle">
                        سایر امکاناتی که شما در تور با دریافت هزینه‌ی اضافه ارئه می‌دهید را وارد نمایید.
                    </div>
                    <div class="inputBox float-right col-xs-2" id="">
                        <input class="inputBoxInput moreFacilityInputs" type="text" placeholder="نام">
                    </div>
                    <div class="inputBox float-right col-xs-3 mg-rt-10" id="">
                        <input class="inputBoxInput moreFacilityInputs" type="text" placeholder="توضیحات">
                    </div>
                    <div class="inputBox float-right col-xs-2 mg-rt-10" id="">
                        <div class="select-side">
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                        </div>
                        <select class="inputBoxInput moreFacilityInputs styled-select" type="text" placeholder="انتخاب کنید">
                            <option>هم‌گروهی</option>
                        </select>
                    </div>
                    <div class="inputBox float-right col-xs-3 mg-rt-10 relative-position" id="">
                        <input class="inputBoxInput moreFacilityInputs" type="text" placeholder="ریال">
                        <div class="inboxHelpSubtitle" id="subtitleMoreFacility">
                            میزان افزایش قیمت را وارد نمایید.
                        </div>
                    </div>
                    <button class="tourMoreFacilityDetailsBtn verifyBtnTourCreation">
                        <img src="{{"images/tourCreation/approve.png"}}">
                    </button>
                    <button class="tourMoreFacilityDetailsBtn deleteBtnTourCreation">
                        <img src="{{"images/tourCreation/delete.png"}}">
                    </button>
                    <div class="inboxHelpSubtitle">
                        امکاناتی را که امکان انتخاب همزمان آن‌ها موجود نمی‌باشد، در هم‌گروهی‌های یکسان قرار دهید.
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox tourCapacityNGOTours">
                    <div class="boxTitlesTourCreation">
                        <span>ظرفیت</span>
                    </div>
                    <div class="inputBox col-xs-3 float-right">
                        <div class="inputBoxText">
                            <div>
                                نوع تور
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="خصوصی">
                    </div>
                    <div class="col-xs-4 float-right">
                        <div class="inputBox col-xs-12">
                            <div class="inputBoxText">
                                <div>
                                    حداکثر تعداد افراد
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="تعداد">
                        </div>
                        <div class="inputBox col-xs-12">
                            <div class="inputBoxText">
                                <div>
                                    حداقل تعداد افراد
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="تعداد">
                        </div>
                    </div>
                    <div class="inputBox col-xs-5 float-right">
                        <div class="inputBoxText">
                            <div>
                                حداکثر تعداد گروه‌های همزمان
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="تعداد">
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        <span>ظرفیت</span>
                    </div>
                    <div class="inputBox col-xs-3 float-right">
                        <div class="inputBoxText">
                            <div>
                                نوع تور
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="گروهی">
                    </div>
                    <div class="col-xs-4 float-right">
                        <div class="inputBox col-xs-12">
                            <div class="inputBoxText">
                                <div>
                                    حداکثر ظرفیت
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="تعداد">
                        </div>
                    </div>
                    <div class="inputBox col-xs-4 float-right">
                        <div class="inputBoxText">
                            <div>
                                حداکثر ظرفیت
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="تعداد">
                    </div>
                    <div class="fullwidthDiv">
                        <input ng-model="sort" type="checkbox" id="c01" value="rate"/>
                        <label for="c01">
                            <span></span>
                        </label>
                        <span id="tourCapacityCheckbox">
                            با هر ظرفیتی تور برگزار می شود.
                        </span>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        <span>تخفیف خرید گروهی</span>
                    </div>
                    <div class="inboxHelpSubtitle">
                        تخفیف‌های گروهی به خریداران ظرفیت‌های بالا اعمال می‌شود. شما می‌توانید با تعیین بازه‌های متفاوت تخفیف‌های متفاوتی اعمال نمایید.
                    </div>
                    <div class="col-xs-12 pd-0">
                        <div class="inputBox discountLimitationWholesale float-right">
                            <div class="inputBoxText">
                                <div>
                                    بازه‌ی تخفیف
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="از">
                            <div class="inputBoxText">
                                <div>
                                    الی
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="تا">
                            <div class="inputBoxText">
                                <div>
                                    درصد تخفیف
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput border-noneImp" type="text" placeholder="عدد">
                        </div>
                        <div class="inline-block mg-tp-12 mg-rt-10">
                            <button class="wholesaleDiscountLimitationBtn verifyBtnTourCreation">
                                <img src="{{"images/tourCreation/approve.png"}}">
                            </button>
                            <button class="wholesaleDiscountLimitationBtn deleteBtnTourCreation">
                                <img src="{{"images/tourCreation/delete.png"}}">
                            </button>
                        </div>
                    </div>
                    <div class="fullwidthDiv specialDiscountBoxes">
                        <div class="boxTitlesTourCreation">
                            <span>تخفیف ویژه‌ی کودکان</span>
                        </div>
                        <div class="inboxHelpSubtitle">
                            تخفیف ویژه برای کودکان و نوجوانان (زیر 12 سال) از این قسمت تعریف می‌گردد.
                        </div>
                        <div class="inputBox col-xs-3 float-right">
                            <div class="inputBoxText">
                                <div>
                                    درصد تخفیف
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="تعداد">
                        </div>
                    </div>
                    <div class="fullwidthDiv specialDiscountBoxes">
                        <div class="boxTitlesTourCreation">
                            <span>تخفیف‌های مناسبتی و کد تخفیف</span>
                        </div>
                        <div class="inboxHelpSubtitle">
                            در صورت تعریف سیستم تخفیف زیر ، ما از زمان اعلامی شما به صورت خودکار تخفیف خرید در روزهای پایانی را اعمال می‌نماییم.
                        </div>
                        <div class="inputBox col-xs-3 float-right">
                            <div class="inputBoxText">
                                <div>
                                    درصد تخفیف
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="تعداد">
                        </div>
                        <div class="inputBox col-xs-3 mg-rt-10 float-right">
                            <div class="inputBoxText">
                                <div>
                                    زمان شروع
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="تعداد">
                        </div>
                    </div>
                    <div class="boxTitlesTourCreation">
                        <span>تخفیف‌های مناسبتی و کد تخفیف</span>
                    </div>
                    <div class="inboxHelpSubtitle">
                        در پنل کاربری قادر به تعریف تخفیف‌های مناسبتی خواهید بود. همچنین می‌توانید به تعداد مورد نیاز کد تخفیف با شرایط متفاوت ایجاد و به کاربران خاص خود هدیه دهید.
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <button id="goToFifthStep" class="btn nextStepBtnTourCreation">گام بعدی</button>
            </div>
        </form>
    </div>

    @include('layouts.placeFooter')
</div>

</body>
</html>