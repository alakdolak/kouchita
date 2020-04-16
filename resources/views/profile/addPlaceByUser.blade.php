@extends('layouts.bodyPlace')

@section('header')
    @parent
    <title>معرفی مطلب جدید</title>

    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/addPlaceByUser.css?v=1')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css')}}' />

    <link rel="stylesheet" href="{{asset('packages/dropzone/basic.css')}}">
    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">

    <script src="{{URL::asset('js/autosize.min.js')}}"></script>

    <style>
        .choosedCategory{
            border-color: #30b4a6;
            color :#30b4a6;
            border-radius: 50px;
            background-color: #053a3e;
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
    <div class="container">
        <div class="bodyStyle">

            <div style=" font-size: 22px; font-weight: bold; padding-bottom: 15px;">
                امروز از هم جداییم ، اما برای فردای با هم بودن تلاش می کنیم
            </div>

            <div class="box">

                <div class="topSection">

                    <div class="headerOfBox">
                        <div style="display: inline-block">
                            برای دوران پسا کرونا با قدرت ، تبلیغات رایگان و برنامه ریزی بهتری کنید.
                        </div>

                        <div class="stepsMilestoneMainDiv">
                            <div class="dotDiv">
                                <div id="stepName">اولین مرحله</div>
                                <div style="position: relative">
                                    <div data-val="1" class="steps bigCircle completeStep"></div>
                                    <div data-val="1" class="steps middleCircle"></div>
                                    <div data-val="1" class="steps littleCircle completeStep"></div>
                                </div>

                                <div class="lineBetweenDot"></div>

                                <div style="position: relative">
                                    <div data-val="2" class="steps bigCircle"></div>
                                    <div data-val="2" class="steps middleCircle"></div>
                                    <div data-val="2" class="steps littleCircle"></div>
                                </div>

                                <div class="lineBetweenDot"></div>

                                <div style="position: relative">
                                    <div data-val="3" class="steps bigCircle"></div>
                                    <div data-val="3" class="steps middleCircle"></div>
                                    <div data-val="3" class="steps littleCircle"></div>
                                </div>

                                <div class="lineBetweenDot"></div>

                                <div style="position: relative">
                                    <div data-val="4" class="steps bigCircle"></div>
                                    <div data-val="4" class="steps middleCircle"></div>
                                    <div data-val="4" class="steps littleCircle"></div>
                                </div>

                                <div class="lineBetweenDot"></div>

                                <div style="position: relative">
                                    <div data-val="5" class="steps bigCircle"></div>
                                    <div data-val="5" class="steps middleCircle"></div>
                                    <div data-val="5" class="steps littleCircle"></div>
                                </div>

                                <div class="lineBetweenDot"></div>

                                <div style="position: relative">
                                    <div data-val="6" class="steps bigCircle"></div>
                                    <div data-val="6" class="steps middleCircle"></div>
                                    <div data-val="6" class="steps littleCircle"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bodyOfBox">
                        <div class="step1 stepHeader">
                            <div class="stepTitle">پس از شیوع کرونا و با توجه به مشکلاتی که برای کسب و کار ها در حوزه سفر و گردشگری ایجاد شده ، تصمیم گرفتیم که بستری را به صورت رایگان فراهم کنیم تا صاحبان مشاغل و ایران گردان به معرفی کسب و کار خود و معرفی ایران عزیزمان بپردازید. لطفا در چند مرحله ساده، به پرسش های ما پاسخ دهید.</div>
                        </div>
                        <div class="step2 stepHeader hidden">
                            <div class="stepTitle" style="font-size: 23px">لطفا اطلاعات پایه را وارد نمایید.</div>
                            <div class="boxNotice">وارد نمودن اطلاعات ستاره دار اجباری است.</div>
                        </div>
                        <div class="step3 stepHeader hidden">
                            <div class="stepTitle">مهم ترین بخش ، توصیف <span class="headerCategoryName"></span> است</div>
                            <div class="boxNotice">از بین گزینه های زیر، مواردی را که <span class="headerCategoryName"></span> را توصیف می نماید اضافه کنید. سپاسگذاریم.</div>
                        </div>
                        <div class="step4 stepHeader hidden">
                            <div class="stepTitle">اگر توضیحات خاصی در مورد <span class="headerCategoryName"></span> دارید در این قسمت با ما در میان بگذارید</div>
                            <div class="boxNotice">از بین گزینه های زیر، مواردی را که <span class="headerCategoryName"></span> را توصیف می نماید اضافه کنید. سپاسگذاریم.</div>
                        </div>
                        <div class="step5 stepHeader hidden">
                            <div class="stepTitle">اگر عکسی از <span class="headerCategoryName"></span> دارید آن را بارگذاری نمایید</div>
                            <div class="boxNotice">شما می توانید به هر تعداد عکس که در اختیار دارید بارگزاری نمایید. در این صورت علاوه بر امتیاز تعریف و یا ویرایش مکان، امتیاز عکس نیز به شما تعلق می گیرد</div>
                        </div>
                        <div class="step6 stepHeader hidden">
                            <div class="stepTitle">
                                تمام اطلاعات به طور کامل دریافت شد. این اطلاعات پس از بررسی اعمال خواهد شد و امتیاز شما در پروفایل افزایش خواهد یافت. به ویرایش و اضافه کردن مقصد های جدید ادامه دهید تا علاوه بر افزایش امتیاز، نشان های افتخار متفاوتی برنده شوید.
                            </div>
                        </div>


                        <div class="selectCategoryDiv hidden">
                            <div class="headerCategoryIcon icons iconOfSelectCategory"></div>
                            <div class="headerCategoryName nameOfSelectCategory"></div>
                        </div>
                    </div>
                </div>

                <div class="bodySection">
                    <div class="step1 bodyOfSteps">
                        <div style="text-align: center; font-size: 30px; padding: 15px; font-weight: bold">لطفا دسته مناسب را با توجه به مقصد خود انتخاب کنید.</div>
                        <div id="selectCategoryDiv" class="text-align-center"></div>
                    </div>

                    <div class="step2 bodyOfSteps hidden">
                        <div class="inputFliedRow">
                            <div class="icons stepInputIconRequired redStar"></div>
                            <div class="stepInputBox">
                                <div class="stepInputBoxText">
                                    <div class="stepInputBoxRequired">
                                        نام
                                        <span class="headerCategoryName"></span>
                                    </div>
                                </div>
                                <input class="stepInputBoxInput" id="name">
                            </div>
                        </div>

                        <div class="inputFliedRow">
                            <div class="inputFliedRow">
                                <div class="icons stepInputIconRequired redStar"></div>
                                <div class="stepInputBox">
                                    <div style="display: flex; align-items: center">
                                        <div class="stepInputBoxText">
                                            <div class="stepInputBoxRequired">

                                                استان
                                            </div>
                                        </div>
                                        <select class="stepInputBoxInput" name="state" id="state" onchange="changeState(this.value)" style="padding-left: 20px">
                                            <option id="noneState" value="0">استان را انتخاب کنید</option>
                                            @foreach($states as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->name    }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="inputFliedRow" style="margin-right: 40px">
                                <div class="icons stepInputIconRequired redStar"></div>
                                <div class="stepInputBox float-left">
                                    <div class="stepInputBoxText">
                                        <div class="stepInputBoxRequired">شهر</div>
                                    </div>
                                    <input id="cityName" class="stepInputBoxInput" onclick="chooseCity()" readonly>
                                    <input id="cityId" type="hidden" value="0">
                                </div>
                            </div>
                        </div>

                        <div id="onlyForPlaces">
                            <div class="addressSection">
                                <div style="display: flex; justify-content: center; align-items: center">
                                    <div class="icons stepInputIconRequired redStar"></div>
                                    <textarea accept-charset="character_set" class="addresText" id="address" name="address" placeholder="آدرس دقیق محل را وارد نمایید - حداقل 100 کاراکتر" rows="2" style="font-size: 20px"></textarea>
                                </div>
                                <input type="hidden" name="lat" id="lat" value="0">
                                <input type="hidden" name="lng" id="lng" value="0">

                                <div class="overMapButton">
                                    <button class="btn btn-success mapButton" onclick="$('#mapModal').modal('show')">محل را از روی نقشه مشخص کنید</button>
                                </div>

                                <div class="mg-tp-5" style="font-size: 20px; text-align: center">موقعیت موردنظر را بر روی نقشه پیدا نموده و پین را بر روی آن قرار دهید. (کلیک در کامپیوتر و لمس نقشه در گوشی)</div>
                            </div>

                            <div class="row onlyForHotelsRest">
                                <div class="col-md-6" style="display: flex; align-items: center">
                                    <div class="icons stepInputIconRequired redStar"></div>
                                    <div class="stepInputBox" style="width: 100%">
                                        <div class="stepInputBoxText" style="width: 45%;">
                                            <div class="stepInputBoxRequired" style=" font-size: 13px; font-weight: bold;"> تلفن ثابت <span class="headerCategoryName"></span> </div>
                                        </div>
                                        <input class="stepInputBoxInput" id="fixPhone" style="width: 100%">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="stepInputBox" style="width: 100%">
                                        <div class="stepInputBoxText" style="width: 20%">
                                            <div class="stepInputBoxRequired" style=" font-weight: bold; font-size: 13px;">تلفن همراه</div>
                                        </div>
                                        <div style="width: 100%;">
                                            <input class="stepInputBoxInput" id="phone" placeholder="09xxxxxxxxx" style="width: 100%; text-align: right; padding-right: 15px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stepNotice">شماره را همانگونه که با موبایل خود تماس می گیرید وارد نمایید. در صورت وجود بیش از یک شماره با استفاده از - شماره ها را جدا نمایید</div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6">
                                    <div class="stepInputBox" style="width: 100%">
                                        <div class="stepInputBoxText">
                                            <div class="stepInputBoxRequired">سایت</div>
                                        </div>
                                        <input class="stepInputBoxInput" id="website" type="url">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stepInputBox" style="width: 100%">
                                        <div class="stepInputBoxText">
                                            <div class="stepInputBoxRequired">ایمیل</div>
                                        </div>
                                        <input class="stepInputBoxInput" id="email" type="email">
                                    </div>
                                </div>
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

                                                        <label class="checkBoxDiv">
                                                            <input id="amaken_{{$sub->id}}" name="amakenFeature[]" value="{{$sub->id}}" type="checkbox">
                                                            <span class="checkmark"></span>
                                                            {{$sub->name}}
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
                                            <select class="selectInput" id="restaurantKind">
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
                                                    <label class="checkBoxDiv">
                                                        <input id="amaken_{{$sub->id}}" name="restaurantFeature[]" value="{{$sub->id}}" type="checkbox">
                                                        <span class="checkmark"></span>
                                                        {{$sub->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="inputBody_4 inputBody">

                                <div class="listItem" style="display: flex">
                                    <div class="icons stepInputIconRequired redStar"></div>
                                    <div class="step5Title" style="width: auto;">نوع اقامتگاه</div>
                                    <div class="subListItem">
                                        <div class="detailListItem">
                                            <select name="hotelKind" id="hotelKind" class="selectInput" onchange="changHotelKind(this.value)">
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
                                            <select name="hotelStar" id="hotelStar" class="selectInput">
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
                                                    <label class="checkBoxDiv">
                                                        <input id="amaken_{{$sub->id}}" name="hotelFeature[]" value="{{$sub->id}}" type="checkbox">
                                                        <span class="checkmark"></span>
                                                        {{$sub->name}}
                                                    </label>
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
                                            <label class="checkBoxDiv">
                                                <input id="sanaye_1" name="sanayeFeature[]" value="jewelry" type="checkbox">
                                                <span class="checkmark"></span>
                                                زیورآلات
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input id="sanaye_2" name="sanayeFeature[]" value="cloth" type="checkbox">
                                                <span class="checkmark"></span>
                                                پارچه و پوشیدنی
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input id="sanaye_3" name="sanayeFeature[]" value="decorative" type="checkbox">
                                                <span class="checkmark"></span>
                                                لوازم تزئینی
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input id="sanaye_4" name="sanayeFeature[]" value="applied" type="checkbox">
                                                <span class="checkmark"></span>
                                                لوازم کاربردی منزل
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">سبک</div>
                                    <div class="subListItem">
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sanayeFeature[]" value="style_1" type="checkbox">
                                                <span class="checkmark"></span>
                                                سنتی
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="sanayeFeature[]" value="style_2" type="checkbox">
                                                <span class="checkmark"></span>
                                                مدرن
                                            </label>

                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sanayeFeature[]" value="style_3" type="checkbox">
                                                <span class="checkmark"></span>
                                                تلفیقی
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title"></div>
                                    <div class="subListItem">

                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="sanayeFeature[]" value="fragile" type="checkbox">
                                                <span class="checkmark"></span>
                                                شکستنی
                                            </label>

                                        </div>

                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">ابعاد</div>
                                    <div class="subListItem">

                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="sizeSanaye" value="1" type="radio">
                                                <span class="checkmark"></span>
                                                کوچک
                                            </label>

                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sizeSanaye" value="2" type="radio">
                                                <span class="checkmark"></span>
                                                متوسط
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="sizeSanaye" value="3" type="radio">
                                                <span class="checkmark"></span>
                                                بزرگ
                                            </label>

                                        </div>

                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">وزن</div>
                                    <div class="subListItem">

                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="weiSanaye" value="1" type="radio">
                                                <span class="checkmark"></span>
                                                سبک
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="weiSanaye" value="2" type="radio">
                                                <span class="checkmark"></span>
                                                متوسط
                                            </label>

                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="weiSanaye" value="3" type="radio">
                                                <span class="checkmark"></span>
                                                سنگین
                                            </label>

                                        </div>

                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">کلاس قیمتی</div>
                                    <div class="subListItem">

                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="priceSanaye" value="1" type="radio">
                                                <span class="checkmark"></span>
                                                ارزان
                                            </label>

                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="priceSanaye" value="2" type="radio">
                                                <span class="checkmark"></span>
                                                متوسط
                                            </label>

                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="priceSanaye" value="3" type="radio">
                                                <span class="checkmark"></span>
                                                گران
                                            </label>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="inputBody_10_soghat inputBody">

                                <div class="listItem">
                                    <div class="step5Title">مزه</div>
                                    <div class="subListItem">

                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="torsh" type="checkbox">
                                                <span class="checkmark"></span>
                                                ترش
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="shirin" type="checkbox">
                                                <span class="checkmark"></span>
                                                شیرین
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="talkh" type="checkbox">
                                                <span class="checkmark"></span>
                                                تلخ
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="malas" type="checkbox">
                                                <span class="checkmark"></span>
                                                ملس
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="shor" type="checkbox">
                                                <span class="checkmark"></span>
                                                شور
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="tond" type="checkbox">
                                                <span class="checkmark"></span>
                                                تند
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">ابعاد</div>
                                    <div class="subListItem">

                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sizeSoghat" value="1" type="radio">
                                                <span class="checkmark"></span>
                                                کوچک
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sizeSoghat" value="2" type="radio">
                                                <span class="checkmark"></span>
                                                متوسط
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sizeSoghat" value="3" type="radio">
                                                <span class="checkmark"></span>
                                                بزرگ
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">وزن</div>
                                    <div class="subListItem">
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="weiSoghat" value="1" type="radio">
                                                <span class="checkmark"></span>
                                                سبک
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="weiSoghat" value="2" type="radio">
                                                <span class="checkmark"></span>
                                                متوسط
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="weiSoghat" value="3" type="radio">
                                                <span class="checkmark"></span>
                                                سنگین
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">کلاس قیمتی</div>
                                    <div class="subListItem">

                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="priceSoghat" value="1" type="radio">
                                                <span class="checkmark"></span>
                                                ارزان
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="priceSoghat" value="2" type="radio">
                                                <span class="checkmark"></span>
                                                متوسط
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="priceSoghat" value="3" type="radio">
                                                <span class="checkmark"></span>
                                                گران
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="inputBody_11 inputBody">

                                <div class="listItem">
                                    <div class="step5Title">نوع غذا</div>
                                    <div class="subListItem">
                                        <div class="detailListItem">
                                            <select id="foodKind" name="foodKind"  class="selectInput">
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
                                            <label class="checkBoxDiv">
                                                <input name="hotFood" value="cold" type="radio">
                                                <span class="checkmark"></span>
                                                سرد
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="hotFood" value="hot" type="radio">
                                                <span class="checkmark"></span>
                                                گرم
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title"> مناسب چه افرادی است؟</div>
                                    <div class="subListItem">
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="foodFeatures[]" value="vegetarian" type="checkbox">
                                                <span class="checkmark"></span>
                                                افراد گیاه‌خوار
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="foodFeatures[]" value="vegan" type="checkbox">
                                                <span class="checkmark"></span>
                                                وگان
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="foodFeatures[]" value="diabet" type="checkbox">
                                                <span class="checkmark"></span>
                                                افراد مبتلا به دیابت
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title"> مواد لازم</div>
                                    <div class="subListItem">
                                        <textarea class="addresText" name="material" id="material" rows="2" placeholder="مواد لازم" style="width: 100%; padding: 10px"> </textarea>
                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title">دستور پخت</div>
                                    <div class="subListItem">
                                        <textarea class="addresText" name="recipes" id="recipes" rows="2" placeholder="دستور پخت" style="width: 100%; padding: 10px"> </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="step4 bodyOfSteps hidden" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                        <textarea class="addresText" name="placedescription" id="placedescription" rows="10" style="width: 100%; font-size: 20px" placeholder="متن مورد نظر خود را وارد کنید" ></textarea>
                    </div>

                    <div class="step5 bodyOfSteps hidden" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                        <div id="addNewPic" class="step6picBox">
                            <div class="step6pic" onclick="$('#dropModal').modal('show');">
                                <div class="step6plusText">اضافه کنید</div>
                                <div class="icons plus2 step6plusIcon"></div>
                            </div>
                            <div class="step6picText">نام عکس</div>
                        </div>
                    </div>
                </div>

                <div class="downBody">
                    <button class="btn boxPreviousBtn" type="button" id="previousStep" onclick="changeSteps(-1)">بازگشت</button>
                    <div class="footerBox1"></div>
                    <button class="btn boxNextBtn" type="button" id="nextStep" onclick="changeSteps(1)" >شروع</button>
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
            $("#recipes").farsiInput();
            $("#material").farsiInput();
            $("#placedescription").farsiInput();

            autosize($('textarea'));

        });
    </script>

    <script>
        let categories = [
            {
                'name': 'مرکز اقامتی',
                'icon': 'hotel',
                'id'  : 4
            },
            {
                'name': 'جاذبه',
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
        let newPlaceId = 0;

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
                    formData.append("id", newPlaceId);
                });
            },
        }).on('success', function(file, response){
            response = JSON.parse(response);
            if(response['status'] == 'ok'){
                 text =  '<div class="step6picBox">\n' +
                         '  <div class="step6pic">' +
                         '    <div class="deletedSlid">' +
                     '             <button class="btn btn-danger" onclick="deleteThisPic(this, \'' + response['result'] + '\')">حذف تصویر</button>' +
                     '        </div>\n' +
                         '    <img src="' + file['dataURL'] + '" style="max-height: 100%; max-width: 100%;">\n' +
                         '  </div>\n' +
                         '  <div class="step6picText">نام عکس</div>\n' +
                         '</div>';
                $(text).insertBefore($('#addNewPic'));
            }
            else
                myDropzone.removeFile(file);

        });

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

            $('.selectCategoryDiv').removeClass('hidden');

            categories.forEach(item => {
                $('.headerCategoryIcon').removeClass(item['icon']);
            });
            $('.headerCategoryIcon').addClass(selectedCategory['icon']);
            $('.headerCategoryName').text(selectedCategory['name']);

            $('.onlyForHotelsRest').css('display', 'none');
            if(selectedCategory['id'] == 4 || selectedCategory['id'] == 3)
                $('.onlyForHotelsRest').css('display', 'flex');

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

        let currentSteps = 1;
        function changeSteps(inc){

            $('#nextStep').attr('disabled', true);

            if(currentSteps == 1 && selectedCategory == null)
                return;
            else {
                $('#nextStep').attr('disabled', false);
            }

            console.log(currentSteps);

            if(inc == 1) {
                if (currentSteps == 0 || currentSteps == 1)
                    doChangeStep(inc);
                else if (currentSteps == 2 && checkStep2())
                    doChangeStep(inc);
                else if(currentSteps == 3 && checkStep3())
                    doChangeStep(inc);
                else if(currentSteps == 4)
                    storeData();
            }
            else
                doChangeStep(inc);

        }

        function deleteThisPic(_element, _name){
            $.ajax({
                type: 'post',
                url: '{{route("addPlaceByUser.deleteImg")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    name: _name,
                    id: newPlaceId
                },
                success: function(response){
                    try {
                        response = JSON.parse(response);
                        if(response['status'] == 'ok')
                            $(_element).parent().parent().parent().remove();
                    }
                    catch (e) {
                        console.log(e);
                    }
                },
                error: function(error){

                }
            })
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
            else if(currentSteps > 0 && currentSteps < 3){
                $('#nextStep').html('بعدی');
                $('#previousStep').html('بازگشت');
            }
            else if(currentSteps == 4){
                $('#nextStep').html('ذخیره');
                $('#previousStep').html('بازگشت');
            }
            else if(currentSteps == 5){
                $('#nextStep').html('بعدی');
                $('.footerBox1').css('width', 'calc(100% - 115px)');
                $('#previousStep').css('display', 'none');
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
                $('#stepName').html('اولین مرحله');
            } else if(currentSteps == 2){
                $('#stepName').html('دومین مرحله');
            } else if(currentSteps == 3){
                $('#stepName').html('سومین مرحله');
            } else if(currentSteps == 4){
                $('#stepName').html('چهارمین مرحله');
            } else if(currentSteps == 5){
                $('#stepName').html('پنجمین مرحله');
            } else if(currentSteps == 6){
                $('#stepName').html('ششمین مرحله');
            } else if(currentSteps == 7) {
                $('#stepName').html('موفق شدید');
            }
        }

        function storeData(){
            openLoading();

            let data = {};
            let featureName;

            data['kindPlaceId'] = selectedCategory['id'];
            data['name'] = $('#name').val();
            data['cityId'] = $('#cityId').val();
            data['address'] = $('#address').val();
            data['lat'] = $('#lat').val();
            data['lng'] = $('#lng').val();
            data['phone'] = $('#phone').val();
            data['fixPhone'] = $('#fixPhone').val();
            data['email'] = $('#email').val();
            data['website'] = $('#website').val();
            data['description'] = $('#placedescription').val();

            switch(selectedCategory['icon']){
                case 'atraction':
                    featureName = 'amakenFeature[]';
                    break;
                case 'restaurant':
                    featureName = 'restaurantFeature[]';
                    data['restaurantKind'] = $('#restaurantKind').val();
                    break;
                case 'hotel':
                    featureName = 'hotelFeature[]';
                    data['hotelKind'] = $('#hotelKind').val();
                    data['hotelStar'] = $('#hotelStar').val();
                    break;
                case 'soghat':
                    featureName = 'soghatFeatures[]';
                    data['eatable'] = 1;
                    data['size'] = $('input[name="sizeSoghat"]:checked').val();
                    data['weight'] = $('input[name="weiSoghat"]:checked').val();
                    data['price'] = $('input[name="priceSoghat"]:checked').val();
                    break;
                case 'sanaye':
                    featureName = 'sanayeFeature[]';
                    data['eatable'] = 0;
                    data['size'] = $('input[name="sizeSanaye"]:checked').val();
                    data['weight'] = $('input[name="weiSanaye"]:checked').val();
                    data['price'] = $('input[name="priceSanaye"]:checked').val();
                    break;
                case 'ghazamahali':
                    featureName = 'foodFeatures[]';
                    data['kind'] = $('#foodKind').val();
                    data['material'] = $('#material').val();
                    data['recipes'] = $('#recipes').val();
                    data['hotFood'] = $('input[name="hotFood"]:checked').val();
                    break;
            }

            vals = $("input[name='" + featureName + "']").map(function(){
                return [$(this).is(":checked") ? $(this).val() : '-'];
            }).get();
            data['features'] = [];
            vals.forEach(item => {
                if(item != '-')
                    data['features'].push(item);
            });

            data = JSON.stringify(data);

            $.ajax({
                type: 'post',
                url : '{{route("addPlaceByUser.store")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    data: data
                },
                success: function (response) {
                    try {
                        response = JSON.parse(response);
                        if(response['status'] == 'ok'){
                            newPlaceId = response['result'];
                            doChangeStep(1);
                        }
                        else
                            console.log(response['status']);

                        closeLoading();
                    }
                    catch (e) {
                        console.log(e);
                        closeLoading();
                    }
                },
                error: function(err){
                    console.log(err);
                    closeLoading();
                }
            });

        }

        function checkStep2(){
            let name = $('#name').val();
            let city = $('#cityId').val();
            let error = true;


            if(name.trim().length == 0) {
                $('#name').parent().css('background', '#ffafaf');
                error = false;
            }
            else
                $('#name').parent().css('background', '#ebebeb');

            if(city == 0){
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
                    openWarning('فیلد های ستاره دار پر کنید و محل را بر روی نقشه مشخص کنید');
                    error = false;
                }

                if(selectedCategory['id'] == 3 || selectedCategory['id'] == 4){
                    let fixPhone = $('#fixPhone').val();
                    if(fixPhone.trim().length == 0){
                        $('#fixPhone').parent().css('background', '#ffafaf');
                        error = false;
                    }
                    else
                        $('#fixPhone').parent().css('background', '#ebebeb');
                }
            }

            return error;
        }

        function checkStep3(){
            if(selectedCategory['id'] == 4){
                let kind = $('#hotelKind').val();
                if(kind == 0){
                    openWarning('نوع اقامتگاه خود را مشخص کنید.');
                    return false;
                }
            }

            return true;

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

            if(value.trim().length > 1){
                for(city of cities){
                    if(city.name.indexOf(value) > -1)
                        likeCity.push(city);
                }

                result +=   '<div onclick="selectCity(this)" class="resultSearch" cityId="-1">' +
                    '   <p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px; color: blue; font-size: 20px !important;">' +
                    '<span id="newCityName">' + value + '</span> را اضافه کن</p>' +
                    '</div>';

                likeCity.forEach(item => {
                    result +=   '<div onclick="selectCity(this)" class="resultSearch" cityId="' + item.id + '">' +
                        '   <p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px">شهر ' + item.name + '</p>' +
                        '</div>';
                });

                setResultToGlobalSearch(result);
            }
            else
                setResultToGlobalSearch('');
        }

        function selectCity(_element){
            closeSearchInput();
            let id = $(_element).attr('cityId');
            let name;
            if(id == -1) {
                name = $("#newCityName").text();
                id = name;
            }
            else
                name = $(_element).children().first().text();

            $('#cityName').val(name);
            $('#cityId').val(id);
        }

        function chooseCity(){
            if(cities == null){
                openWarning('ابتدا استان خود را مشخص کنید.')
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