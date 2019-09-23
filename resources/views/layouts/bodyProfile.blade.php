<!DOCTYPE html>
<html>

<?php
    if(!isset($user))
        $user = Auth::user();
?>

<head>
    @section('header')

        @include('layouts.topHeader')

        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/long_lived_global_legacy_1.css?v=1')}}'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/short_lived_global_legacy.css?v=1')}}'/>
        <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
        <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/universal_new.css?v=1')}}' data-rup='universal_new'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=1')}}' data-rup='long_lived_global_legacy'/>
        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/bodyProfile.css')}}' data-rup='long_lived_global_legacy'/>



    <?php if($mode == "badge"): ?>
        <title>شازده مسافر | مدال های گردشگری</title>
    <?php endif; ?>
        <?php if($mode == "profile"): ?>
        <title>شازده مسافر | صفحه کاربری</title>
        <?php endif; ?>
        <?php if($mode == "message"): ?>
        <title>شازده مسافر | پیام های من</title>
        <?php endif; ?>
        <?php if($mode == "message"): ?>
        <title>شازده مسافر | پیام های من</title>
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
    @show
</head>

<body class="ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back position-relative">

@include('layouts.pop-up-create-trip')

<div id="fb-root"></div>

<div id="PAGE" class=" non_hotels_like desktop scopedSearch position-relative">
    <div class="masthead position-relative">
        <div ID="taplc_global_nav_0" class="ppr_rup ppr_priv_global_nav position-relative">
            <div class="global-nav global-nav-single-line has-links position-relative">
                <div class="global-nav-top position-relative">
                    <div class="global-nav-bar global-nav-green position-relative bg-color-greenImp">
                        <div class="ui_container global-nav-bar-container position-relative">
                            <div class="global-nav-hamburger is-hidden-tablet"><span class="ui_icon menu-bars"></span></div>

                            <a href="{{route('main')}}" class="global-nav-logo  "><img src="{{URL::asset('images/logo.svg')}}" alt="شازده مسافر" class="global-nav-img global-nav-svg"/></a>

                            <div class="global-nav-links ui_tabs inverted is-hidden-mobile">
                                <div id="taplc_global_nav_links_0" class="ppr_rup ppr_priv_global_nav_links" data-placement-name="global_nav_links">
                                    <div class="global-nav-links-container">
                                        <ul class="global-nav-links-menu">
                                            <li class="" data-element=".masthead-dropdown-hotels"><a href="{{route('main')}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>
                                            <li class=""><a href="{{route('mainMode', ['mode' => 'restaurant'])}}" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>
                                            <li class=""><a href="{{route('mainMode', ['mode' => 'amaken'])}}" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>
                                            <li><a href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>
                                            <li class="" data-element=".masthead-dropdown-Flights"><a  href="{{route('soon')}}" class="unscoped global-nav-link ui_tab " data-tracking-label="Flights">جشنواره ها</a></li>
                                            <li class="" data-element=".masthead-dropdown-Flights"><a href="" class="unscoped global-nav-link ui_tab " data-tracking-label="Flights"> آداب و رسوم</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="global-nav-actions position-relative">
                                @if(Auth::check())
                                    <div id="targetHelp_1" class="targets ppr_rup ppr_priv_global_nav_action_trips position-relative">
                                        <div id="bookmarkicon" class="ppr_rup ppr_priv_global_nav_action_profile">
                                            <span class="ui_icon casino"></span>
                                        </div>
                                        <div id="helpSpan_1" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12" style="line-height: 1.428 !important;">شاید بعدا بخواهید دوباره به همین مکان باز گردید. پس آن را نشان کنید تا از منوی بالا هر وقت که خواستید دوباره به آن باز گردید.</p>
                                            <div class="col-xs-12">
                                                <button data-val="1" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_1">بعدی</button>
                                                <button data-val="1" class="btn btn-primary backBtnsHelp" id="backBtnHelp_1">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ppr_rup ppr_priv_global_nav_action_trips position-relative">
                                        <div id="targetHelp_2" class="targets masthead-saves" title="My Trips and Recently Viewed">
                                            <a class="trips-icon">
                                                <span onclick="showRecentlyViews('recentlyViewed')" class="ui_icon my-trips"></span>
                                            </a>
                                            <div id="helpSpan_2" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p class="col-xs-12" style="line-height: 1.428 !important;">سفر های خود و بازدید های اخیرتان را به سادگی از این چک کنید. خیلی ساده است.</p>
                                                <div class="col-xs-12">
                                                    <button data-val="2" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_2">بعدی</button>
                                                    <button data-val="2" class="btn btn-primary backBtnsHelp" id="backBtnHelp_2">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="ppr_rup ppr_priv_global_nav_action_trips position-relative">
                                        <div id="entryBtnId" class="ppr_rup ppr_priv_global_nav_action_profile">
                                            <div class="global-nav-profile global-nav-utility">
                                                <a class="ui_button secondary small login-button" title="Join">عضویت / ورود</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="ppr_rup ppr_priv_global_nav_action_notif position-relative">
                                    <div id="targetHelp_3" class="masthead_notification targets position-relative" title="Alerts">
                                        <div class="masthead_notifctr_btn">
                                            <div class="masthead_notifctr_sprite ui_icon notification-bell"></div>
                                            <div class="masthead_notifctr_jewel hidden">0</div>
                                        </div>
                                        <div id="helpSpan_3" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12" style="line-height: 1.428 !important;">پیام های خود را به سادگی از اینجا دنبال کنید.</p>
                                            <div class="col-xs-12">
                                                <button data-val="3" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_3">بعدی</button>
                                                <button data-val="3" class="btn btn-primary backBtnsHelp" id="backBtnHelp_3">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                        <div id="alert" class="masthead_notifctr_dropdown " style="left: -10px !important; top: 40px !important; display: none;"><div class="notifdd_title">پیام ها</div><div class="notifdd_loading hidden"><div class="ui_spinner"></div></div><div><div class="modules-engagement-notification-dropdown " data-backbone-name="modules.engagement.NotificationDropdown" data-backbone-context="Engagement_MemberNotifications"><div class="notifdd_empty">هیچ پیامی موجود نیست </div></div></div></div>
                                    </div>
                                </div>

                                <style>
                                    .masthead_notifctr_dropdown:before {
                                        content: '';
                                        position: absolute;
                                        left: 24px;
                                        top: -10px;
                                        margin-left: -10px;
                                        width: 0;
                                        height: 0;
                                        border-left: 10px solid transparent;
                                        border-right: 10px solid transparent;
                                        border-bottom: 10px solid #fff;
                                        -webkit-filter: drop-shadow(0 0 0 #b7b7b7);
                                        filter: drop-shadow(0 0 0 #b7b7b7);
                                        box-shadow: 0 0 0 #b7b7b7\9;
                                        -webkit-filter: drop-shadow(0 0 0 #999);
                                        filter: drop-shadow(0 0 0 #999);
                                    }
                                    .dropMenu .subLink:hover,
                                    .dropMenu .subItem .subLink:hover,
                                    .dropMenu .taLnk:hover a,
                                    .subItem .subLink:hover,
                                    .subItemNoLink .subNoLink:hover,
                                    .expandSubItem .expandSubLink:hover {
                                        color: #16174f !important;
                                    }
                                </style>

                                <div id="taplc_global_nav_action_profile_0" class="ppr_rup ppr_priv_global_nav_action_profile position-relative">
                                    <div class="global-nav-profile global-nav-utility position-relative">
                                        @if(Auth::check())
                                            <div id="targetHelp_4" class="targets position-relative" title="Profile">
                                                <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                                <span id="nameTop" class="name">{{$user->username}}</span>
                                                <div id="helpSpan_4" class="helpSpans hidden row">
                                                    <span class="introjs-arrow"></span>
                                                    <p class="col-xs-12" style="line-height: 1.428 !important;"> پروفایل خود را چک کنید تا ببینید چه امتیاز های هیجان انگیزی می توانید کسب کنید. هر کمک شما به بی جواب نمی ماند.</p>
                                                    <div class="col-xs-12">
                                                        <button data-val="4" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_4">بعدی</button>
                                                        <button data-val="4" class="btn btn-primary backBtnsHelp" id="backBtnHelp_4">قبلی</button>
                                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="global-nav-overlays-container">
                                            <div id="profile-drop" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility" style="display:none; position: absolute; bottom: auto; z-index: 10000; background:none 0% 0% repeat scroll rgb(255, 255, 255); padding: 0px 18px; left: 20px; top: 43px;box-shadow: 0 4px 16px 0 rgba(0,0,0,0.2);">
                                                <ul class="global-nav-profile-menu">
                                                    <li class="subItem"><a href="{{URL('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">صفحه کاربری</a></li>
                                                    <li class="subItem rule"><a href="{{route('soon')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_bookings">رزروها</a></li>
                                                    <li class="subItem "><a href="{{route('soon')}}" class="subLink" data-tracking-label="UserProfile_inbox">پروازها</a></li>
                                                    <li class="subItem rule"><a href="{{URL('messages')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">پیام ها</a> </li>
                                                    <li class="subItem"><a href="{{URL('accountInfo')}}" class="subLink" data-tracking-label="UserProfile_settings">اطلاعات کاربر </a></li>
                                                    <li class="subItem"><a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">خروج</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="global-nav-overlays-container">
                                    @include('layouts.recentlyViewAndMyTrips')
                                </div>
                            </div>

                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-nav-wrapper hidden">
                <div class="sidebar-nav-backdrop"></div>
                <div class="sidebar-nav-container">
                    <div class="ui_container">
                        <div class="sidebar-nav-header">
                            <div class="sidebar-nav-close">
                                <div class="ui_icon times"></div>
                            </div>
                            <a href="/" class="global-nav-logo"><img src='{{URL::asset('images/logo.png')}}' alt="شازده مسافر" class="global-nav-img"/></a>
                        </div>
                        @if(Auth::check())
                            <div class="sidebar-nav-profile-container">
                                <div class="sidebar-nav-profile-linker">
                                    <a class="global-nav-profile-linker">
                                        <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                        <div class="profile-link">
                                            <div class="profile-name">{{$user->username}}</div>
                                            <div class="profile-link-text">صفحه کاربری</div>
                                        </div>
                                    </a>
                                </div>
                                <p class="sidebar-nav-title">اکانت من</p>
                                <div class="sidebar-nav-profile">
                                    <li class="subItem"><a href="{{route('soon')}}" class="subLink global-nav-submenu-divided">سفرهای من</a></li>
                                    <li class="subItem"><a href="{{route('soon')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_ManagementCenter">رزروها</a></li>
                                    <li class="subItem"><a href="{{route('soon')}}" class="subLink" data-tracking-label="UserProfile_inbox">پروازها</a></li>
                                    <li class="subItem"><a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">خروج</a></li>
                                </div>
                            </div>
                        @endif
                        <div class="sidebar-nav-links-container">
                            <p class="sidebar-nav-title">Browse</p>
                            <div class="sidebar-nav-links"></div>
                            <div class="sidebar-nav-links-more"></div>
                        </div>
                    </div>
                </div>
            </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>

    <div id="MAINWRAP" class="position-relative">

        <div class="modules-membercenter-persistent-header-achievements" style="background-color: #fcc156 !important; position: relative">
            <ul class="persistent-header position-relative">
                @if($mode == "profile")
                    <li id="Profile" class="profile"><a style="color: #963019 !important" href="{{URL('profile')}}">صفحه کاربری</a> </li>
                @else
                    <li id="Profile" class="profile"><a style="color: #16174f" href="{{URL('profile')}}">صفحه کاربری</a> </li>
                @endif
                @if($mode == "badge")
                    <li id="BadgeCollection" class="badgeCollection"><a style="color: #963019 !important" href="{{route('badge')}}">مدال های گردشگری</a> </li>
                @else
                    <li id="BadgeCollection" class="badgeCollection"><a style="color: #16174f" href="{{route('badge')}}">مدال های گردشگری</a> </li>
                @endif

                <li class="travelMap targets position-relative" id="targetHelp_5">
                    <a style="color: #16174f" href="{{route('soon')}}">سفرنامه من</a>
                    <div id="helpSpan_5" class="helpSpans hidden row">
                        <span class="introjs-arrow"></span>
                        <div class="col-xs-12" style="color: black !important; line-height: 1.428 !important; font-weight: normal !important; direction: rtl !important; text-align: start">
                            <p>با استفاده از این منو می توانید به سایر بخش های پروفایل کاربری خود بروید.</p>
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
                    <li id="Messages" class="messages"><a style="color: #963019 !important" href="{{URL('messages')}}">پیام ها</a> </li>
                @else
                    <li id="Messages" class="messages"><a style="color: #16174f " href="{{URL('messages')}}">پیام ها</a> </li>
                @endif
                <li id="Bookings" class="bookings"><a style="color: #16174f" href="{{route('soon')}}">رزروها</a> </li>
                <li id="PaymentOptions" class="paymentOptions"><a style="color: #16174f" href="{{route('soon')}}">پروازها</a> </li>
                @if($mode == "setting")
                    <li id="Settings" style="color: #963019 !important" class="settings">
                @else
                    <li id="Settings" style="color: #16174f" class="settings">
                @endif
                    تنظیمات
                    <div class="settingsArrow"></div>
                    <div class="settingsDropDown" style="width: 200px !important;">
                        <a href="{{URL('accountInfo')}}">اطلاعات کاربر</a>
                        <?php
                            $level = Auth::user()->level;
                        ?>

                        @if($level == 1 || $level == 3)
                            <a title="Control Content" href="{{route('getReports')}}">مدیریت گزارشات</a>
                        @endif

                        @if(Auth::user()->level == 1)
                            <a title="Add meta" href="{{route('addMeta')}}">اضافه کردن meta</a>
                            <a title="Activities" href="{{route('activities')}}">فعالیت ها</a>
                            <a title="Descriptions" href="{{route('descriptions')}}">توضیحات</a>
                            <a title="Places" href="{{route('places')}}">اماکن</a>
                            <a title="Medals" href="{{route('medals')}}">مدال ها</a>
                            <a title="Levels" href="{{route('levels')}}">سطوح</a>
                            <a title="Levels" href="{{route('tripStyles')}}">سبک سفر جدید</a>
                            <a title="ages" href="{{route('placeStyles')}}">سبک مکان</a>
                            <a title="Levels" href="{{route('defaultPics')}}">تصاویر پیش فرض</a>
                            <a title="ages" href="{{route('ages')}}">مدیریت سن ها</a>
                            <a title="tags" href="{{route('tags')}}">تگ ها</a>
                            <a title="ages" href="{{route('picItems')}}">آیتم تصاویر</a>
                            <a title="ages" href="{{route('opinions')}}">مدیریت نظرات</a>
                            <a title="ages" href="{{route('questions')}}">سوالات نظرسنجی</a>
                            <a title="ages" href="{{route('specialAdvice')}}">پیشنهاد های ویژه</a>
                            <a title="ages" href="{{route('reports')}}">گزارشات</a>
                            <a title="ages" href="{{route('goyeshTags')}}">تگ های گویش</a>
                            <a title="ages" href="{{route('ageSentences')}}">توضیحات سن برای بلیط</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
        <script>

            $(document).ready(function() {

                $('#Settings').on({

                    mouseenter: function() {
                        $(".settingsDropDown").show();
                    },
                    mouseleave: function() {
                        $(".settingsDropDown").hide();
                    }
                });


                $('#nameTop').click(function(e) {

                    if( $("#profile-drop").is(":hidden")){
                        $("#profile-drop").show();
                        $("#my-trips-not").hide();
                        $("#alert").hide();
                        $("#bookmarkmenu").hide()

                    }else{
                        $("#profile-drop").hide();
                        $("#my-trips-not").hide();
                        $("#alert").hide();
                        $("#bookmarkmenu").hide()
                    }
                });
                $('#memberTop').click(function(e) {

                    if( $("#profile-drop").is(":hidden")){
                        $("#profile-drop").show();
                        $("#my-trips-not").hide();
                        $("#bookmarkmenu").hide();
                        $("#alert").hide();

                    }else{
                        $("#profile-drop").hide();
                        $("#my-trips-not").hide();
                        $("#bookmarkmenu").hide();
                        $("#alert").hide();
                    }
                });

                $('#bookmarkicon').click(function(e) {

                    if( $("#bookmarkmenu").is(":hidden")){
                        $("#bookmarkmenu").show();
                        $("#my-trips-not").hide();
                        $("#profile-drop").hide();
                        $("#alert").hide();
                        showBookMarks('bookMarksDiv');

                    }else{
                        $("#bookmarkmenu").hide();
                        $("#my-trips-not").hide();
                        $("#profile-drop").hide();
                        $("#alert").hide();
                    }
                });


                $('.notification-bell').click(function(e) {

                    if( $("#alert").is(":hidden")){
                        $("#alert").show();
                        $("#my-trips-not").hide();
                        $("#profile-drop").hide();
                        $("#bookmarkmenu").hide()

                    }else{
                        $("#alert").hide();
                        $("#my-trips-not").hide();
                        $("#profile-drop").hide();
                        $("#bookmarkmenu").hide()
                    }
                });

                $('#close_span_search').click(function(e) {
                    $('#searchspan').animate({height: '0vh'});
                    $("#myCloseBtn").addClass('hidden');
                });

                $('#openSearch').click(function(e) {
                    $("#myCloseBtn").removeClass('hidden');
                    $('#searchspan').animate({height: '100vh'});
                });

            });

            function showBookMarks(containerId) {

                $("#" + containerId).empty();

                $.ajax({
                    type: 'post',
                    url: getBookMarksPath,
                    success: function (response) {

                        response = JSON.parse(response);

                        for(i = 0; i < response.length; i++) {
                            element = "<div>";
                            element += "<a class='masthead-recent-card' target='_self' href='" + response[i].placeRedirect + "'>";
                            element += "<div class='media-left'>";
                            element += "<div class='thumbnail' style='background-image: url(" + response[i].placePic + ");'></div>";
                            element += "</div>";
                            element += "<div class='content-right'>";
                            element += "<div class='poi-title'>" + response[i].placeName + "</div>";
                            element += "<div class='rating'>";
                            element += "<div class='ui_bubble_rating bubble_45'></div><br/>" + response[i].placeReviews + " مشاهده ";
                            element += "</div>";
                            element += "<div class='geo'>" + response[i].placeCity + "</div>";
                            element += "</div>";
                            element += "</a></div>";

                            $("#" + containerId).append(element);
                        }

                    }
                });
            }

            function getRecentlyViews(containerId) {
                $("#" + containerId).empty();

                $.ajax({
                    type: 'post',
                    url: getRecentlyPath,
                    success: function (response) {

                        response = JSON.parse(response);

                        for(i = 0; i < response.length; i++) {
                            element = "<div>";
                            element += "<a class='masthead-recent-card' style='text-align: right !important;' target='_self' href='" + response[i].placeRedirect + "'>";
                            element += "<div class='media-left' style='padding: 0 12px !important; margin: 0 !important;'>";
                            element += "<div class='thumbnail' style='background-image: url(" + response[i].placePic + ");'></div>";
                            element += "</div>";
                            element += "<div class='content-right'>";
                            element += "<div class='poi-title'>" + response[i].placeName + "</div>";
                            element += "<div class='rating'>";

                            if (response[i].placeRate == 5)
                                element += "<div class='ui_bubble_rating bubble_50'></div>";
                            else if (response[i].placeRate == 4)
                                element += "<div class='ui_bubble_rating bubble_40'></div>";
                            else if (response[i].placeRate == 3)
                                element += "<div class='ui_bubble_rating bubble_30'></div>";
                            else if (response[i].placeRate == 2)
                                element += "<div class='ui_bubble_rating bubble_20'></div>";
                            else
                                element += "<div class='ui_bubble_rating bubble_10'></div>";

                            element += "<br/>" + response[i].placeReviews + " نقد ";
                            element += "</div>";
                            element += "<div class='geo'>" + response[i].placeCity + "/ " + response[i].placeState + "</div>";
                            element += "</div>";
                            element += "</a></div>";

                            $("#" + containerId).append(element);
                        }

                    }
                });
            }

            function showRecentlyViews(element) {
                if( $("#my-trips-not").is(":hidden")){
                    $("#alert").hide();
                    $("#my-trips-not").show();
                    $("#profile-drop").hide();
                    $("#bookmarkmenu").hide();
                    getRecentlyViews(element);
                }else{
                    $("#alert").hide();
                    $("#my-trips-not").hide();
                    $("#profile-drop").hide();
                    $("#bookmarkmenu").hide();
                }
            }

            /*****************************************************/

            $('body').on("click", function () {

                $("#profile-drop").hide();
                $("#my-trips-not").hide();
                $("#alert").hide();
                $("#bookmarkmenu").hide();
            });
            $('.global-nav-actions').on("click", function (ev) {

                ev.stopPropagation();
            });
        </script>
        @yield('main')
    </div>
</div>

@include('layouts.placeFooter')
<script>
    function showElement(id) {
        $(".item").addClass('hidden');
        $("#" + id).removeClass('hidden');
    }

    function hideElement(id) {
        $("#" + id).addClass('hidden');
    }

    function showElement2(id) {
        $("#" + id).show();
    }

    function hideElement2(id) {
        $("#" + id).hide();
    }

    var tripStyles = [];

    function toggleTripStyles(id) {

        for(i = 0; i < tripStyles.length; i++) {

            if(tripStyles[i] == id) {
                $("#tripStyle_" + id).css("background-color", 'white').css("color", 'black');
                $("#tripStylePic_" + id).css("visibility", 'hidden');
                tripStyles.splice(i, 1);
                if(tripStyles.length < 3) {
                    $("#submitBtnTripStyle").attr("disabled", true);
                }
                return;
            }

        }

        tripStyles[tripStyles.length] = id;
        $("#tripStyle_" + id).css("background-color", '#4dc7bc').css("color", 'white');
        $("#tripStylePic_" + id).css("visibility", 'visible');
        if(tripStyles.length >= 3) {
            $("#submitBtnTripStyle").attr("disabled", false);
        }
    }

    function closeTripStyles(element) {

        for(i = 0; i < tripStyles.length; i++) {
            $("#tripStylePic_" + tripStyles[i]).css("visibility", "hidden");
        }
        $('.dark').hide();
        hideElement(element);
    }

    var activitiesFetched = [];
    var filters = [[]];
    var contents = [[]];

    function sendAjaxRequestToGiveActivity(activityId, uId, kindPlaceId, menuId, contentId, page, limit) {

        $(".headerActivity").css('color', '#16174f');
        $("#headerActivity_" + activityId).css('color', '#4dc7bc');

        $("#" + menuId).empty();

        var i;

        for(i = 0; i < activitiesFetched.length; i++) {
            if (activitiesFetched[i] == activityId) {
                createFilters(i, activityId, uId, kindPlaceId, menuId, limit);
                createContentOfFilters(i, activityId, uId, kindPlaceId, menuId, contentId, page, limit);
                return;
            }
        }

        activitiesFetched[i] = activityId;
        createContentOfFilters(-1, activityId, uId, kindPlaceId, menuId, contentId, page, limit);

        $.ajax({
            type: 'post',
            url: getActivitiesNumPath,
            data: {
                activityId: activityId,
                uId: uId
            },
            success: function (response2) {

                filters[i] = JSON.parse(response2);
                createFilters(i, activityId, uId, kindPlaceId, menuId, limit);
            }
        });

        $.ajax({
            type: 'post',
            url: getActivitiesPath,
            data: {
                activityId : activityId,
                uId : uId,
                kindPlaceId : kindPlaceId,
                page : page
            },
            success: function (response) {

                if(response == "empty") {
                    contents[i] = [];
                }
                else
                    contents[i] = JSON.parse(response);

                createContentOfFilters(i, activityId, uId, kindPlaceId, menuId, contentId, page, limit);
            }
        });

    }

    function doFilterOnItems(kindPlaceId) {

        $(".subHeaderActivity").css('color', 'rgb(22, 23, 79)');
        $("#subHeaderActivity_" + kindPlaceId).css('color', 'rgb(77, 199, 188)');

        if(kindPlaceId == -1) {
            $(".items").removeClass('hidden');
            return;
        }

        $(".items").addClass('hidden');
        $(".kind_" + kindPlaceId).removeClass('hidden');

    }

    function createFilters(idx, activityId, uId, kindPlaceId, menuId, limit) {

        var i;
        var element;

        element = "<p>فیلترها :</p>";
        element += "<ul>";
        element += "<li class='subHeaderActivity' id='subHeaderActivity_-1' onclick='doFilterOnItems(-1)'>همه</li>";

        for(i = 0; i < filters[idx].length; i++) {
            element += "<li class='subHeaderActivity' id='subHeaderActivity_" + filters[idx][i].placeId + "' onclick='doFilterOnItems(" + filters[idx][i].placeId + ")'>";
            element += "<span>" + filters[idx][i].placeName  + "</span><span> ( </span>" + filters[idx][i].nums + "<span> ) </span>";
            element += "</li>";
        }

        element += "</ul>";
        $("#" + menuId).append(element);
        $(".subHeaderActivity").css('color', '#16174f');

        $("#subHeaderActivity_" + kindPlaceId).css('color', '#4dc7bc');
    }

    function createContentOfFilters(idx, activityId, uId, kindPlaceId, menuId, contentId, page, limit, filterId) {

        var i;
        var element2;

        $("#" + contentId).empty();

        if(idx > -1) {

            for (i = 0; i < contents[idx].length; i++) {

                element2 = "<div class='items kind_" + contents[idx][i].kindPlaceId + "'><div class='cs-header-ratings'>";
                element2 += "<div class='cs-colheader-images'>عکس</div>";
                element2 += "<div class='cs-colheader-date'>تاریخ</div>";
                element2 += "<div class='cs-colheader-location'>نام</div>";
                element2 += "<div class='cs-colheader-points'>خلاصه</div>";
                element2 += "<div class='cs-colheader-rating'>امتیاز</div>";
                element2 += "</div><ul><li class='cs-rating'>";
                element2 += "<div class='cs-rating-thumb' style='z-index: 100'><a href='" + contents[idx][i].placeRedirect + "'><img src='" + contents[idx][i].placePic + "'></a></div>";
                element2 += "<center class='cs-rating-date'>" + contents[idx][i].date + "</center>";
                element2 += "<div class='cs-rating-geo'>" + contents[idx][i].visitorId + "</div>";

                element2 += "<center>";
                if (contents[idx][i].pic != "")
                    element2 += "<div class='cs-rating-location'><a><img style='width: 100%; vertical-align: middle' src='" + contents[idx][i].pic + "'></a></div>";
                else
                    element2 += "<div class='cs-rating-location' style='text-align: center'><a>" + contents[idx][i].text + "</a></div>";
                element2 += "</center>";

                if (contents[idx][i].point != -1) {
                    element2 += "<div class='cs-rating'>";
                    if (contents[idx][i].point == 5)
                        element2 += "<span class='ui_bubble_rating bubble_5'></span>";
                    else if (contents[idx][i].point == 4)
                        element2 += "<span class='ui_bubble_rating bubble_4'></span>";
                    else if (contents[idx][i].point == 3)
                        element2 += "<span class='ui_bubble_rating bubble_3'></span>";
                    else if (contents[idx][i].point == 2)
                        element2 += "<span class='ui_bubble_rating bubble_2'></span>";
                    else
                        element2 += "<span class='ui_bubble_rating bubble_1'></span>";

                    element2 += "</div>";
                }
                else
                    element2 += "<div class='cs-rating'></div>";

                element2 += "<div class='cs-rating-divider'></div>";
                element2 += "</li></ul></div>";
                $("#" + contentId).append(element2);
            }

            element2 = "<div class='cs-pagination-bar'>";
            if (page > 1)
                element2 += "<button onclick='sendAjaxRequestToGiveActivity(" + activityId + "," + uId + ", " + kindPlaceId + ", \"myActivities\", \"myActivitiesContent\", " + (page - 1) + ", " + limit + ")' id='cs-paginate-previous'>قبلی</button>";
            if (page < Math.ceil(limit / 5))
                element2 += "<button onclick='sendAjaxRequestToGiveActivity(" + activityId + "," + uId + ", " + kindPlaceId + ", \"myActivities\", \"myActivitiesContent\", " + (page + 1) + ", " + limit + ")' id='cs-paginate-next'>بعدی</button>";

            element2 += "<div class='cs-pagination-bar-inner' style='direction: ltr'>";

            for (i = 1; i <= Math.ceil(limit / 5); i++) {
                if (i == page)
                    element2 += "<button style='cursor: pointer; color: black' onclick='sendAjaxRequestToGiveActivity(" + activityId + "," + uId + ", " + kindPlaceId + ", \"myActivities\", \"myActivitiesContent\", " + i + ", " + limit + ")' class='cs-paginate-goto active'>" + i + "</button>";
                else
                    element2 += "<button style='cursor: pointer' onclick='sendAjaxRequestToGiveActivity(" + activityId + "," + uId + ", " + kindPlaceId + ", \"myActivities\", \"myActivitiesContent\", " + i + ", " + limit + ")' class='cs-paginate-goto active'>" + i + "</button>";
            }

            element2 += "</div></div>";
        }
        else
            element2 = "<div style='margin-right: 40%' class='loader'></div>";

        $("#" + contentId).append(element2);
    }

    function sendAjaxRequestToGiveTripStyles(uId, containerId) {

        $('.dark').show();

        $("#" + containerId).empty();

        $.ajax({
            type: 'post',
            url: 'getTripStyles',
            data: {
                uId: uId
            },
            success: function (response) {

                response = JSON.parse(response);

                for (i = 0; i < response.length; i++) {

                    element = "<div class='tagContainer'>";
                    element += "<input class='tagSelection' name='memberTag' value='" + response[i].id + "' type='checkbox'>";
                    if (response[i].selected) {
                        element += "<label id='tripStyle_" + response[i].id + "' style='color: white; background-color: #4dc7bc;' class='tag tagBubble' onclick='toggleTripStyles(" + response[i].id + ")'>";

                        element += "<div class='tagText'  style='padding-left: 12px; padding-right: 12px'>" + response[i].name + "</div>";
                        tripStyles[tripStyles.length] = response[i].id;
                    }
                    else {
                        element += "<label id='tripStyle_" + response[i].id + "' class='tag tagBubble' onclick='toggleTripStyles(" + response[i].id + ")'>";

                        element += "<div class='tagText' style='padding-left: 12px; padding-right: 12px'>" + response[i].name + "</div>";
                    }
                    element += "</label>";
                    element += "</div>";

                    $("#" + containerId).append(element);
                }


                if (tripStyles.length >= 3) {
                    $("#submitBtnTripStyle").removeAttr("disabled");
                }

            }
        });
    }

    function updateMyTripStyle(uId, element) {

        $.ajax({
            type: 'post',
            url: 'updateTripStyles',
            data: {
                uId: uId,
                tripStyles : tripStyles
            },
            success: function (response) {
                closeTripStyles(element);
            }
        });
    }

    function sendCode() {

        if($("#phoneNum").val() == "")
            return;

        $.ajax({
            type: 'post',
            url: sendMyInvitationCode,
            data: {
                'phoneNum': $("#phoneNum").val()
            },
            success: function (response) {

                $("#msgContainer").removeClass('hidden');

                if(response == "ok")
                    $("#sendMsg").empty().append("کد معرف شما به شماره مورد نظر ارسال شد");
                else
                    $("#sendMsg").empty().append("از آخرین ارسال شما باید حداقل پنج دقیقه بگذرد");

                $("#sendMsg").removeClass('hidden');
            }
        });

    }
</script>
</body>

</html>