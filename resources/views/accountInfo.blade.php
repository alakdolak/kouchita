<?php $mode = "profile"; $user = Auth::user(); ?>
@extends('layouts.bodyProfile')

@section('header')

    @parent
    <link rel="stylesheet" type="text/css" media="screen, print" href="{{URL::asset('css/shazdeDesigns/account_info.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" media="screen, print" href="{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}"/>
@stop

@section('main')


    <div id="MAIN" class="Settings prodp13n_jfy_overflow_visible">
        <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2">
            <div class="wrpHeader">
            </div>
            <div id="main_content" class="accountInfoMainDiv">
                <h1 class="heading wrap" id="HEADER_DEFAULT">
                اطلاعات کاربری
                </h1>

                @if($mode2 == 0)
                    <div class="col-xs-12">
                        <h5 id="accountInfoMode2">{{$msg}}</h5>
                    </div>
                @endif


                <div id="modules_content">
                    <div id="ACCOUNT_INFO">
                    <div class="modules-membercenter-account-info">
                        <div class="settings_account_info">
                            <form method="post" action="{{route('updateProfile1')}}" class="mc-form mc-grid account_info_form">
                                {{csrf_field()}}
                                <div class="mainDivAccountField">
                                    <div class="row">
                                        <div class="col five">
                                            <fieldset>
                                                <label for="firstName"> نام</label>
                                                <input class="text memberData formElem " type="text" name="firstName" placeholder="نام" value="{{$user->first_name}}"/>
                                            </fieldset>
                                        </div>
                                        <div class="col five">
                                            <fieldset>
                                                <label for="lastName">نام خانوادگی</label>
                                                <input class="text memberData formElem " type="text" name="lastName" placeholder="نام خانوادگی" value="{{$user->last_name}}"/>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col five">
                                            <fieldset>
                                              <label for="username">نام کاربری (این نام معرف شما برای دیگران است.)
                                                  <div id="accountInfoUserNameDiv"></div>
                                              </label>
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
                                                <input id="phoneNum" placeholder="تلفن تماس" class="text phoneData formElem" type="text" name="phone" value="{{$user->phone}}"/><br><span class="numbersonly">در صورت اطلاع از تلفن تماس شما می‌توانیم با شما در ارتباط باشیم</span>
                                            </fieldset>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col five">

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
                                                    <h5 class="accountInfoHelpTexts">کد اعتبارسنجی به شماره وارد شده ارسال گردید</h5>
                                                @else
                                                    <h5 class="accountInfoHelpTexts">از آخرین ارسال پیامک باید 5 دقیقه بگذرد</h5>
                                                @endif

                                                <script>
                                                    decreaseTime();
                                                </script>

                                                <div class="col-xs-12">
                                                    <label for="activationCode">کد اعتبارسنجی</label>
                                                    <input id="activationCode" type="text">
                                                </div>

                                                <div class="col-xs-12 mg-tp-10">
                                                    <span onclick="checkAuth()" class="btn btn-success">اعمال کد</span>
                                                    <span onclick="resend()" id="resend" class="btn btn-primary" disabled>دریافت مجدد کد</span>
                                                </div>

                                                <div class="col-xs-12 mg-tp-10">
                                                    <p><span>زمان باقی مانده برای ارسال مجدد کد</span><span>&nbsp;</span><span id="reminderTime"></span></p>
                                                </div>

                                                <div class="col-xs-12 mg-tp-10">
                                                    <h5 id="errAuth"></h5>
                                                </div>

                                            @else
                                                <fieldset>
                                                    <input id="savePass1Info" type="submit" name="savePass1Info" class="btn btn-success" value="ذخیره">
                                                </fieldset>
                                                @if($mode2 == 1)
                                                    <h5 class="accountInfoHelpTexts">{{$msg}}</h5>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>

                                <h1 class="heading wrap" id="HEADER_DEFAULT2">
                                    درباره من
                                </h1>

                            <form method="post" action="{{route('updateProfile2')}}" class="mc-form mc-grid account_info_form">
                                {{csrf_field()}}
                                <div class="mainDivAccountField">
                                    <div class="row">


                                        <fieldset>
                                            <label class="subtitle personalDescription">خودتان را توصیف کنید</label>
                                            <textarea placeholder="خودتان را توصیف کنید" id="introduceYourSelfTextBox" name="introduction" required
                                                      class="field textBox" rows="5" cols="50" maxlength="1000">
                                                {{($aboutMe != null) ? $aboutMe->introduction : ""}}
                                            </textarea>
                                        </fieldset>

                                        <div class="col">
                                            <fieldset class="pd-tp-35">

                                                <label class="fieldLabel" for="age">سن</label>
                                                <select id="age" class="field dropdown" name="ageId">
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

                                        <div class="col">
                                            <fieldset class="pd-tp-35">

                                                    <label class="fieldLabel" for="gender">جنسیت</label>
                                            {{--<div class="dropdownBox">--}}
                                                    <select id="gender" class="field dropdown" name="sex">

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

                                    <div class="row">
                                        <div class="col">
                                            <fieldset >
                                                <input type="submit" id="savePass2Info" class="btn btn-success" name="savePass2Info" value="ذخیره">
                                            </fieldset>
                                            @if($mode2 == 2)
                                                <h5 class="accountInfoHelpTexts">{{$msg}}</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <h1 class="heading wrap" id="HEADER_DEFAULT3">
                                رمز عبور
                            </h1>

                            <span id="ERRORS">
                               <ul id="errors" class="errors"></ul>
                            </span>

                            <form action="{{route('changePas')}}" method="post" class="mc-form mc-grid account_info_form">
                                {{csrf_field()}}
                                <div class="mainDivAccountField">
                                    <div class="row">
                                        <div class="col">

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

                                            <fieldset class="pd-tp-20">
                                                <input id="changePasswordAccountInfo" type="submit" class="btn btn-success" value="تغییر رمز عبور">
                                            </fieldset>
                                            @if($mode2 == 3)
                                                <h5 class="accountInfoHelpTexts">{{$msg}}</h5>
                                            @endif
                                        </div>
                                    </div>
                                    <hr/>
                                    <span onclick="openSpan()" class="pd-rt-12 taLnk closeAccount">حذف کامل صفحه کاربری</span>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                    <div class="hideOnScreen footerOptimizer">

                    </div>
                    <div class="ui_overlay ui_modal editTags" id="deleteProfile">

                    <p>آیا از حذف کامل اطلاعات کاربری خود مطمئن هستید ؟</p>
                    <p class="font-size-10">با این کار تمام فعالیت های شما به همراه این حساب کاربری برای همیشه حذف خواهد شد.</p>
                    <br><br>
                    <div class="body_text">

                        <div class="submitOptions">
                            <button id="ensureBtnDeleteAccountAccountInfo" onclick="deleteAccount()" class="btn btn-success">مطمئنم</button>
                            <input type="submit" onclick="closeSpan()" value="لغو" class="btn btn-default">
                        </div>
                    </div>
                    <div onclick="closeSpan()" class="ui_close_x"></div>

                </div>
                </div>
                <div class="footerOptimizer hideOnScreen"></div>
            </div>
        </div>
        <div class="ui_backdrop dark display-none"></div>
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
                        newElement += "<p class='cursor-pointer' onclick='addCity(\"" + response[i].name + "\")'>" + response[i].name + "</p>";

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
