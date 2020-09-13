@extends('layouts.bodyPlace')

@section('title')
    <title>صفحه کاربری</title>
@stop

@section('meta')

@stop

@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/pages/profile.css?v1=3')}}">
    <style>
        .showBannerPic{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            overflow: hidden;
            margin: 5px 0px;
            width: 100%;
        }
        .bannerPicItem{
            margin: 5px;
            cursor: pointer;
        }
        .bannerPicItem.active{
            border: solid 5px var(--koochita-light-green);
        }
        .bannerPicItem > img{
            width: 100%;
        }
        .editReviewPicturesSection{
            background-color: #0000009e;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 99;
            top: 0;
        }
        .newMsgCount{
            position: absolute;
            left: -10px;
            top: -10px;
            background: var(--koochita-red);
            color: white;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }
    </style>
@stop

@section('main')
    <div class="userPostsPage">
        <div class="userProfilePageCoverImg" style="background-image: url('{{$user->banner}}'); background-size: cover; background-position: center">
            @if(isset($myPage) && $myPage)
                <div class="addPicForUser" style=" top: 10px; left: 15px;" onclick="openBannerModal()">
                    <span class="emptyCameraIcon addPicByUser"></span>
                </div>
            @endif
        </div>
        <div class="mainBodyUserProfile userPosts">
            <div class="mainDivContainerProfilePage">

                <div class="userPageBodyTopBar">
                    <div class="userPagePicSection">
                        <div class="circleBase profilePicUserProfile">
                            <img src="{{$sideInfos['userPicture']}}" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                        @if(isset($myPage) && $myPage)
                            <div class="addPicForUser" style="top: 10px; right: 15px;" onclick="openEditPhotoModal()">
                                <span class="emptyCameraIcon addPicByUser"></span>
                            </div>
                        @endif
                    </div>
                    <div class="userProfileInfo">
                        <div>{{$user->username}}</div>
                        <div style="display: flex; font-size: 12px;">
                            @if(isset($myPage) && $myPage)
                                <a href="{{route('profile.accountInfo')}}" class="settingHeaderButton">
                                    <span>ویرایش</span>
                                    <span class="settingIcon"></span>
                                </a>
                                <a href="{{route("profile.message.page")}}" class="msgHeaderButton">
                                    صندوق پیام
                                    @if(isset($newMsgCount) && $newMsgCount > 0)
                                        <span class="newMsgCount">{{$newMsgCount}}</span>
                                    @endif
                                </a>
                            @else
                                <a href="{{route("profile.message.page")}}?user={{$user->username}}" class="msgHeaderButton">ارسال پیام</a>
                            @endif
                        </div>
                    </div>
                    <div class="postsMainFiltrationBar">
                        <a id="whoAmITab" href="#whoAmI" class="profileHeaderLinksTab whoAmI" onclick="changePages('whoAmI')">من کی هستم</a>
                        <a id="reviewTab" href="#review" class="profileHeaderLinksTab" onclick="changePages('review')">پست‌ها</a>
                        <a id="pictureTab" href="#picture" class="profileHeaderLinksTab" onclick="changePages('picture')">عکس و فیلم</a>
                        <a id="questionTab" href="#question" class="profileHeaderLinksTab" onclick="changePages('question')">سؤال‌ و جواب</a>
                        <a id="safarnamehTab" href="#safarnameh" class="profileHeaderLinksTab" onclick="changePages('safarnameh')">سفرنامه ها</a>
                        <a id="medalsTab" href="#medal" class="profileHeaderLinksTab" onclick="changePages('medal')">جایزه و امتیاز</a>
                        <a href="#" class="profileHeaderLinksTab">سایر موارد</a>
                    </div>
                </div>

                <div id="userProfileSideInfos" class="userProfileDetailsMainDiv col-sm-4 col-xs-12 float-right">
                    @if($sideInfos['introduction'] != null || count($sideInfos['tripStyle']) > 0 || $myPage)
                        <div class="userProfileLevelMainDiv rightColBoxes">
                            <div class="mainDivHeaderText">
                                <h3>بیو</h3>
                                @if(isset($myPage) && $myPage)
                                    <div onclick="sendAjaxRequestToGiveTripStyles()">ویرایش</div>
                                @endif
                            </div>
                            <div id="myIntroduction" class="userProfileBio">
                                @if($sideInfos['introduction'] != null)
                                    {{$sideInfos['introduction']}}
                                @elseif(isset($myPage) && $myPage)
                                    <div style="font-size: 14px; color: var(--koochita-blue); text-align: center; cursor: pointer" onclick="sendAjaxRequestToGiveTripStyles()">خودتان را به دیگران معرفی کنید.</div>
                                @endif
                            </div>
                            <div id="myTripStyles" class="userProfileTagsSection">
                                @if(count($sideInfos['tripStyle']) == 0 && $sideInfos['introduction'] != null && isset($myPage) && $myPage)
                                    <div style="font-size: 14px; color: var(--koochita-blue); text-align: center; cursor: pointer" onclick="sendAjaxRequestToGiveTripStyles()">علایقتان را با ما در میان بگذارید و امتیاز بگیرید</div>
                                @else
                                    @foreach($sideInfos['tripStyle'] as $item)
                                        <div class="userProfileTags">{{$item->name}}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="userProfileLevelMainDiv rightColBoxes">
                        <div class="mainDivHeaderText">
                            <h3>سطح کاربر</h3>
                        </div>
                        <div class="userProfileLevelDetails">
                            <div class="levelIconDiv currentLevel">
                                <div class="upperBox">{{$sideInfos['nearLvl'][0]->name}}</div>
                                <div class="outer">
                                    <div class="inner"></div>
                                </div>
                            </div>
                            <div class="levelDetailsMainDiv" style="height: 45px;">
                                <div>سطح بعدی</div>
                                <div>سطح فعلی</div>
                            </div>
                            <div class="levelIconDiv nextLevel">
                                <div class="upperBox">{{$sideInfos['nearLvl'][1]->name}}</div>
                                <div class="outer">
                                    <div class="inner"></div>
                                </div>
                            </div>
                            <div class="w3-black">
                                <div class="w3-blue" style="width:75%"></div>
                            </div>
                            <div style="text-align: center; font-size: 12px; margin-top: 30px;">
                                مشاهده سیستم سطح بندی
                            </div>
                        </div>
                    </div>
                    <div class="userProfileLevelMainDiv rightColBoxes" style="padding: 0px">
                        {{--        <div class="mainDivHeaderText">--}}
                        {{--            <h3>امتیاز کاربر</h3>--}}
                        {{--            <div>سیستم امتیاز دهی</div>--}}
                        {{--        </div>--}}
                        <div class="userProfileLevelDetails userProfileScoreSection">
                            <div  style="width: 49%; border-left: solid 1px gray;">
                                <div style="font-size: 17px; color: #656565; font-weight: bold"> {{__('امتیاز کل کاربر')}} </div>
                                <div class="points" style="color: #963019; font-size: 23px;">{{$sideInfos['userScore']}}</div>
                            </div>
                            <a href="#" style="width: 49%">
                                چگونه کسب درآمد کنیم؟
                            </a>
                        </div>
                    </div>
                    <div class="userProfileMedalsMainDiv rightColBoxes">
                        <div class="mainDivHeaderText">
                            <h3>مدال‌های افتخار</h3>
                            <div href="#medal" onclick="changePages('medal')">مشاهده همه</div>
                        </div>
                        <div class="medalsMainBox" style="direction: rtl; display: {{count($userMedals) == 0 ? 'none' : 'flex'}}">
                            @foreach($userMedals as $key => $medal)
                                @if($key < 3)
                                    <div class="medalsDiv">
                                        <img src='{{$medal->onPic}}' class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="userProfileActivitiesMainDiv rightColBoxes">
                        <div class="mainDivHeaderText">
                            <h3>شرح فعالیت‌ها</h3>
                            <div class="hideOnScreen" onclick="showUserActivity(this)">مشاهده</div>
                        </div>
                        <div class="activitiesMainDiv hideOnPhone">
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">گذاشتن پست</div>
                                <div class="activityNumbers">پست {{$sideInfos['userActivityCount']['postCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود عکس</div>
                                <div class="activityNumbers">عکس {{$sideInfos['userActivityCount']['picCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود فیلم</div>
                                <div class="activityNumbers">فیلم {{$sideInfos['userActivityCount']['videoCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود فیلم 360</div>
                                <div class="activityNumbers">فیلم {{$sideInfos['userActivityCount']['video360Count']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پرسیدن سؤال</div>
                                <div class="activityNumbers">سؤال {{$sideInfos['userActivityCount']['questionCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پاسخ به سؤال دیگران</div>
                                <div class="activityNumbers">پاسخ سؤال {{$sideInfos['userActivityCount']['ansCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">امتیازدهی</div>
                                <div class="activityNumbers">مکان {{$sideInfos['userActivityCount']['scoreCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پاسخ به سؤالات اختیاری</div>
                                <div class="activityNumbers">پاسخ -</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">ویرایش مکان</div>
                                <div class="activityNumbers">مکان -</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پیشنهاد مکان جدید</div>
                                <div class="activityNumbers">مکان {{$sideInfos['userActivityCount']['addPlace']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">نوشتن مقاله</div>
                                <div class="activityNumbers">مقاله -</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">معرفی دوستان</div>
                                <div class="activityNumbers">معرفی -</div>
                            </div>
                        </div>
                    </div>
                    <div class="userProfilePicturesMainDiv rightColBoxes">
                        <div class="mainDivHeaderText">
                            <h3>عکس و تصاویر</h3>
                            <div>مشاهده همه</div>
                        </div>
                        <div class="picturesMainBox height-auto">
                            @foreach($sideInfos['allUserPics'] as $pic)
                                <div class="picturesDiv" data-toggle="modal">
                                    <img src="{{$pic['sidePic']}}" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)" onclick="showAllPicUser()">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div id="userProfileMainContentSection" class="userProfileActivitiesDetailsMainDiv userActivitiesArticles col-sm-8 col-xs-12">
                    <div id="reviewMainBody" class="prodileSections hidden">
                        @include('profile.innerParts.userPostsInner')
                    </div>

                    <div id="picMainBody" class="prodileSections hidden">
                        @include('profile.innerParts.userPhotosAndVideosInner')
                    </div>

                    <div id="questionMainBody" class="prodileSections hidden">
                        @include('profile.innerParts.userQuestionsInner')
                    </div>

                    <div id="safarnamehBody" class="prodileSections hidden">
                        @include('profile.innerParts.userSafarnameh')
                    </div>

                    <div id="medalBody" class="prodileSections hidden">
                        @include('profile.innerParts.userMedals')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($myPage) && $myPage)
        <div id="userTripStyle" class="modalBlackBack hidden">
            <div class="userTripMainBody">
                <div class="closeFullReview iconClose" onclick="closeBioSetting()"></div>
                <div>
                    <div class="myTripHeaders">منو بشناس</div>
                    <div class="tripModalBody">
                        <textarea name="myBio" id="myBioInput" cols="30" rows="3" class="myBioInput" placeholder="خودتو تو 100 کلمه به بقیه معرفی کن...">{{$sideInfos['introduction']}}</textarea>
                    </div>
                </div>
                <div style="border-top: solid 1px #cccccc; margin-top: 10px; padding-top: 10px;">
                    <div class="myTripHeaders">من چه گردشگری هستم ؟</div>
                    <div>
                        <div id="myTripStyleSelectDiv" class="tripModalBody"></div>

                        <div class="bioClassSection">
                            <button class="saveBioButton" onclick="updateMyTripStyle()" >ذخیره تغییرات</button>
                            <button class="cancelBioButton" onclick="closeBioSetting()">لغو</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="userImages" class="modalBlackBack hidden">
            <div class="userTripMainBody">
                <div class="closeFullReview iconClose" onclick="closeUserImg()"></div>
                <div>
                    <div class="myTripHeaders">تغییر عکس کاربری</div>
                    <div class="nowImg">
                        <input id="newImage" name="newPic" type="file" accept="image/*" style="display: none" onchange="changeUploadPic(this)">
                        <input type="text" id="uploadImgMode" name="id" style="display: none">

                        <div class="circleBase profilePicUserProfile">
                            <img id="changePic" src="{{$sideInfos['userPicture']}}" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                        <button id="cropButton" class="cropProfileImg" onclick="openCropProfile()">برش عکس</button>
                    </div>

                    <div class="uploadSection">
                        <label for="newImage" class="newImageButton">
                            بارگزاری عکس
                        </label>
                        <div class="oldBrowser">
                            عکس شما می‌بایست در فرمت‌های jpg یا png یا gif بوده و از 3MB بیشتر نباشید. حتما دقت کنید اندازه عکس 80*80 پیکسل باشد تا زیبا به نظر برسد. در غیر اینصورت ممکن است نتیجه نهایی باب میل شما نباشد.
                        </div>
                    </div>
                    <div class="orSec">
                        <span>یا</span>
                    </div>

                    <div id="ourPic" class="ourPic"></div>

                    <div class="bioClassSection">
                        <button class="saveBioButton" onclick="updateUserPic()" >ذخیره تغییرات</button>
                        <button class="cancelBioButton" onclick="closeUserImg()">لغو</button>
                    </div>

                </div>
            </div>
        </div>

        <div id="userBannerModal" class="modalBlackBack hidden">
            <div class="userTripMainBody">
                <div class="closeFullReview iconClose" onclick="$('#userBannerModal').addClass('hidden');"></div>
                <div>
                    <div class="myTripHeaders">تغییر عکس بنر</div>
                    <div class="nowImg">
                        <input id="newBannerImage" type="file" accept="image/*" style="display: none" onchange="changeUploadBannerPic(this)">

                        <div class="showBannerPic">
                            <img id="changeBannerPic" src="{{$user->banner}}" style="width: 100%">
                        </div>
                        <button id="cropBannerButton" class="cropProfileImg" onclick="openCropBanner()">برش عکس</button>
                    </div>

                    <div class="uploadSection">
                        <label for="newBannerImage" class="newImageButton">
                            بارگزاری عکس
                        </label>
                    </div>
                    <div class="orSec">
                        <span>یا</span>
                    </div>

                    <div id="bannerPics" class="ourPic"></div>

                    <div class="bioClassSection">
                        <button class="saveBioButton" onclick="doUpdateBannerPic()" >ذخیره تغییرات</button>
                        <button class="cancelBioButton" onclick="$('#userBannerModal').addClass('hidden');">لغو</button>
                    </div>

                </div>
            </div>
        </div>

        <div id="cropModal" class="editReviewPicturesSection backDark hidden">
            <span class="ui_modal photoUploadOverlay editSection">
                <div class="body_text" style="padding-top: 12px">
                   <div class="headerBar epHeaderBar hideOnPhone"></div>
                   <div class="row">
                      <div class="col-md-12">
                         <div class="img-container" style="position: relative; max-height: 75vh;">
                            <img class="imgInEditor" id="imgEditReviewPics" alt="Picture" style="max-width: 100%; max-height: 100%">
                         </div>
                      </div>
                   </div>
                   <div class="row" id="actions" >
                      <div class="col-md-12 docs-buttons">
                        <div class="editBtnsGroup">
                            <div class="editBtns">
                               <div class="flipHorizontal" data-toggle="tooltip"
                                    data-placement="top" title="Flip Horizontal"
                                    onclick="cropper.scaleY(-1)"></div>
                            </div>

                            <div class="editBtns">
                               <div class="flipVertical" data-toggle="tooltip" data-placement="top"
                                    title="Flip Vertical" onclick="cropper.scaleX(-1)"></div>
                            </div>
                        </div>
                        <div class="editBtnsGroup">
                            <div class="editBtns">
                               <div class="rotateLeft" data-toggle="tooltip" data-placement="top"
                                    title="چرخش 45 درجه ای به سمت چپ"
                                    onclick="cropper.rotate(-45)"></div>
                            </div>

                            <div class="editBtns">
                               <div class="rotateRight" data-toggle="tooltip" data-placement="top"
                                    title="چرخش 45 درجه ای به سمت راست"
                                    onclick="cropper.rotate(45)"></div>
                            </div>
                        </div>
                        <div class="editBtnsGroup">
                            <div class="editBtns">
                               <div class="cropping" data-toggle="tooltip" data-placement="top"
                                    title="برش" onclick="cropper.crop()"></div>
                            </div>

                            <div class="editBtns">
                               <div class="clearing" data-toggle="tooltip" data-placement="top"
                                    title="بازگشت به اول" onclick="cropper.clear()"></div>
                            </div>
                        </div>

                        <div class="upload" style="margin-right: auto; display: flex; align-items: center; margin-top: 10px;">
                            <div onclick="$('#cropModal').addClass('hidden')" class="uploadBtn backEditReviewPic" style="cursor: pointer">{{__('بازگشت')}}</div>
                            <div onclick="cropProfileImg()" class="uploadBtn ui_button primary" style="cursor: pointer">{{__('تایید')}}</div>
                        </div>

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

                     </div>
                   </div>
               </div>
{{--                <div class="ui_close_x" onclick="$('#cropModal').addClass('hidden');"></div>--}}
            </span>
        </div>

    @endif


    <script>
        autosize(document.getElementsByClassName("inputBoxInputSearch"));
        autosize(document.getElementsByClassName("inputBoxInputAnswer"));
        autosize(document.getElementsByClassName("inputBoxInputComment"));

        let allUserPics = {!! json_encode($sideInfos['allUserPics']) !!};
        let selectedTrip = [];
        let userPageId = {{$user->id}};

        function showAllPicUser(){
            createPhotoModal('عکس های شما', allUserPics);// in general.photoAlbumModal.blade.php
        }

        function openWhoAmI(){
            $('.rightColBoxes').slideToggle();
        }

        function showUserActivity(_element){
            $(_element).parent().next().toggleClass('hideOnPhone');
            if($(_element).text() == 'مشاهده')
                $(_element).text('بستن');
            else
                $(_element).text('مشاهده');
        }

        function sendAjaxRequestToGiveTripStyles() {
            $('#userTripStyle').removeClass('hidden');
            $.ajax({
                type: 'post',
                url: '{{route("getTripStyles")}}',
                data: {
                    uId: 0
                },
                success: function (response) {
                    var element = '';
                    selectedTrip = [];
                    response = JSON.parse(response);

                    for (i = 0; i < response.length; i++) {
                        element += `<div id="tripStyle_${response[i].id}" idValue="${response[i].id}" class="tripButton ${response[i].selected ? 'active' : ''}" onclick="selectThisTrip(this)">${response[i].name}</div>`;
                        if(response[i].selected)
                            selectedTrip.push(response[i].id+'')
                    }
                    $("#myTripStyleSelectDiv").html(element);
                }
            });
        }

        function selectThisTrip(_element){
            let id = $(_element).attr('idValue');
            $(_element).toggleClass('active');

            if(selectedTrip.indexOf(id) > -1)
                selectedTrip[selectedTrip.indexOf(id)] = 0;
            else
                selectedTrip.push(id);
        }

        function updateMyTripStyle() {
            let myBio = $('#myBioInput').val();

            $.ajax({
                type: 'post',
                url: '{{route("profile.updateMyBio")}}',
                data: {
                    tripStyles : selectedTrip,
                    myBio : myBio,
                },
                success: function (response) {
                    var text = '';
                    response = JSON.parse(response);
                    response.tripStyles.forEach(item => {
                        text += `<div class="userProfileTags">${item.name}</div>`;
                    })

                    $('#myIntroduction').text(response.introduction);
                    $('#myTripStyles').html(text);

                    closeBioSetting();
                }
            });
        }

        function closeBioSetting(){
            $('#userTripStyle').addClass('hidden');
        }

        function changePages(_kind){
            cancelFullMainContent();

            $('.postsMainFiltrationBar').find('.active').removeClass('active');
            $('.prodileSections').addClass('hidden');

            if($(window).width() < 768)
                $('#userProfileSideInfos').hide();

            if(_kind === 'review'){
                $('#reviewTab').addClass('active');
                $('#reviewMainBody').removeClass('hidden');
                getReviewsUserReview(); // in profile.innerParts.userPostsInner
            }
            else if(_kind == 'whoAmI'){
                $('#userProfileSideInfos').show();
                $('#whoAmITab').addClass('active');
            }
            else if(_kind === 'picture') {
                $('#pictureTab').addClass('active');
                $('#picMainBody').removeClass('hidden');
                getAllUserPicsAndVideo();// in profile.innerParts.userPhotosAndVideosInner
            }
            else if(_kind === 'question') {
                $('#questionTab').addClass('active');
                $('#questionMainBody').removeClass('hidden');
                getAllUserQuestions();// in profile.innerParts.userQuestionsInner
            }
            else if(_kind === 'safarnameh') {
                $('#safarnamehTab').addClass('active');
                $('#safarnamehBody').removeClass('hidden');
                getSafarnamehs(); // in profile.innerParts.userSafarnameh
            }
            else if(_kind === 'medal') {
                $('#medalsTab').addClass('active');
                $('#medalBody').removeClass('hidden');
                getMedals(); // in profile.innerParts.userMedals
            }
        }

        function fullMainContent(){
            $('#userProfileSideInfos').hide();
            $('#userProfileMainContentSection').addClass('fullWidthBoot');
        }

        function cancelFullMainContent(){
            if($(window).width() > 768)
                $('#userProfileSideInfos').show();

            $('#userProfileMainContentSection').removeClass('fullWidthBoot');
        }

        let defaultPics = null;
        let choosenPic = 0;
        let uploadedPic = null;
        let mainUploadedPic = null;
        function openEditPhotoModal(){
            if(defaultPics == null)
                getOurPic();
            $('#userImages').removeClass('hidden');
        }

        function closeUserImg(){
            $('#userImages').addClass('hidden');
        }

        function getOurPic(){
            $.ajax({
                type: 'post',
                url: '{{route("getDefaultPics")}}',
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function(response){
                    response = JSON.parse(response);
                    defaultPics = response;
                    defaultPics.map((pic, index) => {
                        text =  '<div id="ourPic_' + index + '" class="oPs" onclick="chooseThisImg(' + index + ', this)"> \n' +
                                '   <img src="' + pic.name + '">\n' +
                                '</div>';
                        $('#ourPic').append(text);
                    })
                }
            })
        }

        function changeUploadPic(_input){
            if(_input.files && _input.files[0]){
                cleanImgMetaData(_input, function(imgDataURL, _files){ // in forAllPages.blade.php
                    $('#changePic').attr('src', imgDataURL);
                    mainUploadedPic = imgDataURL;
                    uploadedPic = _files;

                    choosenPic = 'uploaded';
                    $('#uploadImgMode').val(0);
                    $('#cropButton').show();
                });
            }
        }

        function chooseThisImg(_index, _element){
            $(_element).parent().find('.active').removeClass('active');
            $(_element).addClass('active');

            $('#changePic').attr('src', defaultPics[_index].name);
            choosenPic = defaultPics[_index].id;
            $("#uploadImgMode").val(defaultPics[_index].id);
            $('#newImage').val('');
            uploadedPic = null;
            mainUploadedPic = null;
            $('#cropButton').hide();
        }

        function updateUserPic(){
            openLoading();

            let formDa = new FormData();
            formDa.append('_token', '{{csrf_token()}}');
            formDa.append('id', $('#uploadImgMode').val());

            if(choosenPic == 'uploaded')
                formDa.append('pic', uploadedPic);

            $.ajax({
                type: 'post',
                url: '{{route("profile.updateUserPhoto")}}',
                data: formDa,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response == 'ok')
                        location.reload();
                    else{
                        closeLoading();
                    }
                },
                error: function(err){
                    closeLoading();
                }

            })
        }

        function openCropProfile(){
            $('#cropModal').removeClass('hidden');
            $('#imgEditReviewPics').attr('src', mainUploadedPic);
            openLoading();
            startProfileCropper('circle', 1);
        }

        var url = new URL(location.href);
        if(url.hash === '' || url.hash === '#review')
            changePages('review');
        else if(url.hash === '#picture')
            changePages('picture');
        else if(url.hash === '#whoAmI')
            changePages('whoAmI');
        else if(url.hash === '#question')
            changePages('question');
        else if(url.hash === '#safarnameh')
            changePages('safarnameh');
        else if(url.hash === '#medal')
            changePages('medal');

    </script>

    <script>
        let bannerPics = null;
        let chosenBannerPic = null;
        let mainUploadedBanner = false;
        let uploadedBanner = false;
        function openBannerModal() {
            getBannerPic();
            $('#userBannerModal').removeClass('hidden');
        }

        function getBannerPic(){
            if(bannerPics == null) {
                $.ajax({
                    type: 'post',
                    url: '{{route("getBannerPics")}}',
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        $('#bannerPics').empty();
                        bannerPics = JSON.parse(response);
                        bannerPics.map((item, index) => {
                            text = '<div onclick="choseBannerPic(\'' + index + '\', this)" class="bannerPicItem"><img src="' + item.url + '"></div>';
                            $('#bannerPics').append(text);
                        });
                    },
                    error: function (err) {
                    }
                });
            }
        }

        function changeUploadBannerPic(_input){
            if(_input.files && _input.files[0]){
                cleanImgMetaData(_input, function(imgDataURL, _file){
                    $('#cropBannerButton').show();
                    uploadedBanner = true;
                    $('#changeBannerPic').attr('src', imgDataURL);
                    mainUploadedBanner = imgDataURL;
                    chosenBannerPic = _file;
                })
            }
        }

        function choseBannerPic(_index, _element){
            $(_element).parent().find('.active').removeClass('active');
            $(_element).addClass('active');

            chosenBannerPic = bannerPics[_index].name;
            uploadedBanner = false;

            $('#changeBannerPic').attr('src', bannerPics[_index].url);
        }

        function openCropBanner(){
            $('#cropModal').removeClass('hidden');
            $('#imgEditReviewPics').attr('src', mainUploadedBanner);
            openLoading();
            startProfileCropper('req', 6);
        }

        function doUpdateBannerPic(){
            openLoading();

            let formDa = new FormData();
            formDa.append('_token', '{{csrf_token()}}');
            formDa.append('uploaded', uploadedBanner);
            formDa.append('pic', chosenBannerPic);

            $.ajax({
                type: 'post',
                url: '{{route('profile.updateBannerPic')}}',
                data: formDa,
                processData: false,
                contentType: false,
                success: function(response){
                    closeLoading();
                    response = JSON.parse(response);
                    if(response.status == 'ok') {
                        $('#userBannerModal').addClass('hidden');
                        $('.userProfilePageCoverImg').css('background-image', 'url(' + response.url + ')');
                    }
                },
                error: function(err){
                    closeLoading();
                }
            })
        }

        let cropKind = null;
        function startProfileCropper(_kind, _ratio){

            if(first) {
                'use strict';
                Cropper = window.Cropper;
                URL = window.URL || window.webkitURL;

                // container = document.querySelector('.img-container');
                download = document.getElementById('download');
                actions = document.getElementById('actions');
                dataX = document.getElementById('dataX');
                dataY = document.getElementById('dataY');
                dataHeight = document.getElementById('dataHeight');
                dataWidth = document.getElementById('dataWidth');
                dataRotate = document.getElementById('dataRotate');
                dataScaleX = document.getElementById('dataScaleX');
                dataScaleY = document.getElementById('dataScaleY');
            }
            else {
                cropper.destroy();
                inputImage.value = null;
            }

            image = document.getElementById('imgEditReviewPics');
            cropper = new Cropper(image, {
                aspectRatio: _ratio,
                preview: '.img-preview',
            });

            if(first) {
                originalImageURL = image.src;
                uploadedImageType = 'image/jpeg';
                uploadedImageName = 'cropped.jpg';

                // Tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // Buttons
                if (!document.createElement('canvas').getContext)
                    $('button[data-method="getCroppedCanvas"]').prop('disabled', true);

                if (typeof document.createElement('cropper').style.transition === 'undefined') {
                    $('button[data-method="rotate"]').prop('disabled', true);
                    $('button[data-method="scale"]').prop('disabled', true);
                }

                // Download
                if (typeof download.download === 'undefined')
                    download.className += ' disabled';

                // Methods
                actions.querySelector('.docs-buttons').onclick = function (event) {
                    e = event || window.event;
                    target = e.target || e.srcElement;

                    if (!cropper) {
                        return;
                    }

                    while (target !== this) {
                        if (target.getAttribute('data-method')) {
                            break;
                        }

                        target = target.parentNode;
                    }

                    if (target === this || target.disabled || target.className.indexOf('disabled') > -1) {
                        return;
                    }

                    data = {
                        method: target.getAttribute('data-method'),
                        target: target.getAttribute('data-target'),
                        option: target.getAttribute('data-option') || undefined,
                        secondOption: target.getAttribute('data-second-option') || undefined
                    };

                    cropped = cropper.cropped;

                    if (data.method) {
                        if (typeof data.target !== 'undefined') {
                            input = document.querySelector(data.target);

                            if (!target.hasAttribute('data-option') && data.target && input) {
                                try {
                                    data.option = JSON.parse(input.value);
                                } catch (e) {
                                    console.log(e.message);
                                }
                            }
                        }

                        switch (data.method) {
                            case 'rotate':
                                if (cropped && options.viewMode > 0)
                                    cropper.clear();
                                break;
                            case 'getCroppedCanvas':
                                try {
                                    data.option = JSON.parse(data.option);
                                } catch (e) {
                                    console.log(e.message);
                                }

                                if (uploadedImageType === 'image/jpeg') {
                                    if (!data.option)
                                        data.option = {};
                                    data.option.fillColor = '#fff';
                                }

                                break;
                        }

                        result = cropper[data.method](data.option, data.secondOption);

                        switch (data.method) {
                            case 'rotate':
                                if (cropped && options.viewMode > 0)
                                    cropper.crop();
                                break;
                            case 'scaleX':
                            case 'scaleY':
                                target.setAttribute('data-option', -data.option);
                                break;
                        }

                        if (typeof result === 'object' && result !== cropper && input) {
                            try {
                                input.value = JSON.stringify(result);
                            } catch (e) {
                                console.log(e.message);
                            }
                        }
                    }
                };

                document.body.onkeydown = function (event) {
                    var e = event || window.event;
                    if (!cropper || this.scrollTop > 300)
                        return;
                    switch (e.keyCode) {
                        case 37:
                            e.preventDefault();
                            cropper.move(-1, 0);
                            break;

                        case 38:
                            e.preventDefault();
                            cropper.move(0, -1);
                            break;

                        case 39:
                            e.preventDefault();
                            cropper.move(1, 0);
                            break;

                        case 40:
                            e.preventDefault();
                            cropper.move(0, 1);
                            break;
                    }
                };
                first = false;
            }


            // Import image
            inputImage = document.getElementById('changePic');
            if (URL) {
                inputImage.onchange = function () {
                    var files = this.files;
                    var file;

                    if (cropper && files && files.length) {
                        file = files[0];

                        if (/^image\/\w+/.test(file.type)) {
                            uploadedImageType = file.type;
                            uploadedImageName = file.name;

                            if (uploadedImageURL) {
                                URL.revokeObjectURL(uploadedImageURL);
                            }

                            image.src = uploadedImageURL = URL.createObjectURL(file);
                            cropper.destroy();
                            cropper = new Cropper(image, options);
                            inputImage.value = null;
                        } else {
                            window.alert('Please choose an image file.');
                        }
                    }
                };
            } else {
                inputImage.disabled = true;
                inputImage.parentNode.className += ' disabled';
            }


            setTimeout(() => {
                if(_kind == 'circle') {
                    $('.cropper-view-box').css('border-radius', '50%');
                    cropKind = 'userPic';
                }
                else {
                    $('.cropper-view-box').css('border-radius', '0');
                    cropKind = 'userBanner';
                }
                closeLoading();
            },1000);
        }

        function cropProfileImg(){
            openLoading();
            $('#cropModal').addClass('hidden');

            if(cropKind == 'userPic') {
                var canvas1;
                canvas1 = cropper.getCroppedCanvas({
                    minWidth: 200,
                    minHeight: 200,
                });

                canvas1.toBlob(function (blob) {
                    uploadedPic = blob;
                    choosenPic = 'uploaded';
                    $('#uploadImgMode').val(0);
                    $('#changePic').attr('src', canvas1.toDataURL());
                    closeLoading();
                });
            }
            else{
                var canvas1;
                canvas1 = cropper.getCroppedCanvas();

                canvas1.toBlob(function (blob) {
                    $('#changeBannerPic').attr('src', canvas1.toDataURL());

                    chosenBannerPic = blob;
                    uploadedBanner = true;
                    closeLoading();
                });
            }
        }
    </script>
@stop
