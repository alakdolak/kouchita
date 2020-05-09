<style>

    .mainUseruserNameComment{
        font-size: 22px;
        color: #0076a3;
    }
    .commentSectionBody{
        background: white;
        width: 100%;
        border-radius: 10px;
        padding: 15px;
        background-color: #232323;
        color: white;
    }

    .commentInputSection{
        display: flex;
        align-items: flex-start;
    }

    .commentAnsesSection{
        width: 100%;
        border-bottom: 1px solid red;
    }

    .commentInput{
        width: 88%;
        margin-right: 11px;
        padding: 10px;
        border-radius: 5px;
        background: #7d7d7d;
        resize: none;
        border: none;
    }
    .commentInput::placeholder{
        color: white;
    }
    .commentInput::-ms-input-placeholder{
        color: white;
    }
    .commentInput::-ms-input-placeholder{
        color: white;
    }
    .commentAnsTextSection{
        width: 98%;
        margin-right: 11px;
        padding: 10px;
        border-radius: 5px;
        background: #545454;
        border: none;
        font-size: 14px;
    }
    .topOfcommentAnsTextSection{
        width: 87%;
    }
    .topWho{
        display: flex;
        align-items: center;
    }
    .whoAns{
        font-size: 20px;
        color: #0076a3;
        font-weight: bold;
        margin-left: 5px;
    }
    .whoAnsTo{
        font-weight: bold;
        color: darkgray;
    }
    .commentAnsToAns{
        margin-right: 12px;
    }
    .commentAnsInfos{
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        margin: 5px;
    }
    .commentAnsRight{
        display: flex;
        font-size: 27px;
        margin-right: 10px;
    }
    .commentAnsLeft{
        color: #fcc156;
        cursor: pointer;
    }
    .commentAnsLikeSection{
        display: flex;
        justify-content: space-around;
        font-size: 30px;
        line-height: 25px;
    }
    .likeAnsIconDiv{
        width: 26px;
        height: 26px;
        position: relative;
        cursor: pointer;
    }
    .disLikeAnsIconDiv{
        width: 26px;
        height: 26px;
        position: relative;
        cursor: pointer;
    }
    .LikeIconEmptySett:before, .DisLikeIconEmptySett:before{
        position: absolute;
        left: 0px;
    }


    .disLikeAnsIconDiv:hover .DisLikeIconEmptySett:before{
        content: '\E058';
        color: darkred;
    }
    .likeAnsIconDiv:hover .LikeIconEmptySett:before{
        content: '\E057';
        color: red;
    }
    .redLikeIcon:before{
        content: '\E057' !important;
        font-family: Shazde_Regular2 !important;
        color: red;
    }
    .redDisLikeIcon:before{
        content: '\E058' !important;
        font-family: Shazde_Regular2 !important;
        color: darkred;
    }


    .commentInputSendButton{
        background: #0076a3;
        color: white;
        padding: 10px;
        border-radius: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .acceptedComment{
        margin-top: 25px;
    }

    .acceptedCommentText{
        white-space: pre-line;
        text-align: justify;
        padding: 0px 25px;
        color: #bfbfbf;
    }
    .acceptedCommentSett{
        padding: 4px 15px;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        border-top: solid 1px red;
        border-bottom: solid 1px red;
    }
    .acceptedCommentRight{
        display: flex;
        align-items: center;
        font-size: 12px;
    }
    .acceptedCommentLeft{
        display: flex;
    }
    .acceptedCommentAnsButton{
        /* color: black; */
        /* background-color: #fcc156; */
        padding: 2px 8px;
        background-color: #0076a3;
        border-radius: 6px;
        cursor: pointer;
        color: white;
        text-align: center;
        width: 89px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        margin-right: 10px;
    }
</style>


<div id="commentSectionBody" class="commentSectionBody">
    <div class="commentInputSection">
        <div class="userPicDiv">
            <img id="userPictureCommenting" src="" alt="koochita">
        </div>
        <textarea class="commentInput" name="AnsToComment_0" id="AnsToComment_0" placeholder="شما چه نظری دارید؟" rows="1" maxlength="255" onclick="checkLoginForCommenting()"></textarea>
        <div class="commentInputSendButton" onclick="sendCommentTo(0)">ارسال</div>
    </div>
    <hr style="border-color:darkgray; margin: 10px 0px">

    <div id="mainCommentSample" style="display: none">

        <div id="comment_##id##" class="commentAnsesSection">

            <div class="commentInputSection" style="margin-top: 10px;">
                <div class="userPicDiv userPicAnsToReviewPc">
                    <img src="##userPic##" alt="##username##">
                </div>
                <div class="topOfcommentAnsTextSection">

                    <div style="display: flex; align-items: center">
                        <div class="commentAnsTextSection">
                            <div style="display: flex">
                                <div class="userPicDiv userPicAnsToReviewMobile">
                                    <img src="##userPic##" alt="##username##">
                                </div>
                                <div class="topWho">
                                    <div class="whoAns">
                                        ##username##
                                    </div>
                                    {{--                                <div class="whoAnsTo">--}}
                                    {{--                                    در پاسخ به ##ansToUsername##--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                            <div style="text-align: justify; white-space: pre-line">##text##</div>
                            <div class="commentAnsToAns hideOnPc" style="justify-content: flex-end;">
                                {{--                            <div class="commentAnsLikeSection">--}}
                                {{--                                <div class="likeAnsIconDiv" onclick="toggleCommentLikeIcon(true, ##id##)">--}}
                                {{--                                    <div class="LikeIconEmpty LikeIconEmptySett likeIcon_##id##"></div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="disLikeAnsIconDiv" onclick="toggleCommentLikeIcon(false, ##id##)">--}}
                                {{--                                    <div class="DisLikeIconEmpty DisLikeIconEmptySett dislikeIcon_##id##"></div>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                <div class="acceptedCommentAnsButton" onclick="openAnsToComment(##id##)">
                                    پاسخ دهید
                                </div>
                            </div>
                        </div>
                        <div class="acceptedCommentAnsButton" onclick="openAnsToComment(##id##)">
                            پاسخ دهید
                        </div>
                    </div>

                    <div id="ansTo_##id##" class="commentInputSection" style="margin-top: 10px; display: none;">
                        <div class="userPicDiv ">
                            <img src="##authPicture##">
                        </div>
                        <textarea class="commentInput" name="AnsToComment_##id##" id="AnsToComment_##id##" placeholder="شما چه پاسخی به ##username## دارید؟" rows="1"></textarea>
                        <div class="commentInputSendButton" onclick="sendCommentTo(##id##)">ارسال</div>
                    </div>

                    <div class="commentAnsInfos">
                        <div class="commentAnsRight">
                            <div style="color: #0076a3; display: flex">
                                <span style="color: white">##like##</span>
                                <span class="LikeIcon" style="font-size: 30px"></span>
                            </div>
                            <div style="color: #0076a3; display: flex; margin-right: 10px;">
                                <span style="color: white">##disLike##</span>
                                <span class="DisLikeIcon" style="font-size: 30px"></span>
                            </div>
                            <div style="color: #0076a3; display: flex; margin-right: 10px;">
                                <span style="color: white">##ansCount##</span>
                                <span class="CommentIcon"></span>
                            </div>
                        </div>
                        <div class="commentAnsLeft" onclick="openAnsOnReview(##id##)">
                            مشاهده پاسخ ها
                        </div>
                    </div>

                </div>
            </div>

            <div id="ansOf_##id##" style="display: none; justify-content: center; align-items: center"></div>
        </div>

        {{--        <div id="comment_##id##" class="acceptedComment">--}}
{{--            <div class="mainUserPicSection">--}}
{{--                <div class="userPicDiv">--}}
{{--                    <img src="##userPic##" alt="##username##">--}}
{{--                </div>--}}
{{--                <div class="mainUserInfos">--}}
{{--                    <div class="mainUseruserNameComment">--}}
{{--                        ##username##--}}
{{--                    </div>--}}
{{--                    <div class="videoUploadTime">--}}
{{--                        ##time##--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="acceptedCommentText">##text##</div>--}}

{{--            <div class="acceptedCommentSett">--}}
{{--                <div class="acceptedCommentRight">--}}
{{--                    <div style="margin-left: 15px;">--}}
{{--                        <span style="color: #0076a3">##ansCount##</span>--}}
{{--                        <span>پاسخ دادند</span>--}}
{{--                    </div>--}}
{{--                    <div style="margin-left: 15px;">--}}
{{--                        <span style="color: #0076a3">##like##</span>--}}
{{--                        <span>دوست داشتند</span>--}}
{{--                    </div>--}}
{{--                    <div style="margin-left: 15px;">--}}
{{--                        <span style="color: #0076a3">##disLike##</span>--}}
{{--                        <span>دوست نداشتند</span>--}}
{{--                    </div>--}}
{{--                    <div style="color: #fcc156; cursor: pointer" onclick="openAnsOnReview(##id##)">--}}
{{--                        مشاهده پاسخ ها--}}
{{--                        <i class="downArrowIcon"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="acceptedCommentLeft">--}}
{{--                    <div class="commentAnsLikeSection" style="width: 70px">--}}
{{--                        <div class="likeAnsIconDiv" onclick="toggleCommentLikeIcon(true, ##id##)">--}}
{{--                            <div class="LikeIconEmpty LikeIconEmptySett likeIcon_##id##"></div>--}}
{{--                        </div>--}}
{{--                        <div class="disLikeAnsIconDiv" onclick="toggleCommentLikeIcon(false, ##id##)">--}}
{{--                            <div class="DisLikeIconEmpty DisLikeIconEmptySett dislikeIcon_##id##"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="acceptedCommentAnsButton" onclick="openAnsToComment(##id##)">--}}
{{--                        پاسخ دهید--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div id="ansTo_##id##" class="commentInputSection" style="margin-top: 10px; display: none;">--}}
{{--                <div class="userPicDiv">--}}
{{--                    <img src="##authPicture##">--}}
{{--                </div>--}}
{{--                <textarea class="commentInput" name="AnsToComment_##id##" id="AnsToComment_##id##" placeholder="شما چه نظری دارید؟" rows="1" maxlength="255"></textarea>--}}
{{--                <div class="commentInputSendButton" onclick="sendCommentTo(##id##)">ارسال</div>--}}
{{--            </div>--}}

{{--            <div id="ansOf_##id##" style="display: none"></div>--}}

{{--        </div>--}}
    </div>

    <div id="ansCommentSample" style="display: none;">
        <div id="comment_##id##" class="commentAnsesSection" style="width: 87%;">

            <div class="commentInputSection" style="margin-top: 10px;">
                <div class="userPicDiv userPicAnsToReviewPc">
                    <img src="##userPic##" alt="##username##">
                </div>
                <div class="topOfcommentAnsTextSection">
                    <div style="display: flex; align-items: center">
                        <div class="commentAnsTextSection">
                            <div style="display: flex">
                                <div class="userPicDiv userPicAnsToReviewMobile">
                                    <img src="##userPic##" alt="##username##">
                                </div>
                                <div class="topWho">
                                    <div class="whoAns">
                                        ##username##
                                    </div>
                                    <div class="whoAnsTo">
                                        در پاسخ به ##ansToUsername##
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; white-space: pre-line">##text##</div>
                            <div class="commentAnsToAns hideOnPc" style="justify-content: flex-end;">
                                {{--                            <div class="commentAnsLikeSection">--}}
                                {{--                                <div class="likeAnsIconDiv" onclick="toggleCommentLikeIcon(true, ##id##)">--}}
                                {{--                                    <div class="LikeIconEmpty LikeIconEmptySett likeIcon_##id##"></div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="disLikeAnsIconDiv" onclick="toggleCommentLikeIcon(false, ##id##)">--}}
                                {{--                                    <div class="DisLikeIconEmpty DisLikeIconEmptySett dislikeIcon_##id##"></div>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                <div class="acceptedCommentAnsButton" onclick="openAnsToComment(##id##)">
                                    پاسخ دهید
                                </div>
                            </div>
                        </div>

                        <div class="acceptedCommentAnsButton" onclick="openAnsToComment(##id##)">
                            پاسخ دهید
                        </div>
                    </div>

                    <div id="ansTo_##id##" class="commentInputSection" style="margin-top: 10px; display: none;">
                        <div class="userPicDiv ">
                            <img src="##authPicture##">
                        </div>
                        <textarea class="commentInput" name="AnsToComment_##id##" id="AnsToComment_##id##" placeholder="شما چه نظری دارید؟" rows="1"></textarea>
                        <div class="commentInputSendButton" onclick="sendCommentTo(##id##)">ارسال</div>
                    </div>

                    <div class="commentAnsInfos">
                        <div class="commentAnsRight">
                            <div style="color: #0076a3; display: flex">
                                <span style="color: white">##like##</span>
                                <span class="LikeIcon" style="font-size: 30px"></span>
                            </div>
                            <div style="color: #0076a3; display: flex; margin-right: 10px;">
                                <span style="color: white">##disLike##</span>
                                <span class="DisLikeIcon" style="font-size: 30px"></span>
                            </div>
                            <div style="color: #0076a3; display: flex; margin-right: 10px;">
                                <span style="color: white">##ansCount##</span>
                                <span class="CommentIcon"></span>
                            </div>
                        </div>
                        <div class="commentAnsLeft" onclick="openAnsOnReview(##id##)">
                            مشاهده پاسخ ها
                        </div>
                    </div>

                </div>

            </div>

            <div id="ansOf_##id##" style="display: none; justify-content: center; align-items: center"></div>
        </div>
    </div>
    
</div>

<script>
    let userPicture = '{{$userPicture}}';
    let commentingStoreUrl = null;
    let commentingFeedBackStoreUrl = null;
    let commentingDefaultData = null;
    let mainCommentSample = null;
    let ansCommentSample = null;

    mainCommentSample = $('#mainCommentSample').html();
    $('#mainCommentSample').remove();
    ansCommentSample = $('#ansCommentSample').html();
    $('#ansCommentSample').remove();

    $('#userPictureCommenting').attr('src', userPicture);

    function checkLoginForCommenting(){
        if (!hasLogin) {
            showLoginPrompt();
            return;
        }
    }

    function initCommentingSection(_sendUrl, _feedback,_defaultData){
        commentingStoreUrl = _sendUrl;
        commentingFeedBackStoreUrl = _feedback;
        commentingDefaultData = JSON.stringify(_defaultData);
    }

    function sendCommentTo(_kind){
        let text = $('#AnsToComment_' + _kind).val();
        console.log(text);
        console.log(_kind);
        if(text.trim().length > 0 && commentingStoreUrl != null){
            $.ajax({
                type: 'post',
                url: commentingStoreUrl,
                data: {
                    _token: '{{csrf_token()}}',
                    data: commentingDefaultData,
                    text: text,
                    ansTo: _kind
                },
                success: function(response){
                    try{
                        response = JSON.parse(response);
                        if(response['status'] == 'ok'){
                            console.log(response['comment']);
                            alert('نظر شما با موفقیت ثبت شد')
                        }
                        else{

                        }
                    }
                    catch (e) {
                        console.log(e);
                    }
                },
                error: function(err){

                }
            })
        }
    }


    function fillMainCommentSection(_comment){
        // _comment = [
            // {
            //   id,
            //   text,
            //   username,
            //   userPic,
            //   time,
            //   text,
            //   ansCount,
            //   like,
            //   disLike,
            //   ansToUsername,
            //   comments: _comment,
            // }
        // ];
        for(let i = 0; i < _comment.length; i++){
            let text = mainCommentSample;
            let fk = Object.keys(_comment[i]);
            for (let x of fk) {
                t = '##' + x + '##';
                re = new RegExp(t, "g");
                text = text.replace(re, _comment[i][x]);
            }
            t = '##authPicture##';
            re = new RegExp(t, "g");
            text = text.replace(re, userPicture);

            $('#commentSectionBody').append(text);

            fillAnsCommentSection(_comment[i]['comments'], _comment[i]['id'])
        }
    }

    function fillAnsCommentSection(_comment, _id){
        for(let i = 0; i < _comment.length; i++){
            let text = ansCommentSample;
            let fk = Object.keys(_comment[i]);
            for (let x of fk) {
                t = '##' + x + '##';
                re = new RegExp(t, "g");
                text = text.replace(re, _comment[i][x]);
            }
            t = '##authPicture##';
            re = new RegExp(t, "g");
            text = text.replace(re, userPicture);

            $('#ansOf_' + _id).append(text);

            fillAnsCommentSection(_comment[i]['comments'], _comment[i]['id'])
        }
    }




    function openAnsToComment(_id){
        $('#ansTo_' + _id).toggle();
    }
    function openAnsOnReview(_id){
        if($('#ansOf_' + _id).css('display') == 'flex')
            $('#ansOf_' + _id).css('display', 'none');
        else
            $('#ansOf_' + _id).css('display', 'flex');
    }

    function toggleCommentLikeIcon(_kind, _id){
        $.ajax({
            type: 'post',
            url: commentingFeedBackStoreUrl,
            data: {
                _token: '{{csrf_token()}}',
                commentId: _id,
                like: _kind
            },
            success: function(response){
                try{
                    response = JSON.parse(response);
                    if(response['status'] == 'ok'){
                        if(_kind){
                            $('.dislikeIcon_' + _id).removeClass('redDisLikeIcon');
                            $('.likeIcon_' + _id).toggleClass('redLikeIcon');
                        }
                        else{
                            $('.dislikeIcon_' + _id).toggleClass('redDisLikeIcon');
                            $('.likeIcon_' + _id).removeClass('redLikeIcon');
                        }
                    }
                    else
                        alert('در ثبت نظر شما مشکلی پیش آمده لطفا دوباره تلاش کنید')
                }
                catch (e) {
                    console.log(e);
                    alert('در ثبت نظر شما مشکلی پیش آمده لطفا دوباره تلاش کنید')
                }
            },
            error: function(err){
                alert('در ثبت نظر شما مشکلی پیش آمده لطفا دوباره تلاش کنید')
            }
        })
    }




</script>