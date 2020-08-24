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
    .submitSarnamehButton{
        background: var(--koochita-blue);
        border: none;
        color: white;
        padding: 2px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 20px;
    }
</style>

<script src="{{asset('js/ckeditor5/ckeditor5.js')}}"></script>
<script src="{{asset('js/ckeditor5/ckeditorUpload.js')}}"></script>

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
    <div id="safarnamehShowList"></div>
</div>

@if(isset($myPage) && $myPage)
    @include('general.addSafarnameh')
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
</script>
