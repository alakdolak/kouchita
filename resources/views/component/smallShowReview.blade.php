<style>
    .smallReviewMainDivShown{
        padding: 10px;
        width: 97%;
        border: solid 1px #f3f3f3;
        margin: 1%;
        box-shadow: 0 0 5px 0px #646464;
        margin-bottom: 15px;
        direction: rtl;
    }

    .quantityOfLikesSmallReview{
        width: 100%;
        font-size: 23px;
        padding-top: 10px;
        text-align: right;
        line-height: 15px;
        justify-content: flex-end;
        display: flex;
        color: #1876a3;
        border-top: 1px solid #e5e5e5;

    }
    .smallReviewcommentPhotosShow{
        padding-bottom: 5px;
        border-bottom: 1px solid #e5e5e5;
    }
    .smallReviewshowMoreText{
        position: relative;
        cursor: pointer;
        width: 30px;
        height: 10px;
        display: inline-block;
    }
    .smallReviewshowMoreText::before{
        content: '\E091';
        font-family: shazdemosafer-tour !important;
        font-size: 35px;
        color: #4DC7BC;
        position: absolute;
        bottom: -15px;
        left: 0;
    }
    .smallReviewIsConfirm{
        margin-right: 12px;
        font-size: 9px;
        font-weight: normal;
        cursor: default;
    }
    .smallReviewShowMore{
        font-size: 12px;
        margin-left: auto;
        cursor: pointer;
    }
    .quantityOfLikesSmallReview > div{
        display: flex;
        margin-right: 10px;
        cursor: pointer;
    }
    .postsMainDivInSpecificMode .photosCol{
        border-top: 1px solid #E5E5E5;
    }
    .photosCol > div{
        margin-top: 2px;
        border: 2px solid black;
        cursor: pointer;
    }
    .postsMainDivInSpecificMode .photosCol > div:nth-child(1){
        height: 210px;
    }
    .numberOfPhotosMainDiv{
        background-color: rgba(0,0,0,0.5);
        position: absolute;
        bottom: 0;
        left: 15px;
        color: white;
        text-align: center;
        padding: 4px 20px;
        border: none !important;
    }
    .numberOfPhotos{
        font-size: 18px;
        font-weight: 700;
        line-height: 1;
    }
    .commentContentsShow > p{
        word-break: normal;
        text-align: justify;
    }
    .showLessText{
        color: #4DC7BC;
        cursor: pointer;
    }
    .commentWriterPicShow{
        width: 55px;
        height: 55px;
        background-color: #E5E5E5;
        display: inline-block;
        float: right;
        margin-left: 10px;
    }
    .commentWriterExperienceDetails{
        color: #666666;
        margin-bottom: 10px;
        direction: rtl;
        text-align: right;
        padding-right: 65px;
    }
    .reviewPlaceHolderTextLineSmallReview{
        width: 100%;
        margin-bottom: 10px;
        height: 7px;
    }
    .commentContentsShowPlaceHolder{
        display: flex;
        flex-direction: column;
    }
    .reviewPicPlaceHolder{
        width: 100%;
        height: 200px;
        border-radius: 5px;
    }
</style>

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

        display: none;
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
    .fullReviewHeader{
        display: flex;
    }
    .fullReviewUserPicDiv{
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        overflow: hidden;
    }
    .fullReviewUserInfoDiv{
        display: flex;
        flex-direction: column;
        margin-right: 10px;
    }
    .fullReviewWhere{
        color: #16174f;
        cursor: pointer;
        font-size: 11px;
        display: flex;
    }
    .fullReviewUsername{
        font-size: 16px;
        display: flex;
        align-items: center;
        color: #0076a3;
        font-weight: bold;
    }
    .fullReviewTime{
        font-size: 11px;
        color: #666666;
        text-align: right;
    }
    .confirmFullreview{
        color: white;
        background: #5cb85c;
        padding: 2px 5px;
        border-radius: 3px;
    }
    .fullReviewBorderBottom{
        border-bottom: 1px solid #e5e5e5;
    }
    .fullReviewText{
        font-size: 15px;
        margin: 10px 0;
        white-space: pre-line;
        text-align: justify;
        margin-bottom: 0px;
    }
    .fullReviewSeeDiv{
        padding-bottom: 5px;
    }
    .fullReviewSpace{
        color: #666666;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 0px;
        font-size: 12px;
    }
    .fullReviewSeeQuestionDiv{
        background: #e5e5e5;
        border-radius: 3px;
        padding: 15px 9px;
        width: 100%;
        text-align: right;
    }
    .fullReviewQuestionDiv{
        display: flex;
        color: #666666;
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .questionFace{
        width: 60%;
    }
    .questionAnss{
        font-size: 13px;
        display: flex;
        align-items: center;
        width: 40%;
        justify-content: space-evenly;
    }
    .fullReviewStartAns{

    }
    .fullReviewSeenSeason span{
        color: #16174f;
    }
    .fullReviewSeenBut{
        cursor: pointer;
    }
    .fullReviewPicSection{
        display: flex;
        flex-direction: column;
    }

    .topMainReviewPic{
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .commentPhotosMainDiv {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0;
        direction: rtl;
    }

    .firstCol {
        padding: 0 0 0 5px;
    }

    .fivePhotoDiv .firstCol > div {
        height: 132px;
    }

    .twoPhotoDiv .firstCol > div {
        height: 200px;
    }

    .threePhotoDiv .firstCol > div {
        height: 143px;
    }

    .fourPhotoDiv .firstCol > div {
        height: 200px;
    }

    .secondCol {
        padding: 0;
    }

    .fivePhotoDiv .secondCol > div {
        height: 200px;
    }

    .twoPhotoDiv .secondCol > div {
        height: 200px;
    }

    .singlePhotoDiv .secondCol{
        width: 100%;
        height: 200px;
    }

    .threePhotoDiv .secondCol > div {
        height: 290px;
    }

    .fourPhotoDiv .secondCol > div {
        height: 200px;
    }

    .morePhotoLinkPostsFullReview {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        right: 0px;
    }

    .morePhotoLinkPostsFullReview > span {
        width: 100%;
        font-size: 22px;
        display: inline-block;
        cursor: pointer;
    }

    .photosColFullReview{
        display: flex;
        flex-direction: column;
        width: 49%;
        margin-left: 4px;
    }

    .photosColFullReview > div{
        margin-top: 4px;
        border: 1px solid black;
        cursor: pointer;
    }

    .replyToCommentMainDiv{

    }
</style>

<div id="fullReviewModal" class="fullReviewModal">
    <div class="fullReviewBody">
        <span class="closeFullReview iconClose" onclick="closeFullReview()"></span>
        <div class="fullReviewHeader">
            <div class="fullReviewUserPicDiv">
                <img id="fullReviewUserPic" src="http://localhost/assets/defaultPic/5.jpg" class="resizeImgClass" style="width: 100%">
            </div>
            <div class="fullReviewUserInfoDiv">
                <div class="fullReviewUsername">
                    admin
                </div>
                <div class="fullReviewWhere">
                    <a href="#" style="color: #16174f">
                        در رستوران شیرین نخل شهر اصفهان ، استان اصفهان
                    </a>
                    <div class="confirmFullreview">{{__('در انتظار تایید')}}</div>
                </div>
                <div class="fullReviewTime">
                    19 ساعت پیش
                </div>
            </div>
        </div>
        <div class="fullReviewText fullReviewBorderBottom">
{{--            سلام یه متن بلند سلام یه متن بلند سلام یه متن بلندسلام یه متن بلند--}}
{{--            سلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلام یه متن بلندسلا--}}

            <div class="fullReviewPicSection">

                <div class="commentPhotosMainDiv fivePhotoDiv">
                    <div class="photosColFullReview secondCol col-xs-6">
                        <div class="topMainReviewPic"  onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                            </div>
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                            </div>
                        </div>
                    <div class="photosColFullReview firstCol col-xs-6">
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                            </div>
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                            </div>
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                            <div class="morePhotoLinkPostsFullReview">
                                به علاوه
                                <span>10</span>
                                عکس و ویدیو دیگر
                                </div>
                            </div>
                        </div>
                </div>

                <div class="commentPhotosMainDiv fourPhotoDiv">
                    <div class="photosColFullReview secondCol col-xs-6">
                        <div class="topMainReviewPic"  onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                    </div>
                    <div class="photosColFullReview firstCol col-xs-6">
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                    </div>
                </div>

                <div class="commentPhotosMainDiv threePhotoDiv">
                    <div class="photosColFullReview secondCol col-xs-6">
                        <div class="topMainReviewPic"  onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                    </div>
                    <div class="photosColFullReview firstCol col-xs-6">
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                    </div>
                </div>

                <div class="commentPhotosMainDiv twoPhotoDiv">
                    <div class="photosColFullReview secondCol col-xs-6">
                        <div class="topMainReviewPic"  onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                    </div>
                    <div class="photosColFullReview firstCol col-xs-6">
                        <div class="topMainReviewPic" onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                    </div>
                </div>

                <div class="commentPhotosMainDiv singlePhotoDiv">
                    <div class="photosColFullReview secondCol">
                        <div class="topMainReviewPic"  onclick="showReviewPics(1)">
                            <img src="http://localhost/assets/userPhoto/restaurant/res_shirin_nakhl_isfahan/1594647649_Iran1.jpg" class=" resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fullReviewSeeDiv fullReviewBorderBottom">
            <div class="fullReviewSpace">
                <div class="fullReviewSeenSeason">
                    بازدید در فصل
                    <span>بهار</span>
                    و از مبدأ
                    <span>تهران</span>
                    انجام شده است
                </div>
                <div class="fullReviewSeenBut" onclick="showFullReviewQuestions(this)">
                    <span>
                        مشاهده جزئیات امتیازدهی
                    </span>
                    <span class="downArrowIcon upArrowIcon"></span>
                </div>
            </div>
            <div id="fullReviewQuestionsSection" class="fullReviewSeeQuestionDiv">
                <div class="fullReviewQuestionDiv">
                    <div class="questionFace">ایا از غذا و رفتار کارکنان رستوران راضی بودید؟</div>
                    <div class="questionAnss">نه رفتارشون زیاد جالب نبود. طوری رفتار می کردند که انگاه ما گارسون هستیم</div>
                </div>
                <div class="fullReviewQuestionDiv">
                    <div class="questionFace">ایا از غذا و رفتار کارکنان رستوران راضی بودید؟</div>
                    <div class="questionAnss">
                        <div class="fullReviewStartAns">
                            <span class="starRatingGreen autoCursor"></span>
                            <span class="starRatingGreen autoCursor"></span>
                            <span class="starRatingGreen autoCursor"></span>
                            <span class="starRating autoCursor"></span>
                            <span class="starRating autoCursor"></span>
                        </div>
                        <span>راضی نبودم</span>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
        <div></div>
        <div>
            <div class="replyToCommentMainDiv ansTextAreaReview display-none" style="margin-top: 0px">
               <div class="circleBase type2 newCommentWriterProfilePic">
                       <img src="" style="width: 100%; height: 100%; border-radius: 50%;">
                   </div>
               <div class="inputBox setButtonToBot">
                   <b class="replyCommentTitle">در پاسخ به نظر admin</b>
                   <textarea id="ansForReviews_1"
                             class="inputBoxInput inputBoxInputComment inputTextWithEmoji"
                             rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"
                             onchange="checkFullSubmit(this)"></textarea>
                   <button class="btn btn-primary submitAnsInReview" onclick="sendAnsOfReviews(1,1)" style="height: fit-content"> ارسال</button>
               </div>
            </div>
        </div>
    </div>
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
        $('#fullReviewModal').css('display', 'none');
    }

    function seeFullModeReview(_id){

    }

    function showFullReviewQuestions(_element){
        $(_element).parent().next().toggleClass('hidden');
        $(_element).find('.downArrowIcon').toggleClass('upArrowIcon');
    }

</script>