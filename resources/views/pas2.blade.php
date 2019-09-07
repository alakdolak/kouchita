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

</head>

<body id="BODY_BLOCK_JQUERY_REFLOW"
      class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')

<div class="mainDiv">

    @include('layouts.buyTicket')

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

    <div class="inlineBorder"></div>

    <div>
        <div style="display: inline-block"> با انتخاب دکمه تأیید و پرداخت شما به صفحه پرداخت فروشنده خدمت متصل می شوید و تنها کافی است مبلغ بلیط را تأیید و پرداخت نمایید </div>
        <div style="color: #92321b" id="msgErr"></div>
        <div style="text-align: left">
            <button onclick="doPayment(2)" class="btn afterBuyBtn" type="button" style="background-color: #4DC7BC"> تأیید و پرداخت </button>
        </div>
        <div style="text-align: left">
            <button class="btn afterBuyBtn" type="button" style="background-color: #92321b"> انصراف </button>
        </div>
    </div>

</div>
</div>

@include('layouts.placeFooter')

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

<div class="ui_backdrop dark" style="display: none; z-index: 10000000"></div>

<script>

    $('.login-button').click(function() {
        var url = '{{route('buyInnerFlight', ['mode' => 3, 'ticketId' => $ticket->id, 'adult' => $adult, 'child' => $child, 'infant' => $infant, 'ticketId2' => ($ticket2 == null) ? '' : $ticket2->id])}}';
        $(".dark").show();
        showLoginPrompt(url);
    });

    function showElement(e) {
        $("#" + e).removeClass("hidden");
        $(".dark").show()
    }

    function hideElement(e) {
        $("#" + e).addClass("hidden");
        $(".dark").hide()
    }

</script>

</body>
</html>