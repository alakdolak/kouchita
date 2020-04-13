<link rel="stylesheet" href="{{URL::asset('css/theme2/cropper.css')}}">
<link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/shazdeDesigns/editor.css')}}'/>
<link rel="stylesheet" href="{{URL::asset('css/theme2/media_uploader.css')}}">
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}' />

<!--[if lt IE 9]>
<div class="alert alert-warning alert-dismissible fade show m-0 rounded-0" role="alert">
    You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<![endif]-->

{{--<div class="darkModalEditor">--}}
<span id="editPane" class="ui_overlay ui_modal photoUploadOverlay hidden">
    <div class="body_text photoUploader">
         <div class="headerBar">
             <h3 id="photoUploadHeader" class="photoUploadHeader">
                 <span>افزودن تصویر به </span>
                 <span class="titleOfUploadPhoto"></span>
             </h3>
         </div>
        <div class="bodyEditFrame">
           <div class="row">
              <div class="col-md-12">
                 <div class="img-container img-container-photogrpher" style="position: relative">
                    <img class="imgInEditor" id="editUploadPhoto" alt="Picture" style="width: 100%;">
                 </div>
              </div>
           </div>
           <div class="row" id="actions" style="">
                    <div class="col-md-12 docs-buttons">

                        <div class="editBtnsGroup">
                            <div class="editBtns">
                               <div class="flipVertical" data-toggle="tooltip" data-placement="top" title="Flip Horizontal" onclick="rotateUploadPhoto('Y')"></div>
                            </div>
                            <div class="editBtns">
                               <div class="flipHorizontal" data-toggle="tooltip" data-placement="top" title="Flip Vertical" onclick="rotateUploadPhoto('X')"></div>
                            </div>
                        </div>

                        <div class="editBtnsGroup">
                            <div class="editBtns">
                               <div class="rotateLeft" data-toggle="tooltip" data-placement="top" title="چرخش 45 درجه ای به سمت چپ" onclick="cropper.rotate(-45)"></div>
                            </div>
                            <div class="editBtns">
                               <div class="rotateRight" data-toggle="tooltip" data-placement="top" title="چرخش 45 درجه ای به سمت راست" onclick="cropper.rotate(45)"></div>
                            </div>
                        </div>

                        <div class="editBtnsGroup">
                            <div class="editBtns">
                               <div class="cropping" data-toggle="tooltip" data-placement="top" title="برش" onclick="cropper.crop()"></div>
                            </div>
                            <div class="editBtns">
                                <div class="clearing" data-toggle="tooltip" data-placement="top" title="بازگشت به اول" onclick="cropper.clear()"></div>
                            </div>
                        </div>

                        <div class="btnActionEditFrame">
                            <div class="upload">
                                <div onclick="cropImg()" class="uploadBtn ui_button primary">تایید</div>
                            </div>

                            <div class="return">
                                <div onclick="cancelCrop()" class="returnBtnEditPhoto">بازگشت</div>
                            </div>
                        </div>
                    {{--<div class="btn-group btn-group-crop">--}}
                    {{--<button id="saveBtn" type="button" onclick="successBtnClicked(this)" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 466, &quot;height&quot;: 367 }">--}}
                    {{--<span class="docs-tooltip" data-toggle="tooltip" id="saveBtnSpan" title="cropper.getCroppedCanvas({ width: 466, height: 367 })">--}}
                    {{--ذخیره--}}
                    {{--</span>--}}
                    {{--</button>--}}

                    {{--<button id="saveBtn2" type="button" onclick="successBtnClicked(this)" class="btn btn-success hidden" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 100, &quot;height&quot;: 100 }">--}}
                    {{--<span class="docs-tooltip" data-toggle="tooltip" id="saveBtnSpan" title="cropper.getCroppedCanvas({ width: 100, height: 100 })">--}}
                    {{--ذخیره--}}
                    {{--</span>--}}
                    {{--</button>--}}
                    {{--</div>--}}

                    <!-- Show the cropped image in modal -->
                        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                       <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                             <div class="modal-body"></div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                             </div>
                          </div>
                       </div>
                    </div><!-- /.modal -->

                 </div><!-- /.docs-buttons -->
               </div>
       </div>
    </div>
    <div class="ui_close_x" onclick="$('#editPane').addClass('hidden'); $('#darkModeMainPage').hide()"></div>
</span>

<input id="uploadPhotoInputPic" type="file" style="display: none;">

<span id="photoEditor" class="ui_overlay ui_modal photoUploadOverlay hidden">
     <div class="body_text">
         <div class="photoUploader">
             <div class="headerBar">
                 <h3 id="photoUploadHeader" class="photoUploadHeader">
                     <span>افزودن تصویر به </span>
                     <span class="titleOfUploadPhoto"></span>
                 </h3>
             </div>
             <div id="uploader-dlg" class="uploaderDlg hasFiles">
                 <div id="dropArea" class="startScreen infoScreen">
                     <div class="inner">
                         <div class="innerPic"></div>
                         <div style="height: 185px; position: relative;">
                             <label for="uploadPhotoInputPic" class="choosePic">
                                 <div class="ui_button primary addPhotoBtn">
                                     <span>عکس خود را انتخاب کنید</span>
                                 </div>
                             </label>
                         </div>

                         <div class="separator">
                             <span class="text">یا</span>
                         </div>
                         <div class="dragDropText">به سادگی عکس خود را در این قاب بی اندازید</div>

                         <div class="invalidDragScreen infoScreen hidden">
                             <div class="inner">
                                 <div class="dropText">That image type is not supported. Please use a jpeg or png.</div>
                             </div>
                             <div class="dropOverlay"></div>
                         </div>

                         <div id="photographerLoadingPic" class="progressScreen infoScreen hidden">
                             <div class="inner">
                                 <img src="{{URL::asset('images/loading.gif')}}">
                             </div>
                         </div>

                     </div>
                     <div class="footerTextBox stFooter">
                         <span>توجه نمایید که عکس‌ما می‌بایست در فرمت های رایج تصویر و با حداکثر سایز 500 مگابایت باشد. تصاویر پیش از انتشار توسط ما بازبینی می‌گردد. لطفاً از بارگزاری تصاویری که با قوانین سایت مغایرت دارند اجتناب کنید.</span>
                         <span class="footerPolicyLink">صفحه مقررات</span>
                     </div>
                 </div>
                 <div class="template itemRow loading">
                     <div class="row">
                         <div class="col-xs-7">
                             <div>
                                 <div class="epPicBox">
                                     <div class="epPic">
                                         <div class="imgContainer">
                                             <img id="rectanglePicUploadPhoto">
                                         </div>
                                     </div>
                                     <div class="step6picText epicText">قاب مستطیل</div>
                                     <div class="epEditPicText" onclick="doEdit(213 / 168, 'rectanglePicUploadPhoto');" style="cursor: pointer;">ویرایش</div>
                                 </div>
                                 <div class="epPicBox">
                                     <div class="epPic">
                                         <div class="imgContainer">
                                             <img id="squarePicUploadPhoto">
                                         </div>
                                     </div>
                                     <div class="epPicText">قاب مربع</div>
                                     <div class="epEditPicText" onclick="doEdit(1, 'squarePicUploadPhoto');" style="cursor: pointer;">ویرایش</div>
                                 </div>
                             </div>
                             <div class="photoTemplateTypeDesc">عکس‌های ما در دو نوع قاب مختلف نمایش داده می‌شود می‌توانید خود نسبت به برش نمایش مناسب عکس در داخل قاب اقدام نمایید در غیر اینصورت تصویر به صورت اتوماتیک برش می‌خورد</div>

                             <div class="imageVerificationBtn">
                                     <button onclick="newUploadPic()">
                                         تغییر عکس
                                     </button>
                            </div>

                         </div>
                         <div class="col-xs-5">

                             <div id="uploadPhotoPicAltDiv" class="epInputBox">
                                <div class="epInputBoxText">
                                    <div class="epInputBoxRequired"><div class="icons epInputIconRequired redStar"></div>عکس برای:</div>
                                </div>
                                <input class="epInputBoxInput" id="placeNameUploadPhoto" onclick="searchPlaceForUploadPhoto()" readonly>
                                <input type="hidden" class="epInputBoxInput" id="placeIdUploadPhoto">
                                <input type="hidden" class="epInputBoxInput" id="kindPlaceIdUploadPhoto" >
                            </div>

                            <div id="uploadPhotoPicNameDiv" class="epInputBox">
                                <div class="epInputBoxText">
                                    <div class="epInputBoxRequired"><div class="icons epInputIconRequired redStar"></div>نام عکس</div>
                                </div>
                                <input class="epInputBoxInput" id="uploadPhotoPicName" onkeydown="document.getElementById('uploadPhotoPicNameDiv').classList.remove('errorField')">
                            </div>
                            <div id="uploadPhotoPicAltDiv" class="epInputBox">
                                <div class="epInputBoxText">
                                    <div class="epInputBoxRequired"><div class="icons epInputIconRequired redStar"></div>نام جایگزین</div>
                                </div>
                                <input class="epInputBoxInput" id="uploadPhotoPicAlt" onkeydown="document.getElementById('uploadPhotoPicAltDiv').classList.remove('errorField')">
                            </div>
                            <div class="epRedNotice">نام جایگزین توصیف کننده موضوعی است که از تصویر استنباط می شود</div>

                            <div>
                               <div class="epTitle">توضیحات</div>
                               <textarea class="epAddresText" placeholder="توضیحات همراه با عکس برای دوستانتان نمایش داده می شود.           حداقل 100 کاراکتر" maxlength="100" id="uploadPhotoDescription"></textarea>
                            </div>

                             <div id="photographerErrors" style="color: red;"></div>


                             {{--<form class="photoForm roomType">--}}
                             {{--<div class="field category">--}}
                             {{--<div class="formFieldTitle text-align-center">دسته <span>(الزامی)</span></div>--}}
                             {{--<div id="photoTags" class="column first"></div>--}}
                             {{--</div>--}}
                             {{--<div class="field description">--}}
                             {{--<div class="maxChars"><span>توضیحات</span><span>(اختیاری)</span></div>--}}
                             {{--<input type="text" id="description" placeholder="حداکثر 100 کاراکتر" maxlength="100" onkeypress="return event.keyCode != 13;">--}}
                             {{--</div>--}}
                             {{--</form>--}}
                         </div>
                         <div class="col-xs-12 footer secondStepFooter">

                             <div class="termsLabel">
                                 <div>
                                     <div class="secondStepPolicyCheckBox">
                                         <input id="uploadPhotoRole" type="checkbox">
                                         <label for="uploadPhotoRole">
                                             <span></span>
                                         </label>
                                     </div>
                                     <div class="secondStepPolicyText">
                                         تایید میکنم تمامی حقوق مرتبط با انتشار این تصویر متعلق به من می باشد. تایید می نمایم در صورت حضور چهره دیگران در تصویر، آن ها نیز از انتشار این عکس راضی می باشند.
                                         <div id="photoUploadTipsLink" class="headerLink tipsLink" style="display: inline-block">
                                             <span onclick="$('#guidelinesOverlay').removeClass('hidden')">صفحه مقررات</span>
                                             <span id="guidelinesOverlay" class="hidden ui_overlay ui_popover arrow_top guidelinesOverlayParent ui_tooltip">
                                                 <div class="header_text"></div>
                                                 <div class="body_text">
                                                     <div class="guidelinesOverlay">
                                                         <div class="listHdr">All photos must be...</div>
                                                         <ul class="listBody">
                                                             <li>Family-friendly</li>
                                                             <li>Original, non-copyrighted images</li>
                                                             <li>Non-commercial</li>
                                                             <li>Virus-free</li>
                                                             <li>In
                                                                <b>.gif</b>,
                                                                <b>.jpg</b>, or
                                                                <b>.png</b> format</li>
                                                             <li>No more than 50 photos per upload</li>
                                                         </ul>
                                                         <div class="listFtr">Read our complete <a href="https://www.tripadvisorsupport.com/hc/en-us/articles/200615067-Photo-Guidelines" target="_blank" class="js_popFraud">photo submission guidelines</a>.</div>
                                                     </div>
                                                 </div>
                                                 <div class="ui_close_x" onclick="$('#guidelinesOverlay').addClass('hidden')"></div>
                                             </span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="upload secondFooterVerification">
                                 <div onclick="resizeImg()" class="uploadBtn ui_button primary">تایید</div>
                                 {{--<div onclick="goToPage3()" class="uploadBtn ui_button primary">1111</div>--}}
                             </div>
                         </div>
                     </div>
                     {{--<div onclick="back()" class="removeBtn action ui_close_x"></div>--}}
                 </div>
                 <div class="successScreen hidden">
                     <div class="successTextBox">
                        <div class="successText">موفق شدید</div>
                        <div class="successTextDes">عکس شما برای ما ارسال گردید و پس از بررسی بارگزاری خواهد شد</div>
                     </div>
                     <div class="uploadNextPicBtnBox">

                         <label for="uploadPhotoInputPic" style="width: 250px;">
                             <div class="uploadNextPicBtn ui_button primary">بارگزاری عکس بعدی</div>
                         </label>

                         <div class="uploadNextPicDeny" onclick="closePhotoModal()">نه، برای بعد</div>

                     </div>
                     <div id="uploadedImgDiv" class="uploadedImgDiv"></div>
                     <div class="footerTextBox" style="position: absolute; bottom: 0">
                         <span>پس از تایید عکس امتیاز شما در پروفایل افزایش خواهد یافت. به گزاشتن عکس ادامه دهید تا علاوه بر امتیاز بتوانید نشان های افتخار مخصوص عکس را برنده شوید.</span>
                         <span class="footerPolicyLink" onclick="">صفحه مقررات</span>
                     </div>

                 </div>
             </div>
         </div>
     </div>

     <div class="ui_close_x" onclick="$('#photoEditor').addClass('hidden'); $('#darkModeMainPage').hide()"></div>
    <img src="" id="mainPicUploadPhotoImg" style="display: none">
</span>
{{--</div>--}}

<script src="{{URL::asset('js/cropper.js')}}"></script>

<script src="{{URL::asset('js/mainCrop.js')}}"></script>

<script>
    var file;
    var uploadPhotoUrl;
    var crop1Clicked = false;
    var crop2Clicked = false;
    var cropResult;
    var mainPicUploadPhoto;
    var uploadPhotoFormData = new FormData();
    var dropzone = $('#dropArea');
    var userId = '{{auth()->user()->id}}';
    var additionalData;
    var lImage;
    var tImage;
    var sImage;
    var fImage;
    var mainImage;
    var mainFileName = null;
    var mainFilesUploaded = [];

    //drag and drop file
    dropzone.on('dragover', function() {
        dropzone.addClass('hover');
        return false;
    });
    dropzone.on('dragleave', function() {
        dropzone.removeClass('hover');
        return false;
    });
    dropzone.on('drop', function(e) {
        e.stopPropagation();
        e.preventDefault();
        dropzone.removeClass('hover');
        var files = e.originalEvent.dataTransfer.files;
        submitPhoto(files[0]);
        return false;
    });

    // input file
    $(document).ready(function() {
        $("#uploadPhotoInputPic").change(function() {
            submitPhoto(this.files[0]);
        });
    });
    

    function submitPhoto(input) {

        $('#uploadPhotoPicName').val('');
        $('#uploadPhotoPicAlt').val('');
        $('#uploadPhotoDescription').val('');
        $(".successScreen").addClass('hidden');

        var reader = new FileReader();
        reader.onload = function(e) {
            $('#rectanglePicUploadPhoto').attr('src', e.target.result);
            $('#squarePicUploadPhoto').attr('src', e.target.result);
            $('#mainPicUploadPhotoImg').attr('src', e.target.result);
            mainPicUploadPhoto = e.target.result;
        };
        $(".itemRow").css('display', 'block');
        $(".startScreen").addClass('hidden');
        $(".action").css('display', 'block');
        $(".footer").removeClass('hidden');
        reader.readAsDataURL(input);

    }

    function doEdit(ratio, result) {
        cropResult = result;
        if(ratio != 1) {
            $('#editUploadPhoto').attr('src', mainPicUploadPhoto);
            setMode(1);
            crop1Clicked = true;
            $("#saveBtn").removeClass('hidden');
            $("#saveBtn2").addClass('hidden');
            $('#frameEditorHeader').text('(قاب مستطیل)')
        }
        else {
            $('#editUploadPhoto').attr('src', mainPicUploadPhoto);
            setMode(2);
            crop2Clicked = true;
            $("#saveBtn").addClass('hidden');
            $("#saveBtn2").removeClass('hidden');
            $('#frameEditorHeader').text('(قاب مربع)')
        }
        startCropper(ratio);
        $('#photoEditor').addClass('hidden');
        $('#editPane').removeClass('hidden');
    }

    var placeIdUploadPhoto;
    var kindPlaceIdUploadPhoto;

    function resizeImg(){
        var name = document.getElementById('uploadPhotoPicName').value;
        var alt = document.getElementById('uploadPhotoPicAlt').value;
        var description = document.getElementById('uploadPhotoDescription').value;

        placeIdUploadPhoto = $('#placeIdUploadPhoto').val();
        kindPlaceIdUploadPhoto = $('#kindPlaceIdUploadPhoto').val();

        if($('#uploadPhotoRole').is(":checked") && name.trim().length > 0 && alt.trim().length > 0 && description.trim().length <= 100 && kindPlaceIdUploadPhoto != 0 && placeIdUploadPhoto != 0) {

            $("#fullPageLoader").css('display', 'flex');

            uploadPhotoFormData = new FormData();

            uploadPhotoFormData.append('name', name);
            uploadPhotoFormData.append('alt', alt);
            uploadPhotoFormData.append('description', description);
            uploadPhotoFormData.append('additionalData', additionalData);

            var req = document.getElementById('rectanglePicUploadPhoto');
            var squ = document.getElementById('squarePicUploadPhoto');

            var cropperSqu = new Cropper(squ, {
                viewMode: 3,
                aspectRatio: 1 / 1,
                autoCropArea: 1,
                ready: function () {
                    var canvasl = cropperSqu.getCroppedCanvas({
                        width: 250,
                        height: 250,
                    });
                    var canvast = cropperSqu.getCroppedCanvas({
                        width: 150,
                        height: 150,
                    });

                    canvasl.toBlob(function (blob) {
                        lImage = blob;
                        canvast.toBlob(function (blob) {
                            tImage = blob;
                            cropperSqu.destroy();
                            cropperSqu = null;

                            var cropperReq = new Cropper(req, {
                                viewMode: 3,
                                aspectRatio: 3 / 2,
                                autoCropArea: 1,
                                ready: function () {
                                    var canvasf = cropperReq.getCroppedCanvas({
                                        width: 300,
                                        height: 200
                                    });
                                    var canvass = cropperReq.getCroppedCanvas({
                                        width: 610,
                                        height: 406,
                                    });

                                    canvasf.toBlob(function (blob) {
                                        fImage = blob;
                                        canvass.toBlob(function (blob) {
                                            sImage = blob;
                                            cropperReq.destroy();
                                            cropperReq = null;

                                            uploadPhotoFormData.append('pic', '');
                                            uploadPhotoFormData.append('fileName', '');
                                            uploadPhotoFormData.append('fileKind', '');

                                            mainImage = b64toBlob(mainPicUploadPhoto);
                                            submitUpload('mainFile');
                                        });
                                    });

                                }
                            });

                        });
                    });

                }
            });
        }
        else {
            var fieldError = false;
            var checkboxError = false;
            var text = '';
            if(name == null || name == '') {
                document.getElementById('uploadPhotoPicNameDiv').classList.add('errorField');
                text = 'فیلد های بالا را پر کنید.\n';
            }

            if(alt == null || alt == ''){
                document.getElementById('uploadPhotoPicAltDiv').classList.add('errorField');
                if(text == '')
                    text = 'فیلد های بالا را پر کنید.\n';
            }

            if(description.trim().length > 100){
                document.getElementById('uploadPhotoPicAltDiv').classList.add('errorField');
                text += 'توضیح باید کمتر از 100 کاراکتر باشد.\n';
            }

            if(placeIdUploadPhoto == 0 || placeIdUploadPhoto == 0){
                document.getElementById('uploadPhotoPicAltDiv').classList.add('errorField');
                text += 'لطفا مشخص کنید که عکس برای چه مکانی است.\n';
            }

            if(!$('#photographerRole').is(":checked")){
                text += 'تایید مقررات اجباری است';
            }

            document.getElementById('photographerErrors').innerText = text;
        }
    }

    var repeatTime = 3;
    function submitUpload(type){
        var im;
        switch (type){
            case 'mainFile':
                im = mainImage;
                break;
            case 'l':
                im = lImage;
                break;
            case 's':
                im = sImage;
                break;
            case 't':
                im = tImage;
                break;
            case 'f':
                im = fImage;
                break;
        }

        uploadPhotoFormData.set('pic', im);
        uploadPhotoFormData.set('fileName', mainFileName);
        uploadPhotoFormData.set('fileKind', type);
        uploadPhotoFormData.set('placeId', placeIdUploadPhoto);
        uploadPhotoFormData.set('kindPlaceId', kindPlaceIdUploadPhoto);

        $.ajax({
            type : 'post',
            url : uploadPhotoUrl,
            data: uploadPhotoFormData,
            processData: false,
            contentType: false,
            success: function (response) {
                response = JSON.parse(response);
                if(response[0] == 'ok'){
                    mainFileName = response[1];
                    switch (type){
                        case 'mainFile':
                            submitUpload('l');
                            break;
                        case 'l':
                            submitUpload('s');
                            break;
                        case 's':
                            submitUpload('f');
                            break;
                        case 'f':
                            submitUpload('t');
                            break;
                        case 't':
                            mainFilesUploaded[mainFilesUploaded.length] = mainPicUploadPhoto;
                            goToPage3();
                            break;
                    }
                }
                else if(response[0] == 'nok1'){
                    if(repeatTime != 0){
                        $("#fullPageLoader").css('display', 'none');
                        alert('در بارگزاری عکس مشکلی پیش امده لطفا دوباره تلاش کنید.')
                    }
                    else{
                        repeatTime--;
                        resizeImg();
                    }
                }
                else if(response[0] == 'nok2'){
                    $("#fullPageLoader").css('display', 'none');
                    alert('فرمت عکس باید jpg و یا png باشد')
                }
                else if(response[0] == 'sizeError'){
                    $("#fullPageLoader").css('display', 'none');
                    alert('حجم عکس باید از 2 مگابایت کمتر باشد.')
                }
            },
            error: function(err){
                $("#fullPageLoader").css('display', 'none');
                alert('در بارگزاری عکس مشکلی پیش امده لطفا دوباره تلاش کنید.')
            }
        })
    }

    function newUploadPic(){
        $('#uploadPhotoInputPic').val('');
        $('#uploadPhotoPicName').val('');
        $('#uploadPhotoPicAlt').val('');
        $('#uploadPhotoDescription').val('');

        $(".itemRow").css('display', 'none');
        $(".startScreen").removeClass('hidden');
        $(".action").css('display', 'none');
        $(".footer").addClass('hidden');
    }

    function cropImg(){
        var canvas1;
        canvas1 = cropper.getCroppedCanvas();
        $('#' + cropResult).attr('src', canvas1.toDataURL());

        cancelCrop();
    }

    function cancelCrop(){
        $('#modal').modal('hide');
        $('#photoEditor').removeClass('hidden');
        $('#editPane').addClass('hidden');
    }

    function goToPage3() {
        $("#fullPageLoader").css('display', 'none');

        var text = '';

        for (var i = 0; i < mainFilesUploaded.length; i++){
            text += '<div class="uploadedImgShowDiv">\n' +
                '<img src="' + mainFilesUploaded[i] + '" class="uploadedImgPic">\n' +
                '</div>';
        }

        $('#uploadedImgDiv').html(text);
        $(".itemRow").css('display', 'none');
        $(".successScreen").removeClass('hidden');

        var withOfDiv = $("#uploadedImgDiv").width();
        var heightOfDiv = $("#uploadedImgDiv").height();

        if(withOfDiv > 767){
            if(mainFilesUploaded.length <= 2)
                withOfDiv /= 2;
            else if(mainFilesUploaded.length == 3)
                withOfDiv /= 3;
            else
                withOfDiv /= 4;

            if(heightOfDiv < withOfDiv)
                withOfDiv = heightOfDiv;
        }
        else{
            if(mainFilesUploaded.length > 1)
                withOfDiv /= 2;
        }
        withOfDiv -= 10;

        $('.uploadedImgShowDiv').css('width', withOfDiv);
        $('.uploadedImgShowDiv').css('height', withOfDiv);
    }

    function openUploadPhotoModal(_title, _uploadUrl, _placeId = 0, _kindPlaceId = 0, _additionalData){

        $('#placeIdUploadPhoto').val(_placeId);
        $('#kindPlaceIdUploadPhoto').val(_kindPlaceId);
        $('#placeNameUploadPhoto').val(_title);

        $('.titleOfUploadPhoto').text(_title);
        uploadPhotoUrl = _uploadUrl;
        //aditionalData must be json format
        additionalData = _additionalData;

        if(!checkLogin())
            return;

        $('#darkModeMainPage').show();
        $("#photoEditor").removeClass('hidden');
    }

    function closePhotoModal(){
        $(".successScreen").addClass('hidden');

        newUploadPic();

        $('#photoEditor').addClass('hidden');
        $('#darkModeMainPage').hide();
    }

    function b64toBlob(dataURI) {

        var byteString = atob(dataURI.split(',')[1]);
        var ab = new ArrayBuffer(byteString.length);
        var ia = new Uint8Array(ab);

        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], { type: 'image/jpeg' });
    }

    function searchPlaceForUploadPhoto(){
        createSearchInput('searchInPlacesUploadPhoto', 'نام مکان مورد نظر را وارد کنید.');
    }

    function searchInPlacesUploadPhoto(_element) {
        var value = _element.value;

        if(value.trim().length > 1){
            cities = -1;

            hotelFilter = 1;
            amakenFilter = 1;
            restuarantFilter = 1;
            majaraFilter = 1;
            sogatSanaieFilter = 1;
            mahaliFoodFilter = 1;


            $.ajax({
                type: 'post',
                url: '{{route('proSearch')}}',
                data: {
                    'key':  value,
                    'hotelFilter': hotelFilter,
                    'amakenFilter': amakenFilter,
                    'restaurantFilter': restuarantFilter,
                    'majaraFilter': majaraFilter,
                    'sogatSanaieFilter': sogatSanaieFilter,
                    'mahaliFoodFilter': mahaliFoodFilter,
                    'selectedCities': cities,
                    'mode': 'city'
                },
                success: function (response) {
                    $("#resultPlace").empty();

                    if(response.length == 0)
                        return;

                    response = JSON.parse(response);

                    newElement = "";
                    for(i = 0; i < response.length; i++) {

                        if(response[i].kindPlace == 'هتل')
                            icon = '<div class="icons hotelIcon spIcons"></div>';
                        else if(response[i].kindPlace == 'رستوران')
                            icon = '<div class="icons restaurantIcon spIcons"></div>';
                        else if(response[i].kindPlace == 'اماکن')
                            icon = '<div class="icons touristAttractions spIcons"></div>';
                        else if(response[i].kindPlace == 'ماجرا')
                            icon = '<div class="icons adventure spIcons"></div>';
                        else if(response[i].kindPlace == 'غذای محلی')
                            icon = '<div class="icons traditionalFood spIcons"></div>';
                        else if(response[i].kindPlace == 'صنایع سوغات')
                            icon = '<div class="icons souvenirIcon spIcons"></div>';
                        else
                            icon = '<div class="icons touristAttractions spIcons"></div>';

                        newElement += '<div style="padding: 5px 20px; display: flex">' +
                            '   <div style="width: 80%; color: black;" onclick="choosePlaceForUploadPhoto(' + response[i].id + ', ' + response[i].kindPlaceId + ', \'' + response[i].cityName + '\', \'' + response[i].name + '\')">' +
                            '       <div>' +
                            icon +
                            '       <p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px; display: inline-block;">' + response[i].name + '</p>' +
                            '       <p class="suggest cursor-pointer stateName" id="suggest_1">' + response[i].stateName + ' در ' + response[i].cityName + '</p>' +
                            '       </div>\n' +
                            '   </div>' +
                            '</div>';
                    }

                    setResultToGlobalSearch(newElement);
                }
            });
        }
        else
            clearGlobalResult();
    }

    function choosePlaceForUploadPhoto(_placeId, _kindPlaceId, _city, _placeName){
        var name = _placeName + ' در ' + _city;

        $('#placeIdUploadPhoto').val(_placeId);
        $('#kindPlaceIdUploadPhoto').val(_kindPlaceId);
        $('#placeNameUploadPhoto').val(name);
        closeSearchInput();
    }
</script>