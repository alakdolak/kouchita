<link rel='stylesheet' type='text/css' href='{{URL::asset('css/common/middleBanner.css')}}'/>

<div class="clear-both"></div>

<div class="ui_container">
    <div class="ppr_rup ppr_priv_homepage_shelves">
        <div class="hideOnScreen row">
            <div class="boxOFSquareDiv">

                <div class="squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                    <div class="phoneIcon ghazamahali"></div>
                    <div class="textIcon">غذای محلی</div>
                </div>
                <div class="squareDiv" onclick="$('#phoneSearchPopUp').removeClass('hidden')">
                    <div class="phoneIcon soghat"></div>
                    <div class="textIcon">سوغات</div>
                </div>
                @if($placeMode == "amaken")
                    <a class="squareDivSelected" href="{{route('mainMode', ['mode' => 'amaken'])}}">
                        <div class="phoneIcon atraction"></div>
                        <div class="textIcon">جاذبه</div>
                    </a>
                @else
                    <a class="squareDiv" href="{{route('mainMode', ['mode' => 'amaken'])}}">
                        <div class="phoneIcon atraction"></div>
                        <div class="textIcon">جاذبه</div>
                    </a>
                @endif

                @if($placeMode == "restaurant")
                    <a class="squareDivSelected" href="{{route('mainMode', ['mode' => 'restaurant'])}}" >
                        <div class="phoneIcon restaurant"></div>
                        <div class="textIcon">رستوران</div>
                    </a>
                @else
                    <a class="squareDiv" href="{{route('mainMode', ['mode' => 'restaurant'])}}" >
                        <div class="phoneIcon restaurant"></div>
                        <div class="textIcon">رستوران</div>
                    </a>
                @endif

                @if($placeMode == "hotel")
                    <a class="squareDivSelected" href="{{route('mainMode', ['mode' => 'hotel'])}}">
                        <div class="phoneIcon hotel"></div>
                        <div class="textIcon">هتل</div>
                    </a>
                @else
                    <a class="squareDiv" href="{{route('mainMode', ['mode' => 'hotel'])}}">
                        <div class="phoneIcon hotel"></div>
                        <div class="textIcon">هتل</div>
                    </a>
                @endif
                {{--<a class="col-xs-4 squareDiv" href="{{route('tickets')}}">--}}
                {{--<div class="phoneIcon ticket"></div>--}}
                {{--<div class="textIcon">بلیط</div>--}}
                {{--</a>--}}
            </div>

            <div class="clear-both"></div>
        </div>


        @include('layouts.mainSuggestions')

        <div class="footerBarSpacer"></div>
    </div>
</div>

<!-- Initialize Swiper Of 3Box -->
<script>
    var swiper = new Swiper('#3box', {
        slidesPerView: 3,
        spaceBetween: 3,
        slidesPerGroup: 1,
        loop: true,
        autoplay: {
            delay: 7500,
            disableOnInteraction: false,
        },
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });
</script>

