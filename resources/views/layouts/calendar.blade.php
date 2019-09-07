
<style>

    /* ---------- CALENDAR ---------- */

    .calenderBase {
        width: 75%;
        height: auto;
        direction: rtl;
        background: white;
        z-index: 999999999;
        display: none;
        padding: 1%;
        margin: -255px 0 0 -245px;
        border: solid #cccccc;
        position: absolute;
        right: 28%;
        top: -5%;
    }

    .calendar {
        text-align: center;
        direction: rtl;
        width: 100%;
    }

    .calendar header {
        position: relative;
        margin-bottom: 3%;
    }

    .calendar h2 {
        text-transform: uppercase;
    }

    .calendar thead {
        font-weight: 600;
        text-transform: uppercase;
    }

    .calendar tbody {
        color: #7c8a95;
    }

    .calendar td {
        display: inline-block;
        height: 2em;
        line-height: 2em;
        font-size: 75%;
        color: black;
        width: 13%;
    }

    .calendar td:nth-child(5) {
        border-left: 1px solid #aeaeae;
    }

    .calendar .prev-month,
    .calendar .next-month {
        color: #ebebeb;
        border: 2px solid transparent;
        text-align: center;
        width: 100%;
        height: 100%;
        border-radius: 50% !important;
    }

    /******for gregorian calendar******/
    .calendarGre {
        text-align: center;
        direction: ltr;
    }

    .calendarGre header {
        margin-bottom: 3%;
        position: relative;
    }

    .calendarGre h2 {
        text-transform: uppercase;
    }

    .calendarGre thead {
        font-weight: 600;
        text-transform: uppercase;
    }

    .calendarGre tbody {
        color: #7c8a95;
    }

    .calendarGre td {
        display: inline-block;
        height: 2em;
        line-height: 2em;
        font-size: 75%;
        color: black;
        width: 14%;
    }

    .calendarGre td:nth-child(6) {
        border-left: 1px solid #aeaeae;
    }

    .calendarGre .prev-month,
    .calendarGre .next-month {
        color: #ebebeb;
        border: 2px solid transparent;
        text-align: center;
        width: 100%;
        height: 100%;
        border-radius: 50% !important;
    }


    .tableDiv {
        border: 2px solid transparent;
        width: 45%;
        height: 102%;
        margin: 0 auto;
        border-radius: 50% !important;
        cursor: pointer;
    }

    .tableDiv:hover {
        border: 2px solid #4dc7bc;
    }

    .current-day {
        background: #4dc7bc;
        color: white !important;
    }

    .event {
        cursor: pointer;
        position: relative;
    }

    .event:after {
        background: #00addf;
        border-radius: 50%;
        bottom: .5em;
        display: block;
        content: '';
        height: .5em;
        left: 50%;
        margin: -.25em 0 0 -.25em;
        position: absolute;
        width: .5em;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 3%;
    }

    .event.current-day:after {
        background: #f9f9f9;
    }

    .btn-prev,
    .btn-next {
        border: 2px solid #cbd1d2;
        border-radius: 50%;
        color: #cbd1d2;
        height: 2em;
        font-size: .75em;
        line-height: 2em;
        margin: -1em;
        position: absolute;
        top: 50%;
        width: 2em;
    }

    .btn-prev:hover,
    .btn-next:hover {
        background: #cbd1d2;
        color: #f9f9f9;
    }

    .btn-prev {
        left: 6em;
    }

    .btn-next {
        right: 6em;
    }
    .between {
        color: #4dc7bc;
    }


    /*bottom button*/
    .bottomBtn {
        width: 100%;
        border-top: 1px solid #aeaeae;
        padding-top: 2%;
    }
    .diffrentCalenBtn {
        float: left;
        margin-left: 5%;
        color: #4DC7BC;
        background-color: white;
        border: none;
        font-size: 120%;
    }
    .cancleBtn {
        float: right;
        margin-right: 5%;
        color: #92321b;
        background-color: white;
        border: none;
        font-size: 120%;
    }
</style>

<div id="container1" class="calenderBase">
    <div id="calendarJalali">
        <div id="calendarJalali1" style="display: inline-block; width: 49%;">
            <div class="calendar">
                <input type="hidden" id="goJalali">
                <header>
                    <select id="select_month_go" onchange="getNewMonth(this.value, 'go')" style="width: 30%; font-size: 95%;"></select>
                    <a class="ticketIcon leftArrowIcone leftInCalender" onclick="nextMonth('go')" href="#"></a>
                    <a class="ticketIcon rightArrowIcone rightInCalender" onclick="prevMonth('go')" href="#"></a>
                </header>
                <table>
                    <thead>
                    <tr style="border-bottom: 1.2px solid #aeaeae">
                        <td>شنبه</td>
                        <td>یک شنبه</td>
                        <td>دو شنبه</td>
                        <td>سه شنبه</td>
                        <td>چهار شنبه</td>
                        <td>پنج شنبه</td>
                        <td>جمعه</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="row_go_0"></tr>
                    <tr id="row_go_1"></tr>
                    <tr id="row_go_2"></tr>
                    <tr id="row_go_3"></tr>
                    <tr id="row_go_4"></tr>
                    <tr id="row_go_5"></tr>
                    </tbody>
                </table>
            </div> <!-- end calendar -->
        </div>
        <div id="calendarJalali2" style="display: inline-block; width: 49%; margin-right: 3px; padding-right: 7px; border-right: 2px solid #4DC7BC">
            <div class="calendar">
                <header>
                    <input type="hidden" id="backJalali">
                    <select id="select_month_back" onchange="getNewMonth(this.value, 'back')" style="width: 30%; font-size: 95%;"></select>
                    <a class="ticketIcon leftArrowIcone leftInCalender" onclick="nextMonth('back')" href="#"></a>
                    <a class="ticketIcon rightArrowIcone rightInCalender" onclick="prevMonth('back')" href="#"></a>
                </header>
                <table>
                    <thead>
                    <tr style="border-bottom: 1.2px solid #aeaeae">
                        <td>شنبه</td>
                        <td>یک شنبه</td>
                        <td>دو شنبه</td>
                        <td>سه شنبه</td>
                        <td>چهار شنبه</td>
                        <td>پنج شنبه</td>
                        <td>جمعه</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="row_back_0"></tr>
                    <tr id="row_back_1"></tr>
                    <tr id="row_back_2"></tr>
                    <tr id="row_back_3"></tr>
                    <tr id="row_back_4"></tr>
                    <tr id="row_back_5"></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="calendarGregorian" style="display: none; direction: ltr;">
        <div id="calendarGregorian1" style="display: inline-block; width: 49%;">
            <div class="calendarGre">
                <header>
                    <input type="hidden" id="goGre">
                    <select id="select_month_gre_go" onchange="getNewMonthGre(this.value, 'go')" style="width: 45%; font-size: 95%;"></select>
                    <a class="ticketIcon leftArrowIcone leftInCalenderGre" onclick="prevMonthGre('go')" href="#"></a>
                    <a class="ticketIcon rightArrowIcone rightInCalenderGre" onclick="nextMonthGre('go')" href="#"></a>
                </header>
                <table>
                    <thead>
                    <tr style="border-bottom: 1.2px solid #aeaeae">
                        <td>Mon</td>
                        <td>Tue</td>
                        <td>Wed</td>
                        <td>Thu</td>
                        <td>Fri</td>
                        <td>Sat</td>
                        <td>Sun</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="row_gre_go_0"></tr>
                    <tr id="row_gre_go_1"></tr>
                    <tr id="row_gre_go_2"></tr>
                    <tr id="row_gre_go_3"></tr>
                    <tr id="row_gre_go_4"></tr>
                    <tr id="row_gre_go_5"></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="calendarGregorian2" style="display: inline-block; width: 49%; margin-left: 3px; padding-left: 7px; border-left: 2px solid #4DC7BC">
            <div class="calendarGre">
                <header>
                    <input type="hidden" id="backGre">
                    <select id="select_month_gre_back" onchange="getNewMonthGre(this.value, 'back')" style="width: 45%; font-size: 95%;"></select>
                    <a class="ticketIcon leftArrowIcone leftInCalenderGre" onclick="prevMonthGre('back')" href="#"></a>
                    <a class="ticketIcon rightArrowIcone rightInCalenderGre" onclick="nextMonthGre('back')" href="#"></a>
                </header>
                <table>
                    <thead>
                    <tr style="border-bottom: 1.2px solid #aeaeae">
                        <td>Mon</td>
                        <td>Tue</td>
                        <td>Wed</td>
                        <td>Thu</td>
                        <td>Fri</td>
                        <td>Sat</td>
                        <td>Sun</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="row_gre_back_0"></tr>
                    <tr id="row_gre_back_1"></tr>
                    <tr id="row_gre_back_2"></tr>
                    <tr id="row_gre_back_3"></tr>
                    <tr id="row_gre_back_4"></tr>
                    <tr id="row_gre_back_5"></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="JalaliButton" class="bottomBtn">
        <button type="button" class="cancleBtn" onclick="closeCalender()">انصراف</button>
        <button type="button" class="diffrentCalenBtn" onclick="changeDateKind(1)">Gregorian</button>
    </div>
    <div id="GregorianButton" class="bottomBtn" style="display: none">
        <button type="button" class="cancleBtn" onclick="closeCalender()">Cancel</button>
        <button type="button" class="diffrentCalenBtn" onclick="changeDateKind(2)">شمسی</button>
    </div>
</div>


<script>

    var date = new Date();
    var numClick = 2;
    var checkOpen = true;

    var numOfCalendar = 1;
    var nowYear = date.getJalaliFullYear();
    var nowMonth = date.getJalaliMonth();

    var nowDate = date.getJalaliDate();
    var backYear = nowYear;
    var backMonth = parseInt(nowMonth) + 1;
    var backDate = nowDate;
    if (backMonth == 12) {
        backYear = parseInt(backYear) + 1;
        backMonth = 0;
    }

    var nowYearGre = date.getFullYear();
    var nowMonthGre = date.getMonth();
    var nowDateGre = date.getDate();

    var backYearGre = nowYearGre;
    var backMonthGre = parseInt(nowMonthGre) + 1;
    var backDateGre = nowDateGre;
    if (backMonthGre == 12) {
        backYearGre = parseInt(backYearGre) + 1;
        backMonthGre = 0;
    }

    var firstMonth;
    var firstMonthBack;

    var firstMonthGre ;
    var firstMonthGreBack;


    var selectDays = [[nowYear, nowMonth,nowDate], [null, null, null]];

    changeTwoCalendar(1);

    function changeTwoCalendar(num) {
        if (num == 1) {
            numClick = 0;
            numOfCalendar = 1;
            document.getElementById('calendarJalali2').style.display = 'none';
            document.getElementById('calendarGregorian2').style.display = 'none';

            document.getElementById('calendarJalali1').style.width = '100%';
            document.getElementById('calendarGregorian1').style.width = '100%';
            document.getElementById('container1').style.width = '35%';

            document.getElementById('backDate').value = '';
            selectDays[1][1] = null;
            checkOpen = true;
        }
        else {
            numOfCalendar = 2;
            document.getElementById('calendarJalali2').style.display = 'inline-block';
            document.getElementById('calendarGregorian2').style.display = 'inline-block';

            document.getElementById('calendarJalali1').style.width = '49%';
            document.getElementById('calendarGregorian1').style.width = '49%';
            document.getElementById('container1').style.width = '65%';
            checkOpen = true;

        }
    }

    function assignDate(from, id, btnId) {
        $("#" + id).css("visibility", "visible");

        if (btnId == "backDate" && $("#date_input1").val().length != 0)
            from = $("#date_input1").val();

        if (btnId == "backDate" && $("#date_input1_phone").val().length != 0)
            from = $("#date_input1_phone").val();

        $("#" + btnId).datepicker({
            numberOfMonths: 2,
            showButtonPanel: true,
            minDate: from,
            dateFormat: "yy/mm/dd"
        });
    }
</script>