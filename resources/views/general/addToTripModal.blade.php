<link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
{{--<link rel="stylesheet" href="{{URL::asset('css/theme2/pop-up-create-trip.css?v=1')}}">--}}

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
    var myTrips = '{{route('myTrips')}}';

    var tripName;
    var selectedPlaceId;
    var selectedKindPlaceId;
    var callBackCreateTrip = null;

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
            $("#trip_" + id).css('border', '2px solid var(--koochita-light-green)');
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
                url: '{{route('assignPlaceToTrip')}}',
                data: {
                    'checkedValuesTrips': checkedValuesTrips,
                    'placeId': selectedPlaceId,
                    'kindPlaceId': selectedKindPlaceId
                },
                success: function (response) {
                    if (response == "ok"){
                        refreshThisAddTrip();
                        showSuccessNotifi('تغییرات شما با موفقیت اعمال شد.', 'left', 'var(--koochita-blue)');
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

    function createNewTrip(_callBack = '') {
        callBackCreateTrip = null;
        checkEmpty();
        $("#my-trips-not").hide();
        $("#newTripModal").css("display", "flex");
        if(typeof _callBack === 'function')
            callBackCreateTrip = _callBack;
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
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        });

        $("#date_input_end").datepicker({
            numberOfMonths: 1,
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
            url: '{{route('addTrip')}}',
            data: {
                'tripName': tripName,
                'dateInputStart' : date_input_start,
                'dateInputEnd' : date_input_end
            },
            success: function (response) {
                if(response == "ok") {
                    if(callBackCreateTrip != null){
                        callBackCreateTrip();
                        callBackCreateTrip = null;
                    }
                    refreshThisAddTrip();
                    showSuccessNotifi('لیست سفر شما با موفقیت ایجاد شد', 'left', 'var(--koochita-blue)');
                }
                else {
                    $("#error").empty().append("تاریخ پایان از تاریخ شروع باید بزرگ تر باشد");
                }
            }
        });
    }
</script>