<style>
    .questionPack{
        margin-bottom: 5px;
        border-radius: 10px;
    }
</style>
<div class="userActivitiesQuestions">
    <div class="userProfilePostsFiltrationContainer">
        <div class="userProfilePostsFiltration questionSecTab">
            <span class="active" onclick="changeQuestionKind('question', this)">سؤال‌</span>
            <span onclick="changeQuestionKind('answer', this)">پاسخ‌</span>
        </div>
    </div>

    <div class="userProfileQAndA">
        <div class="userProfilePostsSearchContainer" style="display: flex; align-items: center; direction: rtl; padding: 0px 15px;">
            <div class="inputBox">
                <textarea class="inputBoxInput inputBoxInputSearch" type="text" placeholder="جستجو کنید" onkeyup="searchInQuestion(this.value)"></textarea>
            </div>
            <div class="userProfilePostsFiltration pcType" style="margin-bottom: 0px">
                <span class="active" onclick="changeSortQuestion('top', this)">جدیدترین</span>
                <span onclick="changeSortQuestion('hot', this)">داغ‌ترین‌ها</span>
            </div>
        </div>

        <div id="questions" ></div>
    </div>

</div>

<script>
    let questionSort = 'top';
    let questionKind = 'question';
    let allQuestions = [];

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
                kind: questionKind,
            };
        else
            data = {
                _token: '{{csrf_token()}}',
                sort: questionSort,
                kind: questionKind,
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
                    allQuestions = response.result;
                    allQuestions.map(item => {
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

    function changeQuestionKind(_kind, _element){
        $(_element).parent().find('.active').removeClass('active');
        $(_element).addClass('active');
        questionKind = _kind;
        getAllUserQuestions()
    }

    function searchInQuestion(_value){
        let showQues = [];
        if(_value.trim().length > 1){
            allQuestions.map(item => {
               if(item.text.search(_value.trim()) != -1)
                   showQues.push(item);
            });
        }
        else
            showQues = allQuestions;

        $('#questions').html('');
        console.log(showQues);
        showQues.map(item => {
            createQuestionPack(item, 'questions'); // in questionPack.blade.php
        })
    }
</script>