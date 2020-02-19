@extends('posts.articleLayout')

@section('head')
    <title>لیست مقالات</title>
@endsection

@section('body')

    <div class="container" style="direction: rtl">
        <div class="col-md-3 col-sm-12 hideOnPhone" style="padding-right: 0 !important;">
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
                    <input type="text" class="gnInputonInput" id="pcSearchInput" placeholder="عبارت مورد نظر خود را">
                    <button class="gnSearchInputBtn" type="submit" onclick="searchInArticle('pcSearchInput')">جستجو کنید</button>
                </div>
            </div>

            <div class="col-md-12 gnWhiteBox gnAdvertise">
                <div class="gnAdvertiseText">تبلیغات</div>
                <div>
                    <img class="gnAdvertiseImage" src="{{URL::asset('images/adv2.jpg')}}" alt="">
                </div>
            </div>
        </div>

        <div class="col-md-9 col-sm-12" style="padding-left: 0 !important;">
            <div class="col-md-12 gnWhiteBox" style="padding: 15px;">
                <div class="row im-blog">

                    <div id="samplePost" class="clearfix">
                        <div class="small-12 columns">
                            <article class="im-article content-column clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                                <div class="im-entry-thumb col-md-5 col-sm-12">
                                    <a style="width: 303px !important;"
                                       class="im-entry-thumb-link"
                                       href="##url##"
                                       title="##title##">
                                        <img style="width: 303px !important; height: 189px !important;"
                                             data-src="##pic##"
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
                <div class="gap cf height-30"></div>
            </div>
        </div>

    </div>

    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>

    <script type='text/javascript' src='{{URL::asset('js/article/searchArticle.js')}}'></script>

    <script>
        var page = 1;
        var type = '{{$type}}';
        var search = '{{$search}}';
        var _token = '{{csrf_token()}}';
        var getPostUrl = '{{route("article.list.pagination")}}';
        var getLisPostUrl = '{{route("article.list")}}';
        var totalPage = {{$pageLimit}};
        getPost(1);
    </script>

@endsection
