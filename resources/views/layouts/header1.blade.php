<script>
    var getBookMarksPath = '{{route('getBookMarks')}}';
</script>

<?php $user = Auth::user() ?>

<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/header1.css')}}">
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>

<div class="masthead">
    <div id="taplc_global_nav_0" class="ppr_rup ppr_priv_global_nav">
        <div class="global-nav global-nav-single-line">
            <div class="global-nav-top">
                <div class="global-nav-bar global-nav-green">
                    <div class="ui_container global-nav-bar-container rtl" >
                        <div class="global-nav-hamburger is-hidden-tablet">
                            <span class="ui_icon menu-bars"></span>
                        </div>
                        <a href="{{route('main')}}" class="global-nav-logo">
                            <img src="{{URL::asset('images/logo.png')}}" alt="کوچیتا" class="global-nav-img global-nav-svg"/>
                        </a>
                        <div class="global-nav-links ui_tabs inverted is-hidden-mobile">
                            <div id="taplc_global_nav_links_0" class="ppr_rup ppr_priv_global_nav_links" data-placement-name="global_nav_links">
                                <div class="global-nav-links-container">
                                    <ul class="global-nav-links-menu headerMainList">
                                        <li>
                                            <span id="global-nav-hotels" class="unscoped global-nav-link ui_tab" onclick="openMainSearch(4) // in main.blade.php" data-tracking-label="hotels">هتل</span>
                                        </li>
                                        <li>
                                            <span id="global-nav-vr" class="unscoped global-nav-link ui_tab" onclick="openMainSearch(3) // in main.blade.php">رستوران</span>
                                        </li>
                                        <li>
                                            <span id="global-nav-restaurants" class="unscoped global-nav-link ui_tab" onclick="openMainSearch(1) // in main.blade.php">جاذبه</span>
                                        </li>
                                        <li class="" data-element=".masthead-dropdown-Flights">
                                            <span class="unscoped global-nav-link ui_tab " onclick="openMainSearch(10) // in main.blade.php">سوغات و صنایع دستی</span>
                                        </li>
                                        <li class="" data-element=".masthead-dropdown-Flights">
                                            <span class="unscoped global-nav-link ui_tab" onclick="openMainSearch(11) // in main.blade.php">غذای محلی</span>
                                        </li>
                                        <li>
                                            <a href="{{route('soon')}}" class="unscoped global-nav-link ui_tab " data-tracking-label="Flights">بوم‌گردی</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="global-nav-actions flex" >

                            @if(Auth::check())

                                <div class="ppr_rup ppr_priv_global_nav_action_trips">
                                    <div id="bookmarkicon" class="ppr_rup ppr_priv_global_nav_action_profile">
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

                            <div id="taplc_masthead_search_0" class="ppr_rup ppr_priv_masthead_search position-relative" data-placement-name="masthead_search">
                                <div class="mag_glass_parent position-relative" title="Search">
                                    <div id="targetHelp_6" class="targets">
                                        <span class="ui_icon search" id="openSearch"></span>
                                    </div>
                                </div>
                            </div>

                            <div id="alertBtn" onclick="getAlertItems()" class="ppr_rup ppr_priv_global_nav_action_notif">
                                <div class="masthead_notification" title="اعلانات">
                                    <div class="masthead_notifctr_btn">
                                        <div class="masthead_notifctr_sprite ui_icon notification-bell"></div>
                                        <div id="alertPane" class="ui_jewel marked_for_attention">0</div>
                                        <div id="alert" class="masthead_notifctr_dropdown hidden">
                                            <div class="notifdd_title">پیام ها</div>

                                            <div id="alertLoader" class="notifdd_loading hidden">
                                                <div class="ui_spinner"></div>
                                            </div>

                                            <div onscroll="scrolled(this)" id="alertItems"></div>
                                            <div onclick="superAccess = true; getAlertItems();" id="showMoreItemsAlert" class="btn btn-success"> نمایش موارد بیشتر</div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ppr_rup ppr_priv_global_nav_action_profile">
                                <div class="global-nav-profile global-nav-utility">
                                    @if(Auth::check())
                                        <div class="global-nav-utility-activator" title="صفحه کاربری">
                                            <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                            <span id="memberTop" class="username">{{$user->username}}</span>
                                        </div>
                                    @endif
                                    <div id="profile-drop-mainDiv" class="global-nav-overlays-container">
                                        <div id="profile-drop" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility">
                                            <ul class="global-nav-profile-menu">
                                                <li class="subItem">
                                                    <a href="{{URL('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">صفحه کاربری</a>
                                                </li>
                                                <li class="subItem rule">
                                                    <a href="{{route('soon')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_bookings">رزروها</a>
                                                </li>
                                                <li class="subItem ">
                                                    <a href="{{route('soon')}}" class="subLink" data-tracking-label="UserProfile_inbox">پروازها</a>
                                                </li>
                                                <li class="subItem rule">
                                                    <a href="{{URL('messages')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">پیام ها</a>
                                                </li>
                                                <li class="subItem">
                                                    <a href="{{URL('accountInfo')}}" class="subLink" data-tracking-label="UserProfile_settings">اطلاعات کاربر </a>
                                                </li>
                                                <li class="subItem">
                                                    <a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">خروج</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="global-nav-overlays-container">--}}
                                {{--@include('layouts.recentlyViewAndMyTripsInMain')--}}
                            {{--</div>--}}
                        </div>

                        <div class="collapseBtnActions" onclick="headerActionsToggle()">
{{--                            <div class="linesCollapseBtn"></div>--}}
{{--                            <div class="linesCollapseBtn"></div>--}}
{{--                            <div class="linesCollapseBtn"></div>--}}
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
                            <a href="/" class="global-nav-logo">
                                <img src='{{URL::asset('images/logo.png')}}' alt="کوچیتا" class="global-nav-img"/>
                            </a>
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
    
    function headerActionsToggle() {

        $('.collapseBtnActions').animate({transform: 'rotate(90deg)'})


        if($('.global-nav-actions').hasClass('display-flexImp')) {

            $('.global-nav-actions').animate({width: "0"},
                function () {
                    $('.global-nav-actions').toggleClass('display-flexImp');
                });
        }
        else {
            $('.global-nav-actions').animate({width: "270px"});
            $('.global-nav-actions').toggleClass('display-flexImp');
        }
    }

</script>

@if(Auth::check())
    <script>
        var locked = false;
        var superAccess = false;

        $(document).ready(function () {
            getAlertsCount();
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
                            newElement += '<div id="notificationBox"><div class="modules-engagement-notification-dropdown"><div><img onclick="document.location.href = \'' + response[i].url + '\'" width="50px" height="50px" src="' + response[i].pic + '"></div><div class="notifdd_empty"><span>' + response[i].customText + '</span></div></div></div>';
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