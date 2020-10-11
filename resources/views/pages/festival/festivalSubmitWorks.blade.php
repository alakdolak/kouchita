<!doctype html>
<html lang="fa" dir="rtl">
<head>
    @include('layouts.topHeader')
    <title> فستیوال </title>

    <link rel="stylesheet" href="{{URL::asset('css/pages/festival.css?v='.$fileVersions)}}">
    <script src="{{URL::asset('js/uploadLargFile.js')}}"></script>

    <style>
        section{
            background: #445565;
            min-height: 100vh;
        }
        .inputRows.optional{
            width: 100%;
        }
        .col-6{
            width: 49% !important;
            display: inline-block;
        }

        .mainSectionSubmitWork .uploadPercent{
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .mainSectionSubmitWork .uploadPercent .text:before{
            content: 'در حال بارگزاری';
            color: var(--yellow);
        }
        .mainSectionSubmitWork .uploadPercent.done .text:before{
            content: 'فایل با موفقیت بارگزاری شد';
            color: var(--koochita-light-green);
        }
        .mainSectionSubmitWork .uploadPercent.error .text:before{
            content: 'بارگزاری با مشکل مواجه شد';
            color: var(--koochita-red);
        }
        .mainSectionSubmitWork .uploadPercent .processDiv{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            background: white;
            border: solid gray 1px;
            border-radius: 10px;
            position: relative;
        }
        .mainSectionSubmitWork .uploadPercent .processDiv .percentNum{
            z-index: 9;
        }
        .mainSectionSubmitWork .uploadPercent .processDiv .percentBack{
            position: absolute;
            left: 0px;
            top: 0px;
            height: 100%;
            width: 0%;
            background: var(--yellow);
            border-radius: 8px;
        }
        .mainSectionSubmitWork .uploadPercent.done .percentNum{
            color: white;
        }
        .mainSectionSubmitWork .uploadPercent.done .percentBack{
            background: var(--koochita-light-green);
            width: 100% !important;
        }
        .mainSectionSubmitWork .uploadPercent.error .percentBack{
            background: var(--koochita-red);
        }

        .submitDeletePic .text{
            text-align: center;
            color: var(--yellow);
            margin-bottom: 25px;
        }
        .submitDeletePic .buts{
            display: flex;
            justify-content: space-evenly;
        }
        .submitDeletePic .buts .btn{
            border: none;
            border-radius: 15px;
            padding: 10px 30px;
            color: white;
        }
        .submitDeletePic .buts .btn.submit{
            background: var(--koochita-red);
        }
        .submitDeletePic .buts .btn.cancel{
            background: var(--koochita-light-green);
        }

        @media (max-width: 830px) {
            .inputRows.optional{
                width: 85%;
                margin-left: auto;
            }
        }
        @media (max-width: 767px){
            .mainSectionSubmitWork .submitButton{
                position: fixed;
                bottom: 0;
                margin: 0;
                width: 100%;
                right: 0;
                background: #ffffffcc;
                padding: 10px 5px;
                box-shadow: 6px 0px 7px 0px #28323c;
            }
            .mainSectionSubmitWork .submitButton > button{
                padding: 5px 20px;
                font-size: 13px;
            }
            .mainSectionSubmitWork{
                padding-bottom: 45px;
            }
            .indicator .circle{
                width: 50px;
                height: 50px;
            }
            .IndicatorSec .lines > div{
                height: 5px;
            }
            .inputRows > input, .inputRows > select{
                font-size: 13px;
            }
            .switchInputSec{
                float: unset;
            }
            .switchInputSec .title{
                font-size: 15px;
            }
            .switchInputSec .switchInput{
                font-size: 12px;
                width: 200px;
                margin: 7px auto;
            }
            .mainSectionSubmitWork .dropPictureSec{
                flex-direction: column;
                height: auto;
            }
            .mainSectionSubmitWork .dropPictureSec .text{
                text-align: center;
                font-size: 3vw;
                margin: 10px auto;
            }
            .inputRows.pd-lt-0{
                padding: 0px 15px;
            }
            .mainSectionSubmitWork .fileUploaded .fileRow{
                height: 510px;
                align-items: flex-start;
            }
            .mainSectionSubmitWork .fileUploaded .fileRow .fileInputs{
                flex-direction: column;
                background: linear-gradient(0deg, rgba(68,85,101,1) 0%, rgba(127,138,149,1) 50%, rgba(184,190,196,0.56) 80%, rgba(255,255,255,0) 100%);
            }
            .mainSectionSubmitWork .fileUploaded .fileRow .fileInputs .row{
                width: 100%;
                margin: 0;
            }
            .mainSectionSubmitWork .uploadPercent{
                width: 80%;
                margin: 35px auto;
            }
            .mainSectionSubmitWork .fileUploaded .fileRow > img{
                position: absolute;
                top: 0px;
                width: 100%;
                height: auto;
            }

            .mainSectionSubmitWork .footerIndicator{
                display: flex;
                width: 50%;
                justify-content: space-between;
                position: relative;
            }
            .mainSectionSubmitWork .footerIndicator .indicator .circle{
                width: 30px;
                height: 30px;
            }
            .mainSectionSubmitWork .footerIndicator .lines{
                position: absolute;
                left: 50px;
                top: calc(50% - 2px);
                display: flex;
                width: 100%;
                right: 0;
            }
            .mainSectionSubmitWork .footerIndicator .lines > div{
                width: 50%;
                height: 5px;
            }

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

            <div id="section_1" class="row" style="direction: ltr">
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="نام" {{$user->first_name == null ? '' : 'disabled'}} value="{{$user->first_name}}">
                </div>
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="نام خانوادگی" {{$user->last_name == null ? '' : 'disabled'}} value="{{$user->last_name}}">
                </div>
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="ایمیل" {{$user->email == null ? '' : 'disabled'}} value="{{$user->email}}">
                </div>
                <div class="col-md-12 inputRows">
                    <input type="text" placeholder="شماره همراه" {{$user->phone == null ? '' : 'disabled'}} value="{{$user->phone}}">
                </div>
                <div class="col-sm-6 col-6 inputRows">
                    <select {{$user->sex == null ? '' : 'disabled'}} value="{{$user->sex}}">
                        <option value="1">آقا</option>
                        <option value="0">خانم</option>
                    </select>
                </div>
                <div class="col-sm-6 col-6 inputRows">
                    <input type="number" placeholder="سن" {{$user->age == null ? '' : 'disabled'}} value="{{$user->age}}">
                </div>
                <div class="col-md-12 inputRows optional">
                    <input type="text" placeholder="لینک وب سایت">
                </div>
                <div class="col-md-12 inputRows optional">
                    <input type="text" placeholder="صفحه اینستاگرام">
                </div>
                <div class="col-sm-6 switchInputSec">
                    <div class="title">بخش اصلی جشنواره</div>
                    <div id="matchMainSection" class="switchInput" value="photo">
                        <div data-value="video" onclick="changeSwitchInputButton(this, 'festKind')">فیلم</div>
                        <div class="selected" data-value="photo" onclick="changeSwitchInputButton(this, 'festKind')">عکس</div>
                    </div>
                </div>

                <div class="col-sm-6 switchInputSec">
                    <div class="title">بخش فرعی جشنواره</div>
                    <div id="matchSideSection" class="switchInput" value="main">
                        <div class="selected" data-value="main" onclick="changeSwitchInputButton(this)">اصلی</div>
                        <div data-value="mobile" onclick="changeSwitchInputButton(this)">موبایل</div>
                    </div>
                </div>
            </div>

            <div id="section_2" style="display: none;">
                <label for="picFile" class="dropPictureSec">
                    <div class="icon">
                        <img src="{{URL::asset('images/festival/plus.png')}}">
                    </div>
                    <div class="text">
                        <span class="section2KindText"></span>
                        خود را با دکمه کناری انتخاب نموده و یا داخل این باکس بیاندازید
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

                <div class="IndicatorSec one footerIndicator hideOnScreen">
                    <div class="indicator">
                        <div class="firstBackGround twoBackGround threeBackGround circle"></div>
                    </div>
                    <div class="indicator">
                        <div class="twoBackGround threeBackGround circle"></div>
                    </div>
                    <div class="indicator">
                        <div class="threeBackGround circle"></div>
                    </div>
                    <div class="lines">
                        <div class="firstLine twoBackGround threeBackGround"></div>
                        <div class="secondLine threeBackGround"></div>
                    </div>
                </div>

                <button class="cancel" onclick="submitHandle(-1)">بازگشت</button>
                <button class="submit" onclick="submitHandle(1)">تایید</button>
            </div>
        </div>

        <div id="submitDeletePicModal" class="modalBlackBack fullCenter submitDeletePic">
            <div class="modalBody" style="background: #445565;">
                <div class="text">
                    ایا می خواهید فایل خود را حذف کنید. توجه کنید فایل و متن های نوشته شده قابل بازیابی نیست.
                </div>
                <div class="buts">
                    <button class="btn submit" onclick="doDeleteThisImg()">بله پاک شود</button>
                    <button class="btn cancel" onclick="closeMyModal('submitDeletePicModal')">خیر</button>
                </div>
            </div>
        </div>

        <div id="changeFestivalKindModal" class="modalBlackBack fullCenter submitDeletePic">
            <div class="modalBody" style="background: #445565;">
                <div class="text">
                    شما چند فایل آپلود کرده اید. در صورت تغییر بخش جشنواره فایل ها و متن ها پاک می شوند.
                </div>
                <div class="buts">
                    <button class="btn submit" onclick="doChangeMyFestivalKind()">بله عوض شود</button>
                    <button class="btn cancel" onclick="closeMyModal('changeFestivalKindModal')">خیر</button>
                </div>
            </div>
        </div>
    </section>

    <script>

        let lastStage = 1;
        let uploadedPicFile = [];
        let deleteImgIndex = 0;
        let changeFestivalKind = null;
        let festivalText = {
            'photo': {
                text: 'عکس',
                accepted: 'image/*'
            },
            'video': {
                text: 'فیلم',
                accepted: 'video/*'
            },
        };

        function changeSwitchInputButton(_elems, _kind = ''){
            if(_kind == 'festKind'){
                let uploadedFile = false;
                uploadedPicFile.map(pic => pic !== false ? uploadedFile = true : '');
                if(uploadedFile){
                    changeFestivalKind = _elems;
                    openMyModal('changeFestivalKindModal');
                    return;
                }
            }

            $(_elems).parent().find('.selected').removeClass('selected');
            $(_elems).addClass('selected');
            $(_elems).parent().attr('value', $(_elems).attr('data-value'));
        }

        function doChangeMyFestivalKind(){
            $(changeFestivalKind).parent().find('.selected').removeClass('selected');
            $(changeFestivalKind).addClass('selected');
            $(changeFestivalKind).parent().attr('value', $(changeFestivalKind).attr('data-value'));
            changeFestivalKind = null;

            $('#fileUploadSection').html('');
            uploadedPicFile = [];

            closeMyModal('changeFestivalKindModal');
        }

        function changePic(_input){
            if(_input.files && _input.files[0]) {
                let nowUploaded = _input.files[0];
                uploadedPicFile.push(_input.files[0]);
                let nowUploadIndex = uploadedPicFile.length-1;
                _input.value = '';
                if(nowUploaded.type.includes('video')){
                    createUploadedFileRow('#', 'فیلم', nowUploadIndex);
                    uploadLargeFile('{{route("festival.uploadFile")}}', nowUploaded, (_percent) =>{
                        if(_percent == 'done') {
                            $('#fileInputRowPercent_' + nowUploadIndex).addClass('done');
                            $('#fileInputRowPercent_' + nowUploadIndex).find('.percentNum').text('100%');
                        }
                        else if(_percent == 'error')
                            $('#fileInputRowPercent_' + nowUploadIndex).addClass('error');
                        else{
                            $('#fileInputRowPercent_' + nowUploadIndex).find('.percentNum').text(_percent+'%');
                            $('#fileInputRowPercent_' + nowUploadIndex).find('.percentBack').css('width', _percent+'%');
                        }
                    });
                }
                else {
                    var reader = new FileReader();
                    reader.onload = e => createUploadedFileRow(e.target.result, 'عکس', nowUploadIndex);
                    reader.readAsDataURL(nowUploaded);
                }
            }
        }

        function createUploadedFileRow(mainPic, kind, _index){
            let text =  '<div id="fileRow_' + _index + '" class="fileRow">\n' +
                        '   <img src="' + mainPic + '" >\n' +
                        '   <div class="fileInputs">\n' +
                        '       <div id="fileInputRowPercent_' + _index + '" class="uploadPercent">' +
                        '           <div class="text"></div>' +
                        '           <div class="processDiv">' +
                        '               <div class="percentNum">0%</div>' +
                        '               <div class="percentBack"></div>' +
                        '           </div>' +
                        '       </div>' +
                        '       <div class="row">\n' +
                        '           <div class="col-sm-12 inputRows">\n' +
                        '               <input type="text" placeholder="نام ' + kind + '">\n' +
                        '           </div>\n' +
                        '           <div class="col-sm-6 inputRows">\n' +
                        '               <input type="text" placeholder="نام مکان (اختیاری)">\n' +
                        '           </div>\n' +
                        '           <div class="col-sm-6 inputRows pd-lt-0">\n' +
                        '               <input type="text" placeholder="نام شهر">\n' +
                        '           </div>\n' +
                        '           <div class="col-sm-12 inputRows">\n' +
                        '               <textarea type="text" placeholder="توضیح ' + kind + ' (اختیاری)"></textarea>\n' +
                        '           </div>\n' +
                        '       </div>\n' +
                        '       <div class="cornerButton iconClose" onclick="deleteImg('+_index+')"></div>\n' +
                        '   </div>\n' +
                        '</div>\n';

            $('#fileUploadSection').append(text);

            resizeUploadedPictures();
        }

        function createVideoPic(_file, _callBack){
            var video = document.createElement('video');
            video.preload = 'metadata';
            video.onloadedmetadata = () => window.URL.revokeObjectURL(video.src);
            video.src = URL.createObjectURL(_file[0]);

            var fileReader = new FileReader();
            fileReader.onload = function() {
                var blob = new Blob([fileReader.result], {type: _file[0].type});
                var url = URL.createObjectURL(blob);
                var timeupdate = function() {
                    if (snapImage()) {
                        video.removeEventListener('timeupdate', timeupdate);
                        video.pause();
                    }
                };
                video.addEventListener('loadeddata', function() {
                    if (snapImage()) {
                        video.removeEventListener('timeupdate', timeupdate);
                        video.pause();
                    }
                });

                var snapImage = function() {
                    let canvas = document.createElement('canvas');
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                    let image = canvas.toDataURL();
                    let success = image.length > 100;
                    if (success) {
                        URL.revokeObjectURL(url);
                        _callBack(image);
                    }
                    return success;
                };

                video.addEventListener('timeupdate', timeupdate);
                video.preload = 'metadata';
                video.src = url;
                video.muted = true;
                video.playsInline = true;
                video.play();
            };
            fileReader.readAsArrayBuffer(_file[0]);
        }

        function deleteImg(_index){
            deleteImgIndex = _index;
            openMyModal('submitDeletePicModal');
        }

        function doDeleteThisImg(){
            $('#fileRow_'+deleteImgIndex).remove();
            uploadedPicFile[deleteImgIndex] = false;
            deleteImgIndex = 0;
            closeMyModal('submitDeletePicModal');
        }

        function resizeUploadedPictures(){
            let windowWidth = $(window).width();
            let imgs = $('.fileRow').find('img');
            for(let i = 0; i < imgs.length; i++){
                let item = $(imgs[i]);

                let picH = item.height();
                let picW = item.width();
                let picS = picW/picH;

                if (windowWidth > 767) {
                    let resultH = item.parent().height();
                    let resultW = item.parent().width()*0.7;
                    let rPH100W = resultH*picS;

                    if(rPH100W < resultW){
                        item.css('width', '60%');
                        item.css('height', 'auto');
                    }
                    else{
                        item.css('height', '100%');
                        item.css('width', 'auto');
                    }
                }
                else {
                    let resultH = item.parent().height()*0.7;
                    let resultW = item.parent().width();
                    let resultS = resultW/resultH;
                    let rPW100H = resultW/picS;

                    if(rPW100H < resultH){
                        item.css('height', '70%');
                        item.css('width', 'auto');
                    }
                    else{
                        item.css('width', '100%');
                        item.css('height', 'auto');
                    }
                }
            }
        }

        function submitHandle(_step){
            if(lastStage == 1){
                let festKind = $('#matchMainSection').attr('value');
                $('.section2KindText').text(festivalText[festKind].text);
                $('#picFile').attr('accept', festivalText[festKind].accepted);
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

        $(window).on('resize', resizeUploadedPictures);
    </script>

    @include('general.forAllPages')

</body>
</html>