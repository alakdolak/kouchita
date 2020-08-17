
<div id="QAndAMainDivId" class="tabContentMainWrap" style="display: flex; flex-direction: column; margin-top: 15px">
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
                        <div class="seeAllQLink display-inline-block float-right direction-rtl dark-blue">
                            مشاهده همه سؤالات و پاسخ‌ها
                        </div>
                    </a>

                    <div class="newQuestionMainDiv mg-tp-30 full-width display-inline-block">
                        <div class="questionInputBoxMainDiv">
                            <div class="circleBase type2 newQuestionWriterProfilePic">
                                <img src="{{ $userPic }}" style="width: 100%; height: 100%; border-radius: 50%;">
                            </div>
                            <div class="inputBox questionInputBox">
                                <textarea id="questionInput"
                                          class="inputBoxInput inputBoxInputComment"
                                          type="text" placeholder="شما چه سؤالی دارید؟"
                                          onclick="checkLogin()"></textarea>
                                <div class="sendQuestionBtn" onclick="sendQuestion(this)">ارسال</div>
                                <div class="sendQuestionBtn sendingQuestionLoading" style="display: none;"  disabled>
                                    <img src="{{URL::asset('images/icons/mGear.svg')}}" style="width: 30px; height: 30px;">
                                    {{__('در حال ثبت سوال')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="padding: 0px;">
        <div id="questionSectionDiv"></div>
    </div>

    <div id="questionPaginationDiv" class="col-xs-12 questionsMainDivFooter position-relative" style="margin-top: 0px;">
        <div class="col-xs-5 font-size-13 line-height-2">
            نمایش
            <span id="showQuestionPerPage"></span>
            پست در هر صفحه
        </div>
{{--        <a class="col-xs-3 showQuestionsNumsFilterLink" href="{{url('hotel-details-questions/' . $place->id . '/' . $place->name)}}">--}}
{{--            <div class="showQuestionsNumsFilter">نمایش تمامی سؤال‌ها</div>--}}
{{--        </a>--}}
        <div class="col-xs-4 font-size-13 line-height-2 text-align-right float-right">
            <span class="float-right">صفحه</span>
            <span id="questionPagination"></span>
        </div>
    </div>

</div>

<div class="modal fade" id="deleteQuestionModal" role="dialog" style="direction: rtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{__('پاک کردن سوال')}}</h4>
            </div>
            <div class="modal-body">
                <p>آیا از حذف سوال خود اطمینان دارید؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('لغو')}}</button>
                <button type="button" class="btn btn-danger" onclick="doDeleteQuestionByUser()">{{__('بله، حذف شود')}}</button>
            </div>
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

    function sendQuestion(_element){

        if(!checkLogin())
            return;

        var text = document.getElementById('questionInput').value;

        if(text != null && text != ''){
            $(_element).toggle();
            $(_element).next().toggle();
            $.ajax({
                type: 'post',
                url : '{{route("askQuestion")}}',
                data:{
                    'placeId': placeId,
                    'kindPlaceId' : kindPlaceId,
                    'text' : text,
                },
                success: function(response){
                    $(_element).toggle();
                    $(_element).next().toggle();

                    if(response == 'ok') {
                        getQuestion();
                        showSuccessNotifi('{{__('سئوال شما با موفقیت ثبت شد')}}', 'left', 'var(--koochita-blue)');
                        $('#questionInput').val('');
                    }
                    else
                        showSuccessNotifi('{{__('در ثبت سوال شما مشگلی پیش امد لطفا دوباره تلاش کنید')}}', 'left', 'red');
                },
                error: function(err){
                    $(_element).toggle();
                    $(_element).next().toggle();
                    showSuccessNotifi('{{__('در ثبت سوال شما مشگلی پیش امد لطفا دوباره تلاش کنید')}}', 'left', 'red');
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
        console.log(ques);
        var text = '';
        for(var i = 0; i < ques.length; i++){
            text += '<div id="questionSection_' + ques[i]["id"] + '" class="answersBoxMainDiv">\n';
            if(ques[i]['confirm'] == 1){
                text += '<div class="answersActions" onclick="showAnswersActionBox(this)">\n' +
                        '   <span class="answersActionsIcon"></span>\n' +
                        '</div>\n'+
                        '<div class="questionsActionsMoreDetails display-none">\n' +
                        '   <span onclick="showReportPrompt(' + ques[i]["id"] +  ', ' + kindPlaceId + ')">{{__("گزارش سوال")}}</span>\n' +
                        '   <a target="_blank" href="{{url("profile/index")}}/' + ques[i]["userName"] + '"  >{{__("مشاهده صفحه")}} ' + ques[i]["userName"] + '</a>\n' +
                        '   <a href="{{route("policies")}}" target="_blank">{{__("صفحه قوانین و مقررات")}}</a>\n';

                @if(auth()->check())
                    if(ques[i].yourReview) {
                        text += '<span>آرشیو سوال</span>\n' +
                                '<span onclick="deleteQuestionByUser(' + ques[i]["id"] + ')" style="color: red"> حذف سوال</span>\n';
                    }
                @endif
                    text += '</div>\n';
            }

            text += '<div class="answersWriterDetailsShow">\n' +
                    '   <div class="circleBase type2 answersWriterPicShow">' +
                    '       <img src="' + ques[i]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">' +
                    '   </div>\n' +
                    '   <div class="answersWriterExperienceDetails">\n' +
                    '   <b class="userProfileNameAnswers">' + ques[i]["userName"] + '</b>\n' +
                    '   <div class="display-inline-block">در\n' +
                    '       <span class="answersWriterExperiencePlace">' + ques[i]["place"]["name"] + '، شهر ' + ques[i]["city"]["name"] + '، استان ' + ques[i]["state"]["name"] + '</span>\n';

            if(ques[i]['confirm'] == 0)
                text += '<span class="label label-success">در انتظار تایید</span>';

            text += '   </div>\n' +
                    '   <div>' + ques[i]["timeAgo"] + '</div>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '   <div class="clear-both"></div>\n' +
                    '   <div class="questionContentMainBox" style="white-space: pre-line">' + ques[i]["text"] + '</div>\n' +
                    '   <div class="clear-both"></div>\n' +
                    '   <div class="questionSubMenuBar">\n';

            if(ques[i]["answersCount"] > 0) {
                text += '<div class="dark-blue float-right display-inline-black cursor-pointer" onclick="showAllAnswers(' + ques[i]["id"] + ', this)" style="direction: rtl">' +
                        '   <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue">' + ques[i]["answersCount"] + '</span>' +
                        '   <span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                        '</div>\n';
            }

            text += '   <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(' + ques[i]["id"] + ')">پاسخ دهید</b>\n' +
                    '</div>\n';

            text += '<div id="ansToQuestion' + ques[i]["id"] + '" class="display-none last">\n' +
                    '   <div class="newAnswerPlaceMainDiv">\n';
            text += createAnsToSection(ques[i]["id"], ques[i]["userName"]);
            text += '   </div>\n' +
                    '</div>\n';
            text += '<div id="ansOfQuestion' + ques[i]["id"] + '" class="display-none ansOfQuestion">';
            text += createAnsToQuestionComment(ques[i]["answers"], ques[i]["userName"], ques[i]["id"], '', true);
            text += '</div>' +
                    '</div>';
        }

        document.getElementById('questionSectionDiv').innerHTML = text;
        autosize($('#questionSectionDiv').find('textarea'));
    }

    function createAnsToQuestionComment(comment, repTo, topId, newClass = '', hasParent){
        var text = '';

        for(var k = 0; k < comment.length; k++) {

            let hasLiked = '';
            let hasDisLiked = '';
            let confirmHtml = '';
            if(comment[k]['confirm'] == 0)
                confirmHtml = '<span class="label label-success" style="font-size: 10px; margin-right: 10px">در انتظار تایید</span>';

            if(comment[k]['userLike'] && comment[k]['userLike']['like'] == 1)
                hasLiked = 'coloredFullIcon';
            else if(comment[k]['userLike'] && comment[k]['userLike']['like'] == -1)
                hasDisLiked = 'coloredFullIcon';

            text += '<div id="reviewSection_' + comment[k]["id"] + '" class="ansComment_' + topId + ' wholeAnsSection">' +
                    '   <div class="eachCommentMainBox ' + newClass + '">\n' +
                    '       <div class="circleBase type2 commentsWriterProfilePic">' +
                    '           <img src="' + comment[k]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '       </div>\n' +
                    '       <div class="commentsContentMainBox">\n' +
                    '           <div class="ansOfQuestionsUserInfo">' +
                    '               <b class="userProfileName float-right">' + comment[k]["userName"] + '</b>\n' +
                    '               <b class="commentReplyDesc display-inline-block">در پاسخ به ' + repTo + '</b>\n' +
                                    confirmHtml +
                '               </div>' +
                    '           <p>' + comment[k]["text"] + '</p>\n' +
                    '       </div>\n' +
                    '   </div>\n' +
                    '   <div class="commentsActionsBtns" style="display: flex; justify-content: space-between; align-items: center; margin-top: 0px;">\n' +
                    '       <div style="display: flex; width: auto">' +
                    '           <span class="LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeQuestion(' + comment[k]["id"] + ', 1, this)">' + comment[k]["like"] + '</span>\n' +
                    '           <span class="DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + ' " onclick="likeQuestion(' + comment[k]["id"] + ', 0, this)">' + comment[k]["disLike"] + '</span>\n' +
                    '           <span class="replayBtn" onclick="replayAnsToAns(' + comment[k]["id"] + ')" style="color: var(--koochita-blue)">پاسخ دهید</span>\n' +
                    '       </div>';
            if(comment[k]["answersCount"] > 0){
                text += '<div style="width: auto; display: flex; margin: 0;">' +
                        '   <div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showAllAnswers(' + comment[k]["id"] + ', this)" style="direction: rtl">' +
                        '       <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue">' + comment[k]["answersCount"] + '</span>' +
                        '       <span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                        '   </div>\n' +
                        '</div>\n';
            }
             text += '</div>\n' +
                     '<div class="replyToCommentMainDiv display-none" style="margin-top: 5px; margin-bottom: 10px">\n';
            text+=      createAnsToSection(comment[k]["id"], comment[k]["userName"]);
            text+=  '</div>\n';

            var borderCalss = '';
            if(hasParent === true)
                hasParent = 'check';
            else if(hasParent == 'check') {
                hasParent = false;
                borderCalss = 'borderInMobile'
            }

            if(comment[k]["answersCount"] > 0) {
                text += '<div id="ansOfQuestion' + comment[k]["id"] + '" class="display-none ansOfQuestion ' + borderCalss + '">';
                text += createAnsToQuestionComment(comment[k]["answers"], comment[k]["userName"], comment[k]["id"], 'lessWidthForAns');
                text += '</div>';
            }

            text += '</div>';
        }

        return text;
    }

    function sendAnsToQuestion(_element, _id){

        if(!checkLogin())
            return;

        var text = $('#questionAns' + _id).val();
        if(text.trim().length > 1){
            $(_element).toggle();
            $(_element).next().toggle();

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
                    $(_element).toggle();
                    $(_element).next().toggle();

                    if(response == 'ok') {
                        getQuestion();
                        showSuccessNotifi('{{__('پاسخ شما با موفقیت ثبت شد')}}', 'left', 'var(--koochita-blue)');
                        document.getElementById('questionAns' + _id).value = '';
                    }
                    else
                        showSuccessNotifi('{{__('در ثبت پاسخ مشکلی پیش آمده لطفا دوباره تلاش کنید.')}}', 'left', 'red');
                },
                error: function(err){
                    $(_element).toggle();
                    $(_element).next().toggle();
                    showSuccessNotifi('{{__('در ثبت پاسخ مشکلی پیش آمده لطفا دوباره تلاش کنید.')}}', 'left', 'red');
                }
            })
        }
    }

    function showAllAnswers(_id, _element){
        let textElement = $(_element).find('.seeAllText');

        $("#ansOfQuestion" + _id).toggle();
        textElement.text(textElement.text() == 'مشاهده پاسخ‌ها' ? 'بستن پاسخ‌ها' : 'مشاهده پاسخ‌ها');
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
        questionPage = 1;
        getQuestion();
    }

    function changeQuestionPage(_page){
        questionPage = _page;
        getQuestion();
    }

    function createQuestionPagination(questionCount){
        var text = '';
        var page = Math.ceil(questionCount/questionPerPageNum[questionPerPage]);

        createQuestionPerPage();

        if(page >= 5){
            if(questionPage == 1){
                text += '<span class="cursor-pointer color-blue mg-rt-5 float-right" onclick="changeQuestionPage(1)">1</span>';
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(2)">2</span>';
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(3)">3</span>';
                text += '<span style="float: right"> >>> </span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + page + ')">' + page + '</span>';
            }
            else if(questionPage == 2){
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(1)">1</span>';
                text += '<span class="cursor-pointer color-blue mg-rt-5 float-right" onclick="changeQuestionPage(2)">2</span>';
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(3)">3</span>';
                text += '<span class="float-right"> >>> </span>';
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(' + page + ')">' + page + '</span>';
            }
            else if(questionPage == 3){
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(1)">1</span>';
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(2)">2</span>';
                text += '<span class="cursor-pointer color-blue mg-rt-5 float-right" onclick="changeQuestionPage(3)">3</span>';
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(4)">4</span>';
                if(page == 5)
                    text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(5)">5</span>';
                else {
                    text += '<span class="float-right"> >>> </span>';
                    text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(' + page + ')">' + page + '</span>';
                }
            }
            else{
                text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(1)">1</span>';
                text += '<span class="float-right"> <<< </span>';

                if(questionPage == page){
                    text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(' + (questionPage-2) + ')">' + (questionPage-2) + '</span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + (questionPage-1) + ')">' + (questionPage-1) + '</span>';
                    text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeQuestionPage(' + (questionPage) + ')">' + (questionPage) + '</span>';
                }
                else{
                    text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(' + (questionPage-1) + ')">' + (questionPage-1) + '</span>';
                    text += '<span class="cursor-pointer color-blue mg-rt-5 float-right" onclick="changeQuestionPage(' + (questionPage) + ')">' + (questionPage) + '</span>';
                    text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(' + (questionPage+1) + ')">' + (questionPage+1) + '</span>';
                    if((page - questionPage) == 2)
                        text += '<span class="cursor-pointer mg-lt-5" onclick="changeQuestionPage(' + (questionPage+2) + ')">' + (questionPage+2) + '</span>';
                }

                if((page - questionPage) >= 3){
                    text += '<span class="float-right"> >>> </span>';
                    text += '<span class="cursor-pointer mg-rt-5 float-right" onclick="changeQuestionPage(' + page + ')">' + page + '</span>';
                }


            }
        }
        else{
            for (var i = 1; i <= page; i++){
                if(i == questionPage)
                    text += '<span class="cursor-pointer color-blue mg-rt-5" onclick="changeQuestionPage(' + i + ')">' + i + '</span>';
                else
                    text += '<span class="cursor-pointer mg-rt-5" onclick="changeQuestionPage(' + i + ')">' + i + '</span>';
            }
        }

        document.getElementById('questionPagination').innerHTML = text;
    }

    function createQuestionPerPage(){
        var text = '';

        for(var i = 0; i < questionPerPageNum.length; i++){
            if(i == questionPerPage)
                text += '<span id="questionPerView' + i + '" class="mg-0-2 cursor-pointer color-blue" onclick="changeQuestionPerPage(' + i + ')">' + questionPerPageNum[i] + '</span>';
            else
                text += '<span id="questionPerView' + i + '" class="mg-0-2 cursor-pointer" onclick="changeQuestionPerPage(' + i + ')">' + questionPerPageNum[i] + '</span>';

            if(i != (questionPerPageNum.length - 1))
                text += '-';
        }

        document.getElementById('showQuestionPerPage').innerHTML = text;
    }

    function createAnsToSection(_id, _ansToUserName){
        text =  '<div class="circleBase type2 newCommentWriterProfilePic">' +
                '   <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '</div>\n' +
                '<div class="inputBox" style="flex-direction: column">\n' +
                '<b class="replyAnswerTitle">در پاسخ به سوال ' + _ansToUserName + '</b>\n' +
                '<div class="questAnsText" style="width: 100%;">\n' +
                '   <textarea id="questionAns' + _id + '" class="inputBoxInput inputBoxInputAnswer" type="text"\n' +
                '       placeholder="شما چه پاسخی دارید؟"></textarea>\n' +
                '   <div class="sendQuestionBtn" onclick="sendAnsToQuestion(this, ' + _id + ')">{{__(("ارسال"))}}</div>\n' +
                '   <div class="sendQuestionBtn sendingQuestionLoading" style="display: none;"  disabled>\n' +
                '       <img src="{{URL::asset("images/icons/mGear.svg")}}" style="width: 30px; height: 30px;">\n' +
                '       {{__("در حال ثبت سوال")}}\n' +
                '   </div>' +
                '</div>\n' +
                '</div>';

        return text;
    }

    function replayAnsToAns(_id){
        if($('#reviewSection_' + _id).find('.replyToCommentMainDiv').hasClass("display-inline-blockImp"))
            $('.replyToCommentMainDiv').removeClass("display-inline-blockImp");
        else{
            $('.replyToCommentMainDiv').removeClass("display-inline-blockImp");
            $('#reviewSection_' + _id).find('.replyToCommentMainDiv').toggleClass("display-inline-blockImp");
        }
    }

    function likeQuestion(_logId, _like, _element){

        if(!checkLogin())
            return;

        $.ajax({
            type: 'post',
            url: '{{route('likeLog')}}',
            data:{
                'logId' : _logId,
                'like' : _like
            },
            success: function(response){
                response = JSON.parse(response);
                if(response[0] == 'ok'){
                    like = response[1];
                    dislike = response[2];

                    $(_element).parent().find('.coloredFullIcon').removeClass('coloredFullIcon');
                    $(_element).parent().find('.LikeIconEmpty').text(like);
                    $(_element).parent().find('.DisLikeIconEmpty').text(dislike);

                    if(_like == 1)
                        $(_element).parent().find('.LikeIconEmpty').addClass('coloredFullIcon');
                    else
                        $(_element).parent().find('.DisLikeIconEmpty').addClass('coloredFullIcon');


                    for(let i = 0; i < allReviewsCreated.length; i++){
                        if(allReviewsCreated[i].id == _logId){
                            if(allReviewsCreated[i]['userLike'] == null)
                                allReviewsCreated[i]['userLike'] = [];
                            allReviewsCreated[i]['userLike']['like'] = _like;
                            allReviewsCreated[i]['like'] = like;
                            allReviewsCreated[i]['disLike'] = dislike;

                            showFullReview = allReviewsCreated[i];
                            break;
                        }
                    }

                }
            }
        })
    }


    let deletedQuestion = 0;
    function deleteQuestionByUser(_reviewId){
        deletedQuestion = _reviewId;
        $('#deleteQuestionModal').modal('show');
    }

    function doDeleteQuestionByUser(){
        openLoading();
        $.ajax({
            type: 'post',
            url: '{{route("deleteQuestion")}}',
            data: {
                _token: '{{csrf_token()}}',
                id: deletedQuestion
            },
            success: function(response){
                closeLoading();
                if(response == 'ok'){
                    $('#deleteQuestionModal').modal('hide');
                    $('#questionSection_' + deletedQuestion).remove();
                    showSuccessNotifi('سوال شما با موفقیت حذف شد.', 'left', 'green');
                }
                else
                    showSuccessNotifi('در حذف سوال شما مشکلی پیش آمده لطفا دوباره تلاش کنید.', 'left', 'red');
            },
            error: function(err){
                closeLoading();
                showSuccessNotifi('در حذف سوال شما مشکلی پیش آمده لطفا دوباره تلاش کنید.', 'left', 'red');
            }
        })
    }


</script>