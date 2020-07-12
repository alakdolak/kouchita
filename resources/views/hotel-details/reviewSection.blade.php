<div class="col-md-7 col-xs-12 pd-0 float-right postsMainDivInRegularMode">

    <div id="showReviewsMain"></div>

    <div id="reviewsPagination" class="col-xs-12 postsMainDivFooter position-relative">

        <div class="col-xs-12 postsMainDivFooter position-relative">
            <div class="col-xs-5 font-size-13 line-height-2">
                نمایش
                <span id="showReviewPerPage"></span>
                پست در هر صفحه
            </div>
            <a class="col-xs-3 showPostsNumsFilterLink" href="#taplc_global_nav_links_0">
                <div class="showPostsNumsFilter">نمایش تمامی پست‌ها</div>
            </a>
            <div class="col-xs-4 font-size-13 line-height-2 text-align-right" style="display: flex; direction: rtl;">
                صفحه
                <div id="reviewPagination" style="margin-right: 10px;"></div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="deleteReviewsModal" role="dialog" style="direction: rtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{__('پاک کردن نقد')}}</h4>
            </div>
            <div class="modal-body">
                <p>آیا از حذف نقد خود اطمینان دارید؟ در صورت حذف عکس ها و فیلم ها افزوده شده پاک می شوند و قابل بازیابی نمی باشد.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('لغو')}}</button>
                <button type="button" class="btn btn-danger" onclick="doDeleteReviewByUser()">{{__('بله، حذف شود')}}</button>
            </div>
        </div>
    </div>
</div>

<script>
    var loadShowReview = false;
    var reviewPerPage = 0;
    var reviewPage = 1;
    var showReviewAnsInOneSee = 4; // this number mean show ans in first time and not click on "showAllReviews"
    // var reviewPerPageNum = [3, 5, 10];
    var reviewPerPageNum = [20, 30, 40];
    var firstTimeFilterShow = 1;

    function loadReviews(){
        $.ajax({
            type: 'post',
            url: '{{route('getReviews')}}',
            data:{
                'placeId' : placeId,
                'kindPlaceId' : kindPlaceId,
                'count' : reviewPerPageNum[reviewPerPage],
                'num' : reviewPage,
                'filters' : reviewFilters
            },
            success: function(response){
                if(response == 'nok1') {
                    if(firstTimeFilterShow == 1){
                        document.getElementById('postFilters').style.display = 'none';
                        document.getElementById('reviewsPagination').style.display = 'none';
                        document.getElementById('advertiseDiv').style.display = 'none';
                    }
                    document.getElementById('showReviewsMain').innerHTML = '';

                    console.log('نقدی ثبت نشده است');
                    $('#pcPostButton').attr('href', '#editReviewPictures');
                    $('#pcPostButton').attr('onclick', 'newPostModal()');

                    $('#openPostPhone').attr('onclick', 'newPostModal()');
                }
                else{
                    response = JSON.parse(response);
                    allReviews = response[0];
                    reviewsCount = response[1];

                    if(reviewsCount < 3 && firstTimeFilterShow == 1)
                        document.getElementById('postFilters').style.display = 'none';

                    firstTimeFilterShow = 0;

                    createReviewPagination(reviewsCount);
                    showReviews(allReviews);
                }
            }
        })
    }
    loadReviews();

    function showReviews(reviews){

        var text = '';

        for(let i = 0; i < reviews.length; i++){
            text += '<div id="showReview_' + reviews[i]["id"] + '" class="col-xs-12 postMainDivShown position-relative">\n';

            if(reviews[i]['confirm'] == 1){
                text += '<div class="commentActions" onclick="showAnswersActionBox(this)">\n' +
                    '<span class="commentActionsIcon"></span>\n' +
                    '</div>\n' +
                    '<div class="questionsActionsMoreDetails display-none">\n' +
                    '<span onclick="showReportPrompt(' + reviews[i]["id"] + ', ' + kindPlaceId + ')">گزارش پست</span>\n' +
                    '<a target="_blank" href="{{url("otherProfile")}}/' + reviews[i]["user"]["username"] + '"  >مشاهده صفحه ' + reviews[i]["user"]["username"] + '</a>\n' +
                    '<a href="{{route('policies')}}" target="_blank">صفحه قوانین و مقررات</a>\n';

                @if(auth()->check())
                    if(reviews[i].yourReview) {
                        text += '<span>آرشیو پست</span>\n' +
                            '<span onclick="deleteReviewByUser(' + reviews[i]["id"] + ')" style="color: red"> حذف پست</span>\n';
                    }
                @endif
                text +='</div>\n';
            }

            text += '<div class="commentWriterDetailsShow">\n' +
                '<div class="circleBase type2 commentWriterPicShow">' +
                '<img src="' + reviews[i]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">' +
                '</div>\n' +
                '<div class="commentWriterExperienceDetails">\n' +
                '<b class="userProfileName">' + reviews[i]["usernameReviewWriter"] + '</b>\n' +
                '<div class="postPlaceAndTime"> \n' +
                '<div class="display-inline-block">در\n' +
                '<span class="commentWriterExperiencePlace">' + reviews[i]["place"]["name"] + '، شهر ' + reviews[i]["city"]["name"] + '، استان ' + reviews[i]["state"]["name"] + '</span>\n';

            if(reviews[i]['confirm'] == 0)
                text += '<span class="label label-success">{{__('در انتظار تایید')}}</span>';

            text +='</div>\n';

            if(reviews[i]["assigned"].length != 0) {
                text += '<div>با\n';
                for(j = 0; j < reviews[i]["assigned"].length; j++) {
                    if(reviews[i]["assigned"][j]["name"])
                        text += '<span class="commentWriterExperienceParticipation">' + reviews[i]["assigned"][j]["name"] + '</span>،\n';
                }
                text += '</div>\n';
            }

            text += '<div>' + reviews[i]["timeAgo"] + '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="commentContentsShow">' +
                '<div style="font-size: 18px; margin: 10px 0; white-space: pre-line">' + reviews[i]["text"] + '</div>\n' +
                '</div>\n' +
                '<div class="commentPhotosShow">\n';

            let reviewPicsCount = reviews[i]["pics"].length;

            if(reviewPicsCount > 5) {
                text += '<div class="commentPhotosMainDiv quintupletPhotoDiv">\n' +
                    '<div class="photosCol secondCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '<div class="photosCol firstCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img src="' + reviews[i]["pics"][3]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">\n' +
                    '<img src="' + reviews[i]["pics"][4]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '<div class="morePhotoLinkPosts">\n' +
                    'به علاوه\n' +
                    '<span>' + (reviewPicsCount - 4) + '</span>\n' +
                    'عکس و ویدیو دیگر\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';
            }
            else if(reviewPicsCount == 5){
                text += '<div class="commentPhotosMainDiv quintupletPhotoDiv">\n' +
                    '<div class="photosCol secondCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_0"  src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img  id="reviewImage_' + reviews[i]["id"] + '_1" src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '<div class="photosCol firstCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_2"  src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_3"  src="' + reviews[i]["pics"][3]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_4" src="' + reviews[i]["pics"][4]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';
            }
            else if(reviewPicsCount == 4){
                text += '<div class="commentPhotosMainDiv quadruplePhotoDiv">\n' +
                    '<div class="photosCol secondCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_0" src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_1" src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '<div class="photosCol firstCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_2" src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_3" src="' + reviews[i]["pics"][3]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';
            }
            else if(reviewPicsCount == 3){
                text += '<div class="commentPhotosMainDiv tripletPhotoDiv">\n' +
                    '<div class="photosCol secondCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_0" src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '<div class="photosCol firstCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_1" src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_2" src="' + reviews[i]["pics"][2]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';
            }
            else if(reviewPicsCount == 2){
                text += '<div class="commentPhotosMainDiv doublePhotoDiv">\n' +
                    '<div class="photosCol secondCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_0" src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '<div class="photosCol firstCol col-xs-6">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_1" src="' + reviews[i]["pics"][1]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';
            }
            else if(reviewPicsCount == 1){
                text += '<div class="commentPhotosMainDiv doublePhotoDiv">\n' +
                    '<div class="photosCol firstCol col-xs-12">\n' +
                    '<div class="topMainReviewPic" onclick="showReviewPics(' + i + ')">' +
                    '<img id="reviewImage_' + reviews[i]["id"] + '_0" src="' + reviews[i]["pics"][0]["url"] + '" class="mainReviewPic resizeImgClass" onload="fitThisImg(this)">\n'+
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';
            }

            text +='<div class="quantityOfLikes">\n' +
                '<span id="reviewLikeNum' + reviews[i]["id"] + '">' + reviews[i]["like"] + '</span>\n' +
                'نفر دوست داشتند،\n' +
                '<span id="reviewDisLikeNum' + reviews[i]["id"] + '">' + reviews[i]["dislike"] + '</span>\n' +
                'نفر دوست نداشتند و\n' +
                '<span>' + reviews[i]["ansNum"] + '</span>\n' +
                'نفر نظر دادند.\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="commentRatingsDetailsShow">\n' +
                '<div class="display-inline-block full-width">\n' +
                '<div class="commentRatingHeader">\n';

            text += 'بازدید ';

            if(reviews[i]["assigned"].length != 0)
                text +='<span> با دوستان</span>\n';

            text +='در فصل\n' +
                '<span>بهار</span>\n' +
                'و از مبدأ\n' +
                '<span>تهران</span>\n' +
                'انجام شده است\n' +
                '</div>\n';

            if(reviews[i]["ans"].length != 0) {

                text +='<div class="commentRatingsDetailsBtn" onclick="showRatingDetails(this)">مشاهده جزئیات امتیازدهی\n' +
                    '<div class="commentRatingsDetailsBtnIcon">\n' +
                    '<i class="glyphicon glyphicon-triangle-bottom"></i>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';

                text +='<div class="commentRatingsDetailsBox display-none">\n';

                //text ans
                for(j = 0; j < reviews[i]["ans"].length; j++){
                    if(reviews[i]["ans"][j]['ansType'] == 'text'){
                        text += '<div class="display-inline-block full-width">\n';
                        text +='<b class="col-xs-6 font-size-15 line-height-203 float-right" style="float: right">' + reviews[i]["ans"][j]["description"] + '</b>\n';
                        text +='<b class="col-xs-6 font-size-15 line-height-203 float-right pd-lt-0">' + reviews[i]["ans"][j]["ans"] + '</b>\n';
                        text += '</div>\n';
                    }
                }

                // multi ans
                for(j = 0; j < reviews[i]["ans"].length; j++){
                    if(reviews[i]["ans"][j]['ansType'] == 'multi'){
                        text += '<div class="display-inline-block full-width">\n';
                        text +='<b class="col-xs-6 font-size-15 line-height-203 float-right" style="float: right">' + reviews[i]["ans"][j]["description"] + '</b>\n';
                        text +='<b class="col-xs-6 font-size-15 line-height-203 float-right pd-lt-0">' + reviews[i]["ans"][j]["ans"] + '</b>\n';
                        text += '</div>\n';
                    }

                }

                // rate ans
                for(j = 0; j < reviews[i]["ans"].length; j++){
                    if(reviews[i]["ans"][j]['ansType'] == 'rate'){
                        let ansTexttt = '';
                        if(reviews[i]["ans"][j]['ans'] == 5)
                            ansTexttt = 'عالی بود';
                        else if(reviews[i]["ans"][j]['ans'] == 4)
                            ansTexttt = 'خوب بود';
                        else if(reviews[i]["ans"][j]['ans'] == 3)
                            ansTexttt = 'معمولی بود';
                        else if(reviews[i]["ans"][j]['ans'] == 2)
                            ansTexttt = 'بد نبود';
                        else if(reviews[i]["ans"][j]['ans'] == 1)
                            ansTexttt = 'اصلا راضی نبودم';

                        text += '<div class="display-inline-block full-width">\n' +
                                '<b class="col-xs-6 font-size-14 line-height-203" style="float: right">' + reviews[i]["ans"][j]["description"] + '</b>\n' +
                                '<div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-3 text-align-left">\n' +
                                '<div class="ui_star_rating stars_10 font-size-25">\n';

                        for(let starN = 0; starN < 6; starN++){
                            if(starN <= reviews[i]["ans"][j]['ans'])
                                text += '<span class="starRatingGreen autoCursor"></span>\n';
                            else
                                text += '<span class="starRating autoCursor"></span>\n';
                        }

                        text += '</div>\n' +
                                '</div>\n' +
                                '<b class="col-xs-3 font-size-13 line-height-203 float-right pd-lt-0">' + ansTexttt + '</b>\n' +
                                '</div>\n';
                    }
                }

                text += '</div>\n';
            }

            var likeClass = '';
            var disLikeClass = '';
            var likeIconClass = ' commentsLikeIconFeedback';
            var disLikeIconClass = ' commentsDislikeIconFeedback';

            if(reviews[i]['userLike'] != null && reviews[i]['userLike']['like'] == 1){
                likeClass = 'coloredFullIcon';
                likeIconClass = ' commentsLikeClickedIconFeedback';
            }
            else if(reviews[i]['userLike'] != null && reviews[i]['userLike']['like'] == -1){
                disLikeClass = 'coloredFullIcon';
                disLikeIconClass = ' commentsDislikeClickedIconFeedback';
            }


            text +='                                <div class="commentFeedbackChoices">\n' +
                '                                    <div class="postsActionsChoices col-xs-6" style="display: flex; justify-content: space-evenly;">\n' +
                '                                        <div class="cursor-pointer LikeIconEmpty likedislikeAnsReviews ' + likeClass + '" onclick="likeReview(' + reviews[i]["id"] + ', 1, this);" style="font-size: 15px; direction: rtl">دوست داشتم</div>\n' +
                '                                        <div class="cursor-pointer DisLikeIconEmpty likedislikeAnsReviews ' + disLikeClass + '" onclick="likeReview(' + reviews[i]["id"] + ', 0, this);" style="font-size: 15px; direction: rtl">دوست نداشتم</div>\n' +
                '                                    </div>\n' +
                '                                    <div class="postsActionsChoices col-xs-3">\n' +
                '                                        <div class="postCommentChoice display-inline-block" onclick="showPostsComments(this)">\n' +
                '                                            <span class="showCommentsIconFeedback firstIcon"></span>\n' +
                '                                            <span class="showCommentsClickedIconFeedback display-none secondIcon"></span>\n' +
                '                                            <span class="mg-rt-20 cursor-pointer">مشاهده نظرها</span>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                    <div class="postsActionsChoices col-xs-3">\n' +
                '                                        <div class="postShareChoice display-inline-block" onclick="SharePostsBtn(this)">\n' +
                '                                            <span class="commentsShareIconFeedback firstIcon"></span>\n' +
                '                                            <span class="commentsShareClickedIconFeedback display-none secondIcon"></span>\n' +
                '                                            <span class="mg-rt-20 cursor-pointer">اشتراک‌گذاری</span>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="commentsMainBox display-none">\n';
            if(showReviewAnsInOneSee < reviews[i]["comment"].length) {
                text += '<div class="dark-blue mg-bt-10">\n' +
                        '<span class="cursor-pointer" onclick="showAllReviews(' + reviews[i]["id"] + ')">مشاهده ' + (reviews[i]["comment"].length - showReviewAnsInOneSee) + ' نظر باقیمانده</span>\n' +
                        '</div>\n';
            }

            // comments
            var checkAllReviews = true;
            for(j = 0; j < reviews[i]["comment"].length; j++){

                let hasLiked = '';
                let hasDisLiked = '';
                let textInConfirm = '';
                if(reviews[i]["comment"][j]["confirm"] == 0 )
                    textInConfirm =  '<span class="label label-success" style="margin-right: 12px; font-size: 9px; font-weight: normal; cursor: default">{{__('در انتظار تایید')}}</span>';

                if(reviews[i]["comment"][j]["like"] == 1)
                    hasLiked = 'coloredFullIcon';
                else if(reviews[i]["comment"][j]["dislike"] == 1)
                    hasDisLiked = 'coloredFullIcon';

                if(j > showReviewAnsInOneSee-1 && checkAllReviews){
                    text += '<div id="allReviews_' + reviews[i]["id"] + '" style=" width: 100%; display: none">';
                    checkAllReviews = false;
                }
                text += '<div id="reviewSection_' + reviews[i]["comment"][j]["id"] + '" class="eachCommentMainBox">\n' +
                        '   <div class="circleBase type2 commentsWriterProfilePic">' +
                        '       <img src="' + reviews[i]["comment"][j]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                        '   </div>\n' +
                        '   <div class="commentsContentMainBox">\n' +
                        '       <b class="userProfileName">' +
                                    reviews[i]["comment"][j]["username"] +
                                    textInConfirm +
                        '          <span class="ansCommentTimeAgo">' + reviews[i]["comment"][j]["timeAgo"] + '</span>\n' +
                        '       </b>\n' +
                        '       <p>' + reviews[i]["comment"][j]["text"] + '</p>\n' +
                        '       <div class="commentsStatisticsBar">\n' +
                        '           <div style="display: inline-flex">\n' +
                        '               <span id="reviewLikeNum' + reviews[i]["comment"][j]["id"] + '" class="LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeReview(' + reviews[i]["comment"][j]["id"] + ', 1, this)">' + reviews[i]["comment"][j]["like"] + '</span>\n' +
                        '               <span id="reviewDisLikeNum' + reviews[i]["comment"][j]["id"] + '" class="DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + ' " onclick="likeReview(' + reviews[i]["comment"][j]["id"] + ', 0, this)">' + reviews[i]["comment"][j]["dislike"] + '</span>\n' +
                        '               <span class="replayBtn" onclick="replayReviewToComments(' + reviews[i]["comment"][j]["id"] + ')">پاسخ دهید</span>\n' +
                        '           </div>\n';

                if(reviews[i]["comment"][j]["ansNum"] > 0) {
                    text += '<div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers2(' + reviews[i]["comment"][j]["id"] + ', this)">' +
                            '   <span class="numberOfCommentsIcon commentsStatisticSpan dark-blue" style="margin-left: 20px">' + reviews[i]["comment"][j]["ansNum"] + '</span>' +
                            '   <span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                            '</div>\n';
                }

                text += '   </div>\n' +
                        '</div>\n' +
                        '<div class="replyToCommentMainDiv ansTextAreaReview display-none">\n' +
                        '   <div class="circleBase type2 newCommentWriterProfilePic">' +
                        '       <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                        '   </div>\n' +
                        '   <div class="inputBox">\n' +
                        '       <b class="replyCommentTitle">در پاسخ به نظر ' + reviews[i]["comment"][j]["username"] + '</b>\n' +
                        '       <textarea id="ansForReviews_' + reviews[i]["comment"][j]["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji"  rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmit(this)"></textarea>\n' +
                        '       <button class="btn btn-primary submitAnsInReview" onclick="sendAnsOfReviews(' + reviews[i]["comment"][j]["id"] + ',1)" > ارسال</button>\n' +
                        '   </div>\n' +
                        '</div>\n' +
                        '</div>\n';

                text += '<div class=" display-none ansComment_' + reviews[i]["comment"][j]["id"] + '" style="width: calc(100% - 50px); margin-right: 50px;">';
                text += createAnsToComment(reviews[i]["comment"][j]["comment"], reviews[i]["comment"][j]["username"], reviews[i]["comment"][j]["id"]);
                text += '</div>';

                if(j == reviews[i]["comment"].length && !checkAllReviews)
                    text += '</div>';
            }

            text += '</div></div>\n';

            // new ans
            text += '<div class="newCommentPlaceMainDiv">\n' +
                    '<div class="circleBase type2 newCommentWriterProfilePic">' +
                    '<img src="' + userPic + '" style="">\n' +
                    '</div>\n' +
                    '<div class="inputBox">\n' +
                    '<textarea id="ansForReviews_' + reviews[i]["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji" rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmit(this)"></textarea>\n' +
                    '<button class="btn btn-primary submitAnsInReview" onclick="sendAnsOfReviews(' + reviews[i]["id"] + ', 0)" > ارسال</button>\n' +
                    '</div>\n' +
                    '<div></div>\n' +
                    '</div>\n' +
                    '</div></div>\n';
        }

        document.getElementById('showReviewsMain').innerHTML = text;

        setTimeout(function(){
            resizeFitImg('resizeImgClass');
            autosize($('[id^="ansForReviews_"]'));
            // $(".inputTextWithEmoji").emojioneArea();
        }, 100);
    }

    function replayReviewToComments(_id){
        $('.replyToCommentMainDiv').removeClass("display-inline-blockImp");
        $('#reviewSection_' + _id).find('.replyToCommentMainDiv').toggleClass("display-inline-blockImp");
    }

    function likeReview(_logId, _like, _element){

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
                    else{
                        console.log(response);
                        showSuccessNotifi('{{__('در ثبت پاسخ مشکلی پیش آمده لطفا دوباره تلاش نمایید.')}}', 'left', 'red');
                    }
                },
                catch(e){
                    console.log(e);
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
                'sidePic' : revPic[i]['url'],
                'mainPic' : revPic[i]['url'],
                'video' : revPic[i]['videoUrl'],
                'userPic' : allReviews[_index]['userPic'],
                'userName' : allReviews[_index]['usernameReviewWriter'],
                'showInfo' : false,
            }
        }

        createPhotoModal('عکس های پست', reviewPicForAlbum);
    }

    function showAllReviews(_id){
        $('#allReviews_' + _id).toggle();
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

    function createAnsToComment(comment, repTo, topId){
        var text = '';

        for(var k = 0; k < comment.length; k++) {

            console.log(comment);
            let hasLiked = '';
            let hasDisLiked = '';
            let textInConfirm = '';
            if(comment[k]["confirm"] == 0)
                textInConfirm =  '<span class="label label-success" style="margin-right: 12px; font-size: 9px; font-weight: normal; cursor: default">{{__('در انتظار تایید')}}</span>';

            if(comment[k]["userLike"]) {
                if (comment[k]["userLike"]["like"] == 1)
                    hasLiked = 'coloredFullIcon';
                else if (comment[k]["userLike"]["like"] == -1)
                    hasDisLiked = 'coloredFullIcon';
            }

            text += '<div id="reviewSection_' + comment[k]["id"] + '" class="eachCommentMainBox">\n' +
                    '<div class="circleBase type2 commentsWriterProfilePic">' +
                    '<img src="' + comment[k]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '</div>\n' +
                    '<div class="commentsContentMainBox">\n' +
                    '<div>' +
                    '<b class="userProfileName float-right">' + comment[k]["username"] + '</b>\n' +
                    '<b class="commentReplyDesc display-inline-block">در پاسخ به ' + repTo + '</b>\n' +
                    textInConfirm +
                    '</div>\n' +
                    '<div class="clear-both"></div>\n' +
                    '<p>' + comment[k]["text"] + '</p>\n' +
                    '<div class="commentsStatisticsBar">\n' +
                    '<div style="display: inline-flex;">\n' +
                    '<span id="reviewLikeNum' + comment[k]["id"] + '" class="LikeIconEmpty likedislikeAnsReviews ' + hasLiked + '" onclick="likeReview(' + comment[k]["id"] + ', 1, this)">' + comment[k]["like"] + '</span>\n' +
                    '<span id="reviewDisLikeNum' + comment[k]["id"] + '" class="DisLikeIconEmpty likedislikeAnsReviews ' + hasDisLiked + '" onclick="likeReview(' + comment[k]["id"] + ', 0, this)">' + comment[k]["dislike"] + '</span>\n' +
                    '<span class="replayBtn" onclick="replayReviewToComments(' + comment[k]["id"] + ')">پاسخ دهید</span>\n' +
                    '</div>\n';

            if(comment[k]["ansNum"] > 0) {
                text += '<div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers2(' + comment[k]["id"] + ', this)">' +
                    '<span class="numberOfCommentsIcon commentsStatisticSpan dark-blue">' + comment[k]["ansNum"] + '</span>' +
                    '<span class="seeAllText">مشاهده پاسخ‌ها</span>' +
                    '</div>\n';
            }

            text += '</div>\n' +
                    '</div>\n' +
                    '<div class="replyToCommentMainDiv display-none">\n' +
                    '<div class="circleBase type2 newCommentWriterProfilePic">' +
                    '<img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '</div>\n' +
                    '<div class="inputBox">\n' +
                    '<b class="replyCommentTitle">در پاسخ به نظر ' + comment[k]["username"] + '</b>\n' +
                    '<textarea  id="ansForReviews_' + comment[k]["id"] + '" class="inputBoxInput inputBoxInputComment inputTextWithEmoji" rows="1" placeholder="شما چه نظری دارید؟" onclick="checkLogin()" onchange="checkFullSubmit(this)"></textarea>\n' +
                    '<button class="btn btn-primary submitAnsInReview" onclick="sendAnsOfReviews(' + comment[k]["id"] + ', 1)" > ارسال</button>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n';

            text += '<div class=" display-none ansComment_' +  comment[k]["id"] + '" style="width: 100%">';
            if(comment[k]["ansNum"] > 0)
                text += createAnsToComment(comment[k]["comment"], comment[k]["username"], comment[k]["id"]);
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

    window.addEventListener('scroll', function() {

        var doc = document.documentElement;
        var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
        var showReviewElement = document.getElementById('mainDivPlacePost');

        if(!loadShowReview) {
            if (top > showReviewElement.offsetTop - 20) {
                loadShowReview = true;
                // loadReviews();
            }
        }
    });

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
                console.log(err);
                closeLoading();
                showSuccessNotifi('در حذف نظر شما مشکلی پیش آمده لطفا دوباره تلاش کنید.', 'left', 'red');
            }
        })
    }

</script>
