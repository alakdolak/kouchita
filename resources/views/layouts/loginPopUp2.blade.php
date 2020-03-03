<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

if(Auth::check())
    return Redirect::to(route('main'));

require_once (__DIR__ . '/../../../app/Http/Controllers/glogin/libraries/Google/autoload.php');

//Insert your cient ID and secret
//You can get it from : https://console.developers.google.com/
$client_id = '774684902659-1tdvb7r1v765b3dh7k5n7bu4gpilaepe.apps.googleusercontent.com';
$client_secret = '8NM4weptz-Pz-6gbolI5J0yi';
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

    function showLoginCode() {

        if($("#phoneNum").val() != "") {
            checkPhoneNum();
        }
    }

    function showLoginPassword() {

        if($("#activationCode").val() != "") {
            checkActivationCode();
        }
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

    function ShowPhone_ForgetPass() {
        $("#forget_phone").val();
        $(".pop-up").addClass('hidden');
        $('#Phone_ForgetPass').removeClass('hidden');
        $(".dark").show();
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
        #loginPopUp {
            left: 27%;
            right: 27%;
        }
    }

    @media(min-width: 1151px) and (max-width: 1500px){
        #loginPopUp {
            left: 32%;
            right: 32%;
        }
    }

    @media(min-width: 1501px) and (max-width: 1850px){
        #loginPopUp {
            left: 36%;
            right: 36%;
        }
    }

    @media(min-width: 1851px){
        #loginPopUp{
            left: 40%;
            right: 40%;
        }
    }
</style>

{{--loginPopUp2--}}
<span id="loginPopUp" onkeyup="if(event.keyCode == 13) login($('#username_main').val(), $('#password_main').val())" class="pop-up ui_modal hidden" style="position: fixed;width: auto;top: 7%; bottom: auto;z-index: 10000001;padding: 40px 20px !important;height: auto;overflow: auto;">
    <div>
        <img src="{{URL::asset('images/logo.svg')}}" style="margin-bottom: 20px; width: 100%; height: 50px;">
    </div>
    <div class="col-xs-12" style="direction: rtl;">
        <div class="loginPaneInLoginPopUp col-xs-6" style="text-align: center;">
            <div style="font-size: 14px !important;" class="header_text">در حال حاضر عضو کوچیتا هستید؟!</div>
            <div>
                <div>
                    <label style="width: 100%">
                        <div style="width:70%; margin: 0 15%; text-align: right;  padding-top: 8px;"> نام کاربری </div>
                        <input style="width:70%; margin: 0 15%; text-align: right; padding: 7px; margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="text" id="username_main" maxlength="40" required autofocus>
                    </label>
                </div>
                <div>
                    <label style="width: 100%">
                        <div style="width:70%; margin: 0 15%; text-align: right;  padding-top: 8px;">رمز عبور</div>
                        <input style="width:70%; margin: 0 15%; text-align: right; padding: 7px; margin-top: 8px;border-radius: 5px;border: 1px solid #CCC;" type="password" id="password_main" maxlength="40" required>
                        <a onclick="ShowForgetPass()" style="width:70%; margin: 0 15%; text-align: right; cursor: pointer; font-size: 11px; padding-top: 8px; display: block;">رمز عبور خود را فراموش کردید؟</a>
                    </label>
                </div>
            </div>
            <div style="width:70%; margin: 0 15%; text-align: right; padding-top: 8px;">
                <button onclick="login($('#username_main').val(), $('#password_main').val())" class="btn btn-info active" style="background: #4DC7BC;border-color: #4DC7BC;padding-left: 22px;padding-right: 20px;border-radius: 10px;;box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 3px 0px;">ورود</button>
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <p style="margin-top: 10px; color: #963019" id="loginErr"></p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('loginPopUp')"></div>
</span>
