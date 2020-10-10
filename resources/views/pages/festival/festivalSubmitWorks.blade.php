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
                                '               <input type="text" placeholder="نام مکان (اختیاری)">\n' +
                                '           </div>\n' +
                                '           <div class="col-md-6 inputRows pd-lt-0">\n' +
                                '               <input type="text" placeholder="نام شهر">\n' +
                                '           </div>\n' +
                                '           <div class="col-md-12 inputRows">\n' +
                                '               <textarea type="text" placeholder="توضیح عکس (اختیاری)"></textarea>\n' +
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