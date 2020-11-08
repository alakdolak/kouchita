@extends('pages.Business.businessLayout')


@section('head')
    <style>
        .reviewShowSection{
            display: flex;
        }
        .reviewShowSection > div{
            width: 50%;
        }

        .questionBodies .inputQuestionSec{
            display: flex;
            align-items: flex-start;
            margin-top: 20px;
        }
        .questionBodies .inpQ{
            width: calc(100% - 60px);
            background: #f2f2f2;
            padding: 5px;
            margin-right: 10px;
            display: flex;
            border-radius: 5px;
            align-items: flex-end;
        }
        .questionBodies .inpQ > textarea{
            width: 100%;
            border: none;
            background: none;
            resize: none;
        }
        .questionBodies .inpQ > button{
            width: 65px;
            padding: 5px 0px;
            color: var(--koochita-blue);
            background: #f2f2f2;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            height: 40px;
        }

    </style>
@endsection

@section('body')
    @include('component.mapMenu')
    
    @include('component.smallShowReview')

    <div id="topInfos" class="topInfoFixed">
        <div style="display: flex; padding: 0px 20px">
            <div class="info">
                <h1 style="font-weight: bold;">مغازه دریانی</h1>
                <div class="address">
                    هفت تیر، خیابان مشاهیر تقاطع لطفی
                </div>
            </div>
            <div class="fullyCenterContent pic">
                <img src="http://localhost/assets/_images/majara/jangalhaye_arasbaran/s-1.jpg" class="resizeImgClass" onload="fitThisImg(this)">
            </div>
        </div>
        <div class="tabRow fastAccess">
            <div class="tab doubleQuet selected" onclick="goToSection('description')">
                <div class="text">توضیحات</div>
            </div>
            <div class="tab earthIcon" onclick="goToSection('map')">
                <div class="text">نقشه</div>
            </div>
            <div class="tab EmptyCommentIcon" onclick="goToSection('review')">
                <div class="text">دیدگاه شما</div>
            </div>
            <div class="tab questionIcon" onclick="goToSection('question')">
                <div class="text">سوال و جواب ها</div>
            </div>
        </div>

        <div class="mainHeaderButts">
            <div class="fullyCenterContent emptyCameraIconAfter">
                <div class="text">گذاشتن عکس</div>
            </div>
            <div class="fullyCenterContent BookMarkIconEmptyAfter">
                <div class="text">نشان کردن</div>
            </div>
            <div class="fullyCenterContent emptyShareIconAfter">
                <div class="text">اشتراک گذاری</div>
            </div>
        </div>
    </div>

    <div class="showHeader">
        <div class="container">
            <div class="inff">
                <h1 style="font-weight: bold;">مغازه دریانی</h1>
                <div class="address">
                    هفت تیر، خیابان مشاهیر تقاطع لطفی
                </div>
            </div>
            <div class="mainHeaderButts">
                <div class="fullyCenterContent emptyCameraIconAfter">
                    <div class="text">گذاشتن عکس</div>
                </div>
                <div class="fullyCenterContent BookMarkIconEmptyAfter">
                    <div class="text">نشان کردن</div>
                </div>
                <div class="fullyCenterContent emptyShareIconAfter">
                    <div class="text">اشتراک گذاری</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grayBackGround showBody">
        <div class="container">

            <div class="row">
                <div class="col-md-5">
                    <div class="bodySec infoSec" style="height: 420px">
                        <div class="iWasHere flagIcon">من اینجا بودم</div>
                        <div class="boldText">سوپر مارکت دریانی</div>
                        <div class="normText">هفت تیر، خیابان مشاهیر تقاطع لطفی</div>
                        <a href="tel:9122474393" class="phone telephoneIconAfter">021-88492744</a>
                        <div class="groupSec">
                            <div class="boldText mr4bef clockIcon">ساعات کاری</div>
                            <div class="weekTime">
                                <div>
                                    <span>روزهای هفته:</span>
                                    <span>10 تا 18</span>
                                </div>
                                <div>
                                    <span>قبل تعطیلی:</span>
                                    <span>10 تا 16</span>
                                </div>
                                <div>
                                    <span>روزهای تعطیل:</span>
                                    <span class="closse">تعطیل</span>
                                </div>
                            </div>
                        </div>
                        <div class="groupSec">
                            <div class="boldText mr4bef fullStarRating">انتخاب بهترین مغازه دار</div>
                            <div class="normText" style="padding: 0px 20px;">
                                آیا شما از مغازه و مغازه دار راضی بودید؟
                            </div>
                            <div class="ratingButtons">
                                <div class="likeSec" onclick="likeDisLikeShop(this, 1)">
                                    <div class="fullyCenterContent icon LikeIconEmpty">
                                        <span class="count">102</span>
                                    </div>
                                    <div class="fullyCenterContent result">
                                        <div>
                                            <span class="name">محلی : </span>
                                            <span class="num">100</span>
                                        </div>
                                        <div>
                                            <span class="name">غیر محلی : </span>
                                            <span class="num">32</span>
                                        </div>
                                        <div>
                                            <span class="name">نامشخص : </span>
                                            <span class="num">32</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="disLikeSec" onclick="likeDisLikeShop(this, -1)">
                                    <div class="fullyCenterContent icon DisLikeIconEmpty">
                                        <span class="count">243</span>
                                    </div>
                                    <div class="fullyCenterContent result">
                                        <div>
                                            <span class="name">محلی : </span>
                                            <span class="num">100</span>
                                        </div>
                                        <div>
                                            <span class="name">غیر محلی : </span>
                                            <span class="num">32</span>
                                        </div>
                                        <div>
                                            <span class="name">نامشخص : </span>
                                            <span class="num">32</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="fullyCenterContent bodySec imgSliderSec" style="height: 420px">
                        <img src="http://localhost/assets/_images/majara/jangalhaye_arasbaran/s-1.jpg" class="resizeImgClass" onload="fitThisImg(this)">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="fullyCenterContent bodySec adver fullRow">تبلیغ</div>
                </div>
            </div>

            <div id="stickyIndicator" class="row">
                <div class="col-md-12">
                    <div class="bodySec fastAccess">
                        <div class="tab doubleQuet selected" onclick="goToSection('description')">
                            <div class="text">توضیحات</div>
                        </div>
                        <div class="tab earthIcon" onclick="goToSection('map')">
                            <div class="text">نقشه</div>
                        </div>
                        <div class="tab EmptyCommentIcon" onclick="goToSection('review')">
                            <div class="text">دیدگاه شما</div>
                        </div>
                        <div class="tab questionIcon" onclick="goToSection('question')">
                            <div class="text">سوال و جواب ها</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bodySec pad-15">
                        <h2 class="headerSec doubleQuet">توضیحات</h2>
                        <div class="descriptionBody" style="color: #636363;">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                            و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                            لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                            می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان
                            را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و
                            فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری
                            موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی
                            دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div id="mapDiv" class="bodySec map"></div>
                </div>
                <div class="col-md-3">
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
                </div>
                <div id="inputReviewSec" class="col-md-8">
                    <div class="bodySec">
                        <h2 class="yourReviewHeader EmptyCommentIcon">
                            دیدگاه شما
                            <span class="iconClose" onclick="closeWriteReview()"></span>
                        </h2>
                        <div class="inputReviewSec">
                            <div class="firsRow">
                                <div class="fullyCenterContent uPic50">
                                    <img src="{{$userPic}}" class="resizeImgClass" onload="fitThisImg(this)" style="width: 100%" >
                                </div>
                                <textarea class="Inp" placeholder="کاربر چه فکر یا احساسی داری..." onfocus="openWriteReview()"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bodySec">
                        <div class="reviewButs">
                            <div class="but addPhotoIcon">
                                عکس اضافه کنید.
                            </div>
                            <div class="but addVideoIcon">
                                ویدیو اضافه کنید.
                            </div>
                            <div class="but addVideo360Icon">
                                ویدیو 360 اضافه کنید.
                            </div>
                            <div class="but addFriendIcon">
                                دوستنتان را TAG کنید.
                            </div>
                        </div>
                        <div class="reviewQues showWhenNeed"></div>
                        <div class="reviewSubmit showWhenNeed">
                            ارسال دیدگاه
                        </div>
                    </div>
                </div>
                <div class="col-md-8 reviewShowSection">
                    <div id="showReviewsMain1"></div>
                    <div id="showReviewsMain2"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bodySec pad-15">
                        <h2 class="headerSec questionIcon">سوال و جواب</h2>
                        <div id="questionSection" class="questionBodies">
                            <div>
                                <div style="font-weight: bold; font-size: 16px;">سؤلات خود را بپرسید تا با کمک دوستانتان آگاهانه‌تر سفر کنید. همچنین می‌توانید با پاسخ یه سؤالات دوستانتان علاوه بر دریافت امتیاز، اطلاعات خود را به اشتراک بگذارید.</div>
                                <div style="margin-top: 12px; font-size: 15px;">در حال حاضر 0 سؤال 0 پاسخ موجود می‌باشد.</div>
                            </div>
                            <div class="inputQuestionSec">
                                <div class="fullyCenterContent uPic50">
                                    <img src="{{$userPic}}" class="resizeImgClass" onload="fitThisImg(this)" style="width: 100%" >
                                </div>
                                <div class="inpQ">
                                    <textarea class="autoResizeTextArea" placeholder="شما چه سوالی دارید؟"></textarea>
                                    <button>ارسال</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function openWriteReview(){
            $('#darkModal').show();
            $('#inputReviewSec').addClass('openReviewSec');
        }

        function closeWriteReview(){
            $('#darkModal').hide();
            $('#inputReviewSec').removeClass('openReviewSec');
        }

        function likeDisLikeShop(_element, _like){
            $(_element).parent().addClass('youRate');
            $(_element).parent().find('.selected').removeClass('selected');
            $(_element).addClass('selected');
        }

        function goToSection(_section){
            var topScroll = 0;
            var topInfoHeight = $('#topInfos').height();

            if(_section == 'description')
                topScroll = $('#stickyIndicator').offset().top - 10;
            else if(_section == 'map')
                topScroll = $('#mapDiv').offset().top - topInfoHeight+10;
            else if(_section == 'review')
                topScroll = $('#inputReviewSec').offset().top - topInfoHeight+10;
            else if(_section == 'question')
                topScroll = $('#questionSection').offset().top - topInfoHeight+10;

            $('html, body').animate({ scrollTop: topScroll }, 1000);
        }

        createMap('mapDiv', {x: 27.1708978, y: 56.2583517}, [], true);

        $(document).ready(() => autosize($('.autoResizeTextArea')));

        $(window).on('scroll', e => {
            var tabShow = '';
            var topInfoHeight = $('#topInfos').height();
            let topOfSticky = document.getElementById('stickyIndicator').getBoundingClientRect().top;
            if(topOfSticky < 0 && !$('#topInfos').hasClass('open'))
                $('#topInfos').addClass('open');
            else if(topOfSticky >= 0 && $('#topInfos').hasClass('open'))
                $('#topInfos').removeClass('open');

            var mapTopScroll = document.getElementById('mapDiv').getBoundingClientRect().top - topInfoHeight;
            var inputReviewScroll = document.getElementById('inputReviewSec').getBoundingClientRect().top - topInfoHeight;
            var questionSectionScroll = document.getElementById('questionSection').getBoundingClientRect().top - topInfoHeight;

            if(questionSectionScroll < 0)
                tabShow = 'questionIcon';
            else if(inputReviewScroll <  0)
                tabShow = 'EmptyCommentIcon';
            else if(mapTopScroll <  0)
                tabShow = 'earthIcon';
            else
                tabShow = 'doubleQuet';

            $('.tabRow.fastAccess').find('.tab.selected').removeClass('selected');
            $('.tabRow.fastAccess').find(`.tab.${tabShow}`).addClass('selected');

        });

        var reviews = {!! $reviews !!};
        var text1 = '';
        var text2 = '';
        reviews.map((item, index) => {
            // showFullReviews({
            //     review: item,
            //     kind: 'append',
            //     sectionId : 'showReviewsMain'
            // });
            if(index%2 == 1)
                text1 += createSmallReviewHtml(item);
            if(index%2 == 0)
                text2 += createSmallReviewHtml(item);
        });
        $('#showReviewsMain1').html(text1);
        $('#showReviewsMain2').html(text2);

    </script>
@endsection