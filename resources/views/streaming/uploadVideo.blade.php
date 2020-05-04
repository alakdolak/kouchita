@extends('streaming.streamingLayout')


@section('head')

{{--    <link rel="stylesheet" href="{{asset('packages/dropzone/basic.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('semanticUi/semantic.css')}}">


    <link rel="stylesheet" href="{{URL::asset('css/streaming/uploadVideoVod.css')}}">

    <script src="{{asset('semanticUi/semantic.min.js')}}"></script>

    <style>
        .row{
            width: 100%;
            margin: 0px;
        }
        .uploadBase{
            background: #3a3a3a;
            padding: 15px;
            border-radius: 8px;
            position: relative;
        }
        .uploadDiv{
            border: dashed 4px #232323;
            border-radius: 10px;
            width: 100%;
            cursor: pointer;
        }
        .uploadText{
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            height: 300px;
        }

        .videoSetting{
            display: none;
            width: 100%;
        }
        .videoUploadProgressDiv{
            width: 100%;
            margin: 0;
            padding: 15px;
            border: dashed 5px #232323;
            border-radius: 10px 10px 0px 0px;
        }
        .videoProgressPicDiv{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .progressDiv{
            height: 150px;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .progressStatus{
            color: #4dc7bc;
            margin-bottom: 20px;
        }
        .progressBar{
            width: 100%;
            background: white;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .progressColor{
            position: absolute;
            background-color: #fcc156;
            top: 0px;
            right: 0px;
            width: 0%;
            height: 100%;
            border-radius: 10px;
            transition: .2s;
        }
        .progressText{
            z-index: 1;
        }

        .videoInfos{
            width: 100%;
            margin: 0;
            padding: 15px;
            border: dashed 5px #232323;
            margin-top: 20px;
            border-radius: 0px 0px 10px 10px;
        }
        .inputVideoLabel{
            color: white;
            font-weight: 400;
            margin-bottom: 10px;
        }
        .rtlMultiSelect{
            direction: rtl;
            text-align: right;
        }
        .ui.dropdown .menu > .item{
            text-align: right;
            direction: rtl;
        }
        .ui.multiple.search.dropdown, .ui.multiple.search.dropdown > input.search{
            text-align: right;
            direction: rtl;
        }
        .buttonDiv{
            display: flex;
            justify-content: flex-end;
        }
        .saveButton{
            width: 200px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .releaseButton{
            color: white;
            background-color: #ffb227;
            border-radius: 10px 0px 0px 10px;
            transition: .5s;
        }
        .releaseButton:hover{
            background-color: #fcc156;
        }

        .notReleaseButton{
            color: white;
            background: #2e9087;
            border-radius: 0px 10px 10px 0px;
            margin-left: 10px;
            transition: .5s;
        }
        .notReleaseButton:hover{
            background-color: #4dc7bc;
        }
        .thumbnailSelectDiv{
            display: flex;
            flex-wrap: wrap;
        }
        .thumbnailSelectImgDiv{
            width: 48%;
            margin: 4px;
        }
        .thumbnailSelectImg{
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            cursor: pointer;
            height: 140px;
        }
        .thumbnailSelectImgChoose{
            border: solid 8px #2e9087 !important;
        }
        .newThumbnailChoose{
            color: white;
            border-radius: 10px;
            border: solid 4px white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            height: 140px;
            cursor: pointer;
        }
        .newThumbnailModal{
            display: none;
            /*display: flex;*/
            justify-content: center;
            align-items: center;
            opacity: 1 !important;
        }
        .closeDivVideoSection{
            position: absolute;
            left: 10px;
            top: 10px;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }
        .closeDivVideoSection:before{
            content: "\00d7";
            font-size: 40px;
        }
        .selectThumbnailDiv{
            background: white;
            border-radius: 10px;
            opacity: 1;
            width: 438px;
            max-width: 100%;
        }
        .selectThumbnailDivVideoSection{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 20px;
        }
        .resultThumbnail{
            padding: 20px;
            width: 100%;
        }
        @media (min-width: 992px){
            .videoSetting .col-md-6, .col-md-8, .col-md-4{
                float: right;
            }
        }
        @media (max-width: 992px) {
            .progressDiv{
                height: 100px;
            }
            .progressStatus{
                text-align: center;
            }
        }
    </style>
@endsection

@section('body')

    <input type="hidden" id="code" name="code" value="{{$code}}">
    <input type="hidden" id="duration" name="duration">

    <div class="container uploadBase">
        <input type="file" id="videoFile" accept="video/*" style="display: none" onchange="inputVideo(this)">
        <label for="videoFile" id="uploadVideoDiv" class="uploadDiv">
            <div class="row" style="width: 100%; margin: 0">
                <div class="col-md-6"></div>
                <div class="col-md-6 uploadText" >
                    ویدیو خود را در اینجا قرار دهید
                </div>
            </div>
        </label>

        <div id="videoSetting" class="videoSetting">
            <div class="row videoUploadProgressDiv">

                <div class="col-md-4">
                    <div class="videoProgressPicDiv">
                        <img class="showThumbnailMain" src="" style="height: 150px; border-radius: 10px">
                    </div>
                </div>
                <div class="col-md-8 progressDiv">
                    <div id="progressStatus" class="progressStatus">
                        ویدیو شما در حال بارگذاری می باشد
                    </div>
                    <div class="progressBar">
                        <div id="progressColor" class="progressColor"></div>
                        <div id="progressText" class="progressText">10%</div>
                    </div>
                </div>
            </div>

            <div class="row videoInfos">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="videoName" class="inputVideoLabel">نام ویدیو</label>
                                <input type="text" class="form-control" id="videoName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="videoCategory" class="inputVideoLabel">دسته بندی ویدیو</label>
                                <select name="videoCategory" id="videoCategory" class="form-control">
                                    <option value="0">...</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="videoText" class="inputVideoLabel">توضیحات ویدیو (اختیاری)</label>
                                <textarea class="form-control" id="videoText" name="videoText" rows="5" style="width: 100%;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="videoTags" class="inputVideoLabel">برچسپ ها</label>
                                <select id="videoTags" name="videoTags" class="ui fluid search dropdown rtlMultiSelect" multiple=""></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="videoTags" class="inputVideoLabel">عکس پیش نمایش</label>
                                <div class="thumbnailSelectDiv">
                                    <div class="thumbnailSelectImgDiv">
                                        <img src="" class="showThumbnail0 thumbnailSelectImg thumbnailSelectImgChoose" onclick="selectNewThumbnail(0, this)">
                                    </div>
                                    <div class="thumbnailSelectImgDiv">
                                        <img src="" class="showThumbnail1 thumbnailSelectImg" onclick="selectNewThumbnail(1, this)">
                                    </div>
                                    <div class="thumbnailSelectImgDiv">
                                        <img src="" class="showThumbnail2 thumbnailSelectImg" onclick="selectNewThumbnail(2, this)">
                                    </div>
                                    <div class="thumbnailSelectImgDiv">
                                        <img src="" class="showThumbnail3 thumbnailSelectImg" onclick="selectNewThumbnail(3, this)">
                                    </div>
                                    <div id="creatCropThumbnailDiv" class="thumbnailSelectImgDiv newThumbnailChoose" onclick="selectNewThumbnail(4, this)">
                                        انتخاب عکس
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="buttonDiv">
{{--                            <div class="saveButton notReleaseButton" onclick="storeInfoVideos(0)">--}}
{{--                                ذخیره شود و بعدا منتشر می کنم--}}
{{--                            </div>--}}
                            <div class="saveButton releaseButton" onclick="storeInfoVideos(1)">
                                انتشار ویدیو
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="newThumbnailModal" class="ui_backdrop dark newThumbnailModal">
        <div class="selectThumbnailDiv">
            <div class="row selectThumbnailDivVideoSection">
                <div class="closeDivVideoSection" onclick="$('#newThumbnailModal').css('display', 'none')"></div>
                <video id="thumbnailVideoVideo" src="" style="width: 400px" controls muted></video>
                <button onclick="cropVideoPic()" style="margin-top: 20px">برش تصویر</button>
            </div>

            <div class="row" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <canvas id="resultThumbnail" class="resultThumbnail"></canvas>
                <button class="btn btn-success" onclick="setCropThumbnail()">تایید</button>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        let thumbnail = '';
        let newThumbnailCrop;


        $('#videoTags').dropdown({
            apiSettings: {
                url: '{{route('getTags')}}',
                method: 'POST',
                cache: false,
                beforeXHR: (xhr) => {
                    xhr.setRequestHeader('Content-Type', 'application/json');
                },
                beforeSend: (settings) => {
                    settings.data = JSON.stringify({
                        Tag: settings.urlData.query,
                    });
                    return settings
                },
                onResponse: (response) => {
                    console.log(response);
                    response = {
                        "success": true,
                        "results": [
                            {
                                "name"  : "Choice 2",
                                "value" : "value2",
                                "text"  : "Choice 2"
                            },
                        ]
                    };
                    // Modify your JSON response into the format SUI wants
                    return response
                }
            }
        });


        let videoDropZone = $('#uploadVideoDiv');
        let videoCode = $('#code').val();
        //drag and drop file
        videoDropZone.on('dragover', function() {
            videoDropZone.addClass('hover');
            return false;
        });
        videoDropZone.on('dragleave', function() {
            videoDropZone.removeClass('hover');
            return false;
        });
        videoDropZone.on('drop', function(e) {
            e.stopPropagation();
            e.preventDefault();
            var files = e.originalEvent.dataTransfer.files;
            if(files[0]['type'].includes('video/'))
                storeVideo(files[0]);
        });

        function inputVideo(_input){
            if(_input.files[0]['type'].includes('video/'))
                storeVideo(_input.files[0]);
        }

        let canvas = 0;
        function storeVideo(_file){

            window.URL = window.URL || window.webkitURL;

            var video = document.createElement('video');
            video.preload = 'metadata';
            // video.onloadedmetadata = function() {
            //     console.log('onloadedmetadata')
            // }
            video.src = URL.createObjectURL(_file);
            $('#thumbnailVideoVideo').attr('src', URL.createObjectURL(_file));

            var file = _file;
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var blob = new Blob([fileReader.result], {type: _file.type});
                var url = URL.createObjectURL(blob);

                video.addEventListener('loadeddata', function() {

                    if(snapImage('showThumbnailMain')){
                        video.currentTime = video.duration/3;
                        setTimeout(function(){
                            if(snapImage('showThumbnail1')){
                                video.currentTime = (video.duration/3) * 2;
                                setTimeout(function(){
                                    if(snapImage('showThumbnail2')){
                                        video.currentTime = video.duration - 1;
                                        setTimeout(function(){
                                            snapImage('showThumbnail3');
                                            window.URL.revokeObjectURL(video.src);
                                        }, 200)
                                    }
                                }, 200);
                            }
                        }, 200);
                    }
                });

                var snapImage = function(_result) {
                    if(canvas == 0)
                        canvas = document.createElement('canvas');

                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                    var image = canvas.toDataURL();
                    var success = image.length > 100000;

                    if (success) {
                        $('.' + _result).attr('src', image);
                        if(_result == 'showThumbnailMain') {
                            $('.showThumbnail0').attr('src', image);
                            thumbnail = image;
                        }
                    }
                    return success;
                };
                video.preload = 'metadata';
                video.src = url;
                video.muted = true;
                video.playsInline = true;
                video.play();
            };
            fileReader.readAsArrayBuffer(_file);

            $('#uploadVideoDiv').hide();
            $('#videoSetting').show();

            let formData = new FormData();
            formData.append('video', _file);
            formData.append('code', videoCode);
            formData.append('kind', 'video');
            formData.append('_token', '{{csrf_token()}}');

            $.ajax({
                type: 'post',
                url: '{{route("streaming.storeVideo")}}',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    let xhr = new XMLHttpRequest();
                    xhr.upload.onprogress = function (e) {
                        var percent = '0';
                        var percentage = '0%';

                        if (e.lengthComputable) {
                            percent = Math.round((e.loaded / e.total) * 100);
                            percentage = percent + '%';
                            $('#progressText').text(percentage);
                            $('#progressColor').css('width', percentage);

                        }
                    };

                    return xhr;
                },
                success: function(response){
                    try{
                        response = JSON.parse(response);
                        if(response['status'] == 'ok') {
                            $('#progressStatus').text('ویدیوی شما با موفقیت بارگزاری شد');
                            $('#duration').val(response['duration']);
                        }
                        else
                            errorUploadVideo();
                    }
                    catch (e) {
                        console.log(e);
                        errorUploadVideo();
                    }
                },
                error: function(err){
                    console.log(err);
                    errorUploadVideo();
                }
            })
        }

        function errorUploadVideo(){
            $('#uploadVideoDiv').show();
            $('#videoSetting').hide();

            openErrorAlert('بارگزاری ویدیو با مشکلی مواجه شد لطفا دوباره تلاش کنید');
        }

        function storeInfoVideos(_state){
            let name = $('#videoName').val();
            let categoryId = $('#videoCategory').val();
            let description = $('#videoText').val();
            let tags = $('#videoTags').val();
            let duration = $('#duration').val();
            let kind = 'setting';
            let error = false;
            let errorText = '<ul style="list-style: none">';

            if(name.trim().length == 0){
                error = true;
                errorText += '<li style="margin-bottom: 10px">برای ویدیو خود یک نام انتخاب کنید</li>';
            }

            if(categoryId == 0){
                error = true;
                errorText += '<li>لطفا دسته بندی ویدیوی خود را مشخص کنید</li>';
            }

            if(error){
                errorText += '</ul>';
                openWarning(errorText);
                return;
            }
            else{
                let settingFormData = new FormData();
                settingFormData.append('_token', '{{csrf_token()}}');
                settingFormData.append('code', videoCode);
                settingFormData.append('name', name);
                settingFormData.append('kind', kind);
                settingFormData.append('kind', kind);
                settingFormData.append('categoryId', categoryId);
                settingFormData.append('description', description);
                settingFormData.append('tags', tags);
                settingFormData.append('duration', duration);
                settingFormData.append('state', _state);
                settingFormData.append('thumbnail', thumbnail);

                openLoading();
                $.ajax({
                    type: 'post',
                    url: '{{route("streaming.storeVideo")}}',
                    data: settingFormData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        try{
                            response = JSON.parse(response);
                            if(response['status'] == 'ok')
                                alert('ویدیوی شما با موفقیت ثبت شد');
                            else{
                                console.log(response);
                                errorUploadSettingVideo();
                            }
                        }
                        catch(e){
                            console.log(e);
                            errorUploadSettingVideo();
                        }
                        closeLoading();
                    },
                    error: function(err){
                        console.log(err);
                        closeLoading();
                        errorUploadSettingVideo();
                    }
                })
            }
        }

        function selectNewThumbnail(_num, _element){
            $('.thumbnailSelectImgChoose').removeClass('thumbnailSelectImgChoose');
            $(_element).addClass('thumbnailSelectImgChoose');

            if(_num == 4)
                $('#newThumbnailModal').css('display', 'flex');
            else{
                thumbnail = $(_element).attr('src');
                $('.showThumbnailMain').attr('src', thumbnail);
            }
        }

        function cropVideoPic(){
            let videoThumbnailDiv = document.getElementById('thumbnailVideoVideo');
            var canvasThumbnail = document.getElementById('resultThumbnail');
            canvasThumbnail.width = videoThumbnailDiv.videoWidth;
            canvasThumbnail.height = videoThumbnailDiv.videoHeight;
            canvasThumbnail.getContext('2d').drawImage(videoThumbnailDiv, 0, 0, canvasThumbnail.width, canvasThumbnail.height);
            newThumbnailCrop = canvasThumbnail.toDataURL();
        }

        function setCropThumbnail(){
            $('.showThumbnailMain').attr('src', newThumbnailCrop);
            thumbnail = newThumbnailCrop;

            $('.thumbnailSelectImgChoose').removeClass('thumbnailSelectImgChoose');
            $('#creatCropThumbnailDiv').addClass('thumbnailSelectImgChoose');

            $('#newThumbnailModal').css('display', 'none');
        }

        function errorUploadSettingVideo(){
            openErrorAlert('ثبت ویدیو با مشکلی مواجه شد لطفا دوباره تلاش کنید');
        }
    </script>

@endsection