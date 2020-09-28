@extends('Safarnameh.safarnamehLayout')

@section('head')
    <title>صفحه سفرنامه</title>

    <style>
        .safarnamehMinRows{
            margin: 0px;
            min-height: 0px;
            height: 70px;
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
    <div class="gnTopPics">
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
@endsection

@section('body')
{{--    <div class="col-md-12 col-sm-12 gnWhiteBox gnAdvertise">--}}
{{--        <div class="gnAdvertiseText">تبلیغات</div>--}}
{{--        <div>--}}
{{--            <img class="gnAdvertiseImage" src="{{URL::asset('images/adv1.jpg')}}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}

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
                                    <li class="widget-10104 im-widget clearfix safarnamehMinRows">
                                        <figure class="im-widget-thumb">
                                            <a href="" title="{{$safarnameh->title}}">
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
                                    <a href="##url##"
                                       rel="bookmark">##title##</a>
                                </h3>
                            </header>

                            <div style="max-height: 100px !important; overflow: hidden"
                                 class="im-entry-content">
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
@endsection

@section('script')
    <script type='text/javascript' src='{{URL::asset('js/article/mainArticle.js')}}'></script>

    <script>
        var page = 1;
        var _token = '{{csrf_token()}}';
        var getAllSafarnamehUrl = '{{route("safarnameh.pagination")}}';
        var getLisPostUrl = '{{route("safarnameh.list")}}';
        var totalPage = {{$pageLimit}};
        if(allPostSample == 0)
            allPostSample = $('#samplePost').html();

        $('#samplePost').html('');
        $('#samplePost').show();
        getAllPost(1);

    </script>
@endSection


