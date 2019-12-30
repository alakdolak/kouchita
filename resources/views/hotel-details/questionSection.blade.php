
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
                    'text' : text
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
        var text = ''

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
                '                                    <span class="answersWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>\n' +
                '                                </div>\n' +
                '                                <div>\n' +
                '                                    هم اکنون - بیش از 23 ساعت پیش\n' +
                '                                </div>\n' +
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

            // if(ques[i]["ansNum"] > 0)
                text +='                            <div class="showAnswersToggle" onclick="showAllAnswers(this)">دیدن پاسخ‌ها</div>\n';

            text +='                            <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>\n' +
                '                        </div>\n' +
                '                        <div class="answerPlaceMainDiv display-none">\n' +
                '                            <div class="circleBase type2 answerWriterProfilePic"></div>\n' +
                '                            <div class="answerBoxText">\n' +
                '                                <b class="replyWriterUsername">shazdesina</b>\n' +
                '                                من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را متهم کنید.\n' +
                '                                <div class="answerStatistics">\n' +
                '                                    <span class="numberOfDislikeAnswer">31</span>\n' +
                '                                    <span class="numberOfLikeAnswer">31</span>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="actionToAnswer" style="margin: 0px 20px 0 0">\n' +
                '                                <div class="display-inline-block float-right" onclick="likeTheAnswers(this)">\n' +
                '                                    <span class="likeAnswer"></span>\n' +
                '                                    <span class="likeAnswerClicked display-none"></span>\n' +
                '                                </div>\n' +
                '                                <div class="display-inline-block float-right" onclick="dislikeTheAnswers(this)">\n' +
                '                                    <span class="dislikeAnswer"></span>\n' +
                '                                    <span class="dislikeAnswerClicked display-none"></span>\n' +
                '                                </div>\n' +
                '                                <div><b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)" style="font-size: 13px">پاسخ دهید</b></div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="display-none">\n' +
                '                            <div class="newAnswerPlaceMainDiv" style="border-top: none;">\n' +
                '                                <div class="circleBase type2 newAnswerWriterProfilePic"></div>\n' +
                '                                <div class="inputBox" style="width: 80%;">\n' +
                '                                    <b class="replyAnswerTitle">در پاسخ به نظر shazde2222sina</b>\n' +
                '                                    <textarea class="inputBoxInput inputBoxInputAnswer" type="text"\n' +
                '                                              placeholder="شما چه نظری دارید؟"></textarea>\n' +
                '                                    <img class="commentSmileyIcon"\n' +
                '                                         src="{{"../../../public/images/smile.png"}}">\n' +
                '                                </div>\n' +
                '                                <div></div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="display-none last">\n' +
                '                            <div class="newAnswerPlaceMainDiv">\n' +
                '                                <div class="circleBase type2 newAnswerWriterProfilePic"></div>\n' +
                '                                <div class="inputBox">\n' +
                '                                    <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>\n' +
                '                                    <textarea class="inputBoxInput inputBoxInputAnswer" type="text"\n' +
                '                                              placeholder="شما چه نظری دارید؟"></textarea>\n' +
                '                                    <img class="commentSmileyIcon"\n' +
                '                                         src="{{"../../../public/images/smile.png"}}">\n' +
                '                                </div>\n' +
                '                                <div></div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';
        }

        document.getElementById('questionSectionDiv').innerHTML = text;

    }

</script>