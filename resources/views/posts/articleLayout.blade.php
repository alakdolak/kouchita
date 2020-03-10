<!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    {{--<meta name="description" content="متن توضیحات متا"/>--}}
    {{--<meta name="keywords" content="کیورد 1, کیورد دو, کی ورد سه">--}}
    <meta property="og:locale" content="fa_IR" />
    {{--<meta property="og:locale:alternate" content="fa_IR" />--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=1')}}' data-rup='hr_north_star_v1'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/hotelDetail.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/article.min.css?v=1.2')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/article.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/abbreviations.css')}}"/>
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
    </style>
</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging rtl home page-template-default page page-id-119 group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

    @include('general.forAllPages')

    <div class="ui_backdrop dark" style="display: none; z-index: 10000000;"></div>

    <div class="header">

        <div class="hideOnPhone">
            @include('layouts.placeHeader')
        </div>

        <div class="hideOnScreen">
            @include('layouts.header1Phone')
        </div>

        @yield('body')

        @include('layouts.placeFooter')

    </div>

    <script>
        var category = {!! $category !!}

        $('.searchCityInArticleInput').on('click', function(){
            createSearchInput('searchCityInArticle', 'نام شهر را وارد کنید.');
        });

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
                                newElement += '<div onclick="goToCityFromArticle(\'' + response[i].stateName + '\', \'' + response[i].id + '\', 1)" style="padding: 10px 20px; cursor: pointer"><div class="icons location spIcons" style="display: inline"></div>' +
                                    '<p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px; display: inline;">استان ' + response[i].stateName + '</p></div>';
                            else
                                newElement += '<div onclick="goToCityFromArticle(\'' + response[i].cityName + '\', \'' + response[i].id + '\', 2)" style="padding: 10px 20px; cursor: pointer"><div class="icons location spIcons" style="display: inline"></div>' +
                                    '<p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px; display: inline;">شهر ' + response[i].cityName + '</p>' +
                                    '<p class="suggest cursor-pointer stateName" id="suggest_1">' + response[i].stateName + '</p></div>';
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

            window.location.href = '{{url("/article/list/")}}/' + kind + '/' + val;
        }

        function searchInArticle(id){
            var text = $('#'+id).val();
            if(text.trim().length != 0){
                window.location.href = getLisPostUrl + '/content/' + text;
            }
        }

        function searchInCategory(element){
            var text = $(element).text();
            if(text.trim().length != 0)
                window.location.href = getLisPostUrl + '/category/' + text;
        }

        function createCategoryList(){
            for(var i = 0; i < category.length; i++){
                var text = '<div class="gnColOFContentsCategory">\n' +
                    '<div>\n' +
                    '<div>\n' +
                    '<span class="gnTitleOfPlaces CategoryName_' + category[i]["id"] + '" onclick="searchInCategory(this)"  style="cursor: pointer">' + category[i]["name"] + '</span>\n' +
                    '<span class="gnNumberOfPlaces">' + category[i]["postCount"] + '</span>\n' +
                    '</div>\n';

                if(category[i]["subCategory"].length > 0)
                    text +='<ul class="gnUl">\n';

                for(var j = 0; j < category[i]["subCategory"].length; j++){
                    var sub = category[i]["subCategory"][j];
                    text += '<li class="gnLi">\n' +
                        '<span class="CategoryName_' + sub["id"] + '" onclick="searchInCategory(this)" style="cursor: pointer">' + sub["name"] + '</span>\n' +
                        '<span class="gnNumberOfPlaces">' + sub["postCount"] + '</span>\n' +
                        '</li>\n';
                }
                if(category[i]["subCategory"].length > 0)
                    text += '</ul>\n';

                text +='</div>\n' +
                    '</div>';

                if(i % 4 == 0 || i % 4 == 3)
                    $(".rightCategory").append(text);
                else
                    $(".leftCategory").append(text);
            }
        }

        $(window).ready(function () {
            createCategoryList();

            if(typeof post !== 'undefined') {
                for (var i = 0; i < post['category'].length; i++)
                    $('.CategoryName_' + post['category'][i]['categoryId']).css('color', '#4DC7BC');
            }
        });
    </script>

    <script type='text/javascript' src='{{URL::asset('js/article.js')}}'></script>

    <script type="text/javascript">
        jQuery('.lazy-img').unveil(300, function () {
            "use strict";
            jQuery(this).load(function () {
                this.style.opacity = 1;
            });
        });

        jQuery(".sticky-sidebar").stick_in_parent({offset_top: fixed_header_height});
    </script>

</body>

</html>


