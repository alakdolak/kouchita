<link rel="stylesheet" href="{{URL::asset('css/mainSearch.css')}}">
<span id="searchPane" class="statePane ui_overlay ui_modal editTags hidden searchPanes">
        <div id="searchDivForScroll" class="prw_rup prw_search_typeahead spSearchDivForScroll">
            <div class="ui_picker">
                <div class="typeahead_align ui_typeahead full-width display-flex">

                    <div id="firstPanSearchText" class="spGoWhere">به کجا</div>
                    <input onkeyup="searchMain(event, this.value)" type="text" id="placeName" class="typeahead_input searchPaneInput" placeholder="دوست دارید سفر کنید؟"/>
                    <input type="hidden" id="kindPlaceIdForMainSearch" value="0">
                    <input type="hidden" id="placeId">

                </div>
                <div class="spBorderBottom"></div>
                <div class="mainContainerSearch">
                    <div id="result" class="data_holder display-noneImp"></div>

                    <div class="visitSuggestionDiv">
                            <div class="visitSuggestionText">بازدید های اخیر شما</div>

                            <div id="recentlyRowMainSearch" class="visitSuggestion4Box">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget spBoxOfSuggestion">
                                    <div class="mainSearchpoi">
                                        <div class="prw_rup prw_common_thumbnail_no_style_responsive prw_common_thumbnail_no_style_responsive22">
                                            <div class="prv_thumb has_image" style="height: 100%">
                                                <div class="image_wrapper spImageWrapper landscape landscapeWide mainSearchImgTop">
                                                    <img src="##mainPic##" alt="##name##" class="image" style="height: 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="##redirect##" class="textsOfRecently">
                                            <div class="detail direction-rtl">
                                                <p style="font-size: .7vw !important; text-align: center; line-height: 1.5vw; padding: 5px; white-space: normal">##name##</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>

            </div>
        </div>
        <div onclick="$('#searchPane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

<script>
    var searchDir = '{{route('totalSearch')}}';
    var lastTimeMainSearch = 0;
    var recentlyMainSearchSample = 0;
    var localStorageData = 0;
    @if(isset($localStorageData))
        localStorageData = {!! json_encode($localStorageData) !!}
    @endif

    function openMainSearch(_kindPlaceId){
        showLastPages();

        var fpst;
        var pn;
        switch (_kindPlaceId){
            case 0:
                fpst = 'به کجا';
                pn = 'دوست دارید سفر کنید؟';
                break;
            case 1:
                fpst = 'کدام جاذبه';
                pn = 'را می‌خواهید تجربه کنید؟';
                break;
            case 3:
                fpst = 'در کدام رستوران';
                pn = 'دوست دارید غذا بخورید؟';
                break;
            case 4:
                fpst = 'در کدام هتل';
                pn = 'دوست دارید اقامت کنید؟';
                break;
            case 10:
                fpst = 'کدام صنایع‌دستی یا سوغات ';
                pn = 'را دوست دارید بشناسید؟';
                break;
            case 11:
                fpst = 'کدام غذای محلی';
                pn = 'را می‌خواهید تجربه کنید؟';
                break;
        }

        $('#kindPlaceIdForMainSearch').val(_kindPlaceId);
        $('#firstPanSearchText').text(fpst);
        $('#placeName').attr('placeholder', pn);

        $('#searchPane').removeClass('hidden');
        $('#darkModeMainPage').toggle();
        $('#placeName').val('');
        $('#placeName').focus();

        $("#result").empty();
    }

    function redirect() {
        "" != $("#placeId").val() && (document.location.href = $("#placeId").val())
    }

    function searchMain(e, val = '') {
        if (val == '')
            val = $("#placeName").val();

        var kindPlaceId = $('#kindPlaceIdForMainSearch').val();

        $(".suggest").css("background-color", "transparent").css("padding", "0").css("border-radius", "0");
        if (null == val || "" == val || val.length < 2) {
            $('#result').addClass('display-noneImp');
            $("#result").empty();
        }
        else {
            var scrollVal = $("#searchDivForScroll").scrollTop();

            if (13 == e.keyCode && -1 != currIdx) {
                $("#placeId").val(suggestions[currIdx].url);
                return redirect();
            }

            if (13 == e.keyCode && -1 == currIdx && suggestions.length > 0) {
                $("#placeId").val(suggestions[0].url);
                return redirect();
            }

            if (40 == e.keyCode) {
                if (currIdx + 1 < suggestions.length) {
                    currIdx++;
                    $("#searchDivForScroll").scrollTop(scrollVal + 25);
                }
                else {
                    currIdx = 0;
                    $("#searchDivForScroll").scrollTop(0);
                }

                if (currIdx >= 0 && currIdx < suggestions.length) {
                    $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px");
                }

                return;
            }
            if (38 == e.keyCode) {
                if (currIdx - 1 >= 0) {
                    currIdx--;
                    $("#searchDivForScroll").scrollTop(scrollVal - 25);
                }
                else {
                    currIdx = suggestions.length - 1;
                    $("#searchDivForScroll").scrollTop(25 * suggestions.length);
                }

                if (currIdx >= 0 && currIdx < suggestions.length)
                    $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px");
                return;
            }

            if ("ا" == val[0]) {
                for (val2 = "آ", i = 1; i < val.length; i++) val2 += val[i];
                $.ajax({
                    type: "post",
                    url: searchDir,
                    data: {
                        kindPlaceId: kindPlaceId,
                        key: val,
                        key2: val2,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        createSearchResponse(response);
                    }
                })
            }
            else $.ajax({
                type: "post",
                url: searchDir,
                data: {
                    kindPlaceId: kindPlaceId,
                    key: val,
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    createSearchResponse(response);
                }
            })
        }

    }

    function createSearchResponse(response){
        newElement = "";

        if (response.length == 0) {
            newElement = "موردی یافت نشد";
            $("#placeId").val("");
            return;
        }

        var resutl = JSON.parse(response);
        currIdx = -1;
        suggestions = resutl[1];

        response = resutl[1];
        console.log(resutl[0]);
        if(lastTimeMainSearch == 0 || lastTimeMainSearch <= resutl[0]) {
            lastTimeMainSearch = resutl[0];
            var icon;
            for (i = 0; i < response.length; i++) {
                if (response[i].mode == "state") {
                    newElement += '<a href="' + response[i].url + '" style="color: black;"><div class="icons location spIcons"></div>\n';
                    newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "'>استان " + response[i].targetName + "</p></a>";
                }
                else if (response[i].mode == "city") {
                    newElement += '<a href="' + response[i].url + '" style="color: black;"><div class="icons location spIcons"></div>\n';
                    newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' style='margin: 0px'>شهر " + response[i].targetName + "</p>";
                    newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "'>" + response[i].stateName + "</p></a>";
                }
                else {
                    if (response[i].mode == 'amaken')
                        icon = 'touristAttractions';
                    else if (response[i].mode == 'restaurant')
                        icon = 'touristAttractions';
                    else if (response[i].mode == 'hotel')
                        icon = 'hotelIcon';
                    else if (response[i].mode == 'sogatSanaies')
                        icon = 'souvenirIcon';
                    else if (response[i].mode == 'mahaliFood')
                        icon = 'traditionalFood';
                    else if (response[i].mode == 'majara')
                        icon = 'adventure';

                    newElement += '<a href="' + response[i].url + '" style="color: black;"><div class="icons ' + icon + ' spIcons"></div>\n';
                    newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' style='margin: 0px'>" + response[i].targetName + "</p>";
                    newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "'>" + response[i].cityName + " در " + response[i].stateName + "</p></a>";
                }
            }

            if (response.length != 0)
                $('#result').removeClass('display-noneImp')
            else
                $('#result').addClass('display-noneImp');

            $("#result").empty().append(newElement);
        }
    }

    if (typeof(Storage) !== "undefined") {
        var lastPages;

        lastPages = localStorage.getItem('lastPages');
        lastPages = JSON.parse(lastPages);

        if(localStorageData != 0){
            if(lastPages != null) {
                for(i = 0; i < lastPages.length; i++){
                    if(lastPages[i]['redirect'] == localStorageData['redirect']){
                        lastPages.splice(i, 1);
                    }
                }
                lastPages.unshift(localStorageData);
                if (lastPages.length == 9)
                    lastPages.pop();
            }
            else {
                lastPages = [];
                lastPages.unshift(localStorageData);
            }

            localStorage.setItem('lastPages', JSON.stringify(lastPages));
        }

    } else
        console.log('your browser not support localStorage');

    function showLastPages(){

        var lastPages = localStorage.getItem('lastPages');
        lastPages = JSON.parse(lastPages);

        if(recentlyMainSearchSample == 0)
            recentlyMainSearchSample = $('#recentlyRowMainSearch').html();

        $('#recentlyRowMainSearch').html('');

        for(i = 0; i < lastPages.length; i++){
            var text = recentlyMainSearchSample;
            var fk = Object.keys(lastPages[i]);

            var name = lastPages[i]['name'];
            t = '##name##';
            re = new RegExp(t, "g");

            if(lastPages[i]['kind'] == 'city')
                name +=' در ' + lastPages[i]['state'];
            else if(lastPages[i]['kind'] == 'place')
                name +=' در ' + lastPages[i]['city'];
            else if(lastPages[i]['kind'] == 'article')
                name = 'مقاله ' + lastPages[i]['name'];
            text = text.replace(re, name);

            for (var x of fk) {
                var t = '##' + x + '##';
                var re = new RegExp(t, "g");

                if(x == 'city' && lastPages[i]['state'] != '')
                    text = text.replace(re, lastPages[i][x] + ' در ');
                else
                    text = text.replace(re, lastPages[i][x]);
            }

            $('#recentlyRowMainSearch').append(text);
        }

    }
</script>