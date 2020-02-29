<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=1')}}' data-rup='long_lived_global_legacy'/>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/placeHeader.css')}}' data-rup='long_lived_global_legacy'/>
{{--<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css')}}' data-rup='long_lived_global_legacy'/>--}}

<script>
    var getBookMarksPath = '{{route('getBookMarks')}}';
</script>

<?php $user = Auth::user() ?>

<div class="masthead position-relative">
    <div class="ppr_rup ppr_priv_global_nav position-relative">
        <div class="global-nav global-nav-single-line position-relative">
            <div class="global-nav-top position-relative">
                <div class="global-nav-bar global-nav-green">
                    <div class="ui_container global-nav-bar-container direction-rtl position-relative">
                        <div class="global-nav-hamburger is-hidden-tablet">
                            <span class="ui_icon menu-bars"></span>
                        </div>

                        <a href="{{route('main')}}" class="global-nav-logo">
                            <img src="{{URL::asset('images/logo.png')}}" alt="کوچیتا" class="global-nav-img global-nav-svg"/>
                        </a>

                        <div class="global-nav-links ui_tabs inverted">
                            <div id="taplc_global_nav_links_0" class="ppr_rup ppr_priv_global_nav_links" data-placement-name="global_nav_links">
                                <div class="global-nav-links-container">
                                    <ul class="global-nav-links-menu">

{{--                                        @if($placeMode == "hotel")--}}
{{--                                            <li><a href="{{route('hotelList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-hotels" class="dark-redImp unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>--}}
{{--                                        @elseif($placeMode != "policies")--}}
{{--                                            <li><a href="{{route('hotelList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab color-whiteImp" data-tracking-label="hotels">هتل</a></li>--}}
{{--                                        @else--}}
                                            <li><a href="{{route('mainMode', ['mode' => 'hotel'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab color-whiteImp" data-tracking-label="hotels">هتل</a></li>
{{--                                        @endif--}}
{{--                                        @if($placeMode == "restaurant")--}}
{{--                                            <li><a href="{{route('restaurantList', ['city' => $state, 'mode' => 'state'])}}"  id="global-nav-restaurants" class="dark-redImp unscoped global-nav-link ui_tab">رستوران‌ها</a></li>--}}
{{--                                        @elseif($placeMode != "policies")--}}
{{--                                            <li><a href="{{route('restaurantList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab color-whiteImp">رستوران‌ها</a></li>--}}
{{--                                        @else--}}
                                            <li><a href="{{route('mainMode', ['mode' => 'restaurant'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab color-whiteImp" data-tracking-label="hotels">رستوران‌ها</a></li>
{{--                                        @endif--}}
{{--                                        @if($placeMode == "amaken")--}}
{{--                                            <li><a href="{{route('amakenList', ['city' => $state, 'mode' => 'state'])}}"  id="global-nav-amaken" class="dark-redImp unscoped global-nav-link ui_tab">جاذبه‌ها</a></li>--}}
{{--                                        @elseif($placeMode != "policies")--}}
{{--                                            <li><a href="{{route('amakenList', ['city' => $state, 'mode' => 'state'])}}" id="global-nav-amaken" class="unscoped global-nav-link ui_tab color-whiteImp">جاذبه‌ها</a></li>--}}
{{--                                        @else--}}
                                            <li><a href="{{route('mainMode', ['mode' => 'amaken'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab color-whiteImp" data-tracking-label="hotels">جاذبه‌ها</a></li>
{{--                                        @endif--}}
{{--                                        @if($placeMode == "ticket")--}}
{{--                                            <li><a  href="{{route('tickets')}}" class="dark-redImp unscoped global-nav-link ui_tab ">بلیط</a></li>--}}
{{--                                        @else--}}
                                            <li><a href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab color-whiteImp">بلیط</a></li>
{{--                                        @endif--}}

                                        <li class="" data-element=".masthead-dropdown-Flights"><a href="{{route('soon')}}" class="unscoped global-nav-link ui_tab color-whiteImp" data-tracking-label="Flights">جشنواره‌ها</a></li>
                                        <li class="" data-element=".masthead-dropdown-Flights"><a href="" class="unscoped global-nav-link ui_tab color-whiteImp" data-tracking-label="Flights"> آداب و رسوم</a></li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="global-nav-actions position-relative" >
                            @if(Auth::check())
                                <div class="ppr_rup ppr_priv_global_nav_action_trips position-relative">
                                    <div id="targetHelp_1" class="targets">
                                        <div id="bookmarkicon" class="ppr_rup ppr_priv_global_nav_action_profile">
                                            <span class="ui_icon casino"></span>
                                        </div>
                                        <div id="helpSpan_1" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12">شاید بعدا بخواهید دوباره به همین مکان باز گردید. پس آن را نشان کنید تا از منوی بالا هر وقت که خواستید دوباره به آن باز گردید.</p>
                                            <div class="col-xs-12">
                                                <button data-val="1" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_1">بعدی</button>
                                                <button data-val="1" class="btn btn-primary backBtnsHelp" id="backBtnHelp_1">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ppr_rup ppr_priv_global_nav_action_trips position-relative">
                                    <div id="targetHelp_2" class="targets">
                                        <div class="masthead-saves" title="My Trips and Recently Viewed">
                                            <a class="trips-icon">
                                                <span onclick="showRecentlyViews('recentlyViewed')" class="ui_icon my-trips"></span>
                                            </a>
                                        </div>
                                        <div id="helpSpan_2" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12">سفر های خود و بازدید های اخیرتان را به سادگی از این چک کنید. خیلی ساده است.</p>
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
                                    <div id="targetHelp_4" class="targets">
                                        <div id="entryBtnId" class="ppr_rup ppr_priv_global_nav_action_profile">
                                            <div class="global-nav-profile global-nav-utility">
                                                <a class="ui_button secondary small login-button" title="Join">عضویت / ورود</a>
                                            </div>
                                        </div>
                                        <div id="helpSpan_4" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12">پیام های خود را به سادگی از اینجا دنبال کنید.</p>
                                            <div class="col-xs-12">
                                                <button data-val="4" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_4">بعدی</button>
                                                <button data-val="4" class="btn btn-primary backBtnsHelp" id="backBtnHelp_4">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div id="taplc_global_nav_action_notif_0" class="ppr_rup ppr_priv_global_nav_action_notif position-relative">
                                <div id="targetHelp_3" class="targets">
                                    <div class="masthead_notification" title="Alerts">
                                        <div class="masthead_notifctr_btn">
                                            <div class="masthead_notifctr_sprite ui_icon notification-bell"></div>
                                            <div class="masthead_notifctr_jewel hidden">0</div>
                                        </div>
                                        <div id="alert" class="masthead_notifctr_dropdown"><div class="notifdd_title">پیام ها</div>
                                            <div class="notifdd_loading hidden">
                                                <div class="ui_spinner"></div>
                                            </div>
                                            <div>
                                                <div class="modules-engagement-notification-dropdown " data-backbone-name="modules.engagement.NotificationDropdown" data-backbone-context="Engagement_MemberNotifications">
                                                    <div class="notifdd_empty">هیچ پیامی موجود نیست </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="helpSpan_3" class="helpSpans hidden row">
                                        <span class="introjs-arrow"></span>
                                        <p class="col-xs-12">پیام های خود را به سادگی از اینجا دنبال کنید.</p>
                                        <div class="col-xs-12">
                                            <button data-val="3" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_3">بعدی</button>
                                            <button data-val="3" class="btn btn-primary backBtnsHelp" id="backBtnHelp_3">قبلی</button>
                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="taplc_global_nav_action_profile_0" class="ppr_rup ppr_priv_global_nav_action_profile position-relative">
                                <div class="global-nav-profile global-nav-utility position-relative">
                                    @if(Auth::check())
                                        <div id="targetHelp_5" class="targets" title="Profile" class="position-relative">
                                            <div class="global-nav-utility-activator" title="Profile">
                                                <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                                <span id="nameTop" class="username">{{$user->username}}</span>
                                            </div>
                                            <div id="helpSpan_5" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p class="col-xs-12">پروفایل خود را چک کنید تا ببینید چه امتیاز های هیجان انگیزی می توانید کسب کنید. هر کمک شما به بی جواب نمی ماند.</p>
                                                <div class="col-xs-12">
                                                    <button data-val="5" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_5">بعدی</button>
                                                    <button data-val="5" class="btn btn-primary backBtnsHelp" id="backBtnHelp_5">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="global-nav-overlays-container">
                                        <div id="profile-drop" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility">
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

                            <div id="taplc_masthead_search_0" class="ppr_rup ppr_priv_masthead_search position-relative" data-placement-name="masthead_search">
                                <div class="mag_glass_parent position-relative" title="Search">
                                    <div id="targetHelp_6" class="targets">
                                        <span class="ui_icon search" id="openSearch"></span>
                                        <div id="helpSpan_6" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p class="col-xs-12">اگر دنبال پیدا کردن جای دیگری هستید حتما سیستم جستجوی پیشرفته ما را امتحان کنید.</p>
                                            <div class="col-xs-12">
                                                <button data-val="6" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_6">بعدی</button>
                                                <button data-val="6" class="btn btn-primary backBtnsHelp" id="backBtnHelp_6">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clear-both"></div>
                    </div>
                </div>

                <div class="modules-membercenter-persistent-header-achievements profileHeader hideOnPhone">
                    <ul class="persistent-header position-relative">
                        <li id="Profile" class="profile">
                            <a id="profileLinkColor1" href="http://localhost/kouchita/public/profile">صفحه کاربری</a>
                        </li>
                        <li id="BadgeCollection" class="badgeCollection">
                            <a id="BadgeCollectionLinkColor2" href="http://localhost/kouchita/public/badge">مدال‌های گردشگری</a>
                        </li>
                        <li class="travelMap targets position-relative" id="targetHelp_5">
                            <a href="http://localhost/kouchita/public/soon">سفرنامه من</a>
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
                        <li id="Messages" class="messages">
                            <a id="messageLinkColor2" href="http://localhost/kouchita/public/messages">پیام‌ها</a>
                        </li>
                        <li id="Settings" class="settingColor2 settings">
                            تنظیمات
                            <div class="settingsArrow"></div>
                            <div class="settingsDropDown" id="settingDropDownMainDiv">
                                <a href="http://localhost/kouchita/public/accountInfo">اطلاعات کاربر</a>

                                <a title="Control Content" href="http://localhost/kouchita/public/getReports2">مدیریت گزارشات</a>


                            </div>
                        </li>
                    </ul>
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
                            <a href="/" class="global-nav-logo"><img src='{{URL::asset('images/logo.png')}}' alt="کوچیتا" class="global-nav-img"/></a>
                        </div>
                        <div class="sidebar-nav-profile-container">
                            @if(Auth::check())
                                <div class="sidebar-nav-profile-linker position-relative">
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
            <div class="clear-both"></div>
        </div>
    </div>
</div>

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