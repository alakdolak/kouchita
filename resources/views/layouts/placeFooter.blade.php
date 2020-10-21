<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/footer.css?v='.$fileVersions)}}' />

@if(\App::getLocale() == 'en')
    <link rel="stylesheet" href="{{URL::asset('css/ltr/ltrFooter.css?v='.$fileVersions)}}">
@endif
<style>
    footer .memberPointInfo .head{
        color: #0076ac;
        font-size: 20px;
        margin-top: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center
    }
</style>
{{--footer html--}}
<footer>
    <div class="hideOnPhone screenFooterStyle">
        <div class="footerLogoSocialBox">
            <a href="{{route('main')}}" class="footerLogo" style="display: flex; align-items: center;">
                <img src="{{URL::asset('images/camping/undp.svg')}}" style="height: 60px">
                <img src="{{URL::asset('images/icons/mainLogo.png')}}" class="content-icon" width="100%">
            </a>
            <div class="footerSocialMediaBox">
                <a class="socialLink" rel="nofollow" target="_blank" href="https://www.linkedin.com/in/shazde-mosafer-652817143/">
                    <div class="footerIconHor linkedin"></div>
                </a>
                <a class="socialLink" rel="nofollow" target="_blank" href="https://www.facebook.com/profile.php?id=100016313805277&ref=br_rs">
                    <div class="footerIconHor facebook"></div>
                </a>
                <a class="socialLink" rel="nofollow" target="_blank" href="https://twitter.com/shazdemosafer">
                    <div class="footerIconHor twitter"></div>
                </a>
                <a class="socialLink" rel="nofollow" target="_blank" href="https://www.instagram.com/shazdehmosafer/">
                    <div class="footerIconHor instagram"></div>
                </a>
                <a class="socialLink" rel="nofollow" target="_blank" href="https://t.me/shazdehmosafer">
                    <div class="footerIconHor telegram"></div>
                </a>
                <a class="socialLink" rel="nofollow" target="_blank" href="https://koochitatv.com">
                    <div class="footerIconHor aparat"></div>
                </a>
            </div>
        </div>
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
                        <a href="http://www.sisootech.com/" style="color: var(--koochita-dark-green) !important;">{{__('شتاب دهنده سی سو تک')}} </a>
                        {{__('و')}}
                        <a href="http://www.bogenstudio.com/" style="color: var(--koochita-dark-green) !important;"> {{__('بوگن دیزاین')}} </a>
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
                            <a href="{{route('safarnameh.index')}}">{{__('سفرنامه‌ها')}}</a>
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

    <div class="hideOnScreen" style="width: 100%; height: 100px;"></div>
    <div class="footerPhoneMenuBar hideOnScreen">
        <div data-toggle="modal" data-target="#otherPossibilities">
            <span class="footerMenuBarLinks">{{__('منو')}}</span>
            <span class="threeLineIcon"></span>
        </div>
        <div data-toggle="modal" data-target="#profilePossibilities" onclick="showLastPages();// this function in mainSearch.blade.php">
            <span class="footerMenuBarLinks">
                @if(Request::is('placeList/*'))
                    {{__('اعمال فیلتر')}}
                @elseif(Request::is('safarnameh/*') || Request::is('safarnameh'))
                    {{__('دسته بندی')}}
                @else
                    {{__('امکانات ویژه')}}
                @endif
            </span>
            <span class="ui_icon memberPossibilities"></span>
        </div>
        <div onclick="showCampingModal() // in header1.blade.php">
            <span class="footerMenuBarLinks">{{__('کمپین')}}</span>
            <span class="iconFamily iconFamily addPostIcon" style="font-size: 20px;"></span>
        </div>
        @if(Auth::check())
            <div data-toggle="modal" data-target="#profile" class="profileBtn">
                <div class="profileBtnText">
                    <span>{{__('سلام')}}</span>
                    <span>{{$userNamename}}</span>
                </div>
                <div class="profilePicFooter circleBase type2">
                    <img src="{{isset($buPic) ? $buPic : ''}}" style="width: 100%; border-radius: 50%">
                </div>
            </div>
        @else

            <div class="loginHelperSection footerLoginHelperSection hidden">
                <div class="login-button">
                    <span class="footerMenuBarLinks" style="display: flex; align-items: center">
                        {{__('ورود')}}
                        <span class="iconFamily UserIcon" style="font-size: 20px; margin-left: 2px"></span>
                    </span>
                </div>
                <div class="helperDescriptionDiv rightBottomArrow">
                    <div class="iconClose" onclick="closeLoginHelperSection()"></div>
                    <div class="text">
                        در کوچیتا ثبت نام کنید ، امتیاز بگیرید و برنده ی یک گوشی هوشمند شوید.
                    </div>
                </div>
            </div>

            <div class="login-button">
                <span class="footerMenuBarLinks" style="display: flex; align-items: center">
                    {{__('ورود')}}
                    <span class="iconFamily UserIcon" style="font-size: 20px; margin-left: 2px"></span>
                </span>
            </div>
        @endif
    </div>

    <div class="container">

        <div class="modal fade" id="profilePossibilities">
            @if(Request::is('safarnameh/*') || Request::is('safarnameh'))
                <div class="mainPopUp leftPopUp" style="padding: 7px">
                    <div class="closeFooterPopupIcon iconFamily iconClose" onclick="$('#profilePossibilities').modal('hide')"></div>
                    <div class="lp_ar_searchTitle">{{__('جستجو خود را محدودتر کنید')}}</div>

                    <div class="lp_ar_filters">
                        @if(Request::is('safarnameh/list/*'))
                            <div class="lp_ar_eachFilters lp_ar_rightFilters lp_ar_selectedMenu" onclick="lp_selectArticleFilter('lp_ar_rightFilters' ,this)" style="width: 100%; border-left: none">{{__('دسته‌بندی مطالب')}}</div>
                        @else
                            <div class="lp_ar_eachFilters lp_ar_rightFilters lp_ar_selectedMenu" onclick="lp_selectArticleFilter('lp_ar_rightFilters' ,this)">{{__('دسته‌بندی مطالب')}}</div>
                            <div class="lp_ar_eachFilters" onclick="lp_selectArticleFilter('lp_ar_leftFilters' ,this)">{{__('مطالب مشابه')}}</div>
                        @endif
                    </div>

                    <div id="lp_ar_rightFilters" class="lp_ar_contentOfFilters">
                        <div class="gnContentsCategory footerSafarnmaehCategoryRow">
                            <div class="mainSafarnamehCategory">
                                @foreach($category as $cat)
                                    @if(count($cat->subCategory) > 0)
                                        <div class="safarnamehRow" onclick="showSafarnamehSubCategory({{$cat->id}})">
                                            <div class="next leftArrowIcon"></div>
                                            <div class="name">{{$cat->name}}</div>
                                        </div>
                                    @else
                                        <a href="{{route('safarnameh.list', ['type' => 'category', 'search' => $cat->name])}}" class="safarnamehRow">
                                            <div class="name">{{$cat->name}}</div>
                                        </a>
                                        @endif
                                @endforeach
                            </div>
                            <div class="subSafarnamehCategory">
                                @foreach($category as $cat)
                                    <div id="subSafarnamehCategory_{{$cat->id}}" class="subSec">
                                        <div class="safarnamehRow back" onclick="backToSafarnamehCategoryFooter(this)">
                                            <div class="name" style="font-weight: bold">بازگشت</div>
                                            <div class="leftArrowIcon" style="color: white; font-size: 30px; line-height: 10px; width: 20px"></div>
                                        </div>
                                        @foreach($cat->subCategory as $item)
                                            <a href="{{route('safarnameh.list', ['type' => 'category', 'search' => $item->name])}}" class="safarnamehRow">
                                                <div class="name">{{$item->name}}</div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="safarnamehSearchRowFooter">
                            <div class="header">
                                <div class="title">جستجو بر اساس</div>
                                <div class="tab selected" onclick="showSafarnamehFooterSearch(this, 'place')">مکان</div>
                                <div class="tab" onclick="showSafarnamehFooterSearch(this, 'text')">عبارت</div>
                            </div>
                            <div class="inputs">
                                <input type="text"
                                       id="safarnamehPlaceSearchFooter"
                                       class="safarnamehInput searchCityInArticleInput"
                                       placeholder="نام محل را وارد نمایید"
                                       readonly> {{--open in safarnamehLayout.blade.php--}}
                                <div id="safarnamehContentSearchFooter" style="display: none; background-color: #f2f2f2; position: relative; margin-top: 10px;">
                                    <input type="text"
                                           id="safarnamehContentSF"
                                           class="safarnamehInput searchInputElemsText"
                                           placeholder="عبارت مورد نظر را وارد نمایید"
                                           style="margin: 0;">
                                    <button class="iconFamily searchIcon" onclick="searchInArticle('safarnamehContentSF')// open in safarnamehLayout.blade.php"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--left menu--}}
                    <div id="lp_ar_leftFilters" class="lp_ar_contentOfFilters hidden">
                        @if(isset($similarSafarnameh))
                            @foreach($similarSafarnameh as $item)
                                <div class="content-2col">
                                    <div class="im-entry-thumb" style="background-image: url('{{$item->pic}}'); background-size: 100% 100%;">
                                        <div class="im-entry-header">
                                            <div class="im-entry-category">
                                                <div class="iranomag-meta clearfix">
                                                    <div class="cat-links im-meta-item">
                                                        <a class="im-catlink-color-2079" href="{{route('safarnameh.list', ['type' => 'category', 'search' => $item->category])}}">{{$item->category}}</a>
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
                                        <div class="im-entry-footer">
                                            <div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                    <span class="entry-date published updated">{{$item->date}}</span>
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
                                        </div>
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
                                                    <a  href="{{route('safarnameh.show', ['id' => $post->id])}}" title="{{$post->title}}">
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
                    <div class="closeFooterPopupIcon iconFamily iconClose" onclick="$('#profilePossibilities').modal('hide')"></div>
                    <div style="min-height: 60px">
                        <div class="lp_ar_searchTitle">{{__('جستجو خود را محدودتر کنید')}}</div>

                        <div class="lp_ar_filters">
                            <div class="lp_ar_eachFilters lp_ar_rightFilters lp_ar_selectedMenu" onclick="lp_selectArticleFilter('lp_ar_rightFilters' ,this)">{{__('اعمال فیلتر')}}</div>
                            <div class="lp_ar_eachFilters" onclick="lp_selectArticleFilter('lp_ar_leftFilters' ,this)">{{__('نحوه مرتب‌سازی')}}</div>
                        </div>
                    </div>

                    {{--right menu--}}
                    <div id="lp_ar_rightFilters" class="lp_ar_contentOfFilters" ng-controller="FilterController" style="overflow: hidden; height: auto">

                        <div class="bottomLightBorder prw_rup prw_restaurants_restaurant_filters">
                            <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                <div id="filterBox" style="flex-direction: column;">
                                    <div style="font-size: 15px; margin: 10px 0px;">
                                        <span>{{__('فیلترهای اعمال شده')}}</span>
                                        <span style="float: left">
                                            <span class="filterShowCount">----</span>
                                            <span style="margin: 0 5px">{{__('مورد از')}}</span>
                                            <span class="totalPlaceCount">----</span>
                                        </span>
                                    </div>
                                    <div style="cursor: pointer; font-size: 12px; color: #050c93; margin-bottom: 7px;" onclick="closeFilters()">
                                        {{__('پاک کردن فیلترها')}}
                                    </div>
                                    <div class="filterShow" style="display: flex; flex-direction: row; flex-wrap: wrap;"></div>
                                </div>
                            </div>
                        </div>

                        <div id="EATERY_FILTERS_CONT" class="eatery_filters">

                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                    <div class="filterGroupTitle">{{__('جستجو‌ی نام')}}</div>
                                    <input id="p_nameSearch" class="hl_inputBox" placeholder="{{__('جستجو کنید')}}" onchange="nameFilterFunc(this.value)">
                                </div>
                            </div>

                            @if($kindPlace->id == 11)
                                <div class="prw_rup prw_restaurants_restaurant_filters">
                                    <div id="jfy_filter_bar_establishmentTypeFilters" class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                        <div class="filterGroupTitle">{{__('جستجو براساس مواد اولیه')}}</div>
                                        <input id="p_foodMaterialSearch" class="hl_inputBox" placeholder="{{__('جستجو کنید')}}" onclick="openGlobalMaterialSearch()">
                                        <div class="youMaterialSearchResult materialSearchSelected"></div>
                                    </div>
                                </div>

                                <script>
                                    function openGlobalMaterialSearch(){
                                        createSearchInput('getGlobalInputMaterialSearchKeyUp', 'ماده اولبه مورد نظر خود را وارد کنید.');
                                    }

                                    function getGlobalInputMaterialSearchKeyUp(_element){
                                        searchForMaterial($(_element).val())
                                    }
                                </script>
                            @endif

                            <div class="prw_rup prw_restaurants_restaurant_filters">
                                <div id="jfy_filter_bar_establishmentTypeFilters"
                                     class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
                                    <div class="filterGroupTitle">{{__('امتیاز کاربران')}}</div>
                                    <div class="filterContent ui_label_group inline">
                                        <div class="filterItem lhrFilter filter selected">
                                            <input onclick="rateFilterFunc(5, this)" type="radio" name="AVGrate" id="p_c5" value="5"/>
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
                                            <input onclick="rateFilterFunc(4, this)" type="radio" name="AVGrate" id="p_c4" value="4"/>
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
                                            <input onclick="rateFilterFunc(3, this)" type="radio" name="AVGrate" id="p_c3" value="3"/>
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
                                            <input onclick="rateFilterFunc(2, this)" type="radio" name="AVGrate" id="p_c2" value="2"/>
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
                                            <input onclick="rateFilterFunc(1, this)" type="radio" name="AVGrate" id="p_c1" value="1"/>
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
                                @include('pages.placeList.filters.hotelFilters')
                            @elseif($kindPlace->id == 10)
                                @include('pages.placeList.filters.sogatSanaieFilters')
                            @elseif($kindPlace->id == 11)
                                @include('pages.placeList.filters.mahaliFoodFilters')
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
                    <div class="closeFooterPopupIcon iconFamily iconClose" onclick="$('#profilePossibilities').modal('hide')"></div>

                    {{--each menu--}}
                    <div>
                        <div class="lp_others_content" id="lp_others_recentlyViews">
                            <div class="lp_others_titles" style="padding-bottom: 2px; border: none; font-size: 18px; margin-bottom: 5px;"> {{__('بازدیدهای اخیر')}} </div>
                            <div class="headerSearchBar" style="width: 100%; margin-bottom: 10px">
                                <span class="headerSearchIcon iconFamily footerSearchBar searchIcon" onclick="openMainSearch(0) // in mainSearch.blade.php">
                                    <span style="font-size: 15px; text-align: center; width: 100%;">
                                        {{__('به کجا می روید؟')}}
                                    </span>
                                </span>
                            </div>
                            <div class="mainContainerBookmarked" style="height: calc(100vh - 170px); border-top: 1px solid #cccccc">
                                <div id="phoneRecentlyView">
                                    <div class="masthead-recent-class recentlyRowMainSearch" style="display: flex; flex-wrap: wrap"></div>
                                </div>
                            </div>
                        </div>

                        <div class="lp_others_content hidden" id="lp_others_messages" style="overflow-y: hidden; padding: 25px 10px; height: calc(100vh - 100px);">
                            <div id="phoneMessages" class="lp_others_titles"> {{__('اعلانات')}} </div>
                            <div id="noMessagePhone" class="lp_others_noMessages alertMsgResultDiv" style="height: 100%; overflow-y: auto">{{__('هیچ پیام جدیدی موجود نیست')}}</div>
                        </div>

                        <div class="lp_others_content hidden" id="lp_others_mark">
                            <div class="lp_others_titles"> {{__('نشون‌کرده')}} </div>
                            <div class="mainContainerBookmarked" style="height: calc(100vh - 170px);">
                                <div id="phoneBookMarks">
                                    <div class="masthead-recent-class">
                                        @if(\auth()->check())
                                            <a class="lp_others_recentView" target="_self" href="##placeRedirect##">
                                                <div class="lp_others_rvPicBox col-xs-8" style="display: flex; justify-content: center; align-items: center;">
                                                    <img src="##placePic##" class="resizeImgClass" style="width: 100%;" onload="fitThisImg(this)">
                                                </div>
                                                <div class="col-xs-4 placeDetailsLeftBar">
                                                    <div class="">##placeName##</div>
                                                    <div class="lp_others_rating" style="display: flex; align-items: center; justify-content: center">
                                                        <div class="ui_bubble_rating bubble_##placeRate##0"></div>
                                                        ##placeReviews## نقد
                                                    </div>
                                                    <div class="">##placeCity##</div>
                                                </div>
                                            </a>
                                        @else
                                            <div style="display: flex; justify-content: center; align-items: center; height: 50vh; background: white;">
                                                <div class="login-button mainLoginButton" title="{{__('auth.ورود / ثبت نام')}}" style="text-align: center;"> {{__('auth.ورود / ثبت نام')}}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
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
                        <div>{{__('نشون‌کرده')}}</div>
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
            <div class="mainPopUp leftPopUp" style="overflow-y: auto">
                <div class="closeFooterPopupIcon iconFamily iconClose" onclick="$('#otherPossibilities').modal('hide')"></div>
                @if(isset($locationName))
                    <div class="pSC_tilte">
                        <div style="text-align: center">
                            {{__('در')}}
                            <span class="pSC_cityTilte" >{{$locationName['name']}}</span>
                            {{__('بیشتر مشاهده کنید')}}
                        </div>
                    </div>
                    <div class="pSC_boxOfDetails">
                        <div class="pSC_choiseDetailsText">{{__('به سادگی انتخاب کنید')}}</div>
                        <div>
                            <div class="pSC_boxOfCityDetails" style="display: flex; flex-wrap: wrap;">
                                <a href="{{route('cityPage', ['kind' => $locationName['kindState'], 'city' => $locationName['cityNameUrl'] ])}}" class="pSC_cityDetails" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{__('اطالاعات')}} {{$locationName['cityNameUrl']}}
                                </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 4, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl'] ])}}" class="pSC_cityDetails">{{__('اقامتگاه ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 12, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']  ])}}" class="pSC_cityDetails">{{__('بوم گردی ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']  ])}}" class="pSC_cityDetails">{{__('رستوران ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']  ])}}" class="pSC_cityDetails">{{__('جاذبه‌ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']  ])}}" class="pSC_cityDetails">{{__('طبیعت گردی')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']  ])}}" class="pSC_cityDetails">{{__('غذاهای محلی')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 10, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']  ])}}" class="pSC_cityDetails">{{__('صنایع دستی')}} </a>
                                <a href="https://koochitatv.com" class="pSC_cityDetails koochitaTvRowPhoneFooter noneBorder">
                                    {{__('تلویزیون گردشگری کوچیتا')}}
                                    <img src="{{URL::asset('images/mainPics/vodLobo.png')}}" alt="koochitatv" style="height: 25px">
                                </a>

                                @if($locationName['kindState'] == 'city')
                                    <a href="{{route('cityPage', ['kind' => 'state', 'city' => $locationName['state'] ])}}" class="pSC_cityDetails koochitaTvRowPhoneFooter noneBorder" style="border-top: solid #a1a1a1 1px !important;">
                                        {{__('مشاهده')}}
                                        {{__('استان')}}
                                        {{$locationName['state']}}
                                    </a>
                                @endif
                            </div>
                            <div style="margin-top: 15px; text-align: left;display: flex; justify-content: space-between;">
                                <button type="button" class="btn btn-danger newCityInPhoneFooter" onclick="openMainSearch(0) // in mainSearch.blade.php" style="background: var(--koochita-green)">{{__('جستجو کنید')}}</button>
                                <button type="button" class="btn btn-danger newCityInPhoneFooter" onclick="openMainSearch(0) // in mainSearch.blade.php">{{__('انتخاب شهر جدید')}}</button>
                            </div>
                        </div>
                        <div class="overflowOptimizer"></div>
                    </div>

                @else
                    <div class="pSC_tilte">
                        <div>
                            {{__('در کل ایران بیشتر مشاهده کنید')}}
                        </div>
                    </div>
                    <div class="pSC_boxOfDetails">
                        <div class="pSC_choiseDetailsText">{{__('به سادگی انتخاب کنید')}}</div>
                        <div>
                            <div class="pSC_boxOfCityDetails" style="display: flex; flex-wrap: wrap;">
                                <a href="{{route('place.list', ['kindPlaceId' => 4, 'mode' => 'country'])}}" class="pSC_cityDetails">{{__('اقامتگاه‌ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 12, 'mode' => 'country'])}}" class="pSC_cityDetails">{{__('بوم گردی ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => 'country'])}}" class="pSC_cityDetails">{{__('رستوران‌ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => 'country'])}}" class="pSC_cityDetails">{{__('جاذبه‌‌ها')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => 'country'])}}" class="pSC_cityDetails">{{__('طبیعت گردی')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => 'country'])}}" class="pSC_cityDetails">{{__('غذاهای محلی')}} </a>
                                <a href="{{route('place.list', ['kindPlaceId' => 10, 'mode' => 'country'])}}" class="pSC_cityDetails"  style="width: 100%">{{__('صنایع دستی')}} </a>

                                <a href="https://koochitatv.com" class="pSC_cityDetails koochitaTvRowPhoneFooter noneBorder">
                                    {{__('تلویزیون گردشگری کوچیتا')}}
                                    <img src="{{URL::asset('images/mainPics/vodLobo.png')}}" alt="koochitatv" style="height: 25px">
                                </a>
                            </div>
                            <div style="margin-top: 15px; text-align: left;display: flex; justify-content: space-between;">
                                <button type="button" class="btn btn-danger newCityInPhoneFooter" onclick="openMainSearch(0) // in mainSearch.blade.php" style="background: var(--koochita-green)">{{__('جستجو کنید')}}</button>
                                <button type="button" class="btn btn-danger newCityInPhoneFooter" onclick="openMainSearch(0) // in mainSearch.blade.php">{{__('انتخاب شهر جدید')}}</button>
                            </div>
                        </div>
                        <div class="overflowOptimizer"></div>
                    </div>
                @endif

                <div class="footerSocialDivPhone">

                    <a rel="nofollow" target="_blank" href="https://twitter.com/shazdemosafer">
                        <div class="footerIconHor twitter"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="https://www.facebook.com/profile.php?id=100016313805277&ref=br_rs">
                        <div class="footerIconHor facebook"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="#">
                        <div class="footerIconHor youtubeBackground"></div>
                    </a>
                    <a class="socialLink" rel="nofollow" target="_blank" href="https://t.me/shazdehmosafer">
                        <div class="footerIconHor telegram"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="https://www.linkedin.com/in/shazde-mosafer-652817143/">
                        <div class="footerIconHor linkedin"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="#">
                        <div class="footerIconHor pinterest"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="#">
                        <div class="footerIconHor whatsappBackground"></div>
                    </a>
                    <a class="socialLink" rel="nofollow" target="_blank" href="https://aparat.com">
                        <div class="footerIconHor aparat"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="https://www.instagram.com/shazdehmosafer/">
                        <div class="footerIconHor instagram"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="#">
                        <div class="footerIconHor newsBackground"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="http://www.bogenstudio.com/">
                        <div class="footerIconHor bogenBackground"></div>
                    </a>
                    <a rel="nofollow" target="_blank" href="http://www.sisootech.com/">
                        <div class="footerIconHor sisootechBackground"></div>
                    </a>

                </div>
                <div class="footerLanguageSectionPhone">
                    <div class="footerLanguageDivPhone">
                        <div class="footerLanguageTextPhone">
                            {{__('زبان')}}
                        </div>
                        <div class="footerLanguageInputPhone">
                            <select class="chooseLanguagePhone" onchange="goToLanguage(this.value)">
                                <option value="0">انتخاب زبان</option>
                                <option value="fa">فارسی</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="hideOnScreen phoneFooterStyle">
                    <div class="phoneFooterLogo">
                        <img src="{{URL::asset('images/icons/mainLogo.png')}}" class="content-icon" width="100%">
                    </div>
                    <div class="phoneDescription">
                        <div class="phoneDescriptionText" style="overflow: hidden">
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
                <div class="mainPopUp rightPopUp profileFooterPopUp">
                    <div class="closeFooterPopupIcon iconFamily iconClose"
                         onclick="$('#profile').modal('hide')"
                         style="top: -10px; z-index: 999"></div>
                    <div id="lp_register">
                        <div class="row" style="width: 100%; margin: 0px; flex-direction: column;">
                            <div class="firsLine">
                                <div class="pic">
                                    <img src="{{isset($buPic) ? $buPic : ''}}"/>
                                </div>
                                <div class="infos">
                                    <div class="inf">
                                        <div class="number">1</div>
                                        <div class="name">سطح کاربر</div>
                                    </div>
                                    <div class="inf">
                                        <div class="number">0</div>
                                        <div class="name">امتیاز</div>
                                    </div>
                                    <div class="inf" onclick="mobileFooterProfileButton('follower')">
                                        <div class="number">{{$followersCount}}</div>
                                        <div class="name">دنبال کننده</div>
                                    </div>
                                </div>
                            </div>
                            <div class="secondLine">
                                {{$userFooter->username}}
                            </div>
                            <div class="buttonsLine">
                                <div class="mBLine bLine">
                                    <div onclick="window.location.href='{{route("profile")}}'">
                                        <div class="name" style="font-size: 16px; font-weight: bold;">صفحه من</div>
                                    </div>
                                    <div onclick="window.location.href='{{route("profile.message.page")}}'">
                                        <div class="name" style="font-size: 16px; font-weight: bold; color: {{$newMsgCount > 0 ? 'var(--koochita-red)' : ''}};">صندوق پیام</div>
                                        @if($newMsgCount > 0)
                                            <div class="footerMsgCountNumber">{{$newMsgCount}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mBLine bLine">
                                    <div onclick="mobileFooterProfileButton('review')">
                                        <div class="icon EmptyCommentIcon"></div>
                                        <div class="name">پست ها</div>
                                    </div>
                                    <div onclick="mobileFooterProfileButton('photo')">
                                        <div class="icon emptyCameraIcon"></div>
                                        <div class="name">عکس و فیم</div>
                                    </div>
                                    <div onclick="mobileFooterProfileButton('question')">
                                        <div class="icon questionIcon"></div>
                                        <div class="name">سوال و جواب</div>
                                    </div>
                                    <div onclick="mobileFooterProfileButton('safarnameh')">
                                        <div class="icon safarnameIcon"></div>
                                        <div class="name">سفرنامه ها</div>
                                    </div>
                                </div>
                                <div class="mBLine bLine">
                                    <div onclick="mobileFooterProfileButton('medal')">
                                        <div class="icon medalsIcon"></div>
                                        <div class="name">جایزه و امتیاز</div>
                                    </div>
                                    <div onclick="mobileFooterProfileButton('follower')">
                                        <div class="icon twoManIcon"></div>
                                        <div class="name" >دنبال کنندگان</div>
                                    </div>
                                    <div onclick="mobileFooterProfileButton('bookMark')">
                                        <div class="icon BookMarkIconEmpty" style="font-size: 26px;"></div>
                                        <div class="name">نشان کرده</div>
                                    </div>
                                    <div onclick="mobileFooterProfileButton('setting')">
                                        <div class="icon settingIcon"></div>
                                        <div class="name">تنظیمات</div>
                                    </div>
                                </div>
                                <div class="mBLine bLine">
                                    <div onclick="mobileFooterProfileButton('festival')">
                                        <div class="icon festivalIcon"></div>
                                        <div class="name">فستیوال</div>
                                    </div>
                                    <div onclick="window.location.href = '{{route("myTrips")}}'">
                                        <div class="icon MyTripsIcon"></div>
                                        <div class="name">سفرهای من</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profileScoreMainDiv">
                            <div class="memberPointInfo">
                                <div class="head">
                                    <div>
                                        {{__('امتیازات من')}}
                                    </div>
                                    <div style="font-size: 10px">
                                        <a href="">{{__('سیستم امتیازدهی')}}</a>
                                    </div>
                                </div>

                                <div class="modules-membercenter-total-points" style="padding-top: 2px;">
                                    <div class="mainDivTotalPoint">
                                        <div class="label" style="font-size: 17px;"> {{__('امتیاز کل شما')}} </div>
                                        <div class="points">{{$userTotalPointFooter}}</div>
                                    </div>
                                    <div class="points_to_go">
                                            <span style="justify-content: space-between;">
                                                <b class="points"> {{$nextLevelFooter}} </b>
                                                <span style="text-align: center;    font-size: 16px;">{{__('امتیاز  مانده به مرحله بعد')}}</span>
                                            </span>
                                    </div>
                                </div>
                                <div class="modules-membercenter-level-progress">
                                    <div data-direction="left" id="targetHelp_9" class="targets progress_info tripcollectiveinfo">
                                        <div>

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
{{--                        <div class="userProfileActivitiesMainDiv rightColBoxes">--}}
{{--                            <div class="mainDivHeaderText">--}}
{{--                                <h3>{{__('شرح فعالیت‌ها')}}</h3>--}}
{{--                            </div>--}}
{{--                            <div class="activitiesMainDiv">--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('گذاشتن پست')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('پست')}} {{$userInfo['postCount']}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('آپلود عکس')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('عکس')}}  {{$userInfo['picCount']}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('آپلود فیلم')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('فیلم')}}  {{$userInfo['videoCount']}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('آپلود فیلم 360')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('فیلم')}}  {{$userInfo['video360Count']}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('پرسیدن سؤال')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('سؤال')}}  {{$userInfo['questionCount']}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('پاسخ به سؤال دیگران')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('پاسخ')}}  {{$userInfo['ansCount']}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('امتیازدهی')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('مکان')}}  {{$userInfo['scoreCount']}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('پاسخ به سؤالات اختیاری')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('پاسخ')}} 0</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('ویرایش مکان')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('مکان')}} 0</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('پیشنهاد مکان جدید')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('مکان')}} 0</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('نوشتن مقاله')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('مقاله')}} 0</div>--}}
{{--                                </div>--}}
{{--                                <div class="activitiesLinesDiv">--}}
{{--                                    <div class="activityTitle">{{__('معرفی دوستان')}}</div>--}}
{{--                                    <div class="activityNumbers">{{__('معرفی')}} 7</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="logoutSectionMobile">
                            <a href="{{route('logout')}}" class="logoutButton">
                                <div class="icon"></div>
                                <div class="name">خروج</div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>

    <script>
        function showSafarnamehFooterSearch(_element, _kind){
            $(_element).parent().find('.selected').removeClass('selected');
            $(_element).addClass('selected');
            if(_kind == 'place'){
                $('#safarnamehPlaceSearchFooter').show();
                $('#safarnamehContentSearchFooter').hide();
            }
            else{
                $('#safarnamehPlaceSearchFooter').hide();
                $('#safarnamehContentSearchFooter').show();
            }
        }

        function showSafarnamehSubCategory(_id){
            $('.mainSafarnamehCategory').hide();
            $('.subSafarnamehCategory').show();
            $(`#subSafarnamehCategory_${_id}`).show();
            setTimeout(() => $(`#subSafarnamehCategory_${_id}`).addClass('show'), 10);
        }

        function backToSafarnamehCategoryFooter(_element){
            $(_element).parent().removeClass('show');
            setTimeout(() => {
                $(_element).parent().hide();
                $('.mainSafarnamehCategory').show();
                $('.subSafarnamehCategory').hide();
            }, 300);
        }

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

        function showMorefooter() {
            $('.footMoreLessBtnText').toggleClass('hidden');
            $('#aboutShazde').toggleClass('aboutShazdeMoreLess');
        }
    </script>

    @if(Auth::check())
        <script>
            let recentlySample = 0;
            let bookMarkSample;
            let getPhoneBookMarks = false;
            let profileUrl = '{{route("profile")}}';
            let usrnme = '{{$userFooter->username}}';

            bookMarkSample = $('#phoneBookMarks').html();
            $('#phoneBookMarks').empty();

            function showBookMarksPhone() {
                if(!getPhoneBookMarks && bookMarkSample != undefined && bookMarkSample != null) {
                    getPhoneBookMarks = true;

                    $('#phoneBookMarks').html('');
                    $.ajax({
                        type: 'post',
                        url: '{{route('getBookMarks')}}',
                        success: function (response) {
                            response = JSON.parse(response);
                            for (i = 0; i < response.length; i++) {
                                if (response[i]['placeName']) {
                                    let text = bookMarkSample;
                                    let fk = Object.keys(response[i]);
console.log(response[i]);
                                    for (let x of fk){
console.log(response[i][x]);
console.log(text);
text = text.replace(new RegExp('##' + x + '##', "g"), response[i][x]);
}
                                    $('#phoneBookMarks').append(text);
                                }
                            }
                        }
                    });
                }
            }
            showBookMarksPhone();

            function initialProgressFooter() {
                var b = "{{$userTotalPointFooter / $userLevelFooter[1]->floor}}" * 100;
                $("#progressIdPhone").css("width", b + "%");
            }
            initialProgressFooter();


            function mobileFooterProfileButton(_kind){
                let windowUrl = window.location;
                let url = windowUrl.origin + windowUrl.pathname;

                if(url == profileUrl || url == profileUrl+'/'+usrnme) {
                    if (_kind == 'review')
                        mobileChangeProfileTab($('#reviewProfileMoblieTab'), 'review'); // in mainProfile.blade.php
                    else if (_kind == 'photo')
                        mobileChangeProfileTab($('#photoProfileMoblieTab'), 'photo'); // in mainProfile.blade.php
                    else if (_kind == 'safarnameh')
                        mobileChangeProfileTab($('#safarnamehProfileMoblieTab'), 'safarnameh'); // in mainProfile.blade.php
                    else if (_kind == 'medal')
                        mobileChangeProfileTab($('#medalProfileMoblieTab'), 'medal'); // in mainProfile.blade.php
                    else if (_kind == 'question')
                        chooseFromMobileMenuTab('question', $('#myMenuMoreTabQuestion')); // in mainProfile.blade.php
                    else if (_kind == 'bookMark')
                        chooseFromMobileMenuTab('bookMark', $('#myMenuMoreTabBookMark')); // in mainProfile.blade.php
                    else if (_kind == 'festival')
                        chooseFromMobileMenuTab('festival', $('#myMenuMoreTabFestivalMark')); // in mainProfile.blade.php
                    $('#profile').modal('hide');
                }
                else if(_kind == 'setting')
                    window.location.href = "{{route('profile.accountInfo')}}";
                else if(_kind == 'follower')
                    openFollowerModal('resultFollowers', {{$userFooter->id}}); // in general.followerPopUp.blade.php
                else
                    window.location.href = profileUrl+'#'+_kind;
            }
        </script>
    @elseif(Request::is('show-place-details/*') || Request::is('placeList/*'))
        <script>
            function openLoginHelperSection(){
                $('.loginHelperSection').removeClass('hidden');
                $('html, body').css('overflow', 'hidden');
            }

            function closeLoginHelperSection() {
                $('.loginHelperSection').addClass('hidden');
                $('html, body').css('overflow-y', 'auto');
            }

            if (typeof(Storage) !== "undefined") {
                seeLoginHelperFunction = localStorage.getItem('loginButtonHelperNotif');
                if(seeLoginHelperFunction == null || seeLoginHelperFunction == false){
                    localStorage.setItem('loginButtonHelperNotif', true);
                    setTimeout(() => {
                        $('html, body').animate({ scrollTop: 0, }, 1000);
                        setTimeout( openLoginHelperSection, 1000);
                    }, 2000);
                }
            } else
                console.log('your browser not support localStorage');
        </script>
    @endif

</footer>
