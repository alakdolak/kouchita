@extends('layouts.bodyPlace')

@section('header')
    @parent
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/addPlaceByUser.css?v=1')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css')}}' />

    <link rel="stylesheet" href="{{asset('packages/dropzone/basic.css')}}">
    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">

    <script src="{{URL::asset('js/jquery.farsiInput.js')}}"></script>

    <style>
        .choosedCategory{
            border-color: #30b4a6;
            color :#30b4a6;
        }
        .choosedCategory > div{
            color :#30b4a6 !important;
        }

        .resultSearch{
            padding: 5px 10px;
            transition: .2s;
        }
        .resultSearch:hover{
            background: #4DC7BC;
            border-radius: 10px;
        }
        .addressSection{
            padding-bottom: 20px;
            margin-bottom: 10px;
            border-bottom: solid 1px;
        }
    </style>
@stop

@section('main')
    <div class="bodyStyle">
        <div class="box">

            <div class="topSection">

                <div class="headerOfBox">شما در حال ایجاد یک مقصد جدید هستید...</div>

                <div class="bodyOfBox">
                    <div class="step0 stepHeader stepTitle"> از اینکه اطلاعات خود را با ما در میان می گذارید سپاس گذاریم. لطفا در چند قدم ساده، به پرسش های ما پاسخ دهید. </div>
                    <div class="step1 stepHeader hidden">
                        <div class="stepTitle">لطفا دسته مناسب را با توجه به مقصد خود انتخاب کنید.</div>
                        <div class="boxNotice">اگر ارایه دهنده خدمت هستید از این قسمت برای تعریف تجارت خود استفاده کنید.</div>
                    </div>
                    <div class="step2 stepHeader hidden">
                        <div class="stepTitle">لطفا اطلاعات پایه را وارد نمایید.</div>
                        <div class="boxNotice">وارد نمودن اطلاعات ستاره دار اجباری است.</div>
                    </div>
{{--                    <div class="step3 stepHeader hidden">--}}
{{--                        <div class="stepTitle">لطفا آدرس دسترسی به مقصد را وارد نمایید.</div>--}}
{{--                        <div class="boxNotice">آدرس را به گونه ای وارد نمایید تا دوستانتان بتوانند به راحتی به مقصد برسند. در صورت نیاز از کلمات توصیفی استفاده نمایید. نیازی به وارد کردن مجدد نام استان و شهر نمی باشد مگر آنکه در توصیف راه های دسترسی ضروری باشد.</div>--}}
{{--                    </div>--}}
{{--                    <div class="step4 stepHeader hidden">--}}
{{--                        <div class="stepTitle">لطفا موقعیت مقصد را بر روی نقشه مشخص نمایید</div>--}}
{{--                        <div class="boxNotice">اگر مختصات مقصد را می دانید آن را مستقیما وارد نمایید. در غیر این صورت موقعیت آن را بر روی نقشه مشخص نمایید</div>--}}
{{--                    </div>--}}

                    <div class="step3 stepHeader hidden">
                        <div class="stepTitle">مهم ترین بخش ، توصیف مقصد است</div>
                        <div class="boxNotice">از بین گزینه های زیر، مواردی را که مقصد را توصیف می نماید اضافه کنید. این لیست با کمک شما تکمیل می شود پس اگر مورد یا مواردی بود که ما آن را لحاظ نکرده بودیم حتما آن را وارد کنید. سپاسگذاریم.</div>
                    </div>
                    <div class="step4 stepHeader hidden">
                        <div class="stepTitle">اگر عکسی از مقصد دارید آن را بارگذاری نمایید</div>
                        <div class="boxNotice">شما می توانید به هر تعداد عکس که در اختیار دارید بارگزاری نمایید. در این صورت علاوه بر امتیاز تعریف و یا ویرایش مکان، امتیاز عکس نیز به شما تعلق می گیرد</div>
                    </div>
                    <div class="step7 stepHeader hidden">
                        <div class="stepTitle">
                            تمام اطلاعات به طور کامل دریافت شد. این اطلاعات پس از بررسی اعمال خواهد شد و امتیاز شما در پروفایل افزایش خواهد یافت. به ویرایش و اضافه کردن مقصد های جدید ادامه دهید تا علاوه بر افزایش امتیاز، نشان های افتخار متفاوتی برنده شوید.
                        </div>
                    </div>

                    <div class="selectCategoryDiv hidden">
                        <div class="headerCategoryIcon icons iconOfSelectCategory"></div>
                        <div class="headerCategoryName nameOfSelectCategory"></div>
                    </div>
                </div>

                <div class="footerOfBox">
                    <div class="stepsMilestoneMainDiv">

                        <div data-val="1" class="steps bigCircle hidden right-0"></div>
                        <div data-val="1" class="steps middleCircle hidden right-0"></div>
                        <div data-val="1" class="steps littleCircle hidden right-0"></div>

                        <div data-val="2" class="steps bigCircle hidden right-20per"></div>
                        <div data-val="2" class="steps middleCircle hidden right-20per"></div>
                        <div data-val="2" class="steps littleCircle hidden right-20per"></div>

                        <div data-val="3" class="steps bigCircle hidden right-40per"></div>
                        <div data-val="3" class="steps middleCircle hidden right-40per"></div>
                        <div data-val="3" class="steps littleCircle hidden right-40per"></div>

                        <div data-val="4" class="steps bigCircle hidden right-60per"></div>
                        <div data-val="4" class="steps middleCircle hidden right-60per"></div>
                        <div data-val="4" class="steps littleCircle hidden right-60per"></div>

                        <div data-val="5" class="steps bigCircle hidden right-80per"></div>
                        <div data-val="5" class="steps middleCircle hidden right-80per"></div>
                        <div data-val="5" class="steps littleCircle hidden right-80per"></div>

                        <div data-val="6" class="steps bigCircle hidden right-100per"></div>
                        <div data-val="6" class="steps middleCircle hidden right-100per"></div>
                        <div data-val="6" class="steps littleCircle hidden right-100per"></div>

                    </div>
                    <button class="btn boxNextBtn" type="button" id="nextStep" onclick="changeSteps(1)" >شروع</button>
                    <div class="hidden" id="stepName">گام اول</div>
                    <button class="btn boxPreviousBtn" type="button" id="previousStep" onclick="changeSteps(-1)">بازگشت</button>
                </div>
            </div>

            <div class="bodySection">
                <div class="step1 bodyOfSteps hidden">
                    <div id="selectCategoryDiv" class="text-align-center"></div>
                </div>

                <div class="step2 bodyOfSteps hidden">
                    <div class="stepInputBox display-block">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired"><div class="icons stepInputIconRequired redStar"></div>نام</div>
                        </div>
                        <input class="stepInputBoxInput" id="name">
                    </div>

                    <div class="stepInputBox">
                        <div style="display: flex; align-items: center">
                            <div class="stepInputBoxText">
                                <div class="stepInputBoxRequired">
                                    <div class="icons stepInputIconRequired redStar"></div>
                                    استان
                                </div>
                            </div>
                            <select class="stepInputBoxInput" name="state" id="state" onchange="changeState(this.value)">
                                <option id="noneState" value="0">استان را انتخاب کنید</option>
                                @foreach($states as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->name    }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="stepInputBox float-left">
                        <div class="stepInputBoxText">
                            <div class="stepInputBoxRequired"><div class="icons stepInputIconRequired redStar"></div>شهر</div>
                        </div>
                        <input id="cityName" class="stepInputBoxInput" onclick="chooseCity()" readonly>
                        <input id="cityId" type="hidden" value="0">
                    </div>
                    <div id="textForChooseCity" class="stepNotice">ممکن است مقصد شما دقیق داخل شهر یا روستا نباشد.حتما نزدیک ترین شهر و یا روستای موجود در لیست ما را انتخاب کنید</div>
                    <div class="mg-tp-5">
                        <div class="display-inline-block">
                            <input id="notCity" type="checkbox">
                            <label for="notCity">
                                <span></span>
                            </label>
                        </div>
                        <div class="display-inline-block">با وجود توضیحات بالا مقصد من یا به شهر خاصی تعلق نمی گیرد و یا شهر آن در لیست بالا موجود نیست</div>
                    </div>

                    <div id="onlyForPlaces">
                        <div class="addressSection">
                            <textarea accept-charset="character_set" class="addresText" id="address" name="address" placeholder="آدرس دقیق محل را وارد نمایید - حداقل 100 کاراکتر" rows="2"></textarea>
                            <input type="hidden" name="lat" id="lat" value="0">
                            <input type="hidden" name="lng" id="lng" value="0">

                            <div style="display: flex; justify-content: center; align-items: center; margin-top: 5px;">
                                <button class="btn btn-success" onclick="$('#mapModal').modal('show')">محل را از روی نقشه مشخص کنید</button>
                            </div>

                            <div class="mg-tp-5">موقعیت موردنظر را بر روی نقشه پیدا نموده و پین را بر روی آن قرار دهید. (کلیک در کامپیوتر و لمس نقشه در گوشی)</div>
                        </div>

                        <div class="stepInputBox">
                            <div class="stepInputBoxText">
                                <div class="stepInputBoxRequired">تلفن</div>
                            </div>
                            <input class="stepInputBoxInput" id="phone" type="tel">
                        </div>
                        <div class="stepNotice">شماره را همانگونه که با موبایل خود تماس می گیرید وارد نمایید. در صورت وجود بیش از یک شماره با استفاده از - شماره ها را جدا نمایید</div>
                        <div class="stepInputBox">
                            <div class="stepInputBoxText">
                                <div class="stepInputBoxRequired">ایمیل</div>
                            </div>
                            <input class="stepInputBoxInput" id="email" type="email">
                        </div>
                        <div class="stepInputBox float-left">
                            <div class="stepInputBoxText">
                                <div class="stepInputBoxRequired">سایت</div>
                            </div>
                            <input class="stepInputBoxInput" id="website" type="url">
                        </div>

                    </div>
                </div>

                <div class="step3 bodyOfSteps hidden">
                    <div class="font-weight-400">

                        <div class="inputBody_1 inputBody">
                            @foreach($kindPlace['amaken']['features'] as $kind)
                                <div class="listItem">
                                    <div class="step5Title">{{$kind->name}}</div>
                                    <div class="subListItem">
                                        @foreach($kind->subFeat as $sub)
                                            <div class="detailListItem">
                                            <div class="display-inline-block">
                                                <input id="input_{{$sub->id}}" name="amakenFeature[]" type="checkbox">
                                                <label for="input_{{$sub->id}}">
                                                    <div class="display-inline-block">{{$sub->name}}</div>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="inputBody_3 inputBody">

                            <div class="listItem">
                                <div class="step5Title">نوع رستوران</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <select class="green-border-1">
                                            <option value="rest">رستوران</option>
                                            <option value="fastfood">فست فود</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @foreach($kindPlace['restaurant']['features'] as $kind)
                                <div class="listItem">
                                    <div class="step5Title">{{$kind->name}}</div>
                                    <div class="subListItem">
                                        @foreach($kind->subFeat as $sub)
                                            <div class="detailListItem">
                                                <div class="display-inline-block">
                                                    <input id="input_{{$sub->id}}" name="restaurantFeature[]" type="checkbox">
                                                    <label for="input_{{$sub->id}}">
                                                        <div class="display-inline-block">{{$sub->name}}</div>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="inputBody_4 inputBody">

                            <div class="listItem">
                                <div class="step5Title">نوع اقامتگاه</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <select name="hotelKind" id="hotelKind" class="green-border-1" onchange="changHotelKind(this.value)">
                                            <option value="0">...</option>
                                            <option value="1">هتل</option>
                                            <option value="2">هتل آپارتمان</option>
                                            <option value="3">مهمان سرا</option>
                                            <option value="4">ویلا</option>
                                            <option value="5">متل</option>
                                            <option value="6">مجتمع تفریحی</option>
                                            <option value="7">پانسیون</option>
                                            <option value="8">بوم گردی</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="hotelRate" class="listItem" style="display: none">
                                <div class="step5Title">هتل چند ستاره است؟</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <select name="hotelStar" id="hotelStar" class="green-border-1">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @foreach($kindPlace['hotel']['features'] as $kind)
                                <div class="listItem">
                                    <div class="step5Title">{{$kind->name}}</div>
                                    <div class="subListItem">
                                        @foreach($kind->subFeat as $sub)
                                            <div class="detailListItem">
                                                <div class="display-inline-block">
                                                    <input id="input_{{$sub->id}}" name="hotelFeature[]" type="checkbox">
                                                    <label for="input_{{$sub->id}}">
                                                        <div class="display-inline-block">{{$sub->name}}</div>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="inputBody_10_sanaye inputBody">
                            <div class="listItem">
                                <div class="step5Title">نوع</div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_1" value="jewelry" type="checkbox">
                                            <label for="sanaye_1">
                                                <div class="display-inline-block">زیورآلات</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_2" value="cloth" type="checkbox">
                                            <label for="sanaye_2">
                                                <div class="display-inline-block">پارچه و پوشیدنی</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_3" value="decorative" type="checkbox">
                                            <label for="sanaye_3">
                                                <div class="display-inline-block">لوازم تزئینی</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_4" value="applied" type="checkbox">
                                            <label for="sanaye_4">
                                                <div class="display-inline-block">لوازم کاربردی منزل</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">سبک</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_5" value="style_1" type="checkbox">
                                            <label for="sanaye_5">
                                                <div class="display-inline-block">سنتی</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_6" value="style_2" type="checkbox">
                                            <label for="sanaye_6">
                                                <div class="display-inline-block">مدرن</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_7" value="style_3" type="checkbox">
                                            <label for="sanaye_7">
                                                <div class="display-inline-block">تلفیقی</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title"></div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_8" value="fragile" type="checkbox">
                                            <label for="sanaye_8">
                                                <div class="display-inline-block">شکستنی</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">ابعاد</div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_9" value="size_1" name="sizeSanaye" type="radio">
                                            <label for="sanaye_9">
                                                <div class="display-inline-block">کوچک</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_10" value="size_2" name="sizeSanaye" type="radio">
                                            <label for="sanaye_10">
                                                <div class="display-inline-block">متوسط</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_11" value="size_3" name="sizeSanaye" type="radio">
                                            <label for="sanaye_11">
                                                <div class="display-inline-block">بزرگ</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">وزن</div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_12" value="weight_1" name="weiSanaye" type="radio">
                                            <label for="sanaye_12">
                                                <div class="display-inline-block">سبک</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_13" value="weight_2" name="weiSanaye" type="radio">
                                            <label for="sanaye_13">
                                                <div class="display-inline-block">متوسط</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_14" value="weight_3" name="weiSanaye" type="radio">
                                            <label for="sanaye_14">
                                                <div class="display-inline-block">سنگین</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">کلاس قیمتی</div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_15" value="price_1" name="priceSanaye" type="radio">
                                            <label for="sanaye_15">
                                                <div class="display-inline-block">ارزان</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_16" value="price_2" name="priceSanaye" type="radio">
                                            <label for="sanaye_16">
                                                <div class="display-inline-block">متوسط</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="sanaye_17" value="price_3" name="priceSanaye" type="radio">
                                            <label for="sanaye_17">
                                                <div class="display-inline-block">گران</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="inputBody_10_soghat inputBody">

                            <div class="listItem">
                                <div class="step5Title">مزه</div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="soghat_1" value="torsh" type="checkbox">
                                            <label for="soghat_1">
                                                <div class="display-inline-block">ترش</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="soghat_2" value="shirin" type="checkbox">
                                            <label for="soghat_2">
                                                <div class="display-inline-block">شیرین</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="soghat_3" value="talkh" type="checkbox">
                                            <label for="soghat_3">
                                                <div class="display-inline-block">تلخ</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="soghat_4" value="malas" type="checkbox">
                                            <label for="soghat_4">
                                                <div class="display-inline-block">ملس</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="soghat_5" value="shor" type="checkbox">
                                            <label for="soghat_5">
                                                <div class="display-inline-block">شور</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="soghat_6" value="tond" type="checkbox">
                                            <label for="soghat_6">
                                                <div class="display-inline-block">تند</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">ابعاد</div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="sizeSoghat" value="size_1" id="soghat_7" type="radio">
                                            <label for="soghat_7">
                                                <div class="display-inline-block">کوچک</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="sizeSoghat" value="size_2" id="soghat_8" type="radio">
                                            <label for="soghat_8">
                                                <div class="display-inline-block">متوسط</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="sizeSoghat" value="size_3" id="soghat_9" type="radio">
                                            <label for="soghat_9">
                                                <div class="display-inline-block">بزرگ</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">وزن</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="weiSoghat" value="weight_1" id="soghat_10" type="radio">
                                            <label for="soghat_10">
                                                <div class="display-inline-block">سبک</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="weiSoghat" value="weight_2" id="soghat_11" type="radio">
                                            <label for="soghat_11">
                                                <div class="display-inline-block">متوسط</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="weiSoghat" value="weight_3" id="soghat_12" type="radio">
                                            <label for="soghat_12">
                                                <div class="display-inline-block">سنگین</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">کلاس قیمتی</div>
                                <div class="subListItem">

                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="priceSoghta" value="price_1" id="soghat_13" type="radio">
                                            <label for="soghat_13">
                                                <div class="display-inline-block">ارزان</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="priceSoghta" value="price_2" id="soghat_14" type="radio">
                                            <label for="soghat_14">
                                                <div class="display-inline-block">متوسط</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input name="priceSoghta" value="price_3" id="soghat_15" type="radio">
                                            <label for="soghat_15">
                                                <div class="display-inline-block">گران</div>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="inputBody_11 inputBody">

                            <div class="listItem">
                                <div class="step5Title">نوع غذا</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <select id="foodKind" name="foodKind"  class="green-border-1">
                                            <option value="1">چلوخورش</option>
                                            <option value="2">خوراک</option>
                                            <option value="8">سوپ و آش</option>
                                            <option value="3">سالاد و پیش غذا</option>
                                            <option value="4">ساندویچ</option>
                                            <option value="5" selected="">کباب</option>
                                            <option value="6">دسر</option>
                                            <option value="7">نوشیدنی</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">غذا سرد است و یا گرم؟</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="food_1" value="cold" name="hotFood" type="radio">
                                            <label for="food_1">
                                                <div class="display-inline-block">سرد</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="food_2" value="hot" name="hotFood" type="radio">
                                            <label for="food_2">
                                                <div class="display-inline-block">گرم</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title"> مناسب چه افرادی است؟</div>
                                <div class="subListItem">
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="food_1" value="vegetarian" type="checkbox">
                                            <label for="food_1">
                                                <div class="display-inline-block">افراد گیاه‌خوار</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="food_2" value="vegan" type="checkbox">
                                            <label for="food_2">
                                                <div class="display-inline-block">وگان</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="detailListItem">
                                        <div class="display-inline-block">
                                            <input id="food_3" value="diabet" type="checkbox">
                                            <label for="food_3">
                                                <div class="display-inline-block">افراد مبتلا به دیابت</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title"> مواد لازم</div>
                                <div class="subListItem">
                                    <textarea name="material" id="material" rows="2" placeholder="مواد لازم" style="width: 100%; padding: 10px"> </textarea>
                                </div>
                            </div>

                            <div class="listItem">
                                <div class="step5Title">دستور پخت</div>
                                <div class="subListItem">
                                    <textarea name="recipes" id="recipes" rows="2" placeholder="دستور پخت" style="width: 100%; padding: 10px"> </textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="step4 bodyOfSteps hidden">
                    <div class="step6picBox">
                        <div class="step6pic" onclick="$('#dropModal').modal('show');">
                            <div class="step6plusText">اضافه کنید</div>
                            <div class="icons plus2 step6plusIcon"></div>
                        </div>
                        <div class="step6picText">نام عکس</div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade" id="mapModal">
        <div class="modal-dialog modal-lg" style="width: 95%;">
            <div class="modal-content">
                <div class="modal-body" style="direction: rtl">
                    <div id="map" style="width: 100%; height: 85vh; background-color: red"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer" style="text-align: center">
                    <button class="btn nextStepBtnTourCreation" data-dismiss="modal">
                        تایید
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="dropModal">
        <div class="modal-dialog modal-lg" style="width: 95%;">
            <div class="modal-content">
                <div class="modal-body" style="direction: rtl">
                    <div id="dropzone" class="dropzone"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer" style="text-align: center">
                    <button class="btn nextStepBtnTourCreation" data-dismiss="modal">
                        تایید
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script src="{{URL::asset('packages/dropzone/dropzone.js')}}"></script>
    <script src="{{URL::asset('packages/dropzone/dropzone-amd-module.js')}}"></script>

    <script defer>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $("#name").farsiInput();
            $("#address").farsiInput();
        });
    </script>

    <script>
        let myDropzone = new Dropzone("div#dropzone", {
            url: '{{route("addPlaceByUser.storeImg")}}',
            paramName: "pic",
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            parallelUploads: 1,
            acceptedFiles: 'image/*',
            init: function() {
                this.on("sending", function(file, xhr, formData){
                    formData.append("data", Data);
                });
            },
        }).on('success', function(file, response){
            response = JSON.parse(response);
            if(response['status'] == 'ok'){

            }
        });

        let categories = [
            {
                'name': 'مراکز اقامتی',
                'icon': 'hotel',
                'id'  : 4
            },
            {
                'name': 'جاذبه ها',
                'icon': 'atraction',
                'id'  : 1
            },
            {
                'name': 'رستوران',
                'icon': 'restaurant',
                'id'  : 3
            },
            {
                'name': 'سوغات',
                'icon': 'soghat',
                'id'  : 10
            },
            {
                'name': 'صنایع دستی',
                'icon': 'sanaye',
                'id'  : 10
            },
            {
                'name': 'غذای محلی',
                'icon': 'ghazamahali',
                'id'  : 11
            }
        ];
        let selectedCategory = null;
        let isPlace = true;
        let tryToGetFeatures = 3;

        categories.forEach((item, index) => {
            text =  '<div class="categories" onclick="selectCategory(this, ' + index + ');">\n' +
                '<div class="icons iconsOfCategories ' + item["icon"] + '"></div>\n' +
                '<div>' + item["name"] + '</div>\n' +
                '</div>';
            $('#selectCategoryDiv').append(text);
        });

        function selectCategory (elem, _categoryIndex) {
            $($('.choosedCategory')[0]).removeClass('choosedCategory');
            $(elem).addClass('choosedCategory');

            selectedCategory = categories[_categoryIndex];
            $('#nextStep').attr('disabled', false);

            categories.forEach(item => {
                $('.headerCategoryIcon').removeClass(item['icon']);
            });
            $('.headerCategoryIcon').addClass(selectedCategory['icon']);
            $('.headerCategoryName').text(selectedCategory['name']);

            if(selectedCategory['id'] == 10 || selectedCategory['id'] == 11) {
                $('#textForChooseCity').hide();
                $('#onlyForPlaces').hide();
                isPlace = false;
            }
            else{
                $('#onlyForPlaces').show();
                $('#textForChooseCity').show();
                isPlace = true;
            }

            createInputPlace();
        }

        var currentSteps = 0;
        function changeSteps(inc){

            $('#nextStep').attr('disabled', true);

            if(currentSteps == 1 && selectedCategory == null)
                return;
            else
                $('#nextStep').attr('disabled', false);


            if(inc == 1) {
                if (currentSteps == 0 || currentSteps == 1)
                    doChangeStep(inc);
                else if (currentSteps == 2 && checkStep2()) {
                    doChangeStep(inc);
                }
                else
                    doChangeStep(inc);

            }
            else
                doChangeStep(inc);

        }

        function doChangeStep(inc){
            $('.bodyOfSteps').addClass('hidden');
            $('.stepHeader').addClass('hidden');
            currentSteps += inc;

            if (currentSteps == 0) {
                $('#stepName').addClass('hidden');
                $('.selectCategoryDiv').addClass('hidden');
            }
            else {
                $('#stepName').removeClass('hidden');
                $('.selectCategoryDiv').removeClass('hidden');
            }

            if (currentSteps <= 0 || currentSteps >= 7)
                $('.steps').addClass('hidden');
            else
                $('.steps').removeClass('hidden');

//for change name of button in steps
            if (currentSteps < 0){
                document.location.href = '{{route('main')}}';
                currentSteps = 0;
            } else if(currentSteps == 0){
                $('#nextStep').html('شروع');
                $('#previousStep').html('بازگشت');
            }
            else if(currentSteps > 0 && currentSteps < 6){
                $('#nextStep').html('بعدی');
                $('#previousStep').html('قبلی');
            }
            else if(currentSteps == 6){
                $('#nextStep').html('تکمیل');
            }
            else if(currentSteps == 7){
                $('#nextStep').html('اتمام');
                $('#previousStep').addClass('hidden');
            }
            else if(currentSteps == 8){
                {{--document.location.href = '{{route('main')}}';--}}
                currentSteps = 7;
            }
//for change color of each box of step
            $('.step' + currentSteps).removeClass('hidden');

            $(".bigCircle, .littleCircle").removeClass('completeStep').each(function() {
                if($(this).attr('data-val') <= currentSteps)
                    $(this).addClass('completeStep');
            });

//for change name of step
            if (currentSteps == 1){
                $('#stepName').html('گام اول');
            } else if(currentSteps == 2){
                $('#stepName').html('گام دوم');
            } else if(currentSteps == 3){
                $('#stepName').html('گام سوم');
            } else if(currentSteps == 4){
                $('#stepName').html('گام چهارم');
            } else if(currentSteps == 5){
                $('#stepName').html('گام پنجم');
            } else if(currentSteps == 6){
                $('#stepName').html('گام آخر');
            } else if(currentSteps == 7){
                $('#stepName').html('موفق شدید');
            }

        }

        function checkStep2(){
            let name = $('#name').val();
            let city = $('#cityId').val();
            let notCity = $('#notCity').is(":checked");
            let error = true;


            if(name.trim().length == 0) {
                $('#name').parent().css('background', '#ffafaf');
                error = false;
            }
            else
                $('#name').parent().css('background', '#ebebeb');

            if(city == 0 && !notCity){
                $('#cityId').parent().css('background', '#ffafaf');
                error = false;
            }
            else
                $('#cityId').parent().css('background', '#ebebeb');

            if(isPlace){
                let lat = $('#lat').val();
                let lng = $('#lng').val();
                let address = $('#address').val();

                if(address.trim().length == 0){
                    $('#address').css('background', '#ffafaf');
                    error = false;
                }
                else
                    $('#address').css('background', '#ebebeb');

                if(lat == 0 || lng == 0){
                    alert('محل را از روی نقشه مشخص کنید');
                    error = false;
                }
            }

            return error;
        }

        function createInputPlace(){
            $('.inputBody').css('display', 'none');
            if(selectedCategory['id'] == 10)
                $('.inputBody_' + selectedCategory['id'] + '_' + selectedCategory['icon']).css('display', 'block');
            else
                $('.inputBody_' + selectedCategory['id']).css('display', 'block');
        }

        function changHotelKind(_value){
            if(_value == 1)
                $('#hotelRate').css('display', 'block');
            else
                $('#hotelRate').css('display', 'none');
        }

    </script>

    <script>
        let cities = null;
        function changeState(_value){
            if($('#noneState'))
                $('#noneState').remove();

            openLoading();
            $.ajax({
                type: 'post',
                url: '{{route("getCitiesDir")}}',
                data:{
                    _token: '{{csrf_token()}}',
                    stateId: _value,
                },
                success: function(response){
                    try{
                        cities = JSON.parse(response);
                        createSearchInput('findCity' ,'شهر خود را وارد کنید...');
                    }
                    catch (e) {
                        console.log(e)
                    }

                    closeLoading();
                },
                error: function(){
                    closeLoading()
                }
            })
        }

        function findCity(_element){
            let result = '';
            let likeCity = [];
            let value = _element.value;

            for(city of cities){
                if(city.name.indexOf(value) > -1)
                    likeCity.push(city);
            }

            likeCity.forEach(item => {
                result +=   '<div onclick="selectCity(this)" class="resultSearch" cityId="' + item.id + '">' +
                    '   <p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px">شهر ' + item.name + '</p>' +
                    '</div>';
            });

            setResultToGlobalSearch(result);
        }

        function selectCity(_element){
            closeSearchInput();
            let id = $(_element).attr('cityId');
            let name = $(_element).children().first().text();
            $('#cityName').val(name);
            $('#cityId').val(id);
        }

        function chooseCity(){
            if(cities == null){
                alert('ابتدا استان خود را مشخص کنید');
                return;
            }
            else
                createSearchInput('findCity' ,'شهر خود را وارد کنید...');
        }
    </script>

    <script>
        let marker = 0;
        let map;
        function init() {
            var mapOptions = {
                center: {lat: 32.427908, lng: 53.688046},
                zoom: 5,
                styles: [
                    {
                        "featureType": "landscape",
                        "stylers": [{"hue": "#FFA800"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                    }, {
                        "featureType": "road.highway",
                        "stylers": [{"hue": "#53FF00"}, {"saturation": -73}, {"lightness": 40}, {"gamma": 1}]
                    }, {
                        "featureType": "road.arterial",
                        "stylers": [{"hue": "#FBFF00"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
                    }, {
                        "featureType": "road.local",
                        "stylers": [{"hue": "#00FFFD"}, {"saturation": 0}, {"lightness": 30}, {"gamma": 1}]
                    }, {
                        "featureType": "water",
                        "stylers": [{"hue": "#00BFFF"}, {"saturation": 6}, {"lightness": 8}, {"gamma": 1}]
                    }]
            };

            map = document.getElementById('map');
            map = new google.maps.Map(map, mapOptions);

            google.maps.event.addListener(map, 'click', function(event) {
                getLat(event.latLng);
            });

            setNewMarker();
        }
        function getLat(location){
            if(marker != 0)
                marker.setMap(null);
            marker = new google.maps.Marker({
                position: location,
                map: map,
            });

            document.getElementById('lat').value = marker.getPosition().lat();
            document.getElementById('lng').value = marker.getPosition().lng();
        }

        function setNewMarker(){
            if(marker != 0)
                marker.setMap(null);
            let lat = document.getElementById('lat').value;
            let lng = document.getElementById('lng').value;

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lng),
                map: map,
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=init"></script>
@stop