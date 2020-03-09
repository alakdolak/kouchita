<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.topHeader')
    <title>
        کوچیتا |
        صفحه
        {{$place->name}}</title>
    <meta content="article" property="og:type"/>
    <meta name="title" content="{{$place->name}} | اطلاعات گردشگری {{$place->name}} – جاذبه های {{$place->name}} – هتل های {{$place->name}} – رستوران های {{$place->name}}- صنایع دستی و سوغات {{$place->name}} | کوچیتا " />
    <meta name='description' content='. هر چه یک گردشگر باید بداند   اطلاعات جامع و کامل {{$place->name}}. اصلاعات عمومی و تخصصی گردشگری ' />
    <meta name='keywords' content='جاذبه های  {{$place->name}} – اطلاعات گردشگری {{$place->name}} – نقد و بررسی {{$place->name}} ' />

    {{--<meta name="keywords" content="{{$post->keyword}}">--}}
    {{--<meta property="og:title" content=" {{$post->seoTitle}} " />--}}
    {{--<meta property="og:description" content=" {{$post->meta}}" />--}}
    {{--<meta name="twitter:title" content=" {{$post->seoTitle}} " />--}}
    {{--<meta name="twitter:description" content=" {{$post->meta}}" />--}}
    {{--<meta name="description" content=" {{$post->meta}}"/>--}}
    {{--<meta property="article:author " content="{{$post->user->username}}" />--}}
    {{--<meta property="article:section" content="article" />--}}
    {{--<meta property="article:published_time" content="2019-05-28T13:32:55+00:00" /> زمان انتشار--}}
    {{--<meta property="article:modified_time" content="2020-01-14T10:43:11+00:00" />زمان آخریت تغییر--}}
    {{--<meta property="og:updated_time" content="2020-01-14T10:43:11+00:00" /> زمان آخرین آپدیت--}}

    @if(isset($place->image))
        <meta property="og:image" content="{{URL::asset($place->image)}}"/>
        <meta property="og:image:secure_url" content="{{URL::asset($place->image)}}"/>
        <meta property="og:image:width" content="550"/>
        <meta property="og:image:height" content="367"/>
        <meta name="twitter:image" content="{{URL::asset($place->image)}}"/>
    @endif

    <meta property="article:tag" content="{{$place->name}}"/>
    <meta property="article:tag" content="جاذبه های {{$place->name}}"/>
    <meta property="article:tag" content="{{$place->name}} گردی"/>
    <meta property="article:tag" content="{{$place->name}} را بشناسیم"/>
    <meta property="article:tag" content="اطلاعات {{$place->name}}"/>



    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/cityPage.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>

    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/article.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/usersActivities.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/article.min.css')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/common/middleBanner.css')}}'/>

    <script>
        var searchDir = '{{route('totalSearch')}}';
        {{--var kindPlaceId = '{{$kindPlaceId}}';--}}
        var getStates = '{{route('getStates')}}';
        var getGoyesh = '{{route('getGoyesh')}}';
        var url;
    </script>

    <style>

        h3{
            margin: 0px;
        }
    </style>

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging">

@include('general.forAllPages')

<div class="header hideOnPhone">
    @include('layouts.placeHeader')
</div>

<div class="ui_container cpBody">
    <div class="cpBorderBottom cpHeader">

        <div class="cpHeaderRouteOfCityName">
            <a href="{{url('/')}}">
                <span>صفحه اصلی</span>
            </a>
            <span> > </span>
            @if(isset($place->state))
                <a href="{{url('cityPage/state/'.$place->state)}}">
                    <span>استان {{$place->state}}</span>
                </a>
                <span> > </span>
                <span>{{$place->name}}</span>
            @else
                <span>{{$place->name}}</span>
            @endif
            {{--<div class="ui_close_x" style="left: 30px !important; top: 15px !important;"></div>--}}
        </div>

        <div class="cpHeaderCityName">{{$place->name}}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-3 text-align-right hideOnPhone" style="float: left; padding: 0 !important;">
            <div class="postsMainDivInSpecificMode cpCommentBox cpBorderBottom">
                @foreach($reviews as $item)
                    <div class="postMainDivShown float-right position-relative">
                        <div class="commentWriterDetailsShow">
                            <div class="circleBase type2 commentWriterPicShow">
                                <img src="{{$item->userPic}}" alt="{{$item->user->username}}" style="width: 100%; height: 100%; border-radius: 50%;">
                            </div>
                            <div class="commentWriterExperienceDetails">
                                <b class="userProfileName">{{$item->user->username}}</b>
                                <div style="font-size: 10px">در
                                    <a href="{{$item->url}}" target="_blank">
                                        <span class="commentWriterExperiencePlace">{{$item->place->name}}، شهر {{$item->city->name}}، استان {{$item->state->name}}</span>
                                    </a>
                                </div>
                                <div style="font-size: 10px;">
                                    {{$item->timeAgo}}
                                </div>
                            </div>
                        </div>
                        <div class="commentContentsShow position-relative">
                            @if(isset($item->summery))
                                <p class="SummarizedPostTextShown" style="white-space: pre-line">
                                    {{$item->summery}}
                                    <span class="showMoreText" onclick="showMoreText(this)"></span>
                                </p>
                                <p class="completePostTextShown display-none" style="white-space: pre-line">
                                    {{$item->text}}
                                    <span class="showLessText" onclick="showLessText(this)">کمتر</span>
                                </p>
                            @else
                                <p class="completePostTextShown">
                                    {{$item->text}}
                                </p>
                            @endif
                        </div>
                        <div class="commentPhotosShow">
                            @if(count($item->pics) > 0)
                            <div class="photosCol col-xs-12" onclick="showReviewPics({{$item->id}})">
                                <div style="position: relative; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{$item->pics[0]->picUrl}}" style="position: absolute;">
                                </div>
                                @if(count($item->pics) > 1)
                                    <div class="numberOfPhotosMainDiv">
                                        <div class="numberOfPhotos">{{count($item->pics) - 1}}+</div>
                                        <div>عکس</div>
                                    </div>
                                @endif
                            </div>
                            @endif
                            <div class="quantityOfLikes">
                                <span>{{$item->like}}</span>
                                نفر دوست داشتند،
                                <span>{{$item->disLike}}</span>
                                نفر دوست نداشتند و
                                <span>{{$item->comments}}</span>
                                نفر نظر دادند.
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="cpBorderLeft" class="col-lg-9 col-sm-9 cpBorderLeft">

            <div class="row cpMainBox">
                <div class="col-md-8 col-xs-12 pd-0Imp">
                    <img class="cpPic" src="{{$place->image}}">
                </div>
                <div class="col-md-4 col-xs-12 pd-0Imp">
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/4/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon hotel"></div>
                            <div class="textCityPageIcon">هتل</div>
                            <div class="textCityPageIcon">{{count($allHotels)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <div class="cityPageIcon ticket"></div>
                            <div class="textCityPageIcon">بلیط</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/1/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon atraction"></div>
                            <div class="textCityPageIcon">جاذبه ها</div>
                            <div class="textCityPageIcon">{{count($allAmaken)}}</div>
                        </a>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/3/' . $kind. '/' . $place->listName )}}">
                            <div class="cityPageIcon restaurant"></div>
                            <div class="textCityPageIcon">رستوران</div>
                            <div class="textCityPageIcon">{{count($allRestaurant)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/10/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon soghat"></div>
                            <div class="textCityPageIcon">سوغات</div>
                            <div class="textCityPageIcon">{{count($allSogatSanaie)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/11/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon ghazamahali"></div>
                            <div class="textCityPageIcon">غذای محلی</div>
                            <div class="textCityPageIcon">{{count($allMahaliFood)}}</div>
                        </a>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/6/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon majara"></div>
                            <div class="textCityPageIcon">ماجراجویی</div>
                            <div class="textCityPageIcon">{{count($allMajara)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/10/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon sanaye"></div>
                            <div class="textCityPageIcon">صنایع دستی</div>
                            <div class="textCityPageIcon">{{count($allSogatSanaie)}}</div>
                        </a>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon lebas"></div>
                            <div class="textCityPageIcon">لباس محلی</div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon boom"></div>
                            <div class="textCityPageIcon">بوم گردی</div>
                        </div>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon estelah"></div>
                            <div class="textCityPageIcon">اصطلاحات محلی</div>
                        </div>
                        {{--<div class="col-xs-4 cpLittleMenu"></div>--}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="cpDescription cpBorderBottom" style="white-space: pre-line;">
                    {{$place->description}}
                </div>

                <div class="mainSuggestionMainDiv cpBorderBottom ng-scope">

                    @if(count($topPlaces['amaken']) > 4)
                        <div id="newKoochita" class="homepage_shelves_widget ng-scope">
                            <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                                <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">

                                    <div class="shelf_header">
                                        <div class="shelf_title">
                                            {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                                            <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
                                            <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">
                                                <div class="shelf_title_container h3">
                                                    <h3>محبوب‌ترین جاذبه‌ها&zwnj;</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                                        <div class="cpMainSug swiper-container">
                                            <div class="swiper-wrapper position-relative">
                                                @foreach($topPlaces['amaken'] as $item)
                                                    <div class="swiper-slide position-relative">
                                                    <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope position-relative">
                                                        <div class="poi">
                                                            <a href="{{$item->url}}" class="thumbnail">
                                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                                    <div class="prv_thumb has_image">
                                                                        <div class="image_wrapper landscape landscapeWide">
                                                                            <img src="{{$item->pic}}" alt="{{$item->keyword}}" class="image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="detail rtl">
                                                                <a href="{{$item->url}}" class="item poi_name ui_link ng-binding">{{$item->name}}</a>
                                                                <div class="item rating-widget">
                                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                                        <span class="ui_bubble_rating bubble_{{$item->rate}}0"></span>
                                                                    </div>
                                                                    <span class="reviewCount ng-binding">{{$item->reviews}} </span><span>نقد </span>
                                                                </div>
                                                                <div class="item tags ng-binding">{{$item->city->name}} <span>در </span>
                                                                    <span class="ng-binding">{{$item->state->name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <!-- Add Pagination -->
                                            <div class="swiper-pagination"></div>
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(count($topPlaces['restaurant']) > 4)
                        <div id="newKoochita" class="homepage_shelves_widget ng-scope">
                        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show" style="">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">

                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                                        <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
                                        <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">
                                            <div class="shelf_title_container h3">
                                                <h3>محبوب‌ترین رستوران‌ها&zwnj;</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                                    <div class="cpMainSug swiper-container">
                                        <div class="swiper-wrapper position-relative">
                                            @foreach($topPlaces['restaurant'] as $item)
                                                <div class="swiper-slide position-relative">
                                                <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope position-relative">
                                                    <div class="poi">
                                                        <a href="{{$item->url}}" class="thumbnail">
                                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                                <div class="prv_thumb has_image">
                                                                    <div class="image_wrapper landscape landscapeWide">
                                                                        <img src="{{$item->pic}}" alt="{{$item->keyword}}" class="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="detail rtl">
                                                            <a href="{{$item->url}}" class="item poi_name ui_link ng-binding">{{$item->name}}</a>
                                                            <div class="item rating-widget">
                                                                <div class="prw_rup prw_common_location_rating_simple">
                                                                    <span class="ui_bubble_rating bubble_{{$item->rate}}0"></span>
                                                                </div>
                                                                <span class="reviewCount ng-binding">{{$item->reviews}} </span><span>نقد </span>
                                                            </div>
                                                            <div class="item tags ng-binding">{{$item->city->name}} <span>در </span>
                                                                <span class="ng-binding">{{$item->state->name}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(count($topPlaces['hotels']) > 4)
                        <div id="newKoochita" class="homepage_shelves_widget ng-scope">
                        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show" style="">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">

                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                                        <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
                                        <a href="{{route('place.list', ['kindPlaceId' => 4, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">
                                            <div class="shelf_title_container h3">
                                                <h3>محبوب‌ترین هتل‌ها&zwnj;</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                                    <div class="cpMainSug swiper-container">
                                        <div class="swiper-wrapper position-relative">
                                            @foreach($topPlaces['hotels'] as $item)
                                                <div class="swiper-slide position-relative">
                                                    <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope position-relative">
                                                        <div class="poi">
                                                            <a href="{{$item->url}}" class="thumbnail">
                                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                                    <div class="prv_thumb has_image">
                                                                        <div class="image_wrapper landscape landscapeWide">
                                                                            <img src="{{$item->pic}}" alt="{{$item->keyword}}" class="image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="detail rtl">
                                                                <a href="{{$item->url}}" class="item poi_name ui_link ng-binding">{{$item->name}}</a>
                                                                <div class="item rating-widget">
                                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                                        <span class="ui_bubble_rating bubble_{{$item->rate}}0"></span>
                                                                    </div>
                                                                    <span class="reviewCount ng-binding">{{$item->reviews}} </span><span>نقد </span>
                                                                </div>
                                                                <div class="item tags ng-binding">{{$item->city->name}} <span>در </span>
                                                                    <span class="ng-binding">{{$item->state->name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(count($topPlaces['majara']) > 4)
                        <div id="newKoochita" class="homepage_shelves_widget ng-scope">
                        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show" style="">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">

                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                                        <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
                                        <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">
                                            <div class="shelf_title_container h3">
                                                <h3>محبوب‌ترین طبیعت گردی&zwnj;</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                                    <div class="cpMainSug swiper-container">
                                        <div class="swiper-wrapper position-relative">
                                            @foreach($topPlaces['majara'] as $item)
                                                <div class="swiper-slide position-relative">
                                                    <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope position-relative">
                                                        <div class="poi">
                                                            <a href="{{$item->url}}" class="thumbnail">
                                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                                    <div class="prv_thumb has_image">
                                                                        <div class="image_wrapper landscape landscapeWide">
                                                                            <img src="{{$item->pic}}" alt="{{$item->keyword}}" class="image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="detail rtl">
                                                                <a href="{{$item->url}}" class="item poi_name ui_link ng-binding">{{$item->name}}</a>
                                                                <div class="item rating-widget">
                                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                                        <span class="ui_bubble_rating bubble_{{$item->rate}}0"></span>
                                                                    </div>
                                                                    <span class="reviewCount ng-binding">{{$item->reviews}} </span><span>نقد </span>
                                                                </div>
                                                                <div class="item tags ng-binding">{{$item->city->name}} <span>در </span>
                                                                    <span class="ng-binding">{{$item->state->name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(count($topPlaces['sogatSanaie']) > 4)
                        <div id="newKoochita" class="homepage_shelves_widget ng-scope">
                        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">

                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                                        <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
                                        <a href="{{route('place.list', ['kindPlaceId' => 10, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">
                                            <div class="shelf_title_container h3">
                                                <h3>محبوب‌ترین سوغات و صنایع دستی&zwnj;</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                                    <div class="cpMainSug swiper-container">
                                        <div class="swiper-wrapper position-relative">
                                            @foreach($topPlaces['sogatSanaie'] as $item)
                                                <div class="swiper-slide position-relative">
                                                    <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope position-relative">
                                                        <div class="poi">
                                                            <a href="{{$item->url}}" class="thumbnail">
                                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                                    <div class="prv_thumb has_image">
                                                                        <div class="image_wrapper landscape landscapeWide">
                                                                            <img src="{{$item->pic}}" alt="{{$item->keyword}}" class="image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="detail rtl">
                                                                <a href="{{$item->url}}" class="item poi_name ui_link ng-binding">{{$item->name}}</a>
                                                                <div class="item rating-widget">
                                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                                        <span class="ui_bubble_rating bubble_{{$item->rate}}0"></span>
                                                                    </div>
                                                                    <span class="reviewCount ng-binding">{{$item->reviews}} </span><span>نقد </span>
                                                                </div>
                                                                <div class="item tags ng-binding">{{$item->city->name}} <span>در </span>
                                                                    <span class="ng-binding">{{$item->state->name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(count($topPlaces['mahaliFood']) > 4)
                        <div id="newKoochita" class="homepage_shelves_widget ng-scope">
                        <div infinite-scroll="myPagingFunction()" class="prw_rup prw_shelves_shelf_widget" ng-show="show" style="">
                            <div class="shelf_container poi_by_tag rebrand shelf_row_3 loaderOff">

                                <div class="shelf_header">
                                    <div class="shelf_title">
                                        {{--<span class="shelf_header_icon ui_icon travelers-choice-badge"></span>--}}
                                        <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
                                        <a href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">
                                            <div class="shelf_title_container h3">
                                                <h3>محبوب‌ترین غذاهای محلی&zwnj;</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="shelf_item_container ui_columns is-mobile is-multiline" style="width: 100%">
                                    <div class="cpMainSug swiper-container">
                                        <div class="swiper-wrapper position-relative">
                                            @foreach($topPlaces['mahaliFood'] as $item)
                                                <div class="swiper-slide position-relative">
                                                    <img src="{{URL::asset('images/pin.png')}}" class="imageGoldPin">
                                                    <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget ui_column is-6-mobile ng-scope position-relative">
                                                        <div class="poi">
                                                            <a href="{{$item->url}}" class="thumbnail">
                                                                <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                                    <div class="prv_thumb has_image">
                                                                        <div class="image_wrapper landscape landscapeWide">
                                                                            <img src="{{$item->pic}}" alt="{{$item->keyword}}" class="image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="detail rtl">
                                                                <a href="{{$item->url}}" class="item poi_name ui_link ng-binding">{{$item->name}}</a>
                                                                <div class="item rating-widget">
                                                                    <div class="prw_rup prw_common_location_rating_simple">
                                                                        <span class="ui_bubble_rating bubble_{{$item->rate}}0"></span>
                                                                    </div>
                                                                    <span class="reviewCount ng-binding">{{$item->reviews}} </span><span>نقد </span>
                                                                </div>
                                                                <div class="item tags ng-binding">{{$item->city->name}} <span>در </span>
                                                                    <span class="ng-binding">{{$item->state->name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>

            <div class="col-xs-12">
                <div class="widget-head widget-head-45">
                    <strong class="widget-title">پر طرفدار ها</strong>
                    <div class="widget-head-bar"></div>
                    <div class="widget-head-line"></div>
                </div>
                <div class="row">
                    <article class="im-article content-2col col-md-6 col-sm-12">
                        <div class="im-entry-thumb">
                            <a class="im-entry-thumb-link" href="{{$post[0]->url}}"
                               title="{{$post[0]->slug}}">
                                <img class="lazy-img" src="{{$post[0]->pic}}" alt="{{$post[0]->keyword}}" style="opacity: 1;">
                            </a>
                            <header class="im-entry-header">
                                <div class="im-entry-category">
                                    <div class="iranomag-meta clearfix">
                                        <div class="cat-links im-meta-item">
                                            <a style="background-color: #666; color: #fff !important;" href="{{$post[0]->catURL}}"
                                               title="{{$post[0]->category}}">{{$post[0]->category}}</a>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="im-entry-title">
                                    <a href="{{$post[0]->url}}" rel="bookmark">{{$post[0]->title}}</a>
                                </h3>
                            </header>
                        </div>
                        <div class="im-entry">
                            <div class="iranomag-meta clearfix">
                                <div class="posted-on im-meta-item">
                                    <span class="entry-date published updated">{{$post[0]->date}}</span>
                                </div>

                                <div class="comments-link im-meta-item">
                                    <i class="fa fa-comment-o"></i>{{$post[0]->msgs}}
                                </div>

                                <div class="author vcard im-meta-item">
                                    <i class="fa fa-user"></i>{{$post[0]->username}}
                                </div>

                                <div class="post-views im-meta-item">
                                    <i class="fa fa-eye"></i>{{$post[0]->seen}}
                                </div>
                            </div>
                        </div>
                    </article>
                    <div class="col-md-6 col-sm-12">
                        <div class="widget">
                            <ul>
                                @for($i = 1; $i <= 4 && $i < count($post); $i++)
                                    <li class="widget-10104im-widgetclearfix">
                                    <figure class="im-widget-thumb">
                                        <a href="{{$post[$i]->url}}" title="{{$post[$i]->title}}">
                                            <img src="{{$post[$i]->pic}}" alt="{{$post[$i]->keyword}}">
                                        </a>
                                    </figure>
                                    <div class="im-widget-entry">
                                        <header class="im-widget-entry-header">
                                            <h4 class="im-widget-entry-title">
                                                <a href="{{$post[$i]->url}}"
                                                   title="{{$post[$i]->title}}">{{$post[$i]->title}}</a>
                                            </h4>
                                        </header>
                                        <div class="iranomag-meta clearfix">
                                            <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">{{$post[$i]->date}}</span>
                                            </div>
                                            <div class="comments-link im-meta-item">
                                                <i class="fa fa-comment-o"></i>{{$post[$i]->msgs}}
                                            </div>
                                            <div class="author vcard im-meta-item">
                                                <i class="fa fa-user"></i>{{$post[$i]->username}}
                                            </div>
                                            <div class="post-views im-meta-item">
                                                <i class="fa fa-eye"></i>{{$post[$i]->seen}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 cpBorderBottom">
                <div class="cpMap" style="background-color: darkred">
                    <div id="cpMap" class="prv_map clickable full-width full-height"></div>
                </div>
                <div class="cpMapList" id="show">
                    <img class="cpMapCategory" id="hotelImg" src="{{URL::asset('images/mapIcon/mhotel.png')}}"
                         onclick="toggleIconInMap('hotelImg')">
                    <img class="cpMapCategory" id="restImg" src="{{URL::asset('images/mapIcon/mrest.png')}}"
                         onclick="toggleIconInMap('restImg')">
                    <img class="cpMapCategory" id="fastImg" src="{{URL::asset('images/mapIcon/mfast.png')}}"
                         onclick="toggleIconInMap('fastImg')">
                    <img class="cpMapCategory" id="musImg" src="{{URL::asset('images/mapIcon/matr_mus.png')}}"
                         onclick="toggleIconInMap('musImg')">
                    <img class="cpMapCategory" id="plaImg" src="{{URL::asset('images/mapIcon/matr_pla.png')}}"
                         onclick="toggleIconInMap('plaImg')">
                    <img class="cpMapCategory" id="shcImg" src="{{URL::asset('images/mapIcon/matr_shc.png')}}"
                         onclick="toggleIconInMap('shcImg')">
                    <img class="cpMapCategory" id="funImg" src="{{URL::asset('images/mapIcon/matr_fun.png')}}"
                         onclick="toggleIconInMap('funImg')">
                    <img class="cpMapCategory" id="advImg" src="{{URL::asset('images/mapIcon/matr_adv.png')}}"
                         onclick="toggleIconInMap('advImg')">
                    <img class="cpMapCategory" id="natImg" src="{{URL::asset('images/mapIcon/matr_nat.png')}}"
                         onclick="toggleIconInMap('natImg')">
                </div>
            </div>

        </div>
    </div>
</div>

@include('layouts.placeFooter')

@include('hotelDetailsPopUp')

<script defer src="{{URL::asset('js/cityPage/cityPageOffer.js')}}"></script>

<script>
    var reviews = {!! json_encode($reviews) !!};

    function showReviewPics(_id){
        var selectReview = 0;
        var reviewPicForAlbum = [];

        for(i = 0; i < reviews.length; i++){
            if(reviews[i]['id'] == _id){
                selectReview = reviews[i];
                break;
            }
        }

        if(selectReview != 0){
            revPic = selectReview['pics'];
            for(var i = 0; i < revPic.length; i++){
                reviewPicForAlbum[i] = {
                    'id' : revPic[i]['id'],
                    'sidePic' : revPic[i]['picUrl'],
                    'mainPic' : revPic[i]['picUrl'],
                    'video' : revPic[i]['videoUrl'],
                    'userPic' : selectReview['userPic'],
                    'userName' : selectReview['user']['username'],
                    'uploadTime' : selectReview['timeAgo'],
                    'showInfo' : false,
                }
            }

            createPhotoModal('عکس های پست', reviewPicForAlbum);
        }
    }

    function showMoreText(element){
        $(element).parent().addClass('display-none');
        $(element).parent().next().removeClass('display-none');
    }

    function showLessText(element){
        $(element).parent().addClass('display-none');
        $(element).parent().prev().removeClass('display-none');
    }

    $(window).ready(function(){
        var height = $('#cpBorderLeft').height();
        $('.cpCommentBox').css('max-height', height);
    });
</script>

{{--map--}}
<script>
    var x = '{{$place->x}}';
    var y = '{{$place->y}}';
    var all_amaken = {!! $allPlaces[0] !!};
    var all_majara = {!! $allPlaces[3] !!};
    var all_hotels = {!! $allPlaces[1] !!};
    var all_restaurant = {!! $allPlaces[2] !!};
    var iconBase = '{{URL::asset('images/mapIcon') . '/'}}';
    var icons = {
        hotel: {
            icon: iconBase + 'mhotel.png'
        },
        amaken1: {
            icon: iconBase + 'matr_pla.png'
        },
        amaken2: {
            icon: iconBase + 'matr_mus.png'
        },
        amaken3: {
            icon: iconBase + 'matr_shc.png'
        },
        amaken4: {
            icon: iconBase + 'matr_nat.png'
        },
        amaken5: {
            icon: iconBase + 'matr_fun.png'
        },
        fastfood: {
            icon: iconBase + 'mfast.png'
        },
        rest: {
            icon: iconBase + 'mrest.png'
        },
        adv: {
            icon: iconBase + 'matr_adv.png'
        },
    };

    var markersHotel = [];
    var markersRest = [];
    var markersFast = [];
    var markersMus = [];
    var markersPla = [];
    var markersShc = [];
    var markersFun = [];
    var markersAdv = [];
    var markersNat = [];
    var majaraMap = [];
    var map2;

    function init() {
        var x = '{{$map["C"]}}';
        var y = '{{$map["D"]}}';
        var minLat = parseFloat("{{$map['minLat']}}");
        var maxLat = parseFloat("{{$map['maxLat']}}");
        var minLng = parseFloat("{{$map['minLng']}}");
        var maxLng = parseFloat("{{$map['maxLng']}}");

        var mapOptions = {
            center: new google.maps.LatLng(x, y),
            zoom: 5,
            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{
                "featureType": "landscape",
                "stylers": [{"hue": "#FFA800"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
            }, {
                "featureType": "road.highway",
                "stylers": [{"hue": "#53FF00"}, {"saturation": -73}, {"lightness": 40}, {"gamma": 1}]
            }, {
                "featureType": "road.arterial",
                "stylers": [{"hue": "#FBFF00"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
            }, {
                "featureType": "road.local",
                "stylers": [{"hue": "#00FFFD"}, {"saturation": 0}, {"lightness": 30}, {"gamma": 1}]
            }, {
                "featureType": "water",
                "stylers": [{"hue": "#00BFFF"}, {"saturation": 6}, {"lightness": 8}, {"gamma": 1}]
            }, {
                "featureType": "poi",
                "stylers": [{"hue": "#679714"}, {"saturation": 33.4}, {"lightness": -25.4}, {"gamma": 1}]
            }]
        };
        var mapElementSmall = document.getElementById('cpMap');
        map2 = new google.maps.Map(mapElementSmall, mapOptions);

        var bounds = new google.maps.LatLngBounds({lat: minLat, lng: minLng}, {lat: maxLat, lng: maxLng});
        map2.fitBounds(bounds);

        var marker;

        // set amaken marker
        for (i = 0; i < all_amaken.length; i++) {
            if (all_amaken[i].mooze == 1)
                kindAmaken = 'amaken2';
            else if (all_amaken[i].tarikhi == 1)
                kindAmaken = 'amaken1';
            else if (all_amaken[i].tabiatgardi == 1)
                kindAmaken = 'amaken4';
            else if (all_amaken[i].tafrihi == 1)
                kindAmaken = 'amaken5';
            else if (all_amaken[i].markazkharid == 1)
                kindAmaken = 'amaken3';
            else
                kindAmaken = 'amaken2';

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_amaken[i]['C'], all_amaken[i]['D']),
                icon: {
                    url: icons[kindAmaken].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_amaken[i]['name'],
                url: all_amaken[i]['url']
            }).addListener('click', function() {
                var win = window.open(this.url, '_blank');
                win.focus();
            });

            if (all_amaken[i].mooze == 1)
                markersMus[markersMus.length] = marker;
            else if (all_amaken[i].tarikhi == 1)
                markersPla[markersPla.length] = marker;
            else if (all_amaken[i].tabiatgardi == 1)
                markersNat[markersNat.length] = marker;
            else if (all_amaken[i].tafrihi == 1)
                markersFun[markersFun.length] = marker;
            else if (all_amaken[i].markazkharid == 1)
                markersShc[markersShc.length] = marker;
            else
                markersMus[markersMus.length] = marker;
        }

        // set hotels marker
        for (i = 0; i < all_hotels.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_hotels[i]['C'], all_hotels[i]['D']),
                icon: {
                    url: icons['hotel'].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_hotels[i]['name'],
                url: all_hotels[i]['url']
            }).addListener('click', function() {
                var win = window.open(this.url, '_blank');
                win.focus();
            });

            markersHotel[i] = marker;
        }

        // set majara marker
        for (i = 0; i < all_majara.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_majara[i]['C'], all_majara[i]['D']),
                icon: {
                    url: icons['adv'].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_majara[i]['name'],
                url: all_majara[i]['url']
            }).addListener('click', function() {
                var win = window.open(this.url, '_blank');
                win.focus();
            });
            majaraMap[i] = marker;
        }

        // set restaurant marker
        for (i = 0; i < all_restaurant.length; i++) {
            if (all_restaurant[i].kind_id == 1)
                kindRestaurant = 'rest';
            else
                kindRestaurant = 'fastfood';

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(all_restaurant[i]['C'], all_restaurant[i]['D']),
                icon: {
                    url: icons[kindRestaurant].icon,
                    scaledSize: new google.maps.Size(35, 35)
                },
                map: map2,
                title: all_restaurant[i]['name'],
                url: all_restaurant[i]['url']
            }).addListener('click', function() {
                var win = window.open(this.url, '_blank');
                win.focus();
            });


            if (all_restaurant[i].kind_id == 1)
                markersRest[markersRest.length] = marker;
            else
                markersFast[markersFast.length] = marker;
        }
    }

    function toggleIconInMap(_id) {
        var src = document.getElementById(_id).src;
        var sec = src.split('.');
        var kind;

        if (sec[0].includes('off')) {
            sec[0] = sec[0].replace('off', '');
            src2 = sec[0] + '.' + sec[1];
            kind = 1;
        } else {
            src2 = sec[0] + 'off.' + sec[1];
            kind = 0;
        }
        document.getElementById(_id).src = src2;

        if (_id == 'hotelImg') {
            setInMap(kind, markersHotel);
        } else if (_id == 'restImg') {
            setInMap(kind, markersRest);
        } else if (_id == 'fastImg') {
            setInMap(kind, markersFast);
        } else if (_id == 'musImg') {
            setInMap(kind, markersMus);
        } else if (_id == 'plaImg') {
            setInMap(kind, markersPla);
        } else if (_id == 'shcImg') {
            setInMap(kind, markersShc);
        } else if (_id == 'funImg') {
            setInMap(kind, markersFun);
        } else if (_id == 'advImg') {
            setInMap(kind, majaraMap);
        } else if (_id == 'natImg') {
            setInMap(kind, markersNat);
        }
    }

    function setInMap(isSet, marker) {
        if (isSet == 1) {
            for (var i = 0; i < marker.length; i++)
                marker[i]['i'].setMap(map2)
        }
        else {
            for (var i = 0; i < marker.length; i++)
                marker[i]['i'].setMap(null)
        }

    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=init"></script>
<script>
    var swiper = new Swiper('.cpMainSug', {
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            450: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            520: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            10000: {
                slidesPerView: 4,
                spaceBetween: 20,
            }
        }
    });
</script>

</body>

</html>

