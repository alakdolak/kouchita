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
                    <b class="formName">اطلاعات اختصاصی</b>
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

    <div id="tourDetailsMainForm2ndtStepMainDiv" class="Hotel_Review prodp13n_jfy_overflow_visible lightGreyBox">
        <form method="" action="">
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div>
                        <span id="mainTransportationTitleTourCreation">حمل و نقل اصلی</span></div>
                    <div>
                        <span id="mainTransportationHelpTourCreation">حمل و نقل اصلی مرتبط با انتقال مسافران از مبدأ به مقصد و بالعکس می‌باشد</span>
                    </div>
                    <div id="tourTransportationResponsibility">
                        <span>آیا حمل و نقل اصلی برعهده‌ی تور است؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="transportationDetailsMainBoxes">
                        <div class="transportationTitleBoxes" id="toTheDestinationTitleBox">
                            رفت
                        </div>
                        <div class="inputBox col-xs-4 transportationKindTourCreation">
                            <div class="inputBoxText">
                                <div>
                                    نوع وسیله
                                    <span>*</span>
                                </div>
                            </div>
                            <select class="inputBoxInput styled-select glyphicon glyphicon-arrow-down" type="text" placeholder="انتخاب کنید">

                            </select>
                        </div>
                        <div class="inputBox col-xs-5" id="">
                            <div class="inputBoxText">
                                <div>
                                    محل حرکت
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="فارسی">
                        </div>
                        <button class="transportationMapPinningTourCreation col-xs-2">نشانه‌گذاری بر روی نقشه</button>
                        <div class="inputBox col-xs-4 transportationStartTimeTourCreation" id="">
                            <div class="inputBoxText">
                                <div>
                                    ساعت حرکت
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="ساعت">
                            <input class="inputBoxInput" type="text" placeholder="دقیقه">
                        </div>
                        <div class="inputBox col-xs-7" id="">
                            <div class="inputBoxText">
                                <div>
                                    توضیحات تکمیلی
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="حداکثر 100 کاراکتر">
                        </div>
                        <div>
                            <span class="inboxHelpSubtitle">تاریخ رفت تاریخ شروع تور در نظر گرفته شود.</span>
                        </div>
                    </div>
                    <div class="transportationDetailsMainBoxes">
                        <div class="transportationTitleBoxes" id="fromTheDestinationTitleBox">
                            برگشت
                        </div>
                        <div class="inputBox col-xs-4 transportationKindTourCreation">
                            <div class="inputBoxText">
                                <div>
                                    نوع وسیله
                                    <span>*</span>
                                </div>
                            </div>
                            <select class="inputBoxInput" type="text" placeholder="انتخاب کنید">

                            </select>
                        </div>
                        <div class="inputBox col-xs-5" id="">
                            <div class="inputBoxText">
                                <div>
                                    محل حرکت
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="فارسی">
                        </div>
                        <button class="transportationMapPinningTourCreation col-xs-2">نشانه‌گذاری بر روی نقشه</button>
                        <div class="inputBox col-xs-4 transportationStartTimeTourCreation" id="">
                            <div class="inputBoxText">
                                <div>
                                    ساعت حرکت
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="ساعت">
                            <input class="inputBoxInput" type="text" placeholder="دقیقه">
                        </div>
                        <div class="inputBox col-xs-7" id="">
                            <div class="inputBoxText">
                                <div>
                                    توضیحات تکمیلی
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" placeholder="حداکثر 100 کاراکتر">
                        </div>
                        <div>
                            <span class="inboxHelpSubtitle">تاریخ برگشت تاریخ پایان تور در نظر گرفته شود.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        حمل و نقل فرعی
                    </div>
                    <div class="inboxHelpSubtitle">
                        حمل و نقل فرعی مرتبط با انتقال مسافران در داخل مقصد و در طول برگزاری تور می‌باشد.
                    </div>
                    <div class="inputBox col-xs-12 relative-position">
                        <div class="inputBoxText" id="mainClassificationOfTransportationLabel">
                            <div>
                                دسته‌بندی اصلی
                                <span>*</span>
                            </div>
                        </div>
                        <select class="inputBoxInput" type="text" placeholder="انتخاب کنید">

                        </select>
                        <div class="transportationKindChosenMainDiv">
                            <div class="transportationKindChosenOnes col-xs-2">
                                اتوبوس
                                <span class="glyphicon glyphicon-remove"></span>
                            </div>
                        </div>
                    </div>
                    <div class="inboxHelpSubtitle">
                        در صورت وجود بیشتر از یک وسیله همه‌ی آن‌ها را انتخاب نمایید.
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        <span>وعده‌ی غذایی</span>
                    </div>
                    <div class="tourFoodOfferQuestions">
                        <span>آیا در طول مدت تور وعده‌ی غذایی ارائه می‌شود؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="fullwidthDiv">
                        <div id="tourFoodMealTitleTourCreation" class="halfWidthDiv">
                            نوع وعده را انتخاب نمایید؟
                        </div>
                        <div id="tourFoodMealChoseTourCreation" class="halfWidthDiv">
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" id="c56" value="rate"/>
                                <label for="c56">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    صبحانه
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" id="c57" value="rate"/>
                                <label for="c57">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    ناهار
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" id="c58" value="rate"/>
                                <label for="c58">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    شام
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" id="c59" value="rate"/>
                                <label for="c59">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    میان‌وعده
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="tourFoodOfferQuestions">
                        <span>آیا وعده‌های غذایی تمام روزهای تور ارائه می‌شود و یا فقط در چند روز خاص قابل ارائه می‌باشد؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="tourFoodOfferQuestions">
                        <span>آیا وعده‌های غذایی نیازمند هزینه‌ی اضافی است؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="mg-tp-15">
                        اگر محل ارائه‌ی وعده‌ها مشخص است حتماً آن را وارد نمایید.
                    </div>
                    <div class="inboxHelpSubtitle">
                        ما مجموعه‌ی وسیعی از مزاکز ارائه‌ی غذا را در ردیتابیس خود داریم. با انتخاب گزینه‌ی به علاوه می‌توانید با جستجو در داخل آن‌ها مکان مورد نظر خود را انتخاب و به کاربران اطلاع دهید. تکمیل نمودن اطلاعات تأثیر به سزایی در توجه بیشتر کاربران دارد.
                    </div>
                    <div>
                        <div class="addTourPlacesTourCreation col-xs-4 inline-block">
                            <div class=" col-xs-5">
                                <div class="addTourPlacesPicTourCreation circleBase type2"></div>
                            </div>
                            <div class="addTourPlacesNameTourCreation col-xs-7">
                                <b>قنات دو طبقه مون</b>
                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating addTourPlacesRateTourCreation">
                                    <span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                    <span>2 نقد</span>
                                </div>
                                <div class="inline-block">
                                    استان: اصفهان
                                </div>
                            </div>
                        </div>
                        <div class="addTourPlacesTourCreation col-xs-4 inline-block">
                            <div class=" col-xs-5">
                                <div class="addTourPlacesPicTourCreation circleBase type2"></div>
                            </div>
                            <div class="addTourPlacesNameTourCreation col-xs-7">
                                <b>قنات دو طبقه مون</b>
                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating addTourPlacesRateTourCreation">
                                    <span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                    <span>2 نقد</span>
                                </div>
                                <div class="inline-block">
                                    استان: اصفهان
                                </div>
                            </div>
                        </div>
                        <div class="addTourPlacesTourCreation col-xs-4 inline-block">
                            <div class=" col-xs-5">
                                <div class="addTourPlacesPicTourCreation circleBase type2"></div>
                            </div>
                            <div class="addTourPlacesNameTourCreation col-xs-7">
                                <b>قنات دو طبقه مون</b>
                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating addTourPlacesRateTourCreation">
                                    <span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                    <span>2 نقد</span>
                                </div>
                                <div class="inline-block">
                                    استان: اصفهان
                                </div>
                            </div>
                        </div>
                        <div class="addTourPlacesTourCreation col-xs-4">
                            <div class=" col-xs-5">
                                <div class="addTourPlacesPicTourCreation circleBase type2"></div>
                            </div>
                            <div class="addTourPlacesNameTourCreation col-xs-7">
                                <b>قنات دو طبقه مون</b>
                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating addTourPlacesRateTourCreation">
                                    <span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                    <span>2 نقد</span>
                                </div>
                                <div class="inline-block">
                                    استان: اصفهان
                                </div>
                            </div>
                        </div>
                        <center class="addTourPlacesBtnDivTourCreation col-xs-4">
                            <div class="addTourPlacesBtnCreation circleBase type2">
                                <img src="{{"images/tourCreation/add.png"}}">
                                <div>اضافه کنید</div>
                            </div>
                        </center>
                    </div>
                    
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        <span>شهرهایی که می‌بینیم</span>
                    </div>
                    <div class="inboxHelpSubtitle">
                        شهرهایی که در طول تور در آن‌ها برنامه‌ای برای کاربران دارید انتخاب نمایید. توجه نمایید حداقل در این شهر می‌بایست یک برنامه مانند رویداد و یا بازدید داشته باشید. شهر مبدأ و مقصد را وارد نمایید.
                    </div>
                    <div>
                        <div class="addTourPlacesTourCreation col-xs-4 inline-block">
                            <div class=" col-xs-5">
                                <div class="addTourPlacesPicTourCreation circleBase type2"></div>
                            </div>
                            <div class="addTourPlacesNameTourCreation col-xs-7">
                                <b>قنات دو طبقه مون</b>
                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating addTourPlacesRateTourCreation">
                                    <span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                    <span>2 نقد</span>
                                </div>
                                <div class="inline-block">
                                    استان: اصفهان
                                </div>
                            </div>
                        </div>
                        <div class="addTourPlacesTourCreation col-xs-4 inline-block">
                            <div class=" col-xs-5">
                                <div class="addTourPlacesPicTourCreation circleBase type2"></div>
                            </div>
                            <div class="addTourPlacesNameTourCreation col-xs-7">
                                <b>قنات دو طبقه مون</b>
                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating addTourPlacesRateTourCreation">
                                    <span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                    <span>2 نقد</span>
                                </div>
                                <div class="inline-block">
                                    استان: اصفهان
                                </div>
                            </div>
                        </div>
                        <center class="addTourPlacesBtnDivTourCreation col-xs-4">
                            <div class="addTourPlacesBtnCreation circleBase type2">
                                <img src="{{"images/tourCreation/add.png"}}">
                                <div>اضافه کنید</div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        <span>جاذبه‌هایی که می‌بینیم</span>
                    </div>
                    <div class="inboxHelpSubtitle">
                        جاذبه‌هایی که در طول تور می‌بینیم را وارد نمایید تا کاربران با تور شما بیشتر آشنا شوند. برای بسیاری از کاربران جاذبه‌های مورد بازدید بسیار مهم است.
                    </div>
                    <div>
                        <div class="addTourPlacesTourCreation col-xs-4 inline-block">
                            <div class=" col-xs-5">
                                <div class="addTourPlacesPicTourCreation circleBase type2"></div>
                            </div>
                            <div class="addTourPlacesNameTourCreation col-xs-7">
                                <b>قنات دو طبقه مون</b>
                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating addTourPlacesRateTourCreation">
                                    <span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt='5 of 5 bubbles'></span>
                                    <span>2 نقد</span>
                                </div>
                                <div class="inline-block">
                                    استان: اصفهان
                                </div>
                            </div>
                        </div>
                        <center class="addTourPlacesBtnDivTourCreation col-xs-4">
                            <div class="addTourPlacesBtnCreation circleBase type2">
                                <img src="{{"images/tourCreation/add.png"}}">
                                <div>اضافه کنید</div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <button id="goToThirdStep" class="btn">گام بعدی</button>
            </div>
        </form>
    </div>

    <div class="popUpsSpecificInfoTourCreation">

    </div>

    @include('layouts.placeFooter')
</div>

</body>
</html>