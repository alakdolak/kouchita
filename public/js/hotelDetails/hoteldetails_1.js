var assignedUser = [];
var reviewPicNumber = 0;
var reviewMultiAns = [];
var reviewMultiAnsQuestionId = [];
var reviewMultiAnsId = [];

var reviewRateAnsQuestionId = [];
var reviewRateAnsId = [];

var imgCropNumber;

function checkLogin(){
    if (!hasLogin) {
        showLoginPrompt(hotelDetailsInSaveToTripMode);
        return false;
    }
    else
        return true;
}

function isPhotographer(){

    if(!checkLogin())
        return;

    // $('.dark').show();
    // $('.dark').removeClass('hidden');
    $("#photoEditor").removeClass('hidden');
}

function changeSiteSlidePic(_index){
    var photo = sitePics[_index];

    document.getElementById('mainSiteSliderPic').src = photo['s'];
}

function changePhotographerSlidePic(_index){
    var photo = photographerPics[_index];
    var likeDislike = '                                        <div class="photosFeedBackBtn">\n' +
                        '                                        <div class="feedBackBtn">\n' +
                        '                                            <div class="col-xs-6 likeBox" onclick="likePhotographerPic(this, 1, ' + photo["id"] + ')">دوست داشتم' +
                        '                                               <span class="likeBoxIcon firstIcon"></span>' +
                        '                                               <span class="likeBoxIconClicked display-none secondIcon"></span>' +
                        '                                            </div>\n' +
                        '                                            <div class="col-xs-6 dislikeBox" onclick="likePhotographerPic(this, 0, ' + photo["id"] + ')">دوست نداشتم' +
                        '                                               <span class="dislikeBoxIcon firstIcon"></span>' +
                        '                                               <span class="dislikeBoxIconClicked display-none secondIcon"></span>' +
                        '                                            </div>\n' +
                        '                                        </div>\n' +
                        '                                        <div class="feedbackStatistic">\n' +
                        '                                            <span>' + photo["like"] + '</span>\n' +
                        '                                                نفر دوست داشتند و\n' +
                        '                                            <span>' + photo["dislike"] + '</span>\n' +
                        '                                                نفر دوست نداشتند\n' +
                        '                                        </div>\n';

    document.getElementById('photographerSlideUserPic').src = photo['userPic'];
    document.getElementById('photographerSlideUserName').innerText = photo['name'];
    document.getElementById('photographerDescription').innerText = photo['description'];
    document.getElementById('photographerSlideTimeInfo').innerText = photo['fromUpload'];

    if(photo['showInfo']){
        document.getElementById('photographerSlideFeedBackBtns').style.display = 'block';
        document.getElementById('photographerSlideFeedBackBtns').innerHTML = likeDislike;
        document.getElementById('photographerDescription').style.display = 'block';
        document.getElementById('photographerSlideInfos').style.display = 'block';
    }
    else{
        document.getElementById('photographerSlideFeedBackBtns').style.display = 'none';
        document.getElementById('photographerDescription').style.display = 'none';
        document.getElementById('photographerSlideInfos').style.display = 'none';
    }

    document.getElementById('mainPhotographerSliderPic').src = photo['s'];
}

function likePhotographerPic(element,_like, _id){

    if(!checkLogin())
        return;

    $.ajax({
        type: 'post',
        url: likePhotographerPicRoute,
        data: {
            'id' : _id,
            'like' : _like
        },
        success: function(response){
            if(response == 'ok')
                alert('نظر شما با موفقیت ثبت شد. تشکر از مشارکت شما');
            else if(response == 'nok1')
                alert('برای ثبت نظر باید ابتدا وارد شوید');
            else if(response == 'nok2')
                alert('شما قبلا رای داده اید');
            else if(response == 'nok2')
                alert('مشکلی پیش امده لطفا دوباره تلاش کنید');
        }
    })

    if(_like==1) {
        $(element).toggleClass('color-red');
        $(element).children("span.firstIcon").toggle();
        $(element).children("span.secondIcon").toggle();

        $(element).next().removeClass('color-darkred');
        $(element).next().children("span.secondIcon").hide();
        $(element).next().children("span.firstIcon").show();
    }
    else if(_like==0) {
        $(element).toggleClass('color-darkred');
        $(element).children("span.firstIcon").toggle();
        $(element).children("span.secondIcon").toggle();

        $(element).prev().removeClass('color-red');
        $(element).prev().children("span.secondIcon").hide();
        $(element).prev().children("span.firstIcon").show();
    }

}

function bookMark() {

    if (!hasLogin) {
        showLoginPrompt(hotelDetailsInBookMarkMode);
        return;
    }

    $.ajax({
        type: 'post',
        url: bookMarkDir,
        data: {
            'placeId': placeId,
            'kindPlaceId': kindPlaceId
        },
        success: function (response) {
            if (response == "ok"){
                if($('#bookMarkIcon').hasClass('castle')){
                    $('#bookMarkIcon').removeClass('castle');
                    $('#bookMarkIcon').addClass('castle-fill');
                    alert('این صفحه ذخیره شد')
                }
                else if($('#bookMarkIcon').hasClass('castle-fill')){
                    $('#bookMarkIcon').removeClass('castle-fill');
                    $('#bookMarkIcon').addClass('castle');
                    alert('این صفحه از حالت ذخیره خارج شد')
                }

            }
                // document.location.href = hotelDetails;
        }
    })
}

function momentChangeRate(_index, _value, _kind){

    if(_kind == 'in') {
        for (i = 1; i < 6; i++) {
            if (_value < i) {
                document.getElementById('rate_' + i + '_' + _index).classList.remove('starRatingGreen');
                document.getElementById('rate_' + i + '_' + _index).classList.add('starRating');
            }
            else {
                document.getElementById('rate_' + i + '_' + _index).classList.remove('starRating');
                document.getElementById('rate_' + i + '_' + _index).classList.add('starRatingGreen');
            }
        }
        switch (_value) {
            case 1:
                text = 'اصلا راضی نبودم';
                break;
            case 2:
                text = 'بد نبود';
                break;
            case 3:
                text = 'معمولی بود';
                break;
            case 4:
                text = 'خوب بود';
                break;
            case 5:
                text = 'عالی بود';
                break;
        }

        document.getElementById('rateName_' + _index).innerText = text;
    }
    else{
        _value = rateQuestionAns[_index];
        for (i = 1; i < 6; i++) {
            if (_value < i) {
                document.getElementById('rate_' + i + '_' + _index).classList.remove('starRatingGreen');
                document.getElementById('rate_' + i + '_' + _index).classList.add('starRating');
            }
            else {
                document.getElementById('rate_' + i + '_' + _index).classList.remove('starRating');
                document.getElementById('rate_' + i + '_' + _index).classList.add('starRatingGreen');
            }
        }
        switch (_value) {
            case 1:
                text = 'اصلا راضی نبودم';
                break;
            case 2:
                text = 'بد نبود';
                break;
            case 3:
                text = 'معمولی بود';
                break;
            case 4:
                text = 'خوب بود';
                break;
            case 5:
                text = 'عالی بود';
                break;
        }

        document.getElementById('rateName_' + _index).innerText = text;
    }
}

function chooseQuestionRate(_index, _value, _id){
    rateQuestionAns[_index] = _value;

    if(reviewRateAnsQuestionId.includes(_id)){
        var index = reviewRateAnsQuestionId.indexOf(_id);
        reviewRateAnsId[index] = _value;
    }
    else {
        reviewRateAnsQuestionId[reviewRateAnsQuestionId.length] = _id;
        reviewRateAnsId[reviewRateAnsId.length] = _value;
    }

    document.getElementById('rateQuestionInput').value = JSON.stringify(reviewRateAnsQuestionId);
    document.getElementById('rateAnsInput').value = JSON.stringify(reviewRateAnsId);
}

function searchUser(_value){
    if(_value != '' && _value != ' ') {
        $.ajax({
            type: 'post',
            url: findUser,
            data: {
                'value': _value
            },
            success: function (response) {
                if (response == 'nok3') {
                    document.getElementById('assignedResultReview').innerHTML = '';

                    if(_value.includes('@') && _value.includes('.')){
                        text = '<ul>';
                        text += '<li style="color: blue;" onclick="assignedUserToReview(\'' + _value + '\')"  style="cursor: pointer"> دعوت کردن دوست خود : ' + _value + '</li>';
                        text += '</ul>';

                        document.getElementById('assignedResultReview').innerHTML = text;
                    }
                }
                else if (response != 'nok1' && response != 'nok2') {
                    var user = JSON.parse(response);
                    var userEmail = user[0];
                    var userName = user[1];

                    text = '<ul>';
                        for(i = 0; i < userName.length; i++){
                            text += '<li onclick="assignedUserToReview(\'' + userName[i]['username'] + '\')" style="cursor: pointer">' + userName[i]['username'] + '</li>';
                        }
                        for(i = 0; i < userEmail.length; i++){
                            text += '<li onclick="assignedUserToReview(\'' + userEmail[i]['email'] + '\')" style="cursor: pointer">' + userEmail[i]['email'] + '</li>';
                        }
                    text += '</ul>';
                    document.getElementById('assignedResultReview').innerHTML = text;

                }
            }
        })
    }
    else
        document.getElementById('assignedResultReview').innerHTML = '';

}

function assignedUserToReview(_email){

    var text = '<div class="participantDiv">\n' +
        '<span class="removeParticipantBtn" onclick="removeAssignedUserToReview(this, \'' + _email + '\')"></span>' + _email + '</div>';

    assignedUser[assignedUser.length] = _email;

    document.getElementById('assignedMemberToReview').value = JSON.stringify(assignedUser);

    document.getElementById('assignedResultReview').innerHTML = '';
    document.getElementById('assignedSearch').value = '';
    $('#participantDivMainDiv').append(text);
}

function removeAssignedUserToReview(element, _email){
    $(element).parent().remove();
    var index = assignedUser.indexOf(_email);
    assignedUser[index] = null;
}

function uploadReviewPics(input){

    if (input.files && input.files[0]) {
        var lastNumber = reviewPicNumber;
        var text = '<div id="reviewPic_' + reviewPicNumber + '" class="commentPhotosDiv commentPhotosAndVideos">\n' +
            '<img id="showPic' + reviewPicNumber + '" src="#" style="width: 100%; height: 100px;">\n' +
            '<input type="hidden" id="fileName_' + reviewPicNumber + '" >\n' +
            '<div class="deleteUploadPhotoComment" onclick="deleteUploadedReviewFile(' + reviewPicNumber + ')"></div>\n' +
            '<div class="editUploadPhotoComment" onclick="openEditReviewPic(' + reviewPicNumber + ')"></div>\n' +
            '<div class="progress">\n' +
            '<div id="progressBarReviewPic' + reviewPicNumber + '" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>\n' +
            '</div>\n' +
            '</div>';
        $('#reviewShowPics').append(text);

        var data = new FormData();

        data.append('pic', input.files[0]);
        data.append('code', userCode);


        var $progressBar = $('#progressBarReviewPic' + reviewPicNumber);

        $.ajax({
            type: 'post',
            url: reviewUploadPic,
            data: data,
            processData: false,
            contentType: false,
            xhr: function () {
                var xhr = new XMLHttpRequest();
                xhr.upload.onprogress = function (e) {
                    var percent = '0';
                    var percentage = '0%';

                    if (e.lengthComputable) {
                        percent = Math.round((e.loaded / e.total) * 100);
                        percentage = percent + '%';
                        $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                    }
                };

                return xhr;
            },
            success: function(response){

                if(response == 'nok2'){
                    alert('فرمت فایل باید jpeg و یا png باشد');
                }
                else{
                    try {
                        response = JSON.parse(response);
                        fileName = response[1];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var mainPic = e.target.result;
                            $('#showPic' + lastNumber).attr('src', mainPic);
                            document.getElementById('fileName_' + lastNumber).value = fileName;
                        };
                        reader.readAsDataURL(input.files[0]);

                    } catch (e) {

                    }
                }

                reviewPicNumber++;
            }
        });

    }
}

function uploadReviewVideo(input, _is360){

    var data = new FormData();
    data.append('video', input.files[0]);
    data.append('code', userCode);
    data.append('isVideo', 1);
    if(_is360 == 1)
        data.append('is360', 1);

    var lastNumber = reviewPicNumber;
    var text = '<div id="reviewPic_' + reviewPicNumber + '" class="commentPhotosDiv commentPhotosAndVideos">\n' +
        '<img id="showPic' + reviewPicNumber + '" src="#" style="width: 100%; height: 100px;">\n' +
        '<input type="hidden" id="fileName_' + reviewPicNumber + '" >\n' +
        '<div class="deleteUploadPhotoComment" onclick="deleteUploadedReviewFile(' + reviewPicNumber + ')"></div>\n' +
        '<div class="videoTimeDuration" id="videoDuration_' + reviewPicNumber + '"></div>\n' +
        '<div class="progress">\n' +
        '<div id="progressBarReviewPic' + reviewPicNumber + '" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>\n' +
        '</div>\n' +
        '</div>';
    $('#reviewShowPics').append(text);

    window.URL = window.URL || window.webkitURL;

    var files = input.files;
    var video = document.createElement('video');
    video.preload = 'metadata';
    video.onloadedmetadata = function() {
        window.URL.revokeObjectURL(video.src);
        var duration = video.duration;
        sec = Math.floor(duration);
        min = Math.floor(sec/60);
        sec = sec - (min * 60);
        document.getElementById('videoDuration_' + lastNumber).innerText = min + ':' + sec;
    }
    video.src = URL.createObjectURL(files[0]);

    var file = input.files[0];
    var fileReader = new FileReader();
    fileReader.onload = function() {
        var blob = new Blob([fileReader.result], {type: file.type});
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
                var img = document.getElementById('showPic' + lastNumber);
                img.src = image;
                URL.revokeObjectURL(url);
                data.append('videoPic', image);

                var $progressBar = $('#progressBarReviewPic' + reviewPicNumber);

                $.ajax({
                    type: 'post',
                    url: reviewUploadVideo,
                    data: data,
                    processData: false,
                    contentType: false,
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.onprogress = function (e) {
                            var percent = '0';
                            var percentage = '0%';

                            if (e.lengthComputable) {
                                percent = Math.round((e.loaded / e.total) * 100);
                                percentage = percent + '%';
                                $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                            }
                        };

                        return xhr;
                    },
                    success: function(response){
                        try {
                            response = JSON.parse(response);
                            fileName = response[1];
                            document.getElementById('fileName_' + lastNumber).value = fileName;

                        } catch (e) {

                        }
                        reviewPicNumber++;
                    }
                });
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
    fileReader.readAsArrayBuffer(file);
}

function radioChange(value, _questionId, _index, _ansId){
    if(reviewMultiAns[_index] != null)
        document.getElementById('radioAnsStyle_' + _questionId + '_' + reviewMultiAns[_index]).classList.remove('filterChoose');

    document.getElementById('radioAnsStyle_' + _questionId + '_' + _ansId).classList.add('filterChoose');

    if(reviewMultiAnsQuestionId.includes(_questionId)){
        var index = reviewMultiAnsQuestionId.indexOf(_questionId);
        reviewMultiAnsId[index] = _ansId;
    }
    else {
        reviewMultiAnsQuestionId[reviewMultiAnsQuestionId.length] = _questionId;
        reviewMultiAnsId[reviewMultiAnsId.length] = _ansId;
    }

    reviewMultiAns[_index] = _ansId;

    document.getElementById('multiQuestionInput').value = JSON.stringify(reviewMultiAnsQuestionId);
    document.getElementById('multiAnsInput').value = JSON.stringify(reviewMultiAnsId);
}

function deleteUploadedReviewFile(_number){
    var fileName =  document.getElementById('fileName_' + _number).value;

    $.ajax({
        type: 'post',
        url: deleteReviewPicUrl,
        data: {
            'name': fileName,
            'code': userCode
        },
        success: function(response){
            if(response == 'ok'){
                $('#reviewPic_' + _number).remove();
            }
            else{
                alert('problem')
            }
        }
    })
}

function openEditReviewPic(_number){

    $('#editReviewPictures').removeClass('hidden');

    var pic = $('#showPic' + _number).attr('src');
    $('#imgEditReviewPics').attr('src', pic);
    imgCropNumber = _number;
    startReviewCropper(1, _number);
}

function startReviewCropper(ratio, _number) {

    if(first) {

        'use strict';
        Cropper = window.Cropper;
        URL = window.URL || window.webkitURL;

        // container = document.querySelector('.img-container');
        download = document.getElementById('download');
        actions = document.getElementById('actions');
        dataX = document.getElementById('dataX');
        dataY = document.getElementById('dataY');
        dataHeight = document.getElementById('dataHeight');
        dataWidth = document.getElementById('dataWidth');
        dataRotate = document.getElementById('dataRotate');
        dataScaleX = document.getElementById('dataScaleX');
        dataScaleY = document.getElementById('dataScaleY');
    }
    else {
        cropper.destroy();
        inputImage.value = null;
    }
    // image = container.getElementsByTagName('img').item(0);
    image = document.getElementById('imgEditReviewPics');

    options = {
        preview: '.img-preview',
        ready: function (e) {
            console.log(e.type);
        },
        cropstart: function (e) {
            console.log(e.type, e.detail.action);
        },
        cropmove: function (e) {
            console.log(e.type, e.detail.action);
        },
        cropend: function (e) {
            console.log(e.type, e.detail.action);
        }
    };

    cropper = new Cropper(image, options);

    if(first) {
        originalImageURL = image.src;
        uploadedImageType = 'image/jpeg';
        uploadedImageName = 'cropped.jpg';
    }

    if(first) {

        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Buttons
        if (!document.createElement('canvas').getContext) {
            $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
        }

        if (typeof document.createElement('cropper').style.transition === 'undefined') {
            $('button[data-method="rotate"]').prop('disabled', true);
            $('button[data-method="scale"]').prop('disabled', true);
        }

        // Download
        if (typeof download.download === 'undefined') {
            download.className += ' disabled';
        }

        // Methods
        actions.querySelector('.docs-buttons').onclick = function (event) {
            e = event || window.event;
            target = e.target || e.srcElement;

            if (!cropper) {
                return;
            }

            while (target !== this) {
                if (target.getAttribute('data-method')) {
                    break;
                }

                target = target.parentNode;
            }

            if (target === this || target.disabled || target.className.indexOf('disabled') > -1) {
                return;
            }

            data = {
                method: target.getAttribute('data-method'),
                target: target.getAttribute('data-target'),
                option: target.getAttribute('data-option') || undefined,
                secondOption: target.getAttribute('data-second-option') || undefined
            };

            cropped = cropper.cropped;

            if (data.method) {
                if (typeof data.target !== 'undefined') {
                    input = document.querySelector(data.target);

                    if (!target.hasAttribute('data-option') && data.target && input) {
                        try {
                            data.option = JSON.parse(input.value);
                        } catch (e) {
                            console.log(e.message);
                        }
                    }
                }

                switch (data.method) {
                    case 'rotate':
                        if (cropped && options.viewMode > 0) {
                            cropper.clear();
                        }

                        break;

                    case 'getCroppedCanvas':
                        try {
                            data.option = JSON.parse(data.option);
                        } catch (e) {
                            console.log(e.message);
                        }

                        if (uploadedImageType === 'image/jpeg') {
                            if (!data.option) {
                                data.option = {};
                            }

                            data.option.fillColor = '#fff';
                        }

                        break;
                }

                result = cropper[data.method](data.option, data.secondOption);

                switch (data.method) {
                    case 'rotate':
                        if (cropped && options.viewMode > 0) {
                            cropper.crop();
                        }

                        break;

                    case 'scaleX':
                    case 'scaleY':
                        target.setAttribute('data-option', -data.option);
                        break;

                    case 'getCroppedCanvas':
                        if (result) {

                            // $("#editPane").addClass('hidden');
                            // $("#photoEditor").removeClass('hidden');
                        }

                        break;
                }

                if (typeof result === 'object' && result !== cropper && input) {
                    try {
                        input.value = JSON.stringify(result);
                    } catch (e) {
                        console.log(e.message);
                    }
                }
            }
        };

        document.body.onkeydown = function (event) {
            var e = event || window.event;

            if (!cropper || this.scrollTop > 300) {
                return;
            }

            switch (e.keyCode) {
                case 37:
                    e.preventDefault();
                    cropper.move(-1, 0);
                    break;

                case 38:
                    e.preventDefault();
                    cropper.move(0, -1);
                    break;

                case 39:
                    e.preventDefault();
                    cropper.move(1, 0);
                    break;

                case 40:
                    e.preventDefault();
                    cropper.move(0, 1);
                    break;
            }
        };
        first = false;
    }


    // Import image
    inputImage = document.getElementById('showPic' + _number);

    if (URL) {
        inputImage.onchange = function () {
            var files = this.files;
            var file;

            if (cropper && files && files.length) {
                file = files[0];

                if (/^image\/\w+/.test(file.type)) {
                    uploadedImageType = file.type;
                    uploadedImageName = file.name;

                    if (uploadedImageURL) {
                        URL.revokeObjectURL(uploadedImageURL);
                    }

                    image.src = uploadedImageURL = URL.createObjectURL(file);
                    cropper.destroy();
                    cropper = new Cropper(image, options);
                    inputImage.value = null;
                } else {
                    window.alert('Please choose an image file.');
                }
            }
        };
    } else {
        inputImage.disabled = true;
        inputImage.parentNode.className += ' disabled';
    }
}

function cropReviewImg(){
    var canvas1;
    var data = new FormData();
    var name = document.getElementById('fileName_' + imgCropNumber).value;

    data.append('code', userCode);
    data.append('name', name);

    canvas1 = cropper.getCroppedCanvas();

    $('#showPic' + imgCropNumber).attr('src', canvas1.toDataURL());

    $('#editReviewPictures').addClass('hidden');

    canvas1.toBlob(function (blob){
        data.append('pic', blob, name);

        $.ajax({
            type: 'post',
            url: doEditReviewPic,
            data: data,
            processData: false,
            contentType: false,
            success: function (response){
                console.log(response);
            }
        })
    });
}
