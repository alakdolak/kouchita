@extends('layouts.bodyPlace')

@section('header')
    @parent
    <title>معرفی مطلب جدید</title>

    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/photo_albums_stacked.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/media_albums_extended.css')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/popUp.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=2')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/addPlaceByUser.css')}}' />
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css')}}' />

    <link rel="stylesheet" href="{{asset('packages/dropzone/basic.css')}}">
    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">

    <script src="{{URL::asset('js/autosize.min.js')}}"></script>

    <style>
        .stepsMilestoneMainDiv {
            display: inline-block;
            position: relative;
        }
        .textTopHeader{
            font-size: 22px;
            font-weight: bold;
            padding-bottom: 15px;
            text-align: center
        }

        .bodyStyle {
            width: 100%;
            min-height: 35vh;
            background-color: whitesmoke;
            direction: rtl;
            position: relative;
            display: flex;
            justify-content: center;
            padding-top: 30px;
            font-size: 1em !important;
            flex-direction: column;
            align-items: center;
        }
        .topSection{
            border: 3px solid #eab836;
            border-radius: 20px;
            background: white;
        }
        .box {
            position: relative;
            height: auto;
        }
        .lineBetweenDot{
            width: 3px;
            height: 5px;
            background-color: #053a3e;
        }
        .headerOfBox {
            background-color: #053a3e;
            color: white;
            padding: 15px;
            font-size: 2em;
            border-radius: 18px 18px 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .bodyOfBox {
            position: relative;
            display: flex;
            justify-content: space-between;
            padding: 15px;
            padding-top: 10px;
        }

        .stepTitle {
            font-size: 17px;
            font-weight: 600;
            text-align: justify;
        }

        .boxNotice {
            width: 75%;
            position: relative;
            bottom: 0;
            color: #963019;
            font-size: 17px;
        }

        .stepNotice {
            font-size: 17px;
            color: #963019;
        }

        .bodyOfSteps {
            position: relative;
            margin: 0 2%;
            width: 96%;
            padding: 3%;
            padding-top: 0px;
        }
        .footerBox1{
            background-color: #053a3e;
            padding: 5px;
            border: 3px solid #eab836;
            display: inline-block;
            justify-content: space-between;
            width: calc(100% - 230px);
            height: 56px;
        }
        .footerOfBox {
            height: 45px;
        }

        .btn:hover, .btn:active {
            color: white;
            opacity: 0.8;
            border-radius: 5px;
        }

        .btn:focus {
            color: white;
            border-radius: 5px;
        }

        .boxNextBtn {
            background: #0d6650;
            border-color: #0d6650;
            float: left;
            color: white;
            font-size: 30px;
            border-radius: 16px 0px 0px 16px;
            width: 115px;
            transition: .2s;
        }
        .boxNextBtn:hover{
            border-radius: 30px 0px 0px 30px !important;
        }

        .boxPreviousBtn {
            background: #720d19;
            border-color: #720d19;
            float: right;
            color: white;
            font-size: 30px;
            border-radius: 0px 16px 16px 0px;
            width: 115px;
            transition: .2s;
        }
        .boxPreviousBtn:hover{
            border-radius: 0px 30px 30px 0px !important;
        }

        .steps {
            border-radius: 50%;
            background-color: #053a3e;
        }

        .bigCircle {
            width: 25px;
            height: 25px;
        }

        .middleCircle {
            width: 17px;
            height: 17px;
            margin: 4px;
            z-index: 10;
            background-color: #ffffff;
            position: absolute;
            top: 0px;
        }

        .littleCircle {
            width: 9px;
            height: 9px;
            margin: 5px;
            z-index: 100;
            margin-right: 8px;
            position: absolute;
            top: 3px;
        }

        .completeStep {
            background-color: #720d19;
        }
        .completeStepCenter{
            background: #eab836;
        }
        #selectCategoryDiv{
            display: flex;
            justify-content: space-between;
        }

        .categories {
            margin: 1px;
            padding: 10px 0;
            width: 15%;
            display: inline-block;
            border: 3px solid #eab836;
            border-radius: 6px;
            cursor: pointer;
            font-size: 25px;
            transition: .2s;
            color: #eab836;
            background-color: #053a3e;
        }

        .categories:hover {
            border: 1.5px solid #30b4a6;
        }

        .selectCategoryDiv {
            width: 25%;
            display: flex;
            background-color: #053a3e;
            border-radius: 0px 0px 0px 17px;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 5px 0px;
            border: solid 3px #4dc7bc;
        }
        .stepHeader{
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 100%;
            padding-left: 20px;
        }
        .nameOfSelectCategory {
            font-weight: 500;
            color: #30b4a6;
            font-size: 17px;
        }

        .iconsOfCategories {
            font-size: 40px;
            direction: rtl;
            margin: 4% 1%;
            line-height: 40px;
            color: black;
            cursor: pointer;
            color: #eab836;
        }

        .iconOfSelectCategory {
            font-size: 30px;
            margin: 0;
            line-height: 40px;
            cursor: default;
            color: #4dc7bc;
        }

        .stepInputBox {
            display: flex !important;
            padding: 10px 7px;
            border: 2px solid #eab836;
            border-radius: 5px;
            background-color: #ebebeb;
            margin: 10px 0;
            font-size: 18px;
        }

        .stepInputBoxText {
            padding-left: 10px;
            border-left: 2px solid #eab836;
            display: inline-block;
        }
        .overMapButton{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }
        .mapButton{
            font-size: 25px;
            background: #0d6650;
            border-radius: 15px;
        }
        .mapButton:hover{
            font-size: 25px;
            background: #0d6650;
            border-radius: 15px;
        }
        .stepInputBoxInput {
            direction: rtl;
            text-align: center;
            border: none;
            background-color: transparent;
        }

        .stepInputBoxRequired {
            display: inline-block;
            position: relative
        }

        .stepInputIconRequired {
            font-size: 15px;
            color: #92321b;
            margin-left: 10px;
        }
        .inputFliedRow{
            display: flex;
            align-items: center;
        }
        .addresText {
            width: 100%;
            resize: none;
            border-radius: 5px;
            background-color: #EEEEEE;
            padding: 8px;
            margin: 12px 0 0;
            border: 2px solid #eab836;
        }
        .dotDiv{
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px 0px 0px 0px;
            border: solid 1px;
            padding: 0px 10px;
            background-color: #0d6650;
        }
        #stepName {
            font-size: 1em;
            position: relative;
            margin: 6px;
            font-weight: bold;
            color: #eab836;
        }

        #map {
            height: 150px;
            border: 1px solid #4DC7BC;
            border-radius: 5px;
            padding: 10px;
        }

        .mapBtn {
            background: #4DC7BC;
            border-color: #4DC7BC;
            color: white;
            width: 100%;
            margin: 10px 0;
        }

        .listItem {
            padding: 10px 0px;
            border-bottom: 1px solid #eab836;
        }

        .subListItem {
            display: inline-block;
            width: auto;
        }

        .detailListItem {
            display: inline-block;
            padding-left: 20px;
            min-width: 30%;
        }
        .selectInput{
            border: 3px solid #eab836;
            padding: 0px 15px;
            font-size: 20px;
            border-radius: 9px;
        }
        .deletedSlid{
            position: absolute;
            width: 100%;
            height: 0;
            background-color: #000000c7;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: .2s;
        }
        .step6pic:hover .deletedSlid{
            height: 100%;
        }


        .step5Title {
            display: inline-block;
            float: right;
            font-weight: bold;
            font-size: 24px;
            margin-left: 22px;
            padding-left: 26px;
            width: 100%;
            margin-bottom: 26px;
        }
        .detailListItem > div{
            font-size: 15px;
            margin: 5px 0px;
        }
        .detailListItem > div > label{
            cursor: pointer;
        }

        .step5Description {
            font-weight: 500;
            margin: 5px 0;
        }

        .step5NewPlace {
            margin: 5px 10px;
            display: inline-block;
            width: 100%;
        }

        .step5AddPlace {
            background: #4DC7BC;
            border-color: #4DC7BC;
            color: white;
            margin: 0 5px;
        }

        .step5RemovePlace {
            background: #963019;
            border-color: #963019;
            color: white;
        }

        .step6picBox {
            width: 150px;
            padding: 7px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        .step6pic {
            height: 130px;
            position: relative;
            color: #4DC7BC;
            background-color: #e5e5e5;
            border: 1px solid #cccccc;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            cursor: pointer;
            align-items: center;
        }

        .step6plusText {
            position: relative;
            font-size: 1.1em;
            font-weight: 500;
        }

        .step6plusIcon {
            position: relative;
            font-size: 3em;
        }

        .step6picText {
            padding: 10px;
        }

        /* Customize the label (the checkBoxDiv) */
        .checkBoxDiv {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-weight: 400;
            font-size: 19px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            padding-right: 30px;
        }

        /* Hide the browser's default checkbox */
        .checkBoxDiv input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 2px;
            height: 25px;
            right: 0px;
            width: 25px;
            background-color: #a7a7a7;
            border-radius: 8px;
        }

        /* On mouse-over, add a grey background color */
        .checkBoxDiv:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .checkBoxDiv input:checked ~ .checkmark {
            background-color: #44b390;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .checkBoxDiv input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .checkBoxDiv .checkmark:after {
            left: 10px;
            top: 7px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

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
        body{
            min-width: auto;
        }
        .innerPicAddPlace{
            width: 263px;
            height: 285px;
            position: absolute;
            top: -65px;
            left: -75px;
            z-index: 12;
        }
        .footerTextBoxAddPlace{
            padding: 10px 15px;
            font-size: 12px;
            line-height: 2;
            position: relative;
            text-align: center;
            bottom: 0px;
            right: 0px;
        }
        .addPlaceDropZone{
            min-height: 340px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .dragDropTextAddPlace{
            font-size: 14px;
            font-weight: bold;
            border: 2px dashed #9996;
            padding-top: 20px;
            text-align: center;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
            min-height: 300px;
        }
        .sampleDescription{
            border: solid 1px #eab836;
            border-radius: 8px;
            color: gray;
            padding: 15px;
            text-align: justify;
            font-size: 14px;
            margin-top: 15px;
        }
        .plusIcon{
            background: green;
            color: white;
            font-size: 35px;
            margin-right: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            cursor: pointer;
        }
        .showOnMobile{
            display: none;
        }
        .showOnPc{
            display: flex;
        }
        .step1Header{
            text-align: center;
            font-size: 30px;
            padding: 15px;
            font-weight: bold
        }
        .marginRight{
            margin-right: 40px
        }
        .matInputTopDiv{
            width: 49%;
        }
        .endSectionButton{
            width: 100%;
            border-radius: 30px 30px 30px 30px !important;
        }
        .endSectionFooter{
            display: none;
        }

        #materialRow{
            width: 100%;
        }
        .stepInputBoxMat{
            width: 100%;
        }
        @media (max-width: 1200px) {
            .container{
                width: auto;
            }
        }
        @media (max-width: 992px){
            .categories{
                font-size: 18px;
            }
        }

        @media (max-width: 900px){
            .showOnMobile{
                display: flex;
            }
            .showOnPc{
                display: none;
            }
            .stepTitle{
                font-size: 15px;
            }
            .headerOfBox{
                font-size: 1.6em;
            }
        }

        @media (max-width: 800px) {
            .step1Header{
                font-size: 25px;
            }
            .headerOfBox{
                flex-direction: column;
                text-align: center;
            }
            .stepsMilestoneMainDiv{
                margin-top: 15px;
            }
        }

        @media (max-width: 700px) {
            .bodyStyle{
                padding-top: 10px !important;
            }
            .textTopHeader{
                font-size: 18px;
            }
            #selectCategoryDiv{
                flex-wrap: wrap;
                justify-content: center;
            }
            .categories{
                width: 30%;
            }
            .box{
                width: 100%;
            }
            .inputFliedRow{
                flex-direction: column;
                align-items: baseline;
            }
            .inputFlied{
                flex-direction: row;
                width: 100%;
            }
            .marginRight{
                margin-right: 0px;
            }
            .stepInputBox{
                width: 100%;
            }
            .detailListItem{
                min-width: 49%;
            }
            .stepTitle{
                font-weight: 400;
                width: 100%;
                padding: 0;
                text-align: center;
                font-size: 14px;
                margin-bottom: 14px;
            }
            .bodyOfBox{
                flex-direction: column;
                align-items: center;
            }
            .selectCategoryDiv{
                width: 100%;
                align-items: center;
                flex-direction: row;
                justify-content: space-evenly;
            }
            .stepHeader{
                text-align: center;
                width: 100%;
                justify-content: center;
                align-items: center;
                padding: 0px;
            }
        }

        @media (max-width: 500px) {
            .stepTitle{
                font-size: 18px !important;
            }
            .stepHeader{
                width: auto;
            }
            .addresText{
                font-size: 15px !important;
            }
        }
    </style>

@stop

@section('main')
    <div class="container">
        <div class="bodyStyle">

            <div class="textTopHeader">
                امروز از هم جداییم ، اما برای فردای با هم بودن تلاش می کنیم
            </div>

            <div class="box">

                <div class="topSection">

                    <div class="headerOfBox">
                        <div style="display: inline-block">
                            معرفی و تبلیغ فعالیت شما به تمامی علاقه مندان به سفر
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
{{--                            <div class="boxNotice">از بین گزینه های زیر، مواردی را که <span class="headerCategoryName"></span> را توصیف می نماید اضافه کنید. سپاسگذاریم.</div>--}}
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
                        <div class="step1Header">لطفا دسته مناسب را با توجه به فعالیت خود انتخاب کنید.</div>
                        <div id="selectCategoryDiv" class="text-align-center"></div>
                    </div>

                    <div class="step2 bodyOfSteps hidden">
                        <div class="inputFliedRow inputFlied">
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
                            <div class="inputFliedRow inputFlied">
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

                            <div class="inputFliedRow inputFlied marginRight">
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
                                    <button class="btn btn-success mapButton" onclick="openMap()">محل را از روی نقشه مشخص کنید</button>
                                </div>

                                <div class="mg-tp-5" style="font-size: 15px; text-align: center">موقعیت موردنظر را بر روی نقشه پیدا نموده و پین را بر روی آن قرار دهید. (کلیک در کامپیوتر و لمس نقشه در گوشی)</div>
                            </div>

                            <div class="row inputFliedRow onlyForHotelsRestBoom ">
                                <div class="inputFliedRow inputFlied" style="display: flex; align-items: center">
                                    <div class="icons stepInputIconRequired redStar"></div>
                                    <div class="stepInputBox">
                                        <div class="stepInputBoxText">
                                            <div class="stepInputBoxRequired" style=" font-size: 13px; font-weight: bold;"> تلفن ثابت <span class="headerCategoryName"></span> </div>
                                        </div>
                                        <input class="stepInputBoxInput" id="fixPhone">
                                    </div>
                                </div>

                                <div class="inputFliedRow inputFlied marginRight">
                                    <div class="stepInputBox">
                                        <div class="stepInputBoxText">
                                            <div class="stepInputBoxRequired" style=" font-weight: bold; font-size: 13px;">تلفن همراه</div>
                                        </div>
                                        <div>
                                            <input class="stepInputBoxInput" id="phone" placeholder="09xxxxxxxxx" style="text-align: right; padding-right: 15px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stepNotice onlyForHotelsRestBoom">شماره را همانگونه که با موبایل خود تماس می گیرید وارد نمایید. در صورت وجود بیش از یک شماره با استفاده از - شماره ها را جدا نمایید</div>

                            <div class="row inputFliedRow onlyForHotelsRest" style="margin-top: 20px;">
                                <div class="inputFliedRow inputFlied">
                                    <div class="stepInputBox">
                                        <div class="stepInputBoxText">
                                            <div class="stepInputBoxRequired">سایت</div>
                                        </div>
                                        <input class="stepInputBoxInput" id="website" type="url">
                                    </div>
                                </div>
                                <div class="inputFliedRow inputFlied marginRight">
                                    <div class="stepInputBox">
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
                                                            {{$sub->name}}
                                                            <span class="checkmark"></span>
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
                                                        {{$sub->name}}
                                                        <span class="checkmark"></span>
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
                                                        {{$sub->name}}
                                                        <span class="checkmark"></span>
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
                                                زیورآلات
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input id="sanaye_2" name="sanayeFeature[]" value="cloth" type="checkbox">
                                                پارچه و پوشیدنی
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input id="sanaye_3" name="sanayeFeature[]" value="decorative" type="checkbox">
                                                لوازم تزئینی
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input id="sanaye_4" name="sanayeFeature[]" value="applied" type="checkbox">
                                                لوازم کاربردی منزل
                                                <span class="checkmark"></span>
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
                                                سنتی
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="sanayeFeature[]" value="style_2" type="checkbox">
                                                مدرن
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sanayeFeature[]" value="style_3" type="checkbox">
                                                تلفیقی
                                                <span class="checkmark"></span>
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
                                                شکستنی
                                                <span class="checkmark"></span>
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
                                                کوچک
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sizeSanaye" value="2" type="radio">
                                                متوسط
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="sizeSanaye" value="3" type="radio">
                                                بزرگ
                                                <span class="checkmark"></span>
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
                                                سبک
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="weiSanaye" value="2" type="radio">
                                                متوسط
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="weiSanaye" value="3" type="radio">
                                                سنگین
                                                <span class="checkmark"></span>
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
                                                ارزان
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="priceSanaye" value="2" type="radio">
                                                متوسط
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        <div class="detailListItem">

                                            <label class="checkBoxDiv">
                                                <input name="priceSanaye" value="3" type="radio">
                                                گران
                                                <span class="checkmark"></span>
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
                                                ترش
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="shirin" type="checkbox">
                                                شیرین
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="talkh" type="checkbox">
                                                تلخ
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="malas" type="checkbox">
                                                ملس
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="shor" type="checkbox">
                                                شور
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="soghatFeatures[]" value="tond" type="checkbox">
                                                تند
                                                <span class="checkmark"></span>
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
                                                کوچک
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sizeSoghat" value="2" type="radio">
                                                متوسط
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="sizeSoghat" value="3" type="radio">
                                                بزرگ
                                                <span class="checkmark"></span>
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
                                                سبک
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="weiSoghat" value="2" type="radio">
                                                متوسط
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="weiSoghat" value="3" type="radio">
                                                سنگین
                                                <span class="checkmark"></span>
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
                                                ارزان
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="priceSoghat" value="2" type="radio">
                                                متوسط
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="priceSoghat" value="3" type="radio">
                                                گران
                                                <span class="checkmark"></span>
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
                                                سرد
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="hotFood" value="hot" type="radio">
                                                گرم
                                                <span class="checkmark"></span>
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
                                                افراد گیاه‌خوار
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="foodFeatures[]" value="vegan" type="checkbox">
                                                وگان
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="detailListItem">
                                            <label class="checkBoxDiv">
                                                <input name="foodFeatures[]" value="diabet" type="checkbox">
                                                افراد مبتلا به دیابت
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title" style="display: flex; align-items: center;">
                                        مواد لازم
                                    </div>
                                    <div id="materialRow" class="subListItem">
                                        <div class="row" style="display: flex; justify-content: space-around; direction: ltr">
                                            <div class="matInputTopDiv">
                                                <div class="stepInputBox">
                                                    <input class="stepInputBoxInput stepInputBoxMat" id="materialVol_1" style="text-align: right; padding-right: 10px;" placeholder="مقدار" onchange="addNewRow(1)">
                                                </div>
                                            </div>

                                            <div class="matInputTopDiv">
                                                <div class="stepInputBox ">
                                                    <input class="stepInputBoxInput stepInputBoxMat" id="materialName_1" style="text-align: right; padding-right: 10px;" placeholder="چه چیزی نیاز است" onkeyup="changeMaterialName(this, 1)" onchange="addNewRow(1)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display: flex; justify-content: space-around; direction: ltr">
                                            <div class="matInputTopDiv">
                                                <div class="stepInputBox ">
                                                    <input class="stepInputBoxInput stepInputBoxMat" id="materialVol_2" style="text-align: right; padding-right: 10px;" placeholder="مقدار" onchange="addNewRow(2)">
                                                </div>
                                            </div>

                                            <div class="matInputTopDiv">
                                                <div class="stepInputBox ">
                                                    <input class="stepInputBoxInput stepInputBoxMat" id="materialName_2" style="text-align: right; padding-right: 10px;" placeholder="چه چیزی نیاز است" onkeyup="changeMaterialName(this, 2)" onchange="addNewRow(2)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display: flex; justify-content: space-around; direction: ltr">
                                            <div class="matInputTopDiv">
                                                <div class="stepInputBox ">
                                                    <input class="stepInputBoxInput stepInputBoxMat" id="materialVol_3" style="text-align: right; padding-right: 10px;" placeholder="مقدار" onchange="addNewRow(3)">
                                                </div>
                                            </div>

                                            <div class="matInputTopDiv">
                                                <div class="stepInputBox ">
                                                    <input class="stepInputBoxInput stepInputBoxMat" id="materialName_3" style="text-align: right; padding-right: 10px;" placeholder="چه چیزی نیاز است" onkeyup="changeMaterialName(this, 3)" onchange="addNewRow(3)">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="listItem">
                                    <div class="step5Title" style="margin-bottom: 0px">دستور پخت</div>
                                    <div class="subListItem" style="width: 100%;">
                                        <textarea class="addresText" name="recipes" id="recipes" rows="5" placeholder=" دستور پخت را اینجا وارد کنید..." style="width: 100%; padding: 10px; font-size: 20px"> </textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="inputBody_12 inputBody">

                                <div class="listItem" style="display: flex;">
                                    <div class="step5Title" style="width: auto">تعداد اتاق</div>
                                    <div class="subListItem">
                                        <div class="detailListItem">
                                            <input type="number" class="selectInput" id="room_num" name="room_num">
                                        </div>
                                    </div>
                                </div>

                                @foreach($kindPlace['boomgardy']['features'] as $kind)
                                    <div class="listItem">
                                        <div class="step5Title">{{$kind->name}}</div>
                                        <div class="subListItem">
                                            @foreach($kind->subFeat as $sub)
                                                <div class="detailListItem">
                                                    <label class="checkBoxDiv">
                                                        <input id="amaken_{{$sub->id}}" name="boomgardyFeature[]" value="{{$sub->id}}" type="checkbox">
                                                        {{$sub->name}}
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="step4 bodyOfSteps hidden" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                        <textarea class="addresText" name="placedescription" id="placedescription" rows="10" style="width: 100%; font-size: 20px" placeholder="توضیحات خود با توجه به نمونه متن پایین وارد کنید." ></textarea>
                        <div class="sampleDescription">
                            <div id="sampleText"></div>
                        </div>
                    </div>

                    <div class="step5 bodyOfSteps hidden" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                        <div id="addNewPic" class="step6picBox">
                            <label for="newPicAddPlace" class="step6pic showOnMobile">
                                <div class="step6plusText">اضافه کنید</div>
                                <div class="icons plus2 step6plusIcon"></div>
                            </label>
                            <input id="newPicAddPlace" type="file" style="display: none" onchange="addPhotoInMobile(this)">
                            <div class="step6pic showOnPc" onclick="$('#dropModal').modal('show');">
                                <div class="step6plusText">اضافه کنید</div>
                                <div class="icons plus2 step6plusIcon"></div>
                            </div>
                            <div class="step6picText">نام عکس</div>
                        </div>
                    </div>

                    <div class="step6 bodyOfSteps hidden" style="display: flex; flex-wrap: wrap; justify-content: space-around; flex-direction: column; text-align: center">
                        <div style="font-size: 20px; margin-top: 23px; text-align: center">
                            پس از بررسی و ویرایش اطلاعات وارد شده به بهترین نحو ممکن ،<span class="headerCategoryName"></span>شما مانند نمونه زیر به نمایش در خواهد امد.
                        </div>
                        <a id="sampleLink" href="" target="_blank" style="font-size: 30px; margin-top: 15px;"></a>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" style="direction: rtl; overflow: hidden">

                    <div class="startScreen infoScreen addPlaceDropZone">
                        <div class="inner" style="width: 100%">
                            <div class="innerPicAddPlace">
                                <img src="{{URL::asset('images/cropImagesIcons/bck.png')}}" width="100%">
                            </div>
                            <div id="dropzone" class="dropzone dragDropTextAddPlace"></div>
                        </div>
                        <div class="footerTextBoxAddPlace stFooter">
                            <span>توجه نمایید که عکس‌ما می‌بایست در فرمت های رایج تصویر و با حداکثر سایز 500 مگابایت باشد. تصاویر پیش از انتشار توسط ما بازبینی می‌گردد. لطفاً از بارگزاری تصاویری که با قوانین سایت مغایرت دارند اجتناب کنید.</span>
                            <span class="footerPolicyLink">صفحه مقررات</span>
                        </div>
                    </div>

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
                'kind': 'hotel',
                'icon': 'hotel',
                'id'  : 4,
                'text' : 'مهمانسرای ورزش شهر زیبا و دیدنی همدان از اقامتگاه‌های خوب این شهره که مجهز به امکانات رفاهی شایسته‌ای برای رفاه مسافران و مهمانان عزیزه. ورزشکاران محترم و تیم‌های ورزشی می تونن با اقامات توی این مهمانسرا علاوه بر استراحت از امکانات ویژه اون هم بهره ببرند. این مهمانسرا که در نزدیکی ورزشگاه شهید حاجی بابایی افتتاح شده، دارای چندین سالن مجزا و استاندار از جمله بدنسازی، زمین چمن و سالن‌های چندمنظوره انواع رشته‌های ورزشی هست که آماده میزبانی اقشار مختلف و به طور ویژه ورزشکاران عزیز هست.',
                'sample': {
                    'name': 'هتل کوثر',
                    'link': 'https://koochita.com/show-place-details/hotels/%D9%87%D8%AA%D9%84_%DA%A9%D9%88%D8%AB%D8%B1'
                }
            },
            {
                'name': 'جاذبه',
                'kind': 'atraction',
                'icon': 'atraction',
                'id'  : 1,
                'text' : 'منطقه حفاظت شده یخاب اصفهان به عنوان پناهگاه حیات وحش یخاب نیز شناخته می‌شود و در فاصله 20 کیلومتری از شهر ابوزیدآباد و در نزدیکی بند ریگ و کویر سیازگه ابوزیدآباد قرار دارد. وه تسمیه اسم این منطقه به دلیل وجود چشمه یخاب در دل ارتفاعات این منطقه است که در هوای گرم و سوزان تابستان نیز آبی خنک دارد.\n' +
                    'انواع پستانداران منطقه حفاظت شده یخاب شامل: کل و بز، قوچ و میش، گرگ، کفتار، گربه شنی، کاراکال و... است و پرندگانی مانند: عقاب طلائی، بالابان، هوبره، کبک، دودوک و... در این منطقه زندگی می‌کنند.\n' +
                    'اکو سیستم این منطقه و تنوع زیستگاه‌های موجود در آن جاذبه فراوانی برای علاقمندان به طبیعت و طبیعت‌گردی دارد. ورود به این منطقه دارای محدودیت‌هایی است. به دلیل قرار داشتن منطقه حفاظت شده یخاب در مجاورت پارک ملی و مهاجرت حیوانات به این منطقه در برخی فصول نیروهای حفاظتی این منطقه اقدام به گشت و کنترل در این منطقه می‌کنند. منطقه حفاظت شده یخاب در اوایل سال 1392 رسما به عنوان منطقه شکار ممنوع معرفی شد.',
                'sample': {
                    'name': 'حافظیه',
                    'link': 'https://koochita.com/show-place-details/amaken/%D8%AD%D8%A7%D9%81%D8%B8%DB%8C%D9%87'
                }
            },
            {
                'name': 'رستوران',
                'kind': 'restaurant',
                'icon': 'restaurant',
                'id'  : 3,
                'text' : '',
                'sample': {
                    'name': 'رستوران برادران کریم',
                    'link': 'https://koochita.com/show-place-details/restaurant/%D8%B1%D8%B3%D8%AA%D9%88%D8%B1%D8%A7%D9%86_%D8%A8%D8%B1%D8%A7%D8%AF%D8%B1%D8%A7%D9%86_%DA%A9%D8%B1%DB%8C%D9%85'
                }
            },
            {
                'name': 'سوغات',
                'icon': 'soghat',
                'kind': 'soghat',
                'id'  : 10,
                'text' : '',
                'sample': {
                    'name': 'کماج',
                    'link': 'https://koochita.com/show-place-details/sogatsanaie/%DA%A9%D9%85%D8%A7%D8%AC'
                }
            },
            {
                'name': 'صنایع دستی',
                'kind': 'sanaye',
                'icon': 'sanaye',
                'id'  : 10,
                'text' : '',
                'sample': {
                    'name': 'ترمه',
                    'link': 'https://koochita.com/show-place-details/sogatsanaie/%D8%AA%D8%B1%D9%85%D9%87'
                }
            },
            {
                'name': 'غذای محلی',
                'icon': 'ghazamahali',
                'kind': 'ghazamahali',
                'id'  : 11,
                'text' : '',
                'sample': {
                    'name': 'پلا کباب',
                    'link': 'https://koochita.com/show-place-details/mahalifood/%D9%BE%D9%84%D8%A7_%DA%A9%D8%A8%D8%A7%D8%A8'
                }
            },
            {
                'name': 'بوم گردی',
                'kind': 'boomgardy',
                'icon': 'hotel',
                'id'  : 12,
                'text' : '',
                'sample': {
                    'name': 'smaple',
                    'link': 'koochita.com'
                }
            }
        ];
        let selectedCategory = null;
        let isPlace = true;
        let tryToGetFeatures = 3;
        let newPlaceId = 0;

        let myDropzone = new Dropzone("div#dropzone", {
            url: '{{route("addPlaceByUser.storeImg")}}',
            paramName: "pic",
            dictDefaultMessage: 'به سادگی عکس های خود را در این قاب بی اندازید و یا کلیک کنید',
            timeout: 60000,
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

        }).on('error', function(file, response, err){
            $(file.previewElement).find('.dz-error-message').find('span').text('آپود عکس شما با مشکل مواجه شد دوباره تلاش کنید');
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
            $('.onlyForHotelsRestBoom').css('display', 'none');

            if(selectedCategory['id'] == 4 || selectedCategory['id'] == 3 )
                $('.onlyForHotelsRest').css('display', 'flex');

            if(selectedCategory['id'] == 4 || selectedCategory['id'] == 3 || selectedCategory['id'] == 12)
                $('.onlyForHotelsRestBoom').css('display', 'flex');

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

            $('#sampleText').text(selectedCategory['text']);
            $('#sampleLink').text(selectedCategory['sample']['name']);
            $('#sampleLink').attr('href', selectedCategory['sample']['link']);

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

            if(inc == 1) {
                if (currentSteps == 0 || currentSteps == 1) {
                    stepLog(currentSteps);
                    doChangeStep(inc);
                }
                else if (currentSteps == 2 && checkStep2()) {
                    stepLog(currentSteps);
                    doChangeStep(inc);
                }
                else if(currentSteps == 3 && checkStep3()) {
                    stepLog(currentSteps);
                    doChangeStep(inc);
                }
                else if(currentSteps == 4) {
                    stepLog(currentSteps);
                    storeData();
                }
                else if(currentSteps == 5 || currentSteps == 6) {
                    stepLog(currentSteps);
                    doChangeStep(inc);
                }
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
                $('#nextStep').html('اتمام و بازگشت به صفحه اصلی');
                $('#nextStep').addClass('endSectionButton');
                $('.footerBox1').addClass('endSectionFooter');
            }
            else if(currentSteps == 7){
                document.location.href = '{{route('main')}}';
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
                data['stateId'] = $('#state').val();
            data['address'] = $('#address').val();
            data['lat'] = $('#lat').val();
            data['lng'] = $('#lng').val();
            data['phone'] = $('#phone').val();
            data['fixPhone'] = $('#fixPhone').val();
            data['email'] = $('#email').val();
            data['website'] = $('#website').val();
            data['description'] = $('#placedescription').val();

            switch(selectedCategory['kind']){
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
                case 'boomgardy':
                    featureName = 'boomgardyFeature[]';
                    data['room_num'] = $('#room_num').val();
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
                    let material = [];
                    for(let i = 1; i <= nowMaterialRow; i++){
                        let mat = [];
                        mat[0] = $("#materialName_" + i).val();
                        mat[1] = $("#materialVol_" + i).val();
                        material.push(mat);
                    }
                    data['material'] = material;
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

                if(selectedCategory['id'] == 3 || selectedCategory['id'] == 4 || selectedCategory['id'] == 12){
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

        function changeMaterialName(_element, _num){
            let value = $(_element).val();
            text = 'مقدار ' + value;
            $('#materialVol_' + _num).attr('placeholder', text);
        }

        nowMaterialRow = 1;
        numMaterialRow = 3;
        function addNewRow(_num){
            if(nowMaterialRow == _num){
                let name = $('#materialName_' + _num).val();
                let vol = $('#materialVol_' + _num).val();
                if(name.trim().length > 0 && vol.trim().length > 0){
                    nowMaterialRow++;
                    numMaterialRow++;
                    text = '<div class="row" style="display: flex; justify-content: space-around; direction: ltr">\n' +
                        '<div class="matInputTopDiv">\n' +
                        '<div class="stepInputBox ">\n' +
                        '<input class="stepInputBoxInput stepInputBoxMat" id="materialVol_' + numMaterialRow + '" style="text-align: right; padding-right: 10px;" placeholder="مقدار" onchange="addNewRow(' + numMaterialRow + ')">\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '<div class="matInputTopDiv">\n' +
                        '<div class="stepInputBox ">\n' +
                        '<input class="stepInputBoxInput stepInputBoxMat" id="materialName_' + numMaterialRow + '" style="text-align: right; padding-right: 10px;" placeholder="چه چیزی نیاز است" onkeyup="changeMaterialName(this, ' + numMaterialRow + ')" onchange="addNewRow(' + numMaterialRow + ')">\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';

                    $('#materialRow').append(text);
                }
            }

        }

        function addPhotoInMobile(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formData = new FormData();
                    formData.append("_token", '{{csrf_token()}}');
                    formData.append("id", newPlaceId);
                    formData.append("pic", input.files[0]);

                    $.ajax({
                        type: 'post',
                        url : '{{route("addPlaceByUser.storeImg")}}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            try{
                                response = JSON.parse(response);
                                if(response['status'] == 'ok'){
                                    text =  '<div class="step6picBox">\n' +
                                        '  <div class="step6pic">' +
                                        '    <div class="deletedSlid">' +
                                        '             <button class="btn btn-danger" onclick="deleteThisPic(this, \'' + response['result'] + '\')">حذف تصویر</button>' +
                                        '        </div>\n' +
                                        '    <img src="' + e.target.result + '" style="max-height: 100%; max-width: 100%;">\n' +
                                        '  </div>\n' +
                                        '  <div class="step6picText">نام عکس</div>\n' +
                                        '</div>';

                                    $(text).insertBefore($('#addNewPic'));
                                }
                            }
                            catch (e) {}

                            $(input).val('');
                            $(input).files = null;

                        }
                    });

                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function stepLog(_step){
            $.ajax({
                type: 'post',
                url: '{{route("addPlaceByUser.createStepLog")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    step: _step
                },
                success: function(){},
                error: function(){}
            })
        }

    </script>

    <script>
        let cities = null;
        function changeState(_value){
            $('#cityId').val(0);
            $('#cityName').val('');

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

            valeu = value.trim();
            if(value.length > 1){
                for(city of cities){
                    if(city.name.indexOf(value) > -1)
                        likeCity.push(city);
                }

                likeCity.forEach(item => {
                    if(item.isVillage == 0)
                        cityKind = 'شهر' ;
                    else
                        cityKind = 'روستا' ;

                    result +=   '<div onclick="selectCity(this)" class="resultSearch" cityId="' + item.id + '">' +
                        '   <p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px">' + cityKind + ' ' + item.name + '</p>' +
                        '</div>';
                });

                if(result == ''){
                    result =   '<div onclick="selectCity(this)" class="resultSearch" cityId="-1">' +
                        '   <p class="suggest cursor-pointer font-weight-700" id="suggest_1" style="margin: 0px; color: blue; font-size: 20px !important;">' +
                        '<span id="newCityName">' + value + '</span> را اضافه کن</p>' +
                        '</div>';
                }

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
                openWarning('ابتدا استان خود را مشخص کنید.');
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

        function openMap(){
            let lat = 0;
            let lng = 0;
            let zoom = 10;
            let cityId = $('#cityId').val();

            var numbers = /^[0-9]+$/;

            if(cityId != 0 && cityId.match(numbers)){
                for(city of cities){
                    if(city['id'] == cityId){
                       lat = city['x'];
                       lng = city['y'];
                       zoom = 10;
                        break;
                    }
                }
            }
            else if(cityId != 0 && !cityId.match(numbers)){
                $numsss = 0;
                for(city of cities){
                    if(city['x'] != 0 && city['y'] != 0){
                        lat += city['x'];
                        lng += city['y'];
                        $numsss++;
                    }
                }
                lat /= $numsss;
                lng /= $numsss;
                zoom = 8;
            }

            if(lat != 0 && lng != 0){
                map.setZoom(zoom);
                map.panTo({
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                });
            }

            $('#mapModal').modal('show');
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=init"></script>
@stop