<link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
<link rel="stylesheet" href="{{URL::asset('css/theme2/pop-up-create-trip.css?v=1')}}">
<style>
    .tripModalBack{
        position: fixed;
        top: 0px;
        right: 0px;
        background: #0000009c;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        display: none;
        z-index: 99;
        direction: rtl;
    }

    .tripModalBase {
        width: 60%;
        overflow: hidden;
        background: white;
        height: auto;
        padding: 40px;
        position: relative;
        padding-bottom: 10px;
    }

    .tripModalBase > div:nth-child(2) > button {
        color: #FFF;
        background-color: #4dc7bc;
        border-color: #4dc7bc;
    }

    #tripsForPlace {
        display: inline-block;
        width: 100%;
        margin: 10px 0;
        border: 1px solid #e5e5e5;
        border-radius: 5px;
    }

    #tripsForPlace .row {
        display: inline-block;
        width: 100%;
        max-height: 300px;
        overflow: auto;
        margin: 0;
    }

    #tripsForPlace .row:after, #tripsForPlace .row::before {
        display: none;
    }

    #tripsForPlace .row .addPlaceBoxes {
        width: auto;
        margin: 10px;
        display: inline-block;
        float: none;
        overflow-y: hidden;
    }

    #tripsForPlace .row .addPlaceBoxes a {
        margin: 0 0 21px 0;
    }

    .tripCloseIcon{
        position: absolute;
        top: 5px;
        left: 10px;
        font-size: 30px;
        color: #4DC7BC;
        cursor: pointer;
    }
    .tripHeader{
        display: block;
        margin: -5px 0 8px;
        font-size: 26px;
        line-height: 30px;
        color: #4a4a4a;
        direction: rtl;
    }
    .is-create-trip {
        color: #00AF87 !important;
        background-blend-mode: overlay;
        width: 150px;
        height: 150px;
        cursor: pointer;
        margin: 0 0 10px 0;
        border-radius: 2px;
        display: -webkit-box;
        display: flex;
        line-height: initial;
        transition: background-color .2s ease, corder-color .2s ease;
        border: 1px solid #f5f5f5;
        justify-content: space-around;
        background-color: #e5e5e5;
    }

    .is-create-trip .tile-content {
        align-self: center;
        margin: 10px;
        padding: 0;
        box-sizing: inherit;
        cursor: pointer;
    }

    .addedTrip{
        width: 150px;
        height: 150px;
        background-color: #e5e5e5;
        margin-bottom: 0;
        border: 2px solid rgb(160, 160, 160);
        display: flex;
        flex-wrap: wrap;
    }
    .tripImage{
        width: 50%;
        height: 50%;
    }
    .selectedTrip{
        border: 2px solid rgb(77, 199, 188);
    }
    .tripNameInput{
        width: 100%;
        padding: 6px 12px;
        border: 1px solid #f5f5f5;
        border-radius: 2px;
        background-color: #fff;
        box-sizing: border-box;
        box-shadow: inset 0 2px 1px rgba(0, 0, 0, 0.1);
        font-size: 14px;
        font-family: inherit;
    }
    .tripNameInput:focus{
        border-color: rgb(77, 199, 188);
    }
    .saves-create-trip-button{
        border-color: #4dc7bc;
        background-color: #4dc7bc;
        color: #fff;
        float: left;
        margin-top: 15px;
    }
    .saves-create-trip-button.disabled{
        opacity: .35;
        border-color: transparent;
        box-shadow: none;
        cursor: auto;
    }
    .tripDates{
        display: flex;
        justify-content: space-between;
    }
    .tripDateInput{
        border: solid 1px #cccccc;
        border-radius: 5px;
        padding: 2px 5px;
    }
    .tripDateFooter{
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }
    .tripImageEmpty{

    }

    @media (max-width: 991px) {
        .tripModalBase{
            width: 95%;
            padding: 25px;
        }
    }

</style>

<script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>

<div id="addPlaceToTripPrompt" class="tripModalBack">
    <span class="tripModalBase">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="tripHeader">لیست سفر</div>
                    <div class="ui_typeahead rtl">برای برنامه ریزی سفر، این مکان را به سفر خود اضافه کنید</div>
                    <div class="ui_typeahead rtl" id="tripsForPlace"></div>
                </div>
            </div>
        </div>
        <div class="submitOptions rtl">
            <button onclick="assignPlaceToTrip()" class="btn btn-success">تایید</button>
            <input type="submit" onclick="$('#addPlaceToTripPrompt').hide()" value="خیر" class="btn btn-default">
            <p id="errorAssignPlace"></p>
        </div>
        <div class="iconClose tripCloseIcon" onclick="$('#addPlaceToTripPrompt').hide()"></div>
    </span>
</div>

<div id="newTripModal" class="tripModalBack">
    <div id="selectNewTripName" class="tripModalBase">
        <div class="modal-background"></div>
        <div style="width: 100%">
            <div class="iconClose tripCloseIcon" onclick="closeNewTrip()"></div>
            <div class="modal-card-head">
                <div class="tripHeader">ایجاد سفر </div>
            </div>
            <div class="modal-card-body">
                <div id="trip-title-input-region">
                    <div>
                        <label class="label">نام سفر</label>
                        <div class="control trip-title-control">
                            <input class="tripNameInput" id="tripName" onkeyup="checkEmpty()" type="text" maxlength="50" placeholder="حداکثر 50 کاراکتر" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-card-foot">
                <button id="saves-create-trip-button" onclick="nextStep()" class="btn btn-success saves-create-trip-button disabled">ایجاد سفر</button>
            </div>
        </div>
    </div>
    <div id="selectNewTripDate" class="tripModalBase" style="display: none;">
        <div style="width: 100%">
            <div class="iconClose tripCloseIcon" onclick="closeNewTrip()"></div>
            <div class="modal-card-head">
                <div class="tripHeader">افزودن تاریخ به سفر</div>
            </div>
            <div class="modal-card-body rtl">
                <div class="control add-dates-cta-text">
                    <p></p>
                </div>
                <div class="tripDates">
                    <div>
                        <div id="date_btn_start_edit">تاریخ شروع</div>
                        <label>
                            <span class="calendarIcon"></span>
                            <input id="date_input_start" class="tripDateInput" placeholder="روز/ماه/سال" required readonly type="text">
                        </label>
                    </div>
                    <div>
                        <div id="date_btn_end_edit">تاریخ اتمام</div>
                        <label>
                            <span class="calendarIcon"></span>
                            <input id="date_input_end" class="tripDateInput" placeholder="روز/ماه/سال" required readonly type="text">
                        </label>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
            <div class="tripDateFooter">
                <button id="add-dates-cta-cancel" onclick="backToNewTripName()" class="btn btn-success saves-create-trip-button" style="background: #d6d6d6; border: none; margin-left: 15px">بازگشت </button>
                <button id="add-dates-cta-save" onclick="saveTrip()" class="btn btn-success saves-create-trip-button">ذخیره</button>
            </div>

            <div >
                <h5 id="error"></h5>
            </div>
        </div>
    </div>
</div>


<script>
    var getPlaceTrips = '{{route('placeTrips')}}';
    var assignPlaceToTripDir = '{{route('assignPlaceToTrip')}}';
    var addTrip = '{{route('addTrip')}}';
    var myTrips = '{{route('myTrips')}}';

    var tripName;
    var selectedPlaceId;
    var selectedKindPlaceId;

    function saveToTripPopUp(placeId, kindPlaceId) {
        if (checkLogin) {
            openLoading();
            selectedPlaceId = placeId;
            selectedKindPlaceId = kindPlaceId;

            $.ajax({
                type: 'post',
                url: '{{route('placeTrips')}}',
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId
                },
                success: function (response) {
                    closeLoading();
                    selectedTrips = [];
                    response = JSON.parse(response);
                    console.log(response);

                    var newElement = "<center class='row'>";
                    for (i = 0; i < response.length; i++) {
                        newElement += "<div class='addPlaceBoxes cursor-pointer' onclick='addToSelectedTrips(\"" + response[i].id + "\")'>";
                        if (response[i].select == "1") {
                            newElement += "<div id='trip_" + response[i].id + "' onclick='' class='tripResponse addedTrip selectedTrip'>";
                            selectedTrips[selectedTrips.length] = response[i].id;
                        } else
                            newElement += "<div id='trip_" + response[i].id + "' onclick='' class='tripResponse addedTrip'>";
                        if (response[i].placeCount > 0) {
                            tmp = 'url("' + response[i].pic1 + '")';
                            newElement += "<div class='tripImage' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                        } else
                            newElement += "<div class='tripImageEmpty'></div>";
                        if (response[i].placeCount > 1) {
                            tmp = 'url("' + response[i].pic2 + '")';
                            newElement += "<div class='tripImage' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                        } else
                            newElement += "<div class='tripImageEmpty'></div>";
                        if (response[i].placeCount > 1) {
                            tmp = 'url("' + response[i].pic3 + '")';
                            newElement += "<div class='tripImage' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                        } else
                            newElement += "<div class='tripImageEmpty'></div>";
                        if (response[i].placeCount > 1) {
                            tmp = 'url("' + response[i].pic4 + '")';
                            newElement += "<div class='tripImage' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                        } else
                            newElement += "<div class='tripImageEmpty'></div>";
                        newElement += "</div><div class='create-trip-text font-size-12em'>" + response[i].name + "</div>";
                        newElement += "</div>";
                    }
                    newElement += "<div class='addPlaceBoxes'>";
                    newElement += "<a onclick='createNewTrip()' class='single-tile is-create-trip'>";
                    newElement += "<div class='tile-content text-align-center font-size-20Imp'>";
                    newElement += "<span class='plus2'></span>";
                    newElement += "<div class='create-trip-text'>ایجاد سفر</div>";
                    newElement += "</div></a></div>";
                    newElement += "</div>";
                    $("#tripsForPlace").empty().append(newElement);
                    $('#addPlaceToTripPrompt').css('display', 'flex');
                }
            });
        }
    }

    function addToSelectedTrips(id) {
        allow = true;
        for (i = 0; i < selectedTrips.length; i++) {
            if (selectedTrips[i] == id) {
                allow = false;
                $("#trip_" + id).css('border', '2px solid #a0a0a0');
                selectedTrips.splice(i, 1);
                break;
            }
        }
        if (allow) {
            $("#trip_" + id).css('border', '2px solid #4DC7BC');
            selectedTrips[selectedTrips.length] = id;
        }
    }

    function refreshThisAddTrip(){
        closeNewTrip();
        $('#addPlaceToTripPrompt').hide();
        saveToTripPopUp(selectedPlaceId, selectedKindPlaceId);
    }

    function assignPlaceToTrip() {

        if (selectedPlaceId != -1) {
            var checkedValuesTrips = selectedTrips;
            if (checkedValuesTrips == null || checkedValuesTrips.length == 0)
                checkedValuesTrips = "empty";
            $.ajax({
                type: 'post',
                url: assignPlaceToTripDir,
                data: {
                    'checkedValuesTrips': checkedValuesTrips,
                    'placeId': selectedPlaceId,
                    'kindPlaceId': selectedKindPlaceId
                },
                success: function (response) {
                    if (response == "ok"){
                        refreshThisAddTrip();
                        showSuccessNotifi('تغییرات شما با موفقیت اعمال شد.', 'left', '#0076a3');
                    }
                    else {
                        err = "<p>به جز سفر های زیر که اجازه ی افزودن مکان به آنها را نداشتید بقیه به درستی اضافه شدند</p>";
                        response = JSON.parse(response);
                        for (i = 0; i < response.length; i++)
                            err += "<p>" + response[i] + "</p>";
                        $("#errorAssignPlace").append(err);
                    }
                }
            });
        }
    }

    function closeNewTrip() {
        $('#selectNewTripName').css('display', 'flex');
        $('#selectNewTripDate').css('display', 'none');
        $('#newTripModal').css('display', 'none');
        $("#tripName").val("");
    }

    function backToNewTripName(){
        $('#selectNewTripName').css('display', 'flex');
        $('#selectNewTripDate').css('display', 'none');
    }

    function createNewTrip() {
        checkEmpty();
        $("#my-trips-not").hide();
        $("#newTripModal").css("display", "flex");
    }

    function checkEmpty() {
        if($("#tripName").val() == "")
            $("#saves-create-trip-button").addClass("disabled");
        else
            $("#saves-create-trip-button").removeClass("disabled");
    }

    function nextStep() {
        if($("#tripName").val() == "")
            return;

        tripName = $("#tripName").val();

        $("#selectNewTripName").css("display", 'none');
        $("#selectNewTripDate").css("display", "flex");

        $("#date_input_start").datepicker({
            numberOfMonths: 2,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        });

        $("#date_input_end").datepicker({
            numberOfMonths: 2,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        });
    }

    function saveTrip() {

        date_input_start = $("#date_input_start").val();
        date_input_end = $("#date_input_end").val();

        if(date_input_start > date_input_end && date_input_start != '' && date_input_end != '') {
            $("#error").empty().append("تاریخ پایان از تاریخ شروع باید بزرگ تر باشد");
            return;
        }

        $.ajax({
            type: 'post',
            url: addTrip,
            data: {
                'tripName': tripName,
                'dateInputStart' : date_input_start,
                'dateInputEnd' : date_input_end
            },
            success: function (response) {
                if(response == "ok") {
                    refreshThisAddTrip();
                    showSuccessNotifi('لیست سفر شما با موفقیت ایجاد شد', 'left', '#0076a3');
                }
                else {
                    $("#error").empty().append("تاریخ پایان از تاریخ شروع باید بزرگ تر باشد");
                }
            }
        });
    }
</script>