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

            <div id="mainListBodyPc" class="clearfix hideOnPhone"></div>
            <div id="mainListBodyMobile" class="clearfix hideOnScreen"></div>

            <div id="loaderFloor" style="height: 1px; width: 100%;"></div>

            <div id="emptyList" class="emptyListSafarnameh hidden">
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
    <div id="safarnamehRowCardMobile" class="hidden">
        <div class="rowSafarnamehCard">
            <div class="imgSec">
                <a href="##url##" class="safarPic">
                    <img src="##pic##" alt="##title##" class="resizeImgClass" onload="fitThisImg(this)">
                </a>
                <div class="userInfos">
                    <img src="##writerPic##" alt="userPicture" style="height: 100%;">
                </div>
                <div class="icon ##bookmark##" onclick="bookMarkSafarnameh(##id##, this)"></div>
            </div>
            <a href="##url##" class="content">
                <div class="title">##title##</div>
                <div class="summery">##summery##</div>
            </a>
        </div>
    </div>

    <div id="pcSafarnamehRowCard" class="hidden">
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


    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>
@endsection

@section('script')

    <script>
        var mobileListSample = $('#safarnamehRowCardMobile').html();
        var mobileRowListPlaceHolderSample = $('#safarnamehRowCardPlaceHolderMobile').html();
        var pcRowListPlaceHolderSample = $('#safarnamehRowCardPlaceHolderPC').html();
        var pcRowListSample = $('#pcSafarnamehRowCard').html();

        $('#pcSafarnamehRowCard').remove();
        $('#safarnamehRowCardPlaceHolderPC').remove();
        $('#safarnamehRowCardPlaceHolderMobile').remove();
        $('#safarnamehRowCardMobile').empty();
    </script>

    <script>
        var inAjaxSafarnameh = false;
        var takeSafarnameh = 5;
        var nowPageTaken = 1;
        var type = '{{$type}}';
        var search = '{{$search}}';

        function getSafarnamehList(page){
            if(!inAjaxSafarnameh) {
                inAjaxSafarnameh = true;
                createPlaceHolderSafarnameh(5);
                $.ajax({
                    timeout: 5000,
                    type: 'GET',
                    url: `{{route("safarnameh.list.pagination")}}?page=${page}&take=${takeSafarnameh}&type=${type}&search=${search}`,
                    success: response => {
                        if (response.status == 'ok') createSafarnamehRow(response.result);
                    },
                    error: (error, status) => {
                        if(status == "timeout") getSafarnamehList(page);
                    }
                });
            }
        }

        function createSafarnamehRow(_safarnameh){
            $('#mainListBodyPc').find('.placeHolderCard').remove();
            $('#mainListBodyMobile').find('.placeHolderCard').remove();

            _safarnameh.map(item => {
                var text = pcRowListSample;
                var mobile = mobileListSample;

                for (var x of Object.keys(item)) {
                    text = text.replace(new RegExp(`##${x}##`, "g"), item[x]);
                    mobile = mobile.replace(new RegExp(`##${x}##`, "g"), item[x]);
                }

                mobile = mobile.replace(new RegExp("##bookmark##", "g"), item.bookMark ? 'BookMarkIcon' : 'BookMarkIconEmpty');

                $('#mainListBodyPc').append(text);
                $('#mainListBodyMobile').append(mobile);
            });

            if(nowPageTaken == 1 && _safarnameh.length == 0)
                $('#emptyList').removeClass('hidden');

            if(_safarnameh.length == takeSafarnameh) {
                nowPageTaken++;
                inAjaxSafarnameh = false;

                var stayToLoad;
                if($(window).width() <= 767)
                    stayToLoad = document.getElementById('loaderFloor').getBoundingClientRect().top - 150;
                else
                    stayToLoad = document.getElementById('loaderFloor').getBoundingClientRect().top - 400;
                stayToLoad -= $(window).height();
                if(stayToLoad <= 0)
                    getSafarnamehList(nowPageTaken);
            }
        }

        function createPlaceHolderSafarnameh(_number){
            var pc = '';
            var mobile = '';

            for(var i = 0; i < _number; i++){
                mobile += mobileRowListPlaceHolderSample;
                pc += pcRowListPlaceHolderSample;
            }

            $('#mainListBodyPc').append(pc);
            $('#mainListBodyMobile').append(mobile);
        }

        $(window).on('scroll', e => {
            var stayToLoad;
            if($(window).width() <= 767)
                stayToLoad = document.getElementById('loaderFloor').getBoundingClientRect().top - 150;
            else
                stayToLoad = document.getElementById('loaderFloor').getBoundingClientRect().top - 400;

            stayToLoad -= $(window).height();
            if(stayToLoad <= 0 && !inAjaxSafarnameh){
                getSafarnamehList(nowPageTaken);
            }
        });

        $(window).ready(() => {
            getSafarnamehList(nowPageTaken);
        });
    </script>
@endsection
