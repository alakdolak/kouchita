@extends('streaming.streamingLayout')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/streaming/showStreaming.css')}}">
@endsection

@section('body')

    <div class="container mainShowBase">
        <div class="showVideo">
            <div id="46671937617"><script type="text/JavaScript" src="https://www.aparat.com/embed/BEpeL?data[rnddiv]=46671937617&data[responsive]=yes"></script></div>
        </div>

        <div class="videoInfos">
            <div class="videoInfosVideoName">
                معرفی آئودی ای ترون اسپرت بک
            </div>
            <div class="row mainUserPicSection">
                <div class="userPicDiv">
                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                </div>
                <div class="mainUserInfos">
                    <div class="mainUseruserName">
                        shazdesina
                    </div>
                    <div class="videoUploadTime">
                        هم اکنون
                    </div>
                </div>
            </div>
        </div>

        <div class="toolSection">
            <div class="toolSectionButtons">
                <div class="toolSectionButtonsCircle">
                    <span class="DisLikeIcon"></span>
                </div>
                <div class="toolSectionButtonsCircle">
                    <span class="LikeIcon"></span>
                </div>
                <div class="toolSectionButtonsCircle">
                    <span class="CommentIcon CommentIconSett"></span>
                </div>
                <div class="toolSectionButtonsCircle">
                    <span class="ShareIcon ShareIconSett"></span>
                </div>
                <div class="toolSectionButtonsCircle">
                    <span class="HeartIcon HeartIconSett"></span>
                </div>
                <div class="toolSectionButtonsCircle">
                    <span class="BookMarkIcon BookMarkIconSett"></span>
                </div>
            </div>
            <div class="toolSectionInfos">
                <div class="toolSectionInfosTab">
                    <span class="CommentIcon commentInfoTab"></span>
                    <span class="toolSectionInfosTabNumber">100,000</span>
                </div>
                <div class="toolSectionInfosTab">
                    <span class="LikeIcon likeInfoTab"></span>
                    <span class="toolSectionInfosTabNumber">100</span>
                </div>
                <div class="toolSectionInfosTab">
                    <span class="DisLikeIcon disLikeInfoTab"></span>
                    <span class="toolSectionInfosTabNumber">100,000,000</span>
                </div>
                <div class="toolSectionInfosTab">
                    <i class="fa fa-eye"></i>
                    {{--                    <span class="ViewIcon viewInfoTab"></span>--}}
                    <span class="toolSectionInfosTabNumber">100</span>
                </div>
            </div>
        </div>

        <div class="descriptionSection">
            <div class="headerWithLine">
                <div class="headerWithLineText">
                    معرفی کلی
                </div>
                <div class="headerWithLineLine"></div>
            </div>
            <div class="descriptionSectionBody">
                لورم ایپسوم متن ساختگی
                با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها
                و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و م
                تخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت
                می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و
                جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </div>
        </div>

        <div class="commentSection">
            <div class="headerWithLine">
                <div class="headerWithLineText">
                    نظرها
                </div>
                <div class="headerWithLineLine"></div>
            </div>
            <div class="commentSectionBody">
                <div class="commentInputSection">
                    <div class="userPicDiv">
                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                    </div>
                    <textarea class="commentInput" name="comment" id="comment" placeholder="شما چه نظری دارید؟" rows="1"></textarea>
                    <div class="commentInputSendButton">ارسال</div>
                </div>

                <hr style="border-color:darkgray; margin: 10px 0px">

                <div class="acceptedComment">
                    <div class="mainUserPicSection">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                            <div class="videoUploadTime">
                                هم اکنون
                            </div>
                        </div>
                    </div>

                    <div class="acceptedCommentText">                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و م تخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                    </div>

                    <div class="acceptedCommentSett">
                        <div class="acceptedCommentRight">
                            <div style="margin-left: 15px;">
                                <span style="color: #0076a3">31</span>
                                <span>پاسخ دادند</span>
                            </div>
                            <div style="color: blue; cursor: pointer" onclick="openAnsOnReview(1)">
                                مشاهده پاسخ ها
                                <i class="downArrowIcon"></i>
                            </div>
                        </div>
                        <div class="acceptedCommentLeft">
                            <div class="acceptedCommentAnsButton" onclick="openAnsToComment(1)">
                                پاسخ دهید
                            </div>
                        </div>
                    </div>

                    <div id="ansTo_1" class="commentInputSection" style="margin-top: 10px; display: none;">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <textarea class="commentInput" name="AnsToComment_1" id="AnsToComment_1" placeholder="شما چه نظری دارید؟" rows="1"></textarea>
                        <div class="commentInputSendButton">ارسال</div>
                    </div>
                    <div id="ansOf_1" style="display: none;">
                        <div class="commentAnsesSection">

                            <div class="commentInputSection" style="margin-top: 10px;">
                                <div class="userPicDiv userPicAnsToReviewPc">
                                    <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                </div>
                                <div class="topOfcommentAnsTextSection">
                                    <div class="commentAnsTextSection">
                                        <div style="display: flex">
                                            <div class="userPicDiv userPicAnsToReviewMobile">
                                                <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                            </div>
                                            <div class="topWho">
                                                <div class="whoAns">
                                                    kiavash
                                                </div>
                                                <div class="whoAnsTo">
                                                    در پاسخ به shazdesina
                                                </div>
                                            </div>
                                        </div>
                                        <div style="text-align: justify; white-space: pre-line">  نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                                        <div class="commentAnsToAns hideOnPc" style="justify-content: flex-end;">
                                            <div class="commentAnsLikeSection">
                                                <div class="likeAnsIconDiv" onclick="toggleLikeIcon(true, 1)">
                                                    <div class="LikeIconEmpty LikeIconEmptySett likeIcon_1"></div>
                                                </div>
                                                <div class="disLikeAnsIconDiv" onclick="toggleLikeIcon(false, 1)">
                                                    <div class="DisLikeIconEmpty DisLikeIconEmptySett dislikeIcon_1"></div>
                                                </div>
                                            </div>
                                            <div class="acceptedCommentAnsButton" style="font-size: 12px;" onclick="openAnsToComment(2)">
                                                پاسخ دهید
                                            </div>
                                        </div>
                                    </div>

                                    <div id="ansTo_2" class="commentInputSection" style="margin-top: 10px; display: none;">
                                        <div class="userPicDiv ">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <textarea class="commentInput" name="AnsToComment_1" id="AnsToComment_1" placeholder="شما چه نظری دارید؟" rows="1"></textarea>
                                        <div class="commentInputSendButton">ارسال</div>
                                    </div>

                                    <div class="commentAnsInfos">
                                        <div class="commentAnsRight">
                                            <div style="color: red; display: flex">
                                                <span>20</span>
                                                <span class="LikeIcon"></span>
                                            </div>
                                            <div style="color: darkred; display: flex; margin-right: 10px;">
                                                <span>0</span>
                                                <span class="DisLikeIcon"></span>
                                            </div>
                                            <div style="color: #0076a3; display: flex; margin-right: 10px;">
                                                <span>20</span>
                                                <span class="CommentIcon"></span>
                                            </div>
                                        </div>
                                        <div class="commentAnsLeft" onclick="openAnsOnReview(2)">
                                            مشاهده پاسخ ها
                                        </div>
                                    </div>
                                </div>
                                <div class="commentAnsToAns hideOnPhone">
                                    <div class="commentAnsLikeSection">
                                        <div class="likeAnsIconDiv" onclick="toggleLikeIcon(true, 1)">
                                            <div class="LikeIconEmpty LikeIconEmptySett likeIcon_1"></div>
                                        </div>
                                        <div class="disLikeAnsIconDiv" onclick="toggleLikeIcon(false, 1)">
                                            <div class="DisLikeIconEmpty DisLikeIconEmptySett dislikeIcon_1"></div>
                                        </div>
                                    </div>
                                    <div class="acceptedCommentAnsButton" style="font-size: 12px;" onclick="openAnsToComment(2)">
                                        پاسخ دهید
                                    </div>
                                </div>
                            </div>



                            <div id="ansOf_2" style="display: none;">
                                <div class="commentAnsesSection">
                                    <div class="commentInputSection" style="margin-top: 10px;">
                                        <div class="userPicDiv userPicAnsToReviewPc">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <div class="topOfcommentAnsTextSection">
                                            <div class="commentAnsTextSection">
                                                <div style="display: flex">
                                                    <div class="userPicDiv userPicAnsToReviewMobile">
                                                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                                    </div>
                                                    <div class="topWho">
                                                        <div class="whoAns">
                                                            kiavash3
                                                        </div>
                                                        <div class="whoAnsTo">
                                                            در پاسخ به 3shazdesina
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="text-align: justify; white-space: pre-line">  نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                                            </div>
                                            <div class="commentAnsInfos">
                                                <div class="commentAnsRight">
                                                    <div style="color: red; display: flex">
                                                        <span>20</span>
                                                        <span class="LikeIcon"></span>
                                                    </div>
                                                    <div style="color: darkred; display: flex; margin-right: 10px;">
                                                        <span>0</span>
                                                        <span class="DisLikeIcon"></span>
                                                    </div>
                                                    <div style="color: #0076a3; display: flex; margin-right: 10px;">
                                                        <span>20</span>
                                                        <span class="CommentIcon"></span>
                                                    </div>
                                                </div>
                                                <div class="commentAnsLeft">
                                                    مشاهده پاسخ ها
                                                </div>
                                            </div>
                                        </div>
                                        <div class="commentAnsToAns ">
                                            <div class="commentAnsLikeSection">

                                                <div class="likeAnsIconDiv" onclick="toggleLikeIcon(true, 3)">
                                                    <div class="LikeIconEmpty LikeIconEmptySett likeIcon_3"></div>
                                                </div>
                                                <div class="disLikeAnsIconDiv" onclick="toggleLikeIcon(false, 3)">
                                                    <div class="DisLikeIconEmpty DisLikeIconEmptySett dislikeIcon_3"></div>
                                                </div>

                                            </div>
                                            <div class="acceptedCommentAnsButton" style="font-size: 12px;" onclick="openAnsToComment(3)">
                                                پاسخ دهید
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ansTo_3" class="commentInputSection" style="margin-top: 10px; display: none;">
                                        <div class="userPicDiv">
                                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                                        </div>
                                        <textarea class="commentInput" name="AnsToComment_3" id="AnsToComment_3" placeholder="شما چه نظری دارید؟" rows="1"></textarea>
                                        <div class="commentInputSendButton">ارسال</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <hr style="border-color:darkgray; margin: 3px 0px">

            </div>
        </div>

        <div class="otherSection">
            <div class="headerWithLine">
                <div class="headerWithLineText">
                    شاید جالب باشد
                </div>
                <div class="headerWithLineLine"></div>
            </div>

            <div class="otherSectionBody">

                <div class="videoSuggestionSwiper swiper-container">

                    <div id="mebyInterestedVideo" class="swiper-wrapper">
                        {{--fill with js videoSuggestion()--}}
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('script')
    <script src="{{URL::asset('js/autosize.min.js')}}"></script>
    <script>
        let nonPic = '{{URL::asset('_images/nopic/blank.jpg')}}';
        $(window).ready(function(){
            autosize($('textarea'));
        });

        function videoSuggestion(){
            let pack = [
                {
                    id : 'video1',
                    name: 'صخبت با مخمد جواد',
                    url : '#',
                    img : 'https://static.koochita.com/_images/posts/5/mainPic.jpg',
                    like: 100,
                    dislike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
                {
                    id : 'video1',
                    name: 'صخبت با مخمد جواد',
                    url : '#',
                    img : 'https://static.koochita.com/_images/posts/91/1586792425-mainPic.jpg',
                    like: 100,
                    dislike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
                {
                    id : 'video1',
                    name: 'صخبت با مخمد جواد',
                    url : '#',
                    img : 'https://static.koochita.com/_images/posts/45/1585227039-mainPic.jpg',
                    like: 100,
                    dislike: 3,
                    see : 245,
                    userPic : nonPic,
                    username : 'shazesina',
                    time : '10 ساعت قبل',
                },
            ]
            createVideoSuggestionDiv(pack, 'mebyInterestedVideo');
        }
        videoSuggestion();

        var swiper = new Swiper('.videoSuggestionSwiper', {
            slidesPerGroup: 1,
            // width: 300,
            loop: true,
            loopFillGroupWithBlank: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                650: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                860: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                10000: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                }
            }
        });


        function openAnsToComment(_id){
            $('#ansTo_' + _id).toggle();
        }
        function openAnsOnReview(_id){
            $('#ansOf_' + _id).toggle();
        }

        function toggleLikeIcon(_kind, _id){
            if(_kind){
                $('.dislikeIcon_' + _id).removeClass('redDisLikeIcon');
                $('.likeIcon_' + _id).toggleClass('redLikeIcon');
            }
            else{
                $('.dislikeIcon_' + _id).toggleClass('redDisLikeIcon');
                $('.likeIcon_' + _id).removeClass('redLikeIcon');
            }
        }
    </script>

@endsection