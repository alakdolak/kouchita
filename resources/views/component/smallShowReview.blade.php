
<div id="reviewSmallSection">
    <div id="smallReviewHtml_##id##" class="smallReviewMainDivShown float-right position-relative">
        <div class="commentWriterDetailsShow">
            <div class="circleBase type2 commentWriterPicShow">
                <img src="##userPic##" alt="##userName##" style="width: 100%; height: 100%; border-radius: 50%;">
            </div>
            <div class="commentWriterExperienceDetails" style="width: 100%">
                <div style="display: flex; align-items: center">
                    <a href="##userPageUrl##" target="_blank" class="userProfileName" style="font-weight: bold">##userName##</a>
                    <span class="label label-success smallReviewIsConfirm" style="display: ##isConfrim##">{{__('در انتظار تایید')}}</span>
                </div>
                <div style="font-size: 10px">{{__('در')}}
                    <a href="##placeUrl##" target="_blank">
                        <span class="commentWriterExperiencePlace">##where##</span>
                    </a>
                </div>
                <div class="userAssignedSmall" style="font-size: 11px">##userAssigned##</div>
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
                <div class="smallReviewShowMore" onclick="getSingleFullReview(##id##)">
                    مشاهده
                </div>
                <div class="reviewLikeNumber_##id## reviewLikeIcon_##id## LikeIconEmpty likedislikeAnsReviews ##likeClass##" onclick="likeReviewInFullReview(##id##, 1, this)">##like##</div>
                <div class="reviewDisLikeNumber_##id## reviewDisLikeIcon_##id## DisLikeIconEmpty likedislikeAnsReviews ##disLikeClass##" onclick="likeReviewInFullReview(##id##, -1, this)">##disLike##</div>
                <div style="font-size: 20px;" onclick="getSingleFullReview(##id##)">
                    <span>##answersCount##</span>
                    <span class="EmptyCommentIcon" style="font-size: 24px"></span>
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

<div id="fullReviewModal" class="modalBlackBack hidden">
    <div id="fullReview" class="fullReviewBody"></div>
</div>


<script>
    var userPic = '{{getUserPic(auth()->check() ? auth()->user()->id : 0)}}';

    let allReviewsCreated = [];
    let smallReviewPlaceHolder = $('#reviewSmallPlaceHolder').html();
    $('#reviewSmallPlaceHolder').remove();

    let reviewSmallSample = $('#reviewSmallSection').html();
    $('#reviewSmallSection').remove();

    function createSmallReviewHtml(item){
        allReviewsCreated.push(item);
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

        let likeClass = '';
        let disLikeClass = '';
        if(item.userLike){
            if(item.userLike.like == 1)
                likeClass = 'coloredFullIcon';
            else if(item.userLike.like == -1)
                disLikeClass = 'coloredFullIcon';
        }

        t = '##likeClass##';
        re = new RegExp(t, "g");
        text = text.replace(re, likeClass);

        t = '##disLikeClass##';
        re = new RegExp(t, "g");
        text = text.replace(re, disLikeClass);

        var assignedUser = '';
        if(item["assigned"].length != 0) {
            assignedUser += '<div>با\n';
            for(j = 0; j < item["assigned"].length; j++) {
                if(item["assigned"][j]["name"])
                    assignedUser += '<a href="{{url("profile/index")}}/' + item["assigned"][j]["name"] + '" target="_blank" style="color: #0076a3">' + item["assigned"][j]["name"] + '</a>،\n';
            }
            assignedUser += '</div>\n';
        }
        t = '##userAssigned##';
        re = new RegExp(t, "g");
        text = text.replace(re, assignedUser);

        return text;
    }

    function setSmallReviewPlaceHolder(_id){
        $('#' + _id).append(smallReviewPlaceHolder);
    }

    function showSmallReviewPics(_id){
        var selectReview = 0;
        var reviewPicForAlbum = [];
        for(i = 0; i < allReviewsCreated.length; i++){
            if(allReviewsCreated[i]['id'] == _id){
                selectReview = allReviewsCreated[i];
                break;
            }
        }

        if(selectReview != 0){
            revPic = selectReview['pics'];
            for(var i = 0; i < revPic.length; i++){
                reviewPicForAlbum[i] = {
                    'id' : 'review_' + revPic[i]['id'],
                    'sidePic' : revPic[i]['picUrl'],
                    'mainPic' : revPic[i]['picUrl'],
                    'video' : revPic[i]['videoUrl'],
                    'userPic' : selectReview['userPic'],
                    'userName' : selectReview['userName'],
                    'uploadTime' : selectReview['timeAgo'],
                    'where' : selectReview['where'],
                    'whereUrl' : selectReview['placeUrl'],
                    'showInfo' : false,
                }
            }
            createPhotoModal('عکس های پست', reviewPicForAlbum);// in general.photoAlbumModal.blade.php
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

    var showReviewAnsInOneSee = 4; // this number mean show ans in first time and not click on "showAllReviewCommentsFullReview"
    var deletedReview = 0;
    var globalConfirmText = '<span class="label label-success smallReviewIsConfirm">{{__('در انتظار تایید')}}</span>';
    var showFullReview = null;
    var showFullReviewKind = null;

    function getSingleFullReview(_id){
        $.ajax({
            type: 'post',
            url: '{{route("getSingleReview")}}',
            data: {
                _token: '{{csrf_token()}}',
                reviewId: _id
            },
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok'){
                    showFullReview = response.result;
                    showFullReviews({
                        review: showFullReview,
                        kind: 'modal'
                    });
                }
            }
        })
    }

    function showFullReviews(_input){
        let _reviews = _input.review;
        let _kind = _input.kind;
        let _sectionId = _input.sectionId;
        let _sendAnsCallBack = _input.sendAnsCallBack;

        // _kind = 'modal' open in modal
        // _kind = 'export' return the ui generated
        // _kind = 'append' append to _sectionId

        _reviews['showKind'] = _kind;
        _reviews['showSectionId'] = _sectionId;
        _reviews['sendAnsCallBack'] = _sendAnsCallBack  ;

        var text = '';
        var kindPlaceId = _reviews['kindPlaceId'];
        var hasConfirmed = '';
        if(_reviews['confirm'] == 0)
            hasConfirmed = globalConfirmText;

        text += '<div id="showReview_' + _reviews["id"] + '" class="mainFullReviewDiv">\n'+
                '   <div class="moreOptionFullReview" onclick="showFullReviewOptions(this)">\n' +
                '       <span class="threeDotIconVertical"></span>\n' +
                '   </div>\n' +
                '   <div class="moreOptionFullReviewDetails hidden">\n' +
                '       <span onclick="showReportPrompt(' + _reviews["id"] + ', ' + kindPlaceId + ')">{{__("گزارش پست")}}</span>\n' +
                '       <a target="_blank" href="' + _reviews["userPageUrl"] + '"  >{{__("مشاهده صفحه")}} ' + _reviews["userName"] + '</a>\n' +
                '       <a href="{{route('policies')}}" target="_blank">صفحه قوانین و مقررات</a>\n';
        @if(auth()->check())
        if(_reviews.yourReview) {
            text += '<span>آرشیو پست</span>\n' +
                    '<span onclick="deleteReviewByUserInReviews(' + _reviews["id"] + ')" style="color: red"> {{__('حذف پست')}}</span>\n';
        }
        @endif

        text += '</div>\n'+
                '<div class="commentWriterDetailsShow">\n' +
                '   <div class="circleBase commentWriterPicShow">' +
                '       <img src="' + _reviews["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">' +
                '   </div>\n' +
                '   <div class="commentWriterExperienceDetails">\n' +
                '       <a href="{{url('profile/index')}}/' + _reviews["userName"] + '" class="userProfileName userProfileNameFullReview" target="_blank" style="font-weight:bold">' + _reviews["userName"] + '</a>\n' +
                '       <div class="fullReviewPlaceAndTime"> \n' +
                '           <div class="display-inline-block">در\n' +
                '               <a href="' + _reviews["placeUrl"] + '" class="commentWriterExperiencePlace">' + _reviews["where"] + '</a>\n'+
                                hasConfirmed +
                '            </div>\n';

        if(_reviews["assigned"].length != 0) {
            text += '<div>با\n';
            for(j = 0; j < _reviews["assigned"].length; j++) {
                if(_reviews["assigned"][j]["name"])
                    text += '<a href="{{url("profile/index")}}/' + _reviews["assigned"][j]["name"] + '" target="_blank" style="color: #0076a3">' + _reviews["assigned"][j]["name"] + '</a>،\n';
            }
            text += '</div>\n';
        }

        text += '<div>' + _reviews["timeAgo"] + '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="commentContentsShow">' +
                '   <div class="fullReviewText">' + _reviews["text"] + '</div>\n' +
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
            let ttt =  '   <div class="topMainReviewPic" onclick="showSmallReviewPics(' + _reviews["id"] + ')">' +
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
            text +='<div class="commentRatingsDetailsBtn" onclick="showRatingDetailsInFullReview(this)">مشاهده جزئیات امتیازدهی\n' +
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

        if(_reviews['userLike'] != null && _reviews['userLike']['like'] == 1)
            likeClass = 'coloredFullIcon';
        else if(_reviews['userLike'] != null && _reviews['userLike']['like'] == -1)
            disLikeClass = 'coloredFullIcon';


        text += '<div class="commentFeedbackChoices">\n' +
                '   <div class="postsActionsChoices col-xs-6" style="display: flex; justify-content: flex-start;">\n' +
                '       <div class="reviewLikeIcon_' + _reviews["id"] + ' cursor-pointer LikeIconEmpty likedislikeAnsReviews ' + likeClass + '" onclick="likeReviewInFullReview(' + _reviews["id"] + ', 1, this);" style="font-size: 15px; direction: rtl; margin-left: 15px;">' +
                '           <span class="reviewLikeNumber_' + _reviews["id"] + '">' +
                                _reviews["like"] +
                '           </span>' +
                '       </div>\n' +
                '       <div class="reviewDisLikeIcon_' + _reviews["id"] + ' cursor-pointer DisLikeIconEmpty likedislikeAnsReviews ' + disLikeClass + '" onclick="likeReviewInFullReview(' + _reviews["id"] + ', 0, this);" style="font-size: 15px; direction: rtl; margin-left: 15px;">' +
                '           <span class="reviewDisLikeNumber_' + _reviews["id"] + '">' +
                                _reviews["disLike"] +
                '           </span>' +
                '       </div>\n' +
                '       <div class="postCommentChoice" onclick="showCommentToReviewFullReview(this)" style="margin-left: 15px;">\n' +
                '           <span>' + _reviews["answersCount"] + '</span>' +
                '           <span class="showCommentsIconFeedback firstIcon"></span>\n' +
                '           <span class="showCommentsClickedIconFeedback secondIcon" style="display: none"></span>\n' +
                '       </div>\n' +
                '   </div>\n' +
                '   <div class="postsActionsChoices col-xs-6" style="display: flex; justify-content: flex-end;">\n' +
                '       <div class="postShareChoice display-inline-block" onclick="SharePostsBtn(this)" style="direction: ltr">\n' +
                '           <span class="commentsShareIconFeedback firstIcon"></span>\n' +
                '           <span class="commentsShareClickedIconFeedback secondIcon" style="display: none"></span>\n' +
                '       </div>\n' +
                '       <div style="margin-right: 20px; font-size: 20px;">' +
                '           <span class="BookMarkIconEmpty"></span>' +
                '       </div>' +
                '   </div>\n' +
                '</div>\n' +
                '<div id="sectionOfAnsToReview_' + _reviews["id"] + '" class="commentsMainBox hidden">\n';

        var checkAllReviews = true;

        for(j = 0; j < _reviews["answers"].length; j++){
            let answers = _reviews["answers"][j];
            let seeAnses = '';
            let hasLiked = '';
            let hasDisLiked = '';
            let textInConfirm = '';

            if(answers["confirm"] == 0 )
                textInConfirm = globalConfirmText;

            if(answers["userLike"]) {
                if (answers["userLike"]["like"] == 1)
                    hasLiked = 'coloredFullIcon';
                else if (answers["userLike"]["like"] == -1)
                    hasDisLiked = 'coloredFullIcon';
            }

            if(j > showReviewAnsInOneSee-1 && checkAllReviews){
                text += '<div id="allReviews_' + _reviews["id"] + '" style=" width: 100%; display: none">';
                checkAllReviews = false;
            }
            if(answers["answersCount"] > 0) {
                seeAnses += '<div class="fullReviewSeeAnses" onclick="showAnsToCommentsFullReview(' + answers["id"] + ', this)">' +
                            '   <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue" style="margin-left: 20px">' + answers["answersCount"] + '</span>' +
                            '   <span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                            '</div>\n';
            }

            text += '<div  id="ansOfReview_' + answers["id"] + '" style="margin-bottom: 15px"> ' +
                    '<div class="eachCommentMainBox" style="margin-bottom: 0px">\n' +
                    '   <div class="circleBase type2 commentsWriterProfilePic">' +
                    '       <img src="' + answers["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '   </div>\n' +
                    '   <div class="commentsContentMainBox">\n' +
                    '       <b class="userProfileName userProfileNameFullReview">' +
                    '           <a href="{{url("profile/index")}}/ ' + _reviews["userName"] +'" target="_blank" style="font-weight:bold">' +
                                    answers["userName"] +
                    '           </a>' +
                                textInConfirm +
                    '          <span class="ansCommentTimeAgo">' + answers["timeAgo"] + '</span>\n' +
                    '       </b>\n' +
                    '       <p class="fullReviewAnsText">' + answers["text"] + '</p>\n'+
                    '    </div>\n' +
                    '</div>\n' +
                    '<div class="fullReviewLikeAnsSeeAllSection">\n' +
                    '   <div style="display: inline-flex">\n' +
                    '       <span class="reviewLikeNumber_' + answers["id"] + ' reviewLikeIcon_' + answers["id"] + ' LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeReviewInFullReview(' + answers["id"] + ', 1, this)">' + answers["like"] + '</span>\n' +
                    '       <span class="reviewDisLikeNumber_' + answers["id"] + ' reviewDisLikeIcon_' + answers["id"] + ' DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + ' " onclick="likeReviewInFullReview(' + answers["id"] + ', 0, this)">' + answers["disLike"] + '</span>\n' +
                    '       <span class="replayBtn replayReview" onclick="openReplayToReviewCommentFullReview(' + answers["id"] + ')">{{__("پاسخ دهید")}}</span>\n' +
                    '   </div>\n'+
                        seeAnses +
                    '</div>' +
                    '<div class="replyToCommentMainDiv ansTextAreaReview hidden" style="margin-top: 5px">\n' +
                    '   <div class="circleBase newCommentWriterProfilePic">' +
                    '       <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '   </div>\n' +
                    '   <div class="inputBox setButtonToBot">\n' +
                    '       <b class="replyCommentTitle">در پاسخ به نظر ' + answers["userName"] + '</b>\n' +
                    '       <textarea id="ansForReviews_' + answers["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji"  rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmitFullReview(this)"></textarea>\n' +
                    '       <button class="btn submitAnsInReview" onclick="sendAnsOfReviewsFullReview(' + answers["id"] + ',1)" style="height: fit-content"> ارسال</button>\n' +
                    '   </div>\n' +
                    '</div>\n'+
                    '</div>\n';

            text += '<div class="borderInMobile hidden ansComment_' + answers["id"] + '" style="margin-top: 0px">';
            text += createAnsHtmlToCommentFullReview(answers["answers"], answers["userName"]);
            text += '</div>';

            if(j == _reviews["answers"].length && !checkAllReviews)
                text += '</div>';
        }

        text += '</div>';

        if(showReviewAnsInOneSee < _reviews["answers"].length) {
            let remainnn = _reviews["answers"].length - showReviewAnsInOneSee;
            text += '<div class="dark-blue mg-bt-10">\n' +
                    '   <span class="cursor-pointer" onclick="showAllReviewCommentsFullReview(' + _reviews["id"] + ', ' + remainnn + ', this)" style="font-size: 13px;">{{__("مشاهده")}} ' + remainnn + ' {{__("نظر باقیمانده")}}</span>\n' +
                    '</div>\n';
        }
        text += '</div>';

        // new ans
        text += '<div class="newCommentPlaceMainDiv">\n' +
            '   <div class="circleBase type2 newCommentWriterProfilePic">' +
            '       <img src="' + userPic + '" style="">\n' +
            '   </div>\n' +
            '   <div class="inputBox setButtonToBot">\n' +
            '       <textarea id="ansForReviews_' + _reviews["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji" rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmitFullReview(this)" style="padding-bottom: 10px"></textarea>\n' +
            '       <button class="btn submitAnsInReview" onclick="sendAnsOfReviewsFullReview(' + _reviews["id"] + ', 0)" > ارسال</button>\n' +
            '   </div>\n' +
            '<div>'+
            '</div>\n' +
            '</div>\n' +
            '</div>' +
            '</div>' +
            '</div>\n';

        if(_kind == 'modal') {
            $('#fullReviewModal').removeClass('hidden');
            $('#fullReview').html(text);
            $('#fullReview').append('<div class="closeFullReview iconClose" onclick="closeFullReview()"></div>');
        }
        else if(_kind == 'append') {
            $('#' + _sectionId).append(text);
            allReviewsCreated.push(_reviews);
        }
        else if(_kind == 'export') {
            allReviewsCreated.push(_reviews);
            return text;
        }

        setTimeout(function(){
            resizeFitImg('resizeImgClass');
            autosize($('[id^="ansForReviews_"]'));
        }, 100);
    }

    function openReplayToReviewCommentFullReview(_id){
        if($('#ansOfReview_' + _id).find('.replyToCommentMainDiv').hasClass("display-inline-blockImp"))
            $('.replyToCommentMainDiv').removeClass("display-inline-blockImp");
        else{
            $('.replyToCommentMainDiv').removeClass("display-inline-blockImp");
            $('#ansOfReview_' + _id).find('.replyToCommentMainDiv').toggleClass("display-inline-blockImp");
        }
    }

    function likeReviewInFullReview(_logId, _like, _element){

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
                    $('.reviewLikeNumber_'+_logId).text(like);
                    $('.reviewDisLikeNumber_'+_logId).text(dislike);

                    $('.reviewLikeIcon_'+_logId).removeClass('coloredFullIcon');
                    $('.reviewDisLikeIcon_'+_logId).removeClass('coloredFullIcon');
                    if(_like == 1)
                        $('.reviewLikeIcon_'+_logId).addClass('coloredFullIcon');
                    else
                        $('.reviewDisLikeIcon_'+_logId).addClass('coloredFullIcon');


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

    function sendAnsOfReviewsFullReview(_logId, _ans){

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
                    if(response == 'ok') {
                        getSingleFullReview(showFullReview.id);
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

    function showAllReviewCommentsFullReview(_id, _remain, _element){
        let ter;
        $('#allReviews_' + _id).toggle();
        if($('#allReviews_' + _id).css('display') == 'none')
            ter = 'مشاهده ' + _remain + ' نظر باقی مانده ';
        else
            ter = 'بستن ' + _remain + ' نظر ';

        $(_element).text(ter);
    }

    function createAnsHtmlToCommentFullReview(comment, repTo){
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

            text += '<div id="ansOfReview_' + comment[k]["id"] + '" style="margin-bottom: 15px">' +
                '<div class="eachCommentMainBox"  style="margin-bottom: 0px">\n' +
                '   <div class="circleBase type2 commentsWriterProfilePic">' +
                '       <img src="' + comment[k]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '   </div>\n' +
                '   <div class="commentsContentMainBox">\n' +
                '       <div class="userProfileName userProfileNameFullReview">' +
                '           <a href="{{url("profile/index")}}/' + comment[k]["userName"] + '" target="_blank" class="userProfileName userProfileNameFullReview float-right" target="_blank" style="font-weight:bold">' + comment[k]["userName"] + '</a>\n' +
                '           <b class="commentReplyDesc display-inline-block">در پاسخ به ' + repTo + '</b>\n' +
                textInConfirm +
                '       </div>\n' +
                '       <div class="fullReviewAnsText">' + comment[k]["text"] + '</div>\n' +
                '   </div>' +
                '</div>\n' +
                '<div class="fullReviewLikeAnsSeeAllSection">\n' +
                '   <div style="display: inline-flex;">\n' +
                '       <span class="reviewLikeNumber_' + comment[k]["id"] + ' reviewLikeIcon_' + comment[k]["id"] + ' LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeReviewInFullReview(' + comment[k]["id"] + ', 1, this)">' + comment[k]["like"] + '</span>\n' +
                '       <span class="reviewDisLikeNumber_' + comment[k]["id"] + ' reviewDisLikeIcon_' + comment[k]["id"] + ' DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + '" onclick="likeReviewInFullReview(' + comment[k]["id"] + ', 0, this)">' + comment[k]["disLike"] + '</span>\n' +
                '       <span class="replayBtn replayReview" onclick="openReplayToReviewCommentFullReview(' + comment[k]["id"] + ')">{{__('پاسخ دهید')}}</span>\n' +
                '   </div>\n';

            if(comment[k]["answersCount"] > 0) {
                text += '<div class="fullReviewSeeAnses" onclick="showAnsToCommentsFullReview(' + comment[k]["id"] + ', this)">' +
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
                '       <textarea  id="ansForReviews_' + comment[k]["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji" rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmitFullReview(this)"></textarea>\n' +
                '       <button class="btn submitAnsInReview" onclick="sendAnsOfReviewsFullReview(' + comment[k]["id"] + ', 1)" > {{__("ارسال")}}</button>\n' +
                '   </div>\n' +
                '</div>\n' +
                '</div>\n';

            text += '<div class=" hidden ansComment_' +  comment[k]["id"] + '" style="width: 100%">';
            if(comment[k]["answersCount"] > 0)
                text += createAnsHtmlToCommentFullReview(comment[k]["answers"], comment[k]["userName"]);
            text += '</div>';
        }

        return text;
    }

    function checkFullSubmitFullReview(_element){
        let text = $(_element).val();
        if(text.trim().length > 0)
            $(_element).next().removeAttr('disabled');
        else
            $(_element).next().attr('disabled', 'disabled');
    }

    function showAnsToCommentsFullReview(_id, element){
        $('.ansComment_' + _id).toggleClass("display-inline-blockImp");
        textElement = $(element).find('.seeAllText');
        textElement.text(textElement.text() == 'مشاهده پاسخ‌ها' ? 'بستن پاسخ‌ها' : 'مشاهده پاسخ‌ها');
    }

    function deleteReviewByUserInReviews(_reviewId){
        deletedReview = _reviewId;
        text = 'آیا از حذف نقد خود اطمینان دارید؟ در صورت حذف عکس ها و فیلم ها افزوده شده پاک می شوند و قابل بازیابی نمی باشد.';
        openWarning(text, doDeleteReviewByUserInReviews); // in general.alert.blade.php
    }

    function doDeleteReviewByUserInReviews(){
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
                    closeFullReview();
                    $('#showReview_' + deletedReview).remove();
                    $('#smallReviewHtml_' + deletedReview).remove();
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

    function showRatingDetailsInFullReview(element) {
        if ($(element).parent().next().hasClass('commentRatingsDetailsBox')) {
            $(element).parent().next().toggleClass('hidden');
            $(element).children().children().toggleClass('glyphicon-triangle-bottom');
            $(element).children().children().toggleClass('glyphicon-triangle-top')
            $(element).parent().toggleClass('mg-bt-10');
        }
    }

    function showCommentToReviewFullReview(element) {
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