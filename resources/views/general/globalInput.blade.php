<link rel="stylesheet" href="{{URL::asset('css/globalSearch.css')}}">

<div id="globalSearch" class="globalSearchBlackBackGround">
    <div class="row">
        <div class="globalSearchWithBox">
            <div class="row">
                <div class="close" onclick="closeSearchInput()">close</div>
            </div>
            <div class="row" style="width: 100%; text-align: center;">
                <input id="globalSearchInput" type="text" class="globalSearchInputField" placeholder="" onkeyup="">
            </div>
            <div class="row" style="width: 100%;">
                <div id="globalSearchResult" class="data_holder globalSearchResult"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function createSearchInput(_doFuncName, _placeHolderTxt){

        $('#globalSearchInput').attr('onkeyup', _doFuncName+'(this)');
        $('#globalSearchInput').attr('placeholder', _placeHolderTxt);
        $('#globalSearchInput').val('');

        $('#globalSearchResult').html('');

        $('#globalSearch').css('display', 'flex');
    }

    function setResultToGlobalSearch(_txt){
        $('#globalSearchResult').html(_txt);
    }

    function clearGlobalResult(){
        $('#globalSearchResult').html('');
    }

    function closeSearchInput(){
        $('#globalSearch').css('display', 'none');
    }
</script>