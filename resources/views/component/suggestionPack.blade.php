<link rel="stylesheet" href="{{URL::asset('css/component/suggestionPack.css')}}">

<div id="suggestionSample" style="display: none;">
    <div class="suggestionPackDiv">
        <div class="suggestionPackContent">
            <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
            <div class="suggestionPackMainBody" style="display: none">
                <a href="##url##" class="suggestionPackPicLink">
                    <div class="suggestionPackPicDiv">
                        <img src="##pic##" alt="##alt##" class="suggestionPackPic resizeImgClass" onload="loadSuggestionPack(this)">
                    </div>
                </a>
                <div class="suggestionPackDetailDiv">
                    <a href="##url##" class="suggestionPackName">##name##</a>
                    <div class="suggestionPackReviewRow" style="display: ##citySection##">
                        <span class="ui_bubble_rating bubble_##rate##0"></span>
                        <span class="suggestionPackReviewCount"> ##review## </span>
                        <span>نقد </span>
                    </div>
                    <div class="suggestionPackReviewRow" style="display: ##articleSetion##">
                        <span class="suggestionPackReviewCount"> ##review## </span>
                        <span>نقد </span>
                    </div>
                    <div class="suggestionPackCityRow" style="display: ##citySection##">
                        ##city##
                        <span> در</span>
                        <span>##state##</span>
                    </div>
                </div>
            </div>

            <div class="suggestionPackMainBody suggestionPlaceHolderDiv">
                <div class="suggestionPackPicLink">
                    <div class="placeHolderAnime"></div>
                </div>
                <div class="suggestionPackDetailDiv">
                    <div class="suggestionPackName placeHolderAnime resultLineAnim" style="width: 80%;"></div>
                    <div class="suggestionPackReviewRow placeHolderAnime resultLineAnim" style="width: 60%;"></div>
                    <div class="suggestionPackCityRow placeHolderAnime resultLineAnim" style="width: 40%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    let suggestionPackSample = $('#suggestionSample').html();
    $('#suggestionSample').remove();

    function createSuggestionPack(_id, _data, _callback = ''){
        // _data = [{
        //     'name'  : '',
        //     'url': '',
        //     'pic': '',
        //     'alt': '',
        //     'rate': '',
        //     'review': '',
        //     'city': '',
        //     'state': '',
        // }];
        _data.forEach(item => {
            let text = suggestionPackSample;
            let fk = Object.keys(item);
            for (let x of fk) {
                let t = '##' + x + '##';
                let re = new RegExp(t, "g");
                text = text.replace(re, item[x]);
            }

            if(item['city']){
                t = '##articleSetion##';
                re = new RegExp(t, "g");
                text = text.replace(re, 'none');

                t = '##citySection##';
                re = new RegExp(t, "g");
                text = text.replace(re, 'flex');
            }
            else{
                t = '##articleSetion##';
                re = new RegExp(t, "g");
                text = text.replace(re, 'flex');

                t = '##citySection##';
                re = new RegExp(t, "g");
                text = text.replace(re, 'none');
            }


            $('#'+_id).append(text);
        });

        if(typeof _callback === 'function')
            _callback();
    }
    function loadSuggestionPack(_element){
        $(_element).parent().parent().parent().show();
        $(_element).parent().parent().parent().next().remove();

        fitThisImg(_element); // in forAllPages
    }

</script>
