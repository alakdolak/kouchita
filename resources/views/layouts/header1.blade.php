
<link rel="stylesheet" href="{{URL::asset('css/common/header.css?v=.'.$fileVersions)}}">
<link rel="stylesheet" href="{{URL::asset('css/common/header1.css?v='.$fileVersions)}}">

@if(\App::getLocale() == 'en')
    <link rel="stylesheet" href="{{URL::asset('css/ltr/mainPageHeader.css?v='.$fileVersions)}}">
@endif

@if(!Request::is('main') && !Request::is('main/*') && !Request::is('/'))
    <style>
        .headerSecondSection{
            display: none;
        }
        .mainHeader{
            background: var(--koochita-light-green);
        }
        .headerIconCommon:before{
            color: white;
        }
        .nameOfIconHeaders{
            color: white;
        }
        .headerAuthButton:hover .headerIconCommon:before{
            color: white;
        }
        .headerAuthButton:hover .nameOfIconHeaders{
            color: white;
        }
    </style>
@endif

    {{--pc header--}}
<div class="mainHeader hideOnPhone">
    <div class="container headerContainer">
        <a href="{{route('main')}}" class="headerPcLogoDiv" >
            <img src="{{URL::asset('images/camping/undp.svg')}}" alt="{{__('کوچیتا')}}" class="headerPcLogo"/>
            <img src="{{URL::asset('images/icons/mainLogo.png')}}" alt="{{__('کوچیتا')}}" class="headerPcLogo"/>
        </a>
        @if(Request::is('main') || Request::is('main/*') || Request::is('profile') || Request::is('profile/*') || Request::is('/') || Request::is('article/*'))
            <div class="headerSearchBar">
                <span class="headerSearchIcon iconFamily searchIcon" onclick="openMainSearch(0) // in mainSearch.blade.php"></span>
            </div>
        @else
            @if(isset($locationName['cityNameUrl']))
                <div class="mainHeaderSearch arrowAfter" onclick="openMainSearch(0)">
                    <span class="iconFamily searchIcon mirorIcon" style="font-size: 17px"></span>
                    {{$locationName['cityName']}}
                </div>
            @endif
        @endif

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
                                <a href="{{url('language/fa')}}" class="authLang" style="color: var(--koochita-light-green);">
                                    فارسی
                                </a>
                                <a href="{{url('language/en')}}" class="authLang">
                                    English
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="headerAuthButton" onclick="showCampingModal()">
                    <span class="headerIconCommon iconFamily addPostIcon"></span>
                    <div class="nameOfIconHeaders">
                        {{__('کمپین')}}
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
                                <a class="headerBookMarkHeaderName" href="{{route('profile')}}#bookMark" target="_self"> {{__('نشون کرده ها')}} </a>
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
                            <div id="headerMsgPlaceHolder" class="alertMsgResultDiv" style="width: 300px; overflow-y: auto">
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
                                    <a href="{{route('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">{{__('صفحه کاربری')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar">
                                    <a href="{{route('profile')}}#medal" class="subLink" data-tracking-label="UserProfile_viewProfile">{{__('جوایز و مدال ها')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar rule">
                                    <a href="{{route('profile.message.page')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">{{__('پیام‌ها')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar">
                                    <a href="{{route('profile.accountInfo')}}" class="subLink" data-tracking-label="UserProfile_settings">{{__('اطلاعات کاربر')}}</a>
                                </li>
                                <li class="subItemHeaderNavBar">
                                    <a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">{{__('auth.خروج')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            @else
                <div class="headerAuthButton" onclick="showCampingModal()" style="margin-left: 15px">
                    <span class="headerIconCommon iconFamily addPostIcon" style="height: 26px;"></span>
                    <div class="nameOfIconHeaders" style="line-height: 12px">
                        {{__('کمپین')}}
                    </div>
                </div>

                <div class="mainLoginButton languageButton">
                    <a style="color: var(--koochita-dark-green);" href="{{url('language/fa')}}">
                        فارسی
                    </a>
                    <div class="languagePopUp">
                        <a class="languageSelect" style="margin: 10px 0px" href="{{url('language/en')}}">English</a>
                    </div>
                </div>

                <div class="headerLoginHelper loginHelperSection hidden" onclick="closeLoginHelperSection()">
                    <div class="pic">
                        <div class="login-button mainLoginButton" style="font-size: 30px;margin-bottom: 20px;"> {{__('auth.ورود / ثبت نام')}}</div>
                        <img  alt="کوچیتا، سامانه جامع گردشگری ایران" src="{{URL::asset('images/icons/firstTimeRegisterMsg.svg')}}" style="width: 500px;">
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
                    <a href="{{route('safarnameh.index')}}" class="headerSecondLi" data-tracking-label="Flights">{{__('سفرنامه‌ها')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>


{{--mobile header--}}
<div class="hideOnScreen mobileHeader">
    <a href="{{route('main')}}" class="global-nav-logo" style="height: 100%">
        <img src="{{URL::asset('images/camping/undp.svg')}}" alt="{{__('کوچیتا')}}" style="height: 90%; width: auto;"/>
        <img src="{{URL::asset('images/icons/mainLogo.png')}}" alt="{{__('کوچیتا')}}" style="height: 100%; width: auto;"/>
    </a>
</div>

<div id="campingHeader" class="modalBlackBack" style="z-index: 999;  display: none">
    <div class="headerCampaignModalBody">
        <span class="iconClose closeLanding" onclick="$('#campingHeader').hide();"></span>
        <div class="headerCampingTop" onclick="goToLanding()">
            <img  alt="کوچیتا، سامانه جامع گردشگری ایران" src="{{URL::asset('images/camping/undp.svg')}}" style="position: absolute; width: 60px; top: 10px; right: 2%;">
            <img alt="کوچیتا، سامانه جامع گردشگری ایران" src="{{URL::asset('images/camping/' . app()->getLocale() . '/landing.webp')}}" class="resizeImgClass" style="width: 100%;" onload="fitThisImg(this)">
        </div>
        <div class="headerCampingBottom">
            <div onclick="goToSafarnameh()">
                <img alt="کوچیتا، سامانه جامع گردشگری ایران" src="{{URL::asset('images/camping/' . app()->getLocale() . '/nSafarnameh.webp')}}" class="resizeImgClass" onload="fitThisImg(this)">
            </div>
            <div onclick="$('#campingHeader').hide(); openUploadPost()">
                <img alt="کوچیتا، سامانه جامع گردشگری ایران" src="{{URL::asset('images/camping/' . app()->getLocale() . '/nAxasi.webp')}}" class="resizeImgClass" onload="fitThisImg(this)">
            </div>
        </div>
    </div>
</div>


<script>
    let openHeadersTab = false;

    function showCampingModal(){
        $('#campingHeader').css('display', 'flex');
        resizeFitImg('resizeImgClass');
    }

    function goToLanding(){
        if(!checkLogin('{{route("addPlaceByUser.index")}}'))
            return;
        else
            location.href = '{{route("addPlaceByUser.index")}}';
    }

    function openUploadPost(){
        if(!checkLogin('{{route("addPlaceByUser.index")}}'))
            return;
        else
            openUploadPhotoModal('کوچیتا', '{{route('addPhotoToPlace')}}', 0, 0, '');
    }
    function goToSafarnameh(){
        if(checkLogin('{{route("addPlaceByUser.index")}}')) {
            $('#campingHeader').hide();
            openNewSafarnameh();
        }

        return;
    }
    function hideAllTopNavs(){
        openHeadersTab = false;

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
            getAlertItems();
        });

        function openHeaderTabsVariable(){
            setTimeout(() => openHeadersTab = true, 500);
        }

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

        function getAlertItems() {
            if(msgHeaderData == null) {
                $.ajax({
                    type: 'post',
                    url: '{{route('getAlerts')}}',
                    success: function (response) {
                        response = JSON.parse(response);
                        var newElement = "";
                        if (response.length > 0)
                            response.forEach(item => {

                                if(item.click != 0)
                                    item.color = 'white';

                                newElement +=   '<div class="alertMsgHeaderContent" style="background: ' + item.color + '" onclick="setSeenAlert(' + item.id + ', this)">\n' +
                                                '<div class="alertMsgHeaderContentImgDiv">\n' +
                                                '<img src="' + item.pic + '"  alt="کوچیتا، سامانه جامع گردشگری ایران" class="resizeImgClass" onload="fitThisImg(this)" style="width: 100%">\n' +
                                                '</div>\n' +
                                                '<div class="alertMsgHeaderContentTextDiv">\n' +
                                                '<div class="alertMsgHeaderContentText">' + item.msg + '</div>\n' +
                                                '<div class="alertMsgHeaderContentTime">' + item.time + '</div>\n' +
                                                '</div>\n' +
                                                '</div>';
                            });
                        else
                            newElement += '<div><div class="modules-engagement-notification-dropdown"><div class="notifdd_empty">{{__('هیچ پیامی موجود نیست')}} </div></div></div>';

                            $('.alertMsgResultDiv').html(newElement);
                    }
                });
            }
        }

        let seenToZero = false;
        function setSeenAlert(_id = 0, _element = ''){
            let kind;
            if(_id == 0)
                kind = 'seen';
            else
                kind = 'click';

            if(kind == 'seen' && seenToZero)
                return;

            $.ajax({
                type: 'post',
                url: '{{route("alert.seen")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    id: _id,
                    kind: kind
                },
                success: function(response){
                    response = JSON.parse(response);
                    if(response.status == 'ok'){
                        if(kind == 'seen') {
                            $('#alertPane').html(0);
                            seenToZero = true;
                        }
                        else
                            $(_element).css('background', 'white');
                    }
                }
            })
        }

        $('#memberTop').click(function(e) {
            if( $("#profile-drop").is(":hidden")) {
                hideAllTopNavs();
                $("#profile-drop").show();
                openHeaderTabsVariable()
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
                openHeaderTabsVariable()
            }
            else
                hideAllTopNavs();
        });

        $('#languageIcon').click(function(e) {
            if( $("#languageMenu").is(":hidden")){
                hideAllTopNavs();
                $("#languageMenu").css('display', 'block');
                openHeaderTabsVariable()
            }
            else
                hideAllTopNavs();
        });

        $('.notification-bell').click(function(e) {
            if( $("#alert").is(":hidden")) {
                hideAllTopNavs();
                $("#alert").css('display', 'block');
                setSeenAlert(0, '');
                getAlertItems();
                openHeaderTabsVariable();
            }
            else
                hideAllTopNavs();
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
                                        '<img alt="کوچیتا، سامانه جامع گردشگری ایران" src="' + response[i].placePic + '" class="headerBookMarContentImg">' +
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



    </script>
@endif