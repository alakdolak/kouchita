<?php $config = \App\models\ConfigModel::first() ?>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/footer.css')}}' />

{{--footer html--}}
<div class="clear-both"></div>
<footer>
    {{--top footer--}}
    <div class="hideOnPhone" id="knowOurPartnersDiv">
        <ul>
            <li class="footTitle"><b> شرکای ما را بشناسید</b></li>
        </ul>
    </div>
    <div class="phoneStyle footerMainBoxes" id="beWithUsInSocialMedia">
        <ul>
            <li class="footTitle">در رسانه ها با ما باشید</li>
            <li>
                <div class="footerIcon gardeshname"></div>
                <div>
                    <a class="socialLink" {{($config->gardeshnameNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="http://gardeshname.shazdemosafer.com/">گردشنامه</a>
                </div>
            </li>
            <li>
                <div class="footerIcon instagram"></div>
                <div>
                    <a class="socialLink" {{($config->instagramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.instagram.com/shazdehmosafer/">اینستاگرام</a>
                </div>
            </li>
            <li>
                <div class="footerIcon telegram"></div>
                <div>
                    <a class="socialLink" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://t.me/shazdehmosafer">تلگرام</a>
                </div>
            </li>
            <li>
                <div class="footerIcon aparat"></div>
                <div>
                    <a class="socialLink" {{($config->aparatNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.aparat.com/shazdehmosafer">آپارات</a>
                </div>
            </li>
            <li>
                <div class="footerIcon bogendesign"></div>
                <div>
                    <a class="socialLink" {{($config->bogenNoFollow) ? 'rel="nofollow"' : ''}}  target="_blank" href="http://bogendesign.co">بوگن دیزاین</a>
                </div>
            </li>
            <li>
                <a {{($config->linkedinNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.linkedin.com/in/shazde-mosafer-652817143/">
                    <div class="footerIcon linkedin"></div>
                </a>
                <a {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}} target="_blank" href="https://www.facebook.com/profile.php?id=100016313805277&ref=br_rs">
                    <div class="footerIcon facebook"></div>
                </a>
                <a target="_blank" {{($config->pinterestNoFollow) ? 'rel="nofollow"' : ''}} href="https://www.pinterest.co.uk/shazdemosafer/">
                    <div class="footerIcon pinterest"></div>
                </a>
                <a target="_blank" {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}} href="https://twitter.com/shazdemosafer">
                    <div class="footerIcon twitter"></div>
                </a>
                <a target="_blank" {{($config->googlePlusNoFollow) ? 'rel="nofollow"' : ''}} href="https://plus.google.com/113786987503996741617">
                    <div class="footerIcon googlePlus"></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="hideOnPhone footerMainBoxes">
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
    <div class="phoneStyle footerMainBoxes" >
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
    <div class="hideOnPhone footerMainBoxes" >
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
        <img src="{{URL::asset('images/logo.svg')}}" class="content-icon" width="100%">
    </div>
    <div class="clear-both hideOnScreen"></div>
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
    <div class="clear-both"></div>
</footer>
