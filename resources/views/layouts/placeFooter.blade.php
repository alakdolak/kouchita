
<?php $config = \App\models\ConfigModel::first() ?>

{{--FOOTER--}}
{{--footer css--}}
<style type="text/css">
    footer ul{
        list-style: none;
    }
    footer {
        height: auto;
        background-color: #fcc156;
        color: #16174f;
        direction: rtl;
        padding: 20px;
        text-align: right;
        margin-top: 1%;
    }
    .footTitle {
        font-size: 18px;
    }
    footer li > a {
        color: #16174f !important;
        font-size: 12px;
        text-decoration: none;
    }
    footer li a:visited {
        text-decoration: none !important;
    }
    footer li a:active {
        text-decoration: none !important;
    }
    footer li {
        padding: 4px;
    }
    footer a:hover {
        text-decoration: none !important;
        color: #16174f;
    }
    footer li>img,.small-ico{
        width: 22px;
        float: right;
        margin-left: 7px;
        height: 22px;
    }
    .footDown {
        float: right;
        width: 70%;
    }
    .footDown a {
        text-decoration: underline;
    }
    .footDown a:hover {
        text-decoration: underline !important;
    }
    .footDown li {
        margin-top: -3px;
    }
    .socialLink {
        font-size: 12px;
    }
    .footerIcon {
        background-image: url('{{URL::asset('images/footer.png')}}');
        width: 22px;
        height: 22px;
        background-size: 22px;
        background-repeat:  no-repeat;
        display: inline-block;
    }
    .gardeshname {
        background-position:  0 -24px;
        font-size: 24px;
    }
    .instagram {
        background-position:  0 -69px;
    }
    .telegram {
        background-position:  0 -137px;
    }
    .aparat {
        background-position:  0 -182px;
    }
    .bogendesign {
        background-position:  0 -205px;
    }
    .linkedin {
        background-position:  0 -91px;
    }
    .facebook {
        background-position:  0 -1px;
    }
    .pinterest {
        background-position:  0 -114px;
    }
    .twitter {
        background-position:  0 -159px;
    }
    .googlePlus {
        background-position:  0 -46px;
    }
    .selectLanguage {
        background: #FFF;
        border: 2px solid;
        font-size: 12px;
    }
    .footerLogo {
        width: 30%;
        clear: right;
    }
    .aboutShazde {
        font-size: 10px;
        text-align: justify;
    }
</style>

<style>
    @media screen and (max-width: 600px) {
        .phoneStyle {
            width: 50% !important;
        }
        .footTitle {
            font-size: 36px;
        }
        .selectLanguage {
            border: 4px solid;
            font-size: 24px;
        }
        .socialLink {
            font-size: 24px;
        }
        .footerIcon {
            width: 44px;
            height: 44px;
            background-size: 44px;
            background-repeat:  no-repeat;
            display: inline-block;
        }
        .gardeshname {
            background-position:  0 -47px;
        }
        .instagram {
            background-position:  0 -138px;
        }
        .telegram {
            background-position:  0 -274px;
        }
        .aparat {
            background-position:  0 -364px;
        }
        .bogendesign {
            background-position:  0 -410px;
        }
        .linkedin {
            background-position:  0 -183px;
        }
        .facebook {
            background-position:  0 -2px;
        }
        .pinterest {
            background-position:  0 -229px;
        }
        .twitter {
            background-position:  0 -319px;
        }
        .googlePlus {
            background-position:  0 -93px;
        }
        .footerLogo {
            width: 100%;
            clear: both;
        }
        .footDown {
            width: 100%;
            clear: both;
        }
        .aboutShazde {
            font-size: 40px;
        }
        footer li > a {
            font-size: 24px;
        }
    }
</style>

{{--footer html--}}
<div style="clear: both;"></div>
<footer>
    {{--top footer--}}
    <div class="hideOnPhone" style="float: right; width: 30%;">
        <ul>
            <li class="footTitle"><b> شرکای ما را بشناسید</b></li>
        </ul>
    </div>
    <div class="phoneStyle" style="float: right; width: 17.5%;">
        <ul>
            <li class="footTitle">در رسانه ها با ما باشید</li>
            <li style="padding: 0 4px;">
                <div class="footerIcon gardeshname"></div>
                <div style="display: inline-block;position: absolute;margin-right: 4px;">
                    <a class="socialLink" {{($config->gardeshnameNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="http://gardeshname.shazdemosafer.com/">گردشنامه</a>
                </div>
            </li>
            <li style="padding: 0 4px;">
                <div class="footerIcon instagram"></div>
                <div style="display: inline-block;position: absolute;margin-right: 4px;">
                    <a class="socialLink" {{($config->instagramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.instagram.com/shazdehmosafer/">اینستاگرام</a>
                </div>
            </li>
            <li style="padding: 0 4px;">
                <div class="footerIcon telegram"></div>
                <div style="display: inline-block;position: absolute;margin-right: 4px;">
                    <a class="socialLink" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://t.me/shazdehmosafer">تلگرام</a>
                </div>
            </li>
            <li style="padding: 0 4px;">
                <div class="footerIcon aparat"></div>
                <div style="display: inline-block;position: absolute;margin-right: 4px;">
                    <a class="socialLink" {{($config->aparatNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.aparat.com/shazdehmosafer">آپارات</a>
                </div>
            </li>
            <li style="padding: 0 4px;">
                <div class="footerIcon bogendesign"></div>
                <div style="display: inline-block;position: absolute;margin-right: 4px;">
                    <a class="socialLink" {{($config->bogenNoFollow) ? 'rel="nofollow"' : ''}}  target="_blank" href="http://bogendesign.co">بوگن دیزاین</a>
                </div>
            </li>
            <li>
                <a style="margin-right: 4px" {{($config->linkedinNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.linkedin.com/in/shazde-mosafer-652817143/">
                    <div class="footerIcon linkedin"></div>
                </a>
                <a style="margin-right: 4px" {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.facebook.com/profile.php?id=100016313805277&ref=br_rs">
                    <div class="footerIcon facebook"></div>
                </a>
                <a style="margin-right: 4px" target="_blank" {{($config->pinterestNoFollow) ? 'rel="nofollow"' : ''}} href="https://www.pinterest.co.uk/shazdemosafer/">
                    <div class="footerIcon pinterest"></div>
                </a>
                <a style="margin-right: 4px" target="_blank" {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}} href="https://twitter.com/shazdemosafer">
                    <div class="footerIcon twitter"></div>
                </a>
                <a style="margin-right: 4px" target="_blank" {{($config->googlePlusNoFollow) ? 'rel="nofollow"' : ''}} href="https://plus.google.com/113786987503996741617">
                    <div class="footerIcon googlePlus"></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="hideOnPhone" style="float: right; width: 17.5%;">
        <ul>
            <li class="footTitle">بیشتر بشناسید</li>
            <li>
                <a href="#">اصطلاحات کلی</a>
            </li>
            <li>
                <a href="#">لباس محلی</a>
            </li>
            <li>
                <a href="#">صنایع دستی</a>
            </li>
            <li>
                <a href="#">سوغات محلی</a>
            </li>
            <li>
                <a href="#">غذاهای محلی</a>
            </li>
            <li>
                <a href="#">گویش محلی</a>
            </li>
        </ul>
    </div>
    <div class="phoneStyle" style="float: right; width: 17.5%;">
        <ul>
            <li class="footTitle">شازده در زبان های دیگر</li>
            <li>
                <select class="selectLanguage">
                    <option value="persian" selected>فارسی</option>
                    <option value="english" disabled>English</option>
                    <option value="spanish" disabled>العربية</option>
                    <option value="french" disabled>Türkçe</option>
                </select>
            </li>

            <li class="footTitle hideOnPhone">دقیق تر شوید</li>
            <li class="hideOnPhone">
                <a href="#">سفرهای ماجراجویی</a>
            </li>
            <li class="hideOnPhone">
                <a href="#">طبیعت گردی</a>
            </li>
            <li class="hideOnPhone">
                <a href="#">بوم گردی</a>
            </li>
            <li class="hideOnPhone">
                <a href="#">گردشنامه</a>
            </li>
        </ul>
    </div>
    <div class="hideOnPhone" style="float: right; width: 17.5%;">
        <ul>
            <li class="footTitle">بیشتر جستجو کنید</li>
            <li>
                <a href="#">هتل ها</a>
            </li>
            <li>
                <a href="#">رستوران ها</a>
            </li>
            <li>
                <a href="#">جاذبه ها</a>
            </li>
            <li>
                <a href="{{route('tickets')}}">بلیط</a>
            </li>
            <li>
                <a href="#">جشنواره ها</a>
            </li>
            <li>
                <a href="#">آداب و رسوم</a>
            </li>
        </ul>
    </div>
    {{--down footer--}}
    <div class="footerLogo">
        <img src="{{URL::asset('images/logo.svg')}}" class="content-icon" width="100%" style="margin-top: 10px;">
    </div>
    <div style="clear: both" class="hideOnScreen"></div>
    <div class="footDown">
        <ul>
            <li>
                <p class="aboutShazde">
                بنده شازده مسافر هستم و همونطوری که از اسمم مشخصه عاشق سفرم و بیشتر اوقاتم رو به سفر میگذرونم.
                عرضم به خدمتِ شما، اگه ریا نباشه تقریبا میتونم بگم که همه ی اماکن و جاذبه های گردشگری ایران رو از نزدیک دیدم! بخاطر همینم چند وقت پیشا تصمیم گرفتم با یه سری از دوستام بشینیم و همه جاهایی که رفتیم رو برای شما توصیف کنیم و تجربه هامون رو با شما به اشتراک بزاریم که هر وقت دلتون خواست به شهری سفر کنید، قبلش میتونید بیاید اینجا و از جاذبه های دیدنی، خوردنی، شنیدنی و خریدنی اون شهر
                    با خبر بشید و توضیحاتش رو هم کامل بخونین، بعدش راحت دل رو به دریا بزنین و راه بیوفتین.
                </p>
            </li>
            <li class="aboutShazde">شاید بخواهید در خصوص <a href="{{route('policies')}}"> حریم خصوصی و قوانین سایت </a> بیشتر بدانید.</li>
            <li class="aboutShazde">در صورت نیاز به کمک، صفحه <a href="#"> راهنما </a> را بخوانید و در صورت نیاز <a href="#"> با ما تماس بگیرید. </a></li>
            <li class="aboutShazde">این سایت متعلق به مجموعه شازده مسافر می باشد؛ <a href="#"> درباره ما </a> بیشتر بدانید.</li>
            <li class="aboutShazde">شازده مسافر محصولی از <a href="#"> بوگن دیزاین </a> می باشد؛ ما را بیشتر بشناسید.</li>
        </ul>
    </div>
    <div style="clear: both;"></div>
</footer>
