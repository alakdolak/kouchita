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
        @include('profile.innerParts.newSafarnameh')
    </div>
</div>

<script>
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
</script>