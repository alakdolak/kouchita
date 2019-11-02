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
                    <b class="formName">اطلاعات توضیحی</b>
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

    <div id="tourDetailsMainForm6thStepMainDiv" class="Hotel_Review prodp13n_jfy_overflow_visible lightGreyBox">
        <form method="" action="">
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        معرفی کلی
                    </div>
                    <div class="inboxHelpSubtitle">
                        در کمتر از 100 کلمه تور خود را به طور کلی توصیف کنید
                    </div>
                    <div class="inputBox fullwidthDiv height-150">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height" type="text" placeholder="متن خود را وارد کنید"></textarea>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        نکات کلیدی
                    </div>
                    <div class="inboxHelpSubtitle">
                        حداکثر چهار نکته را به عنوان نکات کلیدی و مزیت اصلی تور خود بیان کنید.
                    </div>
                    <div class="inputBox fullwidthDiv height-50 mg-5-0">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height line-height-3" type="text" placeholder="نکته‌ی اول - حداکثر 30 کلمه"></textarea>
                    </div>
                    <div class="inputBox fullwidthDiv height-50 mg-5-0">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height line-height-3" type="text" placeholder="نکته‌ی دوم - حداکثر 30 کلمه"></textarea>
                    </div>
                    <div class="inputBox fullwidthDiv height-50 mg-5-0">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height line-height-3" type="text" placeholder="نکته‌ی سوم - حداکثر 30 کلمه"></textarea>
                    </div>
                    <div class="inputBox fullwidthDiv height-50 mg-5-0">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height line-height-3" type="text" placeholder="نکته‌ی چهارم - حداکثر 30 کلمه"></textarea>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        چه انتظاری داشته باشیم
                    </div>
                    <div class="inboxHelpSubtitle">
                        به صورت کاملاً شفاف به مشتریان‌تان بگویید از توز شما چه انتظاری داشته باشند و با چه چیزی روبرو می‌شوند - حداکثر 50 کلمه
                    </div>
                    <div class="inputBox fullwidthDiv height-150">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height" type="text" placeholder="متن خود را وارد کنید"></textarea>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        اطلاعات اختصاصی
                    </div>
                    <div class="inboxHelpSubtitle">
                        هر نوع اطلاعاتی که مختص تور شماست و دوست دارید مشتریان‌تان آن را بدانند در حداکثر 150 کلمه وارد نمایید
                    </div>
                    <div class="inputBox fullwidthDiv height-150">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height" type="text" placeholder="متن خود را وارد کنید"></textarea>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        پیشنهادات شما برای سفر بهتر
                    </div>
                    <div class="inboxHelpSubtitle">
                        هرنوع پیشنهاد، پیش‌نیاز، درخواست و یا مطلب اضافه‌ای که در صورت رعایت از سوی مشتران شما می‌تواندتضمین‌کننده‌ی تجربه‌ی بهتری باشد را وارد نمایید
                    </div>
                    <div class="inputBox fullwidthDiv height-150">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height" type="text" placeholder="متن خود را وارد کنید"></textarea>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        محدودیت‌های سفر
                    </div>
                    <div class="inboxHelpSubtitle">
                        هر نوع محدودیت که مشتریان شما در طول تور با ان مواجه می‌شوند و مجبور به رعایت آن می‌باشند را وارد نمایید
                    </div>
                    <div class="inputBox fullwidthDiv height-150">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height" type="text" placeholder="متن خود را وارد کنید"></textarea>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        چه همراه داشته باشیم
                    </div>
                    <div class="inboxHelpSubtitle">
                        به مشتریان‌تان کمک کنید تا بدانند چه چیزی همراه داشته باشند. موارد ضروری مواردی است که حتماً باید همراه باشد و موارد پیشنهادی به تجربه‌‌ی بهتر کمک می‌کند.
                    </div>
                    <div class="inboxHelpSubtitle">
                        ما لیست تمام موارد پیش‌بینی شده را در دسته‌بندی‌های مختلف آماده گرده‌ایم و شما تنها می‌بایست گزینه‌ی مورد نظر خود را گرفته و به داخل باکس مورد نظر خود بکشید.
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">خودرو شخصی</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">غذا</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">لوازم</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">تجهیزات الکترونیکی</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">کودک</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">کمک های اولیه</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">مدارک</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">کمپ</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">گرما</a>
                                </h4>
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">سرما</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="draghere">جعبه ی آچار</div>
                                    <div class="draghere">تسمه ی دینام</div>
                                    <div class="draghere">لاستیک زاپاس</div>
                                    <div class="draghere">جک و آچار چرخ</div>
                                    <div class="draghere">پمپ باد</div>
                                    <div class="draghere">کپسول اطفای حریق</div>
                                </div>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="draghere">جعبه ی آچار</div>
                                    <div class="draghere">لاستیک زاپاس</div>
                                    <div class="draghere">جک و آچار چرخ</div>
                                    <div class="draghere">پمپ باد</div>
                                    <div class="draghere">گپسول اطفای حریق</div>
                                </div>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="draghere">جعبه ی آچار</div>
                                    <div class="draghere">تسمه ی دینام</div>
                                    <div class="draghere">جک و آچار چرخ</div>
                                    <div class="draghere">پمپ باد</div>
                                    <div class="draghere">گپسول اطفای حریق</div>
                                </div>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="draghere">جعبه ی آچار</div>
                                    <div class="draghere">تسمه ی دینام</div>
                                    <div class="draghere">لاستیک زاپاس</div>
                                    <div class="draghere">پمپ باد</div>
                                    <div class="draghere">گپسول اطفای حریق</div>
                                </div>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="draghere">جعبه ی آچار</div>
                                    <div class="draghere">تسمه ی دینام</div>
                                    <div class="draghere">لاستیک زاپاس</div>
                                    <div class="draghere">جک و آچار چرخ</div>
                                    <div class="draghere">گپسول اطفای حریق</div>
                                </div>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="draghere">جعبه ی آچار</div>
                                    <div class="draghere">تسمه ی دینام</div>
                                    <div class="draghere">لاستیک زاپاس</div>
                                    <div class="draghere">جک و آچار چرخ</div>
                                    <div class="draghere">پمپ باد</div>
                                </div>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div>تسمه ی دینام</div>
                                    <div>لاستیک زاپاس</div>
                                    <div>جک و آچار چرخ</div>
                                    <div>پمپ باد</div>
                                    <div>گپسول اطفای حریق</div>
                                </div>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div>لاستیک زاپاس</div>
                                    <div>جک و آچار چرخ</div>
                                    <div>پمپ باد</div>
                                    <div>گپسول اطفای حریق</div>
                                </div>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div>جعبه ی آچار</div>
                                    <div>تسمه ی دینام</div>
                                    <div>لاستیک زاپاس</div>
                                </div>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div>جعبه ی آچار</div>
                                    <div>تسمه ی دینام</div>
                                    <div>پمپ باد</div>
                                    <div>گپسول اطفای حریق</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="essentialItemsTourCreation" class="tourEquipmentItemsTourCreation">
                        <span class="fullwidthDiv mg-bt-10">
                            موارد ضروری
                        </span>
                        <div>
                            کپسول اطفای حریق
                        </div>
                        <div>
                            جعبه آچار
                        </div>
                    </div>
                    <div id="suggestionItemsTourCreation" class="tourEquipmentItemsTourCreation">
                        <span class="fullwidthDiv mg-bt-10">
                            موارد پیشنهادی
                        </span>
                        <div>
                            جعبه آچار
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox whiteBoxSpecificInfo">
                    <div class="boxTitlesTourCreation">
                        اگر عکسی دارید، آن را اضافه نمایید
                    </div>
                    <div class="inboxHelpSubtitle">
                        اگر از تورهای پیشین خود با همین موضوع عکسی دارید حتماً آن را با مشتریان خود به اشتراک بگذارید
                    </div>
                    <div class="fullwidthDiv">
                        <div class="imgUploadsTourCreation">
                            <img src="{{"images/estelahat.jpg"}}">
                            <button class="deleteBtnImgTourCreation">
                                <img src="{{"images/tourCreation/delete.png"}}">
                            </button>
                        </div>
                        <div class="imgUploadsTourCreation">
                            <img src="{{"images/estelahat.jpg"}}">
                            <button class="deleteBtnImgTourCreation">
                                <img src="{{"images/tourCreation/delete.png"}}">
                            </button>
                        </div>
                        <center class="imgUploadsTourCreation imgAddDivTourCreation">
                            <div class="fullwidthDiv">
                                <img src="{{"images/tourCreation/add.png"}}">
                            </div>
                            <b>اضافه کنید</b>
                        </center>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div class="boxTitlesTourCreation">
                        <span>شرایط کنسلی</span>
                    </div>
                    <div class="inboxHelpSubtitle">
                        شرایط کنسلی تور خود را به اطلاع مسافران خود برسانید.
                    </div>
                    <div class="tourGuiderQuestions mg-tp-15">
                        <span>آیا تور شما دارای کنسلی می‌باشد؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="inboxHelpSubtitle">
                        در این صورت یا شرایط آن را توضیح دهید و یا از ساختار پیش‌فرض استفاده نمایید و اگر ترجیح می‌دهید از هر دو.
                    </div>
                    <div class="inputBox cancellingSituationTourCreation height-250">
                        <textarea class="inputBoxInput fullwidthDiv text-align-right full-height" type="text" placeholder="متن خود را وارد کنید"></textarea>
                    </div>
                    <div class="cancellingSituationTourCreation optionalCancellingTourCreation">
                        <b class="fullwidthDiv mg-bt-5">عودت تمام هزینه</b>
                        <span class="mg-lt-6">کنسل نمودن قبل از</span>
                        <div class="inputBox deadlineText">
                            <input class="inputBoxInput" type="text" placeholder="عدد">
                        </div>
                        <div class="btn-group btn-group-toggle mg-lt-6" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">ساعت
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>روز
                            </label>
                        </div>
                        <span>مانده به شروع تور</span>
                    </div>
                    <div class="cancellingSituationTourCreation optionalCancellingTourCreation relative-position">
                        <div class="fullwidthDiv mg-bt-5">
                            <b class="inline-block">عودت بخشی از هزینه</b>
                            <span class="inline-block addingCancellingOption">در صورت نیاز اضافه کنید</span>
                        </div>
                        <span class="mg-lt-6">کنسل نمودن قبل از</span>
                        <div class="inputBox deadlineText">
                            <input class="inputBoxInput" type="text" placeholder="عدد">
                        </div>
                        <div class="btn-group btn-group-toggle mg-lt-6 mg-rt-6" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" autocomplete="off">ساعت
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option2" autocomplete="off" checked>روز
                            </label>
                        </div>
                        <span class="mg-lt-6">مانده به شروع تور</span>
                        <div class="inputBox deadlineText width-50">
                            <input class="inputBoxInput" type="text" placeholder="جریمه %">
                        </div>
                        <span class="glyphicon glyphicon-plus addOrRemoveCancellingOption"></span>
                        <span class="glyphicon glyphicon-minus addOrRemoveCancellingOption"></span>
                    </div>
                    <div class="cancellingSituationTourCreation optionalCancellingTourCreation mg-tp-30">
                        <div class="fullwidthDiv mg-bt-5">
                            <b class="inline-block">عدم عودت پول</b>
                            <span class="inline-block addingCancellingOption">یک یا چند گزینه</span>
                        </div>
                        <div class="fullwidthDiv">
                            <input ng-model="sort" type="checkbox" id="c01" value="rate"/>
                            <label for="c01">
                                <span></span>
                            </label>
                            <span id="">
                                پس از تهیه ی بلیط سفر
                            </span>
                        </div>
                        <div class="fullwidthDiv">
                            <input ng-model="sort" type="checkbox" id="c61" value="rate"/>
                            <label for="c61">
                                <span></span>
                            </label>
                            <span id="">
                                پس از اخذ ویزا
                            </span>
                        </div>
                        <div class="fullwidthDiv">
                            <input ng-model="sort" type="checkbox" id="c71" value="rate"/>
                            <label for="c71" class="float-right">
                                <span></span>
                            </label>
                            <span class="mg-lt-6 float-right">کنسل نمودن قبل از</span>
                            <div class="inputBox deadlineText float-right">
                                <input class="inputBoxInput" type="text" placeholder="عدد">
                            </div>
                            <div class="btn-group btn-group-toggle mg-lt-6 mg-rt-6" data-toggle="buttons">
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option1" autocomplete="off">ساعت
                                </label>
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option2" autocomplete="off" checked>روز
                                </label>
                            </div>
                            <span class="mg-lt-6">مانده به شروع تور</span>
                        </div>
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