<?php

use App\models\Adab;
use App\models\Amaken;
use App\models\Hotel;
use App\models\Majara;
use App\models\Restaurant;
use App\models\Trip;
use App\models\TripMember;
use App\models\TripPlace;
$user = Auth::user();
$trips = [];

function convertStringToDate2($date) {
    if($date == "")
        return $date;
    return $date[0] . $date[1] . $date[2] . $date[3] . '/' . $date[4] . $date[5] . '/' . $date[6] . $date[7];
}

if(Auth::check()) {

    $uId = Auth::user()->id;
    $trips = Trip::whereUId($uId)->get();

    $condition = ['uId' => $uId, 'status' => 1];
    $invitedTrips = TripMember::where($condition)->select('tripId')->get();

    foreach ($invitedTrips as $invitedTrip) {
        $trips[count($trips)] = Trip::find($invitedTrip->tripId);
    }

    if($trips != null && count($trips) != 0) {
        foreach ($trips as $trip) {
            $trip->placeCount = TripPlace::whereTripId($trip->id)->count();
            $limit = ($trip->placeCount > 4) ? 4 : $trip->placeCount;
            $tripPlaces = TripPlace::whereTripId($trip->id)->take($limit)->get();
            if($trip->placeCount > 0) {
                $kindPlaceId = $tripPlaces[0]->kindPlaceId;
                switch ($kindPlaceId) {
                    case 1:
                        $amaken = Amaken::whereId($tripPlaces[0]->placeId);
                        try{
                            if(file_get_contents(URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg')))
                                $trip->pic1 = URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 3:
                        $restaurant = Restaurant::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg')))
                                $trip->pic1 = URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 4:
                        $hotel = Hotel::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/hotels/' . $hotel->file . '/t-1.jpg')))
                                $trip->pic1 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 6:
                        $majara = Majara::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/majara/' . $majara->file . '/t-1.jpg')))
                                $trip->pic1 = URL::asset('_images/hotels/' . $majara->file . '/' . $majara->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 8:
                        $adab = Adab::whereId($tripPlaces[0]->placeId);
                        if($adab->category == 3) {
                            try {
                                if(file_get_contents(URL::asset('_images/adab/ghazamahali/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic1 = URL::asset('_images/adab/ghazamahali/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        else {
                            try{
                                if(file_get_contents(URL::asset('_images/adab/soghat/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic1 = URL::asset('_images/adab/soghat/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic1 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        break;
                }
            }
            if($trip->placeCount > 1) {
                $kindPlaceId = $tripPlaces[1]->kindPlaceId;
                switch ($kindPlaceId) {
                    case 1:
                        $amaken = Amaken::whereId($tripPlaces[0]->placeId);
                        try{
                            if(file_get_contents(URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg')))
                                $trip->pic2 = URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 3:
                        $restaurant = Restaurant::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg')))
                                $trip->pic2 = URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 4:
                        $hotel = Hotel::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/hotels/' . $hotel->file . '/t-1.jpg')))
                                $trip->pic2 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 6:
                        $majara = Majara::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/majara/' . $majara->file . '/t-1.jpg')))
                                $trip->pic2 = URL::asset('_images/hotels/' . $majara->file . '/' . $majara->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 8:
                        $adab = Adab::whereId($tripPlaces[0]->placeId);
                        if($adab->category == 3) {
                            try {
                                if(file_get_contents(URL::asset('_images/adab/ghazamahali/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic2 = URL::asset('_images/adab/ghazamahali/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        else {
                            try{
                                if(file_get_contents(URL::asset('_images/adab/soghat/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic2 = URL::asset('_images/adab/soghat/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic2 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        break;
                }
            }
            if($trip->placeCount > 2) {
                $kindPlaceId = $tripPlaces[2]->kindPlaceId;
                switch ($kindPlaceId) {
                    case 1:
                        $amaken = Amaken::whereId($tripPlaces[0]->placeId);
                        try{
                            if(file_get_contents(URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg')))
                                $trip->pic3 = URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 3:
                        $restaurant = Restaurant::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg')))
                                $trip->pic3 = URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 4:
                        $hotel = Hotel::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/hotels/' . $hotel->file . '/t-1.jpg')))
                                $trip->pic3 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 6:
                        $majara = Majara::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/majara/' . $majara->file . '/t-1.jpg')))
                                $trip->pic3 = URL::asset('_images/hotels/' . $majara->file . '/' . $majara->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 8:
                        $adab = Adab::whereId($tripPlaces[0]->placeId);
                        if($adab->category == 3) {
                            try {
                                if(file_get_contents(URL::asset('_images/adab/ghazamahali/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic3 = URL::asset('_images/adab/ghazamahali/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        else {
                            try{
                                if(file_get_contents(URL::asset('_images/adab/soghat/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic3 = URL::asset('_images/adab/soghat/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic3 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        break;
                }
            }
            if($trip->placeCount > 3) {
                $kindPlaceId = $tripPlaces[3]->kindPlaceId;
                switch ($kindPlaceId) {
                    case 1:
                        $amaken = Amaken::whereId($tripPlaces[0]->placeId);
                        try{
                            if(file_get_contents(URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg')))
                                $trip->pic4 = URL::asset('_images/amaken/' . $amaken->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 3:
                        $restaurant = Restaurant::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg')))
                                $trip->pic4 = URL::asset('_images/restaurant/' . $restaurant->file . '/t-1.jpg');
                        }
                        catch (Exception $x) {
                            $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 4:
                        $hotel = Hotel::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/hotels/' . $hotel->file . '/t-1.jpg')))
                                $trip->pic4 = URL::asset('_images/hotels/' . $hotel->file . '/' . $hotel->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 6:
                        $majara = Majara::whereId($tripPlaces[0]->placeId);
                        try {
                            if(file_get_contents(URL::asset('_images/majara/' . $majara->file . '/t-1.jpg')))
                                $trip->pic4 = URL::asset('_images/hotels/' . $majara->file . '/' . $majara->pic_1);
                        }
                        catch (Exception $x) {
                            $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                        }
                        break;
                    case 8:
                        $adab = Adab::whereId($tripPlaces[0]->placeId);
                        if($adab->category == 3) {
                            try {
                                if(file_get_contents(URL::asset('_images/adab/ghazamahali/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic4 = URL::asset('_images/adab/ghazamahali/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        else {
                            try{
                                if(file_get_contents(URL::asset('_images/adab/soghat/' . $adab->file . '/t-1.jpg')))
                                    $trip->pic4 = URL::asset('_images/adab/soghat/' . $adab->file . '/' . $adab->pic_1);
                            }
                            catch (Exception $x) {
                                $trip->pic4 = URL::asset('_images/nopic/blank.jpg');
                            }
                        }
                        break;
                }
            }
        }
    }
}
?>

<link rel="stylesheet" href="{{URL::asset('css/common/header.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/common/header1.css')}}">

<div class="masthead">
    <div id="taplc_global_nav_0" class="ppr_rup ppr_priv_global_nav">
        <div class="global-nav global-nav-single-line">
            <div class="global-nav-top">
                <div class="global-nav-bar global-nav-green" style="padding-top: 5px;">

                    <div class="container headerContainer">
                        <a href="{{route('main')}}" class="headerPcLogoDiv" >
                            <img src="{{URL::asset('images/icons/mainLogo.png')}}" alt="کوچیتا" class="headerPcLogo"/>
                        </a>

                        <div class="headerSearchBar">
                            <span class="headerSearchIcon iconFamily searchIcon" id="openSearch"></span>
                        </div>

                        <div class="headerButtonsSection">

                            @if(Auth::check())

                                <div class="headerAuthButton" onclick="openUploadPost()">
                                    <span class="headerIconCommon iconFamily addPostIcon"></span>
                                    <div class="nameOfIconHeaders">
                                        پست
                                    </div>
                                </div>

                                <div id="bookmarkicon" class="headerAuthButton" title="نشانه گذاری شده ها">
                                    <span class="headerIconCommon iconFamily BookMarkIconEmpty"></span>
                                    <div class="nameOfIconHeaders">
                                        نشون‌کرده
                                    </div>

                                    <div id="bookmarkmenu" class="arrowTopDiv headerBookMarkMenu">
                                        <div class="headerBookMarkBody">
                                            <div class="headerBookMarkHeader">
                                                <a class="headerBookMarkHeaderName" href="{{route('recentlyViewTotal')}}" target="_self"> نشانه‌گذاری شده‌ها </a>
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

                                <a href="{{route('myTrips')}}" class="headerAuthButton" title="سفرهای منا">
                                    <span class="headerIconCommon iconFamily MyTripsIcon"></span>
                                    <div class="nameOfIconHeaders">
                                        سفرهای من
                                    </div>
                                </a>

                                <div class="headerAuthButton" onclick="hideAllTopNavs(); getAlertItems()">
                                    <span class="headerIconCommon iconFamily MsgIcon"></span>
                                    <div class="nameOfIconHeaders">
                                        پیام‌ها
                                    </div>
                                    <div id="alertPane" class="headerAlertNumber">0</div>

                                    <div id="alert" class="arrowTopDiv headerBookMarkMenu">
                                        <div class="headerBookMarkBody">
                                            <div class="headerBookMarkHeader">
                                                <a class="headerBookMarkHeaderName" href="#" target="_self"> تمامی پیام ها</a>
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
                                        {{$user->username}}
                                    </div>
                                    <div>
                                        <div id="profile-drop" class="arrowTopDiv headerAuthMenu">
                                            <ul class="global-nav-profile-menu">
                                                <li class="subItemHeaderNavBar">
                                                    <a href="{{URL('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">صفحه کاربری</a>
                                                </li>
                                                <li class="subItemHeaderNavBar">
                                                    <a href="{{URL('badge')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">جوایز و مدال ها</a>
                                                </li>
                                                <li class="subItemHeaderNavBar rule">
                                                    <a href="{{URL('messages')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">پیام‌ها</a>
                                                </li>
                                                <li class="subItemHeaderNavBar">
                                                    <a href="{{URL('accountInfo')}}" class="subLink" data-tracking-label="UserProfile_settings">اطلاعات کاربر </a>
                                                </li>
                                                <li class="subItemHeaderNavBar">
                                                    <a href="{{route('logout')}}" class="subLink" data-tracking-label="UserProfile_signout">خروج</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="login-button mainLoginButton" title="ورود / ثبت نام"> ورود / ثبت نام</div>
                            @endif
                        </div>
                    </div>

                    <div class="headerSecondSection">
                        <div class="container headerSecondContainer">
                            <div class="headerSecondContentDiv">
                                <div class="headerSecondTabs">
                                    <span class="headerSecondLi" onclick="openMainSearch(4)  // in mainSearch.blade.php">هتل</span>
                                    <span class="headerSecondLi" onclick="openMainSearch(3)  // in mainSearch.blade.php">رستوران</span>
                                    <span class="headerSecondLi" onclick="openMainSearch(1)  // in mainSearch.blade.php">جاذبه</span>
                                    <span class="headerSecondLi" onclick="openMainSearch(10)  // in mainSearch.blade.php">سوغات و صنایع‌دستی</span>
                                    <span class="headerSecondLi" onclick="openMainSearch(11)  // in mainSearch.blade.php">غذای محلی</span>
                                    <a href="{{route('mainArticle')}}" class="headerSecondLi" data-tracking-label="Flights">سفرنامه‌ها</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--etk-->
</div>

<script>
    var getBookMarksPath = '{{route('getBookMarks')}}';

    function hideAllTopNavs(){
        $("#alert").hide();
        $("#bookmarkmenu").hide();
        $("#my-trips-not").hide();
        $("#profile-drop").hide();
    }

    $(document).ready(function(){

        $(".menu-bars").click(function(){
            $("#menu_res").removeClass('off-canvas');
        });

        $("#close_menu_res").click(function(){

            $("#menu_res").addClass('off-canvas');
        });
    });

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
            $('#alert').toggle();

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
                            newElement += '<div><div class="modules-engagement-notification-dropdown"><div class="notifdd_empty">هیچ پیامی موجود نیست </div></div></div>';
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

        $('.notification-bell').click(function(e) {
            if( $("#alert").is(":hidden")) {
                hideAllTopNavs();
                $("#alert").css('display', 'block');
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
                    url: getBookMarksPath,
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
                                        '<div>' + response[i].seen + ' مشاهده</div>\n' +
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