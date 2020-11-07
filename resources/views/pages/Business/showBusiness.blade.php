@extends('pages.Business.businessLayout')


@section('head')

    <style>
    </style>
@endsection

@section('body')
    @include('component.mapMenu')

    <div id="topInfos" class="topInfoFixed">
        <div style="display: flex; padding: 0px 20px">
            <div class="info">
                <h1 style="font-weight: bold;">مغازه دریانی</h1>
                <div class="address">
                    هفت تیر، خیابان مشاهیر تقاطع لطفی
                </div>
            </div>
            <div class="fullyCenterContent pic">
                <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.facebook.com%2F%25D8%25A7%25D9%2588%25D8%25A7%25D9%2586-%25D9%2585%25D9%2587%25D8%25B1-403448319760521%2Fposts&psig=AOvVaw2O2UJMc7RXNLj_TiANfpjd&ust=1604821287488000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNjtiav37-wCFQAAAAAdAAAAABAJ" class="resizeImgClass" onload="fitThisImg(this)">
            </div>
        </div>
        <div class="tabRow fastAccess">
            <div class="tab doubleQuet selected">
                <div class="text">توضیحات</div>
            </div>
            <div class="tab earthIcon">
                <div class="text">نقشه</div>
            </div>
            <div class="tab EmptyCommentIcon">
                <div class="text">دیدگاه شما</div>
            </div>
            <div class="tab questionIcon">
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

    <div class="showBody">
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
                        <img src="{{URL::asset('_images/daryan.jpg')}}" class="resizeImgClass" onload="fitThisImg(this)">
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
                        <div class="tab doubleQuet selected">
                            <div class="text">توضیحات</div>
                        </div>
                        <div class="tab earthIcon">
                            <div class="text">نقشه</div>
                        </div>
                        <div class="tab EmptyCommentIcon">
                            <div class="text">دیدگاه شما</div>
                        </div>
                        <div class="tab questionIcon">
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
                                <div class="fullyCenterContent uPic">
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

                    <script>
                        function openWriteReview(){
                            $('#darkModal').show();
                            $('#inputReviewSec').addClass('openReviewSec');
                        }
                        function closeWriteReview(){
                            $('#darkModal').hide();
                            $('#inputReviewSec').removeClass('openReviewSec');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        function likeDisLikeShop(_element, _like){
            $(_element).parent().addClass('youRate');
            $(_element).parent().find('.selected').removeClass('selected');
            $(_element).addClass('selected');
        }

        createMap('mapDiv', {x: 27.1708978, y: 56.2583517}, [], true);

        $(window).on('scroll', e => {
            let topOfSticky = document.getElementById('stickyIndicator').getBoundingClientRect().top;
            if(topOfSticky < 0 && !$('#topInfos').hasClass('open'))
                $('#topInfos').addClass('open');
            else if(topOfSticky >= 0 && $('#topInfos').hasClass('open'))
                $('#topInfos').removeClass('open');
        })
    </script>
@endsection
