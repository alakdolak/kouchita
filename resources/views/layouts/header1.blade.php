<style>
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
    .glyphicon {
        font-family: 'Glyphicons Halflings' !important;
    }
</style>

<script>
    var getBookMarksPath = '{{route('getBookMarks')}}';
</script>

<?php $user = Auth::user() ?>

<div class="masthead">
    <div id="taplc_global_nav_0" class="ppr_rup ppr_priv_global_nav">
        <div class="global-nav global-nav-single-line has-links ">
            <div class="global-nav-top">
                <div class="global-nav-bar global-nav-green">
                    <div class="ui_container global-nav-bar-container" style="direction: rtl;">
                        <div class="global-nav-hamburger is-hidden-tablet"><span class="ui_icon menu-bars"></span></div>
                        <a href="{{route('main')}}" class="global-nav-logo"><img src="{{URL::asset('images/logo.svg')}}" alt="شازده مسافر" class="global-nav-img global-nav-svg"/></a>
                        <div class="global-nav-links ui_tabs inverted is-hidden-mobile">
                            <div id="taplc_global_nav_links_0" class="ppr_rup ppr_priv_global_nav_links" data-placement-name="global_nav_links">
                                <div class="global-nav-links-container">
                                    <ul class="global-nav-links-menu" style="margin-top: 7px;">
<<<<<<< HEAD
                                        {{--@if($placeMode == "hotel")--}}
                                            {{--<li><a style="color: #963019 !important;" href="{{route('main')}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('main')}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if($placeMode == "restaurant")--}}
                                            {{--<li><a style="color: #963019 !important;" href="{{route('mainMode', ['mode' => 'restaurant'])}}" id="global-nav-vr" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('mainMode', ['mode' => 'restaurant'])}}" id="global-nav-vr" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if($placeMode == "amaken")--}}
                                            {{--<li><a style="color: #963019 !important;" href="{{route('mainMode', ['mode' => 'amaken'])}}" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('mainMode', ['mode' => 'amaken'])}}" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if($placeMode == "ticket")--}}
                                            {{--<li><a style="color: #963019 !important;" href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if($placeMode == "tour")--}}
                                            {{--<li><a style="color: #963019 !important;" href="{{route('mainMode', ['mode' => 'tour'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">تور</a></li>--}}
                                        {{--@else--}}
                                            {{--<li><a href="{{route('mainMode', ['mode' => 'tour'])}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">تور</a></li>--}}
                                        {{--@endif--}}
=======
                                        @if($placeMode == "hotel")
                                            <li><a style="color: #963019 !important;" href="{{route('main')}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>
                                        @else
                                            <li><a href="{{route('main')}}" id="global-nav-hotels" class="unscoped global-nav-link ui_tab " data-tracking-label="hotels">هتل</a></li>
                                        @endif
                                        @if($placeMode == "restaurant")
                                            <li><a style="color: #963019 !important;" href="{{route('mainMode', ['mode' => 'restaurant'])}}" id="global-nav-vr" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>
                                        @else
                                            <li><a href="{{route('mainMode', ['mode' => 'restaurant'])}}" id="global-nav-vr" class="unscoped global-nav-link ui_tab">رستوران ها</a></li>
                                        @endif
                                        @if($placeMode == "amaken")
                                            <li><a style="color: #963019 !important;" href="{{route('mainMode', ['mode' => 'amaken'])}}" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>
                                        @else
                                            <li><a href="{{route('mainMode', ['mode' => 'amaken'])}}" id="global-nav-restaurants" class="unscoped global-nav-link ui_tab">جاذبه ها</a></li>
                                        @endif
                                        @if($placeMode == "ticket")
                                            <li><a style="color: #963019 !important;" href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>
                                        @else
                                            <li><a href="{{route('tickets')}}" class="unscoped global-nav-link ui_tab ">بلیط</a></li>
                                        @endif
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
                                        <li class="" data-element=".masthead-dropdown-Flights"><a href="{{route('soon')}}" class="unscoped global-nav-link ui_tab " data-tracking-label="Flights">جشنواره ها</a></li>
                                        <li class="" data-element=".masthead-dropdown-Flights"><a href="{{route('soon')}}" class="unscoped global-nav-link ui_tab " data-tracking-label="Flights"> آداب و رسوم</a></li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="global-nav-actions" style="display: flex">
                            @if(Auth::check())

                                <div class="ppr_rup ppr_priv_global_nav_action_trips">
                                    <div style="cursor: pointer" id="bookmarkicon" class="ppr_rup ppr_priv_global_nav_action_profile">
                                        <span class="ui_icon casino"></span>
                                    </div>
                                </div>

                                <div class="ppr_rup ppr_priv_global_nav_action_trips">
                                    <div class="masthead-saves" title="سفرهای من و بازدید های اخیر">
                                        <a class="trips-icon">
                                            <span onclick="showRecentlyViews('recentlyViewed')" class="ui_icon my-trips"></span>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="ppr_rup ppr_priv_global_nav_action_trips">
                                    <div id="entryBtnId" class="ppr_rup ppr_priv_global_nav_action_profile">
                                        <div class="global-nav-profile global-nav-utility">
                                            <a class="ui_button secondary small login-button" title="ورود / عضویت">عضویت / ورود</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(Auth::check())

                                <script>
                                    $(document).ready(function () {
                                        getAlertsCount();
                                    });

                                    var locked = false;
                                    var superAccess = false;

                                    function getAlertsCount() {

                                    $.ajax({
                                        type: 'post',
                                        url: '{{route('getAlertsNum')}}',
                                        success: function (response) {
                                            $('#alertPane').empty().append(response);

                                            if(response == 0)
                                                $("#showMoreItemsAlert").addClass('hidden');
                                        }
                                    });
                                }

                                    function scrolled(o) {
                                    //visible height + pixel scrolled = total height
                                    if(o.offsetHeight + o.scrollTop >= o.scrollHeight)  {
                                        if(!locked) {
                                            superAccess = true;
                                            getAlertItems();
                                        }
                                    }
                                    }

                                    function getAlertItems() {

                                    var items = $('#alertItems');
                                    var pane = $('#alert');

                                    if(!superAccess && !pane.hasClass('hidden')) {
                                        pane.addClass('hidden');
                                        return;
                                    }

                                    locked = true;
                                    items.empty();
                                    $("#alertLoader").removeClass('hidden');

                                    $.ajax({
                                        type: 'post',
                                        url: '{{route('getAlerts')}}',
                                        success: function (response) {

                                            response = JSON.parse(response);
                                            var newElement = "";

                                            if(response.length < 5 && response.length > 0)
                                                $("#showMoreItemsAlert").removeClass('hidden');
                                            else
                                                $("#showMoreItemsAlert").addClass('hidden');
                                            for(i = 0; i < response.length; i++) {

                                                if(response[i].url != -1)
                                                    newElement += '<div style="min-height: 60px"><div class="modules-engagement-notification-dropdown"><div style="float: right; margin: 10px; padding-top: 0; height: 50px; margin-top: 0; width: 50px; z-index: 10000000000001 !important;"><img onclick="document.location.href = \'' + response[i].url + '\'" style="margin-top: -10px; cursor: pointer" width="50px" height="50px" src="' + response[i].pic + '"></div><div style="margin-right: 70px" class="notifdd_empty"><span>' + response[i].customText + '</span></div></div></div>';
                                                else
                                                    newElement += '<div onclick="document.location.href = \'{{route('msgs')}}\'" style="cursor: pointer; min-height: 60px"><div class="modules-engagement-notification-dropdown"><div style="float: right; margin: 10px; padding-top: 0; height: 50px; margin-top: 0; width: 50px; z-index: 10000000000001 !important;"></div><div style="margin-right: 70px" class="notifdd_empty"><span>' + response[i].customText + '</span></div></div></div>';
                                            }

                                            if(response.length == 0)
                                                newElement += '<div><div class="modules-engagement-notification-dropdown"><div class="notifdd_empty">هیچ پیامی موجود نیست </div></div></div>';
                                            else
                                                getAlertsCount();

                                            locked = false;
                                            superAccess = false;
                                            pane.removeClass('hidden');
                                            $("#alertLoader").addClass('hidden');
                                            items.empty().append(newElement);
                                        }
                                    });
                                }

                                </script>
                            @endif

                            <style>

                                    .ui_jewel.marked_for_attention:before {
                                        display: block;
                                        position: absolute;
                                        top: -1.05em;
                                        left: .025em;
                                        width: 100%;
                                        height: 100%;
                                        font-size: 2em;
                                        line-height: 1;
                                        font-family: sans-serif;
                                        color: #fff;
                                        content: '\00b7';
                                    }
                                    DIV.ppr_rup.ppr_priv_global_nav_action_inbox .ui_jewel {
                                        height: 16px;
                                        left: 15px;
                                        cursor: pointer;
                                    }
                                    .ui_jewel.marked_for_attention {
                                        min-height: 16px;
                                        position: absolute;
                                        z-index: 1;
                                        top: 6px;
                                        right: auto;
                                        bottom: auto;
                                        left: 12px;
                                    }
                                    .ui_jewel {
                                        display: inline-block;
                                        min-width: 16px;
                                        padding: 3px 5px;
                                        border-radius: 100%;
                                        box-sizing: border-box;
                                        background-color: #EF6945;
                                        font-weight: bold;
                                        font-size: 10px;
                                        line-height: 1;
                                        color: #fff;
                                        text-align: center;
                                        vertical-align: middle;
                                    }
                        </style>

                            <div id="alertBtn" onclick="getAlertItems()" class="ppr_rup ppr_priv_global_nav_action_notif">
                                <div class="masthead_notification" title="اعلانات">
                                    <div class="masthead_notifctr_btn">
                                        <div class="masthead_notifctr_sprite ui_icon notification-bell"></div>
                                        <div id="alertPane" class="ui_jewel marked_for_attention">0</div>
                                        <div id="alert" class="masthead_notifctr_dropdown hidden" style="z-index: 100000000001 !important; left: -10px !important; top: 40px !important">
                                            <div class="notifdd_title">پیام ها</div>

                                            <div id="alertLoader" class="notifdd_loading hidden">
                                                <div class="ui_spinner"></div>
                                            </div>

                                            <div onscroll="scrolled(this)" style="max-height: 405px; overflow: auto" id="alertItems"></div>
                                            <div onclick="superAccess = true; getAlertItems();" id="showMoreItemsAlert" style="background-color: transparent; color: black; border: none; width: 100%" class="btn btn-success"> نمایش موارد بیشتر</div>

                                        </div>
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

                            <div class="ppr_rup ppr_priv_global_nav_action_profile">
                                <div class="global-nav-profile global-nav-utility">
                                    @if(Auth::check())
                                        <div class="global-nav-utility-activator" title="صفحه کاربری">
                                            <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                            <span id="memberTop" class="name">{{$user->username}}</span>
                                        </div>
                                    @endif
                                    <div style="z-index: 1000000000000 !important;" class="global-nav-overlays-container"> <div id="profile-drop" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility" style="display:none; position: absolute; bottom: auto; z-index: 10000; background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 0px 18px; left: -13px; top: 43px;box-shadow: 0 4px 16px 0 rgba(0,0,0,0.2);"><ul class="global-nav-profile-menu">
                                                <li class="subItem"><a href="{{URL('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">صفحه کاربری</a></li>
                                                <li class="subItem rule"><a href="{{route('soon')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_bookings">رزروها</a></li>
                                                <li class="subItem "><a href="{{route('soon')}}" class="subLink" data-tracking-label="UserProfile_inbox">پروازها</a></li>
                                                <li class="subItem rule"><a href="{{URL('messages')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">پیام ها</a> </li>
                                                <li class="subItem"><a href="{{URL('accountInfo')}}" class="subLink" data-tracking-label="UserProfile_settings">اطلاعات کاربر </a></li>
                                                <li class="subItem"><a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">خروج</a></li>
                                            </ul></div>
                                    </div>
                                </div>
                            </div>

                            <div class="global-nav-overlays-container">
                                @include('layouts.recentlyViewAndMyTripsInMain')
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
                                <div class="sidebar-nav-profile-linker">
                                    <a href="" class="global-nav-profile-linker">
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
    <!--etk-->
</div>

@include('layouts.pop-up-create-trip')

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