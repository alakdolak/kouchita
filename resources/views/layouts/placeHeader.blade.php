<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=1')}}' data-rup='long_lived_global_legacy'/>

<script>
    var getBookMarksPath = '{{route('getBookMarks')}}';
</script>

<style>

    #masthead-recent {
        background-color: #4dc7bc;
    }

    .bubble_40:after {
        content: "\e00d\e00b\e00b\e00b\e00b" !important;
    }
    .bubble_30:after {
        content: "\e00d\e00d\e00b\e00b\e00b" !important;
    }
    .bubble_20:after {
        content: "\e00d\e00d\e00d\e00b\e00b" !important;
    }
    .bubble_10:after {
        content: "\e00d\e00d\e00d\e00d\e00b" !important;
    }
    .photoviewerSidebarWrapper .captionArea{
        direction: rtl !important;
    }
    .photoviewerSidebarWrapper .location{
        text-align: center;
    }
    .global-nav-bar-container .ui_icon{
        color: #FFF;
    }
    .global-nav-bar-container .ui_tab{
        color: #FFF !important;
    }
    .global-nav-actions .ui_icon{
        color: #FFF !important;
    }
    #nameTop{
        color: #FFF !important;
    }
    .global-nav-profile-menu .subItem a:hover{
        background: transparent !important;
    }

    @media (max-width: 1023px) and (min-width: 768px) {
        .global-nav-bar-container .ui_tab {

            color: #000 !important;
        }
    }
    @media (max-width: 1023px) and (min-width: 768px) {
        .is-hidden-mobile {
            display: none!important;
        }
    }
</style>

<?php $user = Auth::user() ?>

<div class="masthead" style="position: relative">
    <div class="ppr_rup ppr_priv_global_nav" style="position: relative">
        <div class="global-nav global-nav-single-line has-links" style="position: relative">
            <div class="global-nav-top" style="position: relative">
                <div class="global-nav-bar global-nav-green" style="background-color: #4DC7BC !important; position: relative;">
                    <div class="ui_container global-nav-bar-container" style="direction: rtl; position: relative;">
                        <div class="global-nav-hamburger is-hidden-tablet"><span class="ui_icon menu-bars"></span></div>

                        <a href="{{route('main')}}" class="global-nav-logo"><img src="{{URL::asset('images/logo.svg')}}" alt="شازده مسافر" class="global-nav-img global-nav-svg"/></a>

                        <div class="global-nav-links ui_tabs inverted">
                            <div id="taplc_global_nav_links_0" class="ppr_rup ppr_priv_global_nav_links" data-placement-name="global_nav_links">
                                <div class="global-nav-links-container">
                                    <ul class="global-nav-links-menu" style="margin-top: 7px;">

<<<<<<< HEAD
                                        {{--@if($placeMode == "hotel")--}}
                                            {{--<li><a href="{{route('hotelList', ['city' => $state, 'mode' => 'state'])}}" style="color: #963019 !important;" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>--}}
                                        {{--@elseif($placeMode != "policies")--}}
                                            {{--<li><a href="{{route('hotelList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('mainMode', ['mode' => 'hotel'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if($placeMode == "restaurant")--}}
                                            {{--<li><a href="{{route('restaurantList', ['city' => $state, 'mode' => 'state'])}}" style="color: #963019 !important;" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>--}}
                                        {{--@elseif($placeMode != "policies")--}}
                                            {{--<li><a href="{{route('restaurantList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('mainMode', ['mode' => 'restaurant'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">رستوران ها</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if($placeMode == "amaken")--}}
                                            {{--<li><a href="{{route('amakenList', ['city' => $state, 'mode' => 'state'])}}" style="color: #963019 !important;" id="global-nav-amaken" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>--}}
                                        {{--@elseif($placeMode != "policies")--}}
                                            {{--<li><a href="{{route('amakenList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-amaken" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('mainMode', ['mode' => 'amaken'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">جاذبه ها</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if($placeMode == "ticket")--}}
                                            {{--<li><a style="color: #963019 !important;" href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>--}}
                                        {{--@endif--}}
=======
                                        @if($placeMode == "hotel")
                                            <li><a href="{{route('hotelList', ['city' => $state, 'mode' => 'state'])}}" style="color: #963019 !important;" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>
                                        @elseif($placeMode != "policies")
                                            <li><a href="{{route('hotelList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>
                                        @else
                                            <li><a href="{{route('mainMode', ['mode' => 'hotel'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>
                                        @endif
                                        @if($placeMode == "restaurant")
                                            <li><a href="{{route('restaurantList', ['city' => $state, 'mode' => 'state'])}}" style="color: #963019 !important;" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>
                                        @elseif($placeMode != "policies")
                                            <li><a href="{{route('restaurantList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>
                                        @else
                                            <li><a href="{{route('mainMode', ['mode' => 'restaurant'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">رستوران ها</a></li>
                                        @endif
                                        @if($placeMode == "amaken")
                                            <li><a href="{{route('amakenList', ['city' => $state, 'mode' => 'state'])}}" style="color: #963019 !important;" id="global-nav-amaken" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>
                                        @elseif($placeMode != "policies")
                                            <li><a href="{{route('amakenList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-amaken" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>
                                        @else
                                            <li><a href="{{route('mainMode', ['mode' => 'amaken'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">جاذبه ها</a></li>
                                        @endif
                                        @if($placeMode == "ticket")
                                            <li><a style="color: #963019 !important;" href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>
                                        @else
                                            <li><a href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>
                                        @endif
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
                                        <li class="" data-element=".masthead-dropdown-Flights"><a href="{{route('soon')}}" class="unscoped global-nav-link ui_tab " data-tracking-label="Flights">جشنواره ها</a></li>
                                        <li class="" data-element=".masthead-dropdown-Flights"><a href="" class="unscoped global-nav-link ui_tab " data-tracking-label="Flights"> آداب و رسوم</a></li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="global-nav-actions" style="position: relative">
                            @if(Auth::check())
                                <div class="ppr_rup ppr_priv_global_nav_action_trips" style="position: relative">
                                    <div id="targetHelp_1" class="targets">
                                        <div style="cursor: pointer;" id="bookmarkicon" class="ppr_rup ppr_priv_global_nav_action_profile">
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
                                </div>
                                <div class="ppr_rup ppr_priv_global_nav_action_trips" style="position: relative">
                                    <div id="targetHelp_2" class="targets">
                                        <div class="masthead-saves" title="My Trips and Recently Viewed">
                                            <a class="trips-icon">
                                                <span onclick="showRecentlyViews('recentlyViewed')" class="ui_icon my-trips"></span>
                                            </a>
                                        </div>
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
                                <div class="ppr_rup ppr_priv_global_nav_action_trips" style="position: relative">
                                    <div id="targetHelp_4" class="targets">
                                        <div id="entryBtnId" class="ppr_rup ppr_priv_global_nav_action_profile">
                                            <div class="global-nav-profile global-nav-utility">
                                                <a class="ui_button secondary small login-button" title="Join">عضویت / ورود</a>
                                            </div>
                                        </div>
                                        <div id="helpSpan_4" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12" style="line-height: 1.428 !important;">پیام های خود را به سادگی از اینجا دنبال کنید.</p>
                                            <div class="col-xs-12">
                                                <button data-val="4" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_4">بعدی</button>
                                                <button data-val="4" class="btn btn-primary backBtnsHelp" id="backBtnHelp_4">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div id="taplc_global_nav_action_notif_0" class="ppr_rup ppr_priv_global_nav_action_notif" style="position: relative">
                                <div id="targetHelp_3" class="targets">
                                    <div class="masthead_notification" title="Alerts">
                                        <div class="masthead_notifctr_btn">
                                            <div class="masthead_notifctr_sprite ui_icon notification-bell"></div>
                                            <div class="masthead_notifctr_jewel hidden">0</div>
                                        </div>
                                        <div id="alert" class="masthead_notifctr_dropdown" style="left: -10px !important; top: 40px !important; display: none;"><div class="notifdd_title">پیام ها</div> <div class="notifdd_loading hidden"><div class="ui_spinner"></div></div><div><div class="modules-engagement-notification-dropdown " data-backbone-name="modules.engagement.NotificationDropdown" data-backbone-context="Engagement_MemberNotifications"><div class="notifdd_empty">هیچ پیامی موجود نیست </div></div></div>
                                        </div>
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
                                </style>
                            </div>

                            <style>
                                .dropMenu .subLink:hover,
                                .dropMenu .subItem .subLink:hover,
                                .dropMenu .taLnk:hover a,
                                .subItem .subLink:hover,
                                .subItemNoLink .subNoLink:hover,
                                .expandSubItem .expandSubLink:hover {
                                    color: #16174f !important;

                                }

                            </style>

                            <div id="taplc_global_nav_action_profile_0" class="ppr_rup ppr_priv_global_nav_action_profile" style="position: relative">
                                <div class="global-nav-profile global-nav-utility" style="position: relative">
                                    @if(Auth::check())
                                        <div id="targetHelp_5" class="targets" title="Profile" style="position: relative">
                                            <div class="global-nav-utility-activator" title="Profile">
                                                <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                                <span id="nameTop" class="name">{{$user->username}}</span>
                                            </div>
                                            <div id="helpSpan_5" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p class="col-xs-12" style="line-height: 1.428 !important;">پروفایل خود را چک کنید تا ببینید چه امتیاز های هیجان انگیزی می توانید کسب کنید. هر کمک شما به بی جواب نمی ماند.</p>
                                                <div class="col-xs-12">
                                                    <button data-val="5" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_5">بعدی</button>
                                                    <button data-val="5" class="btn btn-primary backBtnsHelp" id="backBtnHelp_5">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="global-nav-overlays-container">
                                        <div id="profile-drop" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility" style="display:none; position: absolute; bottom: auto; z-index: 10000; background: none 0% 0% repeat scroll rgb(255, 255, 255); padding: 0px 18px; left: 20px; top: 43px;box-shadow: 0 4px 16px 0 rgba(0,0,0,0.2);">
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

                            <div id="taplc_masthead_search_0" class="ppr_rup ppr_priv_masthead_search" data-placement-name="masthead_search" style="position: relative">
                                <div class="mag_glass_parent" title="Search" style="position: relative">
                                    <div class="separator"></div>
                                    <div id="targetHelp_6" class="targets">
                                        <span class="ui_icon search" id="openSearch"></span>
                                        <div id="helpSpan_6" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12" style="line-height: 1.428 !important;">اگر دنبال پیدا کردن جای دیگری هستید حتما سیستم جستجوی پیشرفته ما را امتحان کنید.</p>
                                            <div class="col-xs-12">
                                                <button data-val="6" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_6">بعدی</button>
                                                <button data-val="6" class="btn btn-primary backBtnsHelp" id="backBtnHelp_6">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="global-nav-overlays-container">
                                @include('layouts.recentlyViewAndMyTripsInDetails')
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
                        <div class="sidebar-nav-profile-container">
                            @if(Auth::check())
                                <div class="sidebar-nav-profile-linker" style="position: relative">
                                    <a class="global-nav-profile-linker">
                                        <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                        <div class="profile-link">
                                            <div class="profile-name">{{$user->username}}</div>
                                            <div class="profile-link-text">صفحه کاربری</div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            <p class="sidebar-nav-title">اکانت من</p>
                            <div class="sidebar-nav-profile">
                                <li class="subItem"><a href="{{route('soon')}}" class="subLink global-nav-submenu-divided">سفرهای من</a></li>
                                <li class="subItem"><a href="{{route('soon')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_ManagementCenter">رزروها</a></li>
                                <li class="subItem"><a href="{{route('soon')}}" class="subLink" data-tracking-label="UserProfile_inbox">پروازها</a></li>
                                <li class="subItem"><a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">خروج</a></li>
                            </div>
                        </div>
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

@include('layouts.proSearch')

<script>
        $(document).ready(function(){

            $(".menu-bars").click(function(){
                $("#menu_res").removeClass('off-canvas');
            });

            $("#close_menu_res").click(function(){

                $("#menu_res").addClass('off-canvas');
            });
        });
</script>

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