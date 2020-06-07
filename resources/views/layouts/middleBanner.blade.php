<link rel='stylesheet' type='text/css' href='{{URL::asset('css/common/middleBanner.css')}}'/>

<div class="clear-both"></div>

<div class="ui_container">
    <div class="ppr_rup ppr_priv_homepage_shelves">
        <div class="hideOnScreen row">
            <div class="boxOFSquareDiv">

                <div class="squareDiv" onclick="openMainSearch(11)">
                    <div class="phoneIcon ghazamahali"></div>
                    <div class="textIcon">غذای محلی</div>
                </div>
                <div class="squareDiv" onclick="openMainSearch(10)">
                    <div class="phoneIcon soghat"></div>
                    <div class="textIcon">سوغات</div>
                </div>

                <div class="squareDiv" onclick="openMainSearch(1)">
                    <div class="phoneIcon atraction"></div>
                    <div class="textIcon">جاذبه</div>
                </div>

                <div class="squareDiv" onclick="openMainSearch(3)">
                    <div class="phoneIcon restaurant"></div>
                    <div class="textIcon">رستوران</div>
                </div>

                <div class="squareDiv" onclick="openMainSearch(4)">
                    <div class="phoneIcon hotel"></div>
                    <div class="textIcon">هتل</div>
                </div>
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

