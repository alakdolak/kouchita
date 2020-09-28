<!DOCTYPE html>
<html lang="{{\App::getLocale()}}">

<head>
    @include('layouts.topHeader')

    <meta property="og:locale" content="fa_IR" />
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

    <style>
        .screenFooterStyle{
            display: none !important;
        }
        .myLocMapSec{
            height: calc(100vh - 55px);
            width: 100%;
            position: relative;
        }
        .myLocMapSec .mainMap{
            height: 100%;
            width: 100%;
            background-color: red;
        }

        @media (max-width: 767px) {
            .myLocMapSec{
                height: calc(100vh - );
            }
        }
    </style>
</head>

<body style="background-color: #EAFBFF;">

@include('general.forAllPages')

@include('layouts.header1')

@include('component.mapMenu')

    <div class="myLocMapSec">
        <div id="mainMap" class="mainMap"></div>
    </div>
@include('layouts.placeFooter')

<script>
    // createMap('mainMap', center, response[0], true);
</script>
</body>
</html>

