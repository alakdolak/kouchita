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
                        <img id="showThumbnail" src="" style="height: 150px; border-radius: 10px">
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
                                    <option value="1">دسته بندی 1</option>
                                    <option value="2">دسته بندی 2</option>
                                    <option value="3">دسته بندی 3</option>
                                    <option value="4">دسته بندی 4</option>
                                    <option value="5">دسته بندی 5</option>
                                    <option value="6">دسته بندی 6</option>
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
                        <div class="col-md-6"></div>
                    </div>

                    <div class="row">
                        <div class="buttonDiv">
                            <div class="saveButton notReleaseButton" onclick="storeInfoVideos(0)">
                                ذخیره شود و بعدا منتشر می کنم
                            </div>
                            <div class="saveButton releaseButton" onclick="storeInfoVideos(1)">
                                انتشار ویدیو
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    {{--    <script src="{{URL::asset('packages/dropzone/dropzone.js')}}"></script>--}}
    {{--    <script src="{{URL::asset('packages/dropzone/dropzone-amd-module.js')}}"></script>--}}
    <script>
        let thumbnail = '';


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

        function storeVideo(_file){

            window.URL = window.URL || window.webkitURL;

            var video = document.createElement('video');
            video.preload = 'metadata';
            video.onloadedmetadata = function() {
                window.URL.revokeObjectURL(video.src);
            }
            video.src = URL.createObjectURL(_file);

            var file = _file;
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var blob = new Blob([fileReader.result], {type: _file.type});
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
                    }
                });

                var snapImage = function() {
                    var canvas = document.createElement('canvas');
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                    var image = canvas.toDataURL();
                    var success = image.length > 100000;

                    if (success) {
                        var img = document.getElementById('showThumbnail');
                        img.src = image;
                        thumbnail = image;
                        URL.revokeObjectURL(url);
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



        function errorUploadSettingVideo(){
            openErrorAlert('ثبت ویدیو با مشکلی مواجه شد لطفا دوباره تلاش کنید');
        }
    </script>

@endsection