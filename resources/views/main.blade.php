<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.topHeader')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    {{--<meta name="description" content="متن توضیحات متا"/>--}}
    {{--<meta name="keywords" content="کیورد 1, کیورد دو, کی ورد سه">--}}
    <meta property="og:locale" content="fa_IR" />
    {{--<meta property="og:locale:alternate" content="fa_IR" />--}}
    <meta property="og:type" content="website" />
    <title> کوچیتا، سامانه جامع گردشگری ایران </title>
    <meta name="title" content="کوچیتا | سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران" />
    <meta name='description' content='کوچیتا، سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران. اطلاعات اماکن و جاذبه ها، هتل ها، بوم گردی، ماجراجویی، آموزش سفر، فروشگاه صنایع دستی ، پادکست سفر' />
    <meta name='keywords' content='کوچیتا، هتل، تور ، سفر ارزان، سفر در ایران، بلیط، تریپ، نقد و بررسی، سفرنامه، کمپینگ، ایران گردی، آموزش سفر، مجله گردشگری، مسافرت، مسافرت داخلی, ارزانترین قیمت هتل ، مقایسه قیمت ، بهترین رستوران ها ، بلیط ارزان ، تقویم تعطیلات' />
    <meta property="og:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:secure_url" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:width" content="550"/>
    <meta property="og:image:height" content="367"/>
    <meta name="twitter:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>


    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>

    <script src="{{URL::asset('js/main/middleBanner.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.9.7/TweenMax.min.js"></script>

    <style>
        .mainBannerSlider {
            position: absolute;
            top: 0;
            width: 100%;
            height: 450px;
            margin-bottom: 40px;
        }

        .eachPicOfSlider {
            width: 100%;
        }

        .textInSlideMain {
            position: absolute;
            left: 0px;
            bottom: 0px;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.6) 0%, transparent 70%);
        }

        .textInSlide {
            position: absolute;
            left: 10px;
            bottom: 10px;
            padding: 30px;
            font-size: 20px;
        }

        .stateName {
            font-size: 12px;
            padding-right: 21px;
        }
    </style>

    {{--urls--}}
    <script>
        var searchDir = '{{route('totalSearch')}}';
        var kindPlaceId = '{{$kindPlaceId}}';
        var recentlyUrl =  '{{route("recentlyViewed")}}';
        var getMainPageSuggestion =  '{{route("getMainPageSuggestion")}}';
        var imageBasePath = '{{URL::asset('images')}}';
        var getCitiesDir = "{{route('getCitiesDir')}}";
        var url;

        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        };
    </script>

</head>

<body class="rebrand_2017 desktop HomeRebranded  js_logging" ng-app="mainApp" style="background-color: #EAFBFF;">

    @include('general.forAllPages')

    <div class="header hideOnPhone">
        @include('layouts.header1')
    </div>

    <div class="hideOnScreen">
        @include('layouts.header1Phone')
    </div>

{{--        <div class="page" ng-app="mainApp">--}}
    <div class="ppr_rup ppr_priv_homepage_hero ">
        <div id="homeHero-id" class="homeHero default_home">
            <div class="ui_container container" id="mainDivContainerMainPage">
                <div class="placement_wrap">
                    <div class="placement_wrap_row">
                        <div class="placement_wrap_cell">
                            {{--<div id="sliderBarDIV" class="ppr_rup ppr_priv_trip_search hideOnPhone">--}}
                            <div class="ppr_rup ppr_priv_trip_search mainBannerSlider">
                                <!-- Swiper -->
                                <div id="mainSlider" class="swiper-container">
                                    <div class="swiper-wrapper">
                                        {{--@foreach($sliderPic as $item)--}}
                                            {{--<div class="swiper-slide mobileHeight" style="position: relative">--}}
                                                {{--<img class="eachPicOfSlider" src="{{URL::asset('_images/sliderPic/' . $item->pic)}}" alt="{{$item->alt}}">--}}
                                                {{--@if($item->text != null && $item->text != '')--}}
                                                    {{--<div class="textInSlide" style="background-color: {{$item->textBackground}}; color: {{$item->textColor}};">--}}
                                                        {{--{{$item->text}}--}}
                                                    {{--</div>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}


                                        <div class="swiper-slide mobileHeight" style="position: relative; background-color: #d8a7b1">
                                            <img src="{{URL::asset('images/icons/p1.png')}}" style="height: 100%; position: absolute; left: 0px;">
                                            <div class="textInSlide">
                                                hello world
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="ui_columns datepicker_box trip_search metaDatePicker rounded_lockup usePickerTypeIcons preDates noDates with_children mainDivSearchInputMainPage">
                                    <div id="searchDivForScroll" class="prw_rup prw_search_typeahead ui_column is-4 search_typeahead wctx-tripsearch searchDivForScrollClass mainSearchDivPcSize">
                                        @if($kindPlaceId == 0)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">به کجا می‌روید؟</div>
                                        @elseif($kindPlaceId == 1)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام جاذبه را می‌خواهید تجربه کنید؟</div>
                                        @elseif($kindPlaceId == 3)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">در کدام رستوران دوست دارید غذا بخورید؟</div>
                                        @elseif($kindPlaceId == 4)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">در کدام هتل دوست دارید اقامت کنید؟</div>
                                        @elseif($kindPlaceId == 6)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام ماجرا را می‌خواهید تجربه کنید؟</div>
                                        @elseif($kindPlaceId == 10)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام صنایع دستی را دوست دارید بشناسید؟</div>
                                        @elseif($kindPlaceId == 11)
                                            <div onclick="$('#searchPane').removeClass('hidden');  $('#darkModeMainPage').toggle(); $('#placeName').focus();">کدام غذای محلی را می‌خواهید تجربه کنید؟</div>
                                        @endif
                                    </div>

                                    {{--<div id="container" style="width: 40%;">--}}
                                        {{--<div id="message">--}}
                                            {{--<a id="animate" href="#">Transmit</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<script>--}}
                                        {{--var $animate, $container, $message, $paragraph, MESSAGES, animate, initialise, scramble;--}}

                                        {{--MESSAGES = [];--}}

                                        {{--MESSAGES.push({--}}
                                            {{--delay: 0,--}}
                                            {{--text: "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت"--}}
                                        {{--});--}}

                                        {{--MESSAGES.push({--}}
                                            {{--delay: 1200,--}}
                                            {{--text: " و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که"--}}
                                        {{--});--}}

                                        {{--MESSAGES.push({--}}
                                            {{--delay: 2200,--}}
                                            {{--text: " و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که"--}}
                                        {{--});--}}

                                        {{--MESSAGES.push({--}}
                                            {{--delay: 3600,--}}
                                            {{--text: " و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که"--}}
                                        {{--});--}}

                                        {{--MESSAGES.push({--}}
                                            {{--delay: 5200,--}}
                                            {{--text: " و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که"--}}
                                        {{--});--}}

                                        {{--$container = $("#container");--}}

                                        {{--$message = $("#message");--}}

                                        {{--$animate = $("#animate");--}}

                                        {{--$paragraph = null;--}}

                                        {{--scramble = function(element, text, options) {--}}
                                            {{--var $element, addGlitch, character, defaults, ghostCharacter, ghostCharacters, ghostLength, ghostText, ghosts, glitchCharacter, glitchCharacters, glitchIndex, glitchLength, glitchProbability, glitchText, glitches, i, j, k, letter, object, order, output, parameters, ref, results, settings, shuffle, target, textCharacters, textLength, wrap;--}}
                                            {{--defaults = {--}}
                                                {{--probability: 0.2,--}}
                                                {{--glitches: '-|/\\',--}}
                                                {{--blank: '',--}}
                                                {{--duration: text.length * 40,--}}
                                                {{--ease: 'easeInOutQuad',--}}
                                                {{--delay: 0.0--}}
                                            {{--};--}}
                                            {{--$element = $(element);--}}
                                            {{--settings = $.extend(defaults, options);--}}
                                            {{--shuffle = function() {--}}
                                                {{--if (Math.random() < 0.5) {--}}
                                                    {{--return 1;--}}
                                                {{--} else {--}}
                                                    {{--return -1;--}}
                                                {{--}--}}
                                            {{--};--}}
                                            {{--wrap = function(text, classes) {--}}
                                                {{--return "<span class=\"" + classes + "\">" + text + "</span>";--}}
                                            {{--};--}}
                                            {{--glitchText = settings.glitches;--}}
                                            {{--glitchCharacters = glitchText.split('');--}}
                                            {{--glitchLength = glitchCharacters.length;--}}
                                            {{--glitchProbability = settings.probability;--}}
                                            {{--glitches = (function() {--}}
                                                {{--var j, len, results;--}}
                                                {{--results = [];--}}
                                                {{--for (j = 0, len = glitchCharacters.length; j < len; j++) {--}}
                                                    {{--letter = glitchCharacters[j];--}}
                                                    {{--results.push(wrap(letter, 'glitch'));--}}
                                                {{--}--}}
                                                {{--return results;--}}
                                            {{--})();--}}
                                            {{--ghostText = $element.text();--}}
                                            {{--ghostCharacters = ghostText.split('');--}}
                                            {{--ghostLength = ghostCharacters.length;--}}
                                            {{--ghosts = (function() {--}}
                                                {{--var j, len, results;--}}
                                                {{--results = [];--}}
                                                {{--for (j = 0, len = ghostCharacters.length; j < len; j++) {--}}
                                                    {{--letter = ghostCharacters[j];--}}
                                                    {{--results.push(wrap(letter, 'ghost'));--}}
                                                {{--}--}}
                                                {{--return results;--}}
                                            {{--})();--}}
                                            {{--textCharacters = text.split('');--}}
                                            {{--textLength = textCharacters.length;--}}
                                            {{--order = (function() {--}}
                                                {{--results = [];--}}
                                                {{--for (var j = 0; 0 <= textLength ? j < textLength : j > textLength; 0 <= textLength ? j++ : j--){ results.push(j); }--}}
                                                {{--return results;--}}
                                            {{--}).apply(this).sort(this.shuffle);--}}
                                            {{--output = [];--}}
                                            {{--for (i = k = 0, ref = textLength; 0 <= ref ? k < ref : k > ref; i = 0 <= ref ? ++k : --k) {--}}
                                                {{--glitchIndex = Math.floor(Math.random() * (glitchLength - 1));--}}
                                                {{--glitchCharacter = glitches[glitchIndex];--}}
                                                {{--ghostCharacter = ghosts[i] || settings.blank;--}}
                                                {{--addGlitch = Math.random() < glitchProbability;--}}
                                                {{--character = addGlitch ? glitchCharacter : ghostCharacter;--}}
                                                {{--output.push(character);--}}
                                            {{--}--}}
                                            {{--object = {--}}
                                                {{--value: 0--}}
                                            {{--};--}}
                                            {{--target = {--}}
                                                {{--value: 1--}}
                                            {{--};--}}
                                            {{--parameters = {--}}
                                                {{--duration: settings.duration,--}}
                                                {{--ease: settings.ease,--}}
                                                {{--step: function() {--}}
                                                    {{--var index, l, progress, ref1;--}}
                                                    {{--progress = Math.floor(object.value * (textLength - 1));--}}
                                                    {{--for (i = l = 0, ref1 = progress; 0 <= ref1 ? l <= ref1 : l >= ref1; i = 0 <= ref1 ? ++l : --l) {--}}
                                                        {{--index = order[i];--}}
                                                        {{--output[index] = textCharacters[index];--}}
                                                    {{--}--}}
                                                    {{--return $element.html(output.join(''));--}}
                                                {{--},--}}
                                                {{--complete: function() {--}}
                                                    {{--return $element.html(text);--}}
                                                {{--}--}}
                                            {{--};--}}
                                            {{--return $(object).delay(settings.delay).animate(target, parameters);--}}
                                        {{--};--}}

                                        {{--animate = function() {--}}
                                            {{--var data, element, index, j, len, options;--}}
                                            {{--for (index = j = 0, len = MESSAGES.length; j < len; index = ++j) {--}}
                                                {{--data = MESSAGES[index];--}}
                                                {{--element = $paragraph.get(index);--}}
                                                {{--element.innerText = '';--}}
                                                {{--options = {--}}
                                                    {{--delay: data.delay--}}
                                                {{--};--}}
                                                {{--scramble(element, data.text, options);--}}
                                            {{--}--}}
                                        {{--};--}}

                                        {{--initialise = function() {--}}
                                            {{--var index, j, len, text;--}}
                                            {{--$animate.click(animate);--}}
                                            {{--for (index = j = 0, len = MESSAGES.length; j < len; index = ++j) {--}}
                                                {{--text = MESSAGES[index];--}}
                                                {{--$message.append("<p>");--}}
                                            {{--}--}}
                                            {{--$paragraph = $container.find("p");--}}
                                            {{--animate();--}}
                                        {{--};--}}

                                        {{--initialise();--}}

                                    {{--</script>--}}


                                    <div class='console-container' style="width: 40%;">
                                        <span id='text'></span>
                                        <div class='console-underscore' id='console'>&#95;</div>
                                    </div>
                                    <script>
                                        consoleText(['لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت            ' +
                                        '            چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که                    ' +
                                        '    لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می               ' +
                                        '         باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد      ' +
                                        '                  تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در                     ' +
                                        '   زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و               ' +
                                        '         شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات                    ' +
                                        '    پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.         ' +
                                        '           '], 'text',['tomato']);

                                        function consoleText(words, id, colors) {
                                            if (colors === undefined) colors = ['#fff'];
                                            var visible = true;
                                            var con = document.getElementById('console');
                                            var letterCount = 1;
                                            var x = 1;
                                            var waiting = false;
                                            var target = document.getElementById(id);
                                            target.setAttribute('style', 'color:' + colors[0]);
                                            window.setInterval(function() {

                                                if (letterCount === 0 && waiting === false) {
                                                    waiting = true;
                                                    target.innerHTML = words[0].substring(0, letterCount)
                                                    window.setTimeout(function() {
                                                        var usedColor = colors.shift();
                                                        colors.push(usedColor);
                                                        var usedWord = words.shift();
                                                        words.push(usedWord);
                                                        x = 1;
                                                        target.setAttribute('style', 'color:' + colors[0])
                                                        letterCount += x;
                                                        waiting = false;
                                                    }, 10)
                                                } else if (letterCount === words[0].length + 1 && waiting === false) {
                                                    waiting = true;
                                                    window.setTimeout(function() {
                                                        x = -1;
                                                        letterCount += x;
                                                        waiting = false;
                                                    }, 10)
                                                } else if (waiting === false) {
                                                    target.innerHTML = words[0].substring(0, letterCount)
                                                    letterCount += x;
                                                }
                                            }, 20)
                                            window.setInterval(function() {
                                                if (visible === true) {
                                                    con.className = 'console-underscore hidden'
                                                    visible = false;

                                                } else {
                                                    con.className = 'console-underscore'

                                                    visible = true;
                                                }
                                            }, 10)
                                        }
                                    </script>

                                    <div class="clear-both"></div>
                                </div>
                            </div>



                            <div class="ppr_rup ppr_priv_trip_search display-none hideOnScreen">
                                <!-- Swiper -->
                                <div id="mainSlider" class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($sliderPic as $item)
                                            <div class="swiper-slide">
                                                <img class="eachPicOfSlider" src="{{URL::asset('_images/sliderPic/' . $item->pic)}}" alt="{{$item->alt}}">
                                            </div>
                                            @if($item->text != null && $item->text != '')
                                                <div class="textInSlide" style="background-color: {{$item->textBackground}}; color: {{$item->textColor}};">
                                                    {{$item->text}}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.middleBanner')

    @include('layouts.placeFooter')

    <span id="searchPane" class="statePane ui_overlay ui_modal editTags hidden searchPanes">
        <div id="searchDivForScroll" class="prw_rup prw_search_typeahead spSearchDivForScroll">
            <div class="ui_picker">
                <div class="typeahead_align ui_typeahead full-width display-flex">

                    @if($placeMode == 'hotel')
                        <div class="spGoWhere">در کدام هتل</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="دوست دارید اقامت کنید؟"/>
                    @elseif($placeMode == 'amaken')
                        <div class="spGoWhere">کدام جاذبه</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="را می‌خواهید تجربه کنید؟"/>
                    @elseif($placeMode == 'restaurant')
                        <div class="spGoWhere">در کدام رستوران</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="دوست دارید غذا بخورید؟"/>
                    @elseif($placeMode == 'mahaliFood')
                        <div class="spGoWhere">کدام غذای محلی</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="را می‌خواهید تجربه کنید؟"/>
{{--                    @elseif($placeMode == 'majara')--}}
{{--                        <div class="spGoWhere"></div>--}}
{{--                        <input onkeyup="search(event, this.value)" type="text" id="placeName"--}}
{{--                               class="typeahead_input searchPaneInput" placeholder="دوست دارید به کدام هتل کنید؟"/>--}}
                    @elseif($placeMode == 'sogatsanaie')
                        <div class="spGoWhere">کدام صنایع‌دستی</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="را دوست دارید بشناسید؟"/>
                    @else
                        <div class="spGoWhere">به کجا</div>
                        <input onkeyup="search(event, this.value)" type="text" id="placeName"
                               class="typeahead_input searchPaneInput" placeholder="دوست دارید سفر کنید؟"/>
                    @endif

                    <input type="hidden" id="placeId">
                </div>
                <div class="spBorderBottom"></div>
                <div class="mainContainerSearch">

                    <div id="result" class="data_holder display-noneImp"></div>

                        <div class="visitSuggestionDiv" ng-app="mainApp" ng-controller="recentlyShowController">
                            @if(Auth::check())
                                <div class="visitSuggestionText">بازدید های اخیر شما</div>
                            @else
                                <div class="visitSuggestionText">پر بازدیدترین های هفته</div>
                            @endif
                            <div id="recentlyRow1" class="visitSuggestion4Box">
                                <div class="prw_rup prw_shelves_rebrand_poi_shelf_item_widget spBoxOfSuggestion" ng-repeat="place in records1">
                                    <div class="poi">
                                        <a href="[[place.placeRedirect]]" class="thumbnail">
                                            <div class="prw_rup prw_common_thumbnail_no_style_responsive">
                                                <div class="prv_thumb has_image">
                                                    <div class="image_wrapper spImageWrapper landscape landscapeWide">
                                                        <img src="[[place.placePic]]" alt="[[place.placeName]]" class="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detail direction-rtl" style="padding: 4px 0px 10px 0px;">
                                            <div class="item tags ng-binding" style="color: black; margin: 0px">[[place.placeName]]</div>
                                            <div class="item tags ng-binding" style="font-size: 9px; padding: 0px">[[place.placeCity]] در [[place.placeState]]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
        <div onclick="$('#searchPane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <span id="statePane1" class="statesearchDivForScrollPane ui_overlay ui_modal editTags hidden pop-up-Panes">
        <div class="header_text">استان مورد نظر</div>
        <div class="subheader_text">
       استان مورد نظر خود را از بین استان های موجود انتخاب کنید
        </div>
        <div class="body_text">

            <select id="states"></select>

            <div class="submitOptions">
                <button onclick="document.location.href = $('#states').val()" class="btn btn-success">تایید</button>
                <input type="submit" onclick="$('.dark').hide(); $('#statePane1').addClass('hidden')" value="خیر"
                       class="btn btn-default">
            </div>
        </div>
        <div onclick="$('#statePane1').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <span id="statePane2" class="statePane ui_overlay ui_modal editTags hidden pop-up-Panes">
        <div class="header_text">شهر مورد نظر</div>
        <div class="subheader_text">
       شهر مورد نظر خود را از بین شهر های موجود انتخاب کنید
        </div>
        <div class="body_text">

            <select onchange="getCities()" id="states2"></select>

            <select id="cities"></select>

            <div class="submitOptions">
                <button onclick="document.location.href = $('#cities').val()" class="btn btn-success">تایید</button>
                <input type="submit" onclick="$('.dark').hide(); $('#statePane2').addClass('hidden')" value="خیر"
                       class="btn btn-default">
            </div>
        </div>
        <div onclick="$('#statePane2').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <span id="goyeshPane" class="ui_overlay ui_modal editTags hidden pop-up-Panes">
        <div class="header_text">گویش مورد نظر</div>
        <div class="subheader_text">
       گویش مورد نظر خود را از بین گویش های موجود انتخاب کنید
        </div>
        <div class="body_text">

            <select id="goyesh"></select>

            <div class="submitOptions">
                <button onclick="document.location.href = $('#goyesh').val()" class="btn btn-success">تایید</button>
                <input type="submit" onclick="$('.dark').hide(); $('#goyeshPane').addClass('hidden')" value="خیر"
                       class="btn btn-default">
            </div>
        </div>
        <div onclick="$('#goyeshPane').addClass('hidden'); $('.dark').hide()" class="ui_close_x"></div>
    </span>

    <div class="ui_backdrop dark" id="darkModeMainPage"></div>

<script defer>
    var passenger = 0;

    function redirect() {
        "" != $("#placeId").val() && (document.location.href = $("#placeId").val())
    }

    function search(e, val = '') {

        if (val == '')
            val = $("#placeName").val();

        $(".suggest").css("background-color", "transparent").css("padding", "0").css("border-radius", "0");
        if (null == val || "" == val || val.length < 2) {
            $('#result').addClass('display-noneImp');
            $("#result").empty();
        }
        else {
            var scrollVal = $("#searchDivForScroll").scrollTop();

            if (13 == e.keyCode && -1 != currIdx) {
                $("#placeId").val(suggestions[currIdx].url);
                return redirect();
            }

            if (13 == e.keyCode && -1 == currIdx && suggestions.length > 0) {
                $("#placeId").val(suggestions[0].url);
                return redirect();
            }

            if (40 == e.keyCode) {
                if (currIdx + 1 < suggestions.length) {
                    currIdx++;
                    $("#searchDivForScroll").scrollTop(scrollVal + 25);
                }
                else {
                    currIdx = 0;
                    $("#searchDivForScroll").scrollTop(0);
                }

                if (currIdx >= 0 && currIdx < suggestions.length) {
                    $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px");
                }

                return;
            }
            if (38 == e.keyCode) {
                if (currIdx - 1 >= 0) {
                    currIdx--;
                    $("#searchDivForScroll").scrollTop(scrollVal - 25);
                }
                else {
                    currIdx = suggestions.length - 1;
                    $("#searchDivForScroll").scrollTop(25 * suggestions.length);
                }

                if (currIdx >= 0 && currIdx < suggestions.length)
                    $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px");
                return;
            }

            if ("ا" == val[0]) {
                for (val2 = "آ", i = 1; i < val.length; i++) val2 += val[i];
                $.ajax({
                    type: "post",
                    url: searchDir,
                    data: {
                        kindPlaceId: "{{$kindPlaceId}}",
                        key: val,
                        key2: val2,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {

                        newElement = "";

                        if (response.length == 0) {
                            newElement = "موردی یافت نشد";
                            $("#placeId").val("");
                            return;
                        }

                        response = JSON.parse(response);
                        currIdx = -1;
                        suggestions = response;

                        for (i = 0; i < response.length; i++) {
                            if ("state" == response[i].mode) {
                                newElement += '<div class="icons location spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                            }
                            else if ("city" == response[i].mode) {
                                newElement += '<div class="icons location spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")' style='margin: 0px'>شهر " + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'amaken') {
                                newElement += '<div class="icons touristAttractions spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'restaurant') {
                                newElement += '<div class="icons restaurantIcon spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'hotel') {
                                newElement += '<div class="icons hotelIcon spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'sogatSanaies') {
                                newElement += '<div class="icons souvenirIcon spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'mahaliFood') {
                                newElement += '<div class="icons traditionalFood spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                            else if (response[i].mode == 'majara') {
                                newElement += '<div class="icons adventure spIcons"></div>\n';
                                newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                                newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                            }
                        }

                        if (response.length != 0) {
                            $('#result').removeClass('display-noneImp')
                        }
                        else {
                            $('#result').addClass('display-noneImp');
                        }

                        $("#result").empty().append(newElement)
                    }
                })
            }
            else $.ajax({
                type: "post",
                url: searchDir,
                data: {
                    kindPlaceId: "{{$kindPlaceId}}",
                    key: val,
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {

                    newElement = "";

                    if (response.length == 0) {
                        newElement = "موردی یافت نشد";
                        $("#placeId").val("");
                        return;
                    }

                    response = JSON.parse(response);
                    currIdx = -1;
                    suggestions = response;

                    for (i = 0; i < response.length; i++) {
                        if (response[i].mode == "state") {
                            newElement += '<div class="icons location spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "استان ' + response[i].targetName + "\")'>استان " + response[i].targetName + "</p>";
                        }
                        else if (response[i].mode == "city") {
                            newElement += '<div class="icons location spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer font-weight-700' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "شهر ' + response[i].targetName + " در " + response[i].stateName + "\")' style='margin: 0px'>شهر " + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'amaken') {
                            newElement += '<div class="icons touristAttractions spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'restaurant') {
                            newElement += '<div class="icons restaurantIcon spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'hotel') {
                            newElement += '<div class="icons hotelIcon spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'sogatSanaies') {
                            newElement += '<div class="icons souvenirIcon spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'mahaliFood') {
                            newElement += '<div class="icons traditionalFood spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                        else if (response[i].mode == 'majara') {
                            newElement += '<div class="icons adventure spIcons"></div>\n';
                            newElement += "<p class='suggest cursor-pointer' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")' style='margin: 0px'>" + response[i].targetName + "</p>";
                            newElement += "<p class='suggest cursor-pointer stateName' id='suggest_" + i + "' onclick='setInput(\"" + response[i].url + '", "' + response[i].targetName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                        }
                    }

                    if (response.length != 0) {
                        $('#result').removeClass('display-noneImp')
                    }
                    else {
                        $('#result').addClass('display-noneImp');
                    }

                    $("#result").empty().append(newElement)
                }
            })
        }

    }

    function setInput(e, t) {
        $("#placeName").val(t), $("#placeId").val(e), $("#result").empty(), redirect()
    }

    //    For Date
    function assignDate(from, id, btnId) {
        $("#" + id).css("visibility", "visible");

        if (btnId == "date_input2" && $("#date_input1").val().length != 0)
            from = $("#date_input1").val();

        if (btnId == "date_input2_phone" && $("#date_input1_phone").val().length != 0)
            from = $("#date_input1_phone").val();

        $("#" + btnId).datepicker({
            numberOfMonths: 2,
            showButtonPanel: true,
            minDate: from,
            dateFormat: "yy/mm/dd"
        });
    }

    //    For change passenger for room of hotel
    function changePassengersNo(inc) {
        if (passenger + inc >= 0)
            passenger += inc;
        $("#passengerNoSelect").empty().append(passenger);
        $("#passengerNoSelect_phone").empty().append(passenger);
    }

    $(document).ready(function () {

        {{--@foreach($sections as $section)--}}
            {{--fillMyDivWithAdv('{{$section->sectionId}}', -1);--}}
        {{--@endforeach--}}

        changePassengersNo(0);
    });

</script>

<script async src="{{URL::asset('js/middleBanner.js')}}"></script>

<script async src="{{URL::asset('js/slideBar.js')}}"></script>

<script src="{{URL::asset('js/adv.js')}}"></script>

<script defer src="{{URL::asset('js/mainPageSuggestions.js')}}"></script>

<!-- Initialize Swiper Of mainSlider -->
<script>
    var swiper = new Swiper('#mainSlider', {
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 500000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

</body>
</html>

