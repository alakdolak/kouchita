@extends('pages.Business.businessLayout')


@section('head')
    <style>
        .plPc-0{
            padding-left: 0px;
        }
        .prPc-0{
            padding-right: 0px;
        }
        div[class^="col-"]{
            float: right;
        }
        @media (max-width: 991px) {
            div[class^="col-md"]{
                width: 100%;
            }
            .plPc-0{
                padding-left: 15px;
            }
            .prPc-0{
                padding-right: 15px;
            }
        }
    </style>

    <style>

        .topInfoFixed .infosSec{
            display: flex;
            padding: 0px 20px;
        }

        @media (max-width: 1200px) {
            .reviewButs .but{
                font-size: 10px;
            }
        }
        @media (max-width: 991px) {
            .showBody .infoSec{
                height: auto;
            }
        }
        @media (max-width: 767px) {
            .openReviewSec{
                position: fixed;
                top: 0px;
                right: 0px;
                padding: 0;
                height: 100vh;
                z-index: 999999;
                overflow-y: auto;
            }
            .openReviewSec .bodySec{
                min-height: 50vh;
            }
            .topInfoFixed .infosSec{
                padding: 0px 10px;
            }
            .topInfoFixed .pic{
                width: 60px;
                height: 45px;
            }
            .mainHeaderButts{
                margin-top: 15px;
            }
            .mainHeaderButts > div{
                flex-direction: column-reverse;
            }
            .mainHeaderButts > div .text{
                font-size: .7em;
            }
            .fastAccess{
                justify-content: space-evenly;
            }
            .fastAccess .tab{
                margin: 0px;
                flex-direction: column;
                font-size: 18px;
            }
            .fastAccess .tab .text{
                font-size: .5em;
            }
            .topInfoFixed .mainHeaderButts{
                display: none;
            }
            .topInfoFixed .tabRow{
                width: 100%;
            }
            .topInfoFixed{
                height: 140px;
                top: -140px;
            }

        }
    </style>
@endsection

@section('body')
    
    @include('component.smallShowReview')

    <div id="topInfos" class="topInfoFixed">
        <div class="infosSec">
            <div class="info">
                <h1 style="font-weight: bold;">{{$localShop->name}}</h1>
                <div class="address"> {{$localShop->address}} </div>
            </div>
            <div class="fullyCenterContent pic" onclick="openAlbum('mainPics')" style="cursor: pointer">
                <img src="{{$localShop->mainPic->pic['f']}}" class="resizeImgClass" onload="fitThisImg(this)">
            </div>
        </div>
        <div class="tabRow fastAccess">
            @if(isset($localShop->description))
                <div class="tab doubleQuet selected" onclick="goToSection('description')">
                    <div class="text">توضیحات</div>
                </div>
            @endif
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
                <h1 style="font-weight: bold;">{{$localShop->name}}</h1>
                <div class="address">{{$localShop->address}}</div>
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
                <div class="col-md-7 plPc-0">
                    <div id="mainSlider" class="fullyCenterContent bodySec imgSliderSec swiper-container" style="height: 420px" onclick="openAlbum('mainPics')">
                        <div class="swiper-wrapper">
                            @foreach($localShop->pics as $pic)
                                <div class="swiper-slide" style="overflow: hidden">
                                    <img src="{{$pic->pic['s']}}" alt="{{$localShop->name}}" class="resizeImgClass" onload="fitThisImg(this)">
                                </div>
                            @endforeach
                        </div>
                        <div class="left-nav left-nav-header swiper-button-next mainSliderNavBut"></div>
                        <div class="right-nav right-nav-header swiper-button-prev mainSliderNavBut"></div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="bodySec infoSec">
                        <div class="iWasHere flagIcon">من اینجا بودم</div>
                        <div class="boldText">سوپر مارکت دریانی</div>
                        <div class="normText">{{$localShop->address}}</div>
                        <div class="phone telephoneIconAfter">
                            @foreach($localShop->telephone as $telephone)
                                <a href="tel:{{$telephone}}">{{$telephone}}</a>
                            @endforeach
                        </div>
                        <div class="groupSec">
                            <div class="boldText mr4bef clockIcon">ساعات کاری</div>
                            <div class="weekTime">
                                @if($localShop->isBoarding == 0)
                                    <div>
                                        <span>روزهای هفته:</span>
                                        <span>
                                            {{$localShop->inWeekOpenTime == null ? '' : $localShop->inWeekOpenTime}}
                                            تا
                                            {{$localShop->inWeekCloseTime == null ? '' : $localShop->inWeekCloseTime}}
                                        </span>
                                    </div>
                                    <div>
                                        <span>قبل تعطیلی:</span>
                                        @if($localShop->afterClosedDayIsOpen == 1)
                                        <span>
                                            {{$localShop->afterClosedDayOpenTime == null ? '' : $localShop->afterClosedDayOpenTime}}
                                            تا
                                            {{$localShop->afterClosedDayCloseTime == null ? '' : $localShop->afterClosedDayCloseTime}}
                                        </span>
                                        @else
                                            <span class="closse">تعطیل</span>
                                        @endif
                                    </div>
                                @else
                                    <div>
                                        <span style="color: green;">شبانه روزی</span>
                                    </div>
                                @endif
                                <div>
                                    <span>روزهای تعطیل:</span>
                                    @if($localShop->closedDayIsOpen == 1)
                                        <span>
                                            {{$localShop->closedDayOpenTime == null ? '' : $localShop->closedDayOpenTime}}
                                            تا
                                            {{$localShop->closedDayCloseTime == null ? '' : $localShop->closedDayCloseTime}}
                                        </span>
                                    @else
                                        <span class="closse">تعطیل</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{--the best localShop section--}}

{{--                        <div class="groupSec">--}}
{{--                            <div class="boldText mr4bef fullStarRating">انتخاب بهترین مغازه دار</div>--}}
{{--                            <div class="normText" style="padding: 0px 20px;">--}}
{{--                                آیا شما از مغازه و مغازه دار راضی بودید؟--}}
{{--                            </div>--}}
{{--                            <div class="ratingButtons">--}}
{{--                                <div class="likeSec" onclick="likeDisLikeShop(this, 1)">--}}
{{--                                    <div class="fullyCenterContent icon LikeIconEmpty">--}}
{{--                                        <span class="count">102</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="fullyCenterContent result">--}}
{{--                                        <div>--}}
{{--                                            <span class="name">محلی : </span>--}}
{{--                                            <span class="num">100</span>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <span class="name">غیر محلی : </span>--}}
{{--                                            <span class="num">32</span>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <span class="name">نامشخص : </span>--}}
{{--                                            <span class="num">32</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="disLikeSec" onclick="likeDisLikeShop(this, -1)">--}}
{{--                                    <div class="fullyCenterContent icon DisLikeIconEmpty">--}}
{{--                                        <span class="count">243</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="fullyCenterContent result">--}}
{{--                                        <div>--}}
{{--                                            <span class="name">محلی : </span>--}}
{{--                                            <span class="num">100</span>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <span class="name">غیر محلی : </span>--}}
{{--                                            <span class="num">32</span>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <span class="name">نامشخص : </span>--}}
{{--                                            <span class="num">32</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

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
                        @if(isset($localShop->description))
                            <div class="tab doubleQuet selected" onclick="goToSection('description')">
                                <div class="text">توضیحات</div>
                            </div>
                        @endif
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

            @if(isset($localShop->description))
                <div class="row">
                    <div class="col-md-12">
                        <div class="bodySec pad-15">
                            <h2 class="headerSec doubleQuet">توضیحات</h2>
                            <div class="descriptionBody" style="color: #636363;">{{$localShop->description}}</div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-3">
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
                </div>
                <div class="col-md-9 prPc-0">
                    <div id="mapDiv" class="bodySec map"></div>
                </div>
            </div>

            <div class="row">
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
                            <div class="but addPhotoIcon"> عکس اضافه کنید.</div>
                            <div class="but addVideoIcon">ویدیو اضافه کنید.</div>
                            <div class="but addVideo360Icon">ویدیو 360 اضافه کنید.</div>
                            <div class="but addFriendIcon">دوستنتان را TAG کنید.</div>
                        </div>
                        <div class="reviewQues showWhenNeed"></div>
                        <div class="reviewSubmit showWhenNeed">ارسال دیدگاه</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
                    <div class="fullyCenterContent bodySec adver sideMap">تبلیغ</div>
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
    <script async src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0"></script>

    <script>
        var localShop = {!! $localShop !!};
        var mainMap;

        $(window).ready(() => {
            initMap();
            autosize($('.autoResizeTextArea'));
            new Swiper('#mainSlider', {
                spaceBetween: 0,
                centeredSlides: true,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    prevEl: '.swiper-button-next',
                    nextEl: '.swiper-button-prev',
                },
            });
        });

        function openAlbum(_kind){
            if(_kind == 'mainPics'){
                var showPics = [];
                localShop.pics.map(item => {
                    showPics.push({
                        id: `main_${item.id}`,
                        sidePic: item.pic.l,
                        mainPic: item.pic.main,
                        userPic: localShop.user.userPic,
                        userName: localShop.user.username,
                        showInfo: false,
                    })
                });
                createPhotoModal('آلبوم عکس', showPics) ; //in photoAlbumModal.blade.php
            }
        }

        function initMap(){
            var mapOptions = {
                center: new google.maps.LatLng(localShop.lat, localShop.lng),
                zoom: 15,
                styles: window.googleMapStyle
            };
            var mapElementSmall = document.getElementById('mapDiv');
            mainMap = new google.maps.Map(mapElementSmall, mapOptions);

            new google.maps.Marker({
                position: new google.maps.LatLng(localShop.lat, localShop.lng)
            }).setMap(mainMap);
        }

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

        var text1 = '';
        var text2 = '';
        localShop.review.map((item, index) => {
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
