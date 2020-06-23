
<link rel="stylesheet" href="{{URL::asset('css/common/header.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/common/header1.css')}}">

@if(\App::getLocale() == 'en')
    <link rel="stylesheet" href="{{URL::asset('css/ltr/mainPageHeader.css')}}">
@endif

{{--pc header--}}
<div class="mainHeader hideOnPhone">
    <div class="container headerContainer">
        <a href="{{route('main')}}" class="headerPcLogoDiv" >
            <img src="{{URL::asset('images/icons/mainLogo.png')}}" alt="{{__('کوچیتا')}}" class="headerPcLogo"/>
        </a>

        <div class="headerSearchBar">
            <span class="headerSearchIcon iconFamily searchIcon" onclick="openMainSearch(0) // in mainSearch.blade.php"></span>
        </div>

        <div class="headerButtonsSection">

            @if(Auth::check())
                <div id="languageIcon" class="headerAuthButton" title="{{__('زبان')}}">
                    <span class="headerIconCommon iconFamily languageIcon"></span>
                    <div class="nameOfIconHeaders">
                        فارسی
                    </div>
                    <div id="languageMenu" class="arrowTopDiv headerSubMenu">
                        <div class="headerBookMarkBody" style="padding-top: 0;">
                            <div id="authLanguageMenu" class="headerBookMarkContentDiv authLanguageMenu">
                                <a href="{{url('language/fa')}}" class="authLang" style="color: #4DC7BC;">
                                    فارسی
                                </a>
                                <a href="{{url('language/en')}}" class="authLang">
                                    English
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="headerAuthButton" onclick="openUploadPost()">
                    <span class="headerIconCommon iconFamily addPostIcon"></span>
                    <div class="nameOfIconHeaders">
                        {{__('پست')}}
                    </div>
                </div>

                <div id="bookmarkicon" class="headerAuthButton" title="{{__('نشانه گذاری شده ها')}}">
                    <span class="headerIconCommon iconFamily BookMarkIconEmpty"></span>
                    <div class="nameOfIconHeaders">
                        {{__('نشون‌کرده')}}
                    </div>

                    <div id="bookmarkmenu" class="arrowTopDiv headerSubMenu">
                        <div class="headerBookMarkBody">
                            <div class="headerBookMarkHeader">
                                <a class="headerBookMarkHeaderName" href="{{route('recentlyViewTotal')}}" target="_self"> {{__('نشانه‌گذاری شده‌ها')}} </a>
                            </div>
                            <div id="bookMarksDiv" class="headerBookMarkContentDiv" style="display: none"></div>
                            <div id="headerBookMarkPlaceHolder">

                                <div class="headerBookMarkLink">
                                    <div class="headerBookMarContentImgDiv">
                                        <div class="headerBookMarkPlaceholder placeHolderAnime"></div>
                                    </div>
                                    <div class="bookMarkContent" style="width: 90px">
                                        <div class="bookMarkContentTitle placeHolderAnime resultLineAnim" style="width: 100%"></div>
                                        <div class="bookMarkContentRating placeHolderAnime resultLineAnim" style="width: 100%"></div>
                                        <div class="bookMarkContentCity placeHolderAnime resultLineAnim" style="width: 100%"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{route('myTrips')}}" class="headerAuthButton" title="{{__('سفرهای من')}}">
                    <span class="headerIconCommon iconFamily MyTripsIcon"></span>
                    <div class="nameOfIconHeaders">
                        {{__('سفرهای من')}}
                    </div>
                </a>

                <div class="notification-bell headerAuthButton">
                    <span class="headerIconCommon iconFamily MsgIcon"></span>
                    <div class="nameOfIconHeaders">
                        {{__('پیام‌ها')}}
                    </div>
                    <div id="alertPane" class="headerAlertNumber">0</div>

                    <div id="alert" class="arrowTopDiv headerSubMenu">
                        <div class="headerBookMarkBody">
                            <div class="headerBookMarkHeader">
                                <a class="headerBookMarkHeaderName" href="#" target="_self"> {{__('تمامی پیام ها')}}</a>
                            </div>
                            <div id="alertItems" class="headerBookMarkContentDiv" style="display: none"></div>
                            <div id="headerMsgPlaceHolder">
                                <div class="headerBookMarkLink">
                                    <div class="headerBookMarContentImgDiv">
                                        <div class="headerBookMarkPlaceholder placeHolderAnime"></div>
                                    </div>
                                    <div class="bookMarkContent" style="width: 90px">
                                        <div class="bookMarkContentTitle placeHolderAnime resultLineAnim" style="width: 100%"></div>
                                        <div class="bookMarkContentRating placeHolderAnime resultLineAnim" style="width: 100%"></div>
                                        <div class="bookMarkContentCity placeHolderAnime resultLineAnim" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="memberTop" class="headerAuthButton">
                    <span class="headerIconCommon iconFamily UserIcon"></span>
                    <div class="nameOfIconHeaders">
                        {{\auth()->user()->username}}
                    </div>
                    <div>
                        <div id="profile-drop" class="arrowTopDiv headerAuthMenu">
                            <ul class="global-nav-profile-menu">
                                <li class="subItemHeaderNavBar">
                                    <a href="{{URL('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">{{__('صفحه کاربری')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar">
                                    <a href="{{URL('badge')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">{{__('جوایز و مدال ها')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar rule">
                                    <a href="{{URL('messages')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">{{__('پیام‌ها')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar">
                                    <a href="{{URL('accountInfo')}}" class="subLink" data-tracking-label="UserProfile_settings">{{__('اطلاعات کاربر')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar">
                                    <a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">{{__('auth.خروج')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            @else
                <div class="mainLoginButton languageButton">
                    <a style="color: #0e3a46;" href="{{url('language/fa')}}">
                        فارسی
                    </a>
                    <div class="languagePopUp">
                        <a class="languageSelect" style="margin: 10px 0px" href="{{url('language/en')}}">English</a>
                    </div>
                </div>
                <div class="login-button mainLoginButton" title="{{__('auth.ورود / ثبت نام')}}"> {{__('auth.ورود / ثبت نام')}}</div>
            @endif
        </div>
    </div>

    <div class="headerSecondSection">
        <div class="container headerSecondContainer">
            <div class="headerSecondContentDiv">
                <div class="headerSecondTabs">
                    <span class="headerSecondLi" onclick="openMainSearch(12)  // in mainSearch.blade.php">{{__('بوم گردی')}}</span>
                    <span class="headerSecondLi" onclick="openMainSearch(4)  // in mainSearch.blade.php">{{__('هتل')}}</span>
                    <span class="headerSecondLi" onclick="openMainSearch(3)  // in mainSearch.blade.php">{{__('رستوران')}}</span>
                    <span class="headerSecondLi" onclick="openMainSearch(1)  // in mainSearch.blade.php">{{__('جاذبه')}}</span>
                    <span class="headerSecondLi" onclick="openMainSearch(10)  // in mainSearch.blade.php">{{__('سوغات و صنایع‌دستی')}}</span>
                    <span class="headerSecondLi" onclick="openMainSearch(11)  // in mainSearch.blade.php">{{__('غذای محلی')}}</span>
                    <a href="{{route('mainArticle')}}" class="headerSecondLi" data-tracking-label="Flights">{{__('سفرنامه‌ها')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--mobile header--}}
<div class="hideOnScreen mobileHeader">
    <a href="{{route('main')}}" class="global-nav-logo" >
        <img src="{{URL::asset('images/icons/mainLogo.png')}}" alt="{{__('کوچیتا')}}" style="height: 60px; width: auto;"/>
    </a>
</div>



<script>

    function hideAllTopNavs(){
        $("#alert").hide();
        $("#bookmarkmenu").hide();
        $("#languageMenu").hide();
        $("#my-trips-not").hide();
        $("#profile-drop").hide();
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
        let bookMarksData = null;
        let msgHeaderData = null;

        var locked = false;
        var superAccess = false;
        var getRecentlyPath = '{{route('recentlyViewed')}}';

        $(document).ready(function () {
            getAlertsCount();
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

            if(msgHeaderData == null) {
                $.ajax({
                    type: 'post',
                    url: '{{route('getAlerts')}}',
                    success: function (response) {
                        response = JSON.parse(response);
                        var newElement = "";

                        if (response.length < 5 && response.length > 0)
                            $("#showMoreItemsAlert").removeClass('hidden');
                        else
                            $("#showMoreItemsAlert").addClass('hidden');
                        for (i = 0; i < response.length; i++) {

                            if (response[i].url != -1)
                                newElement += '<div id="notificationBox"><div class="modules-engagement-notification-dropdown"><div><img onclick="document.location.href = \'' + response[i].url + '\'" width="50px" height="50px" src="' + response[i].pic + '"></div><div class="notifdd_empty"><span>' + response[i].customText + '</span></div></div></div>';
                            else
                                newElement += '<div onclick="document.location.href = \'{{route('msgs')}}\'" style="cursor: pointer; min-height: 60px"><div class="modules-engagement-notification-dropdown"><div style="float: right; margin: 10px; padding-top: 0; height: 50px; margin-top: 0; width: 50px; z-index: 10000000000001 !important;"></div><div style="margin-right: 70px" class="notifdd_empty"><span>' + response[i].customText + '</span></div></div></div>';
                        }

                        if (response.length == 0)
                            newElement += '<div><div class="modules-engagement-notification-dropdown"><div class="notifdd_empty">{{__('هیچ پیامی موجود نیست')}} </div></div></div>';
                        else
                            getAlertsCount();

                        locked = false;
                        superAccess = false;
                        $('#alertItems').empty().append(newElement);

                        $('#headerMsgPlaceHolder').hide();
                        $('#alertItems').show();
                    }
                });
            }
        }

        $('#memberTop').click(function(e) {
            if( $("#profile-drop").is(":hidden")) {
                hideAllTopNavs();
                $("#profile-drop").show();
            }
            else {
                hideAllTopNavs();
            }
        });

        $('#bookmarkicon').click(function(e) {
            if( $("#bookmarkmenu").is(":hidden")){
                hideAllTopNavs();
                $("#bookmarkmenu").css('display', 'block');
                showBookMarks('bookMarksDiv');
            }
            else
                hideAllTopNavs();
        });

        $('#languageIcon').click(function(e) {
            if( $("#languageMenu").is(":hidden")){
                hideAllTopNavs();
                $("#languageMenu").css('display', 'block');
            }
            else
                hideAllTopNavs();
        });

        $('.notification-bell').click(function(e) {
            if( $("#alert").is(":hidden")) {
                hideAllTopNavs();
                $("#alert").css('display', 'block');
                getAlertItems();
            }
            else {
                hideAllTopNavs();
            }
        });

        $("#Settings").on({
            mouseenter: function () {
                $(".settingsDropDown").css('display', 'block')
            }, mouseleave: function () {
                $(".settingsDropDown").hide()
            }
        });

        function showBookMarks(containerId) {
            if(bookMarksData == null) {
                $("#" + containerId).empty();
                $.ajax({
                    type: 'post',
                    url: '{{route('getBookMarks')}}',
                    success: function (response) {
                        let element = '';
                        response = JSON.parse(response);
                        $('#headerBookMarkPlaceHolder').hide();
                        $('#' + containerId).show();
                        for (i = 0; i < response.length; i++) {
                            element +=  '<a class="headerBookMarkLink" target="_blank" href="' + response[i].placeRedirect + '">\n' +
                                        '<div class="headerBookMarContentImgDiv">\n' +
                                        '<img src="' + response[i].placePic + '" class="headerBookMarContentImg">' +
                                        '</div>\n' +
                                        '<div class="bookMarkContent">\n' +
                                        '<div class="bookMarkContentTitle">' + response[i].placeName + '</div>\n' +
                                        '<div class="bookMarkContentRating">\n' +
                                        '<div class="ui_bubble_rating bubble_' + response[i].placeRate + '0"></div>\n' +
                                        '<div>' + response[i].seen + ' {{__('نقد')}}</div>\n' +
                                        '</div>\n' +
                                        '<div class="bookMarkContentCity">' + response[i].placeCity + '</div>\n' +
                                        '</div>\n' +
                                        '</a>';
                        }
                        if(bookMarksData == null) {
                            bookMarksData = element;
                            $("#" + containerId).append(bookMarksData);
                        }
                    }
                });
            }
            $("#" + containerId).empty();
            $("#" + containerId).append(bookMarksData);
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

                        element += "<br/>" + response[i].placeReviews + " {{__('نقد')}} ";
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
                $("#my-trips-not").css('display', 'block');
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