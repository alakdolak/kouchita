@extends('Safarnameh.safarnamehLayout')

@section('head')
    <title>لیست سفرنامه ها</title>

    <style>
        @media (max-width: 768px){
            .gnWhiteBox {
                margin: 0 -15px;
            }
        }
    </style>
@endsection

@section('body')
    <div class="col-md-12 gnWhiteBox" style="padding: 15px;">
        <div class="row im-blog">
            <div class="row headerList">
                <span style="font-weight: bold">سفرنامه های </span>
                <span>{{$headerList}}</span>
            </div>

            <div id="samplePost" class="clearfix" style="display: none;">
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
                                            <a style="background-color: #666; color: #fff !important;" href="{{url('/safarnameh/list/category/')}}/##category##" title="##category##">##category##</a>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="im-entry-title">
                                    <a href="##url##" rel="bookmark">##title##</a>
                                </h3>
                            </header>

                            <div style="max-height: 100px !important; overflow: hidden" class="im-entry-content">
                                <p>##summery##</p>
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

            <div id="placeHolderList" class="placeHolder">
                <div class="small-12 columns">
                    <article class="row" style="margin: 0px; width: 100%; margin-bottom: 10px">
                        <div class="col-md-5 col-sm-12">
                            <div class="im-entry-thumb-link placeHolderAnime imgPlaceHolder" style="height: 200px"></div>
                        </div>
                        <div class="col-md-7 col-sm-12 listContentPlaceHolder">
                            <div class="placeHolderAnime resultLineAnim header"></div>
                            <div class="placeHolderAnime resultLineAnim summery" style="width: 90%"></div>
                            <div class="placeHolderAnime resultLineAnim summery" style="width: 80%"></div>
                            <div class="placeHolderAnime resultLineAnim summery" style="width: 85%"></div>
                        </div>
                    </article>
                    <article class="row" style="margin: 0px; width: 100%; margin-bottom: 10px">
                        <div class="col-md-5 col-sm-12">
                            <div class="im-entry-thumb-link placeHolderAnime imgPlaceHolder" style="height: 200px"></div>
                        </div>
                        <div class="col-md-7 col-sm-12 listContentPlaceHolder">
                            <div class="placeHolderAnime resultLineAnim header"></div>
                            <div class="placeHolderAnime resultLineAnim summery" style="width: 90%"></div>
                            <div class="placeHolderAnime resultLineAnim summery" style="width: 80%"></div>
                            <div class="placeHolderAnime resultLineAnim summery" style="width: 85%"></div>
                        </div>
                    </article>
                </div>
            </div>

            <div id="emptyList" class="emptyListSafarnameh" style="display: none">
                <div class="row emptyRow">
                    <div class="pic">
                        <img src="{{URL::asset('images/mainPics/notElemList.png')}}" style="width: 100px;">
                    </div>
                    <div class="text">
                        هیچ سفرنامه ای با این موضوع یافت نشد.
                    </div>
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

    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>
@endsection

@section('script')
    <script async type='text/javascript' src='{{URL::asset('js/article/searchArticle.js')}}'></script>

    <script>
        var page = 1;
        var type = '{{$type}}';
        var search = '{{$search}}';
        var _token = '{{csrf_token()}}';
        var getPostUrl = '{{route("safarnameh.list.pagination")}}';
        var getLisPostUrl = '{{route("safarnameh.list")}}';
        var totalPage = {{$pageLimit}};

        if(allPostSample == 0)
            allPostSample = $('#samplePost').html();

        $('#samplePost').empty();
        getPost(1);
    </script>
@endsection
