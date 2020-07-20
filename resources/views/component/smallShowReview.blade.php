{{--<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/hotelDetail.css')}}">--}}


<div id="reviewSmallSection">
    <div class="smallReviewMainDivShown float-right position-relative">
        <div class="commentWriterDetailsShow">
            <div class="circleBase type2 commentWriterPicShow">
                <img src="##userPic##" alt="##userName##" style="width: 100%; height: 100%; border-radius: 50%;">
            </div>
            <div class="commentWriterExperienceDetails">
                <div style="display: flex; align-items: center">
                    <a href="##userPageUrl##" target="_blank" class="userProfileName" style="font-weight: bold">##userName##</a>
                    <span class="label label-success smallReviewIsConfirm" style="display: ##isConfrim##">{{__('در انتظار تایید')}}</span>
                </div>
                <div style="font-size: 10px">{{__('در')}}
                    <a href="##placeUrl##" target="_blank">
                        <span class="commentWriterExperiencePlace">##where##</span>
                    </a>
                </div>
                <div style="font-size: 12px;">##timeAgo##</div>
            </div>
        </div>
        <div class="commentContentsShow position-relative">
            <p class="SummarizedPostTextShown" style="display: ##haveSummery##">
                ##summery##
                <span class="smallReviewshowMoreText" onclick="showSmallReviewMoreText(this)"></span>
            </p>
            <p class="compvarePostTextShown" style="display: none">
                ##text##
                <span class="showLessText" onclick="showSmallReviewLessText(this)">{{__('کمتر')}}</span>
            </p>
            <p class="compvarePostTextShown" style="display: ##notSummery##">
                ##text##
            </p>
        </div>
        <div class="smallReviewcommentPhotosShow">
            <div class="photosCol col-xs-12" onclick="showSmallReviewPics(##id##)" style="display: ##havePic##; margin-bottom: 10px">
                <div style="position: relative; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="##mainPic##" class="resizeImgClass" style="position: absolute; width: 100%;" onload="fitThisImg(this)">
                </div>
                <div class="numberOfPhotosMainDiv" style="display: ##hasMorePic##">
                    <div class="numberOfPhotos">##picCount##+</div>
                    <div>{{__('عکس')}}</div>
                </div>
            </div>
            <div class="quantityOfLikesSmallReview">

                <div class="smallReviewShowMore" onclick="seeFullModeReview(##id##)">
                    مشاهده کامل پست
                </div>
                <div>
                    <span>##like##</span>
                    <span class="iconFamily LikeIcon" style="color: #666666;"></span>
                </div>
                <div>
                    <span>##disLike##</span>
                    <span class="iconFamily DisLikeIcon" style="color: #666666;"></span>
                </div>
                <div style="font-size: 20px;" onclick="seeFullModeReview(##id##)">
                    <span>##answersCount##</span>
                    <span class="iconFamily CommentIcon" style="color: #666666;"></span>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="reviewSmallPlaceHolder">
    <div class="smallReviewMainDivShown float-right position-relative">
        <div class="commentWriterDetailsShow">
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
            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLineSmallReview"></div>
            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLineSmallReview" style="width: 90%"></div>
            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLineSmallReview" style="width: 20%"></div>
            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLineSmallReview"></div>
        </div>
        <div class="commentPhotosShow" style="border-top: 1px solid #e5e5e5; padding-top: 8px; margin-top: 5px;">
            <div class=" placeHolderAnime reviewPicPlaceHolder"></div>
        </div>
    </div>
</div>

<style>
    .fullReviewModal{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0px;
        right: 0px;
        background: #000000b8;
        z-index: 99;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .fullReviewBody{
        background: white;
        border-radius: 5px;
        width: 700px;
        padding: 15px;
        direction: rtl;
        max-height: 80vh;
        overflow-y: auto;
        position: relative;
    }

    .closeFullReview{
        position: absolute;
        left: 5px;
        top: 0px;
        font-size: 30px;
        color: #4DC7BC;
        cursor: pointer;
    }

    .mainFullReviewDiv{
        float: right;
        direction: rtl;
        background: white;
        margin-top: 10px;
        padding: 10px 20px;
        position: relative;
        width: 100%;
    }

    .moreOptionFullReview {
        position: absolute;
        top: 5px;
        left: 15px;
        height: 32px;
        width: 45px;
        background-color: #e5e5e5;
        display: flex;
        justify-content: center;
        align-items: center;
        float: right;
        direction: rtl;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        margin: 5px;
        padding: 5px 10px;
    }

    .moreOptionFullReviewIcon {
        position: relative;
    }

    .moreOptionFullReviewIcon::before {
        content: '\E091';
        font-family: shazdemosafer-tour !important;
        font-size: 35px;
        display: flex;
        color: #666;
    }

    .moreOptionFullReviewDetails {
        background-color: #E5E5E5;
        color: #7f7f7f;
        padding: 10px;
        position: absolute;
        top: 45px;
        left: 5px;
        font-weight: 500;
        z-index: 1;
    }

    .moreOptionFullReviewDetails > span {
        padding: 5px 0;
        display: block;
        text-align: right;
        cursor: pointer;
    }

    .moreOptionFullReviewDetails > span:hover {
        color: #0076a3;
    }

    .moreOptionFullReviewDetails > span:not(:last-child) {
        border-bottom: 1px solid #999999;
    }

    .moreOptionFullReviewDetails > a {
        padding: 5px 0;
        display: block;
        text-align: right;
        cursor: pointer;
        color: #7f7f7f;
    }

    .moreOptionFullReviewDetails > a:hover {
        color: #0076a3;
    }

    .moreOptionFullReviewDetails > a:not(:last-child) {
        border-bottom: 1px solid #999999;
    }
    
    .fullReviewPlaceAndTime {
        display: flex;
        flex-direction: column;
        font-size: 11px;
    }

    .commentPhotosMainDiv{
        width: 100%;
    }
    .firstCol {
        padding: 0 0 0 5px;
    }

    .quintupletPhotoDiv .firstCol > div {
        height: 133px;
    }

    .doublePhotoDiv .firstCol > div {
        height: 200px;
    }

    .singlePhotoDiv .firstCol{
        width: 100% !important;
    }

    .singlePhotoDiv .firstCol > div {
        height: 200px;
        width: 100% !important;
    }

    .tripletPhotoDiv .firstCol > div {
        height: 142px;
    }

    .quadruplePhotoDiv .firstCol > div {
        height: 200px;
    }

    .secondCol {
        padding: 0;
    }

    .quintupletPhotoDiv .secondCol > div {
        height: 200px;
    }

    .doublePhotoDiv .secondCol > div {
        height: 200px;
    }

    .tripletPhotoDiv .secondCol > div {
        height: 290px;
    }

    .quadruplePhotoDiv .secondCol > div {
        height: 200px;
    }

    .morePhotoLinkPosts {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        padding-top: 15px;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        right: 0px;
    }

    .morePhotoLinkPosts > span {
        width: 100%;
        font-size: 22px;
        display: inline-block;
        cursor: pointer;
    }

    .quantityOfLikes .feedbackStatistic {
        color: #666666;
    }

    .quantityOfLikes > span, .feedbackStatistic > span {
        color: #0076a3;
    }

    .fullReveiwPhotosCol{
    }

    .fullReveiwPhotosCol > div {
        margin-top: 4px;
        border: 1px solid black;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        position: relative;
    }

    .fullReveiwPhotosCol img {
        cursor: pointer;
        width: 100%;
    }

    .postsMainDivInSpecificMode .fullReveiwPhotosCol {
        border-top: 1px solid #E5E5E5;
    }

    .fullReviewRatingsDetailsShow{
        color: #666666;
        margin-bottom: 10px;
        display: inline-block;
        width: 100%;
    }

    .fullReviewMiddle{
        margin: 0px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: column;
        width: 100%;
        position: relative;
    }

    .fullReviewCommentPhotosShow{
        font-size: 12px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e5e5e5;
        display: flex;
    }

    .commentRatingHeader {
        padding: 3px 0px;
        display: inline-block;
        width: 60%;
        float: right;
        font-size: 12px;
    }

    .commentRatingHeader > span {
        color: #16174f;
        /*cursor: pointer;*/
    }

    .commentRatingsDetailsBtn {
        display: inline-block;
        width: 35%;
        float: left;
        text-align: left;
        padding-left: 30px;
        font-size: 13px;
        position: relative;
        cursor: pointer;
    }

    .commentRatingsDetailsBtnIcon {
        width: auto;
        display: inline-block;
        pointer-events: none;
        position: absolute;
        left: 10px;
        top: 4px;
    }

    .commentRatingsDetailsBtnIcon > i {
        float: left;
        color: #666666;
        font-size: 10px;
    }

    .commentRatingsDetailsBox {
        background: #e5e5e5;
        padding: 15px 9px;
    }

    .commentRatingsDetailsBox .starRating, .commentRatingsDetailsBox .starRatingGreen {
        cursor: default;
    }

    .commentFeedbackChoices {
        display: inline-block;
        width: 100%;
        border-top: 1px solid #E5E5E5;
        padding: 5px 0;
        border-bottom: 1px solid #e5e5e5;
        color: #666666;
        margin-top: 5px;
    }

    .postsActionsChoices {
        padding: 0 9px;
        font-size: 15px;
        float: right;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .postCommentChoice, .postShareChoice {
        display: inline-block;
        cursor: pointer;
    }

    .postShareChoice, .postCommentChoice{
        position: relative;
    }

    .postCommentChoice:hover {
        color: #0076a3;
    }

    .commentsLikeIconFeedback::before {
        content: '\E1F9';
        font-family: Shazde_Regular2 !important;
        font-size: 25px;
        position: absolute;
        top: -9px;
        right: 0px;
        cursor: pointer;
    }

    .commentsLikeClickedIconFeedback::before {
        content: '\E057';
        font-family: Shazde_Regular2 !important;
        font-size: 25px;
        position: absolute;
        top: -9px;
        right: 5px;
        cursor: pointer;
    }

    .commentsDislikeIconFeedback::before {
        content: '\E1F8';
        font-family: Shazde_Regular2 !important;
        font-size: 25px;
        position: absolute;
        top: -4px;
        right: 0px;
        cursor: pointer;
    }

    .commentsDislikeClickedIconFeedback::before {
        content: '\E058';
        font-family: Shazde_Regular2 !important;
        font-size: 25px;
        position: absolute;
        top: -4px;
        right: 5px;
        cursor: pointer;
    }

    .showCommentsIconFeedback::before {
        content: '\E06B';
        font-family: Shazde_Regular2 !important;
        font-size: 20px;
        position: absolute;
        top: -2px;
        right: 12px;
        cursor: pointer;
    }

    .showCommentsClickedIconFeedback::before {
        content: '\E06C';
        font-family: Shazde_Regular2 !important;
        font-size: 20px;
        position: absolute;
        top: -2px;
        right: 9px;
        cursor: pointer;
    }

    .commentsShareIconFeedback::before {
        content: '\E1F5';
        font-family: Shazde_Regular2 !important;
        font-size: 20px;
        position: absolute;
        top: -4px;
        right: 0px;
        cursor: pointer;
    }

    .commentsShareClickedIconFeedback::before {
        content: '\E1F6';
        font-family: Shazde_Regular2 !important;
        font-size: 20px;
        position: absolute;
        top: -5px;
        right: 0px;
        cursor: pointer;
    }

    .commentsMainBox {
        border-bottom: 1px solid #e5e5e5;
        width: 100%;
    }

    .eachCommentMainBox {
        display: inline-block;
        width: 100%;
        margin-bottom: 30px;
    }

    .commentsWriterProfilePic {
        display: inline-block;
        width: 40px;
        height: 40px;
        float: right;
        margin: 5px 0 0 5px;
    }

    .commentsContentMainBox {
        display: inline-block;
        width: calc(100% - 50px);
        background-color: #f2f2f2;
        border-radius: 10px;
        padding: 2px 10px 7px;
        text-align: justify;
        float: right;
        position: relative;
    }

    .ansCommentTimeAgo{
        font-size: 11px;
        margin-right: 5px;
        color: #9e9e9e;
        font-weight: normal;
    }

    .commentReplyDesc {
        color: #666666;
        font-size: 10px;
        line-height: 2;
        float: right;
        margin-right: 5px;
    }

    .replayReview.replayBtn{
        color: #0076a3;
        cursor: pointer;
    }

    .commentsMainBox {
        border-bottom: 1px solid #e5e5e5;
        width: 100%;
    }

    .eachCommentMainBox {
        display: inline-block;
        width: 100%;
        margin-bottom: 30px;
    }

    .ansOfQuestion .eachCommentMainBox{
        border-top: 1px solid #E5E5E5;
        padding-top: 10px;
        margin-bottom: 0px;
    }

    .commentsWriterProfilePic {
        display: inline-block;
        width: 40px;
        height: 40px;
        float: right;
        margin: 5px 0 0 5px;
    }

    .commentsContentMainBox {
        display: inline-block;
        width: calc(100% - 50px);
        background-color: #f2f2f2;
        border-radius: 10px;
        padding: 2px 10px 7px;
        text-align: justify;
        float: right;
        position: relative;
    }
    .ansCommentTimeAgo{
        font-size: 11px;
        margin-right: 5px;
        color: #9e9e9e;
        font-weight: normal;
    }

    .commentsActionsBtns {
        display: flex;
        float: right;
        margin-right: 50px;
        position: relative;
        cursor: pointer;
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .lessWidthForAns{
        margin-right: 45px;
        width: calc(100% - 45px);
    }

    .commentsActionsBtns > div:not(:nth-child(3)) {
        width: 20px;
        height: 20px;
        display: inline-block;
        margin: 8px 3px;
    }

    .replyCommentBox {
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
    }

    .replyBtn {
        background-color: #fcc156;
        border-radius: 5px;
        padding: 2px 6px;
        cursor: pointer;
    }

    .commentReplyDesc {
        color: #666666;
        font-size: 10px;
        line-height: 2;
        float: right;
        margin-right: 5px;
    }

    .likeActionBtn::before {
        content: '\E1F9';
        font-family: Shazde_Regular2 !important;
        font-size: 30px;
        position: absolute;
        top: -5px;
        right: 28px;
    }

    .likeActionClickedBtn::before {
        content: '\E057';
        font-family: Shazde_Regular2 !important;
        font-size: 30px;
        position: absolute;
        top: -5px;
        right: -2px;
        color: red;
    }

    .dislikeActionBtn::before {
        content: '\E1F8';
        font-family: Shazde_Regular2 !important;
        font-size: 30px;
        position: absolute;
        top: -2px;
        right: 59px;
    }

    .dislikeActionClickedBtn::before {
        content: '\E058';
        font-family: Shazde_Regular2 !important;
        font-size: 30px;
        position: absolute;
        top: -2px;
        right: 29px;
        color: darkred;
    }

    .commentsStatisticsBar {
        display: inline-block;
        position: absolute;
        width: 100%;
        bottom: -30px;
        right: 0;
        z-index: 9;
    }
    .replayReview.replayBtn{
        color: #0076a3;
        cursor: pointer;
    }

    .commentsStatisticSpan {
        display: inline-block;
        margin-left: 20px;
        font-size: 14px;
        position: relative;
        cursor: pointer;
    }

    .likeStatisticIcon::before {
        content: '\e057';
        font-family: Shazde_Regular2 !important;
        font-size: 25px;
        float: right;
        position: absolute;
        top: -10px;
        right: 5px;
    }

    .dislikeStatisticIcon::before {
        content: '\e058';
        font-family: Shazde_Regular2 !important;
        font-size: 25px;
        float: right;
        position: absolute;
        top: -6px;
        right: 5px;
    }

    .numberOfCommentsIcon::before {
        content: '\e06C';
        font-family: Shazde_Regular2 !important;
        font-size: 20px;
        float: right;
        position: absolute;
        top: -2px;
        right: 9px;
    }

    .newCommentPlaceMainDiv, .answerPlaceMainDiv, .newAnswerPlaceMainDiv {
        margin: 10px 0 5px;
        display: inline-block;
        width: 100%;
    }
    .ansTextAreaReview{
        width: calc(100% - 55px) !important;
        margin-right: 50px !important;
    }

    .newCommentPlaceMainDiv button, .replyToCommentMainDiv button {
        float: left;
        margin-bottom: 8px;
    }

    .newCommentWriterProfilePic > img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .replyToCommentMainDiv {
        display: inline-block;
        width: 99%;
        margin: 30px 0 15px;
    }

    .newCommentWriterProfilePic, .answerWriterProfilePic, .newAnswerWriterProfilePic {
        display: inline-block;
        width: 45px;
        height: 45px;
        float: right;
        margin-left: 5px;
    }

    .newCommentPlaceMainDiv .inputBox, .newAnswerPlaceMainDiv .inputBox {
        width: calc(100% - 60px);
        float: right;
        position: relative;
    }

    .replyToCommentMainDiv .inputBox {
        width: calc(100% - 50px);
        float: right;
        position: relative;
    }

    .newCommentPlaceMainDiv .emojionearea .emojionearea-editor{
        min-height: 20px;
    }
    .newCommentPlaceMainDiv .emojionearea-button{
        position: absolute !important;
        right: 5px !important;
        bottom: 5px !important;
    }

    .replyToCommentMainDiv .emojionearea .emojionearea-editor{
        min-height: 20px;
    }
    .replyToCommentMainDiv .emojionearea-button{
        position: absolute !important;
        right: 5px !important;
        bottom: 5px !important;
    }
    .replyToCommentMainDiv .inputBoxInput, .newAnswerPlaceMainDiv .inputBoxInput {
        position: unset !important;
        background: inherit;
        margin-top: 15px;
    }
    .replyToCommentMainDiv .emojionearea .emojionearea-picker.emojionearea-picker-position-top{
        left: auto !important;
        right: 0 !important;
    }

    .newCommentPlaceMainDiv .emojionearea .emojionearea-picker.emojionearea-picker-position-top{
        left: auto !important;
        right: 0 !important;
    }

    .newCommentPlaceMainDiv .inputBoxInput, .newAnswerPlaceMainDiv .inputBoxInput {
        text-align: right;
        font-size: 12px;
        border: none;
        /*height: 39px;*/
        background: inherit;
        position: unset !important;
    }

    .replyToCommentMainDiv .inputBoxInput {
        text-align: right;
        font-size: 12px;
        border: none;
        height: 39px;
    }

    .newCommentPlaceMainDiv textarea, .newAnswerPlaceMainDiv textarea {
        text-align: right;
        margin-top: 15px;
        height: 35px;
        resize: none;
        width: 94%;
        float: right;
    }

    .replyToCommentMainDiv textarea {
        text-align: right;
        margin-top: 15px;
        height: 35px;
        resize: none;
        width: 100%;
        float: right;
        color: black;
    }

    .newCommentPlaceMainDiv .commentSmileyIcon {
        top: 20px;
        left: 7px;
    }

    .replyToCommentMainDiv .commentSmileyIcon {
        top: 20px;
        left: 7px;
    }

    .replyCommentTitle, .replyWriterUsername, .replyAnswerTitle {
        color: #0076a3;
        position: absolute;
        top: 2px;
        right: 10px;
        font-size: 10px;
        direction: rtl;
        cursor: default;
    }

    .newAnswerPlaceMainDiv {
        margin: 0px;
        border-top: 1px solid #E5E5E5;
        padding: 10px 0px 0px 0px;
    }
    .questAnsText{
        display: flex;
        direction: rtl;
        justify-content: space-between;
        align-items: flex-end;
    }
    .ansOfQuestionsUserInfo{
        display: flex;
        align-items: center;
    }

    .newAnswerWriterProfilePic {
        width: 45px;
        height: 45px;
    }

    .postsMainDivFooter, .questionsMainDivFooter {
        background-color: white;
        padding: 10px;
        margin-top: 10px;
        color: #666666;
    }


    .likedislikeAnsReviews{
        align-items: center;
        font-size: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        direction: rtl;
        cursor: pointer;
    }
    .likedislikeAnsReviews:after{
        font-size: 26px;
        direction: ltr;
        width: 30px;
    }

    .LikeIconEmpty.likedislikeAnsReviews:before{
        content: '';
    }
    .LikeIconEmpty.likedislikeAnsReviews:after{
        content: '\E1F9';
        font-family: Shazde_Regular2 !important;
    }
    .LikeIconEmpty.likedislikeAnsReviews.coloredFullIcon{
        color: red;
    }
    .LikeIconEmpty.likedislikeAnsReviews.coloredFullIcon:after{
        content: '\E057' !important;
    }

    .DisLikeIconEmpty.likedislikeAnsReviews:before{
        content: '';
    }
    .DisLikeIconEmpty.likedislikeAnsReviews:after{
        content: '\E1F8';
        font-family: Shazde_Regular2 !important;
    }
    .DisLikeIconEmpty.likedislikeAnsReviews.coloredFullIcon{
        color: darkred;
    }
    .DisLikeIconEmpty.likedislikeAnsReviews.coloredFullIcon:after{
        content: '\E058' !important;
    }

    .userProfileNameFullReview{
        display: flex;
        align-items: center
    }

    .eachCommentMainBox {
        display: inline-block;
        width: 100%;
        margin-bottom: 30px;
    }

    .borderInMobile{
        width: calc(100% - 50px);
        margin-right: 50px;

        border-right: solid 1px #cccccc;
        padding-right: 10px;
        margin-bottom: 15px;
    }

    .inputBox {
        padding: 2px 10px;
        font-size: 0.8em;
        display: inline-block;
        border-radius: 5px;
        background-color: #f2f2f2;
        line-height: 1.42857143;
        width: auto;
        /*margin: 10px 0;*/
        /*border: 1px solid #cccccc;*/
        border: none;
    }

    .submitAnsInReview{
        background-color: #f2f2f2;
        color: #0076a3;
        padding: 2px;
        border: none;
    }

    .inputBoxInput {
        width: 100%;
        text-align: center;
        border: none;
        /*float: left;*/
        background-color: transparent;
    }

    .fullReviewLikeAnsSeeAllSection{
        display: flex;
        justify-content: space-between;
    }

    .fullReviewSeeAnses{
        color: #16174f;
        float: left;
        cursor: pointer;
    }

    @media only screen and (max-width: 767px) {
        .replyToCommentMainDiv{
            background-color: #f2f2f2;
            border-radius: 10px;
            padding: 5px 5px 0px 0px;
        }

        .eachCommentMainBox{
            background-color: #f2f2f2;
            border-radius: 10px;
            padding: 5px 5px 0px 0px;
        }

        .borderInMobile{
            border-right: solid 1px #cccccc;
            width: calc(100% - 15px);
            margin-right: 15px;
            padding-right: 10px;
            margin-bottom: 15px;
        }

        .newCommentPlaceMainDiv{
            background-color: #f2f2f2;
            padding: 5px 5px 0px 0px;
            border-radius: 5px;
        }

        .replyToCommentMainDiv {
            width: 99%;
            margin: 40px 0 0px;
        }

    }

    @media only screen and (max-width: 700px) {
        .fullReviewModal{
            align-items: unset;
        }
        .fullReviewBody{
            width: 90%;
            padding: 0px;
            max-height: calc(100vh - 75px);
        }
    }

    @media only screen and (max-width: 630px) {

        .commentFeedbackChoices{
            padding: 5px 0px 0px 0px;
        }

        .replyToCommentMainDiv {
            width: 100%;
        }

        .postsActionsChoices {
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .showCommentsIconFeedback::before, .showCommentsClickedIconFeedback::before {
            top: -4px;
        }

        .commentsLikeIconFeedback::before, .commentsLikeClickedIconFeedback::before {
            top: -11px;
        }

        .commentsDislikeIconFeedback::before, .commentsDislikeClickedIconFeedback::before {
            top: -7px;
        }

        .commentsShareIconFeedback::before, .commentsShareIconFeedback::before {
            font-size: 17px;
            top: -5px;
        }

        .newCommentPlaceMainDiv .inputBox {
            width: calc(100% - 50px);
        }

        .commentRatingsDetailsBox > div > b {
            font-size: 13px;
            line-height: 2.5;
        }

        .commentRatingsDetailsBox > div > b:nth-child(1) {
            padding-right: 0;
        }
    }

    @media only screen and (max-width: 520px){
        .postsActionsChoices{
            font-size: 15px;
            margin-top: 5px;
        }

        .showCommentsIconFeedback::before{
            right: 12px;
        }
    }

    @media only screen and (max-width: 480px) {
        .commentRatingHeader{
            width: 100%;
        }

        .starRating {
            line-height: 0.6;
        }

        .commentRatingsDetailsBtn {
            padding-left: 15px;
            font-size: 12px;
            width: 100%;
        }

        .commentRatingsDetailsBtnIcon {
            left: 0;
        }

        .postsActionsChoices {
            font-size: 14px;
            /*width: 50%;*/
            /*text-align: center;*/
        }

        .postsActionsChoices:nth-child(1), .postsActionsChoices:nth-child(2) {
            margin-bottom: 10px;
        }

        .showCommentsIconFeedback::before, .showCommentsClickedIconFeedback::before {
            /*right: 57px;*/
            top: -3px;
        }

        .commentsLikeIconFeedback::before, .commentsLikeClickedIconFeedback::before {
            top: -10px;
            /*right: 79px;*/
        }

        .commentsDislikeIconFeedback::before, .commentsDislikeClickedIconFeedback::before {
            top: -6px;
            /*right: 79px;*/
        }

        .commentsShareIconFeedback::before, .commentsShareIconFeedback::before {
            top: -4px;
            /*right: 74px;*/
        }

        .commentRatingsDetailsBox > div > b:nth-child(1) {
            float: right;
            padding-right: 0;
            line-height: 3;
            width: 100%;
        }

        .commentRatingsDetailsBox > div > b:nth-child(2) {
            float: right;
            padding-right: 0;
            line-height: 3;
            width: 100%;
        }

        .commentRatingsDetailsBox > div > b:nth-child(3) {
            padding-left: 0;
            line-height: 3;
            width: 40%;
        }

        .commentRatingsDetailsBox > div > div {
            width: 60%;
            padding-right: 0;
        }

        .commentRatingsDetailsBox > div > div span::before {
            font-size: 20px;
        }

        .userProfileName {
            font-size: 13px;
        }

        .commentReplyDesc {
            font-size: 9px;
        }

        .ansTextAreaReview{
            width: calc(100% - 20px) !important;
            margin-right: 15px !important;
        }
    }

    @media (max-width: 400px) {
        .commentRatingHeader,.commentRatingsDetailsBtn{
            font-size: 10px;
        }
    }

    @media only screen and (max-width: 370px) {
        .fullReviewLikeAnsSeeAllSection{
            display: block;
        }
        .fullReviewSeeAnses{
            text-align: left;
        }
        .fullReviewLikeAnsSeeAllSection > div{
            width: 100%;
        }

        .commentWriterExperienceDetails {
            width: 85%;
        }
    }

</style>

<div id="fullReviewModal" class="fullReviewModal hidden">
    <div id="fullReview" class="fullReviewBody"></div>
</div>


<script>
    let smallReviewPlaceHolder = $('#reviewSmallPlaceHolder').html();
    $('#reviewSmallPlaceHolder').remove();

    let smallReviews = [];
    let reviewSmallSample = $('#reviewSmallSection').html();
    $('#reviewSmallSection').remove();

    function getSmallReviewPlaceHolder(_id){
        $('#' + _id).append(smallReviewPlaceHolder);
    }

    function createSmallReviewHtml(item){
        smallReviews.push(item);
        let text = reviewSmallSample;
        let fk = Object.keys(item);
        for (let x of fk) {
            let t = '##' + x + '##';
            let re = new RegExp(t, "g");
            text = text.replace(re, item[x]);
        }

        let t;
        let re;
        if(item.hasSummery){
            t = '##haveSummery##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'block');

            t = '##notSummery##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'none');
        }
        else{
            t = '##haveSummery##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'none');

            t = '##notSummery##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'block');
        }

        t = '##havePic##';
        re = new RegExp(t, "g");
        if(item.hasPic)
            text = text.replace(re, 'block');
        else
            text = text.replace(re, 'none');

        t = '##hasMorePic##';
        re = new RegExp(t, "g");
        if(item.morePic)
            text = text.replace(re, 'block');
        else
            text = text.replace(re, 'none');

        t = '##isConfrim##';
        re = new RegExp(t, "g");
        if(item.confirm == 0)
            text = text.replace(re, 'block');
        else
            text = text.replace(re, 'none');

        return text;
    }

    function showSmallReviewPics(_id){
        var selectReview = 0;
        var reviewPicForAlbum = [];

        for(i = 0; i < smallReviews.length; i++){
            if(smallReviews[i]['id'] == _id){
                selectReview = smallReviews[i];
                break;
            }
        }

        if(selectReview != 0){
            revPic = selectReview['pics'];
            for(var i = 0; i < revPic.length; i++){
                reviewPicForAlbum[i] = {
                    'id' : revPic[i]['id'],
                    'sidePic' : revPic[i]['picUrl'],
                    'mainPic' : revPic[i]['picUrl'],
                    'video' : revPic[i]['videoUrl'],
                    'userPic' : selectReview['userPic'],
                    'userName' : selectReview['userName'],
                    'uploadTime' : selectReview['timeAgo'],
                    'showInfo' : false,
                }
            }
            createPhotoModal('عکس های پست', reviewPicForAlbum);
        }
    }

    function showSmallReviewMoreText(element){
        $(element).parent().toggle();
        $(element).parent().next().toggle();
    }

    function showSmallReviewLessText(element){
        $(element).parent().toggle();
        $(element).parent().prev().toggle();
    }

    function closeFullReview(){
        $('#fullReviewModal').addClass('hidden');
    }



    function showFullReviewQuestions(_element){
        $(_element).parent().next().toggleClass('hidden');
        $(_element).find('.downArrowIcon').toggleClass('upArrowIcon');
    }

    var userPic = '';
    var showReviewAnsInOneSee = 4; // this number mean show ans in first time and not click on "showAllReviews"
    var globalConfirmText = '<span class="label label-success" style="margin-right: 12px; font-size: 9px; font-weight: normal; cursor: default">{{__('در انتظار تایید')}}</span>';
    function showFullReviews(_reviews){
        $('#fullReviewModal').removeClass('hidden');

        var text = '';
        var kindPlaceId = _reviews['kindPlaceId'];

        text += '<div id="showReview_' + _reviews["id"] + '" class="mainFullReviewDiv">\n';
        if(_reviews['confirm'] == 1){
            text += '<div class="moreOptionFullReview" onclick="showFullReviewOptions(this)">\n' +
                    '   <span class="moreOptionFullReviewIcon"></span>\n' +
                    '</div>\n' +
                    '   <div class="moreOptionFullReviewDetails hidden">\n' +
                    '       <span onclick="showReportPrompt(' + _reviews["id"] + ', ' + kindPlaceId + ')">{{__("گزارش پست")}}</span>\n' +
                    '       <a target="_blank" href="' + _reviews["userPageUrl"] + '"  >{{__("مشاهده صفحه")}} ' + _reviews["userName"] + '</a>\n' +
                    '       <a href="{{route('policies')}}" target="_blank">صفحه قوانین و مقررات</a>\n';

            @if(auth()->check())
            if(_reviews.yourReview) {
                text += '<span>آرشیو پست</span>\n' +
                        '<span onclick="deleteReviewByUser(' + _reviews["id"] + ')" style="color: red"> {{__('حذف پست')}}</span>\n';
            }
            @endif
                text +='</div>\n';
        }

        text += '<div class="commentWriterDetailsShow">\n' +
                '   <div class="circleBase commentWriterPicShow">' +
                '       <img src="' + _reviews["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">' +
                '   </div>\n' +
                '   <div class="commentWriterExperienceDetails">\n' +
                '       <b class="userProfileName userProfileNameFullReview">' + _reviews["userName"] + '</b>\n' +
                '       <div class="fullReviewPlaceAndTime"> \n' +
                '           <div class="display-inline-block">در\n' +
                '               <span class="commentWriterExperiencePlace">' + _reviews["where"] + '</span>\n';

        if(_reviews['confirm'] == 0)
            text += '       <span class="label label-success">{{__('در انتظار تایید')}}</span>';

        text +=' </div>\n';

        if(_reviews["assigned"].length != 0) {
            text += '<div>با\n';
            for(j = 0; j < _reviews["assigned"].length; j++) {
                if(_reviews["assigned"][j]["name"])
                    text += '<a href="#" style="color: #0076a3">' + _reviews["assigned"][j]["name"] + '</a>،\n';
            }
            text += '</div>\n';
        }

        text += '<div>' + _reviews["timeAgo"] + '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="commentContentsShow">' +
                '   <div style="font-size: 15px; margin: 10px 0; white-space: pre-line">' + _reviews["text"] + '</div>\n' +
                '</div>\n' +
                '<div class="fullReviewCommentPhotosShow">\n';

        let reviewPicsCount = _reviews["pics"].length;
        let picDivClassName = '';
        let firstCol = '';
        let secCol = '';

        if(reviewPicsCount > 5)
            picDivClassName = 'quintupletPhotoDiv';
        else if(reviewPicsCount == 5)
            picDivClassName = 'quintupletPhotoDiv';
        else if(reviewPicsCount == 4)
            picDivClassName = 'quadruplePhotoDiv';
        else if(reviewPicsCount == 3)
            picDivClassName = 'tripletPhotoDiv';
        else if(reviewPicsCount == 2)
            picDivClassName = 'doublePhotoDiv';
        else if(reviewPicsCount == 1)
            picDivClassName = 'singlePhotoDiv';

        for(let k = 0; k < reviewPicsCount && k < 5; k++) {
            let ttt = '   <div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                '       <img src="' + _reviews["pics"][k]["picUrl"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n';
            if(reviewPicsCount > 5 && k == 4) {
                ttt += '<div class="morePhotoLinkPosts">\n' +
                    'به علاوه\n' +
                    '<span>' + (reviewPicsCount - 4) + '</span>\n' +
                    'عکس و ویدیو دیگر\n' +
                    '</div>\n';
            }
            ttt += '   </div>\n';
            if(k%2 == 0)
                firstCol += ttt;
            else
                secCol += ttt;
        }

        if (reviewPicsCount > 0) {
            text += '<div class="commentPhotosMainDiv ' + picDivClassName + '">\n' +
                    '   <div class="fullReveiwPhotosCol secondCol col-xs-6">\n' +
                    secCol +
                    '   </div>\n' +
                    '   <div class="fullReveiwPhotosCol firstCol col-xs-6">\n' +
                    firstCol +
                    '   </div>\n' +
                    '</div>\n';
        }

        text += '<div class="quantityOfLikes">\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="fullReviewRatingsDetailsShow">\n' +
                '   <div class="fullReviewMiddle">\n' +
                '       <div style="width: 100%;">' +
                '           <div class="commentRatingHeader">\n' +
                'بازدید ';

        if(_reviews["assigned"].length != 0)
            text +='<span> با دوستان</span>\n';

        text +='در فصل\n' +
            '<span>بهار</span>\n' +
            'و از مبدأ\n' +
            '<span>تهران</span>\n' +
            'انجام شده است\n' +
            '</div>\n';

        if(_reviews["questionAns"].length != 0) {
            text +='<div class="commentRatingsDetailsBtn" onclick="showRatingDetails(this)">مشاهده جزئیات امتیازدهی\n' +
                '   <div class="commentRatingsDetailsBtnIcon">\n' +
                '       <i class="glyphicon glyphicon-triangle-bottom"></i>\n' +
                '   </div>\n' +
                '</div>\n' +
                '</div>\n';

            text +='<div class="commentRatingsDetailsBox hidden">\n';

            let textAnsHtml = '';
            let multiAnsHtml = '';
            let rateAnsHtml = '';
            for(j = 0; j < _reviews["questionAns"].length; j++){
                let questionAns = _reviews["questionAns"][j];

                if(questionAns['ansType'] == 'text'){
                    textAnsHtml += '<div class="display-inline-block full-width">\n';
                    textAnsHtml +='<b class="col-xs-6 font-size-15 line-height-203 float-right" style="float: right">' + questionAns["description"] + '</b>\n';
                    textAnsHtml +='<b class="col-xs-6 font-size-15 line-height-203 float-right pd-lt-0">' + questionAns["ans"] + '</b>\n';
                    textAnsHtml += '</div>\n';
                }
                else if(questionAns['ansType'] == 'multi'){
                    multiAnsHtml += '<div class="display-inline-block full-width">\n';
                    multiAnsHtml +='<b class="col-xs-6 font-size-15 line-height-203 float-right" style="float: right">' + questionAns["description"] + '</b>\n';
                    multiAnsHtml +='<b class="col-xs-6 font-size-15 line-height-203 float-right pd-lt-0">' + questionAns["ans"] + '</b>\n';
                    multiAnsHtml += '</div>\n';
                }
                else if(questionAns['ansType'] == 'rate'){
                    let ansTexttt = '';
                    if(questionAns['ans'] == 5)
                        ansTexttt = 'عالی بود';
                    else if(questionAns['ans'] == 4)
                        ansTexttt = 'خوب بود';
                    else if(questionAns['ans'] == 3)
                        ansTexttt = 'معمولی بود';
                    else if(questionAns['ans'] == 2)
                        ansTexttt = 'بد نبود';
                    else if(questionAns['ans'] == 1)
                        ansTexttt = 'اصلا راضی نبودم';

                    rateAnsHtml += '<div class="display-inline-block full-width">\n' +
                        '   <b class="col-xs-6 font-size-14 line-height-203" style="float: right">' + questionAns["description"] + '</b>\n' +
                        '   <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-4 text-align-left">\n' +
                        '       <div>\n';

                    for(let starN = 0; starN < 5; starN++){
                        if(starN <= questionAns['ans'])
                            rateAnsHtml += '<span class="starRatingGreen autoCursor"></span>\n';
                        else
                            rateAnsHtml += '<span class="starRating autoCursor"></span>\n';
                    }

                    rateAnsHtml +=  '       </div>\n' +
                                    '   </div>\n' +
                                    '   <b class="col-xs-2 font-size-13 line-height-203 float-right pd-lt-0">' + ansTexttt + '</b>\n' +
                                    '</div>\n';
                }
            }

            text += textAnsHtml;
            text += multiAnsHtml;
            text += rateAnsHtml;
            text += '</div>\n';
        }
        text += '</div>';

        var likeClass = '';
        var disLikeClass = '';
        var likeIconClass = ' commentsLikeIconFeedback';
        var disLikeIconClass = ' commentsDislikeIconFeedback';

        if(_reviews['userLike'] != null && _reviews['userLike']['like'] == 1){
            likeClass = 'coloredFullIcon';
            likeIconClass = ' commentsLikeClickedIconFeedback';
        }
        else if(_reviews['userLike'] != null && _reviews['userLike']['like'] == -1){
            disLikeClass = 'coloredFullIcon';
            disLikeIconClass = ' commentsDislikeClickedIconFeedback';
        }

        text += '<div class="commentFeedbackChoices">\n' +
            '   <div class="postsActionsChoices col-xs-6" style="display: flex; justify-content: space-around;">\n' +
            '       <div class="cursor-pointer LikeIconEmpty likedislikeAnsReviews ' + likeClass + '" onclick="likeReview(' + _reviews["id"] + ', 1, this);" style="font-size: 15px; direction: rtl">' +
            '           <span id="reviewLikeNum' + _reviews["id"] + '">' +
                            _reviews["like"] +
            '           </span>' +
            '            <span class="hideOnPhone">نفر</span> ' +
            '       </div>\n' +
            '       <div class="cursor-pointer DisLikeIconEmpty likedislikeAnsReviews ' + disLikeClass + '" onclick="likeReview(' + _reviews["id"] + ', 0, this);" style="font-size: 15px; direction: rtl">' +
            '           <span id="reviewDisLikeNum' + _reviews["id"] + '">' +
                            _reviews["disLike"] +
            '           </span>' +
            '           <span class="hideOnPhone">نفر</span> ' +
            '       </div>\n' +
            '   </div>\n' +
            '   <div class="postsActionsChoices col-xs-3">\n' +
            '       <div class="postCommentChoice display-inline-block" onclick="showPostsComments(this)">\n' +
            '           <span>' + _reviews["answersCount"] + '</span>' +
            '           <span class="showCommentsIconFeedback firstIcon"></span>\n' +
            '           <span class="showCommentsClickedIconFeedback secondIcon" style="display: none"></span>\n' +
            '           <span class="mg-rt-25 cursor-pointer hideOnPhone">مشاهده نظرها</span>\n' +
            '       </div>\n' +
            '   </div>\n' +
            '   <div class="postsActionsChoices col-xs-3">\n' +
            '       <div class="postShareChoice display-inline-block" onclick="SharePostsBtn(this)">\n' +
            '           <span class="commentsShareIconFeedback firstIcon"></span>\n' +
            '           <span class="commentsShareClickedIconFeedback secondIcon" style="display: none"></span>\n' +
            '           <span class="mg-rt-10 cursor-pointer hideOnPhone">اشتراک‌گذاری</span>\n' +
            '       </div>\n' +
            '   </div>\n' +
            '</div>\n' +
            '<div class="commentsMainBox hidden">\n';

        var checkAllReviews = true;

        for(j = 0; j < _reviews["answers"].length; j++){
            let answers = _reviews["answers"][j];
            let seeAnses = '';
            let hasLiked = '';
            let hasDisLiked = '';
            let textInConfirm = '';

            if(answers["confirm"] == 0 )
                textInConfirm = globalConfirmText;

            if(answers["like"] == 1)
                hasLiked = 'coloredFullIcon';
            else if(answers["dislike"] == 1)
                hasDisLiked = 'coloredFullIcon';


            if(j > showReviewAnsInOneSee-1 && checkAllReviews){
                text += '<div id="allReviews_' + _reviews["id"] + '" style=" width: 100%; display: none">';
                checkAllReviews = false;
            }
            if(answers["answersCount"] > 0) {
                seeAnses += '<div class="fullReviewSeeAnses" onclick="showCommentsAnswers2(' + answers["id"] + ', this)">' +
                            '   <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue" style="margin-left: 20px">' + answers["answersCount"] + '</span>' +
                            '   <span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                            '</div>\n';
            }

            text += '<div  id="reviewSection_' + answers["id"] + '" style="margin-bottom: 15px"> ' +
                    '<div class="eachCommentMainBox" style="margin-bottom: 0px">\n' +
                    '   <div class="circleBase type2 commentsWriterProfilePic">' +
                    '       <img src="' + answers["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '   </div>\n' +
                    '   <div class="commentsContentMainBox">\n' +
                    '       <b class="userProfileName userProfileNameFullReview">' +
                                answers["userName"] +
                                textInConfirm +
                    '          <span class="ansCommentTimeAgo">' + answers["timeAgo"] + '</span>\n' +
                    '       </b>\n' +
                    '       <p>' + answers["text"] + '</p>\n'+
                    '    </div>\n' +
                    '</div>\n' +
                    '<div class="fullReviewLikeAnsSeeAllSection">\n' +
                    '   <div style="display: inline-flex">\n' +
                    '       <span id="reviewLikeNum' + answers["id"] + '" class="LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeReview(' + answers["id"] + ', 1, this)">' + answers["like"] + '</span>\n' +
                    '       <span id="reviewDisLikeNum' + answers["id"] + '" class="DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + ' " onclick="likeReview(' + answers["id"] + ', 0, this)">' + answers["disLike"] + '</span>\n' +
                    '       <span class="replayBtn replayReview" onclick="replayReviewToComments(' + answers["id"] + ')">پاسخ دهید</span>\n' +
                    '   </div>\n'+
                        seeAnses +
                    '</div>' +
                    '<div class="replyToCommentMainDiv ansTextAreaReview hidden" style="margin-top: 0px">\n' +
                    '   <div class="circleBase newCommentWriterProfilePic">' +
                    '       <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '   </div>\n' +
                    '   <div class="inputBox setButtonToBot">\n' +
                    '       <b class="replyCommentTitle">در پاسخ به نظر ' + answers["userName"] + '</b>\n' +
                    '       <textarea id="ansForReviews_' + answers["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji"  rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmit(this)"></textarea>\n' +
                    '       <button class="btn btn-primary submitAnsInReview" onclick="sendAnsOfReviews(' + answers["id"] + ',1)" style="height: fit-content"> ارسال</button>\n' +
                    '   </div>\n' +
                    '</div>\n'+
                    '</div>\n';

            text += '<div class="borderInMobile hidden ansComment_' + answers["id"] + '" style="margin-top: 0px">';
            text += createAnsToComment(answers["answers"], answers["userName"]);
            text += '</div>';

            if(j == _reviews["answers"].length && !checkAllReviews)
                text += '</div>';
        }

        text += '</div>';

        if(showReviewAnsInOneSee < _reviews["answers"].length) {
            let remainnn = _reviews["answers"].length - showReviewAnsInOneSee;
            text += '<div class="dark-blue mg-bt-10">\n' +
                    '   <span class="cursor-pointer" onclick="showAllReviews(' + _reviews["id"] + ', ' + remainnn + ', this)" style="font-size: 13px;">{{__("مشاهده")}} ' + remainnn + ' {{__("نظر باقیمانده")}}</span>\n' +
                    '</div>\n';
        }
        text += '</div>';

        // new ans
        text += '<div class="newCommentPlaceMainDiv">\n' +
            '   <div class="circleBase type2 newCommentWriterProfilePic">' +
            '       <img src="' + userPic + '" style="">\n' +
            '   </div>\n' +
            '   <div class="inputBox setButtonToBot">\n' +
            '       <textarea id="ansForReviews_' + _reviews["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji" rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmit(this)" style="padding-bottom: 10px"></textarea>\n' +
            '       <button class="btn btn-primary submitAnsInReview" onclick="sendAnsOfReviews(' + _reviews["id"] + ', 0)" > ارسال</button>\n' +
            '   </div>\n' +
            '<div>'+
            '</div>\n' +
            '</div>\n' +
            '</div>' +
            '</div>' +
            '</div>\n';

        $('#fullReview').html(text);
        $('#fullReview').append('<div class="closeFullReview iconClose" onclick="closeFullReview()"></div>');

        setTimeout(function(){
            resizeFitImg('resizeImgClass');
            autosize($('[id^="ansForReviews_"]'));
        }, 100);
    }

    function replayReviewToComments(_id){
        if($('#reviewSection_' + _id).find('.replyToCommentMainDiv').hasClass("display-inline-blockImp"))
            $('.replyToCommentMainDiv').removeClass("display-inline-blockImp");
        else{
            $('.replyToCommentMainDiv').removeClass("display-inline-blockImp");
            $('#reviewSection_' + _id).find('.replyToCommentMainDiv').toggleClass("display-inline-blockImp");
        }
    }

    function likeReview(_logId, _like, _element){

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
                    document.getElementById('reviewLikeNum'+_logId).innerText = like;
                    document.getElementById('reviewDisLikeNum'+_logId).innerText = dislike;

                    $(_element).parent().find('.likedislikeAnsReviews').removeClass('coloredFullIcon');
                    $(_element).addClass('coloredFullIcon');
                }
            }
        })
    }

    function sendAnsOfReviews(_logId, _ans){

        if(!checkLogin())
            return;

        var text = document.getElementById('ansForReviews_' + _logId).value;
        if(text.trim().length > 0){
            $.ajax({
                type: 'post',
                url: '{{route('ansReview')}}',
                data: {
                    'logId' : _logId,
                    'text'  : text,
                    'ansAns' : _ans
                },
                success: function(response){
                    if(response == 'ok'){
                        loadReviews();
                        showSuccessNotifi('{{__('پاسخ شما با موفقیت ثبت شد.')}}', 'left', '#0076a3');
                    }
                    else
                        showSuccessNotifi('{{__('در ثبت پاسخ مشکلی پیش آمده لطفا دوباره تلاش نمایید.')}}', 'left', 'red');
                },
                catch(e){
                    showSuccessNotifi('{{__('در ثبت پاسخ مشکلی پیش آمده لطفا دوباره تلاش نمایید.')}}', 'left', 'red');
                }
            })
        }

    }

    function showReviewPics(_index){
        var reviewPicForAlbum = [];
        revPic = allReviews[_index]['pics'];

        for(var i = 0; i < revPic.length; i++){
            reviewPicForAlbum[i] = {
                'id' : revPic[i]['id'],
                'sidePic' : revPic[i]['picUrl'],
                'mainPic' : revPic[i]['picUrl'],
                'video' : revPic[i]['videoUrl'],
                'userPic' : allReviews[_index]['userPic'],
                'userName' : allReviews[_index]['userName'],
                'showInfo' : false,
            }
        }

        createPhotoModal('عکس های پست', reviewPicForAlbum);
    }

    function showAllReviews(_id, _remain, _element){
        let ter;
        $('#allReviews_' + _id).toggle();
        if($('#allReviews_' + _id).css('display') == 'none')
            ter = 'مشاهده ' + _remain + ' نظر باقی مانده ';
        else
            ter = 'بستن ' + _remain + ' نظر ';

        $(_element).text(ter);
    }

    function changePerPage(_count){

        document.getElementById('reviewPerView' + reviewPerPage).classList.remove('color-blue');
        document.getElementById('reviewPerView' + _count).classList.add('color-blue');
        reviewPerPage = _count;
        reviewPage = 1;

        loadReviews();
    }

    function changeReviewPage(_page){
        reviewPage = _page;
        loadReviews();
    }

    function createReviewPagination(reviewsCount){
        var text = '';
        var page = Math.round(reviewsCount/reviewPerPageNum[reviewPerPage]);

        if(page < 2)
            document.getElementById('reviewsPagination').style.display = 'none';
        else
            document.getElementById('reviewsPagination').style.display = 'block';


        createReviewPerPage();

        if(page >= 5){
            if(reviewPage == 1){
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(2)" style="float: right">2</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(3)" style="float: right">3</span>';
                text += '<span style="float: right"> >>> </span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
            }
            else if(reviewPage == 2){
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(2)" style="float: right">2</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(3)" style="float: right">3</span>';
                text += '<span style="float: right"> >>> </span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
            }
            else if(reviewPage == 3){
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(2)" style="float: right">2</span>';
                text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(3)" style="float: right">3</span>';
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(4)" style="float: right">4</span>';
                if(page == 5)
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(5)" style="float: right">5</span>';
                else {
                    text += '<span style="float: right"> >>> </span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
                }
            }
            else{
                text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(1)" style="float: right">1</span>';
                text += '<span style="float: right"> <<< </span>';

                if(reviewPage == page){
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage-2) + ')" style="float: right">' + (reviewPage-2) + '</span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage-1) + ')" style="float: right">' + (reviewPage-1) + '</span>';
                    text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(' + (reviewPage) + ')" style="float: right">' + (reviewPage) + '</span>';
                }
                else{
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage-1) + ')" style="float: right">' + (reviewPage-1) + '</span>';
                    text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(' + (reviewPage) + ')" style="float: right">' + (reviewPage) + '</span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage+1) + ')" style="float: right">' + (reviewPage+1) + '</span>';
                    if((page - reviewPage) == 2)
                        text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + (reviewPage+2) + ')" style="float: right">' + (reviewPage+2) + '</span>';
                }

                if((page - reviewPage) >= 3){
                    text += '<span style="float: right"> >>> </span>';
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + page + ')" style="float: right">' + page + '</span>';
                }


            }
        }
        else{
            for (var i = 1; i <= page; i++){
                if(i == reviewPage)
                    text += '<span class="cursor-pointer color-blue mg-lt-5" onclick="changeReviewPage(' + i + ')" style="float: right">' + i + '</span>';
                else
                    text += '<span class="cursor-pointer mg-lt-5" onclick="changeReviewPage(' + i + ')" style="float: right">' + i + '</span>';
            }
        }

        document.getElementById('reviewPagination').innerHTML = text;
    }

    function createReviewPerPage(){

        var text = '';

        for(var i = 0; i < reviewPerPageNum.length; i++){
            if(i == reviewPerPage)
                text += '<span id="reviewPerView' + i + '" class="mg-lt-5 cursor-pointer color-blue" onclick="changePerPage(' + i + ')">' + reviewPerPageNum[i] + '</span>';
            else
                text += '<span id="reviewPerView' + i + '" class="mg-lt-5 cursor-pointer" onclick="changePerPage(' + i + ')">' + reviewPerPageNum[i] + '</span>';

            if(i != (reviewPerPageNum.length - 1))
                text += '-';
        }

        document.getElementById('showReviewPerPage').innerHTML = text;
    }

    function createAnsToComment(comment, repTo){

        var text = '';
        for(var k = 0; k < comment.length; k++) {
            let hasLiked = '';
            let hasDisLiked = '';
            let textInConfirm = '';
            if(comment[k]["confirm"] == 0)
                textInConfirm =  globalConfirmText;

            if(comment[k]["userLike"]) {
                if (comment[k]["userLike"]["like"] == 1)
                    hasLiked = 'coloredFullIcon';
                else if (comment[k]["userLike"]["like"] == -1)
                    hasDisLiked = 'coloredFullIcon';
            }

            text += '<div id="reviewSection_' + comment[k]["id"] + '" style="margin-bottom: 15px">' +
                '<div class="eachCommentMainBox"  style="margin-bottom: 0px">\n' +
                '   <div class="circleBase type2 commentsWriterProfilePic">' +
                '       <img src="' + comment[k]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '   </div>\n' +
                '   <div class="commentsContentMainBox">\n' +
                '       <div class="userProfileName userProfileNameFullReview">' +
                '           <b class="userProfileName userProfileNameFullReview float-right">' + comment[k]["userName"] + '</b>\n' +
                '           <b class="commentReplyDesc display-inline-block">در پاسخ به ' + repTo + '</b>\n' +
                textInConfirm +
                '       </div>\n' +
                '       <div>' + comment[k]["text"] + '</div>\n' +
                '   </div>' +
                '</div>\n' +
                '<div class="fullReviewLikeAnsSeeAllSection">\n' +
                '   <div style="display: inline-flex;">\n' +
                '       <span id="reviewLikeNum' + comment[k]["id"] + '" class="LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeReview(' + comment[k]["id"] + ', 1, this)">' + comment[k]["like"] + '</span>\n' +
                '       <span id="reviewDisLikeNum' + comment[k]["id"] + '" class="DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + '" onclick="likeReview(' + comment[k]["id"] + ', 0, this)">' + comment[k]["disLike"] + '</span>\n' +
                '       <span class="replayBtn replayReview" onclick="replayReviewToComments(' + comment[k]["id"] + ')">{{__('پاسخ دهید')}}</span>\n' +
                '   </div>\n';

            if(comment[k]["answersCount"] > 0) {
                text += '<div class="fullReviewSeeAnses" onclick="showCommentsAnswers2(' + comment[k]["id"] + ', this)">' +
                        '   <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue">' + comment[k]["answersCount"] + '</span>' +
                        '   <span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                        '</div>\n';
            }
            text += '</div>'+
                '<div class="replyToCommentMainDiv hidden" style="margin-top: 0px;">\n' +
                '   <div class="circleBase type2 newCommentWriterProfilePic">' +
                '       <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '   </div>\n' +
                '   <div class="inputBox setButtonToBot">\n' +
                '       <b class="replyCommentTitle">{{__("در پاسخ به نظر")}} ' + comment[k]["username"] + '</b>\n' +
                '       <textarea  id="ansForReviews_' + comment[k]["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji" rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmit(this)"></textarea>\n' +
                '       <button class="btn btn-primary submitAnsInReview" onclick="sendAnsOfReviews(' + comment[k]["id"] + ', 1)" > {{__("ارسال")}}</button>\n' +
                '   </div>\n' +
                '</div>\n' +
                '</div>\n';

            text += '<div class=" hidden ansComment_' +  comment[k]["id"] + '" style="width: 100%">';
            if(comment[k]["answersCount"] > 0)
                text += createAnsToComment(comment[k]["answers"], comment[k]["userName"]);
            text += '</div>';
        }

        return text;
    }

    function checkFullSubmit(_element){
        let text = $(_element).val();
        if(text.trim().length > 0)
            $(_element).next().removeAttr('disabled');
        else
            $(_element).next().attr('disabled', 'disabled');
    }

    function showCommentsAnswers2(_id, element){
        $('.ansComment_' + _id).toggleClass("display-inline-blockImp");
        textElement = $(element).find('.seeAllText');
        textElement.text(textElement.text() == 'مشاهده پاسخ‌ها' ? 'بستن پاسخ‌ها' : 'مشاهده پاسخ‌ها');
    }

    let deletedReview = 0;
    function deleteReviewByUser(_reviewId){
        deletedReview = _reviewId;
        $('#deleteReviewsModal').modal('show');
    }

    function doDeleteReviewByUser(){
        openLoading();
        $.ajax({
            type: 'post',
            url: '{{route("review.delete")}}',
            data: {
                _token: '{{csrf_token()}}',
                id: deletedReview
            },
            success: function(response){
                closeLoading();
                if(response == 'ok'){
                    $('#deleteReviewsModal').modal('hide');
                    $('#showReview_' + deletedReview).remove();
                    showSuccessNotifi('نظر شما با موفقیت حذف شد.', 'left', 'green');
                }
                else
                    showSuccessNotifi('در حذف نظر شما مشکلی پیش آمده لطفا دوباره تلاش کنید.', 'left', 'red');
            },
            error: function(err){
                closeLoading();
                showSuccessNotifi('در حذف نظر شما مشکلی پیش آمده لطفا دوباره تلاش کنید.', 'left', 'red');
            }
        })
    }

    function showRatingDetails(element) {
        if ($(element).parent().next().hasClass('commentRatingsDetailsBox')) {
            $(element).parent().next().toggleClass('hidden');
            $(element).children().children().toggleClass('glyphicon-triangle-bottom');
            $(element).children().children().toggleClass('glyphicon-triangle-top')
            $(element).parent().toggleClass('mg-bt-10');
        }
    }

    function showPostsComments(element) {
        $(element).parent().parent().next().toggleClass('hidden');
        $(element).toggleClass('color-blue');
        $(element).children("span.firstIcon").toggle();
        $(element).children("span.secondIcon").toggle();
    }

    function showFullReviewOptions(element) {
        $(element).next().toggleClass('hidden');
        $(element).toggleClass("bg-color-darkgrey");
    }

</script>