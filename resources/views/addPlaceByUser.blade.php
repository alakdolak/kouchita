@extends('layouts.bodyPlace')

<?php $place = \App\models\Hotel::first(); $placeMode = "sad"; $state = "dsa"; ?>

@section('header')
    @parent
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/icons.css?v=1')}}' />
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
            height: 80px;
            padding: 5px 20px 0;
            position: relative;
        }
        .stepTitle {
            font-size: 1.25em;
            font-weight: 600;
        }
        .stepNotice {
            position: absolute;
            bottom: 0;
            color: #963019;
        }
        .bodyOfSteps {
            position: absolute;
            margin: 0 2%;
            width: 96%;
            box-shadow: 0px 0px 30px #e0e0e0;
            padding: 4% 3%;
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
        .step2inputName {
            display: inline-block;
            width: 44px;
            text-align: left;
        }
        .stepInputBox {
            border: 1px solid #4DC7BC;
            border-radius: 5px;
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
            left: 45%;
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
        .titleInStep5 {
            color: #4dc7bc;
            display: inline-block;
            width: 20%;
            float: right;
        }
        .listItem {
            margin: 15px 5px;
        }
        .subListItem {
            display: inline-block;
            width: 80%;
        }
        .detailListItem {
            width: 24%;
            display: inline-block;
        }

    </style>

    <style>
        .icons {
            font-family: 'Shazde_Regular2' !important;
            font-size: 40px;
            direction: rtl;
            line-height: 40px;
            color: black;
            margin: 4% 1%;
            cursor: pointer;
        }
        .sorted {
            padding-bottom: 10px;
        }
        .minusPlusIcons {
            font-family: 'Shazde_Regular2' !important;
            font-size: 25px;
            line-height: 25px;
            color: #30b4a6;
            cursor: pointer;
            display: inline-block;
        }
        .inputRequired {
            width: 8px;
            height:  13px;
            background-image: url('{{URL::asset('images/profile.png')}}');
            background-position:  -10PX -40px;
            background-repeat:  no-repeat;
            background-size: 28px;
            display: inline-block;
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
                <div class="stepNotice">اگر ارایه دهنده خدمت هستید از این قسمت برای تعریف تجارت خو استفاده کنید.</div>
            </div>
            <div class="step2 bodyOfBox hidden">
                <div class="stepTitle">لطفا اطلاعات پایه را وارد نمایید.</div>
                <div class="stepNotice">وارد نمودن اطلاعات ستاره دار اجباری است.</div>
                <div></div>
            </div>
            <div class="step3 bodyOfBox hidden">
                <div class="stepTitle">لطفا آدرس دسترسی به مقصد را وارد نمایید.</div>
                <div class="stepNotice">آدرس را به گونه ای وارد نمایید تا دوستانتان بتوانند به راحتی به مقصد برسند. در صورت نیاز از کلمات توصیفی استفاده نمایید. نیازی به وارد کردن مجدد نام استان و شهر نمی باشد مگر آنکه در توصیف راه های دسترسی ضروری باشد.</div>
                <div></div>
            </div>
            <div class="step4 bodyOfBox hidden">
                <div class="stepTitle">لطفا موقعیت مقصد را بر روی نقشه مشخص نمایید</div>
                <div class="stepNotice">اگر مختصات مقصد را می دانید آن را مستقیما وارد نمایید. در غیر این صورت موقعیت آن را بر روی نقشه مشخص نمایید</div>
                <div></div>
            </div>
            <div class="step5 bodyOfBox hidden">
                <div class="stepTitle">مهم ترین بخش ، توصیف مقصد است</div>
                <div class="stepNotice">از بین گزینه های زیر، مواردی را که مقصد را توصیف می نماید اضافه کنید. این لیست با کمک شما تکمیل می شود پس اگر مورد یا مواردی بود که ما آن را لحاظ نکرده بودیم حتما آن را وارد کنید. سپاسگذاریم.</div>
                <div></div>
            </div>
            <div class="step6 bodyOfBox hidden">
                <div class="stepTitle"> اگر عکسی از محل مورد نظر دارید حتما بارگذاری نمایید تا دوستانتان و بقیه ببینند و با آن مکان آشنا شوند. </div>
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



                    {{--<div data-val="1" class="steps hidden" style="right: 21%"></div>--}}
                    {{--<div data-val="3" class="steps hidden" style="right: 41%"></div>--}}
                    {{--<div data-val="4" class="steps hidden" style="right: 51%"></div>--}}
                    {{--<div data-val="5" class="steps hidden" style="right: 61%"></div>--}}
                    {{--<div data-val="6" class="steps hidden" style="right: 71%"></div>--}}
                    {{--<div data-val="2" class="steps hidden" style="right: 31%"></div>--}}
                </div>
                <button class="btn boxNextBtn" type="button" id="nextStep" onclick="changeSteps(1)">شروع</button>
                <div class="hidden" id="stepName">گام اول</div>
                <button class="btn boxPreviousBtn" type="button" id="previousStep" onclick="changeSteps(-1)">بازگشت</button>
            </div>
            <div class="step1 bodyOfSteps hidden">
                <div style="text-align: center">
                    <div class="categories" onclick="changeSort('#hotelSort'); selectCategoriesColor(this);">
                        <div class="icons hotel"></div>
                        <div>مراکز اقامتی</div>
                    </div>
                    <div class="categories" onclick="changeSort(); selectCategoriesColor(this);">
                        <div class="icons atraction"></div>
                        <div>جاذبه</div>
                    </div>
                    <div class="categories" onclick="changeSort(); selectCategoriesColor(this);">
                        <div class="icons soghat"></div>
                        <div>سوغات</div>
                    </div>
                    <div class="categories" onclick="changeSort(); selectCategoriesColor(this);">
                        <div class="icons sanaye"></div>
                        <div>صنایع دستی</div>
                    </div>
                    <div class="categories" onclick="changeSort(); selectCategoriesColor(this);">
                        <div class="icons lebas"></div>
                        <div>لباس محلی</div>
                    </div>
                    <div class="categories" onclick="changeSort(); selectCategoriesColor(this);">
                        <div class="icons restaurant"></div>
                        <div>رستوران</div>
                    </div>
                    <div class="categories" onclick="changeSort(); selectCategoriesColor(this);">
                        <div class="icons ghazamahali"></div>
                        <div>غذای محلی</div>
                    </div>
                </div>

                <div id="hotelSort" class="sorted hidden">
                    <div style="display: inline-block">دسته بندی :</div>
                    <select style="border: 1px solid #4DC7BC">
                        <option value="abbasi">عباسی</option>
                        <option value="atlas">اطلس</option>
                        <option value="naghsh">نقشه جهان</option>
                        <option value="alighapo">عالی قاپو</option>
                    </select>
                </div>
            </div>
            <div class="step2 bodyOfSteps hidden">
                <div> اطلاعات پایه را وارد نمایید. (اطلاعات اجباری<div class="inputRequired"></div> را حتما لحاظ نمایید.)</div>
                <div style="padding: 20px">
                    <div class="step2inputName">نام<div class="inputRequired"></div></div>
                    <input class="stepInputBox" type="text" required>
                </div>
                <div style="width: 100%; margin: auto; border-top: 1px solid #4DC7BC;"></div>
                <div style="padding: 20px">
                    <div style="width: 50%; display: inline-block">
                        <div class="step2inputName">استان<div class="inputRequired"></div></div>
                        <input class="stepInputBox" type="text" required>
                    </div>
                    <div style="display: inline-block">
                        <div class="step2inputName">شهر<div class="inputRequired"></div></div>
                        <input class="stepInputBox" type="text" required>
                    </div>
                </div>
                <div style="width: 100%; margin: auto; border-top: 1px solid #4DC7BC;"></div>
                <div style="padding: 20px">
                    <div style="width: 50%; display: inline-block">
                        <div class="step2inputName">تلفن</div>
                        <input class="stepInputBox" type="tel" required>
                    </div>
                    <div style="display: inline-block">
                        <div class="step2inputName">سایت</div>
                        <input class="stepInputBox" type="url" required>
                    </div>
                    <div style="padding-top: 10px;">
                        <div class="step2inputName">ایمیل</div>
                        <input class="stepInputBox" type="email" required>
                    </div>
                </div>
            </div>
            <div class="step3 bodyOfSteps hidden">
                <textarea class="addresText" placeholder="آدرس دقیق محل را وارد نمایید - حداقل 100 کاراکتر"></textarea>
            </div>
            <div class="step4 bodyOfSteps hidden">
                <div style="padding: 10px">
                    <div style="display: inline-block"> x</div>
                    <input class="stepInputBox" type="number">
                </div>
                <div style="padding: 10px">
                    <div style="display: inline-block"> y</div>
                    <input class="stepInputBox" type="number">
                </div>
                <div id="map" class="mapTile prv_map clickable">
                    <div style="height: 100%; width: 100%;"></div>
                </div>
            </div>
            <div class="step5 bodyOfSteps hidden">
                <div class="ui_column details">
                    <div style="direction: rtl; font-size: 14px">
                        <div class="listItem">
                            <div class="titleInStep5">درجه هتل</div>
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
                            <div class="titleInStep5">محدوده ی قرار گیری</div>
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
                                    icons restaurant      <div style="display: inline-block">طبیعت</div>
                                </div>
                            </div>
                        </div>
                        <div class="listItem">
                            <div class="titleInStep5">نوع معماری</div>
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
                            <div class="titleInStep5">امکانات رفاهی</div>
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
                            <div class="titleInStep5">امکانات جانبی</div>
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
                </div>
                <div style="width: 100%; margin: auto; border-top: 1px solid #4DC7BC; padding-bottom: 20px"></div>
                <div> اگر امکاناتی را در تست بالا ندید و از نظر شما وجود آن ضروری است. آن را به ما اطلاع دهید. </div>
                <div id="newPlace" style="margin: 20px 32px; display: inline-block; width: 40%;">
                    <div class="minusPlusIcons minus" data-toggle="tooltip" data-placement="top" title="حذف کردن مکان جدید" onclick="newPlace('removePlace', 'newPlace')"></div>
                    <input class="stepInputBox" type="text">
                    <div class="minusPlusIcons plus" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace')"></div>
                </div>

                <div id="newPlace1" class="hidden" style="margin: 20px 32px; display: inline-block; width: 40%;">
                    <div class="minusPlusIcons minus" data-toggle="tooltip" data-placement="top" title="حذف کردن مکان جدید" onclick="newPlace('removePlace', 'newPlace1')"></div>
                    <input class="stepInputBox" type="text">
                    <div class="minusPlusIcons plus" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace1')"></div>
                </div>
                <div id="newPlace2" class="hidden" style="margin: 0px 32px 20px; display: inline-block; width: 40%;">
                    <div class="minusPlusIcons minus" data-toggle="tooltip" data-placement="top" title="حذف کردن مکان جدید" onclick="newPlace('removePlace', 'newPlace2')"></div>
                    <input class="stepInputBox" type="text">
                    <div class="minusPlusIcons plus" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace2')"></div>
                </div>
                <div id="newPlace3" class="hidden" style="margin: 0px 32px 20px; display: inline-block; width: 40%;">
                    <div class="minusPlusIcons minus" data-toggle="tooltip" data-placement="top" title="حذف کردن مکان جدید" onclick="newPlace('removePlace', 'newPlace3')"></div>
                    <input class="stepInputBox" type="text">
                    <div class="minusPlusIcons plus" data-toggle="tooltip" data-placement="top" title="اضافه کردن مکان جدید" onclick="newPlace('addPlace', 'newPlace3')"></div>
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
        function changeSort (elem) {
            $('.sorted').addClass('hidden');
            $(elem).removeClass('hidden');
        }

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