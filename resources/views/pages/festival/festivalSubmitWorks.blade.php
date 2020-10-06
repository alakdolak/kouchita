<!doctype html>
<html lang="fa" dir="rtl">
<head>
    @include('layouts.topHeader')
    <title>
        فستیوال
    </title>

    <link rel="stylesheet" href="{{URL::asset('css/pages/festival.css?v='.$fileVersions)}}">

    <style>
        section{
            background: #445565;
            min-height: 100vh;
        }

        .mainSectionSubmitWork .dropPictureSec{
            display: flex;
            border: dashed 6px var(--light-gray);
            width: 100%;
            height: 200px;
            margin-top: 30px;
            align-items: center;
            cursor: pointer;
        }
        .mainSectionSubmitWork .dropPictureSec .icon{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .mainSectionSubmitWork .dropPictureSec .icon > img{
            height: 90%;
            margin: 10px;
        }
        .mainSectionSubmitWork .dropPictureSec .text{
            color: var(--yellow);
            width: 100%;
            text-align: end;
            margin-top: auto;
            margin-bottom: 10px;
            margin-left: 20px;
            font-size: 17px;
        }

        .mainSectionSubmitWork .fileUploaded{
            margin-top: 30px;
        }
        .mainSectionSubmitWork .fileUploaded .fileRow{
            border: solid #273039 3px;
            height: 200px;
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0px;
        }
        .mainSectionSubmitWork .fileUploaded .fileRow > img{
            height: 100%;
            margin-left: auto;
        }
        .mainSectionSubmitWork .fileUploaded .fileRow .fileInputs{
            padding: 20px;
            position: absolute;
            width: 100%;
            left: 0;
            background: rgb(68,85,101);
            background: linear-gradient(90deg, rgba(68,85,101,1) 0%, rgba(127,138,149,1) 50%, rgba(184,190,196,0.56) 80%, rgba(255,255,255,0) 100%);
            /*background: linear-gradient(90deg, #445565, #44556554);*/
        }
        .mainSectionSubmitWork .fileUploaded .fileRow .fileInputs .row {
            width: 60%;
            margin-right: auto;
        }
        .mainSectionSubmitWork .fileUploaded .fileRow .fileInputs .cornerButton {
            position: absolute;
            width: 30px;
            height: 30px;
            background: white;
            border-radius: 50%;
            top: 10px;
            right: 10px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            color: red;
            font-size: 35px;
        }
        .mainSectionSubmitWork .fileUploaded .fileRow .fileInputs .inputRows > input{
            font-size: 15px;
            padding: 10px 25px;
            margin: 5px 0px;
        }

        .mainSectionSubmitWork .descriptionSec{
            margin-top: 15px;
        }
        .mainSectionSubmitWork .descriptionSec > textarea{
            background: white;
            border-radius: 20px;
            border: solid #273039 1px;
            width: 100%;
            font-size: 22px;
            padding: 10px;
        }

        .mainSectionSubmitWork .mainTextRule{
            color: var(--light-gray);
            font-size: 18px;
            margin-top: 25px;
            text-align: right;
        }
        .mainSectionSubmitWork .acceptRuleButton{
            display: flex;
            margin-top: 20px;
            color: var(--yellow);
            align-items: center;
        }
        .mainSectionSubmitWork .acceptRuleButton > input{
            display: block;
            margin-left: 10px;
            font-size: 15px;
            width: 20px;
            height: 20px;
            margin-top: 0;
        }
        .mainSectionSubmitWork .acceptRuleButton > label{
            color: var(--yellow);
            cursor: pointer;
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logos">
                <a href="{{route('main')}}">
                    <img src="{{URL::asset('images/camping/undp.svg')}}" style="height: 100%">
                    <img src="{{URL::asset('images/icons/mainLogo.png')}}" style="height: 100%">
                </a>
            </div>
            <div class="buttons smallFont" style="margin-left: auto; margin-right: 10px;">
                #جشنواره ایران ما
                {{--            <div class="votedButton">رای می دهم</div>--}}
    {{--            <div class="registerButton" onclick="iParticipate()">شرکت می کنم</div>--}}
            </div>
        </div>
    </header>

    <section>
        <div class="container mainSectionSubmitWork">
            <div class="IndicatorSec one">
                <div class="indicator">
                    <div class="firstBackGround twoBackGround threeBackGround circle"></div>
                    <div class="oneLine twoLine threeLine name">اطلاعات شرکت کننده</div>
                </div>
                <div class="indicator">
                    <div class="twoBackGround threeBackGround circle"></div>
                    <div class="twoLine threeLine name">بارگزاری محتوا</div>
                </div>
                <div class="indicator">
                    <div class="threeBackGround circle"></div>
                    <div class="threeLine name">بارگزاری محتوا</div>
                </div>

                <div class="lines">
                    <div class="firstLine twoBackGround threeBackGround"></div>
                    <div class="secondLine threeBackGround"></div>
                </div>
            </div>

            <div id="section_1" class="row">
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="نام" {{$user->first_name == null ? '' : 'disabled'}} value="{{$user->first_name}}">
                </div>
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="نام خانوادگی" {{$user->last_name == null ? '' : 'disabled'}} value="{{$user->last_name}}">
                </div>
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="شماره همراه" {{$user->phone == null ? '' : 'disabled'}} value="{{$user->phone}}">
                </div>
                <div class="col-md-6 inputRows">
                    <select placeholder="جنسیت" {{$user->sex == null ? '' : 'disabled'}} value="{{$user->sex}}">
                        <option value="1">آقا</option>
                        <option value="0">خانم</option>
                    </select>
                </div>
                <div class="col-md-6 inputRows">
                    <input type="number" placeholder="سن" {{$user->age == null ? '' : 'disabled'}} value="{{$user->age}}">
                </div>
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="ایمیل" {{$user->email == null ? '' : 'disabled'}} value="{{$user->email}}">
                </div>
                <div class="col-md-12 inputRows optional">
                    <input type="text" placeholder="لینک وب سایت">
                </div>
                <div class="col-md-12 inputRows optional">
                    <input type="text" placeholder="صفحه اینستاگرام">
                </div>
                <div class="col-md-6 switchInputSec">
                    <div class="title">بخش فرعی جشنواره</div>
                    <div id="matchSideSection" class="switchInput" value="main">
                        <div class="selected" data-value="main" onclick="changeSwitchInputButton(this)">اصلی</div>
                        <div data-value="mobile" onclick="changeSwitchInputButton(this)">موبایل</div>
                    </div>
                </div>
                <div class="col-md-6 switchInputSec">
                    <div class="title">بخش اصلی جشنواره</div>
                    <div id="matchMainSection" class="switchInput" value="video">
                        <div class="selected" data-value="video" onclick="changeSwitchInputButton(this)">فیلم</div>
                        <div data-value="photo" onclick="changeSwitchInputButton(this)">عکس</div>
                    </div>
                </div>
            </div>

            <div id="section_2" style="display: none;">
                <label for="picFile" class="dropPictureSec">
                    <div class="icon">
                        <img src="{{URL::asset('images/festival/plus.png')}}">
                    </div>
                    <div class="text">
                        عکس خود را با دکمه کناری انتخاب نموده و یا داخل این باکس بیاندازید
                    </div>
                </label>
                <input id="picFile" type="file" style="display: none;" onchange="changePic(this)">

                <div id="fileUploadSection" class="fileUploaded"></div>

                <div class="descriptionSec">
                    <textarea rows="5" placeholder="توضیحات مجموعه"></textarea>
                </div>
            </div>

            <div id="section_3" style="display: none;">
                <div class="mainTextRule">
                    شرکت در جشنواره به منزله پذیرش شرایط جشنواره است.
                    ‌عکس‌ها باید دارای عنوان بوده و اطلاعات مربوط به مکان و زمان عکس‌برداری در هنگام بارگذاری در سایت جشنواره درج شوند.
                    از نظر برگزار کننده، ارسال کننده‌ی عکس مالک اثر شناخته می‌شود. هرگونه مسئولیت ناشی از آن و پاسخگویی به پیامدهای حقوقی ناشی از آن با ارسال کننده‌ی اثر خواهد بود.
                    برگزار‌کننده حق استفاده از عکس‌های پذیرفته شده را برای چاپ در کتاب، بروشور، انتشارات و موارد تبلیغاتی مربوط به جشنواره، استفاده در سایت کوچیتا ، با ذکر نام عکاس برای خود محفوظ می‌دارد.
                    ارسال آثار به معنای پذیرش تمامی مقررات این جشنواره و تصمیم‌گیری در مورد مسائل پیش‌بینی نشده با برگزارکننده است.
                    شما همواره می توانید از طریق پروفایل کاربری خود در سایت کوچیتا، به قسمت فستیوال رفته و محتوای خود را مدیریت نمایید. همچنین هر لحظه از روند داوری ها و آرای مردمی باخبر شوید.
                </div>
                <div class="acceptRuleButton">
                    <input id="acceptRuleInput" type="checkbox" />
                    <label for="acceptRuleInput">
                        با فشردن دکمه تایید نهای موافقت خود را با قوانین بالا اعلام می دارم.
                    </label>
                </div>
            </div>

            <div id="submitPageButtons" class="submitButton one">
                <button class="cancel" onclick="submitHandle(-1)">بازگشت</button>
                <button class="submit" onclick="submitHandle(1)">تایید</button>
            </div>
        </div>
    </section>

    <script>
        let lastStage = 1;
        let uploadedPicFile = [];
        function changeSwitchInputButton(_elems){
            $(_elems).parent().find('.selected').removeClass('selected');
            $(_elems).addClass('selected');

            $(_elems).parent().attr('value', $(_elems).attr('data-value'));
        }

        function changePic(_input){
            if(_input.files && _input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    var mainPic = e.target.result;
                    let text =  '<div id="fileRow_' + uploadedPicFile.length + '" class="fileRow">\n' +
                                '   <img src="' + mainPic + '" >\n' +
                                '   <div class="fileInputs">\n' +
                                '       <div class="row">\n' +
                                '           <div class="col-md-12 inputRows">\n' +
                                '               <input type="text" placeholder="نام عکس">\n' +
                                '           </div>\n' +
                                '           <div class="col-md-6 inputRows">\n' +
                                '               <input type="text" placeholder="نام استان">\n' +
                                '           </div>\n' +
                                '           <div class="col-md-6 inputRows">\n' +
                                '               <input type="text" placeholder="نام شهر">\n' +
                                '           </div>\n' +
                                '           <div class="col-md-12 inputRows">\n' +
                                '               <input type="text" placeholder="نام مکان">\n' +
                                '           </div>\n' +
                                '       </div>\n' +
                                '       <div class="cornerButton iconClose" onclick="deleteThisImg('+uploadedPicFile.length+')"></div>\n' +
                                '   </div>\n' +
                                '</div>\n';

                    $('#fileUploadSection').append(text);
                    uploadedPicFile.push(_input.files[0]);

                    let elem = $('#fileRow_'+(uploadedPicFile.length - 1));
                    let img = elem.find('img');
                    if(img.width() < elem.width()*0.6){
                        img.css('width', '60%');
                        img.css('height', 'auto');
                    }
                };
                reader.readAsDataURL(_input.files[0]);

            }
        }

        function deleteThisImg(_index){
            $('#fileRow_'+_index).remove();
            uploadedPicFile[_index] = false;
        }

        function submitHandle(_step){

            if(lastStage == 1){

            }
            else if(lastStage == 2 && _step == 1){
                let uploadNum = true;
                uploadedPicFile.map(pic => pic !== false ? uploadNum = false : '');
                if(uploadNum)
                    return;
            }
            else if(lastStage == 3){

            }

            $('#section_'+lastStage).hide();
            if((_step == -1 && lastStage > 1) || (_step == 1 && lastStage < 3))
                lastStage += _step;
            $('#section_'+lastStage).show();

            if(lastStage == 1) {
                $('#submitPageButtons').addClass('one');
                $('.IndicatorSec').addClass('one').removeClass('two').removeClass('three');
            }
            else if(lastStage == 2) {
                $('#submitPageButtons').removeClass('one');
                $('.IndicatorSec').addClass('two').removeClass('three');
            }
            else if(lastStage == 3) {
                $('#submitPageButtons').removeClass('one');
                $('.IndicatorSec').addClass('three');
            }
        }
    </script>

    @include('general.forAllPages')



</body>
</html>