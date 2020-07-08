@extends('Article.articleLayout')

@section('head')
    <title>صفحه مقالات</title>
@endsection

@section('body')

    <div class="gnTopPics">
        <div class="container">
            <div class="im_post_grid_box clearfix">
                <div class="clearfix">
                    <?php $i = 0; ?>
                    @foreach($bannerPosts as $post)
                        @if(count($bannerPosts) == 1)
                            <div class="col-md-12">
                                @elseif($i < 2 || count($bannerPosts) != 5)
                                    <div class="col-md-6 col-sm-12">
                                        @elseif(count($bannerPosts) == 5)
                                            <div class="col-md-4 col-sm-12">
                                                @endif
                                                <article class="im-article grid-carousel grid-2 row post type-post status-publish format-standard has-post-thumbnail hentry">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="{{route('article.show', ['slug' => $post->slug])}}" title="{{$post->title}}">
                                                            <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->keyword}}" style="height: {{(count($bannerPosts) != 5) || $i < 2 ? (count($bannerPosts) != 1 ? '310px' : '') : '250px'}}"/>
                                                        </a>
                                                        <div class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix">
                                                                    <div class="cat-links im-meta-item">
                                                                        <a style="background-color: #666; color: #fff !important;" href="{{url('/article/list/category/'.$post->category)}}" title="{{$post->category}}">{{$post->category}}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h2 class="im-entry-title">
                                                                <a style="color: #fff" href="{{route('article.show', ['slug' => $post->slug])}}" rel="bookmark">{{$post->title}}</a>
                                                            </h2>
                                                            <div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix">
                                                                    <div class="posted-on im-meta-item">
                                                                        <span class="entry-date published updated">{{$post->date}}</span>
                                                                    </div>
                                                                    <div class="comments-link im-meta-item">
                                                                        <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                    </div>
                                                                    <div class="author vcard im-meta-item">
                                                                        <i class="fa fa-user"></i>{{$post->username}}
                                                                    </div>
                                                                    <div class="post-views im-meta-item">
                                                                        <i class="fa fa-eye"></i>{{$post->seen}}
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

    <div class="container" style="direction: rtl">
        <div class="col-lg-3 col-sm-3 hideOnPhone" style="padding-right: 0 !important;">
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
            <div class="col-md-12 gnWhiteBox gnAdvertise">
                <div class="gnAdvertiseText">تبلیغات</div>
                <div>
                    <img class="gnAdvertiseImage" src="{{URL::asset('images/adv2.jpg')}}" alt="">
                </div>
            </div>
            <div class="widget widget_impv_display_widget col-md-12 gnWhiteBox">
                <div class="widget-head widget-head-554">
                    <strong class="widget-title">
                        پربازدیدترین ها
                    </strong>
                    <div class="widget-head-bar"></div>
                    <div class="widget-head-line"></div>
                </div>
                <div id="impv_display_widget-4-tab2" class="widget_pop_body">
                    <ul class='popular_by_views_list'>
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
        </div>
        <div class="col-lg-9 col-sm-9" style="padding-left: 0 !important;">
            <div class="col-md-12 col-sm-12 gnWhiteBox gnAdvertise">
                <div class="gnAdvertiseText">تبلیغات</div>
                <div>
                    <img class="gnAdvertiseImage" src="{{URL::asset('images/adv1.jpg')}}" alt="">
                </div>
            </div>

            @if($relatedPost)
                <div class="category-element-holder style1 col-md-12 col-sm-12 gnWhiteBox">
                    <div class="widget-head widget-head-45">
                        <strong class="widget-title">مطالب مرتبط با ...</strong>
                        <div class="widget-head-bar"></div>
                        <div class="widget-head-line"></div>
                    </div>
                    <div class="row">
                        <?php $i = 0; ?>
                        @foreach($relatedPost as $post)
                            @if($i == 0)
                                <article class="im-article content-2col col-md-6 col-sm-12 post type-post status-publish format-standard has-post-thumbnail hentry category-2068">
                                    <div class="im-entry-thumb">
                                        <a class="im-entry-thumb-link" href="{{route('article.show', ['slug' => $post->slug])}}" title="{{$post->title}}">
                                            <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->keyword}}"/>
                                        </a>
                                        <header class="im-entry-header">
                                            <div class="im-entry-category">
                                                <div class="iranomag-meta clearfix">
                                                    <div class="cat-links im-meta-item">
                                                        {{--                                                    <a style="background-color: #666; color: #fff !important;" href="" title="{{$post->category}}">{{$post->category}}</a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="im-entry-title">
                                                <a href="{{route('article.show', ['slug' => $post->slug])}}" rel="bookmark">{{$post->title}}</a>
                                            </h3>
                                        </header>
                                    </div>
                                    <div class="im-entry">
                                        <div class="iranomag-meta clearfix">
                                            <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">{{$post->date}}</span>
                                            </div>

                                            <div class="comments-link im-meta-item">
                                                <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                            </div>

                                            <div class="author vcard im-meta-item">
                                                <i class="fa fa-user"></i>{{$post->username}}
                                            </div>

                                            <div class="post-views im-meta-item">
                                                <i class="fa fa-eye"></i>{{$post->seen}}
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
                                                <li class="widget-10104im-widgetclearfix">
                                                    <figure class="im-widget-thumb">
                                                        <a href="{{route('article.show', ['slug' => $post->slug])}}" title="{{$post->title}}">
                                                            <img src="{{$post->pic}}" alt="{{$post->keyword}}"/>
                                                        </a>
                                                    </figure>
                                                    <div class="im-widget-entry">
                                                        <header class="im-widget-entry-header">
                                                            <h4 class='im-widget-entry-title'>
                                                                <a style="color: #fff !important;" href="{{route('article.show', ['slug' => $post->slug])}}" title='{{$post->title}}'>{{$post->title}}</a>
                                                            </h4>
                                                        </header>
                                                        <div class="iranomag-meta clearfix">
                                                            <div class="posted-on im-meta-item">
                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                            </div>
                                                            <div class="comments-link im-meta-item">
                                                                <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                            </div>
                                                            <div class="author vcard im-meta-item">
                                                                <i class="fa fa-user"></i>{{$post->username}}
                                                            </div>
                                                            <div class="post-views im-meta-item">
                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @if($i == count($mostSeenPost) - 1)
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
                    @foreach($mostLike as $post)
                        @if($i == 0)
                            <article class="im-article content-2col col-md-6 col-sm-12 post type-post status-publish format-standard has-post-thumbnail hentry category-2068">
                                <div class="im-entry-thumb">
                                    <a class="im-entry-thumb-link" href="{{route('article.show', ['slug' => $post->slug])}}" title="{{$post->title}}">
                                        <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->keyword}}"/>
                                    </a>
                                    <header class="im-entry-header">
                                        <div class="im-entry-category">
                                            <div class="iranomag-meta clearfix">
                                                <div class="cat-links im-meta-item">
                                                    {{--                                                    <a style="background-color: #666; color: #fff !important;" href="" title="{{$post->category}}">{{$post->category}}</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="im-entry-title">
                                            <a href="{{route('article.show', ['slug' => $post->slug])}}" rel="bookmark">{{$post->title}}</a>
                                        </h3>
                                    </header>
                                </div>
                                <div class="im-entry">
                                    <div class="iranomag-meta clearfix">
                                        <div class="posted-on im-meta-item">
                                            <span class="entry-date published updated">{{$post->date}}</span>
                                        </div>

                                        <div class="comments-link im-meta-item">
                                            <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                        </div>

                                        <div class="author vcard im-meta-item">
                                            <i class="fa fa-user"></i>{{$post->username}}
                                        </div>

                                        <div class="post-views im-meta-item">
                                            <i class="fa fa-eye"></i>{{$post->seen}}
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
                                            <li class="widget-10104im-widgetclearfix">
                                                <figure class="im-widget-thumb">
                                                    <a href="" title="{{$post->title}}">
                                                        <img src="{{$post->pic}}" alt="{{$post->keyword}}"/>
                                                    </a>
                                                </figure>
                                                <div class="im-widget-entry">
                                                    <header class="im-widget-entry-header">
                                                        <h4 class='im-widget-entry-title'>
                                                            <a href="{{route('article.show', ['slug' => $post->slug])}}" rel="bookmark">{{$post->title}}</a>
                                                        </h4>
                                                    </header>
                                                    <div class="iranomag-meta clearfix">
                                                        <div class="posted-on im-meta-item">
                                                            <span class="entry-date published updated">{{$post->date}}</span>
                                                        </div>
                                                        <div class="comments-link im-meta-item">
                                                            <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                        </div>
                                                        <div class="author vcard im-meta-item">
                                                            <i class="fa fa-user"></i>{{$post->username}}
                                                        </div>
                                                        <div class="post-views im-meta-item">
                                                            <i class="fa fa-eye"></i>{{$post->seen}}
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
                            @foreach($recentlyPosts as $post)
                                @if($i == 0)
                                    <article class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                        <div class="im-entry-thumb">
                                            <a class="im-entry-thumb-link"
                                               href="{{route('article.show', ['slug' => $post->slug])}}"
                                               title="{{$post->title}}">

                                                <img class="lazy-img"
                                                     data-src="{{$post->pic}}"
                                                     alt="{{$post->keyword}}"/>
                                            </a>
                                            <header class="im-entry-header">
                                                <div class="im-entry-category">
                                                    <div class="iranomag-meta clearfix">
                                                        <div class="cat-links im-meta-item">
                                                            {{--<a style="background-color: #666; color: #fff !important;" href="" title="{{$post->category}}">{{$post->category}}</a>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="im-entry-title">
                                                    <a style="color: #fff !important"
                                                       href="{{route('article.show', ['slug' => $post->slug])}}"
                                                       rel="bookmark">{{$post->title}}</a>
                                                </h3>
                                            </header>
                                        </div>

                                        <div class="im-entry">
                                            <div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                    <span class="entry-date published updated">{{$post->date}}</span>
                                                </div>

                                                <div class="comments-link im-meta-item">
                                                    <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                </div>

                                                <div class="author vcard im-meta-item">
                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                </div>

                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>{{$post->seen}}
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

                                                    <li class="widget-10104 im-widget clearfix">
                                                        <figure class="im-widget-thumb">
                                                            <a href="{{route('article.show', ['slug' => $post->slug])}}"
                                                               title="{{$post->title}}">
                                                                <img src="{{$post->pic}}"
                                                                     alt="{{$post->keyword}}"/>
                                                            </a>
                                                        </figure>
                                                        <div class="im-widget-entry">
                                                            <header class="im-widget-entry-header">
                                                                <h4 class='im-widget-entry-title'>
                                                                    <a
                                                                            href="{{route('article.show', ['slug' => $post->slug])}}"
                                                                            title='{{$post->title}}'>{{$post->title}}</a>
                                                                </h4>
                                                            </header>
                                                            <p class="im-widget-entry-footer">
                                                            <div class="iranomag-meta clearfix">
                                                                <div class="posted-on im-meta-item">
                                                                    <span class="entry-date published updated">{{$post->date}}</span>
                                                                </div>

                                                                <div class="comments-link im-meta-item">
                                                                    <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                </div>

                                                                <div class="author vcard im-meta-item">
                                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                                </div>

                                                                <div class="post-views im-meta-item">
                                                                    <i class="fa fa-eye"></i>{{$post->seen}}
                                                                </div>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </li>

                                                    @if($i == count($recentlyPosts) - 1)
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
                            @foreach($mostCommentPost as $post)
                                @if($i == 0)
                                    <article class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                        <div class="im-entry-thumb">

                                            <a class="im-entry-thumb-link"
                                               href="{{route('article.show', ['slug' => $post->slug])}}"
                                               title="{{$post->title}}">

                                                <img class="lazy-img"
                                                     data-src="{{$post->pic}}"
                                                     alt="{{$post->keyword}}"/>
                                            </a>
                                            <header class="im-entry-header">
                                                <div class="im-entry-category">
                                                    <div class="iranomag-meta clearfix">
                                                        <div class="cat-links im-meta-item">
                                                            {{--<a style="background-color: #666; color: #fff !important;" href="" title="{{$post->category}}">{{$post->category}}</a>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="im-entry-title">
                                                    <a style="color: #fff !important;"
                                                       href=""
                                                       rel="bookmark">{{$post->title}}</a>
                                                </h3>
                                            </header>
                                        </div>

                                        <div class="im-entry">
                                            <div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                    <span class="entry-date published updated">{{$post->date}}</span>
                                                </div>

                                                <div class="comments-link im-meta-item">
                                                    <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                </div>

                                                <div class="author vcard im-meta-item">
                                                    <i class="fa fa-user"></i>{{$post->username}}
                                                </div>

                                                <div class="post-views im-meta-item">
                                                    <i class="fa fa-eye"></i>{{$post->seen}}
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
                                                    <li class="widget-10104 im-widget clearfix">
                                                        <figure class="im-widget-thumb">
                                                            <a href="{{route('article.show', ['slug' => $post->slug])}}" title="{{$post->title}}">
                                                                <img src="{{$post->pic}}" alt="{{$post->keyword}}"/>
                                                            </a>
                                                        </figure>
                                                        <div class="im-widget-entry">
                                                            <header class="im-widget-entry-header">
                                                                <h4 class='im-widget-entry-title'>
                                                                    <a href="{{route('article.show', ['slug' => $post->slug])}}" title='{{$post->title}}'>{{$post->title}}</a>
                                                                </h4>
                                                            </header>
                                                            <div class="im-widget-entry-footer">
                                                                <div class="iranomag-meta clearfix">
                                                                    <div class="posted-on im-meta-item">
                                                                        <span class="entry-date published updated">{{$post->date}}</span>
                                                                    </div>
                                                                    <div class="comments-link im-meta-item">
                                                                        <i class="fa fa-comment-o"></i>{{$post->msgs}}
                                                                    </div>

                                                                    <div class="author vcard im-meta-item">
                                                                        <i class="fa fa-user"></i>{{$post->username}}
                                                                    </div>

                                                                    <div class="post-views im-meta-item">
                                                                        <i class="fa fa-eye"></i>{{$post->seen}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if($i == count($mostCommentPost) - 1)
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

                    <div id="samplePost" class="clearfix">
                        <div class="small-12 columns">
                            <article class="im-article content-column clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                                <div class="im-entry-thumb col-md-5 col-sm-12">
                                    <a class="im-entry-thumb-link"
                                       href="##url##"
                                       title="##title##">
                                        <img data-src="##pic##"
                                             src="##pic##"
                                             alt="##keyword##"/>
                                    </a>
                                </div>
                                <div class="im-entry col-md-7 col-sm-12">
                                    <header class="im-entry-header">
                                        <div class="im-entry-category">
                                            <div class="iranomag-meta clearfix">
                                                <div class="cat-links im-meta-item">
                                                    <a style="background-color: #666; color: #fff !important;" href="{{url('/article/list/category/')}}/##category##" title="##category##">##category##</a>
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
        </div>
    </div>

    <script type='text/javascript' src='{{URL::asset('js/article/mainArticle.js')}}'></script>

    <script>
        var page = 1;
        var _token = '{{csrf_token()}}';
        var getAllPostUrl = '{{route("article.pagination")}}';
        var getLisPostUrl = '{{route("article.list")}}';
        var totalPage = {{$pageLimit}};
        getAllPost(1);
    </script>

@endsection


