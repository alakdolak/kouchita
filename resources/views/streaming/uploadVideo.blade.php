@extends('streaming.streamingLayout')


@section('head')

{{--    <link rel="stylesheet" href="{{asset('packages/dropzone/basic.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('semanticUi/semantic.css')}}">


    <link rel="stylesheet" href="{{URL::asset('css/streaming/uploadVideoVod.css')}}">

    <script src="{{asset('semanticUi/semantic.js')}}"></script>

    <style>

    </style>
@endsection

@section('body')

    <input type="hidden" id="code" name="code" value="{{$code}}">
    <input type="hidden" id="duration" name="duration">

    <div class="container uploadBase">
        <input type="file" id="videoFile" accept="video/*" style="display: none" onchange="inputVideo(this)">
        <label for="videoFile" id="uploadVideoDiv" class="uploadDiv" style="display: block">
            <div class="row" style="width: 100%; margin: 0">
                <div class="col-md-6"></div>
                <div class="col-md-6 uploadText" >
                    ویدیو خود را در اینجا قرار دهید
                </div>
            </div>
        </label>

        <div id="videoSetting" class="videoSetting" style="display: none">
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
                            <div class="form-group">
                                <label for="videoPlaceRel" class="inputVideoLabel">ویدیوی شما مربوط به شهر و یا مکان خاصی می شود؟</label>
                                <select id="videoPlaceRel" name="videoPlaceRel" class="ui fluid search dropdown rtlMultiSelect" multiple=""></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="thumb" class="inputVideoLabel">عکس پیش نمایش</label>
                                <div id="thumb" class="thumbnailSelectDiv">
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
        let uploadCompleted = false;


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
                        tag: settings.urlData.query,
                    });
                    return settings
                },
                onResponse: (response) => {
                    let result = [];
                    if(response.tags.length == 0){
                        result = [{
                            "name" : response.send,
                            "value" : 'new_' + response.send,
                            "text" : response.send
                        }]
                    }
                    else{
                        for(let i = 0; i < response.tags.length; i++){
                            result.push({
                                "name" : response.tags[i].name,
                                "value" : 'old_' + response.tags[i].id,
                                "text" : response.tags[i].name
                            })
                        }
                    }
                    response = {
                        "success": true,
                        "results": result
                    };
                    // Modify your JSON response into the format SUI wants
                    return response
                }
            }
        });

        $('#videoPlaceRel').dropdown({
            apiSettings: {
                url: '{{route('totalSearch')}}',
                method: 'POST',
                cache: false,
                beforeXHR: (xhr) => {
                    xhr.setRequestHeader('Content-Type', 'application/json');
                },
                beforeSend: (settings) => {
                    settings.data = JSON.stringify({
                        kindPlaceId: 0,
                        key: settings.urlData.query,
                        _token: '{{csrf_token()}}'
                    });
                    return settings
                },
                onResponse: (response) => {
                    let result = [];
                    let success = false;
                    for(let i = 0; i < response[1].length; i++){
                        success = true;
                        let name;
                        let place = response[1][i];
                        if(place['mode'] == 'state')
                            name = ' استان ' + place['targetName'];
                        else if(place['mode'] == 'city')
                            name = ' شهر ' + place['targetName'] + ' در ' + place['stateName'];
                        else
                            name = place['targetName'] + ' در ' + place["cityName"];

                        result.push({
                            "name" : name,
                            "value" : place['kindPlaceId'] + '_' + place['id'],
                            "text" : name,
                        })
                    }
                    response = {
                        "success": success,
                        "results": result
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
                            uploadCompleted = true;
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
            let places = $('#videoPlaceRel').val();
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

            if(!uploadCompleted){
                error = true;
                errorText += '<li>ویدیوی شما بارگذاری نشده است. لطفا تا بارگذاری کامل صبر کنید.</li>';
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
                settingFormData.append('places', places);
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