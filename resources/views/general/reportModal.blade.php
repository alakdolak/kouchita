<style>
    .reportBackGround{
        position: fixed;
        width: 100%;
        height: 100%;
        background: #000000c2;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        top: 0px;
        right: 0px;
    }

    .radionReportInput{
        display: flex;
    }

    .reportBodyDiv{
        background: white;
        position: relative;
        width: 900px;
        border-radius: 5px;
        direction: rtl;
        padding: 60px;
    }

    .closeReport{
        left: 10px !important;
        right: auto !important;
        top: 10px !important;
    }

    .reportHeaderTxt{
        display: block;
        margin: -5px 0 8px;
        font-size: 26px;
        line-height: 30px;
        color: #4a4a4a;
    }

    .reportContainer{
        width: 100%;
        font-size: 12px;
        margin-top: 20px;
        margin-right: 40px;
    }

    .reportsRow{
        margin-top: 5px;
    }

    .submitReportOptions{
        direction: ltr;
    }

    .reportLabel{
        display:flex;
        cursor: pointer;
        align-items: center;
        padding-left: 15px;
    }
    .reportLabel > div{
        margin-right: 5px;
        font-size: 14px;
    }
    @media (max-width: 700px) {
        .reportBodyDiv{
            padding: 20px;
        }
        .reportContainer{
            margin-top: 10px;
            margin-right: 15px;
        }
        .reportLabel > div{
            font-size: 11px;
            max-width: 85%;
        }
    }
</style>
<div id="reportPane" class="reportBackGround">
    <div class="reportBodyDiv">
        <div class="reportHeaderTxt">گزارش</div>
        <div>
            گزارش خود را از بین موضوعات موجود انتخاب نمایید
        </div>
        <div class="body_text">
            <fieldset id="reportContainer" class="reportContainer"></fieldset>
            <div id="reportTextDiv" style="display: none">
                <textarea name="reportText" id="reportText" class="form-control" rows="5" style="width: 100%" placeholder="اگر توضیحی دارید اینجا بنویسید...."></textarea>
            </div>
            <br>
            <div class="submitReportOptions">
                <button onclick="sendReport()" class="btn btn-success" style="color: #FFF;background-color: var(--koochita-light-green);border-color:var(--koochita-light-green);">تایید</button>
                <input type="submit" onclick="closeReportPrompt()" value="خیر" class="btn btn-default">
            </div>
            <div id="errMsgReport" style="color: red"></div>
        </div>
        <div onclick="closeReportPrompt()" class="ui_close_x closeReport"></div>
    </div>
</div>

<script>
    let reportValue = 0;
    let reportLogId = 0;
    let getReportsQuestionsKindPlaceId = 0;
    let getReportsDir = '{{route('getReportQuestions')}}';

    function getReportsQuestions(_kindPlaceId){
        if(getReportsQuestionsKindPlaceId != _kindPlaceId) {
            getReportsQuestionsKindPlaceId = _kindPlaceId;
            $.ajax({
                type: 'post',
                url: getReportsDir,
                data: {
                    'kindPlaceId': _kindPlaceId
                },
                success: function (response) {

                    response = JSON.parse(response);

                    let text = '';
                    response.result.forEach(item => {
                        text +=  '<div class="row reportsRow">\n' +
                            '<div class="filterItem lhrFilter filter selected radionReportInput">\n' +
                            '<input id="report_' + item.id + '" name="reportValue" type="radio" value="' + item.id + '" onchange="openReportTxt(this.value)"/>\n' +
                            '<label class="reportLabel" for="report_' + item.id + '">\n' +
                            '<span></span>\n' +
                            '<div>' + item.description + '</div>\n' +
                            '</label>\n' +
                            '</div>\n' +
                            '</div>';
                    });

                    text +=  '<div class="row reportsRow">\n' +
                        '<div class="filterItem lhrFilter filter selected radionReportInput">\n' +
                        '<input id="report_more" name="reportValue" type="radio" value="more" onchange="openReportTxt(this.value)"/>\n' +
                        '<label class="reportLabel" for="report_more">\n' +
                        '<span></span>\n' +
                        '<div>سایر موارد</div>\n' +
                        '</label>\n' +
                        '</div>\n' +
                        '</div>';

                    $('#reportContainer').html(text);

                }
            });
        }
        else{
            $('input:radio[name=reportValue]').each(function () { $(this).prop('checked', false) });
            $('#reportTextDiv').css('display', 'none');
        }
    }

    function sendReport() {
        if(reportValue != 0 && reportLogId != 0 && checkLogin) {
            let reportTxt = $('#reportText').val();

            $.ajax({
                type: 'post',
                url: '{{route('storeReport')}}',
                data: {
                    "logId": reportLogId,
                    "reports": reportValue,
                    "customMsg": reportTxt
                },
                success: function (response) {
                    if(response == 'ok'){
                        closeReportPrompt();
                        showSuccessNotifi('{{__("گزارش شما با موفقیت ثبت شد.")}}', 'left', 'var(--koochita-blue)');
                    }
                    else if(response == 'nok2')
                        showSuccessNotifi('{{__("شما برای مطلب خود نمی توانید گزارش دهید.")}}', 'left', 'red');
                    else
                        showSuccessNotifi('{{__("در ثبت گزارش مشکلی پیش آمده لطفا دوباره تلاش کنید.")}}', 'left', 'red');
                },
                catch(e){
                    console.log(e);
                    showSuccessNotifi('{{__("در ثبت گزارش مشکلی پیش آمده لطفا دوباره تلاش کنید.")}}', 'left', 'red');
                }
            });
        }
        else if(reportValue == 0)
            showSuccessNotifi('{{__("لطفا نوع گزارش خود را مشخص کنید.")}}', 'left', 'red');
    }

    function closeReportPrompt() {
        $('#reportPane').css('display', 'none');
    }

    function showReportPrompt(_logId, _kindPlaceId) {
        if(checkLogin) {
            reportValue = 0;
            reportLogId = _logId;
            getReportsQuestions(_kindPlaceId);
            $('#reportPane').css('display', 'flex');
        }
    }

    function openReportTxt(_value){
        reportValue = _value;
        if(reportValue == 'more')
            $('#reportTextDiv').css('display', 'block');
        else
            $('#reportTextDiv').css('display', 'none');
    }
</script>