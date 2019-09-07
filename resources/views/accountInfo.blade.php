<?php $mode = "profile"; $user = Auth::user(); ?>
@extends('layouts.bodyProfile')

@section('header')

    @parent
    <link rel="stylesheet" type="text/css" media="screen, print" href="{{URL::asset('css/theme2/account_info.css?v=1')}}"/>
    <style>
        .account_info_form .row{
            padding-right: 30px;
        }
        #result {
            max-width: 200px;
            max-height: 400px;
            overflow: auto;
            border: 2px solid #ccc;
            padding: 10px;
            margin-right: 10px;
        }
    </style>
@stop

@section('main')

    <div id="MAIN" class="Settings
         prodp13n_jfy_overflow_visible
    ">
        <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2">
            <div class="wrpHeader">
            </div>
            <div id="main_content">
                <h1 class="heading wrap" style="padding-bottom: 10px;padding-right: 12px;" id="HEADER_DEFAULT">
                اطلاعات کاربری
                </h1>

                @if($mode2 == 0)
                    <div class="col-xs-12">
                        <h5 style="float: right; padding: 10px; color: #963019">{{$msg}}</h5>
                    </div>
                @endif


                <div id="modules_content">
                <div id="ACCOUNT_INFO">
                    <div class="modules-membercenter-account-info">
                        <div class="settings_account_info">
                            <form method="post" action="{{route('updateProfile1')}}" class="mc-form mc-grid account_info_form">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col four">
                                        <fieldset>
                                            <label for="firstName"> نام</label>
                                            <input class="text memberData formElem " type="text" name="firstName" placeholder="نام" value="{{$user->first_name}}"/>
                                        </fieldset>
                                    </div>
                                    <div class="col four">
                                        <fieldset>
                                            <label for="lastName">نام خانوادگی</label>
                                            <input class="text memberData formElem " type="text" name="lastName" placeholder="نام خانوادگی" value="{{$user->last_name}}"/>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col four">
                                        <fieldset>
                                          <label for="username">نام کاربری ( این نام معرف شما برای دیگران است .) <div style="display: inline-block;background-size: 28px;background-position:  -10PX -40px;width: 8px;height:  13px;background-image: url('{{URL::asset('images') . '/profile.png'}}');background-repeat:  no-repeat;"></div></label>
                                            <input placeholder="نام کاربری" class="text memberData formElem" type="text" name="username" value="{{$user->username}}"/>
                                        </fieldset>
                                    </div>

                                </div>
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col twelve">
                                        <fieldset>
                                            <label for="cityName">شهر محل سکونت</label>
                                            <input autocomplete="off" class="text memberData formElem" name="cityName" type="text" maxlength="40" id="cityName" value="{{$user->cityId}}" onkeyup="search()">
                                        </fieldset>
                                        <div class="hidden" id="result"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col twelve">
                                        <fieldset>
                                            <label for="email">ایمیل</label>
                                            <div class="alt_emails" id='alt_emails'>
                                                <div data-index="0">
                                                    <input placeholder="ایمیل" class="text memberData email primaryEmail formElem" type="email" name="email" value="{{$user->email}}"/>
                                                </div>
                                                <!-- /oxEach -->
                                            </div>

                                        </fieldset>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col twelve">
                                        <fieldset>
                                            <label for="phoneNum"> تلفن تماس</label>
                                            <input id="phoneNum" placeholder="تلفن تماس" class="text phoneData formElem" type="text" name="phone" value="{{$user->phone}}"/><br><span class="numbersonly">در صورت اطلاع از تلفن تماس شما می توانیم با شما در ارتباط باشیم</span>
                                            </fieldset>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col four">

                                        @if($mode2 == 1 && $msg == "sendActivation")

                                            <script>

                                                $("#phoneNum").val('{{$phoneNum}}');

                                                var reminderTime = '{{$reminder}}';

                                                function decreaseTime() {

                                                    $("#reminderTime").text((reminderTime % 60) + " : " + Math.floor(reminderTime / 60));

                                                    if(reminderTime > 0) {
                                                        reminderTime--;
                                                        setTimeout("decreaseTime()", 1000);
                                                    }
                                                    else {
                                                        $("#resend").removeAttr('disabled');
                                                    }
                                                }

                                                function checkAuth() {

                                                    if ($("#activationCode").val() == "")
                                                        return;

                                                    $.ajax({
                                                        type: 'post',
                                                        url: '{{route('checkAuthCode')}}',
                                                        data: {
                                                            'phoneNum': '{{$phoneNum}}',
                                                            'code': $("#activationCode").val()
                                                        },
                                                        success: function (response) {
                                                            if (response == "ok")
                                                                document.location.href = '{{route('accountInfo')}}';
                                                            else {
                                                                $("#errAuth").empty().append('کد وارد شده نامعتبر می باشد');
                                                            }
                                                        }
                                                    });
                                                }
                                                    
                                                function resend() {

                                                    $.ajax({
                                                        type: 'post',
                                                        url: '{{route('resendAuthCode')}}',
                                                        data: {
                                                            'phoneNum': '{{$phoneNum}}'
                                                        },
                                                        success: function (response) {

                                                            response = JSON.parse(response);

                                                            if(response.msg == "ok") {
                                                                $("#errAuth").empty().append('کد اعتبارسنجی مجددا برای شما ارسال گردید');
                                                                $("#resend").attr('disabled', 'disabled');
                                                            }
                                                            else {
                                                                $("#errAuth").empty().append('از آخرین ارسال پیامک باید 5 دقیقه بگذرد');
                                                            }

                                                            reminderTime = response.reminder;
                                                            decreaseTime();
                                                        }
                                                    });
                                                }

                                            </script>

                                            @if($reminder == 300)
                                                <h5 style="float: right; padding: 10px; color: #963019">کد اعتبارسنجی به شماره وارد شده ارسال گردید</h5>
                                            @else
                                                <h5 style="float: right; padding: 10px; color: #963019">از آخرین ارسال پیامک باید 5 دقیقه بگذرد</h5>
                                            @endif

                                            <script>
                                                decreaseTime();
                                            </script>

                                            <div class="col-xs-12">
                                                <label for="activationCode">کد اعتبارسنجی</label>
                                                <input id="activationCode" type="text">
                                            </div>

                                            <div class="col-xs-12" style="margin-top: 10px">
                                                <span onclick="checkAuth()" class="btn btn-success">اعمال کد</span>
                                                <span onclick="resend()" id="resend" class="btn btn-primary" disabled>دریافت مجدد کد</span>
                                            </div>

                                            <div class="col-xs-12" style="margin-top: 10px">
                                                <p><span>زمان باقی مانده برای ارسال مجدد کد</span><span>&nbsp;</span><span id="reminderTime"></span></p>
                                            </div>

                                            <div class="col-xs-12" style="margin-top: 10px">
                                                <h5 id="errAuth" style="float: right; padding: 10px; color: #963019"></h5>
                                            </div>

                                        @else
                                            <fieldset>
                                                <input type="submit" name="savePass1Info" class="btn btn-success" style="padding: 5px; margin: 0 7px;background-color: #4dc7bc;border-color:#4dc7bc;" value="ذخیره">
                                            </fieldset>
                                            @if($mode2 == 1)
                                                <h5 style="float: right; padding: 10px; color: #963019">{{$msg}}</h5>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </form>

                                <h1 class="heading wrap" style="padding-bottom: 10px;padding-top: 30px;padding-right: 12px;" id="HEADER_DEFAULT">
                                    درباره من
                                </h1>

                            <form method="post" action="{{route('updateProfile2')}}" class="mc-form mc-grid account_info_form">
                                {{csrf_field()}}
                                <div class="row">

                                    <div class="subtitle">خودتان را توصیف کنید :</div>
                                    <fieldset>
                                        <textarea style="border-radius: 6px;padding: 7px;height: 83px;border: 1px solid #c8c8c8;" placeholder="خودتان را توصیف کنید" name="introduction" required class="field textBox" rows="5" cols="50" maxlength="1000">{{($aboutMe != null) ? $aboutMe->introduction : ""}}</textarea>
                                    </fieldset>

                                    <div class="col twelve">
                                        <fieldset style="padding-top: 35px;">

                                            <label class="fieldLabel" for="age">سن :</label>
                                            <select style="width: 20%;border-radius: 6px;" id="age" class="field dropdown" name="ageId">
                                                <option class="dropdownItem" value="0">انتخاب</option>
                                                @foreach($ages as $age)
                                                    @if($aboutMe != null && $aboutMe->ageId == $age->id)
                                                        <option class="dropdownItem" selected value="{{$age->id}}">{{$age->name}}</option>
                                                    @else
                                                        <option class="dropdownItem" value="{{$age->id}}">{{$age->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </fieldset>
                                    </div>

                                    <div class="col twelve">
                                        <fieldset style="padding-top: 35px;">

                                                <label class="fieldLabel" for="gender">جنسیت</label>
                                        {{--<div class="dropdownBox">--}}
                                                <select style="width: 30%;" id="gender" class="field dropdown" name="sex">

                                                    @if($aboutMe == null || $aboutMe->sex == 2)
                                                        <option class="dropdownItem" selected value="2">ترجیح میدم جواب ندهم</option>
                                                    @else
                                                        <option class="dropdownItem" value="2">ترجیح میدم جواب ندهم</option>
                                                    @endif

                                                    @if($aboutMe != null && $aboutMe->sex == 0)
                                                        <option class="dropdownItem" selected value="f">زن</option>
                                                    @else
                                                        <option class="dropdownItem" value="f">زن</option>
                                                    @endif

                                                    @if($aboutMe != null && $aboutMe->sex == 1)
                                                        <option class="dropdownItem" selected value="m">مرد</option>
                                                    @else
                                                        <option class="dropdownItem" value="m">مرد</option>
                                                    @endif
                                                </select>
                                        {{--</div>--}}
                                    </fieldset>
                                    </div>

                                </div>

                                <div class="row" style="margin-top: 20px">
                                    <div class="col four">
                                        <fieldset>
                                            <input type="submit" class="btn btn-success" name="savePass2Info" style="padding: 5px; margin: 0 7px;background-color: #4dc7bc;border-color:#4dc7bc;" value="ذخیره">
                                        </fieldset>
                                        @if($mode2 == 2)
                                            <h5 style="float: right; padding: 10px; color: #963019">{{$msg}}</h5>
                                        @endif
                                    </div>
                                </div>
                            </form>




                                <h1 class="heading wrap" style="padding-bottom: 10px;padding-top: 30px;padding-right: 12px;" id="HEADER_DEFAULT">
                                    رمز عبور
                                </h1>
<span id="ERRORS">
   <ul id="errors" class="errors"></ul>
</span>
                            <form action="{{route('changePas')}}" method="post" class="mc-form mc-grid account_info_form">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col four">

                                        <fieldset>
                                            <label>رمز عبور فعلی </label>
                                            <input placeholder="رمز عبور فعلی" type="password" name="oldPassword" class="fauxInput"/>
                                        </fieldset>

                                        <fieldset>
                                            <label>رمز عبور جدید </label>
                                            <input placeholder="رمز عبور جدید" type="password" name="newPassword" class="fauxInput"/>
                                        </fieldset>

                                        <fieldset>
                                            <label>تکرا رمز عبور جدید</label>
                                            <input placeholder="تکرار رمز عبور جدید" type="password" name="repeatPassword" class="fauxInput"/>
                                        </fieldset>

                                        <fieldset style="margin-top: 20px">
                                            <input type="submit" class="btn btn-success" style="padding: 5px; margin: 0 7px;background-color: #4dc7bc;border-color:#4dc7bc;" value="تغییر رمز عبور">
                                        </fieldset>
                                        @if($mode2 == 3)
                                            <h5 style="float: right; padding: 10px; color: #963019">{{$msg}}</h5>
                                        @endif
                                    </div>
                                </div>

                                <hr/>
                                <span onclick="openSpan()" style="padding-right: 12px;" class="taLnk closeAccount">حذف کامل صفحه کاربری</span>
                            </form>
                        </div>
                    </div>
                </div>
<span class="ui_overlay ui_modal editTags" id="deleteProfile" style="visibility: hidden; position: fixed; left: 34%; right: auto; top: 29%; bottom: auto;width: 30%;">

                    <p>آیا از حذف کامل اطلاعات کاربری خود مطمئن هستید ؟</p>
                    <p style="font-size: 10px;">با این کار تمام فعالیت های شما به همراه این حساب کاربری برای همیشه حذف خواهد شد.</p>
<br><br>
                    <div class="body_text">

                        <div class="submitOptions">
                            <button style="background-color: #4dc7bc;border-color:#4dc7bc;" onclick="deleteAccount()" class="btn btn-success">مطمئنم</button>
                            <input type="submit" onclick="closeSpan()" value="لغو" class="btn btn-default">
                        </div>
                    </div>
                    <div onclick="closeSpan()" class="ui_close_x"></div>

                </span>
            </div>
        </div>
        </div>
        <div class="ui_backdrop dark" style="display: none;"></div>
    </div>
    <script>

        var deleteAccountDir = '{{route('deleteAccount')}}';
        var mainPage = '{{route('main')}}';
        var searchInCities = '{{route('searchInCities')}}';

        function closeSpan(){
            $('.dark').hide();
            $('#deleteProfile').css('visibility','hidden');
        }

        function openSpan(){
            $('#deleteProfile').css('visibility','visible');
            $('.dark').show();
        }

        function deleteAccount() {
            $.ajax({
                type: 'post',
                url: deleteAccountDir,
                success: function (response) {
                    if(response == 'ok')
                        document.location.href = mainPage;
                }
            });
        }

        function search() {

            key = $("#cityName").val();

            if(key == null || key.length < 3) {
                $("#result").empty().addClass('hidden');
                return;
            }

            $.ajax({
                type: 'post',
                url: searchInCities,
                data: {
                    "key": key
                },
                success: function (response) {

                    response = JSON.parse(response);
                    newElement = "";

                    if(response.length == 0)
                        newElement = "نتیجه ای یافت نشد";

                    for(i = 0; i < response.length; i++)
                        newElement += "<p style='cursor: pointer' onclick='addCity(\"" + response[i].name + "\")'>" + response[i].name + "</p>";

                    $("#result").empty().append(newElement).removeClass('hidden');

                }
            });
        }

        function addCity(val) {
            $("#cityName").val(val);
            $("#result").empty().addClass('hidden');
        }

    </script>

@stop
