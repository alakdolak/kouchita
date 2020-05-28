@extends('streaming.layout.streamingLayout')


@section('head')

    <link rel="stylesheet" href="{{URL::asset('css/streaming/indexStreaming.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/streaming/pages/mainList.css')}}">

    <style>
        .overMainPicDiv{
            position: absolute;
            display: flex;
            align-items: center;
            font-size: 25px;
            top: 10vh;
            right: 100px;
        }
        .overMainPicPic{
            width: 80px;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 50%;
            margin-left: 15px;
        }
        .overMainPicText{
            color: white;
        }
        .allVideoList{
            display: flex;
            flex-wrap: wrap;
            padding: 10px 0px;
            margin: 0 auto;
        }
        .videoInList{
            margin: 5px 2px ;
        }

    </style>
@endsection

@section('body')

    <div class="container mainShowBase">

        <div class="mainSlider">
            <div id="mainSlider" class="swiper-container backgroundColorForSlider">
                <img src="https://www.aparat.com/public/public/images/etc/category/5_pattern.jpg?29" style="width: 100%">
                <div class="overMainPicDiv">
                    <div class="overMainPicPic">
                        <img class="resizeImgClass" src="{{$content->icon}}" style="width: 100%">
                    </div>
                    <div class="overMainPicText">
                        {{$content->name}}
                    </div>
                </div>
            </div>
        </div>

        @if(isset($content->lastVideo))
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

                            {{--this bellow code only for not empty in begining and auto deleted--}}
                            <div class="swiper-slide videoSuggestion">
                                <div class="videoSuggPlaceHolderDiv" style=" width: 100%;">
                                    <div class="videoSugPicSection placeHolderAnime"></div>
                                    <div class="videoSugInfo">
                                        <div class="videoSugUserInfo videoSugUserInfoPlaceHolder">
                                            <div class="videoSugName videoSuggNamePlaceHolder placeHolderAnime" style="height: 15px"></div>
                                        </div>

                                        <div class="videoSugUserPic">
                                            <div class="videoSugUserPicDiv placeHolderAnime"></div>
                                            <div class="videoUserInfoName">
                                                <div class="videoSugUserName videoSuggNamePlaceHolder placeHolderAnime" style="margin-bottom: 5px"></div>
                                                <div class="videoSugTime videoSuggNamePlaceHolder placeHolderAnime"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(isset($content->subs))
            @foreach($content->subs as $cont)
            @if(count($cont->video) > 0)
                <div class="otherSection">
                    <div class="headerWithLine">
                        <div class="headerWithLineText">
                            @if(isset($cont->icon))
                                <img src="{{$cont->icon}}" style="width: 30px;">
                            @endif
                            {{$cont->name}}
                        </div>
                        <div class="headerWithLineLine"></div>

                        <a href="{{route('streaming.list', ['kind' => 'category', 'value' => $cont->id])}}" class="allVideoButton">
                            مشاهده همه
                        </a>
                    </div>
                    <div class="otherSectionBody">
                        <div id="swiperCategory_{{$cont->id}}" class="videoSuggestionSwiper swiper-container">

                            <div id="catVideoDiv_{{$cont->id}}" class="swiper-wrapper">
                                {{--fill with js topVideoSuggenstion()--}}

                                {{--this bellow code only for not empty in begining and auto deleted--}}
                                <div class="swiper-slide videoSuggestion">
                                    <div class="videoSuggPlaceHolderDiv" style=" width: 100%;">
                                        <div class="videoSugPicSection placeHolderAnime"></div>
                                        <div class="videoSugInfo">
                                            <div class="videoSugUserInfo videoSugUserInfoPlaceHolder">
                                                <div class="videoSugName videoSuggNamePlaceHolder placeHolderAnime" style="height: 15px"></div>
                                            </div>

                                            <div class="videoSugUserPic">
                                                <div class="videoSugUserPicDiv placeHolderAnime"></div>
                                                <div class="videoUserInfoName">
                                                    <div class="videoSugUserName videoSuggNamePlaceHolder placeHolderAnime" style="margin-bottom: 5px"></div>
                                                    <div class="videoSugTime videoSuggNamePlaceHolder placeHolderAnime"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="navigationCategoryDiv_{{$cont->id}}">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @endif

        @if(isset($content->showList) && $content->showList == true)
            <div id="allVideoDiv">
                <div id="allVideo" class="allVideoList"></div>
            </div>
        @endif

    </div>

@endsection

@section('script')
    <!-- Swiper JS -->

    <script>
        let nonPic = '{{URL::asset('_images/nopic/blank.jpg')}}';

        @if(isset($content->subs) || isset($content->lastVideo))

            @if(isset($content->lastVideo))
                let lastVideos = {!! $content->lastVideo !!};
                createVideoSuggestionDiv(lastVideos, 'lastVideosDiv');
            @endif

            @if(isset($content->subs))
                let subContent = {!! $content->subs !!};
                function categoryVideoSuggestion(){
                    for(let j = 0; j < subContent.length; j++)
                        createVideoSuggestionDiv(subContent[j].video, 'catVideoDiv_' + subContent[j]['id']);
                }
                categoryVideoSuggestion();
            @endif

            let swipersuggestion = new Swiper('.videoSuggestionSwiper', {
            slidesPerGroup: 1,
            spaceBetween: 5,
            watchOverflow: true,
            // autoplay: {
            //     delay: 3000,
            //     disableOnInteraction: false,
            // },
            navigation: {
                nextEl: '.swiper-button-prev',
                prevEl: '.swiper-button-next',
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

                    let slideCount = this.slides.length;
                    if(slideCount <= this.params.slidesPerView){
                        $(this.el).find(this.params.navigation.nextEl).css('display', 'none');
                        $(this.el).find(this.params.navigation.prevEl).css('display', 'none');
                    }
                    else{
                        $(this.el).find(this.params.navigation.nextEl).css('display', 'block');
                        $(this.el).find(this.params.navigation.prevEl).css('display', 'block');
                    }

                    $(this.el).find(this.params.navigation.prevEl).css('display', 'none');
                },
                resize: function(){
                    let slideCount = this.slides.length;
                    if(slideCount <= this.params.slidesPerView){
                        $(this.el).find(this.params.navigation.nextEl).css('display', 'none');
                        $(this.el).find(this.params.navigation.prevEl).css('display', 'none');
                    }
                    else{
                        $(this.el).find(this.params.navigation.nextEl).css('display', 'block');
                        $(this.el).find(this.params.navigation.prevEl).css('display', 'block');
                    }

                    resizeFitImg('resizeImgClass');
                },
                slideChange: function(){
                    if(this.isBeginning)
                        $(this.el).find(this.params.navigation.prevEl).css('display', 'none');
                    else
                        $(this.el).find(this.params.navigation.prevEl).css('display', 'block');

                    if(this.isEnd)
                        $(this.el).find(this.params.navigation.nextEl).css('display', 'none');
                    else
                        $(this.el).find(this.params.navigation.nextEl).css('display', 'block');
                }
            },
        });
        @endif


        @if(isset($content->showList) && $content->showList == true)
            let kind = '{{$kind}}';
            let value = '{{$value}}';
            let page = 0;
            let perPage = 5;
            let isEnd = false;
            let inGet = false;

            function getVideo(){
                if(!isEnd && !inGet) {
                    inGet = true;
                    openLoading();

                    $.ajax({
                        type: 'post',
                        url: '{{route("streaming.list.getElems")}}',
                        data: {
                            _token: '{{csrf_token()}}',
                            kind: kind,
                            value: value,
                            page: page,
                            perPage: perPage
                        },
                        success: function (response) {
                            closeLoading();
                            try {
                                response = JSON.parse(response);
                                if (response['status'] == 'ok') {
                                    page++;

                                    if(response.videos.length < perPage)
                                        isEnd = true;

                                    createVideoSuggestionDiv(response.videos, 'allVideo', function(){
                                        $('#allVideo').find('.videoSuggestion').addClass('videoInList');
                                        resizeFitImg('resizeImgClass');
                                        inGet = false;

                                        resizeRows('videoInList');
                                        getVideo();
                                    }, true);

                                }
                            }
                            catch (e) {

                            }
                        },
                        error: function (err) {
                            closeLoading();
                        }
                    });
                }
            }
            getVideo();

            $(window).resize(function(){
                resizeRows('videoInList')
            });
        @endif

    </script>
@endsection