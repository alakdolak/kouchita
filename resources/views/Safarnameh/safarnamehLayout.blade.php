<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <meta property="og:locale" content="fa_IR" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v='.$fileVersions)}}' data-rup='hr_north_star_v1'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/hotelDetail.css?v='.$fileVersions)}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v='.$fileVersions)}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/article.min.css?v='.$fileVersions)}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/article.css?v='.$fileVersions)}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/abbreviations.css?v='.$fileVersions)}}"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel='stylesheet' id='google-font-css' href='//fonts.googleapis.com/css?family=Dosis%3A200' type='text/css' media='all'/>

    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>

    @yield('head')

    <style>
        /*only this pages*/
        #openSearch{
            transform: rotate(0deg) !important;
        }
        .global-nav-green{
            padding: 10px 0px !important;
        }
        .global-nav-links-menu{
            margin: 0px !important;
        }
        .global-nav-bar-container{
            padding: 0px !important;
        }
        .im-meta-item{
            font-size: 9px !important;
        }
    </style>
</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging rtl home page-template-default page page-id-119 group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

    @include('general.forAllPages')

    <div class="ui_backdrop dark" style="display: none; z-index: 10000000;"></div>

    <div class="header">

        @include('layouts.header1')

        @yield('beforeBody')

        <div class="container" style="direction: rtl">
            <div class="col-lg-3 col-sm-3 hideOnPhone" style="padding-right: 0 !important; padding-left: 5px">

                <div class="col-md-12 gnWhiteBox">
                    <div class="widget-head widget-head-44" style="margin: 0px;">
                        <strong class="widget-title">دسته‌بندی مطالب</strong>
                        <div class="widget-head-bar"></div>
                        <div class="widget-head-line"></div>
                    </div>
                    <div class="gnContentsCategory">
                        <div class="row" style="width: 100%; margin: 0px;">
                            <div class="col-md-12 rightCategory" style="padding: 0px 5px;">
                                <a href="{{url('/safarnameh')}}" class="categoryRow">
                                    <div class="info">
                                        <div class="name" style="font-weight: bold;">صفحه اصلی</div>
                                    </div>
                                </a>
                                @foreach($category as $cat)
                                    <div class="categoryRow" onclick="location.href = '{{url('/safarnameh/list/category/'.$cat->name)}}'">
                                        <div class="info name">{{$cat->name}}</div>
                                        @if(count($cat->subCategory) > 0)
                                            <div class="next leftArrowIcon"></div>
                                        @endif

                                        @if(count($cat->subCategory) > 0)
                                            <div class="subMenus">
                                                <div class="right">
                                                    @for($i = 0; $i < count($cat->subCategory); $i+=2)
                                                        <a href="{{url('/safarnameh/list/category/'.$cat->subCategory[$i]->name)}}" class="subRow">{{$cat->subCategory[$i]->name}}</a>
                                                    @endfor
                                                </div>
                                                <div class="left">
                                                    @for($i = 1; $i < count($cat->subCategory); $i+=2)
                                                        <a href="{{url('/safarnameh/list/category/'.$cat->subCategory[$i]->name)}}" class="subRow">{{$cat->subCategory[$i]->name}}</a>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 gnWhiteBox sideSafarnamehSearch">
                    <div class="header">
                        <div class="title">جستجو بر اساس</div>
                        <div class="tab selected" onclick="changeSearchMethod(this, 'place')">مکان</div>
                        <div class="tab" onclick="changeSearchMethod(this, 'content')">عبارت</div>
                    </div>
                    <div class="inputs">
                        <input type="text"
                               id="safarnamehPlaceSearch"
                               class="searchInputElems searchCityInArticleInput"
                               placeholder="نام محل را وارد نمایید"
                               readonly>
                        <div id="safarnamehContentSearch" style="display: none; background-color: #f2f2f2; position: relative; margin-top: 10px;">
                            <input type="text"
                                   id="searchInputSafarnameh"
                                   class="searchInputElems"
                                   placeholder="عبارت مورد نظر را وارد نمایید"
                                    style="margin: 0px;">
                            <button class="iconFamily searchIcon" onclick="searchInArticle('searchInputSafarnameh')"></button>

                        </div>
                    </div>
                </div>

                @if(isset($similarSafarnameh))
                    @foreach($similarSafarnameh as $item)
                        <div class="col-md-12 gnWhiteBox">
                            <div class="content-2col">
                                <div class="im-entry-thumb" style="background-image: url('{{$item->pic}}'); background-size: 100% 100%;">
                                    <div class="im-entry-header im-entry-header_rightSide">
                                        <div class="im-entry-category">
                                            <div class="iranomag-meta clearfix">
                                                <div class="cat-links im-meta-item">
                                                    <a class="im-catlink-color-2079" href="{{route('safarnameh.list', ['type' => 'category', 'search' => $item->category])}}">{{$item->category}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{$item->url}}" rel="bookmark">
                                            <h6 class="im-entry-title im-entry-title_rightSide">{{$item->title}}</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="im-entry">
                                    <div class="im-entry-footer">
                                        <div class="iranomag-meta clearfix">
                                            <div class="posted-on im-meta-item">
                                                <span class="entry-date published updated">{{$safarnameh->date}}</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="col-lg-9 col-sm-9 pd-0" >
                @yield('body')
            </div>
        </div>


        @include('layouts.placeFooter')

    </div>

    @yield('script')

    <script>
        var category = {!! $category !!}

        $('.searchCityInArticleInput').on('click', () => createSearchInput('searchCityInArticle', 'نام شهر را وارد کنید.'));

        function changeSearchMethod(_element, _kind){
            $(_element).parent().find('.selected').removeClass('selected');
            $(_element).addClass('selected');
            if(_kind == 'place'){
                $('#safarnamehPlaceSearch').show();
                $('#safarnamehContentSearch').hide();
            }
            else{
                $('#safarnamehPlaceSearch').hide();
                $('#safarnamehContentSearch').show();
            }
        }

        function searchCityInArticle(_element) {
            activeCityFilter = false;
            var value = _element.value;

            if(value.trim().length > 1){
                $.ajax({
                    type: 'post',
                    url:  "{{route('searchForCity')}}",
                    data: {
                        'key':  value,
                        'state': 1
                    },
                    success: function (response) {

                        $("#resultCity").empty();

                        if(response.length == 0)
                            return;

                        response = JSON.parse(response);

                        var newElement = "";

                        for(i = 0; i < response.length; i++) {
                            if(response[i]['kind'] == 'state')
                                newElement += '<div onclick="goToCityFromArticle(\'' + response[i].stateName + '\', \'' + response[i].id + '\', 1)" class="articleCityResultRow">' +
                                                '<div class="icons location spIcons" style="display: inline"></div>' +
                                                '<p class="suggest cursor-pointer font-weight-700" style="margin: 0px; display: inline;">استان ' + response[i].stateName + '</p>' +
                                              '</div>';
                            else
                                newElement += '<div onclick="goToCityFromArticle(\'' + response[i].cityName + '\', \'' + response[i].id + '\', 2)" class="articleCityResultRow">' +
                                                '<div class="icons location spIcons" style="display: inline"></div>' +
                                                '<p class="suggest cursor-pointer font-weight-700" style="margin: 0px; display: inline;">شهر ' + response[i].cityName + '</p>' +
                                                '<p class="suggest cursor-pointer stateName">' + response[i].stateName + '</p>' +
                                              '</div>';
                        }
                        setResultToGlobalSearch(newElement);
                    }
                });
            }
            else
                clearGlobalResult();
        }

        function goToCityFromArticle(val, id, kind) {
            if(kind == 2)
                kind = 'city';
            else
                kind = 'state';

            window.location.href = '{{url("/safarnameh/list/")}}/' + kind + '/' + val;
        }

        function searchInArticle(id){
            var text = $(`#${id}`).val();
            if(text.trim().length != 0)
                window.location.href = '{{url("/safarnameh/list")}}' + '/content/' + text;
        }
    </script>

</body>

</html>


