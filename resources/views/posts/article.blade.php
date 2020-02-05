<?php $placeMode = "ticket";
$state = 'اصفهان';
$kindPlaceId = 10; ?>
        <!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=1')}}' data-rup='hr_north_star_v1'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/hotelDetail.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/article.min.css?v=1.2')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/article.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/easyimage.css')}}"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>خانه - شازده مسافر</title>

    <link rel='stylesheet' id='google-font-css' href='//fonts.googleapis.com/css?family=Dosis%3A200' type='text/css'
          media='all'/>

    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>

    <style>
        .gnTopPics {
            direction: rtl;
            background-color: #d3d2d2;
        }

        .gnWhiteBox {
            background-color: white;
            margin: 20px 0 0;
        }

        .gnContentsCategory {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .gnColOFContentsCategory {
            width: 100%;
        }
        .categoryRow{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .categoryRTL{
            direction: rtl;
            text-align: right;
        }
        .categoryLTR{
            direction: ltr;
            text-align: right;
        }
        .gnUl {
            list-style: none;
            padding: 5px;
            margin: 5px 5px 10px 0px;
            background-color: #f3f3f3;
        }
        .gnLi {
            padding: 2px 0;
        }
        .gnTitleOfPlaces {
            font-size: 1.2em;
            font-weight: 400;
        }
        .gnNumberOfPlaces {
            color: #92321b;
            float: left;
        }

        .gnInput {
            width: 100%;
            padding: 2px 7px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            background-color: #ebebeb;
            line-height: 30px;
            margin: 5px 0;
        }

        .gnAdvertise {
            padding-bottom: 12px;
        }
        .gnAdvertiseText {
            color: #30b4a6;
        }
        .gnAdvertiseImage {
            width: 100%;
            height: auto;
        }
        textarea:focus{
            outline: none;
            box-shadow: none;
        }
        textarea:hover{
            outline: none;
            box-shadow: none;
        }
    </style>

    <style>
        #helpBtnMainDiv {
            display: none;
        }
    </style>

    {{--just gardeshname style--}}
    <style>
        .gnReturnBackBtn {
            background-color: #fcc156;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0 0;
            text-align: center;
            font-size: 1.2em;
            cursor: pointer;
        }
        .gnReturnBackBtn:hover {
            opacity: 0.75;
        }
    </style>

    {{--just article style--}}
    <style>
        .gnMainPicOfArticle {
            position: relative;
            padding: 15px 0;
        }
        .gnMainPicOfArticleText {
            width: 96%;
            position: absolute;
            bottom: -35px;
            left: 50%;
            margin-left: -48%;
            padding: 20px 20px 10px;
            background: white;
            border-bottom: 3px solid #f3f3f3;
            opacity: 0.9;
        }
    </style>

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging rtl home page-template-default page page-id-119 group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

<div class="header">
    @include('layouts.placeHeader')

    <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic position-relative">
{{--        @include('layouts.placeMainBodyHeader')--}}
    </div>

    <div id="darkModal" class="display-none" role="dialog"></div>
    @if(!Auth::check())
        @include('layouts.loginPopUp')
    @endif

    <div class="hidden visible-sm visible-xs">
        <div class="im-header-mobile">
            <div class="im-main-header clearfix light">
                <div class='container'>
                    <div class="row">
                        <div class="im-off-canvas col-sm-2 col-xs-2">
                            <button id="off-canvas-on" class="off-canvas-on"><i class="fa fa-navicon"></i></button>
                        </div>
                        <div class="im-mobile-logo col-sm-8 col-xs-8">
                        </div>
                        <div class="im-search im-slide-block col-sm-2 col-xs-2">
                            <div class="search-btn slide-btn">
                                <i class="fa fa-search"></i>
                                <div class="im-search-panel im-slide-panel">
                                    <form action="" name="searchform" method="get">
                                        <fieldset class="search-fieldset">
                                            <div class="input-group">
                                                <input type="search" class="form-control" name="s"
                                                       placeholder="عبارت جستجو را اینجا وارد کنید..." required/>
                                                <span class="input-group-btn">
                                                    <input type="submit" class="btn btn-default" value="بگرد"/>
                                                </span>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="im-header-mobile-ad col-md-12 text-center">
                <p>
                    <img class="aligncenter size-full wp-image-4151" src="{{URL::asset('images/gardeshname_banner.jpg')}}" alt="شازده مسافر" width="1600" height="365"/>
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="direction: rtl">
        <div class="col-md-3 col-sm-12" style="padding-right: 0 !important;">
            <a href="{{route('mainArticle')}}">
                <div class="col-md-12 gnReturnBackBtn">بازگشت به صفحه اصلی</div>
            </a>
            <div class="col-md-12 gnWhiteBox">
                <div class="widget-head widget-head-44">
                    <strong class="widget-title">دسته‌بندی مطالب</strong>
                    <div class="widget-head-bar"></div>
                    <div class="widget-head-line"></div>
                </div>
                <div class="gnContentsCategory">
                    <div class="row" style="width: 100%; margin: 0px;">
                        <div id="rightCategory" class="col-md-6" style="padding: 0px 5px"></div>
                        <div id="leftCategory" class="col-md-6" style="padding: 0px 5px"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 gnWhiteBox">
                <div>شما در استان اصفهان - شهر مورچه خورد - هتل عباسی هستید</div>
                <div>
                    <a href="">نمایش محتوای استان اصفهان</a>
                </div>
                <div>
                    <a href="">نمایش محتوای شهر اصفهان</a>
                </div>
                <input type="text" class="gnInput" placeholder="شهر موردنظر خود را وارد کنید">
            </div>

            <div class="col-md-12 gnWhiteBox">
                <input type="text" class="gnInput" id="pcSearchInput" placeholder="عبارت موردنظر خود را جست‌وجو کنید">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" value="بگرد" onclick="searchInArticle('pcSearchInput')"/>
                </span>
            </div>

            <div class="col-md-12 gnWhiteBox">
                @foreach($similarPost as $item)
                    <div class="content-2col">
                        <div class="im-entry-thumb" style="background-image: url('{{$item->pic}}'); background-size: 100% 100%;">
                            <div class="im-entry-header">
                                <div class="im-entry-category">
                                    <div class="iranomag-meta clearfix">
                                        <div class="cat-links im-meta-item">
                                            <a class="im-catlink-color-2079" href="{{$item->url}}">{{$item->category}}</a>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="im-entry-title">
                                    {{$item->title}}
                                </h1>
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
                                <a href="">
                                    <i class="fa fa-comment-o"></i>{{$item->msgs}}
                                </a>
                            </div>
                            <div class="author vcard im-meta-item">
                                <a class="url fn n" href="/author/writer/">
                                    <i class="fa fa-user"></i>
                                    {{$item->username}}
                                </a>
                            </div>
                            <div class="post-views im-meta-item">
                                <i class="fa fa-eye"></i>{{$item->seen}}
                            </div>
                        </div>
                        </p>
                    </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="col-md-9 col-sm-12 gnWhiteBox">
            <div class="gnMainPicOfArticle">
                <img class="gnAdvertiseImage" src="{{URL::asset($post->pic)}}" alt="{{$post->keyword}}">
                <div class="gnMainPicOfArticleText">
                    <div>
                        <div class="im-entry-category" style="margin: 0 0 0 20px;">
                            <div class="iranomag-meta">
                                <a class="im-catlink-color-2079" href="#">{{$post->mainCategory}}</a>
                            </div>
                        </div>
                        <div class="iranomag-meta" style="display: inline-block">
                            <div class="posted-on im-meta-item">
                                <span class="entry-date published updated">{{$post->date}}</span>
                            </div>
                            <div class="comments-link im-meta-item">
                                <a href="">
                                    <i class="fa fa-comment-o"></i>{{$post->msg}}
                                </a>
                            </div>
                            <div class="author vcard im-meta-item">
                                <a class="url fn n" href="/author/writer/">
                                    <i class="fa fa-user"></i>
                                    {{$post->user->username}}
                                </a>
                            </div>
                            <div class="post-views im-meta-item">
                                <i class="fa fa-eye"></i>{{$post->seen}}
                            </div>
                        </div>
                    </div>
                    <h1 class="im-entry-title">
                        {{$post->title}}
                    </h1>
                </div>
            </div>
            <div>
                <div style="margin-top: 65px">
                    {!! $post->description !!}
                </div>
                <div class="commentFeedbackChoices">
                    <div id="likeDiv" class="postsActionsChoices postLikeChoice col-xs-3" onclick="likePost(1, {{$post->id}})" style="color: {{$postLike == 1 ? 'red': ''}}">
                        <span id="likeDivIcon" class="commentsLikeIconFeedback {{$postLike == 1 ? 'commentsLikeClickedIconFeedback': ''}}"></span>
                        <span class="mg-rt-20 cursor-pointer">دوست داشتم</span>
                    </div>
                    <div id="disLikeDiv" class="postsActionsChoices postDislikeChoice col-xs-3" onclick="likePost(0, {{$post->id}})" style="color: {{$postLike == 0 ? 'darkred': ''}}">
                        <span id="disLikeDivIcon" class="commentsDislikeIconFeedback {{$postLike == 0 ? 'commentsDislikeClickedIconFeedback': ''}}"></span>
                        <span class="mg-rt-20 cursor-pointer">دوست نداشتم</span>
                    </div>
                    <div class="postsActionsChoices postCommentChoice col-xs-3">
                        <span class="showCommentsIconFeedback" onclick="showPostsComments(0)"></span>
                        <span class="mg-rt-20 cursor-pointer" onclick="showPostsComments(0)">مشاهده نظرها</span>
                    </div>
                    <div class="postsActionsChoices postShareChoice col-xs-3">
                        <span class="commentsShareIconFeedback"></span>
                        <span class="mg-rt-20 cursor-pointer">اشتراک‌گذاری</span>
                    </div>

                </div>
                <div class="quantityOfLikes">
                    <span id="countLike">{{$post->like}}</span>
                    نفر دوست داشتند،
                    <span id="countDisLike">{{$post->disLike}}</span>
                    نفر دوست نداشتند و
                    <span>{{$post->msg}}</span>
                    نفر نظر دادند.
                </div>
            </div>
        </div>

        <div class="col-md-3"></div>
        <div class="col-md-9 col-sm-12 gnWhiteBox">

            <div id="commentDiv0" style="display: none">
                <div id="commentMainDiv##id##" class="eachCommentMainBox" style="margin-top: 20px; margin-right: ##mRight##;">
                    <div class="circleBase type2 commentsWriterProfilePic">
                        <img src="##userPic##" style="width: 100%; height: 100%; border-radius: 50%;">
                    </div>
                    <div class="commentsContentMainBox">
                        <b class="userProfileName display-inline-block">##username##</b>
                        <p>##msg##</p>
                        <div class="commentsStatisticsBar">
                            <div class="float-right display-inline-black">
                                <span id="commentLikeCount##id##" class="likeStatisticIcon commentsStatisticSpan color-red">##likeCount##</span>
                                <span id="commentDisLikeCount##id##" class="dislikeStatisticIcon commentsStatisticSpan dark-red">##disLikeCount##</span>
                                <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">##ans##</span>
                            </div>
                            <div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showPostsComments(##id##)" style="display: ##haveAnsDisplay##;">دیدن پاسخ‌ها</div>
                        </div>
                    </div>
                    <div class="commentsActionsBtns">
                        <div onclick="likeComment(##id##, 1, this);">
                            <span class="likeActionBtn ##showLike##"></span>
                        </div>
                        <div onclick="likeComment(##id##, 0, this);">
                            <span class="dislikeActionBtn ##showDisLike##"></span>
                        </div>

                        <div class="clear-both"></div>
                        <b class="replyBtn" onclick="replyToComments(this)">پاسخ دهید</b>
                    </div>
                    <div class="replyToCommentMainDiv" style="display: none">
                        <div class="circleBase type2 newCommentWriterProfilePic">
                            <img src="##authPic##" style="width: 100%; height: 100%; border-radius: 50%;">
                        </div>
                        <div class="inputBox">
                            <b class="replyCommentTitle">در پاسخ به نظر ##username##</b>
                            <textarea id="ansForReviews_1043" class="inputBoxInput inputBoxInputComment" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>
                            <button class="btn btn-primary" onclick="sendComment(##postId##, ##id##, this)"> ارسال</button>
                        </div>
                    </div>
                </div>
                <div id="commentDiv##id##" style="display: none"></div>
            </div>
            <div class="newCommentPlaceMainDiv">
                <div class="circleBase type2 newCommentWriterProfilePic">
                    <img src="{{$uPic}}" style="">
                </div>
                <div class="inputBox">
                    <b class="replyCommentTitle">نظر خود را در مورد مقاله با ما در میان بگذارید</b>
                    <textarea class="inputBoxInput inputBoxInputComment" id="ansForReviews_1038" placeholder="شما چه نظری دارید؟" onclick="checkLogin()"></textarea>
                    <button class="btn btn-primary" onclick="sendComment({{$post->id}}, 0, this)"> ارسال</button>
                </div>
            </div>

        </div>
    </div>
</div>

    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>

    <script type='text/javascript' src='{{URL::asset('js/article.js')}}'></script>


    <script type="text/javascript">
        jQuery('.lazy-img').unveil(300, function () {
            "use strict";
            jQuery(this).load(function () {
                this.style.opacity = 1;
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(".sticky-sidebar").stick_in_parent({offset_top: fixed_header_height});
    </script>

    @include('layouts.placeFooter')

</div>

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

<script>
    var category = {!! $category !!}
    var post = {!! $post !!}
    var getLisPostUrl = '{{route("article.list")}}';
    var likeCount = {{$post->like}};
    var disLikeCount = {{$post->disLike}};
    var uLike = {{$postLike}};
    var _token= '{{csrf_token()}}';
    var likeArticleUrl = '{{route("article.like")}}';
    var hasLogin = '{{auth()->check()}}';
    var requestUrl = '{{Request::url()}}';
    var commentStoreUrl = '{{route("article.comment.store")}}';
    var likeCommentUrl = '{{route("article.comment.like")}}';
    var comments = {!! $comments !!};
    var userPic = '{{$uPic}}';
</script>

<script src="{{URL::asset('/js/article/articlePage.js')}}"></script>

<div class="ui_backdrop dark" style="display: none; z-index: 10000000;"></div>

</body>
</html>


