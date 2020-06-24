<!DOCTYPE html>
<html lang="{{\App::getLocale()}}">

<head>
    @include('layouts.topHeader')

    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="website" />
    <title> کوچیتا، سامانه جامع گردشگری ایران </title>
    <meta name="title" content="کوچیتا | سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران" />
    <meta name='description' content='کوچیتا، سامانه جامع گردشگری ایران و شبکه اجتماعی گردشگران. اطلاعات اماکن و جاذبه ها، هتل ها، بوم گردی، ماجراجویی، آموزش سفر، فروشگاه صنایع‌دستی ، پادکست سفر' />
    <meta name='keywords' content='کوچیتا، هتل، تور ، سفر ارزان، سفر در ایران، بلیط، تریپ، نقد و بررسی، سفرنامه، کمپینگ، ایران گردی، آموزش سفر، مجله گردشگری، مسافرت، مسافرت داخلی, ارزانترین قیمت هتل ، مقایسه قیمت ، بهترین رستوران‌ها ، بلیط ارزان ، تقویم تعطیلات' />
    <meta property="og:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:secure_url" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>
    <meta property="og:image:width" content="550"/>
    <meta property="og:image:height" content="367"/>
    <meta name="twitter:image" content="{{URL::asset('_images/nopic/blank.jpg')}}"/>

    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mainPageStyles.css')}}'/>


    @if(\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{URL::asset('css/ltr/mainPage.css')}}">
    @endif

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

<body style="background-color: #EAFBFF;">

    @include('general.forAllPages')

    @include('layouts.header1')

    <div id="mainDivContainerMainPage">
        <div class="mainBannerSlider">
            <!-- Swiper -->
            <div id="mainSlider" class="swiper-container backgroundColorForSlider">
                <div class="swiper-wrapper">
                    @foreach($sliderPic as $item)
                        <div class="swiper-slide mobileHeight imgOfSliderBox">
                            <img src="{{$item->pic}}" class="imgOfSlider">
                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="mainDivSearchInputMainPage">
                <div class="searchDivForScrollClass mainSearchDivPcSize">
                    <div onclick="openMainSearch(0) // in mainSearch.blade.php" style="text-align: center; font-size: 25px;">{{__('به کجا می‌روید؟')}}</div>
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="sliderTextBox">
                <div class="console-container">
                    <span id='text' class="sliderText"></span>
                </div>
            </div>

        </div>

        <div class="hideOnScreen">
            <div id="mainSlider" class="swiper-container backgroundColorForSlider">
                <div class="swiper-wrapper">
                    @foreach($sliderPic as $item)
                        <div class="swiper-slide mobileHeight imgOfSliderBox">
                            <img src="{{$item->pic}}" class="imgOfSlider">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    @include('layouts.middleBanner')

    @include('layouts.placeFooter')

    <script>
    var mainSliderPics = {!! $sliderPic !!};

    var swiper = new Swiper('#mainSlider', {
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 50000,
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

    swiper.on('slideChange', function(){
        $('.backgroundColorForSlider').css('background-color', mainSliderPics[swiper.realIndex]['textBackground'])
        consoleText(mainSliderPics[swiper.realIndex]['text'], 'text', mainSliderPics[swiper.realIndex]['textColor']);
    });

    var setInterText = 0;
    consoleText(mainSliderPics[0]['text'], 'text', mainSliderPics[0]['textColor']);
    $('.backgroundColorForSlider').css('background-color', mainSliderPics[0]['textBackground']);
    function consoleText(words, id, colors) {
        document.getElementById('text').innerHTML = '';

        if(setInterText != 0)
            clearInterval(setInterText);

        document.getElementById(id).innerHTML = '';
        if (colors === undefined) colors = ['#fff'];
        var visible = true;
        var con = document.getElementById('console');
        var letterCount = 1;
        var x = 1;
        var waiting = false;
        var target = document.getElementById(id);
        target.setAttribute('style', 'color:' + colors);

        setInterText = window.setInterval(function() {
            if (letterCount === 0 && waiting === false) {
                waiting = true;
                target.innerHTML = words.substring(0, letterCount);
                window.setTimeout(function() {
                    var usedColor = colors.shift();
                    colors.push(usedColor);
                    var usedWord = words.shift();
                    words.push(usedWord);
                    x = 1;
                    target.setAttribute('style', 'color:' + color);
                    letterCount += x;
                    waiting = false;
                }, 10)
            }
            else if (waiting === false) {
                target.innerHTML = words.substring(0, letterCount);
                letterCount += x;
            }
        }, 70);
    }

</script>

</body>
</html>

