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
            border: 1px solid #4DC7BC;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            box-shadow: 0px 0px 30px grey;
        }
        .headerOfBox {
            background-color: #4DC7BC;
            color: white;
            padding: 10px;
            font-size: 2em;
            border-radius: 5px 5px 0 0;
        }
        .bodyOfBox {
            height: max-content;
            padding: 20px;
            font-size: 1.3em;
        }
        .footerOfBox {
            height: 45px;
            margin: 20px;
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
            border: 1px solid #4DC7BC;
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
            <div class="bodyOfBox" id="step0"> از اینکه اطلاعات خود را با ما در میان می گذارید سپاس گذاریم. لطفا در چند قدم ساده، به پرسش های ما پاسخ دهید. </div>
            <div class="bodyOfBox hidden" id="step1">
                <div>لطفا نوع مکان را انتخاب کنید و پس از آن در بین دسته بندی ها بهترین گزینه را انتخاب کنید.</div>
                <div>
                    <div class="icons hotel" onclick="changeSort('#hotelSort'); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons ticket" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons atraction" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons restaurant" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons soghat" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons ghazamahali" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons majara" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons sanaye" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons lebas" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons boom" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                    <div class="icons estelah" onclick="changeSort(); changeIconColor(this);" style="display: inline-block"></div>
                </div>
                <div style="width: 100%; margin: auto; border-top: 1px solid #4DC7BC; padding-bottom: 20px"></div>
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
            <div class="bodyOfBox hidden" id="step2">
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
            <div class="bodyOfBox hidden" id="step3">
                <div> آدرس دقیق محل را به گونه ای وارد کنید که دوستانتان بتوانند آن را بیابند. </div>
                <textarea class="addresText" placeholder="حداقل 100 کاراکتر"></textarea>
                <div style="font-size: 0.8em; margin-bottom: 10px;"> نیازی به ذکر نام استان و شهر نمی باشد. </div>
            </div>
            <div class="bodyOfBox hidden" id="step4">
                <div> اگر مختصات محل را می دانید آن را وارد نمایید. در غیر این صورت بر روی نقشه کلیک کرده و با تایید محل مکان ما مختصات آن را درج می کنیم. </div>
                <div style="margin: 10px 0">
                    <div style="width: 40%; display: inline-block; float: right;">
                        <div style="padding: 10px">
                            <div style="display: inline-block"> x</div>
                            <input class="stepInputBox" type="number">
                        </div>
                        <div style="padding: 10px">
                            <div style="display: inline-block"> y</div>
                            <input class="stepInputBox" type="number">
                        </div>
                    </div>
                    <div style="width: 50%; display: inline-block; margin-top: 10px;">
                        <div id="map" class="mapTile prv_map clickable">
                            <div style="height: 100%; width: 100%;"></div>
                        </div>
                        <button class="btn mapBtn" type="button">نمایش نقشه</button>
                    </div>
                </div>
            </div>
            <div class="bodyOfBox hidden" id="step5">
                <div> لطفا از بین گزینه های مقصد ، گزینه های بر قرار را انتخاب کنید.</div>
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
                                    <div style="display: inline-block">طبیعت</div>
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
            <div class="bodyOfBox hidden" id="step6">
                <div> اگر عکسی از محل مورد نظر دارید حتما بارگذاری نمایید تا دوستانتان و بقیه ببینند و با آن مکان آشنا شوند. </div>
                <button class="btn mapBtn" type="button" style="width: auto !important;">انتخاب عکس</button>
            </div>
            <div class="bodyOfBox hidden" id="step7">
                <div>
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

        function changeIconColor (elem) {
            $('.icons').css('color', 'black');
            $(elem).css('color', '#30b4a6');
        }

        var currentSteps = 0;
        function changeSteps(inc){
            $('.bodyOfBox').addClass('hidden');
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
                $('#nextStep').html('تکمیل برای بررسی');
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
            $('#step' + currentSteps).removeClass('hidden');

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