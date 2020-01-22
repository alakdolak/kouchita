<link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/shazdeDesigns/shareBox.css')}}'/>

<div id="share_box">

    <a target="_blank" class="link mg-tp-5" {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}}
    href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}">
        <img src="{{"../../../public/images/shareBoxImg/facebook.png"}}" class="display-inline-block float-right">
        <div class="display-inline-block float-right mg-rt-5">اشتراک صفحه در فیسبوک</div>
    </a>
    <a target="_blank" class="link mg-tp-5" {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}}
    href="https://twitter.com/home?status={{Request::url()}}">
        <img src="{{"../../../public/images/shareBoxImg/twitter.png"}}" class="display-inline-block float-right">
        <div class="display-inline-block float-right mg-rt-5">اشتراک صفحه در توییتر</div>
    </a>
    <a target="_blank" class="link mg-tp-5" {{($config->whatsAppFollow) ? 'rel="nofollow"' : ''}}
{{--    href="https://whatsApp.com/share?url={{s mg-tp-5tr_replace('%20', '', Request::url())}}"--}}
    >
        <img src="{{"../../../public/images/shareBoxImg/whatsApp.png"}}" class="display-inline-block float-right">
        <div class="display-inline-block float-right mg-rt-5">اشتراک صفحه واتس اپ</div>
    </a>
    <a target="_blank" class="link mg-tp-5" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}}
    href="https://telegram.me/share/url?url={{Request::url()}}">
        <img src="{{"../../../public/images/shareBoxImg/telegram.png"}}" class="display-inline-block float-right">
        <div class="display-inline-block float-right mg-rt-5">اشتراک صفحه تلگرام</div>
    </a>
    <a target="_blank" class="link mg-tp-5" {{($config->instagramFollow) ? 'rel="nofollow"' : ''}}
{{--    href="https://instagram.com/share?url={{ str_replace('%20', '', Request::url())}}"--}}
    >
        <img src="{{"../../../public/images/shareBoxImg/instagram.png"}}" class="display-inline-block float-right">
        <div class="display-inline-block float-right mg-rt-5">اشتراک صفحه اینستاگرام</div>
    </a>
    <a target="_blank" class="link mg-tp-5" {{($config->pinterestFollow) ? 'rel="nofollow"' : ''}}
{{--    href="https://pinterest.com/home?status={{Request::url()}}"--}}
    >
        <img src="{{"../../../public/images/shareBoxImg/pinterest.png"}}" class="display-inline-block float-right">
        <div class="display-inline-block float-right mg-rt-5">اشتراک صفحه پین ترست</div>
    </a>
    <div class="position-relative inputBoxSharePage mg-tp-5">
        <input class="full-width inputBoxInputSharePage" placeholder="www.koochita.com/abhoes">
        <img src="{{"../../../public/images/tourCreation/copy.png"}}" id="copyImgInputShareLink">
    </div>
</div>
{{--<div class="header heading fr" id="lastDivOfShareBox">--}}
{{--    <div id="share_pic"></div>--}}
{{--</div>--}}
<div id="share_pic" class="wideScreen targets float-left col-xs-6 pd-0">
    <span class="ui_button casino save-location-7306673 ui_icon sharePageMainDiv">
        <div class="sharePageIcon"></div>
        <div class="sharePageLabel">
            اشتراک‌گذاری صفحه
        </div>
    </span>
    <div id="helpSpan_8" class="helpSpans hidden row">
        <span class="introjs-arrow"></span>
        <p>شاید بعدا بخواهید دوباره به همین مکان باز گردید. پس آن را نشان کنید تا از منوی بالا هر وقت که خواستید دوباره به آن باز گردید.</p>
        <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
        <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
        <button class="btn btn-danger exitBtnHelp">خروج</button>
    </div>
</div>

<script>

    $('#share_pic').click(function () {
        if ($('#share_box').is(":hidden")) {
            $('#share_box').show();
        } else {
            $('#share_box').hide();
        }
    });
</script>

