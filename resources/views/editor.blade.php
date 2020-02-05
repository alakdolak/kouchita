<link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/shazdeDesigns/editor.css')}}'/>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}' />


<!--[if lt IE 9]>
<div class="alert alert-warning alert-dismissible fade show m-0 rounded-0" role="alert">
    You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<![endif]-->

<span id="editPane" class="ui_overlay ui_modal photoUploadOverlay hidden">
   <div class="body_text" style="padding-top: 12px">
       {{--<div class="photoUploader">--}}
       <div class="headerBar epHeaderBar">
              <h3 id="photoUploadHeader" class="photoUploadHeader">
                  <span>افزودن تصویر به </span>
                  <span>{{$place->name}}</span>
                  <span id="frameEditorHeader"></span>
              </h3>
       </div>
       <div class="bodyEditFrame">
               <div class="row">
                  <div class="col-md-12">
                     <div class="img-container img-container-photogrpher" style="position: relative">
                        <img class="imgInEditor" id="editPhotographerPics" alt="Picture" style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="row" id="actions" style="">
                    <div class="col-md-12 docs-buttons">

                        <div class="editBtnsGroup">
                        <div class="editBtns">
                           <div class="flipHorizontal" data-toggle="tooltip" data-placement="top" title="Flip Horizontal" onclick="cropper.scaleY(-1)"></div>
                        </div>
                        {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">--}}
                        {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">--}}
                        {{--<span class="fa fa-arrows-h"></span>--}}
                        {{--</span>--}}
                        {{--</button>--}}

                        <div class="editBtns">
                           <div class="flipVertical" data-toggle="tooltip" data-placement="top" title="Flip Vertical" onclick="cropper.scaleX(-1)"></div>
                        </div>
                        {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">--}}
                        {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">--}}
                        {{--<span class="fa fa-arrows-v"></span>--}}
                        {{--</span>--}}
                        {{--</button>--}}
                        </div>

                        <div class="editBtnsGroup">
                        <div class="editBtns">
                           <div class="rotateLeft" data-toggle="tooltip" data-placement="top" title="چرخش 45 درجه ای به سمت چپ" onclick="cropper.rotate(-45)"></div>
                        </div>
                        {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">--}}
                        {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">--}}
                        {{--<span class="fa fa-rotate-left"></span>--}}
                        {{--</span>--}}
                        {{--</button>--}}

                        <div class="editBtns">
                           <div class="rotateRight" data-toggle="tooltip" data-placement="top" title="چرخش 45 درجه ای به سمت راست" onclick="cropper.rotate(45)"></div>
                        </div>
                        {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">--}}
                        {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">--}}
                        {{--<span class="fa fa-rotate-right"></span>--}}
                        {{--</span>--}}
                        {{--</button>--}}
                        </div>

                        <div class="editBtnsGroup">
                        <div class="editBtns">
                           <div class="cropping" data-toggle="tooltip" data-placement="top" title="برش" onclick="cropper.crop()"></div>
                        </div>
                        {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="crop" title="Crop">--}}
                        {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">--}}
                        {{--<span class="fa fa-check"></span>--}}
                        {{--</span>--}}
                        {{--</button>--}}

                        <div class="editBtns">
                           <div class="clearing" data-toggle="tooltip" data-placement="top" title="بازگشت به اول" onclick="cropper.clear()"></div>
                        </div>
                        {{--<button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="clear" title="Clear">--}}
                        {{--<span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">--}}
                        {{--<span class="fa fa-remove"></span>--}}
                        {{--</span>--}}
                        {{--</button>--}}
                        </div>

                        <div class="btnActionEditFrame">
                            <div class="upload">
                                <div onclick="cropImg()" class="uploadBtn ui_button primary">تایید</div>
                            </div>

                            <div class="return">
                                <div class="returnBtnEditPhoto">بازگشت</div>
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
       {{--</div>--}}
   </div>
    <div class="ui_close_x" onclick="$('#editPane').addClass('hidden'); $('.dark').addClass('hidden')"></div>
</span>

<span id="photoEditor" class="ui_overlay ui_modal photoUploadOverlay hidden">
     <div class="body_text">
         <div class="photoUploader">
             <div class="headerBar">
                 <h3 id="photoUploadHeader" class="photoUploadHeader"><span>افزودن تصویر به </span><span>{{$place->name}}</span></h3>
             </div>
             <div id="uploader-dlg" class="uploaderDlg hasFiles">
                 <div id="dropArea" class="startScreen infoScreen">
                     <div class="inner">
                         <div class="innerPic"></div>
                         <div>
                             <input id="photographerInputPic" type="file" style="display: none;">
                             <label for="photographerInputPic">
                                 <div class="ui_button primary addPhotoBtn">
                                     <span>عکس خود را انتخاب کنید</span>
                                 </div>
                             </label>
                         </div>

                         <div class="separator"><span class="text">یا</span></div>
                         <div class="dragDropText">به سادگی عکس خود را در این قاب بی اندازید</div>

                         <div class="invalidDragScreen infoScreen hidden">
                             <div class="inner">
                                 <div class="dropText">That image type is not supported. Please use a jpeg or png.</div>
                             </div>
                             <div class="dropOverlay"></div>
                         </div>

                         <div id="photographerLoadingPic" class="progressScreen infoScreen hidden">
                             <div class="inner">
                                 <img src="{{URL::asset('images/loading.svg')}}">
                             </div>
                         </div>

                     </div>
{{--                     <div class="footer">--}}
{{--                         <div class="termsLabel">--}}
{{--                             <div>--}}
{{--                                 <div>--}}
{{--                                     <div>توجه نمایید که عکس‌ما می‌بایست در فرمتهای رایج تصویر و با حداکثر سایز 500 مگابایت باشد. تصاویر پیش از انتشار توسط ما بازبینی می‌گردد. لطفاً از بارگزاری تصاویری که با قوانین سایت مغایرت دارند اجتناب کنید.</div>--}}
{{--                                     <div id="photoUploadTipsLink" class="headerLink tipsLink">--}}
{{--                                         <span onclick="$('#guidelinesOverlay').removeClass('hidden')">صفحه مقررات</span>--}}
{{--                                         <span id="guidelinesOverlay" class="hidden ui_overlay ui_popover arrow_top guidelinesOverlayParent ui_tooltip">--}}
{{--                                             <div class="header_text"></div>--}}
{{--                                             <div class="body_text">--}}
{{--                                                 <div class="guidelinesOverlay">--}}
{{--                                                     <div class="listHdr">All photos must be...</div>--}}
{{--                                                     <ul class="listBody">--}}
{{--                                                         <li>Family-friendly</li>--}}
{{--                                                         <li>Original, non-copyrighted images</li>--}}
{{--                                                         <li>Non-commercial</li>--}}
{{--                                                         <li>Virus-free</li>--}}
{{--                                                         <li>In--}}
{{--                                                            <b>.gif</b>,--}}
{{--                                                            <b>.jpg</b>, or--}}
{{--                                                            <b>.png</b> format</li>--}}
{{--                                                         <li>No more than 50 photos per upload</li>--}}
{{--                                                     </ul>--}}
{{--                                                     <div class="listFtr">Read our complete <a href="https://www.tripadvisorsupport.com/hc/en-us/articles/200615067-Photo-Guidelines" target="_blank" class="js_popFraud">photo submission guidelines</a>.</div>--}}
{{--                                                 </div>--}}
{{--                                             </div>--}}
{{--                                             <div class="ui_close_x" onclick="$('#guidelinesOverlay').addClass('hidden')"></div>--}}
{{--                                         </span>--}}
{{--                                     </div>--}}
{{--                                 </div>--}}
{{--                             </div>--}}
{{--                         </div>--}}
{{--                     </div>--}}
                 </div>
                 <div class="template itemRow loading">
                     <div class="row">
                         <div class="col-xs-7">
                             <div>
                                 <div class="epPicBox">
                                     <div class="epPic">
                                         <div class="imgContainer">
                                             <img id="rectanglePicPhotographer">
                                         </div>
                                     </div>
                                     <div class="step6picText">قاب مستطیل</div>
                                     <div class="epEditPicText" onclick="doEdit(213 / 168, 'rectanglePicPhotographer');" style="cursor: pointer;">ویرایش</div>
                                 </div>
                                 <div class="epPicBox">
                                     <div class="epPic">
                                         <div class="imgContainer">
                                             <img id="squarePicPhotographer">
                                         </div>
                                     </div>
                                     <div class="epPicText">قاب مربع</div>
                                     <div class="epEditPicText" onclick="doEdit(1, 'squarePicPhotographer');" style="cursor: pointer;">ویرایش</div>
                                 </div>
                             </div>
                             <div style="">عکس های ما در دو نوع قاب مختلف نمایش داده می شودمی توانید خود نسبت به برش نمایش مناسب عکس در داخل قاب اقدام نمایید در غیر اینصورت تصویر به صورت اتوماتیک برش می خورد</div>
                         </div>
                         <div class="col-xs-5">
                            <div id="photographerPicNameDiv" class="epInputBox">
                                <div class="epInputBoxText">
                                    <div class="epInputBoxRequired"><div class="icons epInputIconRequired redStar"></div>نام عکس</div>
                                </div>
                                <input class="epInputBoxInput" id="photographerPicName" onkeydown="document.getElementById('photographerPicNameDiv').classList.remove('errorField')">
                            </div>
                            <div id="photographerPicAltDiv" class="epInputBox">
                                <div class="epInputBoxText">
                                    <div class="epInputBoxRequired"><div class="icons epInputIconRequired redStar"></div>نام جایگزین</div>
                                </div>
                                <input class="epInputBoxInput" id="photographerPicAlt" onkeydown="document.getElementById('photographerPicAltDiv').classList.remove('errorField')">
                            </div>
                            <div class="epRedNotice">نام جایگزین توصیف کننده موضوعی است که از تصویر استنباط می شود</div>

                            <div>
                               <div class="epTitle">توضیحات</div>
                               <textarea class="epAddresText" placeholder="توضیحات همراه با عکس برای دوستانتان نمایش داده می شود.           حداقل 100 کاراکتر" maxlength="100" id="photographerPicDescription"></textarea>
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
                             <div class="imageVerificationBtn">
                                     <button onclick="newPhotographerPic()">
                                         تغییر عکس
                                     </button>
                            </div>
                             <div class="termsLabel">
                                 <div>
                                     <div class="secondStepPolicyCheckBox">
                                         <input id="photographerRole" type="checkbox">
                                         <label for="photographerRole">
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
                                 {{--<div onclick="uploadIMG()" class="uploadBtn ui_button primary">تایید</div>--}}
                                 <div onclick="resizeImg()" class="uploadBtn ui_button primary">تایید</div>
                             </div>
                         </div>
                     </div>
                     {{--<div onclick="back()" class="removeBtn action ui_close_x"></div>--}}
                 </div>

                 {{--<div class="footer hidden">--}}
                 {{--<div class="termsLabel">--}}
                 {{--<div class="errorText">This field is required</div>--}}
                 {{--<input type="checkbox" class="iAgree" id="i-agree" name="photorelease">--}}
                 {{--<div style="margin: 5px 0;">--}}
                 {{--<div style="display: inline-block">--}}
                 {{--<input onclick="filter()" id="21" type="checkbox">--}}
                 {{--<label for="21">--}}
                 {{--<span></span>--}}
                 {{--</label>--}}
                 {{--</div>--}}
                 {{--<div style="display: inline-block; padding: 0px 5px; text-align: justify; font-size: 0.875em;">--}}
                 {{--<div style="display: inline-block;">تاکید میکنم تمامی حقوق مرتبط با انتشار این تصویر متعلق به من می باشد. تایید می نمایم در صورت حضور چهره دیگران در تصویر، آن ها نیز از انتشار این عکس راضی می باشند.</div>--}}
                 {{--<div id="photoUploadTipsLink" class="headerLink tipsLink">--}}
                 {{--<span onclick="$('#guidelinesOverlay').removeClass('hidden')">قوانین سایت</span>--}}
                 {{--<span id="guidelinesOverlay" class="hidden ui_overlay ui_popover arrow_top guidelinesOverlayParent ui_tooltip">--}}
                 {{--<div class="header_text"></div>--}}
                 {{--<div class="body_text">--}}
                 {{--<div class="guidelinesOverlay">--}}
                 {{--<div class="listHdr">All photos must be...</div>--}}
                 {{--<ul class="listBody">--}}
                 {{--<li>Family-friendly</li>--}}
                 {{--<li>Original, non-copyrighted images</li>--}}
                 {{--<li>Non-commercial</li>--}}
                 {{--<li>Virus-free</li>--}}
                 {{--<li>In--}}
                 {{--<b>.gif</b>,--}}
                 {{--<b>.jpg</b>, or--}}
                 {{--<b>.png</b> format</li>--}}
                 {{--<li>No more than 50 photos per upload</li>--}}
                 {{--</ul>--}}
                 {{--<div class="listFtr">Read our complete <a href="https://www.tripadvisorsupport.com/hc/en-us/articles/200615067-Photo-Guidelines" target="_blank" class="js_popFraud">photo submission guidelines</a>.</div>--}}
                 {{--</div>--}}
                 {{--</div>--}}
                 {{--<div class="ui_close_x" onclick="$('#guidelinesOverlay').addClass('hidden')"></div>--}}
                 {{--</span>--}}
                 {{--</div>--}}
                 {{--</div>--}}
                 {{--</div>--}}
                 {{--</div>--}}

                 {{--<div class="upload">--}}
                 {{--<div onclick="uploadIMG()" class="uploadBtn ui_button primary">تایید</div>--}}
                 {{--</div>--}}

                 {{--<div class="template errorMsg missingCategory">Please select a category</div>--}}

                 {{--<div class="template errorMsg missingDescription">Please write a description</div>--}}

                 {{--<div class="template errorMsg missingCrop1">کراپ 1 رو انجام بده</div>--}}

                 {{--<div class="template errorMsg missingCrop2">کراپ 2 رو انجام بده</div>--}}

                 {{--<div class="template errorMsg missingCrop3">یکی از دسته ها رو انتخاب کن</div>--}}

                 {{--</div>--}}
             </div>
         </div>
     </div>

     <div class="ui_close_x" onclick="$('#photoEditor').addClass('hidden'); $('.dark').addClass('hidden')"></div>
</span>

{{--<script src="{{URL::asset('js/editorCommon.js')}}"></script>--}}
<script src="{{URL::asset('js/cropper.js')}}"></script>
<script src="{{URL::asset('js/mainCrop.js')}}"></script>

<script>
    var file;
    var crop1Clicked = false;
    var crop2Clicked = false;
    var cropResult;
    var mainPic;
    var photographerPicFormData = new FormData();
    var dropzone = $('#dropArea');
    var userId = '{{auth()->user()->id}}';
    var kindPlaceId = '{{$kindPlaceId}}';
    var placeId = '{{$place->id}}';

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

    $(document).ready(function() {
        $("#photographerInputPic").change(function() {
            submitPhoto(this.files[0]);
        });
    });

    function submitPhoto(input) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#rectanglePicPhotographer').attr('src', e.target.result);
            $('#squarePicPhotographer').attr('src', e.target.result);
            mainPic = e.target.result;
        };
        $(".itemRow").css('display', 'block');
        $(".startScreen").addClass('hidden');
        $(".action").css('display', 'block');
        $(".footer").removeClass('hidden');
        reader.readAsDataURL(input);

    }

    function back() {
        $('#rectanglePicPhotographer').removeAttr('src');
        $('#squarePicPhotographer').removeAttr('src');
        $(".itemRow").css('display', 'none');
        $(".startScreen").removeClass('hidden');
        $(".action").css('display', 'none');
        $(".footer").addClass('hidden');
    }

    // function primaryBtnClicked(val) {
    //    $('.btn-primary').css('background-color', '#007bff');
    //    $('.btn-success').css('background-color', '#28a745');
    //    $(val).css('background-color', '#0069d9');
    // }

    function successBtnClicked(val) {
        $('.btn-primary').css('background-color', '#007bff');
        $('.btn-success').css('background-color', '#28a745');
        $(val).css('background-color', '#218838');
    }

    function doEdit(ratio, result) {
        cropResult = result;
        if(ratio != 1) {
            $('#editPhotographerPics').attr('src', mainPic);
            setMode(1);
            crop1Clicked = true;
            $("#saveBtn").removeClass('hidden');
            $("#saveBtn2").addClass('hidden');
            console.log('inn1');
            $('#frameEditorHeader').text('(قاب مستطیل)')
        }
        else {
            $('#editPhotographerPics').attr('src', mainPic);
            setMode(2);
            crop2Clicked = true;
            $("#saveBtn").addClass('hidden');
            $("#saveBtn2").removeClass('hidden');
            console.log('inn2');
            $('#frameEditorHeader').text('(قاب مربع)')
        }
        startCropper(ratio);
        $('#photoEditor').addClass('hidden');
        $('#editPane').removeClass('hidden');
        console.log('inn3')
    }


    function uploadIMG() {
        $(".errorMsg").css('display', 'none');
        if(!crop1Clicked) {
            $(".missingCrop1").css('display', 'block');
            return;
        }
        if(!crop2Clicked) {
            $(".missingCrop2").css('display', 'block');
            return;
        }
        var selected = $("input[name='mask']:checked").val();
        if(selected == undefined) {
            $(".missingCrop3").css('display', 'block');
            return;
        }
        var desc = $("#description").val();
        if(desc == "")
            desc = -1;
    }

    function cropImg(){
        var canvas1;

        $('#modal').modal('hide');
        canvas1 = cropper.getCroppedCanvas();

        $('#' + cropResult).attr('src', canvas1.toDataURL());

        $('#photoEditor').removeClass('hidden');
        $('#editPane').addClass('hidden');
    }

    function resizeImg(){
        var name = document.getElementById('photographerPicName').value;
        var alt = document.getElementById('photographerPicAlt').value;
        var description = document.getElementById('photographerPicDescription').value;

        if($('#photographerRole').is(":checked") && name != null && name != ''  && alt != null && alt != '' ) {

            photographerPicFormData = new FormData();

            photographerPicFormData.append('name', name);
            photographerPicFormData.append('alt', alt);
            photographerPicFormData.append('description', description);
            photographerPicFormData.append('placeId', placeId);
            photographerPicFormData.append('kindPlaceId', kindPlaceId);

            var req = document.getElementById('rectanglePicPhotographer');
            var squ = document.getElementById('squarePicPhotographer');

            var cropperSqu = new Cropper(squ, {
                viewMode: 3,
                aspectRatio: 1 / 1,
                autoCropArea: 1,
                ready: function () {
                    var canvasl = cropperSqu.getCroppedCanvas({
                        width: 150,
                        height: 150,
                    });
                    var canvast = cropperSqu.getCroppedCanvas({
                        width: 50,
                        height: 50,
                    });

                    canvasl.toBlob(function (blob) {
                        photographerPicFormData.append('l-1', blob, 'l-1.jpg');

                        canvast.toBlob(function (blob) {
                            photographerPicFormData.append('t-1', blob, 't-1.jpg');
                            cropperSqu.destroy();
                            cropperSqu = null;

                            var cropperReq = new Cropper(req, {
                                viewMode: 3,
                                aspectRatio: 3 / 2,
                                autoCropArea: 1,
                                ready: function () {
                                    var canvasf = cropperReq.getCroppedCanvas({
                                        width: 250,
                                        height: 167
                                    });
                                    var canvass = cropperReq.getCroppedCanvas({
                                        width: 550,
                                        height: 367,
                                    });

                                    canvasf.toBlob(function (blob) {
                                        photographerPicFormData.append('f-1', blob, 'f-1.jpg');

                                        canvass.toBlob(function (blob) {
                                            photographerPicFormData.append('s-1', blob, 's-1.jpg');

                                            var input = document.getElementById('photographerInputPic');
                                            photographerPicFormData.append('mainPic', input.files[0]);

                                            cropperReq.destroy();
                                            cropperReq = null;

                                            submitUpload();
                                        });
                                    });
                                }
                            });
                        });
                    });
                }
            });
        }
        else{
            var fieldError = false;
            var checkboxError = false;
            var text = '';
            if(name == null || name == '') {
                document.getElementById('photographerPicNameDiv').classList.add('errorField');
                text = 'فیلد های بالا را پر کنید.\n';
            }

            if(alt == null || alt == ''){
                document.getElementById('photographerPicAltDiv').classList.add('errorField');
                if(text == '')
                    text = 'فیلد های بالا را پر کنید.\n';
            }

            if(!$('#photographerRole').is(":checked")){
                text += 'تایید مقررات اجباری است';
            }

            document.getElementById('photographerErrors').innerText = text;
        }
    }

    function submitUpload(){
        $.ajax({
            type : 'post',
            url : '{{route('addPhotoToPlace')}}',
            data: photographerPicFormData,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response == 'ok')
                    window.location.reload();
            }
        })
    }

    function newPhotographerPic(){
        $(".itemRow").css('display', 'none');
        $(".startScreen").removeClass('hidden');
        $(".action").css('display', 'none');
        $(".footer").addClass('hidden');
    }
</script>