
<div id="QAndAMainDivId" class="tabContentMainWrap">
    <div class="topBarContainerQAndAs display-none"></div>
    <div class="col-md-12 col-xs-12 QAndAMainDiv" style="margin-bottom: 10px;">
        <div class="mainDivQuestions">
            <div class="QAndAMainDivHeader">
                <h3>سؤال و جواب</h3>
            </div>
            <div class="askQuestionMainDiv">
                <div class="newQuestionContainer">
                    <b class="direction-rtl text-align-right float-right full-width mg-bt-10">
                        سؤلات خود را بپرسید تا با کمک دوستانتان آگاهانه‌تر سفر کنید. همچنین می‌توانید با
                        پاسخ یه سؤالات دوستانتان علاوه بر دریافت امتیاز، اطلاعات خود را به اشتراک
                        بگذارید.
                    </b>
                    <div class="display-inline-block float-right direction-rtl mg-lt-5">
                        در حال حاضر
                        <span class="color-blue" id="questionCount"></span>
                        سؤال
                        <span class="color-blue" id="answerCount"></span>
                        پاسخ موجود می‌باشد.
                    </div>
                    <a class="seeAllQMainLink" href="{{url('hotel-details-questions/' . $place->id . '/' . $place->name)}}">
                        <div class="seeAllQLink display-inline-block float-right direction-rtl dark-blue">مشاهده همه سؤالات و پاسخ‌ها
                        </div>
                    </a>
                    <div class="clear-both"></div>
                    <div class="newQuestionMainDiv mg-tp-30 full-width display-inline-block">
                        <div class="circleBase type2 newQuestionWriterProfilePic">
                            <img src="{{ $userPic }}" style="width: 100%; height: 100%; border-radius: 50%;">
                        </div>
                        <div class="questionInputBoxMainDiv">
                            <div class="inputBox questionInputBox">
                                <textarea id="questionInput" class="inputBoxInput inputBoxInputComment" type="text" placeholder="شما چه سؤالی دارید؟" onclick="checkLogin()"></textarea>
                                <img class="commentSmileyIcon" src="{{"../../../public/images/smile.png"}}">
                            </div>
                            <div class="sendQuestionBtn" onclick="sendQuestion()">ارسال</div>
                        </div>
                    </div>
                </div>
                <div id="questionSectionDiv"></div>
            </div>
        </div>
    </div>

    <div id="questionPaginationDiv" class="col-xs-12 questionsMainDivFooter position-relative" style="margin-top: 0px;">
        <div class="col-xs-5 font-size-13 line-height-2">
            نمایش
            <span id="showQuestionPerPage"></span>
            پست در هر صفحه
        </div>
        <a class="col-xs-3 showQuestionsNumsFilterLink" href="{{url('hotel-details-questions/' . $place->id . '/' . $place->name)}}">
            <div class="showQuestionsNumsFilter">نمایش تمامی سؤال‌ها</div>
        </a>
        <div class="col-xs-4 font-size-13 line-height-2 text-align-right float-right">
            <span style="float: right; margin-left: 10px">صفحه</span>
            <span id="questionPagination" style="margin-right: 10px;"></span>
        </div>
    </div>

</div>

<script>
    var questions;
    var questionCount;
    var questionPerPage = 0;
    var questionPerPageNum = [3, 5, 10];
    var questionPage = 1;
    var answerCount;
    var isQuestionCount = true;

    function sendQuestion(){

        if(!checkLogin())
            return;

        var text = document.getElementById('questionInput').value;

        if(text != null && text != ''){
            $.ajax({
                type: 'post',
                url : '{{route("askQuestion")}}',
                data:{
                    'placeId': placeId,
                    'kindPlaceId' : kindPlaceId,
                    'text' : text,
                    'id' : _id
                },
                success: function(response){
                    if(response == 'ok') {
                        alert('سئوال شما با موفقیت ثبت شد');
                        document.getElementById('questionInput').value = '';
                    }
                }
            })
        }
    }

    function getQuestion(){

        $.ajax({
            type: 'post',
            url: '{{route("getQuestions")}}',
            data:{
                'placeId': placeId,
                'kindPlaceId' : kindPlaceId,
                'count' : questionPerPageNum[questionPerPage],
                'page' : questionPage,
                'isQuestionCount' : isQuestionCount
            },
            success: function(response){
                response = JSON.parse(response);
                questions = response[0];

                if(isQuestionCount) {
                    questionCount = response[1];
                    answerCount = response[2];
                    document.getElementById('questionCount').innerText = questionCount;
                    document.getElementById('answerCount').innerText = answerCount;
                    isQuestionCount = false;

                }

                if(questionCount == 0)
                    document.getElementById('questionPaginationDiv').style.display = 'none';
                else{
                    createQuestionPagination(questionCount);
                    createQuestionSection(questions);
                }

            }
        })
    }
    getQuestion();

    function createQuestionSection(ques){
        var text = '';

        for(var i = 0; i < ques.length; i++){
            text += '<div class="answersBoxMainDiv">\n' +
                '                        <div class="answersActions" onclick="showAnswersActionBox(this)">\n' +
                '                            <span class="answersActionsIcon"></span>\n' +
                '                        </div>\n' +
                '                        <div class="questionsActionsMoreDetails display-none">\n' +
                '                            <span>گزارش پست</span>\n' +
                '                            <span>مشاهده صفحه شازده سینا</span>\n' +
                '                            <span>مشاهده تمامی پست‌ها</span>\n' +
                '                            <span>صفحه قوانین و مقررات</span>\n' +
                '                        </div>\n' +
                '                        <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">\n' +
                '                            مشاهده شؤال\n' +
                '                        </div>\n' +
                '                        <div class="answersWriterDetailsShow">\n' +
                '                            <div class="circleBase type2 answersWriterPicShow">' +
                '                               <img src="' + ques[i]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">' +
                '                            </div>\n' +
                '                            <div class="answersWriterExperienceDetails">\n' +
                '                                <b class="userProfileNameAnswers">' + ques[i]["username"] + '</b>\n' +
                '                                <div class="display-inline-block">در\n' +
                '                                    <span class="answersWriterExperiencePlace">' + ques[i]["place"]["name"] + '، شهر ' + ques[i]["city"]["name"] + '، استان ' + ques[i]["state"]["name"] + '</span>\n' +
                '                                </div>\n' +
                '                                <div>' + ques[i]["timeAgo"] + '</div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="clear-both"></div>\n' +
                '                        <div class="questionContentMainBox">' + ques[i]["text"] + '</div>\n' +
                '                        <div class="clear-both"></div>\n' +
                '                        <div class="questionSubMenuBar">\n' +
                '                            <div class="numberOfAnswers">\n' +
                '                                <span>' + ques[i]["ansNum"] + '</span>\n' +
                '                                نفر پاسخ دادند\n' +
                '                            </div>\n';

            if(ques[i]["ansNum"] > 0)
                text += '<div class="showAnswersToggle" onclick="showAllAnswers(' + ques[i]["id"] + ')">دیدن پاسخ‌ها</div>\n';

            text += '<b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(' + ques[i]["id"] + ')">پاسخ دهید</b>\n' +
                    '</div>\n';

            // text += createAnsToQuestion(ques[i]["comment"], '0px', ques[i]["id"], '');

            text += createAnsToQuestionComment(ques[i]["comment"], ques[i]["username"], ques[i]["id"]);


            text +='                        <div id="ansToQuestion' + ques[i]["id"] + '" class="display-none last">\n' +
                '                            <div class="newAnswerPlaceMainDiv">\n' +
                '                                <div class="circleBase type2 newAnswerWriterProfilePic">' +
                '                                   <img src="{{ $userPic }}" style="width: 100%; height: 100%; border-radius: 50%;">\n'+
                '                                </div>\n' +
                '                                <div class="inputBox">\n' +
                '                                    <b class="replyAnswerTitle">در پاسخ به نظر ' + ques[i]["username"] + '</b>\n' +
                '                                    <textarea id="questionAns' + ques[i]["id"] + '" class="inputBoxInput inputBoxInputAnswer" type="text"\n' +
                '                                              placeholder="شما چه نظری دارید؟"></textarea>\n' +
                '                                    <img class="commentSmileyIcon"\n' +
                '                                         src="{{"../../../public/images/smile.png"}}">\n' +
                '                                </div>\n' +
                '                                <div class="sendQuestionBtn" onclick="sendAns(' + ques[i]["id"] + ')">ارسال</div>\n' +
                '                                <div></div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';
        }

        document.getElementById('questionSectionDiv').innerHTML = text;
    }

    function createAnsToQuestionComment(comment, repTo, topId, newClass = ''){
        var text = '<div id="ansOfQuestion' + topId + '" class="display-none ansOfQuestion">';

        for(var k = 0; k < comment.length; k++) {

            text += '<div class="ansComment_' + topId + '" style="width: 100%; direction: rtl">' +
                '<div class="eachCommentMainBox ' + newClass + '">\n' +
                '                                        <div class="circleBase type2 commentsWriterProfilePic">' +
                '                                             <img src="' + comment[k]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '                                        </div>\n' +
                '                                        <div class="commentsContentMainBox">\n' +
                '                                            <b class="userProfileName float-right">' + comment[k]["username"] + '</b>\n' +
                '                                            <b class="commentReplyDesc display-inline-block">در پاسخ به ' + repTo + '</b>\n' +
                '                                            <div class="clear-both"></div>\n' +
                '                                            <p>' + comment[k]["text"] + '</p>\n' +
                '                                            <div class="commentsStatisticsBar">\n' +
                '                                                <div class="float-right display-inline-black">\n' +
                '                                                    <span id="reviewLikeNum' + comment[k]["id"] + '" class="likeStatisticIcon commentsStatisticSpan color-red">' + comment[k]["like"] + '</span>\n' +
                '                                                    <span id="reviewDisLikeNum' + comment[k]["id"] + '" class="dislikeStatisticIcon commentsStatisticSpan dark-red">' + comment[k]["dislike"] + '</span>\n' +
                '                                                    <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">' + comment[k]["ansNum"] + '</span>\n' +
                '                                                </div>\n';

            if(comment[k]["ansNum"] > 0)
                text += '<div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showAllAnswers(' + comment[k]["id"] + ')">دیدن پاسخ‌ها</div>\n';

            text +='                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="commentsActionsBtns">\n' +
                '                                            <div onclick="likeReview(' + comment[k]["id"] + ', 1); likeTheAnswers2(this)">\n' +
                '                                                <span class="likeActionBtn"></span>\n' +
                '                                                <span class="likeActionClickedBtn display-none"></span>\n' +
                '                                            </div>\n' +
                '                                            <div onclick="likeReview(' + comment[k]["id"] + ', 0); dislikeTheAnswers2(this)">\n' +
                '                                                <span class="dislikeActionBtn"></span>\n' +
                '                                                <span class="dislikeActionClickedBtn display-none"></span>\n' +
                '                                            </div>\n' +
                '                                            <div class="clear-both"></div>\n' +
                '                                            <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>\n' +
                '                                        </div>\n' +
                '                                        <div class="replyToCommentMainDiv display-none">\n' +
                '                                            <div class="circleBase type2 newCommentWriterProfilePic">' +
                '                                                <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '                                            </div>\n' +
                '                                            <div class="inputBox">\n' +
                '                                                <b class="replyCommentTitle">در پاسخ به نظر ' + comment[k]["username"] + '</b>\n' +
                '                                                <textarea  id="ansForReviews_' + comment[k]["id"] + '" class="inputBoxInput inputBoxInputComment" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>\n' +
                '                                                <button class="btn btn-primary" onclick="sendAnsOfReviews(' + comment[k]["id"] + ', 1)"> ارسال</button>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n';

            if(comment[k]["ansNum"] > 0) {
                text += createAnsToQuestionComment(comment[k]["comment"], comment[k]["username"], comment[k]["id"], 'mg-rt-45');
            }

            text += '</div>';
        }

        text += '</div>';
        return text;
    }

    function sendAns(_id){

        if(!checkLogin())
            return;

        var text = document.getElementById('questionAns' + _id).value;

        if(text != null && text != ''){
            $.ajax({
                type: 'post',
                url : '{{route("sendAns")}}',
                data:{
                    'placeId': placeId,
                    'kindPlaceId' : kindPlaceId,
                    'text' : text,
                    'relatedTo' : _id
                },
                success: function(response){
                    if(response == 'ok') {
                        alert('پاسخ شما با موفقیت ثبت شد');
                        document.getElementById('questionAns' + _id).value = '';
                    }
                }
            })
        }
    }

    function likeQuestion(_logId, _like){

        if(!checkLogin())
            return;

        $.ajax({
            type: 'post',
            url: likeLog,
            data:{
                'logId' : _logId,
                'like' : _like
            },
            success: function(response){
                if(response == 'ok')
                    alert('نظر شما با موفقیت ثبت شد.')
            }
        })
    }

    function createAnsToQuestion(_ques, _padding, _id, _width){
        var text = '<div id="ansOfQuestion' + _id + '" class="display-none ansOfQuestion">';

        for(var j = 0; j < _ques.length; j++)   {
            text +='                      <div style="margin-bottom: 10px;">' +
                '                            <div class="answerPlaceMainDiv" style="border-top: none; padding-right: ' + _padding + '; ">\n' +
                '                            <div class="circleBase type2 answerWriterProfilePic">' +
                '                               <img src="' + _ques[j]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '                            </div>\n' +
                '                            <div class="answerBoxText" style=" width: ' + _width + '">\n' +
                '                                <b class="replyWriterUsername">' + _ques[j]["username"] + '</b>\n' +
                _ques[j]["text"] +
                '                                <div class="answerStatistics" style="display: flex; align-items: center;">\n' +
                '                                    <span class="numberOfLikeAnswer">' + _ques[j]["like"] + '</span>\n' +
                '                                    <span class="numberOfDislikeAnswer">' + _ques[j]["dislike"] + '</span>\n' +
                '                                    <div class="numberOfAnswers" style="font-size: 10px">\n' +
                '                                         <span>' + _ques[j]["ansNum"] + '</span>\n' +
                '                                          نفر پاسخ دادند\n' +
                '                                    </div>';

            if(_ques[j]["ansNum"] > 0)
                text += '<div class="showAnswersToggle" style="font-size: 10px" onclick="showAllAnswers(' + _ques[j]["id"] + ')">دیدن پاسخ‌ها</div>';

            text +='                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="actionToAnswer" style="margin: 0px 20px 0 0">\n' +
                '                                <div class="display-inline-block float-right" onclick="likeQuestion(' +  _ques[j]["id"] + ', 1)">\n' +
                '                                    <span class="likeAnswer"></span>\n' +
                '                                    <span class="likeAnswerClicked display-none"></span>\n' +
                '                                </div>\n' +
                '                                <div class="display-inline-block float-right" onclick="likeQuestion(' +  _ques[j]["id"]+ ', 0)">\n' +
                '                                    <span class="dislikeAnswer"></span>\n' +
                '                                    <span class="dislikeAnswerClicked display-none"></span>\n' +
                '                                </div>\n' +
                '                                <div><b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(' + _ques[j]["id"] + ')" style="font-size: 13px">پاسخ دهید</b></div>\n' +
                '                            </div>\n' +
                '                        </div>\n';

            text+='                            <div id="ansToQuestion' + _ques[j]["id"] + '" class="newAnswerPlaceMainDiv" style="border-top: none; display: none; margin-top: 0px;">\n' +
                '                                <div class="circleBase type2 newAnswerWriterProfilePic">' +
                '                                   <img src="{{ $userPic }}" style="width: 100%; height: 100%; border-radius: 50%;">\n'+
                '                                </div>\n' +
                '                                <div class="inputBox" style="width: 80%;">\n' +
                '                                    <b class="replyAnswerTitle">در پاسخ به نظر ' + _ques[j]["username"] + '</b>\n' +
                '                                    <textarea id="questionAns' + _ques[j]["id"]  + '" class="inputBoxInput inputBoxInputAnswer" type="text"\n' +
                '                                              placeholder="شما چه نظری دارید؟"></textarea>\n' +
                '                                    <img class="commentSmileyIcon"\n' +
                '                                         src="{{"../../../public/images/smile.png"}}">\n' +
                '                                </div>\n' +
                '                                <div class="sendQuestionBtn" onclick="sendAns(' + _ques[j]["id"]  + ')">ارسال</div>\n' +
                '                                <div></div>\n' +
                '                            </div>' +
                '                       </div>\n';

            text += createAnsToQuestion(_ques[j]["comment"], '60px', _ques[j]["id"], '79%');
        }

        text += '</div>';

        return text;
    }

    function showAllAnswers(_id){
        $("#ansOfQuestion" + _id).toggle();
    }

    function replyToAnswers(_id){

        if(!checkLogin())
            return;

        $('#ansToQuestion' + _id).toggle();
    }

    function changeQuestionPerPage(_count){

        document.getElementById('questionPerView' + questionPerPage).classList.remove('color-blue');
        document.getElementById('questionPerView' + _count).classList.add('color-blue');
        questionPerPage = _count;
        getQuestion();
    }

    function changeQuestionPage(_page){
        questionPage = _page;
        getQuestion();
    }

    function createQuestionPagination(questionCount){
        var text = '';
        var page = Math.round(questionCount/questionPerPageNum[questionPerPage]);

        createQuestionPerPage();

        if(page >= 5){
            if(questionPage == 1){
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeQuestionPage(1)" style="float: right">1</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(2)" style="float: right">2</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(3)" style="float: right">3</span>';
                text += '<span style="float: right"> >>> </span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + page + ')" style="float: right">' + page + '</span>';
            }
            else if(questionPage == 2){
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(1)" style="float: right">1</span>';
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeQuestionPage(2)" style="float: right">2</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(3)" style="float: right">3</span>';
                text += '<span style="float: right"> >>> </span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + page + ')" style="float: right">' + page + '</span>';
            }
            else if(questionPage == 3){
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(1)" style="float: right">1</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(2)" style="float: right">2</span>';
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeQuestionPage(3)" style="float: right">3</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(4)" style="float: right">4</span>';
                if(page == 5)
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(5)" style="float: right">5</span>';
                else {
                    text += '<span style="float: right"> >>> </span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + page + ')" style="float: right">' + page + '</span>';
                }
            }
            else{
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(1)" style="float: right">1</span>';
                text += '<span style="float: right"> <<< </span>';

                if(questionPage == page){
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + (questionPage-2) + ')" style="float: right">' + (questionPage-2) + '</span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + (questionPage-1) + ')" style="float: right">' + (questionPage-1) + '</span>';
                    text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeQuestionPage(' + (questionPage) + ')" style="float: right">' + (questionPage) + '</span>';
                }
                else{
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + (questionPage-1) + ')" style="float: right">' + (questionPage-1) + '</span>';
                    text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeQuestionPage(' + (questionPage) + ')" style="float: right">' + (questionPage) + '</span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + (questionPage+1) + ')" style="float: right">' + (questionPage+1) + '</span>';
                    if((page - questionPage) == 2)
                        text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + (questionPage+2) + ')" style="float: right">' + (questionPage+2) + '</span>';
                }

                if((page - questionPage) >= 3){
                    text += '<span style="float: right"> >>> </span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + page + ')" style="float: right">' + page + '</span>';
                }


            }
        }
        else{
            for (var i = 1; i <= page; i++){
                if(i == questionPage)
                    text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeQuestionPage(' + i + ')" style="float: right">' + i + '</span>';
                else
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + i + ')" style="float: right">' + i + '</span>';
            }
        }

        document.getElementById('questionPagination').innerHTML = text;
    }

    function createQuestionPerPage(){

        var text = '';

        for(var i = 0; i < questionPerPageNum.length; i++){
            if(i == questionPerPage)
                text += '<span id="questionPerView' + i + '" class="mg-lt-5 cursor-pointer color-blue" onclick="changeQuestionPerPage(' + i + ')">' + questionPerPageNum[i] + '</span>';
            else
                text += '<span id="questionPerView' + i + '" class="mg-lt-5 cursor-pointer" onclick="changeQuestionPerPage(' + i + ')">' + questionPerPageNum[i] + '</span>';

            if(i != (questionPerPageNum.length - 1))
                text += '-';
        }

        document.getElementById('showQuestionPerPage').innerHTML = text;
    }

</script>