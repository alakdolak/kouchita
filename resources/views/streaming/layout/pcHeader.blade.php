<link rel="stylesheet" href="{{URL::asset('css/streaming/header.css')}}">

<?php
    if(auth()->check())
        $user = auth()->user();
?>

<style>

</style>

<nav>
    <div class="headerLogo">
        <a href="{{route('streaming.index')}}" class="global-nav-logo" style="display: flex; align-items: center; height: 100%; padding: 7px 0px;">
            <img src="{{URL::asset('images/streaming/vodLobo.png')}}" alt="کوچیتا" style="width: auto; height: 100%;"/>
        </a>
    </div>

    <div class="headerTab">
        <div class="headerNavTitle">
            <img src="{{URL::asset('images/streaming/anten.png')}}" class="antenIcon1">
            نمایش زنده
        </div>
        <div class="headerNavTitle headerNavTitleActive" onclick="openCategoryMenu()">دسته بندی ها</div>
        <div class="headerNavTitle">فراخوان</div>
        <div class="headerNavTitle">همکاری با ما</div>
        <div class="headerNavTitle">جستجو</div>
    </div>

    <div class="headerLeftSection">
        <div class="loginButton" onclick="goToUpload()" style="padding-left: 5px; margin-left: 10px">
            <div>بارگذاری محتوا</div>
            <div class="addIcon">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
        </div>
        @if(auth()->check())
            <div class="loginButton bookMarkHeaderIcon"></div>
            <div class="loginButton userNameHeader" style="padding-left: 10px">
                <div style="z-index: 9">
                    {{auth()->user()->username}}
                </div>
                <div class="userHeaderIcon"></div>
                <div class="userHeaderMenu">
                    <a href="{{URL('profile')}}" class="userHeaderMenuTab">
                        صفحه ی کاربری
                    </a>
                    <a href="{{route('logout')}}" class="userHeaderMenuTab">
                        خروج
                    </a>
                </div>
            </div>
        @else
            <a class="login-button loginButton" title="Join">ورود / ثبت نام</a>
        @endif
    </div>

    <div class="headerRightSection" onclick="showHideMenu()">
        <div class="headerLine headerLine1"></div>
        <div class="headerLine headerLine2"></div>
        <div class="headerLine headerLine3"></div>
    </div>

    <div class="headerRightTabs">
        <div class="headerNavTitle">
            <img src="{{URL::asset('images/streaming/anten.png')}}" class="antenIcon1">
            نمایش زنده
        </div>
        <div class="headerNavTitle headerNavTitleActive" onclick="openCategoryMenu()">دسته بندی ها</div>
        <div class="headerNavTitle">فراخوان</div>
        <div class="headerNavTitle">همکاری با ما</div>
        <div class="headerNavTitle">جستجو</div>
    </div>

</nav>

<div class="categoryBackBody">
    <div class="categoryBody">
        <div class="row" style="height: 100%; padding: 10px; padding-right: 0px; position: relative">

            <div class="ui_close_x closeCategoryBodyDiv" onclick="closeCategoryMenu()">
                بستن
            </div>

            <div class="col-lg-10 col-md-8 categoryBodySection categoryBodySectionRight showCategoryBodySectionRight">
                <div class="categoryMainHeader" style="padding-right: 0;">
                    انتخاب کنید
                    <span id="categoryHeaderName" class="categoryHeaderName"></span>
                </div>
                <div class=" closeCategoryBodyDiv backCategory" onclick="backCategoryMenu()">
                    <div class="backArrow"></div>
                    بازگشت
                </div>

                @foreach($vodCategory as $mainCat)
                    <div id="subCategoryMenu_{{$mainCat->id}}" class="subCategoryBody">
                        @foreach($mainCat->sub as $item)
                            <div class="subCategoryDiv">
                                <img src="{{$item->offIcon}}" class="categoryIcon offIcon">
                                <img src="{{$item->onIcon}}" class="categoryIcon onIcon">
                                <div class="subCategoryName">
                                    {{$item->name}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="col-lg-2 col-md-4 categoryBodySection categoryBodySectionLeft">
                <div class="categoryMainHeader">
                    دسته بندی های موجود
                </div>

                @foreach($vodCategory as $mainCat)
                    <div class="categoryTabs" onclick="openSubCategoryMenuTab({{$mainCat->id}}, this)">
                        <div class="categoryTabName">
                            {{$mainCat->name}}
                        </div>
                        <div class="categoryLeftArrow"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    var getBookMarksPath = '{{route('getBookMarks')}}';

    function showHideMenu(){
        $('.headerLine').toggleClass('change');
        $('.headerRightSection').toggleClass('change');
        $('.headerRightTabs').toggleClass('change');
    }

    function openCategoryMenu(){
        $('.categoryBodySectionRight').addClass('showCategoryBodySectionRight');
        $('.categoryBodySectionLeft').removeClass('showCategoryBodySectionRight');
        $('.categoryBackBody').css('display', 'flex');
    }
    function backCategoryMenu(){
        $('.categoryBodySectionRight').addClass('showCategoryBodySectionRight');
        $('.categoryBodySectionLeft').removeClass('showCategoryBodySectionRight');
    }
    function closeCategoryMenu(){
        $('.categoryBackBody').css('display', 'none');
    }

    function openSubCategoryMenuTab(_id, _element){
        $('.categoryBodySectionRight').removeClass('showCategoryBodySectionRight');
        $('.categoryBodySectionLeft').addClass('showCategoryBodySectionRight');
        $('.subCategoryBody').css('display', 'none');
        $('#subCategoryMenu_' + _id).css('display', 'flex');
        $('.categoryTabsActive').removeClass('categoryTabsActive');
        $(_element).addClass('categoryTabsActive');

        let name = $($(_element).children()[0]).text();
        $('#categoryHeaderName').text(name)
    }


    function hideAllTopNavs(){
        $("#alert").hide();
        $("#my-trips-not").hide();
        $("#profile-drop").hide();
        $("#bookmarkmenu").hide();
    }

    hideAllTopNavs();

    $(document).ready(function(){

        $(".menu-bars").click(function(){
            $("#menu_res").removeClass('off-canvas');
        });

        $("#close_menu_res").click(function(){

            $("#menu_res").addClass('off-canvas');
        });
    });

    function headerActionsToggle() {

        $('.collapseBtnActions').animate({transform: 'rotate(90deg)'})


        if($('.global-nav-actions').hasClass('display-flexImp')) {

            $('.global-nav-actions').animate({width: "0"},
                function () {
                    $('.global-nav-actions').toggleClass('display-flexImp');
                });
        }
        else {
            $('.global-nav-actions').animate({width: "270px"});
            $('.global-nav-actions').toggleClass('display-flexImp');
        }
    }

    function goToUpload() {
        if (!hasLogin) {
            showLoginPrompt();
            return;
        }
        location.href = "{{route('streaming.uploadPage')}}";
    }

</script>

@if(Auth::check())
    <script>
        var locked = false;
        var superAccess = false;
        var getRecentlyPath = '{{route('recentlyViewed')}}';


        $('#nameTop').click(function(e) {

            if( $("#profile-drop").is(":hidden")) {
                hideAllTopNavs();
                $("#profile-drop").show();
            }
            else
                hideAllTopNavs();
        });

        $('#memberTop').click(function(e) {
            if( $("#profile-drop").is(":hidden")) {
                hideAllTopNavs();
                $("#profile-drop").show();
            }
            else
                hideAllTopNavs();
        });

        $('#bookmarkicon').click(function(e) {
            if( $("#bookmarkmenu").is(":hidden")){
                hideAllTopNavs();
                $("#bookmarkmenu").show();
                showBookMarks('bookMarksDiv');
            }
            else
                hideAllTopNavs();
        });

        $('.notification-bell').click(function(e) {
            if( $("#alert").is(":hidden")) {
                hideAllTopNavs();
                $("#alert").show();
            }
            else
                hideAllTopNavs();
        });

        $("#Settings").on({
            mouseenter: function () {
                $(".settingsDropDown").show()
            }, mouseleave: function () {
                $(".settingsDropDown").hide()
            }
        });

        function showBookMarks(containerId) {

            $("#" + containerId).empty();

            $.ajax({
                type: 'post',
                url: getBookMarksPath,
                success: function (response) {

                    response = JSON.parse(response);

                    for(i = 0; i < response.length; i++) {
                        element = "<div>";
                        element += "<a class='masthead-recent-card' target='_self' href='" + response[i].placeRedirect + "'>";
                        element += "<div class='media-left'>";
                        element += "<div class='thumbnail' style='background-image: url(" + response[i].placePic + ");'></div>";
                        element += "</div>";
                        element += "<div class='content-right'>";
                        element += "<div class='poi-title'>" + response[i].placeName + "</div>";
                        element += "<div class='rating'>";
                        element += "<div class='ui_bubble_rating bubble_45'></div><br/>" + response[i].placeReviews + " مشاهده ";
                        element += "</div>";
                        element += "<div class='geo'>" + response[i].placeCity + "</div>";
                        element += "</div>";
                        element += "</a></div>";

                        $("#" + containerId).append(element);
                    }

                }
            });
        }

        function getRecentlyViews(containerId) {
            $("#" + containerId).empty();

            $.ajax({
                type: 'post',
                url: getRecentlyPath,
                success: function (response) {

                    response = JSON.parse(response);

                    for(i = 0; i < response.length; i++) {
                        element = "<div>";
                        element += "<a class='masthead-recent-card' style='text-align: right !important;' target='_self' href='" + response[i].placeRedirect + "'>";
                        element += "<div class='media-left' style='padding: 0 12px !important; margin: 0 !important;'>";
                        element += "<div class='thumbnail' style='background-image: url(" + response[i].placePic + ");'></div>";
                        element += "</div>";
                        element += "<div class='content-right'>";
                        element += "<div class='poi-title'>" + response[i].placeName + "</div>";
                        element += "<div class='rating'>";

                        if (response[i].placeRate == 5)
                            element += "<div class='ui_bubble_rating bubble_50'></div>";
                        else if (response[i].placeRate == 4)
                            element += "<div class='ui_bubble_rating bubble_40'></div>";
                        else if (response[i].placeRate == 3)
                            element += "<div class='ui_bubble_rating bubble_30'></div>";
                        else if (response[i].placeRate == 2)
                            element += "<div class='ui_bubble_rating bubble_20'></div>";
                        else
                            element += "<div class='ui_bubble_rating bubble_10'></div>";

                        element += "<br/>" + response[i].placeReviews + " نقد ";
                        element += "</div>";
                        element += "<div class='geo'>" + response[i].placeCity + "/ " + response[i].placeState + "</div>";
                        element += "</div>";
                        element += "</a></div>";

                        $("#" + containerId).append(element);
                    }

                }
            });
        }

        function showRecentlyViews(element) {
            if( $("#my-trips-not").is(":hidden")){
                hideAllTopNavs();
                $("#my-trips-not").show();
                getRecentlyViews(element);
            }
            else
                hideAllTopNavs();
        }


    </script>
@endif