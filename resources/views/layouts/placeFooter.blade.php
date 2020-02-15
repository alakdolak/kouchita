<?php $config = \App\models\ConfigModel::first() ?>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/footer.css')}}' />
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>

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
        <div data-toggle="modal" data-target="#otherPossibilities">
            <span class="footerMenuBarLinks">سایر امکانات</span>
            <span class="ui_icon more-horizontal"></span>
        </div>
        @if(Auth::check())
            <div data-toggle="modal" data-target="#profilePossibilities">
                <span class="footerMenuBarLinks">امکانات کاربر</span>
                <span class="ui_icon memberPossibilities"></span>
            </div>
        @else
            <div class="login-button">
                <span class="footerMenuBarLinks">ثبت نام</span>
                <span class="ui_icon plus-circle"></span>
            </div>
        @endif
        <div onclick="openProSearch()">
            <span class="footerMenuBarLinks">جست‌و‌جو</span>
            <span class="ui_icon search"></span>
        </div>
        @if(Auth::check())
            <div data-toggle="modal" data-target="#profile" class="profileBtn">
                <div class="profileBtnText">
                    <span>سلام</span>
                    <span>{{auth()->user()->username}}</span>
                </div>
                <div class="profilePicFooter circleBase type2">
                    <img {{--src="{{ $userPic }}" --}}>
                </div>
            </div>
        @else
            <div class="login-button">
                <span class="footerMenuBarLinks">ورود</span>
                <span class="ui_icon member"></span>
            </div>
        @endif
    </div>

    <div class="container">

        <!-- The Modals -->

        <div class="modal fade" id="profilePossibilities">
{{--            @if(true)--}}
            @if(isset($isArticle) && $isArticle == 1)
                <div class="mainPopUp leftPopUp" style="padding: 7px">
                    <div class="lp_ar_searchTitle">جستجو خود را محدودتر کنید</div>

                    <div class="lp_ar_filters">
                        <div class="lp_ar_eachFilters lp_ar_rightFilters lp_ar_selectedMenu" onclick="lp_selectArticleFilter('lp_ar_rightFilters' ,this)">دسته‌بندی مطالب</div>
                        <div class="lp_ar_eachFilters" onclick="lp_selectArticleFilter('lp_ar_leftFilters' ,this)">مطالب مشابه</div>
                    </div>
                    {{--right menu--}}
                    <div id="lp_ar_rightFilters" class="lp_ar_contentOfFilters">
                        <div class="gnContentsCategory">
                            <div id="rightCategory" style="width: 50%; padding: 0px 5px">
                                <div class="gnColOFContentsCategory">
                                    <div>
                                        <div>
                                            <span id="CategoryName_1" class="gnTitleOfPlaces" onclick="searchInCategory(this)" style="cursor: pointer">تکنولوژی</span>
                                            <span class="gnNumberOfPlaces">۲</span>
                                        </div>
                                        <ul class="gnUl">
                                            <li class="gnLi">
                                                <span id="CategoryName_2" onclick="searchInCategory(this)" style="cursor: pointer">بلاک چین</span>
                                                <span class="gnNumberOfPlaces">۲</span>
                                            </li>
                                            <li class="gnLi">
                                                <span id="CategoryName_3" onclick="searchInCategory(this)" style="cursor: pointer">VR</span>
                                                <span class="gnNumberOfPlaces">۲</span>
                                            </li>
                                            <li class="gnLi">
                                                <span id="CategoryName_14" onclick="searchInCategory(this)" style="cursor: pointer">BIGDATA</span>
                                                <span class="gnNumberOfPlaces">۱</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="gnColOFContentsCategory">
                                    <div>
                                        <div>
                                            <span id="CategoryName_7" class="gnTitleOfPlaces" onclick="searchInCategory(this)" style="cursor: pointer">سفر</span>
                                            <span class="gnNumberOfPlaces">۳</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="gnColOFContentsCategory">
                                    <div>
                                        <div>
                                            <span id="CategoryName_15" class="gnTitleOfPlaces" onclick="searchInCategory(this)" style="cursor: pointer">یزد</span>
                                            <span class="gnNumberOfPlaces">۱</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="leftCategory" style="width: 50%; padding: 0px 5px">
                                    <div class="gnColOFContentsCategory">
                                        <div>
                                            <div>
                                                <span id="CategoryName_4" class="gnTitleOfPlaces" onclick="searchInCategory(this)" style="cursor: pointer">غذا</span>
                                                <span class="gnNumberOfPlaces">۳</span>
                                            </div>
                                            <ul class="gnUl">
                                                <li class="gnLi">
                                                    <span id="CategoryName_5" onclick="searchInCategory(this)" style="cursor: pointer">فست فود</span>
                                                    <span class="gnNumberOfPlaces">۳</span>
                                                </li>
                                                <li class="gnLi">
                                                    <span id="CategoryName_13" onclick="searchInCategory(this)" style="cursor: pointer">سنتی</span>
                                                    <span class="gnNumberOfPlaces">۳</span>
                                                </li>
                                                <li class="gnLi">
                                                    <span id="CategoryName_17" onclick="searchInCategory(this)" style="cursor: pointer">استیک</span>
                                                    <span class="gnNumberOfPlaces">۰</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="gnColOFContentsCategory">
                                        <div>
                                            <div>
                                                <span id="CategoryName_8" class="gnTitleOfPlaces" onclick="searchInCategory(this)" style="cursor: pointer">تفریح</span>
                                                <span class="gnNumberOfPlaces">۳</span>
                                            </div>
                                            <ul class="gnUl">
                                                <li class="gnLi">
                                                    <span id="CategoryName_9" onclick="searchInCategory(this)" style="cursor: pointer">استخر</span>
                                                    <span class="gnNumberOfPlaces">۱</span>
                                                </li>
                                                <li class="gnLi">
                                                    <span id="CategoryName_12" onclick="searchInCategory(this)" style="cursor: pointer">شهربازی</span>
                                                    <span class="gnNumberOfPlaces">۰</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div></div>
                        </div>

                        <div class="lp_ar_borderBottom"></div>

                        <div>
                            @if($stateCome != null)
                                <div>
                                    شما در استان {{$stateCome->name}}
                                    @if($cityCome != null)
                                        - شهر {{$cityCome->name}}
                                        @if($placeCome != null)
                                            - {{$placeCome->name}}
                                        @endif
                                    @endif
                                    هستید
                                </div>
                                <div>
                                    <a href="{{route('article.list', ['type' => 'state', 'search' => $stateCome->name])}}">نمایش محتوای استان {{$stateCome->name}}</a>
                                </div>
                                @if($cityCome != null)
                                    <div>
                                        <a href="{{route('article.list', ['type' => 'city', 'search' => $cityCome->name])}}">نمایش محتوای شهر {{$cityCome->name}}</a>
                                    </div>
                                @endif
                                @if($placeCome != null)
                                    <div>
                                        <a href="{{route('article.list', ['type' => 'place', 'search' => $placeCome->kindPlaceId.'_'.$placeCome->id])}}">نمایش محتوای  {{$placeCome->name}}</a>
                                    </div>
                                @endif
                            @endif
                            <input type="text" id="searchCityInArticleInput" class="gnInput" placeholder="شهر موردنظر خود را وارد کنید" readonly>
                        </div>

                        <div class="lp_ar_borderBottom"></div>

                        <div class="gnInput">
                            <input type="text" class="gnInputonInput" id="pcSearchInput" placeholder="عبارت مورد نظر خود را">
                            <button class="gnSearchInputBtn" type="submit" onclick="searchInArticle('pcSearchInput')">جستجو کنید</button>
                        </div>
                    </div>

                    {{--left menu--}}
                    <div id="lp_ar_leftFilters" class="lp_ar_contentOfFilters hidden">
                        <div class="content-2col hidden">
                                <div class="im-entry-thumb" style="background-image: url('http://localhost/assets/_images/posts/117/mainPic.jpg'); background-size: 100% 100%;">
                                    <div class="im-entry-header">
                                        <div class="im-entry-category">
                                            <div class="iranomag-meta clearfix">
                                                <div class="cat-links im-meta-item">
                                                    <a class="im-catlink-color-2079" href="http://localhost/kouchita/public/article/%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF">غذا</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="http://localhost/kouchita/public/article/%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF" rel="bookmark">
                                            <h1 class="im-entry-title" style="color: white;">
                                                کوه ریگ یزد
                                            </h1>
                                        </a>
                                    </div>
                                </div>
                                <div class="im-entry">
                                    <div class="im-entry-content">
                                        <a href="http://localhost/kouchita/public/article/%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF" rel="bookmark">
                                            dfdafvsdafkdj fdjhfjdhfo dsfjsd vnsv کوه ریگ یزد سسرسرسیبرسیبی باسیبمتاس یبتک سیبسیکبدسیتنبسیتکمبر کسیمبرس
                                            sdvjsdhvsdhpsd
                                            sdfsdjgvpiawhf [adsifvsdfshdvgsd;f
                                        </a>
                                    </div>

                                    <p class="im-entry-footer">
                                    </p><div class="iranomag-meta clearfix">
                                        <div class="posted-on im-meta-item">
                                            <span class="entry-date published updated">شنبه ۱۹ بهمن ۱۳۹۸</span>
                                        </div>
                                        <div class="comments-link im-meta-item">
                                            <a href="">
                                                <i class="fa fa-comment-o"></i>۳
                                            </a>
                                        </div>
                                        <div class="author vcard im-meta-item">
                                            <a class="url fn n" href="/author/writer/">
                                                <i class="fa fa-user"></i>
                                                admin
                                            </a>
                                        </div>
                                        <div class="post-views im-meta-item">
                                            <i class="fa fa-eye"></i>۴
                                        </div>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                        <div class="widget widget_impv_display_widget">
                            <div class="widget-head"><strong class="widget-title">
                                    پربازدیدترین ها
                                </strong>
                                <div class="widget-head-bar"></div>
                                <div class="widget-head-line"></div>
                            </div>
                            <div id="impv_display_widget-4-tab2" class="widget_pop_body">
                                <ul class="popular_by_views_list">
                                    <li class="im-widget clearfix">
                                        <figure class="im-widget-thumb">
                                            <a href="http://localhost/kouchita/public/article/%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B9%D8%B5%D8%B1_%D8%A2%D8%A8%D8%A7%D8%AF_%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B9%D8%B5%D8%B1_%D8%A2%D8%A8%D8%A7%D8%AF_%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B9%D8%B5%D8%B1_%D8%A2%D8%A8%D8%A7%D8%AF" title="سفر به یه روستای خوب و از دست رفته ی با ارزش یزد &quot;روستای عصر آباد&quot;">
                                                <img src="http://localhost/assets/_images/posts/118/mainPic.jpg" alt="روستای عصر آباد">
                                            </a>
                                        </figure>
                                        <div class="im-widget-entry">
                                            <header class="im-widget-entry-header">
                                                <h4 class="im-widget-entry-title">
                                                    <a href="http://localhost/kouchita/public/article/%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B9%D8%B5%D8%B1_%D8%A2%D8%A8%D8%A7%D8%AF_%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B9%D8%B5%D8%B1_%D8%A2%D8%A8%D8%A7%D8%AF_%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B9%D8%B5%D8%B1_%D8%A2%D8%A8%D8%A7%D8%AF" title="سفر به یه روستای خوب و از دست رفته ی با ارزش یزد &quot;روستای عصر آباد&quot;">
                                                        سفر به یه روستای خوب و از دست رفته ی با ارزش یزد "روستای عصر آباد"
                                                    </a>
                                                </h4>
                                            </header>
                                            <p class="im-widget-entry-footer">
                                            </p><div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">
                                                    سه شنبه ۰۸ بهمن ۱۳۹۸
                                                </span>
                                                </div>
                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>
                                                    ۱۲
                                                </div>
                                            </div>
                                            <p></p>
                                        </div>
                                    </li>
                                    <li class="im-widget clearfix">
                                        <figure class="im-widget-thumb">
                                            <a href="http://localhost/kouchita/public/article/%D8%B3%D9%81%D8%B1_%D8%A8%D9%87_%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B3%D8%B1%DB%8C%D8%B2%D8%AF" title="سفر به روستای سریزد">
                                                <img src="http://localhost/assets/_images/posts/114/mainPic.jpg" alt="روستای سریزد">
                                            </a>
                                        </figure>
                                        <div class="im-widget-entry">
                                            <header class="im-widget-entry-header">
                                                <h4 class="im-widget-entry-title">
                                                    <a href="http://localhost/kouchita/public/article/%D8%B3%D9%81%D8%B1_%D8%A8%D9%87_%D8%B1%D9%88%D8%B3%D8%AA%D8%A7%DB%8C_%D8%B3%D8%B1%DB%8C%D8%B2%D8%AF" title="سفر به روستای سریزد">
                                                        سفر به روستای سریزد
                                                    </a>
                                                </h4>
                                            </header>
                                            <p class="im-widget-entry-footer">
                                            </p><div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">
                                                    سه شنبه ۱۵ بهمن ۱۳۹۸
                                                </span>
                                                </div>
                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>
                                                    ۱۰
                                                </div>
                                            </div>
                                            <p></p>
                                        </div>
                                    </li>
                                    <li class="im-widget clearfix">
                                        <figure class="im-widget-thumb">
                                            <a href="http://localhost/kouchita/public/article/%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF" title="کوه ریگ یزد">
                                                <img src="http://localhost/assets/_images/posts/117/mainPic.jpg" alt="کوه ریگ یزد">
                                            </a>
                                        </figure>
                                        <div class="im-widget-entry">
                                            <header class="im-widget-entry-header">
                                                <h4 class="im-widget-entry-title">
                                                    <a href="http://localhost/kouchita/public/article/%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF_%DA%A9%D9%88%D9%87_%D8%B1%DB%8C%DA%AF_%DB%8C%D8%B2%D8%AF" title="کوه ریگ یزد">
                                                        کوه ریگ یزد
                                                    </a>
                                                </h4>
                                            </header>
                                            <p class="im-widget-entry-footer">
                                            </p><div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">
                                                    سه شنبه ۰۸ بهمن ۱۳۹۸
                                                </span>
                                                </div>
                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>
                                                    ۴
                                                </div>
                                            </div>
                                            <p></p>
                                        </div>
                                    </li>
                                    <li class="im-widget clearfix">
                                        <figure class="im-widget-thumb">
                                            <a href="http://localhost/kouchita/public/article/%D8%A2%D8%A8%D8%B4%D8%A7%D8%B1_%D8%AF%D8%B1%D9%87_%DA%AF%D8%A7%D9%87%D8%A7%D9%86%D8%A2%D8%A8%D8%B4%D8%A7%D8%B1_%D8%AF%D8%B1%D9%87_%DA%AF%D8%A7%D9%87%D8%A7%D9%86%D8%A2%D8%A8%D8%B4%D8%A7%D8%B1_%D8%AF%D8%B1%D9%87_%DA%AF%D8%A7%D9%87%D8%A7%D9%86" title="آبشار دره گاهان یه تفریح آرامش بخش با صدای دلنشین آب">
                                                <img src="http://localhost/assets/_images/posts/119/mainPic.jpg" alt="آبشار دره گاهان">
                                            </a>
                                        </figure>
                                        <div class="im-widget-entry">
                                            <header class="im-widget-entry-header">
                                                <h4 class="im-widget-entry-title">
                                                    <a href="http://localhost/kouchita/public/article/%D8%A2%D8%A8%D8%B4%D8%A7%D8%B1_%D8%AF%D8%B1%D9%87_%DA%AF%D8%A7%D9%87%D8%A7%D9%86%D8%A2%D8%A8%D8%B4%D8%A7%D8%B1_%D8%AF%D8%B1%D9%87_%DA%AF%D8%A7%D9%87%D8%A7%D9%86%D8%A2%D8%A8%D8%B4%D8%A7%D8%B1_%D8%AF%D8%B1%D9%87_%DA%AF%D8%A7%D9%87%D8%A7%D9%86" title="آبشار دره گاهان یه تفریح آرامش بخش با صدای دلنشین آب">
                                                        آبشار دره گاهان یه تفریح آرامش بخش با صدای دلنشین آب
                                                    </a>
                                                </h4>
                                            </header>
                                            <p class="im-widget-entry-footer">
                                            </p><div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">
                                                    شنبه ۱۹ بهمن ۱۳۹۸
                                                </span>
                                                </div>
                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>
                                                    ۴
                                                </div>
                                            </div>
                                            <p></p>
                                        </div>
                                    </li>
                                    <li class="im-widget clearfix">
                                        <figure class="im-widget-thumb">
                                            <a href="http://localhost/kouchita/public/article/%DA%A9%D8%A7%D8%AE_%DA%A9%D8%B1%D9%85%D9%84%DB%8C%D9%86_%D8%B1%D9%85%D9%84%DB%8C%D9%86_%DA%A9%D8%A7%D8%AE_%DA%A9%D8%B1%D9%85%D9%84%DB%8C%D9%86_2_%D8%B1%D9%85%D9%84%DB%8C%D9%86" title="کاخ کرملین 2 رملین بزرگ&zwnj;&zwnj;ترین کاخ در کشور&nbsp;روسیه و یکی از زیباترین کاخ&zwnj;های جهان">
                                                <img src="http://localhost/assets/_images/posts/120/mainPic.jpg" alt="کاخ کرملین 2">
                                            </a>
                                        </figure>
                                        <div class="im-widget-entry">
                                            <header class="im-widget-entry-header">
                                                <h4 class="im-widget-entry-title">
                                                    <a href="http://localhost/kouchita/public/article/%DA%A9%D8%A7%D8%AE_%DA%A9%D8%B1%D9%85%D9%84%DB%8C%D9%86_%D8%B1%D9%85%D9%84%DB%8C%D9%86_%DA%A9%D8%A7%D8%AE_%DA%A9%D8%B1%D9%85%D9%84%DB%8C%D9%86_2_%D8%B1%D9%85%D9%84%DB%8C%D9%86" title="کاخ کرملین 2 رملین بزرگ&zwnj;&zwnj;ترین کاخ در کشور&nbsp;روسیه و یکی از زیباترین کاخ&zwnj;های جهان">
                                                        کاخ کرملین ۲ رملین بزرگ&zwnj;&zwnj;ترین کاخ در کشور&nbsp;روسیه و یکی از زیباترین کاخ&zwnj;های جهان
                                                    </a>
                                                </h4>
                                            </header>
                                            <p class="im-widget-entry-footer">
                                            </p><div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">
                                                    دوشنبه ۱۴ بهمن ۱۳۹۸
                                                </span>
                                                </div>
                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>
                                                    ۲
                                                </div>
                                            </div>
                                            <p></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="mainPopUp leftPopUp recentViewLeftBar">

                {{--each menu--}}
                <div>
                    <div class="lp_others_content" id="lp_others_recentlyViews">
                        <div class="lp_others_titles"> بازدید‌های اخیر </div>
                        <div class="mainContainerBookmarked">
                            <div class="masthead-recent-class">
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
                            <div class="masthead-recent-class">
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
                            <div class="masthead-recent-class">
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
                            <div class="masthead-recent-class">
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
                            <div class="masthead-recent-class">
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
                            <div class="masthead-recent-class">
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

                        <div class="tripsBoxesMainDiv">

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
                                            {{--                                        <div id="mainDivTripImageRecentViewBodyProfile"--}}
                                            {{--                                                 onclick="document.location.href = '{{route('tripPlaces', ['tripId' => $trip->id])}}'" --}}
                                            {{--                                             class="trip-images ui_columns is-gapless is-multiline is-mobile">--}}
                                            {{--                                                @if($trip->placeCount > 0)--}}
                                            {{--                                                    <div class="trip-image ui_column is-6" style="background: url('{{$trip->pic1}}') repeat 0 0; background-size: 100% 100%"></div>--}}
                                            {{--                                                @else--}}
                                            {{--                                            <div class="bg-color-recentlyViewBodyProfile trip-image trip-image-empty ui_column is-6"></div>--}}
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
                                            {{--                                        </div>--}}
                                            {{--                                        <div class="create-trip-text font-size-12em">--}}
                                            {{--                                                {{$trip->name}} --}}
                                            {{--                                            سفر به زاینده رود--}}
                                            {{--                                        </div>--}}
                                            {{--                                            @if($trip->to_ != "" && $trip->from_ != "")--}}
                                            {{--                                        <div class="create-trip-text" id="createTripTextRecentlyViewBodyProfile">--}}
                                            {{--                                                    {{convertStringToDate2($trip->to_)}}--}}
                                            {{--                                        29/10/1398--}}
                                            {{--                                            <p style="">الی</p>--}}
                                            {{--                                                    {{convertStringToDate2($trip->from_)}}--}}
                                            {{--                                        1/11/1398--}}
                                            {{--                                        </div>--}}
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

                            <div id="masthead-trips" class="masthead-trips-class">
                                <div id="masthead-trips-tiles-region" class="masthead-trips-tiles-region-class">
                                    <div id="trips-tiles" class="column trips-tiles-class">
                                        <div>
                                            <a class="single-tile is-create-trip">
                                                <div class="tile-content">
                                                    <img>
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
                            <div id="masthead-trips" class="masthead-trips-class">
                                <div id="masthead-trips-tiles-region" class="masthead-trips-tiles-region-class">
                                    <div id="trips-tiles" class="column trips-tiles-class">
                                        <div>
                                            <a class="single-tile is-create-trip">
                                                <div class="tile-content">
                                                    <img>
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

                            <div class="bottomBarContainer"></div>

                        </div>

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
            @endif
        </div>

        <div class="modal fade" id="otherPossibilities">
            <div class="mainPopUp leftPopUp">
                <div class="pSC_tilte">
                    <div>شما در حال حاضر در شهر <span class="pSC_cityTilte">اصفهان </span>هستید</div>
                    <button type="button" class="btn btn-danger"
                            onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle();">تغییر دهید</button>
                </div>
                <div class="pSC_cityDescription">
                    شما می‌توانید به راحتی صفحات زیر را در
                    <span>استان اصفهان </span>
                    مشاهده نمایید
                </div>
                <div class="pSC_boxOfDetails">
                    <div class="pSC_choiseDetailsText">به سادگی انتخاب کنید</div>
                    <div class="pSC_boxOfCityDetailsText">
                        <span>مشاهده صفحه شهر اصفهان</span>
                        <span class="pSC_boxOfCityDetailsText2">در استان اصفهان</span>
                    </div>
                    <div>
                        <div class="pSC_boxOfCityDetails">
                            <div class="pSC_cityDetails">جاذبه‌های اصفهان</div>
                            <div class="pSC_cityDetails pSC_cityDetails_selected">هتل‌های اصفهان</div>
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
                    <div class="overflowOptimizer"></div>
                </div>
                <div class="hideOnScreen phoneFooterStyle">
                    <div class="phoneFooterLogo">
                        <img src="{{URL::asset('images/logo.png')}}" class="content-icon" width="100%">
                    </div>
                    <div class="phoneDescription">
                        <div class="phoneDescriptionText">
                            بنده شازده مسافر هستم و همونطوری که از اسمم مشخصه عاشق سفرم و بیشتر اوقاتم رو به سفر میگذرونم.
                            عرضم به خدمتِ شما، اگه ریا نباشه تقریبا میتونم بگم که همه ی اماکن و جاذبه های گردشگری ایران رو از نزدیک دیدم! بخاطر همینم چند وقت پیشا تصمیم گرفتم با یه سری از دوستام بشینیم و همه جاهایی که رفتیم رو برای شما توصیف کنیم و تجربه هامون رو با شما به اشتراک بزاریم که هر وقت دلتون خواست به شهری سفر کنید، قبلش میتونید بیاید اینجا و از جاذبه های دیدنی، خوردنی، شنیدنی و خریدنی اون شهر
                            با خبر بشید و توضیحاتش رو هم کامل بخونین، بعدش راحت دل رو به دریا بزنین و راه بیوفتین.
                        </div>
                        <div class="phoneDescriptionSelects">
                            <div class="inputBox" id="">
                                <div class="inputBoxText">
                                    <div>
                                        زبان
                                    </div>
                                </div>
                                <select class="inputBoxInput styled-select" id="" name="">
                                    <option value="">
                                        English
                                    </option>
                                    <option value="">
                                        فارسی
                                    </option>
                                </select>
                            </div>
                            <div class="inputBox" id="">
                                <div class="inputBoxText">
                                    <div>
                                        واحد پول
                                    </div>
                                </div>
                                <select class="inputBoxInput styled-select" id="" name="">
                                    <option value="fast">
                                        ریال
                                    </option>
                                    <option value="call">
                                        USD
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="profile">
            <div class="mainPopUp rightPopUp">
                <div id="lp_register">
                    <div>
                        <div class="modules-membercenter-member-profile position-relative">

                            <div class="profileBlock">

                                <div id="" class="targets profileInfosDetails col-xs-8">

                                    <p class="since">
                                        <b>
    {{--                                        {{(!empty($user->first_name)) ? $user->first_name : $user->username}}--}}سینا عادلی
                                        </b>
                                    </p>
                                    <div class="ageSince">
                                        <div class="since">عضو شده از</div>
                                        <div class="since">
    {{--                                        {{$user->created}}--}}
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xs-4">
    {{--                                @if(!$user->uploadPhoto)--}}
                                        <img class="avatarUrl"
    {{--                                         src="{{URL::asset('defaultPic') . '/' . $user->picture}}"--}}
                                             height="60" width="60"/>
    {{--                                @else--}}
    {{--                                    <img class="avatarUrl"--}}
    {{--                                         src="{{URL::asset('userProfile') . "/" . $user->picture}}"--}}
    {{--                                         height="60" width="60"/>--}}
    {{--                                @endif--}}
                                </div>
                            </div>

                            <div class="aboutMeDesc">
                                <div class="editInfoBtn" onclick="toggleEditInfoMenu(this)">
                                    ویرایش اطلاعات
                                    <div class="glyphicon glyphicon-chevron-down"></div>
                                    <div class="glyphicon glyphicon-chevron-up display-none"></div>
                                </div>
                                <div class="editProfileMenu item display-none">
                                    <a name="edit-profile" class="menu-link" href="{{URL('accountInfo')}}">ویرایش اطلاعات کاربری</a>
                                    <a name="edit-photo" class="menu-link" href="{{URL('editPhoto')}}">ویرایش عکس</a>
                                    <a name="subscriptions" class="menu-link" href="">اشتراک ها</a>
                                </div>
                            </div>
                        </div>
                        <div class="profileBtnActionMobile">
                            <a type="button" class="btn btn-warning pp_btns">صفحه پروفایل</a>
                            <a type="button" class="btn btn-primary pp_btns">صفحه من</a>
                            <a type="button" class="btn btn-danger pp_btns" href="{{route('logout')}}">خروج</a>
                        </div>
                    </div>
                    <div class="profileScoreMainDiv">
                        <div class="modules-membercenter-progress-header " data-backbone-name="modules.membercenter.ProgressHeader" data-backbone-context="Social_CompositeMember, Member">
                            <div class="title" id="myHonorsText">
                                <h3>امتیازات من</h3>
                            </div>

                                <a class="link" {{--onclick="initHelp(16, [], 'MAIN', 100, 400)"--}}>
                                    <div></div>
                                </a>
                        </div>

                        <div class="memberPointInfo">
                            <div class="modules-membercenter-total-points">
                                <div data-direction="left" class="targets">
                                    <div class="points_info tripcollectiveinfo" onclick="showElement('activityDiv')">
                                        <div class="label"> امتیاز کل شما </div>
                                    </div>
                                </div>
                                <div class="mainDivTotalPoint">
                                    <div class="points">255 {{--{{$totalPoint}}--}} </div>
                                    <a href="">سیستم امتیازدهی</a>
                                </div>
                                <div class="points_to_go">
                                    <span>
                                        <b class="points">245{{--{{$userLevels[1]->floor - $totalPoint}}--}} </b>
                                        <span>امتیاز  مانده به مرحله بعد</span>
                                    </span>
                                </div>
                            </div>
                            <div class="modules-membercenter-level-progress">
                                <div data-direction="left" id="targetHelp_9" class="targets progress_info tripcollectiveinfo">
                                    <div onclick="showElement('levelDiv')">
                                        <div class="labels">
                                            <div class="right label">مرحله فعلی</div>
                                            <div class="float-leftImp label">مرحله بعدی</div>
                                        </div>
                                        <div class="progress_indicator">
                                            <div class="current_badge myBadge">1 {{--{{$userLevels[1]->name}}--}}</div>
                                            <div class="meter">
                                                <span id="progressId" class="progress"></span>
                                            </div>
                                            <div class="next_badge myBadge">2 {{--{{$userLevels[0]->name}}--}} </div>
                                        </div>
                                        <div class="text-align-center">
                                            <a class="cursor-pointer color-black">مشاهده سیستم سطح بندی</a>
                                        </div>
                                        <div class="clear fix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="userProfileActivitiesMainDiv rightColBoxes">
                        <div class="mainDivHeaderText">
                            <h3>شرح فعالیت‌ها</h3>
                        </div>
                        <div class="activitiesMainDiv">
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">گذاشتن پست</div>
                                <div class="activityNumbers">پست 21</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود عکس</div>
                                <div class="activityNumbers">عکس 365</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود فیلم</div>
                                <div class="activityNumbers">فیلم 6</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود فیلم 360</div>
                                <div class="activityNumbers">فیلم 2</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پرسیدن سؤال</div>
                                <div class="activityNumbers">سؤال 5</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پاسخ به سؤال دیگران</div>
                                <div class="activityNumbers">پاسخ 15</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">امتیازدهی</div>
                                <div class="activityNumbers">مکان 14</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پاسخ به سؤالات اختیاری</div>
                                <div class="activityNumbers">پاسخ 145</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">ویرایش مکان</div>
                                <div class="activityNumbers">مکان 13</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پیشنهاد مکان جدید</div>
                                <div class="activityNumbers">مکان 10</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">نوشتن مقاله</div>
                                <div class="activityNumbers">مقاله 3</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">معرفی دوستان</div>
                                <div class="activityNumbers">معرفی 7</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="profile">
            <div class="mainPopUp rightPopUp">
                <div id="lp_register">
                    <div>
                        <div class="modules-membercenter-member-profile position-relative">

                            <div class="profileBlock">

                                <div id="" class="targets profileInfosDetails col-xs-8">

                                    <p class="since">
                                        <b>
                                            {{--                                        {{(!empty($user->first_name)) ? $user->first_name : $user->username}}--}}سینا عادلی
                                        </b>
                                    </p>
                                    <div class="ageSince">
                                        <div class="since">عضو شده از</div>
                                        <div class="since">
                                            {{--                                        {{$user->created}}--}}
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xs-4">
                                    {{--                                @if(!$user->uploadPhoto)--}}
                                    <img class="avatarUrl"
                                         {{--                                         src="{{URL::asset('defaultPic') . '/' . $user->picture}}"--}}
                                         height="60" width="60"/>
                                    {{--                                @else--}}
                                    {{--                                    <img class="avatarUrl"--}}
                                    {{--                                         src="{{URL::asset('userProfile') . "/" . $user->picture}}"--}}
                                    {{--                                         height="60" width="60"/>--}}
                                    {{--                                @endif--}}
                                </div>
                            </div>

                            <div class="aboutMeDesc">
                                <div class="editInfoBtn" onclick="toggleEditInfoMenu(this)">
                                    ویرایش اطلاعات
                                    <div class="glyphicon glyphicon-chevron-down"></div>
                                    <div class="glyphicon glyphicon-chevron-up display-none"></div>
                                </div>
                                <div class="editProfileMenu item display-none">
                                    <a name="edit-profile" class="menu-link" href="{{URL('accountInfo')}}">ویرایش اطلاعات کاربری</a>
                                    <a name="edit-photo" class="menu-link" href="{{URL('editPhoto')}}">ویرایش عکس</a>
                                    <a name="subscriptions" class="menu-link" href="">اشتراک ها</a>
                                </div>
                            </div>
                        </div>
                        <div class="profileBtnActionMobile">
                            <a type="button" class="btn btn-warning pp_btns">صفحه پروفایل</a>
                            <a type="button" class="btn btn-primary pp_btns">صفحه من</a>
                            <a type="button" class="btn btn-danger pp_btns" href="{{route('logout')}}">خروج</a>
                        </div>
                    </div>
                    <div class="profileScoreMainDiv">
                        <div class="modules-membercenter-progress-header " data-backbone-name="modules.membercenter.ProgressHeader" data-backbone-context="Social_CompositeMember, Member">
                            <div class="title" id="myHonorsText">
                                <h3>امتیازات من</h3>
                            </div>

                            <a class="link" {{--onclick="initHelp(16, [], 'MAIN', 100, 400)"--}}>
                                <div></div>
                            </a>
                        </div>

                        <div class="memberPointInfo">
                            <div class="modules-membercenter-total-points">
                                <div data-direction="left" class="targets">
                                    <div class="points_info tripcollectiveinfo" onclick="showElement('activityDiv')">
                                        <div class="label"> امتیاز کل شما </div>
                                    </div>
                                </div>
                                <div class="mainDivTotalPoint">
                                    <div class="points">255 {{--{{$totalPoint}}--}} </div>
                                    <a href="">سیستم امتیازدهی</a>
                                </div>
                                <div class="points_to_go">
                                    <span>
                                        <b class="points">245{{--{{$userLevels[1]->floor - $totalPoint}}--}} </b>
                                        <span>امتیاز  مانده به مرحله بعد</span>
                                    </span>
                                </div>
                            </div>
                            <div class="modules-membercenter-level-progress">
                                <div data-direction="left" id="targetHelp_9" class="targets progress_info tripcollectiveinfo">
                                    <div onclick="showElement('levelDiv')">
                                        <div class="labels">
                                            <div class="right label">مرحله فعلی</div>
                                            <div class="float-leftImp label">مرحله بعدی</div>
                                        </div>
                                        <div class="progress_indicator">
                                            <div class="current_badge myBadge">1 {{--{{$userLevels[1]->name}}--}}</div>
                                            <div class="meter">
                                                <span id="progressId" class="progress"></span>
                                            </div>
                                            <div class="next_badge myBadge">2 {{--{{$userLevels[0]->name}}--}} </div>
                                        </div>
                                        <div class="text-align-center">
                                            <a class="cursor-pointer color-black">مشاهده سیستم سطح بندی</a>
                                        </div>
                                        <div class="clear fix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="userProfileActivitiesMainDiv rightColBoxes">
                        <div class="mainDivHeaderText">
                            <h3>شرح فعالیت‌ها</h3>
                        </div>
                        <div class="activitiesMainDiv">
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">گذاشتن پست</div>
                                <div class="activityNumbers">پست 21</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود عکس</div>
                                <div class="activityNumbers">عکس 365</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود فیلم</div>
                                <div class="activityNumbers">فیلم 6</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">آپلود فیلم 360</div>
                                <div class="activityNumbers">فیلم 2</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پرسیدن سؤال</div>
                                <div class="activityNumbers">سؤال 5</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پاسخ به سؤال دیگران</div>
                                <div class="activityNumbers">پاسخ 15</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">امتیازدهی</div>
                                <div class="activityNumbers">مکان 14</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پاسخ به سؤالات اختیاری</div>
                                <div class="activityNumbers">پاسخ 145</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">ویرایش مکان</div>
                                <div class="activityNumbers">مکان 13</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">پیشنهاد مکان جدید</div>
                                <div class="activityNumbers">مکان 10</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">نوشتن مقاله</div>
                                <div class="activityNumbers">مقاله 3</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">معرفی دوستان</div>
                                <div class="activityNumbers">معرفی 7</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('layouts.proSearch')

    <script>

        // phone functions

        function lp_selectMenu(id , element) {
            $('.lp_eachMenu').removeClass('lp_selectedMenu');
            $(element).addClass('lp_selectedMenu');
            $('.lp_others_content').addClass('hidden');
            $('#' + id).removeClass('hidden');
        }

        function toggleEditInfoMenu(elm) {
            $(elm).children('div.glyphicon-chevron-down').toggleClass('display-none');
            $(elm).children('div.glyphicon-chevron-up').toggleClass('display-none');
            $(elm).next().toggleClass('display-none');
            $(elm).next().toggleClass('display-flex');
        }

        // phone Article func
        function lp_selectArticleFilter(id , element) {
            $('.lp_ar_eachFilters').removeClass('lp_ar_selectedMenu');
            $(element).addClass('lp_ar_selectedMenu');
            $('.lp_ar_contentOfFilters').addClass('hidden');
            $('#' + id).removeClass('hidden');
        }
    </script>

</footer>
