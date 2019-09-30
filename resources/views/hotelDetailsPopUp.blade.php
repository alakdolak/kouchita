<link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hotelDetailsPopUp.css')}}'/>

<span id="addPlaceToTripPrompt"
      class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in hidden">
    <div class="body_text">
        <div>
            <div class="find_location_modal">
                <div class="rtl header_text">لیست سفر</div>
                <div class="ui_typeahead rtl">برای برنامه ریزی سفر، این مکان را به سفر خود اضافه کنید</div>
                <div class="ui_typeahead rtl" id="tripsForPlace"></div>
            </div>
        </div>
    </div>
    <div class="submitOptions rtl">
        <button onclick="assignPlaceToTrip()" class="btn btn-success">تایید</button>
        <input type="submit" onclick="hideElement('addPlaceToTripPrompt')" value="خیر" class="btn btn-default">
        <p id="errorAssignPlace"></p>
    </div>
    <div class="ui_close_x" onclick="hideElement('addPlaceToTripPrompt')"></div>
</span>

<span id="ansSubmitted" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in hidden">
    <div class="body_text">
        <div>
            <div class="find_location_modal">
                <p>پاسخ شما با موفقیت ثبت گردید و پس از نظارت محتوایی در سایت قرار خواهد گرفت.</p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('ansSubmitted')"></div>
</span>

<span id="questionSubmitted" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in hidden">
    <div class="body_text">
        <div>
            <div class="find_location_modal">
                <p>سوال شما با موفقیت ثبت گردید و پس از نظارت محتوایی در سایت قرار خواهد گرفت.</p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="closePublish()"></div>
</span>

<span id="photoSubmitted" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in hidden">
    <div class="body_text">
        <div>
            <div class="find_location_modal">
                <p>عکس شما با موفقیت ثبت گردید و پس از نظارت محتوایی در سایت قرار خواهد گرفت.</p>
            </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('photoSubmitted')"></div>
</span>

<div class="ui_backdrop dark display-none"></div>

<span id="reportPane" class="ui_overlay ui_modal editTags hidden">
    <div class="header_text">گزارش</div>
    <div class="subheader_text">
   گزارش خود را از بین موضوعات موجود انتخاب نمایید
    </div>
    <div class="body_text">
        <fieldset id="memberTags">
            <div class="reports" id="reports">
            </div>
        </fieldset>
        <br>
        <div class="submitOptions">
            <button onclick="sendReport()" class="btn btn-success">تایید</button>
            <input type="submit" onclick="closeReportPrompt()" value="خیر" class="btn btn-default">
        </div>
        <div id="errMsgReport"></div>
    </div>
    <div onclick="closeReportPrompt()" class="ui_close_x"></div>
</span>

<span id="rules" class="ui_overlay ui_modal editTags hidden">
    <div class="header_text">قبل از ارسال سوال و یا جواب به موارد زیر توجه کنید.</div>
    <div class="body_text">
        <ul>
            <li>سوال شما باید کاملا مرتبط به این مکان باشد و همچنین جواب شما می بایست کاملا مرتبط به سوال باشد.</li>
            <li>لینک، اطلاعات تماس و تبلیغات به طور کامل ممنوع می باشد.</li>
            <li>نام بردن از اشخاص حقیقی یا اطلاعات تماس آن ممنوع می باشد.</li>
            <li>اگر سوال شما در خصوص جزئیات یک مکان است شاید بهتر باشد با روابط عمومی آن مجموعه از طریق اطلاعات تماس، ارتباط برقرار کنید.</li>
        </ul>
    </div>
    <div onclick="$('#rules').addClass('hidden')" class="ui_close_x"></div>
</span>

<script>
    function writeFileName(val) {
        $("#fileName").empty().append(val);
    }
</script>

@include('layouts.photoAlbum')

<span class='ui_overlay ui_popover arrow_right img_popUp hidden' id="lastSpanHotelDetailsPopUp"></span>