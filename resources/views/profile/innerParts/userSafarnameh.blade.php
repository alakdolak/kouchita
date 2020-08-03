
<script src="{{asset('js/ckeditor5/ckeditor5.js')}}"></script>
<script src="{{asset('js/ckeditor5/ckeditorUpload.js')}}"></script>

<div id="safarnamehList" class="userProfileArticles">
    <div class="userProfilePostsFiltrationContainer">
        <div class="userProfilePostsFiltration">
            <span>نمایش بر اساس</span>
            <span>جدیدترین‌ها</span>
            <span>قدمی‌ترین‌ها</span>
            <span>بهترین‌ها</span>
            <span>داغ‌ترین‌ها</span>
            <span>بدترین‌ها</span>
            <span>بیشترین همراهان</span>
        </div>
    </div>

    <div class="userProfilePostsSearchContainer">
        <div class="inputBox">
            <textarea class="inputBoxInput inputBoxInputSearch" type="text" placeholder="جستجو کنید"></textarea>
        </div>
        @if(isset($myPage) && $myPage)
            <button class="btn btn-primary" onclick="openNewSafarnameh()">نوشتن سفرنامه</button>
        @endif
    </div>
    <div id="safarnamehShowList"></div>
</div>

@if(isset($myPage) && $myPage)
    <div id="newSafarnameh" style="display: none;">
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
                        <button class="addPlaceButton" onclick="$('#safarnamehPicInput').click()">
                            انتخاب عکس
                        </button>
                    </label>
                    <input type="file" id="safarnamehPicInput" style="display: none" onchange="changeNewPicSafarnameh(this)">
                    <label for="safarnamehPicInput" class="newSafarnamehImgSection">
                        <img id="newSafarnamehPic" src="{{URL::asset('images/mainPics/default/Placeholder.png')}}" style=" height: 120px">
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
                <div class="pickPlaces ourSuggestion showFullSuggestion"></div>
            </div>

            <div class="row newSafarnamehFooter">
                <div style="width: 100%; padding: 0px 30px;">
                    <ul id="newSafarnamehError" style="color: red"></ul>
                </div>
                <div>
                    <button class="backSafarnameh" onclick="backToSafarnamehList()">بازگشت</button>
                    <button class="btn btn-success submitSafarnameh" style="background: #0d6650" onclick="storeSafarnameh()">ثبت</button>
                </div>
            </div>

        </div>
    </div>

    <div id="placeSuggestionModal" class="modalBlackBack hidden">
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
                    <div class="pickPlaces ourSuggestion showFullSuggestion"></div>
                </div>

                <div class="row" style="margin: 10px; border-top: solid 1px #cccccc; padding-top: 5px;">
                    <div id="ourSuggestionTitle" style="font-size: 20px; font-weight: bold">پیشنهادهای ما</div>
                    <div id="ourSuggestion" class="ourSuggestion showFullSuggestion"></div>

                    <div class="showAllSuggestion" onclick="showAllSuggestionFunc()">مشاهده تمام پیشنهادها</div>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    function getSafarnamehs(){
        let data;
        if(userPageId == 0)
            data = {
                _token: '{{csrf_token()}}',
            };
        else
            data = {
                _token: '{{csrf_token()}}',
                userId: userPageId, // in mainProfile.blade.php
            };

        $.ajax({
            type: 'post',
            url: '{{route("profile.getSafarnameh")}}',
            data: data,
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok'){
                    showSafarnameh(response.result);
                }
            },
            error: function(err){
                console.log(err);
            }
        })
    }

    function showSafarnameh(_result){
        let text = '';

        _result.forEach(item => {
            text += '<div class="usersArticlesMainDiv">\n' +
                '            <div class="articleImgMainDiv" data-toggle="modal" data-target=".showingPhotosModal">\n' +
                '                <img src="' + item.pic + '">\n' +
                '            </div>\n' +
                '            <div class="articleDetailsMainDiv">\n' +
                '                <div class="articleTagsMainDiv">\n' +
                '                    <div class="articleTags">سفرنامه</div>\n' +
                '                </div>\n' +
                '                <div class="articleTitleMainDiv">\n' +
                '                    <a>' + item.title + '</a>\n' +
                '                </div>\n' +
                '                <div class="articleSummarizedContentMainDiv">\n' +
                '                                <span>' + item.summery + '</span>\n' +
                '                    <span>...</span>\n' +
                '                </div>\n' +
                '                <div class="articleSpecificationsMainDiv">\n' +
                '                    <div class="articleDateMainDiv">' + item.time + '</div>\n' +
                '                    <div class="articleCommentsMainDiv">0</div>\n' +
                '                    <div class="articleWriterMainDiv">'+ item.username +'</div>\n' +
                '                    <div class="articleWatchListMainDiv">0</div>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </div>'
        });

        $('#safarnamehShowList').html(text);
    }

    @if(isset($myPage) && $myPage)
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
            fullMainContent();
            $('#safarnamehList').hide();
            $('#newSafarnameh').show();
        }

        function changeNewPicSafarnameh(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e) {
                    safarnamehNewMainPic = input.files[0];
                    $('#newSafarnamehPic').attr('src',  e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
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
                            showSuccessNotifi('سفرنامه شما با موفقیت ثبت شد.', 'left');
                            $('#newSafarnamehTitle').val('');
                            $('#safarnamehSummery').val('');
                            $('#safarnamehTag1').val('');
                            $('#safarnamehTag2').val('');
                            $('#safarnamehTag3').val('');
                            $('.ck-editor__editable').html('');
                            window.editor.setData('');
                            $('#newSafarnamehPic').attr('src', "{{URL::asset('images/mainPics/default/Placeholder.png')}}");
                            safarnamehNewMainPic = null;
                            pickedPlaces = [];
                            suggestionPlaces = [];
                            backToSafarnamehList();
                            createPickPlace();
                        } else
                            showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
                    },
                    error: function (err) {
                        showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
                    }
                })
            }
        }

        function backToSafarnamehList(){
            cancelFullMainContent();
            $('#safarnamehList').show();
            $('#newSafarnameh').hide();
            getSafarnamehs();
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
            if(_result.length == 0)
                $('#ourSuggestionTitle').hide();
            else
                $('#ourSuggestionTitle').show();

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

            if($('#ourSuggestion').height() < 90)
                $('.showAllSuggestion').hide();
            else {
                $('.showAllSuggestion').show();
                $('#ourSuggestion').removeClass('showFullSuggestion');
            }
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
    @endif

</script>
