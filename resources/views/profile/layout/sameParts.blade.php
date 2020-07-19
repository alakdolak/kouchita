
<div class="userPageBodyTopBar">
    <div class="circleBase profilePicUserProfile">
        <img src="{{$user->picture}}" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
    </div>
    <div class="userProfileInfo">
{{--        <div>{{$user->first_name}} {{$user->last_name}}</div>--}}
        <div>{{$user->username}}</div>
        <div>عضو شده از
            <span>{{$user->created}}</span>
        </div>
    </div>
    <div class="postsMainFiltrationBar">
        <span class="showUsersPostsLink">پست‌ها</span>
        <span class="showUsersPhotosAndVideosLink">عکس و فیلم</span>
        <span class="showUsersQAndAsLink">سؤال‌ها و پاسخ‌ها</span>
        <span class="showUsersArticlesLink">مقاله‌ها</span>
        <span class="showUsersScores">امتیاز‌ها</span>
        <span class="otherActivitiesChoices">سایر موارد</span>
    </div>
</div>
<div class="userProfileDetailsMainDiv col-sm-4 col-xs-12 float-right">
    <div class="userProfileLevelMainDiv rightColBoxes">
        <div class="mainDivHeaderText">
            <h3>سطح کاربر</h3>
        </div>
        <div class="userProfileLevelDetails">
            <div class="levelIconDiv currentLevel">
                <div class="upperBox">{{$nearLvl[0]->name}}</div>
                <div class="outer">
                    <div class="inner"></div>
                </div>
            </div>
            <div class="levelDetailsMainDiv">
                <div class="levelDetailsText">کاربر سطح {{$nearLvl[0]->name}}</div>
                <div class="levelDetailsPoints">{{$user->score}} امتیاز</div>
            </div>
            <div class="levelIconDiv nextLevel">
                <div class="upperBox">{{$nearLvl[1]->name}}</div>
                <div class="outer">
                    <div class="inner"></div>
                </div>
            </div>
            <div class="w3-black">
                <div class="w3-blue" style="width:75%"></div>
            </div>
        </div>
    </div>
    <div class="userProfileMedalsMainDiv rightColBoxes">
        <div class="mainDivHeaderText">
            <h3>مدال‌های افتخار</h3>
            <div onclick="showAllItems(this)">مشاهده همه</div>
        </div>
        <div class="medalsMainBox">
            @foreach($nearestMedals as $nearestMedal)
                <div class="medalsDiv">
                    <img src='{{URL::asset('_images/badges' . '/' . $nearestMedal["medal"]->pic_1)}}' class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                </div>
            @endforeach
        </div>
    </div>
    <div class="userProfileActivitiesMainDiv rightColBoxes">
        <div class="mainDivHeaderText">
            <h3>شرح فعالیت‌ها</h3>
        </div>
        <div class="activitiesMainDiv">
            <div class="activitiesLinesDiv">
                <div class="activityTitle">گذاشتن پست</div>
                <div class="activityNumbers">پست {{$userCount['postCount']}}</div>
            </div>
            <div class="activitiesLinesDiv">
                <div class="activityTitle">آپلود عکس</div>
                <div class="activityNumbers">عکس {{$userCount['picCount']}}</div>
            </div>
            <div class="activitiesLinesDiv">
                <div class="activityTitle">آپلود فیلم</div>
                <div class="activityNumbers">فیلم {{$userCount['videoCount']}}</div>
            </div>
            <div class="activitiesLinesDiv">
                <div class="activityTitle">آپلود فیلم 360</div>
                <div class="activityNumbers">فیلم {{$userCount['video360Count']}}</div>
            </div>
            <div class="activitiesLinesDiv">
                <div class="activityTitle">پرسیدن سؤال</div>
                <div class="activityNumbers">سؤال {{$userCount['questionCount']}}</div>
            </div>
            <div class="activitiesLinesDiv">
                <div class="activityTitle">پاسخ به سؤال دیگران</div>
                <div class="activityNumbers">پاسخ سؤال {{$userCount['ansCount']}}</div>
            </div>
            <div class="activitiesLinesDiv">
                <div class="activityTitle">امتیازدهی</div>
                <div class="activityNumbers">مکان {{$userCount['scoreCount']}}</div>
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
                <div class="activityNumbers">مکان {{$userCount['addPlace']}}</div>
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
            @foreach($allUserPics as $pic)
                <div class="picturesDiv" data-toggle="modal">
                    <img src="{{$pic['sidePic']}}" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)" onclick="showAllPicUser()">
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    let allUserPics = {!! json_encode($allUserPics) !!};
    function showAllPicUser(){
        createPhotoModal('عکس های شما', allUserPics);
    }
</script>