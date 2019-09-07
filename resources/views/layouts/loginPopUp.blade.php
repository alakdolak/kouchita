<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

if(Auth::check())
    return Redirect::to(route('main'));

require_once (__DIR__ . '/../../../app/Http/Controllers/glogin/libraries/Google/autoload.php');

//Insert your cient ID and secret
//You can get it from : https://console.developers.google.com/
$client_id = '774684902659-20aeg6um0856j5li2uuu9ombu2pcbqv9.apps.googleusercontent.com';
$client_secret = 'ARyU8-RXFJZD5jl5QawhpHne';
$redirect_uri =  route('loginWithGoogle');

/************************************************
Make an API request on behalf of a user. In
this case we need to have a valid OAuth 2.0
token for the user, so we need to send them
through a login flow. To do this we need some
information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
When we create the service here, we pass the
client to it. The client then queries the service
for the required scopes, and uses that when
generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);
$authUrl = $client->createAuthUrl();
?>

<script>

    var loginDir = '{{route('login2')}}';
    var checkLoginDir = '{{route('checkLogin')}}';
    var checkEmailDir = '{{route('checkEmail')}}';
    var checkUserNameDir = '{{route('checkUserName')}}';
    var registerAndLoginDir = '{{route('registerAndLogin')}}';
    var registerAndLoginDir2 = '{{route('registerAndLogin2')}}';
    var selectedUrl = "";
    var back = "";
    var email = "";
    var pas = "";
    var username = "";
    var phoneNum = "";
    var checkPhoneNumDir = '{{route('checkPhoneNum')}}';
    var checkActivationCodeDir = '{{route('checkActivationCode')}}';
    var retrievePasByEmailDir = '{{route('retrievePasByEmail')}}';
    var retrievePasByPhoneDir = '{{route('retrievePasByPhone')}}';
    var resendActivationCodeDir = '{{route('resendActivationCode')}}';
    var resendActivationCodeForgetDir = '{{route('resendActivationCodeForget')}}';
    var reminderTime = 0;
    var reminderTime2 = 0;
    var checkReCaptchaDir = '{{route('checkReCaptcha')}}';

    function resendActivationCode() {

        $.ajax({
            type: 'post',
            url: resendActivationCodeDir,
            data: {
                'phoneNum': phoneNum
            },
            success: function (response) {

                response = JSON.parse(response);

                reminderTime = response.reminder;

                if(response.status == "ok") {
                    if(reminderTime > 0) {
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

    function resendActivationCodeForget() {

        if(phoneNum.length == 0)
            return;

        $.ajax({
            type: 'post',
            url: resendActivationCodeForgetDir,
            data: {
                'phoneNum': phoneNum
            },
            success: function (response) {

                response = JSON.parse(response);

                reminderTime2 = response.reminder;
                if(response.status == "ok") {
                    if(reminderTime2 > 0) {
                        $("#reminderTimePaneForget").removeClass('hidden');
                        $("#resendActivationCodeForget").attr('disabled', 'disabled');
                        setTimeout("decreaseTime2()", 1000);
                    }
                    else {
                        $("#reminderTimePaneForget").addClass('hidden');
                        $("#resendActivationCodeForget").removeAttr('disabled');
                    }
                }
                else {
                    $("#reminderTimePaneForget").removeClass('hidden');
                    $("#resendActivationCodeForget").attr('disabled', 'disabled');
                    setTimeout("decreaseTime2()", 1000);
                }
            }
        })
    }

    function login(username, password) {

        if(username != "" && password != "") {
            $.ajax({
                type: 'post',
                url: loginDir,
                data: {
                    'username': username,
                    'password': password
                },
                success: function (response) {
                    if(response == "ok") {
                        hideElement('loginPopUp');
                        return document.location.href = selectedUrl;
                    }
                    else if(response == "nok2") {
                        $("#loginErr").empty().append('حساب کاربری شما غیر فعال شده است');
                    }
                    else {
                        $("#loginErr").empty().append('نام کاربری و یا رمز عبور اشتباه وارد شده است');
                    }
                },
                error: function (xhr, status, error) {
                    if(xhr.responseText == "Too Many Attempts.")
                        $("#loginErr").empty().append('تعداد درخواست های شما بیش از حد مجاز است. لطفا تا 5 دقیقه دیگر تلاش نفرمایید');
                }
            });
        }
    }

    function showLoginPrompt(url) {
        selectedUrl = url;
        $("#username_main").val("");
        $("#password_main").val("");
        showElement('loginPopUp');
        $(".dark").show();
    }

    function Return() {
        $(".pop-up").addClass('hidden');
        $('#loginPopUp').removeClass('hidden');
        $(".dark").show();
    }

    function showLoginEmail() {
        back = 'email';
        $("#email").val("");
        $("#password_In_Email_registry").val("");
        $(".pop-up").addClass('hidden');
        $('#EnterEmail-loginPopUp').removeClass('hidden');
        $(".dark").show();
    }

    function showLoginPhone() {
        $("#phoneNum").val("");
        $(".pop-up").addClass('hidden');
        $('#EnterPhone-loginPopUp').removeClass('hidden');
        $(".dark").show();
    }

    function decreaseTime() {

        $("#reminderTime").text((reminderTime % 60) + " : " + Math.floor(reminderTime / 60));

        if(reminderTime > 0) {
            reminderTime--;
            setTimeout("decreaseTime()", 1000);
        }
        else {
            $("#reminderTimePane").addClass('hidden');
            $("#resendActivationCode").removeAttr('disabled');
        }
    }

    function decreaseTime2() {

        $("#reminderTimeForget").text((reminderTime2 % 60) + " : " + Math.floor(reminderTime2 / 60));

        if(reminderTime2 > 0) {
            reminderTime2--;
            setTimeout("decreaseTime2()", 1000);
        }
        else {
            $("#reminderTimePaneForget").addClass('hidden');
            $("#resendActivationCodeForget").removeAttr('disabled');
        }
    }

    function checkPhoneNum() {

        $.ajax({
            type: 'post',
            url: checkPhoneNumDir,
            data: {
                'phoneNum': $("#phoneNum").val()
            },
            success: function (response) {

                response = JSON.parse(response);

                if(response.status == "ok") {

                    phoneNum = $("#phoneNum").val();
                    reminderTime = response.reminder;
                    if(reminderTime > 0) {
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
                else if(response.status == "nok") {
                    $("#loginErrPhonePass1").empty().append('شماره شما پیش از این در سامانه ثبت گردیده است.');
                }
                else if(response.status == "nok3") {
                    $("#loginErrPhonePass1").empty().append('اشکالی در ارسال پیام رخ داده است');
                }
                else {
                    $("#loginErrPhonePass1").empty().append('کد اعتبار سنجی برای شما ارسال شده است. برای ارسال مجدد کد باید 5 دقیقه منتظر بمانید');
                }
            }
        });

    }

    function showLoginCode() {

        if($("#phoneNum").val() != "") {
            checkPhoneNum();
        }
    }

    function checkActivationCode() {

        $.ajax({
            type: 'post',
            url: checkActivationCodeDir,
            data: {
                'phoneNum': phoneNum,
                'activationCode': $("#activationCode").val()
            },
            success: function (response) {
                if(response == "ok") {
                    back = "phone";
                    $("#password_In_Phone_registry").val("");
                    $(".pop-up").addClass('hidden');
                    $('#EnterPassword-loginPopUp').removeClass('hidden');
                    $(".dark").show();
                }
                else {
                    $("#loginErrActivationCode").empty().append('کد وارد شده معتبر نمی باشد');
                }
            }
        });

    }

    function showLoginPassword() {

        if($("#activationCode").val() != "") {
            checkActivationCode();
        }
    }

    function checkEmail(mail) {

        $.ajax({
            type: 'post',
            url: checkEmailDir,
            data: {
                'email': mail
            },
            success: function (response) {
                if(response == "ok") {
                    email = mail;
                    pas = $("#password_In_Email_registry").val();

                    $(".pop-up").addClass('hidden');
                    $('#EnterUsername-loginPopUp').removeClass('hidden');
                    $(".dark").show()
                }
                else {
                    $('#loginErrEmail').empty().append('ایمیل وارد شده در سامانه موجود است');
                }
            }
        });
    }

    function checkUserName() {

        if($("#invitationCode").val() != "") {
            $.ajax({
                type: 'post',
                url: checkUserNameDir,
                data: {
                    'username': $("#username_final").val(),
                    'invitationCode': $("#invitationCode").val()
                },
                success: function (response) {
                    if (response == "ok") {
                        $.ajax({
                            type: 'post',
                            url: registerAndLoginDir,
                            data: {
                                'username': $("#username_final").val(),
                                'password': pas,
                                'email': email,
                                'invitationCode': $("#invitationCode").val()
                            },
                            success: function (response) {
                                if (response == "ok") {
                                    document.location.href = '{{route('main')}}';
                                }
                            }
                        });
                    }
                    else if (response == "nok1") {
                        $("#loginErrUserName").empty().append('نام کاربری وارد شده در سامانه موجود است');
                    }
                    else {
                        $("#loginErrUserName").empty().append('کد معرف وارد شده نامعتبر است');
                    }
                }
            });
        }
        else {
            $.ajax({
                type: 'post',
                url: checkUserNameDir,
                data: {
                    'username': $("#username_final").val()
                },
                success: function (response) {
                    if (response == "ok") {
                        $.ajax({
                            type: 'post',
                            url: registerAndLoginDir,
                            data: {
                                'username': $("#username_final").val(),
                                'password': pas,
                                'email': email
                            },
                            success: function (response) {
                                if (response == "ok") {
                                    document.location.href = '{{route('main')}}';
                                }
                            }
                        });
                    }
                    else if (response == "nok1") {
                        $("#loginErrUserName").empty().append('نام کاربری وارد شده در سامانه موجود است');
                    }
                    else {
                        $("#loginErrUserName").empty().append('کد معرف وارد شده نامعتبر است');
                    }
                }
            });
        }
    }

    function checkUserName2() {

        $.ajax({
            type: 'post',
            url: checkUserNameDir,
            data: {
                'username': $("#username_final").val(),
                'invitationCode': $("#invitationCode").val()
            },
            success: function (response) {
                if (response == "ok") {
                    $.ajax({
                        type: 'post',
                        url: registerAndLoginDir2,
                        data: {
                            'username': $("#username_final").val(),
                            'password': pas,
                            'email': email,
                            'invitationCode': $("#invitationCode").val()
                        },
                        success: function (response) {
                            if (response == "ok") {
                                document.location.href = '{{route('main')}}';
                            }
                        }
                    });
                }
                else if (response == "nok1") {
                    $("#loginErrUserName").empty().append('نام کاربری وارد شده در سامانه موجود است');
                }
                else {
                    $("#loginErrUserName").empty().append('کد معرف وارد شده نامعتبر است');
                }
            }
        });
    }

    function registerAndLogin() {

        $.ajax({
            type: 'post',
            url: checkReCaptchaDir,
            data: {
                captcha: grecaptcha.getResponse()
            },
            success: function(response) {
                if(response == "ok") {
                    if(back == "email") {
                        if($("#username_final").val() != "") {
                            checkUserName();
                        }
                    }
                    else {
                        if($("#username_final").val() != "") {
                            checkUserName2();
                        }
                    }
                }
                else {
                    $("#loginErrUserName").empty().append('لطفا ربات نبودن خود را ثابت کنید');
                }
            }
        });
    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function showLoginUsername() {

        $("#username_final").val("");

        if(back == "email") {
            if ($("#email").val() != "" && $("#password_In_Email_registry").val() != "") {
                if (validateEmail($("#email").val())) {
                    checkEmail($("#email").val());
                }
                else
                    $('#loginErrEmail').empty().append('ایمیل وارد شده معتبر نمی باشد');
            }
        }
        else {
            if ($("#password_In_Phone_registry").val() != "") {
                pas = $("#password_In_Phone_registry").val();
                $(".pop-up").addClass('hidden');
                $('#EnterUsername-loginPopUp').removeClass('hidden');
                $(".dark").show()
            }
        }
    }

    function ShowForgetPass() {
        $(".pop-up").addClass('hidden');
        $('#ForgetPassword').removeClass('hidden');
        $(".dark").show();
    }

    function ShowEmail_ForgetPass() {
        $("#forget_email").val("");
        $(".pop-up").addClass('hidden');
        $('#Email_ForgetPass').removeClass('hidden');
        $(".dark").show();
    }

    function ShowPhone_ForgetPass() {
        $("#forget_phone").val();
        $(".pop-up").addClass('hidden');
        $('#Phone_ForgetPass').removeClass('hidden');
        $(".dark").show();
    }

    function goBack() {
        if(back == "email")
            showLoginEmail();
        else
            showLoginPassword();
    }

    function doRetrievePasByEmail() {
        $.ajax({
            type: 'post',
            url: retrievePasByEmailDir,
            data: {
                'email': $("#forget_email").val()
            },
            success: function (response) {

                $("#loginErrResetPasByEmail").empty();
                if(response == "ok") {
                    $("#loginErrResetPasByEmail").append('رمزعبور جدید به ایمیل وارد شده ارسال گردید');
                }
                else {
                    $("#loginErrResetPasByEmail").append('ایمیل وارد شده معتبر نمی باشد');
                }
            }
        });
    }

    function retrievePasByEmail() {

        if($("#forget_email").val() != "") {
            if(validateEmail($("#forget_email").val()))
                doRetrievePasByEmail();
            else {
                $("#loginErrResetPasByEmail").empty().append('ایمیل وارد شده معتبر نمی باشد');
            }
        }
    }

    function retrievePasByPhone() {
        if($("#forget_phone").val() != "") {
            $.ajax({
                type: 'post',
                url: retrievePasByPhoneDir,
                data: {
                    'phone': $("#forget_phone").val()
                },
                success: function (response) {

                    response = JSON.parse(response);

                    $("#loginErrResetPasByPhone").empty();
                    if(response.status == "ok") {
                        phoneNum = $("#forget_phone").val();
                        $("#loginErrResetPasByPhone").append('پسورد جدید به شماره وارد شده ارسال شده است');
                        $("#reminderTimePaneForget").removeClass('hidden');
                        $("#resendActivationCodeForget").removeClass('hidden').attr('disabled', 'disabled');
                        reminderTime2 = response.reminder;
                        setTimeout("decreaseTime2()", 1000);
                    }
                    else if(response.status == "nok"){
                        $("#loginErrResetPasByPhone").append('شماره وارد شده معتبر نمی باشد');
                    }
                    else {
                        $("#reminderTimePaneForget").removeClass('hidden');
                        $("#resendActivationCodeForget").removeClass('hidden').attr('disabled', 'disabled');
                        reminderTime2 = response.reminder;
                        setTimeout("decreaseTime2()", 1000);
                        $("#loginErrResetPasByPhone").append('اشکالی در ارسال پیام رخ داده است. لطفا دوباره تلاش فرمایید');
                    }
                }
            });
        }
    }

    function checkLogin() {

        $.ajax({
            type: 'post',
            url: checkLoginDir,
            success: function (response) {
                if(response == "ok")
                    return true;
                return false;
            }
        })
    }

    function checkedCheckBox() {

        if($("#checked").is(":checked")) {
            $("#submitAndFinishBtn").removeAttr('disabled');
        }
        else {
            $("#submitAndFinishBtn").attr('disabled', 'disabled');
        }
    }

</script>

<style>

    input[type="checkbox"]{
        display:none;
    }

    input[type="checkbox"] + label{
        color:#666666;
    }

    input[type="checkbox"] + label span{
        display:inline-block;
        width:19px;
        height:19px;
        margin:-2px 10px 0 0;
        vertical-align:middle;
        background:url('{{URL::asset('images/check_radio_sheet.png')}}') left top no-repeat;
        cursor:pointer;
    }

    input[type="checkbox"]:checked + label span{
        background:url('{{URL::asset('images/check_radio_sheet.png')}}') -19px top no-repeat;
    }

    .labelForCheckBox:before{
        background-color: transparent !important;
        border: none !important;
        content: "" !important;
    }

    @media(max-width: 1150px){
        #loginPopUp, #EnterEmail-loginPopUp, #EnterPhone-loginPopUp,
        #Send_AND_EnterCode-loginPopUp, #EnterPassword-loginPopUp,
        #EnterUsername-loginPopUp, #ForgetPassword, #Email_ForgetPass, #Phone_ForgetPass{
            left: 21%;
            right: 21%;
        }
    }

    @media(min-width: 1151px) and (max-width: 1500px){
        #loginPopUp, #EnterEmail-loginPopUp, #EnterPhone-loginPopUp,
        #Send_AND_EnterCode-loginPopUp, #EnterPassword-loginPopUp,
        #EnterUsername-loginPopUp, #ForgetPassword, #Email_ForgetPass, #Phone_ForgetPass{
            left: 24%;
            right: 24%;
        }
    }

    @media(min-width: 1501px) and (max-width: 1850px){
        #loginPopUp, #EnterEmail-loginPopUp, #EnterPhone-loginPopUp,
        #Send_AND_EnterCode-loginPopUp, #EnterPassword-loginPopUp,
        #EnterUsername-loginPopUp, #ForgetPassword, #Email_ForgetPass, #Phone_ForgetPass{
            left: 28%;
            right: 28%;
        }
    }

    @media(min-width: 1851px){
        #loginPopUp, #EnterEmail-loginPopUp, #EnterPhone-loginPopUp,
        #Send_AND_EnterCode-loginPopUp, #EnterPassword-loginPopUp,
        #EnterUsername-loginPopUp, #ForgetPassword, #Email_ForgetPass, #Phone_ForgetPass{
            left: 32%;
            right: 32%;
        }
    }
</style>

{{--loginPopUp--}}
<span id="loginPopUp" onkeyup="if(event.keyCode == 13) login($('#username_main').val(), $('#password_main').val())" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl;">
        <div class="loginPaneInLoginPopUp col-xs-6" style="border-right: 1px solid #cccccc">
            <div style="font-size: 14px !important;" class="header_text">در حال حاضر عضو شازده مسافر هستید؟!</div>
            <div>
                <div>
                    <label style="width: 100%">
                        <span style=" padding-top: 8px;"> نام کاربری </span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="username_main" maxlength="40" required autofocus>
                    </label>
                </div>
                <div>
                    <label style="width: 100%">
                        <span style=" padding-top: 8px;">رمز عبور</span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_main" maxlength="40" required>
                        <a onclick="ShowForgetPass()" style="cursor: pointer; font-size: 11px; padding-top: 8px; display: block;">رمز عبور خود را فراموش کردید؟</a>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button onclick="login($('#username_main').val(), $('#password_main').val())" class="btn btn-info active" style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ورود</button>
                <p style="margin-top: 10px; color: #963019" id="loginErr"></p>
            </div>
        </div>
        <div class="registerPaneInLoginPopUp col-xs-6">
            <div style="font-size: 14px !important;" class="header_text">عضو نیستید !!</div>
            <button class="btn" style="width: 90%; margin: 0 5px 15px 5px;background: #4DC7BC;color: #FFF;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;" onclick="showLoginEmail()">
                {{--<img src="{{URL::asset('images/email.png')}}" style="width: 20px; float: right; margin-left: 10px">--}}
                <div style="background-size: 20px;background-position:  0 0;width: 20px;height:  20px;float:  right;background-image: url('{{URL::asset('images') . 'loginPopup.png'}}');background-repeat:  no-repeat;margin-left:  10px;"></div>
                <span style="float: right;">ایمیل</span>
            </button>
            <button class="btn" style="width: 90%; margin: 0 5px 15px 5px;background: #4DC7BC;color: #FFF;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px; " onclick="showLoginPhone()">
                {{--<img src="{{URL::asset('images/Telephone.png')}}" style="width: 20px; float: right; margin-left: 10px">--}}
                <div style="background-size: 20px;background-position:  0 -41px;width: 20px;height:  20px;float:  right;background-image: url('{{URL::asset('images') . 'loginPopup.png'}}');background-repeat:  no-repeat;margin-left:  10px;"></div>
                <span style="float: right;" >تلفن همراه</span></button>
            <button class="btn" onclick="document.location.href = '{{$authUrl}}'" style="width: 90%; margin: 0 5px 15px 5px;background: #4DC7BC;color: #FFF;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">
                {{--<img src="{{URL::asset('images/google.png')}}" style="width: 20px; float: right; margin-left: 10px">--}}
                <div style="background-size: 20px;background-position:  0 -21px;width: 20px;height:  20px;float:  right;background-image: url('{{URL::asset('images') . 'loginPopup.png'}}');background-repeat:  no-repeat;margin-left:  10px;"></div>
                <span style="float: right;">گوگل</span>
            </button>
            <div style="font-size: 14px !important; text-align: justify" class="header_text">همین حالا به سادگی در شازده مسافر عضو شوید و از امکانات آن استفاده کنید.
                </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('loginPopUp')"></div>
</span>

{{--Enter Email in login PopUp--}}
<span id="EnterEmail-loginPopUp" onkeyup="if(event.keyCode == 13) login($('#username_email').val(), $('#password_email').val())" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl;">
        <div class="col-xs-6" style="border-right: 1px solid #cccccc">
            <div style="font-size: 14px !important;" class="header_text">در حال حاضر عضو شازده مسافر هستید؟!</div>
            <div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;"> نام کاربری </span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="username_email" maxlength="40" required autofocus>
                    </label>
                </div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;">رمز عبور</span>
                        <input style="max-width: 85%; width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_email" class="password" maxlength="40" required>
                        <a onclick="ShowForgetPass()" style="cursor:pointer; font-size: 11px; padding-top: 8px; display: block;">رمز عبور خود را فراموش کردید؟</a>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button onclick="login($('#username_email').val(), $('#password_email').val())" class="btn btn-info active" style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ورود</button>
                <p style="margin-top: 10px" id="loginErr"></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div style="font-size: 14px !important;" class="header_text">عضو شوید:</div>
            <div>
                <div>
                    <label>
                        <span style=" padding-top: 8px;"> آدرس ایمیل </span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="email" id="email" maxlength="40" required autofocus>
                    </label>
                </div>
                <div>
                    <label>
                        <span style=" padding-top: 8px;">رمز عبور</span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_In_Email_registry" maxlength="40" required>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button type="button" onclick="showLoginUsername()" class="btn btn-info active" style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ثبت</button>
                <button type="button" onclick="Return()" class="btn btn-default" style="border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;" >بازگشت</button>
                <p style="margin-top: 10px" id="loginErrEmail"></p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('EnterEmail-loginPopUp')"></div>
</span>

{{--Enter Phone in login PopUp--}}
<span id="EnterPhone-loginPopUp" onkeyup="if(event.keyCode == 13) login($('#username_phone').val(), $('#password_phone').val())" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl;">
        <div class="col-xs-6" style="border-right: 1px solid #cccccc">
            <div style="font-size: 14px !important;" class="header_text">در حال حاضر عضو شازده مسافر هستید؟!</div>
            <div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;"> نام کاربری </span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="username_phone" maxlength="40" required autofocus>
                    </label>
                </div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;">رمز عبور</span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_phone" class="password" maxlength="40" required>
                        <a onclick="ShowForgetPass()" style="cursor:pointer; font-size: 11px; padding-top: 8px; display: block;">رمز عبور خود را فراموش کردید؟</a>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button onclick="login($('#username_phone').val(), $('#password_phone').val())" class="btn btn-info active" style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ورود</button>
                <p style="margin-top: 10px" id="loginErr"></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div style="font-size: 14px !important;" class="header_text">عضو شوید:</div>
            <div>
                <div>
                    <label>
                        <span style=" padding-top: 8px;">موبایل خود را وارد کنید </span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" placeholder="09xxxxxxxxx" type="tel" id="phoneNum" maxlength="40" required autofocus>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button type="button" onclick="showLoginCode()" class="btn btn-info active"  style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ثبت</button>
                <button type="button" onclick="Return()" class="btn btn-default" style="border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;" >بازگشت</button>
                <p style="margin-top: 10px" id="loginErrPhonePass1"></p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('EnterPhone-loginPopUp')"></div>
</span>

{{--Send & Enter Code in login PopUp--}}
<span id="Send_AND_EnterCode-loginPopUp" onkeyup="if(event.keyCode == 13) login($('#username_2').val(), $('#password_2').val())" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl;">
        <div class="col-xs-6" style="border-right: 1px solid #cccccc">
            <div style="font-size: 14px !important;" class="header_text">در حال حاضر عضو شازده مسافر هستید؟!</div>
            <div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;"> نام کاربری </span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="username_2" maxlength="40" required autofocus>
                    </label>
                </div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;">رمز عبور</span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_2" class="password" maxlength="40" required>
                        <a onclick="ShowForgetPass()" style="cursor: pointer; font-size: 11px; padding-top: 8px; display: block;">رمز عبور خود را فراموش کردید؟</a>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button onclick="login($('#username_2').val(), $('#password_2').val())" class="btn btn-info active" style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ورود</button>
                <p style="margin-top: 10px" id="loginErr"></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div style="font-size: 14px !important;" class="header_text">لطفا کد اعتبار سنجی را وارد نمایید:</div>
            <div>
                <div>
                    <label>
                        <span style="font-size: 12px !important;" class="header_text">این کد به گوشی شما ارسال گردیده است.</span>

                        <span style=" padding-top: 8px;"> کد اعتبار سنجی </span>
                        <input style="margin-bottom: 5px;width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" maxlength="40" id="activationCode" required autofocus>
                        <p id="reminderTimePane" style="padding-top: 8px;font-size: 10px;">
                            <span>  زمان باقی مانده برای ارسال مجدد کد اعتبار سنجی شما :</span>
                            <span id="reminderTime"></span>
                        </p>
                        <button style="background: #963019;border-color: #963019;" onclick="resendActivationCode()" disabled id="resendActivationCode" class="btn btn-success"> ارسال مجدد کد اعتبار سنجی </button>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button type="button" onclick="showLoginPassword()" class="btn btn-info active"  style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ثبت</button>
                <p style="margin-top: 10px;color: #963019;" id="loginErrActivationCode"></p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('Send_AND_EnterCode-loginPopUp')"></div>
</span>

{{--Enter Password in login PopUp--}}
<span id="EnterPassword-loginPopUp" onkeyup="if(event.keyCode == 13) login($('#username_3').val(), $('#password_3').val())" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl;">
        <div class="col-xs-6" style="border-right: 1px solid #cccccc">
            <div style="font-size: 14px !important;" class="header_text">در حال حاضر عضو شازده مسافر هستید؟!</div>
            <div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;"> نام کاربری </span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="username_3" maxlength="40" required autofocus>
                    </label>
                </div>
                <div>
                    <label style=" width: 100%;">
                        <span style=" padding-top: 8px;">رمز عبور</span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_3" class="password" maxlength="40" required>
                        <a onclick="ShowForgetPass()" style="cursor: pointer; font-size: 11px; padding-top: 8px; display: block;">رمز عبور خود را فراموش کردید؟</a>
                    </label>
                </div>
            </div>
            <div style=" padding-top: 8px;">
                <button onclick="login($('#username_3').val(), $('#password_3').val())" class="btn btn-info active" style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ورود</button>
                <p style="margin-top: 10px" id="loginErr"></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div style="font-size: 14px !important;" class="header_text">رمز عبور خود را وارد نمایید:</div>
            <div>
                <div>
                    <label>
                        <span style=" padding-top: 8px;">رمز عبور</span>
                        <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_In_Phone_registry" maxlength="40" required>
                    </label>
                </div>
            </div>
            <div style="padding-top: 8px;">
                <button type="button" onclick="showLoginUsername()" class="btn btn-info active"  style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ثبت</button>
                <p style="margin-top: 10px" id="loginErr"></p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('EnterPassword-loginPopUp')"></div>
</span>

{{--Enter Username in login PopUp--}}
<span id="EnterUsername-loginPopUp" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl;">
        <div class="col-xs-6" style="border-right: 1px solid #cccccc">
            <script async src='https://www.google.com/recaptcha/api.js'></script>

            <input id='checked' onchange='checkedCheckBox()' type='checkbox' value='-1'>
            <label class='labelForCheckBox' for='checked'>
                <span></span>&nbsp;
            </label>

            <span style="font-size: 14px;"> شرایط استفاده و <a target="_blank" href="{{route('policies')}}">قوانین سایت</a> را مطالعه کرده و با آن موافقم.</span>

            <div>
                <div class="g-recaptcha" data-sitekey="6LcaSzwUAAAAAOl9ZYs_u90DLJjRh1-SRW-fp4Z0" style="margin-left: 30px;transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:right;-webkit-transform-origin:right;"></div>
            </div>
            <br>
             <button id="submitAndFinishBtn" type="button" onclick="registerAndLogin()" class="btn btn-info active" disabled style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ثبت</button>
            <p style="margin-top: 10px;color: #963019;" id="loginErrUserName"></p>
        </div>
        <div class="col-xs-6">


            <div style="font-size: 14px !important;" class="header_text">قدم آخر!</div>
            <div>
                <label>
                    <span style="font-size: 12px !important;" class="header_text">نام کاربری خود را انتخاب کنید.دوستانتان در سایت شما را با این نام خواهند شناخت.</span>
                    <span style=" padding-top: 8px;">نام کاربری</span>
                    <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="username_final" maxlength="40" required>
                    <br/>
                    <br/>
                    <span style="font-size: 12px !important;" class="header_text">در صورتی که دوستانتان شما را معرفی کرده اند، کد معرف خود را در کادر زیر وارد کنید.</span>
                    <span style=" padding-top: 8px;">کد معرف</span>
                    <input style="width:60%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="invitationCode" maxlength="6">
                </label>
            </div>
            <div style=" padding-top: 8px;">






            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="document.location.href = '{{route('main')}}'"></div>
</span>

{{--Forget Password in login PopUp--}}
<span id="ForgetPassword" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl; text-align: center;">
        <div style="font-size: 14px !important;" class="header_text">برای بازیابی رمزعبور تان از کدام طریق اقدام میکنید:</div>
        <div>
            <label>
                <button class="btn" style="width: 90%; margin: 0 5px 15px 5px;background: #4DC7BC;color: #FFF;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;" onclick="ShowEmail_ForgetPass()">
                    <div style="background-size: 20px;background-position:  0 0;width: 20px;height:  20px;float:  right;background-image: url('{{URL::asset('images') . 'loginPopup.png'}}');background-repeat:  no-repeat;margin-left:  10px;"></div>
                    <span style="float: right;">ایمیل</span>
                </button>
                <button class="btn" style="width: 90%; margin: 0 5px 15px 5px;background: #4DC7BC;color: #FFF;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;" onclick="ShowPhone_ForgetPass()">
                    <div style="background-size: 20px;background-position:  0 -41px;width: 20px;height:  20px;float:  right;background-image: url('{{URL::asset('images') . 'loginPopup.png'}}');background-repeat:  no-repeat;margin-left:  10px;"></div>
                    <span style="float: right;" >تلفن همراه</span>
                </button>
            </label>
        </div>
        <div style=" padding-top: 8px;">
            <button type="button" onclick="Return()" class="btn btn-default" style="border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0 2px 3px 0;">بازگشت</button>
            <p style="margin-top: 10px" id="loginErr"></p>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('ForgetPassword')"></div>
</span>

{{--Enter Email for ForgetPass in login PopUp--}}
<span id="Email_ForgetPass" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl; text-align: center;">
        <div>
            <label>
                <span style=" padding-top: 8px;"> آدرس ایمیل </span>
                <input style="width:85%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="email" id="forget_email" maxlength="40" required autofocus>
            </label>
        </div>
        <div style=" padding-top: 8px;">
            <button type="button" onclick="retrievePasByEmail()" class="btn btn-info active"  style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ثبت</button>
            <button type="button" onclick="ShowForgetPass()" class="btn btn-default" style="border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;" >بازگشت</button>
            <p style="margin-top: 10px" id="loginErrResetPasByEmail"></p>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('Email_ForgetPass')"></div>
</span>

{{--Enter Phone for ForgetPass in login PopUp--}}
<span id="Phone_ForgetPass" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%;bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl; text-align: center;">
        <div>
            <label>
                <span style=" padding-top: 8px;"> شماره موبایل خود را وارد نمایید </span>
                <input style="width:55%;padding: 7px;text-align: center;margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" placeholder="09xxxxxxxxx" type="tel" id="forget_phone" maxlength="40" required autofocus>
                <p id="reminderTimePaneForget" class="hidden" style="padding-top: 8px;">
                    <span> : زمان باقی مانده برای ارسال مجدد پسورد جدید </span>
                    <span id="reminderTimeForget"></span>
                </p>
                <button onclick="resendActivationCodeForget()" disabled id="resendActivationCodeForget" class="btn btn-success hidden"> ارسال مجدد کد فعال سازی </button>
            </label>
        </div>
        <div style=" padding-top: 8px;">
            <button type="button" onclick="retrievePasByPhone()" class="btn btn-info active"  style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ثبت</button>
            <button type="button" onclick="ShowForgetPass()" class="btn btn-default" style="border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;" >بازگشت</button>
            <p style="margin-top: 10px" id="loginErrResetPasByPhone"></p>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('Phone_ForgetPass')"></div>
</span>