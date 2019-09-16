<script>

    var tripName;
    var addTrip = '{{route('addTrip')}}';
    var myTrips = '{{route('myTrips')}}';

    function closePopUp() {
        $("#tripName").val("");
        $(".ui_modal_card").css("visibility", "hidden");
    }
    function showPopUp() {
        checkEmpty();
        $("#my-trips-not").hide();
        $("#pop-up-create-trip").css("visibility", "visible");
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

        $("#pop-up-create-trip").css("visibility", 'hidden');
        $("#date-pop-up").css("visibility", "visible");

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

        if(tripName != "" && date_input_start != "" && date_input_start != "") {

            if(date_input_start > date_input_end) {
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
                        closePopUp();
                        document.location.href = myTrips;
                    }
                    else {
                        $("#error").empty().append("تاریخ پایان از تاریخ شروع باید بزرگ تر باشد");
                    }
                }
            });
        }
    }

    function saveTripWithOutDate() {
        if(tripName != "") {

            $.ajax({
                type: 'post',
                url: addTrip,
                data: {
                    'tripName': tripName
                },
                success: function (response) {
                    if(response == "ok") {
                        closePopUp();
                        document.location.href = myTrips;
                    }
                }
            });
        }
    }
</script>

<script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>
<link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">

<div id="pop-up-create-trip" class="ui_modal_card saves-settings-modal create-trip-modal is-active">
    <div class="modal-background" onclick=""></div>
    <div class="modal-card">
        <div class="ui_close_x" onclick="closePopUp()"></div>
        <div class="modal-card-head">
            <p class="modal-card-title">ایجاد سفر </p>
        </div>
        <div class="modal-card-body">
            <div id="trip-title-input-region">
                <div>
                    <label class="label">نام سفر</label>
                    <div class="control trip-title-control">
                        <input class="trip-title ui_input_text" id="tripName" onkeyup="checkEmpty()" type="text" maxlength="50" placeholder="حداکثر 50 کاراکتر" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-card-foot">
            <button id="saves-create-trip-button" onclick="nextStep()" class="saves-settings-save ui_button first-button primary disabled">ایجاد سفر</button>
        </div>
    </div>
</div>

<div id="date-pop-up" class="ui_modal_card saves-settings-modal create-trip-modal is-active">
    <div class="modal-background" onclick=""></div>
    <div class="modal-card">
        <div class="ui_close_x" onclick="closePopUp()"></div>
        <div class="modal-card-head">
            <p class="modal-card-title rtl">افزودن تاریخ به سفر</p>
        </div>
        <div class="modal-card-body rtl">
            <div class="control add-dates-cta-text">
                <p></p>
            </div>
            <div class="trip-dates ui_columns">
                <div class="ui_column " >
                    <div id="date_btn_start_edit">تاریخ شروع</div>
                    <label>
                        <span class="ui_icon calendar"></span>
                        <input id="date_input_start" placeholder="روز/ماه/سال" required readonly type="text">
                    </label>
                </div>
                <div class="ui_column">
                    <div id="date_btn_end_edit">تاریخ اتمام</div>
                    <label>
                        <span class="ui_icon calendar"></span>
                        <input id="date_input_end" placeholder="روز/ماه/سال" required readonly type="text">
                    </label>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="modal-card-foot">
            <button id="add-dates-cta-save" onclick="saveTrip()" class="saves-settings-save ui_button first-button primary">ذخیره</button>
            <button id="add-dates-cta-cancel" onclick="saveTripWithOutDate()" class="saves-settings-no-thanks ui_button secondary">بعدا </button>
        </div>

        <div >
            <h5 id="error"></h5>
        </div>
    </div>
</div>