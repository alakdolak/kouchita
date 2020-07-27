@extends('layouts.bodyPlace')

@section('title')
    <title>صفحه کاربری</title>
@stop

@section('meta')

@stop

@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/pages/profile.css?v1=2')}}">
{{--    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}">--}}
@stop

@section('main')
    <div class="userPostsPage">
        <div class="userProfilePageCoverImg" style="background-image: url('{{URL::asset('images/mainPics/background/4.jpg')}}'); background-size: cover">
            @if(isset($myPage) && $myPage)
                <div class="addPicForUser" style=" top: 10px; left: 15px;">
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
                            <a href="{{route('profile.editPhoto')}}" class="addPicForUser" style=" top: 10px; right: 15px;">
                                <span class="emptyCameraIcon addPicByUser"></span>
                            </a>
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
                                <div class="msgHeaderButton">صندوق پیام</div>
                            @else
                                <div class="msgHeaderButton">ارسال پیام</div>
                            @endif
                        </div>
                    </div>
                    <div class="postsMainFiltrationBar">
                        <a id="reviewTab" href="#review" class="profileHeaderLinksTab" onclick="changePages('review')">پست‌ها</a>
                        <a id="pictureTab" href="#picture" class="profileHeaderLinksTab" onclick="changePages('picture')">عکس و فیلم</a>
                        <a href="#" class="profileHeaderLinksTab">سؤال‌ و جواب</a>
                        <a href="#" class="profileHeaderLinksTab">سفرنامه ها</a>
                        <a href="#" class="profileHeaderLinksTab">جایزه و امتیاز</a>
                        <a href="#" class="profileHeaderLinksTab">سایر موارد</a>
                    </div>
                </div>

                <div class="userProfileDetailsMainDiv col-sm-4 col-xs-12 float-right">
                    @if($sideInfos['introduction'] != null || count($sideInfos['tripStyle']) > 0)
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
                                    <div style="font-size: 14px; color: #0076a3; text-align: center; cursor: pointer" onclick="sendAjaxRequestToGiveTripStyles()">خودتان را به دیگران معرفی کنید.</div>
                                @endif
                            </div>
                            <div id="myTripStyles" class="userProfileTagsSection">
                                @if(count($sideInfos['tripStyle']) == 0 && $sideInfos['introduction'] != null && isset($myPage) && $myPage)
                                    <div style="font-size: 14px; color: #0076a3; text-align: center; cursor: pointer" onclick="sendAjaxRequestToGiveTripStyles()">علایقتان را با ما در میان بگذارید و امتیاز بگیرید</div>
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
                            <div onclick="showAllItems(this)">مشاهده همه</div>
                        </div>
                        <div class="medalsMainBox">
                            @foreach($sideInfos['nearestMedals'] as $nearestMedal)
                                <div class="medalsDiv">
                                    <img src='{{URL::asset('_images/badges' . '/' . $nearestMedal["medal"]->pic_1)}}' class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                                </div>
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

                <div id="reviewMainBody" class="prodileSections hidden">
                    @include('profile.innerParts.userPostsInner')
                </div>

                <div id="picMainBody"  class="prodileSections hidden">
                    @include('profile.innerParts.userPhotosAndVideosInner')
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
            $('.postsMainFiltrationBar').find('.active').removeClass('active');
            $('.prodileSections').addClass('hidden');

            if(_kind === 'review'){
                $('#reviewTab').addClass('active');
                $('#reviewMainBody').removeClass('hidden');
                getReviewsUserReview(); // in profile.innerParts.userPostsInner
            }
            else if(_kind === 'picture') {
                $('#pictureTab').addClass('active');
                $('#picMainBody').removeClass('hidden');
                getAllUserPicsAndVideo();// in profile.innerParts.userPhotosAndVideosInner
            }
        }

        var url = new URL(location.href);
        if(url.hash === '' || url.hash === '#review')
            changePages('review');
        else if(url.hash === '#picture')
            changePages('picture');

    </script>

@stop