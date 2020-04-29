<!doctype html>
<html lang="fa">
<head>
    @include('layouts.topHeader')

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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


    <style>

        body {
            font-family: 'IRANSansWeb' !important;
        }
        .topPic{
            width: 100%;
            position: relative;
        }
        .mainPic{
            width: 100%;
            height: 100%;
        }
        .sidePics{
            width: 100%;
            height: 100%;
            max-height: 100vh;
            position: absolute;
            top: 0px;
            right: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .sidePics1{
            bottom: 0px;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 32%;
            flex-direction: column;
        }
        .topSidePic1{

        }
        .bottomSidePic1{

        }
        .topStartButton{
            width: 49%;
            font-size: 26px;
            border-radius: 15px;
            height: 100px;
            font-weight: bold;
            background: #307da2;
        }
        .startChar{
            font-size: 45px;
            font-weight: bold;
        }
        .sidePic2{
            position: absolute;
            top: 65px;
            left: 80px;
            font-size: 29px;
            color: white;
            font-weight: bold;
            padding: 20px;
            background-color: #0000006e;
        }
        .sidePic2Links{
            border-bottom: solid red 2px;
            margin-bottom: 10px;
            padding: 0px 18px;
            padding-bottom: 5px;
            cursor: pointer;
            position: relative;
        }
        .lastSidePic2Lind{
            border-bottom: none;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
        .topSidePic2{
            color: black;
            position: absolute;
            top: -39px;
            right: 10px;
            font-weight: 400;
        }
        .introChar{
            font-size: 40px;
            font-weight: bold;
        }
        .circleRed{
            width: 13px;
            height: 13px;
            background: red;
            position: absolute;
            left: -44px;
            border-radius: 50%;
            bottom: 14px;
        }
        .slidePic2ArrowBottom{
            position: absolute;
            width: 10px;
            height: 10px;
            top: 0;
            left: -22px;
        }
        .redSquer{
            background: red;
            width: 12px;
            height: 10px;
        }
        .redTri{
            background: red;
            width: 9px;
            height: 9px;
            transform: rotate(45deg);
            position: absolute;
            top: 5px;
            right: 0px;
        }
        .otherPics{
            width: 100%;
        }
        .otherPicCommon{
            margin-top: 25px;
            width: 100%;
        }
        .otherPicImg{
            width: 100%;
        }
    </style>

</head>
<body style="background: black">

    <div class="topPic">
        <img class="mainPic" src="{{URL::asset('images/camping/Layer 5.jpg')}}">
        <div class="sidePics">
            <div class="sidePics1">
                <div class="topSidePic1">
                    <img src="{{URL::asset('images/camping/www.koochita.com.png')}}" style="width: 100%">
                </div>
                <div class="bottomSidePic1">
                    <img src="{{URL::asset('images/camping/Layer 14.png')}}" style="width: 50%">
                    <button class="btn btn-primary topStartButton">همین حالا <span class="startChar">شروع</span> کنید</button>
                </div>
            </div>

            <div class="sidePic2">
                <div class="slidePic2ArrowBottom">
                    <div class="redSquer"></div>
                    <div class="redTri"></div>
                </div>
                <div class="topSidePic2">
                    <span class="introChar">معرفی</span>  کنید
                </div>
                <div class="sidePic2Links">
                    اقامتگاه بوم
                    گردی
                    <div class="circleRed"></div>
                </div>
                <div class="sidePic2Links">
{{--                    <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => 'country'])}}" style="color: white">--}}
                        رستوران
                        <div class="circleRed"></div>
{{--                    </a>--}}
                </div>
                <div class="sidePic2Links">
                    جاذبه های دیدنی
                    <div class="circleRed"></div>
                </div>
                <div class="sidePic2Links">
                    صنایع دستی
                    <div class="circleRed"></div>
                </div>
                <div class="sidePic2Links">
                    غذای محلی
                    <div class="circleRed"></div>
                </div>
                <div class="sidePic2Links lastSidePic2Lind">
                    سوغات
                    <div class="circleRed"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="otherPics">
        <div class="otherPicCommon">
            <img src="{{URL::asset('images/camping/side1.jpg')}}" class="otherPicImg">
        </div>
        <div class="otherPicCommon">
            <img src="{{URL::asset('images/camping/Layer 16.jpg')}}" class="otherPicImg">
        </div>
        <div class="otherPicCommon">
            <img src="{{URL::asset('images/camping/Layer 17.jpg')}}" class="otherPicImg">
        </div>
    </div>

</body>
</html>