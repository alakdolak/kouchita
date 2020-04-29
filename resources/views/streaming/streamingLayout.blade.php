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
    @include('layouts.placeHeader')
</div>

<div class="hideOnScreen">
    @include('layouts.header1Phone')
</div>

@include('streaming.videoSuggestionPack')


<div class="streamBody">

    <div class="container secHeader">
        <div class="secHeaderTabs">
            <img src="{{URL::asset('images/streaming/Live.png')}}" class="LivePngClass">
            <span class="liveText">نمایش زنده</span>
        </div>
        <div class="secHeaderTabs">
            <img src="{{URL::asset('images/streaming/tv.png')}}" class="TvPngClass">
            <span>مجموعه‌ها</span>
        </div>
        <div class="secHeaderTabs">
            <img src="{{URL::asset('images/streaming/play-button.png')}}" class="TvPngClass">
            <span>کلیپ</span>
        </div>
        <div class="secHeaderTabs secHeaderTabsChoose">
            <span></span>
            <span>موردعلاقه‌ها</span>
        </div>
        <div class="secHeaderTabs">
            <span></span>
            <span>ذخیره‌شده‌ها</span>
        </div>
    </div>

    @yield('body')
</div>


@include('layouts.placeFooter')

</body>


<script src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>

<script>
    function resizeFitImg(_class) {
        var imgs = $('.' + _class);
        for(i = 0; i < imgs.length; i++){
            var img = $(imgs[i]);
            var imgW = img.width();
            var imgH = img.height();

            var secW = img.parent().width();
            var secH = img.parent().height();

            if(imgH < secH){
                img.css('height', '100%');
                img.css('width', 'auto');
            }
            else if(imgW < secW){
                img.css('width', '100%');
                img.css('height', 'auto');
            }
        }
    }

    $(document).ready(function(){
        resizeFitImg('resizeImgClass');
    });
    $(window).resize(function(){
        resizeFitImg('resizeImgClass');
    });

    swiper
</script>

@yield('script')

<script>

    // suggestion swiper
    new Swiper('.suggestionSwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        slidesPerView: 4,
        slidesPerGroup: 1,
        loop: true,
        // autoplay: {
        //     delay: 50000,
        //     disableOnInteraction: false,
        // },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

</html>

