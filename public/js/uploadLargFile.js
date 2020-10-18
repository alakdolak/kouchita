var readerLargeFileUploadedInJsFile = {};
var fileLargeFileUploadedInJsFile = {};
var sliceSizeLargeFileUploadedInJsFile = 1000 * 1024;
var ajaxUrlLargeFile = '';
var callBackFunctionLargeFileUploadedInJsFile = null;
var inProcessLargeFileUploadedInJsFile = false;
var errorCountInLargeFileUploadedInJsFile = 5;
var cancelLargeFileUploadedInJsFile = 0;
var dataAddedLargeFileUploadedInJsFile = null;

function uploadLargeFile(_url, _files, _data, _callBackFunction) {
    if(!inProcessLargeFileUploadedInJsFile) {
        ajaxUrlLargeFile = _url;
        fileLargeFileUploadedInJsFile = _files;
        inProcessLargeFileUploadedInJsFile = true;
        callBackFunctionLargeFileUploadedInJsFile = _callBackFunction;
        readerLargeFileUploadedInJsFile = new FileReader();
        dataAddedLargeFileUploadedInJsFile = JSON.stringify(_data);
        upload_fileLargeFile(0, 0);
        return true;
    }
    else
        _callBackFunction('queue');
}

function upload_fileLargeFile(start, _fileName) {
    let isLast = false;
    let next_slice = start + sliceSizeLargeFileUploadedInJsFile + 1;
    let blob = fileLargeFileUploadedInJsFile.slice(start, next_slice);

    if(next_slice > fileLargeFileUploadedInJsFile.size)
        isLast = true;

    readerLargeFileUploadedInJsFile.onloadend = function (event) {
        if (event.target.readyState !== FileReader.DONE)
            return;

        $.ajax({
            url: ajaxUrlLargeFile,
            type: 'POST',
            cache: false,
            data: {
                data: dataAddedLargeFileUploadedInJsFile,
                storeFileName: _fileName,
                file_name: fileLargeFileUploadedInJsFile.name,
                file_type: fileLargeFileUploadedInJsFile.type,
                cancelUpload: cancelLargeFileUploadedInJsFile,
                last: isLast,
                file_data: event.target.result,
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
                errorCountInLargeFileUploadedInJsFile--;
                if (errorCountInLargeFileUploadedInJsFile <= 0)
                    callBackFunctionLargeFileUploadedInJsFile('error');
                else
                    upload_fileLargeFile(start, _fileName);
            },
            success: function (response) {
                response = JSON.parse(response);
                if(cancelLargeFileUploadedInJsFile == 1 && response.status == 'canceled'){
                    callBackFunctionLargeFileUploadedInJsFile('cancelUpload');
                    cancelLargeFileUploadedInJsFile = 0;
                    inProcessLargeFileUploadedInJsFile = false;
                }
                else if (response.status == 'ok') {
                    errorCountInLargeFileUploadedInJsFile = 5;
                    var size_done = start + sliceSizeLargeFileUploadedInJsFile;
                    var percent_done = Math.floor((size_done / fileLargeFileUploadedInJsFile.size) * 100);

                    if (!isLast) {
                        upload_fileLargeFile(next_slice, response.fileName);
                        callBackFunctionLargeFileUploadedInJsFile(percent_done);
                    }
                    else {
                        inProcessLargeFileUploadedInJsFile = false;
                        callBackFunctionLargeFileUploadedInJsFile('done', response.fileName);
                    }
                }
                else {
                    errorCountInLargeFileUploadedInJsFile--;
                    if (errorCountInLargeFileUploadedInJsFile <= 0)
                        callBackFunctionLargeFileUploadedInJsFile('error');
                    else
                        upload_fileLargeFile(start, _fileName);
                }
            }
        });
    };
    readerLargeFileUploadedInJsFile.readAsDataURL(blob);

}

function cancelLargeUploadedFile(){
    cancelLargeFileUploadedInJsFile = 1;
}