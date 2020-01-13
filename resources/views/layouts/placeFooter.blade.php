<?php $config = \App\models\ConfigModel::first() ?>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/footer.css')}}' />

{{--footer html--}}
<div class="clear-both"></div>
<footer>
    <div class="hideOnPhone screenFooterStyle">
        {{--top footer--}}
        {{--    <div class="hideOnPhone" id="knowOurPartnersDiv">--}}
        {{--        <ul>--}}
        {{--            <li class="footTitle"><b> شرکای ما را بشناسید</b></li>--}}
        {{--        </ul>--}}
        {{--    </div>--}}
        <div id="ourDescriptionDiv">
            <div class="footerLogo">
                <img src="{{URL::asset('images/logo.svg')}}" class="content-icon" width="100%">
            </div>
            <div class="clear-both hideOnScreen"></div>
            <div class="footDown">
                <ul>
                    <li>
                        <p class="aboutShazde">
                            بنده شازده مسافر هستم و همونطوری که از اسمم مشخصه عاشق سفرم و بیشتر اوقاتم رو به سفر میگذرونم.
                            عرضم به خدمتِ شما، اگه ریا نباشه تقریبا میتونم بگم که همه ی اماکن و جاذبه های گردشگری ایران رو از نزدیک دیدم! بخاطر همینم چند وقت پیشا تصمیم گرفتم با یه سری از دوستام بشینیم و همه جاهایی که رفتیم رو برای شما توصیف کنیم و تجربه هامون رو با شما به اشتراک بزاریم که هر وقت دلتون خواست به شهری سفر کنید، قبلش میتونید بیاید اینجا و از جاذبه های دیدنی، خوردنی، شنیدنی و خریدنی اون شهر
                            با خبر بشید و توضیحاتش رو هم کامل بخونین، بعدش راحت دل رو به دریا بزنین و راه بیوفتین.
                        </p>
                    </li>
                    <li class="aboutShazde">شاید بخواهید در خصوص
                        <a href="{{route('policies')}}"> حریم خصوصی و قوانین سایت </a>
                        بیشتر بدانید.</li>
                    <li class="aboutShazde">در صورت نیاز به کمک، صفحه
                        <a href="#"> راهنما </a>
                        را بخوانید و در صورت نیاز
                        <a href="#"> با ما تماس بگیرید. </a>
                    </li>
                    <li class="aboutShazde">این سایت متعلق به مجموعه شازده مسافر می باشد؛
                        <a href="#"> درباره ما </a>
                        بیشتر بدانید.
                    </li>
                    <li class="aboutShazde">شازده مسافر محصولی از
                        <a href="#"> بوگن دیزاین </a>
                        می باشد؛ ما را بیشتر بشناسید.
                    </li>
                </ul>
            </div>
        </div>
        <div class="footerMainBoxes" id="beWithUsInSocialMedia">
            <ul>
                <li class="footTitle">در رسانه ها با ما باشید</li>
                <li>
                    <div class="footerIcon gardeshname"></div>
                    <div>
                        <a class="socialLink" {{($config->gardeshnameNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="http://gardeshname.shazdemosafer.com/">گردشنامه</a>
                    </div>
                </li>
                <li>
                    <div class="footerIcon instagram"></div>
                    <div>
                        <a class="socialLink" {{($config->instagramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.instagram.com/shazdehmosafer/">اینستاگرام</a>
                    </div>
                </li>
                <li>
                    <div class="footerIcon telegram"></div>
                    <div>
                        <a class="socialLink" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://t.me/shazdehmosafer">تلگرام</a>
                    </div>
                </li>
                <li>
                    <div class="footerIcon aparat"></div>
                    <div>
                        <a class="socialLink" {{($config->aparatNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.aparat.com/shazdehmosafer">آپارات</a>
                    </div>
                </li>
                <li>
                    <div class="footerIcon bogendesign"></div>
                    <div>
                        <a class="socialLink" {{($config->bogenNoFollow) ? 'rel="nofollow"' : ''}}  target="_blank" href="http://bogendesign.co">بوگن دیزاین</a>
                    </div>
                </li>
                <li>
                    <a {{($config->linkedinNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.linkedin.com/in/shazde-mosafer-652817143/">
                        <div class="footerIcon linkedin"></div>
                    </a>
                    <a {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.facebook.com/profile.php?id=100016313805277&ref=br_rs">
                        <div class="footerIcon facebook"></div>
                    </a>
                    <a target="_blank" {{($config->pinterestNoFollow) ? 'rel="nofollow"' : ''}} href="https://www.pinterest.co.uk/shazdemosafer/">
                        <div class="footerIcon pinterest"></div>
                    </a>
                    <a target="_blank" {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}} href="https://twitter.com/shazdemosafer">
                        <div class="footerIcon twitter"></div>
                    </a>
                    <a target="_blank" {{($config->googlePlusNoFollow) ? 'rel="nofollow"' : ''}} href="https://plus.google.com/113786987503996741617">
                        <div class="footerIcon googlePlus"></div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footerMainBoxes">
            <ul>
                <li class="footTitle">بیشتر بشناسید</li>
                <li>
                    <a href="#">اصطلاحات کلی</a>
                </li>
                <li>
                    <a href="#">لباس محلی</a>
                </li>
                <li>
                    <a href="#">صنایع دستی</a>
                </li>
                <li>
                    <a href="#">سوغات محلی</a>
                </li>
                <li>
                    <a href="#">غذاهای محلی</a>
                </li>
                <li>
                    <a href="#">گویش محلی</a>
                </li>
            </ul>
        </div>
        <div class="footerMainBoxes" >
            <ul>
                <li class="footTitle">شازده در زبان های دیگر</li>
                <li>
                    <select class="selectLanguage">
                        <option value="persian" selected>فارسی</option>
                        <option value="english" disabled>English</option>
                        <option value="spanish" disabled>العربية</option>
                        <option value="french" disabled>Türkçe</option>
                    </select>
                </li>

                <li class="footTitle hideOnPhone">دقیق تر شوید</li>
                <li class="hideOnPhone">
                    <a href="#">سفرهای ماجراجویی</a>
                </li>
                <li class="hideOnPhone">
                    <a href="#">طبیعت گردی</a>
                </li>
                <li class="hideOnPhone">
                    <a href="#">بوم گردی</a>
                </li>
                <li class="hideOnPhone">
                    <a href="#">گردشنامه</a>
                </li>
            </ul>
        </div>
        <div class="footerMainBoxes" >
            <ul>
                <li class="footTitle">بیشتر جستجو کنید</li>
                <li>
                    <a href="#">هتل ها</a>
                </li>
                <li>
                    <a href="#">رستوران ها</a>
                </li>
                <li>
                    <a href="#">جاذبه ها</a>
                </li>
                <li>
                    <a href="{{route('tickets')}}">بلیط</a>
                </li>
                <li>
                    <a href="#">جشنواره ها</a>
                </li>
                <li>
                    <a href="#">آداب و رسوم</a>
                </li>
            </ul>
        </div>
        {{--down footer--}}
        <div class="clear-both"></div>
    </div>



    <div class="footerPhoneMenuBar hideOnScreen">
        <div data-toggle="modal" data-target="#others">
            <span>سایر امکانات</span>
            <span class="ui_icon more-horizontal"></span>
        </div>
        <div data-toggle="modal" data-target="#register">
            <span>ثبت نام</span>
            <span class="ui_icon plus-circle"></span>
        </div>
        <div data-toggle="modal" data-target="#search">
            <span>جست‌و‌جو</span>
            <span class="ui_icon search"></span>
        </div>
        <div data-toggle="modal" data-target="#profile">
            <span>ورود</span>
            <span class="ui_icon member"></span>
        </div>
    </div>

    <div class="container">
        <!-- The Modals -->

        <div class="modal fade" id="others">
            <div class="mainPopUp leftPopUp recentViewLeftBar">

                {{--each menu--}}
                <div>
                    <div class="lp_others_content" id="lp_others_recentlyViews">
                        <div class="lp_others_titles"> بازدید‌های اخیر </div>
                        <div class="mainContainerBookmarked">
                            <div id="masthead-recent" class="masthead-recent-class mg-tp-0Imp">
                                <a class="lp_others_recentView" target="_self" href="">
                                    <div class="lp_others_rvPicBox col-xs-8">
                                        <div class="lp_others_rvPic" style="background-image: url(http://localhost:8080/assets/_images/hotels/hotel_kowsar/f-1.jpg);"></div>
                                    </div>
                                    <div class="col-xs-4 placeDetailsLeftBar">
                                        <div class="">هتل کوثر</div>
                                        <div class="lp_others_rating">
                                            <div class="ui_bubble_rating bubble_45"></div>
                                            <br>3 مشاهده
                                        </div>
                                        <div class="">اصفهان</div>
                                    </div>
                                </a>
                            </div>
                            <div id="masthead-recent" class="masthead-recent-class">
                                <a class="lp_others_recentView" target="_self" href="">
                                    <div class="lp_others_rvPicBox col-xs-8">
                                        <div class="lp_others_rvPic" style="background-image: url(http://localhost:8080/assets/_images/hotels/hotel_kowsar/f-1.jpg);"></div>
                                    </div>
                                    <div class="col-xs-4 placeDetailsLeftBar">
                                        <div class="">هتل کوثر</div>
                                        <div class="lp_others_rating">
                                            <div class="ui_bubble_rating bubble_45"></div>
                                            <br>3 مشاهده
                                        </div>
                                        <div class="">اصفهان</div>
                                    </div>
                                </a>
                            </div>
                            <div id="masthead-recent" class="masthead-recent-class">
                                <a class="lp_others_recentView" target="_self" href="">
                                    <div class="lp_others_rvPicBox col-xs-8">
                                        <div class="lp_others_rvPic" style="background-image: url(http://localhost:8080/assets/_images/hotels/hotel_kowsar/f-1.jpg);"></div>
                                    </div>
                                    <div class="col-xs-4 placeDetailsLeftBar">
                                        <div class="">هتل کوثر</div>
                                        <div class="lp_others_rating">
                                            <div class="ui_bubble_rating bubble_45"></div>
                                            <br>3 مشاهده
                                        </div>
                                        <div class="">اصفهان</div>
                                    </div>
                                </a>
                            </div>
                            <div class="bottomBarContainer"></div>
                        </div>
                    </div>

                    <div class="lp_others_content hidden" id="lp_others_messages">
                        <div class="lp_others_titles"> اعلانات </div>
                        <div class="lp_others_noMessages">هیچ پیامی موجود نیست</div>
                    </div>

                    <div class="lp_others_content hidden" id="lp_others_mark">
                        <div class="lp_others_titles"> نشان‌گذاری شده‌ها </div>
                        <div class="mainContainerBookmarked">
                            <div id="masthead-recent" class="masthead-recent-class mg-tp-0Imp">
                                <a class="lp_others_recentView" target="_self" href="">
                                    <div class="lp_others_rvPicBox col-xs-8">
                                        <div class="lp_others_rvPic" style="background-image: url(http://localhost:8080/assets/_images/hotels/hotel_kowsar/f-1.jpg);"></div>
                                    </div>
                                    <div class="col-xs-4 placeDetailsLeftBar">
                                        <div class="">هتل کوثر</div>
                                        <div class="lp_others_rating">
                                            <div class="ui_bubble_rating bubble_45"></div>
                                            <br>3 مشاهده
                                        </div>
                                        <div class="">اصفهان</div>
                                    </div>
                                </a>
                            </div>
                            <div id="masthead-recent" class="masthead-recent-class">
                                <a class="lp_others_recentView" target="_self" href="">
                                    <div class="lp_others_rvPicBox col-xs-8">
                                        <div class="lp_others_rvPic" style="background-image: url(http://localhost:8080/assets/_images/hotels/hotel_kowsar/f-1.jpg);"></div>
                                    </div>
                                    <div class="col-xs-4 placeDetailsLeftBar">
                                        <div class="">هتل کوثر</div>
                                        <div class="lp_others_rating">
                                            <div class="ui_bubble_rating bubble_45"></div>
                                            <br>3 مشاهده
                                        </div>
                                        <div class="">اصفهان</div>
                                    </div>
                                </a>
                            </div>
                            <div id="masthead-recent" class="masthead-recent-class">
                                <a class="lp_others_recentView" target="_self" href="">
                                    <div class="lp_others_rvPicBox col-xs-8">
                                        <div class="lp_others_rvPic" style="background-image: url(http://localhost:8080/assets/_images/hotels/hotel_kowsar/f-1.jpg);"></div>
                                    </div>
                                    <div class="col-xs-4 placeDetailsLeftBar">
                                        <div class="">هتل کوثر</div>
                                        <div class="lp_others_rating">
                                            <div class="ui_bubble_rating bubble_45"></div>
                                            <br>3 مشاهده
                                        </div>
                                        <div class="">اصفهان</div>
                                    </div>
                                </a>
                            </div>
                            <div class="bottomBarContainer"></div>
                        </div>
                    </div>

                    <div class="lp_others_content hidden" id="lp_others_myTravel">
                        <div class="lp_others_titles">
                            <a class="trips-header" target="_self" href="{{URL('myTrips')}}">سفرهای من </a>
                        </div>

                        <div id="masthead-trips" class="masthead-trips-class">
                            <div id="masthead-trips-tiles-region" class="masthead-trips-tiles-region-class">
                                <div id="trips-tiles" class="column trips-tiles-class">
                                    <div>
                                        <a onclick="showPopUp()" class="single-tile is-create-trip">
                                            <div class="tile-content">
                                                <span class="ui_icon plus"></span>
                                                <div class="create-trip-text">ایجاد سفر</div>
                                            </div>
                                        </a>

                                        {{--                                        @foreach($trips as $trip)--}}
                                        <div id="mainDivTripImageRecentViewBodyProfile"
                                             {{--                                                 onclick="document.location.href = '{{route('tripPlaces', ['tripId' => $trip->id])}}'" --}}
                                             class="trip-images ui_columns is-gapless is-multiline is-mobile">
                                            {{--                                                @if($trip->placeCount > 0)--}}
                                            {{--                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic1}}') repeat 0 0; background-size: 100% 100%"></div>--}}
                                            {{--                                                @else--}}
                                            <div class="bg-color-recentlyViewBodyProfile trip-image trip-image-empty ui_column is-6"></div>
                                            {{--                                                @endif--}}
                                            {{--                                                @if($trip->placeCount > 1)--}}
                                            {{--                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic2}}')  repeat 0 0; background-size: 100% 100%"></div>--}}
                                            {{--                                                @else--}}
                                            {{--                                                    <div class="bg-color-recentlyViewBodyProfile trip-image trip-image-empty ui_column is-6"></div>--}}
                                            {{--                                                @endif--}}
                                            {{--                                                @if($trip->placeCount > 2)--}}
                                            {{--                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic3}}') repeat 0 0; background-size: 100% 100%"></div>--}}
                                            {{--                                                @else--}}
                                            {{--                                                    <div class="bg-color-recentlyViewBodyProfile trip-image trip-image-empty ui_column is-6"></div>--}}
                                            {{--                                                @endif--}}
                                            {{--                                                @if($trip->placeCount > 3)--}}
                                            {{--                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic4}}') repeat 0 0; background-size: 100% 100%"></div>--}}
                                            {{--                                                @else--}}
                                            {{--                                                    <div class="bg-color-recentlyViewBodyProfile trip-image trip-image-empty ui_column is-6"></div>--}}
                                            {{--                                                @endif--}}
                                        </div>
                                        <div class="create-trip-text font-size-12em">
                                            {{--                                                {{$trip->name}} --}}
                                            سفر به زاینده رود
                                        </div>
                                        {{--                                            @if($trip->to_ != "" && $trip->from_ != "")--}}
                                        <div class="create-trip-text" id="createTripTextRecentlyViewBodyProfile">
                                            {{--                                                    {{convertStringToDate2($trip->to_)}}--}}29/10/1398
                                            <p style="">الی</p>
                                            {{--                                                    {{convertStringToDate2($trip->from_)}}--}}1/11/1398
                                        </div>
                                        {{--                                            @else--}}
                                        {{--                                                <div class="create-trip-text" id="createTripTextRecentlyViewBodyProfileElse">بدون تاریخ</div>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        @endforeach--}}
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div>--}}
{{--                            <div class="lp_others_createTrip">--}}
{{--                                <span class="ui_icon plus"></span>--}}
{{--                                <div class="lp_others_createTripText">ایجاد سفر</div>--}}
{{--                            </div>--}}
{{--                            --}}{{--<div onclick="document.location.href = 'http://localhost:8080/shazde/public/tripPlaces/1'" class="trip-images ui_columns is-gapless is-multiline is-mobile">--}}
{{--                            --}}{{--<div class="trip-image ui_column is-6 placeCount0" style="background: url('http://localhost:8080/assets/_images/hotels/hotel_a_pedari/1')"></div>--}}
{{--                            --}}{{--<div class="trip-image trip-image-empty ui_column is-6  placeCount0Else"></div>--}}
{{--                            --}}{{--<div class="trip-image trip-image-empty ui_column is-6 placeCount0Else"></div>--}}
{{--                            --}}{{--<div class="trip-image trip-image-empty ui_column is-6 placeCount0Else"></div>--}}
{{--                            --}}{{--</div>--}}
{{--                            --}}{{--<div class="lp_others_createTripText">یزد </div>--}}
{{--                            --}}{{--<div class="lp_others_createTripText">--}}
{{--                            --}}{{--1398/08/17--}}
{{--                            --}}{{--<p>الی</p>--}}
{{--                            --}}{{--1398/08/14--}}
{{--                            --}}{{--</div>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="lp_phoneMenuBar">
                    <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_myTravel', this)">
                        <div class="ui_icon my-trips lp_icons"></div>
                        <div>سفرهای من</div>
                    </div>
                    <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_mark', this)">
                        <div class="ui_icon casino lp_icons"></div>
                        <div>نشان‌گذاری شده‌ها</div>
                    </div>
                    <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_messages', this)">
                        <div class="ui_icon notification-bell lp_icons"></div>
                        <div>اعلانات</div>
                    </div>
                    <div class="lp_eachMenu lp_selectedMenu" onclick="lp_selectMenu('lp_others_recentlyViews', this)">
                        <div class="ui_icon search lp_icons"></div>
                        <div>بازدیدهای اخیر</div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="register">
            <div class="mainPopUp leftPopUp">
                <div id="lp_register">
                    <button type="button" class="btn btn-warning pp_btns">ثبت نام</button>
                    <button type="button" class="btn btn-primary pp_btns">ورود</button>
                    <a style="font-size: 1.25em">ویرایش اطلاعات</a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="search">
            <div class="mainPopUp leftPopUp">

                <div class="pSC_tilte">
                    <div>شما در حال حاضر در شهر <span class="pSC_cityTilte">اصفهان </span>هستید</div>
                    <button type="button" class="btn btn-danger" style="font-size: 0.75em">تغییر دهید</button>
                </div>
                <div class="pSC_cityDescription">شما می توانید به راحتی صفحات زیر را در  <span>استان اصفهان </span>مشاهده نمایید</div>
                <div class="pSC_boxOfDetails">
                    <div class="pSC_choiseDetailsText">به سادگی انتخاب کنید</div>
                    <div class="pSC_boxOfCityDetailsText">
                        <span>مشاهده صفحه شهر اصفهان</span>
                        <span class="pSC_boxOfCityDetailsText2">در استان اصفهان</span>
                    </div>
                    <div>
                        <div class="pSC_boxOfCityDetails">
                            <div class="pSC_cityDetails">جاذبه‌های اصفهان</div>
                            <div class="pSC_cityDetails">هتل‌های اصفهان</div>
                        </div>
                        <div class="pSC_boxOfCityDetails">
                            <div class="pSC_cityDetails">مقاله‌های اصفهان</div>
                            <div class="pSC_cityDetails">رستوران‌های اصفهان</div>
                        </div>
                        <div class="pSC_boxOfCityDetails">
                            <div class="pSC_cityDetails">صنایع دستی‌های اصفهان</div>
                            <div class="pSC_cityDetails">غذای محلی‌های اصفهان</div>
                        </div>
                    </div>
                </div>

                <div class="hideOnScreen phoneFooterStyle">
                    <div class="phoneFooterLogo">
                        <img src="{{URL::asset('images/LOGOnew.svg')}}" class="content-icon" width="100%">
                    </div>
                    <div class="clear-both"></div>
                    <div class="phoneDescription">
                        بنده شازده مسافر هستم و همونطوری که از اسمم مشخصه عاشق سفرم و بیشتر اوقاتم رو به سفر میگذرونم.
                        عرضم به خدمتِ شما، اگه ریا نباشه تقریبا میتونم بگم که همه ی اماکن و جاذبه های گردشگری ایران رو از نزدیک دیدم! بخاطر همینم چند وقت پیشا تصمیم گرفتم با یه سری از دوستام بشینیم و همه جاهایی که رفتیم رو برای شما توصیف کنیم و تجربه هامون رو با شما به اشتراک بزاریم که هر وقت دلتون خواست به شهری سفر کنید، قبلش میتونید بیاید اینجا و از جاذبه های دیدنی، خوردنی، شنیدنی و خریدنی اون شهر
                        با خبر بشید و توضیحاتش رو هم کامل بخونین، بعدش راحت دل رو به دریا بزنین و راه بیوفتین.
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="profile">
            <div class="mainPopUp rightPopUp">
                <div id="lp_register">
                    <button type="button" class="btn btn-warning pp_btns">صفحه پروفایل</button>
                    <button type="button" class="btn btn-primary pp_btns">صفحه من</button>
                    <button type="button" class="btn btn-danger pp_btns">خروج</button>
                    <a style="font-size: 1.25em">ویرایش اطلاعات</a>
                </div>
            </div>
        </div>

    </div>

</footer>
