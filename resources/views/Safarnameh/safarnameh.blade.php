@extends('Safarnameh.safarnamehLayout')

@section('head')
    <title>صفحه سفرنامه</title>

    <style>
        .safarnamehMinRows{
            margin: 0px;
            min-height: 0px;
            height: 70px;
            display: flex;
            align-items: center;
        }
        .safarnamehMinRows .im-widget-thumb > a{
            height: 100%;
            display: flex !important;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 5px;
        }
        .im-widget-thumb{
            height: 100% !important;
        }
    </style>
@endsection

@section('beforeBody')
    <div class="gnTopPics hideOnPhone">
        <div class="container">
            <div class="im_post_grid_box clearfix">
                <div class="clearfix">
                    <?php $i = 0; ?>
                    @foreach($bannerPosts as $safarnameh)
                        @if(count($bannerPosts) == 1)
                            <div class="col-md-12">
                                @elseif($i < 2 || count($bannerPosts) != 5)
                                    <div class="col-md-6 col-sm-12">
                                        @elseif(count($bannerPosts) == 5)
                                            <div class="col-md-4 col-sm-12">
                                                @endif
                                                <article class="im-article grid-carousel grid-2 row post type-post status-publish format-standard has-post-thumbnail hentry">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title="{{$safarnameh->title}}">
                                                            <img src="{{$safarnameh->pic}}" alt="{{$safarnameh->keyword}}" style="height: {{(count($bannerPosts) != 5) || $i < 2 ? (count($bannerPosts) != 1 ? '310px' : '') : '250px'}}"/>
                                                        </a>
                                                        <div class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix">
                                                                    <div class="cat-links im-meta-item">
                                                                        <a style="background-color: #666; color: #fff !important;" href="{{url('/safarnameh/list/category/'.$safarnameh->category)}}" title="{{$safarnameh->category}}">{{$safarnameh->category}}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h2 class="im-entry-title">
                                                                <a style="color: #fff" href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" rel="bookmark">{{$safarnameh->title}}</a>
                                                            </h2>
                                                            <div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix">
                                                                    <div class="posted-on im-meta-item">
                                                                        <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                                                    </div>
                                                                    <div class="comments-link im-meta-item">
                                                                        <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                                                    </div>
                                                                    <div class="author vcard im-meta-item">
                                                                        <i class="fa fa-user"></i>{{$safarnameh->username}}
                                                                    </div>
                                                                    <div class="post-views im-meta-item">
                                                                        <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            @if($i == 1)
                                    </div>
                                    <div class="clearfix">
                                        @endif
                                        <?php $i++; ?>
                                        @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hideOnScreen">
        <div class="mainTopPicture">
            <img src="{{URL::asset('images/mainPics/safarname.webp')}}" alt="koochita" style="width: 100%">
            <div class="content">
                <div class="withBack">
                    <div class="text">
                        <div style="margin-bottom: 9px;">سفرنامه</div>
                        <div style="line-height: 38px; padding-bottom: 12px; padding-top: 19px;">کوچیتا</div>
                    </div>
                </div>
                <div class="trans"></div>
            </div>
        </div>

        <div class="safarnamehList">
            <div class="titleSec">
                <div class="title"> پیشنهاد کوچیتا </div>
            </div>
            <div class="list safarnamehHorizontalList swiper-container">
                <div id="mainSuggestionSafarnamehMobile" class="swiper-wrapper"></div>
            </div>
        </div>

        <div class="safarnamehList">
            <div class="titleSec">
                <div class="title">پرطرفدارها</div>
            </div>
            <div class="list safarnamehHorizontalList swiper-container">
                <div id="popularSafarnamehMobile" class="swiper-wrapper"></div>
            </div>
        </div>

        <div class="safarnamehList">
            <div class="titleSec">
                <div class="title">داغ ترین ها</div>
            </div>
            <div class="list safarnamehHorizontalList swiper-container">
                <div id="hotSafarnamehMobile" class="swiper-wrapper"></div>
            </div>
        </div>

        <div class="safarnamehList">
            <div class="titleSec">
                <div class="title">تازه ها</div>
            </div>
            <div id="allSafarnamehListMobile" class="colList"></div>
        </div>

        <div id="safarnamehRowCardPlaceHolderMobile" class="hidden">
            <div class="rowSafarnamehCard placeHolderCard">
                <div class="imgSec">
                    <div class="safarPic placeHolderAnime"></div>
                </div>
                <div class="content">
                    <div class="title placeHolderAnime resultLineAnim" style="width: 50%; height: 10px; margin-bottom: 15px;"></div>
                    <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                    <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                    <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                    <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                </div>
            </div>
        </div>
        <div id="safarnamehMainCardPlaceHolderMobile" class="hidden">
            <div class="swiper-slide safarnCardMobile">
                <div class="contents placeHolderAnime">
                    <div class="userPic" style="background: white"></div>
                </div>
            </div>
        </div>
        <div id="safarnamehMainCardMobile" class="hidden">
            <a href="#" class="swiper-slide safarnCardMobile">
                <img src="##pic##" alt="##title##" class="resizeImgClass" onload="fitThisImg(this)">
                <div class="contents">
                    <div class="icon BookMarkIconEmpty"></div>
                    <div class="userPic">
                        <img src="##writerPic##" alt="userPic" style="width: 100%">
                    </div>
                    <div class="name">##title##</div>
                </div>
            </a>
        </div>
        <div id="safarnamehRowCardMobile" class="hidden">
            <a href="##url##" class="rowSafarnamehCard">
                <div class="imgSec">
                    <div class="safarPic">
                        <img src="##pic##" alt="##title##" class="resizeImgClass" onload="fitThisImg(this)">
                    </div>
                    <div class="userInfos">
                        <img src="##writerPic##" alt="userPicture" style="height: 100%;">
                    </div>
                    <div class="icon BookMarkIconEmpty"></div>
                </div>
                <div class="content">
                    <div class="title">##title##</div>
                    <div class="summery">##summery##</div>
                </div>
            </a>
        </div>


        <div id="loaderFloorMobile" style="height: 1px; width: 100%;"></div>
    </div>

    <script>
        var mobileMainListPlaceHolderSample = $('#safarnamehMainCardPlaceHolderMobile').html();
        var mobileMainListSample = $('#safarnamehMainCardMobile').html();
        var mobileListSample = $('#safarnamehRowCardMobile').html();
        var mobileRowListPlaceHolderSample = $('#safarnamehRowCardPlaceHolderMobile').html();

        $('#safarnamehRowCardPlaceHolderMobile').remove();
        $('#safarnamehRowCardMobile').empty();
        $('#safarnamehMainCardPlaceHolderMobile').remove();
        $('#safarnamehMainCardMobile').remove();

        var fiveMobilePlaceHolder = '';
        for(var i = 0; i < 5; i++)
            fiveMobilePlaceHolder += mobileMainListPlaceHolderSample;

        $('#mainSuggestionSafarnamehMobile').html(fiveMobilePlaceHolder);
        $('#hotSafarnamehMobile').html(fiveMobilePlaceHolder);
        $('#popularSafarnamehMobile').html(fiveMobilePlaceHolder);

        new Swiper('.safarnamehHorizontalList', {
            loop: true,
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 10,
        });
    </script>
@endsection

@section('body')
    <div class="hideOnPhone">
        @if(isset($relatedSafarnameh))
            <div class="category-element-holder style1 col-md-12 col-sm-12 gnWhiteBox">
                <div class="widget-head widget-head-45">
                    <strong class="widget-title">مطالب مرتبط با ...</strong>
                    <div class="widget-head-bar"></div>
                    <div class="widget-head-line"></div>
                </div>
                <div class="row">
                    <?php $i = 0; ?>
                    @foreach($relatedSafarnameh as $safarnameh)
                        @if($i == 0)
                            <article class="im-article content-2col col-md-6 col-sm-12 post type-post status-publish format-standard has-post-thumbnail hentry category-2068">
                                <div class="im-entry-thumb">
                                    <a class="im-entry-thumb-link" href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title="{{$safarnameh->title}}">
                                        <img src="{{$safarnameh->pic}}" alt="{{$safarnameh->keyword}}"/>
                                    </a>
                                    <header class="im-entry-header">
                                        <div class="im-entry-category">
                                            <div class="iranomag-meta clearfix">
                                                <div class="cat-links im-meta-item">
                                                    {{--                                                    <a style="background-color: #666; color: #fff !important;" href="" title="{{$safarnameh->category}}">{{$safarnameh->category}}</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="im-entry-title">
                                            <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" rel="bookmark">{{$safarnameh->title}}</a>
                                        </h3>
                                    </header>
                                </div>
                                <div class="im-entry">
                                    <div class="iranomag-meta clearfix">
                                        <div class="posted-on im-meta-item">
                                            <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                        </div>

                                        <div class="comments-link im-meta-item">
                                            <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                        </div>

                                        <div class="author vcard im-meta-item">
                                            <i class="fa fa-user"></i>{{$safarnameh->username}}
                                        </div>

                                        <div class="post-views im-meta-item">
                                            <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @else
                            @if($i == 1)
                                <div class="col-md-6 col-sm-12">
                                    <div class="widget">
                                        <ul>
                                            @endif
                                            <li class="widget-10104im-widget clearfix">
                                                <figure class="im-widget-thumb">
                                                    <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title="{{$safarnameh->title}}">
                                                        <img src="{{$safarnameh->pic}}" alt="{{$safarnameh->keyword}}" class="resizeImgClass" onload="fitThisImg(this)"/>
                                                    </a>
                                                </figure>
                                                <div class="im-widget-entry">
                                                    <header class="im-widget-entry-header">
                                                        <h6 class='im-widget-entry-title'>
                                                            <a style="color: #fff !important;" href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title='{{$safarnameh->title}}'>{{$safarnameh->title}}</a>
                                                        </h6>
                                                    </header>
                                                    <div class="iranomag-meta clearfix">
                                                        <div class="posted-on im-meta-item">
                                                            <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                                        </div>
                                                        <div class="comments-link im-meta-item">
                                                            <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                                        </div>
                                                        <div class="author vcard im-meta-item">
                                                            <i class="fa fa-user"></i>{{$safarnameh->username}}
                                                        </div>
                                                        <div class="post-views im-meta-item">
                                                            <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($i == count($mostSeenSafarnameh) - 1)
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <?php $i++; ?>

                    @endforeach
                </div>
            </div>
        @endif

        <div id="safarnamehRowCardPlaceHolderPC" class="hidden">
            <div class="small-12 columns placeHolderCard">
                <article class="im-article content-column clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                    <div class="im-entry-thumb col-md-5 col-sm-12">
                        <div class="im-entry-thumb-link placeHolderAnime" style="height: 200px;"></div>
                    </div>
                    <div class="im-entry col-md-7 col-sm-12">
                        <header class="im-entry-header">
                            <div class="placeHolderAnime resultLineAnim" style="width: 50%; height: 10px; margin-bottom: 15px;"></div>
                        </header>
                        <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                        <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                        <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                        <div class="summery placeHolderAnime resultLineAnim" style="width: 90%; height: 6px; margin-bottom: 5px;"></div>
                    </div>
                </article>
            </div>
        </div>

        <div class="category-element-holder style1 col-md-12 col-sm-12 gnWhiteBox">
            <div class="widget-head widget-head-45">
                <strong class="widget-title">پرطرفدار ها</strong>
                <div class="widget-head-bar"></div>
                <div class="widget-head-line"></div>
            </div>
            <div class="row">
                <?php $i = 0; ?>
                @foreach($mostLike as $safarnameh)
                    @if($i == 0)
                        <article class="im-article content-2col col-md-6 col-sm-12 post type-post status-publish format-standard has-post-thumbnail hentry category-2068">
                            <div class="im-entry-thumb">
                                <a class="im-entry-thumb-link" href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title="{{$safarnameh->title}}" style="max-height: 300px">
                                    <img src="{{$safarnameh->pic}}" alt="{{$safarnameh->keyword}}"/>
                                </a>
                                <header class="im-entry-header">
                                    <div class="im-entry-category">
                                        <div class="iranomag-meta clearfix">
                                            <div class="cat-links im-meta-item">
                                                {{--                                                    <a style="background-color: #666; color: #fff !important;" href="" title="{{$safarnameh->category}}">{{$safarnameh->category}}</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="im-entry-title">
                                        <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" rel="bookmark">{{$safarnameh->title}}</a>
                                    </h3>
                                </header>
                            </div>
                            <div class="im-entry">
                                <div class="iranomag-meta clearfix">
                                    <div class="posted-on im-meta-item">
                                        <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                    </div>

                                    <div class="comments-link im-meta-item">
                                        <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                    </div>

                                    <div class="author vcard im-meta-item">
                                        <i class="fa fa-user"></i>{{$safarnameh->username}}
                                    </div>

                                    <div class="post-views im-meta-item">
                                        <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                    </div>
                                </div>
                            </div>
                        </article>
                    @else
                        @if($i == 1)
                            <div class="col-md-6 col-sm-12">
                                <div class="widget">
                                    <ul>
                                        @endif
                                        <li class="widget-10104 im-widget clearfix safarnamehMinRows">
                                            <figure class="im-widget-thumb">
                                                <a href="{{route('safarnameh.show', ['id' => $safarnameh->id] )}}" title="{{$safarnameh->title}}">
                                                    <img src="{{$safarnameh->pic}}" alt="{{$safarnameh->keyword}}" class="resizeImgClass" onload="fitThisImg(this)"/>
                                                </a>
                                            </figure>
                                            <div class="im-widget-entry">
                                                <header class="im-widget-entry-header">
                                                    <h6 class='im-widget-entry-title'>
                                                        <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" rel="bookmark">{{$safarnameh->title}}</a>
                                                    </h6>
                                                </header>
                                                <div class="iranomag-meta clearfix">
                                                    <div class="posted-on im-meta-item">
                                                        <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                                    </div>
                                                    <div class="comments-link im-meta-item">
                                                        <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                                    </div>
                                                    <div class="author vcard im-meta-item">
                                                        <i class="fa fa-user"></i>{{$safarnameh->username}}
                                                    </div>
                                                    <div class="post-views im-meta-item">
                                                        <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @if($i == count($mostLike) - 1)
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>

        <div class="col-md-12 col-sm-12 gnWhiteBox" style="padding: 0;">
            <div class="col-md-6 col-sm-12">
                <div class="category-element-holder style2">
                    <div class="widget-head widget-head-46">
                        <strong class="widget-title">تازه ها</strong>
                        <div class="widget-head-bar"></div>
                        <div class="widget-head-line"></div>
                    </div>
                    <div class="row">

                        <?php $i = 0; ?>
                        @foreach($recentlySafarnameh as $safarnameh)
                            @if($i == 0)
                                <article class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                    <div class="im-entry-thumb">
                                        <a class="im-entry-thumb-link"
                                           href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}"
                                           title="{{$safarnameh->title}}"
                                           style="height: 300px;">

                                            <img src="{{$safarnameh->pic}}"
                                                 class="resizeImgClass"
                                                 onload="fitThisImg(this)"
                                                 alt="{{$safarnameh->keyword}}"/>
                                        </a>
                                        <header class="im-entry-header">
                                            <div class="im-entry-category">
                                                <div class="iranomag-meta clearfix">
                                                    <div class="cat-links im-meta-item">
                                                        {{--<a style="background-color: #666; color: #fff !important;" href="" title="{{$safarnameh->category}}">{{$safarnameh->category}}</a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="im-entry-title">
                                                <a style="color: #fff !important"
                                                   href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}"
                                                   rel="bookmark">{{$safarnameh->title}}</a>
                                            </h3>
                                        </header>
                                    </div>

                                    <div class="im-entry">
                                        <div class="iranomag-meta clearfix">
                                            <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                            </div>

                                            <div class="comments-link im-meta-item">
                                                <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                            </div>

                                            <div class="author vcard im-meta-item">
                                                <i class="fa fa-user"></i>{{$safarnameh->username}}
                                            </div>

                                            <div class="post-views im-meta-item">
                                                <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @else

                                @if($i == 1)
                                    <div class="col-md-12">
                                        <div class="widget">
                                            <ul>
                                                @endif
                                                <li class="widget-10104 im-widget clearfix safarnamehMinRows">
                                                    <figure class="im-widget-thumb">
                                                        <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title="{{$safarnameh->title}}">
                                                            <img src="{{$safarnameh->pic}}" alt="{{$safarnameh->keyword}}" class="resizeImgClass" onload="fitThisImg(this)"/>
                                                        </a>
                                                    </figure>
                                                    <div class="im-widget-entry">
                                                        <header class="im-widget-entry-header">
                                                            <h6 class='im-widget-entry-title'>
                                                                <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}"
                                                                   title='{{$safarnameh->title}}'>{{$safarnameh->title}}</a>
                                                            </h6>
                                                        </header>
                                                        <div class="im-widget-entry-footer">
                                                            <div class="iranomag-meta clearfix">
                                                                <div class="posted-on im-meta-item">
                                                                    <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                                                </div>

                                                                <div class="comments-link im-meta-item">
                                                                    <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                                                </div>

                                                                <div class="author vcard im-meta-item">
                                                                    <i class="fa fa-user"></i>{{$safarnameh->username}}
                                                                </div>

                                                                <div class="post-views im-meta-item">
                                                                    <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                                                </div>
                                                            </div>
                                                            </p>
                                                        </div>
                                                </li>
                                                @if($i == count($recentlySafarnameh) - 1)
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endif


                            <?php $i++; ?>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="category-element-holder style2">
                    <div class="widget-head widget-head-46">
                        <strong class="widget-title">داغ ترین ها</strong>
                        <div class="widget-head-bar"></div>
                        <div class="widget-head-line"></div>
                    </div>
                    <div class="row">

                        <?php $i = 0; ?>
                        @foreach($mostCommentSafarnameh as $safarnameh)
                            @if($i == 0)
                                <article class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                    <div class="im-entry-thumb">

                                        <a class="im-entry-thumb-link"
                                           href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}"
                                           title="{{$safarnameh->title}}"
                                           style="height: 300px;">

                                            <img src="{{$safarnameh->pic}}"
                                                 class="resizeImgClass"
                                                 onload="fitThisImg(this)"
                                                 alt="{{$safarnameh->keyword}}"/>
                                        </a>
                                        <header class="im-entry-header">
                                            <div class="im-entry-category">
                                                <div class="iranomag-meta clearfix">
                                                    <div class="cat-links im-meta-item">
                                                        {{--<a style="background-color: #666; color: #fff !important;" href="" title="{{$safarnameh->category}}">{{$safarnameh->category}}</a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="im-entry-title">
                                                <a style="color: #fff !important;"
                                                   href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}"
                                                   rel="bookmark">{{$safarnameh->title}}</a>
                                            </h3>
                                        </header>
                                    </div>

                                    <div class="im-entry">
                                        <div class="iranomag-meta clearfix">
                                            <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                            </div>

                                            <div class="comments-link im-meta-item">
                                                <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                            </div>

                                            <div class="author vcard im-meta-item">
                                                <i class="fa fa-user"></i>{{$safarnameh->username}}
                                            </div>

                                            <div class="post-views im-meta-item">
                                                <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @else
                                @if($i == 1)
                                    <div class="col-md-12">
                                        <div class="widget">
                                            <ul>
                                                @endif
                                                <li class="widget-10104 im-widget clearfix safarnamehMinRows">
                                                    <figure class="im-widget-thumb">
                                                        <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title="{{$safarnameh->title}}">
                                                            <img src="{{$safarnameh->pic}}" alt="{{$safarnameh->keyword}}" class="resizeImgClass" onload="fitThisImg(this)"/>
                                                        </a>
                                                    </figure>
                                                    <div class="im-widget-entry">
                                                        <header class="im-widget-entry-header">
                                                            <h6 class='im-widget-entry-title'>
                                                                <a href="{{route('safarnameh.show', ['id' => $safarnameh->id])}}" title='{{$safarnameh->title}}'>{{$safarnameh->title}}</a>
                                                            </h6>
                                                        </header>
                                                        <div class="im-widget-entry-footer">
                                                            <div class="iranomag-meta clearfix">
                                                                <div class="posted-on im-meta-item">
                                                                    <span class="entry-date published updated">{{$safarnameh->date}}</span>
                                                                </div>
                                                                <div class="comments-link im-meta-item">
                                                                    <i class="fa fa-comment-o"></i>{{$safarnameh->msgs}}
                                                                </div>

                                                                <div class="author vcard im-meta-item">
                                                                    <i class="fa fa-user"></i>{{$safarnameh->username}}
                                                                </div>

                                                                <div class="post-views im-meta-item">
                                                                    <i class="fa fa-eye"></i>{{$safarnameh->seen}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @if($i == count($mostCommentSafarnameh) - 1)
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 gnWhiteBox">
            <div class="widget-head light">
                <strong class="widget-title">همه مطالب</strong>
                <div class="widget-head-bar"></div>
                <div class="widget-head-line"></div>
            </div>
            <div class="row im-blog">

                <div id="pcRowListSafarnameh" class="clearfix" style="display: none">
                    <div class="small-12 columns">
                        <article class="im-article content-column clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                            <div class="im-entry-thumb col-md-5 col-sm-12">
                                <a class="im-entry-thumb-link" href="##url##" title="##title##" style="max-height: 200px;">
                                    <img data-src="##pic##" src="##pic##" alt="##keyword##"/>
                                </a>
                            </div>
                            <div class="im-entry col-md-7 col-sm-12">
                                <header class="im-entry-header">
                                    <div class="im-entry-category">
                                        <div class="iranomag-meta clearfix">
                                            <div class="cat-links im-meta-item">
                                                <a style="background-color: #666; color: #fff !important;" href="{{url('/safarnameh/list/category/')}}/##category##" title="##category##">##category##</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="im-entry-title">
                                        <a href="##url##" rel="bookmark">##title##</a>
                                    </h3>
                                </header>

                                <div style="max-height: 100px !important; overflow: hidden" class="im-entry-content">
                                    <p>##meta##</p>
                                </div>

                                <div style="margin-top: 7px"
                                     class="iranomag-meta clearfix">
                                    <div class="posted-on im-meta-item">
                                        <span class="entry-date published updated">##date##</span>
                                    </div>
                                    <div class="comments-link im-meta-item">
                                        <i class="fa fa-comment-o"></i>##msgs##
                                    </div>
                                    <div class="author vcard im-meta-item">
                                        <i class="fa fa-user"></i>##username##
                                    </div>
                                    <div class="post-views im-meta-item">
                                        <i class="fa fa-eye"></i>##seen##
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div id="loaderFloorPc" style="height: 1px; width: 100%;"></div>

            </div>
            <div class="gap cf" style="height:30px;"></div>
        </div>

    </div>
@endsection

@section('script')
    <script type='text/javascript' src='{{URL::asset('js/article/mainArticle.js')}}'></script>

    <script>
        var inAjaxSafarnameh = false;
        var takeSafarnameh = 5;
        var nowPageTaken = 1;

        var pcRowListSample = $('#pcRowListSafarnameh').html();
        var pcRowListPlaceHolderSample = $('#safarnamehRowCardPlaceHolderPC').html();

        $('#safarnamehRowCardPlaceHolderPC').remove();
        $('#pcRowListSafarnameh').empty().show();


        function getMainDataSafarnameh(){
            getBanners();
            getOther();
        }

        function getBanners(){
            $.ajax({
                type: 'GET',
                url: '{{route("safarnameh.getMainPageData")}}?banner=1',
                success: response => {
                    if(response.status == 'ok')
                        createMobileSections('mainSuggestionSafarnamehMobile', response.bannerPosts);
                },
                error: err => {

                }
            });
        }

        function getOther(){
            $.ajax({
                type: 'GET',
                url: '{{route("safarnameh.getMainPageData")}}?other=1',
                success: response => {
                    if(response.status == 'ok'){
                        createMobileSections('hotSafarnamehMobile', response.mostCommentSafarnameh);
                        createMobileSections('popularSafarnamehMobile', response.mostSeenSafarnameh);
                    }
                },
                error: err => {

                }
            });
        }

        function getAllPost(page){
            if(!inAjaxSafarnameh) {
                inAjaxSafarnameh = true;
                createPlaceHolderSafarnameh(5);
                $.ajax({
                    type: 'GET',
                    url: `{{route("safarnameh.getListElement")}}?page=${page}&take=${takeSafarnameh}`,
                    success: function (response) {
                        if (response.status == 'ok')
                            createPostRow(response.result);
                    }
                });
            }
        }

        function createPostRow(_safarnameh){
            $('#pcRowListSafarnameh').find('.placeHolderCard').remove();
            $('#allSafarnamehListMobile').find('.placeHolderCard').remove();

            _safarnameh.map(item => {
                var text = pcRowListSample;
                var mobile = mobileListSample;

                for (var x of Object.keys(item)) {
                    text = text.replace(new RegExp(`##${x}##`, "g"), item[x]);
                    mobile = mobile.replace(new RegExp(`##${x}##`, "g"), item[x]);
                }

                $('#pcRowListSafarnameh').append(text);
                $('#allSafarnamehListMobile').append(mobile);
            });

            if(_safarnameh.length == takeSafarnameh) {
                inAjaxSafarnameh = false;
                nowPageTaken++;
            }
        }

        function createPlaceHolderSafarnameh(_number){
            var pc = '';
            var mobile = '';

            for(var i = 0; i < _number; i++){
                mobile += mobileRowListPlaceHolderSample;
                pc += pcRowListPlaceHolderSample;
            }

            $('#pcRowListSafarnameh').append(pc);
            $('#allSafarnamehListMobile').append(mobile);
        }

        function createMobileSections(_id, _result){
            var text = '';
            _result.map(item => {
                var nText = mobileMainListSample;
                for (var x of Object.keys(item))
                    nText = nText.replace(new RegExp(`##${x}##`, "g"), item[x]);

                text += nText;
            });

            $(`#${_id}`).html(text);

            new Swiper($(`#${_id}`).parents(), {
                loop: true,
                slidesPerView: 'auto',
                centeredSlides: true,
                spaceBetween: 10,
            });
        }

        $(window).on('scroll', e => {
            var stayToLoad;
            if($(window).width() <= 767)
                stayToLoad = document.getElementById('loaderFloorMobile').getBoundingClientRect().top - 150;
            else
                stayToLoad = document.getElementById('loaderFloorPc').getBoundingClientRect().top - 400;

            stayToLoad -= $(window).height();
            if(stayToLoad <= 0 && !inAjaxSafarnameh){
                getAllPost(nowPageTaken);
            }
        });

        $(window).ready(() => {
            getMainDataSafarnameh();
        })
    </script>
@endSection


