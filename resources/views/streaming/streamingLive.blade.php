@extends('streaming.streamingLayout')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/streaming/showStreaming.css')}}">

    <style>
        video{
            width: 100%;
        }
        #videoThisVideo{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        #videoThisVideo > div{
            margin-bottom: 10px;
            width: 49%;
        }
    </style>
@endsection

@section('body')

    <div class="mainDivStream">
        <div class="container mainShowBase">

            <div class="videoInfos">
                <div class="videoInfosVideoName">
                    معرفی آئودی ای ترون اسپرت بک
                    <img class="float-left" src="{{URL::asset('images/streaming/live.png')}}">
                </div>
                <div class="row mainUserPicSection">
                    <div class="userPicDiv">
                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                    </div>
                    <div class="mainUserInfos">
                        <div class="mainUseruserName">
                            shazdesina
                        </div>
                        <div class="videoUploadTime">
                            هم اکنون
                        </div>
                    </div>
                </div>
            </div>

            <div class="liveComments">
                <div class="liveCommentsFirstLine">
                    <div class="liveCommentsTitle">
                        در گفتگو شرکت کنید
                    </div>
                    <div class="liveCommentStatistics">
                        <div class="liveCommentsQuantity liveCommentStatisticsDivs">
                            <div class="liveCommentsNums">31</div>
                            <div class="liveCommentsQuantityIcon"></div>
                        </div>
                        <div class="liveCommentWriters liveCommentStatisticsDivs">
                            <div class="liveCommentsNums">31</div>
                            <div class="liveCommentsWriterIcon"></div>
                        </div>
                    </div>
                </div>

                <div class="liveCommentsMainDiv">
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            شیا شتنیل نشت یای نشان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن تسای نتا منشای نتسا شنت یاشن تسا ینت شسا یمن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            شیا شان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            نت یاشن تسا ینت شسا یمن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            تسا ینت شسا یمن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            شیا شتنیل نشت یای نشان
                        </div>
                    </div>
                </div>

                <div class="commentInputSection">
                    <div class="userPicDiv">
                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                    </div>
                    <textarea class="commentInput" name="comment" id="comment" placeholder="شما چه نظری دارید؟" rows="1"></textarea>
                    <div class="commentInputSendButton">ارسال</div>
                </div>
            </div>

            <div class="moreInfoMainDiv">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        اطلاعات بیشتر
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>
                <div class="moreInfoEachItem">
                    <div class="mainDivImgMoreInfoItems">
                        <img>
                    </div>
                    <div class="moreInfoItemsDetails">
                        <div class="placeName">هتل کوثر</div>
                        <div class="placeRates">
                            <div class="rating_and_popularity">
                                <span class="header_rating">
                                   <div class="rs rating" rel="v:rating">
                                       <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">
                                               <span class="ui_bubble_rating bubble_30
{{--                                                    {{$avgRate}}0 --}}
                                                    font-size-16" property="ratingValue"
{{--                                                     content="{{$avgRate}}" alt='{{$avgRate}} of {{$avgRate}} bubbles'--}}
                                               ></span>
                                       </div>
                                   </div>
                                </span>
                                <span class="header_popularity popIndexValidation" id="scoreSpanHeader">
                                    <a>
{{--                                        {{$reviewCount}}--}}0
                                        نقد
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="placeState">استان:
                            <span>اصفهان</span>
                        </div>
                        <div class="placeCity">شهر:
                            <span>اصفهان</span>
                        </div>

                    </div>
                </div>
                <div class="moreInfoEachItem">
                    <div class="mainDivImgMoreInfoItems">
                        <img>
                    </div>
                    <div class="moreInfoItemsDetails">
                        <div class="placeName">هتل کوثر</div>
                        <div class="placeRates">
                            <div class="rating_and_popularity">
                                <span class="header_rating">
                                   <div class="rs rating" rel="v:rating">
                                       <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">
                                               <span class="ui_bubble_rating bubble_30
{{--                                                    {{$avgRate}}0 --}}
                                                    font-size-16" property="ratingValue"
{{--                                                     content="{{$avgRate}}" alt='{{$avgRate}} of {{$avgRate}} bubbles'--}}
                                               ></span>
                                       </div>
                                   </div>
                                </span>
                                <span class="header_popularity popIndexValidation" id="scoreSpanHeader">
                                    <a>
{{--                                        {{$reviewCount}}--}}0
                                        نقد
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="placeState">استان:
                            <span>اصفهان</span>
                        </div>
                        <div class="placeCity">شهر:
                            <span>اصفهان</span>
                        </div>

                    </div>
                </div>

                <div class="moreBtn">بیشتر</div>
            </div>

            <div class="fromThisPerson">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        از همین کاربر
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>

                <div id="videoThisVideo"></div>
            </div>

        </div>
        <div class="container mainShowBase">

            <div class="showVideo">
                <div id="46671937617"><script type="text/JavaScript" src="https://www.aparat.com/embed/BEpeL?data[rnddiv]=46671937617&data[responsive]=yes"></script></div>
            </div>

            <table style="width: 100%;" id="rooms-list"></table>

            <div class="toolSection">
                <div class="toolSectionButtons">
                    <div class="toolSectionButtonsCircle">
                        <span class="DisLikeIcon"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="LikeIcon"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="CommentIcon CommentIconSett"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="ShareIcon ShareIconSett"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="HeartIcon HeartIconSett"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="BookMarkIcon BookMarkIconSett"></span>
                    </div>
                </div>
                <div class="toolSectionInfos">
                    <div class="toolSectionInfosTab">
                        <span class="CommentIcon commentInfoTab"></span>
                        <span class="toolSectionInfosTabNumber">100,000</span>
                    </div>
                    <div class="toolSectionInfosTab">
                        <span class="LikeIcon likeInfoTab"></span>
                        <span class="toolSectionInfosTabNumber">100</span>
                    </div>
                    <div class="toolSectionInfosTab">
                        <span class="DisLikeIcon disLikeInfoTab"></span>
                        <span class="toolSectionInfosTabNumber">100,000,000</span>
                    </div>
                    <div class="toolSectionInfosTab">
                        <i class="fa fa-eye"></i>
                        {{--                    <span class="ViewIcon viewInfoTab"></span>--}}
                        <span class="toolSectionInfosTabNumber">100</span>
                    </div>
                </div>
            </div>

            <div class="descriptionSection">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        معرفی کلی
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>
                <div class="descriptionSectionBody">
                    لورم ایپسوم متن ساختگی
                    با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                    فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                    کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و م
                    تخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                    الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت
                    می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                    سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و
                    جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </div>

                <div class="moreBtn">بیشتر</div>
            </div>

            <div class="otherSection">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        شاید جالب باشد
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>

                <div class="otherSectionBody">

                    <div class="videoSuggestionSwiper swiper-container">

                        <div id="mebyInterestedVideo" class="swiper-wrapper">
                            {{--fill with js videoSuggestion()--}}
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                </div>
            </div>


{{--            <div class="maybeInterestingLives">--}}
{{--                <div class="headerWithLine">--}}
{{--                    <div class="headerWithLineText">--}}
{{--                        شاید جالب باشد--}}
{{--                    </div>--}}
{{--                    <div class="headerWithLineLine"></div>--}}
{{--                </div>--}}

{{--                <div class="interestingSlider">--}}
{{--                    <div class="videoSuggestionSwiper swiper-container">--}}

{{--                        <div id="mebyInterestedVideo" class="swiper-wrapper">--}}
{{--                            --}}{{--fill with js videoSuggestion()--}}
{{--                        </div>--}}

{{--                        <div class="swiper-button-next"></div>--}}
{{--                        <div class="swiper-button-prev"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

@endsection

@section('script')

    <script !src="">
        let nonPic = '{{URL::asset('_images/nopic/blank.jpg')}}';

        function videoSuggestion(){
            let pack = [
                {
                    id : 'video1',
                    name: 'صخبت با مخمد جواد',
                    url : '#',
                    img : 'https://static.koochita.com/_images/posts/5/mainPic.jpg',
                    like: 100,
                    dislike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
                {
                    id : 'video1',
                    name: 'صخبت با مخمد جواد',
                    url : '#',
                    img : 'https://static.koochita.com/_images/posts/91/1586792425-mainPic.jpg',
                    like: 100,
                    dislike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
                {
                    id : 'video1',
                    name: 'صخبت با مخمد جواد',
                    url : '#',
                    img : 'https://static.koochita.com/_images/posts/45/1585227039-mainPic.jpg',
                    like: 100,
                    dislike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
            ]

            createVideoSuggestionDiv(pack, 'mebyInterestedVideo');
            createVideoSuggestionDiv(pack, 'videoThisVideo');

        }
        videoSuggestion();


        var swiper = new Swiper('.videoSuggestionSwiper', {
            slidesPerGroup: 1,
            // width: 300,
            loop: true,
            loopFillGroupWithBlank: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                650: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                860: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1600: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                10000: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                }
            }
        });
    </script>

@endsection