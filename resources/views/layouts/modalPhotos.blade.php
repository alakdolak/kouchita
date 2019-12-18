
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/modalPhotos.css')}}">

{{--<div class="modal fade showingPhotosModal display-none" role="dialog">--}}
{{--    <div class="modal-dialog">--}}

{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}

{{--            <div class="showingPhotosMainDivHeader">--}}
{{--                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                <div class="showingPhotosTitle">نمایش عکس‌ها</div>--}}
{{--            </div>--}}
{{--            <div class="commentWriterDetailsShow">--}}
{{--                <div class="circleBase type2 commentWriterPicShow"></div>--}}
{{--                <div class="commentWriterExperienceDetails">--}}
{{--                    <b class="userProfileName">shazdesina</b>--}}
{{--                    <div class="display-inline-block">در--}}
{{--                        <span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>--}}
{{--                    </div>--}}
{{--                    <div>با--}}
{{--                        <span class="commentWriterExperienceParticipation">احتشام الدوله توفیقی</span>،--}}
{{--                        <span class="commentWriterExperienceParticipation">حمیدرضا عسگرزاده </span>و--}}
{{--                        <span class="commentWriterExperienceParticipation">علی اصر همتی</span>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        هم اکنون - بیش از 23 ساعت پیش--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="photosFeedBackBtn">--}}
{{--                    <div class="col-xs-6 photosModalLikeBox" onclick="likePostsComment(this)">--}}
{{--                        <span >دوست داشتم</span>--}}
{{--                        <span class="likeBoxIcon firstIcon"></span>--}}
{{--                        <span class="likeBoxIconClicked display-none secondIcon"></span>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-6 photosModalDislikeBox" onclick="disLikePostsComment(this)">--}}
{{--                        <span>دوست نداشتم</span>--}}
{{--                        <span class="dislikeBoxIcon firstIcon"></span>--}}
{{--                        <span class="dislikeBoxIconClicked display-none secondIcon"></span>--}}
{{--                    </div>--}}
{{--                    <div class="clear-both"></div>--}}
{{--                    <div class="feedbackStatistic">--}}
{{--                        <span>31</span>--}}
{{--                        نفر دوست داشتند و--}}
{{--                        <span>31</span>--}}
{{--                        نفر دوست نداشتند--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="clear-both"></div>--}}
{{--            <div class="col-xs-10 leftColPhotosModalMainDiv">--}}
{{--                <div class="selectedPhotoShowingModal"></div>--}}
{{--            </div>--}}
{{--            <div class="col-xs-2 rightColPhotosModalMainDiv">--}}
{{--                <div class="rightColPhotosShowingModal"></div>--}}
{{--                <div class="rightColPhotosShowingModal"></div>--}}
{{--                <div class="rightColPhotosShowingModal"></div>--}}
{{--                <div class="rightColPhotosShowingModal"></div>--}}
{{--            </div>--}}
{{--            <div class="photosDescriptionShowingModal">--}}
{{--                توضیحات مربوط به عکس من این است که این عکس‌ها را در سفری بسیار زیبا با همه به پایان می‌گذرانیم.--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}

<div class="modal fade showingPhotosModal" id="showingPhotographerPicsModal" role="dialog">
    <div class="modal-dialog" style="margin-bottom: 0px;">
        <div class="modal-content">
            <div id="showingPhotosMainDivHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="showingPhotosTitle">نمایش عکس‌ها</div>
            </div>
            <div class="commentWriterDetailsShow">
                <div class="circleBase type2 commentWriterPicShow">
                    <img id="photographerSlideUserPic" src="{{$photographerPics[0]['userPic']}}" class="koochitaCircleLogo">
                </div>
                <div class="commentWriterExperienceDetails">
                    <b id="photographerSlideUserName" class="userProfileName">{{$photographerPics[0]['name']}}</b>

                    <div id="photographerSlideInfos" style="display: {{$photographerPics[0]['showInfo']? 'block' : 'none'}}">
                        {{--<div class="display-inline-block">در--}}
                        {{--<span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>--}}
                        {{--</div>--}}
                        {{--<div>با--}}
                        {{--<span class="commentWriterExperienceParticipation">احتشام الدوله توفیقی</span>،--}}
                        {{--<span class="commentWriterExperienceParticipation">حمیدرضا عسگرزاده </span>و--}}
                        {{--<span class="commentWriterExperienceParticipation">علی اصر همتی</span>--}}
                        {{--</div>--}}
                        <div id="photographerSlideTimeInfo">
                            {{$photographerPics[0]['fromUpload']}}
                        </div>
                    </div>
                </div>

                <div id="photographerSlideFeedBackBtns" style="display: {{$photographerPics[0]['showInfo']? 'block' : 'none'}}">
                </div>

            </div>
            <div class="clear-both"></div>
            <div class="col-xs-10 leftColPhotosModalMainDiv">
                <div class="selectedPhotoShowingModal">
                    <img id="mainPhotographerSliderPic" src="{{URL::asset($photographerPics[0]['s'])}}" alt="{{$photographerPics[0]['alt']}}" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="col-xs-2 rightColPhotosModalMainDiv" >
                @for($i = 0; $i < count($photographerPics); $i++)
                    <div class="rightColPhotosShowingModal" onclick="changePhotographerSlidePic({{$i}})">
                        <img src="{{$photographerPics[$i]['l']}}" alt="{{$photographerPics[$i]['alt']}}" style="width: 100%; height: 100%;">
                    </div>
                @endfor
            </div>
            <div class="photosDescriptionShowingModal">
                <div id="photographerDescription" style="display: {{$photographerPics[0]['showInfo']? 'block' : 'none'}}">
                    {{$photographerPics[0]['description']}}
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade showingPhotosModal" id="showingSitePicsModal" role="dialog">
    <div class="modal-dialog" style="margin-bottom: 0px;">
        <div class="modal-content">
            <div id="showingPhotosMainDivHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="showingPhotosTitle">نمایش عکس‌ها سایت</div>
            </div>
            <div class="commentWriterDetailsShow">
                <div class="circleBase type2 commentWriterPicShow">
                    <img src="{{$sitePics[0]['userPic']}}" class="koochitaCircleLogo">
                </div>
                <div class="commentWriterExperienceDetails">
                    <b class="userProfileName">{{$sitePics[0]['name']}}</b>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="col-xs-10 leftColPhotosModalMainDiv">
                <div class="selectedPhotoShowingModal">
                    <img id="mainSiteSliderPic" src="{{$sitePics[0]['s']}}" alt="{{$sitePics[0]['alt']}}" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="col-xs-2 rightColPhotosModalMainDiv" >
                @for($i = 0; $i < count($sitePics); $i++)
                    <div class="rightColPhotosShowingModal" onclick="changeSiteSlidePic({{$i}})">
                        <img src="{{$sitePics[$i]['l']}}" alt="{{$sitePics[$i]['alt']}}" style="width: 100%; height: 100%;">
                    </div>
                @endfor
            </div>
            <div class="photosDescriptionShowingModal"></div>
        </div>
    </div>
</div>

<script>
    function likePostsComment(element) {
        $(element).toggleClass('color-red');
        $(element).children("span.firstIcon").toggle();
        $(element).children("span.secondIcon").toggle();
    }

    function disLikePostsComment(element) {
        $(element).toggleClass('dark-red');
        $(element).children("span.firstIcon").toggle();
        $(element).children("span.secondIcon").toggle();
    }
</script>