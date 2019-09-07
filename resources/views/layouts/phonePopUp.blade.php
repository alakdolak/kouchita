<script>
    var searchModePhone = 0;
</script>

<style>
    @media only screen and (max-width:600px) {
        .modal-card {
            max-height: max-content !important;
        }

        .saves-settings-modal .modal-card, .saves-settings-delete-confirm .modal-card, .saves-settings-change-dates-confirm .modal-card {
            width: 100% !important;
        }

        .ui_close_x {
            width: 80px !important;
            left: 0 !important;
        }

        .ui_close_x:before {
            font-size: 80px !important;
            line-height: 88px !important;
        }
    }
</style>

{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAJDZx6o16HhpxY94dimKjwiJyQSAGK14k"></script>--}}
{{--<script src="{{URL::asset('js/getLocation.js')}}"></script>--}}

{{--Menu Bar popUp in Phone--}}

<div id="phoneMenuBarPopUp" class="ui_modal_card saves-settings-modal is-active hidden" style="z-index: 1000000000001;">
    <div class="modal-background"></div>
    <div class="modal-card">
        <div class="ui_close_x" onclick="$('#phoneMenuBarPopUp').addClass('hidden')"></div>
        <div style="clear: both"></div>
        <div class="modal-card-body row" style="margin: 30px 0">
            <div class="col-xs-12">
                <div class="col-xs-4 squareDiv"  href="{{route('mainMode', ['mode' => 'amaken'])}}">
                    <div class="phoneIcon atraction"></div>
                    <div class="textIcon">جاذبه ها</div>
                </div>
                <a class="col-xs-4 squareDiv" href="{{route('tickets')}}" style="color: #30b4a6 !important;">
                    <div class="phoneIcon ticket"></div>
                    <div class="textIcon">بلیط</div>
                </a>
                <a class="col-xs-4 squareDiv" href="{{route('main')}}" style="color: #30b4a6 !important;">
                    <div class="phoneIcon hotel"></div>
                    <div class="textIcon">هتل</div>
                </a>
                {{--<div class="col-xs-4 squareDiv">--}}
                {{--<a href="{{route('tickets')}}">--}}
                {{--<div class="phoneIcon ticket"></div>--}}
                {{--<div class="textIcon">بلیط</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4 squareDiv">--}}
                {{--<a href="{{route('main')}}">--}}
                {{--<div class="phoneIcon hotel"></div>--}}
                {{--<div class="textIcon">هتل</div>--}}
                {{--</a>--}}
                {{--</div>--}}
            </div>
            <div style="clear: both"></div>
            <div class="col-xs-12">
                {{--<div class="col-xs-4 squareDiv" onclick="searchModePhone = 1; alert(searchModePhone); $('#phoneSearchPopUp').removeClass('hidden');">--}}
                    {{--<div class="phoneIcon ghazamahali"></div>--}}
                    {{--<div class="textIcon">غذای محلی</div>--}}
                {{--</div>--}}
                <div class="col-xs-4 squareDiv" onclick="searchModePhone = 1; $('#phoneSearchPopUp').removeClass('hidden');">
                    <div class="phoneIcon soghat"></div>
                    <div class="textIcon">سوغات</div>
                </div>
                <a class="col-xs-4 squareDiv" href="{{route('mainMode', ['mode' => 'restaurant'])}}" style="color: #30b4a6 !important;">
                    <div class="phoneIcon restaurant"></div>
                    <div class="textIcon">رستوران</div>
                </a>
                {{--<div class="col-xs-4 squareDiv">--}}
                {{--<a href="{{route('mainMode', ['mode' => 'restaurant'])}}">--}}
                {{--<div class="phoneIcon restaurant"></div>--}}
                {{--<div class="textIcon">رستوران</div>--}}
                {{--</a>--}}
                {{--</div>--}}
            </div>
            <div style="clear: both"></div>
            <div class="col-xs-12">
                <div class="col-xs-4 squareDiv" onclick="searchModePhone = 1; $('#phoneSearchPopUp').removeClass('hidden');">
                    <div class="phoneIcon lebas"></div>
                    <div class="textIcon">لباس محلی</div>
                </div>
                <div class="col-xs-4 squareDiv" onclick="searchModePhone = 1; $('#phoneSearchPopUp').removeClass('hidden');">
                    <div class="phoneIcon sanaye"></div>
                    <div class="textIcon">صنایع دستی</div>
                </div>

                <div class="col-xs-4 squareDiv">
                    <div class="phoneIcon majara" onclick="searchModePhone = 1; $('#phoneSearchPopUp').removeClass('hidden');"></div>
                    <div class="textIcon">ماجراجویی</div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4 squareDiv"></div>
                <div class="col-xs-4 squareDiv">
                    <div class="phoneIcon estelah" onclick="$('#phoneSearchPopUp').removeClass('hidden')"></div>
                    <div class="textIcon">اصطلاحات محلی</div>
                </div>
                <div class="col-xs-4 squareDiv">
                    <div class="phoneIcon boom" onclick="$('#phoneSearchPopUp').removeClass('hidden')"></div>
                    <div class="textIcon">بوم گردی</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Pro Search & Search popUp in Phone--}}

<style>
    @media only screen and (max-width:600px) {
        .phoneScreen {
            top: 0;
            left: 0;
            position: absolute;
            min-height: 100%;
        }

        .inputDiv {
            border: none;
            border-bottom: 1px solid gray;
            width: 90%;
            margin: 8% 5% 2% 5%;
            text-align: right;
            font-size: 33px;
        }

        .haminHavali {
            font-size: 20px;
            font-weight: bold;
            line-height: 85px;
            float: right;
        }

        .icons {
            font-family: 'Shazde_Regular2' !important;
            font-size: 40px;
            direction: rtl;
            line-height: 40px;
            color: #30b4a6;
            margin: 2% 5% 2% 0;
        }
    }
</style>

<div id="phoneSearchPopUp" class="ui_modal_card saves-settings-modal is-active hidden" style="z-index: 1000000000001;">
    <div class="modal-background"></div>
    <div class="modal-card phoneScreen" style="width: 100% !important; top: 0 !important;">
        <div class="ui_close_x" onclick="$('#phoneSearchPopUp').addClass('hidden')"></div>
        <div class="modal-card-body row">
            <input style="direction: rtl" onkeyup="searchForMobile(event)" id="mobilePlaceName" class="inputDiv" placeholder="به کجا می روید؟">
            <input type="hidden" id="mobilePlaceId">
            <div class="icons location" style="float: right"></div>
            <div class="haminHavali">همین حوالی</div>
            <div style="clear: both"></div>
            <div id="partialResult" style="max-height: 180vh; overflow: auto; margin: 2% 5% 2% 0;"></div>
        </div>
    </div>
</div>

<div id="phoneProSearchPopUp" class="ui_modal_card saves-settings-modal is-active hidden" style="z-index: 1000000000001;">
    <div class="modal-background"></div>
    <div class="modal-card phoneScreen" style="top: 0 !important;">
        <div class="ui_close_x" onclick="$('#phoneProSearchPopUp').addClass('hidden')"></div>
        <div class="modal-card-body row" style="height: 150vh">
            <input class="inputDiv" placeholder="به کجا می روید؟" required>
            <input class="inputDiv" placeholder="در کجا؟">
            <div class="icons hotel"></div>
            <div class="icons ticket"></div>
            <div class="icons atraction"></div>
            <div class="icons restaurant"></div>
            <div class="icons soghat"></div>
            <div class="icons ghazamahali"></div>
            <div class="icons majara"></div>
            <div class="icons sanaye"></div>
            <div class="icons lebas"></div>
            <div class="icons boom"></div>
            <div class="icons estelah"></div>
            <div class="icons location" style="float: right"></div>
            <div onclick="getCurrentLocation()" class="haminHavali">همین حوالی</div>
        </div>
    </div>
</div>

<script>

    function searchForMobile(e) {

        alert(searchModePhone);
        return;

        if(searchModePhone == 1)
            searchDir = '{{route('searchForStates')}}';
        else
            searchDir = '{{route('heyYou')}}';

        val = $("#mobilePlaceName").val();
        $(".suggestItem").css("background-color", "transparent").css("padding", "0").css("border-radius", "0");

        if (null == val || "" == val || val.length < 2)
            $("#partialResult").empty();
        else {

            if ("ا" == val[0]) {
                for (val2 = "آ", i = 1; i < val.length; i++) val2 += val[i];
                $.ajax({
                    type: "post",
                    url: searchDir,
                    data: {kindPlaceId: "{{$kindPlaceId}}", key: val, key2: val2},
                    success: function (response) {

                        newElement = "";

                        if (response.length == 0) {
                            newElement = "موردی یافت نشد";
                            $("#mobilePlaceName").val("");
                            return;
                        }

                        response = JSON.parse(response);
                        currIdx = -1;
                        suggestions = response;

                        for (i = 0; i < response.length; i++) {
                            if ("state" == response[i].mode)
                                newElement += "<div style='cursor: pointer' class='suggestItem haminHavali' onclick='setInputMobile(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</div>";
                            else if ("city" == response[i].mode)
                                newElement += "<div style='cursor: pointer' class='suggestItem haminHavali' onclick='setInputMobile(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")'>شهر " + response[i].targetName + " در " + response[i].stateName + " </div>";
                            else
                                newElement += "<div style='cursor: pointer' class='suggestItem haminHavali' onclick='setInputMobile(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].targetName + " در " + response[i].cityName + " در " + response[i].stateName + "</div>";

                            newElement += "<div style='clear: both'></div>";
                        }

                        $("#partialResult").empty().append(newElement)
                    }
                })
            }
            else $.ajax({
                type: "post",
                url: searchDir,
                data: {kindPlaceId: "{{$kindPlaceId}}", key: val},
                success: function (response) {

                    newElement = "";

                    if (response.length == 0) {
                        newElement = "موردی یافت نشد";
                        $("#mobilePlaceName").val("");
                        return;
                    }

                    response = JSON.parse(response);
                    currIdx = -1;
                    suggestions = response;

                    for (i = 0; i < response.length; i++) {
                        if ("state" == response[i].mode)
                            newElement += "<div style='cursor: pointer' class='suggestItem haminHavali' onclick='setInputMobile(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</div>";
                        else if ("city" == response[i].mode)
                            newElement += "<div style='cursor: pointer' class='suggestItem haminHavali' onclick='setInputMobile(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")'>شهر " + response[i].targetName + " در " + response[i].stateName + " </div>";
                        else
                            newElement += "<div style='cursor: pointer' class='suggestItem haminHavali' onclick='setInputMobile(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].targetName + " در " + response[i].cityName + " در " + response[i].stateName + "</div>";
                        newElement += "<br/>";
                    }

                    $("#partialResult").empty().append(newElement);
                }
            })
        }
    }

    function setInputMobile(e, t) {
        $("#mobilePlaceName").val(t);
        $("#mobilePlaceId").val(e);
        $("#partialResult").empty();
        mobileRedirect();
    }

    function mobileRedirect() {
        "" != $("#mobilePlaceId").val() && (document.location.href = $("#mobilePlaceId").val())
    }

//    <div class="haminHavali">همین حوالی</div>
</script>