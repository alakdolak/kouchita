var mode = 1;
var first = true;
var cropper;
var Cropper;
var URL;
var container;
var image;

var download;
var actions;
var dataX;
var dataY;
var dataHeight;
var dataWidth;
var dataRotate;
var dataScaleX;
var dataScaleY;
var options;

var originalImageURL;
var uploadedImageType;
var uploadedImageName;
var uploadedImageURL;

var inputImage;

var e;
var target;
var cropped;
var result;
var input;
var data;

function startCropper(ratio) {

  if(first) {

    'use strict';
    Cropper = window.Cropper;
    URL = window.URL || window.webkitURL;

    container = document.querySelector('.img-container-photogrpher');
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
  image = container.getElementsByTagName('img').item(0);
  // image = document.getElementById('editPhotographerPics');

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
            // Bootstrap's Modal

//             var http = new XMLHttpRequest();
//             var url = 'http://localhost:8080/pro_shazdemosafer/public/savePic';
//             var params = "url=" + result.toDataURL(uploadedImageType) + "&fileName=" + uploadedImageName;
//             http.open("POST", url, true);
//
// //Send the proper header information along with the request
//             http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//
//             http.onreadystatechange = function() {//Call a function when the state changes.
//               if(http.readyState == 4 && http.status == 200) {
//                 alert(http.responseText);
//               }
//             }
//             http.send(params);

            if(mode == 1)
              $('#rectanglePicPhotographer').attr('src', result.toDataURL(uploadedImageType));
            else
              $('#squarePicPhotographer').attr('src', result.toDataURL(uploadedImageType));

            $("#editPane").addClass('hidden');
            $("#photoEditor").removeClass('hidden');

            // $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);
            // download.href = result.toDataURL(uploadedImageType);
            //
            // if (!download.disabled) {
            //   download.download = uploadedImageName;
            //   download.href = result.toDataURL(uploadedImageType);
            // }
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
  inputImage = document.getElementById('editPhotographerPics');

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

    console.log('inn4');
}

function setMode(m) {
  mode = m;
}