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
                        نوع برگزاری
                    </div>
                    <div class="inboxHelpSubtitle">
                        کدام یک از موارد زیر در مورد تور شما صادق است؟
                    </div>
                    <div class="tourBasicKindTourCreation">
                        <span class="tourBasicKindsCheckbox pd-lt-3">
                            تور ما فقط برای یکبار برگزار می‌گردد.
                        </span>
                        <input ng-model="sort" type="checkbox" id="c51" value="rate"/>
                        <label for="c51">
                            <span></span>
                        </label>
                    </div>
                    <div class="tourBasicKindTourCreation tourBasicKindTourCreationBiggerOne">
                        <span class="tourBasicKindsCheckbox pd-tp-5">
                            تور ما با برنامه زمانی یکسان و منظم بیش از یکبار برگزار می‌گردد.
                        </span>
                        <input ng-model="sort" type="checkbox" id="c52" value="rate"/>
                        <label for="c52">
                            <span></span>
                        </label>
                    </div>
                    <div class="tourBasicKindTourCreation tourBasicKindTourCreationBiggerOne">
                        <span class="tourBasicKindsCheckbox pd-tp-5">
                            تور ما با برنامه‌ی زمانی نامنظم بیش از یک‌بار برگزار می‌گردد.
                        </span>
                        <input ng-model="sort" type="checkbox" id="c53" value="rate"/>
                        <label for="c53">
                            <span></span>
                        </label>
                    </div>
                    <div class="inboxHelpSubtitleBlue mg-tp-20">
                        نیاز به راهنمایی دارید؟
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        زمان برگزاری
                    </div>
                    <div class="inboxHelpSubtitle">
                        تاریخ شروع و پایان تور خود را وارد نمایید. توجه کنید که ما این امکان را برای شما فراهم آوردیم تا با تعریف یکباره‌ی تور بتوانید بارهم از آن کپی گرفته و سریعتر تور خود را تعریف نمایید.
                    </div>
                    <div class="inputBox col-xs-3 float-right">
                        <div class="inputBoxText">
                            <div>
                                تاریخ شروع
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side calendarIconTourCreation">
                            <i class="ui_icon calendar calendarIcon"></i>
                        </div>
                        <input class="inputBoxInput" type="text">
                    </div>
                    <div class="inputBox col-xs-3 mg-rt-10 float-right">
                        <div class="inputBoxText">
                            <div>
                                تاریخ پایان
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side calendarIconTourCreation">
                            <i class="ui_icon calendar calendarIcon"></i>
                        </div>
                        <input class="inputBoxInput" type="text">
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        زمان برگزاری
                    </div>
                    <div class="inboxHelpSubtitle">
                        تاریخ شروع و پایان تور خود را وارد نمایید. توجه کنید که ما این امکان را برای شما فراهم آوردیم تا با تعریف یکباره‌ی تور بتوانید بارهم از آن کپی گرفته و سریعتر تور خود را تعریف نمایید.
                    </div>
                    <div class="inputBox col-xs-3 float-right">
                        <div class="inputBoxText">
                            <div>
                                تاریخ شروع
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side calendarIconTourCreation">
                            <i class="ui_icon calendar calendarIcon"></i>
                        </div>
                        <input class="inputBoxInput" type="text">
                    </div>
                    <div class="inputBox col-xs-3 mg-rt-10 float-right">
                        <div class="inputBoxText">
                            <div>
                                تاریخ پایان
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side calendarIconTourCreation">
                            <i class="ui_icon calendar calendarIcon"></i>
                        </div>
                        <input class="inputBoxInput" type="text">
                    </div>
                    <div class="inboxHelpSubtitle">
                        روز شروع تور در هفته و مدت آن ثابت فرض می‌گردد و شما تنها می‌بایست دوره‌ی تکرار را برای تور مشخص کنید.
                    </div>
                    <div class="inputBox float-right col-xs-3" id="">
                        <div class="inputBoxText">
                            <div>
                                دوره‌ی تکرار
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
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox tourCapacityNGOTours">
                    <div class="boxTitlesTourCreation">
                        زمان برگزاری
                    </div>
                    <div class="inboxHelpSubtitle">
                        تاریخ شروع و پایان تور خود را وارد نمایید. توجه کنید که ما این امکان را برای شما فراهم آوردیم تا با تعریف یکباره‌ی تور بتوانید بارهم از آن کپی گرفته و سریعتر تور خود را تعریف نمایید.
                    </div>
                    <div class="tourNthOccurrence">1</div>
                    <div class="inputBox col-xs-3 float-right">
                        <div class="inputBoxText">
                            <div>
                                تاریخ شروع
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side calendarIconTourCreation">
                            <i class="ui_icon calendar calendarIcon"></i>
                        </div>
                        <input class="inputBoxInput" type="text">
                    </div>
                    <div class="inputBox col-xs-3 mg-rt-10 float-right">
                        <div class="inputBoxText">
                            <div>
                                تاریخ پایان
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side calendarIconTourCreation">
                            <i class="ui_icon calendar calendarIcon"></i>
                        </div>
                        <input class="inputBoxInput" type="text">
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
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        زبان تور
                    </div>
                    <div class="inboxHelpSubtitle">
                        آیا تور شما به غیر از زبان فارسی، از زبان دیگری پشتیبانی می‌کند.
                    </div>
                    <div class="inputBox col-xs-12 relative-position">
                        <div class="inputBoxText width-130">
                            <div>
                                زبان‌های دیگر
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side">
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                        </div>
                        <select class="inputBoxInput styled-select text-align-right width-84per" type="text" placeholder="انتخاب کنید">
                            <option>انتخاب کنید</option>
                            <option>عربی</option>
                            <option>ترکی</option>
                        </select>
                        <div class="transportationKindChosenMainDiv">
                            <div class="transportationKindChosenOnes col-xs-2">
                                انگلیسی
                                <span class="glyphicon glyphicon-remove"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        <span>راهنمای تور</span>
                    </div>
                    <div class="inboxHelpSubtitle">
                        نام راهنمای تور خود را وارد نمایید. این امر نقش مؤثری در اطمینان خاطر کاربران خواهد داشت.
                    </div>
                    <div class="tourGuiderQuestions mg-tp-15">
                        <span>آیا تور شما راهنما دارد؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="tourGuiderQuestions mg-tp-15">
                        <span>آیا راهنمای تور شما از افراد محلی آن منطقه است؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="tourGuiderQuestions mg-tp-15">
                        <span>آیا راهنمای تور شما تجربه‌ی خصوصی برای افراد فراهم می‌آورد؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="inboxHelpSubtitle mg-tp-5">
                        برخی از راهنمایان تور صرفاً گروه را هدایت می‌کنند اما برخی همراه با گردشگران در همه جا حضور می‌یابند و تجربه‌ی اختصاصی‌تری ایجاد می‌کنند.
                    </div>
                    <div class="tourGuiderQuestions mg-tp-15">
                        <span>آیا راهنمای تور شما هم اکنون مشخص است؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="tourGuiderQuestions mg-tp-15">
                        <span>آیا راهنمای تور شما دارای حساب کاربری کوچیتا می‌باشد؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="inboxHelpSubtitle mg-tp-5">
                        به راهنمای تور خدا توصیه کنید تا حساب خود را در کوچیتا ایجاد نماید و از مزایای آن بهره‌مند شود. برای ما راهنمایان تور دارای حساب کاربری از اهمیت بیشتری برخوردار هستند. پس از باز کردن حساب کاربری راهنمای تور شما می‌تواند با وارد کردن کد تور و پس از تأیید شما نام خود را به صفحه‌ی کاربریش اتصال دهد.
                    </div>
                    <div class="inputBox float-right col-xs-3">
                        <div class="inputBoxText">
                            <div>
                                نام
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="فارسی">
                    </div>
                    <div class="inputBox float-right col-xs-4 mg-rt-50">
                        <div class="inputBoxText">
                            <div>
                                نام خانوادگی
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="فارسی">
                    </div>
                    <div class="inputBox float-right col-xs-2 mg-rt-50">
                        <div class="inputBoxText width-45per">
                            <div>
                                جنسیت
                                <span>*</span>
                            </div>
                        </div>
                        <div class="select-side">
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                        </div>
                        <select class="inputBoxInput width-50per styled-select" type="text" placeholder="انتخاب کنید">
                            <option>زن</option>
                            <option>مرد</option>
                        </select>
                    </div>
                    <div class="inboxHelpSubtitle mg-tp-5">
                        درخواست شما برای کاربر مورد نظر ارسال می‌شود و پس از تأیید او نام او به عنوان راهنمای تور معرفی می‌گردد.
                    </div>
                    <div class="inputBox float-right col-xs-3">
                        <div class="inputBoxText">
                            <div>
                                نام
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="فارسی">
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        <span>تلفن پشتیبانی</span>
                    </div>
                    <div class="tourGuiderQuestions mg-tp-15">
                        <span>آیا از شماره‌ی موجود در پروفایل خود استفاده می‌کنید؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="inputBox float-right col-xs-3">
                        <div class="inputBoxText">
                            <div>
                                تلفن
                                <span>*</span>
                            </div>
                        </div>
                        <input class="inputBoxInput" type="text" placeholder="09XXXXXXXXX">
                    </div>
                    <div class="inboxHelpSubtitle">
                        شماره را همانگونه که با موبایل خود تماس می‌گیرید وارد نمایید. در صورت وجود بیش از یک شماره با استفاده از، شماره‌ها را جدا نمایید.
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <button id="goToSixthStep" class="btn nextStepBtnTourCreation">گام بعدی</button>
            </div>
        </form>
    </div>

    <div class="popUpsSpecificInfoTourCreation">

    </div>

    @include('layouts.placeFooter')
</div>

</body>
</html>