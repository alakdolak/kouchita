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
    <title> {{__('کوچیتا، سامانه جامع گردشگری ایران')}} </title>
    <meta name="title" content="کوچیتا | سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران" />
    <meta name='description' content='کوچیتا، سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران. اطلاعات اماکن و جاذبه ها، هتل ها، بوم گردی، ماجراجویی، آموزش سفر، فروشگاه صنایع‌دستی ، پادکست سفر' />
    <meta name='keywords' content='کوچیتا، هتل، تور ، سفر ارزان، سفر در ایران، بلیط، تریپ، نقد و بررسی، سفرنامه، کمپینگ، ایران گردی، آموزش سفر، مجله گردشگری، مسافرت، مسافرت داخلی, ارزانترین قیمت هتل ، مقایسه قیمت ، بهترین رستوران‌ها ، بلیط ارزان ، تقویم تعطیلات' />
    <meta property="og:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:secure_url" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:width" content="550"/>
    <meta property="og:image:height" content="367"/>
    <meta name="twitter:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>

    <link rel="stylesheet" href="{{URL::asset('css/landingPage.css')}}">

</head>
<body style="background: black; overflow-x: hidden">
@include('general.loading')

    <div class="topPic">
        <img class="mainPic" src="{{URL::asset('images/camping/Layer 5.jpg')}}">
        <div class="sidePics">
            <div class="sidePics1">
                <div class="topSidePic1">
                    <img src="{{URL::asset('images/camping/www.koochita.com.png')}}" style="width: 100%">
                </div>
                <div class="bottomSidePic1">
                    <img class="travelUsImg" src="{{URL::asset('images/camping/Layer 14.png')}}">
                    <button class="btn btn-primary topStartButton"  onclick="startFunc()">همین حالا <span class="startChar">شروع</span> کنید</button>
                </div>
            </div>

{{--            <div class="sidePic2">--}}
{{--                <div class="topSidePic2" onclick="toggleBottom()">--}}
{{--                    <div>--}}
{{--                        <span class="introChar">معرفی</span>  کنید--}}
{{--                    </div>--}}

{{--                    <div class="arrowDiv">--}}
{{--                        <img id="arrowImg" class="arrowImgTop" src="{{URL::asset('images/camping/box.png')}}">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div id="topSidePic2Content" class="sidePic2Content" style="display: none;">--}}

{{--                    <div class="sidePic2Links">--}}
{{--                        اقامتگاه بوم--}}
{{--                        گردی--}}
{{--                        <div class="circleRed"></div>--}}
{{--                    </div>--}}
{{--                    <div class="sidePic2Links">--}}
{{--                        --}}{{--                    <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => 'country'])}}" style="color: white">--}}
{{--                        رستوران--}}
{{--                        <div class="circleRed"></div>--}}
{{--                        --}}{{--                    </a>--}}
{{--                    </div>--}}
{{--                    <div class="sidePic2Links">--}}
{{--                        جاذبه های دیدنی--}}
{{--                        <div class="circleRed"></div>--}}
{{--                    </div>--}}
{{--                    <div class="sidePic2Links">--}}
{{--                        صنایع دستی--}}
{{--                        <div class="circleRed"></div>--}}
{{--                    </div>--}}
{{--                    <div class="sidePic2Links">--}}
{{--                        غذای محلی--}}
{{--                        <div class="circleRed"></div>--}}
{{--                    </div>--}}
{{--                    <div class="sidePic2Links lastSidePic2Lind">--}}
{{--                        سوغات--}}
{{--                        <div class="circleRed"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

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


    <style>
        .loginPopUp{
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #000000c2;
            top: 0;
            right: 0;
            justify-content: center;
            align-items: center;
            display: none;
        }
        .loginDiv{
            width: 400px;
            background: white;
            border-radius: 10px;
            border: solid 5px #0d6650;
            max-height: 100vh;
            overflow: auto;
        }
        .topIconDiv{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0px;
            position: relative;
        }
        .loginInputDiv{
            direction: rtl;
            text-align: right;
            padding: 30px;
            font-size: 22px;
            padding-top: 10px;
        }
        .closeButton{
            color: #4DC7BC;
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
        .closeButton:before{
            font-size: 32px;
            line-height: 48px;
            color: #4dc7bc;
            content: "\00d7";
        }
        .loginText{
            font-size: 25px;
            color: #053a3e;
            font-weight: bold;
            text-align: center;
            margin: 10px 0px;
        }
        .loginButtonsMainDiv{
            background: #053a3e;
            color: white;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            padding: 12px;
            border-radius: 10px;
            margin-top: 40px;
            cursor: pointer;
            width: 100%;
        }
        .registerNow{
            text-align: center;
            margin-top: 20px;
            color: #00388c;
            cursor: pointer;
        }
        .registerNow:hover{
            color: #007dc5;
        }
    </style>

    <div id="loginPopUp" class="loginPopUp">
        <div class="loginDiv">
            <div class="topIconDiv">
                <img src="{{URL::asset('images/icons/mainLogo.png')}}" style="width: 195px">
                <div class="closeButton" onclick="$('#loginPopUp').hide()"></div>
            </div>
            <hr style="margin: 0px">

            <div id="loginSection" class="loginInputDiv" style="display: block">
                <div class="loginText">
                    ورود به کوچیتا
                </div>

                <div class="form-group">
                    <label for="username">نام کاربری</label>
                    <input type="text" class="form-control" id="username" style="height: 40px">
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="password" class="form-control" id="password" style="height: 40px">
                </div>
                <p id="loginErr" style="color: red;"></p>

                <div class="loginButtonsMainDiv" onclick="login()">
                    ورود
                </div>
                <div class="registerNow" onclick="registerStart()">
                    همین حالا ثبت نام کنید
                </div>
            </div>

            <div id="phoneSection" class="loginInputDiv" style="display: none">
                <div class="form-group">
                    <label for="phone">شماره تماس</label>
                    <input type="text" class="form-control" id="phone" style="height: 40px" placeholder="09xxxxxxxx">
                </div>
                <p id="phoneError" style="color: red"></p>

                <div class="loginButtonsMainDiv" style="background: #0d6650" onclick="phoneRegister()">
                    ثبت
                </div>
            </div>

            <div id="phoneRegister" class="loginInputDiv" style="display: none;">
                <div class="header_text font-size-14Imp">لطفا کد اعتبار سنجی را وارد نمایید:</div>
                <div>
                    <div>
                        <label style="text-align: center; width: 100%">
                            <div style="font-size: 13px; margin: 10px 0px;">این کد به گوشی شما ارسال گردیده است.</div>

                            <div> کد اعتبار سنجی </div>
                            <input class="loginInputTemp" type="text" maxlength="40" id="activationCode" required autofocus>
                            <p id="reminderTimePane">
                                <span style="font-size: 12px;">  زمان باقی مانده برای ارسال مجدد کد اعتبار سنجی شما :</span>
                                <span id="reminderTime"></span>
                            </p>
                            <button onclick="resendActivationCode()" disabled id="resendActivationCode"
                                    class="btn btn-success" style="margin-top: 15px"> ارسال مجدد کد اعتبار سنجی </button>
                        </label>
                    </div>
                </div>
                <div class="pd-tp-8">
                    <p id="loginErrActivationCode" style="color: red"></p>

                    <div class="loginButtonsMainDiv" style="background: #0d6650" onclick="showLoginPassword()">
                        ثبت
                    </div>
                </div>
            </div>

            <div id="registerSection" class="loginInputDiv" style="font-size: 15px; display: none">
                <div class="loginText">
                    ثبت نام در کوچیتا
                </div>
                <div class="registerInputs">
                    <div class="form-group">
                        <label for="firstName">نام</label>
                        <input type="text" class="form-control" id="firstName" style="height: 40px">
                    </div>
                    <div class="form-group">
                        <label for="lastName">نام خانوادگی</label>
                        <input type="text" class="form-control" id="lastName" style="height: 40px">
                    </div>
                    <div class="form-group">
                        <label for="usernameInput">نام کاربری</label>
                        <input type="text" class="form-control" id="usernameInput" style="height: 40px">
                    </div>
                    <div class="form-group">
                        <label for="passInput">کلمه عبور</label>
                        <input type="password" class="form-control" id="passInput" style="height: 40px">
                    </div>
                    <div class="form-group">
                        <label for="rePassInput">تکرار کلمه عبور</label>
                        <input type="password" class="form-control" id="rePassInput" style="height: 40px">
                    </div>

                    <div class="form-group">
                        <script async src='https://www.google.com/recaptcha/api.js'></script>

                        <input id='checked' onchange='checkedCheckBox()' type='checkbox' value='-1'>
                        <label class='labelForCheckBox' for='checked'>
                            <span></span>&nbsp;
                        </label>
                        <span> شرایط استفاده و
                            <a target="_blank" href="{{route('policies')}}" style="color: blue;">قوانین سایت</a>
                            را مطالعه کرده و با آن موافقم.
                        </span>
                        <div>
                            <div class="g-recaptcha" data-sitekey="6LfiELsUAAAAAO3Pk-c6cKm1HhvifWx9S8nUtxTb"></div>
                        </div>
                    </div>
                    <p id="loginErrUserName" style="color: red"></p>
                    <button id="submitAndFinishBtn" class="loginButtonsMainDiv" style="background: #0d6650" onclick="checkRecaptcha()" disabled>
                        ثبت نام
                    </button>
                </div>
            </div>


        </div>
    </div>

</body>

<script>
    var hasLogin = {{auth()->check() ? 1 : 0}};
    let phoneNum;

    function startFunc(){
        if(hasLogin)
            location.href = '{{route("addPlaceByUser.index")}}';
        else
            $('#loginPopUp').css('display', 'flex');
    }

    function registerStart(){
        $('#loginSection').hide();
        $('#phoneSection').show();
    }


    function toggleBottom(){
        $('#topSidePic2Content').slideToggle(500);
        $('#arrowImg').toggleClass('arrowImgTop')
    }

    function checkRecaptcha() {
        openLoading();

        $.ajax({
            type: 'post',
            url: '{{route('checkReCaptcha')}}',
            data: {
                captcha: grecaptcha.getResponse()
            },
            success: function (response) {
                closeLoading();
                if (response == "ok") {
                    if ($("#usernameInput").val().trim().length > 0)
                        checkUserName2();
                    else
                        $("#loginErrUserName").text('پر کردن تمام فیلدها اجباری است');
                }
                else
                    $("#loginErrUserName").text('لطفا ربات نبودن خود را ثابت کنید');
            },
            error: function(err){
                console.log(err);
                closeLoading();
                $("#loginErrUserName").text('در فرایند ثبت نام مشکلی پیش آمده لطفا دوباره تلاش کنید');
            }
        });
    }

    function checkedCheckBox() {

        if ($("#checked").is(":checked")) {
            $("#submitAndFinishBtn").removeAttr('disabled');
        }
        else {
            $("#submitAndFinishBtn").attr('disabled', 'disabled');
        }
    }

    function checkUserName2() {
        let username = $('#usernameInput').val();
        let pass = $('#passInput').val();
        let rePassInput = $('#rePassInput').val();
        let firstName = $('#firstName').val();
        let lastName = $('#lastName').val();

        if(username.trim().length > 0 && pass.trim().length > 0 && rePassInput.trim().length > 0 && firstName.trim().length > 0 && lastName.trim().length > 0){

            if(pass == rePassInput){
                openLoading();

                $.ajax({
                    type: 'post',
                    url: '{{route('checkUserName')}}',
                    data: {
                        'username': username,
                    },
                    success: function (response) {
                        closeLoading();
                        if (response == "ok") {
                            openLoading();

                            $.ajax({
                                type: 'post',
                                url: '{{route('registerWithPhone')}}',
                                data: {
                                    'username': username,
                                    'password': pass,
                                    'phone': phoneNum,
                                    'firsName': firstName,
                                    'lastName': lastName,
                                },
                                success: function (response) {
                                    if (response == "ok")
                                        window.location.href = '{{route("addPlaceByUser.index")}}';
                                    else
                                        closeLoading();
                                },
                                error: function(err){
                                    console.log('registerWithPhone');
                                    console.log(err);
                                    closeLoading();
                                    $("#loginErrUserName").text('در فرایند ثبت نام مشکلی پیش آمده لطفا دوباره تلاش کنید');
                                }
                            });
                        }
                        else if (response == "nok1")
                            $("#loginErrUserName").text('نام کاربری وارد شده در سامانه موجود است');
                    },
                    error: function(err){
                        console.log('checkUserName');
                        console.log(err);
                        closeLoading();
                        $("#loginErrUserName").text('در فرایند ثبت نام مشکلی پیش آمده لطفا دوباره تلاش کنید');
                    }
                });
            }
            else
                $("#loginErrUserName").text('کلمه عبور و تکرار ان یکسان نیست');
        }
        else
            $("#loginErrUserName").text('پر کردن تمام فیلدها اجباری است');

    }

    function login() {
        let username = $('#username').val();
        let password = $('#password').val();
        if (username.trim().length > 0 && password.trim().length > 0) {
            $.ajax({
                type: 'post',
                url: '{{route('login2')}}',
                data: {
                    'username': username,
                    'password': password
                },
                success: function (response) {
                    if (response == "ok")
                        location.href = '{{route("addPlaceByUser.index")}}';
                    else if (response == "nok2") {
                        $("#loginErr").empty().append('حساب کاربری شما غیر فعال شده است');
                    }
                    else {
                        $("#loginErr").empty().append('نام کاربری و یا رمز عبور اشتباه وارد شده است');
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.responseText == "Too Many Attempts.")
                        $("#loginErr").empty().append('تعداد درخواست های شما بیش از حد مجاز است. لطفا تا 5 دقیقه دیگر تلاش نفرمایید');
                }
            });
        }
    }

    function resendActivationCode() {

        $.ajax({
            type: 'post',
            url: '{{route('resendActivationCode')}}',
            data: {
                'phoneNum': phoneNum,
            },
            success: function (response) {

                response = JSON.parse(response);

                reminderTime = response.reminder;

                if (response.status == "ok") {
                    if (reminderTime > 0) {
                        $("#reminderTimePane").removeClass('hidden');
                        $("#resendActivationCode").attr('disabled', 'disabled');
                        setTimeout("decreaseTime()", 1000);
                    }
                    else {
                        $("#reminderTimePane").addClass('hidden');
                        $("#resendActivationCode").removeAttr('disabled');
                    }
                }
                else {
                    $("#reminderTimePane").removeClass('hidden');
                    $("#resendActivationCode").attr('disabled', 'disabled');
                    setTimeout("decreaseTime()", 1000);
                }
            }
        })
    }

    function showLoginPassword() {
        if ($("#activationCode").val().trim().length > 0)
            checkActivationCode();
    }

    function checkActivationCode() {
        openLoading();

        $.ajax({
            type: 'post',
            url: '{{route('checkActivationCode')}}',
            data: {
                'phoneNum': phoneNum,
                'activationCode': $("#activationCode").val()
            },
            success: function (response) {
                closeLoading();
                if (response == "ok") {
                    $('#phoneRegister').hide();
                    $('#registerSection').show();
                }
                else
                    $("#loginErrActivationCode").text('کد وارد شده معتبر نمی باشد');
            },
            error: function(err){
                closeLoading();
                $("#loginErrActivationCode").text('در فرایند ثبت نام مشکلی پیش امده لطفا دوباره تلاش کنید');
            }
        });

    }

    function phoneRegister(){
        if ($("#phone").val().trim().length == 11)
            checkPhoneNum();
        else
            $('#phoneError').text('شماره تماس خود را به درستی وارد کنید.');
    }

    function checkPhoneNum() {
        openLoading();
        $.ajax({
            type: 'post',
            url: '{{route('checkPhoneNum')}}',
            data: {
                'phoneNum': $("#phone").val()
            },
            success: function (response) {
                closeLoading();
                response = JSON.parse(response);

                if (response.status == "ok") {
                    $('#phoneSection').hide();
                    $('#phoneRegister').show();

                    phoneNum = $("#phone").val();

                    reminderTime = response.reminder;
                    if (reminderTime > 0) {
                        $("#reminderTimePane").removeClass('hidden');
                        $("#resendActivationCode").attr('disabled', 'disabled');
                        setTimeout("decreaseTime()", 1000);
                    }
                    else {
                        $("#reminderTimePane").addClass('hidden');
                        $("#resendActivationCode").removeAttr('disabled');
                    }
                    $("#activationCode").val("");
                    $(".pop-up").addClass('hidden');
                    $('#Send_AND_EnterCode-loginPopUp').removeClass('hidden');
                    $(".dark").show();
                }
                else if (response.status == "nok")
                    $("#phoneError").text('شماره شما پیش از این در سامانه ثبت گردیده است.');
                else if (response.status == "nok3")
                    $("#phoneError").text('اشکالی در ارسال پیام رخ داده است');
                else
                    $("#loginErrPhonePass1").empty().append('کد اعتبار سنجی برای شما ارسال شده است. برای ارسال مجدد کد باید 5 دقیقه منتظر بمانید');
            },
            error: function (err){
                closeLoading();
                console.log('checkPhoneNum');
                console.log(err);
                $("#phoneError").text('در فرایند ثبت نام مشکلی پیش امده لطفا دوباره تلاش کنید.');
            }
        });

    }

    function decreaseTime() {

        $("#reminderTime").text((reminderTime % 60) + " : " + Math.floor(reminderTime / 60));

        if (reminderTime > 0) {
            reminderTime--;
            setTimeout("decreaseTime()", 1000);
        }
        else {
            $("#reminderTimePane").addClass('hidden');
            $("#resendActivationCode").removeAttr('disabled');
        }
    }

</script>

</html>