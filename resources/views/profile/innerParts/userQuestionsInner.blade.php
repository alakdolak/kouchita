<style>
    .questionPack{
        margin-bottom: 5px;
        border-radius: 10px;
    }
</style>
<div class="userActivitiesQuestions">
    <div class="userProfilePostsFiltrationContainer">
        <div class="userProfilePostsFiltration">
            <span class="active" onclick="changeSortQuestion('top', this)">جدیدترین</span>
            <span onclick="changeSortQuestion('hot', this)">داغ‌ترین‌ها</span>
        </div>
    </div>

    <div class="userProfileQAndA">
{{--        <div class="userProfilePostsSearchContainer">--}}
{{--            <div class="inputBox">--}}
{{--                <textarea class="inputBoxInput inputBoxInputSearch" type="text" placeholder="جستجو کنید"></textarea>--}}
{{--            </div>--}}
{{--            <span>نمایش پاسخ‌ها</span>--}}
{{--            <span>نمایش سؤال‌ها</span>--}}
{{--            <div class="clear-both display-none"></div>--}}
{{--            <span>نمایش همه</span>--}}
{{--        </div>--}}

        <div id="questions" ></div>
    </div>

</div>

<script>
    let questionSort = 'top';

    function getAllUserQuestions(){
        let placeHoldQ = getQuestionPlaceHolder(); // in questionPack.blade.php
        $('#questions').html(placeHoldQ);
        $('#questions').append(placeHoldQ);

        let data;
        // userPageId in mainProfile.blade.php
        if(userPageId == 0)
            data = {
                _token: '{{csrf_token()}}',
                sort: questionSort,
            };
        else
            data = {
                _token: '{{csrf_token()}}',
                sort: questionSort,
                userId: userPageId,
            };

        $.ajax({
            type: 'post',
            url: '{{route("profile.getQuestions")}}',
            data: data,
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok'){
                    $('#questions').html('');
                    response.result.map(item => {
                        createQuestionPack(item, 'questions'); // in questionPack.blade.php
                    })
                }
            },
            error: function(err){
                console.log('err');
                console.log(err);
            }
        })
    }

    function changeSortQuestion(_kind, _element){
        $(_element).parent().find('.active').removeClass('active');
        $(_element).addClass('active');
        questionSort = _kind;
        getAllUserQuestions()
    }
</script>