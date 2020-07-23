@extends('Article.articleLayout')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/easyimage.css')}}">

    <title> {{$post->seoTitle}} </title>
    <meta content="article" property="og:type"/>

    <meta name="keywords" content="{{$post->keyword}}">
    <meta property="og:title" content=" {{$post->seoTitle}} " />
    <meta property="og:description" content=" {{$post->meta}}" />
    <meta name="twitter:title" content=" {{$post->seoTitle}} " />
    <meta name="twitter:description" content=" {{$post->meta}}" />
    <meta name="description" content=" {{$post->meta}}"/>
    <meta property="article:author " content="{{$post->user->username}}" />
    <meta property="article:section" content="article" />
    {{--<meta property="article:published_time" content="2019-05-28T13:32:55+00:00" /> زمان انتشار--}}
    {{--<meta property="article:modified_time" content="2020-01-14T10:43:11+00:00" />زمان آخریت تغییر--}}
    {{--<meta property="og:updated_time" content="2020-01-14T10:43:11+00:00" /> زمان آخرین آپدیت--}}

    @if(isset($post->pic))
        <meta property="og:image" content="{{URL::asset($post->pic)}}"/>
        <meta property="og:image:secure_url" content="{{URL::asset($post->pic)}}"/>
        <meta property="og:image:width" content="550"/>
        <meta property="og:image:height" content="367"/>
        <meta name="twitter:image" content="{{URL::asset($post->pic)}}"/>
    @endif

    @foreach($post->tag as $item)
        <meta property="article:tag" content="{{$item->tag}}"/>
    @endforeach

    <style>
        p {
            font-size: 20px;
        }
        ol, ul{
            padding: 15px;
        }
        @media (max-width: 768px){
            .gnWhiteBox {
                margin: 0 -15px;
            }
        }
    </style>

@endsection

@section('body')

    <div class="container" style="direction: rtl">
        <div class="col-lg-3 col-sm-3 hideOnPhone" style="padding-right: 0 !important;">
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
                        <div class="col-md-6 rightCategory" style="padding: 0px 5px"></div>
                        <div class="col-md-6 leftCategory" style="padding: 0px 5px"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 gnWhiteBox">

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

                <input type="text" class="gnInput searchCityInArticleInput" placeholder="شهر موردنظر خود را وارد کنید" readonly>
            </div>

            <div class="col-md-12 gnWhiteBox">
                <div class="gnInput">
                    <input type="text" class="gnInputonInput" id="pcSearchInput" placeholder="عبارت جستجو">
                    <span class="ui_icon search gnSearchInputBtn" onclick="searchInArticle('pcSearchInput')"></span>
                </div>
            </div>

            <div class="col-md-12 gnWhiteBox">
                @foreach($similarPost as $item)
                    <div class="content-2col">
                        <div class="im-entry-thumb" style="background-image: url('{{$item->pic}}'); background-size: 100% 100%;">
                            <div class="im-entry-header im-entry-header_rightSide">
                                <div class="im-entry-category">
                                    <div class="iranomag-meta clearfix">
                                        <div class="cat-links im-meta-item">
                                            <a class="im-catlink-color-2079" href="{{route('article.list', ['type' => 'category', 'search' => $item->category])}}">{{$item->category}}</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{$item->url}}" rel="bookmark">
                                    <h1 class="im-entry-title im-entry-title_rightSide">
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
            </div>
        </div>
        <div class="col-lg-9 col-sm-9 gnWhiteBox">
            <div class="gnMainPicOfArticle">
                <img class="gnAdvertiseImage" src="{{URL::asset($post->pic)}}" alt="{{$post->keyword}}">
                <div class="gnMainPicOfArticleText">
                    <div>
                        <div class="im-entry-category" style="margin: 0 0 0 20px;">
                            <div class="iranomag-meta">
                                <a class="im-catlink-color-2079" href="{{route('article.list', ['type' => 'category', 'search' => $post->mainCategory])}}">{{$post->mainCategory}}</a>
                            </div>
                        </div>
                        <div class="iranomag-meta" style="display: inline-block">
                            <div class="posted-on im-meta-item">
                                <span class="entry-date published updated">{{$post->date}}</span>
                            </div>
                            <div class="comments-link im-meta-item">
                                    <i class="fa fa-comment-o"></i>{{$post->msg}}
                            </div>
                            <div class="author vcard im-meta-item">
                                <i class="fa fa-user"></i>
                                {{$post->user->username}}
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
                <div>
                    <div style="margin-top: 65px">
                        {!! $post->description !!}
                    </div>
                    <div>
                        <div class="col-md-12 col-sm-12 gnUserDescription">
                            <div class="gnLabels" style="line-height: 30px !important;">برچسب ها</div>
                            <div>
                                @foreach($post->tag as $tag)
                                    <div class="gnTags">{{$tag->tag}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="commentFeedbackChoices">
                        <div id="likeDiv" class="postsActionsChoices postLikeChoice col-xs-6 col-md-3" onclick="likePost(1, {{$post->id}})" style="color: {{$postLike == 1 ? 'red': ''}}">
                            <span id="likeDivIcon" class="commentsLikeIconFeedback {{$postLike == 1 ? 'commentsLikeClickedIconFeedback': ''}}"></span>
                            <span class="mg-rt-32 cursor-pointer">دوست داشتم</span>
                        </div>
                        <div id="disLikeDiv" class="postsActionsChoices postDislikeChoice col-xs-6 col-md-3" onclick="likePost(0, {{$post->id}})" style="color: {{$postLike == 0 ? 'darkred': ''}}">
                            <span id="disLikeDivIcon" class="commentsDislikeIconFeedback {{$postLike == 0 ? 'commentsDislikeClickedIconFeedback': ''}}"></span>
                            <span class="mg-rt-32 cursor-pointer">دوست نداشتم</span>
                        </div>
                        <div class="postsActionsChoices postCommentChoice col-xs-6 col-md-3">
                            <span class="showCommentsIconFeedback" onclick="showPostsComments(0)"></span>
                            <span class="mg-rt-32 cursor-pointer" onclick="showPostsComments(0)">مشاهده نظرها</span>
                        </div>
                        <div id="share_pic" class="postsActionsChoices postShareChoice col-xs-6 col-md-3">
                            <span class="commentsShareIconFeedback"></span>
                            <span class="mg-rt-32 cursor-pointer">اشتراک‌گذاری</span>
                            @include('layouts.shareBox')

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
                <div>
                    <div class="col-md-12 col-sm-12 gnUserDescription">
                        <div>
                            <div class="circleBase type2 newCommentWriterProfilePic">
                                <img src="{{$post->user->pic}}" style="width: 100%; height: 100%; border-radius: 50%;">
                            </div>
                            <div class="gnLabels">{{$post->user->username}}</div>
                        </div>
                        <div>
                            لورم ایپسون
                        </div>
                    </div>
                </div>
                <div>
                    <div id="commentDiv0" class="commentsMainBox display-none" style="display: none;">
                        <div id="commentMainDiv##id##" class="eachCommentMainBox" style="margin-top: 20px;">
                            <div class="circleBase type2 commentsWriterProfilePic">
                                <img src="##userPic##" style="width: 100%; height: 100%; border-radius: 50%;">
                            </div>
                            <div class="commentsContentMainBox">
                                <b class="userProfileName display-inline-block">##username##</b>
                                <span class="label label-success" style="display: ##status1##;">در انتظار تایید</span>
                                <div>##msg##</div>
                                <div class="commentsStatisticsBar">
                                    <div class="float-right display-inline-black">
                                        <span id="commentLikeCount##id##" class="likeStatisticIcon commentsStatisticSpan color-red">##likeCount##</span>
                                        <span id="commentDisLikeCount##id##" class="dislikeStatisticIcon commentsStatisticSpan dark-red">##disLikeCount##</span>
                                        <span class="numberOfCommentsIcon commentsStatisticSpan color-blue">##ans##</span>
                                    </div>
                                    <div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showPostsComments(##id##)" style="display: ##haveAnsDisplay##;">دیدن پاسخ‌ها</div>
                                    <b class="replyBtn hideOnScreen" onclick="replyToComments(this)">پاسخ دهید</b>
                                    {{--                                <div class="dark-blue float-left display-inline-black cursor-pointer" onclick="showPostsComments(##id##)">دیدن پاسخ‌ها</div>--}}
                                </div>
                            </div>
                            <div class="commentsActionsBtns hideOnPhone" style="display: ##status2##;">
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
    </div>

    <script src="{{URL::asset('js/article/articlePage.js')}}"></script>

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

        function createComment(srcId, comments){
            if(srcHtmlComments == 0)
                srcHtmlComments = $('#commentDiv0').html();

            $('#commentDiv' + srcId).html('');

            for(var i = 0; i < comments.length; i++){
                var t;
                var re;
                var text = srcHtmlComments;
                var fk = Object.keys(comments[i]);
                for (var x of fk) {
                    t = '##' + x + '##';
                    re = new RegExp(t, "g");

                    if(x == 'ans'){
                        if(comments[i][x] == null)
                            text = text.replace(re, 0);
                        else
                            text = text.replace(re, comments[i][x].length);
                    }
                    text = text.replace(re, comments[i][x]);
                }

                t = '##authPic##';
                re = new RegExp(t, "g");
                text = text.replace(re, userPic);

                if(comments[i]['status'] == 0){
                    t = '##status1##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'inline-block');
                    t = '##status2##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'none');
                }
                else{
                    t = '##status1##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'none');
                    t = '##status2##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'block');
                }

                if(comments[i]['userLike'] == 1){
                    t = '##showLike##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'likeActionClickedBtn');
                }
                else if(comments[i]['userLike'] == 0){
                    t = '##showDisLike##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'dislikeActionClickedBtn');
                }

                var marginRight = '0px';
                if(srcId != 0)
                    marginRight = '50px';
                t = '##mRight##';
                re = new RegExp(t, "g");
                text = text.replace(re, marginRight);

                if(comments[i]['ans'] != null && comments[i]['ans'].length != 0){
                    t = '##haveAnsDisplay##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'block');
                    $('#commentDiv' + srcId).append(text);
                    createComment(comments[i]['id'], comments[i]['ans']);
                }
                else{
                    t = '##haveAnsDisplay##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, 'none');
                    $('#commentDiv' + srcId).append(text);
                }
            }
        }
        createComment(0, comments);

        $(window).ready(function(){

            autosize($(".inputBoxInputComment"));
            autosize($(".inputBoxInputAnswer"));
        });
    </script>
@endsection

