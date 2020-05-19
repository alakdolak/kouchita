@extends('streaming.streamingLayout')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/streaming/showStreaming.css')}}">

    <link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>


    <style>
        /*video{*/
        /*    width: 100%;*/
        /*}*/
        #videoThisVideo{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-height: 530px;
            overflow: auto;
        }
        #videoThisVideo > div{
            margin-bottom: 10px;
            width: 49%;
        }

        .video_1-dimensions {
            width: 100%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video-js .vjs-big-play-button {
            position: relative;
        }

    </style>
@endsection

@section('body')

    <div class="mainDivStream">
        <div class="container mainShowBase">
            @if($data['haveVideo'])
                <div class="liveInfosAndComments">
                    <div class="videoInfos">
                        <div class="videoInfosVideoName">
                            {{$data['title']}}
                            <img class="float-left" src="{{URL::asset('images/streaming/live.png')}}">
                        </div>
                        <div class="row mainUserPicSection">
                            <div class="userPicDiv">
                                <img src="{{$data['userPic']}}" alt="koochita">
                            </div>
                            <div class="mainUserInfos">
                                <div class="mainUseruserName">
                                    {{isset($data['user']) && $data['user'] != '' ? $data['user']->username : ''}}
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
                                <div class="eachLiveCommentTitle">
                                    <div class="userPicDiv">
                                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                    </div>
                                    <div class="mainUserInfos">
                                        <div class="mainUseruserName">
                                            shazdesina
                                        </div>
                                    </div>
                                </div>
                                <div class="liveCommentContents">
                                    شیا شتنیل نشت یای نشان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن تسای نتا منشای نتسا شنت یاشن تسا ینت شسا یمن
                                </div>
                            </div>
                            <div class="eachLiveCommentMainDiv">
                                <div class="eachLiveCommentTitle">
                                    <div class="userPicDiv">
                                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                    </div>
                                    <div class="mainUserInfos">
                                        <div class="mainUseruserName">
                                            shazdesina
                                        </div>
                                    </div>
                                </div>
                                <div class="liveCommentContents">
                                    شیا شان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن
                                </div>
                            </div>
                            <div class="eachLiveCommentMainDiv">
                                <div class="eachLiveCommentTitle">
                                    <div class="userPicDiv">
                                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                    </div>
                                    <div class="mainUserInfos">
                                        <div class="mainUseruserName">
                                            shazdesina
                                        </div>
                                    </div>
                                </div>
                                <div class="liveCommentContents">
                                    نت یاشن تسا ینت شسا یمن
                                </div>
                            </div>
                            <div class="eachLiveCommentMainDiv">
                                <div class="eachLiveCommentTitle">
                                    <div class="userPicDiv">
                                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                    </div>
                                    <div class="mainUserInfos">
                                        <div class="mainUseruserName">
                                            shazdesina
                                        </div>
                                    </div>
                                </div>
                                <div class="liveCommentContents">
                                    تسا ینت شسا یمن
                                </div>
                            </div>
                            <div class="eachLiveCommentMainDiv">
                                <div class="eachLiveCommentTitle">
                                    <div class="userPicDiv">
                                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                    </div>
                                    <div class="mainUserInfos">
                                        <div class="mainUseruserName">
                                            shazdesina
                                        </div>
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
                </div>
            @endif
        </div>

        <div class="container mainShowBase">
            <div class="showVideo">
                <div class="videoContainer">
                    @if($data['haveVideo'] == true)
                        <video id="video_1" class="video-js playads" controls style="width: 100%" data-setup='{"fluid": true}'></video>

                        <script>
                            var myPlayer = videojs('video_1', {autoplay: 'any'});
                            myPlayer.src({
                                src: 'https://streaming.koochita.com/hls/{{$room}}.m3u8',
                                type: 'application/x-mpegURL',
                                withCredentials: false
                            });
                        </script>
                    @else
                        <img src="{{URL::asset('images/streaming/liveBanner.jpg')}}" style="width: 100%">
                    @endif
                    <div class="liveCommentsOnFS display-none">

                        <div class="videoInfos">
                            <div class="videoInfosVideoName">
                                NAME
                                <img class="float-left" src="{{URL::asset('images/streaming/live.png')}}">
                            </div>
                            <div class="row mainUserPicSection">
                                <div class="userPicDiv">
                                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                </div>
                                <div class="mainUserInfos">
                                    <div class="mainUseruserName">
                                        koochita
                                    </div>
                                    <div class="videoUploadTime">
                                        هم اکنون
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="liveCommentsToggleBar" onclick="liveCMToggle(this)">
                            <div class="textToggle">نمایش پنل گفتگو</div>
                            <div class="iconToggle glyphicon glyphicon-chevron-down"></div>
                        </div>

                        <div class="liveComments display-none">
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
                                    <div class="eachLiveCommentTitle">
                                        <div class="userPicDiv">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <div class="mainUserInfos">
                                            <div class="mainUseruserName">
                                                shazdesina
                                            </div>
                                        </div>
                                    </div>
                                    <div class="liveCommentContents">
                                        شیا شتنیل نشت یای نشان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن تسای نتا منشای نتسا شنت یاشن تسا ینت شسا یمن
                                    </div>
                                </div>
                                <div class="eachLiveCommentMainDiv">
                                    <div class="eachLiveCommentTitle">
                                        <div class="userPicDiv">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <div class="mainUserInfos">
                                            <div class="mainUseruserName">
                                                shazdesina
                                            </div>
                                        </div>
                                    </div>
                                    <div class="liveCommentContents">
                                        شیا شان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن
                                    </div>
                                </div>
                                <div class="eachLiveCommentMainDiv">
                                    <div class="eachLiveCommentTitle">
                                        <div class="userPicDiv">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <div class="mainUserInfos">
                                            <div class="mainUseruserName">
                                                shazdesina
                                            </div>
                                        </div>
                                    </div>
                                    <div class="liveCommentContents">
                                        نت یاشن تسا ینت شسا یمن
                                    </div>
                                </div>
                                <div class="eachLiveCommentMainDiv">
                                    <div class="eachLiveCommentTitle">
                                        <div class="userPicDiv">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <div class="mainUserInfos">
                                            <div class="mainUseruserName">
                                                shazdesina
                                            </div>
                                        </div>
                                    </div>
                                    <div class="liveCommentContents">
                                        تسا ینت شسا یمن
                                    </div>
                                </div>
                                <div class="eachLiveCommentMainDiv">
                                    <div class="eachLiveCommentTitle">
                                        <div class="userPicDiv">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <div class="mainUserInfos">
                                            <div class="mainUseruserName">
                                                shazdesina
                                            </div>
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

                    </div>
                </div>
            </div>
            <script>
                function liveCMToggle(element) {
                    $(element).next().toggle()
                }
            </script>


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

            <div class="liveInfosAndComments hideOnWide">
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
                            <div class="eachLiveCommentTitle">
                                <div class="userPicDiv">
                                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                </div>
                                <div class="mainUserInfos">
                                    <div class="mainUseruserName">
                                        shazdesina
                                    </div>
                                </div>
                            </div>
                            <div class="liveCommentContents">
                                شیا شتنیل نشت یای نشان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن تسای نتا منشای نتسا شنت یاشن تسا ینت شسا یمن
                            </div>
                        </div>
                        <div class="eachLiveCommentMainDiv">
                            <div class="eachLiveCommentTitle">
                                <div class="userPicDiv">
                                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                </div>
                                <div class="mainUserInfos">
                                    <div class="mainUseruserName">
                                        shazdesina
                                    </div>
                                </div>
                            </div>
                            <div class="liveCommentContents">
                                شیا شان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن
                            </div>
                        </div>
                        <div class="eachLiveCommentMainDiv">
                            <div class="eachLiveCommentTitle">
                                <div class="userPicDiv">
                                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                </div>
                                <div class="mainUserInfos">
                                    <div class="mainUseruserName">
                                        shazdesina
                                    </div>
                                </div>
                            </div>
                            <div class="liveCommentContents">
                                نت یاشن تسا ینت شسا یمن
                            </div>
                        </div>
                        <div class="eachLiveCommentMainDiv">
                            <div class="eachLiveCommentTitle">
                                <div class="userPicDiv">
                                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                </div>
                                <div class="mainUserInfos">
                                    <div class="mainUseruserName">
                                        shazdesina
                                    </div>
                                </div>
                            </div>
                            <div class="liveCommentContents">
                                تسا ینت شسا یمن
                            </div>
                        </div>
                        <div class="eachLiveCommentMainDiv">
                            <div class="eachLiveCommentTitle">
                                <div class="userPicDiv">
                                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                </div>
                                <div class="mainUserInfos">
                                    <div class="mainUseruserName">
                                        shazdesina
                                    </div>
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
            </div>

            @if($data['desc'] != '')
                <div class="descriptionSection">
                    <div class="headerWithLine">
                        <div class="headerWithLineText">
                            معرفی کلی
                        </div>
                        <div class="headerWithLineLine"></div>
                    </div>
                    <div class="descriptionSectionBody">
                        {{$data['desc']}}
                    </div>
    {{--                <div class="moreBtn">بیشتر</div>--}}
                </div>
            @endif

            <div class="moreInfoMainDiv hideOnWide">
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

            <div class="fromThisPerson hideOnWide">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        از همین کاربر
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>

                <div id="videoThisVideo"></div>
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
                    title: 'صخبت با مخمد جواد',
                    url : '#',
                    pic : 'https://static.koochita.com/_images/posts/5/mainPic.jpg',
                    like: 100,
                    disLike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
                {
                    id : 'video1',
                    title: 'صخبت با مخمد جواد',
                    url : '#',
                    pic : 'https://static.koochita.com/_images/posts/91/1586792425-mainPic.jpg',
                    like: 100,
                    disLike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
                {
                    id : 'video1',
                    title: 'صخبت با مخمد جواد',
                    url : '#',
                    pic : 'https://static.koochita.com/_images/posts/45/1585227039-mainPic.jpg',
                    like: 100,
                    disLike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
            ]

            // createVideoSuggestionDiv(pack, 'mebyInterestedVideo');
            // createVideoSuggestionDiv(pack, 'videoThisVideo');

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

    <script>
        $(document).ready(function(){
            var videotag = $('.playads');

            // $(".liveCommentsOnFS").appendTo($('#video_1'));
            //
            // myPlayer.on('fullscreenchange', function() {
            //     $('.liveCommentsOnFS').toggle();
            // });
        });
    </script>

@endsection
