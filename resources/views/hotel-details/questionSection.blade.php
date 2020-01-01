
<div id="QAndAMainDivId" class="tabContentMainWrap">
    <div class="col-md-12 col-xs-12 QAndAMainDiv">
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
                        <span class="color-blue">1340</span>
                        سؤال
                        <span class="color-blue">560</span>
                        پاسخ موجود می‌باشد.
                    </div>
                    <a class="seeAllQMainLink" href="#taplc_global_nav_links_0">
                        <div class="seeAllQLink display-inline-block float-right direction-rtl dark-blue"
                             onclick="allQuestionsGrid()">مشاهده همه سؤالات و پاسخ‌ها
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

    <div class="col-xs-12 questionsMainDivFooter position-relative">
        <div class="col-xs-5 font-size-13 line-height-2">
            نمایش
            <span class="mg-lt-5 cursor-pointer">10</span>-
            <span class="mg-lt-5 cursor-pointer">20</span>-
            <span class="color-blue cursor-pointer">50</span>
            پست در هر صفحه
        </div>
        <a class="col-xs-3 showQuestionsNumsFilterLink" href="#taplc_global_nav_links_0">
            <div class="showQuestionsNumsFilter" onclick="allQuestionsGrid()">نمایش تمامی سؤال‌ها</div>
        </a>
        <div class="col-xs-4 font-size-13 line-height-2 text-align-right float-right">
            صفحه
            <span>1</span>
            <span><<<</span>
            <span class="mg-lt-5 cursor-pointer">2</span>-
            <span class="color-blue mg-lt-5 cursor-pointer">3</span>-
            <span class="cursor-pointer">4</span>
            <span>>>></span>
            <span>10</span>
        </div>
    </div>
</div>

<script>
    var questionCount = 1;
    var questionPage = 1;
    var placeId = '{{$place->id}}';
    var kindPlaceId = '{{$kindPlaceId}}';

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
                'count' : questionCount,
                'page' : questionPage
            },
            success: function(response){
                response = JSON.parse(response);
                createQuestionSection(response);
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
                text += '<div class="showAnswersToggle" onclick="showAllAnswers2(' + ques[i]["id"] + ')">دیدن پاسخ‌ها</div>\n';

            text += '<b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(' + ques[i]["id"] + ')">پاسخ دهید</b>\n' +
                    '</div>\n';

            text += createAnsToQuestion(ques[i]["comment"], '0px', ques[i]["id"], '');

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

    function replyToAnswers(_id){

        if(!checkLogin())
            return;

        $('#ansToQuestion' + _id).toggle();
    }

    function likeQuestion(_logId, _like){

        if(!checkLogin())
            return;

        $.ajax({
            type: 'post',
            url: likeReviewUrl,
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
                text += '<div class="showAnswersToggle" style="font-size: 10px" onclick="showAllAnswers2(' + _ques[j]["id"] + ')">دیدن پاسخ‌ها</div>';

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

            text += createAnsToQuestion(_ques[j]["comment"], '60px', _ques[j]["id"], '79%');

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
        }

        text += '</div>';

        return text;
    }

    function showAllAnswers(element) {
        $(element).parent().next().toggle()
    }

    function showAllAnswers2(_id){
        $("#ansOfQuestion" + _id).toggle();
    }

</script>