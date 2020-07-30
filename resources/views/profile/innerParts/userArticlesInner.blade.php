<style>
    .newSafarnamehSection{
        width: 100%;
        background: white;
        padding: 10px;
        direction: rtl;
        text-align: right;
    }

    .newSafarnamehSection .row{
        width: 100%;
        margin: 0px;
    }

    .backSafarnameh{
        border: none;
        background: white;
        margin: 0px 12px;
        color: #0076a3;
    }

    .submitSafarnameh{
        background: #0d6650;
        border-color: #0d6650;
        border-radius: 11px;
    }
    .newSafarnamehImgSection{
        margin-top: 10px;
        margin-right: 15px;
        cursor: pointer;
    }

    .textEditor{
        height: 30vh;
        border: solid 1px var(--ck-color-toolbar-border) !important;
        border-top: none !important;
        border-radius: 5px !important;
    }
</style>

<script src="{{asset('js/ckeditor5/ckeditor5.js')}}"></script>

<div class="userProfileActivitiesDetailsMainDiv userActivitiesArticles col-sm-8 col-xs-12">

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
            <button class="btn btn-primary" onclick="openNewSafarnameh()">نوشتن سفرنامه</button>
        </div>
        <div id="safarnamehShowList"></div>
    </div>

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
{{--                <div class="form-group">--}}
{{--                    <label for="safarnamehText"></label>--}}
{{--                    <textarea id="safarnamehText" class="form-control" rows="5" placeholder="متن سفرنامه"></textarea>--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="safarnamehText" class="inputLabel">متن سفرنامت رو اینجا بنویس</label>
                    <div class="toolbar-container"></div>
                    <div id="safarnamehText" class="textEditor"></div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" style="display: flex; flex-direction: column;">
                    <label>خب یه عکس خوب هم از سفرنامت</label>
                    <input type="file" id="safarnamehPicInput" style="display: none" onchange="changeNewPicSafarnameh(this)">
                    <label for="safarnamehPicInput" class="newSafarnamehImgSection">
                        <img id="newSafarnamehPic" src="{{URL::asset('images/mainPics/default/Placeholder.png')}}" style=" height: 120px">
                    </label>
                </div>
            </div>

            <div class="row" style="display: flex; justify-content: center; align-items: center">
                <button class="backSafarnameh" onclick="backToSafarnamehList()">بازگشت</button>
                <button class="btn btn-success submitSafarnameh" style="background: #0d6650" onclick="storeSafarnameh()">ثبت</button>
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
                    // id: journalId,
                    // code: code
                };
                {{--data = JSON.stringify(data);--}}
                {{--return new MyUploadAdapter( loader, '{{route("admin.journal.storeDescriptionImg")}}', '{{csrf_token()}}', data);--}}
            };

        } )
        .catch( err => {
            console.error( err.stack );
        } );

    DecoupledEditor.builtinPlugins.map( plugin => console.log(plugin.pluginName) );


    var safarnamehNewMainPic = null;

    function openNewSafarnameh(){
        $('#safarnamehList').hide();
        $('#newSafarnameh').show();
    }

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

        formDa.append('pic', safarnamehNewMainPic);
        formDa.append('title', title);
        formDa.append('summery', summery);
        formDa.append('text', text);

        $.ajax({
            type: 'post',
            url: '{{route('profile.safarnameh.new')}}',
            data: formDa,
            processData: false,
            contentType: false,
            success: function(response){
                if(response == 'ok') {
                    showSuccessNotifi('سفرنامه شما با موفقیت ثبت شد.', 'left');
                    $('#newSafarnamehTitle').val('');
                    $('#safarnamehSummery').val('');
                    $('.ck-editor__editable').html('');
                    window.editor.setData('');
                    $('#newSafarnamehPic').attr('src',  "{{URL::asset('images/mainPics/default/Placeholder.png')}}");
                    safarnamehNewMainPic = null;
                    backToSafarnamehList();
                }
                else
                    showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
            },
            error: function(err){
                showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
            }
        })
    }

    function backToSafarnamehList(){
        $('#safarnamehList').show();
        $('#newSafarnameh').hide();
        getSafarnamehs();
    }

</script>