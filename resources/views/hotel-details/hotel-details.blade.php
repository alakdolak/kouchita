@extends('layouts.bodyPlace')

<?php
$total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
if ($total == 0)
    $total = 1;
?>
@section('title')
    <link rel="stylesheet" href="{{URL::asset('css/theme2/media_uploader.css')}}">
    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
    <title>{{$place->keyword}} | {{$city->name}} </title>
@stop

@section('meta')
    @if(count($photos) > 0)
        <meta property="og:image" content="{{$photos[0]}}"/>
        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>
        <meta property="og:image:width" content="550"/>
        <meta property="og:image:height" content="367"/>
        <meta name="twitter:image" content="{{$photos[0]}}"/>
    @endif
    <meta content="article" property="og:type"/>
    <meta property="og:title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>
    <meta name="twitter:card" content="{{$place->meta}}" />
    <meta name="twitter:description" content="{{$place->meta}}" />
    <meta name="twitter:title" content="{{$place->name}} | {{$city->name}} | کوچیتا" />
    @if(isset($place->C) && isset($place->D))
        <META NAME="geo.position" CONTENT="{{$place->C}}; {{$place->D}}">
    @endif

    <meta property="article:section" content="{{$placeMode}}" />
    {{--<meta property="article:published_time" content="2019-05-28T13:32:55+00:00" /> زمان انتشار--}}
    {{--<meta property="article:modified_time" content="2020-01-14T10:43:11+00:00" />زمان آخریت تغییر--}}
    {{--<meta property="og:updated_time" content="2020-01-14T10:43:11+00:00" /> زمان آخرین آپدیت--}}
    <meta property=" article:author " content="کوچیتا" />

    <meta name="keywords" content="{{$place->keyword}}">
    <meta property="og:description" content="{{$place->meta}}"/>
    <meta property="article:tag" content="{{$place->tag1}}"/>
    <meta property="article:tag" content="{{$place->tag2}}"/>
    <meta property="article:tag" content="{{$place->tag3}}"/>
    <meta property="article:tag" content="{{$place->tag4}}"/>
    <meta property="article:tag" content="{{$place->tag5}}"/>
    <meta property="article:tag" content="{{$place->tag6}}"/>
    <meta property="article:tag" content="{{$place->tag7}}"/>
    <meta property="article:tag" content="{{$place->tag8}}"/>
    <meta property="article:tag" content="{{$place->tag9}}"/>
    <meta property="article:tag" content="{{$place->tag10}}"/>
    <meta property="article:tag" content="{{$place->tag11}}"/>
    <meta property="article:tag" content="{{$place->tag12}}"/>
    <meta property="article:tag" content="{{$place->tag13}}"/>
    <meta property="article:tag" content="{{$place->tag14}}"/>
    <meta property="article:tag" content="{{$place->tag15}}"/>
    <meta property="og:url" content="{{Request::url()}}"/>

@stop

@section('header')
    @parent
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/cropper.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/hotelDetail.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}">
{{--    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/editor.css')}}">--}}

    <link rel="stylesheet" href="{{URL::asset('css/theme2/swiper.css')}}">
    <script src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>

    {{--vr--}}
    @if(isset($video) && $video != null)
        <link rel="stylesheet" href="{{URL::asset('vr2/video-js.css')}}">
        <link rel="stylesheet" href="{{URL::asset('vr2/videojs-vr.css')}}">
        <script src="{{URL::asset('vr2/video.js')}}"></script>
        <script src="{{URL::asset('vr2/videojs-vr.js')}}"></script>
    @endif

@stop

@section('main')
    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>
    <script>
        var nearHotel = [];
        var nearRestuarant = [];
        var nearAmaken = [];
        var nearMajara = [];

        var hasLogin = '{{$hasLogin}}';
        var userCode = '{{$userCode}}';
        var userPic = '{{$userPic}}';
        var userPhotos = {!! $userPhotosJson !!};
        var placeMode = '{{$placeMode}}';

        var likeLog = '{{route('likeLog')}}';
        var reviewUploadPic = '{{route('reviewUploadPic')}}';
        var doEditReviewPic = '{{route('doEditReviewPic')}}';
        var reviewUploadVideo = '{{route('reviewUploadVideo')}}';
        var bookMarkDir = '{{route('bookMark')}}';
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
        var getReportsDir = '{{route('getReports')}}';
        var sendReportDir = '{{route('sendReport2')}}';
        var getPhotoFilter = '{{route('getPhotoFilter')}}';
        var getPhotosDir = '{{route('getPhotos')}}';
        var findUser = '{{route('findUser')}}';
        var showUserBriefDetail = '{{route('showUserBriefDetail')}}';
        var hotelDetailsInAddPhotoMode = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'addPhoto'])}}';
        var likePhotographerPicRoute = '{{route('likePhotographer')}}';
        var deleteReviewPicUrl = '{{route('deleteReviewPic')}}';
    </script>

    <script src="{{URL::asset('js/hotelDetails/hoteldetails_1.js')}}"></script>
    <script src="{{URL::asset('js/hotelDetails/hoteldetails_2.js')}}"></script>
    <script src="{{URL::asset('js/autosize.min.js')}}"></script>
    <script async src="{{URL::asset('js/album.js')}}"></script>
    <script src="{{URL::asset('js/adv.js')}}"></script>

    <style>
        .changeWidth {
            @if(session('goDate'))
               width: 14% !important;
            @endif
        }
        .rtl .ui_bubble_rating:after, .rtl .ui_bubble_rating:before{
            transform: scale(1, 1);
        }
    </style>

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


    <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic position-relative">

        @include('layouts.placeMainBodyHeader')

        <div class="atf_meta_and_photos_wrapper position-relative">
            <div class="greyBackground"></div>
            <div class="atf_meta_and_photos ui_container is-mobile easyClear position-relative">

                <!-- Modal -->
                <div class="postModalMainDiv hidden" id="reviewMainDivDetails">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <form action="{{route('storeReview')}}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="kindPlaceId" value="{{$kindPlaceId}}">
                            <input type="hidden" name="placeId" value="{{$place->id}}">
                            <input type="hidden" name="code" value="{{$userCode}}">
                            <input type="hidden" name="assignedUser" id="assignedMemberToReview">
                            <input type="hidden" name="multiAns" id="multiAnsInput">
                            <input type="hidden" name="multiQuestion" id="multiQuestionInput">
                            <input type="hidden" name="rateAns" id="rateAnsInput">
                            <input type="hidden" name="rateQuestion" id="rateQuestionInput">

                            <div class="modal-content">
                                <div class="postMainDivHeader">
                                    <button type="button" class="close closeBtnPostModal" data-dismiss="modal"
                                            onclick="closeNewPostModal(); showMobileTabLink()">&times;
                                    </button>
                                    دیدگاه شما
                                </div>
                                <div class="commentInputMainDivModal">
                                    <div class="inputBoxGeneralInfo inputBox postInputBoxModal">
                                        <div class="profilePicForPostModal circleBase type2">
                                            <img src="{{ $userPic }}" style="width: 100%; height: 100%; border-radius: 50%;" >
                                        </div>
                                        @if(auth()->check())
                                            <textarea  id="postTextArea" class="inputBoxInput inputBoxInputComment" name="text" type="text"
                                                      placeholder="{{auth()->user()->first_name ? auth()->user()->first_name :auth()->user()->username }}، چه فکر یا احساسی داری.....؟"
                                                       style="overflow:hidden"></textarea>
                                        @endif
                                        <img class="commentSmileyIcon" src="{{URL::asset("images/smile.png")}}">
                                    </div>
                                    <div class="clear-both"></div>
                                    <div class="row">
                                        <div class="commentPhotosMainDiv" id="reviewShowPics"></div>
                                    </div>

                                    <div class="addParticipantName">
                                        <span class="addParticipantSpan">با</span>
                                        <div class="inputBoxGeneralInfo inputBox addParticipantInputBoxPostModal">
                                            <textarea id="assignedSearch" class="inputBoxInput"
                                                      placeholder="چه کسی بودید؟ ایمیل یا نام کاربری را وارد کنید"
                                                      onkeyup="searchUser(this.value)"></textarea>

                                            <div class="assignedResult" id="assignedResultReview"></div>

                                            <div class="participantDivMainDiv" id="participantDivMainDiv"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-details-content">
                                <center class="commentMoreSettingBar">
                                    <div class="commentOptionsBoxes">
                                        <label for="picReviewInput0">
                                            <span class="addPhotoCommentIcon"></span>
                                            <span class="commentOptionsText">عکس اضافه کنید.</span>
                                        </label>
                                    </div>
                                    <input type="file" id="picReviewInput0" accept="image/*" style="display: none"
                                           onchange="uploadReviewPics(this, 0)">
                                    <div class="commentOptionsBoxes">
                                        <label for="videoReviewInput">
                                            <span class="addVideoCommentIcon"></span>
                                            <span class="commentOptionsText">ویدیو اضافه کنید.</span>
                                        </label>
                                    </div>
                                    <input type="file" id="videoReviewInput" accept="video/*" style="display: none"
                                           onchange="uploadReviewVideo(this, 0)">
                                    <div class="commentOptionsBoxes">
                                        <label for="video360ReviewInput">
                                            <span class="add360VideoCommentIcon"></span>
                                            <span class="commentOptionsText">ویدیو 360 اضافه کنید.</span>
                                        </label>
                                    </div>
                                    <input type="file" id="video360ReviewInput" accept="video/*"  style="display: none" onchange="uploadReviewVideo(this, 1)">
                                    <div class="commentOptionsBoxes">
                                        <span class="tagFriendCommentIcon"></span>
                                        <span class="commentOptionsText">دوستانتان را TAG کنید.</span>
                                    </div>
                                </center>
                                @foreach($textQuestion as $item)
                                    <div id="questionDiv_{{$item->id}}" class="commentQuestionsForm">
                                        <span class="addOriginCity">{{$item->description}}</span>
                                        <div class="inputBoxGeneralInfo inputBox addOriginCityInputBoxPostModal">
                                            <textarea id="question_{{$item->id}}" name="textAns[]"
                                                      class="inputBoxInput inputBoxInputComment"></textarea>
                                            <input type="hidden" name="textId[]" value="{{$item->id}}">
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($multiQuestion as $index => $item)
                                    <div class="commentQuestionsForm">
                                        <div class="visitKindCommentModalHeader">
                                            {{$item->description}}
                                        </div>
                                        <div class="visitKindCommentModal">
                                            @for($i = 0; $i < count($item->ans); $i++)
                                                <label for="radioAns_{{$item->id}}_{{$item->ans[$i]->id}}">
                                                    <b id="radioAnsStyle_{{$item->id}}_{{$item->ans[$i]->id}}"
                                                       class="filterChoices multiSelectAns">
                                                        {{$item->ans[$i]->ans}}
                                                    </b>
                                                </label>
                                                <input id="radioAns_{{$item->id}}_{{$item->ans[$i]->id}}"
                                                       value="{{$item->ans[$i]->id}}"
                                                       name="radioAnsName_{{$item->id}}"
                                                       onchange="radioChange(this.value, {{$item->id}}, {{$index}}, {{$item->ans[$i]->id}})"
                                                       type="radio" style="display: none">
                                            @endfor
                                        </div>
                                    </div>
                                @endforeach

                                <div class="commentQuestionsRatingsBox">
                                    {{--<div class="commentQuestionsRatingsBoxHeader"></div>--}}

                                @for($i = 0; $i < count($rateQuestion); $i++)
                                        <div class="display-inline-block full-width">
                                            <b id="rateName_{{$i}}"
                                               class="col-xs-3 font-size-15 line-height-108 pd-lt-0">بد نبود</b>
                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating col-xs-3 text-align-left pd-0">
                                                <div class="font-size-25" style="display: flex;">
                                                    <span id="rate_5_{{$i}}" class="starRating"
                                                          onmouseover="momentChangeRate({{$i}}, 5, 'in')"
                                                          onmouseleave="momentChangeRate({{$i}}, 5, 'out')"
                                                          onclick="chooseQuestionRate({{$i}}, 5, {{$rateQuestion[$i]->id}})"></span>
                                                    <span id="rate_4_{{$i}}" class="starRating"
                                                          onmouseover="momentChangeRate({{$i}}, 4, 'in')"
                                                          onmouseleave="momentChangeRate({{$i}}, 4, 'out')"
                                                          onclick="chooseQuestionRate({{$i}}, 4, {{$rateQuestion[$i]->id}})"></span>
                                                    <span id="rate_3_{{$i}}" class="starRating"
                                                          onmouseover="momentChangeRate({{$i}}, 3, 'in')"
                                                          onmouseleave="momentChangeRate({{$i}}, 3, 'out')"
                                                          onclick="chooseQuestionRate({{$i}}, 3, {{$rateQuestion[$i]->id}})"></span>
                                                    <span id="rate_2_{{$i}}" class="starRatingGreen"
                                                          onmouseover="momentChangeRate({{$i}}, 2, 'in')"
                                                          onmouseleave="momentChangeRate({{$i}}, 2, 'out')"
                                                          onclick="chooseQuestionRate({{$i}}, 2, {{$rateQuestion[$i]->id}})"></span>
                                                    <span id="rate_1_{{$i}}" class="starRatingGreen"
                                                          onmouseover="momentChangeRate({{$i}}, 1, 'in')"
                                                          onmouseleave="momentChangeRate({{$i}}, 1, 'out')"
                                                          onclick="chooseQuestionRate({{$i}}, 1, {{$rateQuestion[$i]->id}})"></span>
                                                </div>
                                            </div>
                                            <b class="col-xs-6 font-size-15 line-height-108">{{$rateQuestion[$i]->description}}</b>
                                        </div>
                                    @endfor
                                </div>


                                <button class="postMainDivFooter" type="submit">
                                    ارسال دیدگاه
                                </button>
                            </div>
                        </form>


                        <div id="editReviewPictures" class="backDark hidden">
                            <span class="ui_overlay ui_modal photoUploadOverlay editSection">
                                <div class="body_text" style="padding-top: 12px">
                                   <div class="headerBar epHeaderBar">
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div style="margin: 5px 15px">قاب مربع</div>
                                             <div class="img-container" style="position: relative">
                                                <img class="imgInEditor" id="imgEditReviewPics" alt="Picture"
                                                     style="width: 100%;">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row" id="actions" style="">
                                          <div class="col-md-12 docs-buttons">

                                            <div class="editBtnsGroup">
                                                <div class="editBtns">
                                                   <div class="flipHorizontal" data-toggle="tooltip"
                                                        data-placement="top" title="Flip Horizontal"
                                                        onclick="cropper.scaleY(-1)"></div>
                                                </div>
                                                {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">--}}
                                                {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">--}}
                                                {{--<span class="fa fa-arrows-h"></span>--}}
                                                {{--</span>--}}
                                                {{--</button>--}}

                                                <div class="editBtns">
                                                   <div class="flipVertical" data-toggle="tooltip" data-placement="top"
                                                        title="Flip Vertical" onclick="cropper.scaleX(-1)"></div>
                                                </div>
                                                {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">--}}
                                                {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">--}}
                                                {{--<span class="fa fa-arrows-v"></span>--}}
                                                {{--</span>--}}
                                                {{--</button>--}}
                                            </div>

                                            <div class="editBtnsGroup">
                                                <div class="editBtns">
                                                   <div class="rotateLeft" data-toggle="tooltip" data-placement="top"
                                                        title="چرخش 45 درجه ای به سمت چپ"
                                                        onclick="cropper.rotate(-45)"></div>
                                                </div>
                                                {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">--}}
                                                {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">--}}
                                                {{--<span class="fa fa-rotate-left"></span>--}}
                                                {{--</span>--}}
                                                {{--</button>--}}

                                                <div class="editBtns">
                                                   <div class="rotateRight" data-toggle="tooltip" data-placement="top"
                                                        title="چرخش 45 درجه ای به سمت راست"
                                                        onclick="cropper.rotate(45)"></div>
                                                </div>
                                                {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">--}}
                                                {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">--}}
                                                {{--<span class="fa fa-rotate-right"></span>--}}
                                                {{--</span>--}}
                                                {{--</button>--}}
                                            </div>

                                            <div class="editBtnsGroup">
                                                <div class="editBtns">
                                                   <div class="cropping" data-toggle="tooltip" data-placement="top"
                                                        title="برش" onclick="cropper.crop()"></div>
                                                </div>
                                                {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="crop" title="Crop">--}}
                                                {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">--}}
                                                {{--<span class="fa fa-check"></span>--}}
                                                {{--</span>--}}
                                                {{--</button>--}}

                                                <div class="editBtns">
                                                   <div class="clearing" data-toggle="tooltip" data-placement="top"
                                                        title="بازگشت به اول" onclick="cropper.clear()"></div>
                                                </div>
                                                {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="clear" title="Clear">--}}
                                                {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">--}}
                                                {{--<span class="fa fa-remove"></span>--}}
                                                {{--</span>--}}
                                                {{--</button>--}}
                                            </div>

                                            <div class="upload">
                                                <div
                                                        onclick="cropReviewImg()"
                                                        class="uploadBtn ui_button primary">تایید</div>
                                            </div>
                                          {{--<div class="btn-group btn-group-crop">--}}
                                          {{--<button id="saveBtn" type="button" onclick="successBtnClicked(this)" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 466, &quot;height&quot;: 367 }">--}}
                                          {{--<span class="docs-tooltip" data-toggle="tooltip" id="saveBtnSpan" title="cropper.getCroppedCanvas({ width: 466, height: 367 })">--}}
                                          {{--ذخیره--}}
                                          {{--</span>--}}
                                          {{--</button>--}}

                                          {{--<button id="saveBtn2" type="button" onclick="successBtnClicked(this)" class="btn btn-success hidden" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 100, &quot;height&quot;: 100 }">--}}
                                          {{--<span class="docs-tooltip" data-toggle="tooltip" id="saveBtnSpan" title="cropper.getCroppedCanvas({ width: 100, height: 100 })">--}}
                                          {{--ذخیره--}}
                                          {{--</span>--}}
                                          {{--</button>--}}
                                          {{--</div>--}}

                                          <!-- Show the cropped image in modal -->
                                              <div class="modal fade docs-cropped" id="getCroppedCanvasModal"
                                                   role="dialog" aria-hidden="true"
                                                   aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                                               <div class="modal-dialog modal-dialog-scrollable">
                                                  <div class="modal-content">
                                                     <div class="modal-header">
                                                        <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                        </button>
                                                     </div>
                                                     <div class="modal-body"></div>
                                                     <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        <a class="btn btn-primary" id="download"
                                                           href="javascript:void(0);"
                                                           download="cropped.jpg">Download</a>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div><!-- /.modal -->

                                         </div><!-- /.docs-buttons -->
                                       </div>
                                    {{--</div>--}}
                               </div>
                                <div class="ui_close_x" onclick="$('#editReviewPictures').addClass('hidden');"></div>
                            </span>
                        </div>

                    </div>
                </div>

                <div id="bestPrice" class="meta position-relative"
                     style="@if(session('goDate') != null && session('backDate') != null) display: none @endif ">
                    <div id="targetHelp_9" class="targets  float-left">
                        {{--@if($place->reserveId == null)--}}
                        {{--<div class="offlineReserveErr" >--}}
                        {{--<div>--}}
                        {{--متاسفانه در حال حاضر امکان رزرو انلاین برای این مرکز موجود نمی باشد.--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        <div class="meta_inner" id="bestPriceInnerDiv">
                            {{--                                <form id="form_hotel" method="post" action="{{route('makeSessionHotel')}}">--}}
                            {{--                                    {{csrf_field()}}--}}
                            {{--                                    <input type="hidden" name="adult" id="form_adult">--}}
                            {{--                                    <input type="hidden" name="room" id="form_room">--}}
                            {{--                                    <input type="hidden" name="children" id="form_children">--}}
                            {{--                                    <input type="hidden" name="goDate" id="form_goDate">--}}
                            {{--                                    <input type="hidden" name="backDate" id="form_backDate">--}}
                            {{--                                    <input type="hidden" name="ageOfChild" id="form_ageOfChild">--}}
                            {{--                                    <input type="hidden" name="city" value="{{$city->name}}">--}}
                            {{--                                    <input type="hidden" name="name" value="{{$city->name}}">--}}
                            {{--                                    <input type="hidden" name="mode" value="city">--}}
                            {{--                                    <input type="hidden" name="name" value="{{$place->name}}">--}}
                            {{--                                    <input type="hidden" name="id" value="{{$place->id}}">--}}
                            {{--                                </form>--}}
                            {{--                                <div class="ppr_rup ppr_priv_hr_atf_north_star_traveler_info_nostalgic display-none">--}}
                            {{--                                    <div class="title">بهترین قیمت اقامت</div>--}}
                            {{--                                    <div class="metaDatePicker easyClear">--}}
                            {{--                                        <div class="prw_rup prw_datepickers_hr_north_star_dates_nostalgic">--}}
                            {{--                                            <label class="lableCalender">--}}
                            {{--                                                    <span onclick="changeTwoCalendar(2); nowCalendar()"--}}
                            {{--                                                          class="ui_icon calendar calendarIcon"></span>--}}
                            {{--                                                <input name="GoDate" type="text" id="goDate" placeholder="تاریخ رفت"--}}
                            {{--                                                       class="inputLableCalender" readonly value="{{session('goDate')}}">--}}
                            {{--                                            </label>--}}
                            {{--                                            <label class="lableCalender">--}}
                            {{--                                                <span class="ui_icon calendar"></span>--}}
                            {{--                                                <input value="{{session('backDate')}}" name="BackDate" type="text"--}}
                            {{--                                                       id="backDate"--}}
                            {{--                                                       placeholder="تاریخ برگشت" readonly class="inputLableCalender">--}}
                            {{--                                            </label>--}}
                            {{--                                            <div>--}}
                            {{--                                                @include('layouts.calendar')--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="roomBox">--}}
                            {{--                                            <div class="shTIcon passengerIcon" onclick="togglePassengerNoSelectPane()"></div>--}}
                            {{--                                            <div id="roomDetail" onclick="togglePassengerNoSelectPane()">--}}
                            {{--                                                <span class="room" id="num_room">--}}{{----}}{{--{{$room}}--}}{{----}}{{--</span>&nbsp;--}}
                            {{--                                                <span>اتاق</span>&nbsp;-&nbsp;--}}
                            {{--                                                <span class="adult" id="num_adult">--}}{{----}}{{--{{$adult}}--}}{{----}}{{--</span>--}}
                            {{--                                                <span>بزرگسال</span>&nbsp;--}}
                            {{--                                                --}}{{----}}{{--<span class="children" id="num_child">--}}{{----}}{{----}}{{----}}{{--{{$children}}--}}{{----}}{{----}}{{----}}{{--</span>--}}
                            {{--                                                --}}{{----}}{{--<span>بچه</span>&nbsp;--}}
                            {{--                                            </div>--}}
                            {{--                                            <div id="passengerArrowDown" onclick="togglePassengerNoSelectPane()"--}}
                            {{--                                                 class="shTIcon searchBottomArrowIcone arrowPassengerIcone display-inline-block"></div>--}}
                            {{--                                            <div id="passengerArrowUp" onclick="togglePassengerNoSelectPane()"--}}
                            {{--                                                 class="shTIcon searchTopArrowIcone arrowPassengerIcone hidden display-inline-block"></div>--}}

                            {{--                                            <div class="roomPassengerPopUp hidden" id="passengerNoSelectPane"--}}
                            {{--                                                 onmouseleave="addClassHidden('passengerNoSelectPane'); passengerNoSelect = false;">--}}
                            {{--                                                <div class="rowOfPopUp">--}}
                            {{--                                                    <span class="float-left">اتاق</span>--}}
                            {{--                                                    <div>--}}
                            {{--                                                        <div onclick="changeRoomPassengersNum(-1, 3)"--}}
                            {{--                                                             class="shTIcon minusPlusIcons minus"></div>--}}
                            {{--                                                        <span class='numBetweenMinusPlusBtn room'--}}
                            {{--                                                              id="roomNumInSelect">--}}{{--{{$room}}--}}{{--</span>--}}
                            {{--                                                        <div onclick="changeRoomPassengersNum(1, 3)"--}}
                            {{--                                                             class="shTIcon minusPlusIcons plus"></div>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                                <div class="rowOfPopUp">--}}
                            {{--                                                    <span class="float-left">بزرگسال</span>--}}
                            {{--                                                    <div class="float-left">--}}
                            {{--                                                        <div onclick="changeRoomPassengersNum(-1, 2)"--}}
                            {{--                                                             class="shTIcon minusPlusIcons minus"></div>--}}
                            {{--                                                        <span class='numBetweenMinusPlusBtn adult'--}}
                            {{--                                                              id="adultPassengerNumInSelect">--}}{{--{{$adult}}--}}{{--</span>--}}
                            {{--                                                        <div onclick="changeRoomPassengersNum(1, 2)"--}}
                            {{--                                                             class="shTIcon minusPlusIcons plus"></div>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                                <div class="rowOfPopUp">--}}
                            {{--                                                    --}}{{--<span class="float-left">بچه</span>--}}
                            {{--                                                    --}}{{--<div class="float-left">--}}
                            {{--                                                    --}}{{--<div onclick="changeRoomPassengersNum(-1, 1)"--}}
                            {{--                                                    --}}{{--class="shTIcon minusPlusIcons minus"></div>--}}
                            {{--                                                    --}}{{--<span class='numBetweenMinusPlusBtn children'--}}
                            {{--                                                    --}}{{--id="childrenPassengerNumInSelect">--}}{{----}}{{--{{$children}}--}}{{----}}{{--</span>--}}
                            {{--                                                    --}}{{--<div onclick="changeRoomPassengersNum(1, 1)"--}}
                            {{--                                                    --}}{{--class="shTIcon minusPlusIcons plus"></div>--}}
                            {{--                                                    --}}{{--</div>--}}
                            {{--                                                </div>--}}
                            {{--                                                --}}{{--<div class="childrenPopUpAlert">سن بچه را در زمان ورود به هتل وارد--}}
                            {{--                                                --}}{{--کنید--}}
                            {{--                                                --}}{{--</div>--}}
                            {{--                                                --}}{{--<div class="childBox"></div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="srchBox">--}}
                            {{--                                            <button class="srchBtn" onclick="inputSearch(0)">جستجو و رزرو</button>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="explainSrch">--}}
                            {{--                                            با جستجو در بین سایر ارایه دهندگان خدمات، بهترین قیمت را از بین تمامی قیمت--}}
                            {{--                                            های موجود در بازار به شما پیشنهاد می دهیم.--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="explainRoom">--}}
                            {{--                                            ** قیمت های ارایه شده بر اساس قیمت ارزان ترین اتاق و برای یک شب اقامت ارایه--}}
                            {{--                                            می گردد. ممکن است با توجه به نوع اتاق انتخابی و تعداد نفرات این قیمت متغیر--}}
                            {{--                                            باشد.--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                        </div>
                    </div>
                    {{--                        <div id="helpSpan_9" class="helpSpans hidden">--}}
                    {{--                            <span class="introjs-arrow"></span>--}}
                    {{--                            <p>در این قسمت هتل خود را به سادگی چند دکمه رزرو کنید. البته این سیستم برای ما آنچنان--}}
                    {{--                                ساده نیست. این سرویس هنوز آماده استفاده نمی باشد.</p>--}}
                    {{--                            <button data-val="9" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_9">بعدی</button>--}}
                    {{--                            <button data-val="9" class="btn btn-primary backBtnsHelp" id="backBtnHelp_9">قبلی</button>--}}
                    {{--                            <button class="btn btn-danger exitBtnHelp">خروج</button>--}}
                    {{--                        </div>--}}
                    <div class="clear-both"></div>
                    @if($hasLogin)
                        <div id="targetHelp_8" class="wideScreen targets float-left col-xs-6 pd-0">
                            <span onclick="bookMark()"
                                  class="ui_button save-location-7306673 saveAsBookmarkMainDiv">
                                <div id="bookMarkIcon" class="saveAsBookmarkIcon {{($bookMark) ? "castle-fill" : "castle"}}"></div>
                                <div class="saveAsBookmarkLabel">
                                    ذخیره این صفحه
                                </div>
                            </span>
                            <div id="helpSpan_8" class="helpSpans hidden row">
                                <span class="introjs-arrow"></span>
                                <p>شاید بعدا بخواهید دوباره به همین مکان باز گردید. پس آن را نشان کنید تا از منوی بالا
                                    هر وقت که خواستید دوباره به آن باز گردید.</p>
                                <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی
                                </button>
                                <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی
                                </button>
                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                            </div>
                        </div>
                    @endif
                    @if($hasLogin)
                        @include('layouts.shareBox')

                    @endif
                </div>
                {{--                    <div id="bestPriceRezerved" class="meta position-relative"--}}
                {{--                         style="@if(session('goDate') == null && session('backDate') == null) display: none @endif">--}}
                {{--                        <div id="targetHelp_9" class="targets float-left">--}}
                {{--                            @if($place->reserveId == null)--}}
                {{--                                <div class="offlineReserveErr">--}}
                {{--                                    <div>--}}
                {{--                                        متاسفانه در حال حاضر امکان رزرو انلاین برای این مرکز موجود نمی باشد.--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            @endif--}}
                {{--                            @if(session('goDate') != null)--}}
                {{--                                <div class="meta_inner" id="">--}}
                {{--                                    <div class="ppr_rup ppr_priv_hr_atf_north_star_traveler_info_nostalgic display-none">--}}
                {{--                                        <div class="metaDatePicker easyClear">--}}
                {{--                                            <div id="date_input_main_div">--}}
                {{--                                                <div class="shTIcon closeXicon closeXicon2" onclick="changeStatetounReserved()"></div>--}}
                {{--                                                <div class="prw_rup prw_datepickers_hr_north_star_dates_nostalgic">--}}
                {{--                                                    <label class="lableCalender" id="date_input_label">--}}
                {{--                                                        <span class="ui_icon calendar"></span>--}}
                {{--                                                        <input type="text" id="date_input" placeholder="{{session('goDate')}}" class="inputLableCalender">--}}
                {{--                                                    </label>--}}
                {{--                                                    <label class="lableCalender">--}}
                {{--                                                        <span class="ui_icon calendar"></span>--}}
                {{--                                                        <input type="text" id="date_input_end_inHotel"--}}
                {{--                                                               placeholder="{{session('backDate')}}"--}}
                {{--                                                               class="inputLableCalender">--}}
                {{--                                                    </label>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="offerBox">--}}
                {{--                                                @if($rooms != null)--}}
                {{--                                                    <div id="bestPriceTitleWithRoom">بهترین قیمت</div>--}}
                {{--                                                    <div>کمترین قیمت برای هرشب اقامت</div>--}}
                {{--                                                    <div>--}}
                {{--                                                        <div id="minimumPrice">{{$place->minPrice}}--}}
                {{--                                                            --}}{{--<div class="salePrice">550.000</div>--}}
                {{--                                                        </div>--}}
                {{--                                                        <div class="float-left">--}}
                {{--                                                            <div id="fromAliBabaLink">--}}
                {{--                                                                <div>از علی بابا</div>--}}
                {{--                                                                <img src="" alt="">--}}
                {{--                                                            </div>--}}
                {{--                                                            <button class="btn viewOffersBtn" type="button"--}}
                {{--                                                                    onclick="scrollToBed()">انتخاب--}}
                {{--                                                            </button>--}}
                {{--                                                        </div>--}}
                {{--                                                    </div>--}}
                {{--                                                    <div id="savePercentage">--}}
                {{--                                                        --}}{{--<div class="display-inline-block">ده درصد تخفیف ویژه نوروز</div>--}}
                {{--                                                        <div class="float-left">{{$place->savePercent}} درصد ذخیره--}}
                {{--                                                        </div>--}}
                {{--                                                    </div>--}}
                {{--                                                    <div id="bestPriceBtn">--}}
                {{--                                                        --}}{{--<button class="btn specOfferBtn" type="button">پیشنهاد ویژه</button>--}}
                {{--                                                        <button class="btn specOfferBtn"--}}
                {{--                                                                type="button">{{$place->service}}</button>--}}
                {{--                                                        --}}{{--<button class="btn reservBtn float-left" type="button">رزرو آنی</button>--}}
                {{--                                                    </div>--}}
                {{--                                                @else--}}
                {{--                                                    <div>--}}
                {{--                                                        متاسفانه در بازه زمانی و یا تعداد نفرات برای این هتل اتاقی یافت--}}
                {{--                                                        نشد.--}}
                {{--                                                    </div>--}}
                {{--                                                @endif--}}
                {{--                                            </div>--}}

                {{--                                            --}}{{--<div class="offerBox">--}}
                {{--                                            --}}{{--<div>--}}
                {{--                                            --}}{{--<div class="font-size-14em display-inline-block">650.000--}}
                {{--                                            --}}{{--<div class="salePrice" style="width: 54px; margin: -14px 0 0 0">550.000</div>--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--<div class="float-left">--}}
                {{--                                            --}}{{--<div style="float:right; margin: 2px 10px;">--}}
                {{--                                            --}}{{--<div>از علی بابا</div>--}}
                {{--                                            --}}{{--<img src="" alt="">--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--<button class="btn viewOffersBtn" type="button">انتخاب</button>--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--<div style="font-size: 0.9em; color: red; margin: 2px 0;">--}}
                {{--                                            --}}{{--<div class="display-inline-block">ده درصد تخفیف ویژه نوروز</div>--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--<div style="margin: 1% 0;">--}}
                {{--                                            --}}{{--<button class="btn specOfferBtn" type="button">پیشنهاد ویژه</button>--}}
                {{--                                            --}}{{--<button class="btn reservBtn float-left" type="button">رزرو آنی</button>--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--</div>--}}

                {{--                                            --}}{{--<div class="offerBox">--}}
                {{--                                            --}}{{--<div>--}}
                {{--                                            --}}{{--<div style="font-size-14em display-inline-block; line-height: 40px;">650.000</div>--}}
                {{--                                            --}}{{--<div class="float-left">--}}
                {{--                                            --}}{{--<div style="float:right; margin: 2px 10px;">--}}
                {{--                                            --}}{{--<div>از علی بابا</div>--}}
                {{--                                            --}}{{--<img src="" alt="">--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--<button class="btn viewOffersBtn" type="button">انتخاب</button>--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--</div>--}}
                {{--                                            --}}{{--</div>--}}

                {{--                                            <div class="hidden other10_Offer">به همراه {{$place->otherRoom}} پیشنهاد دیگر</div>--}}

                {{--                                            <div class="explainRoom">--}}
                {{--                                                ** قیمت های ارایه شده بر اساس قیمت ارزان ترین اتاق و برای یک شب اقامت--}}
                {{--                                                ارایه--}}
                {{--                                                می گردد. ممکن است با توجه به نوع اتاق انتخابی و تعداد نفرات این قیمت--}}
                {{--                                                متغیر--}}
                {{--                                                باشد.--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            @endif--}}
                {{--                        </div>--}}
                {{--                        <div id="helpSpan_9" class="helpSpans hidden">--}}
                {{--                            <span class="introjs-arrow"></span>--}}
                {{--                            <p>در این قسمت هتل خود را به سادگی چند دکمه رزرو کنید. البته این سیستم برای ما آنچنان--}}
                {{--                                ساده نیست. این سرویس هنوز آماده استفاده نمی باشد.</p>--}}
                {{--                            <button data-val="9" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_9">بعدی</button>--}}
                {{--                            <button data-val="9" class="btn btn-primary backBtnsHelp" id="backBtnHelp_9">قبلی</button>--}}
                {{--                            <button class="btn btn-danger exitBtnHelp">خروج</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                @endif--}}

                <div class="prw_rup prw_common_location_photos photos position-relative">
                    <div id="targetHelp_10" class="targets">
                        <div class="inner">
                            <div class="primaryWrap">
                                <div class="prw_rup prw_common_mercury_photo_carousel">
                                    <div class="carousel bignav">
                                        <div class="carousel_images carousel_images_header">
                                            <div id="photographerAlbum" onclick="showPhotoAlbum('photographer')">
                                                <div id="mainSlider" class="swiper-container">
                                                    <div class="swiper-wrapper">

                                                        @for($i = 0; $i < count($photographerPics); $i++)
                                                            <div class="swiper-slide">
                                                                <img class="eachPicOfSlider"
                                                                     src="{{$photographerPics[$i]['s']}}"
                                                                     alt="{{$photographerPics[$i]['alt']}}"
                                                                     style="width: 100%;">

                                                                <div class="see_all_count_wrap">
                                                                    <span class="see_all_count">
                                                                        <div class="circleBase type2" id="photographerIdPic" style="background-color: #4DC7BC;">
                                                                            <img src="{{$photographerPics[$i]['userPic']}}" style="width: 100%; height: 100%; border-radius: 50%;">
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
                                        <div class="left-nav left-nav-header swiper-button-next"></div>
                                        <div class="right-nav right-nav-header swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                            {{--<script>--}}
                                {{--var mainSlideSwiper = new Swiper('#mainSlider', {--}}
                                    {{--spaceBetween: 30,--}}
                                    {{--centeredSlides: true,--}}
                                    {{--loop: true,--}}
                                    {{--autoplay: {--}}
                                        {{--delay: 2500,--}}
                                        {{--disableOnInteraction: false,--}}
                                    {{--},--}}
                                    {{--navigation: {--}}
                                        {{--nextEl: '.swiper-button-next',--}}
                                        {{--prevEl: '.swiper-button-prev',--}}
                                    {{--},--}}
                                {{--});--}}

                            {{--</script>--}}
                            <div class="secondaryWrap">
                                <div class="tileWrap">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                                @if(count($sitePics) != 0)
                                                    <span class="imgWrap imgWrap1stTemp" onclick="showPhotoAlbum('sitePics')">
                                                        <img alt="{{$place->alt}}" src="{{$thumbnail}}"
                                                             class="centeredImg" width="100%"/>
                                                    </span>
                                                @else
                                                    <span class="imgWrap imgWrap1stTemp"></span>
                                                @endif
                                            </div>
                                            @if(count($sitePics) != 0)
                                                <div class="albumInfo" data-toggle="modal"
                                                     data-target="#showingSitePicsModal">
                                                    <span class="ui_icon camera">&nbsp;</span>عکس‌های
                                                    سایت - {{count($sitePics)}}
                                                </div>
                                            @else
                                                <div class="albumInfo">
                                                    <span class="ui_icon camera">&nbsp;</span>عکس‌های
                                                    سایت - {{count($sitePics)}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tileWrap">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image"
                                                    {{(count($userPhotos) != 0) ? 'onclick=showPhotoAlbum("userPics")' : "" }}>
                                                <span class="imgWrap imgWrap1stTemp">
                                                    @if(count($userPhotos) != 0)
                                                        <img src="{{$userPhotos[0]->pic}}" class="centeredImg" width="100%"/>
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
                                <div class="tileWrap" onclick="showModal()">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                                <span class="imgWrap imgWrap1stTemp">
                                                    <img src="https://static.tacdn.com/img2/x.gif" id="imgWrap3rdLine"
                                                         class="centeredImg" width="100%"/>
                                                </span>
                                            </div>
                                            <div class="albumInfo">
                                                <span class="ui_icon camera">&nbsp;</span>
                                                ویدیو و فیلم 360 - {{(!isset($video) || $video == null) ? 0 : 1}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div id="helpSpan_10" class="helpSpans hidden row">
                            <span class="introjs-arrow"></span>
                            <p>عکس‌های دوستانتان را از دست ندهید. گاهی وقت ها یک عکس سخن های بسیاری دارد.</p>
                            <button data-val="10" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_10">بعدی</button>
                            <button data-val="10" class="btn btn-primary backBtnsHelp" id="backBtnHelp_10">قبلی</button>
                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                        </div>
                    </div>
                    <a class="postLink" href="#reviewMainDivDetails">
                        <div class="postMainDiv" onclick="hideMobileTabLink()">
                            <div class="postMainDivHeader">
                                دیدگاه شما
                            </div>
                            <div id="commentInputMainDiv">
                                <div class="inputBoxGeneralInfo inputBox postInputBox" id="commentInputBox">
                                    <div id="profilePicForComment" class="profilePicForPost circleBase type2">
                                        <img src="{{ $userPic }}" style="width: 100%; height: 100%; border-radius: 50%;">
                                    </div>
                                    @if(auth()->check())
                                        <textarea class="inputBoxInput inputBoxInputComment" type="text"
                                                  placeholder="{{auth()->user()->first_name ? auth()->user()->first_name :auth()->user()->username }}، چه فکر یا احساسی داری.....؟"  onclick="newPostModal('textarea')" readonly></textarea>
                                    @else
                                        <textarea class="inputBoxInput inputBoxInputComment" type="text"
                                                  placeholder=" چه فکر یا احساسی داری.....؟" onclick="newPostModal('textarea')" readonly></textarea>
                                    @endif
                                    <img class="commentSmileyIcon" src="{{URL::asset('images/smile.png')}}">
                                </div>
                            </div>
                            <div class="commentMoreSettingBar">
                                <div class="commentOptionsBoxes">
                                    <label {{auth()->check() ? 'for=picReviewInput0 onclick=newPostModal()' : 'onclick=newPostModal()'}}>
                                        <span class="addPhotoCommentIcon"></span>
                                        <span class="commentOptionsText">عکس اضافه کنید.</span>
                                    </label>
                                </div><!--
                             -->
                                <div class="commentOptionsBoxes">
                                    <label {{auth()->check() ? 'for=videoReviewInput onclick=newPostModal()' : 'onclick=newPostModal()'}}>
                                        <span class="addVideoCommentIcon"></span>
                                        <span class="commentOptionsText">ویدیو اضافه کنید.</span>
                                    </label>
                                </div><!--
                             -->
                                <div class="commentOptionsBoxes">
                                    <label {{auth()->check() ? 'for=video360ReviewInput onclick=newPostModal()' : 'onclick=newPostModal()'}}>
                                        <span class="add360VideoCommentIcon"></span>
                                        <span class="commentOptionsText">ویدیو 360 اضافه کنید.</span>
                                    </label>
                                </div><!--
                             -->
                                <div class="commentOptionsBoxes" id="bodyLinks"  onclick="newPostModal('tag')">
                                    <span class="tagFriendCommentIcon"></span>
                                    <span class="commentOptionsText">دوستانتان را tag کنید.</span>
                                </div><!--
                             -->
                                <div class="moreSettingPostManDiv commentOptionsBoxes">
                                    <span class="moreSettingPost"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <script>
                    var mainSlideSwiper = new Swiper('#mainSlider', {
                        spaceBetween: 30,
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
                </script>
            </div>
        </div>

    </div>

    @if(Auth::check())
        @include('editor')
    @endif

    <div id="MAINWRAP" class="full_meta_photos_v3  full_meta_photos_v4  big_pic_mainwrap_tweaks horizontal_xsell ui_container is-mobile position-relative">
        <div id="MAIN" class="Hotel_Review prodp13n_jfy_overflow_visible position-relative">
            <div id="BODYCON" class="col easyClear bodLHN poolB adjust_padding new_meta_chevron new_meta_chevron_v2 position-relative">

{{--                <div class="tabLinkMainWrapMainDivPC navbar navbar-inverse" data-spy="affix" data-offset-top="720">--}}
{{--                    <div class="tabLinkMainWrapMainDiv navbar-collapse" id="myNavbar">--}}
{{--                        <a href="#QAndAMainDivId">--}}
{{--                            <button class="tabLinkMainWrap">سؤالات</button>--}}
{{--                        </a><!----}}
{{--                     --><a href="#similarLocationsMainDiv">--}}
{{--                            <button class="tabLinkMainWrap">مکان‌های مشابه</button>--}}
{{--                        </a><!----}}
{{--                     --><a href="#mainDivPlacePost">--}}
{{--                            <button class="tabLinkMainWrap">پست</button>--}}
{{--                        </a><!----}}
{{--                     --><a href="#generalDescriptionMobile">--}}
{{--                            <button class="tabLinkMainWrap">معرفی کلی</button>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <nav class="tabLinkMainWrapMainDivPC navbar navbar-inverse" data-spy="affix" data-offset-top="700">
                    <div class="container-fluid tabLinkMainWrapMainDiv">
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li><a class="tabLinkMainWrap similarLocationsBtnTopBar" href="#similarLocationsMainDiv">مکان‌های مشابه</a></li>
                                <li><a class="tabLinkMainWrap QAndAsBtnTopBar" href="#QAndAMainDivId">سؤالات</a></li>
                                <li><a id="pcPostButton" class="tabLinkMainWrap postsBtnTopBar" href="#mainDivPlacePost">پست</a></li>
                                <li><a class="tabLinkMainWrap generalDescBtnTopBar" href="#generalDescLinkRel">معرفی کلی</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="tabLinkMainWrapMainDivMobile" data-spy="affix" data-offset-top="790">
                    <div class="tabLinkMainWrapMainDiv">
                        <a href="#bodyLinks">
                            <button class="tabLinkMainWrap" onclick="openTab('similarLocationsMainDiv', this, '#4dc7bc')">مکان‌های مشابه</button>
                        </a><!--
                     --><a href="#bodyLinks">
                            <button class="tabLinkMainWrap" onclick="openTab('QAndAMainDivId', this, '#4dc7bc')">سؤالات</button>
                        </a><!--
                     --><a href="#bodyLinks">
                            <button id="openPostPhone" class="tabLinkMainWrap" onclick="openTab('mainDivPlacePost', this, '#4dc7bc')">پست</button>
                        </a><!--
                     --><a href="#bodyLinks">
                            <button class="tabLinkMainWrap" onclick="openTab('mobileIntroductionMainDivId', this, '#4dc7bc')" id="defaultOpenMainWrap">معرفی کلی</button>
                        </a>
                    </div>
                </div>

                <div class="exceptQAndADiv" id="generalDescLinkRel">
                    <div class="topBarContainerGeneralDesc display-none"></div>
                    <div class="hr_btf_wrap position-relative">
                        <div id="introduction" class="ppr_rup ppr_priv_location_detail_overview">
                            <div class="block_wrap" data-tab="TABS_OVERVIEW">
                                <div class="overviewContent">
                                    <div id="mobileIntroductionMainDivId"
                                         class="mobileIntroductionMainDiv tabContentMainWrap">
                                        <div class="tabLinkMainDiv">
                                            <button class="tabLink"
                                                    onclick="openCity('commentsAndAddressMobile', this, 'white', '#4dc7bc')">
                                                نظرات و آدرس
                                            </button><!--
                                         -->
                                            <button class="tabLink"
                                                    onclick="openCity('detailsAndFeaturesMobile', this, 'white', '#4dc7bc')">
                                                امکانات و ویژگی‌ها
                                            </button><!--
                                         -->
                                            <button class="tabLink"
                                                    onclick="openCity('generalDescriptionMobile', this, 'white', '#4dc7bc')"
                                                    id="defaultOpen">معرفی کلی
                                            </button>
                                        </div>
                                        <?php
                                            if($kindPlaceId == 4){
                                                $showInfo = 12;
                                                $showReviewRate = 4;
                                                $showFeatures = 8;
                                                $mainInfoClass = '';
                                            }
                                            else{
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
                                                                @foreach($place->material as $item)
                                                                    <div class="col-sm-6 float-right">
                                                                        <div class="row font-size-20">
                                                                            <div class="col-sm-6">{{$item[1]}}</div>
                                                                            <div class="col-sm-6" style="color: #4dc7bc">{{$item[0]}}</div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="detailsAndFeaturesMobile"
                                                     class="ui_column is-4 details tabContent {{$mainInfoClass}}">
                                                    <div class="direction-rtl">
                                                        @include('hotel-details.tables.mahalifood-details-table')
                                                    </div>
                                                </div>

                                                <div id="commentsAndAddressMobile" class="ui_column is-8 generalDescription tabContent">
                                                    <div class="block_header">
                                                        <h3 class="block_title">دستور پخت:</h3>
                                                    </div>
                                                    <div>
                                                        <div class="overviewContent" id="introductionText">{!! $place->recipes !!}</div>
                                                    </div>
                                                </div>

                                                <div id="commentsAndAddressMobile"
                                                     class="ui_column is-4 reviews tabContent">
                                                    <div class="rating">
                                                        <div class="block_header">
                                                            <h3 class="block_title">نظر شما </h3>
                                                        </div>
                                                        <span class="overallRating">{{$avgRate}} </span>
                                                        <div class="prw_rup prw_common_bubble_rating overallBubbleRating">
                                                            @if($avgRate == 5)
                                                                <span class="ui_bubble_rating bubble_50 font-size-28"
                                                                      property="ratingValue" content="5"
                                                                      alt='5 of 5 bubbles'></span>
                                                            @elseif($avgRate == 4)
                                                                <span class="ui_bubble_rating bubble_40 font-size-28"
                                                                      property="ratingValue" content="4"
                                                                      alt='4 of 5 bubbles'></span>
                                                            @elseif($avgRate == 3)
                                                                <span class="ui_bubble_rating bubble_30 font-size-28"
                                                                      property="ratingValue" content="3"
                                                                      alt='3 of 5 bubbles'></span>
                                                            @elseif($avgRate == 2)
                                                                <span class="ui_bubble_rating bubble_20 font-size-28"
                                                                      property="ratingValue" content="2"
                                                                      alt='2 of 5 bubbles'></span>
                                                            @elseif($avgRate == 1)
                                                                <span class="ui_bubble_rating bubble_10 font-size-28"
                                                                      property="ratingValue" content="1"
                                                                      alt='1 of 5 bubbles'></span>
                                                            @endif
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
                                                        <span class="tag">{{$place->tag1}}</span>
                                                        <span class="tag">{{$place->tag2}}</span>
                                                        <span class="tag">{{$place->tag3}}</span>
                                                        <span class="tag">{{$place->tag4}}</span>
                                                        <span class="tag">{{$place->tag5}}</span>
                                                        <span class="tag">{{$place->tag6}}</span>
                                                        <span class="tag">{{$place->tag7}}</span>
                                                        <span class="tag">{{$place->tag8}}</span>
                                                        <span class="tag">{{$place->tag9}}</span>
                                                        <span class="tag">{{$place->tag10}}</span>
                                                        <span class="tag">{{$place->tag11}}</span>
                                                        <span class="tag">{{$place->tag12}}</span>
                                                        <span class="tag">{{$place->tag13}}</span>
                                                        <span class="tag">{{$place->tag14}}</span>
                                                        <span class="tag">{{$place->tag15}}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <div class="ui_columns is-multiline is-mobile reviewsAndDetails direction-rtlImp">
                                                <div id="generalDescriptionMobile"
                                                     class="ui_column is-{{$showInfo}} generalDescription tabContent">
                                                    <div class="block_header">
                                                        <h3 class="block_title">معرفی کلی </h3>
                                                    </div>
                                                    <div>
                                                        <div class="overviewContent" id="introductionText">{!! $place->description !!}</div>
                                                    </div>
                                                </div>
                                                <div id="detailsAndFeaturesMobile"
                                                     class="ui_column is-{{$showFeatures}} details tabContent {{$mainInfoClass}}">
                                                    <div class="direction-rtl">
                                                        <?php $k = -1; ?>

                                                        @if($placeMode == "hotels")
                                                            @include('hotel-details.tables.hotel-details-table')
                                                        @elseif($placeMode == "amaken")
                                                            @include('hotel-details.tables.amaken-details-table')
                                                        @elseif($placeMode == "restaurant")
                                                            @include('hotel-details.tables.restaurant-details-table')
                                                        @elseif($placeMode == "majara")
                                                            @include('hotel-details.tables.majara-details-table')
                                                        @elseif($placeMode == "sogatSanaies")
                                                            @include('hotel-details.tables.sogatsanaie-details-table')
                                                        @endif
                                                    </div>
                                                </div>
                                                <div id="commentsAndAddressMobile"
                                                     class="ui_column is-{{$showReviewRate}} reviews tabContent">
                                                    <div class="rating">
                                                        <div class="block_header">
                                                            <h3 class="block_title">نظر شما </h3>
                                                        </div>
                                                        <span class="overallRating">{{$avgRate}} </span>
                                                        <div class="prw_rup prw_common_bubble_rating overallBubbleRating">
                                                            <span class="ui_bubble_rating bubble_{{$avgRate}}0 font-size-28" property="ratingValue" content="{{$avgRate}}" alt='{{$avgRate}} of 5 bubbles'></span>
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
                                                        <div class="blEntry address mg-bt-10" id="clientConnectionsAddress">
                                                            <span class="ui_icon map-pin"></span>
                                                            @if($placeMode != 'mahaliFood' && $placeMode != 'sogatSanaies' && $placeMode != 'majara')
                                                                <span class="street-address">آدرس : </span>
                                                                <span>{{$place->address}}</span>
                                                            @elseif( $placeMode == 'majara')
                                                                <span class="street-address">آدرس : </span>
                                                                <span>{{$place->dastresi}}</span>
                                                            @endif
                                                        </div>
                                                        @if(!empty($place->phone))
                                                            <div class="blEntry phone mg-bt-10" id="clientConnectionsPhone">
                                                                <span class="ui_icon phone"></span>
                                                                <span>{{$place->phone}}</span>
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
                                                        <span class="tag">{{$place->tag1}}</span>
                                                        <span class="tag">{{$place->tag2}}</span>
                                                        <span class="tag">{{$place->tag3}}</span>
                                                        <span class="tag">{{$place->tag4}}</span>
                                                        <span class="tag">{{$place->tag5}}</span>
                                                        <span class="tag">{{$place->tag6}}</span>
                                                        <span class="tag">{{$place->tag7}}</span>
                                                        <span class="tag">{{$place->tag8}}</span>
                                                        <span class="tag">{{$place->tag9}}</span>
                                                        <span class="tag">{{$place->tag10}}</span>
                                                        <span class="tag">{{$place->tag11}}</span>
                                                        <span class="tag">{{$place->tag12}}</span>
                                                        <span class="tag">{{$place->tag13}}</span>
                                                        <span class="tag">{{$place->tag14}}</span>
                                                        <span class="tag">{{$place->tag15}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($placeMode != 'sogatSanaies')
                                                @include('hotel-details.mapSection')
                                            @endif
                                        @endif

                                        {{--@include('layouts.extendedMap')--}}
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{--                    @if(session('goDate') != null && $rooms != null)--}}
                        {{--                        <div id="roomChoice" class="ppr_rup ppr_priv_location_detail_two_column display-block position-relative">--}}

                        {{--                            <div class="column_wrap ui_columns is-mobile position-relative full-width direction-rtl">--}}
                        {{--                                <div class="content_column ui_column is-10 roomBox_IS_10">--}}
                        {{--                                    <div class="ppr_rup ppr_priv_location_reviews_container position-relative">--}}
                        {{--                                        <div id="rooms" class="ratings_and_types concepts_and_filters block_wrap position-relative">--}}
                        {{--                                            <div class="header_group block_header" id="roomChoiceDiv">--}}
                        {{--                                                <h3 class="tabs_header reviews_header block_title"> انتخاب اتاق </h3>--}}
                        {{--                                                <div class="srchBox">--}}
                        {{--                                                    <button class="srchBtn" onclick="editSearch()">ویرایش جستجو</button>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                            @for($i = 0; $i < count($rooms); $i++)--}}
                        {{--                                                <div class="eachRooms">--}}
                        {{--                                                    <div class="roomPic">--}}
                        {{--                                                        <img src="{{$rooms[$i]->pic}}" width="100%" height="100%"--}}
                        {{--                                                             alt='{{$rooms[$i]->name}}'>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="roomDetails" id="roomDetailsMainDiv">--}}
                        {{--                                                        <div>--}}
                        {{--                                                            <div class="roomRow">--}}
                        {{--                                                                <div class="roomName"--}}
                        {{--                                                                     onclick="document.getElementById('room_info{{$i}}').style.display = 'flex'">--}}
                        {{--                                                                    {{$rooms[$i]->name}}--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="roomPerson">--}}
                        {{--                                                                    <div>--}}
                        {{--                                                                        @for($j = 0; $j < ceil($rooms[$i]->capacity->adultCount/2); $j++)--}}
                        {{--                                                                            <span class="shTIcon personIcon"></span>--}}
                        {{--                                                                        @endfor--}}
                        {{--                                                                    </div>--}}
                        {{--                                                                    <div>--}}
                        {{--                                                                        @for($j = 0; $j < floor($rooms[$i]->capacity->adultCount/2); $j++)--}}
                        {{--                                                                            <span class="shTIcon personIcon"></span>--}}
                        {{--                                                                        @endfor--}}
                        {{--                                                                    </div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                            <div class="roomRow float-left">--}}
                        {{--                                                                <div class="roomNumber">--}}
                        {{--                                                                    <div>--}}
                        {{--                                                                        تعداد اتاق--}}
                        {{--                                                                    </div>--}}
                        {{--                                                                    <select name="room_Number" id="roomNumber{{$i}}"--}}
                        {{--                                                                            onclick="changeNumRoom({{$i}}, this.value)">--}}
                        {{--                                                                        @for($j = 0; $j < 11; $j++)--}}
                        {{--                                                                            <option value="{{$j}}">{{$j}}</option>--}}
                        {{--                                                                        @endfor--}}
                        {{--                                                                    </select>--}}
                        {{--                                                                </div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div>--}}
                        {{--                                                            <div class="roomRow">--}}
                        {{--                                                                <div class="roomOptionTitle">امکانات اتاق</div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                            <div class="roomRow">--}}
                        {{--                                                                <div class="check-box__item hint-system hidden"--}}
                        {{--                                                                     @if(!($rooms[$i]->priceExtraGuest != null && $rooms[$i]->priceExtraGuest != ''))style="display: none;" @endif>--}}
                        {{--                                                                    <label class="labelEdit">استفاده از تخت اضافه</label>--}}
                        {{--                                                                    <input type="checkbox" id="additional_bed{{$i}}"--}}
                        {{--                                                                           name="additionalBed" value="1" class="display-inline-block"--}}
                        {{--                                                                           onclick="changeRoomPrice({{$i}}); changeNumRoom({{$i}}, this.value)">--}}
                        {{--                                                                </div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div>--}}

                        {{--                                                            <div class="roomRow">--}}
                        {{--                                                                <div class="roomOption">{{$rooms[$i]->roomFacility}} </div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                            <div class="roomRow">--}}

                        {{--                                                                @if($rooms[$i]->priceExtraGuest != null && $rooms[$i]->priceExtraGuest != '')--}}
                        {{--                                                                    <div class="roomAdditionalOption">تخت اضافه</div>--}}
                        {{--                                                                @endif--}}
                        {{--                                                                <div class="roomAdditionalOption">{{$rooms[$i]->roomService}}</div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="roomPrices" id="roomPricesMainDiv">--}}
                        {{--                                                        <div>قیمت</div>--}}
                        {{--                                                        <div>--}}
                        {{--                                                            <div>{{floor($rooms[$i]->perDay[0]->price/1000)*1000}}--}}
                        {{--                                                                @if($rooms[$i]->priceExtraGuest != null && $rooms[$i]->priceExtraGuest != '')--}}
                        {{--                                                                    <div id="extraBedPrice{{$i}}" class="display-none extraBedPrices">--}}
                        {{--                                                                        <div class="salePrice">--}}
                        {{--                                                                            {{floor($rooms[$i]->priceExtraGuest/1000)*1000 + floor($rooms[$i]->perDay[0]->price/1000)*1000}}--}}
                        {{--                                                                        </div>--}}
                        {{--                                                                        <div>--}}
                        {{--                                                                            <div>با احتساب {{floor($rooms[$i]->priceExtraGuest/1000)*1000}}</div>--}}
                        {{--                                                                            <div>با تخت اضافه</div>--}}
                        {{--                                                                        </div>--}}
                        {{--                                                                    </div>--}}
                        {{--                                                                @endif--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div>--}}
                        {{--                                                            <div class="display-inline-block">--}}
                        {{--                                                                از {{$rooms[$i]->provider}}</div>--}}
                        {{--                                                            <img class="float-left">--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div id="room_info{{$i}}" class="roomInfos">--}}
                        {{--                                                    <div class="container">--}}
                        {{--                                                        <div class="row direction-rtl">--}}
                        {{--                                                            <div class="col-md-8">--}}
                        {{--                                                                <div class="roomRow">--}}
                        {{--                                                                    <div class="roomName">{{$rooms[$i]->name}}</div>--}}
                        {{--                                                                    <div class="shTIcon closeXicon float-left"--}}
                        {{--                                                                         onclick="document.getElementById('room_info{{$i}}').style.display = 'none'">--}}
                        {{--                                                                    </div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="roomRow">--}}
                        {{--                                                                    <div class="roomOptionTitle">امکانات اتاق</div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="roomRow">--}}
                        {{--                                                                    <div class="roomOption">{{$rooms[$i]->roomFacility}} </div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="roomRow">--}}
                        {{--                                                                    <div class="roomOptionTitle">امکانات ویژه</div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="roomRow">--}}
                        {{--                                                                    @if($rooms[$i]->priceExtraGuest != null && $rooms[$i]->priceExtraGuest != '')--}}
                        {{--                                                                        <div class="roomAdditionalOption">--}}
                        {{--                                                                            تخت اضافه--}}
                        {{--                                                                        </div>--}}
                        {{--                                                                    @endif--}}
                        {{--                                                                    <div class="roomAdditionalOption">{{$rooms[$i]->roomService}}</div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                            <div class="col-md-4">--}}
                        {{--                                                                <img src="{{$rooms[$i]->pic}}" width="100%" height="100%" alt='{{$rooms[$i]->name}}'>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            @endfor--}}
                        {{--                                        </div>--}}

                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="is-2 roomBox_IS_2 full-width">--}}
                        {{--                                    <div class="priceRow_IS_2">--}}
                        {{--                                        <div>قیمت کل برای یک شب</div>--}}
                        {{--                                        <div id="totalPriceOneDay">0</div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="priceRow_IS_2">--}}
                        {{--                                        <div>--}}
                        {{--                                            <span class="lable_IS_2">قیمت کل </span>--}}
                        {{--                                            برای--}}
                        {{--                                            <span id="numDay"></span>--}}
                        {{--                                            شب--}}
                        {{--                                        </div>--}}
                        {{--                                        <div id="totalPrice">0</div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="priceRow_IS_2">--}}
                        {{--                                        <div>--}}
                        {{--                                            <div class="lable_IS_2">تعداد اتاق</div>--}}
                        {{--                                            <div class="float-left" id="totalNumRoom"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div id="discriptionNumRoom">--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div>--}}
                        {{--                                        <button class="btn rezervedBtn" type="button" onclick="showReserve()">رزرو--}}
                        {{--                                        </button>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div>--}}
                        {{--                                        --}}{{--<div>--}}
                        {{--                                        --}}{{--<div>حداکثر سن کودک</div>--}}
                        {{--                                        --}}{{--<div class="color-darkred">یک سال بدون اخذ هزینه</div>--}}
                        {{--                                        --}}{{--</div>--}}
                        {{--                                        --}}{{--<div>--}}
                        {{--                                        --}}{{--<div>ساعت تحویل و تخلیه اتاق</div>--}}
                        {{--                                        --}}{{--<div class="color-darkred">14:00</div>--}}
                        {{--                                        --}}{{--</div>--}}
                        {{--                                        --}}{{--<div>--}}
                        {{--                                        --}}{{--<div>قوانین کنسلی</div>--}}
                        {{--                                        --}}{{--<div class="color-darkred">لورم ییی</div>--}}
                        {{--                                        --}}{{--</div>--}}
                        {{--                                        {{$place->policy}}--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div id="check_room">--}}
                        {{--                            <div class="container">--}}
                        {{--                                <div class="row">--}}
                        {{--                                    <span>--}}
                        {{--                                        شهر{{$city->name}}--}}
                        {{--                                    </span>--}}
                        {{--                                    <span>--}}
                        {{--                                        {{session('goDate')}}-{{session('backDate')}}--}}
                        {{--                                    </span>--}}
                        {{--                                    <span class="shTIcon closeXicon float-left"--}}
                        {{--                                          onclick="document.getElementById('check_room').style.display = 'none';">--}}
                        {{--                                    </span>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="row">--}}
                        {{--                                    <div class="col-md-3">--}}
                        {{--                                        <div class="is-2 roomBox_IS_2">--}}
                        {{--                                            <div class="priceRow_IS_2">--}}
                        {{--                                                <div>--}}
                        {{--                                                    <span class="lable_IS_2">قیمت کل </span>--}}
                        {{--                                                    برای--}}
                        {{--                                                    <span id="check_num_day"></span>--}}
                        {{--                                                    شب--}}
                        {{--                                                </div>--}}
                        {{--                                                <div id="check_total_price">--}}
                        {{--                                                    0--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="priceRow_IS_2" >--}}
                        {{--                                                <div>--}}
                        {{--                                                    <div class="float-left">--}}
                        {{--                                                        <span id="check_total_num_room"></span>--}}
                        {{--                                                        اتاق--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="lable_IS_2">تعداد اتاق</div>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div id="check_description">--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div>--}}
                        {{--                                                <span class="float-left">--}}
                        {{--                                                    {{$rooms[0]->provider}}--}}
                        {{--                                                </span>--}}
                        {{--                                                --}}{{--<a href="{{url('buyHotel')}}">--}}
                        {{--                                                <button class="btn rezervedBtn" type="button" onclick="updateSession()">--}}
                        {{--                                                    تایید و ادامه--}}
                        {{--                                                </button>--}}
                        {{--                                                --}}{{--</a>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-9">--}}
                        {{--                                        <div class="row">--}}
                        {{--                                            <div>هتل انتخابی شما</div>--}}
                        {{--                                            <div>--}}
                        {{--                                                <div class="col-md-7">--}}
                        {{--                                                    <span class="imgWrap imgWrap1stTemp">--}}
                        {{--                                                        <img alt="{{$place->alt1}}" src="{{$thumbnail}}" class="centeredImg" width="100%"/>--}}
                        {{--                                                    </span>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="col-md-5">--}}
                        {{--                                                    <div>{{$place->name}}</div>--}}
                        {{--                                                    <div class="rating_and_popularity" id="hotelRatingMainDivRoomChoice">--}}
                        {{--                                                        <span class="header_rating">--}}
                        {{--                                                            <div class="rs rating" rel="v:rating">--}}
                        {{--                                                                <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">--}}
                        {{--                                                                    @if($avgRate == 5)--}}
                        {{--                                                                       <span class="ui_bubble_rating bubble_50 font-size-16"--}}
                        {{--                                                                             property="ratingValue" content="5"--}}
                        {{--                                                                             alt='5 of 5 bubbles'></span>--}}
                        {{--                                                                   @elseif($avgRate == 4)--}}
                        {{--                                                                       <span class="ui_bubble_rating bubble_40 font-size-16"--}}
                        {{--                                                                             property="ratingValue" content="4"--}}
                        {{--                                                                             alt='4 of 5 bubbles'></span>--}}
                        {{--                                                                   @elseif($avgRate == 3)--}}
                        {{--                                                                       <span class="ui_bubble_rating bubble_30 font-size-16"--}}
                        {{--                                                                             property="ratingValue" content="3"--}}
                        {{--                                                                             alt='3 of 5 bubbles'></span>--}}
                        {{--                                                                   @elseif($avgRate == 2)--}}
                        {{--                                                                       <span class="ui_bubble_rating bubble_20 font-size-16"--}}
                        {{--                                                                             property="ratingValue" content="2"--}}
                        {{--                                                                             alt='2 of 5 bubbles'></span>--}}
                        {{--                                                                   @elseif($avgRate == 1)--}}
                        {{--                                                                       <span class="ui_bubble_rating bubble_10 font-size-16"--}}
                        {{--                                                                             property="ratingValue" content="1"--}}
                        {{--                                                                             alt='1 of 5 bubbles'></span>--}}
                        {{--                                                                   @endif--}}
                        {{--                                                                </div>--}}
                        {{--                                                           </div>--}}
                        {{--                                                        </span>--}}
                        {{--                                                        <span class="header_popularity popIndexValidation">--}}
                        {{--                                                            <a class="more taLnk" href="#REVIEWS">--}}
                        {{--                                                                <span property="v:count" id="commentCount"></span> نقد--}}
                        {{--                                                            </a>--}}
                        {{--                                                            <a> {{$total}} امتیاز</a>--}}
                        {{--                                                        </span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div id="hotelRatesDivs">--}}
                        {{--                                                        <div class="titleInTable">درجه هتل</div>--}}
                        {{--                                                        <div class="highlightedAmenity detailListItem">{{$place->rate}}</div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="blEntry blEn address  clickable colCnt3"--}}
                        {{--                                                         onclick="showExtendedMap()">--}}
                        {{--                                                        <span class="ui_icon map-pin"></span>--}}
                        {{--                                                        <span class="street-address">آدرس : </span>--}}
                        {{--                                                        <span>{{$place->address}}</span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="row" id="selectedRoomMainDiv">--}}
                        {{--                                            <div>اتاق های انتخابی شما</div>--}}
                        {{--                                            <div id="selected_rooms"></div>--}}
                        {{--                                            <div>--}}
                        {{--                                                <div class="row">--}}
                        {{--                                                    <div class="col-md-12">--}}
                        {{--                                                        {{$place->policy}}--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-md-3"></div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    @endif--}}
                    </div>


                    <div id="mainDivPlacePost" class="tabContentMainWrap">
                        <div class="topHeaderBarPosts display-none">
                            <span class="float-right text-align-right">جستجوی‌ بیشتر در پست‌ها</span>
{{--                            <span onclick="allPostsGrid()" class="returnToMainPage display-none">back</span>--}}
                            <span class="float-left">مشاهده همه پست‌ها</span>
                        </div>

                        <div class="topBarContainerPosts display-none"></div>

                        <div class="col-md-5 col-xs-12 pd-0 pd-rt-10Imp leftColMainWrap">

                            @include('hotel-details.filterSection')

                            <center id="advertiseDiv" class="col-xs-12 adsMainDiv">
{{--                                @include('features.advertise3D')--}}
                            </center>
                        </div>

                        @include('hotel-details.reviewSection')

                </div>

                <div class="clear-both"></div>
                @include('hotel-details.questionSection')
            </div>

                @if($placeMode != 'sogatSanaies' && $placeMode != 'mahaliFood')
                    @include('hotel-details.similarLocation')
                @endif
            </div>
        </div>
    </div>

    <span id="reportPane" class="ui_overlay ui_modal editTags hidden" style="position: fixed; left: 24%; right: 24%; top:19%; bottom: auto;overflow: auto;max-height: 500px;">
    <div class="header_text">گزارش</div>
    <div class="subheader_text">
   گزارش خود را از بین موضوعات موجود انتخاب نمایید
    </div>
    <div class="body_text">
        <fieldset id="memberTags">
            <div class="reports" id="reports">
            </div>
        </fieldset>
        <br>
        <div class="submitOptions">
            <button onclick="sendReport()" class="btn btn-success" style="color: #FFF;background-color: #4dc7bc;border-color:#4dc7bc;">تایید</button>
            <input type="submit" onclick="closeReportPrompt()" value="خیر" class="btn btn-default">
        </div>
        <div id="errMsgReport" style="color: red"></div>
    </div>
    <div onclick="closeReportPrompt()" class="ui_close_x"></div>
</span>

    @if(isset($video) && $video != null)
        {{--vr--}}
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body" style="justify-content: center; display: flex;">
                        <video id="my-video" class="video-js vjs-default-skin" controls style=" max-height: 80vh;">
                            <source src="{{URL::asset('vr2/contents/' . $video)}}" type="video/mp4">
                        </video>
                                                    {{--ویدیویی برای نمایش موجود--}}
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {

                if($(window).width() < 630) {
                    $('.tabLinkMainWrapMainDivMobile').affix({offset: {top: 930}});
                }

                $( window ).resize(function() {
                    if($(window).width() < 630) {
                        $('.tabLinkMainWrapMainDivMobile').affix({offset: {top: 930}});
                    }
                })
            })
        </script>

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

    @include('hotelDetailsPopUp')

    <script>

        autosize($(".inputBoxInputComment"));
        autosize($(".inputBoxInputAnswer"));
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

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        function hideMobileTabLink() {
            if($(window).width() < 992) {
                $('.tabLinkMainWrapMainDivMobile').hide();
            }
        }
        function showMobileTabLink() {
            if($(window).width() < 992) {
                $('.tabLinkMainWrapMainDivMobile').show()
            }
        }


        function newPostModal(kind = '') {
            if (!hasLogin) {
                showLoginPrompt(hotelDetailsInSaveToTripMode);
                return;
            }

            $("#darkModal").show();
            $(".postModalMainDiv").removeClass('hidden');


            setTimeout(function(){
                if(kind == 'textarea')
                    document.getElementById("postTextArea").focus();
                else if(kind == 'tag')
                    $('#assignedSearch').focus();

                if(kind != 'textarea')
                    $('html').scrollTop($('#reviewMainDivDetails').position()['top'])

            }, 500);
        }

        function closeNewPostModal() {
            $('#darkModal').hide() ,
                $(".postModalMainDiv").addClass('hidden')
        }

        function editPhotosNewPost() {
            $('#editPane').removeClass('hidden')
        }

        function showAnswersActionBox(element) {
            $(element).next().toggle() ,
                $(element).toggleClass("bg-color-darkgrey")
        }

        function showRatingDetails(element) {
            if($(element).parent().next().hasClass('commentRatingsDetailsBox')) {
                $(element).parent().next().toggle();
                $(element).children().children().toggleClass('glyphicon-triangle-bottom');
                $(element).children().children().toggleClass('glyphicon-triangle-top')
                $(element).parent().toggleClass('mg-bt-10');
            }
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

        $(document).ready(function() {
            if (window.matchMedia('(max-width: 373px)').matches) {
                $('.eachCommentMainBox').removeClass('mg-rt-45')
            }
        });

        $(window).scroll(function() {
            if(!$('.tabLinkMainWrapMainDivPC').hasClass('affix')){
                $('.topBarContainerGeneralDesc').addClass('display-none');
            }
        });

        $(document).ready(function() {
            $('.generalDescBtnTopBar').click(function() {
                $('.tabLinkMainWrapMainDivPC').addClass('affix');
                $('.topBarContainerGeneralDesc').removeClass('display-none');
                $('.topBarContainerPosts').addClass('display-none');
                $('.topBarContainerQAndAs').addClass('display-none');
                $('.topBarContainerSimilarLocations').addClass('display-none');

                setTimeout(function() {
                    $('.generalDescBtnTopBar').parent().addClass('active');
                }, 50);

                $('.postsBtnTopBar').parent().removeClass('active');
                $('.QAndAsBtnTopBar').parent().removeClass('active');
                $('.similarLocationsBtnTopBar').parent().removeClass('active');
            });

            $('.postsBtnTopBar').click(function() {
                $('.tabLinkMainWrapMainDivPC').addClass('affix');
                $('.topBarContainerGeneralDesc').addClass('display-none');
                $('.topBarContainerPosts').removeClass('display-none');
                $('.topBarContainerQAndAs').addClass('display-none');
                $('.topBarContainerSimilarLocations').addClass('display-none');

                setTimeout(function() {
                    $('.generalDescBtnTopBar').parent().removeClass('active');
                    $('.postsBtnTopBar').parent().addClass('active');
                }, 50);

                $('.QAndAsBtnTopBar').parent().removeClass('active');
                $('.similarLocationsBtnTopBar').parent().removeClass('active');
            });

            $('.QAndAsBtnTopBar').click(function() {
                $('.tabLinkMainWrapMainDivPC').addClass('affix');
                $('.topBarContainerGeneralDesc').addClass('display-none');
                $('.topBarContainerPosts').addClass('display-none');
                $('.topBarContainerQAndAs').removeClass('display-none');
                $('.topBarContainerSimilarLocations').addClass('display-none');
                $('.generalDescBtnTopBar').parent().removeClass('active');

                setTimeout(function() {
                    $('.postsBtnTopBar').parent().removeClass('active');
                    $('.QAndAsBtnTopBar').parent().addClass('active');
                }, 50);

                $('.similarLocationsBtnTopBar').parent().removeClass('active');
            });

            $('.similarLocationsBtnTopBar').click(function() {
                $('.tabLinkMainWrapMainDivPC').addClass('affix');
                $('.topBarContainerGeneralDesc').addClass('display-none');
                $('.topBarContainerPosts').addClass('display-none');
                $('.topBarContainerQAndAs').addClass('display-none');
                $('.topBarContainerSimilarLocations').removeClass('display-none');
                $('.generalDescBtnTopBar').parent().removeClass('active');
                $('.postsBtnTopBar').parent().removeClass('active');

                setTimeout(function() {
                    $('.QAndAsBtnTopBar').parent().removeClass('active');
                    $('.similarLocationsBtnTopBar').parent().addClass('active');
                }, 50);

            });
        })

    </script>

    <script>
        var photographerPicsForAlbum = [];
        var sitePicsForAlbum = [];
        var userPhotosForAlbum = [];

        for(var i = 0; i < photographerPics.length; i++){
            photographerPicsForAlbum[i] = {
                'id' : photographerPics[i]['id'],
                'sidePic' : photographerPics[i]['l'],
                'mainPic' : photographerPics[i]['s'],
                'userPic' : photographerPics[i]['userPic'],
                'userName' : photographerPics[i]['name'],
                'like' : photographerPics[i]['like'],
                'dislike' : photographerPics[i]['dislike'],
                'alt' : photographerPics[i]['alt'],
                'description' : photographerPics[i]['description'],
                'uploadTime' : photographerPics[i]['fromUpload'],
                'showInfo' : photographerPics[i]['showInfo'],
                'likeFunc' : 'likePhotographerPic',
                'disLikeFunc' : 'likePhotographerPic',
                'userLike' : photographerPics[i]['userLike'],
            }
        }

        for(var i = 0; i < sitePics.length; i++){
            sitePicsForAlbum[i] = {
                'id' : sitePics[i]['id'],
                'sidePic' : sitePics[i]['l'],
                'mainPic' : sitePics[i]['s'],
                'userPic' : sitePics[i]['userPic'],
                'userName' : sitePics[i]['name'],
                'like' : sitePics[i]['like'],
                'dislike' : sitePics[i]['dislike'],
                'alt' : sitePics[i]['alt'],
                'description' : sitePics[i]['description'],
                'uploadTime' : sitePics[i]['fromUpload'],
                'showInfo' : sitePics[i]['showInfo'],
                'userLike' : sitePics[i]['userLike'],
            }
        }

        for(var i = 0; i < userPhotos.length; i++){
            userPhotosForAlbum[i] = {
                'id' : userPhotos[i]['id'],
                'sidePic' : userPhotos[i]['pic'],
                'mainPic' : userPhotos[i]['pic'],
                'userPic' : userPhotos[i]['userPic'],
                'userName' : userPhotos[i]['username'],
                'showInfo' : false,
            }
        }

        function showPhotoAlbum(_kind){
            if(_kind == 'photographer')
                createPhotoModal('عکس های عکاسان', photographerPicsForAlbum);
            else if(_kind == 'sitePics')
                createPhotoModal('عکس های سایت', sitePicsForAlbum);
            else if(_kind == 'userPics')
                createPhotoModal('عکس های کاربران', userPhotosForAlbum);
        }

        function openTab(tabName, elmnt, fontColor) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContentMainWrap");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tabLinkMainWrap");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.color = "";
            }
            document.getElementById(tabName).style.display = "block";
            elmnt.style.color = fontColor;

            initSwiper();
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpenMainWrap").style.color = "rgb(77, 199, 188)";

    </script>

    <script>
        var rateQuestion = {!! $rateQuestionJSON !!} ;
        var rateQuestionAns = [];
        var allReviews;
        var reviewsCount;

        for (i = 0; i < rateQuestion.length; i++)
            rateQuestionAns[i] = 2;
    </script>

    @include('layouts.pop-up-create-trip_in_hotel_details')

    <script>
        $(document).ready(function () {
            $('.login-button').click(function () {
                var url = '{{Request::url()}}';
                $(".dark").show();
                showLoginPrompt(url);
            });
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
            }
            else {
                $("#backBtnHelp_" + curr).removeAttr('disabled');
            }
            if (getNext(curr) > total - 1) {
                $("#nextBtnHelp_" + curr).attr('disabled', 'disabled');
            }
            else {
                $("#nextBtnHelp_" + curr).removeAttr('disabled');
            }
            if (curr < greenBackLimit) {
                $("#targetHelp_" + curr).css({
                    'position': 'relative',
                    'border': '5px solid #333',
                    'padding': '10px',
                    'background-color': '#4dc7bc',
                    'z-index': 1000001,
                    'cursor': 'auto'
                });
            }
            else {
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
            }
            else {
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

    <script>
        function closePublish() {
            var url;
            if (placeMode == "hotel")
                url = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
            else if (placeMode == "amaken")
                url = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
            else
                url = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
            document.location.href = url;
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