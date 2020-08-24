

<script src="{{asset('js/ckeditor5/ckeditor5.js')}}"></script>
<script src="{{asset('js/ckeditor5/ckeditorUpload.js')}}"></script>

<style>
    .newSafarnamehSection{
        width: 100%;
        background: white;
        padding: 10px;
        direction: rtl;
        text-align: right;
        border-radius: 10px;
        max-width: 991px;
        height: 97vh;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .newSafarnamehSection .row{
        width: 100%;
        margin: 0px;
    }

    .backSafarnameh{
        border: none;
        background: white;
        margin: 0px 12px;
        color: var(--koochita-blue);
    }

    .submitSafarnameh{
        background: var(--koochita-green);
        border-color: var(--koochita-green);
        border-radius: 11px;
    }
    .newSafarnamehImgSection{
        display: flex;
        margin-top: 10px;
        margin-right: 15px;
        cursor: pointer;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .notPicSafarnameh{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: solid gray;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        color: gray;
    }
    .submitSarnamehButton{
        background: var(--koochita-blue);
        border: none;
        color: white;
        padding: 2px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 20px;
    }
    .textEditor{
        height: 60vh;
        border: solid 1px var(--ck-color-toolbar-border) !important;
        border-top: none !important;
        border-radius: 5px !important;
    }
    .addPlaceButton{
        border: none;
        background: var(--koochita-green);
        font-size: 10px;
        cursor: pointer;
        color: white;
        font-weight: 100;
        padding: 3px 5px;
        border-radius: 10px;
    }
    .newSafarnamehFooter{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        border-top: solid 1px #cccccc;
        margin-top: 20px;
        padding-top: 20px;
    }

    .searchResultPlacess{
        display: none;
        position: absolute;
        width: 90%;
        background: white;
        border: solid 1px gray;
        border-radius: 10px;
        max-height: 50vh;
        overflow: auto;
        z-index: 999;
    }
    .searchResultPlacess > div{
        margin-bottom: 10px;
        margin: 10px;
        padding: 5px;
        cursor: pointer;
    }
    .searchResultPlacess > div:hover{
        background: #6666;
        border-radius: 10px;
    }
    .placeSuggKind{
        float: right;
    }

    .placeSuggestionBody{
        background: white;
        width: 80%;
        direction: rtl;
        text-align: right;
        padding: 15px 0px;
        border-radius: 10px;
        overflow-y: auto;
        max-height: 90vh;
        position: relative;
        overflow: inherit;
    }

    .closeSuggestionModal{
        position: absolute;
        font-size: 30px;
        left: 10px;
        top: 0px;
        z-index: 99;
        cursor: pointer;
        color: var(--koochita-light-green);
    }

    .ourSuggestion{
        display: flex;
        flex-wrap: wrap;
        transition: .5s;
        padding-bottom: 10px;
        overflow: auto;
        max-height:30vh;
    }

    .ourSuggestionMainPage{
        display: flex;
        flex-wrap: wrap;
        transition: .5s;
        padding-bottom: 10px;
        overflow: auto;
    }

    .showFullSuggestion{
        height: 30vh !important;
        overflow: auto;
    }

    .suggEach{
        display: flex;
        align-items: center;
        padding: 5px;
        margin: 10px;
        cursor: pointer;
        transition: .4s;
        padding-left: 20px;
        width: 185px;
        position: relative;
        border-radius: 60px;
        background-color: #fcc15642;
        height: 70px;
    }

    .suggEach:hover{
        background-color: #e4e4e4;
        border-radius: 60px;
    }

    .deletePickPlace{
        display: none;
        position: absolute;
        top: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        font-size: 80px;
        color: red;
    }

    .suggEach:hover .deletePickPlace{
        display: flex;
    }

    .suggPic{
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border-radius: 50%;
        position: relative;
    }

    .suggInfo{
        margin-right: 10px;
        display: flex;
        flex-direction: column;
        width: calc(100% - 80px);
        font-size: 12px;
    }

    .suggInfoState{
        font-size: 9px;
        color: #666666;
        vertical-align: middle;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .showAllSuggestion{
        text-align: center;
        color: blue;
        font-size: 13px;
        cursor: pointer;
        margin-top: 12px;

    }

    @media (max-width: 991px) {
        .ourSuggestion{
            max-height: 25vh;
        }
        .placeSuggKind{
            float: none;
        }

        .deletePickPlace{
            display: flex;
            position: absolute;
            width: 20px;
            left: 20px;
            font-size: 29px;
            z-index: 99;
            top: 0px;
            height: fit-content;
            justify-content: normal;
            align-items: unset;
            right: auto;
        }
    }
</style>

<div id="newSafarnameh" class="modalBlackBack" style="display: none; z-index: 9999;">
    <div class="newSafarnamehSection">
        <div class="row">
            <div class="form-group">
                <label for="safarnamehTitle">برای سفرنامت یک عنوان بنویسید</label>
                <input id="newSafarnamehTitle" type="text" class="form-control" placeholder="عنوان سفرنامه">
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="safarnamehSummery">می تونی یه خلاصه از سفرنامت تو 100 کاراکتر بنویسی (اختیاری)</label>
                <textarea id="safarnamehSummery" class="form-control" rows="1" placeholder="خلاصه سفرنامه"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="safarnamehText" class="inputLabel">متن سفرنامت رو اینجا بنویس</label>
                <div class="toolbar-container"></div>
                <div id="safarnamehText" class="textEditor"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="safarnamehTags">برای سفرنامه خود برچسپ بگذارید</label>
                <input type="text" id="safarnamehTag1" class="form-control" placeholder="برچسپ اول" style="margin-bottom: 10px">
                <input type="text" id="safarnamehTag2" class="form-control" placeholder="برچسپ دوم" style="margin-bottom: 10px">
                <input type="text" id="safarnamehTag3" class="form-control" placeholder="برچسپ سوم">
            </div>
            <div class="col-md-6 form-group" style="display: flex; flex-direction: column;">
                <label>خب یه عکس خوب هم از سفرنامت
                    {{--                        <button class="addPlaceButton" onclick="$('#safarnamehPicInput').click()">--}}
                    {{--                            انتخاب عکس--}}
                    {{--                        </button>--}}
                </label>
                <input type="file" id="safarnamehPicInput" accept="image/*" style="display: none" onchange="changeNewPicSafarnameh(this)">
                <label for="safarnamehPicInput" class="newSafarnamehImgSection">
                    <div class="notPicSafarnameh">
                        <span class="plus2" style="font-size: 40px; line-height: 20px;"></span>
                        <span>افزودن عکس </span>
                    </div>
                    <img id="newSafarnamehPic" src="#" style=" height: 120px; display: none">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="form-group" style="display: flex; flex-direction: column;">
                <label>
                    محل های مرتبط به سفرنامه خود را انتخاب کنید.
                    <button class="addPlaceButton" onclick="openSuggestion()">
                        افزودن محل جدید
                    </button>
                </label>
            </div>
            <div class="pickPlaces ourSuggestionMainPage" style="max-height: 1000vh"></div>
        </div>

        <div class="row newSafarnamehFooter">
            <div style="width: 100%; padding: 0px 30px;">
                <ul id="newSafarnamehError" style="color: red"></ul>
            </div>
            <div>
                <button class="backSafarnameh" onclick="closeNewSafarnameh()">{{__('بستن')}}</button>
                <button class="btn btn-success submitSafarnameh" style="background: var(--koochita-green)" onclick="storeSafarnameh()">ثبت</button>
            </div>
        </div>

    </div>
</div>

<div id="placeSuggestionModal" class="modalBlackBack hidden" style="z-index: 10000;">
    <div class="placeSuggestionBody">
        <div class="iconClose closeSuggestionModal" onclick="closeSuggestion()"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 form-group placeSuggKind">
                    <label for="kindPlace">نوع محل را مشخص کنید.</label>
                    <select id="kindPlace" class="form-control" onchange="$('#searchResultPlacess').hide(); $('#placeName').val('')">
                        <option value="state">استان</option>
                        <option value="city">شهر</option>
                        <option value="village">روستا</option>
                        <option value="boomgardies">بوم گردی</option>
                        <option value="amaken">اماکن</option>
                        <option value="restaurant">رستوران</option>
                        <option value="hotels">هتل</option>
                        <option value="majara">طبیعت گردی</option>
                        <option value="sogatSanaies">صنایع دستی و سوغات</option>
                        <option value="mahaliFood">غذا</option>
                    </select>
                </div>
                <div class="col-md-8 form-group">
                    <label> نام محل</label>
                    <input type="text" id="placeName" class="form-control" onkeyup="searchForPlaces(this.value)">
                    <div id="searchResultPlacess" class="searchResultPlacess"></div>
                </div>
            </div>

            <div class="row" style="padding: 10px">
                <div id="pickPlacesTitle" style="font-size: 20px; font-weight: bold">انتخاب شده ها</div>
                <div class="pickPlaces ourSuggestion"></div>
            </div>

            <div class="row" style="margin: 10px; border-top: solid 1px #cccccc; padding-top: 5px;">
                <div class="ourSuggestionShow" style="font-size: 20px; font-weight: bold">پیشنهادهای ما</div>
                <div id="ourSuggestion" class="ourSuggestion ourSuggestionShow" style="max-height: 20vh"></div>
                {{--                    <div class="showAllSuggestion ourSuggestionShow" onclick="showAllSuggestionFunc()">مشاهده تمام پیشنهادها</div>--}}
            </div>
            <div class="row" style="text-align: center">
                <button class="submitSarnamehButton" onclick="closeSuggestion()">{{__('ثبت')}}</button>
            </div>
        </div>
    </div>
</div>

<script>
    DecoupledEditor.create( document.querySelector('#safarnamehText'), {
        language: '{{app()->getLocale()}}',
        removePlugins: [ 'FontSize', 'MediaEmbed' ],
    })
        .then( editor => {
            const toolbarContainer = document.querySelector( '.toolbar-container');
            toolbarContainer.prepend( editor.ui.view.toolbar.element );
            window.editor = editor;
            textEditor = editor;
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                let data = {
                    id: '{{auth()->user()->id}}',
                };
                data = JSON.stringify(data);
                return new MyUploadAdapter( loader, '{{route("profile.safarnameh.storePic")}}', '{{csrf_token()}}', data);
            };

        } )
        .catch( err => {
            console.error( err.stack );
        });

    let safarnamehNewMainPic = null;
    let getSuggestionPlaceAjax = null;
    let pickedPlaces = [];
    let searchResultPlacess = [];
    let suggestionPlaces;

    function openNewSafarnameh(){
        if(checkLogin())
            $('#newSafarnameh').css('display', 'flex');
    }

    function changeNewPicSafarnameh(input){
        if(input.files && input.files[0])
            cleanImgMetaData(input, function(imgDataURL, _file){
                safarnamehNewMainPic = _file;
                $('.notPicSafarnameh').hide();
                $('#newSafarnamehPic').show();
                $('#newSafarnamehPic').attr('src', imgDataURL);
            });
    }
    function storeSafarnameh(){
        var formDa = new FormData();
        var title = $('#newSafarnamehTitle').val();
        var summery = $('#safarnamehSummery').val();
        var text = window.editor.getData();
        var tags = [];
        var error = false;

        $('#newSafarnamehError').html('');
        if(title.trim().length < 2){
            $('#newSafarnamehError').append('<li>انتخاب عنوان برای سفرنامه الزامی است.</li>');
            error = true;
        }
        if(safarnamehNewMainPic == null){
            $('#newSafarnamehError').append('<li>انتخاب عکس برای سفرنامه الزامی است.</li>');
            error = true;
        }
        if(text.trim().length < 10){
            $('#newSafarnamehError').append('<li>نوشتن متن برای سفرنامه الزامی است.</li>');
            error = true;
        }

        if(!error) {
            openLoading();
            tags.push($('#safarnamehTag1').val());
            tags.push($('#safarnamehTag2').val());
            tags.push($('#safarnamehTag3').val());

            formDa.append('pic', safarnamehNewMainPic);
            formDa.append('title', title);
            formDa.append('summery', summery);
            formDa.append('text', text);
            formDa.append('tags', tags);
            formDa.append('placePick', JSON.stringify(pickedPlaces));

            $.ajax({
                type: 'post',
                url: '{{route('profile.safarnameh.new')}}',
                data: formDa,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response == 'ok') {
                        showSuccessNotifi('سفرنامه شما با موفقیت ثبت شد.', 'left', 'var(--koochita-blue)');

                        if(location.pathname == '{{route('profile')}}')
                            location.reload();
                        else
                            location.href = '{{route('profile')}}#safarnameh';
                        closeLoading();
                        // $('#newSafarnamehTitle').val('');
                        // $('#safarnamehSummery').val('');
                        // $('#safarnamehTag1').val('');
                        // $('#safarnamehTag2').val('');
                        // $('#safarnamehTag3').val('');
                        // $('.ck-editor__editable').html('');
                        // window.editor.setData('');
                        // $('.notPicSafarnameh').css('display', 'flex');
                        // $('#newSafarnamehPic').hide();
                        // $('#newSafarnamehPic').attr('src', "#");
                        // safarnamehNewMainPic = null;
                        // pickedPlaces = [];
                        // suggestionPlaces = [];
                        // closeNewSafarnameh();
                        // createPickPlace();
                    } else {
                        showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
                        closeLoading();
                    }
                },
                error: function (err) {
                    showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
                    closeLoading();
                }
            })
        }
    }

    function closeNewSafarnameh(){
        $('#newSafarnameh').hide();
    }

    function openSuggestion(){
        $('#placeSuggestionModal').removeClass('hidden');
        getSuggestionPlace();
        createPickPlace();
    }

    function closeSuggestion(){
        $('#placeSuggestionModal').addClass('hidden');
    }

    function getSuggestionPlace(){
        $.ajax({
            type: 'post',
            url: '{{route("profile.safarnameh.placeSuggestion")}}',
            data: {
                _token: '{{csrf_token()}}',
                text: window.editor.getData(),
            },
            success: function(response){
                suggestionPlaces = JSON.parse(response).result;
                createSuggestion(suggestionPlaces);
            },
            error: function(err){

            }
        })
    }

    function createSuggestion(_result){
        text = '';
        _result.forEach((item, index) => {
            text += '<div id="place_' + item.id + '" class="suggEach" onclick="chooseThisSuggestion(' + index + ')">\n' +
                '    <div class="suggPic">\n' +
                '        <img src="' + item.pic + '" style="height: 100%">\n' +
                '    </div>\n' +
                '    <div class="suggInfo">\n' +
                '        <div style="font-size: 12px; color: #666666;">' + item.kindPlaceName + '</div>\n' +
                '        <div style="font-weight: bold">' + item.name + '</div>\n' +
                '        <div class="suggInfoState">' + item.state + '</div>\n' +
                '    </div>\n' +
                '</div>';
        });
        $('#ourSuggestion').html(text);

        // if($('#ourSuggestion').height() < 90)
        //     $('.showAllSuggestion').hide();
        // else {
        //     $('.showAllSuggestion').show();
        //     $('#ourSuggestion').removeClass('showFullSuggestion');
        // }

        if(_result.length == 0)
            $('.ourSuggestionShow').hide();
        else
            $('.ourSuggestionShow').show();
    }

    function createPickPlace(){
        if(pickedPlaces.length == 0)
            $('#pickPlacesTitle').hide();
        else
            $('#pickPlacesTitle').show();

        text = '';
        pickedPlaces.forEach((item, index) => {
            text += '<div id="place_' + item.id + '" class="suggEach">\n' +
                '    <div class="iconClose deletePickPlace" onclick="deleteFromPickPlace(' + index + ')"></div>' +
                '    <div class="suggPic">\n' +
                '        <img src="' + item.pic + '" style="height: 100%">\n' +
                '    </div>\n' +
                '    <div class="suggInfo">\n' +
                '        <div style="font-size: 12px; color: #666666;">' + item.kindPlaceName + '</div>\n' +
                '        <div style="font-weight: bold">' + item.name + '</div>\n' +
                '        <div class="suggInfoState">' + item.state + '</div>\n' +
                '    </div>\n' +
                '</div>';
        });
        $('.pickPlaces').html(text);
    }

    function chooseThisSuggestion(_index){
        let sug = suggestionPlaces[_index];
        let inPick = false;
        pickedPlaces.forEach((item, index) => {
            if(item.kindPlaceId == sug.kindPlaceId && item.placeId == sug.placeId)
                inPick = true;
        });
        if(!inPick)
            pickedPlaces.push(sug);

        createPickPlace();
    }

    function deleteFromPickPlace(_index){
        pickedPlaces.splice(_index, 1);
        createPickPlace();
    }

    function showAllSuggestionFunc(){
        $('#ourSuggestion').toggleClass('showFullSuggestion');
    }

    function searchForPlaces(_text){
        if(getSuggestionPlaceAjax != null)
            getSuggestionPlaceAjax.abort();

        $('#searchResultPlacess').html('');
        $('#searchResultPlacess').hide();

        if(_text.trim().length > 1) {
            getSuggestionPlaceAjax = $.ajax({
                type: 'post',
                url: '{{route("profile.safarnameh.searchSuggestion")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    kindPlace: $('#kindPlace').val(),
                    text: _text
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == 'ok') {
                        searchResultPlacess = response.result;
                        createSearchResult(searchResultPlacess);
                    }
                }
            })
        }
    }

    function createSearchResult(_result){
        let text = '';
        _result.forEach((item, index) => {
            text += '<div onclick="chooseSearch(' + index + ')">\n' +
                '   <div>' + item.name + '</div>\n' +
                '   <div style="color: #666666; font-size: 10px">' + item.state + '</div>\n' +
                '</div>'
        });

        $('#searchResultPlacess').html(text);
        $('#searchResultPlacess').show();
    }

    function chooseSearch(_index){
        let sug = searchResultPlacess[_index];
        let inPick = false;
        pickedPlaces.forEach((item, index) => {
            if(item.kindPlaceId == sug.kindPlaceId && item.placeId == sug.placeId)
                inPick = true;
        });
        if(!inPick)
            pickedPlaces.push(sug);

        $('#searchResultPlacess').html('');
        $('#searchResultPlacess').hide();

        createPickPlace();
    }
</script>