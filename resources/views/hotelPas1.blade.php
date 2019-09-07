<?php $placeMode = "ticket";
$state = "تهران";
$backURL = route('home');
$kindPlaceId = 10; ?>
<!DOCTYPE html>
<html>
<head>
    {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}

    @include('layouts.topHeader')
    @include('layouts.phonePopUp')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <title>صفحه اصلی</title>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/icons.css?v=1')}}'/>

    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>

    <style>
        .mainDiv {
            width: 90%;
            margin: 5% auto;
            direction: rtl;
        }
        .inputBox {
            padding: 2px 7px;
            font-size: 0.8em;
            display: inline-block;
            border: 1px solid #cccccc;
            border-radius: 5px;
            background-color: #ebebeb;
            line-height: 30px;
            margin: 10px 0;
        }
        .inputBoxText {
            width: 35%;
            border-left: 1px solid #d8d8d8;
            display: inline-block;
        }
        .inputBoxInput {
            width: 65%;
            text-align: center;
            border: none;
            float: left;
            background-color: transparent;
        }
        .inputBoxSelect {
            width: 20%;
            border: none;
            background-color: transparent;
        }
        /*input[type="checkbox"] {*/
        /*background-color: #4DC7BC;*/
        /*}*/
    </style>

    <style>
        .afterBuyIcon {
            font-family: shazde_regular2 !important;
            display: inline-block;
        }
        .redStar:before {
            content: '\E00B';
            font-size: 0.5em;
            color: #92321b;
            position: absolute;
            top: -5px;
            left: -10px;
        }
        .bottomArrowIcon:before {
            content: '\E04A';
            color: black;
        }
    </style>

    <style>
        .check-box__item {
            padding-top: 5px;
            padding-bottom: 5px;
            position: relative;
        }
    </style>

    <style>
        .afterBuyBtn {
            color: white;
            line-height: 15px;
            display: inline-block;
            border-radius: 7px;
            text-align: center;
            margin: 5px 0;
            font-size: 1.1em;
        }
    </style>

    <style>
        .inlineBorder {
            border-bottom: 1.8px solid #aeaeae;
            margin: 10px 0;
        }
    </style>
    <style>
        .stay_time{
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            background-color: #00000085;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
        .show_time{
            width: 50%;
            height: 50%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 85px;
            flex-direction: column;
            direction: rtl;
        }
    </style>
</head>

<body id="BODY_BLOCK_JQUERY_REFLOW"
      class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back" style="background-color: white">

<div id="stay_time" class="stay_time">
    <div class="show_time" >
        <div style="font-size: 50px;">
            لطفا منتظر بمانید...
        </div>
        <div id="demo">
        </div>
    </div>
</div>

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class="mainDiv">

        @include('layouts.buyHotel2')

        @if(Auth::check())
            <div>
                <div>
                    <div class="textTitle" style="display: inline-block"> کد تخفیف </div>
                    <div style="display: inline-block"> اگر کد تخفیف دارید در اینجا وارد کنید تا در قیمت نهایی اعمال شود </div>
                </div>
                <div style="width: 55%">
                    <div class="inputBox" style="width: 45%;">
                        <div class="inputBoxText" style="width: 40%">
                            <div style="display: inline-block; position: relative"> کد تخفیف را وارد کنید </div>
                        </div>
                        <input class="inputBoxInput" style="width: 60%" type="text" placeholder="xxxxxxxxx">
                    </div>
                    <div style="display: inline-block; margin: 10px 15px; float: left">
                        <button class="btn afterBuyBtn" type="button" style="background-color: #4DC7BC; line-height: 22px; margin: 0 !important;"> اعمال کد تخفیف </button>
                        <div style="font-size: 0.8em; color: red; float: left; margin-right: 10px"> متأسفانه کد تخفیف معتبر نمی باشد <br>  کد تخفیف وارد شده قبلا استفاده شده است </div>
                    </div>
                </div>
                <div> در صورت استفاده از کد تخفیف برای این خرید دیگر امکان خرج کردن امتیاز میسر نمی باشد </div>
            </div>
            <div class="inlineBorder"></div>
            <div style="background-color: #d2fefa; padding: 10px; border-radius: 4px; box-shadow: 0px 0px 14px #c5c5c5">
            <div class="textTitle" style="display: inline-block; color: #4DC7BC !important;"> خرج کردن امتیاز </div>
            <div> امتیاز خود را به تخفیف تبدیل کنید. توجه داشته باشید در صورت خرج کردن امتیاز رتبه و نشان های افتخار شما از بین نخواهد رفت </div>
            <div style="font-size: 0.8em"> برای اطلاعات بیشتر به صفحه  <a href="" style="color: #050c93"> راهنمای امتیازات  </a> مراجعه کنید </div>
            <div class="inputBox" style="width: 18%;">
                <div class="inputBoxText" style="width: 40%"> امتیاز موجود </div>
                <div class="inputBoxInput" style="width: 60%"> 1005000 </div>
            </div>
            <div> برای این بلیط هر امتیاز شما معادل <span style="color: #92321b"> 1000 </span> تومان تخفیف می باشد. توجه حداکثر مبلغ قابل تخفیف <span style="color: #92321b"> 50000 </span> تومان می باشد </div>
            <div>
                <div class="inputBox" style="width: 18%;">
                    <div class="inputBoxText" style="width: 60%">
                        <div style="display: inline-block; position: relative"> چقدر امتیاز خرج می کنید </div>
                    </div>
                    <input class="inputBoxInput" style="width: 40%" type="text" placeholder="xxxxxxxxx">
                </div>
                <div class="btn" style="background-color: #92321b; color: white; margin-top: 2px; cursor: text;"> ضرب در 1000 تومان </div>
                <div class="inputBox" style="width: 10%; background-color: #4DC7BC; color: white; border: none">
                    <div class="inputBoxText" style="width: 60%"> مبلغ تخفیف </div>
                    <div class="inputBoxInput" style="width: 40%"> 50000 </div>
                </div>
            </div>
            <div> در صورت انصراف از خرید در آخرین مرحله یا ایجاد هرگونه مشکل امتیاز خرج شده شما به حساب کاربری شما باز می گردد </div>
            <div>
                <button class="btn afterBuyBtn" type="button" style="background-color: #4DC7BC; line-height: 22px;"> خرجش کن </button>
                <div style="font-size: 0.8em; color: red; display: inline-block; margin-right: 10px"> لطفا امتیاز موردنظر برای خرج کردن را وارد نمایید </div>
            </div>
            <div> در صورت خرج امتیاز برای این خرید دیگر امکان استفاده از کد تخفیف نمی باشد </div>
        </div>

        @elseif($mode == 2)
            <div>
                <div class="textTitle"> نام کاربری و رمزعبور </div>
                <div> در آخرین گام برای خود یک نام کاربری و رمزعبور انتخاب کنید تا بتوانید از تمامی امکانات شازده استفاده نمایید </div>
                <div class="inputBox" style="width: 25%;">
                    <div class="inputBoxText">
                        <div style="display: inline-block; position: relative"><div class="afterBuyIcon redStar"></div> نام کاربری </div>
                    </div>
                    <input id="usernameForRegistration" class="inputBoxInput" type="text">
                </div>
                <div style="font-size: 0.8em"> دوستان شما، شما را با این نام خواهند شناخت </div>
                <div>
                    <div class="inputBox" style="width: 25%;">
                        <div class="inputBoxText">
                            <div style="display: inline-block; position: relative"><div class="afterBuyIcon redStar"></div> رمزعبور </div>
                        </div>
                        <input id="passwordForRegistration" class="inputBoxInput" type="password">
                    </div>
                    <div class="inputBox" style="width: 25%; margin-right: 5%">
                        <div class="inputBoxText">
                            <div style="display: inline-block; position: relative"><div class="afterBuyIcon redStar"></div> تکرار رمزعبور </div>
                        </div>
                        <input id="rPasswordForRegistration" class="inputBoxInput" type="password">
                    </div>
                </div>
                <div style="font-size: 0.8em"> رمزعبور شما برای حفظ امنیت می بایست شامل حروف بزرگ و کوچک به همراه عدد باشد. فراموش نکنید زیر شش کاراکتر مورد قبول نمی باشد. </div>
            </div>
        @endif


        <div style="margin-top: 20px">
            <div style="display: inline-block"> با انتخاب دکمه تأیید و پرداخت شما به صفحه پرداخت فروشنده خدمت متصل می شوید و تنها کافی است مبلغ بلیط را تأیید و پرداخت نمایید </div>
            <div style="color: #92321b" id="msgErr"></div>
            <div style="text-align: left">
                <button onclick="doPayment({{$mode}})" class="btn afterBuyBtn" type="button" style="background-color: #4DC7BC"> تأیید و پرداخت </button>
            </div>
            <div style="text-align: left">
                <button class="btn afterBuyBtn" type="button" style="background-color: #92321b"> انصراف </button>
            </div>
        </div>

    </div>

</div>

@include('layouts.placeFooter')

</body>
</html>