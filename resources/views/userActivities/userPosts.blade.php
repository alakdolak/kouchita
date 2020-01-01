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
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/usersActivities.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}">

    {{--vr--}}

    {{--    @if(isset($video) && $video != null)--}}
    {{--        <link rel="stylesheet" href="{{URL::asset('vr2/video-js.css')}}">--}}
    {{--        <link rel="stylesheet" href="{{URL::asset('vr2/videojs-vr.css')}}">--}}
    {{--        <script src="{{URL::asset('vr2/video.js')}}"></script>--}}
    {{--        <script src="{{URL::asset('vr2/videojs-vr.js')}}"></script>--}}
    {{--    @endif--}}

@stop

@section('main')
    <div class="userProfilePageCoverImg"></div>
    <center class="mainBodyUserProfile userPosts">
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
                    <span class="showUsersPostsLink">پست‌ها</span>
                    <span class="showUsersPhotosAndVideosLink">عکس و فیلم</span>
                    <span class="showUsersQAndAsLink">سؤال‌ها و پاسخ‌ها</span>
                    <span class="showUsersArticlesLink">مقاله‌ها</span>
                    <span class="showUsersScores">امتیاز‌ها</span>
                    <span class="otherFilterChoices">سایر موارد</span>
                </div>
            </div>
            <div class="userProfileActivitiesDetailsMainDiv col-sm-8 col-xs-12">
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

                <div class="userProfilePostsMainDiv">
                    <div class="userProfilePostsSearchContainer">
                        <div class="inputBox">
                            <textarea class="inputBoxInput inputBoxInputSearch" type="text"
                                      placeholder="جستجو کنید"></textarea>
                        </div>
                        <span>نمایش تکی</span>
                        <span>نمایش جدولی</span>
                    </div>


                    <div class="col-xs-12 pd-0 float-right  postsMainDivInSpecificMode ">
                        <div class="col-xs-6 pd-0 pd-rt-5Imp">
                            <div class="col-xs-12 postMainDivShown float-right position-relative">
                                <div class="commentWriterDetailsShow">
                                    <div class="circleBase type2 commentWriterPicShow"></div>
                                    <div class="commentWriterExperienceDetails">
                                        <b class="userProfileName">shazdesina</b>
                                        <div>در
                                            <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                        </div>
                                        <div>
                                            هم اکنون - بیش از 23 ساعت پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="commentContentsShow position-relative">
                                    <p class="SummarizedPostTextShown">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        <span class="showMoreText" onclick="showMoreText(this)"></span>
                                    </p>
                                    <p class="completePostTextShown display-none">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع
                                        روستایی هستند، می توان
                                        گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش
                                        <span class="showLessText" onclick="showLessText(this)">کمتر</span>
                                    </p>
                                </div>
                                <div class="commentPhotosShow">
                                    <div class="photosCol col-xs-12">
                                        <div data-toggle="modal" data-target=".showingPhotosModal"></div>
                                        <div class="numberOfPhotosMainDiv">
                                            <div class="numberOfPhotos">31+</div>
                                            <div>عکس</div>
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
                            </div>
                            <div class="col-xs-12 postMainDivShown float-right position-relative">
                                <div class="commentWriterDetailsShow">
                                    <div class="circleBase type2 commentWriterPicShow"></div>
                                    <div class="commentWriterExperienceDetails">
                                        <b class="userProfileName">shazdesina</b>
                                        <div>در
                                            <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                        </div>
                                        <div>
                                            هم اکنون - بیش از 23 ساعت پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="commentContentsShow position-relative">
                                    <p class="SummarizedPostTextShown">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        <span class="showMoreText" onclick="showMoreText(this)"></span>
                                    </p>
                                    <p class="completePostTextShown display-none">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع
                                        روستایی هستند، می توان
                                        گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش
                                        <span class="showLessText" onclick="showLessText(this)">کمتر</span>
                                    </p>
                                </div>
                                <div class="commentPhotosShow">
                                    <div class="photosCol col-xs-12">
                                        <div data-toggle="modal" data-target=".showingPhotosModal"></div>
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
                            </div>
                        </div>
                        <div class="col-xs-6 pd-0 pd-lt-5Imp">

                            <div class="col-xs-12 postMainDivShown float-right position-relative">
                                <div class="commentWriterDetailsShow">
                                    <div class="circleBase type2 commentWriterPicShow"></div>
                                    <div class="commentWriterExperienceDetails">
                                        <b class="userProfileName">shazdesina</b>
                                        <div>در
                                            <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                        </div>
                                        <div>
                                            هم اکنون - بیش از 23 ساعت پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="commentContentsShow position-relative">
                                    <p class="SummarizedPostTextShown">
                                        سلام عالی بود.
                                    </p>
                                </div>
                                <div class="commentPhotosShow">
                                    <div class="quantityOfLikes">
                                        <span>31</span>
                                        نفر دوست داشتند،
                                        <span>31</span>
                                        نفر دوست نداشتند و
                                        <span>31</span>
                                        نفر نظر دادند.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 postMainDivShown float-right position-relative">
                                <div class="commentWriterDetailsShow">
                                    <div class="circleBase type2 commentWriterPicShow"></div>
                                    <div class="commentWriterExperienceDetails">
                                        <b class="userProfileName">shazdesina</b>
                                        <div>در
                                            <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                        </div>
                                        <div>
                                            هم اکنون - بیش از 23 ساعت پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="commentContentsShow position-relative">
                                    <p class="SummarizedPostTextShown">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        <span class="showMoreText" onclick="showMoreText(this)"></span>
                                    </p>
                                    <p class="completePostTextShown display-none">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع
                                        روستایی هستند، می توان
                                        گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش
                                        <span class="showLessText" onclick="showLessText(this)">کمتر</span>
                                    </p>
                                </div>
                                <div class="commentPhotosShow">
                                    <div class="photosCol col-xs-12">
                                        <div data-toggle="modal" data-target=".showingPhotosModal"></div>
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
                            </div>
                            <div class="col-xs-12 postMainDivShown float-right position-relative">
                                <div class="commentWriterDetailsShow">
                                    <div class="circleBase type2 commentWriterPicShow"></div>
                                    <div class="commentWriterExperienceDetails">
                                        <b class="userProfileName">shazdesina</b>
                                        <div>در
                                            <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                        </div>
                                        <div>
                                            هم اکنون - بیش از 23 ساعت پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="commentContentsShow position-relative">
                                    <p class="SummarizedPostTextShown">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        <span class="showMoreText" onclick="showMoreText(this)"></span>
                                    </p>
                                    <p class="completePostTextShown display-none">
                                        بسیاری از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از
                                        طریق اینترنت دریافت
                                        می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا
                                        خدمات مورد نیازشان
                                        اثرپذیری فراوانی دارد.
                                        با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع
                                        روستایی هستند، می توان
                                        گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش
                                        <span class="showLessText" onclick="showLessText(this)">کمتر</span>
                                    </p>
                                </div>
                                <div class="commentPhotosShow">
                                    <div class="quantityOfLikes">
                                        <span>31</span>
                                        نفر دوست داشتند،
                                        <span>31</span>
                                        نفر دوست نداشتند و
                                        <span>31</span>
                                        نفر نظر دادند.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 postMainDivShown float-right position-relative">
                                <div class="commentWriterDetailsShow">
                                    <div class="circleBase type2 commentWriterPicShow"></div>
                                    <div class="commentWriterExperienceDetails">
                                        <b class="userProfileName">shazdesina</b>
                                        <div>در
                                            <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                                        </div>
                                        <div>
                                            هم اکنون - بیش از 23 ساعت پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="commentContentsShow position-relative">
                                    <p class="SummarizedPostTextShown">
                                        سلام عالی بود.
                                    </p>
                                </div>
                                <div class="commentPhotosShow">
                                    <div class="quantityOfLikes">
                                        <span>31</span>
                                        نفر دوست داشتند،
                                        <span>31</span>
                                        نفر دوست نداشتند و
                                        <span>31</span>
                                        نفر نظر دادند.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="userProfileDetailsMainDiv col-sm-4 col-xs-12">
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
                        <div class="picturesDiv" data-toggle="modal" data-target=".showingPhotosModal"></div>
                        <div class="picturesDiv" data-toggle="modal" data-target=".showingPhotosModal"></div>
                        <div class="picturesDiv" data-toggle="modal" data-target=".showingPhotosModal"></div>
                        <div class="picturesDiv" data-toggle="modal" data-target=".showingPhotosModal"></div>
                        <div class="picturesDiv" data-toggle="modal" data-target=".showingPhotosModal"></div>
                        <div class="picturesDiv" data-toggle="modal" data-target=".showingPhotosModal"></div>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

    <script>
        autosize(document.getElementsByClassName("inputBoxInputSearch"));
        autosize(document.getElementsByClassName("inputBoxInputAnswer"));
        autosize(document.getElementsByClassName("inputBoxInputComment"));

        function showAllItems(element) {
            $(element).parent().next().toggleClass('height-auto')
        }
    </script>
    <script>
        function showMoreText(element) {
            $(element).parent().toggle();
            $(element).parent().next().toggle();
        }


        function showLessText(element) {
            $(element).parent().toggle();
            $(element).parent().prev().toggle();
        }
    </script>

@stop