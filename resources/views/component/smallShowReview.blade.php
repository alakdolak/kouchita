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
        margin-top: 10px;
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

                <div class="smallReviewShowMore">
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
                <div style="font-size: 20px;">
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

</script>