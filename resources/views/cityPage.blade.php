<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.topHeader')
    <title>
        {{__('کوچیتا |صفحه')}}
        {{$place->name}}</title>

    <meta content="article" property="og:type"/>
    <meta name="title" content="{{$place->name}} | اطلاعات گردشگری {{$place->name}} – جاذبه های {{$place->name}} – هتل های {{$place->name}} – رستوران های {{$place->name}}- صنایع‌دستی و سوغات {{$place->name}} | کوچیتا " />
    <meta name="og:title" content="{{$place->name}} | اطلاعات گردشگری {{$place->name}} – جاذبه های {{$place->name}} – هتل های {{$place->name}} – رستوران های {{$place->name}}- صنایع‌دستی و سوغات {{$place->name}} | کوچیتا " />
    <meta name="twitter:title" content="{{$place->name}} | اطلاعات گردشگری {{$place->name}} – جاذبه های {{$place->name}} – هتل های {{$place->name}} – رستوران های {{$place->name}}- صنایع‌دستی و سوغات {{$place->name}} | کوچیتا " />
    <meta name='description' content='. هر چه یک گردشگر باید بداند   اطلاعات جامع و کامل {{$place->name}}. اصلاعات عمومی و تخصصی گردشگری ' />
    <meta name='og:description' content='. هر چه یک گردشگر باید بداند   اطلاعات جامع و کامل {{$place->name}}. اصلاعات عمومی و تخصصی گردشگری ' />
    <meta name='twitter:description' content='. هر چه یک گردشگر باید بداند   اطلاعات جامع و کامل {{$place->name}}. اصلاعات عمومی و تخصصی گردشگری ' />
    <meta name='keywords' content='جاذبه های  {{$place->name}} – اطلاعات گردشگری {{$place->name}} – نقد و بررسی {{$place->name}} ' />

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


    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>

    <link rel="stylesheet" type='text/css' href="{{URL::asset('css/shazdeDesigns/usersActivities.css')}}">
    <link rel="stylesheet" type='text/css' href="{{URL::asset('css/theme2/article.min.css')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/cityPage.css')}}'/>

</head>

<body>

@include('general.forAllPages')

@include('layouts.header1')

<script>
    function runMainSwiper(){
        var swiper = new Swiper('.mainSuggestion', {
            loop: true,
            updateOnWindowResize: true,
            navigation: {
                prevEl: '.swiper-button-next',
                nextEl: '.swiper-button-prev',
            },
            on: {
                init: function(){
                    this.update();
                },
                resize: function () {
                    resizeFitImg('resizeImgClass');
                    this.update()
                },
            },
            breakpoints: {
                450: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                991: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                10000: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }
        });
    }

    function createCityPageSuggestion(_id, _item, _callBack){
        createSuggestionPack(_id, _item, function() {
            $('#' + _id).find('.suggestionPackDiv').addClass('swiper-slide');

            if(_callBack === 'function')
                _callBack();
        });
    }
</script>

<div class="container cpBody">
    <div class="cpBorderBottom cpHeader">

        <div class="cpHeaderRouteOfCityName">
            <a href="{{url('/')}}" class="navigatorLinks">
                <span>{{__('صفحه اصلی')}}</span>
            </a>
            <span style="color: #eab836"> > </span>
            @if(isset($place->state))
                <a href="{{url('cityPage/state/'.$place->state)}}" class="navigatorLinks">
                    <span>استان {{$place->state}}</span>
                </a>
                <span style="color: #eab836"> > </span>
                <span class="navigatorLinks" style="font-size: 13px">{{$place->name}}</span>
            @else
                <span class="navigatorLinks" style="font-size: 13px">{{$place->name}}</span>
            @endif
        </div>

        <div class="cpHeaderCityName">{{$place->name}}</div>
    </div>

    <div class="row">
        <div id="commentSection" class="col-lg-3 col-sm-3 text-align-right hideOnPhone" style="float: left; padding: 0 !important; overflow: hidden">
            <div class="row" style="font-size: 25px; margin: 5px 10px; border-bottom: solid 1px #f3f3f3;">
                {{__('تازه ترین پست ها')}}
            </div>
            <div id="reviewSection" class="postsMainDivInSpecificMode cpCommentBox cpBorderBottom" style="display: none">
                <div class="postMainDivShown float-right position-relative">
                    <div class="commentWriterDetailsShow">
                        <div class="circleBase type2 commentWriterPicShow">
                            <img src="##userPic##" alt="##userName##" style="width: 100%; height: 100%; border-radius: 50%;">
                        </div>
                        <div class="commentWriterExperienceDetails">
                            <b class="userProfileName">##userName##</b>
                            <div style="font-size: 10px">{{__('در')}}
                                <a href="##url##" target="_blank">
                                    <span class="commentWriterExperiencePlace">##placeName##، {{__('شهر')}} ##placeCity##، {{__('استان')}} ##placeState##</span>
                                </a>
                            </div>
                            <div style="font-size: 12px;">##timeAgo##</div>
                        </div>
                    </div>
                    <div class="commentContentsShow position-relative">
                        <p class="SummarizedPostTextShown ##haveSummery##">
                            ##summery##
                            <span class="showMoreText" onclick="showMoreText(this)"></span>
                        </p>
                        <p class="compvarePostTextShown display-none">
                            ##text##
                            <span class="showLessText" onclick="showLessText(this)">{{__('کمتر')}}</span>
                        </p>
                        <p class="compvarePostTextShown" style="display: ##notSummery##">
                            ##text##
                        </p>
                    </div>
                    <div class="commentPhotosShow">
                        <div class="photosCol col-xs-12" onclick="showReviewPics(##id##)" style="display: ##havePic##">
                            <div style="position: relative; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                                <img src="##firstPic##" class="resizeImgClass" style="position: absolute; width: 100%;">
                            </div>
                            <div class="numberOfPhotosMainDiv" style="display: ##morePic##">
                                <div class="numberOfPhotos">##picCount##+</div>
                                <div>{{__('عکس')}}</div>
                            </div>
                        </div>
                        <div class="quantityOfLikes">
                            <div>
                                <span>##like##</span>
                                <span class="iconFamily LikeIcon" style="color: #666666;"></span>
                            </div>
                            <div>
                                <span>##disLike##</span>
                                <span class="iconFamily DisLikeIcon" style="color: #666666;"></span>
                            </div>
                            <div>
                                <span>##comments##</span>
                                <span class="iconFamily CommentIcon" style="color: #666666;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="reviewPlaceHolderSection" class="postsMainDivInSpecificMode cpCommentBox cpBorderBottom" style="width: 100%">
                @for($i = 0; $i < 2; $i++)
                    <div class="postMainDivShown float-right position-relative">
                        <div class="commentWriterDetailsShow">
                            <div class="placeHolderAnime" style="width: 55px; height: 55px; float: right; border-radius: 50%"></div>
                            <div class="commentWriterExperienceDetails" style="display: flex; flex-direction: column; padding-right: 10px">
                                <div class="userProfileName placeHolderAnime resultLineAnim" style="width: 100px"></div>
                                <div class="userProfileName placeHolderAnime resultLineAnim" style="width: 100px"> </div>
                                <div class="userProfileName placeHolderAnime resultLineAnim" style="width: 100px"></div>
                            </div>
                        </div>
                        <div class="commentContentsShow position-relative">
                            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLine"></div>
                            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLine"></div>
                            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLine" style="width: 60%"></div>
                            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLine"></div>
                            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLine" style="width: 90%"></div>
                            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLine" style="width: 20%"></div>
                            <div class="userProfileName placeHolderAnime resultLineAnim reviewPlaceHolderTextLine"></div>
                        </div>
                        <div class="commentPhotosShow" style="border-top: 1px solid #e5e5e5; padding-top: 8px; margin-top: 5px;">
                            <div class=" placeHolderAnime reviewPicPlaceHolder"></div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div id="cpBorderLeft" class="col-lg-9 col-sm-9 cpBorderLeft">
            <div class="row cpMainBox">
                <div class="col-md-8 col-xs-12 pd-0Imp mg-bt-10">
                    @if(isset($place->pic))
                        <div class="cityPagePics swiper-container">
                            <div class="swiper-wrapper position-relative"  style="height: 100%">
                                @for($i = 0; $i < count($place->pic) && $i < 5; $i++)
                                    <div class="swiper-slide position-relative cityImgSlider" onclick="showSliderPic()">
                                        <img src="{{$place->pic[$i]->pic}}" class="resizeImgClass" style="width: 100%;" alt="{{$place->name}}">
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    @else
                        <img class="cpPic" src="{{$place->image}}">
                    @endif
                </div>
                <div class="col-md-4 col-xs-12 pd-0Imp">
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/4/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon hotel"></div>
                            <div class="textCityPageIcon">{{__('هتل')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allHotels)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <div class="cityPageIcon ticket"></div>
                            <div class="textCityPageIcon">{{__('بلیط')}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/1/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon atraction"></div>
                            <div class="textCityPageIcon">{{__('جاذبه ها')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allAmaken)}}</div>
                        </a>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/3/' . $kind. '/' . $place->listName )}}">
                            <div class="cityPageIcon restaurant"></div>
                            <div class="textCityPageIcon">{{__('رستوران')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allRestaurant)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/10/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon soghat"></div>
                            <div class="textCityPageIcon">{{__('سوغات')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allSogatSanaie)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/11/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon ghazamahali"></div>
                            <div class="textCityPageIcon">{{__('غذای محلی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allMahaliFood)}}</div>
                        </a>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/6/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon majara"></div>
                            <div class="textCityPageIcon">{{__('طبیعت گردی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allMajara)}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/10/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon sanaye"></div>
                            <div class="textCityPageIcon">{{__('صنایع‌دستی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allSogatSanaie)}}</div>
                        </a>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon lebas"></div>
                            <div class="textCityPageIcon">{{__('لباس محلی')}}</div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="col-xs-12">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/12/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon boom"></div>
                            <div class="textCityPageIcon">{{__('بوم گردی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{count($allBoomgardy)}}</div>
                        </a>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon estelah"></div>
                            <div class="textCityPageIcon">{{__('اصطلاحات محلی')}}</div>
                        </div>
                        {{--<div class="col-xs-4 cpLittleMenu"></div>--}}
                    </div>
                </div>
            </div>

            <div class="row">
                @if(strlen($place->description) > 10)
                    <div class="cpDescription cpBorderBottom" style="white-space: pre-line;">
                        {{$place->description}}
                    </div>
                @endif

                <div id="topPlacesSection" class="mainSuggestionMainDiv cpBorderBottom ng-scope" style="display: none">
                    <div class="topPlacesDivInCity">
                        <div class="topPlacesDivInCityHeader">
                            <img src="{{URL::asset('images/icons/iconneg.svg')}}" class="nagLogo" alt="کوچیتا">
                            <a href="##url##">
                                <div class="shelf_title_container h3">
                                    <h3>##name##</h3>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-container mainSuggestion" style="padding-top: 15px">
                            <div id="##id##" class="swiper-wrapper thisfirsPlaceHolder" style="direction: rtl; position: relative;"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                createSuggestionPackPlaceHolderClassName('thisfirsPlaceHolder')
            </script>

            <div class="col-xs-12 articleDiv">
                <div class="row">
                    <article class="im-article content-2col col-md-6 col-sm-12">
                        <div class="im-entry-thumb">
                            <a class="im-entry-thumb-link" href="{{$post[0]->url}}" title="{{$post[0]->slug}}">
                                <img class="lazy-img" src="{{$post[0]->pic}}" alt="{{$post[0]->keyword}}" style="opacity: 1;">
                            </a>
                            <header class="im-entry-header">
                                <div class="im-entry-category">
                                    <div class="iranomag-meta clearfix">
                                        <div class="cat-links im-meta-item">
                                            <a style="background-color: #666; color: #fff !important;" href="{{$post[0]->catURL}}"title="{{$post[0]->category}}">{{$post[0]->category}}</a>
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
                                        <a href="{{$post[$i]->url}}" title="{{$post[$i]->title}}" style="height: 100%;">
                                            <img src="{{$post[$i]->pic}}" alt="{{$post[$i]->keyword}}" class="resizeImgClass" style="width: 100%">
                                        </a>
                                    </figure>
                                    <div class="im-widget-entry">
                                        <header class="im-widget-entry-header">
                                            <a class="im-widget-entry-title lessShowText" href="{{$post[$i]->url}}" title="{{$post[$i]->title}}">
                                                {{$post[$i]->title}}
                                            </a>
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

            <div class="col-xs-12 cpBorderBottom" style="padding: 0px">
                <div class="cpMap" style="background-color: darkred">
                    <div id="cpMap" class="prv_map clickable full-width full-height"></div>
                </div>
                <div class="cpMapList" id="show">
                    <span class="mapIconsCommon boomgardyMapIcon" onclick="toggleIconInMap(this, 'boomgardy')">
                        <span class="mapIconIcon boomIcon"></span>
                    </span>
                    <span class="mapIconsCommon hotelMapIcon" onclick="toggleIconInMap(this, 'hotel')">
                        <span class="mapIconIcon hotelIcon"></span>
                    </span>
                    <span class="mapIconsCommon amakenMapIcon" onclick="toggleIconInMap(this, 'amaken')">
                        <span class="mapIconIcon atraction"></span>
                    </span>
                    <span class="mapIconsCommon restaurantMapIcon" onclick="toggleIconInMap(this, 'restaurant')">
                        <span class="mapIconIcon restaurantIcon"></span>
                    </span>
                    <span class="mapIconsCommon majaraMapIcon" onclick="toggleIconInMap(this, 'majara')">
                        <span class="mapIconIcon majaraIcon"></span>
                    </span>
                    <span class="mapIconsCommon moreInfoMapIcon" onclick="toggleIconInMap(this, 'moreInfo')">
                        <span class="mapIconIcon moreInfoIcon">i</span>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>

@include('layouts.placeFooter')

<script>

    @if(isset($place->pic))
    var cityPic = JSON.parse('{!! $place->pic !!}');

    function showSliderPic(){
        var cityPicForAlbum = [];

        for(var i = 0; i < cityPic.length; i++){
            cityPicForAlbum[i] = {
                'id' : cityPic[i]['id'],
                'sidePic' : cityPic[i]['pic'],
                'mainPic' : cityPic[i]['pic'],
                'userPic' : '',
                'userName' : 'کوچیتا',
                'uploadTime' : '',
                'showInfo' : false,
            }
        }

        createPhotoModal('عکس های شهر '+ cityName1, cityPicForAlbum);
    };


    var picSwiper = new Swiper('.cityPagePics', {
        slidesPerGroup: 1,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var changeSliderNum = 0;
    picSwiper.on('slideChange', function () {

        if(showCityPicNumber < cityPic.length) {
            if (changeSliderNum == 3) {
                let nuum = 0;
                while (nuum < 5 && showCityPicNumber < cityPic.length) {
                    slide = '<div class="swiper-slide position-relative cityImgSlider" onclick="showSliderPic()">\n' +
                        '                                        <img src="' + cityPic[showCityPicNumber]['pic'] + '" class="resizeImgClass" style="width: 100%;" alt="' + cityName1 + '">\n' +
                        '                                    </div>';
                    picSwiper.addSlide(showCityPicNumber + 1, slide);
                    nuum++;
                    showCityPicNumber++;
                }
                resizeFitImg('resizeImgClass');

                changeSliderNum = 0;
            } else
                changeSliderNum++;
        }

    });

@endif

    resizeFitImg('resizeImgClass');

    var reviews;
    var showCityPicNumber = 5;
    var cityName1 = '{{ $place->name }}';
    var reveiewSample = 0;
    var topPlacesSample = 0;
    var topPlacesSections = [
        {
            name: '{{__('محبوب‌ترین بوم گردی ها')}}',
            id: 'topBoomgardyCityPage',
            url: '{{route('place.list', ['kindPlaceId' => 12, 'mode' => $kind, 'city' => $locationName['cityNameUrl']])}}'
        },
        {
            name: '{{__('محبوبترین جاذبه ها')}}',
            id: 'topAmakenCityPage',
            url: '{{route('place.list', ['kindPlaceId' => 1, 'mode' => $kind, 'city' => $locationName['cityNameUrl'] ])}}'
        },
        {
            name: '{{__('محبوب‌ترین رستوران‌ها')}}',
            id: 'topRestaurantInCity',
            url: '{{route('place.list', ['kindPlaceId' => 3, 'mode' => $kind, 'city' => $locationName['cityNameUrl']])}}'
        },
        {
            name: '{{__('محبوب‌ترین اقامتگاه ها')}}',
            id: 'topHotelCityPage',
            url: '{{route('place.list', ['kindPlaceId' => 4, 'mode' => $kind, 'city' => $locationName['cityNameUrl']])}}'
        },
        {
            name: '{{__('محبوب‌ترین طبیعت گردی ها')}}',
            id: 'topMajaraCityPage',
            url: '{{route('place.list', ['kindPlaceId' => 6, 'mode' => $kind, 'city' => $locationName['cityNameUrl']])}}'
        },
        {
            name: '{{__('محبوب‌ترین صنابع دستی و سوغات')}}',
            id: 'topSogatCityPage',
            url: '{{route('place.list', ['kindPlaceId' => 10, 'mode' => $kind, 'city' => $locationName['cityNameUrl']])}}'
        },
        {
            name: '{{__('محبوب‌ترین غذاهای محلی')}}',
            id: 'topFoodCityPage',
            url: '{{route('place.list', ['kindPlaceId' => 11, 'mode' => $kind, 'city' => $locationName['cityNameUrl']])}}'
        },
    ];

    if(topPlacesSample == 0){
        topPlacesSample = $('#topPlacesSection').html();
        $('#topPlacesSection').html('');
        $('#topPlacesSection').show();
        createTopPlacesSection();
    }

    if(reveiewSample == 0){
        reveiewSample = $('#reviewSection').html();
        $('#reviewSection').html('');
    }

    function getReviews(){

        $.ajax({
            type: 'post',
            url : '{{route("getCityPageReview")}}',
            data: {
                _token: '{{csrf_token()}}',
                placeId: {{$place->id}},
                kind: '{{$kind}}'
            },
            success: function(response){
                reviews = JSON.parse(response);
                createReviewSections();
            }
        })
    }
    function createReviewSections(){
        reviews.forEach(item => {
            let text = reveiewSample;
            let fk = Object.keys(item);
            for (let x of fk) {
                let t = '##' + x + '##';
                let re = new RegExp(t, "g");
                text = text.replace(re, item[x]);
            }
            $('#reviewSection').append(text);
        });

        $('#reviewSection').css('display', 'block');
        $('#reviewPlaceHolderSection').remove();

        resizeFitImg('resizeImgClass');
    }
    getReviews();

    function getTopPlaces(){

        $.ajax({
            type: 'post',
            url : '{{route("getCityPageTopPlace")}}',
            data: {
                _token: '{{csrf_token()}}',
                id: {{$place->id}},
                kind: '{{$kind}}',
                city: '{{$locationName['cityNameUrl']}}'
            },
            success: function(response){
                response = JSON.parse(response);
                createTopPlacesDiv(response)
            }
        })
    }
    function createTopPlacesSection(){
        topPlacesSections.forEach(item => {
            let text = topPlacesSample;
            let fk = Object.keys(item);
            for (let x of fk) {
                let t = '##' + x + '##';
                let re = new RegExp(t, "g");
                text = text.replace(re, item[x]);
            }
            $('#topPlacesSection').append(text);
        });
    }
    function createTopPlacesDiv(_result){
        let fk = Object.keys(_result);
        for (let x of fk)
            createCityPageSuggestion(x, _result[x] , () => resizeFitImg('resizeImgClass'));

        runMainSwiper();
        var height = $('#cpBorderLeft').height();
        $('#commentSection').css('height', height);
    }
    getTopPlaces();

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

    function toggleIconInMap(_element, _id) {
        $(_element).toggleClass('offMapIcons');

        var src = document.getElementById(_id).src;
        var sec = src.split('.');
        var kind;

        if (src.includes('off')) {
            src = src.replace('off', '');
            src2 = src;
            kind = 1;
        } else {
            src2 = sec[0];
            for(i = 1; i < sec.length; i++){
                if(i == sec.length-1)
                    src2 +=  'off.' + sec[i];
                else
                    src2 += '.' + sec[i];
            }
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

</body>

</html>

