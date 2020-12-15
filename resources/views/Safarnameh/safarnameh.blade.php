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


    <style>
        @media (max-width: 767px) {
            .mainTopPicture{
                position: relative;
            }
            .mainTopPicture .content{
                position: absolute;
                top: 0px;
                right: 0px;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                font-size: 28px;
                text-align: center;
            }
            .mainTopPicture .content .text{
                /*font-size: 40vw;*/
                font-size: 140px;
                padding: 0px 5px;
                padding-bottom: 10px;
                color: white;
                margin-bottom: 57px;
            }
            .mainTopPicture .content .withBack{
                background: #00000040;
                height: 80%;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .mainTopPicture .content .trans{
                background: linear-gradient(180deg, #00000040, transparent);
                width: 100%;
                height: 20%;
            }
            .mainTopPicture .content .text > div{
                font-family: Shin !important;
                line-height: 25px;
                padding: 0px 17px;
            }
            .safarnamehList{
                margin-bottom: 40px;
            }
            .safarnamehList .title{
                color: #333;
                font-size: 20px;
                margin-right: 10px;
                margin-bottom: 10px;
            }
            .safarnamehList .list{
                display: flex;
                flex-wrap: wrap;
            }

            .safarnCardMobile{
                position: relative;
                width: 200px;
                height: 250px;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                border-radius: 23px;
                margin-bottom: 10px;
            }
            .safarnCardMobile .contents{
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .safarnCardMobile .contents .icon{
                position: absolute;
                right: 10px;
                top: 5px;
                font-size: 30px;
                color: black;
            }
            .safarnCardMobile .contents .userPic{
                position: absolute;
                width: 50px;
                border-radius: 50%;
                overflow: hidden;
                left: -3px;
                top: -3px;
                border: solid 3px white;
            }
            .safarnCardMobile .contents .name{
                position: absolute;
                bottom: 0px;
                color: white;
                width: 100%;
                font-weight: normal;
                text-align: center;
                padding: 0px 10px;
                padding-bottom: 30px;
                font-size: 18px;
                height: 50%;
                display: flex;
                justify-content: center;
                align-items: flex-end;
                background: linear-gradient(0deg, black, transparent);
            }
        }
    </style>

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
            <div class="title">پیشنهاد کوچیتا</div>
            <div class="list safarnamehHorizontalList swiper-container">
                <div class="swiper-wrapper">
                    @foreach($mostLike as $item)
                        <a href="#" class="swiper-slide safarnCardMobile">
                            <img src="{{$item->pic}}" alt="{{$item->title}}" class="resizeImgClass" onload="fitThisImg(this)">
                            <div class="contents">
                                <div class="icon BookMarkIconEmpty"></div>
                                <div class="userPic">
                                    <img src="{{$item->writerPic}}" alt="" style="width: 100%">
                                </div>
                                <div class="name">{{$item->title}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="safarnamehList">
            <div class="title">پرطرفدارها</div>
            <div class="list safarnamehHorizontalList swiper-container">
                <div class="swiper-wrapper">
                    @foreach($mostLike as $item)
                        <a href="#" class="swiper-slide safarnCardMobile">
                            <img src="{{$item->pic}}" alt="{{$item->title}}" class="resizeImgClass" onload="fitThisImg(this)">
                            <div class="contents">
                                <div class="icon BookMarkIconEmpty"></div>
                                <div class="userPic">
                                    <img src="{{$item->writerPic}}" alt="" style="width: 100%">
                                </div>
                                <div class="name">{{$item->title}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="safarnamehList">
            <div class="title">داغترین ها</div>
            <div class="list safarnamehHorizontalList swiper-container">
                <div class="swiper-wrapper">
                    @foreach($mostLike as $item)
                        <a href="#" class="swiper-slide safarnCardMobile">
                            <img src="{{$item->pic}}" alt="{{$item->title}}" class="resizeImgClass" onload="fitThisImg(this)">
                            <div class="contents">
                                <div class="icon BookMarkIconEmpty"></div>
                                <div class="userPic">
                                    <img src="{{$item->writerPic}}" alt="" style="width: 100%">
                                </div>
                                <div class="name">{{$item->title}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <style>
            body{
                background: white;
            }
            .safarnamehList .colList{

            }
            .rowSafarnamehCard{
                display: flex;
                width: 98%;
                margin: 20px auto;
            }
            .rowSafarnamehCard .imgSec{
                position: relative;
                width: 150px;
                height: 100px;
            }
            .rowSafarnamehCard .imgSec .safarPic{
                width: 100%;
                height: 100%;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 25px;
                z-index: 1;
            }
            .rowSafarnamehCard .imgSec .icon{
                position: absolute;
                left: 7px;
                top: 7px;
                color: black;
                font-size: 30px;
            }
            .rowSafarnamehCard .imgSec .userInfos{
                width: 40px;
                height: 40px;
                overflow: hidden;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                bottom: -3px;
                right: -3px;
                z-index: 2;
                border: solid 4px white;
            }
            .rowSafarnamehCard .content{
                color: black;
                width: calc(100% - 210px);
                margin-right: 10px;
            }
            .rowSafarnamehCard .content .title{
                color: black;
                font-weight: bold;
                font-size: 14px;
                margin: 0px;
                margin-bottom: 5px;

                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            .rowSafarnamehCard .content .summery{
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>

        <div class="safarnamehList">
            <div class="title">تازه ها</div>
            <div id="allSafarnamehListMobile" class="colList">
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
        </div>
    </div>

    <script>
        var mobileListSample = $('#allSafarnamehListMobile').html();
        $('#allSafarnamehListMobile').empty();

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

                <div id="samplePost" class="clearfix" style="display: none">
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

                <div class="clearfix">
                    <nav class="navigation pagination">
                        <div id="allPostPagination" class="nav-links"></div>
                    </nav>
                </div>

            </div>
            <div class="gap cf" style="height:30px;"></div>
        </div>
    </div>
@endsection

@section('script')
    <script type='text/javascript' src='{{URL::asset('js/article/mainArticle.js')}}'></script>

    <script>
        var allPostSample = 0;
        var takeSafarnameh = 5;
        var page = 1;
        var getLisPostUrl = '{{route("safarnameh.list")}}';
        var totalPage = {{$pageLimit}};
        if(allPostSample == 0)
            allPostSample = $('#samplePost').html();

        $('#samplePost').empty();
        $('#samplePost').show();

        function getAllPost(page){
            $.ajax({
                type: 'GET',
                url: `{{route("safarnameh.pagination")}}?page=${page}&take=${takeSafarnameh}`,
                success: function(response){
                    if(response.status == 'ok') {
                        createPostRow(response.result);
                        createPagination(page);
                    }
                }
            })
        }

        function createPostRow(_safarnameh){
            console.log(_safarnameh);
            $('#samplePost').empty();
            _safarnameh.map(item => {
                var text = allPostSample;
                var mobile = mobileListSample;

                for (var x of Object.keys(item)) {
                    text = text.replace(new RegExp(`##${x}##`, "g"), item[x]);
                    mobile = mobile.replace(new RegExp(`##${x}##`, "g"), item[x]);
                }

                $('#samplePost').append(text);
                $('#allSafarnamehListMobile').append(mobile);
            });
        }

        function createPagination(page){

            var beforeMore = false;
            var afterMore = false;
            var text = '';
            $('#allPostPagination').html('');

            for(var i = 1; i <= totalPage; i++){
                text = '';
                if(page == i)
                    text = "<span aria-current='page' class='page-numbers current' style='cursor: pointer'>" + i + "</span>";
                else if(Math.abs(i - page) <= 2)
                    text = "<a class='page-numbers' onclick='getAllPost(" + i + ")' style='cursor: pointer'>" + i + "</a>\n";
                else if(i == 1)
                    text = "<a class='page-numbers' onclick='getAllPost(" + i + ")' style='cursor: pointer'>" + i + "</a>\n";
                else if(!beforeMore && i < page){
                    beforeMore = true;
                    text = '<span class="page-numbers dots">&hellip;</span>';
                }
                else if(i == totalPage)
                    text = "<a class='page-numbers' onclick='getAllPost(" + i + ")' style='cursor: pointer'>" + i + "</a>\n";
                else if(!afterMore && i > page){
                    afterMore = true;
                    text = '<span class="page-numbers dots">&hellip;</span>';
                }
                $('#allPostPagination').append(text);
            }
        }

        $(window).ready(() =>{
            getAllPost(1);
        });

    </script>
@endSection


