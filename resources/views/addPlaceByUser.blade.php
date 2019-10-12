@extends('layouts.bodyPlace')

<?php $place = \App\models\Hotel::first(); $placeMode = "sad"; $state = "dsa"; ?>

@section('header')
    @parent
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}' />
@stop

@section('main')
    <style>
        .bodyStyle {
            width: 100%;
            height: 95vh;
            background-color: white;
            direction: rtl;
            position: relative;
        }
        .box {
            position: absolute;
            width: 50%;
            height: auto;
            border: 2px solid #4DC7BC;
            left: 50%;
            top: 25%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            box-shadow: 0px 0px 30px #e0e0e0;
        }
        .headerOfBox {
            background-color: #4DC7BC;
            color: white;
            padding: 8px 10px;
            font-size: 2em;
            border-radius: 5px 5px 0 0;
        }
        .bodyOfBox {
            height: 70px;
            padding: 5px 20px 0;
            position: relative;
        }
        .stepTitle {
            font-size: 1.25em;
            font-weight: 600;
        }
        .boxNotice {
            width: 75%;
            position: absolute;
            bottom: 0;
            color: #963019;
        }
        .stepNotice {
            font-size: 0.88em;
            color: #963019;
        }
        .bodyOfSteps {
            position: absolute;
            margin: 0 2%;
            width: 96%;
            box-shadow: 0px 0px 30px #e0e0e0;
            padding: 3%;
        }
        .footerOfBox {
            height: 45px;
            margin: 5px 20px 25px;
            padding-top: 10px;
            border-top: 1px solid #4DC7BC;
        }
        .btn:hover,.btn:active {
            color: white;
            opacity: 0.8;
            border-radius: 5px;
        }
        .btn:focus {
            color: white;
            border-radius: 5px;
        }
        .boxNextBtn {
            background: #4DC7BC;
            border-color: #4DC7BC;
            float: left;
            color: white;
        }
        .boxPreviousBtn {
            background: #963019;
            border-color: #963019;
            float: right;
            color: white;
        }
        .steps {
            position: absolute;
            border-radius: 50%;
            background-color: #E5E5E5;
        }
        .bigCircle {
            width: 25px;
            height: 25px;
        }
        .middleCircle {
            width: 17px;
            height: 17px;
            margin: 4px;
            z-index: 10;
            background-color: #ffffff;
        }
        .littleCircle {
            width: 9px;
            height: 9px;
            margin: 8px;
            z-index: 100;
        }
        .completeStep {
            background-color: #4DC7BC;
        }
        .categories {
            margin: 1px;
            padding: 10px 0;
            width: 12%;
            display: inline-block;
            border: 1.5px solid #e5e5e5;
            border-radius: 6px;
            cursor: pointer;
        }
        .categories:hover {
            border: 1.5px solid #30b4a6;
        }
        .selectCategory {
            padding: 0px 10px;
            width: 20%;
            border: 1.5px solid #e5e5e5;
            border-radius: 6px;
            position: absolute;
            left: 20px;
            top: 8%;
        }
        .nameOfSelectCategory {
            position: absolute;
            left: 6%;
            top: 30%;
            font-weight: 500;
        }
        .iconsOfCategories {
            font-size: 40px;
            direction: rtl;
            margin: 4% 1%;
            line-height: 40px;
            color: black;
            cursor: pointer;
        }
        .iconOfSelectCategory {
            font-size: 30px;
            margin: 0;
            line-height: 40px;
            color: black;
            cursor: default;
        }
        .stepInputBox {
            width: 40%;
            display: inline-block;
            padding: 2px 7px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            background-color: #ebebeb;
            line-height: 30px;
            margin: 10px 0;
        }
        .stepInputBoxText {
            padding-left: 15px;
            border-left: 1px solid #d8d8d8;
            display: inline-block;
        }
        .stepInputBoxInput {
            width: 80%;
            padding-left: 3%;
            text-align: center;
            border: none;
            float: left;
            background-color: transparent;
        }
        .stepInputBoxRequired {
            display: inline-block;
            position: relative
        }
        .stepInputIconRequired {
            font-size: 0.5em;
            color: #92321b;
            position: absolute;
            top: -5px;
            left: -10px;
        }
        .addresText{
            width: 100%;
            height: 110px;
            resize: none;
            border-radius: 5px;
            background-color: #EEEEEE;
            padding: 8px;
            margin: 12px 0 0;
        }
        #stepName {
            color: #4dc7bc;
            font-size: 1.5em;
            position: absolute;
            left: 47%;
            margin: 6px;
            transform: translate(-50%);
        }
        #map {
            height:150px;
            border: 1px solid #4DC7BC;
            border-radius: 5px;
            padding: 10px;
        }
        .mapBtn {
            background: #4DC7BC;
            border-color: #4DC7BC;
            color: white;
            width: 100%;
            margin: 10px 0;
        }
        .listItem {
            padding: 10px 0px;
            border-bottom: 1px solid #cccccc;
        }
        .subListItem {
            display: inline-block;
            width: 80%;
        }
        .detailListItem {
            width: 24%;
            display: inline-block;
        }
        .step5Title {
            display: inline-block;
            width: 20%;
            float: right;
            font-weight: 500;
        }
        .step5Description {
            font-weight: 500;
            margin: 5px 0;
        }
        .step5NewPlace {
            margin: 5px 10px;
            display: inline-block;
            width: 100%;
        }
        .step5AddPlace {
            background: #4DC7BC;
            border-color: #4DC7BC;
            color: white;
            margin: 0 5px;
        }
        .step5RemovePlace {
            background: #963019;
            border-color: #963019;
            color: white;
        }

    </style>

    <style>
        input[type="checkbox"] + label span {
             margin: 0 !important;
        }
    </style>

    <div class="bodyStyle">
        <div class="box">
                <div class="headerOfBox">شما در حال ایجاد یک مقصد جدید هستید...</div>
                <div class="step0 bodyOfBox stepTitle"> از اینکه اطلاعات خود را با ما در میان می گذارید سپاس گذاریم. لطفا در چند قدم ساده، به پرسش های ما پاسخ دهید. </div>
                <div class="step1 bodyOfBox hidden">
                    <div class="stepTitle">لطفا دسته مناسب را با توجه به مقصد خود انتخاب کنید.</div>
                    <div class="boxNotice">اگر ارایه دهنده خدمت هستید از این قسمت برای تعریف تجارت خو استفاده کنید.</div>
                </div>
                <div class="step2 bodyOfBox hidden">
                    <div class="stepTitle">لطفا اطلاعات پایه را وارد نمایید.</div>
                    <div class="boxNotice">وارد نمودن اطلاعات ستاره دار اجباری است.</div>
                    <div class="selectCategory">
                        <div class="icons iconOfSelectCategory hotel"></div>
                        <div class="nameOfSelectCategory">مراکز اقامتی</div>
                    </div>
                </div>
                <div class="step3 bodyOfBox hidden">
                    <div class="stepTitle">لطفا آدرس دسترسی به مقصد را وارد نمایید.</div>
                    <div class="boxNotice">آدرس را به گونه ای وارد نمایید تا دوستانتان بتوانند به راحتی به مقصد برسند. در صورت نیاز از کلمات توصیفی استفاده نمایید. نیازی به وارد کردن مجدد نام استان و شهر نمی باشد مگر آنکه در توصیف راه های دسترسی ضروری باشد.</div>
                    <div class="selectCategory">
                        <div class="icons iconOfSelectCategory hotel"></div>
                        <div class="nameOfSelectCategory">مراکز اقامتی</div>
                    </div>
                </div>
                <div class="step4 bodyOfBox hidden">
                    <div class="stepTitle">لطفا موقعیت مقصد را بر روی نقشه مشخص نمایید</div>
                    <div class="boxNotice">اگر مختصات مقصد را می دانید آن را مستقیما وارد نمایید. در غیر این صورت موقعیت آن را بر روی نقشه مشخص نمایید</div>
                    <div class="selectCategory">
                        <div class="icons iconOfSelectCategory hotel"></div>
                        <div class="nameOfSelectCategory">مراکز اقامتی</div>
                    </div>
                </div>
                <div class="step5 bodyOfBox hidden">
                    <div class="stepTitle">مهم ترین بخش ، توصیف مقصد است</div>
                    <div class="boxNotice">از بین گزینه های زیر، مواردی را که مقصد را توصیف می نماید اضافه کنید. این لیست با کمک شما تکمیل می شود پس اگر مورد یا مواردی بود که ما آن را لحاظ نکرده بودیم حتما آن را وارد کنید. سپاسگذاریم.</div>
                    <div class="selectCategory">
                        <div class="icons iconOfSelectCategory hotel"></div>
                        <div class="nameOfSelectCategory">مراکز اقامتی</div>
                    </div>
                </div>
                <div class="step6 bodyOfBox hidden">
                    <div class="stepTitle"> اگر عکسی از محل مورد نظر دارید حتما بارگذاری نمایید تا دوستانتان و بقیه ببینند و با آن مکان آشنا شوند. </div>
                    <div class="selectCategory">
                        <div class="icons iconOfSelectCategory hotel"></div>
                        <div class="nameOfSelectCategory">مراکز اقامتی</div>
                    </div>
                </div>
                <div class="step7 bodyOfBox hidden">
                    <div class="stepTitle">
                        مکان شما ثبت گردید. پس از بررسی ما برای تمامی کاربران ارسال می گردد و به رأی گیری گذاشته می شود.
                        <a href="#" style="font-size: 0.6em; position: absolute; color: #4dc7bc !important;">(قوانین رأی گیری)</a>
                        <br>
                        امیدواریم به زودی شاهد درج آن در صفحات فرد باشیم.

                    </div>
                </div>
                <div class="footerOfBox">
                    <div style="position: relative; width: 25%; top: 15%; margin: 0px 60% 0 0;">

                        <div data-val="1" class="steps bigCircle hidden" style="right: 0%"></div>
                        <div data-val="1" class="steps middleCircle hidden" style="right: 0%"></div>
                        <div data-val="1" class="steps littleCircle hidden" style="right: 0%"></div>

                        <div data-val="2" class="steps bigCircle hidden" style="right: 20%"></div>
                        <div data-val="2" class="steps middleCircle hidden" style="right: 20%"></div>
                        <div data-val="2" class="steps littleCircle hidden" style="right: 20%"></div>

                        <div data-val="3" class="steps bigCircle hidden" style="right: 40%"></div>
                        <div data-val="3" class="steps middleCircle hidden" style="right: 40%"></div>
                        <div data-val="3" class="steps littleCircle hidden" style="right: 40%"></div>

                        <div data-val="4" class="steps bigCircle hidden" style="right: 60%"></div>
                        <div data-val="4" class="steps middleCircle hidden" style="right: 60%"></div>
                        <div data-val="4" class="steps littleCircle hidden" style="right: 60%"></div>

                        <div data-val="5" class="steps bigCircle hidden" style="right: 80%"></div>
                        <div data-val="5" class="steps middleCircle hidden" style="right: 80%"></div>
                        <div data-val="5" class="steps littleCircle hidden" style="right: 80%"></div>

                        <div data-val="6" class="steps bigCircle hidden" style="right: 100%"></div>
                        <div data-val="6" class="steps middleCircle hidden" style="right: 100%"></div>
                        <div data-val="6" class="steps littleCircle hidden" style="right: 100%"></div>

                    </div>
                    <button class="btn boxNextBtn" type="button" id="nextStep" onclick="changeSteps(1)">شروع</button>
                    <div class="hidden" id="stepName">گام اول</div>
                    <button class="btn boxPreviousBtn" type="button" id="previousStep" onclick="changeSteps(-1)">بازگشت</button>
                </div>
                <div class="step1 bodyOfSteps hidden">
                    <div style="text-align: center">
                        <div class="categories" onclick="selectCategoriesColor(this);">
                            <div class="icons iconsOfCategories hotel"></div>
                            <div>مراکز اقامتی</div>
                        </div>
                        <div class="categories" onclick="selectCategoriesColor(this);">
                            <div class="icons iconsOfCategories atraction"></div>
                            <div>جاذبه</div>
                        </div>
                        <div class="categories" onclick="selectCategoriesColor(this);">
                            <div class="icons iconsOfCategories soghat"></div>
                            <div>سوغات</div>
                        </div>
                        <div class="categories" onclick="selectCategoriesColor(this);">
                            <div class="icons iconsOfCategories sanaye"></div>
                            <div>صنایع دستی</div>
                        </div>
                        <div class="categories" onclick="selectCategoriesColor(this);">
                            <div class="icons iconsOfCategories lebas"></div>
                            <div>لباس محلی</div>
                        </div>
                        <div class="categories" onclick="selectCategoriesColor(this);">
                            <div class="icons iconsOfCategories restaurant"></div>
                            <div>رستوران</div>
                        </div>
                        <div class="categories" onclick="selectCategoriesColor(this);">
                            <div class="icons iconsOfCategories ghazamahali"></div>
                            <div>غذای محلی</div>
                        </div>
                    </div>
                </div>
                <div class="step2 bodyOfSteps hidden">
                    <div class="stepInputBox" style="width: 100% !important;">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired"><div class="icons stepInputIconRequired redStar"></div>دسته بندی اصلی</div>
                        </div>
                        <input class="stepInputBoxInput">
                    </div>
                    <div class="stepNotice">نزدیک ترین دسته را نسبت به مقصد خود انتخاب کنید. توجه نمایید انتخاب بیش از یک دسته موردی ندارد و در برخی موارد راهنمای بهتری برای سایرین خواهد بود</div>
                    <div class="stepInputBox" style="display: block">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired"><div class="icons stepInputIconRequired redStar"></div>نام</div>
                        </div>
                        <input class="stepInputBoxInput">
                    </div>
                    <div class="stepInputBox">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired"><div class="icons stepInputIconRequired redStar"></div>استان</div>
                        </div>
                        <input class="stepInputBoxInput">
                    </div>
                    <div class="stepInputBox" style="float: left">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired"><div class="icons stepInputIconRequired redStar"></div>شهر</div>
                        </div>
                        <input class="stepInputBoxInput">
                    </div>
                    <div class="stepNotice">ممکن است مقصد شما دقیق داخل شهر یا روستا نباشد.حتما نزدیک ترین شهر و یا روستای موجود در لیست ما را انتخاب کنید</div>
                    <div style="margin-top: 5px;">
                        <div style="display: inline-block">
                            <input onclick="filter()" id="21" type="checkbox">
                            <label for="21">
                                <span></span>
                            </label>
                        </div>
                        <div style="display: inline-block">با وجود توضیحات بالا مصد من یا به شهر خاصی تعلق نمی گیرد و یا شهر آن در لیست بالا موجود نیست</div>
                    </div>
                    <div class="stepInputBox">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired">تلفن</div>
                        </div>
                        <input class="stepInputBoxInput" type="tel">
                    </div>
                    <div class="stepNotice">شماره را همانگونه که با موبایل خود تماس می گیرید وارد نمایید. در صورت وجود بیش از یک شماره با استفاده از , شماره ها را جدا نمایید</div>
                    <div class="stepInputBox">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired">ایمیل</div>
                        </div>
                        <input class="stepInputBoxInput" type="email">
                    </div>
                    <div class="stepInputBox" style="float: left">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired">سایت</div>
                        </div>
                        <input class="stepInputBoxInput" type="url">
                    </div>
                </div>
                <div class="step3 bodyOfSteps hidden">
                    <textarea class="addresText" placeholder="آدرس دقیق محل را وارد نمایید - حداقل 100 کاراکتر"></textarea>
                </div>
                <div class="step4 bodyOfSteps hidden">
                    <div class="stepInputBox">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired">X</div>
                        </div>
                        <input class="stepInputBoxInput" type="number">
                    </div>
                    <div class="stepInputBox" style="float: left">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired">Y</div>
                        </div>
                        <input class="stepInputBoxInput" type="number">
                    </div>
                    <div id="map" class="mapTile prv_map clickable">
                        <div style="height: 100%; width: 100%;"></div>
                    </div>
                    <div style="margin-top: 5px">موقعیت موردنظر را بر روی نقشه پیدا نموده و پین را بر روی آن قرار دهید. (کلیک در کامپیوتر و لمس نقشه در گوشی)</div>
                </div>
                <div class="step5 bodyOfSteps hidden">
                    <div style="font-weight: 400">
                        <div class="listItem">
                            <div class="step5Title">درجه هتل</div>
                            <div class="subListItem">
                                <div class="detailListItem">
                                    <select style="border: 1px solid #4DC7BC">
                                        <option value="rate1">یک ستاره</option>
                                        <option value="rate2">دو ستاره</option>
                                        <option value="rate3">سه ستاره</option>
                                        <option value="rate4">چهار ستاره</option>
                                        <option value="rate5">پنج ستاره</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="listItem">
                            <div class="step5Title">محدوده ی قرار گیری</div>
                            <div class="subListItem">
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="1" type="checkbox">
                                        <label for="1">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">تاریخی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="2" type="checkbox">
                                        <label for="2">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">مرکز شهر</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="3" type="checkbox">
                                        <label for="3">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">شلوغ</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="4" type="checkbox">
                                        <label for="4">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">طبیعت</div>
                                </div>
                            </div>
                        </div>
                        <div class="listItem">
                            <div class="step5Title">نوع معماری</div>
                            <div class="subListItem">
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="5" type="checkbox">
                                        <label for="5">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">سنتی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="6" type="checkbox">
                                        <label for="6">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">اصالتا قدیمی</div>
                                </div>
                            </div>
                        </div>
                        <div class="listItem">
                            <div class="step5Title">امکانات رفاهی</div>
                            <div class="subListItem">
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="7" type="checkbox">
                                        <label for="7">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">رستوران فرنگی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="8" type="checkbox">
                                        <label for="8">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">رستوران ایرانی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="9" type="checkbox">
                                        <label for="9">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">صبحانه ی مجانی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="10" type="checkbox">
                                        <label for="10">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">رستوران محلی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="11" type="checkbox">
                                        <label for="11">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">کافی شاپ</div>
                                </div>
                            </div>
                        </div>
                        <div class="listItem">
                            <div class="step5Title">امکانات جانبی</div>
                            <div class="subListItem">
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="12" type="checkbox">
                                        <label for="12">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">باشگاه ورزشی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="13" type="checkbox">
                                        <label for="13">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">پارکینگ مجانی</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="14" type="checkbox">
                                        <label for="14">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">امکانات معلولان</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="15" type="checkbox">
                                        <label for="15">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">استخر</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="16" type="checkbox">
                                        <label for="16">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">تهویه مطبوع</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="17" type="checkbox">
                                        <label for="17">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">WiFi</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="18" type="checkbox">
                                        <label for="18">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">آنتن دهی اینترنت</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="19" type="checkbox">
                                        <label for="19">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">سوئیت دربست</div>
                                </div>
                                <div class="detailListItem">
                                    <div style="display: inline-block">
                                        <input onclick="filter()" id="20" type="checkbox">
                                        <label for="20">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div style="display: inline-block">رستوران</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step5Description">بدون شما ما نمی توانیم دوستانتان را یاری نماییم. اگر موردی باقی مانده است که وجود آن را در خصوص مقصد ضروری می دانید آن را وارد نمایید. توجه کنید توصیف خود را مانند موارد بالا به صورت کلی، خلاصه و در چند کلمه بیان کنید.</div>
                    <div id="newPlace" class="step5NewPlace">
                        <input class="stepInputBox" type="text">
                        <button class="btn step5AddPlace" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace')">اضافه کن</button>
                    </div>
                    <div id="newPlace1" class="step5NewPlace hidden">
                        <input class="stepInputBox" type="text">
                        <button class="btn step5AddPlace" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace1')">اضافه کن</button>
                        <button class="btn step5RemovePlace"  data-toggle="tooltip" data-placement="top" title="حذف کردن مکان جدید" onclick="newPlace('removePlace', 'newPlace1')">حذف کن</button>
                    </div>
                    <div id="newPlace2" class="step5NewPlace hidden">
                        <input class="stepInputBox" type="text">
                        <button class="btn step5AddPlace" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace2')">اضافه کن</button>
                        <button class="btn step5RemovePlace"  data-toggle="tooltip" data-placement="top" title="حذف کردن مکان جدید" onclick="newPlace('removePlace', 'newPlace2')">حذف کن</button>
                    </div>
                    <div id="newPlace3" class="step5NewPlace hidden">
                        <input class="stepInputBox" type="text">
                        <button class="btn step5AddPlace" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace3')">اضافه کن</button>
                        <button class="btn step5RemovePlace"  data-toggle="tooltip" data-placement="top" title="حذف کردن مکان جدید" onclick="newPlace('removePlace', 'newPlace3')">حذف کن</button>
                    </div>

                </div>
                <div class="step6 bodyOfSteps hidden">
                    <button class="btn mapBtn" type="button" style="width: auto !important;">انتخاب عکس</button>
                </div>
            </div>
    </div>

    <script defer>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        function selectCategoriesColor (elem) {

            $('.categories').css('color', 'black').css('border-color', '#E5E5E5').children().css('color', 'black');

            $('.categories').on("mouseenter", function () {
                $(this).css('border-color', '#30b4a6');
            });

            $('.categories').on("mouseleave", function () {
                $(this).css('border-color', '#E5E5E5');
            });

            $(elem).on("mouseleave", function () {
                $(this).css('border-color', '#30b4a6');
            });

            $(elem).css('color', '#30b4a6').css('border-color', '#30b4a6').children().css('color', '#30b4a6');
        }

        var currentSteps = 0;
        function changeSteps(inc){
            $('.bodyOfBox').addClass('hidden');
            $('.bodyOfSteps').addClass('hidden');
            currentSteps += inc;
//for show or hide box of steps
            if (currentSteps <= 0 || currentSteps >= 7) {
                $('.steps').addClass('hidden');
            }
            else {
                $('.steps').removeClass('hidden');
            }
//for show or hide stepName
            if (currentSteps <= 0 || currentSteps >= 9) {
                $('#stepName').addClass('hidden');
            }
            else {
                $('#stepName').removeClass('hidden');
            }
//for change name of button in steps
            if (currentSteps < 0){
                document.location.href = '{{route('main')}}';
                currentSteps = 0;
            } else if(currentSteps == 0){
                $('#nextStep').html('شروع');
                $('#previousStep').html('بازگشت');
            }
            else if(currentSteps > 0 && currentSteps < 6){
                $('#nextStep').html('بعدی');
                $('#previousStep').html('قبلی');
            }
            else if(currentSteps == 6){
                $('#nextStep').html('تکمیل');
            }
            else if(currentSteps == 7){
                $('#nextStep').html('اتمام');
                $('#previousStep').addClass('hidden');
            }
            else if(currentSteps == 8){
                document.location.href = '{{route('main')}}';
                currentSteps = 7;
            }
//for change color of each box of step
            $('.step' + currentSteps).removeClass('hidden');

            $(".bigCircle, .littleCircle").removeClass('completeStep').each(function() {
                if($(this).attr('data-val') <= currentSteps)
                    $(this).addClass('completeStep');
            });
//for change name of step
            if (currentSteps == 1){
                $('#stepName').html('گام اول');
            } else if(currentSteps == 2){
                $('#stepName').html('گام دوم');
            } else if(currentSteps == 3){
                $('#stepName').html('گام سوم');
            } else if(currentSteps == 4){
                $('#stepName').html('گام چهارم');
            } else if(currentSteps == 5){
                $('#stepName').html('گام پنجم');
            } else if(currentSteps == 6){
                $('#stepName').html('گام آخر');
            } else if(currentSteps == 7){
                $('#stepName').html('موفق شدید');
            }
        }

//        var place = 1;
        function newPlace(elem, divId) {

//            comment:: for after 4box:

//            if (elem == 'addPlace'){
//                newElement = "<div id='newPlace" + (place++) + "' style='margin: 0px 32px 20px; display: inline-block; width: 40%;'>";
//                newElement += "<div class='minusPlusIcons minus' data-toggle='tooltip' data-placement='top' title='حذف کردن مکان جدید' onclick='newPlace(\"removePlace\")'></div>";
//                newElement += "<input class='stepInputBox' type='text' style='margin: 0 5px'>";
//                newElement += "<div class='minusPlusIcons plus' data-toggle='tooltip' data-placement='top' title='اضافه کردن مکان جدید' onclick='newPlace(\"addPlace\")'></div>";
//                newElement += "</div>";
//                $("#step5").append(newElement);
//                $('[data-toggle="tooltip"]').tooltip();
//            }
//            else if (elem == 'removePlace'){
//                if (place == 0)
//                        return;
//                else {
//                    $('#newPlace' + (--place)).remove();
//                }
//            }

            switch (elem) {
                case 'addPlace':
                    switch (divId){
                        case 'newPlace':
                            $('#newPlace1').removeClass('hidden');
                            break;
                        case 'newPlace1':
                            $('#newPlace2').removeClass('hidden');
                            break;
                        case 'newPlace2':
                            $('#newPlace3').removeClass('hidden');
                            break;
                        case 'newPlace3':
                            break;
                    }
                    break;
                case 'removePlace':
                    switch (divId){
                        case 'newPlace':
                            break;
                        case 'newPlace1':
                            $('#newPlace1').addClass('hidden');
                            break;
                        case 'newPlace2':
                            $('#newPlace2').addClass('hidden');
                            break;
                        case 'newPlace3':
                            $('#newPlace3').addClass('hidden');
                            break;
                    }
                    break;
            }
        }
    </script>
@stop