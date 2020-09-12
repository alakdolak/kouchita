<style>
    .readSafarnamehButton{
        /*background: var(--koochita-green);*/
        width: fit-content;
        padding: 5px 10px;
        color: var(--koochita-blue);
        border-radius: 10px;
        position: absolute;
        bottom: 10px;
        left: 10px;
        cursor: pointer;
        transition: .3s;
    }
    .readSafarnamehButton:hover{
        border: solid;
        color: var(--koochita-blue);
    }
    .commonSafarnamehIcon{
        position: absolute;
        top: 10px;
        font-size: 25px;
        cursor: pointer;
        width: 30px;
        height: 30px;
        border: solid 2px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        transition: .3s;
    }
    .commonSafarnamehIcon.delete{
        color: red;
        left: 10px;
    }
    .commonSafarnamehIcon.delete:hover{
        background: red;
        color: white;
        border-color: red;
    }

    .commonSafarnamehIcon.edit{
        color: var(--koochita-blue);
        left: 50px;
    }
    .commonSafarnamehIcon.edit:hover{
        background: var(--koochita-blue);
        color: white;
        border-color: var(--koochita-blue);
    }
</style>

<div id="safarnamehList" class="userProfileArticles">
    <div class="userProfilePostsFiltrationContainer">
        <div class="userProfilePostsFiltration">
            <span class="active">جدیدترین‌ها</span>
            <span>بهترین‌ها</span>
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
    <div class="col-xs-12 notData hidden">
        <div class="pic">
            <img src="{{URL::asset('images/mainPics/noData.png')}}" style="width: 100%">
        </div>
        <div class="info">
            @if($myPage)
                <div class="firstLine">
                    اینجا خالی است.هنوز سفرنامه ای ننوشتید...
                </div>
                <div class="sai">
                    خاطراتت رو مرور کن و
                    <button class="butt" onclick="goToSafarnameh()">سفرنامه بنویس</button>
                </div>
            @else
                <div class="firstLine">
                    اینجا خالی است. {{$user->username}} هنوز سفرنامه ای ننوشته...
                </div>
            @endif
        </div>
    </div>

    <div id="safarnamehShowList"></div>
</div>



<script>
    let myPageAccess = {{isset($myPage) && $myPage ? 1 : 0}}
    function getSafarnamehs(){
        let data;
        if(userPageId == 0)
            data = { _token: '{{csrf_token()}}' };
        else
            data = {
                _token: '{{csrf_token()}}',
                userId: userPageId, // in mainProfile.blade.php
            };

        $('#safarnamehList').find('.notData').addClass('hidden');
        $.ajax({
            type: 'post',
            url: '{{route("profile.getSafarnameh")}}',
            data: data,
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok')
                    showSafarnameh(response.result);
            },
            error: function(err){
                console.log(err);
            }
        })
    }

    function showSafarnameh(_result){
        let text = '';

        if(_result.length == 0)
            $('#safarnamehList').find('.notData').removeClass('hidden');

        _result.forEach(item => {
            text += '<div class="usersArticlesMainDiv">\n' +
                '            <div class="articleImgMainDiv">\n' +
                '                <img src="' + item.pic + '">\n' +
                '            </div>\n' +
                '            <div class="articleDetailsMainDiv">\n';

            if(myPageAccess) {
                text += '<div class="trashIcon commonSafarnamehIcon delete" onclick="deleteThisSafarnameh(' + item.id + ')"></div>';
                text += '<div class="editIcon commonSafarnamehIcon edit" onclick="editThisSafarnameh(' + item.id + ')"></div>';
            }
            text += '                <div class="articleTagsMainDiv">\n' +
                '                    <div class="articleTags">سفرنامه</div>\n' +
                '                </div>\n' +
                '                <div class="articleTitleMainDiv">\n' +
                '                    <a href="{{url("/article/user")}}/' + item.id + '">' + item.title + '</a>\n' +
                '                </div>\n';
            if(item.summery != null) {
                text += '                <div class="articleSummarizedContentMainDiv">\n' +
                        '                    <span>' + item.summery + '</span>\n' +
                        '                    <span>...</span>\n' +
                        '                </div>\n';
            }
            text +=  '                <div class="articleSpecificationsMainDiv">\n' +
                    '                    <div class="articleDateMainDiv">' + item.time + '</div>\n' +
                    '                    <div class="articleCommentsMainDiv">0</div>\n' +
                    '                    <div class="articleWriterMainDiv">'+ item.username +'</div>\n' +
                    '                    <div class="articleWatchListMainDiv">0</div>\n' +
                    '                </div>\n' +
                    '                <a href="{{url('/article/user')}}/' + item.id + '" class="readSafarnamehButton"> مطالعه سفرنامه</a>' +
                    '            </div>\n' +
                    '        </div>'
        });

        $('#safarnamehShowList').html(text);
    }

    @if(isset($myPage) && $myPage)
        let deletedSafarnamehId = null;
        function deleteThisSafarnameh(_id){
            if(checkLogin()) {
                deletedSafarnamehId = _id;
                openWarning('آیا می خواهید سفرنامه ی خود را پاک کنید؟', doDeleteSafarnameh, 'بله پاک شود');
            }
        }

        function doDeleteSafarnameh(){
            if(deletedSafarnamehId != null){
                openLoading(function(){
                    $.ajax({
                        type: 'post',
                        url: '{{route("profile.safarnameh.delete")}}',
                        data: {
                            _token: '{{csrf_token()}}',
                            id: deletedSafarnamehId
                        },
                        success: function(response){

                            if(response == 'ok'){
                                location.reload();
                                showSuccessNotifi('سفرنامه شما با موفقیت حذف شد.', 'left', 'var(--koochita-blue)');
                            }
                            else {
                                closeLoading();
                                showSuccessNotifi('در حذف سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
                            }
                        },
                        error: function(err){
                            closeLoading();
                            showSuccessNotifi('در حذف سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
                        }
                    })
                })
            }
        }


        function editThisSafarnameh(_id){

        }
    @endif
</script>
