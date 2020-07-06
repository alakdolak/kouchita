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

<script>
    var loadShowReview = false;
    var reviewPerPage = 0;
    var reviewPage = 1;
    var reviewPerPageNum = [3, 5, 10];
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
            text += '<div id="review_' + reviews[i]["id"] + '" class="col-xs-12 postMainDivShown position-relative">\n';

            if(reviews[i]['confirm'] == 1){
                text += '<div class="commentActions" onclick="showAnswersActionBox(this)">\n' +
                    '<span class="commentActionsIcon"></span>\n' +
                    '</div>\n' +
                    '<div class="questionsActionsMoreDetails display-none">\n' +
                    '<span>گزارش پست</span>\n' +
                    '<span>مشاهده صفحه شازده سینا</span>\n' +
                    '<span>مشاهده تمامی پست‌ها</span>\n' +
                    '<span>صفحه قوانین و مقررات</span>\n' +
                    '</div>\n';
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
                '<div class="commentContentsShow">\n';
            text += '<div style="font-size: 18px; margin: 10px 0; white-space: pre-line">' + reviews[i]["text"] + '</div>\n' +
                '</div>\n';

            text += '<div class="commentPhotosShow">\n';

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
            text +='<div class="commentRatingsDetailsBtn" onclick="showRatingDetails(this)">مشاهده جزئیات امتیازدهی\n' +
                '<div class="commentRatingsDetailsBtnIcon">\n' +
                '<i class="glyphicon glyphicon-triangle-bottom"></i>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n';

            if(reviews[i]["ans"].length != 0) {
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
                        text += '<div class="display-inline-block full-width">\n';
                        text +='<b class="col-xs-4 font-size-15 line-height-203" style="float: right">' + reviews[i]["ans"][j]["description"] + '</b>\n';

                        if(reviews[i]["ans"][j]['ans'] == 5){
                            text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n';
                            text +='                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                                '                                                       <span class="starRatingGreen"></span>\n' +
                                '                                                       <span class="starRatingGreen"></span>\n' +
                                '                                                       <span class="starRatingGreen"></span>\n' +
                                '                                                       <span class="starRatingGreen"></span>\n' +
                                '                                                       <span class="starRatingGreen"></span>\n' +
                                '                                                   </div>\n' +
                                '                                               </div>\n';
                            text +='                                         <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">عالی بود</b>\n';
                        }
                        else if(reviews[i]["ans"][j]['ans'] == 4){
                            text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                                '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n';
                            text +='<b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">خوب بود</b>\n';
                        }
                        else if(reviews[i]["ans"][j]['ans'] == 3){
                            text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                                '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n';
                            text +='                                         <b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">معمولی بود</b>\n';
                        }
                        else if(reviews[i]["ans"][j]['ans'] == 2){
                            text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                                '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n';
                            text +='<b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">بد نبود</b>\n';
                        }
                        else if(reviews[i]["ans"][j]['ans'] == 1){
                            text +='                                            <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-right col-xs-5 text-align-left">\n' +
                                '                                                <div class="ui_star_rating stars_10 font-size-25">\n' +
                                '                                                    <span class="starRatingGreen"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                    <span class="starRating"></span>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n';
                            text +='<b class="col-xs-3 font-size-15 line-height-203 float-right pd-lt-0">اصلا راضی نبودم</b>\n';
                        }

                        text += '</div>\n';
                    }
                }

                text += '</div>\n';
            }

            var likeClass = '';
            var disLikeClass = '';
            var likeIconClass = ' commentsLikeIconFeedback';
            var disLikeIconClass = ' commentsDislikeIconFeedback';

            if(reviews[i]['userLike'] != null && reviews[i]['userLike']['like'] == 1){
                likeClass = 'color-red';
                likeIconClass = ' commentsLikeClickedIconFeedback';
            }
            else if(reviews[i]['userLike'] != null && reviews[i]['userLike']['like'] == -1){
                disLikeClass = 'color-darkred';
                disLikeIconClass = ' commentsDislikeClickedIconFeedback';
            }


            text +='                                <div class="commentFeedbackChoices">\n' +
                '                                    <div class="postsActionsChoices col-xs-3">\n' +
                '                                        <div class="postLikeChoice display-inline-block ' + likeClass + '" onclick="likeReview(' + reviews[i]["id"] + ', 1, this);">\n' +
                '                                            <span id="likeIcon' + reviews[i]["id"] + '" class="' + likeIconClass + ' firstIcon"></span>\n' +
                '                                            <span class="mg-rt-20 cursor-pointer">دوست داشتم</span>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                    <div class="postsActionsChoices col-xs-3">\n' +
                '                                        <div class="postDislikeChoice display-inline-block ' + disLikeClass + '" onclick="likeReview(' + reviews[i]["id"] + ', 0, this);">\n' +
                '                                            <span id="disLikeIcon' + reviews[i]["id"] + '" class="' + disLikeIconClass + ' firstIcon"></span>\n' +
                '                                            <span class="mg-rt-20 cursor-pointer">دوست نداشتم</span>\n' +
                '                                        </div>\n' +
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
                '\n' +
                '                                <div class="commentsMainBox display-none">\n' +
                '                                    <div class="dark-blue mg-bt-10">\n' +
                '                                        <span class="cursor-pointer" onclick="showAllReviews(' + reviews[i]["id"] + ')">مشاهده ' + reviews[i]["comment"].length + ' نظر باقیمانده</span>\n' +
                '                                    </div>\n';

            var checkAllReviews = true;
            // ans
            for(j = 0; j < reviews[i]["comment"].length; j++){

                if(j > 0 && checkAllReviews){
                    text += '<div id="allReviews_' + reviews[i]["id"] + '" style=" width: 100%;">';
                    checkAllReviews = false;
                }
                text +='                             <div class="eachCommentMainBox">\n' +
                    '                                        <div class="circleBase type2 commentsWriterProfilePic">' +
                    '                                             <img src="' + reviews[i]["comment"][j]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '                                        </div>\n' +
                    '                                        <div class="commentsContentMainBox">\n' +
                    '                                            <b class="userProfileName display-inline-block">' + reviews[i]["comment"][j]["username"] + '</b>\n' +
                    '                                            <p>' + reviews[i]["comment"][j]["text"] + '</p>\n' +
                    '                                            <div class="commentsStatisticsBar">\n' +
                    '                                                <div class="float-right display-inline-black">\n' +
                    '                                                    <span id="reviewLikeNum' + reviews[i]["comment"][j]["id"] + '" class="likeStatisticIcon commentsStatisticSpan color-red">' + reviews[i]["comment"][j]["like"] + '</span>\n' +
                    '                                                    <span id="reviewDisLikeNum' + reviews[i]["comment"][j]["id"] + '" class="dislikeStatisticIcon commentsStatisticSpan dark-red">' + reviews[i]["comment"][j]["dislike"] + '</span>\n' +
                    '                                                    <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">' + reviews[i]["comment"][j]["ansNum"] + '</span>\n' +
                    '                                                </div>\n';
                if(reviews[i]["comment"][j]["ansNum"] > 0)
                    text += '<div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers2(' + reviews[i]["comment"][j]["id"] + ', this)">دیدن پاسخ‌ها</div>\n';

                text += '                                    </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="commentsActionsBtns">\n' +
                    '                                            <div onclick="likeReview(' + reviews[i]["comment"][j]["id"] + ', 1); likeTheAnswers2(this)">\n' +
                    '                                                <span class="likeActionBtn"></span>\n' +
                    '                                                <span class="likeActionClickedBtn display-none"></span>\n' +
                    '                                            </div>\n' +
                    '                                            <div onclick="likeReview(' + reviews[i]["comment"][j]["id"] + ', 0); dislikeTheAnswers2(this)">\n' +
                    '                                                <span class="dislikeActionBtn"></span>\n' +
                    '                                                <span class="dislikeActionClickedBtn display-none"></span>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="clear-both"></div>\n' +
                    '                                            <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="replyToCommentMainDiv display-none">\n' +
                    '                                            <div class="circleBase type2 newCommentWriterProfilePic">' +
                    '                                             <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                    '</div>\n' +
                    '                                            <div class="inputBox">\n' +
                    '                                                <b class="replyCommentTitle">در پاسخ به نظر ' + reviews[i]["comment"][j]["username"] + '</b>\n' +
                    '                                                <textarea id="ansForReviews_' + reviews[i]["comment"][j]["id"] + '" class="inputBoxInput inputBoxInputComment" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>\n' +
                    '                                                <button class="btn btn-primary" onclick="sendAnsOfReviews(' + reviews[i]["comment"][j]["id"] + ',1)"> ارسال</button>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n';

                text += createAnsToComment(reviews[i]["comment"][j]["comment"], reviews[i]["comment"][j]["username"], reviews[i]["comment"][j]["id"]);

                if(j == reviews[i]["comment"].length && !checkAllReviews)
                    text += '</div>';
            }

            text += '</div></div>\n';

            // new ans
            text +='<div class="newCommentPlaceMainDiv">\n' +
                '<div class="circleBase type2 newCommentWriterProfilePic">' +
                '<img src="' + userPic + '" style="">\n' +
                '</div>\n' +
                '<div class="inputBox">\n' +
                '<b class="replyCommentTitle">در پاسخ به نظر ' + reviews[i]["usernameReviewWriter"] + '</b>\n' +
                '<textarea class="inputBoxInput inputBoxInputComment" id="ansForReviews_' + reviews[i]["id"] + '" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>\n' +
                '<button class="btn btn-primary" onclick="sendAnsOfReviews(' + reviews[i]["id"] + ', 0)"> ارسال</button>\n' +
                '</div>\n' +
                '<div></div>\n' +
                '</div>\n' +
                '</div></div>\n';

        }

        document.getElementById('showReviewsMain').innerHTML = text;

        setTimeout(function(){
            resizeFitImg('resizeImgClass');
        }, 500);
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

                    // changeReviewLikeNumber(allReviews, _logId, _like);
                    like = response[1];
                    dislike = response[2];
                    document.getElementById('reviewLikeNum'+_logId).innerText = like;
                    document.getElementById('reviewDisLikeNum'+_logId).innerText = dislike;

                    if(_like == 1) {
                        $(_element).addClass('color-red');
                        $(_element).children("span.firstIcon").removeClass('commentsLikeIconFeedback');
                        $(_element).children("span.firstIcon").addClass('commentsLikeClickedIconFeedback');

                        $(_element).parent().next().children().removeClass('color-darkred');
                        $(_element).parent().next().children().children("span.firstIcon").removeClass('commentsDislikeClickedIconFeedback');
                        $(_element).parent().next().children().children("span.firstIcon").addClass('commentsDislikeIconFeedback');
                    }
                    else{
                        $(_element).addClass('color-darkred');
                        $(_element).children("span.firstIcon").removeClass('commentsDislikeIconFeedback');
                        $(_element).children("span.firstIcon").addClass('commentsDislikeClickedIconFeedback');

                        $(_element).parent().prev().children().removeClass('color-red');
                        $(_element).parent().prev().children().children("span.firstIcon").removeClass('commentsLikeClickedIconFeedback');
                        $(_element).parent().prev().children().children("span.firstIcon").addClass('commentsLikeIconFeedback');
                    }
                }
            }
        })
    }

    function changeReviewLikeNumber(_review, _logId, _like){

        for(var i = 0; i < _review.length; i++){
            if(_review[i]["id"] == _logId){
                if(_review[i]["userLike"] != null && _review[i]["userLike"]["like"] == 1){
                    if(_like != 1){
                        var num = document.getElementById('reviewLikeNum' + _logId).innerText;
                        num--;
                        document.getElementById('reviewLikeNum' + _logId).innerText = num;

                        num = document.getElementById('reviewDisLikeNum' + _logId).innerText;
                        num++;
                        document.getElementById('reviewDisLikeNum' + _logId).innerText = num;

                        _review[i]["userLike"]["like"] = -1;
                    }
                }
                else if(_review[i]["userLike"] != null && _review[i]["userLike"]["like"] == -1){
                    if(_like == 1){
                        var num = document.getElementById('reviewDisLikeNum' + _logId).innerText;
                        num--;
                        document.getElementById('reviewDisLikeNum' + _logId).innerText = num;

                        num = document.getElementById('reviewLikeNum' + _logId).innerText;
                        num++;
                        document.getElementById('reviewLikeNum' + _logId).innerText = num;

                        _review[i]["userLike"]["like"] = 1;
                    }
                }
                else{
                    if(_like == 1){
                        var num = document.getElementById('reviewLikeNum' + _logId).innerText;
                        num++;
                        document.getElementById('reviewLikeNum' + _logId).innerText = num;
                    }
                    else{
                        var num = document.getElementById('reviewDisLikeNum' + _logId).innerText;
                        num++;
                        document.getElementById('reviewDisLikeNum' + _logId).innerText = num;
                    }
                    _review[i]["userLike"]["like"] = _like;
                }
            }
            else if(_review[i]["comment"].length > 0){
                changeReviewLikeNumber(_review[i]["comment"], _logId, _like);
            }
        }

        // if(_like == 1){
        //     var num = document.getElementById('reviewLikeNum' + _logId).innerText;
        //     num++;
        //     document.getElementById('reviewLikeNum' + _logId).innerText = num;
        //
        //     if($('#likeIcon' + _logId).hasClass('commentsLikeClickedIconFeedback')){
        //         num--;
        //         document.getElementById('reviewLikeNum' + _logId).innerText = num;
        //     }
        //     else if($('#disLikeIcon' + _logId).hasClass('commentsDislikeClickedIconFeedback')){
        //         var num = document.getElementById('reviewDisLikeNum' + _logId).innerText;
        //         num--;
        //         document.getElementById('reviewDisLikeNum' + _logId).innerText = (num);
        //     }
        //
        // }
        // else{
        //     var num = document.getElementById('reviewDisLikeNum' + _logId).innerText;
        //     num++;
        //     document.getElementById('reviewDisLikeNum' + _logId).innerText = (num);
        //
        //     if($('#disLikeIcon' + _logId).hasClass('commentsDislikeClickedIconFeedback')){
        //         num--;
        //         document.getElementById('reviewDisLikeNum' + _logId).innerText = num;
        //     }
        //     else if($('#likeIcon' + _logId).hasClass('commentsLikeClickedIconFeedback')){
        //         var num = document.getElementById('reviewLikeNum' + _logId).innerText;
        //         num--;
        //         document.getElementById('reviewLikeNum' + _logId).innerText = num;
        //     }
        // }

    }

    function sendAnsOfReviews(_logId, _ans){

        if(!checkLogin())
            return;

        var text = document.getElementById('ansForReviews_' + _logId).value;
        if(text != null && text != ''){
            $.ajax({
                type: 'post',
                url: '{{route('ansReview')}}',
                data: {
                    'logId' : _logId,
                    'text'  : text,
                    'ansAns' : _ans
                },
                success: function(response){
                    if(response == 'ok')
                        window.location.reload();
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

            text += '<div class=" display-none ansComment_' + topId + '" style="width: 100%;">' +
                '<div class="eachCommentMainBox mg-rt-45">\n' +
                '                                        <div class="circleBase type2 commentsWriterProfilePic">' +
                '                                             <img src="' + comment[k]["userPic"] + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '                                        </div>\n' +
                '                                        <div class="commentsContentMainBox">\n' +
                '                                            <b class="userProfileName float-right">' + comment[k]["username"] + '</b>\n' +
                '                                            <b class="commentReplyDesc display-inline-block">در پاسخ به ' + repTo + '</b>\n' +
                '                                            <div class="clear-both"></div>\n' +
                '                                            <p>' + comment[k]["text"] + '</p>\n' +
                '                                            <div class="commentsStatisticsBar">\n' +
                '                                                <div class="float-right display-inline-black">\n' +
                '                                                    <span id="reviewLikeNum' + comment[k]["id"] + '" class="likeStatisticIcon commentsStatisticSpan color-red">' + comment[k]["like"] + '</span>\n' +
                '                                                    <span id="reviewDisLikeNum' + comment[k]["id"] + '" class="dislikeStatisticIcon commentsStatisticSpan dark-red">' + comment[k]["dislike"] + '</span>\n' +
                '                                                    <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">' + comment[k]["ansNum"] + '</span>\n' +
                '                                                </div>\n';

            if(comment[k]["ansNum"] > 0)
                text += '<div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showCommentsAnswers2(' + comment[k]["id"] + ', this)">دیدن پاسخ‌ها</div>\n';

            text +='                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="commentsActionsBtns">\n' +
                '                                            <div onclick="likeReview(' + comment[k]["id"] + ', 1); likeTheAnswers2(this)">\n' +
                '                                                <span class="likeActionBtn"></span>\n' +
                '                                                <span class="likeActionClickedBtn display-none"></span>\n' +
                '                                            </div>\n' +
                '                                            <div onclick="likeReview(' + comment[k]["id"] + ', 0); dislikeTheAnswers2(this)">\n' +
                '                                                <span class="dislikeActionBtn"></span>\n' +
                '                                                <span class="dislikeActionClickedBtn display-none"></span>\n' +
                '                                            </div>\n' +
                '                                            <div class="clear-both"></div>\n' +
                '                                            <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>\n' +
                '                                        </div>\n' +
                '                                        <div class="replyToCommentMainDiv display-none">\n' +
                '                                            <div class="circleBase type2 newCommentWriterProfilePic">' +
                '                                                <img src="' + userPic + '" style="width: 100%; height: 100%; border-radius: 50%;">\n' +
                '                                            </div>\n' +
                '                                            <div class="inputBox">\n' +
                '                                                <b class="replyCommentTitle">در پاسخ به نظر ' + comment[k]["username"] + '</b>\n' +
                '                                                <textarea  id="ansForReviews_' + comment[k]["id"] + '" class="inputBoxInput inputBoxInputComment" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>\n' +
                '                                                <button class="btn btn-primary" onclick="sendAnsOfReviews(' + comment[k]["id"] + ', 1)"> ارسال</button>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n';

            if(comment[k]["ansNum"] > 0) {
                text += createAnsToComment(comment[k]["comment"], comment[k]["username"], comment[k]["id"]);
            }

            text += '</div>';
        }

        return text;
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
        $(element).text($(element).text() == 'دیدن پاسخ‌ها' ? 'بستن پاسخ‌ها' : 'دیدن پاسخ‌ها');
    }

</script>
