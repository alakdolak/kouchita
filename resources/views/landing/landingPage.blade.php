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
            display: flex;
            justify-content: center;
        }
        .mainPic{
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
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 600px;
            flex-direction: column;
        }
        .topSidePic1{

        }
        .bottomSidePic1{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .topStartButton{
            width: 49%;
            font-size: 26px;
            border-radius: 15px;
            height: 100px;
            font-weight: bold;
            background: #307da2;
        }
        .travelUsImg{
            width: 50%
        }
        .startChar{
            font-size: 45px;
            font-weight: bold;
        }
        .sidePic2{
            position: absolute;
            top: 65px;
            left: 80px;
            width: 290px;
        }
        .sidePic2Content{
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
            font-size: 25px;
            cursor: pointer;
            width: 100%;
            text-align: right;
            display: flex;
            justify-content: space-between;
            direction: rtl;
            align-items: center;
        }
        .arrowDiv{
            height: 10px;
        }
        #arrowImg{
            transition: .5s;
            width: 20px;
        }
        .arrowImgTop{
            transform: rotate(180deg);
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

        @media (max-width: 650px) {
            body{
                overflow: hidden;
            }
            .sidePic2{
                left: auto;
            }
        }

        @media (max-width: 620px) {
            .sidePics1{
                width: calc(100% - 50px);
            }
            .bottomSidePic1{
                flex-direction: column;
            }
            .topStartButton{
                width: 300px;
            }
            .travelUsImg{
                width: 300px;
            }
        }
    </style>

</head>
<body style="background: black; overflow-x: hidden">

    <div class="topPic">
        <img class="mainPic" src="{{URL::asset('images/camping/Layer 5.jpg')}}">
        <div class="sidePics">
            <div class="sidePics1">
                <div class="topSidePic1">
                    <img src="{{URL::asset('images/camping/www.koochita.com.png')}}" style="width: 100%">
                </div>
                <div class="bottomSidePic1">
                    <img class="travelUsImg" src="{{URL::asset('images/camping/Layer 14.png')}}">
                    <button class="btn btn-primary topStartButton">همین حالا <span class="startChar">شروع</span> کنید</button>
                </div>
            </div>

            <div class="sidePic2">
                <div class="topSidePic2" onclick="toggleBottom()">
                    <div>
                        <span class="introChar">معرفی</span>  کنید
                    </div>

                    <div class="arrowDiv">
                        <img id="arrowImg" class="arrowImgTop" src="{{URL::asset('images/camping/box.png')}}">
                    </div>
                </div>
                <div id="topSidePic2Content" class="sidePic2Content" style="display: none;">

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

<script>
    function toggleBottom(){
        $('#topSidePic2Content').slideToggle(500);
        $('#arrowImg').toggleClass('arrowImgTop')
    }
</script>

</html>