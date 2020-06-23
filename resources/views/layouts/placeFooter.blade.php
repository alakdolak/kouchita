<?php
$config = \App\models\ConfigModel::first();
    if(auth()->check()){
        $user = Auth::user();
        $userLevelFooter = auth()->user()->getUserNearestLevel();
//        dd($userLevelFooter);
        $userTotalPointFooter = auth()->user()->getUserTotalPoint();

        $nextLevelFooter = $userLevelFooter[1]->floor - $userTotalPointFooter;
    }
?>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/footer.css')}}' />

@if(\App::getLocale() == 'en')
    <link rel="stylesheet" href="{{URL::asset('css/ltr/ltrFooter.css')}}">
@endif

{{--footer html--}}
<footer>
    <div class="hideOnPhone screenFooterStyle">
        <div class="footerLogoSocialBox">
            <a href="{{route('main')}}" class="footerLogo">
                <img src="{{URL::asset('images/icons/mainLogo.png')}}" class="content-icon" width="100%">
            </a>
            <div class="footerSocialMediaBox">
                <a {{($config->linkedinNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.linkedin.com/in/shazde-mosafer-652817143/">
                    <div class="footerIconHor linkedin"></div>
                </a>
                <a {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.facebook.com/profile.php?id=100016313805277&ref=br_rs">
                    <div class="footerIconHor facebook"></div>
                </a>
                <a {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://twitter.com/shazdemosafer">
                    <div class="footerIconHor twitter"></div>
                </a>
                <a {{($config->instagramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.instagram.com/shazdehmosafer/">
                    <div class="footerIconHor instagram"></div>
                </a>
                <a class="socialLink" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://t.me/shazdehmosafer">
                    <div class="footerIconHor telegram"></div>
                </a>
                <a class="socialLink" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://koochitatv.com">
                    <div class="footerIconHor aparat"></div>
                </a>
            </div>
        </div>
{{--        aboutShazdeMoreLess--}}
        <div>
            <div class="footerRside">
                <div id="aboutShazde" class="aboutShazdeMoreLess">
                    <div class="clear-both hideOnScreen"></div>
                    <div>
                        کوچیتا، پلتفرم و شبکه‌ای اجتماعی در حوزه گردشگری است که با هدف ارتقاء سواد گردشگری، افزایش کیفیت سفر و سهولت استفاده افراد جامعه، اعم از داخلی و بین‌المللی، از خدمات گردشگری ایجاد شده است.
                        ارائه اطلاعات جامع، به‌روز و صحیح گردشگری در زمینه: مراکز اقامتی اعم از: هتل، مسافرخانه، مراکز بوم‌گردی، کمپ، ویلا و خانه اجاره‌ای، رستوران‌ها، جاذبه‌ها و اماکن گردشگری، سوغات و صنایع‌دستی، آداب و رسوم محلی شامل: غذاهای محلی، اصطلاحات محلی، لباس محلی، گویش محلی و دانش محلی، جشنواره‌ها، آئین‌ها و رویدادهای فرهنگی، خدمات تسهیلگر گردشگری از جمله وسایل نقلیه و تورهای گردشگری و سایر خدمات مکمل؛ امکان ایجاد شبکه‌ای اجتماعی به‌منظور تبادل اطلاعات و دیدگاه‌ها که در آن کاربران می‌توانند: عکس‌های خود را به اشتراک بگذارند؛ اطلاعات و تجربیات خود در خصوص هریک از اطلاعات گردشگری را به اشتراک بگذارند؛ پرسش خود را در خصوص هریک از اطلاعات گردشگری مطرح نمایند و به یکدیگر پاسخ دهند؛ عکس‌ها و اطلاعات به اشتراک گذاشته شده توسط سایر کاربران را بپسندند و در خصوص آن دیدگاه مطرح نمایند و یکدیگر را دنبال نمایند و امکان مقایسه قیمت، خرید و رزرو خدمات تسهیلگر سفر از جمله رزرو وسایل نقلیه شامل هواپیما، قطار و اتوبوس، رزرو مراکز اقامتی، رزرو رستوران، خرید تورهای گردشگری، خرید سوغات و صنابع دستی، خرید اقلام سفر، خرید بلیت اماکن و جاذبه‌های گردشگری و خرید بلیت جشنواره‌ها، آئین‌ها و رویدادهای فرهنگی از مهم‌ترین امکاناتی است که این پلتفرم در اختیار کاربران قرار می‌دهد.
                    </div>
                </div>
                <div class="footMoreLessBtn" onclick="showMorefooter()">
                    <span class="footMoreLessBtnText">{{__('نمایش بیشتر')}}</span>
                    <span class="footMoreLessBtnText hidden">{{__('نمایش کمتر')}}</span>
                </div>
                <div class="aboutShazdeLinkMargin">
                    <div class="aboutShazdeLink" style="margin-bottom: 5px">
                        {{__('شاید بخواهید در خصوص')}}
                        <a href="{{route('policies')}}"> {{__('حریم خصوصی و قوانین سایت')}} </a>
                        {{__('بیشتر بدانید.')}}
                        {{__('در صورت نیاز به کمک، صفحه')}}
                        <a href="#"> {{__('راهنما')}} </a>
                        {{__('را بخوانید و در صورت نیاز')}}
                        <a href="{{route('policies')}}"> {{__('با ما تماس بگیرید.')}} </a>
                    </div>
                    <div class="aboutShazdeLink">
                        {{__('این سایت متعلق به مجموعه کوچیتا می باشد؛')}}
                        <a href="{{route('policies')}}"> {{__('درباره ما')}} </a>
                        {{__('بیشتر بدانید.')}}
                        {{__('کوچیتا محصولی از')}}
                        <a href="http://www.sisootech.com/" style="color: #053a3e !important;">{{__('شتاب دهنده سی سو تک')}} </a>
                        {{__('و')}}
                        <a href="http://www.bogenstudio.com/" style="color: #053a3e !important;"> {{__('بوگن دیزاین')}} </a>
                        {{__('می باشد؛ ما را بیشتر بشناسید.')}}
                    </div>
                </div>
            </div>
            <div>
                <div class="footerLsideBoxes footHideTabletMenu" >
                    <ul>
                        <li class="footTitle hideOnPhone">{{__('دقیق تر شوید')}}</li>
                        <li class="footMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => 'country'])}}">{{__('طبیعت گردی')}}</a>
                        </li>
                        <li class="footMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => 'country'])}}">{{__('رستوران‌ها')}}</a>
                        </li>
                        <li class="footMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 4, 'mode' => 'country'])}}">{{__('اقامتگاه‌ها')}}</a>
                        </li>
                        <li class="footMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => 'country'])}}">{{__('جاذبه‌‌ها')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="footerLsideBoxes" >
                    <ul>
                        <li class="footTitle hideOnPhone">{{__('دقیق تر شوید')}}</li>
                        <li class="footMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 10, 'mode' => 'country'])}}">{{__('سوغات و صنایع‌دستی')}}</a>
                        </li>
                        <li class="footMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => 'country'])}}">{{__('غذاهای محلی')}}</a>
                        </li>
                        <li class="footMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 12, 'mode' => 'country'])}}">{{__('بوم گردی')}}</a>
                        </li>

                        <li class="footMenu footShowTabletMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => 'country'])}}">{{__('طبیعت‌گردی')}}</a>
                        </li>
                        <li class="footMenu footShowTabletMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => 'country'])}}">{{__('رستوران‌ها')}}</a>
                        </li>
                        <li class="footMenu footShowTabletMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 4, 'mode' => 'country'])}}">{{__('اقامتگاه‌ها')}}</a>
                        </li>

                        <li class="footMenu hideOnPhone">
                            <a href="{{route('mainArticle')}}">{{__('سفرنامه‌ها')}}</a>
                        </li>

                        <li class="footMenu footShowTabletMenu hideOnPhone">
                            <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => 'country'])}}">{{__('جاذبه‌‌ها')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clear-both"></div>
    </div>

    <div class="footerPhoneMenuBar hideOnScreen">
        <div data-toggle="modal" data-target="#otherPossibilities">
            <span class="footerMenuBarLinks">{{__('منو')}}</span>
            <span class="ui_icon more-horizontal"></span>
        </div>
        <div data-toggle="modal" data-target="#profilePossibilities" onclick="showLastPages();// this function in mainSearch.blade.php">
            <span class="footerMenuBarLinks">

                @if(Request::is('placeList/*'))
                    {{__('اعمال فیلتر')}}
                @else
                    {{__('امکانات کاربر')}}
                @endif

            </span>
            <span class="ui_icon memberPossibilities"></span>
        </div>
        <div onclick="openMainSearch(0) // in mainSearch.blade.php">
            <span class="footerMenuBarLinks">{{__('جست‌و‌جو')}}</span>
            <span class="ui_icon search"></span>
        </div>
        @if(Auth::check())
            <div data-toggle="modal" data-target="#profile" class="profileBtn">
                <div class="profileBtnText">
                    <span>سلام</span>
                    <span>{{auth()->user()->username}}</span>
                </div>
                <?php
                    if(auth()->check())
                        $buPic = getUserPic(auth()->user()->id);
                    else
                        $buPic = getUserPic();
                ?>
                <div class="profilePicFooter circleBase type2">
                    <img src="{{isset($buPic) ? $buPic : ''}}" style="width: 100%; border-radius: 50%">
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
            @if(Request::is('article/*') || Request::is('mainArticle'))
                <div class="mainPopUp leftPopUp" style="padding: 7px">
                    <div class="lp_ar_searchTitle">{{__('جستجو خود را محدودتر کنید')}}</div>

                    <div class="lp_ar_filters">
                        @if(Request::is('article/list/*'))
                            <div class="lp_ar_eachFilters lp_ar_rightFilters lp_ar_selectedMenu" onclick="lp_selectArticleFilter('lp_ar_rightFilters' ,this)" style="width: 100%; border-left: none">{{__('دسته‌بندی مطالب')}}</div>
                        @else
                            <div class="lp_ar_eachFilters lp_ar_rightFilters lp_ar_selectedMenu" onclick="lp_selectArticleFilter('lp_ar_rightFilters' ,this)">{{__('دسته‌بندی مطالب')}}</div>
                            <div class="lp_ar_eachFilters" onclick="lp_selectArticleFilter('lp_ar_leftFilters' ,this)">{{__('مطالب مشابه')}}</div>
                        @endif
                         </div>
                    {{--right menu--}}
                    <div id="lp_ar_rightFilters" class="lp_ar_contentOfFilters">
                        <div class="gnContentsCategory">
                            <div class="rightCategory" style="width: 50%; padding: 0px 5px"></div>
                            <div class="leftCategory" style="width: 50%; padding: 0px 5px"></div>
                        </div>
                        <div class="lp_ar_borderBottom"></div>

                        <div>
                            @if($stateCome != null)
                                <div>
                                    {{__('شما در استان')}} {{$stateCome->name}}
                                    @if($cityCome != null)
                                        - {{__('شهر')}} {{$cityCome->name}}
                                        @if($placeCome != null)
                                            - {{$placeCome->name}}
                                        @endif
                                    @endif
                                    {{__('هستید')}}
                                </div>
                                <div>
                                    <a href="{{route('article.list', ['type' => 'state', 'search' => $stateCome->name])}}">{{__('نمایش محتوای استان')}} {{$stateCome->name}}</a>
                                </div>
                                @if($cityCome != null)
                                    <div>
                                        <a href="{{route('article.list', ['type' => 'city', 'search' => $cityCome->name])}}">{{__('نمایش محتوای شهر')}} {{$cityCome->name}}</a>
                                    </div>
                                @endif
                                @if($placeCome != null)
                                    <div>
                                        <a href="{{route('article.list', ['type' => 'place', 'search' => $placeCome->kindPlaceId.'_'.$placeCome->id])}}">{{__('نمایش محتوای')}}  {{$placeCome->name}}</a>
                                    </div>
                                @endif
                            @endif
                            <input type="text" class="gnInput searchCityInArticleInput" placeholder="{{__('شهر موردنظر خود را وارد کنید')}}" readonly>
                        </div>

                        <div class="lp_ar_borderBottom"></div>

                        <div class="gnInput">
                            <input type="text" id="mobileSearchInput" class="gnInputonInput" placeholder="{{__('عبارت مورد نظر خود را')}}">
                            <button class="gnSearchInputBtn" type="submit" onclick="searchInArticle('mobileSearchInput')">{{__('جستجو کنید')}}</button>
                        </div>
                    </div>

                    {{--left menu--}}
                    <div id="lp_ar_leftFilters" class="lp_ar_contentOfFilters hidden">
                        @if(isset($similarPost))
                            @foreach($similarPost as $item)
                                <div class="content-2col">
                                    <div class="im-entry-thumb" style="background-image: url('{{$item->pic}}'); background-size: 100% 100%;">
                                        <div class="im-entry-header">
                                            <div class="im-entry-category">
                                                <div class="iranomag-meta clearfix">
                                                    <div class="cat-links im-meta-item">
                                                        <a class="im-catlink-color-2079" href="{{route('article.list', ['type' => 'category', 'search' => $item->category])}}">{{$item->category}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{$item->url}}" rel="bookmark">
                                                <h1 class="im-entry-title" style="color: white;">
                                                    {{$item->title}}
                                                </h1>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="im-entry">
                                        <div class="im-entry-content">
                                            <a href="{{$item->url}}" rel="bookmark">
                                                {{$item->meta}}
                                            </a>
                                        </div>

                                        <p class="im-entry-footer">
                                        <div class="iranomag-meta clearfix">
                                            <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">{{$post->date}}</span>
                                            </div>
                                            <div class="comments-link im-meta-item">
                                                <i class="fa fa-comment-o"></i>{{$item->msgs}}
                                            </div>
                                            <div class="author vcard im-meta-item">
                                                <i class="fa fa-user"></i>
                                                {{$item->username}}
                                            </div>
                                            <div class="post-views im-meta-item">
                                                <i class="fa fa-eye"></i>{{$item->seen}}
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @elseif(isset($mostSeenPost))
                            <div class="widget widget_impv_display_widget ">
                                <div class="widget-head"><strong class="widget-title">
                                        {{__('پربازدیدترین ها')}}
                                    </strong>
                                    <div class="widget-head-bar"></div>
                                    <div class="widget-head-line"></div>
                                </div>
                                <div id="impv_display_widget-4-tab2" class="widget_pop_body">
                                    <ul class="popular_by_views_list">
                                        @foreach($mostSeenPost as $post)
                                            <li class="im-widget clearfix">
                                                <figure class="im-widget-thumb im-widget-thumb_rightSide">
                                                    <a  href="{{route('article.show', ['slug' => $post->slug])}}" title="{{$post->title}}">
                                                        <img src="{{$post->pic}}" alt="{{$post->keyword}}"/>
                                                    </a>
                                                </figure>
                                                <div class="im-widget-entry im-widget-entry_rightSide">
                                                    <header class="im-widget-entry-header">
                                                        <h4 class='im-widget-entry-title'>
                                                            <a  href="{{route('article.show', ['slug' => $post->slug])}}" title="{{$post->title}}">
                                                                {{$post->title}}
                                                            </a>
                                                        </h4>
                                                    </header>
                                                    <p class="im-widget-entry-footer">
                                                        <div class="iranomag-meta clearfix">
                                                            <div class="posted-on im-meta-item">
                                                                <span class="entry-date published updated">
                                                                    {{$post->date}}
                                                                </span>
                                                            </div>
                                                            <div class="post-views im-meta-item">
                                                                <i class="fa fa-eye"></i>
                                                                {{$post->seen}}
                                                            </div>
                                                        </div>
                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @elseif(Request::is('placeList/*'))
                <div ng-app="mainApp" class="mainPopUp leftPopUp PlaceController" style="padding: 7px">
                    <div class="lp_ar_searchTitle">{{__('جستجو خود را محدودتر کنید')}}</div>

                    <div class="lp_ar_filters">
                        <div class="lp_ar_eachFilters lp_ar_rightFilters lp_ar_selectedMenu" onclick="lp_selectArticleFilter('lp_ar_rightFilters' ,this)">{{__('اعمال فیلتر')}}</div>
                        <div class="lp_ar_eachFilters" onclick="lp_selectArticleFilter('lp_ar_leftFilters' ,this)">{{__('نحوه مرتب‌سازی')}}</div>
                    </div>
                    {{--right menu--}}
                    <div id="lp_ar_rightFilters" class="lp_ar_contentOfFilters" ng-controller="FilterController">
                        <div id="EATERY_FILTERS_CONT" class="eatery_filters">
                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                <div id="jfy_filter_bar_establishmentTypeFilters"
                                     class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                    <div id="filterBox" style="flex-direction: column;">
                                        <div style="font-size: 15px; margin: 10px 0px;">
                                            <span>{{__('فیلترهای اعمال شده')}}</span>
                                            <span style="float: left">
                                                <span>----</span><span style="margin: 0 5px">{{__('مورد از')}}</span><span>----</span>
                                            </span>
                                        </div>
                                        <div style="cursor: pointer; font-size: 12px; color: #050c93; margin-bottom: 7px;" onclick="closeFilters()">
                                            {{__('پاک کردن فیلترها')}}
                                        </div>
                                        <div class="filterShow" style="display: flex; flex-direction: row; flex-wrap: wrap;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                    <div class="filterGroupTitle">{{__('جستجو‌ی نام')}}</div>
                                    <input id="p_nameSearch" class="hl_inputBox" placeholder="{{__('جستجو کنید')}}" onchange="nameFilterFunc(this.value)">
                                </div>
                            </div>
                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                <div id="jfy_filter_bar_establishmentTypeFilters"
                                     class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                    <div class="filterGroupTitle">{{__('امتیاز کاربران')}}</div>
                                    <div class="filterContent ui_label_group inline">
                                        <div class="filterItem lhrFilter filter selected">
                                            <input onclick="rateFilterFunc(5)" type="radio" name="AVGrate" id="p_c5" value="5"/>
                                            <label for="p_c5"
                                                   style="display:inline-block;"><span></span></label>
                                            <div class="rating-widget"
                                                 style="font-size: 1.2em; display: inline-block">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_50"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filterItem lhrFilter filter selected">
                                            <input onclick="rateFilterFunc(4)" type="radio" name="AVGrate" id="p_c4" value="4"/>
                                            <label for="p_c4"
                                                   style="display:inline-block;"><span></span></label>
                                            <div class="rating-widget"
                                                 style="font-size: 1.2em; display: inline-block">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_40"></span>
                                                </div>
                                            </div>
                                            <span> {{__('به بالا')}}</span>
                                        </div>
                                        <div class="filterItem lhrFilter filter selected">
                                            <input onclick="rateFilterFunc(3)" type="radio" name="AVGrate" id="p_c3" value="3"/>
                                            <label for="p_c3"
                                                   style="display:inline-block;"><span></span></label>
                                            <div class="rating-widget"
                                                 style="font-size: 1.2em; display: inline-block">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_30"></span>
                                                </div>
                                            </div>
                                            <span> {{__('به بالا')}}</span>
                                        </div>
                                        <div class="filterItem lhrFilter filter selected">
                                            <input onclick="rateFilterFunc(2)" type="radio" name="AVGrate" id="p_c2" value="2"/>
                                            <label for="p_c2"
                                                   style="display:inline-block;"><span></span></label>
                                            <div class="rating-widget"
                                                 style="font-size: 1.2em; display: inline-block">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_20"></span>
                                                </div>
                                            </div>
                                            <span> {{__('به بالا')}}</span>
                                        </div>
                                        <div class="filterItem lhrFilter filter selected">
                                            <input onclick="rateFilterFunc(1)" type="radio" name="AVGrate" id="p_c1" value="1"/>
                                            <label for="p_c1"
                                                   style="display:inline-block;"><span></span></label>
                                            <div class="rating-widget"
                                                 style="font-size: 1.2em; display: inline-block">
                                                <div class="prw_rup prw_common_location_rating_simple">
                                                    <span class="ui_bubble_rating bubble_10"></span>
                                                </div>
                                            </div>
                                            <span> {{__('به بالا')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($kindPlace->id == 4)
                                @include('places.list.filters.hotelFilters')
                            @elseif($kindPlace->id == 10)
                                @include('places.list.filters.sogatSanaieFilters')
                            @elseif($kindPlace->id == 11)
                                @include('places.list.filters.mahaliFoodFilters')
                            @endif

                            @foreach($features as $feature)
                                <div class="prw_rup prw_restaurants_restaurant_filters">
                                    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                        <div style="display: flex; justify-content: space-between;">
                                            <div class="filterGroupTitle">{{$feature->name}}</div>
                                            @if(count($feature->subFeat) > 5)
                                                <span onclick="showMoreItems({{$feature->id}})" class="moreItems{{$feature->id}} moreItems">{{__('نمایش کامل فیلترها')}}</span>
                                                <span onclick="showLessItems({{$feature->id}})" class="lessItems hidden extraItem{{$feature->id}} moreItems">{{__('پنهان سازی فیلتر‌ها')}}</span>
                                            @endif
                                        </div>

                                        <div class="filterContent ui_label_group inline">
                                            @for($i = 0; $i < 5 && $i < count($feature->subFeat); $i++)
                                                <div class="filterItem lhrFilter filter selected">
                                                    <input ng-disabled="isDisable()" onclick="doFilterFeature({{$feature->subFeat[$i]->id}})" type="checkbox" id="p_feat{{$feature->subFeat[$i]->id}}" value="{{$feature->subFeat[$i]->name}}"/>
                                                    <label for="p_feat{{$feature->subFeat[$i]->id}}"><span></span>&nbsp;&nbsp;{{$feature->subFeat[$i]->name}}  </label>
                                                </div>
                                            @endfor

                                            @if(count($feature->subFeat) > 5)
                                                @for($i = 5; $i < count($feature->subFeat); $i++)
                                                    <div class="filterItem lhrFilter filter hidden extraItem{{$feature->id}}">
                                                        <input ng-disabled="isDisable()" onclick="doFilterFeature({{$feature->subFeat[$i]->id}})" type="checkbox" id="p_feat{{$feature->subFeat[$i]->id}}" value="{{$feature->subFeat[$i]->name}}"/>
                                                        <label for="p_feat{{$feature->subFeat[$i]->id}}"><span></span>&nbsp;&nbsp; {{$feature->subFeat[$i]->name}} </label>
                                                    </div>
                                                @endfor
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    {{--left menu--}}
                    <div id="lp_ar_leftFilters" class="lp_ar_contentOfFilters hidden">
                        <div id="FilterTopController" class="FilterTopController">
                            <div class="ordering">
                                <div class="orders" onclick="selectingOrder($(this),'review')" id="pz1">
                                    {{__('بیشترین نظر')}}
                                </div>
                            </div>
                            <div class="ordering">
                                <div class="orders selectOrder" onclick="selectingOrder($(this), 'rate')" id="pz2">
                                    {{__('بهترین بازخورد')}}
                                </div>
                            </div>
                            <div class="ordering">
                                <div class="orders" onclick="selectingOrder($(this), 'seen')" id="pz3">
                                    {{__('بیشترین بازدید')}}
                                </div>
                            </div>
                            <div class="ordering">
                                <div class="orders" onclick="selectingOrder($(this), 'alphabet')" id="pz4" >
                                    {{__('حروف الفبا')}}
                                </div>
                            </div>
                            @if($kindPlace->id != 10 && $kindPlace->id != 11)
                                <div class="ordering">
                                    <div id="distanceNavMobile" class="orders" onclick="openGlobalSearch(); selectingOrder($(this), 'distance')">{{__('کمترین فاصله تا')}}
                                        <span id="selectDistanceMobile">__ __ __</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="mainPopUp leftPopUp recentViewLeftBar">
                    {{--each menu--}}
                    <div>
                        <div class="lp_others_content" id="lp_others_recentlyViews">
                            <div class="lp_others_titles"> {{__('بازدید‌های اخیر')}} </div>
                            <div class="mainContainerBookmarked">
                                <div id="phoneRecentlyView">
                                    <div class="masthead-recent-class recentlyRowMainSearch" style="display: flex; flex-wrap: wrap">
{{--                                        <a class="lp_others_recentView" target="_self" href="##placeRedirect##">--}}
{{--                                            <div class="lp_others_rvPicBox col-xs-8">--}}
{{--                                                <img src="##placePic##" style="width: 100%;">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xs-4 placeDetailsLeftBar">--}}
{{--                                                <div class="">##placeName##</div>--}}
{{--                                                <div class="lp_others_rating">--}}
{{--                                                    <div class="ui_bubble_rating bubble_##placeRate##0"></div>--}}
{{--                                                    <br>##placeReviews## {{__('نقد')}}--}}
{{--                                                </div>--}}
{{--                                                <div class="">##placeCity##</div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
                                    </div>

                                </div>
                                <div class="bottomBarContainer"></div>
                            </div>
                        </div>

                        <div class="lp_others_content hidden" id="lp_others_messages" style="overflow-y: scroll">
                            <div id="phoneMessages" class="lp_others_titles"> {{__('اعلانات')}} </div>
                            <div id="noMessagePhone" class="lp_others_noMessages">{{__('هیچ پیام جدیدی موجود نیست')}}</div>
                        </div>

                        <div class="lp_others_content hidden" id="lp_others_mark">
                            <div class="lp_others_titles"> {{__('نشون کرده')}} </div>
                            <div class="mainContainerBookmarked">
                                <div id="phoneBookMarks">
                                    <div class="masthead-recent-class">
                                        @if(\auth()->check())
                                            <a class="lp_others_recentView" target="_self" href="##placeRedirect##">
                                                <div class="lp_others_rvPicBox col-xs-8">
                                                    <img src="##placePic##" style="width: 100%;">
                                                </div>
                                                <div class="col-xs-4 placeDetailsLeftBar">
                                                    <div class="">##placeName##</div>
                                                    <div class="lp_others_rating">
                                                        <div class="ui_bubble_rating bubble_##placeRate##0"></div>
                                                        <br>##placeReviews## نقد
                                                    </div>
                                                    <div class="">##placeCity##</div>
                                                </div>
                                            </a>
                                        @else
                                            <div style="display: flex; justify-content: center; align-items: center; margin-top: 50px">
                                                <div class="login-button mainLoginButton" title="{{__('auth.ورود / ثبت نام')}}" style="text-align: center;"> {{__('auth.ورود / ثبت نام')}}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="bottomBarContainer"></div>
                            </div>
                        </div>

                        <div class="lp_others_content hidden" id="lp_others_myTravel">

                            <div class="lp_others_titles">
                                <a href="{{URL('myTrips')}}" target="_self" style="color: #333">{{__('سفرهای من')}} </a>
                            </div>

                            @if(\auth()->check())
                                <div style="display: flex; justify-content: center; align-items: center; height: 75vh;">
                                    <a href="{{route('myTrips')}}" class="mainLoginButton" style="text-align: center;"> {{__('رفتن به صفحه سفرهای من')}}</a>
                                </div>
                            @else
                                <div style="display: flex; justify-content: center; align-items: center; height: 75vh;">
                                    <div class="login-button mainLoginButton" title="{{__('auth.ورود / ثبت نام')}}" style="text-align: center;"> {{__('auth.ورود / ثبت نام')}}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="lp_phoneMenuBar">
                    <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_myTravel', this);;">
                        <div class="iconFamily MyTripsIcon lp_icons"></div>
                        <div>{{__('سفرهای من')}}</div>
                    </div>
                    <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_mark', this)">
                        <div class="ui_icon casino lp_icons"></div>
                        <div>{{__('نشون کرده')}}</div>
                    </div>
                    <div class="lp_eachMenu" onclick="lp_selectMenu('lp_others_messages', this)">
                        <div class="lp_icons iconFamily MsgIcon"></div>
                        <div>{{__('اعلانات')}}</div>
                    </div>
                    <div class="lp_eachMenu lp_selectedMenu" onclick="lp_selectMenu('lp_others_recentlyViews', this);">
                        <div class="lp_icons iconFamily searchIcon"></div>
                        <div>{{__('بازدیدهای اخیر')}}</div>
                    </div>
                </div>
                </div>
            @endif
        </div>

        <div class="modal fade" id="otherPossibilities">
            <div class="mainPopUp leftPopUp">

                @if(isset($locationName))
                    <div class="pSC_tilte">
                    <div>
                        {{__('شما در حال حاضر در')}}
                        <span class="pSC_cityTilte">{{$locationName['name']}}</span>
                        {{__('هستید')}}
                    </div>
                    <button type="button" class="btn btn-danger" onclick="openProSearch()">{{__('تغییر دهید')}}</button>
                </div>
                    <div class="pSC_cityDescription">
                    {{__('شما می‌توانید به راحتی صفحات زیر را در')}}
                    <span>{{$locationName['name']}}</span>
                    {{__('مشاهده نمایید')}}
                </div>
                    <div class="pSC_boxOfDetails">
                    <div class="pSC_choiseDetailsText">{{__('به سادگی انتخاب کنید')}}</div>
                    <div class="pSC_boxOfCityDetailsText">
                        <span onclick="window.location.href = '{{url("cityPage/" . $locationName['kindState'] . "/" . $locationName["cityNameUrl"])}}'">{{__('مشاهده صفحه')}}{{$locationName['cityName']}}</span>
                        @if(isset($locationName['state']))
                            <span class="pSC_boxOfCityDetailsText2">{{__('در استان')}} {{$locationName['state']}}</span>
                        @endif
                    </div>
                    <div>
                        <div class="pSC_boxOfCityDetails">
                            <div class="pSC_cityDetails" onclick="window.location.href = '{{url("placeList/1/" . $locationName['kindState'] . "/" . $locationName['cityNameUrl'])}}'">{{__('جاذبه‌های')}} {{$locationName['cityName']}}</div>
                            <div class="pSC_cityDetails" onclick="window.location.href = '{{url("placeList/4/" . $locationName['kindState'] . "/" . $locationName['cityNameUrl'])}}'">{{__('هتل‌های')}} {{$locationName['cityName']}}</div>
                        </div>
                        <div class="pSC_boxOfCityDetails">
                            <div class="pSC_cityDetails" onclick="window.location.href = '{{$locationName['articleUrl']}}'">مقاله‌های {{$locationName['name']}}</div>
                            <div class="pSC_cityDetails" onclick="window.location.href = '{{url("placeList/3/" . $locationName['kindState'] . "/" . $locationName['cityNameUrl'])}}'">{{__('رستوران‌های')}} {{$locationName['cityName']}}</div>
                        </div>
                        <div class="pSC_boxOfCityDetails">
                            <div class="pSC_cityDetails" onclick="window.location.href = '{{url("placeList/10/" . $locationName['kindState'] . "/" . $locationName['cityNameUrl'])}}'">{{__('صنایع‌دستی‌های')}} {{$locationName['cityName']}}</div>
                            <div class="pSC_cityDetails" onclick="window.location.href = '{{url("placeList/11/" . $locationName['kindState'] . "/" . $locationName['cityNameUrl'])}}'">{{__('غذاهای محلی‌')}}{{$locationName['cityName']}}</div>
                        </div>
                    </div>
                    <div class="overflowOptimizer"></div>
                </div>
                @endif

                <div class="hideOnScreen phoneFooterStyle">
                    <div class="phoneFooterLogo">
                        <img src="{{URL::asset('images/icons/mainIcon.svg')}}" class="content-icon" width="100%">
                    </div>
                    <div class="phoneDescription">
                        <div class="phoneDescriptionText">
                            کوچیتا، پلتفرم و شبکه‌ای اجتماعی در حوزه گردشگری است که با هدف ارتقاء سواد گردشگری، افزایش کیفیت سفر
                            و سهولت استفاده افراد جامعه، اعم از داخلی و بین‌المللی، از خدمات گردشگری ایجاد شده است.
                            ارائه اطلاعات جامع، به‌روز و صحیح گردشگری در
                            زمینه: مراکز اقامتی اعم از: هتل، مسافرخانه، مراکز بوم‌گردی، کمپ، ویلا و خانه اجاره‌ای، رستوران‌ها
                            ، جاذبه‌ها و اماکن گردشگری، سوغات و صنایع‌دستی، آداب و رسوم محلی شامل: غذاهای محلی، اصطلاحات
                            محلی، لباس محلی، گویش محلی و دانش محلی، جشنواره‌ها، آئین‌ها و رویدادهای فرهنگی، خدمات تسهیلگر
                            گردشگری از جمله وسایل نقلیه و تورهای گردشگری و سایر خدمات مکمل؛ امکان ایجاد شبکه‌ای اجتماعی
                            به‌منظور تبادل اطلاعات و دیدگاه‌ها که در آن کاربران می‌توانند: عکس‌های خود را به اشتراک بگذارند؛
                            اطلاعات و تجربیات خود در خصوص هریک از اطلاعات گردشگری را به اشتراک بگذارند؛ پرسش خود را در خصوص
                            هریک از اطلاعات گردشگری مطرح نمایند و به یکدیگر پاسخ دهند؛ عکس‌ها و اطلاعات به اشتراک گذاشته
                            شده توسط سایر کاربران را بپسندند و در خصوص آن دیدگاه مطرح نمایند و یکدیگر را دنبال نمایند
                            و امکان مقایسه قیمت، خرید و رزرو خدمات تسهیلگر سفر از جمله رزرو وسایل نقلیه شامل هواپیما
                            ، قطار و اتوبوس، رزرو مراکز اقامتی، رزرو رستوران، خرید تورهای گردشگری، خرید سوغات و صنابع
                            دستی، خرید اقلام سفر، خرید بلیت اماکن و جاذبه‌های گردشگری و خرید بلیت جشنواره‌ها، آئین‌ها
                            و رویدادهای فرهنگی از مهم‌ترین امکاناتی است که این پلتفرم در اختیار کاربران قرار می‌دهد.

                        </div>
                        <div class="phoneDescriptionSelects">
                            {{--language--}}
                            {{--<div class="inputBox" id="">--}}
                                {{--<div class="inputBoxText">--}}
                                    {{--<div>--}}
                                        {{--زبان--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<select class="inputBoxInput styled-select" id="" name="">--}}
                                    {{--<option value="">--}}
                                        {{--English--}}
                                    {{--</option>--}}
                                    {{--<option value="">--}}
                                        {{--فارسی--}}
                                    {{--</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<div class="inputBox" id="">--}}
                                {{--<div class="inputBoxText">--}}
                                    {{--<div>--}}
                                        {{--واحد پول--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<select class="inputBoxInput styled-select" id="" name="">--}}
                                    {{--<option value="fast">--}}
                                        {{--ریال--}}
                                    {{--</option>--}}
                                    {{--<option value="call">--}}
                                        {{--USD--}}
                                    {{--</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->check())
            <div class="modal fade" id="profile">
            <div class="mainPopUp rightPopUp">
                <div id="lp_register">
                    <div>
                        <div class="modules-membercenter-member-profile position-relative">

                            <div class="profileBlock">

                                <div id="" class="targets profileInfosDetails col-xs-8">

                                    <p class="since">
                                        <b>
                                            {{isset($user->first_name) ? $user->first_name : $user->username}}
                                        </b>
                                    </p>
                                    <div class="ageSince">
                                        <div class="since">{{__('عضو شده از')}}</div>
                                        <div class="since">
    {{--                                        {{$user->created}}--}}
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xs-4">
    {{--                                @if(!$user->uploadPhoto)--}}
                                        <img class="avatarUrl"
                                             src="{{isset($buPic) ? $buPic : ''}}"
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
                                    {{__('ویرایش اطلاعات')}}
                                    <div class="glyphicon glyphicon-chevron-down"></div>
                                    <div class="glyphicon glyphicon-chevron-up display-none"></div>
                                </div>
                                <div class="editProfileMenu item display-none">
                                    <a name="edit-profile" class="menu-link" href="{{URL('accountInfo')}}">{{__('ویرایش اطلاعات کاربری')}}</a>
                                    <a name="edit-photo" class="menu-link" href="{{URL('editPhoto')}}">{{__('ویرایش عکس')}}</a>
                                    <a name="subscriptions" class="menu-link" href="">{{__('اشتراک ها')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="profileBtnActionMobile">
                            <a type="button" class="btn btn-warning pp_btns" href="{{route('profile')}}">{{__('صفحه پروفایل')}}</a>
                            <a type="button" class="btn btn-primary pp_btns">{{__('صفحه من')}}</a>
                            <a type="button" class="btn btn-danger pp_btns" href="{{route('logout')}}">{{__('خروج')}}</a>
                        </div>
                    </div>
                    @if(isset($profilePage) && $profilePage == 1)
                        <div class="profileMenuResponsive">
                            @if($mode == "profile")
                                <div id="Profile" class="profile col-xs-6 profileMenuLinks">
                                    <a id="profileLinkColor1" href="{{URL('profile')}}">{{__('صفحه کاربری')}}</a>
                                </div>
                            @else
                                <div id="Profile" class="profile col-xs-6 profileMenuLinks">
                                    <a id="profileLinkColor2" href="{{URL('profile')}}">{{__('صفحه کاربری')}}</a>
                                </div>
                            @endif
                            @if($mode == "profileActivities")
                                <div id="ProfileActivities" class="profileActivities col-xs-6 profileMenuLinks">
                                    <a id="profileLinkColor1" href="{{URL('profile')}}">{{__('فعالیت‌های من')}}</a>
                                </div>
                            @else
                                <div id="Profile" class="profileActivities col-xs-6 profileMenuLinks">
                                    <a id="profileLinkColor2" href="{{URL('profile')}}">{{__('فعالیت‌های من')}}</a>
                                </div>
                            @endif
                            @if($mode == "badge")
                                <div id="BadgeCollection" class="badgeCollection col-xs-6 profileMenuLinks">
                                    <a id="BadgeCollectionLinkColor1" href="{{route('badge')}}">{{__('مدال‌های گردشگری')}}</a>
                                </div>
                            @else
                                <div id="BadgeCollection" class="badgeCollection col-xs-6 profileMenuLinks">
                                    <a id="BadgeCollectionLinkColor2" href="{{route('badge')}}">{{__('مدال‌های گردشگری')}}</a>
                                </div>
                            @endif

                            <div class="travelMap targets position-relative col-xs-6 profileMenuLinks" id="targetHelp_5">
                                <a href="{{route('soon')}}">سفرنامه من</a>
                                <div id="helpSpan_5" class="helpSpans hidden row">
                                    <span class="introjs-arrow"></span>
                                    <div class="col-xs-12">
                                        <p>{{__('با استفاده از این منو می‌توانید به سایر بخش‌های پروفایل کاربری خود بروید.')}}</p>
                                    </div>
                                    <div class="col-xs-12">
                                        <button data-val="5" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_5">{{__('بعدی')}}</button>
                                        <button data-val="5" class="btn btn-primary backBtnsHelp" id="backBtnHelp_5">{{__('قبلی')}}</button>
                                        <button class="btn btn-danger exitBtnHelp">{{__('خروج')}}</button>
                                    </div>
                                </div>
                            </div>

                            {{--                <li id="Saves" class="saves"></li>--}}
                            @if($mode == "message")
                                <div id="Messages" class="messages col-xs-6 profileMenuLinks">
                                    <a id="messageLinkColor1" href="{{URL('messages')}}">{{__('پیام‌ها')}}</a>
                                </div>
                            @else
                                <div id="Messages" class="messages col-xs-6 profileMenuLinks">
                                    <a id="messageLinkColor2" href="{{URL('messages')}}">{{__('پیام‌ها')}}</a>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="profileScoreMainDiv">
                            <div class="modules-membercenter-progress-header " data-backbone-name="modules.membercenter.ProgressHeader" data-backbone-context="Social_CompositeMember, Member">
                                <div class="title" id="myHonorsText">
                                    <h3>{{__('امتیازات من')}}</h3>
                                </div>

                                <a class="link" {{--onclick="initHelp(16, [], 'MAIN', 100, 400)"--}}>
                                    <div></div>
                                </a>
                            </div>

                            <div class="memberPointInfo">
                                <div class="modules-membercenter-total-points">
                                    <div data-direction="left" class="targets">
                                        <div class="points_info tripcollectiveinfo" onclick="showElement('activityDiv')">
                                            <div class="label"> {{__('امتیاز کل شما')}} </div>
                                        </div>
                                    </div>
                                    <div class="mainDivTotalPoint">
                                        <div class="points">{{$userTotalPointFooter}}</div>
                                        <a href="">{{__('سیستم امتیازدهی')}}</a>
                                    </div>
                                    <div class="points_to_go">
                                    <span>
                                        <b class="points"> {{$nextLevelFooter}} </b>
                                        <span>{{__('امتیاز  مانده به مرحله بعد')}}</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="modules-membercenter-level-progress">
                                    <div data-direction="left" id="targetHelp_9" class="targets progress_info tripcollectiveinfo">
                                        <div onclick="showElement('levelDiv')">
                                            <div class="labels">
                                                <div class="right label">{{__('مرحله فعلی')}}</div>
                                                <div class="float-leftImp label">{{__('مرحله بعدی')}}</div>
                                            </div>
                                            <div class="progress_indicator">

                                                <div class="next_badge myBadge">{{$userLevelFooter[0]->name}} </div>
                                                <div class="meter">
                                                    <span id="progressIdPhone" class="progress"></span>
                                                </div>
                                                <div class="current_badge myBadge">{{$userLevelFooter[1]->name}} </div>
                                            </div>
                                            <div class="text-align-center">
                                                <a class="cursor-pointer color-black">{{__('مشاهده سیستم سطح بندی')}}</a>
                                            </div>
                                            <div class="clear fix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="userProfileActivitiesMainDiv rightColBoxes">
                        <div class="mainDivHeaderText">
                            <h3>{{__('شرح فعالیت‌ها')}}</h3>
                        </div>
                        <?php
                            $userInfo = auth()->user()->getUserActivityCount();
                        ?>
                        <div class="activitiesMainDiv">
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('گذاشتن پست')}}</div>
                                <div class="activityNumbers">{{__('پست')}} {{$userInfo['postCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('آپلود عکس')}}</div>
                                <div class="activityNumbers">{{__('عکس')}}  {{$userInfo['picCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('آپلود فیلم')}}</div>
                                <div class="activityNumbers">{{__('فیلم')}}  {{$userInfo['videoCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('آپلود فیلم 360')}}</div>
                                <div class="activityNumbers">{{__('فیلم')}}  {{$userInfo['video360Count']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('پرسیدن سؤال')}}</div>
                                <div class="activityNumbers">{{__('سؤال')}}  {{$userInfo['questionCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('پاسخ به سؤال دیگران')}}</div>
                                <div class="activityNumbers">{{__('پاسخ')}}  {{$userInfo['ansCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('امتیازدهی')}}</div>
                                <div class="activityNumbers">{{__('مکان')}}  {{$userInfo['scoreCount']}}</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('پاسخ به سؤالات اختیاری')}}</div>
                                <div class="activityNumbers">{{__('پاسخ')}} 0</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('ویرایش مکان')}}</div>
                                <div class="activityNumbers">{{__('مکان')}} 0</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('پیشنهاد مکان جدید')}}</div>
                                <div class="activityNumbers">{{__('مکان')}} 0</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('نوشتن مقاله')}}</div>
                                <div class="activityNumbers">{{__('مقاله')}} 0</div>
                            </div>
                            <div class="activitiesLinesDiv">
                                <div class="activityTitle">{{__('معرفی دوستان')}}</div>
                                <div class="activityNumbers">{{__('معرفی')}} 7</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

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

    <script>
        function showMorefooter() {
            $('.footMoreLessBtnText').toggleClass('hidden');
            $('#aboutShazde').toggleClass('aboutShazdeMoreLess');
        }
    </script>

    @if(Auth::check())
        <script>
            var recentlySample = 0;
            var bookMarkSample = 0;

            function getAlertItemsPhone() {
                $.ajax({
                    type: 'post',
                    url: '{{route('getAlerts')}}',
                    success: function (response) {

                        response = JSON.parse(response);

                        if(response.length == 0)
                            $('#noMessagePhone').css('display', '');
                        else{
                            $('#noMessagePhone').css('display', 'none');
                            var newElement = "";

                            for(i = 0; i < response.length; i++) {
                                if (response[i].url != -1)
                                    newElement += '<div id="notificationBox"><div class="modules-engagement-notification-dropdown"><div><img onclick="document.location.href = \'' + response[i].url + '\'" width="50px" height="50px" src="' + response[i].pic + '"></div><div class="notifdd_empty"><span>' + response[i].customText + '</span></div></div></div>';
                                else
                                    newElement += '<div onclick="document.location.href = \'{{route('msgs')}}\'" style="cursor: pointer; min-height: 60px"><div class="modules-engagement-notification-dropdown"><div style="float: right; margin: 10px; padding-top: 0; height: 50px; margin-top: 0; width: 50px; z-index: 10000000000001 !important;"></div><div style="margin-right: 70px" class="notifdd_empty"><span>' + response[i].customText + '</span></div></div></div>';
                            }

                            $('#phoneMessages').append(newElement);
                        }
                    }
                });
            }

            let getPhoneBookMarks = false;
            function showBookMarksPhone() {

                if(!getPhoneBookMarks) {
                    getPhoneBookMarks = true;

                    if (bookMarkSample == 0)
                        bookMarkSample = $('#phoneBookMarks').html();

                    $('#phoneBookMarks').html('');

                    $.ajax({
                        type: 'post',
                        url: '{{route('getBookMarks')}}',
                        success: function (response) {
                            response = JSON.parse(response);
                            for (i = 0; i < response.length; i++) {
                                if (response[i]['placeName']) {
                                    var text = bookMarkSample;
                                    var fk = Object.keys(response[i]);
                                    for (var x of fk) {
                                        var t = '##' + x + '##';
                                        var re = new RegExp(t, "g");
                                        text = text.replace(re, response[i][x]);
                                    }
                                    $('#phoneBookMarks').append(text);
                                }
                            }
                        }
                    });
                }
            }

            getAlertItemsPhone();
            showBookMarksPhone();

            function initialProgressFooter() {
                var b = "{{$userTotalPointFooter / $userLevelFooter[1]->floor}}" * 100;
                $("#progressIdPhone").css("width", b + "%");
            }
            initialProgressFooter();
        </script>
    @endif

</footer>
