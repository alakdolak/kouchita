@extends('layouts.bodyPlace')

<?php
$total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
if ($total == 0)
    $total = 1;
?>
@section('title')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>--}}
    <link rel="stylesheet" href="{{URL::asset('css/theme2/media_uploader.css')}}">
    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
    <title>{{$place->name}} | {{$city->name}} | شازده مسافر</title>
@stop

@section('meta')
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
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="{{$place->meta}}"/>
    <meta name="twitter:title" content="{{$place->name}} | {{$city->name}} | شازده مسافر"/>
    <meta property="og:url" content="{{Request::url()}}"/>
    @if(count($photos) > 0)
        <meta property="og:image" content="{{$photos[0]}}"/>
        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>
        <meta property="og:image:width" content="550"/>
        <meta property="og:image:height" content="367"/>
        <meta name="twitter:image" content="{{$photos[0]}}"/>
    @endif
    <meta content="article" property="og:type"/>
    <meta property="og:title" content="{{$place->name}} | {{$city->name}} | شازده مسافر"/>



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
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/editor.css')}}">


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


    <style>
        .changeWidth {
            @if(session('goDate'))
                   width: 14% !important;
        @endif

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
                <div class="postModalMainDiv hidden">
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
                                            <textarea class="inputBoxInput inputBoxInputComment" name="text" type="text"
                                                      placeholder="{{auth()->user()->first_name ? auth()->user()->first_name :auth()->user()->username }}، چه فکر یا احساسی داری.....؟"
                                                      onkeyup="textAreaAdjust(this)" style="overflow:hidden"></textarea>
                                        @else
                                            <textarea class="inputBoxInput inputBoxInputComment" name="text" type="text"
                                                      placeholder="سینا، چه فکر یا احساسی داری.....؟"></textarea>
                                        @endif
                                        <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                    </div>
                                    <script>
                                        function textAreaAdjust(o) {
                                            o.style.height = "1px";
                                            o.style.height = (25 + o.scrollHeight) + "px";
                                        }
                                    </script>
                                    <div class="clear-both"></div>
                                    <div class="row">
                                        <div class="commentPhotosMainDiv" id="reviewShowPics">

                                            {{--<div class="commentVideosDiv commentPhotosAndVideos">--}}
                                            {{--<div class="deleteUploadPhotoComment"></div>--}}
                                            {{--<div class="videosLengthDiv">20:45</div>--}}
                                            {{--<div class="editUploadPhotoComment"></div>--}}
                                            {{--</div>--}}
                                            {{----}}
                                            {{--<center class="addPhotosOrVideosBox">--}}
                                            {{--اضافه کنید--}}
                                            {{--<img src="{{"../../../public/images/tourCreation/add.png"}}">--}}
                                            {{--</center>--}}
                                        </div>
                                    </div>

                                    <div class="addParticipantName">
                                        <span class="addParticipantSpan">با</span>
                                        <div class="inputBoxGeneralInfo inputBox addParticipantInputBoxPostModal">
                                            <textarea id="assignedSearch" class="inputBoxInput inputBoxInputComment"
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
                                        <span class="tagFriendCommentIcon"></span>
                                        <span class="commentOptionsText">دوستانتان را tag کنید.</span>
                                    </div>
                                    <div class="commentOptionsBoxes">
                                        <label for="video360ReviewInput">
                                            <span class="add360VideoCommentIcon"></span>
                                            <span class="commentOptionsText">ویدیو 360 اضافه کنید.</span>
                                        </label>
                                    </div>
                                    <input type="file" id="video360ReviewInput" accept="video/*"  style="display: none" onchange="uploadReviewVideo(this, 1)">
                                    <div class="commentOptionsBoxes">
                                        <label for="videoReviewInput">
                                            <span class="addVideoCommentIcon"></span>
                                            <span class="commentOptionsText">ویدیو اضافه کنید.</span>
                                        </label>
                                    </div>
                                    <input type="file" id="videoReviewInput" accept="video/*" style="display: none"
                                           onchange="uploadReviewVideo(this, 0)">
                                    <div class="commentOptionsBoxes">
                                        <label for="picReviewInput0">
                                            <span class="addPhotoCommentIcon"></span>
                                            <span class="commentOptionsText">عکس اضافه کنید.</span>
                                        </label>
                                    </div>
                                    <input type="file" id="picReviewInput0" accept="image/*" style="display: none"
                                           onchange="uploadReviewPics(this, 0)">
                                </center>
                                @foreach($textQuestion as $item)
                                    <div id="questionDiv_{{$item->id}}" class="commentQuestionsForm">
                                        <span class="addOriginCity">{{$item->description}}</span>
                                        <div class="inputBoxGeneralInfo inputBox addOriginCityInputBoxPostModal">
                                            <textarea id="question_{{$item->id}}" name="textAns[]"
                                                      class="inputBoxInput inputBoxInputComment"
                                                      placeholder="شهر مبداء خود را وارد نمایید"></textarea>
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
                                                       onchange="radioChange(this.value, {{$item->id}}, {{$index}}, {{$item->ans[$i]->id}})"
                                                       type="radio" style="display: none">
                                            @endfor
                                        </div>
                                    </div>
                                @endforeach

                                <div class="commentQuestionsRatingsBox">
                                    <div class="commentQuestionsRatingsBoxHeader">چقدر راضی بودید؟</div>

                                    @for($i = 0; $i < count($rateQuestion); $i++)
                                        <div class="display-inline-block full-width">
                                            <b id="rateName_{{$i}}"
                                               class="col-xs-3 font-size-15 line-height-203 pd-lt-0">بد نبود</b>
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
                                            <b class="col-xs-6 font-size-15 line-height-203">{{$rateQuestion[$i]->description}}</b>
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

                @include('layouts.modalPhotos')

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
                                          class="ui_button casino save-location-7306673 ui_icon saveAsBookmarkMainDiv {{($bookMark) ? "castle" : "red-heart"}} ">
                                        <div class="saveAsBookmarkIcon"></div>
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
                                            <div id="photographerAlbum" data-toggle="modal"
                                                 data-target="#showingPhotographerPicsModal"
                                                 onclick="changePhotographerSlidePic(0)">

                                                <div id="mainSlider" class="swiper-container">
                                                    <div class="swiper-wrapper">

                                                        @for($i = 0; $i < count($photographerPics); $i++)
                                                            <div class="swiper-slide">
                                                                <img class="eachPicOfSlider"
                                                                     src="{{$photographerPics[$i]['s']}}"
                                                                     alt="{{$photographerPics[$i]['alt']}}"
                                                                     style="width: 100%;">

                                                                <div class="see_all_count_wrap" onclick="getPhotos(-1)">
                                                                    <span class="see_all_count">
                                                                        <div class="circleBase type2"
                                                                             id="photographerIdPic"
                                                                             style="background-color: #4DC7BC;">
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
                                        <div class="left-nav left-nav-header swiper-button-next"
                                             style="opacity: 0.8;"></div>
                                        <div class="right-nav right-nav-header swiper-button-prev"
                                             style="left: auto; opacity: 0.8;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="secondaryWrap">
                                <div class="tileWrap">
                                    <div class="prw_rup prw_hotels_flexible_album_thumb tile">
                                        <div class="albumThumbnail">
                                            <div class="prw_rup prw_common_centered_image">
                                                @if(count($sitePics) != 0)
                                                    <span class="imgWrap imgWrap1stTemp" data-toggle="modal"
                                                          data-target="#showingSitePicsModal">
                                                        <img alt="{{$place->alt1}}" src="{{$thumbnail}}"
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
                                                    {{(count($userPhotos) != 0) ? ' data-toggle=modal data-target=#showingUserPicsModal' : "" }}>
                                                <span class="imgWrap imgWrap1stTemp">
                                                    @if(count($userPhotos) != 0)
                                                        <img src="{{$userPhotos[0]->pic}}" class="centeredImg" width="100%"/>
                                                    @endif
                                                </span>
                                            </div>
                                            <div {{(count($userPhotos) != 0) ? ' data-toggle=modal data-target=#showingUserPicsModal' : "" }}  class="albumInfo">
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

                        @if(Auth::check())
                            @include('editor')
                        @endif

                        <div id="helpSpan_10" class="helpSpans hidden row">
                            <span class="introjs-arrow"></span>
                            <p>عکس‌های دوستانتان را از دست ندهید. گاهی وقت ها یک عکس سخن های بسیاری دارد.</p>
                            <button data-val="10" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_10">بعدی</button>
                            <button data-val="10" class="btn btn-primary backBtnsHelp" id="backBtnHelp_10">قبلی</button>
                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                        </div>
                    </div>
                    <a class="postLink" onclick="newPostModal()">
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
                                                  placeholder="{{auth()->user()->first_name ? auth()->user()->first_name :auth()->user()->username }}، چه فکر یا احساسی داری.....؟"></textarea>
                                    @else
                                        <textarea class="inputBoxInput inputBoxInputComment" type="text"
                                                  placeholder="سینا، چه فکر یا احساسی داری.....؟"></textarea>
                                    @endif
                                    <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                </div>
                            </div>
                            <div class="commentMoreSettingBar">
                                <div class="commentOptionsBoxes">
                                    <span class="addPhotoCommentIcon"></span>
                                    <span class="commentOptionsText">عکس اضافه کنید.</span>
                                </div><!--
                             -->
                                <div class="commentOptionsBoxes">
                                    <span class="addVideoCommentIcon"></span>
                                    <span class="commentOptionsText">ویدیو اضافه کنید.</span>
                                </div><!--
                             -->
                                <div class="commentOptionsBoxes">
                                    <span class="add360VideoCommentIcon"></span>
                                    <span class="commentOptionsText">ویدیو 360 اضافه کنید.</span>
                                </div><!--
                             -->
                                <div class="commentOptionsBoxes" id="bodyLinks">
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
            </div>
        </div>
    </div>

    <div id="MAINWRAP" class="
        full_meta_photos_v3  full_meta_photos_v4  big_pic_mainwrap_tweaks horizontal_xsell ui_container is-mobile position-relative">
        <div id="MAIN" class="Hotel_Review prodp13n_jfy_overflow_visible position-relative">
            <div id="BODYCON" ng-app="mainApp"
                 class="col easyClear bodLHN poolB adjust_padding new_meta_chevron new_meta_chevron_v2 position-relative">

                <div class="postsFiltrationBarToggle display-none col-xs-12">
                    <div class="postsMainFiltrationBar">
                        <span>نمایش بر اساس</span><!--
                     --><span>جدیدترین‌ها</span><!--
                     --><span>قدمی‌ترین‌ها</span><!--
                     --><span>بهترین‌ها</span><!--
                     --><span>داغ‌ترین‌ها</span><!--
                     --><span>بدترین‌ها</span><!--
                     --><span>بیشترین همراهان</span><!--
                     --><span>پست‌ها</span>
                    </div>
                </div>

                <script>
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

                <div class="tabLinkMainWrapMainDivMobile" data-spy="affix" data-offset-top="753">
                    <div class="tabLinkMainWrapMainDiv">
                        <a href="#bodyLinks">
                            <button class="tabLinkMainWrap" onclick="openTab('QAndAMainDivId', this, '#4dc7bc')">سؤالات</button>
                        </a><!--
                     --><a href="#bodyLinks">
                            <button class="tabLinkMainWrap" onclick="openTab('similarLocationsMainDiv', this, '#4dc7bc')">مکان‌های مشابه</button>
                        </a><!--
                     --><a href="#bodyLinks">
                            <button class="tabLinkMainWrap" onclick="openTab('mainDivPlacePost', this, '#4dc7bc')">پست</button>
                        </a><!--
                     --><a href="#bodyLinks">
                            <button class="tabLinkMainWrap" onclick="openTab('mobileIntroductionMainDivId', this, '#4dc7bc')" id="defaultOpenMainWrap">معرفی کلی</button>
                        </a>
                    </div>
                </div>

                <div class="exceptQAndADiv">
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

                                        <div class="ui_columns is-multiline is-mobile reviewsAndDetails direction-rtlImp">
                                            <div id="generalDescriptionMobile"
                                                 class="ui_column is-12 generalDescription tabContent">
                                                <div class="block_header">
                                                    <h3 class="block_title">معرفی کلی </h3>
                                                </div>
                                                <div>
                                                    <div class="overviewContent"
                                                         id="introductionText">{{$place->description}}</div>
                                                </div>
                                            </div>
                                            <div id="detailsAndFeaturesMobile"
                                                 class="ui_column is-8 details tabContent">
                                                <div class="direction-rtl">
                                                    <?php $k = -1; ?>

                                                    @if($placeMode == "hotel")
                                                        @include('hotel-details-table')
                                                    @elseif($placeMode == "amaken")
                                                        @include('amaken-details-table')
                                                    @elseif($placeMode == "restaurant")
                                                        @include('restaurant-details-table')
                                                    @endif
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
                                                <div class="prw_rup prw_common_atf_header_bl"
                                                     id="clientConnectionsLines">
                                                    <div class="blEntry address mg-bt-10" id="clientConnectionsAddress">
                                                        <span class="ui_icon map-pin"></span>
                                                        <span class="street-address">آدرس : </span>
                                                        <span>{{$place->address}}</span>
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

                                        <div id="nearbyDiv" ng-controller="NearbyController as nearby"
                                             class="ppr_rup ppr_priv_location_detail_two_column">
                                            <div class="column_wrap is-mobile">
                                                <div id="nearbyMainContainer" class="content_column ui_column is-8">
                                                    <div class="ppr_rup ppr_priv_location_nearby">
                                                        <div class="nearbyContainer outerShell block_wrap">
                                                            <div class="ui_columns neighborhood">
                                                                <div id="map"
                                                                     class="ui_column is-12 mapTile prv_map clickable"></div>
                                                                <div class="clear-both"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('layouts.extendedMap')

                                    </div>

                                </div>
                            </div>

                        </div>

                        <script>
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
                        </script>
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
                            <span onclick="allPostsGrid()" class="returnToMainPage display-none">back</span>
                            <span class="float-left">مشاهده همه پست‌ها</span>
                        </div>
                        <div class="col-md-5 col-xs-12 pd-0 pd-rt-10Imp leftColMainWrap">
                            <div id="postFilters" class="col-xs-12 postsFiltersMainDiv">
                                <div class="block_header">
                                    <h3 class="block_title">پست‌ها را دقیق‌تر ببینید </h3>
                                </div>
                                <div class="display-inline-block full-width font-size-15">
                                    تعداد <span id="reviewCountSearch"></span> پست، <span id="reviewCommentCount"></span> نظر و <span id="reviewUserCount"></span> کاربر مختلف
                                </div>
                                <div class="filterHelpText">
                                    با استفاده از گزینه‌های زیر نتایج را محدودتر کرده و راحت‌تر مطلب مورد نظر خود را
                                    پیدا کنید
                                    <div class="showFiltersMenus display-none" onclick="showPostsFilterBar()">
                                        <span class="float-right">بستن منو</span>
                                        <span class="float-left position-relative width-50"></span>
                                    </div>
                                </div>
                                <div class="filterBarDivs">

                                    @foreach($multiQuestion as $key => $item)
                                        <div class="visitKindTypeFilter filterTypeDiv">
                                        <span class="float-right line-height-2">
                                            {{$item->description}}
                                        </span>
                                        <span class="dark-blue font-weight-500 float-right line-height-2" onclick="removeFilter({{$item->id}})" style="cursor: pointer">حذف فیلتر</span>
                                        <div class="clear-both"></div>
                                        <center>
                                            @foreach($item->ans as $item2 )
                                                <b id="ansMultiFilter_{{$item2->id}}" class="filterChoices" onclick="chooseMutliFilter({{$item->id}}, {{$item2->id}})">{{$item2->ans}}</b>
                                            @endforeach
                                        </center>
                                    </div>
                                    @endforeach

                                    <div class="photoTypePostsFilter filterTypeDiv">
                                        <span class="float-right line-height-2">
                                            نمایش پست‌های دارای عکس
                                        </span>
                                        <div class="clear-both"></div>

                                        <center>
                                            <b class="filterChoices">تنها دارای عکس</b><!--
                                        --><b class="filterChoices">تنها دارای فیلم</b><!--
                                        --><b class="filterChoices">تنها دارای متن بلند</b><!--
                                        --><b class="filterChoices">تنها دارای فیلم و عکس</b>
                                        </center>
                                    </div>

                                    @foreach($rateQuestion as $index => $item)
                                        <div class="commentsRatesFilter filterTypeDiv">
                                        <span class="float-right line-height-205">
                                            {{$item->description}}
                                        </span>
                                        <div class="clear-both"></div>
                                        <center>
                                            <div class="commentRatingsFiltersChoices">
                                                <div class="display-inline-block full-width text-align-right mg-tp-10">
                                                    <div class="prw_rup prw_common_bubble_rating overallBubbleRating overallBubbleRatingGold full-width float-right">
                                                        {{--                                        <span class="ui_bubble_rating bubble_10 font-size-30 color-yellow"--}}
                                                        {{--                                              property="ratingValue" content="1" alt='1 of 5 bubbles'></span>--}}
                                                        <div class="ui_star_rating stars_10 font-size-25">
                                                            <span id="filterStar_1_{{$item->id}}" class="starRatingGold" onmouseenter="showStar(1, {{$item->id}})" onmouseleave="removeStar({{$item->id}}, {{$index}})" onclick="selectFilterStar(1, {{$item->id}}, {{$index}})"></span>
                                                            <span id="filterStar_2_{{$item->id}}" class="starRatingGrey" onmouseenter="showStar(2, {{$item->id}})" onmouseleave="removeStar({{$item->id}}, {{$index}})" onclick="selectFilterStar(2, {{$item->id}}, {{$index}})"></span>
                                                            <span id="filterStar_3_{{$item->id}}" class="starRatingGrey" onmouseenter="showStar(3, {{$item->id}})" onmouseleave="removeStar({{$item->id}}, {{$index}})" onclick="selectFilterStar(3, {{$item->id}}, {{$index}})"></span>
                                                            <span id="filterStar_4_{{$item->id}}" class="starRatingGrey" onmouseenter="showStar(4, {{$item->id}})" onmouseleave="removeStar({{$item->id}}, {{$index}})" onclick="selectFilterStar(4, {{$item->id}}, {{$index}})"></span>
                                                            <span id="filterStar_5_{{$item->id}}" class="starRatingGrey" onmouseenter="showStar(5, {{$item->id}})" onmouseleave="removeStar({{$item->id}}, {{$index}})" onclick="selectFilterStar(5, {{$item->id}}, {{$index}})"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="filterStarText_{{$item->id}}" class="ratingTranslationDiv">اصلاً راضی نبودم</div>
                                        </center>
                                    </div>
                                    @endforeach

                                    <script>
                                        var filterRateAns = [];
                                        var filterMultiAns = [];

                                        function showStar(_star, _id){
                                            for(i = 1; i < 6; i++){
                                                if(i <= _star) {
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.remove('starRatingGrey');
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.add('starRatingGold');
                                                }
                                                else{
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.remove('starRatingGold');
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.add('starRatingGrey');
                                                }
                                            }

                                            var starText = document.getElementById('filterStarText_' + _id);
                                            switch (_star){
                                                case 1:
                                                    starText.innerText = 'اصلا راضی نبودم';
                                                    break;
                                                case 2:
                                                    starText.innerText = 'بد نبود';
                                                    break;
                                                case 3:
                                                    starText.innerText = 'معمولی بود';
                                                    break;
                                                case 4:
                                                    starText.innerText = 'خوب بود';
                                                    break;
                                                case 5:
                                                    starText.innerText = 'عالی بود';
                                                    break;

                                            }
                                        }

                                        function removeStar( _id){
                                            var star = 1;
                                            if(filterRateAns[_id] != null)
                                                star = filterRateAns[_id];

                                            for(i = 1; i < 6; i++){
                                                if(i <= star) {
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.remove('starRatingGrey');
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.add('starRatingGold');
                                                }
                                                else{
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.remove('starRatingGold');
                                                    document.getElementById('filterStar_' + i + '_' + _id).classList.add('starRatingGrey');
                                                }
                                            }

                                            var starText = document.getElementById('filterStarText_' + _id);
                                            switch (star){
                                                case 1:
                                                    starText.innerText = 'اصلا راضی نبودم';
                                                    break;
                                                case 2:
                                                    starText.innerText = 'بد نبود';
                                                    break;
                                                case 3:
                                                    starText.innerText = 'معمولی بود';
                                                    break;
                                                case 4:
                                                    starText.innerText = 'خوب بود';
                                                    break;
                                                case 5:
                                                    starText.innerText = 'عالی بود';
                                                    break;
                                            }
                                        }

                                        function selectFilterStar(_star, _id){
                                            filterRateAns[_id] = _star;
                                        }

                                        function chooseMutliFilter(_qId, _aId){

                                            if(filterMultiAns[_qId] != null)
                                                document.getElementById('ansMultiFilter_' + filterMultiAns[_qId]).classList.remove('filterChoosed');

                                            filterMultiAns[_qId] = _aId;
                                            document.getElementById('ansMultiFilter_' + _aId).classList.add('filterChoosed');

                                        }

                                        function removeFilter(_id){
                                            if(filterMultiAns[_id] != null)
                                                document.getElementById('ansMultiFilter_' + filterMultiAns[_id]).classList.remove('filterChoosed');

                                            filterMultiAns[_id] = null;
                                        }

                                        function doReviewFilter(){

                                        }
                                    </script>

                                    <div class="searchFilter filterTypeDiv">
                                    <span class="float-right line-height-205">
                                        جست و جو کنید
                                    </span>
                                        <div class="clear-both"></div>
                                        <center>
                                            <div class="inputBoxSearchFilter inputBox">
                                                <input class="inputBoxInput" type="text"
                                                       placeholder="عبارت مورد نظر خود را جست و جو کنید">
                                            </div>
                                        </center>
                                    </div>

                                </div>
                            </div>
                            <center class="col-xs-12 adsMainDiv">
                                <div class="adsMainDivHeader">تبلیغات</div>
                                <img src="{{"../../../public/images/Chromite.jpg"}}" alt="">
                            </center>
                        </div>
                        <div class="col-md-7 col-xs-12 pd-0 float-right postsMainDivInRegularMode">

                            <div id="showReviewsMain">

                            </div>

                            <div class="col-xs-12 postMainDivShown position-relative">
                                <div class="commentActions" onclick="showAnswersActionBox(this)">
                                    <span class="commentActionsIcon"></span>
                                </div>
                                <div class="questionsActionsMoreDetails display-none">
                                    <span>گزارش پست</span>
                                    <span>مشاهده صفحه شازده سینا</span>
                                    <span>مشاهده تمامی پست‌ها</span>
                                    <span>صفحه قوانین و مقررات</span>
                                </div>
                                <div class="commentWriterDetailsShow">
                                    <div class="circleBase type2 commentWriterPicShow"></div>
                                    <div class="commentWriterExperienceDetails">
                                        <b class="userProfileName">shazdesina</b>
                                        <div class="display-inline-block">در
                                            <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                        </div>
                                        <div>با
                                            <span class="commentWriterExperienceParticipation">احتشام الدوله توفیقی</span>،
                                            <span class="commentWriterExperienceParticipation">حمیدرضا عسگرزاده </span>و
                                            <span class="commentWriterExperienceParticipation">علی اصر همتی</span>
                                        </div>
                                        <div>
                                            هم اکنون - بیش از 23 ساعت پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="commentContentsShow">
                                    <p>
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از طریق اینترنت دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا خدمات مورد نیازشان اثرپذیری فراوانی دارد.
                                        با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع روستایی هستند، می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش
                                    </p>
                                </div>
                                <div class="commentPhotosShow">
                                    <div class="commentPhotosMainDiv quintupletPhotoDiv">
                                        <div class="photosCol secondCol col-xs-6">
                                            <div data-toggle="modal" data-target=".showingPhotosModal"></div>
                                            <div data-toggle="modal" data-target=".showingPhotosModal"></div>
                                        </div>
                                        <div class="photosCol firstCol col-xs-6">
                                            <div data-toggle="modal" data-target=".showingPhotosModal"></div>
                                            <div data-toggle="modal" data-target=".showingPhotosModal"></div>
                                            <div class="morePhotoLinkPosts" data-toggle="modal" data-target=".showingPhotosModal">
                                                به علاوه
                                                <span>14</span>
                                                عکس و ویدیو دیگر
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quantityOfLikes">
                                        <span>31</span>
                                        نفر دوست داشتند،
                                        <span>31</span>
                                        نفر دوست نداشتند و
                                        <span>31</span>
                                        نفر نظر دادند.
                                    </div>
                                </div>
                                <div class="commentRatingsDetailsShow">
                                    <div class="display-inline-block full-width">
                                        <div class="commentRatingHeader">
                                            بازدید با
                                            <span>دوستان</span>
                                            در فصل
                                            <span>بهار</span>
                                            و از مبدأ
                                            <span>تهران</span>
                                            انجام شده است
                                        </div>
                                        <div class="commentRatingsDetailsBtn" onclick="showRatingDetails(this)">مشاهده جزئیات امتیازدهی
                                            <div class="commentRatingsDetailsBtnIcon">
                                                <i class="glyphicon glyphicon-triangle-bottom"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="commentRatingsDetailsBox display-none">
                                        <div class="display-inline-block full-width">
                                            <b class="col-xs-4 font-size-15 line-height-203 float-right">امتیاز کلی به این مکان</b>
                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">
                                                <div class="ui_star_rating stars_10 font-size-25">
                                                    <span class="starRating"></span>
                                                    <span class="starRating"></span>
                                                    <span class="starRating"></span>
                                                    <span class="starRating"></span>
                                                    <span class="starRatingGreen"></span>
                                                </div>
                                            </div>
                                            <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">اصلاً راضی نبودم</b>
                                        </div>
                                        <div class="display-inline-block full-width">
                                            <b class="col-xs-4 font-size-15 line-height-203 float-right">امتیاز کلی به این مکان</b>
                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">
                                                <div class="ui_star_rating stars_20 font-size-25">
                                                    <span class="starRating"></span>
                                                    <span class="starRating"></span>
                                                    <span class="starRating"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                </div>
                                            </div>
                                            <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">بد نبود</b>
                                        </div>
                                        <div class="display-inline-block full-width">
                                            <b class="col-xs-4 font-size-15 line-height-203 float-right">امتیاز کلی به این مکان</b>
                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">
                                                <div class="ui_star_rating stars_30 font-size-25">
                                                    <span class="starRating"></span>
                                                    <span class="starRating"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                </div>
                                            </div>
                                            <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">معمولی بود</b>
                                        </div>
                                        <div class="display-inline-block full-width">
                                            <b class="col-xs-4 font-size-15 line-height-203 float-right">امتیاز کلی به این مکان</b>
                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">
                                                <div class="ui_star_rating stars_40 font-size-25">
                                                    <span class="starRating"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                </div>
                                            </div>
                                            <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">خوب بود</b>
                                        </div>
                                        <div class="display-inline-block full-width">
                                            <b class="col-xs-4 font-size-15 line-height-203 float-right float-right">امتیاز کلی به این مکان</b>
                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">
                                                <div class="ui_star_rating stars_50 font-size-25">
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                    <span class="starRatingGreen"></span>
                                                </div>
                                            </div>
                                            <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0 float-right">عالی بود</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="commentFeedbackChoices">
                                    <div class="postsActionsChoices col-xs-3">
                                        <div class="postLikeChoice display-inline-block" onclick="likePostsComment(this)">
                                            <span class="commentsLikeIconFeedback firstIcon"></span>
                                            <span class="commentsLikeClickedIconFeedback display-none secondIcon"></span>
                                            <span class="mg-rt-20 cursor-pointer">دوست داشتم</span>
                                        </div>
                                    </div>
                                    <div class="postsActionsChoices col-xs-3">
                                        <div class="postDislikeChoice display-inline-block" onclick="disLikePostsComment(this)">
                                            <span class="commentsDislikeIconFeedback firstIcon"></span>
                                            <span class="commentsDislikeClickedIconFeedback display-none secondIcon"></span>
                                            <span class="mg-rt-20 cursor-pointer">دوست نداشتم</span>
                                        </div>
                                    </div>
                                    <div class="postsActionsChoices col-xs-3">
                                        <div class="postCommentChoice display-inline-block" onclick="showPostsComments(this)">
                                            <span class="showCommentsIconFeedback firstIcon"></span>
                                            <span class="showCommentsClickedIconFeedback display-none secondIcon"></span>
                                            <span class="mg-rt-20 cursor-pointer">مشاهده نظرها</span>
                                        </div>
                                    </div>
                                    <div class="postsActionsChoices col-xs-3">
                                        <div class="postShareChoice display-inline-block" onclick="SharePostsBtn(this)">
                                            <span class="commentsShareIconFeedback firstIcon"></span>
                                            <span class="commentsShareClickedIconFeedback display-none secondIcon"></span>
                                            <span class="mg-rt-20 cursor-pointer">اشتراک‌گذاری</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="commentsMainBox display-none">
                                    <div class="dark-blue mg-bt-10">
                                        <span class="cursor-pointer">مشاهده 17 نظر باقیمانده</span>
                                    </div>
                                    <div class="eachCommentMainBox">
                                        <div class="circleBase type2 commentsWriterProfilePic"></div>
                                        <div class="commentsContentMainBox">
                                            <b class="userProfileName display-inline-block">shazdesina</b>
                                            <div>من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه مارا متهم کنید</div>
                                            <div class="commentsStatisticsBar">
                                                <div class="float-right display-inline-black">
                                                    <span class="likeStatisticIcon commentsStatisticSpan color-red">31</span>
                                                    <span class="dislikeStatisticIcon commentsStatisticSpan dark-red">31</span>
                                                    <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">31</span>
                                                </div>
                                                <div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers(this)">دیدن پاسخ‌ها</div>
                                            </div>
                                        </div>
                                        <div class="commentsActionsBtns">
                                            <div onclick="likeTheAnswers(this)">
                                                <span class="likeActionBtn"></span>
                                                <span class="likeActionClickedBtn display-none"></span>
                                            </div>
                                            <div onclick="dislikeTheAnswers(this)">
                                                <span class="dislikeActionBtn"></span>
                                                <span class="dislikeActionClickedBtn display-none"></span>
                                            </div>
                                            <div class="clear-both"></div>
                                            <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>
                                        </div>
                                        <div class="replyToCommentMainDiv display-none">
                                            <div class="circleBase type2 newCommentWriterProfilePic"></div>
                                            <div class="inputBox">
                                                <b class="replyCommentTitle">در پاسخ به نظر shazdesina</b>
                                                <textarea class="inputBoxInput inputBoxInputComment" type="text" placeholder="شما چه نظری دارید؟"></textarea>
                                                <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="eachCommentMainBox mg-rt-45 display-none">
                                        <div class="circleBase type2 commentsWriterProfilePic"></div>
                                        <div class="commentsContentMainBox">
                                            <b class="userProfileName float-right">shazdesina</b>
                                            <b class="commentReplyDesc display-inline-block">در پاسخ به Shazdesina</b>
                                            <div class="clear-both"></div>
                                            <div>من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه مارا متهم کنید</div>
                                            <div class="commentsStatisticsBar">
                                                <div class="float-right display-inline-black">
                                                    <span class="likeStatisticIcon commentsStatisticSpan color-red">31</span>
                                                    <span class="dislikeStatisticIcon commentsStatisticSpan dark-red">31</span>
                                                    <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">31</span>
                                                </div>
                                                <div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers(this)">دیدن پاسخ‌ها</div>
                                            </div>
                                        </div>
                                        <div class="commentsActionsBtns">
                                            <div onclick="likeTheAnswers(this)">
                                                <span class="likeActionBtn"></span>
                                                <span class="likeActionClickedBtn display-none"></span>
                                            </div>
                                            <div onclick="dislikeTheAnswers(this)">
                                                <span class="dislikeActionBtn"></span>
                                                <span class="dislikeActionClickedBtn display-none"></span>
                                            </div>
                                            <div class="clear-both"></div>
                                            <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>
                                        </div>
                                        <div class="replyToCommentMainDiv display-none">
                                            <div class="circleBase type2 newCommentWriterProfilePic"></div>
                                            <div class="inputBox">
                                                <b class="replyCommentTitle">در پاسخ به نظر shazdesina</b>
                                                <textarea class="inputBoxInput inputBoxInputComment" type="text" placeholder="شما چه نظری دارید؟"></textarea>
                                                <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="newCommentPlaceMainDiv">
                                    <div class="circleBase type2 newCommentWriterProfilePic"></div>
                                    <div class="inputBox">
                                        <b class="replyCommentTitle">در پاسخ به نظر shazdesina</b>
                                        <textarea class="inputBoxInput inputBoxInputComment" id="zzzz" type="text" placeholder="شما چه نظری دارید؟"></textarea>
                                        <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                    </div>
                                    <div></div>
                                </div>
                            </div>

                            <div class="col-xs-12 postsMainDivFooter position-relative">
                                <div class="col-xs-5 font-size-13 line-height-2">
                                    نمایش
                                    <span class="mg-lt-5 cursor-pointer">10</span>-
                                    <span class="mg-lt-5 cursor-pointer">20</span>-
                                    <span class="color-blue cursor-pointer">50</span>
                                    پست در هر صفحه
                                </div>
                                <a class="col-xs-3 showPostsNumsFilterLink" href="#taplc_global_nav_links_0">
                                    <div class="showPostsNumsFilter" onclick="allPostsGrid()">نمایش تمامی پست‌ها</div>
                                </a>
                                <div class="col-xs-4 font-size-13 line-height-2 text-align-right">
                                    صفحه
                                    <span>1</span>
                                    <span><<<</span>
                                    <span class="mg-lt-5 cursor-pointer">2</span>-
                                    <span class="color-blue mg-lt-5 cursor-pointer">3</span>-
                                    <span class="cursor-pointer">4</span>
                                    <span>>>></span>
                                    <span>10</span>
                                </div>
                            </div>

                        </div>

                        @include('layouts.placePosts')

                    </div>
                </div>

                <script>
                    if($(window).width() < 630) {
                        $('.tabLinkMainWrapMainDivMobile').affix({offset: {top: 930}});
                    }
                </script>

                <div class="clear-both"></div>

                @include('layouts.placeQuestions')
                <div id="QAndAMainDivId" class="tabContentMainWrap">
                    <div class="col-md-12 col-xs-12 QAndAMainDiv">

                        <div class="mainDivQuestions">

                            <div class="QAndAMainDivHeader">
                                <h3>سؤال و جواب</h3>
                            </div>
                            <div class="askQuestionMainDiv">
                                <div class="newQuestionContainer">
                                    <b class="direction-rtl text-align-right float-right full-width mg-bt-10">
                                        سؤلات خود را بپرسید تا با کمک دوستانتان آگاهانه‌تر سفر کنید. همچنین می‌توانید با
                                        پاسخ یه سؤالات دوستانتان علاوه بر دریافت امتیاز، اطلاعات خود را به اشتراک
                                        بگذارید.
                                    </b>
                                    <div class="display-inline-block float-right direction-rtl mg-lt-5">
                                        در حال حاضر
                                        <span class="color-blue">1340</span>
                                        سؤال
                                        <span class="color-blue">560</span>
                                        پاسخ موجود می‌باشد.
                                    </div>
                                    <a class="seeAllQMainLink" href="#taplc_global_nav_links_0">
                                        <div class="seeAllQLink display-inline-block float-right direction-rtl dark-blue"
                                             onclick="allQuestionsGrid()">مشاهده همه سؤالات و پاسخ‌ها
                                        </div>
                                    </a>
                                    <div class="clear-both"></div>
                                    <div class="newQuestionMainDiv mg-tp-30 full-width display-inline-block">
                                        <div class="circleBase type2 newQuestionWriterProfilePic"></div>
                                        <div class="questionInputBoxMainDiv">
                                            <div class="inputBox questionInputBox">
                                                <textarea class="inputBoxInput inputBoxInputComment" type="text" placeholder="شما چه سؤالی دارید؟"></textarea>
                                                <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                            </div>
                                            <div class="sendQuestionBtn">ارسال</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="answersBoxMainDiv">
                                    <div class="answersActions" onclick="showAnswersActionBox(this)">
                                        <span class="answersActionsIcon"></span>
                                    </div>
                                    <div class="questionsActionsMoreDetails display-none">
                                        <span>گزارش پست</span>
                                        <span>مشاهده صفحه شازده سینا</span>
                                        <span>مشاهده تمامی پست‌ها</span>
                                        <span>صفحه قوانین و مقررات</span>
                                    </div>
                                    <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">
                                        مشاهده شؤال
                                    </div>
                                    <div class="answersWriterDetailsShow">
                                        <div class="circleBase type2 answersWriterPicShow"></div>
                                        <div class="answersWriterExperienceDetails">
                                            <b class="userProfileNameAnswers">shazdesina</b>
                                            <div class="display-inline-block">در
                                                <span class="answersWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                            </div>
                                            <div>
                                                هم اکنون - بیش از 23 ساعت پیش
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear-both"></div>
                                    <div class="questionContentMainBox">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها
                                        برای انتخاب کالا یا خدمات مورد نیازشان اثرپذیری فراوانی دارد.
                                        با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع
                                        روستایی هستند، می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی
                                        نقش کلیدی داشته باشد.
                                    </div>
                                    <div class="clear-both"></div>
                                    <div class="questionSubMenuBar">
                                        <div class="numberOfAnswers">
                                            <span>31</span>
                                            نفر پاسخ دادند
                                        </div>
                                        <div class="showAnswersToggle" onclick="showAllAnswers(this)">دیدن پاسخ‌ها</div>
                                        <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>
                                    </div>
                                    <div class="answerPlaceMainDiv display-none">
                                        <div class="circleBase type2 answerWriterProfilePic"></div>
                                        <div class="answerBoxText">
                                            <b class="replyWriterUsername">shazdesina</b>
                                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را متهم کنید.
                                            <div class="answerStatistics">
                                                <span class="numberOfDislikeAnswer">31</span>
                                                <span class="numberOfLikeAnswer">31</span>
                                            </div>
                                        </div>
                                        <div class="actionToAnswer">
                                            <div class="display-inline-block float-right" onclick="likeTheAnswers(this)">
                                                <span class="likeAnswer"></span>
                                                <span class="likeAnswerClicked display-none"></span>
                                            </div>
                                            <div class="display-inline-block float-right" onclick="dislikeTheAnswers(this)">
                                                <span class="dislikeAnswer"></span>
                                                <span class="dislikeAnswerClicked display-none"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="display-none">
                                        <div class="newAnswerPlaceMainDiv">
                                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                            <div class="inputBox">
                                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                          placeholder="شما چه نظری دارید؟"></textarea>
                                                <img class="commentSmileyIcon"
                                                     src="{{"../../../public/images/smile.png"}}">
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="display-none last">
                                        <div class="newAnswerPlaceMainDiv">
                                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                            <div class="inputBox">
                                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                          placeholder="شما چه نظری دارید؟"></textarea>
                                                <img class="commentSmileyIcon"
                                                     src="{{"../../../public/images/smile.png"}}">
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="answersBoxMainDiv">
                                    <div class="answersActions" onclick="showAnswersActionBox(this)">
                                        <span class="answersActionsIcon"></span>
                                    </div>
                                    <div class="questionsActionsMoreDetails display-none">
                                        <span>گزارش پست</span>
                                        <span>مشاهده صفحه شازده سینا</span>
                                        <span>مشاهده تمامی پست‌ها</span>
                                        <span>صفحه قوانین و مقررات</span>
                                    </div>
                                    <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">
                                        مشاهده شؤال
                                    </div>
                                    <div class="answersWriterDetailsShow">
                                        <div class="circleBase type2 answersWriterPicShow"></div>
                                        <div class="answersWriterExperienceDetails">
                                            <b class="userProfileNameAnswers">shazdesina</b>
                                            <div class="display-inline-block">در
                                                <span class="answersWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                            </div>
                                            <div>
                                                هم اکنون - بیش از 23 ساعت پیش
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear-both"></div>
                                    <div class="questionContentMainBox">
                                        بسیار از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها
                                        برای انتخاب کالا یا خدمات مورد نیازشان اثرپذیری فراوانی دارد.
                                        با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع
                                        روستایی هستند، می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی
                                        نقش کلیدی داشته باشد.
                                    </div>
                                    <div class="clear-both"></div>
                                    <div class="questionSubMenuBar">
                                        <div class="numberOfAnswers">
                                            <span>31</span>
                                            نفر پاسخ دادند
                                        </div>
                                        <div class="showAnswersToggle" onclick="showAllAnswers(this)">دیدن پاسخ‌ها</div>
                                        <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>
                                    </div>
                                    <div class="answerPlaceMainDiv display-none">
                                        <div class="circleBase type2 answerWriterProfilePic"></div>
                                        <div class="answerBoxText">
                                            <b class="replyWriterUsername">shazdesina</b>
                                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را متهم کنید.
                                            <div class="answerStatistics">
                                                <span class="numberOfDislikeAnswer">31</span>
                                                <span class="numberOfLikeAnswer">31</span>
                                            </div>
                                        </div>
                                        <div class="actionToAnswer">
                                            <div class="display-inline-block float-right" onclick="likeTheAnswers(this)">
                                                <span class="likeAnswer"></span>
                                                <span class="likeAnswerClicked display-none"></span>
                                            </div>
                                            <div class="display-inline-block float-right" onclick="dislikeTheAnswers(this)">
                                                <span class="dislikeAnswer"></span>
                                                <span class="dislikeAnswerClicked display-none"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="display-none">
                                        <div class="newAnswerPlaceMainDiv">
                                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                            <div class="inputBox">
                                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                          placeholder="شما چه نظری دارید؟"></textarea>
                                                <img class="commentSmileyIcon"
                                                     src="{{"../../../public/images/smile.png"}}">
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="display-none last">
                                        <div class="newAnswerPlaceMainDiv">
                                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                            <div class="inputBox">
                                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                          placeholder="شما چه نظری دارید؟"></textarea>
                                                <img class="commentSmileyIcon"
                                                     src="{{"../../../public/images/smile.png"}}">
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="otherQAndAMainDiv col-md-8 col-xs-12">
                        <div class="otherQAndAMainDivHeader">
                            <h3>سایر سؤال‌ها و جواب‌ها</h3>
                        </div>
                        <div class="answersBoxMainDiv">
                            <div class="answersActions" onclick="showAnswersActionBox(this)">
                                <span class="answersActionsIcon"></span>
                            </div>
                            <div class="questionsActionsMoreDetails display-none">
                                <span>گزارش پست</span>
                                <span>مشاهده صفحه شازده سینا</span>
                                <span>مشاهده تمامی پست‌ها</span>
                                <span>صفحه قوانین و مقررات</span>
                            </div>
                            <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">
                                مشاهده شؤال
                            </div>
                            <div class="answersWriterDetailsShow">
                                <div class="circleBase type2 answersWriterPicShow"></div>
                                <div class="answersWriterExperienceDetails">
                                    <b class="userProfileNameAnswers">shazdesina</b>
                                    <div class="display-inline-block">در
                                        <span class="answersWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                    </div>
                                    <div>
                                        هم اکنون - بیش از 23 ساعت پیش
                                    </div>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                            <div class="questionContentMainBox">
                                بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از طریق
                                اینترنت دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب
                                کالا یا خدمات مورد نیازشان اثرپذیری فراوانی دارد.
                                با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع روستایی
                                هستند، می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش کلیدی داشته
                                باشد.
                            </div>
                            <div class="clear-both"></div>
                            <div class="questionSubMenuBar">
                                <div class="numberOfAnswers">
                                    <span>31</span>
                                    نفر پاسخ دادند
                                </div>
                                <div class="showAnswersToggle" onclick="showAllAnswers(this)">دیدن پاسخ‌ها</div>
                                <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>
                            </div>
                            <div class="answerPlaceMainDiv display-none">
                                <div class="circleBase type2 answerWriterProfilePic"></div>
                                <div class="answerBoxText">
                                    <b class="replyWriterUsername">shazdesina</b>
                                    من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را متهم کنید.
                                    <div class="answerStatistics">
                                        <span class="numberOfDislikeAnswer">31</span>
                                        <span class="numberOfLikeAnswer">31</span>
                                    </div>
                                </div>
                                <div class="actionToAnswer">
                                    <div class="display-inline-block float-right" onclick="likeTheAnswers(this)">
                                        <span class="likeAnswer"></span>
                                        <span class="likeAnswerClicked display-none"></span>
                                    </div>
                                    <div class="display-inline-block float-right" onclick="dislikeTheAnswers(this)">
                                        <span class="dislikeAnswer"></span>
                                        <span class="dislikeAnswerClicked display-none"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="display-none">
                                <div class="newAnswerPlaceMainDiv">
                                    <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                    <div class="inputBox">
                                        <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                        <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                  placeholder="شما چه نظری دارید؟"></textarea>
                                        <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="display-none last">
                                <div class="newAnswerPlaceMainDiv">
                                    <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                    <div class="inputBox">
                                        <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                        <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                  placeholder="شما چه نظری دارید؟"></textarea>
                                        <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 questionsMainDivFooter position-relative">
                        <div class="col-xs-5 font-size-13 line-height-2">
                            نمایش
                            <span class="mg-lt-5 cursor-pointer">10</span>-
                            <span class="mg-lt-5 cursor-pointer">20</span>-
                            <span class="color-blue cursor-pointer">50</span>
                            پست در هر صفحه
                        </div>
                        <a class="col-xs-3 showQuestionsNumsFilterLink" href="#taplc_global_nav_links_0">
                            <div class="showQuestionsNumsFilter" onclick="allQuestionsGrid()">نمایش تمامی سؤال‌ها</div>
                        </a>
                        <div class="col-xs-4 font-size-13 line-height-2 text-align-right float-right">
                            صفحه
                            <span>1</span>
                            <span><<<</span>
                            <span class="mg-lt-5 cursor-pointer">2</span>-
                            <span class="color-blue mg-lt-5 cursor-pointer">3</span>-
                            <span class="cursor-pointer">4</span>
                            <span>>>></span>
                            <span>10</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="similarLocationsMainDiv" class="mainSuggestion swiper-container tabContentMainWrap">
                <div class="shelf_header">
                    <div class="shelf_title">
                        <span class="shelf_header_icon ui_icon travelers-choice-badge"></span>
                        <div class="shelf_title_container h3">
                            <h3>مکان‌های مشابه</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">
                            <div class="poi">
                                <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                   class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}"
                                                     alt="هتل عباسی" class="image"
                                                     src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="detail rtl">
                                    <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                       class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                    <div class="item rating-widget">
                                        <div class="prw_rup prw_common_location_rating_simple">
                                            <span class="ui_bubble_rating bubble_50"></span>
                                        </div>
                                        <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                    </div>
                                    <div class="item tags ng-binding">اصفهان <span>در </span>
                                        <span class="ng-binding">اصفهان</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">
                            <div class="poi">
                                <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                   class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}"
                                                     alt="هتل عباسی" class="image"
                                                     src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="detail rtl">
                                    <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                       class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                    <div class="item rating-widget">
                                        <div class="prw_rup prw_common_location_rating_simple">
                                            <span class="ui_bubble_rating bubble_50"></span>
                                        </div>
                                        <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                    </div>
                                    <div class="item tags ng-binding">اصفهان <span>در </span>
                                        <span class="ng-binding">اصفهان</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">
                            <div class="poi">
                                <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                   class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}"
                                                     alt="هتل عباسی" class="image"
                                                     src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="detail rtl">
                                    <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                       class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                    <div class="item rating-widget">
                                        <div class="prw_rup prw_common_location_rating_simple">
                                            <span class="ui_bubble_rating bubble_50"></span>
                                        </div>
                                        <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                    </div>
                                    <div class="item tags ng-binding">اصفهان <span>در </span>
                                        <span class="ng-binding">اصفهان</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">
                            <div class="poi">
                                <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                   class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}"
                                                     alt="هتل عباسی" class="image"
                                                     src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="detail rtl">
                                    <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                       class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                    <div class="item rating-widget">
                                        <div class="prw_rup prw_common_location_rating_simple">
                                            <span class="ui_bubble_rating bubble_50"></span>
                                        </div>
                                        <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                    </div>
                                    <div class="item tags ng-binding">اصفهان <span>در </span>
                                        <span class="ng-binding">اصفهان</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">
                            <div class="poi">
                                <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                   class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}"
                                                     alt="هتل عباسی" class="image"
                                                     src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="detail rtl">
                                    <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                       class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                    <div class="item rating-widget">
                                        <div class="prw_rup prw_common_location_rating_simple">
                                            <span class="ui_bubble_rating bubble_50"></span>
                                        </div>
                                        <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                    </div>
                                    <div class="item tags ng-binding">اصفهان <span>در </span>
                                        <span class="ng-binding">اصفهان</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column ng-scope">
                            <div class="poi">
                                <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                   class="thumbnail">
                                    <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                        <div class="prv_thumb has_image">
                                            <div class="image_wrapper landscape landscapeWide">
                                                <img src="{{URL::asset('_images/hotels/hotel_abbasi/f-1.jpg')}}"
                                                     alt="هتل عباسی" class="image"
                                                     src="http://localhost:8080/assets/_images/hotels/hotel_abbasi/f-1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="detail rtl">
                                    <a href="http://localhost:8080/shazde/public/hotel-details/1/%D9%87%D8%AA%D9%84%20%D8%B9%D8%A8%D8%A7%D8%B3%DB%8C"
                                       class="item poi_name ui_link ng-binding">هتل عباسی</a>
                                    <div class="item rating-widget">
                                        <div class="prw_rup prw_common_location_rating_simple">
                                            <span class="ui_bubble_rating bubble_50"></span>
                                        </div>
                                        <span class="reviewCount ng-binding">1 </span><span>نقد </span>
                                    </div>
                                    <div class="item tags ng-binding">اصفهان <span>در </span>
                                        <span class="ng-binding">اصفهان</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <script>
        function initSwiper() {
            var swiper = new Swiper('.mainSuggestion', {

                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
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

        initSwiper();
    </script>

    <script>

        function hideMobileTabLink() {
            $('.tabLinkMainWrapMainDivMobile').hide()
        }

        function showMobileTabLink() {
            $('.tabLinkMainWrapMainDivMobile').show()
        }

        function newPostModal() {
            if (!hasLogin) {
                showLoginPrompt(hotelDetailsInSaveToTripMode);
                return;
            }

            $("#darkModal").show() ,
                $(".postModalMainDiv").removeClass('hidden')
        }

        function closeNewPostModal() {
            $('#darkModal').hide() ,
                $(".postModalMainDiv").addClass('hidden')
        }

        function editPhotosNewPost() {
            $('#editPane').removeClass('hidden')
        }

        function showAllAnswers(element) {
            $(element).parent().nextAll().not('div.last').toggle()
        }

        function replyToAnswers(element) {
            $(element).parent().siblings("div.last").toggle();
            $(element).parent().siblings('div.last').children().toggleClass('mg-tp-0')
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
        //
        // function allPostsGrid() {
        //     $('#targetHelp_10').toggle(),
        //     $('#bestPriceInnerDiv').toggleClass('min-height-170Imp'),
        //     $('.greyBackground').toggleClass('height-210Imp'),
        //     $('.postModalMainDiv').toggleClass('top--30Imp'),
        //     $('#addToFavouriteTripsMainDiv').toggle(),
        //     // $('#helpBtnMainDiv').toggleClass('top-20Imp'),
        //     $('.returnToMainPage').toggleClass('color-white'),
        //     $('.returnToMainPage').toggle(),
        //     $('.postsMainDivInRegularMode').toggle(),
        //     $('.postsMainDivInSpecificMode').toggle(),
        //     $('.hr_btf_wrap').toggle(),
        //     $('#nearbyDiv').toggle(),
        //     $('.QAndAMainDiv').toggle(),
        //     $('.questionsMainDivFooter').toggle(),
        //     $('.postsFiltrationBarToggle').toggle();
        //     $('.tabLinkMainWrapMainDiv').toggle();
        //     $('#similarLocationsMainDiv').toggle();
        // }
        //
        // function allQuestionsGrid() {
        //     $('.atf_meta_and_photos_wrapper').toggle(),
        //     $('.exceptQAndADiv').toggle(),
        //     $('.adsToggleQuestions1').toggle() ,
        //     $('.questionsFiltrationBarToggle').toggle() ,
        //     $('.questionsFiltrationBarToggle').toggleClass('pd-0') ,
        //     $('.questionsMainDivFooter').toggle() ,
        //     $('.QAndAMainDiv').toggleClass('col-md-12'),
        //     $('.QAndAMainDiv').toggleClass('float-right'),
        //     $('.QAndAMainDiv').toggleClass('col-md-8'),
        //     $('.adsMainDiv').toggleClass('mg-tp-0'),
        //     $('#addToFavouriteTripsMainDiv').toggle(),
        //     // $('#helpBtnMainDiv').toggleClass('top-20Imp'),
        //     $('.questionInputBox').toggleClass('width-80per'),
        //     $('.showingQuestionCompletely').toggle();
        //     $('.tabLinkMainWrapMainDiv').toggle();
        //     $('#similarLocationsMainDiv').toggle();
        //
        //     $('.seeAllQLink').text($('.seeAllQLink').text() == 'مشاهده همه سؤالات و پاسخ‌ها' ? 'بازگشت به صفحه‌ی اصلی' : 'مشاهده همه سؤالات و پاسخ‌ها');
        // }

        // function showSpecificQuestion(element) {
        //     $('.atf_meta_and_photos_wrapper').toggle(),
        //     $('.exceptQAndADiv').toggle(),
        //     $('.adsToggleQuestions2').toggle(),
        //     $('.adsMainDiv').toggleClass('mg-tp-0'),
        //     $('.questionsFiltrationBarToggle').toggle(),
        //     $('.questionsFiltrationBarToggle').toggleClass('pd-0'),
        //     $('.QAndAMainDiv').toggleClass('col-md-12'),
        //     $('.QAndAMainDiv').toggleClass('float-right'),
        //     $('.QAndAMainDiv').toggleClass('col-md-8'),
        //     $('.QAndAMainDivHeader').toggle(),
        //     $('.questionsMainDivFooter').toggle() ,
        //     // $('.newQuestionContainer').toggle(),
        //     $('.showingQuestionCompletely').toggle(),
        //     $('.otherQAndAMainDiv').toggle(),
        //     $(element).parent().siblings().toggle();
        //     $(element).toggle();
        //     $('.tabLinkMainWrapMainDiv').toggle();
        //     $('#similarLocationsMainDiv').toggle();
        //
        //     $(element).text($(element).text() == 'بازگشت به صفحه‌ی اصلی' ? 'مشاهده شؤال' : 'بازگشت به صفحه‌ی اصلی');
        // }

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

        function showCommentsAnswers(element) {
            $(element).parent().parent().parent().siblings("div.eachCommentMainBox").toggleClass("display-inline-blockImp"),
            $(element).text($(element).text() == 'دیدن پاسخ‌ها' ? 'بستن پاسخ‌ها' : 'دیدن پاسخ‌ها');
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
        })

    </script>

    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

    <script>
        autosize(document.getElementsByClassName("inputBoxInputComment"));
        autosize(document.getElementsByClassName("inputBoxInputAnswer"));
    </script>


    @if(isset($video) && $video != null)
        <!-- The Modal -->
        {{--vr--}}
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body" style="justify-content: center; display: flex;">
                        <video id="my-video" class="video-js vjs-default-skin" controls style=" max-height: 80vh;">
                            <source src="{{URL::asset('vr2/contents/' . $video)}}" type="video/mp4">
                        </video>
                        {{--                            ویدیویی برای نمایش موجود--}}
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

    @include('hotelDetailsPopUp')
    {{--    @include('editor')--}}
    <script>
        var hasLogin = '{{$hasLogin}}';
        var userCode = '{{$userCode}}';
        var userPic = '{{$userPic}}';
        var userPhotos = {!! $userPhotosJson !!};

        var ansToReviewUrl = '{{route('ansReview')}}';
        var likeReviewUrl = '{{route('likeReview')}}';
        var getReviewsUrl = '{{route('getReviews')}}';
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
        var hotelDetailsInBookMarkMode;
        var hotelDetailsInAskQuestionMode;
        var hotelDetailsInAnsMode;
        var hotelDetailsInSaveToTripMode;
        var getQuestions = '{{route('getQuestions')}}';
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
        var rateQuestion = {!! $rateQuestionJSON !!} ;
        var rateQuestionAns = [];
        var allReviews;
        for (i = 0; i < rateQuestion.length; i++)
            rateQuestionAns[i] = 2;

        if (placeMode == "hotel") {
            hotelDetails = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
            hotelDetailsInBookMarkMode = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'bookMark'])}}';
            hotelDetailsInAskQuestionMode = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'question'])}}';
            hotelDetailsInAnsMode = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'ans'])}}';
            hotelDetailsInSaveToTripMode = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'saveToTrip'])}}';
        }
        else if (placeMode == "restaurant") {
            hotelDetails = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
            hotelDetailsInBookMarkMode = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'bookMark'])}}';
            hotelDetailsInAskQuestionMode = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'question'])}}';
            hotelDetailsInAnsMode = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'ans'])}}';
            hotelDetailsInSaveToTripMode = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'saveToTrip'])}}';
        }
        else if (placeMode == "amaken") {
            hotelDetails = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
            hotelDetailsInBookMarkMode = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'bookMark'])}}';
            hotelDetailsInAskQuestionMode = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'question'])}}';
            hotelDetailsInAnsMode = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'ans'])}}';
            hotelDetailsInSaveToTripMode = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'saveToTrip'])}}';
        }
        else {
            hotelDetails = '{{route('majaraDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
            hotelDetailsInBookMarkMode = '{{route('majaraDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'bookMark'])}}';
            hotelDetailsInAskQuestionMode = '{{route('majaraDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'question'])}}';
            hotelDetailsInAnsMode = '{{route('majaraDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'ans'])}}';
            hotelDetailsInSaveToTripMode = '{{route('majaraDetails', ['placeId' => $place->id, 'placeName' => $place->name, 'mode' => 'saveToTrip'])}}';
        }
    </script>

    <script src="{{URL::asset('js/hotelDetails/hoteldetails_1.js')}}"></script>


    <script>
        var hotelMap = [];
        var amakenMap = [];
        var restMap = [];
        var majaraMap = [];
        var newHotelMap = [];
        var newRestMap = [];
        var newAmakenMap = [];
        var newMajaraMap = [];
        var isHotelOn = 1;
        var isRestaurantOn = [1, 1];
        var isAmakenOn = [1, 1, 1, 1, 1, 1];
        var map1;
        var markersHotel = [];
        var markersRest = [];
        var markersFast = [];
        var markersMus = [];
        var markersPla = [];
        var markersShc = [];
        var markersFun = [];
        var markersAdv = [];
        var markersNat = [];
        var iconBase = '{{URL::asset('images') . '/'}}';
        var icons = {
            hotel: iconBase + 'mhotel.png',
            pla: iconBase + 'matr_pla.png',
            mus: iconBase + 'matr_mus.png',
            shc: iconBase + 'matr_shc.png',
            nat: iconBase + 'matr_nat.png',
            fun: iconBase + 'matr_fun.png',
            adv: iconBase + 'matr_adv.png',
            vil: iconBase + 'matr_vil',
            fastfood: iconBase + 'mfast.png',
            rest: iconBase + 'mrest.png'
        };
        var kindIcon;
        var isMapAchieved = false;
        var newBounds = [];
        var newBound;
        var numOfNewHotel = 0;
        var numOfNewAmaken = 0;
        var numOfNewRest = 0;
        var numOfNewMajara = 0;
        var availableHotelIdMarker = [];
        var availableRestIdMarker = [];
        var availableAmakenlIdMarker = [];
        var availableMajaraIdMarker = [];
        var num = 0;
        var isItemClicked = false;

        function showExtendedMap() {
            if (!isMapAchieved) {
                $('.dark').show();
                showElement('mapState');//mapState
                isMapAchieved = true;
                init2();
            }
            else {
                $("#mapState").removeClass('hidden');
            }
        }

        function init2() {
            var mapOptions = {
                zoom: 18,
                center: new google.maps.LatLng(x, y),
                styles: [{
                    "featureType": "landscape",
                    "stylers": [{"hue": "#FFA800"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                }, {
                    "featureType": "road.highway",
                    "stylers": [{"hue": "#53FF00"}, {"saturation": -73}, {"lightness": 40}, {"gamma": 1}]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [{"hue": "#FBFF00"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                }, {
                    "featureType": "road.local",
                    "stylers": [{"hue": "#00FFFD"}, {"saturation": 0}, {"lightness": 30}, {"gamma": 1}]
                }, {
                    "featureType": "water",
                    "stylers": [{"hue": "#00BFFF"}, {"saturation": 6}, {"lightness": 8}, {"gamma": 1}]
                }, {
                    "featureType": "poi",
                    "stylers": [{"hue": "#679714"}, {"saturation": 33.4}, {"lightness": -25.4}, {"gamma": 1}]
                }
                ]
            };
            var mapElementSmall = document.getElementById('mapState1');
            map1 = new google.maps.Map(mapElementSmall, mapOptions);
            google.maps.event.addListenerOnce(map1, 'idle', function () {
                newBound = map1.getBounds();
                newBounds[0] = newBound.getNorthEast().lat();
                newBounds[1] = newBound.getNorthEast().lng();
                newBounds[2] = newBound.getSouthWest().lat();
                newBounds[3] = newBound.getSouthWest().lng();
                addNewPlace(newBounds);
                zoomChangeOrCenterChange();
            });
        }

        function toggleHotelsInExtendedMap(value) {
            if (isHotelOn == value) {
                document.getElementById('hotelImg').src = "{{URL::asset('images') . '/'}}mhoteloff.png";
                isHotelOn = 0;
                mySetMap(isHotelOn, markersHotel);
            }
            else {
                document.getElementById('hotelImg').src = "{{URL::asset('images') . '/'}}mhotel.png";
                isHotelOn = 1;
                mySetMap(isHotelOn, markersHotel);
            }
        }

        function toggleRestaurantsInExtendedMap(value) {
            if (isRestaurantOn[0] == value) {
                document.getElementById('restImg').src = "{{URL::asset('images') . '/'}}mrestoff.png";
                isRestaurantOn[0] = 0;
                mySetMap(isRestaurantOn[0], markersRest);
            }
            else {
                document.getElementById('restImg').src = "{{URL::asset('images') . '/'}}mrest.png";
                isRestaurantOn[0] = 1;
                mySetMap(isRestaurantOn[0], markersRest);
            }
        }

        function toggleFastFoodsInExtendedMap(value) {
            if (isRestaurantOn[1] == value) {
                document.getElementById('fastImg').src = "{{URL::asset('images') . '/'}}mfastoff.png";
                isRestaurantOn[1] = 0;
                mySetMap(isRestaurantOn[1], markersFast);
            }
            else {
                document.getElementById('fastImg').src = "{{URL::asset('images') . '/'}}mfast.png";
                isRestaurantOn[1] = 1;
                mySetMap(isRestaurantOn[1], markersFast);
            }
        }

        function toggleMuseumsInExtendedMap(value) {
            if (isAmakenOn[0] == value) {
                document.getElementById('musImg').src = "{{URL::asset('images') . '/'}}matr_musoff.png";
                isAmakenOn[0] = 0;
                mySetMap(isAmakenOn[0], markersMus);
            }
            else {
                document.getElementById('musImg').src = "{{URL::asset('images') . '/'}}matr_mus.png";
                isAmakenOn[0] = 1;
                mySetMap(isAmakenOn[0], markersMus);
            }
        }

        function toggleHistoricalInExtendedMap(value) {
            if (isAmakenOn[1] == value) {
                document.getElementById('plaImg').src = "{{URL::asset('images') . '/'}}matr_plaoff.png";
                isAmakenOn[1] = 0;
                mySetMap(isAmakenOn[1], markersPla);
            }
            else {
                document.getElementById('plaImg').src = "{{URL::asset('images') . '/'}}matr_pla.png";
                isAmakenOn[1] = 1;
                mySetMap(isAmakenOn[1], markersPla);
            }
        }

        function toggleShopCenterInExtendedMap(value) {
            if (isAmakenOn[2] == value) {
                document.getElementById('shcImg').src = "{{URL::asset('images') . '/'}}matr_shcoff.png";
                isAmakenOn[2] = 0;
                mySetMap(isAmakenOn[2], markersShc);
            }
            else {
                document.getElementById('shcImg').src = "{{URL::asset('images') . '/'}}matr_shc.png";
                isAmakenOn[2] = 1;
                mySetMap(isAmakenOn[2], markersShc);
            }
        }

        function toggleFunCenterInExtendedMap(value) {
            if (isAmakenOn[3] == value) {
                document.getElementById('funImg').src = "{{URL::asset('images') . '/'}}matr_funoff.png";
                isAmakenOn[3] = 0;
                mySetMap(isAmakenOn[3], markersFun);
            }
            else {
                document.getElementById('funImg').src = "{{URL::asset('images') . '/'}}matr_fun.png";
                isAmakenOn[3] = 1;
                mySetMap(isAmakenOn[3], markersFun);
            }
        }

        function toggleMajaraCenterInExtendedMap(value) {
            if (isAmakenOn[5] == value) {
                document.getElementById('advImg').src = "{{URL::asset('images') . '/'}}matr_advoff.png";
                isAmakenOn[5] = 0;
                mySetMap(isAmakenOn[5], markersAdv);
            }
            else {
                document.getElementById('advImg').src = "{{URL::asset('images') . '/'}}matr_adv.png";
                isAmakenOn[5] = 1;
                mySetMap(isAmakenOn[5], markersAdv);
            }
        }

        function toggleNaturalsInExtendedMap(value) {
            if (isAmakenOn[4] == value) {
                document.getElementById('natImg').src = "{{URL::asset('images') . '/'}}matr_natoff.png";
                isAmakenOn[4] = 0;
                mySetMap(isAmakenOn[4], markersNat);
            }
            else {
                document.getElementById('natImg').src = "{{URL::asset('images') . '/'}}matr_nat.png";
                isAmakenOn[4] = 1;
                mySetMap(isAmakenOn[4], markersNat);
            }
        }

        function addMarker() {
            var marker;
            for (i = numOfNewHotel; i < hotelMap.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(hotelMap[i].C, hotelMap[i].D),
                    map: map1,
                    title: hotelMap[i].name,
                    icon: {
                        url: icons.hotel,
                        scaledSize: new google.maps.Size(35, 35)
                    }
                });
                var hotelDetail = {
                    url: '{{route('home') . '/hotel-details/'}}',
                    name: hotelMap[i].name
                };
                hotelDetail.url = hotelDetail.url + hotelMap[i].id + '/' + hotelMap[i].name;
                markersHotel[i] = marker;
                hotelMap[i].kind = 4;
                hotelMap[i].url = hotelDetail.url;
                hotelMap[i].first = true;
                hotelMap[i].pic = "{{URL::asset('images/loading.svg')}}";
                availableHotelIdMarker[i] = hotelMap[i].id;
                numOfNewHotel = hotelMap.length;
                clickable(markersHotel[i], hotelMap[i]);
            }
            for (i = numOfNewRest; i < restMap.length; i++) {
                if (restMap[i].kind_id == 1)
                    kindIcon = icons.rest;
                else
                    kindIcon = icons.fastfood;
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(restMap[i].C, restMap[i].D),
                    map: map1,
                    title: restMap[i].name,
                    icon: {
                        url: kindIcon,
                        scaledSize: new google.maps.Size(35, 35)
                    }
                });
                var restDetail = {
                    url: '{{route('home') . '/restaurant-details/'}}',
                    name: restMap[i].name
                };
                restDetail.url = restDetail.url + restMap[i].id + '/' + restMap[i].name;
                restMap[i].kind = 3;
                restMap[i].url = restDetail.url;
                restMap[i].first = true;
                restMap[i].pic = "{{URL::asset('images/loading.svg')}}";
                numOfNewRest = restMap.length;
                availableRestIdMarker[i] = restMap[i].id;
                clickable(marker, restMap[i]);
                if (restMap[i].kind_id == 1) {
                    markersRest[markersRest.length] = marker;
                }
                else {
                    markersFast[markersFast.length] = marker;
                }
            }
            for (i = numOfNewAmaken; i < amakenMap.length; i++) {
                if (amakenMap[i].mooze == 1)
                    kindIcon = icons.mus;
                else if (amakenMap[i].tarikhi == 1)
                    kindIcon = icons.pla;
                else if (amakenMap[i].tabiatgardi == 1)
                    kindIcon = icons.nat;
                else if (amakenMap[i].tafrihi == 1)
                    kindIcon = icons.fun;
                else if (amakenMap[i].markazkharid == 1)
                    kindIcon = icons.shc;
                else
                    kindIcon = icons.pla;
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(amakenMap[i].C, amakenMap[i].D),
                    map: map1,
                    title: amakenMap[i].name,
                    icon: {
                        url: kindIcon,
                        scaledSize: new google.maps.Size(35, 35)
                    }
                });
                var amakenDetail = {
                    url: '{{route('home') . '/amaken-details/'}}',
                    name: amakenMap[i].name
                };
                amakenDetail.url = amakenDetail.url + amakenMap[i].id + '/' + amakenMap[i].name;
                amakenMap[i].kind = 1;
                amakenMap[i].url = amakenDetail.url;
                amakenMap[i].first = true;
                numOfNewAmaken = amakenMap.length;
                availableAmakenlIdMarker[i] = amakenMap[i].id;
                amakenMap[i].pic = "{{URL::asset('images/loading.svg')}}";
                clickable(marker, amakenMap[i]);
                if (amakenMap[i].mooze == 1)
                    markersMus[markersMus.length] = marker;
                else if (amakenMap[i].tarikhi == 1)
                    markersPla[markersPla.length] = marker;
                else if (amakenMap[i].tabiatgardi == 1)
                    markersNat[markersNat.length] = marker;
                else if (amakenMap[i].tafrihi == 1)
                    markersFun[markersFun.length] = marker;
                else if (amakenMap[i].markazkharid == 1)
                    markersShc[markersShc.length] = marker;
                else
                    markersPla[markersPla.length] = marker;
            }
            for (i = numOfNewMajara; i < majaraMap.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(majaraMap[i].C, majaraMap[i].D),
                    map: map1,
                    title: majaraMap[i].name,
                    icon: {
                        url: icons.adv,
                        scaledSize: new google.maps.Size(35, 35)
                    }
                });
                var majaraDetail = {
                    url: '{{route('home') . '/hotel-details/'}}',
                    name: majaraMap[i].name
                };
                majaraDetail.url = majaraDetail.url + majaraMap[i].id + '/' + majaraMap[i].name;
                markersAdv[i] = marker;
                majaraMap[i].kind = 6;
                majaraMap[i].url = majaraDetail;
                majaraMap[i].first = true;
                majaraMap[i].pic = "{{URL::asset('images/loading.svg')}}";
                majaraMap[i].address = majaraMap[i].dastresi;
                numOfNewMajara = majaraMap.length;
                availableMajaraIdMarker[i] = majaraMap[i].id;
                clickable(markersAdv[i], majaraMap[i]);
            }
            mySetMap(isHotelOn, markersHotel);
            mySetMap(isRestaurantOn[0], markersRest);
            mySetMap(isRestaurantOn[1], markersFast);
            mySetMap(isAmakenOn[0], markersMus);
            mySetMap(isAmakenOn[1], markersPla);
            mySetMap(isAmakenOn[2], markersShc);
            mySetMap(isAmakenOn[3], markersFun);
            mySetMap(isAmakenOn[4], markersNat);
            mySetMap(isAmakenOn[5], majaraMap);
        }

        function mySetMap(isSet, marker) {
            if (isSet == 1) {
                for (var i = 0; i < marker.length; i++) {
                    marker[i].setMap(map1);
                }
            }
            else
                for (var i = 0; i < marker.length; i++) {
                    marker[i].setMap(null);
                }
        }

        // bounds
        function zoomChangeOrCenterChange() {
            google.maps.event.addListener(map1, 'bounds_changed', function () {
                // map1.setOptions({draggable: false})
                newBound = map1.getBounds();
                newBounds[0] = newBound.getNorthEast().lat();
                newBounds[1] = newBound.getNorthEast().lng();
                newBounds[2] = newBound.getSouthWest().lat();
                newBounds[3] = newBound.getSouthWest().lng();
                addNewPlace(newBounds)
            });
        }

        function addNewPlace(newBounds) {
            var hotelId = JSON.stringify(availableHotelIdMarker);
            var restId = JSON.stringify(availableRestIdMarker);
            var amakenId = JSON.stringify(availableAmakenlIdMarker);
            var majaraId = JSON.stringify(availableMajaraIdMarker);
            $.ajax({
                type: 'post',
                url: '{{route('newPlaceForMap')}}',
                data: {
                    'swLat': newBounds[2],
                    'swLng': newBounds[3],
                    'neLat': newBounds[0],
                    'neLng': newBounds[1],
                    'C': x,
                    'D': y,
                    'hotelId': hotelId,
                    'restId': restId,
                    'amakenId': amakenId,
                    'majaraId': majaraId
                },
                success: function (response) {
                    response = JSON.parse(response);
                    newHotelMap = response.hotel;
                    newRestMap = response.rest;
                    newAmakenMap = response.amaken;
                    newMajaraMap = response.majara;
                    afterSuccess();
                }
            });
        }

        function afterSuccess() {
            for (i = 0; i < newHotelMap.length; i++) {
                hotelMap[hotelMap.length] = newHotelMap[i];
            }
            for (i = 0; i < newMajaraMap.length; i++) {
                majaraMap[majaraMap.length] = newMajaraMap[i];
            }
            for (i = 0; i < newRestMap.length; i++) {
                restMap[restMap.length] = newRestMap[i];
            }
            for (i = 0; i < newAmakenMap.length; i++) {
                amakenMap[amakenMap.length] = newAmakenMap[i];
            }
            addMarker();
        }

        function clickable(marker, name) {
            google.maps.event.addListener(marker, 'click', function () {
                document.getElementById('placeInfoInExtendedMap').style.display = 'inline';
                document.getElementById('url').innerHTML = name.name;
                document.getElementById('url').href = name.url;
                isItemClicked = true;
                if (name.first)
                    getPic(name);
                else {
                    $("#placeInfoPicInExtendedMap").attr('src', name.pic);
                }
                switch (name.rate) {
                    case 1:
                        document.getElementById('star').className = "ui_bubble_rating bubble_10";
                        document.getElementById('star').content = '1';
                        document.getElementById('rateNum').innerHTML = '1';
                        break;
                    case 2:
                        document.getElementById('star').className = "ui_bubble_rating bubble_20";
                        document.getElementById('star').content = '2';
                        document.getElementById('rateNum').innerHTML = '2';
                        break;
                    case 3:
                        document.getElementById('star').className = "ui_bubble_rating bubble_30";
                        document.getElementById('star').content = '3';
                        document.getElementById('rateNum').innerHTML = '3';
                        break;
                    case 4:
                        document.getElementById('star').className = "ui_bubble_rating bubble_40";
                        document.getElementById('star').content = '4';
                        document.getElementById('rateNum').innerHTML = '4';
                        break;
                    case 5:
                        document.getElementById('star').className = "ui_bubble_rating bubble_50";
                        document.getElementById('star').content = '5';
                        document.getElementById('rateNum').innerHTML = '5';
                        break;
                }
                switch (name.kind) {
                    case 4:
                        document.getElementById('nearTitle').innerHTML = 'سایر هتل ها';
                        break;
                    case 3:
                        document.getElementById('nearTitle').innerHTML = 'سایر رستوران ها';
                        break;
                    case 1:
                        document.getElementById('nearTitle').innerHTML = 'سایر اماکن ';
                        break;
                }
                document.getElementById('rev').innerHTML = name.reviews + "نقد";
                document.getElementById('address').innerHTML = "آدرس : " + name.address;
                var scope = angular.element(document.getElementById("nearbyInExtendedMap")).scope();
                scope.$apply(function () {
                    scope.findNearPlaceForMap(name);
                });
            });
            var classRatingHover;
            switch (name.rate) {
                case 1:
                    // classRatingHover.className = 'ui_bubble_rating bubble_10';
                    classRatingHover = 'ui_bubble_rating bubble_10';
                    // classRatingHover.content = '1';
                    break;
                case 2:
                    classRatingHover = 'ui_bubble_rating bubble_20';
                    // classRatingHover.content = '2';
                    break;
                case 3:
                    classRatingHover = 'ui_bubble_rating bubble_30';
                    // classRatingHover.content = '3';
                    break;
                case 4:
                    classRatingHover = 'ui_bubble_rating bubble_40';
                    // classRatingHover.content = '4';
                    break;
                case 5:
                    classRatingHover = 'ui_bubble_rating bubble_50';
                    // classRatingHover.content = '5';
                    break;
            }
            var hoverContent = "<div id='myTotalPane'><img id='itemPicInExtendedMap' src=" + '{{URL::asset('images/loading.svg')}}' + " >" +
                "<a href='" + name.url + ">" + name.name + "</a>" +
                "<div class='rating'>" +
                "<span id='rateNum1' class='overallRating'> </span>" +
                "<div class='prw_rup prw_common_bubble_rating overallBubbleRating inline'>" +
                "<span id='star1' class='" + classRatingHover + " property='ratingValue' content='' ></span>" +
                "</div>" +
                "<span id='rev1' class='autoResize'>" + name.reviews + "نقد </span>" +
                "</div>" +
                "<h1 id='extendedMapDistanceHeader'>فاصله :" + name.distance * 1000 + "متر</h1>" +
                "<h1 id='address1'>" + name.address + "</h1>" +
                "</div>";
            var infowindow = new google.maps.InfoWindow({
                content: hoverContent,
                maxWidth: 350
            });
            google.maps.event.addListener(marker, 'mouseover', function () {
                if (name.first)
                    getPic(name);
                else {
                    $("#itemPicInExtendedMap").attr('src', name.pic);
                }
                infowindow.open(map1, marker);
            });
            google.maps.event.addListener(marker, 'mouseout', function () {
                infowindow.close(map1, marker);
            });
            google.maps.event.addListener(infowindow, 'domready', function () {
                var iwOuter = $('.gm-style-iw');
                var iwBackground = iwOuter.prev();
                // Removes background shadow DIV
                iwBackground.children(':nth-child(2)').css({'display': 'none'});
                // Removes white background DIV
                iwBackground.children(':nth-child(4)').css({'display': 'none'});
                // Moves the infowindow 115px to the right.
                iwOuter.parent().parent().css({left: '0px', 'overflow': 'none'});
                // Moves the shadow of the arrow 76px to the left margin.
                iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                    return s + 'left: 76px !important;'
                });
                // Moves the arrow 76px to the left margin.
                iwBackground.children(':nth-child(3)').attr('style', function (i, s) {
                    return s + 'left: 0px !important;'
                });
                // Changes the desired tail shadow color.
                iwBackground.children(':nth-child(3)').find('div').children().css({
                    'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px',
                    'z-index': '1'
                });
                // Reference to the div that groups the close button elements.
                var iwCloseBtn = iwOuter.next();
                // Apply the desired effect to the close button
                iwCloseBtn.css({display: 'none'});
                $("#myTotalPane").parent().attr('style', function (i, s) {
                    return s + 'min-height: 152px !important; max-height: 200px !important;'
                })
            });
        }

        function getPic(name) {
            $.ajax({
                type: 'post',
                url: '{{route('getPlacePicture')}}',
                data: {
                    'kindPlaceId': name.kind,
                    'placeId': name.id
                },
                success: function (response) {
                    $("#itemPicInExtendedMap").attr('src', response);
                    $("#placeInfoPicInExtendedMap").attr('src', name.pic);
                    name.first = false;
                    name.pic = response;
                }
            });
        }

        function getJustPic(name) {
            $.ajax({
                type: 'post',
                url: '{{route('getPlacePicture')}}',
                data: {
                    'kindPlaceId': name.kind,
                    'placeId': name.id
                },
                success: function (response) {
                    name.pic = response;
                    name.first = false;
                    $("#itemNearbyPic_" + name.id + "_" + name.kind).attr('src', response);
                }
            });
        }
    </script>
    <script async src="{{URL::asset('pageJs/hoteldetails.js')}}"></script>
    <script>

        var app = angular.module("mainApp", ['infinite-scroll'], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });
        var placeMode = '{{$placeMode}}';
        var data;
        var requestURL;
        const config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        };
        app.controller('LogPhotoController', function ($scope, $http) {
            $scope.places = [];
            $scope.kindPlaceId = '{{$kindPlaceId}}';
            data = $.param({
                placeId: '{{$place->id}}',
                kindPlaceId: $scope.kindPlaceId
            });
            $scope.ngGetPhotos = function (val) {
                getPhotos(val);
            };
            $scope.myPagingFunction = function () {
                $http.post('{{route('getLogPhotos')}}', data, config).then(function (response) {
                    $scope.logs = response.data;
                }).catch(function (err) {
                    console.log(err);
                });
            };
            $scope.$on('myPagingFunctionAPI', function (event) {
                $scope.myPagingFunction();
            });
        });
        app.controller('SimilarController', function ($scope, $http, $rootScope) {
            var title;
            $scope.show = false;
            $scope.places = [];
            if (placeMode == "hotel") {
                this.title = "هتل های مشابه";
                requestURL = '{{route('getSimilarsHotel')}}';
            }
            if (placeMode == "amaken") {
                this.title = "اماکن مشابه";
                requestURL = '{{route('getSimilarsAmaken')}}';
            }
            if (placeMode == "restaurant") {
                this.title = "رستوران های مشابه";
                requestURL = '{{route('getSimilarsRestaurant')}}';
            }
            if (placeMode == "majara") {
                this.title = "ماجراجویی های مشابه";
                requestURL = '{{route('getSimilarsMajara')}}';
            }
            data = $.param({
                placeId: '{{$place->id}}'
            });
            $scope.redirect = function (url) {
                document.location.href = url;
            };
            $scope.disable = false;
            $scope.myPagingFunction = function () {
                var scroll = $(window).scrollTop();
                if (scroll < 1200 || $scope.disable)
                    return;
                $scope.disable = true;
                $rootScope.$broadcast('myPagingFunctionAPI');
                $rootScope.$broadcast('myPagingFunctionAPINearby');
                $http.post(requestURL, data, config).then(function (response) {
                    if (response.data != null && response.data != null && response.data.length > 0)
                        $scope.show = true;
                    $scope.places = response.data;
                    var i;
                    for (i = 0; i < response.data.length; i++) {
                        if (placeMode == "hotel")
                            $scope.places[i].redirect = '{{ route('home') . '/hotel-details/' }}' + $scope.places[i].id + "/" + $scope.places[i].name;
                        else if (placeMode == "amken")
                            $scope.places[i].redirect = '{{ route('home') . '/amaken-details/' }}' + $scope.places[i].id + "/" + $scope.places[i].name;
                        else if (placeMode == "restaurant")
                            $scope.places[i].redirect = '{{ route('home') . '/restaurant-details/' }}' + $scope.places[i].id + "/" + $scope.places[i].name;
                        else if (placeMode == "majara")
                            $scope.places[i].redirect = '{{ route('home') . '/majara-details/' }}' + $scope.places[i].id + "/" + $scope.places[i].name;
                        switch ($scope.places[i].rate) {
                            case 5:
                                $scope.places[i].ngClass = 'ui_bubble_rating bubble_50';
                                break;
                            case 4:
                                $scope.places[i].ngClass = 'ui_bubble_rating bubble_40';
                                break;
                            case 3:
                                $scope.places[i].ngClass = 'ui_bubble_rating bubble_30';
                                break;
                            case 2:
                                $scope.places[i].ngClass = 'ui_bubble_rating bubble_20';
                                break;
                            default:
                                $scope.places[i].ngClass = 'ui_bubble_rating bubble_10';
                        }
                    }
                }).catch(function (err) {
                    console.log(err);
                });
            };
        });
        var x1 = [];
        var y1 = [];
        var placeName = [];
        var lengthPlace = [];
        var kind;
        //این متفیر برای تعیین نوع رستوران برای ایکون نقشه است که 1 ایرانی و 0 فست فود است
        var kindRest = [];
        //این متغیر برای تعیین نوع مکان است
        var kindAmaken = [];
        app.controller('NearbyController', function ($scope, $http, $rootScope) {
            var kindPlaceId = (placeMode == "hotel") ? 4 : (placeMode == "amaken") ? 1 : 3;
            kind = kindPlaceId;
            data = $.param({
                placeId: '{{$place->id}}',
                kindPlaceId: kindPlaceId
            });
            $scope.redirect = function (url) {
                document.location.href = url;
            };
            $scope.hotels = [];
            $scope.amakens = [];
            $scope.restaurants = [];
            $scope.myPagingFunction = function () {
                $http.post('{{route('getNearby')}}', data, config).then(function (response) {
                    var i;
                    lengthPlace[0] = 0;
                    $scope.hotels = response.data[0];
                    for (i = 0; i < response.data[0].length; i++) {
                        $scope.hotels[i].redirect = '{{ route('home') . '/hotel-details/' }}' + $scope.hotels[i].id + "/" + $scope.hotels[i].name;
                        x1[i] = $scope.hotels[i].C;
                        y1[i] = $scope.hotels[i].D;
                        placeName[i] = $scope.hotels[i].name;
                        switch ($scope.hotels[i].rate) {
                            case 5:
                                $scope.hotels[i].ngClass = 'ui_bubble_rating bubble_50';
                                break;
                            case 4:
                                $scope.hotels[i].ngClass = 'ui_bubble_rating bubble_40';
                                break;
                            case 3:
                                $scope.hotels[i].ngClass = 'ui_bubble_rating bubble_30';
                                break;
                            case 2:
                                $scope.hotels[i].ngClass = 'ui_bubble_rating bubble_20';
                                break;
                            default:
                                $scope.hotels[i].ngClass = 'ui_bubble_rating bubble_10';
                        }
                    }
                    lengthPlace[1] = x1.length;
                    $scope.amakens = response.data[2];
                    for (i = 0; i < response.data[2].length; i++) {
                        $scope.amakens[i].redirect = '{{ route('home') . '/amaken-details/' }}' + $scope.amakens[i].id + "/" + $scope.amakens[i].name;
                        x1[i + lengthPlace[1]] = $scope.amakens[i].C;
                        y1[i + lengthPlace[1]] = $scope.amakens[i].D;
                        placeName[i + lengthPlace[1]] = $scope.amakens[i].name;
                        if ($scope.amakens[i].mooze == 1)
                            kindAmaken[i] = 1;
                        else if ($scope.amakens[i].tarikhi == 1)
                            kindAmaken[i] = 2;
                        else if ($scope.amakens[i].tabiatgardi == 1)
                            kindAmaken[i] = 3;
                        else if ($scope.amakens[i].tafrihi == 1)
                            kindAmaken[i] = 4;
                        else if ($scope.amakens[i].markazkharid == 1)
                            kindAmaken[i] = 5;
                        else
                            kindAmaken[i] = 1;
                        switch ($scope.amakens[i].rate) {
                            case 5:
                                $scope.amakens[i].ngClass = 'ui_bubble_rating bubble_50';
                                break;
                            case 4:
                                $scope.amakens[i].ngClass = 'ui_bubble_rating bubble_40';
                                break;
                            case 3:
                                $scope.amakens[i].ngClass = 'ui_bubble_rating bubble_30';
                                break;
                            case 2:
                                $scope.amakens[i].ngClass = 'ui_bubble_rating bubble_20';
                                break;
                            default:
                                $scope.amakens[i].ngClass = 'ui_bubble_rating bubble_10';
                        }
                    }
                    $scope.restaurants = response.data[1];
                    lengthPlace[2] = x1.length;
                    for (i = 0; i < response.data[1].length; i++) {
                        $scope.restaurants[i].redirect = '{{ route('home') . '/restaurant-details/' }}' + $scope.restaurants[i].id + "/" + $scope.restaurants[i].name;
                        x1[i + lengthPlace[2]] = $scope.restaurants[i].C;
                        y1[i + lengthPlace[2]] = $scope.restaurants[i].D;
                        placeName[i + lengthPlace[2]] = $scope.restaurants[i].name;
                        if ($scope.restaurants[i].kind_id == 1)
                            kindRest[i] = 1;
                        else
                            kindRest[i] = 0;
                        switch ($scope.restaurants[i].rate) {
                            case 5:
                                $scope.restaurants[i].ngClass = 'ui_bubble_rating bubble_50';
                                break;
                            case 4:
                                $scope.restaurants[i].ngClass = 'ui_bubble_rating bubble_40';
                                break;
                            case 3:
                                $scope.restaurants[i].ngClass = 'ui_bubble_rating bubble_30';
                                break;
                            case 2:
                                $scope.restaurants[i].ngClass = 'ui_bubble_rating bubble_20';
                                break;
                            default:
                                $scope.restaurants[i].ngClass = 'ui_bubble_rating bubble_10';
                        }
                    }
                    lengthPlace[3] = x1.length;
                    initBigMap();
                }).catch(function (err) {
                    console.log(err);
                });
            };
            $scope.$on('myPagingFunctionAPINearby', function (event) {
                $scope.myPagingFunction();
            });
        });
        var testhh2 = 1;
        var testshow = 1;

        function closeDiv(di) {
            if (di == 'nearbyInExtendedMap') {
                if (testhh2 == 1) {
                    document.getElementById(di).style.display = 'block';
                    document.getElementById('closeNearbyPlaces').style.transform = 'rotate(-90deg)';
                    testhh2 = 0;
                }
                else {
                    document.getElementById(di).style.display = 'none';
                    document.getElementById('closeNearbyPlaces').style.transform = 'rotate(90deg)';
                    testhh2 = 1;
                }
            }
            if (di == 'placeInfoInExtendedMap')
                document.getElementById(di).style.display = 'none';
            if (di == 'show') {
                if (testshow == 1) {
                    testshow = 0;
                    document.getElementById('closeShow').style.transform = 'scaleX(-1)';
                    document.getElementById(di).style.display = 'none';
                }
                else {
                    testshow = 1;
                    document.getElementById('closeShow').style.transform = 'scaleX(1)';
                    document.getElementById(di).style.display = 'inline-block';
                }
            }
        }

        app.controller('nearPlaceRepeat', function ($scope) {
            $scope.findNearPlaceForMap = function (place) {
                if (!isItemClicked)
                    return;
                var C = place.C * 3.14 / 180;
                var D = place.D * 3.14 / 180;
                var counter = 0;
                var i;
                if (place.kind == 4) {
                    $scope.nearPlaces = [];
                    for (i = 0; i < hotelMap.length; i++) {
                        if (Math.acos(Math.sin(D) * Math.sin(hotelMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(hotelMap[i].D / 180 * 3.14) * Math.cos(hotelMap[i].C / 180 * 3.14 - C)) * 6371 < 1) {
                            $scope.nearPlaces[counter] = hotelMap[i];
                            if ($scope.nearPlaces[counter].first)
                                getJustPic($scope.nearPlaces[counter]);
                            $scope.nearPlaces[counter++].distance = Math.acos(Math.sin(D) * Math.sin(hotelMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(hotelMap[i].D / 180 * 3.14) * Math.cos(hotelMap[i].C / 180 * 3.14 - C)) * 6371;
                        }
                    }
                }
                else if (place.kind == 3) {
                    $scope.nearPlaces = [];
                    for (i = 0; i < restMap.length; i++) {
                        if (Math.acos(Math.sin(D) * Math.sin(restMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(restMap[i].D / 180 * 3.14) * Math.cos(restMap[i].C / 180 * 3.14 - C)) * 6371 < 1) {
                            $scope.nearPlaces[counter] = restMap[i];
                            if ($scope.nearPlaces[counter].first)
                                getJustPic($scope.nearPlaces[counter]);
                            $scope.nearPlaces[counter++].distance = Math.acos(Math.sin(D) * Math.sin(restMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(restMap[i].D / 180 * 3.14) * Math.cos(restMap[i].C / 180 * 3.14 - C)) * 6371;
                        }
                    }
                }
                else if (place.kind == 1) {
                    $scope.nearPlaces = [];
                    for (i = 0; i < amakenMap.length; i++) {
                        if (Math.acos(Math.sin(D) * Math.sin(amakenMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(amakenMap[i].D / 180 * 3.14) * Math.cos(amakenMap[i].C / 180 * 3.14 - C)) * 6371 < 1) {
                            $scope.nearPlaces[counter] = amakenMap[i];
                            if ($scope.nearPlaces[counter].first)
                                getJustPic($scope.nearPlaces[counter]);
                            $scope.nearPlaces[counter++].distance = Math.acos(Math.sin(D) * Math.sin(amakenMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(amakenMap[i].D / 180 * 3.14) * Math.cos(amakenMap[i].C / 180 * 3.14 - C)) * 6371;
                        }
                    }
                }
                else {
                    $scope.nearPlaces = [];
                    for (i = 0; i < majaraMap.length; i++) {
                        if (Math.acos(Math.sin(D) * Math.sin(majaraMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(majaraMap[i].D / 180 * 3.14) * Math.cos(majaraMap[i].C / 180 * 3.14 - C)) * 6371 < 1) {
                            $scope.nearPlaces[counter] = majaraMap[i];
                            if (majaraMap[i].first)
                                getJustPic(majaraMap[i]);
                            $scope.nearPlaces[counter++].distance = Math.acos(Math.sin(D) * Math.sin(majaraMap[i].D / 180 * 3.14) + Math.cos(D) * Math.cos(majaraMap[i].D / 180 * 3.14) * Math.cos(majaraMap[i].C / 180 * 3.14 - C)) * 6371;
                        }
                    }
                }
                $scope.nearPlaces.sort(function (a, b) {
                    return a.distance - b.distance
                });
                for (i = 0; i < $scope.nearPlaces.length; i++) {
                    $scope.nearPlaces[i].distance = Math.round($scope.nearPlaces[i].distance * 1000);
                    switch ($scope.nearPlaces[i].rate) {
                        case 5:
                            $scope.nearPlaces[i].ngClass = 'ui_bubble_rating bubble_50';
                            break;
                        case 4:
                            $scope.nearPlaces[i].ngClass = 'ui_bubble_rating bubble_40';
                            break;
                        case 3:
                            $scope.nearPlaces[i].ngClass = 'ui_bubble_rating bubble_30';
                            break;
                        case 2:
                            $scope.nearPlaces[i].ngClass = 'ui_bubble_rating bubble_20';
                            break;
                        default:
                            $scope.nearPlaces[i].ngClass = 'ui_bubble_rating bubble_10';
                    }
                }
            };
        });
    </script>

    <script async>
        var mod;
        mod = angular.module("infinite-scroll", []), mod.directive("infiniteScroll", ["$rootScope", "$window", "$timeout", function (i, n, e) {
            return {
                link: function (t, l, o) {
                    var r, c, f, a;
                    return n = angular.element(n), f = 0, null != o.infiniteScrollDistance && t.$watch(o.infiniteScrollDistance, function (i) {
                        return f = parseInt(i, 10)
                    }), a = !0, r = !1, null != o.infiniteScrollDisabled && t.$watch(o.infiniteScrollDisabled, function (i) {
                        return a = !i, a && r ? (r = !1, c()) : void 0
                    }), c = function () {
                        var e, c, u, d;
                        return d = n.height() + n.scrollTop(), e = l.offset().top + l.height(), c = e - d, u = n.height() * f >= c, u && a ? i.$$phase ? t.$eval(o.infiniteScroll) : t.$apply(o.infiniteScroll) : u ? r = !0 : void 0
                    }, n.on("scroll", c), t.$on("$destroy", function () {
                        return n.off("scroll", c)
                    }), e(function () {
                        return o.infiniteScrollImmediateCheck ? t.$eval(o.infiniteScrollImmediateCheck) ? c() : void 0 : c()
                    }, 0)
                }
            }
        }])
    </script>

    <script>
        var x = '{{$place->C}}';
        var y = '{{$place->D}}';

        function initBigMap() {
            var locations = [];
            var k;
            var iconBase = '{{URL::asset('images') . '/'}}';
            var icons = {
                hotel: {
                    icon: iconBase + 'mhotel.png'
                },
                amaken1: {
                    icon: iconBase + 'matr_pla.png'
                },
                amaken2: {
                    icon: iconBase + 'matr_mus.png'
                },
                amaken3: {
                    icon: iconBase + 'matr_shc.png'
                },
                amaken4: {
                    icon: iconBase + 'matr_nat.png'
                },
                amaken5: {
                    icon: iconBase + 'matr_fun.png'
                },
                fastfood: {
                    icon: iconBase + 'mfast.png'
                },
                rest: {
                    icon: iconBase + 'mrest.png'
                }
            };
            var mapOptions = {
                zoom: 14,
                center: new google.maps.LatLng(x, y),
                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "landscape",
                    "stylers": [{"hue": "#FFA800"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                }, {
                    "featureType": "road.highway",
                    "stylers": [{"hue": "#53FF00"}, {"saturation": -73}, {"lightness": 40}, {"gamma": 1}]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [{"hue": "#FBFF00"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                }, {
                    "featureType": "road.local",
                    "stylers": [{"hue": "#00FFFD"}, {"saturation": 0}, {"lightness": 30}, {"gamma": 1}]
                }, {
                    "featureType": "water",
                    "stylers": [{"hue": "#00BFFF"}, {"saturation": 6}, {"lightness": 8}, {"gamma": 1}]
                }, {
                    "featureType": "poi",
                    "stylers": [{"hue": "#679714"}, {"saturation": 33.4}, {"lightness": -25.4}, {"gamma": 1}]
                }]
            };
            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            // Let's also add a marker while we're at it for big map
            switch (kind) {
                case 4:
                    k = 'hotel';
                    break;
                case 1:
                    if ('{{ $place->mooze }}' == 1)
                        k = 'amaken2';
                    else if ('{{ $place->tarikhi }}' == 1)
                        k = 'amaken1';
                    else if ('{{ $place->tabiatgardi }}' == 1)
                        k = 'amaken4';
                    else if ('{{ $place->tafrihi }}' == 1)
                        k = 'amaken5';
                    else if ('{{ $place->markazkharid }}' == 1)
                        k = 'amaken3';
                    else
                        k = 'amaken1';
                    break;
                case 3:
                    if ('{{$place->kind_id}}' == 1)
                        k = 'rest';
                    else
                        k = 'fastfood';
                    break;
            }
            locations[0] = {positions: new google.maps.LatLng(x, y), name: '{{ $place->name }}', type: k};
            for (j = 0; j < 3; j++) {
                var number = 0;
                for (i = lengthPlace[j]; i < lengthPlace[j + 1]; i++) {
                    if (j == 0)
                        k = 'hotel';
                    if (j == 2 && kindRest[number] == 1) {
                        k = 'rest';
                        number++;
                    }
                    else if (j == 2) {
                        k = 'fastfood';
                        number++;
                    }
                    if (j == 1) {
                        switch (kindAmaken[number]) {
                            case 1:
                                k = 'amaken2';
                                break;
                            case 2:
                                k = 'amaken1';
                                break;
                            case 3:
                                k = 'amaken4';
                                break;
                            case 4:
                                k = 'amaken5';
                                break;
                            case 5:
                                k = 'amaken3';
                                break;
                        }
                        number++;
                    }
                    locations[i + 1] = {
                        positions: new google.maps.LatLng(x1[i], y1[i]),
                        name: placeName[i],
                        type: k
                    };
                }
                locations.forEach(function (location) {
                    var marker = new google.maps.Marker({
                        position: location.positions,
                        icon: {
                            url: icons[location.type].icon,
                            scaledSize: new google.maps.Size(35, 35)
                        },
                        map: map,
                        title: location.name
                    });
                });
            }
        }

        function init() {
            var x = '{{$place->C}}';
            var y = '{{$place->D}}';
            var place_name = '{{ $place->name }}';
            var mapOptions = {
                zoom: 14,
                center: new google.maps.LatLng(x, y),
                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "landscape",
                    "stylers": [{"hue": "#FFA800"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                }, {
                    "featureType": "road.highway",
                    "stylers": [{"hue": "#53FF00"}, {"saturation": -73}, {"lightness": 40}, {"gamma": 1}]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [{"hue": "#FBFF00"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                }, {
                    "featureType": "road.local",
                    "stylers": [{"hue": "#00FFFD"}, {"saturation": 0}, {"lightness": 30}, {"gamma": 1}]
                }, {
                    "featureType": "water",
                    "stylers": [{"hue": "#00BFFF"}, {"saturation": 6}, {"lightness": 8}, {"gamma": 1}]
                }, {
                    "featureType": "poi",
                    "stylers": [{"hue": "#679714"}, {"saturation": 33.4}, {"lightness": -25.4}, {"gamma": 1}]
                }]
            };
            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElementSmall = document.getElementById('map-small');
            // Create the Google Map using our element and options defined above
            var map2 = new google.maps.Map(mapElementSmall, mapOptions);
            // Let's also add a marker while we're at it smal map
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(x, y),
                map: map2,
                title: place_name
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=initBigMap"></script>
    <script async src="{{URL::asset('js/album.js')}}"></script>

    @include('layouts.pop-up-create-trip_in_hotel_details')

    <script>
        $(document).ready(function () {
            $('.login-button').click(function () {
                var url;
                if (placeMode == "hotel")
                    url = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
                else if (placeMode == "amaken")
                    url = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
                else
                    url = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
                $(".dark").show();
                showLoginPrompt(url);
            });
            $('#share_pic').click(function () {
                if ($('#share_box').is(":hidden")) {
                    $('#share_box').show();
                } else {
                    $('#share_box').hide();
                }
            });
            $('#share_pic_mobile').click(function () {
                if ($('#share_box_mobile').is(":hidden")) {
                    $('#share_box_mobile').show();
                } else {
                    $('#share_box_mobile').hide();
                }
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
        var room = 0;
        var adult = 0;
        var children = 0;
        @if(session('room') != null)
            room = parseInt('{{session('room')}}');
        adult = parseInt('{{session('adult')}}');
        children = parseInt('{{session('children')}}');
                @endif
        var passengerNoSelect = false;
        $(".room").html(room);
        $(".adult").html(adult);
        $(".children").html(children);
        for (var i = 0; i < children; i++) {
            $(".childBox").append("" +
                "<div class='childAge' data-id='" + i + "'>" +
                "<div>سن بچه</div>" +
                "<div><select class='selectAgeChild' name='ageOfChild' id='ageOfChild'>" +
                "<option value='0'>1<</option>" +
                "<option value='1'>1</option>" +
                "<option value='2'>2</option>" +
                "<option value='3'>3</option>" +
                "<option value='4'>4</option>" +
                "<option value='5'>5</option>" +
                "</select></div>" +
                "</div>");
        }

        function togglePassengerNoSelectPane() {
            if (!passengerNoSelect) {
                passengerNoSelect = true;
                $("#passengerNoSelectPane").removeClass('hidden');
                $("#passengerNoSelectPane1").removeClass('hidden');
                $("#passengerArrowUp").removeClass('hidden');
                $("#passengerArrowDown").addClass('hidden');
            }
            else {
                $("#passengerNoSelectPane").addClass('hidden');
                $("#passengerNoSelectPane1").addClass('hidden');
                $("#passengerArrowDown").removeClass('hidden');
                $("#passengerArrowUp").addClass('hidden');
                passengerNoSelect = false;
            }
        }

        function addClassHidden(element) {
            $("#" + element).addClass('hidden');
            if (element == 'passengerNoSelectPane' || element == 'passengerNoSelectPane1') {
                $("#passengerArrowDown").removeClass('hidden');
                $("#passengerArrowUp").addClass('hidden');
            }
        }

        function changeRoomPassengersNum(inc, mode) {
            switch (mode) {
                case 3:
                default:
                    if (room + inc >= 0)
                        room += inc;

                    if (room > 0 && adult == 0) {
                        adult = 1;
                        $("#adultPassengerNumInSelect").empty().append(adult);
                        $("#adultPassengerNumInSelect1").empty().append(adult);
                    }

                    $("#roomNumInSelect").empty().append(room);
                    $("#roomNumInSelect1").empty().append(room);
                    break;
                case 2:
                    if (adult + inc >= 0)
                        adult += inc;
                    $("#adultPassengerNumInSelect").empty().append(adult);
                    $("#adultPassengerNumInSelect1").empty().append(adult);
                    break;
                case 1:
                    if (children + inc >= 0)
                        children += inc;
                    if (inc >= 0) {
                        $(".childBox").append("<div class='childAge' data-id='" + (children - 1) + "'>" +
                            "<div>سن بچه</div>" +
                            "<div><select class='selectAgeChild' name='ageOfChild' id='ageOfChild'>" +
                            "<option value='0'>1<</option>" +
                            "<option value='1'>1</option>" +
                            "<option value='2'>2</option>" +
                            "<option value='3'>3</option>" +
                            "<option value='4'>4</option>" +
                            "<option value='5'>5</option>" +
                            "</select></div>" +
                            "</div>");
                        ;
                    } else {
                        $(".childAge[data-id='" + (children) + "']").remove();
                    }
                    $("#childrenPassengerNumInSelect").empty().append(children);
                    $("#childrenPassengerNumInSelect1").empty().append(children);
                    break;
            }
            var text = '<span class="float-right">' + room + '</span>&nbsp;\n' +
                '                                                <span>اتاق</span>&nbsp;-&nbsp;\n' +
                '                                                <span id="childPassengerNo">' + adult + '</span>\n' +
                '                                                <span>بزرگسال</span>&nbsp;-&nbsp;\n' +
                '                                                <span id="infantPassengerNo">' + children + '</span>\n' +
                '                                                <span>بچه</span>&nbsp;';
            // document.getElementById('roomDetailRoom').innerHTML = text;
            while ((4 * room) < adult) {
                room++;
                $("#roomNumInSelect").empty().append(room);
            }
            document.getElementById('num_room').innerText = room;
            document.getElementById('num_adult').innerText = adult;
        }
    </script>

    <script>
        var updateSession = '{{route("updateSession")}}';

        @if(session('backDate') != null)
        document.getElementById('backDate').value = '{{session("backDate")}}';
        var rooms = '{!! $jsonRoom !!}';
        rooms = JSON.parse(rooms);
        var totalMoney = 0;
        var totalPerDayMoney = 0;
        var numDay = rooms[0].perDay.length;
        var room_code = [];
        var adult_count = [];
        var extra = [];
        var num_room_code = [];
        var room_name = [];
        document.getElementById('numDay').innerText = numDay;
        document.getElementById('check_num_day').innerText = numDay;

        function scrollToBed() {
            var elmnt = document.getElementById("rooms");
            elmnt.scrollIntoView();
        }

        function changeNumRoom(_index, value) {
            totalMoney = 0;
            totalPerDayMoney = 0;
            var totalNumRoom = 0;
            var text = '';
            var reserve_text = '';
            var reserve_money_text = '';
            room_code = [];
            adult_count = [];
            extra = [];
            num_room_code = [];
            room_name = [];
            for (i = 0; i < rooms.length; i++) {
                numRoom = parseInt(document.getElementById('roomNumber' + i).value);
                totalNumRoom += numRoom;
                price = parseInt(rooms[i].perDay[0].price);
                priceExtraBed = rooms[i].priceExtraGuest;
                extraBed = document.getElementById('additional_bed' + i).checked;
                totalPerDayMoney += numRoom * Math.floor(price / 1000) * 1000;
                if (numRoom != 0) {
                    room_code.push(rooms[i].roomNumber);
                    adult_count.push(rooms[i].capacity['adultCount']);
                    num_room_code.push(numRoom);
                    room_name.push(rooms[i].name);
                    text += '<div><span>X' + numRoom + '</span>' + rooms[i].name;
                    reserve_money_text += '<div><span class="float-right">X' + numRoom + '</span><span class="float-right">' + rooms[i].name + '</span>';
                    reserve_text += '<div id="changeNumRoomMainDiv" class="row">\n' +
                        '<div class="col-md-9">\n' +
                        '<div class="row display-flex flex-direction-row">\n' +
                        '<div>\n' +
                        '<span class="color-darkred">نام اتاق: </span>\n' +
                        '<span>' + rooms[i].name + '</span>\n' +
                        '</div>\n' +
                        '<div class="width-33per">\n' +
                        '<span class="color-darkred">تاریخ ورود: </span>\n' +
                        '<span>{{session("goDate")}}</span>\n' +
                        '</div>\n' +
                        '<div class="width-33per">\n' +
                        '<span class="color-darkred">تاریخ خروج: </span>\n' +
                        '<span>{{session("backDate")}}</span>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '<div class="row display-flex flex-direction-row mg-2per-0">\n' +
                        '<div class="width-33per">\n' +
                        '<span class="color-darkred">تعداد مسافر: </span>\n' +
                        '<span>' + rooms[i].capacity.adultCount + '</span>\n' +
                        '</div>\n' +
                        '<div class="width-33per">\n' +
                        '<span class="color-darkred">سرویس تخت اضافه: </span>\n';
                    if (extraBed) {
                        text += '<span class="font-size-085em">با تخت اضافه</span>';
                        reserve_money_text += '<span class="font-size-0.85em float-right">با تخت اضافه</span><span class="float-left">' + dotedNumber((Math.floor(priceExtraBed / 1000) * 1000) + (Math.floor(price / 1000) * 1000)) + '</span>';
                        totalPerDayMoney += numRoom * Math.floor(priceExtraBed / 1000) * 1000;
                        reserve_text += '<span>دارد</span>\n';
                        extra.push(true);
                    } else {
                        reserve_money_text += '<span class="float-left">' + dotedNumber(Math.floor(price / 1000) * 1000) + '</span>';
                        reserve_text += '<span>ندارد</span>\n';
                        extra.push(false);
                    }
                    text += '</div>';
                    reserve_money_text += '</div>';
                    reserve_text += '</div>\n' +
                        '</div><div class="row display-flex flex-direction-row">\n' +
                        '<div>\n' +
                        '<span class="color-darkred"> صبحانه مجانی: </span>\n' +
                        '<span>دارد</span>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>\n';
                    reserve_text += '<div class="col-md-3"><img src="' + rooms[i].pic + '" class="full-width"></div></div>';
                }
            }
            totalMoney += totalPerDayMoney * numDay;
            document.getElementById('totalPriceOneDay').innerText = dotedNumber(totalPerDayMoney);
            document.getElementById('totalPrice').innerText = dotedNumber(totalMoney);
            document.getElementById('check_total_price').innerText = dotedNumber(totalMoney);
            document.getElementById('totalNumRoom').innerText = totalNumRoom;
            document.getElementById('check_total_num_room').innerText = totalNumRoom;
            document.getElementById('discriptionNumRoom').innerHTML = text;
            document.getElementById('check_description').innerHTML = reserve_money_text;
            document.getElementById('selected_rooms').innerHTML = reserve_text;
        }

        function showReserve() {
            if (totalMoney > 0)
                document.getElementById('check_room').style.display = 'flex';
        }

        function updateSession() {
            $.ajax({
                url: updateSession,
                type: 'post',
                data: {
                    'room_code': room_code,
                    'adult_count': adult_count,
                    'extra': extra,
                    'num_room_code': num_room_code,
                    'room_name': room_name,
                    'hotel_name': placeName,
                    'rph': '{{$place->rph}}',
                    'backURL': window.location.href
                },
                success: function (response) {
                    window.location.href = '{{url('buyHotel')}}';
                }
            })
        }
        @endif
    </script>

    <script>
        $(document).ready(function () {
            $('.login-button').click(function () {
                var url;
                if (placeMode == "hotel")
                    url = '{{route('hotelDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
                else if (placeMode == "amaken")
                    url = '{{route('amakenDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
                else
                    url = '{{route('restaurantDetails', ['placeId' => $place->id, 'placeName' => $place->name])}}';
                $(".dark").show();
                showLoginPrompt(url);
            });
            $('#share_pic').click(function () {
                if ($('#share_box').is(":hidden")) {
                    $('#share_box').show();
                } else {
                    $('#share_box').hide();
                }
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

            $('#commentLink').click(function () {
                if (!hasLogin) {
                    showLoginPrompt(hotelDetailsInSaveToTripMode);
                    return;
                }

                $("#commentModal").show();
                $("#commentModalMainDiv").show()
            });

            $('#closeBtnCommentModal').click(function () {
                $('#commentModal').hide() ,
                    $("#commentModalMainDiv").hide()
            });

            $('.editUploadPhotoComment').click(function () {
                // $('#editPane').removeClass('hidden')
            });

        });
    </script>

    <script src="{{URL::asset('js/adv.js')}}"></script>
@stop