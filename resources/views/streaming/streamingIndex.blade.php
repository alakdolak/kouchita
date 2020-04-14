@extends('streaming.streamingLayout')


@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/streaming/mainStreaming.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/streaming/indexStreaming.css')}}">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/theme2/swiper.css')}}">

    <style>
    </style>

@endsection

@section('body')

    <div class="container mainShowBase">

        <div class="mainSlider">
            <div id="mainSlider" class="swiper-container backgroundColorForSlider">
                <div class="swiper-wrapper">

                    <div class="swiper-slide mobileHeight imgOfSliderBox">
                        <img src="https://static.koochita.com/_images/posts/85/1586599288-mainPic.jpg" class="resizeImgClass">
                        <div class="nowSeeThisVideoDiv">
                            <img src="{{URL::asset('images/streaming/playb.png')}}" class="nowSeeThisVideoButtonImage">
                            <a href="#" class="nowSeeThisVideoButton">
                                همین حالا ببینید
                            </a>
                        </div>
                        <div class="nowSeeThisVideoNameDiv">
                            <a href="#" class="nowSeeThisVideoName">
                                صحبت با محمد جواد در موضوع کرونا
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide mobileHeight imgOfSliderBox">
                        <img src="https://static.koochita.com/_images/posts/83/1586277150-mainPic.jpg" class="resizeImgClass">
                        <div class="nowSeeThisVideoDiv">
                            <img src="{{URL::asset('images/streaming/playb.png')}}" class="nowSeeThisVideoButtonImage">
                            <a href="#" class="nowSeeThisVideoButton">
                                همین حالا ببینید
                            </a>
                        </div>
                        <div class="nowSeeThisVideoNameDiv">
                            <a href="#" class="nowSeeThisVideoName">
                                2 صحبت با محمد جواد در موضوع کرونا
                            </a>
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
        <div class="pushTopMainSlider"></div>

        <div class="otherSection">
            <div class="headerWithLine">
                <div class="headerWithLineText">
                   آخرین ویدیو ها
                </div>
                <div class="headerWithLineLine"></div>
            </div>
            <div class="otherSectionBody">

                <div class="videoSuggestion">
                    <a href="#" class="videoSugPicSection">
                        <img src="https://static.koochita.com/_images/posts/5/mainPic.jpg" class="resizeImgClass videoSugPic">
                        <div class="overPicSug likeOverPic">
                            <div style="display: flex; margin-left: 10px;">
                                <span class="likeOverPicNum">100</span>
                                <span class="DisLikeIcon likeOverPicIcon"></span>
                            </div>
                            <div style="display: flex;">
                                <span class="likeOverPicNum">100</span>
                                <span class="LikeIcon likeOverPicIcon"></span>
                            </div>
                        </div>
                        <div class="overPicSug seenOverPic">
                            <span>100,000</span>
                            <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                        </div>
                        <div class="playIconDiv">
                            <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                        </div>
                    </a>
                    <div class="videoSugInfo">
                        <div class="videoSugUserPic">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                        </div>
                        <div class="videoSugUserInfo">
                            <a href="#" class="videoSugName">
                                صحبت های زنده ی محمد جواد
                            </a>
                            <div class="videoSugUserName">
                                shazdesina
                            </div>
                            <div class="videoSugTime">
                                10 ساعت پیش
                            </div>
                        </div>
                    </div>
                </div>

                <div class="videoSuggestion">
                    <a href="#" class="videoSugPicSection">
                        <img src="https://static.koochita.com/_images/posts/45/1585227039-mainPic.jpg" class="resizeImgClass videoSugPic">
                        <div class="overPicSug likeOverPic">
                            <div style="display: flex; margin-left: 10px;">
                                <span class="likeOverPicNum">100</span>
                                <span class="DisLikeIcon likeOverPicIcon"></span>
                            </div>
                            <div style="display: flex;">
                                <span class="likeOverPicNum">100</span>
                                <span class="LikeIcon likeOverPicIcon"></span>
                            </div>
                        </div>
                        <div class="overPicSug seenOverPic">
                            <span>100,000</span>
                            <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                        </div>
                        <div class="playIconDiv">
                            <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                        </div>
                    </a>
                    <div class="videoSugInfo">
                        <div class="videoSugUserPic">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                        </div>
                        <div class="videoSugUserInfo">
                            <a href="#" class="videoSugName">
                                صحبت های زنده ی محمد جواد
                            </a>
                            <div class="videoSugUserName">
                                shazdesina
                            </div>
                            <div class="videoSugTime">
                                10 ساعت پیش
                            </div>
                        </div>
                    </div>
                </div>

                <div class="videoSuggestion">
                    <a href="#" class="videoSugPicSection">
                        <img src="https://static.koochita.com/_images/posts/91/1586792425-mainPic.jpg" class="resizeImgClass videoSugPic">
                        <div class="overPicSug likeOverPic">
                            <div style="display: flex; margin-left: 10px;">
                                <span class="likeOverPicNum">100</span>
                                <span class="DisLikeIcon likeOverPicIcon"></span>
                            </div>
                            <div style="display: flex;">
                                <span class="likeOverPicNum">100</span>
                                <span class="LikeIcon likeOverPicIcon"></span>
                            </div>
                        </div>
                        <div class="overPicSug seenOverPic">
                            <span>100,000</span>
                            <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                        </div>
                        <div class="playIconDiv">
                            <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                        </div>
                    </a>
                    <div class="videoSugInfo">
                        <div class="videoSugUserPic">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                        </div>
                        <div class="videoSugUserInfo">
                            <a href="#" class="videoSugName">
                                صحبت های زنده ی محمد جواد
                            </a>
                            <div class="videoSugUserName">
                                shazdesina
                            </div>
                            <div class="videoSugTime">
                                10 ساعت پیش
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="otherSection">
            <div class="headerWithLine">
                <div class="headerWithLineText">
                    محبوب ها
                </div>
                <div class="headerWithLineLine"></div>
            </div>
            <div class="otherSectionBody">

                <div class="videoSuggestion">
                    <a href="#" class="videoSugPicSection">
                        <img src="https://static.koochita.com/_images/posts/5/mainPic.jpg" class="resizeImgClass videoSugPic">
                        <div class="overPicSug likeOverPic">
                            <div style="display: flex; margin-left: 10px;">
                                <span class="likeOverPicNum">100</span>
                                <span class="DisLikeIcon likeOverPicIcon"></span>
                            </div>
                            <div style="display: flex;">
                                <span class="likeOverPicNum">100</span>
                                <span class="LikeIcon likeOverPicIcon"></span>
                            </div>
                        </div>
                        <div class="overPicSug seenOverPic">
                            <span>100,000</span>
                            <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                        </div>
                        <div class="playIconDiv">
                            <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                        </div>
                    </a>
                    <div class="videoSugInfo">
                        <div class="videoSugUserPic">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                        </div>
                        <div class="videoSugUserInfo">
                            <a href="#" class="videoSugName">
                                صحبت های زنده ی محمد جواد
                            </a>
                            <div class="videoSugUserName">
                                shazdesina
                            </div>
                            <div class="videoSugTime">
                                10 ساعت پیش
                            </div>
                        </div>
                    </div>
                </div>

                <div class="videoSuggestion">
                    <a href="#" class="videoSugPicSection">
                        <img src="https://static.koochita.com/_images/posts/45/1585227039-mainPic.jpg" class="resizeImgClass videoSugPic">
                        <div class="overPicSug likeOverPic">
                            <div style="display: flex; margin-left: 10px;">
                                <span class="likeOverPicNum">100</span>
                                <span class="DisLikeIcon likeOverPicIcon"></span>
                            </div>
                            <div style="display: flex;">
                                <span class="likeOverPicNum">100</span>
                                <span class="LikeIcon likeOverPicIcon"></span>
                            </div>
                        </div>
                        <div class="overPicSug seenOverPic">
                            <span>100,000</span>
                            <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                        </div>
                        <div class="playIconDiv">
                            <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                        </div>
                    </a>
                    <div class="videoSugInfo">
                        <div class="videoSugUserPic">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                        </div>
                        <div class="videoSugUserInfo">
                            <a href="#" class="videoSugName">
                                صحبت های زنده ی محمد جواد
                            </a>
                            <div class="videoSugUserName">
                                shazdesina
                            </div>
                            <div class="videoSugTime">
                                10 ساعت پیش
                            </div>
                        </div>
                    </div>
                </div>

                <div class="videoSuggestion">
                    <a href="#" class="videoSugPicSection">
                        <img src="https://static.koochita.com/_images/posts/91/1586792425-mainPic.jpg" class="resizeImgClass videoSugPic">
                        <div class="overPicSug likeOverPic">
                            <div style="display: flex; margin-left: 10px;">
                                <span class="likeOverPicNum">100</span>
                                <span class="DisLikeIcon likeOverPicIcon"></span>
                            </div>
                            <div style="display: flex;">
                                <span class="likeOverPicNum">100</span>
                                <span class="LikeIcon likeOverPicIcon"></span>
                            </div>
                        </div>
                        <div class="overPicSug seenOverPic">
                            <span>100,000</span>
                            <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                        </div>
                        <div class="playIconDiv">
                            <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                        </div>
                    </a>
                    <div class="videoSugInfo">
                        <div class="videoSugUserPic">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                        </div>
                        <div class="videoSugUserInfo">
                            <a href="#" class="videoSugName">
                                صحبت های زنده ی محمد جواد
                            </a>
                            <div class="videoSugUserName">
                                shazdesina
                            </div>
                            <div class="videoSugTime">
                                10 ساعت پیش
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('script')
    <!-- Swiper JS -->
    <script src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>

    <script>
        // mainSlider
        new Swiper('#mainSlider', {
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 50000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection