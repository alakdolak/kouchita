@extends('streaming.layout.streamingLayout')


@section('head')

    <link rel="stylesheet" href="{{URL::asset('css/streaming/indexStreaming.css')}}">

    <style>
        .allVideo{
            z-index: 1;
            position: absolute;
            left: -2px;
            top: -20px;
            padding: 10px;
            background-color: #3a3a3a;
            cursor: pointer;
            color: #fcc156;
        }
    </style>
@endsection

@section('body')

    <div class="container mainShowBase">

        <div class="mainSlider">
            <div id="mainSlider" class="swiper-container backgroundColorForSlider">
                <div class="swiper-wrapper">

                    <div class="swiper-slide mobileHeight imgOfSliderBox">
                        <img src="{{URL::asset('images/streaming/liveBanner.jpg')}}" class="resizeImgClass">
                        <div class="nowSeeThisVideoDiv">
                            <img src="{{URL::asset('images/streaming/playb.png')}}" class="nowSeeThisVideoButtonImage">
                            <a href="#" class="nowSeeThisVideoButton">
                                همین حالا ببینید
                            </a>
                        </div>
                        <div class="nowSeeThisVideoNameDiv">
                            <a href="#" class="nowSeeThisVideoName">
                                گفتگوی زنده
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
                <div class="videoSuggestionSwiper swiper-container">

                    <div id="lastVideosDiv" class="swiper-wrapper">
{{--                        fill with js lastVideoSuggestion()--}}
{{--                        streaming.videoSuggestion--}}
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
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
                <div class="videoSuggestionSwiper swiper-container">

                    <div id="topVideosDiv" class="swiper-wrapper">
                        {{--fill with js topVideoSuggenstion()--}}
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

        @foreach($videoCategory as $cat)
            @if(count($cat->video) > 0)
                <div class="otherSection">
                    <div class="headerWithLine">
                        <div class="headerWithLineText">
                            {{$cat->name}}
                        </div>
                        <div class="headerWithLineLine"></div>

                        <div class="allVideo">
                            مشاهده همه
                        </div>
                    </div>
                    <div class="otherSectionBody">
                        <div class="videoSuggestionSwiper swiper-container">

                            <div id="catVideoDiv_{{$cat->id}}" class="swiper-wrapper">
                                {{--fill with js topVideoSuggenstion()--}}
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

@endsection

@section('script')
    <!-- Swiper JS -->

    <script>
        let nonPic = '{{URL::asset('_images/nopic/blank.jpg')}}';
        let lastVideos = {!! $lastVideos !!};
        let videoCategory = {!! $videoCategory !!};

        createVideoSuggestionDiv(lastVideos, 'lastVideosDiv');

        function categoryVideoSuggestion(){
            for(let j = 0; j < videoCategory.length; j++)
                createVideoSuggestionDiv(videoCategory[j].video, 'catVideoDiv_' + videoCategory[j]['id']);
        }
        categoryVideoSuggestion();

        var swipersuggestion = new Swiper('.videoSuggestionSwiper', {
            slidesPerGroup: 1,
            spaceBetween: 5,
            loop: true,
            // autoplay: {
                // delay: 3000,
                // disableOnInteraction: false,
            // },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                700: {
                    slidesPerView: 2,
                },
                900: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
                10000: {
                    slidesPerView: 5,
                }
            },
            on: {
                init: function () {
                    setTimeout(function(){
                        resizeFitImg('resizeImgClass');
                    },300);
                },
                slideChange: function(){
                    resizeFitImg('resizeImgClass');
                }
            },
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