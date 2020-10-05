<!doctype html>
<html lang="fa" dir="rtl">
<head>
    @include('layouts.topHeader')
    <title>
        فستیوال
    </title>
    <style>

        .centerContent{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bigFont{
            font-size: 30px;
        }
        .smallFont{
            font-size: 20px;
        }
        :root{
            --white: #E5E5E5;
            --yellow: #FBC155;
            --dark: #273039;
        }

        header{
            position: fixed;
            background-color: #E5E5E5;
            width: 100%;
            height: 50px;
            z-index: 99;
        }
        header .container{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header .logos{
            display: flex;
            height: 100%;
            align-items: center;
        }
        header .logos > img{
            height: 70%;
            width: auto;
        }
        header .buttons{
            margin-right: auto;
        }
        header .buttons > div{
            padding: 5px 20px;
            border-radius: 20px;
            margin: 0px 10px;
            cursor: pointer;
            box-shadow: 0px 3px 6px 0px #0000001a;
        }
        header .buttons .votedButton{
            background: var(--yellow);
        }
        header .buttons .registerButton{
            background: #273039;
            color: white;
        }



        section{
            background-color: #273039;
            padding: 25px 0px;
            padding-top: 75px;
        }

        section .headerWhite{
            color: var(--white);
        }
        section .headerWhite .smallFont{
            margin-right: 20px;
        }
        section .mainPic{
            border: solid 20px var(--white) ;
            height: 500px;
            box-shadow: 9px 3px 6px black;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
            padding: 0px;
            z-index: 9;
        }
        section .mainPic:after{
            content: '';
            background-image: url("{{URL::asset('images/festival/DOT100.png')}}");
            width: 100%;
            height: 100%;
            position: absolute;
        }

        section .flowColor{
            background-color: #445565;
            position: relative;
            margin-top: 5%;
            display: flex;
        }
        section .flowColor .bakPic{
            width: 100%;
            position: absolute;
        }
        section .flowColor .topPic{
            bottom: 99.5%;
        }
        section .flowColor .botPic{
            bottom: -1%;
            z-index: 9;
        }

        section .flowColor .rightText{
            width: 45%;
        }
        section .flowColor .rightText ul{
            color: var(--white);
            list-style: none;
        }
        section .flowColor .rightText ul > li::before{
            content: "\2022";
            color: var(--yellow);
            font-weight: bold;
            display: inline-block;
            width: 2em;
            margin-left: -1em;
            font-size: 23px;
        }
        section .flowColor .leftPics{
            width: 55%;
            display: flex;
            align-items: center;
            padding-bottom: 50px;
            justify-content: flex-end;
        }
        section .flowColor .leftPics .commonPic{
            width: 27%;
        }
        section .flowColor .leftPics .commonPic.pic1{
            transform: rotate(24deg);
        }
        section .flowColor .leftPics .commonPic.pic3{
            transform: rotate(25deg);
            z-index: 0;
        }
        section .conditionFestival{
            color: var(--white);
            display: flex;
            position: relative;
        }
        section .conditionFestival .rightSec{
            width: 60%;
            padding-bottom: 60px;
        }
        .buttonss{
            display: flex;
            margin-top: 10px;
        }
        .buttonss > div{
            margin-left: 25px;
            cursor: pointer;
            transition: .3s;
        }
        .buttonss > div:hover{
            color: var(--yellow);
        }
        .buttonss > div.selected{
            color: var(--yellow);
        }
        .rowss{
            margin-top: 15px;
        }
        .rowss > div{
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .rowss > div:before{
            content: "\2022";
            color: var(--yellow);
            font-weight: bold;
            font-size: 23px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
        }
        section .conditionFestival .leftSec{
            position: absolute;
            left: 0;
            bottom: -20px;
        }
        section .conditionFestival .leftSec > img{
            width: 90%;
        }
        .judgesSec{
            display: flex;
            align-items: center;
            margin-left: 10px;
        }
        .judgesSec .jug{
            display: flex;
            align-items: center;
            margin: 15px;
        }
        .judgesSec .jug .pic{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            border: solid white 6px;
        }
        .judgesSec .jug .pic > img{
            width: 100%;
        }
        .judgesSec .jug .info{
            margin-right: 12px;
        }
        .judgesSec .jug .name{
            font-size: 20px;
        }
        .judgesSec .jug .role{
            font-size: 15px;
        }

        .yellowSecBack{
            background: var(--yellow);
            width: 100%;
            padding-bottom: 80px;
            position: relative;
            color: var(--dark);
        }
        .blackSecBack{
            position: relative;
            padding-bottom: 80px;
            color: var(--white);
        }
        .topGear{
            position: absolute;
            width: 100%;
            bottom: 100%;
        }
        .footerRow > div{
            color: var(--yellow);
            margin-top: 7px;
            margin-right: 15px;
            font-size: 18px;
        }

        .calendar{
            width: 50%;
            font-size: 16px;
            margin-top: 20px;
        }
        .calendar .line{
            width: 100%;
            height: 1px;
            background: var(--dark);
            margin: 9px 0px;
            position: relative;
        }
        .calendar.right .line:after{
            content: '';
            width: 40px;
            height: 40px;
            background: var(--dark);
            position: absolute;
            left: 0;
            bottom: -20px;
            border-radius: 50%;
        }
        .calendar.left .line:before{
            content: '';
            width: 40px;
            height: 40px;
            background: var(--dark);
            position: absolute;
            right: 0;
            bottom: -20px;
            border-radius: 50%;
        }
        .calendar.right{

        }
        .calendar.right .topText{
        }
        .calendar.right .botText{
            text-align: left;
            padding-left: 50px;
        }
        .calendar.left{
            margin-right: auto;
        }
        .calendar.left .topText{
            text-align: left;
        }
        .calendar.left .botText{
            padding-right: 50px;
        }

    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logos">
                <img src="{{URL::asset('images/camping/undp.svg')}}">
                <img src="{{URL::asset('images/icons/mainLogo.png')}}">
            </div>
            <div class="buttons">
                <div class="votedButton">رای می دهم</div>
                <div class="registerButton">شرکت می کنم</div>
            </div>
        </div>
    </header>

    <section>
        <div class="container headerWhite">
            <span class="bigFont">#جشنواره ایران ما</span>
            <span class="smallFont">فیلم، عکس و عکس‌های موبایلی</span>
        </div>
        <div class="container mainPic">
            <img src="{{URL::asset('images/festival/BANNER.jpg')}}" style="width: 100%">
        </div>
        <div class="flowColor">
            <img src="{{URL::asset('images/festival/2Color.svg')}}" class="bakPic topPic">
            <img src="{{URL::asset('images/festival/2Color2.svg')}}" class="bakPic botPic">

            <div class="container" style="display: flex;">
                <div class="rightText">
                    <div class="bigFont" style="color: var(--yellow)">محورهای مسابقه</div>
                    <ul class="smallFont">
                        <li>طبیعت، ویژگی‌های اقلیمی و جاذبه‌های گردشگری ایران</li>
                        <li> مردم‌نگاری اقوام و خانواده‌ی ایرانی</li>
                        <li>میراث فرهنگی و بناهای تاریخی و مذهبی ایران</li>
                        <li> آیین‌های، مراسم و رویدادهای ملی و مذهبی ایران</li>
                    </ul>
                </div>
                <div class="leftPics">
                    <img src="{{URL::asset('images/festival/cameraWithFoot.png')}}" class="commonPic pic1">
                    <img src="{{URL::asset('images/festival/cameraWithFoot.png')}}" class="commonPic pic2">
                    <img src="{{URL::asset('images/festival/cameraWithFoot.png')}}" class="commonPic pic3">
                </div>
            </div>
        </div>

        <div class="container conditionFestival">
            <div class="rightSec">
                <div class="bigFont">
                    شرایط مسابقه
                </div>
                <div class="smallFont buttonss">
                    <div>#عکس</div>
                    <div class="selected">#عکس موبایلی</div>
                    <div>#فیلم</div>
                </div>
                <div class="smallFont rowss">
                    <div>تعداد آثار ارسالی برای هر شخص محدودیتی ندارد.</div>
                    <div>ارایه آثار این بخش نیز می‌بایست همراه با ثبت‌نام متقاضی، به‌صورت آپلود در
                        سایت حجمی معادل حداکثر 100 کیلوبایت و نیز ارسال سی‌دی در
                        اندازه 30 در 45 سانتی‌متر با 300 دی پی آی صورت گیرد.</div>
                    <div>تمام آثار ارسالی بایستی دارای زمان و مکان عکاسی باشند.</div>
                    <div>ارسال عکس در ابعاد اعلام شده روی سی دی الزامی است.</div>
                    <div>شرکت در این بخش برای عموم آزاد است و شرط سنی ندارد.</div>
                </div>
            </div>
            <div class="leftSec">
                <img src="{{URL::asset('images/festival/oneHandCamera.png')}}" >
            </div>
        </div>

        <div class="yellowSecBack">
            <img src="{{URL::asset('images/festival/yellowGear.svg')}}" class="topGear">
            <div class="container">
                <div class="bigFont">جوایز</div>
                <div class="smallFont">در هر بخش سه اثر برگزیده توسط رای مخاطبان و سه اثر برگزیده توسط هیات داوران انتخاب می‌گردد.</div>
                <div class="centerContent" style="margin-top: 13px;">
                    <img src="{{URL::asset('images/festival/cup.svg')}}" style="width: 75px">
                    <div class="smallFont">در هر بخش به سه اثر برگزیده هیئت داوران تندیس جشنواره و به سه اثر برگزیده آرای مردمی لوح تقدیر جشنواره تعلق می‌گیرد</div>
                </div>
                <div class="centerContent" style="margin-top: 13px;">
                    <div class="smallFont">
                        آثار برگزیده در بخش عکاسی و فیلم ، در نمایشگاهی با همکاری سازمان برنامه توسعه سازمان ملل؛UNDP،  در ایران و خارج
                        از ایران به نمایش در می‌آید. اطلاعات کاملتر در این مورد از همین وب سایت اعلام می شود.
                    </div>
                    <img src="{{URL::asset('images/festival/redCarpet.svg')}}" style="height: 100px;">
                </div>
            </div>
        </div>

        <div class="blackSecBack">
            <img src="{{URL::asset('images/festival/blackGear.svg')}}" class="topGear">
            <div class="container">
                <div class="bigFont">
                    هیئت داوران
                </div>
                <div class="smallFont buttonss">
                    <div>#عکس</div>
                    <div class="selected">#عکس موبایلی</div>
                    <div>#فیلم</div>
                </div>
                <div class="judgesSec">
                    <div class="jug">
                        <div class="pic">
                            <img src="https://static.koochita.com/defaultPic/da45ed5ff457e3a6f1cf01c708ceabe3.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="name">افشین شاهرودی</div>
                            <div class="role">نویسنده، عکاس</div>
                            <div class="role">afshin.akkas@gmail.com</div>
                        </div>
                    </div>
                    <div class="jug">
                        <div class="pic">
                            <img src="https://static.koochita.com/defaultPic/da45ed5ff457e3a6f1cf01c708ceabe3.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="name">افشین شاهرودی</div>
                            <div class="role">نویسنده، عکاس</div>
                            <div class="role">afshin.akkas@gmail.com</div>
                        </div>
                    </div>
                    <div class="jug">
                        <div class="pic">
                            <img src="https://static.koochita.com/defaultPic/da45ed5ff457e3a6f1cf01c708ceabe3.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="name">افشین شاهرودی</div>
                            <div class="role">نویسنده، عکاس</div>
                            <div class="role">afshin.akkas@gmail.com</div>
                        </div>
                    </div>
                    <div class="jug">
                        <div class="pic">
                            <img src="https://static.koochita.com/defaultPic/da45ed5ff457e3a6f1cf01c708ceabe3.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="name">افشین شاهرودی</div>
                            <div class="role">نویسنده، عکاس</div>
                            <div class="role">afshin.akkas@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="yellowSecBack">
            <img src="{{URL::asset('images/festival/yellowGear.svg')}}" class="topGear">
            <div class="container">
                <div class="bigFont">تقویم جشنواره</div>
                <div class="calendar right">
                    <div class="topText">آغاز ثبت نام و دریافت تصویر آثار</div>
                    <div class="line"></div>
                    <div class="botText">10 مهر تا 10 آبان</div>
                </div>
                <div class="calendar left">
                    <div class="topText">آغاز ثبت نام و دریافت تصویر آثار</div>
                    <div class="line"></div>
                    <div class="botText">10 مهر تا 10 آبان</div>
                </div>
                <div class="calendar right">
                    <div class="topText">آغاز ثبت نام و دریافت تصویر آثار</div>
                    <div class="line"></div>
                    <div class="botText">10 مهر تا 10 آبان</div>
                </div>
                <div class="calendar left">
                    <div class="topText">آغاز ثبت نام و دریافت تصویر آثار</div>
                    <div class="line"></div>
                    <div class="botText">10 مهر تا 10 آبان</div>
                </div>
            </div>
        </div>

        <div class="blackSecBack">
            <img src="{{URL::asset('images/festival/blackGear.svg')}}" class="topGear">
            <div class="container">
                <div class="bigFont">روند برگزاری</div>
                <div class="smallFont" style="margin-top: 20px">
                    هنرمندان، آثاری را در زمینه های عکاسی و فیلم و با توجه به
                    موضوعات مشخص شده، به  صورت دیجیتال آنلاین برای وب
                    سایت جشنواره ارسال می کنند، برای ارسال آثار زمانی در
                    حدود یک ماه در نظر گرفته شده است، سپس این آثار
                    توسط مردم داوری می شوند و با توجه به تعداد رای های
                    هر اثر نفرات برگزیده مردمی انتخاب می شوند، سپس
                    سایت بر روی هنرمندان جهت ارسال آثار بسته خواهد شد
                    و تیم های داوری به صورت مستقل از پنل های خود آثار
                    برگزیده را انتخاب می کنند، آثاری که بالاترین امتیاز را
                    از مجموع امتیاز های داده شده توسط داوران کسب
                    کنند، به عنوان برگزیدگان داوری معرفی خواهند شد.
                </div>
            </div>
        </div>

        <div class="yellowSecBack">
            <img src="{{URL::asset('images/festival/yellowGear.svg')}}" class="topGear">
            <div class="container">
                <div class="bigFont">اعلان نتایج</div>
                <div class="smallFont" style="margin-top: 20px">
                    اعلام نتایج برگزیدگان از طریق ایمیلی که در فرم ثبت نام نوشته‌اند، به ایشان اعلام می‌گردد. به
                    همین سبب لازم است تا شرکت کنندگان یک ایمیل معتبر در فرم ثبت نام ارائه نمایند.
                    ضمنا اخبار و اطلاعیه ها از طریق وب سایت و یا کانال رسمی جشنواره در وب سایت کوچیتا قابل دسترسی خواهند بود.
                </div>
            </div>
        </div>

        <div class="blackSecBack" style="padding: 20px 0px;">
            <div class="container">
                <div class="bigFont">تماس با  دبیرخانه</div>
                <div class="footerRow">
                    <div>آدرس: چهارراه جهان کودک پ 14 واحد 3</div>
                    <div>کدپستی: 2343545</div>
                    <div>ایمیل: info@koochita.com</div>
                    <div>تماس تلقن: 021-88124512</div>
                </div>
            </div>
        </div>

    </section>
</body>
</html>