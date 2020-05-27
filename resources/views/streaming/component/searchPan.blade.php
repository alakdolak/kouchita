<link rel="stylesheet" href="{{URL::asset('css/streaming/component/searchPan.css')}}">

<span id="searchPane" class="hidden searchPanes">
        <div id="searchDivForScroll" class="prw_rup prw_search_typeahead spSearchDivForScroll">
            <div>
                <div class="typeahead_align">
                    <div id="firstPanSearchText" class="spGoWhere"></div>
                    <input onkeyup="searchMain(event, this.value)" type="text" id="searchPanInput" class="typeahead_input searchPaneInput" placeholder="دنبال چه محتوایی هستید؟"/>
                </div>

                <div class="spBorderBottom"></div>
                <div class="mainContainerSearch">
                    <div class="data_holder searchPangResultSection display-none">
                        <div id="searchPangResult"></div>
                    </div>
                    <div class="visitSuggestionDiv">
                            <div class="visitSuggestionText">بازدید های اخیر شما</div>

                            <div id="recentlyRowMainSearch" class="visitSuggestion4Box">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget spBoxOfSuggestion">
                                    <div class="mainSearchpoi">
                                        <div class="prw_rup prw_common_thumbnail_no_style_responsive prw_common_thumbnail_no_style_responsive22">
                                            <div class="prv_thumb has_image" style="height: 100%">
                                                <div class="image_wrapper spImageWrapper landscape landscapeWide mainSearchImgTop">
                                                    <img src="##pic##" alt="##title##" class="image" style="height: 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="##redirect##" class="textsOfRecently">
                                            <div class="detail direction-rtl" style="width: 100%;">
                                                <div class="textsOfRecently_text">##title##</div>
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
    let searchRequestNumber = 0;

    function openMainSearch(){
        showLastPages();

        $('#searchPane').removeClass('hidden');
        $('#darkModeMainPage').toggle();
        $('#searchPanInput').val('');
        $('#searchPanInput').focus();

        $("#searchPangResult").empty();
    };

    function searchMain(e, val = '') {
        if (val.trim().length < 2) {
            val = $("#searchPanInput").val();
            $('.searchPangResultSection').addClass('display-none');
        }
        else {
            searchRequestNumber++;
            $.ajax({
                type: "post",
                url: '{{route("streaming.search")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    value: val,
                    num: searchRequestNumber
                },
                success: function (response) {
                    try {
                        response = JSON.parse(response);
                        if(response.status == 'ok' && response.num == searchRequestNumber)
                            createSearchResponse(response.result);
                    }
                    catch (e) {
                    }
                }
            });

        }
    }

    function createSearchResponse(response){
        newElement = "";

        if ($("#searchPanInput").val().trim().length == 0) {
            $('.searchPangResultSection').addClass('display-none');
            return;
        }

        for (i = 0; i < response.length; i++) {
            newElement += '<a class="aSearchResult" href="' + response[i].url + '">\n';
            newElement += "<div class='searchPanSuggest' id='suggest_" + i + "' style='margin: 0px; font-size: 25px'>" + response[i].title + "</div>";
            newElement += "<div class='searchPanSuggest' id='suggest_" + i + "' style='margin: 5px 20px 0px 0px; font-weight: bold; font-size: 14px'>" + response[i].category + "</div></a>";
        }

        if (response.length != 0)
            $('.searchPangResultSection').removeClass('display-none');
        else
            $('.searchPangResultSection').addClass('display-none');

        $("#searchPangResult").empty().append(newElement);
    }


    let recentlyMainSearchSample = 0;
    let localStorageData = 0;
    @if(isset($localStorageData))
        localStorageData = {!! json_encode($localStorageData) !!}
    @endif

    if (typeof(Storage) !== "undefined") {
        var lastPages;

        lastPages = localStorage.getItem('lastPagesKoochitaTv');
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

            localStorage.setItem('lastPagesKoochitaTv', JSON.stringify(lastPages));
        }

    } else
        console.log('your browser not support localStorage');

    function showLastPages(){

        var lastPages = localStorage.getItem('lastPagesKoochitaTv');
        lastPages = JSON.parse(lastPages);

        if(recentlyMainSearchSample == 0)
            recentlyMainSearchSample = $('#recentlyRowMainSearch').html();

        $('#recentlyRowMainSearch').html('');

        if(lastPages != null){

            for(i = 0; i < lastPages.length; i++){
                let text = recentlyMainSearchSample;
                let fk = Object.keys(lastPages[i]);

                text = text.replace(re, name);
                for (let x of fk) {
                    let t = '##' + x + '##';
                    let re = new RegExp(t, "g");
                    text = text.replace(re, lastPages[i][x]);
                }

                $('#recentlyRowMainSearch').append(text);
            }
        }
    }
</script>