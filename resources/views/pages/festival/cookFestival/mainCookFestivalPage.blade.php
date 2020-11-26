<!doctype html>
<html lang="fa">
<head>
    @include('layouts.topHeader')
    <title>مسابقه آشپزی با کوچیتا</title>


    <style>
        .mainBody{
            width: 100%;
            min-height: 100vh;
            direction: rtl;
            background: #FFE0C5;
        }
        .header{
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .header .koochitaImg{
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .koochitaTitleSidePic{
            position: fixed;
            top: 10%;
            left: 20%;
            width: 25%;
        }
        .koochitaTitleSidePic img{
            width: 100%;
        }
        .sideMainPic{
            z-index: 1;
            position: fixed;
            bottom: 0px;
            left: 0px;
            width: 56%;
            background-image: url("{{URL::asset('images/festival/cookFestival/mainCookPic.svg')}}");
            background-size: contain;
            height: 65%;
            background-repeat: no-repeat;
            background-position: center;
        }
        .sideMainPic img{
            width: 100%;
        }

        .commonBody{
            position: relative;
            z-index: 9;
            padding: 0px 5%;
            width: 40%;
            padding-left: 0;
        }
        .commonBody .topText{
            color: #707070;
            font-size: 24px;
            padding: 0px 0px;
            margin: 20px 0px;
        }
        .commonBody .bigText{
            font-size: 1em;
        }
        .commonBody .smallText{
            font-size: .8em;
        }
        .commonBody .loginButton{
            color: black;
            cursor: pointer;
        }
        .commonBody .inputCol{
            margin-bottom: 20px;
        }
        .commonBody .inputCol input{
            background: white;
            border: solid 1px #FD7B5C;
            font-size: 22px;
            border-radius: 100px;
            padding: 15px 5%;
            width: 100%;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
            color: #FD7B5C;
        }
        .commonBody .inputCol input::placeholder{
            color: #FD7B5C;
        }
        .inputCol .smallText{
            font-size: 14px;
            color: #707070;
            padding: 10px 5%;
            padding-bottom: 0px;
        }
        .orangeButton{
            background: #FD7B5C;
            border: none;
            color: white;
            border-radius: 100px;
            font-size: 25px;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: auto;
            padding: 10px 0px;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }

        .firstStep{
            width: 50%;
            padding-top: 5%;
        }
        .firstStep > div{
            width: 80%;
        }
        .firstStep > div > img{
            width: 100%;
        }
        .firstStep .registerInCook{
            color: #707070;
            text-align: center;
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            margin-top: 40px;
        }
        .firstStep .registerInCook .text{
            font-size: 25px;
        }
        .firstStep .registerInCook .orangeButton{
            margin: 0;
            margin-top: 5px;
        }
        
        
        @media (max-width: 767px) {

            .header{
                display: none;
            }
            .koochitaTitleSidePic{
                top: 0;
                right: 0px;
                width: 100%;
                left: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
            }
            .koochitaTitleSidePic img{
                width: 70%;
            }
            .firstStep{
                width: 100%;
            }
            .sideMainPic{
                width: 100%;
                background-position: bottom;
                z-index: 1;
                opacity: .3;
            }
            .firstStep > div{
                width: 90%;
                max-width: 400px;
                margin: 0px auto;
            }
            .firstStep .registerInCook .text{
                color: #3a3a3a;
                font-weight: bold;
            }
        }
    </style>
</head>
<body>

    @include('general.forAllPages')

    <div class="mainBody">
        <div class="header">
            <a href="{{url('/')}}" class="koochitaImg">
                <img src="{{URL::asset('images/icons/mainLogo.png')}}" alt="koochita" style="height: 100%">
            </a>
        </div>
        <div class="koochitaTitleSidePic">
            <img src="{{URL::asset('images/festival/cookFestival/cookKoochitaTitle.png')}}" alt="عنوان کوچیتا">
        </div>
        <div class="sideMainPic"></div>

        <div id="firstStep" class="commonBody firstStep" >
            <div class="topPic">
                <img src="{{URL::asset('images/festival/cookFestival/doCook.svg')}}" alt="doCook">
            </div>
            <div class="secondPic" style="margin-right: auto">
                <img src="{{URL::asset('images/festival/cookFestival/takePhotoVideo.svg')}}" alt="takePhoto">
            </div>
            <div class="registerInCook">
                <div class="text" >
                    از اینجا برای ما بفرستید
                </div>
                <button class="orangeButton" onclick="goToNextStep('step2Body')">شرکت کنید</button>
            </div>
        </div>

        @if(auth()->check())
            <div class="commonBody step2Body hidden"></div>
        @else
            <div class="commonBody step2Body loginBody hidden">
            <div class="topText">
                <div class="bigText">پیش از شروع عضو شوید</div>
                <div class="smallText">
                    اگر عضو هستید
                    <span class="loginButton login-button" >وارد شوید</span>
                </div>
            </div>
            <div class="registerBody">
                <div class="inputCol">
                    <input type="text" placeholder="نام">
                </div>
                <div class="inputCol">
                    <input type="text" placeholder="نام خانوادگی">
                </div>
                <div class="inputCol">
                    <input type="text" placeholder="شماره تلفن همراه">
                </div>
                <div class="inputCol">
                    <input type="text" placeholder="نام کاربری">
                    <div class="smallText">
                        دوستانتان شما را با این نام می شناسند
                    </div>
                </div>
                <div class="inputCol">
                    <input type="text" placeholder="رمز عبور">
                </div>
                <button class="orangeButton">تایید</button>
            </div>
        </div>
        @endif
    </div>

    <script>
        function goToNextStep(_firstStep) {

        }
    </script>
</body>
</html>