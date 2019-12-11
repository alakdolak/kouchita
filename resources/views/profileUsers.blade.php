@extends('layouts.bodyPlace')

<?php
//$total = $rates[0] + $rates[1] + $rates[2] + $rates[3] + $rates[4];
//if ($total == 0)
//    $total = 1;
//?>
@section('title')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>--}}
    <link rel="stylesheet" href="{{URL::asset('css/theme2/media_uploader.css')}}">
    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
{{--    <title>{{$place->name}} | {{$city->name}} | شازده مسافر</title>--}}
@stop

@section('meta')
{{--    <meta name="keywords" content="{{$place->keyword}}">--}}
{{--    <meta property="og:description" content="{{$place->meta}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag1}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag2}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag3}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag4}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag5}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag6}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag7}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag8}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag9}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag10}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag11}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag12}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag13}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag14}}"/>--}}
{{--    <meta property="article:tag" content="{{$place->tag15}}"/>--}}
{{--    <meta name="twitter:card" content="summary_large_image"/>--}}
{{--    <meta name="twitter:description" content="{{$place->meta}}"/>--}}
{{--    <meta name="twitter:title" content="{{$place->name}} | {{$city->name}} | شازده مسافر"/>--}}
{{--    <meta property="og:url" content="{{Request::url()}}"/>--}}
{{--    @if(count($photos) > 0)--}}
{{--        <meta property="og:image" content="{{$photos[0]}}"/>--}}
{{--        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>--}}
{{--        <meta property="og:image:width" content="550"/>--}}
{{--        <meta property="og:image:height" content="367"/>--}}
{{--        <meta name="twitter:image" content="{{$photos[0]}}"/>--}}
{{--    @endif--}}
{{--    <meta content="article" property="og:type"/>--}}
{{--    <meta property="og:title" content="{{$place->name}} | {{$city->name}} | شازده مسافر"/>--}}



@stop

@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/usersProfile.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    {{--vr--}}

{{--    @if(isset($video) && $video != null)--}}
{{--        <link rel="stylesheet" href="{{URL::asset('vr2/video-js.css')}}">--}}
{{--        <link rel="stylesheet" href="{{URL::asset('vr2/videojs-vr.css')}}">--}}
{{--        <script src="{{URL::asset('vr2/video.js')}}"></script>--}}
{{--        <script src="{{URL::asset('vr2/videojs-vr.js')}}"></script>--}}
{{--    @endif--}}

@stop

@section('main')
    <div class="userProfilePageTopHeader"></div>
    <center class="mainBodyUserProfile">
        <div class="mainDivContainerProfilePage">
            <div class="userPageBodyTopBar">
                <div class="circleBase profilePicUserProfile"></div>
                <div class="userProfileInfo">
                    <div>سینا عادلی</div>
                    <div>shazdesina</div>
                    <div>عضو شده از
                        <span>1396/10/04</span>
                    </div>
                </div>
                <div class="postsMainFiltrationBar">
                    <span class="otherFilterChoices">سایر موارد</span>
                    <span>مقاله‌ها</span>
                    <span>امتیاز‌ها</span>
                    <span>سؤال‌ها و پاسخ‌ها</span>
                    <span>عکس و فیلم</span>
                    <span>پست‌ها</span>
                </div>
            </div>
            <div class="userProfilePostsMainDiv col-xs-8">
                <div class="userProfilePostsFiltrationContainer">
                    <div class="userProfilePostsFiltration">
                        <span>نمایش بر اساس</span>
                        <span>جدیدترین‌ها</span>
                        <span>قدمی‌ترین‌ها</span>
                        <span>بهترین‌ها</span>
                        <span>داغ‌ترین‌ها</span>
                        <span>بدترین‌ها</span>
                        <span>بیشترین همراهان</span>
                    </div>
                </div>
                @include('layouts.profilePosts')
                @include('layouts.profilePhotosAndVideos')
                @include('layouts.profileQuestions')
                @include('layouts.profileArticles')
            </div>
            <div class="userProfileDetailsMainDiv col-xs-4">
                <div class="userProfileLevelMainDiv rightColBoxes">
                    <div class="mainDivHeaderText">
                        <h3>سطح کاربر</h3>
                    </div>
                    <div class="userProfileLevelDetails">
                        <div class="levelIconDiv currentLevel">
                            <div class="upperBox">1</div>
                            <div class="outer">
                                <div class="inner"></div>
                            </div>
                        </div>
                        <div class="levelDetailsMainDiv">
                            <div class="levelDetailsText">کاربر سطح 1</div>
                            <div class="levelDetailsPoints">1600 امتیاز</div>
                        </div>
                        <div class="levelIconDiv nextLevel">
                            <div class="upperBox">2</div>
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
                        <div class="medalsDiv"></div>
                        <div class="medalsDiv"></div>
                        <div class="medalsDiv"></div>
                        <div class="medalsDiv"></div>
                        <div class="medalsDiv"></div>
                        <div class="medalsDiv"></div>
                    </div>
                </div>
                <div class="userProfileActivitiesMainDiv rightColBoxes">
                    <div class="mainDivHeaderText">
                        <h3>شرح فعالیت‌ها</h3>
                    </div>
                    <div class="activitiesMainDiv">
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">گذاشتن پست</div>
                            <div class="activityNumbers">پست 21</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">آپلود عکس</div>
                            <div class="activityNumbers">عکس 365</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">آپلود فیلم</div>
                            <div class="activityNumbers">فیلم 6</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">آپلود فیلم 360</div>
                            <div class="activityNumbers">فیلم 2</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">پرسیدن سؤال</div>
                            <div class="activityNumbers">سؤال 5</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">پاسخ به سرال دیگران</div>
                            <div class="activityNumbers">پاسخ 15</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">امتیازدهی</div>
                            <div class="activityNumbers">مکان 14</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">پاسخ به سرالات اختیاری</div>
                            <div class="activityNumbers">پاسخ 145</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">ویرایش مکان</div>
                            <div class="activityNumbers">مکان 13</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">پیشنهاد مکان جدید</div>
                            <div class="activityNumbers">مکان 10</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">نوشتن مقاله</div>
                            <div class="activityNumbers">مقاله 3</div>
                        </div>
                        <div class="activitiesLinesDiv">
                            <div class="activityTitle">معرفی دوستان</div>
                            <div class="activityNumbers">معرفی 7</div>
                        </div>
                    </div>
                </div>
                <div class="userProfilePicturesMainDiv rightColBoxes">
                    <div class="mainDivHeaderText">
                        <h3>عکس و تصاویر</h3>
                        <div onclick="showAllItems(this)">مشاهده همه</div>
                    </div>
                    <div class="picturesMainBox">
                        <div class="picturesDiv"></div>
                        <div class="picturesDiv"></div>
                        <div class="picturesDiv"></div>
                        <div class="picturesDiv"></div>
                        <div class="picturesDiv"></div>
                        <div class="picturesDiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <script>
        autosize(document.getElementsByClassName("inputBoxInputSearch"));

        function showAllItems(element) {
            $(element).parent().next().toggleClass('height-auto')
        }
    </script>
@stop