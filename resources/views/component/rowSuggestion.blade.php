<style>

    .topPlacesDivInCity{
        margin: 40px 10px;
        padding: 20px 20px;
        background: #053a3e;
        margin-top: 0px;
    }
    .topPlacesDivInCityHeader{
        direction: rtl;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .topPlacesDivInCityHeader a {
        margin: 0 5px;
        color: #eab836;
    }
    .topPlacesDivInCityHeader div{
        margin: 0px;
    }

    .nagLogo{
        width: 50px;
    }
</style>

<div id="topPlacesSection" class="mainSuggestionMainDiv cpBorderBottom ng-scope" style="display: none;">
    <div id="##id##" class="topPlacesDivInCity">
        <div class="topPlacesDivInCityHeader">
            <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
            <a href="##url##">
                <div class="shelf_title_container h3">
                    <h3>##name##</h3>
                </div>
            </a>
        </div>
        <div class="swiper-container mainSuggestion" style="padding-top: 15px; background: inherit;">
            <div id="##id##Content" class="swiper-wrapper thisfirsPlaceHolder" style="position: relative;"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<script>
    let topPlacesSample = 0;
    let rowSectionInfos;
    {{--rowSectionInfos = [
        {
            name: headerTxt,
            id: rowId,
            url: headerLink
        }
    ];--}}

    createSuggestionPackPlaceHolderClassName('thisfirsPlaceHolder');

    topPlacesSample = $('#topPlacesSection').html();
    $('#topPlacesSection').html('');
    $('#topPlacesSection').show();


    function initPlaceRowSection(_headers){
        rowSectionInfos = _headers;
        createTopPlacesSection();
    }

    function createTopPlacesSection(){
        rowSectionInfos.forEach(item => {
            let text = topPlacesSample;
            let fk = Object.keys(item);
            for (let x of fk) {
                let t = '##' + x + '##';
                let re = new RegExp(t, "g");
                text = text.replace(re, item[x]);
            }
            $('#topPlacesSection').append(text);
        });
    }

</script>