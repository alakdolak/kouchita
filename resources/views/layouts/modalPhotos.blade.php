
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/modalPhotos.css')}}">


<div class="modal fade showingPhotosModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="showingPhotosMainDivHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="showingPhotosTitle">نمایش عکس‌ها</div>
            </div>
            <div class="commentWriterDetailsShow">
                <div class="circleBase type2 commentWriterPicShow"></div>
                <div class="commentWriterExperienceDetails">
                    <b class="userProfileName">shazdesina</b>
                    <div class="display-inline-block">در
                        <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                    </div>
                    <div>با
                        <span class="commentWriterExperienceParticipation">احتشام الدوله توفیقی</span>،
                        <span class="commentWriterExperienceParticipation">حمیدرضا عسگرزاده </span>و
                        <span class="commentWriterExperienceParticipation">علی اصر همتی</span>
                    </div>
                    <div>
                        هم اکنون - بیش از 23 ساعت پیش
                    </div>
                </div>
                <div class="photosFeedBackBtn">
                    <div class="col-xs-6 photosModalLikeBox" onclick="likePostsComment(this)">
                        <span >دوست داشتم</span>
                        <span class="likeBoxIcon firstIcon"></span>
                        <span class="likeBoxIconClicked display-none secondIcon"></span>
                    </div>
                    <div class="col-xs-6 photosModalDislikeBox" onclick="disLikePostsComment(this)">
                        <span>دوست نداشتم</span>
                        <span class="dislikeBoxIcon firstIcon"></span>
                        <span class="dislikeBoxIconClicked display-none secondIcon"></span>
                    </div>
                    <div class="clear-both"></div>
                    <div class="feedbackStatistic">
                        <span>31</span>
                        نفر دوست داشتند و
                        <span>31</span>
                        نفر دوست نداشتند
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="col-xs-10 leftColPhotosModalMainDiv">
                <div class="selectedPhotoShowingModal"></div>
            </div>
            <div class="col-xs-2 rightColPhotosModalMainDiv">
                <div class="rightColPhotosShowingModal"></div>
                <div class="rightColPhotosShowingModal"></div>
                <div class="rightColPhotosShowingModal"></div>
                <div class="rightColPhotosShowingModal"></div>
            </div>
            <div class="photosDescriptionShowingModal">
                توضیحات مربوط به عکس من این است که این عکس‌ها را در سفری بسیار زیبا با همه به پایان می‌گذرانیم.
            </div>
        </div>

    </div>
</div>

<script>
    function likePostsComment(element) {
        $(element).toggleClass('color-red'),
            $(element).children("span.firstIcon").toggle(),
            $(element).children("span.secondIcon").toggle()
    }

    function disLikePostsComment(element) {
        $(element).toggleClass('dark-red'),
            $(element).children("span.firstIcon").toggle(),
            $(element).children("span.secondIcon").toggle()
    }
</script>