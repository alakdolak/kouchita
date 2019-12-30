var assignedUser = [];
var reviewPicNumber = 0;
var reviewMultiAns = [];
var reviewMultiAnsQuestionId = [];
var reviewMultiAnsId = [];

var firstTimeFilterShow = true;

var reviewRateAnsQuestionId = [];
var reviewRateAnsId = [];

var imgCropNumber;

var loadShowReview = false;

var reviewPerPage = 3;
var reviewPage = 1;

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

    $('.dark').show();
    $('.dark').removeClass('hidden');
    $("#photoEditor").removeClass('hidden');
}

function changeSiteSlidePic(_index){
    var photo = sitePics[_index];

    document.getElementById('mainSiteSliderPic').src = photo['s'];
}

function changePhotographerSlidePic(_index){
    var photo = photographerPics[_index];
    var likeDislike = '                                        <div class="photosFeedBackBtn">\n' +
                        '                                            <div class="col-xs-6 likeBox" onclick="likePhotographerPic(this, 1, ' + photo["id"] + ')">دوست داشتم' +
                        '                                               <span class="likeBoxIcon firstIcon"></span>' +
                        '                                               <span class="likeBoxIconClicked display-none secondIcon"></span>' +
                        '                                            </div>\n' +
                        '                                            <div class="col-xs-6 dislikeBox" onclick="likePhotographerPic(this, 0, ' + photo["id"] + ')">دوست نداشتم' +
                        '                                               <span class="dislikeBoxIcon firstIcon"></span>' +
                        '                                               <span class="dislikeBoxIconClicked display-none secondIcon"></span>' +
                        '                                            </div>\n' +
                        '                                            <div class="clear-both"></div>\n' +
                        '                                            <div class="feedbackStatistic">\n' +
                        '                                                <span>' + photo["like"] + '</span>\n' +
                        '                                                نفر دوست داشتند و\n' +
                        '                                                <span>' + photo["dislike"] + '</span>\n' +
                        '                                                نفر دوست نداشتند\n' +
                        '                                            </div>\n' +
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
            if (response == "ok")
                document.location.href = hotelDetails;
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
        aspectRatio: ratio,
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

function loadReviews(){
    $.ajax({
        type: 'post',
        url: getReviewsUrl,
        data:{
            'placeId' : placeId,
            'kindPlaceId' : kindPlaceId,
            'count' : reviewPerPage,
            'num' : reviewPage,
            'filters' : reviewFilters
        },
        success: function(response){
            if(response == 'nok1') {
                document.getElementById('showReviewsMain').innerHTML = ' ';
                console.log('نقدی ثبت نشده است');
            }
            else{
                response = JSON.parse(response);
                allReviews = response[0];
                reviewsCount = response[1];

                if(reviewsCount < 3 && firstTimeFilterShow) {
                    document.getElementById('postFilters').style.display = 'none';
                }
                firstTimeFilterShow = false;

                createReviewPagination(reviewsCount);
                showReviews(allReviews);
            }
        }
    })
}
loadReviews();

function showReviews(reviews){
    var text = '';

    for(let i = 0; i < reviews.length; i++){
        text += '<div id="review_' + reviews[i]["id"] + '" class="col-xs-12 postMainDivShown position-relative">\n' +
            '<div class="commentActions" onclick="showAnswersActionBox(this)">\n' +
            '<span class="commentActionsIcon"></span>\n' +
            '</div>\n' +
            '<div class="questionsActionsMoreDetails display-none">\n' +
            '<span>گزارش پست</span>\n' +
            '<span>مشاهده صفحه شازده سینا</span>\n' +
            '<span>مشاهده تمامی پست‌ها</span>\n' +
            '<span>صفحه قوانین و مقررات</span>\n' +
            '</div>\n' +
            '<div class="commentWriterDetailsShow">\n' +
            '<div class="circleBase type2 commentWriterPicShow">' +
            '<img src="' + reviews[i]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">' +
            '</div>\n' +
            '<div class="commentWriterExperienceDetails">\n' +
            '<b class="userProfileName">' + reviews[i]["usernameReviewWriter"] + '</b>\n' +
            '<div class="display-inline-block">در\n' +
            '<span class="commentWriterExperiencePlace">' + reviews[i]["place"]["name"] + '، شهر ' + reviews[i]["city"]["name"] + '، استان ' + reviews[i]["state"]["name"] + '</span>\n' +
            '</div>\n';

        if(reviews[i]["assigned"].length != 0) {
            text += '<div>با\n';
            for(j = 0; j < reviews[i]["assigned"].length; j++) {
                if(reviews[i]["assigned"][j]["name"])
                    text += '<span class="commentWriterExperienceParticipation">' + reviews[i]["assigned"][j]["name"] + '</span>،\n';
            }
            text += '</div>\n';
        }

        text += '<div>' + reviews[i]["timeAgo"] + '</div>\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="commentContentsShow">\n' +
            '<div style="font-size: 18px; margin: 25px">' + reviews[i]["text"] + '</div>\n' +
            '</div>\n';

        text += '<div class="commentPhotosShow">\n';

        let reviewPicsCount = reviews[i]["pics"].length;

        if(reviewPicsCount > 5) {
            text += '<div class="commentPhotosMainDiv quintupletPhotoDiv">\n' +
                '<div class="photosCol secondCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '<div class="photosCol firstCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][3]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">\n' +
                '<img src="' + reviews[i]["pics"][4]["url"] + '" class="mainReviewPic">\n'+
                '<div class="morePhotoLinkPosts">\n' +
                'به علاوه\n' +
                '<span>' + (reviewPicsCount - 4) + '</span>\n' +
                'عکس و ویدیو دیگر\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n';
        }
        else if(reviewPicsCount == 5){
            text += '<div class="commentPhotosMainDiv quintupletPhotoDiv">\n' +
                '<div class="photosCol secondCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '<div class="photosCol firstCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][3]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][4]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '</div>\n';
        }
        else if(reviewPicsCount == 4){
            text += '<div class="commentPhotosMainDiv quadruplePhotoDiv">\n' +
                '<div class="photosCol secondCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '<div class="photosCol firstCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][3]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '</div>\n';
        }
        else if(reviewPicsCount == 3){
            text += '<div class="commentPhotosMainDiv tripletPhotoDiv">\n' +
                '<div class="photosCol secondCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '<div class="photosCol firstCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '</div>\n';
        }
        else if(reviewPicsCount == 2){
            text += '<div class="commentPhotosMainDiv doublePhotoDiv">\n' +
                '<div class="photosCol secondCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '<div class="photosCol firstCol col-xs-6">\n' +
                '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '</div>\n';
        }
        else if(reviewPicsCount == 1){
            text += '<div class="commentPhotosMainDiv doublePhotoDiv">\n' +
                '<div class="photosCol firstCol col-xs-12">\n' +
                '<div class="topMainReviewPic"  onclick="showReviewPics(' + i + ')">' +
                '<img src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic">\n'+
                '</div>\n' +
                '</div>\n' +
                '</div>\n';
        }


        text +='<div class="quantityOfLikes">\n' +
            '<span>' + reviews[i]["like"] + '</span>\n' +
            'نفر دوست داشتند،\n' +
            '<span>' + reviews[i]["dislike"] + '</span>\n' +
            'نفر دوست نداشتند و\n' +
            '<span>' + reviews[i]["comment"].length + '</span>\n' +
            'نفر نظر دادند.\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="commentRatingsDetailsShow">\n' +
            '<div class="display-inline-block full-width">\n' +
            '<div class="commentRatingHeader">\n';

        text += 'بازدید ';

        if(reviews[i]["assigned"].length != 0)
        text +='<span> با دوستان</span>\n';

        text +='در فصل\n' +
            '<span>بهار</span>\n' +
            'و از مبدأ\n' +
            '<span>تهران</span>\n' +
            'انجام شده است\n' +
            '</div>\n';
        text +='<div class="commentRatingsDetailsBtn" onclick="showRatingDetails(this)">مشاهده جزئیات امتیازدهی\n' +
            '<div class="commentRatingsDetailsBtnIcon">\n' +
            '<i class="glyphicon glyphicon-triangle-bottom"></i>\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>\n';

        if(reviews[i]["ans"].length != 0) {
            text +='<div class="commentRatingsDetailsBox display-none">\n';

            //text ans
            for(j = 0; j < reviews[i]["ans"].length; j++){
                if(reviews[i]["ans"][j]['ansType'] == 'text'){
                    text += '<div class="display-inline-block full-width">\n';
                    text +='<b class="col-xs-6 font-size-15 line-height-203 float-right" style="float: right">' + reviews[i]["ans"][j]["description"] + '</b>\n';
                    text +='<b class="col-xs-6 font-size-15 line-height-203 float-right pd-lt-0">' + reviews[i]["ans"][j]["ans"] + '</b>\n';
                    text += '</div>\n';
                }
            }

            // multi ans
            for(j = 0; j < reviews[i]["ans"].length; j++){
                if(reviews[i]["ans"][j]['ansType'] == 'multi'){
                    text += '<div class="display-inline-block full-width">\n';
                    text +='<b class="col-xs-6 font-size-15 line-height-203 float-right" style="float: right">' + reviews[i]["ans"][j]["description"] + '</b>\n';
                    text +='<b class="col-xs-6 font-size-15 line-height-203 float-right pd-lt-0">' + reviews[i]["ans"][j]["ans"] + '</b>\n';
                    text += '</div>\n';
                }

            }

            // rate ans
            for(j = 0; j < reviews[i]["ans"].length; j++){
                if(reviews[i]["ans"][j]['ansType'] == 'rate'){
                    text += '<div class="display-inline-block full-width">\n';
                    text +='<b class="col-xs-4 font-size-15 line-height-203" style="float: right">' + reviews[i]["ans"][j]["description"] + '</b>\n';

                    if(reviews[i]["ans"][j]['ans'] == 5){
                        text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n';
                        text +='                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                            '                                                       <span class="starRatingGreen"></span>\n' +
                            '                                                       <span class="starRatingGreen"></span>\n' +
                            '                                                       <span class="starRatingGreen"></span>\n' +
                            '                                                       <span class="starRatingGreen"></span>\n' +
                            '                                                       <span class="starRatingGreen"></span>\n' +
                            '                                                   </div>\n' +
                            '                                               </div>\n';
                        text +='                                         <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">عالی بود</b>\n';
                    }
                    else if(reviews[i]["ans"][j]['ans'] == 4){
                        text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                            '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n';
                        text +='<b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">خوب بود</b>\n';
                    }
                    else if(reviews[i]["ans"][j]['ans'] == 3){
                        text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                            '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n';
                        text +='                                         <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">معمولی بود</b>\n';
                    }
                    else if(reviews[i]["ans"][j]['ans'] == 2){
                        text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                            '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n';
                        text +='<b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">بد نبود</b>\n';
                    }
                    else if(reviews[i]["ans"][j]['ans'] == 1){
                        text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                            '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                            '                                                    <span class="starRatingGreen"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                    <span class="starRating"></span>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n';
                        text +='<b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">اصلا راضی نبودم</b>\n';
                    }

                    text += '</div>\n';
                }
            }

            text += '</div>\n';
        }

        var likeColor = '#565656';
        var dislikeColor = '#565656';

        if(reviews[i]['userLike'] != null && reviews[i]['userLike']['like'] == 1)
            likeColor = 'red';
        else if(reviews[i]['userLike'] != null && reviews[i]['userLike']['like'] == -1)
            dislikeColor = 'darkred';


        text +='                                <div class="commentFeedbackChoices">\n' +
            '                                    <div class="postsActionsChoices col-xs-3">\n' +
            '                                        <div class="postLikeChoice display-inline-block" onclick="likeReview(' + reviews[i]["id"] + ', 1)" style="color: ' + likeColor + '">\n' +
            '                                            <span class="commentsLikeIconFeedback firstIcon"></span>\n' +
            '                                            <span class="commentsLikeClickedIconFeedback display-none secondIcon"></span>\n' +
            '                                            <span class="mg-rt-20 cursor-pointer">دوست داشتم</span>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="postsActionsChoices col-xs-3">\n' +
            '                                        <div class="postDislikeChoice display-inline-block" onclick="likeReview(' + reviews[i]["id"] + ', 0)" style="color: ' + dislikeColor + '">\n' +
            '                                            <span class="commentsDislikeIconFeedback firstIcon"></span>\n' +
            '                                            <span class="commentsDislikeClickedIconFeedback display-none secondIcon"></span>\n' +
            '                                            <span class="mg-rt-20 cursor-pointer">دوست نداشتم</span>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="postsActionsChoices col-xs-3">\n' +
            '                                        <div class="postCommentChoice display-inline-block" onclick="showPostsComments(this)">\n' +
            '                                            <span class="showCommentsIconFeedback firstIcon"></span>\n' +
            '                                            <span class="showCommentsClickedIconFeedback display-none secondIcon"></span>\n' +
            '                                            <span class="mg-rt-20 cursor-pointer">مشاهده نظرها</span>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="postsActionsChoices col-xs-3">\n' +
            '                                        <div class="postShareChoice display-inline-block" onclick="SharePostsBtn(this)">\n' +
            '                                            <span class="commentsShareIconFeedback firstIcon"></span>\n' +
            '                                            <span class="commentsShareClickedIconFeedback display-none secondIcon"></span>\n' +
            '                                            <span class="mg-rt-20 cursor-pointer">اشتراک‌گذاری</span>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '\n' +
            '                                <div class="commentsMainBox display-none">\n' +
            '                                    <div class="dark-blue mg-bt-10">\n' +
            '                                        <span class="cursor-pointer" onclick="showAllReviews(' + reviews[i]["id"] + ')">مشاهده ' + reviews[i]["comment"].length + ' نظر باقیمانده</span>\n' +
            '                                    </div>\n';

        var checkAllReviews = true;
        // ans
        for(j = 0; j < reviews[i]["comment"].length; j++){

            if(j > 0 && checkAllReviews){
                text += '<div id="allReviews_' + reviews[i]["id"] + '" style="display: none; width: 100%;">';
                checkAllReviews = false;
            }
                text +='                             <div class="eachCommentMainBox">\n' +
                '                                        <div class="circleBase type2 commentsWriterProfilePic">' +
                '                                             <img src="' + reviews[i]["comment"][j]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '                                        </div>\n' +
                '                                        <div class="commentsContentMainBox">\n' +
                '                                            <b class="userProfileName display-inline-block">' + reviews[i]["comment"][j]["username"] + '</b>\n' +
                '                                            <p>' + reviews[i]["comment"][j]["text"] + '</p>\n' +
                '                                            <div class="commentsStatisticsBar">\n' +
                '                                                <div class="float-right display-inline-black">\n' +
                '                                                    <span class="likeStatisticIcon commentsStatisticSpan color-red">' + reviews[i]["comment"][j]["like"] + '</span>\n' +
                '                                                    <span class="dislikeStatisticIcon commentsStatisticSpan dark-red">' + reviews[i]["comment"][j]["dislike"] + '</span>\n' +
                '                                                    <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">' + reviews[i]["comment"][j]["comment"].length + '</span>\n' +
                '                                                </div>\n';
                if(reviews[i]["comment"][j]["comment"].length > 0)
                    text += '<div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers2(' + reviews[i]["comment"][j]["id"] + ', this)">دیدن پاسخ‌ها</div>\n';

                text += '                                    </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="commentsActionsBtns">\n' +
                '                                            <div onclick="likeReview(' + reviews[i]["comment"][j]["id"] + ', 1); likeTheAnswers2(this)">\n' +
                '                                                <span class="likeActionBtn"></span>\n' +
                '                                                <span class="likeActionClickedBtn display-none"></span>\n' +
                '                                            </div>\n' +
                '                                            <div onclick="likeReview(' + reviews[i]["comment"][j]["id"] + ', 0); dislikeTheAnswers2(this)">\n' +
                '                                                <span class="dislikeActionBtn"></span>\n' +
                '                                                <span class="dislikeActionClickedBtn display-none"></span>\n' +
                '                                            </div>\n' +
                '                                            <div class="clear-both"></div>\n' +
                '                                            <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>\n' +
                '                                        </div>\n' +
                '                                        <div class="replyToCommentMainDiv display-none">\n' +
                '                                            <div class="circleBase type2 newCommentWriterProfilePic">' +
                    '                                             <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '</div>\n' +
                '                                            <div class="inputBox">\n' +
                '                                                <b class="replyCommentTitle">در پاسخ به نظر ' + reviews[i]["comment"][j]["username"] + '</b>\n' +
                '                                                <textarea id="ansForReviews_' + reviews[i]["comment"][j]["id"] + '" class="inputBoxInput inputBoxInputComment" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>\n' +
                '                                                <button class="btn btn-primary" onclick="sendAnsOfReviews(' + reviews[i]["comment"][j]["id"] + ',1)"> ارسال</button>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n';

                text += createAnsToComment(reviews[i]["comment"][j]["comment"], reviews[i]["comment"][j]["username"], reviews[i]["comment"][j]["id"]);

                if(j == reviews[i]["comment"].length && !checkAllReviews)
                    text += '</div>';
            }

        text += '</div></div>\n';

        // new ans
        text +='                                <div class="newCommentPlaceMainDiv">\n' +
            '                                    <div class="circleBase type2 newCommentWriterProfilePic">' +
            '                                             <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
            '</div>\n' +
            '                                    <div class="inputBox">\n' +
            '                                        <b class="replyCommentTitle">در پاسخ به نظر ' + reviews[i]["usernameReviewWriter"] + '</b>\n' +
            '                                        <textarea class="inputBoxInput inputBoxInputComment" id="ansForReviews_' + reviews[i]["id"] + '" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>\n' +
            '                                        <button class="btn btn-primary" onclick="sendAnsOfReviews(' + reviews[i]["id"] + ', 0)"> ارسال</button>\n' +
            '                                    </div>\n' +
            '                                    <div></div>\n' +
            '                                </div>\n' +
            '                            </div></div>\n';

    }

    document.getElementById('showReviewsMain').innerHTML = text;

}

function likeReview(_logId, _like){

    if(!checkLogin())
        return;

    $.ajax({
        type: 'post',
        url: likeReviewUrl,
        data:{
            'logId' : _logId,
            'like' : _like
        },
        success: function(response){
            if(response == 'ok')
                alert('نظر شما با موفقیت ثبت شد.')
        }
    })
}

function sendAnsOfReviews(_logId, _ans){

    if(!checkLogin())
        return;

    var text = document.getElementById('ansForReviews_' + _logId).value;
    if(text != null && text != ''){
        $.ajax({
            type: 'post',
            url: ansToReviewUrl,
            data: {
                'logId' : _logId,
                'text'  : text,
                'ansAns' : _ans
            },
            success: function(response){
                if(response == 'ok')
                    window.location.reload();
            }
        })
    }

}

function showCommentsAnswers2(_id, element){
    $('.ansComment_' + _id).toggleClass("display-inline-blockImp");
    $(element).text($(element).text() == 'دیدن پاسخ‌ها' ? 'بستن پاسخ‌ها' : 'دیدن پاسخ‌ها');
}

function createAnsToComment(comment, repTo, topId){
    var text = '';

    for(var k = 0; k < comment.length; k++) {

        text += '<div class=" display-none ansComment_' + topId + '" style="width: 100%;">' +
            '<div class="eachCommentMainBox mg-rt-45">\n' +
            '                                        <div class="circleBase type2 commentsWriterProfilePic">' +
            '                                             <img src="' + comment[k]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
            '                                        </div>\n' +
            '                                        <div class="commentsContentMainBox">\n' +
            '                                            <b class="userProfileName float-right">' + comment[k]["username"] + '</b>\n' +
            '                                            <b class="commentReplyDesc display-inline-block">در پاسخ به ' + repTo + '</b>\n' +
            '                                            <div class="clear-both"></div>\n' +
            '                                            <p>' + comment[k]["text"] + '</p>\n' +
            '                                            <div class="commentsStatisticsBar">\n' +
            '                                                <div class="float-right display-inline-black">\n' +
            '                                                    <span class="likeStatisticIcon commentsStatisticSpan color-red">' + comment[k]["like"] + '</span>\n' +
            '                                                    <span class="dislikeStatisticIcon commentsStatisticSpan dark-red">' + comment[k]["dislike"] + '</span>\n' +
            '                                                    <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">' + comment[k]["comment"].length + '</span>\n' +
            '                                                </div>\n';

            if(comment[k]["comment"].length > 0)
                text += '<div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers2(' + comment[k]["id"] + ', this)">دیدن پاسخ‌ها</div>\n';

            text +='                                            </div>\n' +
            '                                        </div>\n' +
            '                                        <div class="commentsActionsBtns">\n' +
            '                                            <div onclick="likeReview(' + comment[k]["id"] + ', 1); likeTheAnswers2(this)">\n' +
            '                                                <span class="likeActionBtn"></span>\n' +
            '                                                <span class="likeActionClickedBtn display-none"></span>\n' +
            '                                            </div>\n' +
            '                                            <div onclick="likeReview(' + comment[k]["id"] + ', 0); dislikeTheAnswers2(this)">\n' +
            '                                                <span class="dislikeActionBtn"></span>\n' +
            '                                                <span class="dislikeActionClickedBtn display-none"></span>\n' +
            '                                            </div>\n' +
            '                                            <div class="clear-both"></div>\n' +
            '                                            <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>\n' +
            '                                        </div>\n' +
            '                                        <div class="replyToCommentMainDiv display-none">\n' +
            '                                            <div class="circleBase type2 newCommentWriterProfilePic">' +
            '                                                <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
            '                                            </div>\n' +
            '                                            <div class="inputBox">\n' +
            '                                                <b class="replyCommentTitle">در پاسخ به نظر ' + comment[k]["username"] + '</b>\n' +
            '                                                <textarea  id="ansForReviews_' + comment[k]["id"] + '" class="inputBoxInput inputBoxInputComment" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>\n' +
            '                                                <button class="btn btn-primary" onclick="sendAnsOfReviews(' + comment[k]["id"] + ', 1)"> ارسال</button>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                    </div>\n';

            if(comment[k]["comment"].length > 0) {
                text += createAnsToComment(comment[k]["comment"], comment[k]["username"], comment[k]["id"]);
            }

            text += '</div>';
    }

    return text;
}

function showReviewPics(_index){
    $('#showingReviewPicsModal').modal('show');

    var photo = allReviews[_index]['pics'];

    document.getElementById('showingReviewPhotosUserPic').src = allReviews[_index]['userPic'];
    document.getElementById('showingReviewPhotosUserName').innerText = allReviews[_index]['usernameReviewWriter'];


    if(photo[0] && photo[0]['isVideo'] == 0)
        document.getElementById('showingReviewPhotosMainPic').innerHTML = '<img src="' + photo[0]['url'] + '" style="max-width: 100%; max-height: 100%;">\n';
    else{
        document.getElementById('showingReviewPhotosMainPic').innerHTML = '<video controls style="width: 100%; height: 100%;">\n' +
            '  <source src="' + photo[0]['videoUrl'] + '">\n' +
            '  Your browser does not support the video tag.\n' +
            '</video>';
    }
    var text = '';

    for(var i = 0; i < photo.length; i++) {
        text += '<div class="rightColPhotosShowingModal" onclick="changeReviewSlidePic(' + _index + ', ' + i + ')">\n' +
                '<img src="' + photo[i]['url'] + '" style="width: 100%; height: 100%;">\n' +
                '</div>';

    }

    document.getElementById('showingReviewPhotosRightCol').innerHTML = text;

}

function changeReviewSlidePic(_mainIndex, _picIndex){
    var pic = allReviews[_mainIndex]['pics'][_picIndex];

    if(pic['isVideo'] == 0)
        document.getElementById('showingReviewPhotosMainPic').innerHTML = '<img src="' + pic['url'] + '" style="max-width: 100%; max-height: 100%;">\n';
    else
        document.getElementById('showingReviewPhotosMainPic').innerHTML = '<video controls style="width: 100%; height: 100%;">\n' +
            '  <source src="' + pic['videoUrl'] + '">\n' +
            '  Your browser does not support the video tag.\n' +
            '</video>';

}

function showAllReviews(_id){
    $('#allReviews_' + _id).toggle();
}

function changePerPage(_count){

    document.getElementById('perView' + reviewPerPage).classList.remove('color-blue');
    document.getElementById('perView' + _count).classList.add('color-blue');
    reviewPerPage = _count;
    loadReviews();
}

function changeReviewPage(_page){
    reviewPage = _page;
    loadReviews();
}

function createReviewPagination(reviewsCount){
    var text = '';
    var page = Math.round(reviewsCount/reviewPerPage);

    if(page > 0)
        document.getElementById('reviewsPagination').style.display = 'block';
    else
        document.getElementById('reviewsPagination').style.display = 'none';


    if(page >= 5){
        if(reviewPage == 1){
            text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(2)" style="float: right">2</span>';
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(3)" style="float: right">3</span>';
            text += '<span style="float: right"> >>> </span>';
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
        }
        else if(reviewPage == 2){
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
            text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(2)" style="float: right">2</span>';
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(3)" style="float: right">3</span>';
            text += '<span style="float: right"> >>> </span>';
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
        }
        else if(reviewPage == 3){
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(2)" style="float: right">2</span>';
            text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(3)" style="float: right">3</span>';
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(4)" style="float: right">4</span>';
            if(page == 5)
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(5)" style="float: right">5</span>';
            else {
                text += '<span style="float: right"> >>> </span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
            }
        }
        else{
            text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
            text += '<span style="float: right"> <<< </span>';

            if(reviewPage == page){
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage-2) + ')" style="float: right">' + (reviewPage-2) + '</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage-1) + ')" style="float: right">' + (reviewPage-1) + '</span>';
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(' + (reviewPage) + ')" style="float: right">' + (reviewPage) + '</span>';
            }
            else{
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage-1) + ')" style="float: right">' + (reviewPage-1) + '</span>';
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(' + (reviewPage) + ')" style="float: right">' + (reviewPage) + '</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage+1) + ')" style="float: right">' + (reviewPage+1) + '</span>';
                if((page - reviewPage) == 2)
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage+2) + ')" style="float: right">' + (reviewPage+2) + '</span>';
            }

            if((page - reviewPage) >= 3){
                text += '<span style="float: right"> >>> </span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
            }


        }
    }
    else{
        for (var i = 1; i <= page; i++){
            if(i == reviewPage)
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(' + i + ')" style="float: right">' + i + '</span>';
            else
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + i + ')" style="float: right">' + i + '</span>';
        }
    }

    document.getElementById('reviewPagination').innerHTML = text;
}


var swiper = new Swiper('#mainSlider', {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        prevEl: '.swiper-button-next',
        nextEl: '.swiper-button-prev',
    },
});


window.addEventListener('scroll', function() {

    var doc = document.documentElement;
    var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
    var showReviewElement = document.getElementById('mainDivPlacePost');

    if(!loadShowReview) {
        if (top > showReviewElement.offsetTop - 20) {
            loadShowReview = true;
            // loadReviews();
        }
    }
});

