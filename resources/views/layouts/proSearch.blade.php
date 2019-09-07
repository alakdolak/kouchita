<script>

    var destY, m = -1, destX;
    var selectedElement;
    var filters = [];
    var bodyRect;
    var windowW;
    var elemRect;
    var selectedVal;
    var selectedIdx;
    var selectedText;
    var searchInCity = "{{route('searchForCity')}}";
    var activeCityFilter = false;
    var searchInPlacesDir = '{{route('proSearch')}}';
    var compareList = [];
    {{--var searchInPlacesDir = '{{route('searchInPlaces')}}';--}}

    $(document).ready(function () {
        elemRect = document.getElementById('addToFilterCityBtn').getBoundingClientRect();
        bodyRect = document.body.getBoundingClientRect();
        windowW = screen.width;
        element = document.getElementById('filters').getBoundingClientRect();
        destY = element.top + 55;
    });

    function movement() {

        xy = selectedElement.getBoundingClientRect();

        offset = xy.top;
        offset2 = xy.left;

        if(offset >= destY)
            return movement2();

        offset += 2.8;

        selectedElement.style.left = offset2 + 1.2 * m + "px";
        selectedElement.style.top = offset + "px";

        return setTimeout("movement()", 1);
    }

    function movement2() {

        xy = selectedElement.getBoundingClientRect();

        if(xy.left >= destX) {
            $("#elevator").remove();
            $("#" + selectedVal).removeClass('hidden');
            return;
        }
        selectedElement.style.left = xy.left + 2.8 + "px";

        return setTimeout("movement2()", 1);
    }
    
    function addToFilter(cityId) {

        val = $("#GEO_SCOPED_SEARCH_INPUT").val();

        for(i = 0; i < filters.length; i++) {
            if(filters[i] == "cityFilterDest_" + cityId)
                return;
        }

        $("#searchKeyCity").empty().append(val);
        $("#currentCity").empty().append("شما در حال حاضر در شهر " + val + " هستید.");
        offset  = elemRect.top;
        offset2 = elemRect.left;

        newFilter = "<div id='elevator' style='position: absolute; border-radius: 6px; width: 100px; height: 30px; background-color: #4DC7BC; color: white; top: " + offset + "px; left: " + offset2 + "px'><center style='margin-top: 5px;'>" + val + "</center></div>";
        $("#searchspan").append(newFilter);

        destX = windowW * 0.7 - (filters.length % 3 * 110) - document.getElementById('filterDiv').getBoundingClientRect().left;
        marginTop = Math.floor(filters.length / 3) * 40;
        newElement = "<div class='hidden' id='cityFilterDest_" + cityId + "' style='position: absolute; float: right; color: white; top: 40px; background-color: #4dc7bc; left: " + (destX - 115) + "px; border-radius: 6px; width: 100px; height: 30px'><center><span class='glyphicon glyphicon-remove' onclick='removeFilter(\"cityFilterDest_" + cityId + "\")' style='line-height: 28px; margin-right: 8px; float: right; cursor: pointer'></span><span style='line-height: 28px; margin-left: 10px'>" + val + "</span></span></center></div>";
        $("#filters").append(newElement);

        selectedElement = document.getElementById("elevator");
        selectedVal = "cityFilterDest_" + cityId;
        filters[filters.length] = selectedVal;

        movement();
    }

    function addToFilter2(val) {

        destX = windowW * 0.8 - (filters.length * 110) - document.getElementById('filterDiv').getBoundingClientRect().left;
        newElement = "<div onclick='removeFilter(\"" + val + "\")' id='selectedFilter_" + val + "' style='position: absolute; float: right; color: #6d6d6d; border-radius: 6px; background-color: #f4f4f4; left: " + destX + "px; width: 1px; height: 1px'></div>";
        $("#filters").append(newElement);
        selectedVal = 'selectedFilter_' + val;
        filters[filters.length] = selectedVal;
        movement3();
    }

    function movement3() {

        w = $("#" + selectedVal).css('width').split('px')[0];

        if(w >= 100) {
            newElement = "<center style='margin-top: 35px; color: black' class='rotate-text'>" + selectedText + "</center>";
            $("#" + selectedVal).append(newElement);
            counter = 0;
            for(j = 0; j < compareList.length; j++) {
                if(compareList[j].id != -1)
                    counter++;
            }
            if(counter == 2) {
                $("#compare").removeClass('hidden');
            }
            return;
        }
        w++;

        $("#" + selectedVal).css('width', w + "px").css('height', w + "px");
        setTimeout('movement3()', 1);
    }
    
    function removeFilter(val) {

        selectedIdx = -1;

        for(i = 0; i < filters.length; i++) {
            if(filters[i] == val) {
                selectedIdx = i;
                filters.splice(i, 1);
            }
        }

        $("#" + val).remove();

        if(selectedIdx != -1 && selectedIdx != filters.length) {
            if(selectedIdx == 2)
                shiftLeft(1);
            else
                shiftRight(1);
        }

    }

    function searchInPlaces() {

        if($("#GEO_SCOPED_SEARCH_INPUT2").val().length < 3) {
            $("#resultPlace").empty();
            return;
        }

        cities = [];
        for(i = 0; i < filters.length; i++) {
            cities[i] = filters[i].split('_')[1];
        }

        if(cities.length == 0)
            cities = -1;

        hotelFilter = ($("#hotelFilter").attr('data-val') == 'off') ? 0 : 1;
        amakenFilter = ($("#amakenFilter").attr('data-val') == 'off') ? 0 : 1;
        restuarantFilter = ($("#restaurantFilter").attr('data-val') == 'off') ? 0 : 1;
        majaraFilter = ($("#majaraFilter").attr('data-val') == 'off') ? 0 : 1;
        soghatFilter = ($("#soghatFilter").attr('data-val') == 'off') ? 0 : 1;
        ghazamahaliFilter = ($("#ghazamahaliFilter").attr('data-val') == 'off') ? 0 : 1;
        sanayeFilter = ($("#sanayeFilter").attr('data-val') == 'off') ? 0 : 1;

        $.ajax({
            type: 'post',
            url: searchInPlacesDir,
            data: {
                'key':  $("#GEO_SCOPED_SEARCH_INPUT2").val(),
                'hotelFilter': hotelFilter,
                'amakenFilter': amakenFilter,
                'restaurantFilter': restuarantFilter,
                'majaraFilter': majaraFilter,
                'soghatFilter': soghatFilter,
                'ghazamahaliFilter': ghazamahaliFilter,
                'sanayeFilter': sanayeFilter,
                'selectedCities': cities
            },
            success: function (response) {

                $("#resultPlace").empty();

                if(response.length == 0)
                    return;

                response = JSON.parse(response);

                newElement = "";
                for(i = 0; i < response.length; i++) {
                    if(response[i].kindPlace == 'هتل')
                        newElement += "<p class='searchElement'><span onclick='addToCompareList(\"" + response[i].kindPlaceId + "\", \"" + response[i].id + "\", \"" + response[i].name + "\")' style='float: right' data-toggle='tooltip' title='افزودن به مقایسه ها' class='glyphicon glyphicon-plus'></span><span style='margin-right: 7px' onclick='document.location.href = \"{{route('home')}}/hotel-details/" + response[i].id + "/" + response[i].name + "\"'>" + response[i].name + " در " + response[i].cityName + "</span></p>";
                    else if(response[i].kindPlace == 'رستوران')
                        newElement += "<p class='searchElement'><span onclick='addToCompareList(\"" + response[i].kindPlaceId + "\", \"" + response[i].id + "\", \"" + response[i].name + "\")' style='float: right' data-toggle='tooltip' title='افزودن به مقایسه ها' class='glyphicon glyphicon-plus'></span><span style='margin-right: 7px' onclick='document.location.href = \"{{route('home')}}/restaurant-details/" + response[i].id + "/" + response[i].name + "\"'>" + response[i].name + " در " + response[i].cityName + "</span></p>";
                    else if(response[i].kindPlace == 'اماکن')
                            newElement += "<p class='searchElement'><span onclick='addToCompareList(\"" + response[i].kindPlaceId + "\", \"" + response[i].id + "\", \"" + response[i].name + "\")' style='float: right' data-toggle='tooltip' title='افزودن به مقایسه ها' class='glyphicon glyphicon-plus'></span><span style='margin-right: 7px' onclick='document.location.href = \"{{route('home')}}/amaken-details/" + response[i].id + "/" + response[i].name + "\"'>" + response[i].name + " در " + response[i].cityName + "</span></p>";
                    else if(response[i].kindPlace == 'آداب')
                        newElement += "<p class='searchElement'><span onclick='addToCompareList(\"" + response[i].kindPlaceId + "\", \"" + response[i].id + "\", \"" + response[i].name + "\")' style='float: right' data-toggle='tooltip' title='افزودن به مقایسه ها' class='glyphicon glyphicon-plus'></span><span style='margin-right: 7px' onclick='document.location.href = \"{{route('home')}}/adab-details/" + response[i].id + "/" + response[i].name + "\"'>" + response[i].name + " در " + response[i].cityName + "</span></p>";
                    else
                        newElement += "<p class='searchElement'><span onclick='addToCompareList(\"" + response[i].kindPlaceId + "\", \"" + response[i].id + "\", \"" + response[i].name + "\")' style='float: right' data-toggle='tooltip' title='افزودن به مقایسه ها' class='glyphicon glyphicon-plus'></span><span style='margin-right: 7px' onclick='document.location.href = \"{{route('home')}}/majara-details/" + response[i].id + "/" + response[i].name + "\"'>" + response[i].name + " در " + response[i].cityName + "</span></p>";
                }

                $("#resultPlace").append(newElement)
            }
        });

    }

    function removeFromCompareList(idx) {

        if(idx > 4 || idx < 0)
            return;

        $("#compare_" + idx + "_plus_div").removeClass('hidden');
        $("#compare_" + idx + "_text").empty().addClass('hidden').removeClass('rotate-text');
        $("#compare_" + idx + "_pic").addClass('hidden');
        $("#removeDiv_" + idx).addClass('hidden');
        compareList[idx - 1] = {'id': -1, 'kindPlaceId': -1 };
        counter = 0;
        for(j = 0; j < compareList.length; j++) {
            if(compareList[j].id != -1)
                counter++;
        }
        if(counter < 2) {
            $("#compare").addClass('hidden');
        }
    }

    function addToCompareList(kindPlaceId, id, name) {

        for(i = 0; i < compareList.length; i++) {
            if(compareList[i].id == id)
                return;
        }

        idx = -1;

        for(i = 0; i < compareList.length; i++) {
            if(compareList[i].id == -1) {
                idx = i + 1;
                break;
            }
        }

        if(idx == -1) {
            if(compareList.length + 1 > 4)
                idx = 4;
            else
                idx = compareList.length + 1;
        }

        selectedText = name;
        selectedVal = "compare_" + idx + "_bubble";

        compareList[idx - 1] = {'id': id, 'kindPlaceId': kindPlaceId};


        $.ajax({
            type: 'post',
            url: '{{route('getPlacePic')}}',
            data: {
                'placeId': id,
                'kindPlaceId': kindPlaceId
            },
            success: function (response) {
                $("#compare_" + idx + "_plus_div").addClass('hidden');
                $("#compare_" + idx + "_text").css('background-color', "#dddddd").empty().append(name).removeClass('hidden').addClass('rotate-text');
                $("#compare_" + idx + "_pic").css('background', "url('" + response + "')").css('background-size', "contain").css('background-repeat', "no-repeat").removeClass('hidden');
                $("#removeDiv_" + idx).removeClass('hidden');

                counter = 0;
                for(j = 0; j < compareList.length; j++) {
                    if(compareList[j].id != -1)
                        counter++;
                }
                if(counter < 2)
                    $("#compare").addClass('hidden');
                else
                    $("#compare").removeClass('hidden');
            }
        });

//        movement3();
    }

    function shiftRight(val) {

        if(val == 110) {

            if(selectedIdx >= filters.length)
                return;
            selectedIdx++;
            if(selectedIdx == 2)
                return shiftLeft(1);
            return shiftRight(1);
        }

        val++;
        currLeft = $("#" + filters[selectedIdx]).css('left').split('px')[0];
        currLeft++;

        $("#" + filters[selectedIdx]).css('left', currLeft + "px");

        setTimeout("shiftRight('" + val + "')", 1);
    }

    function shiftTop(val) {

        if(val == 40) {

            if(selectedIdx >= filters.length)
                return;
            selectedIdx++;
            return shiftRight(1);
        }

        val++;
        currTop = $("#" + filters[selectedIdx]).css('top').split('px')[0];
        currTop--;

        $("#" + filters[selectedIdx]).css('top', currTop + "px");

        setTimeout("shiftTop('" + val + "')", 1);
    }

    function shiftLeft(val) {

        if(val == 220) {
            return shiftTop(1);
        }

        val++;
        currLeft = $("#" + filters[selectedIdx]).css('left').split('px')[0];
        currLeft--;

        $("#" + filters[selectedIdx]).css('left', currLeft + "px");

        setTimeout("shiftLeft('" + val + "')", 1);
    }

    function destroyBalloon() {

        w = $("#" + selectedVal).css('width').split('px')[0];

        if(w <= 5) {
            $("#" + selectedVal).remove();
            if(selectedIdx >= 0)
                shiftRight(1);
            return;
        }
        w--;

        $("#" + selectedVal).css('width', w + "px").css('height', w + "px");
        setTimeout('destroyBalloon()', 1);
    }
    
    function searchCity() {

        activeCityFilter = false;
        $("#searchKeyCity").empty();
        $("#currentCity").empty();

        if($("#GEO_SCOPED_SEARCH_INPUT").val().length < 2) {
            $("#resultCity").empty();
            return;
        }

        $.ajax({
            type: 'post',
            url: searchInCity,
            data: {
                'key':  $("#GEO_SCOPED_SEARCH_INPUT").val()
            },
            success: function (response) {

                $("#resultCity").empty();

                if(response.length == 0)
                    return;

                response = JSON.parse(response);

                newElement = "";
                for(i = 0; i < response.length; i++) {
                    newElement += "<p><span onclick='setCityName(\"" + response[i].cityName + "\", \"" + response[i].id + "\")' style='margin-left: 10px;background-color: #4DC7BC; color: white; padding: 4px 8px !important; font-size: 10px !important;' class='btn btn-success glyphicon glyphicon-plus'></span><span>" + response[i].cityName + " در " + response[i].stateName + "</span></p>";
                }

                $("#resultCity").append(newElement);
            }
        });
    }

    function setCityName(val, id) {
        activeCityFilter = true;
        $("#resultCity").empty();
        $("#GEO_SCOPED_SEARCH_INPUT").val(val);
        addToFilter(id);
    }

    function goTo() {

        if(!activeCityFilter || $("#GEO_SCOPED_SEARCH_INPUT").val() == "")
            return;

        hotel = restaurant = amaken = majara = soghat = ghazamahali = sanaye = false;
        counter = 0;

        if($("#amakenFilter").attr("data-val") == "on") {
            amaken = true;
            counter++;
        }

        if($("#hotelFilter").attr("data-val") == "on") {
            hotel = true;
            counter++;
        }

        if($("#restaurantFilter").attr("data-val") == "on") {
            restaurant = true;
            counter++;
        }

        if($("#majaraFilter").attr("data-val") == "on") {
            majara = true;
            counter++;
        }

        if($("#soghatFilter").attr("data-val") == "on") {
            soghat = true;
            counter++;
        }

        if($("#ghazamahaliFilter").attr("data-val") == "on") {
            ghazamahali = true;
            counter++;
        }

        if($("#sanayeFilter").attr("data-val") == "on") {
            sanaye = true;
            counter++;
        }

        if(counter == 0) {
            alert("یکی رو انتخاب کن");
            return;
        }

        if(counter > 1) {
            alert("فقط یکی رو انتخاب کن");
            return;
        }

        if(hotel) {
            document.location.href = "{{route('home')}}" + '/hotelList/' + $("#GEO_SCOPED_SEARCH_INPUT").val() + '/city';
        }
        else if(amaken) {
            document.location.href = "{{route('home')}}" + '/amakenList/' + $("#GEO_SCOPED_SEARCH_INPUT").val() + '/city';
        }
        else if(restaurant) {
            document.location.href = "{{route('home')}}" + '/restaurantList/' + $("#GEO_SCOPED_SEARCH_INPUT").val() + '/city';
        }
        else if(majara) {
            document.location.href = "{{route('home')}}" + '/majaraList/' + $("#GEO_SCOPED_SEARCH_INPUT").val() + '/state';
        }
        else if(soghat) {
            document.location.href = "{{route('home')}}" + '/adab-list/' + $("#GEO_SCOPED_SEARCH_INPUT").val() + '/soghat';
        }
        else if(ghazamahali) {
            document.location.href = "{{route('home')}}" + '/adab-list/' + $("#GEO_SCOPED_SEARCH_INPUT").val() + '/ghazamahali';
        }
        else if(sanaye) {
            document.location.href = "{{route('home')}}" + '/adab-list/' + $("#GEO_SCOPED_SEARCH_INPUT").val() + '/sanaye';
        }
    }

    function compare() {

        if(compareList.length > 1) {

            url = "";
            allow = true;

            for(i = 0; i < compareList.length; i++) {

                if(compareList[i].id == -1)
                    continue;

                if(allow) {
                    allow = false;
                    url += compareList[i].id + "/" + compareList[i].kindPlaceId;
                }
                else
                    url += "/" + compareList[i].id + "/" + compareList[i].kindPlaceId;
            }
            document.location.href = "{{route('home')}}" + "/showAllPlaces/" + url;
        }
    }
    
</script>

<style>
    .rotate-text {
        -webkit-animation: rotation 1s 1 linear;
    }
    .center {
        margin: auto;
        width: 83%;
        padding: 10px;
    }
    @-webkit-keyframes rotation {
        from {
            -webkit-transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(359deg);
        }
    }

    .ui_input_checkbox {
        margin-right: 7px;
    }

    .lantern {
        height: 100px !important;
    }

    .searchElement{
        cursor: pointer;
        border-bottom: 2px solid gray;
        padding-bottom: 5px;
    }
</style>

<div id="searchspan" class="ui_overlay ui_modal fullwidth no_padding ppr_rup ppr_priv_masthead_search" style="direction: rtl; overflow: hidden; background-color: #f4f4f4; height: 0; position: fixed; left: 0; right: auto; top: 0; bottom: auto">
    <div class="body_text">
        <div class="search_overlay_content ui_container">
            <div id="DUAL_SEARCH_LOADER_CONTAINER" class="dual_search_loader_container">
                <div class="dual_search_loader_overlay"></div>
                <div class="dual_search_loader_visual">
                    <div class="ui_spinner"></div>
                </div>
            </div>

            <div class="row" style="margin-top: 50px">

                <div class="col-xs-12">
                    <div class="col-xs-5">
                        <div id="addToFilterCityBtn" style="cursor: pointer; text-align: center; float: right; margin-top: 10px; width: 200px; padding: 10px; border-radius: 6px; background-color: #4DC7BC; color: white" class="inner" onclick="goTo()"><span>برو به</span><span>&nbsp;</span><span id="searchKeyCity"></span></div>
                    </div>
                    <div class="col-xs-7">
                        <div class="where_with_highlight" style="width: 60% !important; float: left">
                            <input onkeyup="searchCity()" id="GEO_SCOPED_SEARCH_INPUT" class="text geoScopeInput" style="color: #6d6d6d; border-color: #6d6d6d !important;" value="" placeholder="نام شهر را وارد کنید" autocomplete="off" type="text">
                            <p id="currentCity" style="margin: 10px 0 5px !important;"></p>
                        </div>
                        <div id="resultCity" class="data_holder" style="width: 200px; max-height: 135px; color: #6d6d6d; overflow: auto; margin-top: 10px;"></div>
                    </div>
                </div>

                <center class="col-xs-12" style="width: 70%; margin-left: 15%; margin-top: 15px; height: 5px; box-shadow: 5px 5px 5px #888888;"></center>

                <center class="col-xs-12" style="margin-top: 40px; padding: 0">

                    <div class="col-xs-2"></div>

                    <div class="col-xs-8" style="position: relative !important;">
                        <div class="col-xs-12" style="border-bottom: 2px solid #6d6d6d; padding: 0px !important;">
                            <div class="col-xs-7" style="color: #6d6d6d; height: inherit;">
                            <div class='ui_input_checkbox' style="float: right; width: 50px; cursor: pointer; position: relative">
                                {{--@if($placeMode == "amaken")--}}
                                    {{--<img class="lantern" data-val="on" id="amakenFilter" width="50px" height="100px" src="{{URL::asset('images/on_lamp.gif')}}">--}}
                                {{--@else--}}
                                    {{--<img class="lantern" data-val="off" id="amakenFilter" width="50px" height="100px" src="{{URL::asset('images/off_lamp.png')}}">--}}
                                {{--@endif--}}
                                <center style="top: 104%; left: 15%; width: 70%; position: absolute">اماکن</center>
                            </div>
                            <div class='ui_input_checkbox' style="float: right; width: 50px; cursor: pointer; position: relative">
                                {{--@if($placeMode == "hotel")--}}
                                    {{--<img class="lantern" data-val="on" id="hotelFilter" width="50px" height="100px" src="{{URL::asset('images/on_lamp.gif')}}">--}}
                                {{--@else--}}
                                    {{--<img class="lantern" data-val="off" id="hotelFilter" width="50px" height="100px" src="{{URL::asset('images/off_lamp.png')}}">--}}
                                {{--@endif--}}
                                <center style="top: 104%; left: 15%; width: 70%; position: absolute">هتل</center>
                            </div>
                            <div class='ui_input_checkbox' style="float: right; width: 50px; cursor: pointer; position: relative">
                                {{--@if($placeMode == "restaurant")--}}
                                    {{--<img class="lantern" data-val="on" id="restaurantFilter" width="50px" height="100px" src="{{URL::asset('images/on_lamp.gif')}}">--}}
                                {{--@else--}}
                                    {{--<img class="lantern" data-val="off" id="restaurantFilter" width="50px" height="100px" src="{{URL::asset('images/off_lamp.png')}}">--}}
                                {{--@endif--}}
                                <center style="top: 104%; left: 15%; width: 70%; position: absolute">رستوران</center>
                            </div>
                            <div class='ui_input_checkbox' style="float: right; width: 50px; cursor: pointer; position: relative">
                                {{--@if($placeMode == "majara")--}}
                                    {{--<img class="lantern" data-val="on" id="majaraFilter" width="50px" height="100px" src="{{URL::asset('images/on_lamp.gif')}}">--}}
                                {{--@else--}}
                                    {{--<img class="lantern" data-val="off" id="majaraFilter" width="50px" height="100px" src="{{URL::asset('images/off_lamp.png')}}">--}}
                                {{--@endif--}}
                                <center style="top: 104%; left: 15%; width: 70%; position: absolute">ماجراجویی</center>
                            </div>
                            <div class='ui_input_checkbox' style="float: right; width: 50px; cursor: pointer; position: relative">
                                {{--@if($placeMode == "soghat")--}}
                                    {{--<img class="lantern" data-val="on" id="soghatFilter" width="50px" height="100px" src="{{URL::asset('images/on_lamp.gif')}}">--}}
                                {{--@else--}}
                                    {{--<img class="lantern" data-val="off" id="soghatFilter" width="50px" height="100px" src="{{URL::asset('images/off_lamp.png')}}">--}}
                                {{--@endif--}}
                                <center style="top: 104%; left: 15%; width: 70%; position: absolute">سوغات</center>
                            </div>
                            <div class='ui_input_checkbox' style="float: right; width: 50px; cursor: pointer; position: relative">
                                {{--@if($placeMode == "ghazamahali")--}}
                                    {{--<img class="lantern" data-val="on" id="ghazamahaliFilter" width="50px" height="100px" src="{{URL::asset('images/on_lamp.gif')}}">--}}
                                {{--@else--}}
                                    {{--<img class="lantern" data-val="off" id="ghazamahaliFilter" width="50px" height="100px" src="{{URL::asset('images/off_lamp.png')}}">--}}
                                {{--@endif--}}
                                <center style="top: 104%; left: 15%; width: 70%; position: absolute">غذا محلی</center>
                            </div>
                            <div class='ui_input_checkbox' style="float: right; width: 50px; cursor: pointer; position: relative">
                                {{--@if($placeMode == "sanaye")--}}
                                    {{--<img class="lantern" data-val="on" id="sanayeFilter" width="50px" height="100px" src="{{URL::asset('images/on_lamp.gif')}}">--}}
                                {{--@else--}}
                                    {{--<img class="lantern" data-val="off" id="sanayeFilter" width="50px" height="100px" src="{{URL::asset('images/off_lamp.png')}}">--}}
                                {{--@endif--}}
                                <center style="top: 104%; left: 15%; width: 70%; position: absolute">صنایع</center>
                            </div>
                        </div>
                            <div class="col-xs-5 where_with_highlight">
                            <div style="position: relative">
                                <input onkeyup="searchInPlaces()" style="position: absolute; right: 0; top: 40px; color: #6d6d6d; border: none !important;" id="GEO_SCOPED_SEARCH_INPUT2" class="text geoScopeInput" placeholder="هر کجا که می خواهید بروید را وارد کنید" autocomplete="off" type="text">
                            </div>
                        </div>
                        </div>
                        <div class="col-xs-12" id="filterDiv" style="height: 100px;position: relative !important;">
                            <div id="filters" style="position: relative"></div>
                        </div>
                    </div>

                    <div class="col-xs-2">
                        <div id="resultPlace" class="data_holder" style="max-height: 200px; color: #4DC7BC; overflow: auto; margin-top: 25%; "></div>
                    </div>
                </center>

                {{--<div class="col-xs-12">--}}
                    {{--<div class="col-xs-2"></div>--}}
                    {{--<div class="col-xs-8" id="filterDiv" style="margin-top: 20px">--}}
                        {{--<div id="filters"></div>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-2"></div>--}}
                {{--</div>--}}

                <div class="col-xs-12" style="height: 200px; margin-top: 4%;">
                    <div class="col-xs-12">
                        @for($i = 1; $i < 5; $i++)
                            <div style="width: 22%; height: 180px; float: right; position: relative">
                                <div style="width: 180px; margin: auto; height: inherit">
                                    <span id="removeDiv_{{$i}}" onclick="removeFromCompareList('{{$i}}')" class="hidden glyphicon glyphicon-remove" style="cursor: pointer; position: absolute; top: -12px; background-color: #dddddd"></span>
                                    <div id="compare_{{$i}}_text" style="height: 30px;" class="hidden center"></div>
                                    <div id="compare_{{$i}}_pic" style="height: 150px;" class="hidden center"></div>
                                    <div style="padding: 10px" id="compare_{{$i}}_plus_div">
                                        <span style="padding: 70px 70px; border: 2px dotted #626262; font-size: 15px" class="glyphicon glyphicon-plus"></span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <div style="margin: 7px 0 0 47px; float: left"><button id="compare" onclick="compare()" class="btn btn-primary hidden" style="border: none; background-color: #4DC7BC">مقایسه کن</button></div>
                    </div>
                </div>
            </div>

            <div id="myCloseBtn" class="hidden" onclick="closeInFireFox()" draggable="true" ondragend="dropMenu(event)" ondrop="dropMenu(event)" ondrag="dragging(event)" style="height: 50px; background: url('{{URL::asset('images/menu-icon.png')}}');
                    background-size: 100% 100%;
                    background-repeat: no-repeat no-repeat;
                    border: none;
                    width: 50px;
                    position: fixed;
                    top: 93%;
                    color: white;
                    cursor: pointer;
                    left: 48%;">
            </div>

        </div>
    </div>
    <div class="ui_close_x" id="close_span_search"></div>
</div>

<script>

    function closeInFireFox() {
        if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1){
            $("#searchspan").css('height', "0vh");
            $("#myCloseBtn").addClass('hidden');
        }
    }

    function dropMenu(event) {

        if(event.clientY < 0.7 * window.innerHeight) {
            $("#searchspan").css('height', "0vh");
            $("#myCloseBtn").addClass('hidden');
        }
        else
            $("#searchspan").css('height', "100vh");
    }

    function dragging(event) {
        $("#searchspan").css('height', event.clientY + "px");
    }

    $(".lantern").click(function () {
        if($(this).attr('data-val') == "off") {
            id = $(this).attr('id');
            $(this).attr('data-val', "on");
            $("#" + id).attr('src', '{{URL::asset('images/on_lamp.gif')}}');
        }
        else {
            $(this).attr('data-val', "off");
            id = $(this).attr('id');
            $("#" + id).attr('src', '{{URL::asset('images/off_lamp.png')}}');
        }
        searchInPlaces();
    });
</script>