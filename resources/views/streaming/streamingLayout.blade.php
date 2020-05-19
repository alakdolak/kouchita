<!DOCTYPE html>
<html lang="fa">

<head>
    @include('layouts.topHeader')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <meta property="og:locale" content="fa_IR" />
    {{--<meta property="og:locale:alternate" content="fa_IR" />--}}
    <meta property="og:type" content="website" />
    <title> کوچیتا، سامانه جامع گردشگری ایران </title>
    <meta name="title" content="کوچیتا | سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران" />
    <meta name='description' content='کوچیتا، سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران. اطلاعات اماکن و جاذبه ها، هتل ها، بوم گردی، ماجراجویی، آموزش سفر، فروشگاه صنایع‌دستی ، پادکست سفر' />
    <meta name='keywords' content='کوچیتا، هتل، تور ، سفر ارزان، سفر در ایران، بلیط، تریپ، نقد و بررسی، سفرنامه، کمپینگ، ایران گردی، آموزش سفر، مجله گردشگری، مسافرت، مسافرت داخلی, ارزانترین قیمت هتل ، مقایسه قیمت ، بهترین رستوران‌ها ، بلیط ارزان ، تقویم تعطیلات' />
    <meta property="og:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:secure_url" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:width" content="550"/>
    <meta property="og:image:height" content="367"/>
    <meta name="twitter:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>


    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>

    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/icons.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/theme2/swiper.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/streaming/mainStreaming.css')}}">

    <style>
        #openSearch{
            transform: rotate(0deg) !important;
        }
        .hideOnPc{
            display: none;
        }
        .fullOpacity{
            opacity: 1 !important;
        }
        @media (max-width: 767px) {
            .hideOnPc{
                display: flex;
            }
        }
    </style>

    @yield('head')

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging" ng-app="mainApp" style="background-color: #EAFBFF;">

@include('general.forAllPages')

<div class="hideOnPhone">
    @include('streaming.layout.pcHeader')
</div>

<div class="hideOnScreen">
    @include('streaming.layout.mobileHeader')
</div>

@include('streaming.videoSuggestionPack')


<div class="streamBody">

    <div class="container secHeader">
        <a href="{{route('streaming.live', ['room' => $hasLive])}}" class="secHeaderTabs ">
            <img id="liveIcon" src="{{URL::asset('images/streaming/Live.png')}}" class="LivePngClass fullOpacity" style="transition: 1s; opacity: .2">
            <span class="liveText">نمایش زنده</span>
        </a>

        @if($hasLive != false)
            <script>
                setInterval(function () {
                    $('#liveIcon').toggleClass('fullOpacity');
                }, 1000);
            </script>
        @endif

        {{--        <div class="secHeaderTabs">--}}
{{--            <img src="{{URL::asset('images/streaming/tv.png')}}" class="TvPngClass">--}}
{{--            <span>مجموعه‌ها</span>--}}
{{--        </div>--}}
{{--        <div class="secHeaderTabs">--}}
{{--            <img src="{{URL::asset('images/streaming/play-button.png')}}" class="TvPngClass">--}}
{{--            <span>کلیپ</span>--}}
{{--        </div>--}}
{{--        <div class="secHeaderTabs secHeaderTabsChoose">--}}
{{--            <span></span>--}}
{{--            <span>موردعلاقه‌ها</span>--}}
{{--        </div>--}}
{{--        <div class="secHeaderTabs">--}}
{{--            <span></span>--}}
{{--            <span>ذخیره‌شده‌ها</span>--}}
{{--        </div>--}}

    </div>

    @yield('body')
</div>


@include('streaming.layout.pcFooter')

</body>


<script src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>

<script>
    resizeFitImg('resizeImgClass');



    $(window).ready(function(){
        resizeFitImg('resizeImgClass');
    });
    $(window).resize(function(){
        resizeFitImg('resizeImgClass');
    });

    function goToUpload() {
        if (!hasLogin) {
            showLoginPrompt();
            return;
        }

        location.href = "{{route('streaming.uploadPage')}}";
    }
</script>

@yield('script')

</html>

