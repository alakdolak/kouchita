
<div id="questionSample" style="display: none">
    <div class="isConfirmed">
        <div class="moreOptionFullReview" onclick="showAnswersActionBoxQ(this)">
            <span class="threeDotIconVertical"></span>
        </div>
        <div class="moreOptionFullReviewDetails hidden">
            <span onclick="showReportPrompt(##id##, ##kindPlaceId##)">{{__("گزارش سوال")}}</span>
            <a target="_blank" href="{{url("profile/index")}}/##userName##">{{__("مشاهده صفحه")}} ##userName##</a>
            <a href="{{route("policies")}}" target="_blank">{{__("صفحه قوانین و مقررات")}}</a>
            @if(auth()->check())
                <span class="yourPost" onclick="deleteQuestionByUser(##id##)" style="color: red">{{__('حذف سوال')}}</span>
            @endif
        </div>
    </div>
    
    <div class="commentWriterDetailsShow">
        <div class="circleBase commentWriterPicShow">
            <img src="##userPic##" style="height: 100%; width: 100%; border-radius: 50%;">
        </div>
        <div class="commentWriterExperienceDetails">
            <a href="{{url('profile/index')}}/##userName##" class="userProfileName userProfileNameFullReview" target="_blank" style="font-weight:bold">##userName##</a>
            <div class="fullReviewPlaceAndTime">
                <div class="display-inline-block">
                    در
                    <a href="##placeUrl##" class="commentWriterExperiencePlace">##placeName##، {{__('شهر')}} ##cityName##، {{__('استان')}} ##stateName##</a>
                    <span class="notConfirmed label label-success inConfirmLabel">{{__('در انتظار تایید')}}</span>
                </div>
                <div>##timeAgo##</div>
            </div>
        </div>

    </div>
    <div class="questionContentMainBox" style="white-space: pre-line">##text##</div>
    <div class="questionSubMenuBar">
        <b class="replyBtn replyAnswerBtn" onclick="openReplyQuestionSection(##id##)"> {{__('پاسخ دهید')}} </b>
        <div class="dark-blue float-right display-inline-black cursor-pointer" onclick="showAllQuestionAnswer(##id##, this)" style="direction: rtl">
            <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue">##answersCount##</span>
            <span class="seeAllText">{{__('مشاهده پاسخ‌ها')}}</span>
        </div>
    </div>
    <div id="ansToQuestion##id##" class="hidden last newAnswerPlaceMainDiv" style="margin-top: 0px;"></div>
    <div id="ansOfQuestion##id##" class="hidden ansOfQuestion"></div>
</div>

<div id="questionPlaceHolderSample">
    <div class="smallReviewMainDivShown float-right position-relative">
        <div class="commentWriterDetailsShow" style="display: flex;">
            <div class="placeHolderAnime" style="width: 55px; height: 55px; float: right; border-radius: 50%"></div>
            <div class="commentWriterExperienceDetails" style="display: flex; flex-direction: column; padding-right: 10px">
                <div class="userProfileName placeHolderAnime resultLineAnim" style="width: 100px"></div>
                <div class="userProfileName placeHolderAnime resultLineAnim" style="width: 100px"> </div>
                <div class="userProfileName placeHolderAnime resultLineAnim" style="width: 100px"></div>
            </div>
        </div>
        <div class="commentContentsShowPlaceHolder position-relative">
            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLineSmallReview"></div>
            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLineSmallReview"></div>
            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLineSmallReview" style="width: 60%"></div>
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
    let questionSample = $('#questionSample').html();
    $('#questionSample').remove();

    let questionPlaceHolderSample = $('#questionPlaceHolderSample').html();
    $('#questionPlaceHolderSample').remove();

    function getQuestionPlaceHolder(){
        return questionPlaceHolderSample;
    }

    function createQuestionPack(_question, _sectionId){
        if($('#questionSection_' + _question.id).length == 0) {
            let firstTime = '<div id="questionSection_' + _question.id + '" class="questionPack"></div>';
            $(`#${_sectionId}`).append(firstTime);
        }

        let obj = Object.keys(_question);
        let text = questionSample;

        for (let x of obj) {
            let t = '##' + x + '##';
            let re = new RegExp(t, "g");
            text = text.replace(re, _question[x]);
        }

        $(`#questionSection_${_question.id}`).html(text);


        if(_question.confirm == 1)
            $('#questionSection_' + _question['id']).find('.notConfirmed').remove();
        else if(!_question.yourReview)
            $('#questionSection_' + _question['id']).find('.isConfirmed').remove();

        let answers = createAnswerPack(_question.answers, _question.userName, _question.id, '', true);
        $(`#ansOfQuestion${_question.id}`).html(answers);

        let answersInput = createAnswerInputBox(_question.id, _question.userName);
        $(`#ansToQuestion${_question.id}`).html(answersInput);
    }

    function createAnswerPack(comment, repTo, topId, newClass = '', hasParent){
        var text = '';
        for(var k = 0; k < comment.length; k++) {

            let hasLiked = '';
            let hasDisLiked = '';
            let confirmHtml = '';
            if(comment[k]['confirm'] == 0)
                confirmHtml = '<span class="label label-success inConfirmLabel">در انتظار تایید</span>';

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
                '   <div class="fullReviewLikeAnsSeeAllSection">\n' +
                '       <div style="display: flex; width: auto">' +
                '           <span class="LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeQuestion(' + comment[k]["id"] + ', 1, this)">' + comment[k]["like"] + '</span>\n' +
                '           <span class="DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + ' " onclick="likeQuestion(' + comment[k]["id"] + ', 0, this)">' + comment[k]["disLike"] + '</span>\n' +
                '           <span class="replayBtn" onclick="openReplyQuestionSection(' + comment[k]["id"] + ')" style="color: var(--koochita-blue); cursor: pointer">{{__("پاسخ دهید")}}</span>\n' +
                '       </div>';
            if(comment[k]["answersCount"] > 0){
                text += '<div style="width: auto; display: flex; margin: 0;">' +
                        '   <div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showAllQuestionAnswer(' + comment[k]["id"] + ', this)" style="direction: rtl">' +
                        '       <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue">' + comment[k]["answersCount"] + '</span>' +
                        '       <span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                        '   </div>\n' +
                        '</div>\n';
            }
            text += '</div>\n' +
                    '<div id="ansToQuestion' + comment[k].id + '" class="replyToCommentMainDiv hidden" style="margin-top: 5px; margin-bottom: 10px">\n';
            text+=      createAnswerInputBox(comment[k].id, comment[k].userName);
            text+=  '</div>\n';

            var borderCalss = '';
            if(hasParent === true)
                hasParent = 'check';
            else if(hasParent == 'check') {
                hasParent = false;
                borderCalss = 'borderInMobile'
            }

            if(comment[k]["answersCount"] > 0) {
                text += '<div id="ansOfQuestion' + comment[k]["id"] + '" class="hidden ' + borderCalss + '">';
                text += createAnswerPack(comment[k]["answers"], comment[k]["userName"], comment[k]["id"]);
                text += '</div>';
            }

            text += '</div>';
        }
        return text;
    }

    function createAnswerInputBox(_id, _ansToUserName){
        return  '<div class="circleBase type2 newCommentWriterProfilePic">\n' +
                '   <img src="' + userPic + '" style="height: 100%; border-radius: 50%;">\n' +
                '</div>\n' +
                '<div class="inputBox" style="flex-direction: column">\n' +
                '   <b class="replyAnswerTitle">{{__("در پاسخ به سوال")}} ' + _ansToUserName + '</b>\n' +
                '   <div class="questAnsText" style="width: 100%;">\n' +
                '       <textarea id="QanswerInputBox' + _id + '" class="inputBoxInput inputBoxInputAnswer" placeholder="{{__("شما چه پاسخی دارید؟")}}"></textarea>\n' +
                '       <div class="sendQuestionBtn" onclick="sendAnswerOfQuestion(this, ' + _id + ')">{{__(("ارسال"))}}</div>\n' +
                '       <div class="sendQuestionBtn sendingQuestionLoading" style="display: none;"  disabled>\n' +
                '           <img src="{{URL::asset("images/icons/mGear.svg")}}" style="width: 30px; height: 30px;">\n' +
                '               {{__("در حال ثبت سوال")}}\n' +
                '       </div>\n' +
                '   </div>\n' +
                '</div>';
    }

    function sendAnswerOfQuestion(_element, _id){
        if(!checkLogin())
            return;

        let text = $('#QanswerInputBox' + _id).val();
        if(text.trim().length > 0){
            $(_element).hide();
            $(_element).next().show();

            $.ajax({
                type: 'post',
                url : '{{route("sendAns")}}',
                data:{
                    'text' : text,
                    'relatedTo' : _id
                },
                success: function(response){
                    $(_element).toggle();
                    $(_element).next().toggle();

                    if(response == 'ok') {
                        getAnswerOfThisQuestion(_id);
                        showSuccessNotifi('{{__('پاسخ شما با موفقیت ثبت شد')}}', 'left', 'var(--koochita-blue)');
                        $(`#QanswerInputBox${_id}`).val('');
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

    function getAnswerOfThisQuestion(_id){
        $.ajax({
            type: 'post',
            url: '{{route("getSingleQuestion")}}',
            data: {
                _token: '{{csrf_token()}}',
                id: _id
            },
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok'){
                    console.log(response);
                    createQuestionPack(response.result);
                }

            }
        })
    }

    function showAnswersActionBoxQ(_element){
        $(_element).next().toggleClass('hidden');
        $(_element).toggleClass("bg-color-darkgrey");
    }

    function showAllQuestionAnswer(_id, _element){
        let textElement = $(_element).find('.seeAllText');
        $("#ansOfQuestion" + _id).toggleClass('hidden');
        textElement.text(textElement.text() == 'مشاهده پاسخ‌ها' ? 'بستن پاسخ‌ها' : 'مشاهده پاسخ‌ها');
    }

    function openReplyQuestionSection(_id){
        if(!checkLogin())
            return;

        $('#ansToQuestion' + _id).toggleClass('hidden');
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
    function deleteQuestionByUser(_id){
        deletedQuestion = _id;
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