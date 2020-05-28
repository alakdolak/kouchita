<!DOCTYPE html>
<html lang="fa">

<head>
    @include('layouts.topHeader')

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


{{--    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>--}}
{{--    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>--}}
{{--    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>--}}
{{--    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>--}}
{{--    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/icons.css')}}">--}}

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>

    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/streaming/iranSansFont.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/streaming/mainStreaming.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/streaming/layout/vodCommon.css')}}">

    <style>
        *{
            direction: rtl;
        }
        #openSearch{
            transform: rotate(0deg) !important;
        }
        .hideOnPc{
            display: none;
        }
        .fullOpacity{
            opacity: 1 !important;
        }
        @media (max-width: 768px) {
            .hideOnPc{
                display: flex;
            }
        }
    </style>

    @yield('head')

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging" ng-app="mainApp" style="background-color: #EAFBFF;">

    <div id="darkModeMainPage" class="ui_backdrop dark" ></div>
    @include('general.loading')
    @include('general.alerts')
    @include('streaming.component.videoSuggestionPack')
    @include('streaming.component.searchPan')
    @include('streaming.component.categoryTable')
    @if(!Auth::check())
        @include('streaming.component.loginPopup')
    @endif

    @include('streaming.layout.pcHeader')

    <div id="like_button_container"></div>

    <div class="streamBody" style="padding-top: 10px">
        @yield('body')
    </div>

    @include('streaming.layout.pcFooter')

</body>

<script>
    var hasLogin = {{auth()->check() ? 1 : 0}};

    function checkLogin(){
        if (!hasLogin) {
            showLoginPrompt('{{Request::url()}}');
            return false;
        }
        else
            return true;
    }

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

    function resizeRows(_class){
        let content = $($('.' + _class)[0]);
        let parent = content.parent();
        let margin = parseInt(content.css('margin-left').replace('px', ''));
        let width = parseInt(content.css('width').replace('px', '')) + (2 * margin);
        let sourceWidth = parseInt(parent.parent().css('width').replace('px', ''));

        let newWidth = sourceWidth - (sourceWidth % width);
        parent.css('width', newWidth);

    }

    $(document).ready(function(){
        resizeFitImg('resizeImgClass');
    });
    $(window).resize(function(){
        resizeFitImg('resizeImgClass');
    });

    $('.openSearchPanPage').on('click', openMainSearch);

</script>

@yield('script')

</html>

