<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/placeHeader.css')}}' data-rup='long_lived_global_legacy'/>
<link rel="stylesheet" type='text/css' href="{{URL::asset('css/common/header.css')}}">

<?php
    if(auth()->check())
        $user = auth()->user();
?>

<div class="masthead position-relative">
    <div class="ppr_rup ppr_priv_global_nav position-relative">
        <div class="global-nav global-nav-single-line position-relative">
            <div class="global-nav-top position-relative">
                <div class="global-nav-bar global-nav-green" style="padding-top: 5px;">
                    <div class="ui_container global-nav-bar-container direction-rtl position-relative">
                        <div class="global-nav-hamburger is-hidden-tablet">
                            <span class="ui_icon menu-bars"></span>
                        </div>

                        <a href="{{route('main')}}" class="global-nav-logo" style="display: flex; align-items: center">
                            <img src="{{URL::asset('images/icons/mainLogo.png')}}" alt="کوچیتا" style="width: auto; height: 70%;"/>
                        </a>

                        <div class="global-nav-links ui_tabs inverted" style="display: flex; align-items: center">
                            <div id="taplc_global_nav_links_0" class="ppr_rup ppr_priv_global_nav_links" data-placement-name="global_nav_links">
                                <div class="global-nav-links-container">
                                    <ul class="global-nav-links-menu">
                                        <li>
                                            <span class="unscoped global-nav-link ui_tab color-whiteImp" onclick="openMainSearch(4)// in mainSearch.blade.php">اقامتگاه</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="global-nav-actions position-relative" >
                            @if(Auth::check())
                                <a href="{{route('streaming.uploadPage')}}" class="ppr_rup ppr_priv_global_nav_action_trips" style="margin-left: 10px; line-height: 1.5; display: flex; align-items: center;">
                                    <div class="ppr_rup ppr_priv_global_nav_action_profile"  title="ویدیو" style="font-size: 10px">
                                        <span class="ui_icon addPostIcon" style="justify-content: center"></span>
                                        <div class="nameOfIconHeaders" style="color: white;">
                                            ویدیو
                                        </div>
                                    </div>
                                </a>

                                <div class="ppr_rup ppr_priv_global_nav_action_trips position-relative">
                                    <div id="targetHelp_1" class="targets">
                                        <div id="bookmarkicon" class="ppr_rup ppr_priv_global_nav_action_profile" title="نشانه گذاری شده ها" style="font-size: 10px">
                                            <span class="ui_icon casino" style="justify-content: center"></span>
                                            <div class="nameOfIconHeaders" style="color: white;">
                                                نشون کرده
                                            </div>
                                        </div>

                                        <div id="bookmarkmenu" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility trips-flyout-container" style="direction: rtl;">
                                            <div>
                                                <div class="styleguide" id="masthead-saves-container">
                                                    <div id="masthead-recent" style="background-color: white">
                                                        <div class="recent-header-container">
                                                            <a class="recent-header" href="{{route('recentlyViewTotal')}}" target="_self"> نشانه گذاری شده ها </a>

                                                        </div>
                                                        <div class="masthead-recent-cards-container" id="bookMarksDiv"></div>
                                                        {{--<div class="see-all-button-container"><a href="{{route('recentlyViewTotal')}}" target="_self" class="see-all-button">مشاهده تمامی موارد </a></div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endif

                            <div id="taplc_global_nav_action_profile_0" class="ppr_rup ppr_priv_global_nav_action_profile position-relative" style="margin: 0px;">
                                <div class="global-nav-profile global-nav-utility position-relative">
                                    @if(Auth::check())
                                        <div id="targetHelp_5" class="targets" title="Profile" class="position-relative">
                                            <div class="global-nav-utility-activator" title="Profile" style="flex-direction: column;">
                                                <span id="nameTop" class="ui_icon member" style="justify-content: center;"></span>
                                                <div class="nameOfIconHeaders" style="color: white; ">
                                                    {{$user->username}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="global-nav-overlays-container">
                                        <div id="profile-drop" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility">
                                            <ul class="global-nav-profile-menu">
                                                <li class="subItemHeaderNavBar"><a href="{{URL('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">صفحه کاربری</a></li>
                                                <li class="subItemHeaderNavBar rule"><a href="{{URL('messages')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">پیام ها</a> </li>
                                                <li class="subItemHeaderNavBar"><a href="{{URL('accountInfo')}}" class="subLink" data-tracking-label="UserProfile_settings">اطلاعات کاربر </a></li>
                                                <li class="subItemHeaderNavBar"><a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">خروج</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="taplc_masthead_search_0" class="ppr_rup ppr_priv_masthead_search position-relative" data-placement-name="masthead_search">
                                <div class="mag_glass_parent position-relative" title="Search">
                                    <div id="targetHelp_6" class="targets">
                                        <span class="ui_icon search" id="openSearch" style="transform: rotate(90deg); border: none;"></span>
                                    </div>
                                </div>
                            </div>

                            @if(!auth()->check())
                                <div class="ppr_rup ppr_priv_global_nav_action_trips position-relative">
                                    <div id="targetHelp_4" class="targets">
                                        <div id="entryBtnId" class="ppr_rup ppr_priv_global_nav_action_profile">
                                            <div class="global-nav-profile global-nav-utility">
                                                <a class="ui_button secondary small login-button" title="Join">ورود / ثبت نام</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="clear-both"></div>
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
                            <a href="/" class="global-nav-logo"><img src='{{URL::asset('images/icons/logo.png')}}' alt="کوچیتا" class="global-nav-img"/></a>
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
    var getBookMarksPath = '{{route('getBookMarks')}}';

    function hideAllTopNavs(){
        $("#alert").hide();
        $("#my-trips-not").hide();
        $("#profile-drop").hide();
        $("#bookmarkmenu").hide();
    }

    hideAllTopNavs();

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

    $('#close_span_search').click(function(e) {
        hideAllTopNavs();
        $('#searchspan').animate({height: '0vh'});
        $("#myCloseBtn").addClass('hidden');
    });

    $('#openSearch').click(function(e) {
        hideAllTopNavs();
        $("#myCloseBtn").removeClass('hidden');
        $('#searchspan').animate({height: '100vh'});
    });

</script>

@if(Auth::check())
    <script>
        var locked = false;
        var superAccess = false;
        var getRecentlyPath = '{{route('recentlyViewed')}}';


        $('#nameTop').click(function(e) {

            if( $("#profile-drop").is(":hidden")) {
                hideAllTopNavs();
                $("#profile-drop").show();
            }
            else
                hideAllTopNavs();
        });

        $('#memberTop').click(function(e) {
            if( $("#profile-drop").is(":hidden")) {
                hideAllTopNavs();
                $("#profile-drop").show();
            }
            else
                hideAllTopNavs();
        });

        $('#bookmarkicon').click(function(e) {
            if( $("#bookmarkmenu").is(":hidden")){
                hideAllTopNavs();
                $("#bookmarkmenu").show();
                showBookMarks('bookMarksDiv');
            }
            else
                hideAllTopNavs();
        });

        $('.notification-bell').click(function(e) {
            if( $("#alert").is(":hidden")) {
                hideAllTopNavs();
                $("#alert").show();
            }
            else
                hideAllTopNavs();
        });

        $("#Settings").on({
            mouseenter: function () {
                $(".settingsDropDown").show()
            }, mouseleave: function () {
                $(".settingsDropDown").hide()
            }
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
                hideAllTopNavs();
                $("#my-trips-not").show();
                getRecentlyViews(element);
            }
            else
                hideAllTopNavs();
        }

        function openUploadPost(){
            openUploadPhotoModal('', '{{route('addPhotoToPlace')}}', 0, 0, '');
        }
    </script>
@endif