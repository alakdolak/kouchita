<?php $placeMode = "ticket";
$state = "تهران";
$kindPlaceId = 10; ?>
        <!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    @include('layouts.phonePopUp')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/home_rebranded.css?v=4')}}"/>
    <title>صفحه اصلی</title>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=2')}}"/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/masthead-saves.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' media='screen, print'
          href='{{URL::asset('css/theme2/hr_north_star.css?v=2')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/passStyle.css?v=1')}}'/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/shazdeDesigns/tourCreation.css')}}"/>

    <script src= {{URL::asset("js/calendar.js") }}></script>
    <script src= {{URL::asset("js/jalali.js") }}></script>

    <style>
        .chooseTourKind{
            background: rgb(77, 199, 188) !important;
            color: white !important;
        }
        @for($i = 0; $i < count($tourKind); $i++)
            #tourKind{{$i}}:before{
                content: '\{{$tourKind[$i]->icon}}';
                font-family: shazdemosafer-tour;
            }
        @endfor

        .tourLevelIcons::before{
            WIDTH: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }
        .tourLevelIcons{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            cursor: pointer;
        }
        .tourKindIcons:hover{
            background: #4dc7bc;
        }
        @for($i = 0; $i < count($tourDifficult); $i++)
            #tourDifficult{{$i}}:before{
                content: '\{{$tourDifficult[$i]->icon}}';
                font-family: shazdemosafer-tour;
            }
        @endfor
    </style>
</head>

<body id="BODY_BLOCK_JQUERY_REFLOW"
      class=" r_map_position_ul_fake ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back">

<div id="PAGE" class="filterSearch redesign_2015 non_hotels_like desktop scopedSearch">
    @include('layouts.placeHeader')
    <div class="ppr_rup ppr_priv_hr_atf_north_star_nostalgic">

        <div class="atf_header_wrapper">
            <div class="atf_header ui_container is-mobile full_width">

                <div class="ppr_rup ppr_priv_location_detail_header relative-position">
                    <h1 id="HEADING" property="name">
                        <b class="tourCreationMainTitle">شما در حال ایجاد یک تور جدید هستید</b>
                    </h1>
                    <div class="tourAgencyLogo circleBase type2"></div>
                    <b class="tourAgencyName">آژانس ستاره طلایی</b>
                </div>
            </div>
        </div>

        <div class="atf_meta_and_photos_wrapper">
            <div class="atf_meta_and_photos ui_container is-mobile easyClear">
                <div class="prw_rup darkGreyBox tourDetailsMainFormHeading">
                    <b class="formName">اطلاعات تور</b>
                    <div class="tourCreationStepInfo">
                        <span>
                            گام
                            <span>1</span>
                            از
                            <span>--</span>
                        </span>
                        <span>
                            آخرین ویرایش
                            <span>تاریخ</span>
                            <span>ساعت</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tourDetailsMainForm1stStepMainDiv" class="Hotel_Review prodp13n_jfy_overflow_visible lightGreyBox">
        <form method="post" action="{{route('tour.create.stage.one')}}">
            {!! csrf_field() !!}
            <input type="hidden" name="kind" id="kind">
            <div class="ui_container">
                <div class="menu ui_container whiteBox" id="">
                    <div id="tourNameInputBoxMainDiv">
                        <div class="inputBoxGeneralInfo inputBox" id="tourNameInputBox">
                            <div class="inputBoxTextGeneralInfo inputBoxText">
                                <div>
                                    نام تور
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" name="name" placeholder="فارسی">
                        </div>
                    </div>
                    <span class="inboxHelpSubtitle">
                        با وارد کردن نام شهر گزینه‌های موجود نمایش داده می‌شود تا از بین آن‌ها انتخاب نمایید. اگر نام شهر خود را نیافتید از گزینه‌ی اضافه کردن استفاده نمایید. توجه کنید اگر مبدأ یا مقصد شما جاذبه می‌باشد، آن را وارد نمایید.
                    </span>
                    <div class="InlineTourInputBoxesMainDiv">
                        <div class="inputBoxGeneralInfo inputBox InlineTourInputBoxes" id="tourOriginInputBox">
                            <div class="inputBoxTextGeneralInfo inputBoxText">
                                <div>
                                    مبدأ
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" name="src" placeholder="فارسی">
                        </div>
                    </div>
                    <div class="InlineTourInputBoxesMainDiv">
                        <div class="inputBoxGeneralInfo inputBox InlineTourInputBoxes" id="tourDestinationInputBox">
                            <div class="inputBoxTextGeneralInfo inputBoxText">
                                <div>
                                    مقصد
                                    <span>*</span>
                                </div>
                            </div>
                            <input class="inputBoxInput" type="text" name="dest" placeholder="فارسی">
                            <div id="destinationListTourCreation" class="hidden-div">
                                <div id="addNewDestinationTourCreation">
                                    اضافه کردن فارسی
                                </div>
                                <div>
                                    <span>استان فارس</span>
                                </div>
                                <div>
                                    <span>آبشار فارس در شیراز</span>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function () {
                                $('#tourDestinationInputBox').click(function () {
                                    $('#destinationListTourCreation').toggle()
                                });
                                $('#addNewDestinationTourCreation').click(function () {
                                    $('#modalAddNewDestinationBoxTourCreation').toggle()
                                });
                            })
                        </script>
                    </div>
                    <div>
                        <input ng-model="sort" type="checkbox" id="c01" value="rate"/>
                        <label for="c01">
                            <span></span>
                        </label>
                        <span id="cityTourCheckBoxLabel">
                            تور من شهرگردی است و مبدأ و مقصد آن یکی است.
                        </span>
                    </div>
                </div>
            </div>

            <div class="ui_container">
                <div class="menu ui_container whiteBox">
                    <div id="tourKindChoseTitleTourCreation">
                        <span>نوع تور خود را مشخص کنید.</span>
                        <span>آیا نیازمند راهنمایی هستید؟</span>
                    </div>
                    <center class="tourKindIconsTourCreation">

                        @for($i = 0; $i < count($tourKind); $i++)
                            <input ng-model="sort" type="checkbox" id="c1{{$i}}" value="{{$tourKind[$i]->id}}" onclick="chooseTourKind({{$i}}, this.value)"/>
                            <label for="c1{{$i}}" style="cursor: pointer;" onmouseover="changeKindColorToHover({{$i}})" onmouseleave="changeColorToLeave({{$i}})">
                                <p id="tourKind{{$i}}" class="tourKindIcons"></p>
                                <p id="cityKindTourName" class="tourKindNames">{{$tourKind[$i]->name}}</p>
                            </label>
                        @endfor

                    </center>
                    <div class="inboxHelpSubtitle">انتخاب بیش از یک گزینه مجاز می‌باشد</div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox" id="">
                    <div id="tourLevelChoseTitleTourCreation">
                        <span>درجه سختی تور خود را مشخص کنید.</span>
                        <span>آیا نیازمند راهنمایی هستید؟</span>
                    </div>
                    <center class="tourLevelIconsTourCreation">
                        @for($i = 0; $i < count($tourDifficult); $i++)
                            <input ng-model="sort" type="{{$tourDifficult[$i]->alone == 0 ? 'checkbox' : 'radio'}}" name="difficult[]" id="c3{{$i}}" value="{{$tourDifficult[$i]->id}}" onclick="chooseDifficult({{$i}}, this.value, {{$tourDifficult[$i]->alone}})"/>
                            <label for="c3{{$i}}">
                                <p id="tourDifficult{{$i}}" class="tourLevelIcons"></p>
                                <sub>{{$tourDifficult[$i]->name}}</sub>
                            </label>
                        @endfor

                        {{--<input ng-model="sort" type="radio" id="c31" value="rate"/>--}}
                        {{--<label for="c31">--}}
                            {{--<p id="easyLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>آسان</sub>--}}
                        {{--</label>--}}

                        {{--<input ng-model="sort" type="radio" id="c32" value="rate"/>--}}
                        {{--<label for="c32">--}}
                            {{--<p id="lightLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>سبک</sub>--}}
                        {{--</label>--}}

                        {{--<input ng-model="sort" type="radio" id="c33" value="rate"/>--}}
                        {{--<label for="c34">--}}
                            {{--<p id="activeLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>پرتحرک</sub>--}}
                        {{--</label>--}}

                        {{--<input ng-model="sort" type="radio" id="c35" value="rate"/>--}}
                        {{--<label for="c35">--}}
                            {{--<p id="hardLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>سخت</sub>--}}
                        {{--</label>--}}

                        {{--<input ng-model="sort" type="radio" id="c36" value="rate"/>--}}
                        {{--<label for="c36">--}}
                            {{--<p id="professionalLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>تخصصی</sub>--}}
                        {{--</label>--}}

                        {{--<input ng-model="sort" type="radio" id="c37" value="rate"/>--}}
                        {{--<label for="c37">--}}
                            {{--<p id="blindLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>نابینایان</sub>--}}
                        {{--</label>--}}

                        {{--<input ng-model="sort" type="radio" id="c38" value="rate"/>--}}
                        {{--<label for="c38">--}}
                            {{--<p id="disabledLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>معلولان</sub>--}}
                        {{--</label>--}}

                        {{--<input ng-model="sort" type="radio" id="c39" value="rate"/>--}}
                        {{--<label for="c39">--}}
                            {{--<p id="studentLevelTour" class="tourLevelIcons"></p>--}}
                            {{--<sub>دانش‌آموزان</sub>--}}
                        {{--</label>--}}

                        <script>
                            $(document).ready(function () {
                                $(".tourLevelIcons").mouseenter(function () {
                                    $(this).css("background-color", "#4DC7BC"),
                                        $(this).css("color", "white");
                                });
                                $(".tourLevelIcons").mouseleave(function () {
                                    $(this).css("background-color", "#e5e5e5"),
                                        $(this).css("color", "black");
                                });
                            });
                        </script>
                    </center>
                    <div class="inboxHelpSubtitle">انتخاب گزینه‌های
                        @foreach($tourDifficult as $item)
                            @if($item->alone == 0)
                                {{$item->name}} ,
                            @endif
                        @endforeach
                        با گزینه‌های دیگر مجاز
                        می‌باشد.
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox" id="">
                    <div id="concentrationChoseTitleTourCreation">
                        <span>تمرکز خود را مشخص کنید.</span>
                    </div>
                    <div class="concentrationChoseTourCreation">
                        @for($i = 0; $i < count($tourFocus); $i++)
                            <div class="col-xs-2">
                                <input ng-model="sort" type="checkbox" id="c4{{$i}}" name="focus[]" value="{{$tourFocus[$i]->id}}"/>
                                <label for="c4{{$i}}">
                                    <span></span>
                                </label>
                                <span class="concentrationKindTourCreation">
                                {{$tourFocus[$i]->name}}
                            </span>
                            </div>
                        @endfor
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c40" value="rate"/>--}}
                            {{--<label for="c40">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--فرهنگی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c41" value="rate"/>--}}
                            {{--<label for="c41">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--تاریخی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c42" value="rate"/>--}}
                            {{--<label for="c42">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--خرید--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c43" value="rate"/>--}}
                            {{--<label for="c43">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--غذا--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c44" value="rate"/>--}}
                            {{--<label for="c44">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--پیاده‌روی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c45" value="rate"/>--}}
                            {{--<label for="c45">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--مردم‌شناسی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c46" value="rate"/>--}}
                            {{--<label for="c46">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--موزه--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c47" value="rate"/>--}}
                            {{--<label for="c47">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--فیلم--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c48" value="rate"/>--}}
                            {{--<label for="c48">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--شبانه--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c49" value="rate"/>--}}
                            {{--<label for="c49">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="concentrationKindTourCreation">--}}
                                {{--جشنواره--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    </div>
                    <div class="inboxHelpSubtitle">از بین گزینه‌های فوقمواردی را که بهتر تمرکز تور شما را بیان می‌کند،
                        انتخاب نمایید.
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox" id="">
                    <div id="tourTypeChoseTitleTourCreation">
                        <span>تیپ خود را مشخص کنید.</span>
                    </div>
                    <div class="tourTypeChoseChoseTourCreation">

                        @for($i = 0; $i < count($tourStyle); $i++)
                            <div class="col-xs-2">
                                <input ng-model="sort" type="checkbox" id="c5{{$i}}" name="style[]" value="{{$tourStyle[$i]->id}}"/>
                                <label for="c5{{$i}}">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    {{$tourStyle[$i]->name}}
                                </span>
                            </div>
                        @endfor

                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c50" value="rate"/>--}}
                            {{--<label for="c50">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--جوانانه--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c51" value="rate"/>--}}
                            {{--<label for="c51">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--گروهی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c52" value="rate"/>--}}
                            {{--<label for="c52">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--دو نفره--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c53" value="rate"/>--}}
                            {{--<label for="c53">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--بازی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c54" value="rate"/>--}}
                            {{--<label for="c54">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--خانوادگی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c55" value="rate"/>--}}
                            {{--<label for="c55">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--با بچه--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c56" value="rate"/>--}}
                            {{--<label for="c56">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--اقتصادی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2" id="specialWeatherTourCreation">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c57" value="rate"/>--}}
                            {{--<label for="c57">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation" >--}}
                                {{--آب و هوای خاص--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c58" value="rate"/>--}}
                            {{--<label for="c58">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--ماجراجوی--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<input ng-model="sort" type="checkbox" id="c59" value="rate"/>--}}
                            {{--<label for="c59">--}}
                                {{--<span></span>--}}
                            {{--</label>--}}
                            {{--<span class="tourTypeChoseTourCreation">--}}
                                {{--ماه عسل--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    </div>
                    <div class="inboxHelpSubtitle">تیپ گردشگران خود را با انتخاب یک یا چند گزینه‌ی فوق، انتخاب نمایید.
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <div class="menu ui_container whiteBox" id="">
                    <div id="nonGovernmentalTitleTourCreation">
                        <span>آیا تور شما به صورت خصوصی برگزار می‌شود؟</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="private" value="0" id="option1" autocomplete="off">خیر
                            </label>
                            <label class="btn btn-secondary active">
                                <input type="radio" name="private" value="1" id="option2" autocomplete="off" checked>بلی
                            </label>
                        </div>
                    </div>
                    <div class="inboxHelpSubtitle">تورهای خصوصی برای گروه محدودی از مخاطبان برگزار می‌شوند و مخاطبان
                        می‌توانند تجربه‌ای خصوصی داشته باشند.
                    </div>
                    <div class="fullwidthDiv">
                        <div id="tourBestSeasonTitleTourCreation" class="halfWidthDiv">
                            تور شما در چه فصلی بهترین تجربه را در اختیار کاربران قرار می‌دهد؟
                        </div>
                        <div id="tourBestSeasonChoseTourCreation" class="halfWidthDiv">
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" name="season[]" id="c66" value="بهار"/>
                                <label for="c66">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    بهار
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" id="c67" value="تابستان" name="season[]"/>
                                <label for="c67">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    تابستان
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" id="c68" value="پاییز" name="season[]"/>
                                <label for="c68">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    پاییز
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <input ng-model="sort" type="checkbox" id="c69" value="زمستان" name="season[]"/>
                                <label for="c69">
                                    <span></span>
                                </label>
                                <span class="tourTypeChoseTourCreation">
                                    زمستان
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui_container">
                <button id="goToSecondStep" class="btn nextStepBtnTourCreation" type="submit">گام بعدی</button>
            </div>
        </form>
    </div>

    <div id="modalAddNewDestinationBoxTourCreation" class="modalback" style="display: none">
        <div id="addNewDestinationBoxTourCreation" >
            <div id="addNewDestinationTitleTourCreation">
                اضافه کردن مکان جدید
            </div>
            <div class="inputBoxGeneralInfo inputBox InlineTourInputBoxes" id="tourNewOriginInputBox">
                <div class="inputBoxTextGeneralInfo inputBoxText">
                    <div>
                        نام
                        <span>*</span>
                    </div>
                </div>
                <input class="inputBoxInput" type="text" placeholder="فارسی">
            </div>
            <div class="inputBoxGeneralInfo inputBox InlineTourInputBoxes" id="tourOriginStateInputBox">
                <div class="inputBoxTextGeneralInfo inputBoxText">
                    <div>
                        استان
                        <span>*</span>
                    </div>
                </div>
                <input class="inputBoxInput" type="text" placeholder="انتخاب از بین گزینه ها">
            </div>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option1" autocomplete="off">جاذبه
                </label>
                <label class="btn btn-secondary active">
                    <input type="radio" name="options" id="option2" autocomplete="off" checked>شهر
                </label>
            </div>
            <div class="ui_container addNewDestinationBtn">
                <button id="verifyNewDestinationTourCreation">
                    <img src="{{URL::asset('images/tourCreation/approve.png')}}">
                </button>
            </div>
            <div class="ui_container addNewDestinationBtn">
                <button id="closeNewDestinationTourCreation" onclick="$('#modalAddNewDestinationBoxTourCreation').toggle()">
                    <img src="{{URL::asset('images/tourCreation/close.png')}}">
                </button>
            </div>
        </div>
    </div>


    @include('layouts.placeFooter')
</div>

<script src="{{URL::asset('js/tour/create/stageOne.js')}}"></script>


</body>
</html>