<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

if (Auth::check())
    return Redirect::to(route('main'));

require_once(__DIR__ . '/../../../app/Http/Controllers/glogin/libraries/Google/autoload.php');

//Insert your cient ID and secret
//You can get it from : https://console.developers.google.com/
$client_id = '774684902659-1tdvb7r1v765b3dh7k5n7bu4gpilaepe.apps.googleusercontent.com';
$client_secret = 'ARyU8-RXFJZD5jl5QawhpHne';
$redirect_uri = route('loginWithGoogle');

/************************************************
Make an API request on behalf of a user. In
this case we need to have a valid OAuth 2.0
token for the user, so we need to send them
through a login flow. To do this we need some
information from our API console project.
 ************************************************/
$client = new \Google_Client();
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
$service = new \Google_Service_Oauth2($client);
$authUrl = $client->createAuthUrl();

?>

<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/loginPopUp.css')}}'/>

<style>
    .registerLeftSection{
        width: 40%;
        background: #053a3e;
    }

    @media (max-width: 800px){
        .loginPopUpContent{
            width: 100%;
        }
        .registerRightSection{
            width: 100%;
        }
        .registerLeftSection{
            display: none;
        }
    }
</style>

{{--loginPopUp--}}
<form id="second_login" method="post" action="{{route('checkLogin')}}">
    {!! csrf_field() !!}
    <input id="form_userName" name="username" type="hidden">
    <input id="form_pass" name="password" type="hidden">
</form>

<div id="mainLoginPopUp" class="mainLoginPupUpBack hidden">

    <span id="loginPopUp" class="loginPopUpContent" onkeyup="if(event.keyCode == 13) login($('#username_main').val(), $('#password_main').val())">
        <div class="mainDivLoginMainLogo">
            <img class="loginMainLogo" src="{{URL::asset('images/icons/mainIcon.svg')}}">
        </div>
        <div class="col-xs-12 rtl mainContentInfos">
            <div class="loginPaneInLoginPopUp loginDividerBorder col-xs-6">
                <div style="margin-bottom: 10px;">در حال حاضر عضو کوچیتا هستید؟!</div>
                <div>
                    <div class="loginRowsPopup">
                        <span class="pd-tp-8 inputLabelText"> نام کاربری </span>
                        <input class="loginInputTemp " type="text" id="username_main" maxlength="40" required
                               autofocus>
                    </div>
                    <div class="loginRowsPopup">
                        <span class="pd-tp-8 inputLabelText">رمز عبور</span>
                        <input class="loginInputTemp" type="password" id="password_main" maxlength="40"
                               required>
                        <a class="forgetPassLink" onclick="openRegisterSection('ForgetPassword')">رمز عبور خود را فراموش کردید؟</a>
                    </div>
                </div>
                <div class="pd-tp-8">
                    <div class="loginButtonsMainDiv">
                        <div class="signInBtnMainDiv">
                            <button onclick="login($('#username_main').val(), $('#password_main').val())"
                                    class="loginSubBtn btn btn-info active">ورود</button>
                        </div>
                        {{--<div class="g-signin2" data-onsuccess="onSignIn"></div>--}}
                        <a href="{{$authUrl}}" class="googleA">
                            <div class="g-signin2">
                            <div style="height:36px;width:120px;" class="abcRioButton abcRioButtonLightBlue">
                                <div class="abcRioButtonContentWrapper"
                                     style="display: flex; box-shadow: 0 2px 4px 0 rgba(0,0,0,.25); direction: ltr; cursor: pointer">
                                    <div class="abcRioButtonIcon" style="padding:8px">
                                        <div style="width:18px;height:18px;"
                                             class="abcRioButtonSvgImageWithFallback abcRioButtonIconImage abcRioButtonIconImage18">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px"
                                                 height="18px" viewBox="0 0 48 48" class="abcRioButtonSvg">
                                                <g>
                                                    <path fill="#EA4335"
                                                          d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path><path
                                                            fill="#4285F4"
                                                            d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path><path
                                                            fill="#FBBC05"
                                                            d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path><path
                                                            fill="#34A853"
                                                            d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path><path
                                                            fill="none" d="M0 0h48v48H0z"></path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <span style="font-size:13px;line-height:34px; margin-left: 15px;"
                                          class="abcRioButtonContents">
                                        <span id="not_signed_inyx5syaq6qblq">Sign in</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <p id="loginErr"></p>
                </div>
            </div>

            <div class="registerPaneInLoginPopUp col-xs-6">
                <div style="margin-bottom: 10px;">عضو نیستید !!</div>
                <button class="btn" onclick="openRegisterSection('email')">
                    <div></div>
                    <span>ایمیل</span>
                </button>
                <button class="btn" onclick="openRegisterSection('phone')">
                    <div></div>
                    <span>تلفن همراه</span>
                </button>
                <button class="btn" onclick="document.location.href = '{{$authUrl}}'">
                    <div></div>
                    <span>گوگل</span>
                </button>
                <div class="header_text font-size-14Imp">همین حالا به سادگی در کوچیتا عضو شوید و از امکانات آن استفاده کنید.</div>
            </div>
        </div>
        <div class="iconFamily iconClose loginCloseIcon" onclick="closeLoginPopup()"></div>
    </span>

    <div id="registerDiv" class="loginPopUpContent hidden" style="justify-content: space-between; flex-direction: row; padding: 15px;">
        <div class="iconFamily iconClose closeLoginPopup" onclick="closeLoginPopup()"></div>

        <div class="registerRightSection">

            <div id="registerMainLogo">
                <img class="loginMainLogo" src="{{URL::asset('images/icons/mainIcon.svg')}}">
            </div>

            <div>
                <span id="EnterEmail-loginPopUp" onkeyup="if(event.keyCode == 13) emailRegister()" class="hidden">
                    <div class="mainContentInfos">
                        <div class="header_text font-size-14Imp">عضو شوید:</div>
                        <div>
                            <div class="loginPopUpLable">آدرس ایمیل خود را وارد کنید</div>
                            <input type="email" id="emailRegisterInput" class="loginInputTemp" style="width: 100%" maxlength="40" required autofocus>
                        </div>
                        <div class="pd-tp-8">
                            <p id="loginErrEmail"></p>
                            <div style="display: flex;">
                                <button type="button" onclick="emailRegister()" class="loginSubBtn btn btn-info active" style="margin-left: 10px">ثبت</button>
                                <button type="button" onclick="Return('EnterEmail-loginPopUp')" class="loginReturnBtn btn btn-default">بازگشت</button>
                            </div>
                        </div>
                    </div>
                </span>

                {{--Enter Phone in login PopUp--}}
                <span id="EnterPhone-loginPopUp" class="hidden"
                      onkeyup="if(event.keyCode == 13) checkInputPhoneRegister()">
                    <div class="mainContentInfos">
                        <div>عضو شوید:</div>
                        <div >
                            <div class="loginPopUpLable">موبایل خود را وارد کنید</div>
                            <input class="loginInputTemp" type="text" id="phoneRegister" maxlength="11" placeholder="09xxxxxxxxx" required autofocus>
                        </div>
                        <div class="pd-tp-8">
                            <p id="loginErrPhonePass1" style="color: #963019;"></p>
                            <div style="display: flex;">
                                <button type="button" onclick="checkInputPhoneRegister()" class="loginSubBtn btn btn-info active" style="margin-left: 10px;">ثبت</button>
                                <button type="button" onclick="Return('EnterPhone-loginPopUp')" class="loginReturnBtn btn btn-default">بازگشت</button>
                            </div>
                        </div>
                    </div>
                </span>

                {{--Send & Enter Code in login PopUp--}}
                <span id="Send_AND_EnterCode-loginPopUp" class="hidden" onkeyup="if(event.keyCode == 13) checkActivationCode()">
                    <div class="col-xs-12 rtl mainContentInfos">
                        <div>لطفا کد اعتبار سنجی را وارد نمایید:</div>
                        <div style="margin-top: 10px">
                            <span class="header_text font-size-12Imp">این کد به گوشی شما ارسال گردیده است.</span>
                            <div>
                                <div class="loginPopUpLable"> کد اعتبار سنجی </div>
                                <input class="loginInputTemp" type="text" maxlength="40" id="activationCode" required autofocus>
                                <p id="loginErrActivationCode" class="loginErrActivationCode"></p>
                            </div>
                            <div id="reminderTimePane" class="reminderTimeDiv" style="font-size: 13px; margin-bottom: 0px">
                                <span>  زمان باقی مانده برای ارسال مجدد کد اعتبار سنجی شما :</span>
                                <span id="reminderTime" class="reminderTime"></span>
                            </div>
                            <button onclick="resendActivationCode('register', this)" id="resendActivationCode" class="btn btn-success resendActivationCode hidden"> ارسال مجدد کد اعتبار سنجی </button>
                        </div>
                        <div class="pd-tp-8">
                            <button type="button" onclick="checkActivationCode()" class="loginSubBtn btn btn-info active">ثبت</button>
                            <button type="button" onclick="Return('Send_AND_EnterCode-loginPopUp')" class="loginReturnBtn btn btn-default">بازگشت</button>
                        </div>
                    </div>
                </span>
                {{--Enter Username in login PopUp--}}
                <span id="EnterUsername-loginPopUp" class="hidden">
                    <div class="col-xs-12 rtl mainContentInfos">
                        <div class="header_text font-size-14Imp font-weight-700">قدم آخر!</div>
                            <div>
                                <span class="header_text font-size-12Imp text-align-justify">نام کاربری خود را انتخاب کنید.دوستانتان در سایت شما را با این نام خواهند شناخت.</span>
                                <div class="loginRowsPopup loginRowsPopupInline">
                                    <span class="loginInputLabel">نام کاربری</span>
                                    <input type="text" class="loginInputTemp" id="usernameRegister" maxlength="40" required>
                                </div>
                                <div class="loginRowsPopup loginRowsPopupInline" style="margin-bottom: 10px">
                                    <span class="loginInputLabel">رمز عبور</span>
                                    <input type="password" class="loginInputTemp" id="passwordRegister" required>
                                </div>
                                <span style="font-size: 12px">در صورتی که دوستانتان شما را معرفی کرده اند، کد معرف خود را در کادر زیر وارد کنید.</span>
                                <div class="loginRowsPopup loginRowsPopupInline" style="margin-top: 5px">
                                    <span  class="loginInputLabel">کد معرف</span>
                                    <input type="text" id="invitationCode" class="loginInputTemp" maxlength="6">
                                </div>
                            </div>
                            <div style="display: flex; margin: 10px 0px;">
                                <input id='checked' onchange='checkedCheckBox()' type='checkbox' value='-1' style="margin-left: 5px;">
                                <label class='labelForCheckBox' for='checked'>
                                    <span></span>&nbsp;
                                </label>
                                <div style="margin-right: 5px"> شرایط استفاده و
                                    <a target="_blank" href="{{route('policies')}}" style="color: blue;">قوانین سایت</a>
                                    را مطالعه کرده و با آن موافقم.
                                </div>
                            </div>
                            <div>
                                <script async src='https://www.google.com/recaptcha/api.js?hl=fa'></script>
                                <div class="g-recaptcha" data-sitekey="6LfiELsUAAAAAO3Pk-c6cKm1HhvifWx9S8nUtxTb"></div>
                            </div>
                            <button id="submitAndFinishBtn" type="button" onclick="checkRecaptcha()"
                                    class="loginSubBtn btn btn-info active" disabled>ثبت</button>
                            <p id="loginErrUserName"></p>
                    </div>
                </span>


                {{--Forget Password in login PopUp--}}
                <span id="ForgetPassword" class="hidden">
                    <div class="col-xs-12 mainContentInfos">
                        <div style="margin-bottom: 10px">برای بازیابی رمزعبور تان از کدام طریق اقدام میکنید:</div>
                        <div>
                            <button class="btn showDetailsBtn" onclick="showForgatenPassInput('Email_ForgetPass')">
                                <div class="emailLogo"></div>
                                <span class="float-right">ایمیل</span>
                            </button>
                            <button class="btn showDetailsBtn" onclick="showForgatenPassInput('Phone_ForgetPass')">
                                <div class="phoneLogo"></div>
                                <span class="float-right">تلفن همراه</span>
                            </button>
                        </div>
                        <div class="pd-tp-8">
                            <button type="button" onclick="Return('ForgetPassword')" class="returnBtnForgetPass btn btn-default">بازگشت</button>
                            <p id="loginErr"></p>
                        </div>
                    </div>
                </span>
                {{--Enter Email for ForgetPass in login PopUp--}}
                <span id="Email_ForgetPass" class="hidden">
                    <div class="col-xs-12 rtl mainContentInfos">
                        <div>
                            <span class="pd-tp-8"> آدرس ایمیل </span>
                            <input class="loginInputTemp" type="email" id="forget_email" maxlength="40" required autofocus>
                        </div>
                        <div class="pd-tp-8">
                            <button type="button" onclick="retrievePasByEmail()" class="loginSubBtn btn btn-info active">ثبت</button>
                            <button type="button" onclick="Return('Email_ForgetPass')" class="loginReturnBtn btn btn-default">بازگشت</button>
                            <p id="loginErrResetPasByEmail"></p>
                        </div>
                    </div>
                </span>

                {{--Enter Phone for ForgetPass in login PopUp--}}
                <span id="Phone_ForgetPass" class="hidden">
                    <div class="col-xs-12 mainContentInfos">
                        <div>
                            <span class="pd-tp-8"> شماره موبایل خود را وارد نمایید </span>
                            <input class="loginInputTemp" placeholder="09xxxxxxxxx" type="tel" id="phoneForgetPass" maxlength="40" required autofocus>
                            <div class="pd-tp-8">
                                <button type="button" onclick="sendForgetPassPhone()" class="loginSubBtn btn btn-info active">ثبت</button>
                                <button type="button" onclick="Return('Phone_ForgetPass')" class="loginReturnBtn btn btn-default">بازگشت</button>
                                <p id="loginErrResetPasByPhone"></p>
                            </div>
                        </div>
                    </div>
                </span>

                <span id="PhoneCodePasswordForget" class="hidden">
                    <div class="col-xs-12 rtl mainContentInfos">
                        <div>لطفا کد اعتبار سنجی را وارد نمایید:</div>
                        <div style="margin-top: 10px">
                            <span class="header_text font-size-12Imp">این کد به گوشی شما ارسال گردیده است.</span>
                            <div>
                                <div class="loginPopUpLable"> کد اعتبار سنجی </div>
                                <input class="loginInputTemp" type="text" maxlength="40" id="activationCodeForgetPass" required autofocus>
                                <p id="loginErrActivationCodeForgetPass" class="loginErrActivationCode" style="color: #963019"></p>
                            </div>
                            <div id="reminderTimePaneForgetPass" class="reminderTimeDiv" style="font-size: 13px; margin-bottom: 0px">
                                <span>  زمان باقی مانده برای ارسال مجدد کد اعتبار سنجی شما :</span>
                                <span id="reminderTimeForgetPass" class="reminderTime"></span>
                            </div>
                            <button onclick="resendActivationCode('forget', this)" id="resendActivationCodeForgetPass" class="btn btn-success resendActivationCode hidden"> ارسال مجدد کد اعتبار سنجی </button>
                        </div>
                        <div class="pd-tp-8">
                            <button type="button" onclick="checkValidateForgetPass()" class="loginSubBtn btn btn-info active">ثبت</button>
                            <button type="button" onclick="Return('PhoneCodePasswordForget')" class="loginReturnBtn btn btn-default">بازگشت</button>
                        </div>
                    </div>
                </span>

                <span id="setNewPassword" class="hidden">
                    <div class="col-xs-12 rtl mainContentInfos">
                        <div>رمز عبور جدید خود را وارد نمایید:</div>
                        <div style="margin-top: 10px">
                            <div>
                                <div class="loginPopUpLable"> رمز عبور جدید </div>
                                <input class="loginInputTemp" type="password" id="newPassword" required autofocus>
{{--                                <p id="loginErrActivationCodeForgetPass" class="loginErrActivationCode" style="color: #963019"></p>--}}
                            </div>
                        </div>
                        <div class="pd-tp-8">
                            <button type="button" onclick="submitNewPassword()" class="loginSubBtn btn btn-info active">ثبت</button>
                        </div>
                    </div>
                </span>

            </div>
        </div>

        <div class="registerLeftSection"></div>

    </div>

</div>

<script>

    let phoneCodeRegister = null;
    var selectedUrl = "";
    var back = "";
    var email = "";
    var pas = "";
    var username = "";
    var phoneNum = "";
    var reminderTime = 0;
    var reminderTime2 = 0;
    var mainLoginDir = '{{route('login2')}}';
    var checkEmailDir = '{{route('checkEmail')}}';
    var checkPhoneNumDir = '{{route('checkPhoneNum')}}';
    var checkUserNameDir = '{{route('checkUserName')}}';
    var checkReCaptchaDir = '{{route('checkReCaptcha')}}';
    var registerAndLoginDir = '{{route('registerAndLogin')}}';
    var retrievePasByPhoneDir = '{{route('retrievePasByPhone')}}';
    var retrievePasByEmailDir = '{{route('retrievePasByEmail')}}';
    var checkActivationCodeDir = '{{route('checkActivationCode')}}';
    var resendActivationCodeDir = '{{route('resendActivationCode')}}';
    var resendActivationCodeForgetDir = '{{route('resendActivationCodeForget')}}';

    function showLoginEmail() {
        $('#loginPopUp').addClass('hidden');
        $('#EnterEmail-loginPopUp').removeClass('hidden');
    }

    function openRegisterSection(_kind){
        $('#registerDiv').removeClass('hidden');
        $('#loginPopUp').addClass('hidden');

        if(_kind == 'email')
            $('#EnterEmail-loginPopUp').removeClass('hidden');
        else if(_kind == 'ForgetPassword')
            $('#ForgetPassword').removeClass('hidden');
        else
            $('#EnterPhone-loginPopUp').removeClass('hidden');
    }

    function Return(_id) {
        $('#' + _id).addClass('hidden');
        switch (_id) {
            case 'EnterEmail-loginPopUp':
            case 'EnterPhone-loginPopUp':
            case 'ForgetPassword':
                $('#registerDiv').addClass('hidden');
                $('#loginPopUp').removeClass('hidden');
                break;
            case 'Send_AND_EnterCode-loginPopUp':
                $('#EnterPhone-loginPopUp').removeClass('hidden');
                break;
            case 'Email_ForgetPass':
            case 'Phone_ForgetPass':
                $('#ForgetPassword').removeClass('hidden');
                break;
            case 'PhoneCodePasswordForget':
                $('#Phone_ForgetPass').removeClass('hidden');
                break;
        }
    }

    function closeLoginPopup(){
        $('#mainLoginPopUp').addClass('hidden');
    }

    function closeRegister(){
        $('#registerDiv').addClass('hidden');
        $('#loginPopUp').removeClass('hidden');
    }

    function emailRegister(){
        let email = $('#emailRegisterInput').val();
        if(email.trim().length > 0 && validateEmail(email)){
            openLoading();
            $.ajax({
                type: 'post',
                url: checkEmailDir,
                data:{
                    _token: '{{csrf_token()}}',
                    email: email
                },
                success: function(response){
                    closeLoading();
                    if(response == 'ok')
                        openUserRegisterationPage();
                    else if(response == 'nok')
                        $('#loginErrEmail').empty().append('ایمیل وارد شده در سامانه موجود است');
                    else
                        $('#loginErrEmail').empty().append('در فرایند ثبت نام مشکلی پیش امده لطفا دوباره تلاش کنید');
                },
                error: function(err){
                    console.log(err);
                    closeLoading();
                    $('#loginErrEmail').empty().append('در فرایند ثبت نام مشکلی پیش امده لطفا دوباره تلاش کنید');
                }
            })
        }
        else
            $('#loginErrEmail').empty().append('ایمیل خود را به درستی وارد کنید.');
    }

    function checkInputPhoneRegister() {
        let phone = $('#phoneRegister').val();
        if(phone.trim().length == 11 && phone[0] == 0 && phone[1] == 9){
            openLoading();
            $.ajax({
                type: 'post',
                url: checkPhoneNumDir,
                data: {
                    'phoneNum': $("#phoneRegister").val()
                },
                success: function (response) {
                    closeLoading();

                    if(phoneCodeRegister != null)
                        clearTimeout(phoneCodeRegister);

                    response = JSON.parse(response);

                    if (response.status == "ok") {
                        phoneNum = $("#phoneRegister").val();
                        reminderTime = response.reminder;

                        if (reminderTime > 0) {
                            $(".reminderTimeDiv").removeClass('hidden');
                            $(".resendActivationCode").addClass('hidden');
                            phoneCodeRegister = setInterval("decreaseTime()", 1000);
                        }
                        else {
                            $(".reminderTimeDiv").addClass('hidden');
                            $(".resendActivationCode").removeClass('hidden');
                        }

                        $("#activationCode").val("");
                        $('#EnterPhone-loginPopUp').addClass('hidden');
                        $('#Send_AND_EnterCode-loginPopUp').removeClass('hidden');
                    }
                    else if (response.status == "nok")
                        $("#loginErrPhonePass1").empty().append('شماره شما پیش از این در سامانه ثبت گردیده است.');
                    else if (response.status == "nok3")
                        $("#loginErrPhonePass1").empty().append('اشکالی در ارسال پیام رخ داده است');
                    else
                        $("#loginErrPhonePass1").empty().append('کد اعتبار سنجی برای شما ارسال شده است. برای ارسال مجدد کد باید 5 دقیقه منتظر بمانید');
                },
                error: function(err){
                    closeLoading();
                    console.log(err);
                }
            });
        }
        else
            $("#loginErrPhonePass1").empty().append('شماره موبایل خود را به درستی وارد نمایید.');
    }

    function resendActivationCode(_kind) {
        let phoneNum;
        if(_kind == 'forget')
            phoneNum = $('#phoneForgetPass').val();
        else
            phoneNum = $('#phoneRegister').val();

        $.ajax({
            type: 'post',
            url: resendActivationCodeDir,
            data: {
                'phoneNum': phoneNum
            },
            success: function (response) {

                response = JSON.parse(response);
                if(phoneCodeRegister != null)
                    clearTimeout(phoneCodeRegister);

                reminderTime = response.reminder;

                if (response.status == "ok") {
                    if (reminderTime > 0) {
                        $(".reminderTimeDiv").removeClass('hidden');
                        $(".resendActivationCode").addClass('hidden');
                        phoneCodeRegister = setInterval("decreaseTime()", 1000);
                    }
                    else {
                        $(".reminderTimeDiv").addClass('hidden');
                        $(".resendActivationCode").removeClass('hidden');
                    }
                } else {
                    $(".reminderTimeDiv").addClass('hidden');
                    $(".resendActivationCode").removeClass('hidden');
                    phoneCodeRegister = setInterval("decreaseTime()", 1000);
                }
            }
        })

    }

    function checkActivationCode() {
        checkValidationPhoneCode('phoneRegister', 'activationCode', openUserRegisterationPage);
    }

    function checkValidationPhoneCode(_phoneId, _codeId, _callback = ''){
        let phoneNum = $('#' + _phoneId).val();
        let code = $('#' + _codeId).val();

        if(code.trim().length > 0) {
            openLoading();
            $.ajax({
                type: 'post',
                url: checkActivationCodeDir,
                data: {
                    'phoneNum': phoneNum,
                    'activationCode': code
                },
                success: function (response) {
                    closeLoading();
                    if (response == "ok"){
                        if(typeof _callback === 'function')
                            _callback();
                    }
                    else
                        $(".loginErrActivationCode").empty().append('کد وارد شده معتبر نمی باشد');
                },
                error: function(err){
                    closeLoading();
                    console.log(err);
                    alert(' در فرایند ثبت نام مشکلی پیش امده لطفا دوباره تلاش کنید.')
                }
            });
        }

    }


    function decreaseTime(_kind) {

        $(".reminderTime").text((reminderTime % 60) + " : " + Math.floor(reminderTime / 60));

        if (reminderTime > 0)
            reminderTime--;
        else {
            clearTimeout(phoneCodeRegister);
            $(".reminderTimeDiv").addClass('hidden');
            $(".resendActivationCode").removeClass('hidden');
        }
    }

    function checkRecaptcha() {
        let username = $('#usernameRegister').val();
        let password = $('#passwordRegister').val();

        if(username.trim().length > 0 && password.trim().length > 0) {
            openLoading();
            $.ajax({
                type: 'post',
                url: checkReCaptchaDir,
                data: {
                    captcha: grecaptcha.getResponse()
                },
                success: function (response) {
                    if (response == "ok")
                        checkUserName();
                    else {
                        closeLoading();
                        $("#loginErrUserName").empty().append('لطفا ربات نبودن خود را ثابت کنید');
                    }
                }
            });
        }
        else{
            closeLoading();
            $("#loginErrUserName").empty().append('لطفا نام کاربری و رمز عبور خود را مشخص کنید');
        }
    }

    function checkUserName() {
        let username = $('#usernameRegister').val();
        let password = $('#passwordRegister').val();
        let email = $('#emailRegisterInput').val();
        let phone = $('#phoneRegister').val();
        let actCode = $('#activationCode').val();
        let inviteCode = $("#invitationCode").val();

        $.ajax({
            type: 'post',
            url: registerAndLoginDir,
            data: {
                'username': username,
                'password': password,
                'email': email,
                'phone': phone,
                'actCode': actCode,
                'invitationCode': inviteCode
            },
            success: function (response) {
                if (response == "ok")
                    login(username, password);
                else if (response == "nok1") {
                    closeLoading();
                    $("#loginErrUserName").empty().append('نام کاربری وارد شده در سامانه موجود است');
                }
                else if(response == 'nok5'){
                    closeLoading();
                    $('#EnterUsername-loginPopUp').addClass('hidden');
                    $('#EnterPhone-loginPopUp').removeClass('hidden');
                }
                else {
                    closeLoading();
                    $("#loginErrUserName").empty().append('کد معرف وارد شده نامعتبر است');
                }
            },
            error: function(err){
                console.log(err);
                closeLoading();
                alert('در فرایند ثبت نام مشکلی پیش امده لطفا دوباره تلاش کنید.')
            }
        });

    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function checkedCheckBox() {

        if ($("#checked").is(":checked")) {
            $("#submitAndFinishBtn").removeAttr('disabled');
        } else {
            $("#submitAndFinishBtn").attr('disabled', 'disabled');
        }
    }

    function openUserRegisterationPage(){
        $('#Send_AND_EnterCode-loginPopUp').addClass('hidden');
        $('#EnterEmail-loginPopUp').addClass('hidden');

        $('#EnterUsername-loginPopUp').removeClass('hidden');
    }

    function showForgatenPassInput(_id){
        $('#'+_id).removeClass('hidden');
        $('#ForgetPassword').addClass('hidden');
    }

    function login(username, password) {
        if (username.trim().length > 0 && password.trim().length > 0) {
            openLoading();
            $.ajax({
                type: 'post',
                url: mainLoginDir,
                data: {
                    username: username,
                    password: password
                },
                success: function (response) {
                    if (response == "ok") {
                        console.log('oklogin')
                        $('#form_userName').val(username);
                        $('#form_pass').val(password);
                        $('#second_login').submit();
                    }
                    else if (response == "nok2") {
                        closeLoading();
                        $("#loginErr").empty().append('حساب کاربری شما غیر فعال شده است');
                    }
                    else {
                        closeLoading();
                        $("#loginErr").empty().append('نام کاربری و یا رمز عبور اشتباه وارد شده است');
                    }
                },
                error: function (xhr, status, error) {
                    closeLoading();
                    console.log(xhr.responseText);
                    if (xhr.responseText == "Too Many Attempts.")
                        $("#loginErr").empty().append('تعداد درخواست های شما بیش از حد مجاز است. لطفا تا 5 دقیقه دیگر تلاش نفرمایید');
                }
            });
        }
    }

    function sendForgetPassPhone(){
        let phoneNum = $('#phoneForgetPass').val();
        if(phoneNum.trim().length == 11 && phoneNum[0] == 0 && phoneNum[1] == 9){
            openLoading();
            $.ajax({
                type: 'post',
                url: '{{route('retrievePasByPhone')}}',
                data: {
                    'phone': phoneNum
                },
                success: function (response) {
                    closeLoading();

                    if(phoneCodeRegister != null)
                        clearTimeout(phoneCodeRegister);

                    response = JSON.parse(response);
                    if (response.status == "ok") {
                        reminderTime = response.reminder;
                        if (reminderTime > 0) {
                            $(".reminderTimeDiv").removeClass('hidden');
                            $(".resendActivationCode").addClass('hidden');
                            phoneCodeRegister = setInterval("decreaseTime()", 1000);
                        }
                        else {
                            $(".reminderTimeDiv").addClass('hidden');
                            $(".resendActivationCode").removeClass('hidden');
                        }
                        $("#activationCodeForgetPass").val("");
                        $('#Phone_ForgetPass').addClass('hidden');
                        $('#PhoneCodePasswordForget').removeClass('hidden');
                    }
                    else if (response.status == "nok")
                        $("#loginErrActivationCodeForgetPass").empty().append('شماره شما پیش از این در سامانه ثبت گردیده است.');
                    else if (response.status == "nok3")
                        $("#loginErrActivationCodeForgetPass").empty().append('اشکالی در ارسال پیام رخ داده است');
                    else
                        $("#loginErrActivationCodeForgetPass").empty().append('کد اعتبار سنجی برای شما ارسال شده است. برای ارسال مجدد کد باید 5 دقیقه منتظر بمانید');
                },
                error: function(err){
                    closeLoading();
                    console.log(err);
                    alert('در قرایند بازبابی رمز عبور مشکلی پیش امده لطفا دوباره تلاش کنید.')
                }
            });
        }
        else
            $("#loginErrActivationCodeForgetPass").empty().append('شماره موبایل خود را به درستی وارد نمایید.');
    }

    function checkValidateForgetPass(){
        checkValidationPhoneCode('phoneForgetPass', 'activationCodeForgetPass', function(){
            $('#setNewPassword').removeClass('hidden');
            $('#PhoneCodePasswordForget').addClass('hidden');
        })
    }

    function submitNewPassword(){
        let newPass = $('#newPassword').val();
        let phone = $('#phoneForgetPass').val();
        let code = $('#activationCodeForgetPass').val();

        if(newPass.trim().length > 0){
            openLoading();
            $.ajax({
                type: 'post',
                url: '{{route('user.setNewPassword')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    pass: newPass,
                    phone: phone,
                    code: code
                },
                success: function(response){
                    closeLoading();
                    if(response == 'ok'){
                        alert('رمز شما با موفقیت تغییر یافت');
                        $("#setNewPassword").addClass('hidden');
                        closeRegister();
                    }
                    else if(response == 'nok5'){
                        $('#setNewPassword').addClass('hidden');
                        $('#Phone_ForgetPass').removeClass('hidden');
                        alert('طفا دوباره شماره تماس خود را تایید کنید');
                        closeLoading();
                    }
                },
                error: function(err){
                    closeLoading();
                    console.log(err);
                    alert('در هنگام تغییر رمز مشکلی پیش امده لظفا دوباره تلاش نمایید');
                }
            })
        }
    }

    function resendActivationCodeForget() {

        if (phoneNum.length == 0)
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
                if (response.status == "ok") {
                    if (reminderTime2 > 0) {
                        $("#reminderTimePaneForget").removeClass('hidden');
                        $("#resendActivationCodeForget").attr('disabled', 'disabled');
                        setTimeout("decreaseTime2()", 1000);
                    } else {
                        $("#reminderTimePaneForget").addClass('hidden');
                        $("#resendActivationCodeForget").removeAttr('disabled');
                    }
                } else {
                    $("#reminderTimePaneForget").removeClass('hidden');
                    $("#resendActivationCodeForget").attr('disabled', 'disabled');
                    setTimeout("decreaseTime2()", 1000);
                }
            }
        })
    }

    function showLoginPrompt(url) {
        selectedUrl = url;
        $("#username_main").val("");
        $("#password_main").val("");
        $('#mainLoginPopUp').removeClass('hidden');
    }

    function retrievePasByEmail(){
        let email = $('#forget_email').val();
        if(email.trim().length > 0){
            // openLoading();
            $.ajax({
                type: 'post',
                url: '{{route('retrievePasByEmail')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    email: email
                },
                success:function(response){
                    console.log(response);
                },
                error: function(err){
                    console.log(err);
                }
            })
        }
    }

</script>

<script>
    $(document).ready(function () {
        $(".login-button").click(function () {
            $(".dark").show(), showLoginPrompt('{{Request::url()}}')
        })
    });
</script>