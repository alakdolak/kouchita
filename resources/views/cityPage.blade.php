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
        <div id="commentSection" class="col-lg-3 col-sm-3 text-align-right mainReviewSection hideOnTablet">
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
                                <img src="##firstPic##" class="resizeImgClass" style="position: absolute; width: 100%;" onload="fitThisImg(this)">
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

        <div id="cpBorderLeft" class="col-lg-9 col-md-12">
            <div class="row cpMainBox">
                <div class="col-md-8 col-xs-12 pd-0Imp">
                    @if(isset($place->pic))
                        <div class="cityPagePics swiper-container">
                            <div class="swiper-wrapper position-relative"  style="height: 100%">
                                @for($i = 0; $i < count($place->pic) && $i < 5; $i++)
                                    <div class="swiper-slide position-relative cityImgSlider" onclick="showSliderPic()">
                                        <img src="{{$place->pic[$i]->pic}}" class="resizeImgClass" style="width: 100%;" alt="{{$place->name}}" onload="resizeFitImg(this)">
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    @else
                        <img class="cityPagePics cpPic" src="{{$place->image}}">
                    @endif
                    <div class="col-xs-12 underSlider hideOnTablet">
                            <div class="cpLittleMenu infoLittleMenu">
                                <img src="{{URL::asset('images/icons/info.png')}}" style="">
                            </div>
                            <a class="col-xs-2 cpLittleMenu" href="#">
                                <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/cinema.png')}}" alt="{{__('سینما')}}">
                                <div class="textCityPageIcon">{{__('سینما')}}</div>
                                {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                            </a>
                            <a class="col-xs-2 cpLittleMenu" href="#">
                                <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/bakery.png')}}" alt="{{__('قتادی')}}">
                                <div class="textCityPageIcon">{{__('قتادی')}}</div>
                                {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                            </a>
                            <a class="col-xs-2 cpLittleMenu" href="#">
                                <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/mortarboard(1).png')}}" alt="{{__('آموزش')}}">
                                <div class="textCityPageIcon">{{__('آموزش')}}</div>
                                {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                            </a>
                            <a class="col-xs-2 cpLittleMenu" href="#">
                                <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/culture.png')}}" alt="{{__('فرهنگ')}}">
                                <div class="textCityPageIcon">{{__('فرهنگ')}}</div>
                                {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                            </a>
                            <a class="col-xs-2 cpLittleMenu" href="#">
                                <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/barbershop.png')}}" alt="{{__('آرایشگاه')}}">
                                <div class="textCityPageIcon">{{__('آرایشگاه')}}</div>
                                {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                            </a>
                            <a class="col-xs-2 cpLittleMenu" href="#">
                                <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/fuel.png')}}" alt="{{__('سوخت')}}">
                                <div class="textCityPageIcon">{{__('سوخت')}}</div>
                                {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                            </a>
                        </div>
                </div>
                <div class="col-md-4 col-xs-12 pd-0Imp">
                    <div class="col-xs-12 zpr">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/4/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon hotel"></div>
                            <div class="textCityPageIcon">{{__('هتل')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['hotel']}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <div class="cityPageIcon ticket"></div>
                            <div class="textCityPageIcon">{{__('بلیط')}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/1/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon atraction"></div>
                            <div class="textCityPageIcon">{{__('جاذبه ها')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['amaken']}}</div>
                        </a>
                    </div>
                    <div class="col-xs-12 zpr">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/3/' . $kind. '/' . $place->listName )}}">
                            <div class="cityPageIcon restaurant"></div>
                            <div class="textCityPageIcon">{{__('رستوران')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['restaurant']}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/10/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon soghat"></div>
                            <div class="textCityPageIcon">{{__('سوغات')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['sogatSanaie']}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/11/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon ghazamahali"></div>
                            <div class="textCityPageIcon">{{__('غذای محلی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['mahaliFood']}}</div>
                        </a>
                    </div>
                    <div class="col-xs-12 zpr">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/6/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon majara"></div>
                            <div class="textCityPageIcon">{{__('طبیعت گردی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['majara']}}</div>
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/10/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon sanaye"></div>
                            <div class="textCityPageIcon">{{__('صنایع‌دستی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['sogatSanaie']}}</div>
                        </a>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon lebas"></div>
                            <div class="textCityPageIcon">{{__('لباس محلی')}}</div>
                        </div>
                    </div>
                    <div class="col-xs-12 zpr">
                        <a class="col-xs-4 cpLittleMenu" href="{{url('placeList/12/' . $kind . '/' . $place->listName)}}">
                            <div class="cityPageIcon boom"></div>
                            <div class="textCityPageIcon">{{__('بوم گردی')}}</div>
                            <div class="textCityPageIcon" style="color: #0076a3">{{$placeCounts['boomgardy']}}</div>
                        </a>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon estelah"></div>
                            <div class="textCityPageIcon">{{__('اصطلاحات محلی')}}</div>
                        </div>
                        <div class="col-xs-4 cpLittleMenu">
                            <div class="cityPageIcon safarnameIcon"></div>
                            <div class="textCityPageIcon">{{__('سفر نامه')}}</div>
                        </div>
                    </div>
                    <div class="col-xs-12 zpr">
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/gym.png')}}" alt="{{__('ورزشی')}}">
                            <div class="textCityPageIcon">{{__('ورزشی')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/tag.png')}}" alt="{{__('فروشگاه')}}">
                            <div class="textCityPageIcon">{{__('فروشگاه')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/hospital(1).png')}}" alt="{{__('پزشکی')}}">
                            <div class="textCityPageIcon">{{__('پزشکی')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                    </div>
                    <div class="col-xs-12 zpr showOnTablet">
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/cinema.png')}}" alt="{{__('سینما')}}">
                            <div class="textCityPageIcon">{{__('سینما')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/bakery.png')}}" alt="{{__('قتادی')}}">
                            <div class="textCityPageIcon">{{__('قتادی')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/mortarboard(1).png')}}" alt="{{__('آموزش')}}">
                            <div class="textCityPageIcon">{{__('آموزش')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                    </div>
                    <div class="col-xs-12 zpr showOnTablet">
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/culture.png')}}" alt="{{__('فرهنگ')}}">
                            <div class="textCityPageIcon">{{__('فرهنگ')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/barbershop.png')}}" alt="{{__('آرایشگاه')}}">
                            <div class="textCityPageIcon">{{__('آرایشگاه')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                        <a class="col-xs-4 cpLittleMenu" href="#">
                            <img class="cpLittleMenuImg" src="{{URL::asset('images/icons/fuel.png')}}" alt="{{__('سوخت')}}">
                            <div class="textCityPageIcon">{{__('سوخت')}}</div>
                            {{--<div class="textCityPageIcon" style="color: #0076a3">1000</div>--}}
                        </a>
                    </div>
                </div>

            </div>

            <div class="row">
                @if(strlen($place->description) > 10)
                    <div class="cpDescription cpBorderBottom" style="white-space: pre-line;">
                        {{$place->description}}
                    </div>
                @endif
                @include('component.rowSuggestion')

            </div>

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
                                    <a href="{{$post[0]->url}}" style="font-size: 20px">{{$post[0]->title}}</a>
                                </h3>
                            </header>
                        </div>
                        <div class="im-entry mainArticleDiv">
                            <div class="iranomag-meta clearfix">
                                <div class="posted-on im-meta-item">
                                    <span class="entry-date published updated withColor">{{$post[0]->date}}</span>
                                </div>

                                <div class="comments-link im-meta-item withColor">
                                    <i class="fa fa-comment-o"></i>{{$post[0]->msgs}}
                                </div>

                                <div class="author vcard im-meta-item withColor">
                                    <i class="fa fa-user"></i>{{$post[0]->username}}
                                </div>

                                <div class="post-views im-meta-item withColor">
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
                                            <img src="{{$post[$i]->pic}}" alt="{{$post[$i]->keyword}}" class="resizeImgClass" style="width: 100%" onload="resizeFitImg(this)">
                                        </a>
                                    </figure>
                                    <div class="im-widget-entry">
                                        <header class="im-widget-entry-header">
                                            <a class="im-widget-entry-title lessShowText" href="{{$post[$i]->url}}" title="{{$post[$i]->title}}">
                                                {{$post[$i]->title}}
                                            </a>
                                        </header>
                                        <div class="iranomag-meta clearfix marg5">
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
                <div id="cpMap" class="cpMap placeHolderAnime" style="height: 500px"></div>
            </div>

        </div>
    </div>
</div>

@include('layouts.placeFooter')

@include('component.mapMenu')

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
                            '                                        <img src="' + cityPic[showCityPicNumber]['pic'] + '" class="resizeImgClass" style="width: 100%;" alt="' + cityName1 + '" onload="resizeFitImg(this)">\n' +
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

    initPlaceRowSection(topPlacesSections);

    if(reveiewSample == 0){
        reveiewSample = $('#reviewSection').html();
        $('#reviewSection').html('');
    }

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
                550: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                10000: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }
        });
    }

    function getReviews(){

        $.ajax({
            type: 'post',
            url : '{{route("getCityPageReview")}}',
            data: {
                _token: '{{csrf_token()}}',
                placeId: '{{$place->id}}',
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

    function getTopPlaces(){

        $.ajax({
            type: 'post',
            url : '{{route("getCityPageTopPlace")}}',
            data: {
                _token: '{{csrf_token()}}',
                id: '{{$place->id}}',
                kind: '{{$kind}}',
                city: '{{$locationName['cityNameUrl']}}'
            },
            success: function(response){
                response = JSON.parse(response);
                createTopPlacesDiv(response)
            }
        })
    }
    function createTopPlacesDiv(_result){
        let fk = Object.keys(_result);
        for (let x of fk) {
            if(_result[x].length > 4){
                createSuggestionPack(x + 'Content', _result[x], function() { // in suggestionPack.blade.php
                    $('#' + x + 'Content').find('.suggestionPackDiv').addClass('swiper-slide');
                    resizeFitImg('resizeImgClass')
                });
            }
            else
                $('#' + x).hide();
        }

        runMainSwiper();
        var height = $('#cpBorderLeft').height();
        $('#commentSection').css('height', height);
    }

    function getAllPlacesForMap(){
        $.ajax({
            type: 'post',
            url: '{{route("getCityAllPlaces")}}',
            data: {
                _token: '{{csrf_token()}}',
                kind : '{{$kind}}',
                id: '{{$place->id}}'
            },
            success: function(response){
                response = JSON.parse(response);
                let map = response.map;
                let allPlaces = response.allPlaces;

                let center = {
                    x: map.C,
                    y: map.D
                };

                createMap('cpMap', center, allPlaces);
            }
        })
    }

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
        getReviews();
        getTopPlaces();
        getAllPlacesForMap();
    })

</script>


</body>

</html>

