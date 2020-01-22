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
    <div class="userQuestionsPage">
        <div class="userProfilePageCoverImg"></div>
        <center class="mainBodyUserProfile userQuestions">
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
            <div class="userProfileDetailsMainDiv col-sm-4 col-xs-12 float-right">
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

                <div class="userProfileQAndA">
                    <div class="userProfilePostsSearchContainer">
                        <div class="inputBox">
                            <textarea class="inputBoxInput inputBoxInputSearch" type="text"
                                      placeholder="جستجو کنید"></textarea>
                        </div>
                        <span>نمایش پاسخ‌ها</span>
                        <span>نمایش سؤال‌ها</span>
                        <div class="clear-both display-none"></div>
                        <span>نمایش همه</span>
                    </div>

                    <div class="answersBoxMainDiv">
                        <div class="answersOptionsBoxes answersActions" onclick="showAnswersActionBox(this)">
                            <span class="answersActionsIcon"></span>
                        </div>
                        <div class="questionsActionsMoreDetails display-none">
                            <span>گزارش پست</span>
                            <span>مشاهده صفحه شازده سینا</span>
                            <span>مشاهده تمامی پست‌ها</span>
                            <span>صفحه قوانین و مقررات</span>
                        </div>
                        {{--    <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">--}}
                        {{--        مشاهده کامل سؤال--}}
                        {{--    </div>--}}
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
                            بسیار از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از طریق اینترنت
                            دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا خدمات
                            مورد نیازشان اثرپذیری فراوانی دارد.
                            با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع روستایی هستند،
                            می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش کلیدی داشته باشد.
                        </div>
                        <div class="clear-both"></div>
                        <div class="questionSubMenuBar">
                            <div class="numberOfAnswers">
                                <span>31</span>
                                نفر پاسخ دادند
                            </div>
                            <div class="showAnswersToggle" onclick="showAllAnswers(this)">مشاهده پاسخ‌ها</div>
                            <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>
                        </div>
                        <div>
                            <div class="display-none">
                                <div class="answerPlaceMainDiv">
                                    <div class="circleBase type2 answerWriterProfilePic"></div>
                                    <div class="answerBoxText">
                                        <b class="replyWriterUsername">shazdesina</b>
                                        من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                                        متهم کنید.
                                        <div class="answerStatistics">
                                            <span class="numberOfDislikeAnswer">31</span>
                                            <span class="numberOfLikeAnswer">31</span>
                                        </div>
                                    </div>
                                    <div class="actionToAnswer">
                                        <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                            <span class="dislikeAnswer"></span>
                                            <span class="dislikeAnswerClicked display-none"></span>
                                        </div>
                                        <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                            <span class="likeAnswer"></span>
                                            <span class="likeAnswerClicked display-none"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="newAnswerPlaceMainDiv">
                                        <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                        <div class="inputBox">
                                            <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                            <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                      placeholder="شما چه نظری دارید؟"></textarea>
                                            <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="display-none theOne">
                                <div class="answerPlaceMainDiv">
                                    <div class="seePrevAnswers" onclick="seePrevAnswers(this)">مشاهده پاسخ‌ها پیش از
                                        این
                                    </div>
                                    <div class="circleBase type2 answerWriterProfilePic"></div>
                                    <div class="answerBoxText">
                                        <b class="replyWriterUsername">shazdesina</b>
                                        من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                                        متهم کنید.
                                        <div class="answerStatistics">
                                            <span class="numberOfDislikeAnswer">31</span>
                                            <span class="numberOfLikeAnswer">31</span>
                                        </div>
                                    </div>
                                    <div class="actionToAnswer">
                                        <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                            <span class="dislikeAnswer"></span>
                                            <span class="dislikeAnswerClicked display-none"></span>
                                        </div>
                                        <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                            <span class="likeAnswer"></span>
                                            <span class="likeAnswerClicked display-none"></span>
                                        </div>
                                    </div>
                                    <div class="seeNextAnswers" onclick="seeNextAnswers(this)">مشاهده پاسخ‌ها پس از
                                        این
                                    </div>
                                </div>
                                <div class="">
                                    <div class="newAnswerPlaceMainDiv">
                                        <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                        <div class="inputBox">
                                            <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                            <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                      placeholder="شما چه نظری دارید؟"></textarea>
                                            <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="display-none">
                                <div class="answerPlaceMainDiv">
                                    <div class="circleBase type2 answerWriterProfilePic"></div>
                                    <div class="answerBoxText">
                                        <b class="replyWriterUsername">shazdesina</b>
                                        من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                                        متهم کنید.
                                        <div class="answerStatistics">
                                            <span class="numberOfDislikeAnswer">31</span>
                                            <span class="numberOfLikeAnswer">31</span>
                                        </div>
                                    </div>
                                    <div class="actionToAnswer">
                                        <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                            <span class="dislikeAnswer"></span>
                                            <span class="dislikeAnswerClicked display-none"></span>
                                        </div>
                                        <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                            <span class="likeAnswer"></span>
                                            <span class="likeAnswerClicked display-none"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="newAnswerPlaceMainDiv">
                                        <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                        <div class="inputBox">
                                            <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                            <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                      placeholder="شما چه نظری دارید؟"></textarea>
                                            <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="display-none last">
                            <div class="newAnswerPlaceMainDiv">
                                <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                <div class="inputBox">
                                    <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                    <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                              placeholder="شما چه نظری دارید؟"></textarea>
                                    <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>

                    <div class="answersBoxMainDiv">
                        <div class="answersOptionsBoxes answersActions" onclick="showAnswersActionBox(this)">
                            <span class="answersActionsIcon"></span>
                        </div>
                        <div class="questionsActionsMoreDetails display-none">
                            <span>گزارش پست</span>
                            <span>مشاهده صفحه شازده سینا</span>
                            <span>مشاهده تمامی پست‌ها</span>
                            <span>صفحه قوانین و مقررات</span>
                        </div>
                        {{--    <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">--}}
                        {{--        مشاهده کامل سؤال--}}
                        {{--    </div>--}}
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
                            بسیار از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از طریق اینترنت
                            دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا خدمات
                            مورد نیازشان اثرپذیری فراوانی دارد.
                            با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع روستایی هستند،
                            می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش کلیدی داشته باشد.
                        </div>
                        <div class="clear-both"></div>
                        <div class="questionSubMenuBar">
                            <div class="numberOfAnswers">
                                <span>31</span>
                                نفر پاسخ دادند
                            </div>
                            <div class="showAnswersToggle" onclick="showAllAnswers(this)">مشاهده پاسخ‌ها</div>
                            <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>
                        </div>
                        <div>
                            <div class="display-none">
                                <div class="answerPlaceMainDiv">
                                    <div class="circleBase type2 answerWriterProfilePic"></div>
                                    <div class="answerBoxText">
                                        <b class="replyWriterUsername">shazdesina</b>
                                        من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                                        متهم کنید.
                                        <div class="answerStatistics">
                                            <span class="numberOfDislikeAnswer">31</span>
                                            <span class="numberOfLikeAnswer">31</span>
                                        </div>
                                    </div>
                                    <div class="actionToAnswer">
                                        <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                            <span class="dislikeAnswer"></span>
                                            <span class="dislikeAnswerClicked display-none"></span>
                                        </div>
                                        <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                            <span class="likeAnswer"></span>
                                            <span class="likeAnswerClicked display-none"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="newAnswerPlaceMainDiv">
                                        <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                        <div class="inputBox">
                                            <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                            <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                      placeholder="شما چه نظری دارید؟"></textarea>
                                            <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="display-none theOne">
                                <div class="answerPlaceMainDiv">
                                    <div class="seePrevAnswers" onclick="seePrevAnswers(this)">مشاهده پاسخ‌ها پیش از
                                        این
                                    </div>
                                    <div class="circleBase type2 answerWriterProfilePic"></div>
                                    <div class="answerBoxText">
                                        <b class="replyWriterUsername">shazdesina</b>
                                        من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                                        متهم کنید.
                                        <div class="answerStatistics">
                                            <span class="numberOfDislikeAnswer">31</span>
                                            <span class="numberOfLikeAnswer">31</span>
                                        </div>
                                    </div>
                                    <div class="actionToAnswer">
                                        <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                            <span class="dislikeAnswer"></span>
                                            <span class="dislikeAnswerClicked display-none"></span>
                                        </div>
                                        <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                            <span class="likeAnswer"></span>
                                            <span class="likeAnswerClicked display-none"></span>
                                        </div>
                                    </div>
                                    <div class="seeNextAnswers" onclick="seeNextAnswers(this)">مشاهده پاسخ‌ها پس از
                                        این
                                    </div>
                                </div>
                                <div class="">
                                    <div class="newAnswerPlaceMainDiv">
                                        <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                        <div class="inputBox">
                                            <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                            <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                      placeholder="شما چه نظری دارید؟"></textarea>
                                            <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="display-none">
                                <div class="answerPlaceMainDiv">
                                    <div class="circleBase type2 answerWriterProfilePic"></div>
                                    <div class="answerBoxText">
                                        <b class="replyWriterUsername">shazdesina</b>
                                        من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                                        متهم کنید.
                                        <div class="answerStatistics">
                                            <span class="numberOfDislikeAnswer">31</span>
                                            <span class="numberOfLikeAnswer">31</span>
                                        </div>
                                    </div>
                                    <div class="actionToAnswer">
                                        <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                            <span class="dislikeAnswer"></span>
                                            <span class="dislikeAnswerClicked display-none"></span>
                                        </div>
                                        <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                            <span class="likeAnswer"></span>
                                            <span class="likeAnswerClicked display-none"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="newAnswerPlaceMainDiv">
                                        <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                        <div class="inputBox">
                                            <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                            <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                                      placeholder="شما چه نظری دارید؟"></textarea>
                                            <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="display-none last">
                            <div class="newAnswerPlaceMainDiv">
                                <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                                <div class="inputBox">
                                    <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                    <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                              placeholder="شما چه نظری دارید؟"></textarea>
                                    <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </center>
    </div>

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
        function showAnswersActionBox(element) {
            $(element).next().toggle() ,
                $(element).toggleClass("bg-color-darkgrey")
        }

        function showAllAnswers(element) {
            $(element).parent().next().children('div.theOne').not('div.last').toggle()
        }

        function replyToAnswers(element) {
            $(element).parent().siblings("div.last").toggle();
            $(element).parent().siblings('div.last').children().toggleClass('mg-tp-0')
        }

        function dislikeTheAnswers(element) {
            $(element).children().toggle(),
                $(element).toggleClass('dark-red')
        }

        function likeTheAnswers(element) {
            $(element).children().toggle(),
                $(element).toggleClass('color-red')
        }

        function seePrevAnswers(element) {
            $(element).parent().parent().prevAll().toggle()
        }

        function seeNextAnswers(element) {
            $(element).parent().parent().nextAll().toggle()
        }

    </script>

@stop