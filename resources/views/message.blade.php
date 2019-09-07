<?php $mode = "message"; $user = Auth::user(); ?>
@extends('layouts.bodyProfile')

@section('header')
    @parent

    <style>
        .alaki::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        .alaki::-webkit-scrollbar
        {
            width: 12px;
            background-color: #F5F5F5;
        }

        .alaki::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>

@stop

@section('main')
<style>

    input[type="checkbox"] {
        display:none;
    }

    input[type="checkbox"] + label {
        color:#666666;
    }
    input[type="checkbox"] + label span, input[type="radio"] + label span {
        display:inline-block;
        width:19px;
        height:19px;
        margin:-2px 10px 0 0;
        vertical-align:middle;
        background:url('{{URL::asset('images/check_radio_sheet.png')}}') left top no-repeat;
        cursor:pointer;
    }

    input[type="checkbox"]:checked + label span, input[type="radio"]:checked + label span{
        background:url('{{URL::asset('images/check_radio_sheet.png')}}') -19px top no-repeat;

    }

    .labelForCheckBox:before{
        background-color: transparent !important;
        border: none !important;
        content: "" !important;
    }

</style>
    <div id="MAIN" class="Messages
               prodp13n_jfy_overflow_visible
               ">
        <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2">
            <div class="wrpHeader">
            </div>
            <h1 class="heading wrap" style="padding-bottom:10px; ">
                پیام های من
            </h1>

            @if(!empty($err))
                <center><p style="color: #963019">{{$err}}</p></center>
            @endif

            <div class="main_content" id="MESSAGES_CONTENT">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="mb_12" id="PROFILE_MESSAGING">
                    <tr>
                        <td style="vertical-align: top;">

                            <div class="floatLeft" style="width: 150px;">
                                <div class="saveLeftNav" style="cursor: pointer">
                                    <div id="inboxFolder" onclick="inboxMode('inboxFolder', 'inbox', 'tableId', 'outbox', 'sendMsgDiv', 'showMsgContainer', 'reportPrompt', 'blockPrompt')" style="cursor: pointer" class="menu_bar">
                                        <div class="displayFolder">
                                            <a onclick="" class="saveLink">
                                                <strong>
                                                    <span>پیام های ورودی </span>
                                                    <span>(</span>
                                                    <span>{{$inMsgCount}}</span>
                                                    <span>)</span>
                                                </strong>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="outboxFolder" onclick="outboxMode('outboxFolder', 'inbox', 'tableId', 'sendMsgDiv', 'showMsgContainer', 'reportPrompt', 'blockPrompt')" style="cursor: pointer" class="menu_bar">
                                        <div class="displayFolder">
                                            <a onclick="" class="saveLink">
                                                <strong>
                                                    <span>پیام های خروجی </span>
                                                    <span>(</span>
                                                    <span>{{$outMsgCount}}</span>
                                                    <span>)</span>
                                                </strong>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="sendFolder" onclick="sendMode('sendFolder', 'inbox', 'sendMsgDiv', 'showMsgContainer', 'reportPrompt', 'blockPrompt')" style="cursor: pointer" class="menu_bar">
                                        <div class="displayFolder">
                                            <a class="saveLink">
                                                <strong>ارسال پیام</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td style="vertical-align: top;" id="inbox">
                            <div class="alignLeft">
                                <div class="p5" style="background-color:#F4F4F4;">

                                    <div class="messagingButton">
                                        <a rel="nofollow" class="buttonLink" onclick="setAllChecked()">
                                            <div class="m2m_link">
                                                <div style="cursor: pointer;">
                                                    <div class="m2m_copy">
                                                        {{--<img id="selectAllImg" src="{{URL::asset('images') . '/selectAll.gif'}}" border="0" align="absmiddle" style="margin-left:8px;"/>--}}
                                                        <div id="selectAllImg" style="display: inline-block;margin-left: 5px; background-size: 13px;background-position:  0 -66px;width: 13px;height:  14px;background-image: url('{{URL::asset('images') . 'all_messages.png'}}');background-repeat:  no-repeat;"></div>
                                                        <span style="color: #16174f;" id="selectAll">انتخاب همه</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="messagingButton">
                                        <a class="buttonLink">
                                            <div class="m2m_link">
                                                <div style="cursor: pointer;">
                                                    <div class="m2m_copy" style="color: #16174f;" onclick="showConfirmationForDelete()">
                                                        {{--<img src="{{URL::asset('images') . '/deleteIcon.gif'}}" border="0" alt="Delete" align="absmiddle" style="margin-left:8px;"/>--}}
                                                        <div style="display: inline-block;margin-left: 5px; background-size: 14px;background-position:  0 -1px;width: 13px;height:  13px;background-image: url('{{URL::asset('images') . 'all_messages.png'}}');background-repeat:  no-repeat;"></div>
                                                        <input name="deleteMsg"  type="submit" style="background: transparent; border: none; margin-right: -5px" value="حذف">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="messagingButton">
                                        <a rel="nofollow" class="buttonLink" onclick="getBlockList('blockPrompt', 'blocks', 'reportPrompt')">
                                            <div class="m2m_link">
                                                <div style="cursor: pointer;">
                                                    <div style="color: #16174f;" class="m2m_copy">
                                                        {{--<img src="{{URL::asset('images') . '/memberBlock.gif'}}" border="0" alt="Block" align="absmiddle" style="margin-left:8px;"/>بلاک--}}
                                                        <div style="display: inline-block;margin-left: 5px; background-size: 13px;background-position:  0 -49px;width: 13px;height:  15px;background-image: url('{{URL::asset('images') . 'all_messages.png'}}');background-repeat:  no-repeat;"></div>
                                                        <span>بلاک</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="messagingButton" id="reportSpamButton">
                                        <a id="reportSpam" rel="nofollow" class="buttonLink" onclick="showReportPrompt('reportPrompt', 'showMsgContainer', 'blockPrompt')">
                                            <div class="m2m_link">
                                                <div style="cursor: pointer;color: #16174f;">
                                                    <div class="m2m_copy">
                                                        {{--<img src="{{URL::asset('images') . '/m2m_reportAbuse.gif'}}" border="0" alt="Report spam" align="absmiddle" style="margin-left:8px;"/>گزارش--}}
                                                        <div style="display: inline-block;margin-left: 5px; background-size: 15px;background-position:  0 -38px;width: 13px;height:  15px;background-image: url('{{URL::asset('images') . 'all_messages.png'}}');background-repeat:  no-repeat;"></div>
                                                        <span>گزارش</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="clear" style="margin-top: 5px;">

                                        <tr class="inboxHeaders">
                                            <th class="SortNavOff" style="width: 15%">
                                                <a href="" title="Sort by: From" style="text-align: center">ارسال شده از / به
                                                    {{--<img src="{{URL::asset('images') . '/blackNavArrowUp.gif'}}" width="7" height="4" hspace="10" border="0" align="absmiddle"/>--}}
                                                    {{--<div style="display: inline-block;margin-left: 5px; background-size: 15px;background-position:  0 -38px;width: 13px;height:  15px;background-image: url('{{URL::asset('images') . 'all_messages.png'}}');background-repeat:  no-repeat;"></div>--}}
                                                </a>
                                            </th>
                                            <th class="SortNavOff" style="width: 55%">
                                                <a href="" title="Sort by: Subject" style="text-align: center">موضوع
                                                    {{--<img src="{{URL::asset('images') . '/blackNavArrowUp.gif'}}" width="7" height="4" hspace="10" border="0" align="absmiddle"/>--}}
                                                    {{--<div style="display: inline-block;margin-left: 5px; background-size: 15px;background-position:  0 -38px;width: 13px;height:  15px;background-image: url('{{URL::asset('images') . 'all_messages.png'}}');background-repeat:  no-repeat;"></div>--}}
                                                </a>
                                            </th>
                                            <th class="SortNavOn" style="width: 15%; background-color: white; text-align: center">
                                                <a onclick="sortByDate('tableId', 'dateIcon')" title="Sort by: Date" style="text-align: center">تاریخ
                                                    {{--<img id="dateIcon" src="{{URL::asset('images') . '/blackNavArrowUp.gif'}}" width="7" height="4" hspace="10" border="0" align="absmiddle"/>--}}
                                                    <div id="dateIcon" style="display: inline-block;margin-right: 5px; background-size: 10px;background-position:  4px -62px;width: 16px;height:  8px;background-image: url('{{URL::asset('images') . 'all_messages.png'}}');background-repeat:  no-repeat;"></div>
                                                </a>
                                            </th>
                                            <th class="SortNavOff" id="select-title" style="text-align: center; background-color: white">
                                                <span>انتخاب</span>
                                            </th>
                                        </tr>
                                    </table>

                                    <table id="tableId" width="100%" border="0" cellspacing="0" cellpadding="0" class="clear" style="margin-top: 5px">
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <center id="sendMsgDiv" style="visibility: hidden; margin-top: -10%">
                <div class="row">
                    <form method="post" action="{{route('sendMsg')}}" class="form-horizontal" id="contact_form">
                        {{csrf_field()}}
                        <fieldset style="margin: 100px">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" style="float: right; margin-right: 190px">نام کاربری</label>
                                <div  style="width: 350px">
                                    <input id="name" onkeyup="searchForMyContacts()" name="destUser" type="text" placeholder="لطفا نام کاربری خود را وارد نمایید " class="form-control input-md" required=""  maxlength="40">
                                    <div id="result" class="data_holder" style="max-height: 160px; overflow: auto; margin-top: 10px;"></div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" style="float: right; margin-right: 202px">موضوع</label>
                                <div style="width: 350px">
                                    @if(isset($subject) && !empty($subject))
                                        <input name="subject" value="{{$subject}}" maxlength="40" type="text" placeholder="لطفا موضوع پیام خود را وارد نمایید" class="form-control input-md" required="">
                                    @else
                                        <input name="subject" maxlength="40" type="text" placeholder="لطفا موضوع پیام خود را وارد نمایید" class="form-control input-md" required="">
                                    @endif
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="control-label" style="float: right; margin-right: 218px">پیام</label>
                                <div  style="width: 350px">
                                    @if(isset($currMsg) && !empty($currMsg))
                                        <textarea class="form-control" id="msg" name="msg"  placeholder="حداکثر 1000 کاراکتر" style="width: 350px;height: 130px;"></textarea>
                                    @else
                                        <textarea class="form-control" id="msg" name="msg" cols="8" rows="8" style="width: 350px;height: 130px;" placeholder="حداکثر 1000 کاراکتر"></textarea>
                                    @endif
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="control-label" for="submit"></label>
                                <div>
                                    <button style="background-color: #4dc7bc;border-color:#4dc7bc;" id="submit" name="sendMsg" class="btn btn-primary">ارسال پیام</button>
                                </div>
                                @if(isset($err) && !empty($err))
                                    <p style="color: red; margin-top: 20px">{{$err}}</p>
                                @endif
                            </div>

                        </fieldset>
                    </form>
                </div>
            </center>

            <span id="reportPrompt" class="ui_overlay ui_modal editTags" style="visibility: hidden; position: fixed; left: 33%; right: auto; top: 15%; bottom: auto;width: 33%;">
                    <div class="header_text" style="margin-bottom: 10px;">گزارش</div>
                    <div class="subheader_text">
دلیل گزارش خود را از موارد ذیل انتخاب کنید
                    </div>
                    <div class="body_text alaki" style="max-height: 300px; overflow: auto">
                        <fieldset id="memberTags">
                            <div class="reports" id="reports">
                            </div>
                        </fieldset>
                        <div class="submitOptions">
                            <button style="background-color: #4dc7bc;border-color:#4dc7bc;" onclick="sendReport('reportPrompt')" class="btn btn-success">تایید</button>
                            <input type="submit" onclick="closeReportPrompt('reportPrompt')" value="خیر" class="btn btn-default">
                        </div>
                    </div>
                    <div onclick="closeReportPrompt('reportPrompt')" class="ui_close_x"></div>
                </span>

            <span id="showMsgContainer" class="ui_overlay ui_modal editTags" style="visibility: hidden; bottom: auto;left: 32%;position: fixed;right: auto;top:15%;width: 36%;">
            </span>

            <span id="blockPrompt" class="ui_overlay ui_modal editTags" style="visibility: hidden; position: fixed; left: 34%; right: auto; top: 29%; bottom: auto;width: 30%;">
                    <div class="header_text" style="margin-bottom: 10px;">محدود سازی ارتباط</div>
                    <p>کاربران زیر با شما در ارتباط هستند با انتخاب آن ها، ارتباطشان با خود را محدود می سازید.</p>

                    <p style="font-size: 10px;">برای رفع محدودیت ، کاربر مورد نظر را از حالت انخاب خارج نمایید.</p>
                    <div class="subheader_text">
لیست کاربران
                    </div>
                    <div class="body_text">
                        <fieldset id="memberTags">
                            <div id="blocks"></div>
                        </fieldset>
                        <div class="submitOptions">
                            <button style="background-color: #4dc7bc;border-color:#4dc7bc;" onclick="blockUser('blockPrompt')" class="btn btn-success">تایید</button>
                            <input type="submit" onclick="closeReportPrompt('blockPrompt')" value="خیر" class="btn btn-default">
                        </div>
                    </div>
                    <div onclick="closeReportPrompt('blockPrompt')" class="ui_close_x"></div>
                </span>

            <span id="showMsgContainer" class="ui_overlay ui_modal editTags" style="visibility: hidden; bottom: auto;left: 32%;position: fixed;right: auto;top: 33%;width: 36%;">
            </span>

            <span class="ui_overlay ui_modal editTags" id="deleteMsg" style="visibility:hidden; position: fixed; left: 37%; right: auto; top: 29%; bottom: auto;width: 26%;">
                <p>آیا از پاک کردن پیام اطمینان دارید ؟</p>
                <br><br>
                <div class="body_text">

                    <div class="submitOptions">
                        <button style="background-color: #4dc7bc;border-color:#4dc7bc;" onclick="deleteSelectedMsgs()" class="btn btn-success">بله </button>
                        <input type="submit" onclick="hideConfirmationPane()" value="خیر" class="btn btn-default">
                    </div>
                </div>

                <div onclick="hideConfirmationPane()" class="ui_close_x"></div>

            </span>

            <div class="ui_backdrop dark" style="display: none;"></div>
        </div>
    </div>

    <script>

        var getListOfMsgsDir = '{{route('getListOfMsgsDir')}}';
        var getBlockListDir = '{{route('getBlockListDir')}}';
        var blockDir = '{{route('block')}}';
        var getMessage = '{{route('getMessage')}}';
        var getReportsDir = '{{route('getReportsDir')}}';
        var sendReportDir = '{{route('sendReport')}}';
        var sendMsgDir = '{{route('sendReceiveReport')}}';
        var opOnMsgs = '{{route('opOnMsgs')}}';
        var msgs = '{{route('msgs')}}';
        var searchForMyContactsDir = '{{route('searchForMyContacts')}}';
        var upArrow = '{{URL::asset('images') . '/blackNavArrowUp.gif'}}';
        var downArrow = '{{URL::asset('images') . '/blackNavArrowDown.gif'}}';
        var deselect = '{{URL::asset('images') . '/deselectAll.gif'}}';
        var select = '{{URL::asset('images') . '/selectAll.gif'}}';

        $(document).ready(function () {

            err = "{{(isset($err) && !empty($err)) ? "err" : ""}}";
            errMode = "{{(isset($currMsg) && isset($subject) && !empty($currMsg) && !empty($subject)) ? "true" : "false"}}";

            if(err == "" || (err.length != 0 && errMode == "false"))
                inboxMode('inboxFolder', 'inbox', 'tableId', 'outbox', 'sendMsgDiv', 'showMsgContainer', 'reportPrompt', 'blockPrompt');
            else
                sendMode('sendFolder', 'inbox', 'sendMsgDiv', 'showMsgContainer', 'reportPrompt', 'blockPrompt');
        });

    </script>

    <script>
        var mode = false;
        var sortMode = 'DESC';
        var containerMode = 'inbox';

        function setAllChecked() {

            if(!mode) {
                $("input:checkbox[name='selectedMsg[]']").each(function() {
                    this.checked = true;
                });
                $("#selectAll").text("غیر فعال کردن همه");
                $("#selectAllImg").css('background-position', -16 + 'px');
            }
            else {
                $("input:checkbox[name='selectedMsg[]']").each(function() {
                    this.checked = false;
                });
                $("#selectAll").text("فعال کردن همه");
                $("#selectAllImg").css('background-position', -16 + 'px');
            }

            mode = !mode;
        }

        function searchForMyContacts() {

            if($("#name").val().length < 3) {
                $("#result").empty();
                return;
            }

            $.ajax({
                type: 'post',
                url: searchForMyContactsDir,
                data: {
                    'key': $("#name").val()
                },
                success: function (response) {

                    $("#result").empty();

                    if(response.length != 0) {

                        response = JSON.parse(response);
                        newElement = "";

                        for(i = 0; i < response.length; i++) {
                            newElement += "<p style='cursor: pointer' onclick='setUserName(\"" + response[i].username + "\")'>" + response[i].username + "</p>";
                        }

                        $("#result").append(newElement);
                    }

                }
            });

        }

        function setUserName(val) {
            $("#name").val(val);
            $("#result").empty();
        }

        function customReport(element, checkBoxId) {

            if($("#" + checkBoxId).is(':checked')) {
                newElement = "<div class='col-xs-12'>";
                newElement += "<textarea id='customDefinedReport' style='height: auto;margin-top: 5px;min-height: 100px;padding: 5px !important;width: 100%;' maxlength='1000' required placeholder=' دلیل گزارش خود را به طور کامل وارد نمایید'></textarea>";
                newElement += "</label></div>";
                $("#" + element).empty().append(newElement).css("visibility", "visible");
            }
            else {
                $("#" + element).empty().css("visibility", "hidden");
            }
        }

        function getReports(element) {

            $("#" + element).empty();

            $.ajax({
                type: 'post',
                url: getReportsDir,
                success: function (response) {

                    response = JSON.parse(response);

                    newElement = "<div id='reportContainer' class='row'>";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<div class='col-xs-12'>";
                        newElement += "<label>";
                        newElement += "<div class='ui_input_checkbox'>";
                        newElement += "<input id='desc_" + response[i].id + "' type='checkbox' name='reports' value='" + response[i].id + "'>";
                        newElement += "<label class='labelForCheckBox' for='desc_" + response[i].id + "'><span></span>&nbsp;&nbsp;" + response[i].description + "</label>";
                        newElement += "</div>";
                        newElement += "</label>";
                        newElement += "</div>";
                    }

                    newElement += "<div class='col-xs-12'>";
                    newElement += "<label>";
                    newElement += "<div class='ui_input_checkbox'>";
                    newElement += "<input id='custom-checkBox' onchange='customReport(\"custom-define-report\", \"custom-checkBox\")' type='checkbox' name='reports' value='-1'>";
                    newElement += "<label class='labelForCheckBox' for='custom-checkBox'><span></span>&nbsp;&nbsp;سایر موارد</label>";
                    newElement += "</div>";
                    newElement += "</label>";
                    newElement += "</div>";

                    newElement += "<div id='custom-define-report' style='visibility: hidden'></div>";

                    newElement += "</div>";

                    $("#" + element).append(newElement);

                }
            });
        }

        function sendReport(reportContainer) {

            customMsg = "";

            if($("#customDefinedReport").val() != null)
                customMsg = $("#customDefinedReport").val();

            var checkedValuesReports = $("input:checkbox[name='reports']:checked").map(function() {
                return this.value;
            }).get();

            var checkedValuesMsgs = $("input:checkbox[name='selectedMsg[]']:checked").map(function() {
                return this.value;
            }).get();

            if(checkedValuesReports.length <= 0 || checkedValuesMsgs <= 0)
                return;

            $.ajax({
                type: 'post',
                url: sendReportDir,
                data: {
                    "checkedValuesReports": checkedValuesReports,
                    "checkedValuesMsgs" : checkedValuesMsgs,
                    "customMsg" : customMsg
                },
                success: function (response) {
                    if(response == "ok") {

                        $.ajax({
                            type: 'post',
                            url: sendMsgDir,
                            data: {
                                'checkedValuesReports': checkedValuesReports,
                                "customMsg" : customMsg
                            },
                            success: function (response) {
                                closeReportPrompt(reportContainer);
                            }
                        });
                    }
                }
            });
        }

        function closeReportPrompt(element) {
            $("#" + element).css("visibility", 'hidden');
            $("#custom-define-report").css("visibility", 'hidden');
            $('.dark').hide();
        }

        function showReportPrompt(element, showMsgContainer, blockPrompt) {

            var checkedValues = $("input:checkbox[name='selectedMsg[]']:checked").map(function() {
                return this.value;
            }).get();

            if(checkedValues.length > 0) {
                $('.dark').show();
                $("#" + showMsgContainer).css("visibility", 'hidden');
                $("#" + blockPrompt).css("visibility", "hidden");
                $("#" + element).css("visibility", 'visible');
                getReports("reports");
            }
        }

        function sendMode(sendFolder, inbox, msgContainer, showMsgContainer, reportContainer, blockContainer) {
            $("#" + showMsgContainer).css("visibility", 'hidden');
            $("#" + reportContainer).css("visibility", 'hidden');
            $("#" + blockContainer).css("visibility", 'hidden');
            $("#" + inbox).css("visibility", 'hidden');
            $(".menu_bar").removeClass("selectedFolder");
            $("#" + sendFolder).addClass("selectedFolder");
            $("#" + msgContainer).css("visibility", 'visible');

            containerMode = "send";
        }

        function inboxMode(inboxFolder, inbox, table, msgContainer, showMsgContainer, reportContainer, blockContainer) {
            $("#" + showMsgContainer).css("visibility", 'hidden');
            $("#" + reportContainer).css("visibility", 'hidden');
            $("#" + blockContainer).css("visibility", 'hidden');
            $("#" + inbox).css("visibility", "visible");
            $(".menu_bar").removeClass("selectedFolder");
            $("#" + inboxFolder).addClass("selectedFolder");
            $("#" + msgContainer).css("visibility", 'hidden');

            containerMode = "inbox";

            showTable(table, true);
        }

        function outboxMode(outboxFolder, inbox, table, msgContainer, showMsgContainer, reportContainer, blockContainer) {
            $("#" + showMsgContainer).css("visibility", 'hidden');
            $("#" + reportContainer).css("visibility", 'hidden');
            $("#" + blockContainer).css("visibility", 'hidden');
            $("#" + msgContainer).css("visibility", 'hidden');
            $("#" + inbox).css("visibility", "visible");
            $(".menu_bar").removeClass("selectedFolder");
            $("#" + outboxFolder).addClass("selectedFolder");

            containerMode = "outbox";

            showTable(table, false);
        }

        function showMsg(id, element, mode) {

            $('.dark').show();
            $("#" + element).empty();

            $.ajax({

                type: 'post',
                url: getMessage,
                data: {
                    mId: id
                },
                success: function (response) {
                    response = JSON.parse(response);

                    newElement = "<div style='color: #16174f;' class='header_text'> موضوع :  " + response.subject + "</div><br>";
                    if(mode)
                        newElement += "<div style='color: #16174f;' class='header_text'> ارسال شده از طرف  :  " + response.senderId + "</div><br>";
                    else
                        newElement += "<div class='header_text'> ارسال شده به  :  " + response.receiverId + "</div><br>";
                    newElement += "<div class='header_text'> تاریخ ارسال  :  " + response.date + "</div><br><br>";
                    newElement += "<div class='subheader_text'><p class='alaki' style='font-size: 16px;color: #000;max-height: 200px; height: 200px; overflow: auto;'>" + response.message + "</p></div>";
                    newElement += "<div onclick='closeReportPrompt(\"" + element + "\")' class='ui_close_x'></div>";

                    $("#" + element).append(newElement).css("visibility", 'visible');
                }

            });
        }

        function showTable(element, mode) {

            $("#" + element).empty();

            $.ajax({

                type: 'post',
                url: getListOfMsgsDir,
                data: {
                    'mode': mode,
                    'sortMode' : sortMode
                },
                success: function (response) {

                    response = JSON.parse(response);

                    if(response.length == 0) {
                        newElement = "<tr class='bottomNav'>";
                        newElement += "<td align='right' class='p5' colspan='4'>";
                        newElement += "هیچ پیامی موجود نیست";
                        newElement += "</td></tr>";
                        $("#" + element).append(newElement);
                    }

                    else {
                        for(i = 0; i < response.length; i++) {
                            newElement = '<tr class="bottomNav">';
                            newElement += '<td style="width: 15%; text-align: center">' + response[i].target + '</td>';
                            newElement += "<td onclick='showMsg(" + response[i].id + ", \"showMsgContainer\", " + mode + ")' style='cursor: pointer; width: 55%; text-align: center'>" + response[i].subject + "</td>";
                            newElement += "<td style='width: 15%; text-align: center'>" + response[i].date + "</td>";
                            newElement += "<td style='text-align: center'>";
                            newElement += "<div class='ui_input_checkbox'>";
                            newElement += "<input id='msg_" + response[i].id + "' name='selectedMsg[]' value='" + response[i].id + "' type='checkbox'>";
                            newElement += "<label class='labelForCheckBox' for='msg_" + response[i].id + "'><span></span>&nbsp;&nbsp;</label>";
                            newElement += "</div></td></tr>";
                            $("#" + element).append(newElement);
                        }
                    }
                }
            });

        }

        function getBlockList(blockContainer, blockList, reportPrompt) {
            $('.dark').show();

            $("#" + blockList).empty();

            $.ajax({
                type: 'post',
                url: getBlockListDir,
                success: function (response) {

                    response = JSON.parse(response);

                    newElement = "";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<div class='ui_input_checkbox'>";
                        if(response[i].block == "1")
                            newElement += "<input id='block_" + response[i].senderId  + "' type='checkbox' name='blocks[]' checked value='" + response[i].senderId + "'>";
                        else
                            newElement += "<input id='block_" + response[i].senderId  + "' type='checkbox' name='blocks[]' value='" + response[i].senderId + "'>";
                        newElement += "<label class='labelForCheckBox' for='block_" + response[i].senderId  + "'><span></span>&nbsp;&nbsp;" + response[i].senderName + "</label>";
                        newElement += "</div>";
                    }

                    $("#" + blockList).append(newElement);
                    $("#" + reportPrompt).css("visibility", "hidden");
                    $("#" + blockContainer).css("visibility", 'visible');
                }
            });
        }

        function blockUser(element) {

            var blockList = $("input:checkbox[name='blocks[]']:checked").map(function() {
                return this.value;
            }).get();

            $.ajax({
                type: 'post',
                url: blockDir,
                data: {
                    "blockList": blockList
                },
                success: function (response) {
                    if(response == "ok") {
                        alert("عملیات مورد نظر انجام پذیرفت");
                        $("#" + element).css("visibility", "hidden");
                        $(".dark").hide();
                    }
                    else if(response == "nok") {
                        alert("شما اجازه ی بلاک کردن ادمین را ندارید");
                        $("#" + element).css("visibility", "hidden");
                        $(".dark").hide();
                    }
                }
            });
        }

        function sortByDate(element, icon) {

            if(sortMode == 'DESC') {
                sortMode = 'ASC';
//                $("#" + icon).css('src', upArrow);
                $("#" + icon).css('background-image', 'url("' + '{{URL::asset('images') . 'all_messages.png'}}' + '")')
                             .css('background-position', '4px -62px')
                             .css('background-size', '10px');
            }
            else {
                sortMode = 'DESC';
//                $("#" + icon).css('src', downArrow);
                $("#" + icon).css('background-image', 'url("' + '{{URL::asset('images') . 'tripplace.png'}}' + '")')
                             .css('background-position', '-3px -81px')
                             .css('background-size', '21px');
            }
            if(containerMode == "inbox")
                showTable(element, true);
            else
                showTable(element, false);
        }

        function confirmationBeforeSubmit() {
            $(".dark").show();
            $("#deleteMsg").css('visibility', 'visible');
        }

        function hideConfirmationPane() {
            $("#deleteMsg").css('visibility', 'hidden');
            $(".dark").hide();
        }

        function deleteSelectedMsgs() {

            var checkedValues = $("input:checkbox[name='selectedMsg[]']:checked").map(function() {
                return this.value;
            }).get();

            if(checkedValues.length > 0) {
                $.ajax({
                    type: 'post',
                    url: opOnMsgs,
                    data: {
                        'selectedMsgs': checkedValues
                    },
                    success: function (response) {
                        if(response == "ok")
                            document.location.href = msgs;

                    }
                });
            }
        }

        function showConfirmationForDelete() {

            var checkedValues = $("input:checkbox[name='selectedMsg[]']:checked").map(function() {
                return this.value;
            }).get();

            if(checkedValues.length > 0)
                confirmationBeforeSubmit();
        }

    </script>

@stop