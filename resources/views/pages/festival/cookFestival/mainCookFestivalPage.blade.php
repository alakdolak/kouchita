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
            background-position: bottom;
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

        .step1{
            width: 50%;
            padding-top: 5%;
        }
        .step1 > div{
            width: 80%;
        }
        .step1 > div > img{
            width: 100%;
        }
        .step1 .registerInCook{
            color: #707070;
            text-align: center;
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            margin-top: 40px;
        }
        .step1 .registerInCook .text{
            font-size: 25px;
        }
        .step1 .registerInCook .orangeButton{
            margin: 0;
            margin-top: 5px;
        }
        
        
        @media (max-width: 1100px) {
            .commonBody .inputCol{
                margin-bottom: 10px;
            }
            .commonBody .inputCol input{
                font-size: 18px;
                padding: 10px 5%;
            }

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
                max-height: 150px;
                width: auto;
            }
            .commonBody{
                width: 100%;
            }
            .loginBody{
                padding: 0px 20px;
                max-width: 400px;
                margin: 0px auto;
            }

            .sideMainPic{
                width: 100%;
                z-index: 1;
                opacity: .3;
            }
            .step1 > div{
                width: 90%;
                max-width: 400px;
                margin: 0px auto;
            }
            .step1 .registerInCook .text{
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

        <div id="step1" class="commonBody step1" >
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
                <button class="orangeButton" onclick="goToNextStep(2)">شرکت کنید</button>
            </div>
        </div>

{{--        @if(auth()->check())--}}
        @if(false)
            <div class="commonBody step2 hidden"></div>
        @else
            <div class="commonBody step2 loginBody hidden">
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
        var nowStep = 'step1';
        var url = window.location;
        function goToNextStep(_nextStep) {
            window.history.replaceState(null, null, '?page='+_nextStep);
            
            $(`.${nowStep}`).addClass('hidden');
            $(`.step${_nextStep}`).removeClass('hidden');
            nowStep = `step${_nextStep}`;
        }

        if(url.search.includes('?page=')){
            showStep = url.search.split('?page=')[1];
            goToNextStep(showStep);
        }
    </script>
</body>
</html>