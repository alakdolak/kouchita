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
    <title>{{$place->name}} | {{$city->name}} | کوچیتا</title>
@stop

@section('meta')
    <meta name="keywords" content="{{$place->keyword}}">
    <meta property="og:description" content="{{$place->meta}}"/>
    @foreach($place->tags as $item)
        <meta property="article:tag" content="{{$item}}"/>
    @endforeach
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="{{$place->meta}}"/>
    <meta name="twitter:title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>
    <meta property="og:url" content="{{Request::url()}}"/>
    @if(count($photos) > 0)
        <meta property="og:image" content="{{$photos[0]}}"/>
        <meta property="og:image:secure_url" content="{{$photos[0]}}"/>
        <meta property="og:image:width" content="550"/>
        <meta property="og:image:height" content="367"/>
        <meta name="twitter:image" content="{{$photos[0]}}"/>
    @endif
    <meta content="article" property="og:type"/>
    <meta property="og:title" content="{{$place->name}} | {{$city->name}} | کوچیتا"/>
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
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/hotelDetailAllReviewsAndQuestions.css')}}">
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

    <div class="allQuestionsGrid">

        <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic position-relative">


            @include('layouts.placeMainBodyHeader')
        </div>

        <div id="MAINWRAP" class="
            full_meta_photos_v3  full_meta_photos_v4  big_pic_mainwrap_tweaks horizontal_xsell ui_container is-mobile position-relative">
            <div id="MAIN" class="Hotel_Review prodp13n_jfy_overflow_visible position-relative">
                <div id="BODYCON" ng-app="mainApp"
                     class="col easyClear bodLHN poolB adjust_padding new_meta_chevron new_meta_chevron_v2 position-relative">

                    <script>
                        if($(window).width() < 630) {
                            $('.tabLinkMainWrapMainDivMobile').affix({offset: {top: 930}});
                        }
                    </script>

                    <div class="clear-both"></div>

                    <div class="questionsFiltrationBarToggle col-md-8 col-xs-12 pd-0">
                        <div class="questionsMainFiltrationBar">
                            <span>نمایش بر اساس</span>
                            <span>جدیدترین‌ها</span>
                            <span>قدمی‌ترین‌ها</span>
                            <span>بهترین‌ها</span>
                            <span>داغ‌ترین‌ها</span>
                            <span>بدترین‌ها</span>
                            <span>بیشترین همراهان</span>
                            <span>پست‌ها</span>
                        </div>
                    </div>

                    <div class="adsToggleQuestions1 col-xs-4 float-right">
                        <center class="adsMainDiv mg-tp-0">
                            <div class="adsMainDivHeader">تبلیغات</div>
                            <img src="{{"../../../public/images/Chromite.jpg"}}" alt="">
                        </center>
                    </div>

                    <div class="QAndAMainDiv col-md-8 col-xs-12 float-right">

                        <div class="mainDivQuestions">

                            <div class="QAndAMainDivHeader">
                                <h3>سؤال و جواب</h3>
                            </div>
                            <div class="askQuestionMainDiv">
                                <div class="newQuestionContainer">
                                    <b>
                                        سؤلات خود را بپرسید تا با کمک دوستانتان آگاهانه‌تر سفر کنید. همچنین می‌توانید با
                                        پاسخ یه سؤالات دوستانتان علاوه بر دریافت امتیاز، اطلاعات خود را به اشتراک
                                        بگذارید.
                                    </b>
                                    <div>
                                        در حال حاضر
                                        <span class="color-blue">1340</span>
                                        سؤال
                                        <span class="color-blue">560</span>
                                        پاسخ موجود می‌باشد.
                                    </div>
                                    <a class="seeAllQMainLink" href="#taplc_global_nav_links_0">
                                        <div class="seeAllQLink display-inline-block float-right direction-rtl dark-blue">
                                            بازگشت به صفحه اصلی
                                        </div>
                                    </a>
                                    <div class="clear-both"></div>
                                    <div class="newQuestionMainDiv">
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
                                    <div class="answersWriterDetailsShow">
                                        <div class="circleBase type2 answersWriterPicShow"></div>
                                        <div class="answersWriterExperienceDetails">
                                            <b class="userProfileNameAnswers">shazdesina</b>
                                            <div class="clear-both display-none"></div>
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

                </div>
            </div>
        </div>

    </div>

    <script>

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
        var likeReviewUrl = '{{route('likeLog')}}';
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