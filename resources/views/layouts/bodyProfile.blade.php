<!DOCTYPE html>
<html>

<?php
    if(!isset($user))
        $user = Auth::user();
?>

<head>
    @section('header')

        @include('layouts.topHeader')

{{--        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/long_lived_global_legacy_1.css?v=1')}}'/>--}}
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/short_lived_global_legacy.css?v=1')}}'/>
        <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
        <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/universal_new.css?v=1')}}' data-rup='universal_new'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=1')}}' data-rup='long_lived_global_legacy'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/bodyProfile.css')}}' data-rup='long_lived_global_legacy'/>



    <?php if($mode == "badge"): ?>
        <title>کوچیتا | مدال های گردشگری</title>
    <?php endif; ?>
    <?php if($mode == "profile"): ?>
    <title>کوچیتا | صفحه کاربری</title>
    <?php endif; ?>
    <?php if($mode == "message"): ?>
    <title>کوچیتا | پیام های من</title>
    <?php endif; ?>
    <?php if($mode == "message"): ?>
        <title>کوچیتا | پیام های من</title>
        <?php endif; ?>
        <link rel="stylesheet" type="text/css" media="screen, print" href="{{URL::asset('css/theme2/mbr_profile.css?v=1')}}"/>
        <!--[if IE 6]>
        <link rel="stylesheet" type="text/css" media="screen, print" href="{{URL::asset('css/theme2/winIE6.css')}}" />
        <![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" media="screen, print" href="{{URL::asset('css/theme2/winIE7.css')}}" />
        <![endif]-->

        <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/modules_member_center.css?v=4')}}' data-rup='modules_member_center'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/persistent_header_achievements.css?v=2')}}' data-rup='persistent_header_achievements'/>

        <script >
            var getRecentlyPath = '{{route('recentlyViewed')}}';
            var getBookMarksPath = '{{route('getBookMarks')}}';
        </script>


        <style>
            .activeTripStyle{
                background-color: #4dc7bc;
                color: white;
                visibility: visible;
            }
        </style>
    @show
</head>

<body class="ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back position-relative">

@include('general.forAllPages')

@include('layouts.pop-up-create-trip')

<div id="fb-root"></div>

<div id="PAGE" class="profilePage non_hotels_like desktop scopedSearch position-relative">

    @include('layouts.placeHeader')

    <div id="MAINWRAP" class="position-relative">

        <div class="modules-membercenter-persistent-header-achievements profileHeader hideOnPhone">
            <ul class="persistent-header position-relative">
                @if($mode == "profile")
                    <li id="Profile" class="profile">
                        <a id="profileLinkColor1" href="{{URL('profile')}}">صفحه کاربری</a>
                    </li>
                @else
                    <li id="Profile" class="profile">
                        <a id="profileLinkColor2" href="{{URL('profile')}}">صفحه کاربری</a>
                    </li>
                @endif
                @if($mode == "profile")
                    <li id="Profile" class="profile">
                        <a id="profileLinkColor1" href="{{URL('profile')}}">فعالیت‌های من</a>
                    </li>
                @else
                    <li id="Profile" class="profile">
                        <a id="profileLinkColor2" href="{{URL('profile')}}">فعالیت‌های من</a>
                    </li>
                @endif
                @if($mode == "badge")
                    <li id="BadgeCollection" class="badgeCollection">
                        <a id="BadgeCollectionLinkColor1" href="{{route('badge')}}">مدال‌های گردشگری</a>
                    </li>
                @else
                    <li id="BadgeCollection" class="badgeCollection">
                        <a id="BadgeCollectionLinkColor2" href="{{route('badge')}}">مدال‌های گردشگری</a>
                    </li>
                @endif

                <li class="travelMap targets position-relative" id="targetHelp_5">
                    <a href="{{route('soon')}}">سفرنامه من</a>
                    <div id="helpSpan_5" class="helpSpans hidden row">
                        <span class="introjs-arrow"></span>
                        <div class="col-xs-12">
                            <p>با استفاده از این منو می‌توانید به سایر بخش‌های پروفایل کاربری خود بروید.</p>
                        </div>
                        <div class="col-xs-12">
                            <button data-val="5" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_5">بعدی</button>
                            <button data-val="5" class="btn btn-primary backBtnsHelp" id="backBtnHelp_5">قبلی</button>
                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                        </div>
                    </div>
                </li>

                <li id="Saves" class="saves"></li>
                @if($mode == "message")
                    <li id="Messages" class="messages">
                        <a id="messageLinkColor1" href="{{URL('messages')}}">پیام‌ها</a>
                    </li>
                @else
                    <li id="Messages" class="messages">
                        <a id="messageLinkColor2" href="{{URL('messages')}}">پیام‌ها</a>
                    </li>
                @endif
                <li id="Bookings" class="bookings">
                    <a id="bookingLinkColor2" href="{{route('soon')}}">رزروها</a>
                </li>
                <li id="PaymentOptions" class="paymentOptions">
                    <a id="paymentOptionsLinkColor2" href="{{route('soon')}}">پروازها</a>
                </li>
                @if($mode == "setting")
                    <li id="Settings" class="settingColor1 settings">
                @else
                    <li id="Settings" class="settingColor2 settings">
                @endif
                    تنظیمات
                    <div class="settingsArrow"></div>
                    <div class="settingsDropDown" id="settingDropDownMainDiv">
                        <a href="{{URL('accountInfo')}}">اطلاعات کاربر</a>
                        <?php
                            $level = Auth::user()->level;
                        ?>

                        @if($level == 1 || $level == 3)
                            <a title="Control Content" href="{{route('getReports')}}">مدیریت گزارشات</a>
                        @endif

                        @if(Auth::user()->level == 1)
                            {{--<a title="ages" href="{{route('specialAdvice')}}">پیشنهاد های ویژه</a>--}}
                        @endif
                    </div>
                </li>
            </ul>
        </div>

        @yield('main')
    </div>
</div>

@include('layouts.placeFooter')

</body>

</html>