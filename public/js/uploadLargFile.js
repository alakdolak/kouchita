var readerLargeFileUploadedInJsFile = {};
var fileLargeFileUploadedInJsFile = {};
var sliceSizeLargeFileUploadedInJsFile = 1000 * 1024;
let ajaxUrlLargeFile = '';
let callBackFunctionLargeFileUploadedInJsFile = null;
let inProcessLargeFileUploadedInJsFile = false;
let errorCountInLargeFileUploadedInJsFile = 5;
let cancelLargeFileUploadedInJsFile = false;

function uploadLargeFile(_url, _files, _callBackFunction) {
    if(!inProcessLargeFileUploadedInJsFile) {
        ajaxUrlLargeFile = _url;
        fileLargeFileUploadedInJsFile = _files;
        inProcessLargeFileUploadedInJsFile = true;
        callBackFunctionLargeFileUploadedInJsFile = _callBackFunction;
        readerLargeFileUploadedInJsFile = new FileReader();
        upload_fileLargeFile(0);
        return true;
    }
    else
        return false;
}

function upload_fileLargeFile(start) {
    if(!cancelLargeFileUploadedInJsFile) {
        var next_slice = start + sliceSizeLargeFileUploadedInJsFile + 1;
        var blob = fileLargeFileUploadedInJsFile.slice(start, next_slice);
        readerLargeFileUploadedInJsFile.onloadend = function (event) {
            if (event.target.readyState !== FileReader.DONE)
                return;

            $.ajax({
                url: ajaxUrlLargeFile,
                type: 'POST',
                cache: false,
                data: {
                    file: fileLargeFileUploadedInJsFile.name,
                    file_type: fileLargeFileUploadedInJsFile.type,
                    file_data: event.target.result,
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                    errorCountInLargeFileUploadedInJsFile--;
                    if (errorCountInLargeFileUploadedInJsFile <= 0)
                        callBackFunctionLargeFileUploadedInJsFile('error');
                    else
                        upload_fileLargeFile(start);
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == 'ok') {
                        errorCountInLargeFileUploadedInJsFile = 5;
                        var size_done = start + sliceSizeLargeFileUploadedInJsFile;
                        var percent_done = Math.floor((size_done / fileLargeFileUploadedInJsFile.size) * 100);

                        if (next_slice < fileLargeFileUploadedInJsFile.size) {
                            upload_fileLargeFile(next_slice);
                            callBackFunctionLargeFileUploadedInJsFile(percent_done);
                        } else {
                            inProcessLargeFileUploadedInJsFile = false;
                            callBackFunctionLargeFileUploadedInJsFile('done');
                        }
                    } else {
                        errorCountInLargeFileUploadedInJsFile--;
                        if (errorCountInLargeFileUploadedInJsFile <= 0)
                            callBackFunctionLargeFileUploadedInJsFile('error');
                        else
                            upload_fileLargeFile(start);
                    }
                }
            });
        };
        readerLargeFileUploadedInJsFile.readAsDataURL(blob);
    }
    else{
        callBackFunctionLargeFileUploadedInJsFile('cancelUpload');
        cancelLargeFileUploadedInJsFile = false;
        inProcessLargeFileUploadedInJsFile = false;
    }
}

function cancelLargeUploadedFile(){
    cancelLargeFileUploadedInJsFile = true;
}