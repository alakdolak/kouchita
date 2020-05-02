@extends('streaming.streamingLayout')


@section('head')

    <link rel="stylesheet" href="{{URL::asset('css/streaming/indexStreaming.css')}}">

    <style>
        .videoList{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .videoSuggestion{
            margin: 10px 5px;
        }
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

                <div id="lastVideosDiv" class="videoList">
                    {{--fill with js lastVideoSuggestion()--}}
                </div>

{{--                <div class="videoSuggestionSwiper swiper-container">--}}

{{--                    <div id="lastVideosDiv" class="swiper-wrapper">--}}
{{--                        --}}{{--fill with js lastVideoSuggestion()--}}
{{--                    </div>--}}

{{--                    <div class="swiper-button-next"></div>--}}
{{--                    <div class="swiper-button-prev"></div>--}}
{{--                </div>--}}
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
                <div class="videoSuggestionSwiper swiper-container">

                    <div id="topVideosDiv" class="swiper-wrapper">
                        {{--fill with js topVideoSuggenstion()--}}
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <!-- Swiper JS -->

    <script>
        let nonPic = '{{URL::asset('_images/nopic/blank.jpg')}}';
        let videos = {!! $videos !!};

        function lastVideoSuggestion(){
            let pack = [];
            for(let i = 0; i < videos.length; i++){
                let p = {
                    id : videos[i]['id'],
                    name: videos[i]['name'],
                    url : '#',
                    img : videos[i]['pic'],
                    like: 0,
                    dislike: 0,
                    see : videos[i]['seen'],
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                }
                pack.push(p);
            }

            createVideoSuggestionDiv(pack, 'lastVideosDiv');
        }
        lastVideoSuggestion();

        function topVideoSuggenstion(){
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
            createVideoSuggestionDiv(pack, 'topVideosDiv');
        }
        topVideoSuggenstion();

        var swipersuggestion = new Swiper('.videoSuggestionSwiper', {
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
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                10000: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                }
            }
        });

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