


<!--[if lt IE 9]>
<div class="alert alert-warning alert-dismissible fade show m-0 rounded-0" role="alert">
   You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
   </button>
</div>
<![endif]-->


<span id="editPane" class="ui_overlay ui_modal photoUploadOverlay hidden" style="padding: 0; width: 50%; right: auto; height: 90%; top: 5%; position: fixed; left: 25%">
     <div class="body_text">
        <div class="row" style="max-height: 600px; overflow: auto">
         <center class="col-md-12">
            <!-- <h3>Demo:</h3> -->
            <div class="img-container">
               <img class="imgInEditor" id="edit_file_image" alt="Picture">
            </div>
         </center>
      </div>
        <div class="row" id="actions">
      <center class="col-md-12 docs-buttons" style="margin: 20px">

         <div class="btn-group">
            <button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
               <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
                 <span class="fa fa-rotate-left"></span>
               </span>
            </button>

            <button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
               <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
                 <span class="fa fa-rotate-right"></span>
               </span>
            </button>
         </div>

         <div class="btn-group">
            <button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
               <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
                 <span class="fa fa-arrows-h"></span>
               </span>
            </button>

            <button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
               <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
                 <span class="fa fa-arrows-v"></span>
               </span>
            </button>
         </div>

         <div class="btn-group">
            <button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="crop" title="Crop">
               <span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">
                 <span class="fa fa-check"></span>
               </span>
            </button>

            <button type="button" onclick="primaryBtnClicked(this)" class="btn btn-primary" data-method="clear" title="Clear">
               <span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">
                 <span class="fa fa-remove"></span>
               </span>
            </button>
         </div>

         <div class="btn-group btn-group-crop">

            <button id="saveBtn" type="button" onclick="successBtnClicked(this)" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 466, &quot;height&quot;: 367 }">
               <span class="docs-tooltip" data-toggle="tooltip" id="saveBtnSpan" title="cropper.getCroppedCanvas({ width: 466, height: 367 })">
                 ذخیره
               </span>
            </button>

            <button id="saveBtn2" type="button" onclick="successBtnClicked(this)" class="btn btn-success hidden" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 100, &quot;height&quot;: 100 }">
               <span class="docs-tooltip" data-toggle="tooltip" id="saveBtnSpan" title="cropper.getCroppedCanvas({ width: 100, height: 100 })">
                 ذخیره
               </span>
            </button>
         </div>

         <!-- Show the cropped image in modal -->
         <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
            <div class="modal-dialog">
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

         <div id="scripts">

            <script src="{{URL::asset('js/editorCommon.js')}}"></script>
            <script src="{{URL::asset('js/cropper.js')}}"></script>
            <script src="{{URL::asset('js/mainCrop.js')}}"></script>
         </div>

      </center><!-- /.docs-buttons -->
   </div>
     </div>
</span>

<span id="photoEditor" class="ui_overlay ui_modal photoUploadOverlay hidden" style="padding: 0px; width: 860px; height: 90%; top: 5%; position: fixed; left: 50%; margin-left: -430px;">

     <div class="body_text">

         <div class="photoUploader">

            <div class="headerBar">
                 <h3 id="photoUploadHeader" style="margin-right: 40px" class="photoUploadHeader"><span>افزودن تصویر به </span>
                    <span>
                       {{--{{$place->name}}--}}
                    </span></h3>
                 <div id="photoUploadTipsLink" class="headerLink tipsLink">
                    <span onclick="$('#guidelinesOverlay').removeClass('hidden')">قوانین سایت</span>
                    <span id="guidelinesOverlay" class="hidden ui_overlay ui_popover arrow_top guidelinesOverlayParent ui_tooltip " style="position: fixed; right: 460px; left: auto; top: 82px; bottom: auto;">
                        <div class="header_text"></div>
                        <div class="body_text">
                           <div class="guidelinesOverlay">
                              <div class="listHdr">All photos must be...</div>
                              <ul class="listBody">
                                 <li>Family-friendly</li>
                                 <li>Original, non-copyrighted images</li>
                                 <li>Non-commercial</li>
                                 <li>Virus-free</li>
                                 <li>In <b>.gif</b>, <b>.jpg</b>, or <b>.png</b> format</li>
                                 <li>No more than 50 photos per upload</li>
                              </ul>
                              <div class="listFtr">Read our complete <a href="https://www.tripadvisorsupport.com/hc/en-us/articles/200615067-Photo-Guidelines" target="_blank" class="js_popFraud">photo submission guidelines</a>.</div>
                           </div>
                        </div>
                        <div class="ui_close_x" onclick="$('#guidelinesOverlay').addClass('hidden')"></div>
                     </span>
                 </div>
              </div>

            <div id="uploader-dlg" class="uploaderDlg hasFiles" style="overflow: auto; max-height: 100%">

               <div class="template itemRow loading">

                  <div class="row" style="max-width: 100%">

                     <div class="col-xs-4">
                        <div class="preview" style="width: 250px; height: 200px">
                           <div class="imgContainer">
                              <img id="image_file" style="width: 213px; height: 168px; transform: rotate(0deg);">
                           </div>
                           <div onclick="doEdit(213 / 168)" class="action editBtn"></div>
                        </div>

                        <div style="clear:both;"></div>

                        <div class="preview" style="width: 150px; height: 150px;">
                           <div class="imgContainer">
                              <img id="image_file_2" style="width: 100px; height: 100px; transform: rotate(0deg);">
                           </div>
                           <div onclick="doEdit(1)" class="action editBtn"></div>
                        </div>
                     </div>

                     <div class="col-xs-6" style="margin-right: 30px">
                        <form style="margin-left: 30px" class="photoForm roomType">
                           <div class="field category">
                              <div class="formFieldTitle" style="text-align: center">دسته <span>(الزامی)</span></div>
                              <div id="photoTags" class="column first" style="border: none !important; float: right !important;"></div>
                           </div>
                           <div class="field description">
                              <div class="maxChars"><span>توضیحات</span><span>(اختیاری)</span></div>
                              <input style="min-height: 100px; max-height: 100px; overflow: auto;" type="text" id="description" placeholder="حداکثر 100 کاراکتر" maxlength="100" onkeypress="return event.keyCode != 13;">
                           </div>
                        </form>
                     </div>

                  </div>
                  <div onclick="back()" class="removeBtn action ui_close_x"></div>

               </div>

               <div  id="dropArea" class="startScreen infoScreen">
                  <div class="inner">
                     <div>
                        <input id="pic" type="file" style="padding: 9px 16px 8px; position: absolute; right: 0; width: 100%; height: 100%; top: 0; display: none">
                        <label for="pic">
                           <div class="ui_button primary addPhotoBtn" style="z-index: 1000">
                              <span>Select photos from your computer</span>
                           </div>
                        </label>
                     </div>

                     <div class="separator"><span class="text">or</span></div>
                     <div class="dragDropText">Drag and drop photos at any time</div>

                     <div class="invalidDragScreen infoScreen hidden">
                        <div class="inner">
                           <div class="dropText">That image type is not supported. Please use a jpeg or png.</div>
                        </div>
                        <div class="dropOverlay"></div>
                     </div>

                     <div class="progressScreen infoScreen hidden">
                          <div class="inner">
                             <img src="{{URL::asset('images/loading.svg')}}">
                          </div>
                        </div>

                  </div>
               </div>

               <div class="footer hidden">

                    <div class="termsLabel">
                       <div class="errorText">This field is required</div>
                       <input type="checkbox" class="iAgree" id="i-agree" name="photorelease">
                       <label for="i-agree">
                       I am the owner of these photos and I accept TripAdvisor's <a href="/pages/terms.html" target="_blank">Terms of Use</a>.
                       </label>
                    </div>

                    <div class="upload">
                       <div onclick="uploadIMG()" class="uploadBtn ui_button primary">Upload</div>
                    </div>

                  <div class="template errorMsg missingCategory">Please select a category</div>

                  <div class="template errorMsg missingDescription">Please write a description</div>

                  <div class="template errorMsg missingCrop1">کراپ 1 رو انجام بده</div>

                  <div class="template errorMsg missingCrop2">کراپ 2 رو انجام بده</div>

                  <div class="template errorMsg missingCrop3">یکی از دسته ها رو انتخاب کن</div>

              </div>
            </div>

         </div>
     </div>

     <div class="ui_close_x" onclick="$('#photoEditor').addClass('hidden'); $('.dark').addClass('hidden')"></div>
</span>

<script>

   var file;
   var crop1Clicked = false;
   var crop2Clicked = false;

   var dropzone = $('#dropArea');

   dropzone.on('dragover', function() {
      //add hover class when drag over
//         alert("1");
      dropzone.addClass('hover');
      return false;
   });

   dropzone.on('dragleave', function() {
      //remove hover class when drag out
      dropzone.removeClass('hover');
      return false;
   });

   dropzone.on('drop', function(e) {
      //prevent browser from open the file when drop off
      e.stopPropagation();
      e.preventDefault();
      dropzone.removeClass('hover');

      //retrieve uploaded files data
      var files = e.originalEvent.dataTransfer.files;
      submitPhoto(files[0]);

      return false;
   });


   $(document).ready(function() {

      $("#pic").change(function() {
         submitPhoto(this.files[0]);
      });
   });

   function submitPhoto(input) {

      var reader = new FileReader();

      reader.onload = function(e) {
         $('#image_file').attr('src', e.target.result);
         $('#image_file_2').attr('src', e.target.result);
      };

      $(".itemRow").css('display', 'block');
      $(".startScreen").addClass('hidden');
      $(".action").css('display', 'block');
      $(".footer").removeClass('hidden');

      reader.readAsDataURL(input);
   }

   function back() {

      $('#image_file').removeAttr('src');
      $('#image_file_2').removeAttr('src');

      $(".itemRow").css('display', 'none');
      $(".startScreen").removeClass('hidden');
      $(".action").css('display', 'none');
      $(".footer").addClass('hidden');

   }

   function primaryBtnClicked(val) {
      $('.btn-primary').css('background-color', '#007bff');
      $('.btn-success').css('background-color', '#28a745');
      $(val).css('background-color', '#0069d9');
   }

   function successBtnClicked(val) {
      $('.btn-primary').css('background-color', '#007bff');
      $('.btn-success').css('background-color', '#28a745');
      $(val).css('background-color', '#218838');
   }

   function doEdit(ratio) {

      if(ratio != 1) {
         $('#edit_file_image').attr('src', $('#image_file').attr('src'));
         setMode(1);
         crop1Clicked = true;
         $("#saveBtn").removeClass('hidden');
         $("#saveBtn2").addClass('hidden');
      }
      else {
         $('#edit_file_image').attr('src', $('#image_file_2').attr('src'));
         setMode(2);
         crop2Clicked = true;
         $("#saveBtn").addClass('hidden');
         $("#saveBtn2").removeClass('hidden');
      }

      startCropper(ratio);

      $('#photoEditor').addClass('hidden');
      $('#editPane').removeClass('hidden');
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

      $.ajax({
         type: 'post',
         {{--url: '{{route('addPhotoToPlace', ['placeId' => $place->id, 'kindPlaceId' => $kindPlaceId])}}',--}}
         data: {
            'fileName': uploadedImageName,
            'url': $("#image_file").attr('src'),
            'url2': $("#image_file_2").attr('src'),
            'desc': desc,
            'filter': selected
         },
         success: function (response) {
            response = JSON.parse(response);
            if(response.status == "ok")
                 document.location.href = response.url;
         }
      });
   }

</script>
