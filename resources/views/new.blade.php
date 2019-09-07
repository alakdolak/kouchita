<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>
    <style>

        /* ---------- GENERAL ---------- */

        body {
            color: #0e171c;
            font: 300 100%/1.5em 'Lato', sans-serif;
            margin: 0;
        }

        a {
            text-decoration: none;
        }

        h2 {
            font-size: 2em;
            line-height: 1.25em;
            margin: .25em 0;
        }

        h3 {
            font-size: 1.5em;
            line-height: 1em;
            margin: .33em 0;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            margin-bottom: 3%;
        }

        .container {
            height: auto;
            padding: 2%;
            border: solid #cccccc;
            left: 20%;
            margin: -255px 0 0 -245px;
            position: absolute;
            top: 35%;
            width: 75%;
        }

        /* ---------- CALENDAR ---------- */

        .calendar {
            text-align: center;
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
            height: 4em;
            line-height: 4em;
            font-size: 100%;
            color: black;
            width: 13%;
        }

        .calendar td:nth-child(5) {
            border-left: solid #cccccc;
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

        /******for gregorian calendar***********************/
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
            height: 4em;
            line-height: 4em;
            font-size: 100%;
            color: black;
            width: 13%;
        }

        .calendarGre td:nth-child(6) {
            border-left: solid #cccccc;
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
            text-align: center;
            width: 100%;
            height: 100%;
            border-radius: 50% !important;
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
        .between{
            color: #4dc7bc;
        }
    </style>

</head>
<body>
<div id="mainContainer" class="page-content" style="margin: 3%; direction: rtl">
    <button onclick="nowCalendar()">تقویم</button>
    <button id="trip" onclick="changetwoCalendar()">دوسفره</button>
    <h6>تاریخ رفت</h6>
    <input id="goDate" style="width: 8%;"><br>

    <h6>تاریخ برگشت</h6>
    <input id="backDate">

    <div id="container1" class="container" style="display: none;">
        <div id="calendarJalali">
            <div id="calendarJalali1" style="display: inline-block; width: 49%;">
                <div class="calendar">
                    <input type="hidden" id="goJalali">
                    <header>
                        <label>رفت</label>
                        <select id="select_month_go" onchange="getNewMonth(this.value, 'go')"
                                style="width: 30%; font-size: 140%;">
                        </select>
                        <a class="btn-prev fontawesome-angle-left" onclick="nextMonth('go')" href="#"></a>
                        <a class="btn-next fontawesome-angle-right" onclick="prevMonth('go')" href="#"></a>
                    </header>

                    <table>
                        <thead>
                        <tr style="border-bottom: solid #cccccc">
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
            <div id="calendarJalali2" style="display: inline-block; width: 49%;">
                <div class="calendar">
                    <header>
                        <input type="hidden" id="backJalali">
                        <label>برگشت</label>
                        <select id="select_month_back" onchange="getNewMonth(this.value, 'back')"
                                style="width: 30%; font-size: 140%;">
                        </select>
                        <a class="btn-prev fontawesome-angle-left" onclick="nextMonth('back')" href="#"></a>
                        <a class="btn-next fontawesome-angle-right" onclick="prevMonth('back')" href="#"></a>
                    </header>

                    <table>
                        <thead>
                        <tr style="border-bottom: solid #cccccc">
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
                        <label>رفت</label>
                        <select id="select_month_gre_go" onchange="getNewMonthGre(this.value, 'go')"
                                style="width: 45%; font-size: 140%;">
                        </select>
                        <label>عقب</label>
                        <a class="btn-next fontawesome-angle-right" onclick="prevMonthGre('go')" href="#"></a>
                        <label>جلو</label>
                        <a class="btn-prev fontawesome-angle-left" onclick="nextMonthGre('go')" href="#"></a>
                    </header>

                    <table>
                        <thead>
                        <tr style="border-bottom: solid #cccccc">
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
            <div id="calendarGregorian2" style="display: inline-block; width: 49%;">
                <div class="calendarGre">
                    <header>
                        <input type="hidden" id="backGre">
                        <label>برگشت</label>
                        <select id="select_month_gre_back" onchange="getNewMonthGre(this.value, 'back')"
                                style="width: 45%; font-size: 140%;">
                        </select>
                        <label>عقب</label>
                        <a class="btn-next fontawesome-angle-right" onclick="prevMonthGre('back')" href="#"></a>
                        <label>جلو</label>
                        <a class="btn-prev fontawesome-angle-left" onclick="nextMonthGre('back')" href="#"></a>
                    </header>

                    <table>
                        <thead>
                        <tr style="border-bottom: solid #cccccc">
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

        <div id="JalaliButton" style="width: 100%; border-top: solid #cccccc; padding-top: 3%;">
            <button type="button"
                    style="float: right; margin-right: 5%; color: #92321b; background-color: white; border: none; font-size: 140%;"
                    onclick="closeCalender()">انصراف
            </button>
            <button type="button"
                    style="float: left; margin-left: 5%; color: #92321b; background-color: white; border: none; font-size: 140%;"
                    onclick="changeDateKind(1)">Gregorian
            </button>
        </div>
        <div id="GregorianButton" style="width: 100%; border-top: solid #cccccc; padding-top: 3%; display: none">
            <button type="button"
                    style="float: right; margin-right: 5%; color: #92321b; background-color: white; border: none; font-size: 140%;"
                    onclick="closeCalender()">Cancel
            </button>
            <button type="button"
                    style="float: left; margin-left: 5%; color: #92321b; background-color: white; border: none; font-size: 140%;"
                    onclick="changeDateKind(2)">شمسی
            </button>
        </div>
    </div>
</div>
</body>
<script>

    var date = new Date();
    var numClick = 1;
    var checkOpen = true;

    var numOfCalendar = 2;

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
    var nowDateGre = date.getDate()

    var backYearGre = nowYearGre;
    var backMonthGre = parseInt(nowMonthGre) + 1;
    var backDateGre = nowDateGre;
    if (backMonthGre == 12) {
        backYearGre = parseInt(backYearGre) + 1;
        backMonthGre = 0;
    }

    var firstMonth, lastMonth;
    var firstMonthBack, lastMonthBack;

    var firstMonthGre, lastMonthGre;
    var firstMonthGreBack, lastMonthGreBack;
    document.getElementById('goDate').value = nowYear + '/' + (parseInt(nowMonth) + 1) + '/' + nowDate;

    var selectDays = [[nowYear, nowMonth, nowDate], [null, null, null]];

    function changetwoCalendar() {
        if(numOfCalendar == 2){
            numOfCalendar = 1 ;
            numClick = 0 ;
            document.getElementById('calendarJalali2').style.display = 'none';
            document.getElementById('calendarGregorian2').style.display = 'none';

            document.getElementById('calendarJalali1').style.width = '100%';
            document.getElementById('calendarGregorian1').style.width = '100%';
            document.getElementById('container1').style.width = '40%';

            document.getElementById('backDate').value = '';
            selectDays[1][1] = null ;
            checkOpen = true;
            document.getElementById('trip').innerText = 'رفت و برگشت';
            nowCalendar();
        }
        else{
            numOfCalendar = 2 ;
            document.getElementById('calendarJalali2').style.display = 'inline-block';
            document.getElementById('calendarGregorian2').style.display = 'inline-block';

            document.getElementById('calendarJalali1').style.width = '49%';
            document.getElementById('calendarGregorian1').style.width = '49%';
            document.getElementById('container1').style.width = '75%';

            document.getElementById('trip').innerText = 'رفت';
            nowCalendar();
        }
    }

</script>


</html>