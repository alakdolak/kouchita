@extends('layouts.bodyPlace')

<?php
$total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
if ($total == 0)
    $total = 1;
?>
@section('head')
    <meta content="article" property="og:type"/>
    <meta property="og:title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>
    <meta property="title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>
    <meta name="twitter:card" content="{{$place->meta}}"/>
    <meta name="twitter:description" content="{{$place->meta}}"/>
    <meta name="twitter:title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>
    <meta property="article:section" content="{{$placeMode}}"/>
    <meta property=" article:author " content="کوچیتا"/>
    <meta name="keywords" content="{{$place->keyword}}">
    <meta property="og:description" content="{{$place->meta}}"/>
    <meta property="og:url" content="{{Request::url()}}"/>

    @if(count($photos) > 0)
        <meta property="og:image" content="{{$photos[0]}}"/>
        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>
        <meta property="og:image:width" content="550"/>
        <meta property="og:image:height" content="367"/>
        <meta name="twitter:image" content="{{$photos[0]}}"/>
    @endif

    @if(isset($place->C) && isset($place->D))
        <meta NAME="geo.position" CONTENT="{{$place->C}}; {{$place->D}}">
    @endif
    @foreach($place->tags as $item)
        <meta property="article:tag" content="{{$item}}"/>
    @endforeach

    <title>{{isset($place->setTitle) ? $place->setTitle : $place->name}} </title>

    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/hotelDetail.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('js/emoji/area/emojionearea.css?v=1')}}">

    <script src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>
    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>

    {{--vr--}}
    @if(isset($video) && $video != null)
        <link rel="stylesheet" href="{{URL::asset('vr2/video-js.css?v=1')}}">
        <link rel="stylesheet" href="{{URL::asset('vr2/videojs-vr.css?v=1')}}">
        <script src="{{URL::asset('vr2/video.js')}}"></script>
        <script src="{{URL::asset('vr2/videojs-vr.js')}}"></script>
    @endif

    <script>
        var thisUrl = '{{Request::url()}}';
        var userCode = '{{$userCode}}';
        var userPic = '{{$userPic}}';
        var userPhotos = {!! $userPhotosJson !!};
        var userVideo = {!! $userVideoJson !!};
        var placeMode = '{{$placeMode}}';
        var getQuestions = '{{route('getQuestions')}}';
        var likeLog = '{{route('likeLog')}}';
        var reviewUploadPic = '{{route('reviewUploadPic')}}';
        var doEditReviewPic = '{{route('doEditReviewPic')}}';
        var reviewUploadVideo = '{{route('reviewUploadVideo')}}';
        var bookMarkDir = '{{route('setBookMark')}}';
        var getPlaceTrips = '{{route('placeTrips')}}';
        var assignPlaceToTripDir = '{{route('assignPlaceToTrip')}}';
        var soon = '{{route('soon')}}';
        var placeMode = '{{$placeMode}}';
        var photographerPics = {!! $photographerPicsJSON !!};
        var sitePics = {!! $sitePicsJSON !!};
        var hotelDetails;
        var hotelDetailsInAskQuestionMode;
        var hotelDetailsInAnsMode;
        var hotelDetailsInSaveToTripMode;
        var placeId = '{{$place->id}}';
        var kindPlaceId = '{{$kindPlaceId}}';
        var getCommentsCount = '{{route('getCommentsCount')}}';
        var totalPhotos = '{{count($sitePics) + count($userPhotos)}}';
        var sitePhotosCount = {{count($sitePics)}};
        var opOnComment = '{{route('opOnComment')}}';
        var askQuestionDir = '{{route('askQuestion')}}';
        var sendAnsDir = '{{route('sendAns')}}';
        var showAllAnsDir = '{{route('showAllAns')}}';
        var filterComments = '{{route('filterComments')}}';
        var getPhotoFilter = '{{route('getPhotoFilter')}}';
        var getPhotosDir = '{{route('getPhotos')}}';
        var findUser = '{{route('findUser')}}';
        var showUserBriefDetail = '{{route('showUserBriefDetail')}}';
        var deleteReviewPicUrl = '{{route('deleteReviewPic')}}';
    </script>

    <script src="{{URL::asset('js/emoji/area/emojionearea.js')}}"></script>
    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>
    <script src="{{URL::asset('js/hotelDetails/hoteldetails_1.js')}}"></script>
    <script src="{{URL::asset('js/hotelDetails/hoteldetails_2.js')}}"></script>
    <script async src="{{URL::asset('js/album.js')}}"></script>
    <script src="{{URL::asset('js/adv.js')}}"></script>

    <style>
        .albumInfo{
            width: 100%;
            text-align: right !important;
        }
        .affix {
            max-width: 100%;
            left: 0px;
            box-shadow: 20px -10px 20px 20px darkgrey;
        }

        .truePhone {
            display: flex;
            align-items: center;
            direction: ltr;
            justify-content: flex-start;
            flex-direction: row-reverse;
        }

        .changeWidth {
            @if(session('goDate'))
             width: 14% !important;
        @endif
        }

        .rtl .ui_bubble_rating:after, .rtl .ui_bubble_rating:before {
            transform: scale(1, 1);
        }

        .sharePageIcon:before {
            content: '\e1f5' !important;
            font-family: Shazde_Regular2 !important;
            font-size: 18px;
            position: absolute;
            right: 15px;
            top: 4px;
        }

        .commentOptionsBoxes label {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .add360VideoCommentIcon, .tagFriendCommentIcon, .addPhotoCommentIcon, .addVideoCommentIcon {
            position: relative;
            line-height: 10px;
            right: auto;
            top: auto;
        }

        .commentOptionsText {
            margin-right: 10px;
        }

        .commentMoreSettingBar {
            justify-content: space-evenly;
        }

        .commentOptionsBoxes {
            display: flex;
            align-items: center;
        }
        DIV.prw_rup.prw_common_centered_image .imgWrap{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        DIV.prw_rup.prw_common_centered_image .imgWrap .centeredImg:not(.lte_ie8){
            position: relative;
            top: 0;
            left: 0;
            transform: translate(0%, 0%);
            -webkit-transform: translate(0%, 0%);
            -moz-transform: translate(0%, 0%);
            -ms-transform: translate(0%, 0%);
        }

        #share_box_mobile{
            bottom: -190px;
        }
        #share_box{
            bottom: -205px !important;
        }
        #share_box::before{
            left: 50% !important;
        }
        .introductionShowMore{
            cursor: pointer;
            color: var(--koochita-light-green);
            position: absolute;
            left: 0;
            bottom: 0;
            background-color: white;
            padding: 0px 17px;
        }
        .introductionShowMoreLess{
            position: relative;
            padding: 0px;
        }
    </style>
@stop


@section('main')

    @include('general.secondHeader')

    @include('component.mapMenu')

    @include('component.smallShowReview')


    {{--alarm--}}
    <span class="ui_overlay ui_modal editTags getAlarm">
        <div class="shTIcon clsIcon"></div>
        <div class="alarmHeaderText"> آیا می خواهید کمترین قیمت ها را به شما اطلاع دهیم </div>
        <div class="alarmSubHeaderText"> هنگامی که قیمت پرواز های </div>
        <div class="ui_column ui_picker alarmBoxCityName">
            <div class="shTIcon locationIcon display-inline-block"></div>
            <input id="fromWarning" class="alarmInputCityName" placeholder="شهر مبدأ">
            <div id="resultSrc" class="data_holder"></div>
        </div>
        <div class="alarmSubHeaderText"> به </div>
        <div class="ui_column ui_picker alarmBoxCityName">
            <div class="shTIcon locationIcon display-inline-block"></div>
            <input id="toWarning" class="alarmInputCityName" placeholder="شهر مقصد">
            <div id="resultDest" class="data_holder"></div>
        </div>
        <div class="alarmSubHeaderText"> کاهش یابد به شما اطلاع دهیم </div>
        <div class="check-box__item hint-system" id="notifyOtherSuggestionDiv">
            <label class="labelEdit"> سایر پیشنهادات را نیز به من اطلاع دهید </label>
            <input type="checkbox" id="otherOffers" name="otherOffer" value="سایر پیشنهادات">
        </div>
        @if(!Auth::check())
            <div class="ui_column ui_picker alarmBoxCityName" id="addYourEmailDivFlightNotification">
                <input id="emailWarning" class="alarmInputCityName" placeholder="آدرس ایمیل خود را وارد کنید">
            </div>
        @endif
        <div class="float-left">
            <button class="btn alarmPopUpBotton" type="button"> دریافت هشدار </button>
        </div>
    </span>

    <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic position-relative" style="margin-bottom: 10px">

        @include('layouts.placeMainBodyHeader')

        <div class="atf_meta_and_photos_wrapper position-relative">
            <div class="greyBackground"></div>
            <div class="atf_meta_and_photos ui_container is-mobile easyClear position-relative">

                @if(auth()->check())
                    @include('pages.placeDetails.component.writeReviewSection')
                @else
                    <script !src="">
                        function newPostModal(kind = '') {
                            if (!hasLogin) {
                                showLoginPrompt('{{Request::url()}}');
                                return;
                            }
                        }
                    </script>
                @endif

                <div id="bestPrice" class="meta position-relative" style="@if(session('goDate') != null && session('backDate') != null) display: none @endif ">
                    <div id="targetHelp_9" class="targets  float-left">
                        <div id="bestPriceInnerDiv" class="tvSection">
                            <a href="https://koochitatv.com" class="tvLogoDiv" target="_blank">
                                <img src="{{URL::asset('images/mainPics/vodLobo.png')}}" style="max-height: 100%; max-width: 100%;">
                            </a>
                            <div class="tvContentDiv">
                                <div class="tvContentText">
                                    کوچیتا تی وی برای تماشای آنلاین و زنده محتواهای بصری و صوتی در تمامی حوزه های گردشگری و سفر
                                </div>
                                <div class="tvContentVideo">
                                    <a href="https://www.koochitatv.com/video/show/9OBLNC06s3" class="tvVideoPic" target="_blank">
                                        <div class="tvImgHover">
                                            <img src="{{URL::asset('images/icons/play.png')}}" style="width: 50px">
                                        </div>
                                        <div class="tvOverPic tvSeenSection">
                                            <span>10</span>
                                            <img src="{{URL::asset('images/icons/eye.png')}}" style="height: 15px; margin-right: 5px">
                                        </div>
                                        <div class="tvOverPic tvLikeSection">
                                            <div class="tvLike">
                                                <span>20</span>
                                                <i class="DisLikeIcon"></i>
                                            </div>
                                            <div class="tvLike" style="margin-right: 10px">
                                                <span>20</span>
                                                <i class="LikeIcon"></i>
                                            </div>
                                        </div>
                                        <img src="https://static.koochita.com/_images/video/68/1593441472836.jpg" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                                    </a>
                                    <a href="https://www.koochitatv.com/video/show/9OBLNC06s3" class="tvVideoName showLessText" target="_blank">
                                        گفت و گو با نوا جمشیدی
                                    </a>
                                    <div class="tvUserContentDiv">
                                        <div class="tvUserPic">
                                            <img src="https://static.koochita.com/_images/defaultPic/2.jpg" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                                        </div>
                                        <div class="tvUserInfo">
                                            <div class="tvUserName"> KoochitaTv </div>
                                            <div class="tvUserTime"> دیروز </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="https://koochitatv.com" class="tvSeeMore" target="_blank">
                                <div class="tvSeeMoreIcons">
                                    <i class="leftArrowIcon"></i>
                                    <i class="leftArrowIcon"></i>
                                </div>
                                {{__('بیشتر ببینید')}}
                            </a>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div id="targetHelp_8" class="wideScreen targets float-left col-xs-6 pd-0">
                        <span onclick="bookMark();"
                              class="ui_button save-location-7306673 saveAsBookmarkMainDiv">
                            <div id="bookMarkIcon" class="saveAsBookmarkIcon {{auth()->check() && ($bookMark) ? "castle-fill" : "castles"}}"></div>
                            <div class="saveAsBookmarkLabel">
                                {{__('ذخیره این صفحه')}}
                            </div>
                        </span>
                    </div>

                    <div id="share_pic" class="wideScreen targets float-left col-xs-6 pd-0">
                        <span class="ui_button save-location-7306673 sharePageMainDiv">
                            <div class="shareIconDiv sharePageIcon first"></div>
                            <div class="sharePageLabel">
                                {{__('اشتراک‌گذاری صفحه')}}
                            </div>
                        </span>
                    </div>
                    @include('layouts.shareBox')

                </div>
                <div class="prw_rup prw_common_location_photos photos position-relative">
                    <div id="targetHelp_10" class="targets">
                        <div class="inner">
                            <div class="primaryWrap">
                                <div class="prw_rup prw_common_mercury_photo_carousel">
                                    <div class="carousel bignav">
                                        <div class="carousel_images carousel_images_header">
                                            <div id="photographerAlbum" {{count($photographerPics) > 0 ? "onclick=showPhotoAlbum('photographer')" : ''}}>
                                                <div id="mainSlider" class="swiper-container">
                                                    <div id="mainSliderWrapper" class="swiper-wrapper">

                                                        @for($i = 0; $i < count($photographerPics); $i++)
                                                            <div class="swiper-slide" style="overflow: hidden">
                                                                <img class="eachPicOfSlider resizeImgClass"
                                                                     src="{{$photographerPics[$i]['s']}}"
                                                                     alt="{{$photographerPics[$i]['alt']}}"
                                                                     style="width: 100%;"  onload="fitThisImg(this)">
                                                                <div class="see_all_count_wrap">
                                                                    <span class="see_all_count">
                                                                        <div class="circleBase type2"
                                                                             id="photographerIdPic"
                                                                             style="background-color: var(--koochita-light-green);">
                                                                            <img src="{{$photographerPics[$i]['userPic']}}"
                                                                                 style="width: 100%; height: 100%; border-radius: 50%;">
                                                                        </div>
                                                                        <div class="display-inline-block mg-rt-10 mg-tp-2">
                                                                            <span class="display-block font-size-12">عکس از</span>
                                                                            <span class="display-block">{{$photographerPics[$i]['name']}}</span>
                                                                        </div>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                        @endfor

                                                    </div>

                                                </div>
                                            </div>
                                            <a id="photographersLink" onclick="isPhotographer()">
                                                عکاس هستید؟ کلیک کنید
                                            </a>
                                        </div>
                                        <div class="left-nav left-nav-header swiper-button-next mainSliderNavBut"></div>
                                        <div class="right-nav right-nav-header swiper-button-prev mainSliderNavBut"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="secondaryWrap">
                                <div class="tileWrap" onclick="showPhotoAlbum('sitePics')">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                                @if(count($sitePics) != 0)
                                                    <span class="imgWrap imgWrap1stTemp">
                                                        <img alt="{{$place->alt}}" src="{{$thumbnail}}" class="resizeImgClass centeredImg" width="100%" onload="fitThisImg(this)"/>
                                                    </span>
                                                @else
                                                    <span class="imgWrap imgWrap1stTemp">
                                                        <img src="{{URL::asset('images/mainPics/nopictext1.jpg')}}" class="resizeImgClass centeredImg" width="100%" onload="fitThisImg(this)"/>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="albumInfo" {{count($sitePics) != 0 ? 'data-toggle="modal" data-target="#showingSitePicsModal"' : ''}}>
                                                <span class="ui_icon camera">&nbsp;</span>
                                                عکس‌های سایت - {{count($sitePics)}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tileWrap" onclick=showPhotoAlbum("userPics")>
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                        <span class="imgWrap imgWrap1stTemp">
                                            @if(count($userPhotos) != 0)
                                                <img src="{{$userPhotos[0]->pic}}" class="resizeImgClass centeredImg" width="100%" onload="fitThisImg(this)"/>
                                            @else
                                                <img src="{{URL::asset('images/mainPics/nopictext1.jpg')}}"
                                                     class="resizeImgClass centeredImg" width="100%" onload="fitThisImg(this)"/>
                                            @endif
                                        </span>
                                            </div>
                                            <div {{(count($userPhotos) != 0) ? 'onclick=showPhotoAlbum("userPics")' : "" }}  class="albumInfo">
                                                <span class="ui_icon camera">&nbsp;</span>عکس‌های
                                                کاربران - {{count($userPhotos)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tileWrap" onclick="showPhotoAlbum('userVideo')">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                            <span class="imgWrap imgWrap1stTemp">
                                                @if(count($userVideo) > 0)
                                                    <img src="{{$userVideo[0]->picName}}" class="resizeImgClass" onload="fitThisImg(this)">
                                                @else
                                                    <img src="{{URL::asset('images/mainPics/nopictext1.jpg')}}"
                                                         class="centeredImg" width="100%"/>
                                                @endif
                                            </span>
                                            </div>
                                            <div class="albumInfo">
                                                <span class="ui_icon camera">&nbsp;</span>
                                                ویدیو و فیلم 360 - {{ count($userVideo) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a class="postLink" href="#reviewMainDivDetails">
                        <div id="mainStoreReviewDiv" class="postMainDiv">
                            <div class="postMainDivHeader">
                                {{__('دیدگاه شما')}}
                            </div>
                            <div id="commentInputMainDiv">
                                <div class="inputBoxGeneralInfo inputBox postInputBox" id="commentInputBox">
                                    <div id="profilePicForComment" class="profilePicForPost circleBase type2">
                                        <img src="{{ $userPic }}" style="width: 100%; height: 100%; border-radius: 50%;">
                                    </div>
                                    @if(auth()->check())
                                        <textarea class="inputBoxInput inputBoxInputComment showNewTextReviewArea" type="text"
                                                  placeholder="{{auth()->user()->username }}، چه فکر یا احساسی داری.....؟"
                                                  onclick="newPostModal('textarea')" readonly></textarea>
                                    @else
                                        <textarea class="inputBoxInput inputBoxInputComment showNewTextReviewArea" type="text"
                                                  placeholder=" چه فکر یا احساسی داری.....؟"
                                                  onclick="newPostModal('textarea')" readonly></textarea>
                                    @endif
                                    <img class="commentSmileyIcon" src="{{URL::asset('images/smile.png')}}">
                                </div>
                            </div>
                            <div class="commentMoreSettingBar">
                                <div class="commentOptionsBoxes">
                                    <label {{auth()->check() ? 'for=picReviewInput0 onclick=newPostModal()' : 'onclick=newPostModal()'}}>
                                        <span class="addPhotoCommentIcon"></span>
                                        <span class="commentOptionsText">{{__('عکس اضافه کنید.')}}</span>
                                    </label>
                                </div>
                                <div class="commentOptionsBoxes">
                                    <label {{auth()->check() ? 'for=videoReviewInput onclick=newPostModal()' : 'onclick=newPostModal()'}}>
                                        <span class="addVideoCommentIcon"></span>
                                        <span class="commentOptionsText">{{__('ویدیو اضافه کنید.')}}</span>
                                    </label>
                                </div>
                                <div class="commentOptionsBoxes">
                                    <label {{auth()->check() ? 'for=video360ReviewInput onclick=newPostModal()' : 'onclick=newPostModal()'}}>
                                        <span class="add360VideoCommentIcon"></span>
                                        <span class="commentOptionsText">{{__('ویدیو 360 اضافه کنید.')}}</span>
                                    </label>
                                </div>
                                <div class="commentOptionsBoxes" id="bodyLinks" onclick="newPostModal('tag')">
                                    <span class="tagFriendCommentIcon"></span>
                                    <span class="commentOptionsText">{{__('دوستانتان را tag کنید.')}}</span>
                                </div>
                                <div class="commentOptionsBoxes moreSettingPostManDiv" onclick="newPostModal()">
                                    <span class="moreSettingPost"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <script>
                    if (photographerPics.length > 0) {
                        var mainSlideSwiper = new Swiper('#mainSlider', {
                            spaceBetween: 0,
                            centeredSlides: true,
                            loop: true,
                            autoplay: {
                                delay: 5000,
                                disableOnInteraction: false,
                            },
                            navigation: {
                                prevEl: '.swiper-button-next',
                                nextEl: '.swiper-button-prev',
                            },
                        });
                    } else {
                        $('.mainSliderNavBut').css('display', 'none');
                        $('.see_all_count_wrap').css('display', 'none');
                        text = '<div class="swiper-slide" style="overflow: hidden">\n' +
                            '<img class="eachPicOfSlider resizeImgClass" src="{{URL::asset('images/mainPics/nopictext1.jpg')}}" style="width: 100%;">\n' +
                            '</div>';
                        $('#mainSliderWrapper').append(text);
                    }
                </script>
            </div>
        </div>

    </div>

    <div id="MAINWRAP" class="full_meta_photos_v3  full_meta_photos_v4  big_pic_mainwrap_tweaks horizontal_xsell ui_container is-mobile position-relative">
        <div id="MAIN" class="Hotel_Review prodp13n_jfy_overflow_visible position-relative">
            <div id="BODYCON" class="col easyClear bodLHN poolB adjust_padding new_meta_chevron new_meta_chevron_v2 position-relative">
                @if($placeMode == 'mahaliFood')
                    <nav id="sticky" class="tabLinkMainWrapMainDIV navbar navbar-inverse"   >
                        <div class="container-fluid tabLinkMainWrapMainDiv tabLinkMainWrapMainDiv_Food">
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a class="tabLinkMainWrap QAndAsBtnTopBar" href="#QAndAMainDivId" onclick="colorThisNav(this)">
                                            سؤالات
                                        </a>
                                    </li>
                                    <li>
                                        <a id="pcPostButton" class="tabLinkMainWrap postsBtnTopBar" href="#mainDivPlacePost" onclick="colorThisNav(this)">
                                            پست
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tabLinkMainWrap generalDescBtnTopBar" href="#generalDescLinkRel" onclick="colorThisNav(this)">
                                            دستور پخت
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                @else
                    <nav id="sticky" class="tabLinkMainWrapMainDIV navbar navbar-inverse">
                        <div class="container-fluid tabLinkMainWrapMainDiv">
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a class="tabLinkMainWrap similarLocationsBtnTopBar" href="#topPlacesSection" onclick="colorThisNav(this)">
                                            مکان‌های مشابه
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tabLinkMainWrap QAndAsBtnTopBar" href="#QAndAMainDivId" onclick="colorThisNav(this)">
                                            سؤالات
                                        </a>
                                    </li>
                                    <li>
                                        <a id="pcPostButton" class="tabLinkMainWrap postsBtnTopBar" href="#mainDivPlacePost" onclick="colorThisNav(this)">
                                            پست
                                        </a>
                                    </li>
                                    <li>
                                        <a class="tabLinkMainWrap generalDescBtnTopBar" href="#generalDescLinkRel" onclick="colorThisNav(this)">
                                            معرفی کلی
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                @endif

                <div class="exceptQAndADiv" id="generalDescLinkRel" style="display: inline-block">
                    <div class="hr_btf_wrap position-relative">
                        <div id="introduction" class="ppr_rup ppr_priv_location_detail_overview">
                            <div class="block_wrap" data-tab="TABS_OVERVIEW">
                                <div class="overviewContent">
                                    <div id="mobileIntroductionMainDivId" class="mobileIntroductionMainDiv tabContentMainWrap">
                                        @if($placeMode == 'mahaliFood')
                                            <div class="tabLinkMainDiv">
                                                <button class="tabLink" onclick="openCity('commentsAndAddressMobile', this, 'white', 'var(--koochita-light-green)')">
                                                    دستور پخت
                                                </button><!--
                                     -->
                                                <button class="tabLink"
                                                        onclick="openCity('detailsAndFeaturesMobile', this, 'white', 'var(--koochita-light-green)')">
                                                    کالری
                                                </button><!--
                                     -->
                                                <button class="tabLink"
                                                        onclick="openCity('generalDescriptionMobile', this, 'white', 'var(--koochita-light-green)')"
                                                        id="defaultOpen">
                                                    مواد و لوازم
                                                </button>
                                            </div>
                                        @else
                                            <div class="tabLinkMainDiv">
                                                <button class="tabLink"
                                                        onclick="openCity('commentsAndAddressMobile', this, 'white', 'var(--koochita-light-green)')">
                                                    نظرات و آدرس
                                                </button><!--
                                     -->
                                                <button class="tabLink"
                                                        onclick="openCity('detailsAndFeaturesMobile', this, 'white', 'var(--koochita-light-green)')">
                                                    امکانات و ویژگی‌ها
                                                </button><!--
                                     -->
                                                <button class="tabLink"
                                                        onclick="openCity('generalDescriptionMobile', this, 'white', 'var(--koochita-light-green)')"
                                                        id="defaultOpen">معرفی کلی
                                                </button>
                                            </div>
                                        @endif

                                        <?php
                                        if ($kindPlaceId == 4 ||$kindPlaceId == 12) {
                                            $showInfo = 12;
                                            $showReviewRate = 4;
                                            $showFeatures = 8;
                                            $mainInfoClass = '';
                                        } else {
                                            $showInfo = 4;
                                            $showReviewRate = 4;
                                            $showFeatures = 4;
                                            $mainInfoClass = 'mainInfo';
                                        }
                                        ?>

                                        @if($placeMode == 'mahaliFood')
                                            <div class="ui_columns is-multiline is-mobile reviewsAndDetails direction-rtlImp">

                                                <div id="generalDescriptionMobile"
                                                     class="ui_column is-8 generalDescription tabContent">
                                                    <div class="block_header">
                                                        <h3 class="block_title">مواد لازم:</h3>
                                                    </div>
                                                    <div>
                                                        <div class="row">
                                                            @if(isset($place->material) && is_array($place->material))
                                                                <div class="col-sm-6">
                                                                    @foreach($place->material as $key => $item)
                                                                        @if($key%2 == 0)
                                                                            <div class="row font-size-20">
                                                                                <div class="col-sm-6 col-xs-12 float-right">{{$item[0]}}</div>
                                                                                <div class="col-sm-6 col-xs-12 color-green">{{$item[1]}}</div>
                                                                            </div>
                                                                            <hr>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                <div class="col-sm-6"
                                                                     style="border-left: 1px solid #eee;">
                                                                    @foreach($place->material as $key => $item)
                                                                        @if($key%2 != 0)
                                                                            <div class="row font-size-20">
                                                                                <div class="col-sm-6 col-xs-12 float-right">{{$item[0]}}</div>
                                                                                <div class="col-sm-6 col-xs-12 color-green">{{$item[1]}}</div>
                                                                            </div>
                                                                            <hr>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="detailsAndFeaturesMobile"
                                                     class="ui_column is-4 details tabContent {{$mainInfoClass}}">
                                                    <div class="direction-rtl featureOfPlaceMiddleContent row"
                                                         style="margin: 0px">
                                                        @include('pages.placeDetails.tables.mahalifood-details-table')
                                                    </div>
                                                </div>

                                                <div id="commentsAndAddressMobile"
                                                     class="ui_column is-8 generalDescription tabContent">
                                                    <div class="block_header">
                                                        <h3 class="block_title">دستور پخت:</h3>
                                                    </div>
                                                    <div class="toggleDescription" style="position: relative">
                                                        <div class="unselectedText overviewContent descriptionOfPlaceMiddleContent"
                                                             id="introductionText">
                                                            {!! $place->recipes !!}
                                                        </div>
                                                            <span class="showMoreDescriptionInDetails"></span>
                                                    </div>
                                                </div>

                                                <div id="commentsAndAddressMobile"
                                                     class="ui_column is-4 reviews tabContent">
                                                    <div class="rateOfPlaceMiddleContent">
                                                        <div class="rating">
                                                            <div class="block_header">
                                                                <h3 class="block_title">نظر شما </h3>
                                                            </div>
                                                            <span class="overallRating">{{$avgRate}} </span>
                                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating">
                                                        <span class="ui_bubble_rating bubble_{{$avgRate}}0 font-size-28"
                                                              property="ratingValue" content="{{$avgRate}}"
                                                              alt='{{$avgRate}} of 5 bubbles'></span>
                                                            </div>
                                                            <a class="seeAllReviews autoResize" href="#REVIEWS"></a>
                                                        </div>
                                                        <div class="prw_rup prw_common_ratings_histogram_overview overviewHistogram">
                                                            <ul class="ratings_chart">
                                                                <li class="chart_row highlighted clickable">
                                                                    <span class="row_label row_cell">عالی</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width: {{ceil($rates[4] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[4] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row clickable">
                                                                    <span class="row_label row_cell">خوب</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[3] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[3] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row clickable">
                                                                    <span class="row_label row_cell">معمولی</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[2] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[2] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row clickable">
                                                                    <span class="row_label row_cell">ضعیف</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[1] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[1] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row">
                                                                    <span class="row_label row_cell">خیلی بد </span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[0] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[0] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div id="tagsName">
                                                            <h3>برچسب‌ها:</h3>
                                                            @foreach($place->tags as $key => $item)
                                                                @if($key <= 5)
                                                                    <span class="tag">{{$item}}</span>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <div class="ui_columns is-multiline is-mobile reviewsAndDetails direction-rtlImp">
                                                <div id="generalDescriptionMobile"
                                                     class="ui_column is-{{$showInfo}} generalDescription tabContent">
                                                    <div class="block_header">
                                                        <h3 class="block_title">{{__('معرفی کلی')}} </h3>
                                                    </div>
                                                    <div class="toggleDescription" style="position: relative">
                                                        <div class="unselectedText overviewContent descriptionOfPlaceMiddleContent"
                                                             id="introductionText">
                                                            {!! $place->description !!}
                                                            @if($kindPlaceId != 4)
                                                                <span class="introductionShowMore">
                                                                    بیشتر
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="detailsAndFeaturesMobile"
                                                     class="ui_column is-{{$showFeatures}} details tabContent {{$mainInfoClass}} featureOfPlaceMiddle">
                                                    <div class="direction-rtl featureOfPlaceMiddleContent row"
                                                         style="margin: 0px">
                                                        <?php $k = -1; ?>

                                                        @if($placeMode == "hotels")
                                                            @include('pages.placeDetails.tables.hotel-details-table')
                                                        @elseif($placeMode == "amaken")
                                                            @include('pages.placeDetails.tables.amaken-details-table')
                                                        @elseif($placeMode == "restaurant")
                                                            @include('pages.placeDetails.tables.restaurant-details-table')
                                                        @elseif($placeMode == "majara")
                                                            @include('pages.placeDetails.tables.majara-details-table')
                                                        @elseif($placeMode == "sogatSanaies")
                                                            @include('pages.placeDetails.tables.sogatsanaie-details-table')
                                                        @elseif($placeMode == "boomgardies")
                                                            @include('pages.placeDetails.tables.boomgardies-details-table')
                                                        @endif
                                                    </div>
                                                </div>
                                                <div id="commentsAndAddressMobile"
                                                     class="ui_column is-{{$showReviewRate}} reviews tabContent rateOfPlaceMiddle">
                                                    <div class="rateOfPlaceMiddleContent row" style="margin: 0px;">
                                                        <div class="rating">
                                                            <div class="block_header">
                                                                <h3 class="block_title">نظر شما </h3>
                                                            </div>
                                                            <span class="overallRating">{{$avgRate}} </span>
                                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating">
                                                                <span class="ui_bubble_rating bubble_{{$avgRate}}0 font-size-28"
                                                                      property="ratingValue" content="{{$avgRate}}"
                                                                      alt='{{$avgRate}} of 5 bubbles'></span>
                                                            </div>
                                                            <a class="seeAllReviews autoResize" href="#REVIEWS"></a>
                                                        </div>
                                                        <div class="prw_rup prw_common_ratings_histogram_overview overviewHistogram">
                                                            <ul class="ratings_chart">
                                                                <li class="chart_row highlighted clickable">
                                                                    <span class="row_label row_cell">عالی</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width: {{ceil($rates[4] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[4] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row clickable">
                                                                    <span class="row_label row_cell">خوب</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[3] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[3] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row clickable">
                                                                    <span class="row_label row_cell">معمولی</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[2] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[2] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row clickable">
                                                                    <span class="row_label row_cell">ضعیف</span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[1] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[1] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                                <li class="chart_row">
                                                                    <span class="row_label row_cell">خیلی بد </span>
                                                                    <span class="row_bar row_cell">
                                                            <span class="bar">
                                                                <span class="fill"
                                                                      style="width:{{ceil($rates[0] * 100 / $total)}}%;"></span>
                                                            </span>
                                                        </span>
                                                                    <span class="row_count row_cell">{{ceil($rates[0] * 100 / $total)}}
                                                                %</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="prw_rup prw_common_atf_header_bl"
                                                             id="clientConnectionsLines">
                                                            <div class="blEntry address mg-bt-10 clickable" id="clientConnectionsAddress" onclick="showExtendedMap()">
                                                                <span class="ui_icon map-pin"></span>
                                                                @if($placeMode != 'mahaliFood' && $placeMode != 'sogatSanaies' && $placeMode != 'majara')
                                                                    <span class="street-address">آدرس : </span>
                                                                    <span>{{$place->address}}</span>
                                                                @elseif( $placeMode == 'majara')
                                                                    <span class="street-address">آدرس : </span>
                                                                    <span>{{$place->dastresi}}</span>
                                                                @endif
                                                            </div>

                                                            @if(isset($place->phone) && is_array($place->phone) && count($place->phone) > 0)
                                                                <div class="blEntry blEn phone truePhone">
                                                                    <span class="ui_icon phone"></span>
                                                                    @foreach($place->phone as $key => $phone)
                                                                        <a href="tel:{{$phone}}">
                                                                            {{$phone}}
                                                                        </a>
                                                                        @if($key != count($place->phone)-1)
                                                                            -
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            @endif

                                                            @if(!empty($place->site))
                                                                <div class="blEntry website mg-bt-10"
                                                                     id="clientConnectionsWebsite">
                                                                    <span class="ui_icon laptop"></span>
                                                                    <?php
                                                                    if (strpos($place->site, 'http') === false)
                                                                        $place->site = 'http://' . $place->site;
                                                                    ?>
                                                                    <a target="_blank"
                                                                       href="{{$place->site}}" {{($config->externalSiteNoFollow) ? 'rel="nofollow"' : ''}}>
                                                                        <span class="font-size-12">{{$place->site}}</span>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div id="tagsName">
                                                            <h3>برچسب‌ها:</h3>
                                                            @foreach($place->tags as $key => $item)
                                                                @if($key <= 5)
                                                                    <span class="tag">{{$item}}</span>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($placeMode != 'sogatSanaies' && $placeMode != 'mahaliFood')
                                                <div class="topMainMapDiv">
                                                    <div id="mainMap" class="mainMap placeHolderAnime"></div>
                                                </div>
                                                @include('layouts.extendedMap')

                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </div>
{{--                        @include('pages.placeDetails.component.roomReservation')--}}
                    </div>

                    <div id="mainDivPlacePost" class="tabContentMainWrap">
                        <div id="phoneReviewFilterHeader" class="topHeaderBarPosts display-none">
                            <span class="float-right text-align-right">جستجوی‌ بیشتر در پست‌ها</span>
                            <span class="float-left">مشاهده همه پست‌ها</span>
                        </div>

                        <div class="topBarContainerPosts display-none"></div>

                        <div class="col-md-5 col-xs-12 pd-0 pd-rt-10Imp leftColMainWrap">

                            @include('hotel-details.filterSection')

                            <center id="advertiseDiv" class="col-xs-12 adsMainDiv">
                                {{--@include('features.advertise3D')--}}
                            </center>
                        </div>

                        @include('hotel-details.reviewSection')
                    </div>
                    <div class="clear-both"></div>
                    @include('hotel-details.questionSection')
                </div>

                @if($placeMode != 'sogatSanaies' && $placeMode != 'mahaliFood')
                    @include('component.rowSuggestion')
                @endif
            </div>
        </div>
    </div>


    @if(isset($video) && $video != null)
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body" style="justify-content: center; display: flex;">
                        <video id="my-video" class="video-js vjs-default-skin" controls style=" max-height: 80vh;">
                            <source src="{{URL::asset('vr2/contents/' . $video)}}" type="video/mp4">
                        </video>
                        ویدیویی برای نمایش موجود
                    </div>
                </div>
            </div>
        </div>

        <script>
            var player;
            (function (window, videojs) {
                player = window.player = videojs('my-video');
                player.mediainfo = player.mediainfo || {};
                player.mediainfo.projection = '360';

                // AUTO is the default and looks at mediainfo
                var vr = window.vr = player.vr({projection: '360', debug: false, forceCardboard: false});
            }(window, window.videojs));
            //
            $('#myModal').on('hidden.bs.modal', function () {
                player.pause();
            });

            function showModal() {
                $('#myModal').modal('toggle');
                player.play();
            }
        </script>
    @endif

    @if($placeMode != 'sogatSanaies' && $placeMode != 'mahaliFood')
        <script>
            var topPlacesSections = [
                {
                    name: '{{__('بوم گردی های نزدیک')}}',
                    id: 'nearDivboomgardy',
                    url: '#'
                },
                {
                    name: '{{__('جاذبه های نزدیک')}}',
                    id: 'nearDivamaken',
                    url: '#'
                },
                {
                    name: '{{__('محبوب‌ترین رستوران‌ها')}}',
                    id: 'nearDivrestaurant',
                    url: '#'
                },
                {
                    name: '{{__('اقامتگاه های نزدیک')}}',
                    id: 'nearDivhotels',
                    url: '#'
                },
                {
                    name: '{{__('طبیعت گردی های نزدیک')}}',
                    id: 'nearDivmajara',
                    url: '#'
                },
                {
                    name: '{{__('سفرنامه ها')}}',
                    id: 'articleSuggestion',
                    url: '#'
                },
            ];

            initPlaceRowSection(topPlacesSections);

            function initNearbySwiper() {
                var swiper = new Swiper('.mainSuggestion', {
                    slidesPerGroup: 1,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    autoplay: {
                        delay: 4000,
                    },
                    breakpoints: {

                        450: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },

                        520: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },

                        768: {
                            slidesPerView: 2,
                            spaceBetween: 30,
                        },

                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },

                        10000: {
                            slidesPerView: 4,
                            spaceBetween: 30,
                        }
                    }
                });
            }

            function getNearbyToPlace(){
                // getNearby
                $.ajax({
                    type: 'post',
                    url: '{{route("getNearby")}}',
                    data: {
                        'placeId': placeId,
                        'kindPlaceId' : kindPlaceId,
                        'count' : 10,
                    },
                    success: function(response){
                        response = JSON.parse(response);
                        let center = {
                            x: '{{$place->C}}',
                            y: '{{$place->D}}'
                        };

                        createMap('mainMap', center, response[0], true);

                        createSuggestionRowWithData(response[0]);
                        createArticleRowWithData(response[1]);
                    }
                });
            }

            function createSuggestionRowWithData(_result){
                let fk = Object.keys(_result);
                for (let x of fk) {
                    if(_result[x].length > 4) {
                        createSuggestionPack('nearDiv' + x + 'Content', _result[x], function () { // in suggestionPack.blade.php
                            $('#nearDiv' + x + 'Content').find('.suggestionPackDiv').addClass('swiper-slide');
                            resizeFitImg('resizeImgClass')
                        });
                    }
                    else
                        $('#' + x).hide();
                }

                initNearbySwiper();
            }

            function createArticleRowWithData(_articles){

                createSuggestionPack('articleSuggestionContent', _articles, function () { // in suggestionPack.blade.php
                    $('#articleSuggestionContent').find('.suggestionPackDiv').addClass('swiper-slide');
                    initNearbySwiper();
                });
            }

            getNearbyToPlace();

        </script>
    @endif

    <script>
        $(window).on('scroll', function(e){
            let topOfSticky = document.getElementById('BODYCON').getBoundingClientRect().top;
            if(topOfSticky < 20 && !$('#sticky').hasClass('stickyFixTop'))
                $('#sticky').addClass('stickyFixTop');
            else if(topOfSticky >= 25 && $('#sticky').hasClass('stickyFixTop'))
                $('#sticky').removeClass('stickyFixTop');

            let topOfInfo = document.getElementById('generalDescLinkRel').getBoundingClientRect().top;
            let topOfQA = document.getElementById('QAndAMainDivId').getBoundingClientRect().top;
            let topOfPost = document.getElementById('mainDivPlacePost').getBoundingClientRect().top;

            if(topOfInfo < 0) {
                $('.tabLinkMainWrap').css('color', 'black');
                $('.generalDescBtnTopBar').css('color', 'var(--koochita-light-green)');
            }
            else
                $('.generalDescBtnTopBar').css('color', 'black');

            if(topOfPost < 0) {
                $('.tabLinkMainWrap').css('color', 'black');
                $('.postsBtnTopBar').css('color', 'var(--koochita-light-green)');
            }
            else
                $('.postsBtnTopBar').css('color', 'black');

            if(topOfQA < 0) {
                $('.tabLinkMainWrap').css('color', 'black');
                $('.QAndAsBtnTopBar').css('color', 'var(--koochita-light-green)');
            }
            else
                $('.QAndAsBtnTopBar').css('color', 'black');

            let topOfSimilar = document.getElementById('topPlacesSection');
            if(topOfSimilar){
                topOfSimilar = topOfSimilar.getBoundingClientRect().top;
                if(topOfSimilar < 0) {
                    $('.tabLinkMainWrap').css('color', 'black');
                    $('.similarLocationsBtnTopBar').css('color', 'var(--koochita-light-green)');
                }
                else
                    $('.similarLocationsBtnTopBar').css('color', 'black');
            }
        });

        function colorThisNav(_elemnt){
            setTimeout(() => {
                $('.tabLinkMainWrap').css('color', 'black');
                $(_elemnt).css('color', 'var(--koochita-light-green)');
            }, 100)
        }


        $(document).ready(function () {
            autosize($(".inputBoxInputComment"));
            autosize($(".inputBoxInputAnswer"));

            if (window.matchMedia('(max-width: 373px)').matches) {
                $('.eachCommentMainBox').removeClass('mg-rt-45')
            }
        });

        var heightOfDescription = $('.descriptionOfPlaceMiddleContent').height();
        var heightOfFeature = $('.featureOfPlaceMiddleContent').height();
        var heightOfContent = $('.rateOfPlaceMiddleContent').height();
        var minHeightOfConent = [heightOfFeature, heightOfContent];
        var sortHeightOfContent = minHeightOfConent.sort(function (a, b) {
            return a - b
        });
        var selectedHegihtForDescription = sortHeightOfContent[1] - 50;

        if(heightOfDescription < selectedHegihtForDescription)
            $('.introductionShowMore').css('display', 'none');

        lineHeight = Math.floor(selectedHegihtForDescription / 25); // 25 line-heigh description
        selectedHegihtForDescription = lineHeight * 25;

        @if($kindPlaceId == 4)
            selectedHegihtForDescription = 305;
        @endif

        $('.descriptionOfPlaceMiddleContent').css('max-height', selectedHegihtForDescription + 'px');

        var showFullDescription = false;

        function toggleMainDescription() {
            if (showFullDescription) {
                $('.descriptionOfPlaceMiddleContent').css('max-height', selectedHegihtForDescription + 'px');
                $('.descriptionOfPlaceMiddleContent').css('margin-bottom', '0px');
                @if($placeMode != 'mahaliFood')
                    $('.generalDescription').css('width', '');
                    $('.featureOfPlaceMiddle').css('width', '');
                    $('.rateOfPlaceMiddle').css('width', '');
                @endif
                $('.introductionShowMore').text('بیشتر');
                $('.introductionShowMore').removeClass('introductionShowMoreLess');
                showFullDescription = false;
            } else {
                $('.descriptionOfPlaceMiddleContent').css('max-height', '20000px');
                $('.descriptionOfPlaceMiddleContent').css('margin-bottom', '30px');
                @if($placeMode != 'mahaliFood')
                    $('.generalDescription').css('width', '100%');
                    $('.featureOfPlaceMiddle').css('width', '50%');
                    $('.rateOfPlaceMiddle').css('width', '50%');
                @endif
                $('.introductionShowMore').text('کمتر');
                $('.introductionShowMore').addClass('introductionShowMoreLess');
                showFullDescription = true;
            }
        }

        @if($kindPlaceId != 4 && $kindPlaceId != 12)
            $('.descriptionOfPlaceMiddleContent').on('click', toggleMainDescription);
        @endif


        function isPhotographer() {
            if (!checkLogin())
                return;

            //additionalData must be json format
            additionalData = {
                'placeId': '{{$place->id}}',
                'kindPlaceId': '{{$kindPlaceId}}'
            };
            var _title = '{{$place->name}}' + ' در ' + '{{$city->name}}';
            additionalData = JSON.stringify(additionalData);
            openUploadPhotoModal(_title, '{{route('addPhotoToPlace')}}', '{{$place->id}}', '{{$kindPlaceId}}', additionalData);
        }

        function openCity(cityName, elmnt, color, fontColor) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tabLink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            tablinks = document.getElementsByClassName("tabLink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.color = "";
            }
            tablinks = document.getElementsByClassName("tabLink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.borderColor = "";
            }
            document.getElementById(cityName).style.display = "block";
            elmnt.style.backgroundColor = color;
            elmnt.style.color = fontColor;
            elmnt.style.borderColor = fontColor;

        }

        function showAnswersActionBox(element) {
            $(element).next().toggle() ,
                $(element).toggleClass("bg-color-darkgrey")
        }



        function filterChoices(element) {
            $(element).toggleClass('bg-color-yellowImp')
        }

        function likePostsComment(element) {
            $(element).toggleClass('color-red'),
                $(element).children("span.firstIcon").toggle(),
                $(element).children("span.secondIcon").toggle()
        }

        function disLikePostsComment(element) {
            $(element).toggleClass('dark-red'),
                $(element).children("span.firstIcon").toggle(),
                $(element).children("span.secondIcon").toggle()
        }

        function showPostsComments(element) {
            $(element).parent().parent().next().toggle();
            $(element).toggleClass('color-blue'),
                $(element).children("span.firstIcon").toggle(),
                $(element).children("span.secondIcon").toggle()
        }

        function SharePostsBtn(element) {
            $(element).children("span.firstIcon").toggle(),
                $(element).children("span.secondIcon").toggle()
        }

        function likeTheAnswers(element) {
            $(element).children().toggle(),
                $(element).toggleClass('color-red')
        }

        function dislikeTheAnswers(element) {
            $(element).children().toggle(),
                $(element).toggleClass('dark-red')
        }

        function likeTheAnswers2(element) {
            if ($(element).next().children().css('display') == 'none') {
                element2 = $(element).next();
                dislikeTheAnswers2(element2);
            }
            $(element).children().toggle();
            $(element).toggleClass('color-red');
        }

        function dislikeTheAnswers2(element) {
            if ($(element).prev().children().css('display') == 'none') {
                element2 = $(element).prev();
                likeTheAnswers2(element2);
            }

            $(element).children().toggle();
            $(element).toggleClass('dark-red');
        }

        function replyToComments(element) {
            $(element).parent().siblings("div.replyToCommentMainDiv").toggleClass("display-inline-blockImp")
            $(element).parent().parent().toggleClass('mg-bt-0')
        }

        function showPostsFilterBar() {
            $('.filterBarDivs').toggle();
            $('.visitKindTypeFilter').toggleClass('border-none')
        }
    </script>

    <script>
        var photographerPicsForAlbum = [];
        var sitePicsForAlbum = [];
        var userPhotosForAlbum = [];
        var userVideoForAlbum = [];

        for (var i = 0; i < photographerPics.length; i++) {
            photographerPicsForAlbum[i] = {
                'id': photographerPics[i]['id'],
                'sidePic': photographerPics[i]['l'],
                'mainPic': photographerPics[i]['s'],
                'userPic': photographerPics[i]['userPic'],
                'userName': photographerPics[i]['name'],
                'picName': photographerPics[i]['picName'],
                'like': photographerPics[i]['like'],
                'dislike': photographerPics[i]['dislike'],
                'alt': photographerPics[i]['alt'],
                'description': photographerPics[i]['description'],
                'uploadTime': photographerPics[i]['fromUpload'],
                'showInfo': photographerPics[i]['showInfo'],
                'userLike': photographerPics[i]['userLike'],
            }
        }

        for (var i = 0; i < sitePics.length; i++) {
            sitePicsForAlbum[i] = {
                'id': sitePics[i]['id'],
                'sidePic': sitePics[i]['l'],
                'mainPic': sitePics[i]['s'],
                'userPic': sitePics[i]['userPic'],
                'userName': sitePics[i]['name'],
                'like': sitePics[i]['like'],
                'dislike': sitePics[i]['dislike'],
                'alt': sitePics[i]['alt'],
                'description': sitePics[i]['description'],
                'uploadTime': sitePics[i]['fromUpload'],
                'showInfo': sitePics[i]['showInfo'],
                'userLike': sitePics[i]['userLike'],
            }
        }

        for (var i = 0; i < userPhotos.length; i++) {
            userPhotosForAlbum[i] = {
                'id': userPhotos[i]['id'],
                'sidePic': userPhotos[i]['pic'],
                'mainPic': userPhotos[i]['pic'],
                'userPic': userPhotos[i]['userPic'],
                'userName': userPhotos[i]['username'],
                'uploadTime': userPhotos[i]['time'],
                'showInfo': false,
            }
        }

        for (var i = 0; i < userVideo.length; i++) {
            userVideoForAlbum[i] = {
                'id': userVideo[i]['id'],
                'sidePic': userVideo[i]['picName'],
                'mainPic': userVideo[i]['picName'],
                'userPic': userVideo[i]['userPic'],
                'userName': userVideo[i]['username'],
                'video': userVideo[i]['video'],
                'uploadTime': userVideo[i]['time'],
                'showInfo': false,
            }
        }

        function showPhotoAlbum(_kind) {
            if (_kind == 'photographer' && photographerPicsForAlbum.length > 0)
                createPhotoModal('عکس های عکاسان', photographerPicsForAlbum);// in general.photoAlbumModal.blade.php
            else if (_kind == 'sitePics' && sitePicsForAlbum.length > 0)
                createPhotoModal('عکس های سایت', sitePicsForAlbum);// in general.photoAlbumModal.blade.php
            else if (_kind == 'userPics' && userPhotosForAlbum.length > 0)
                createPhotoModal('عکس های کاربران', userPhotosForAlbum);// in general.photoAlbumModal.blade.php
            else if (_kind == 'userVideo' && userVideoForAlbum.length > 0)
                createPhotoModal('ویدیو های کاربران', userVideoForAlbum);// in general.photoAlbumModal.blade.php
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpenMainWrap").style.color = "rgb(77, 199, 188)";

        $(document).ready(function () {
            @if($mode == "bookMark")
            bookMark();
            @elseif($mode == "saveToTrip")
            saveToTrip();
            @elseif($mode == "question")
            showAskQuestion();
            @elseif($mode == "addPhotoSuccessfully")
            $(".dark").css('display', '');
            $("#photoSubmitted").removeClass('hidden');
            @elseif($mode == 'err')
            showAddPhotoPane();
            $("#errMsgAddPhoto").append('{{$err}}');
            @elseif($mode == "addPhoto")
            showAddPhotoPane();
            @endif
            // $("#date_input").datepicker({
            //     numberOfMonths: 2,
            //     showButtonPanel: true,
            //     dateFormat: "yy/mm/dd"
            // });
            //
            // $("#date_input_end_inHotel").datepicker({
            //     numberOfMonths: 2,
            //     showButtonPanel: true,
            //     dateFormat: "yy/mm/dd"
            // });
        });
    </script>

    <script>
        var total;
        var filterRateAns = [];
        var filterMultiAns = [];
        var reviewFilters = [];

        var filters = [];
        var hasFilter = false;
        var topContainer;
        var marginTop;
        var helpWidth;
        var greenBackLimit = 5;
        var pageHeightSize = window.innerHeight;
        var additional = [];
        var indexes = [];
        $(".nextBtnsHelp").click(function () {
            show(parseInt($(this).attr('data-val')) + 1, 1);
        });
        $(".backBtnsHelp").click(function () {
            show(parseInt($(this).attr('data-val')) - 1, -1);
        });
        $(".exitBtnHelp").click(function () {
            myQuit();
        });

        function myQuit() {
            clear();
            $(".dark").hide();
            enableScroll();
        }

        function setGreenBackLimit(val) {
            greenBackLimit = val;
        }

        function initHelp(t, sL, topC, mT, hW) {
            total = t;
            filters = sL;
            topContainer = topC;
            marginTop = mT;
            helpWidth = hW;
            if (sL.length > 0)
                hasFilter = true;
            $(".dark").show();
            show(1, 1);
        }

        function initHelp2(t, sL, topC, mT, hW, i, a) {
            total = t;
            filters = sL;
            topContainer = topC;
            marginTop = mT;
            helpWidth = hW;
            additional = a;
            indexes = i;
            if (sL.length > 0)
                hasFilter = true;
            $(".dark").show();
            show(1, 1);
        }

        function isInFilters(key) {
            key = parseInt(key);
            for (j = 0; j < filters.length; j++) {
                if (filters[j] == key)
                    return true;
            }
            return false;
        }

        function getBack(curr) {
            for (i = curr - 1; i >= 0; i--) {
                if (!isInFilters(i))
                    return i;
            }
            return -1;
        }

        function getFixedFromLeft(elem) {
            if (elem.prop('id') == topContainer || elem.prop('id') == 'PAGE') {
                return parseInt(elem.css('margin-left').split('px')[0]);
            }
            return elem.position().left +
                parseInt(elem.css('margin-left').split('px')[0]) +
                getFixedFromLeft(elem.parent());
        }

        function getFixedFromTop(elem) {
            if (elem.prop('id') == topContainer) {
                return marginTop;
            }
            if (elem.prop('id') == "PAGE") {
                return 0;
            }
            return elem.position().top +
                parseInt(elem.css('margin-top').split('px')[0]) +
                getFixedFromTop(elem.parent());
        }

        function getNext(curr) {
            curr = parseInt(curr);
            for (i = curr + 1; i < total; i++) {
                if (!isInFilters(i))
                    return i;
            }
            return total;
        }

        function bubbles(curr) {
            if (total <= 1)
                return "";
            t = total - filters.length;
            newElement = "<div class='col-xs-12 position-relative'><div class='col-xs-12 bubbles pd-0 mg-rt-0' style='margin-left: " + ((400 - (t * 18)) / 2) + "px'>";
            for (i = 1; i < total; i++) {
                if (!isInFilters(i)) {
                    if (i == curr)
                        newElement += "<div id='notInFiltersDiv'></div>";
                    else
                        newElement += "<div id='isInFilterDiv' onclick='show(\"" + i + "\", 1)' class='helpBubble'></div>";
                }
            }
            newElement += "</div></div>";
            return newElement;
        }

        function clear() {
            $('.bubbles').remove();
            $(".targets").css({
                'position': '',
                'border': '',
                'padding': '',
                'background-color': '',
                'z-index': '',
                'cursor': '',
                'pointer-events': 'auto'
            });
            $(".helpSpans").addClass('hidden');
            $(".backBtnsHelp").attr('disabled', 'disabled');
            $(".nextBtnsHelp").attr('disabled', 'disabled');
        }

        function show(curr, inc) {
            clear();
            if (hasFilter) {
                while (isInFilters(curr)) {
                    curr += inc;
                }
            }
            if (getBack(curr) <= 0) {
                $("#backBtnHelp_" + curr).attr('disabled', 'disabled');
            } else {
                $("#backBtnHelp_" + curr).removeAttr('disabled');
            }
            if (getNext(curr) > total - 1) {
                $("#nextBtnHelp_" + curr).attr('disabled', 'disabled');
            } else {
                $("#nextBtnHelp_" + curr).removeAttr('disabled');
            }
            if (curr < greenBackLimit) {
                $("#targetHelp_" + curr).css({
                    'position': 'relative',
                    'border': '5px solid #333',
                    'padding': '10px',
                    'background-color': 'var(--koochita-light-green)',
                    'z-index': 1000001,
                    'cursor': 'auto'
                });
            } else {
                $("#targetHelp_" + curr).css({
                    'position': 'relative',
                    'border': '5px solid #333',
                    'padding': '10px',
                    'background-color': 'white',
                    'z-index': 100000001,
                    'cursor': 'auto'
                });
            }
            var targetWidth = $("#targetHelp_" + curr).css('width').split('px')[0];
            var targetHeight = parseInt($("#targetHelp_" + curr).css('height').split('px')[0]);
            for (j = 0; j < indexes.length; j++) {
                if (curr == indexes[j]) {
                    targetHeight += additional[j];
                    break;
                }
            }
            if ($("#targetHelp_" + curr).offset().top > 200) {
                $("html, body").scrollTop($("#targetHelp_" + curr).offset().top - 100);
                $("#helpSpan_" + curr).css({
                    'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                    'top': targetHeight + 120 + "px"
                }).removeClass('hidden').append(bubbles(curr));
            } else {
                $("#helpSpan_" + curr).css({
                    'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                    'top': ($("#targetHelp_" + curr).offset().top + targetHeight + 20) % pageHeightSize + "px"
                }).removeClass('hidden').append(bubbles(curr));
            }
            $(".helpBubble").on({
                mouseenter: function () {
                    $(this).css('background-color', '#ccc');
                },
                mouseleave: function () {
                    $(this).css('background-color', '#333');
                }
            });
            disableScroll();
        }

        // left: 37, up: 38, right: 39, down: 40,
        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
        var keys = {37: 1, 38: 1, 39: 1, 40: 1};

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault)
                e.preventDefault();
            e.returnValue = false;
        }

        function preventDefaultForScrollKeys(e) {
            if (keys[e.keyCode]) {
                preventDefault(e);
                return false;
            }
        }

        function disableScroll() {
            if (window.addEventListener) // older FF
                window.addEventListener('DOMMouseScroll', preventDefault, false);
            window.onwheel = preventDefault; // modern standard
            window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
            window.ontouchmove = preventDefault; // mobile
            document.onkeydown = preventDefaultForScrollKeys;
        }

        function enableScroll() {
            if (window.removeEventListener)
                window.removeEventListener('DOMMouseScroll', preventDefault, false);
            window.onmousewheel = document.onmousewheel = null;
            window.onwheel = null;
            window.ontouchmove = null;
            document.onkeydown = null;
        }
    </script>

    @if(session('room') != null || session('backDate') != null)
        <script>
            var room = 0;
            var adult = 0;
            var children = 0;
            @if(session('room') != null)
                room = parseInt('{{session('room')}}');
            adult = parseInt('{{session('adult')}}');
            children = parseInt('{{session('children')}}');
            @endif
        </script>
        @if(session('backDate') != null)
            <script src="{{URL::asset('js/hotelDetails/roomReservation.js')}}"></script>
            <script>
                var updateSession = '{{route("updateSession")}}';
                document.getElementById('backDate').value = '{{session("backDate")}}';
                var rooms = '{!! $jsonRoom !!}';
            </script>
        @endif

    @endif

@stop

