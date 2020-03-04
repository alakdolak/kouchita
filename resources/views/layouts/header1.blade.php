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
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/header1.css')}}">

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
                                            <span id="global-nav-hotels" class="unscoped global-nav-link ui_tab" onclick="openMainSearch(4)  // in mainSearch.blade.php" data-tracking-label="hotels">هتل</span>
                                        </li>
                                        <li>
                                            <span id="global-nav-vr" class="unscoped global-nav-link ui_tab" onclick="openMainSearch(3)  // in mainSearch.blade.php">رستوران</span>
                                        </li>
                                        <li>
                                            <span id="global-nav-restaurants" class="unscoped global-nav-link ui_tab" onclick="openMainSearch(1)  // in mainSearch.blade.php">جاذبه</span>
                                        </li>
                                        <li class="" data-element=".masthead-dropdown-Flights">
                                            <span class="unscoped global-nav-link ui_tab " onclick="openMainSearch(10)  // in mainSearch.blade.php">سوغات و صنایع دستی</span>
                                        </li>
                                        <li class="" data-element=".masthead-dropdown-Flights">
                                            <span class="unscoped global-nav-link ui_tab" onclick="openMainSearch(11)  // in mainSearch.blade.php">غذای محلی</span>
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
                                    <div id="bookmarkicon" class="ppr_rup ppr_priv_global_nav_action_profile"  title="نشانه گذاری شده ها">
                                        <span class="ui_icon casino"></span>
                                    </div>

                                    <div id="bookmarkmenu" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility trips-flyout-container" style="direction: rtl">
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

                                <div class="ppr_rup ppr_priv_global_nav_action_trips">
                                    <div class="masthead-saves" title="سفرهای من">
                                        <a class="trips-icon"  href="{{route('myTrips')}}">
                                            <span class="ui_icon my-trips"></span>
                                        </a>
                                    </div>
                                    {{--<div id="my-trips-not" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility trips-flyout-container" style="direction: rtl">--}}
                                        {{--<div>--}}
                                            {{--<div class="styleguide" id="masthead-saves-container">--}}
                                                {{--<div id="masthead-recent" style="background-color: white">--}}
                                                    {{--<div class="recent-header-container">--}}
                                                        {{--<a class="recent-header" href="{{route('recentlyViewTotal')}}" target="_self">بازدیدهای اخیر </a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="masthead-recent-cards-container">--}}
                                                        {{--<div id="dropdown-test3-card">--}}
                                                            {{--<div class="ui_close_x"></div>--}}
                                                            {{--<div class="test-title">خوش آمدید</div>--}}
                                                            {{--<div class="test-content">شما می توانید بازدیدهای اخیرتان را در اینجا ببینید</div>>--}}
                                                        {{--</div>--}}
                                                        {{--<div id="masthead-recent-cards-region">--}}
                                                            {{--<div id="recentlyViewed"></div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="see-all-button-container"><a href="{{route('recentlyViewTotal')}}" target="_self" class="see-all-button">مشاهده تمامی موارد </a></div>--}}
                                                {{--</div>--}}
                                                {{--<div id="masthead-trips">--}}
                                                    {{--<div class="trips-header-container"><a class="trips-header" target="_self" href="{{URL('myTrips')}}">سفر های من </a></div>--}}
                                                    {{--<div id="masthead-trips-tiles-region">--}}
                                                        {{--<div id="trips-tiles" class="column">--}}
                                                            {{--<div>--}}
                                                                {{--<a onclick="showPopUp()" class="single-tile is-create-trip">--}}
                                                                    {{--<div class="tile-content">--}}
                                                                        {{--<span class="ui_icon plus"></span>--}}
                                                                        {{--<div class="create-trip-text">ایجاد سفر</div>--}}
                                                                    {{--</div>--}}
                                                                {{--</a>--}}

                                                                {{--@foreach($trips as $trip)--}}
                                                                    {{--<div onclick="document.location.href = '{{route('tripPlaces', ['tripId' => $trip->id])}}'" class="trip-images ui_columns is-gapless is-multiline is-mobile">--}}
                                                                        {{--@if($trip->placeCount > 0)--}}
                                                                            {{--<div class="trip-image ui_column is-6 placeCount0" style="background: url('{{$trip->pic1}}')" ></div>--}}
                                                                        {{--@else--}}
                                                                            {{--<div class="trip-image trip-image-empty ui_column is-6 placeCount0Else"></div>--}}
                                                                        {{--@endif--}}
                                                                        {{--@if($trip->placeCount > 1)--}}
                                                                            {{--<div class="trip-image ui_column is-6 placeCount0" style="background: url('{{$trip->pic1}}')" ></div>--}}
                                                                        {{--@else--}}
                                                                            {{--<div class="trip-image trip-image-empty ui_column is-6  placeCount0Else"></div>--}}
                                                                        {{--@endif--}}
                                                                        {{--@if($trip->placeCount > 2)--}}
                                                                            {{--<div class="trip-image ui_column is-6 placeCount0" style="background: url('{{$trip->pic1}}')" ></div>--}}
                                                                        {{--@else--}}
                                                                            {{--<div class="trip-image trip-image-empty ui_column is-6 placeCount0Else"></div>--}}
                                                                        {{--@endif--}}
                                                                        {{--@if($trip->placeCount > 3)--}}
                                                                            {{--<div class="trip-image ui_column is-6 placeCount0" style="background: url('{{$trip->pic1}}')" ></div>--}}
                                                                        {{--@else--}}
                                                                            {{--<div class="trip-image trip-image-empty ui_column is-6 placeCount0Else"></div>--}}
                                                                        {{--@endif--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="create-trip-text">{{$trip->name}} </div>--}}
                                                                    {{--@if($trip->to_ != "" && $trip->from_ != "")--}}
                                                                        {{--<div class="create-trip-text">--}}
                                                                            {{--{{convertStringToDate2($trip->to_)}}--}}
                                                                            {{--<p>الی</p>--}}
                                                                            {{--{{convertStringToDate2($trip->from_)}}--}}
                                                                        {{--</div>--}}
                                                                    {{--@else--}}
                                                                        {{--<div class="create-trip-text">بدون تاریخ</div>--}}
                                                                    {{--@endif--}}
                                                                {{--@endforeach--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

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

                            @if(Auth::check())
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
                            @endif

                            <div class="ppr_rup ppr_priv_global_nav_action_profile">
                                <div class="global-nav-profile global-nav-utility">
                                    @if(Auth::check())
                                        <div class="global-nav-utility-activator" title="صفحه کاربری">
                                            <span onclick="document.location.href = '{{route('profile')}}'" class="ui_icon member"></span>
                                            <span id="memberTop" class="username">{{$user->username}}</span>
                                        </div>
                                    @endif
                                    <div id="profile-drop-mainDiv" class="global-nav-overlays-container">
                                        <div id="profile-drop" class="ui_overlay ui_flyout global-nav-flyout global-nav-utility" style="list-style-type: none; text-align: center">
                                            <ul class="global-nav-profile-menu">
                                                <li class="subItemHeaderNavBar">
                                                    <a href="{{URL('profile')}}" class="subLink" data-tracking-label="UserProfile_viewProfile">صفحه کاربری</a>
                                                </li>
                                                <li class="subItemHeaderNavBar rule">
                                                    <a href="{{URL('messages')}}" class="subLink global-nav-submenu-divided" data-tracking-label="UserProfile_messages">پیام ها</a>
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
    var getBookMarksPath = '{{route('getBookMarks')}}';

    function hideAllTopNavs(){
        $("#alert").hide();
        $("#my-trips-not").hide();
        $("#profile-drop").hide();
        $("#bookmarkmenu").hide();
    }

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

    </script>
@endif