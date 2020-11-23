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

        }
        .commonBody .bigText{

        }
        .commonBody .smallText{

        }
        .commonBody .smallText{

        }
        .commonBody .loginButton{

        }
        .commonBody .inputCol{
            margin-bottom: 20px;
        }
        .commonBody .inputCol input{
            background: white;
            border: solid 1px #FD7B5C;
            font-size: 31px;
            border-radius: 30px;
            padding: 3px 15px;
        }
        .commonBody .inputCol input::placeholder{
            color: #fd7b5c73;
        }
    </style>
</head>
<body>
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

        <div class="commonBody loginBody">
            <div class="topText">
                <div class="bigText">پیش از شروع عضو شوید</div>
                <div class="smallText">
                    اگر عضو هستید
                    <span class="loginButton">وارد شوید</span>
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
                </div>
                <div class="inputCol">
                    <input type="text" placeholder="رمز عبور">
                </div>
            </div>
        </div>
    </div>
</body>
</html>