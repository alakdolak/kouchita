
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

@if($k == -1)
{{--    <table class="mainPlaceDetailsTable">--}}
        @else
{{--            <table class="tableDiv elsePlaceDetailsTable" id="table_{{$k}}">--}}
                @endif

{{--                <tr>--}}
{{--                    <td class="titleInTable">درجه‌ی هتل</td>--}}
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">{{$place->rate}}</div>--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <td class="titleInTable">محدوده‌ی قرارگیری</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
                    <?php $i = 1; ?>
                    @if($place->tarikhi == 1)
                        @if($i % 3 == 0)
{{--                            <td>--}}
{{--                                <div class="highlightedAmenity detailListItem"></div>--}}
{{--                            </td>--}}
                            <?php $i++; ?>
                        @endif
                        <?php $i++; ?>
{{--                        <td>--}}
{{--                            <div class="highlightedAmenity detailListItem">تاریخی</div>--}}
{{--                        </td>--}}
                    @endif
                    @if($place->markaz == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">مرکز شهر</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->hoome == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">حومه شهر</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->shologh == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">شلوغ</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->khalvat == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">خلوت</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->tabiat == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">طبیعت</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->kooh == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">کوه</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->darya == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">دریا</div>--}}
{{--                    </td>--}}
                    @endif
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <td class="titleInTable">نوع معماری</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
                    <?php $i = 1; ?>
                    @if($place->modern == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">مدرن</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->sonnati == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">سنتی</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->ghadimi == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">اصالتاً قدیمی</div>--}}
{{--                    </td>--}}
                    @endif
                    @if($place->mamooli == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">معمولی</div>--}}
{{--                    </td>--}}
                    @endif
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <td class="titleInTable">امکانات رفاهی</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
                    <?php $i = 1; ?>

                    @if($place->food_farangi == 1)
                        @if($i % 3 == 0)
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">رستوران فرنگی</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->food_irani == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">رستوران ایرانی</div>--}}
{{--                    </td>--}}
                    @endif


                    @if($place->breakfast == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">صبحانه‌ی مجانی</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->food_mahali == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">رستوران محلی</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->coffeeshop == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">کافی‌شاپ</div>--}}
{{--                    </td>--}}
                    @endif
{{--                </tr>--}}


{{--                <tr>--}}
{{--                    <td class="titleInTable">امکانات جانبی</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
                    <?php $i = 1; ?>

                    @if($place->club == 1)
                        @if($i % 3 == 0)
{{--                            <td>--}}
{{--                                <div class="highlightedAmenity detailListItem"></div>--}}
{{--                            </td>--}}
                            <?php $i++; ?>
                        @endif
                        <?php $i++; ?>
{{--                        <td>--}}
{{--                            <div class="highlightedAmenity detailListItem">باشگاه ورزشی</div>--}}
{{--                        </td>--}}
                    @endif

                    @if($place->parking == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">پارکینگ مجانی</div>--}}
{{--                    </td>--}}
                    @endif


                    @if($place->maalool == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">امکانات معلولان</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->pool == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">استخر</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->tahviye == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">تهویه‌ی مطبوع</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->internet == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">WiFi</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->anten == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">آنتن‌دهی اینترنت</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->mahali == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">امکانات محلی</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->masazh == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">سالن ماساژ</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->swite == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">سوئیت دربست</div>--}}
{{--                    </td>--}}
                    @endif

                    @if($place->restaurant == 1)
                        @if($i % 3 == 0)
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem"></div>--}}
{{--                    </td>--}}
                    <?php $i++; ?>
                    @endif
                    <?php $i++; ?>
{{--                    <td>--}}
{{--                        <div class="highlightedAmenity detailListItem">رستوران</div>--}}
{{--                    </td>--}}
                    @endif
{{--                </tr>--}}
{{--            </table>--}}

<?php
        switch ($place->kind_id){
            case 1:
                $placeKindName = 'هتل';
                break;
            case 2:
                $placeKindName = 'هتل آپارتمان';
                break;
            case 3:
                $placeKindName = 'مهمان‌سرا';
                break;
            case 4:
                $placeKindName = 'ویلا';
                break;
            case 5:
                $placeKindName = 'متل';
                break;
            case 6:
                $placeKindName = 'مجتمع تفریحی';
                break;
            case 7:
                $placeKindName = 'پانسیون';
                break;
            case 8:
                $placeKindName = 'بوم گردی';
                break;
                }
?>


@if($place->kind_id == 1)
    <div class="descriptionSections">
        <div class="titleSection">
        <span class="titleSectionSpan">
            درجه {{$placeKindName}}
        </span>
        </div>
        <div class="contentSection col-xs-3">{{$place->rate}}
            @if($place->momtaz == 1)
                ممتاز
            @endif
        </div>
    </div>
@endif

@if($place->food_irani == 1 || $place->food_mahali == 1 || $place->food_farangi == 1 || $place->coffeeshop == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                غذای {{$placeKindName}}
            </span>
        </div>
        @if($place->food_irani == 1)
            <div class="contentSection col-xs-3">غذای ایرانی</div>
        @endif
        @if($place->food_mahali == 1)
            <div class="contentSection col-xs-3">غذای محلی</div>
        @endif
        @if($place->food_farangi == 1)
            <div class="contentSection col-xs-3">غذای فرنگی</div>
        @endif
        @if($place->coffeeshop == 1)
            <div class="contentSection col-xs-3">کافی شاپ</div>
        @endif
    </div>
@endif

@if($place->tarikhi == 1 || $place->boundArea > 0 || $place->shologh == 1 || $place->khalvat == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                محدوده قرارگیری {{$placeKindName}}
            </span>
        </div>
        @if($place->shologh == 1)
            <div class="contentSection col-xs-3">منطقه‌ی شلوغ</div>
        @elseif($place->khalvat == 1)
            <div class="contentSection col-xs-3">منطقه‌ی خلوت</div>
        @endif

        @if($place->tarikhi == 1)
            <div class="contentSection col-xs-3">بافت تاریخی</div>
        @endif

        @if($place->boundArea == 3)
            <div class="contentSection col-xs-3">خارج شهر</div>
        @elseif($place->boundArea == 2)
            <div class="contentSection col-xs-3">حومه شهر</div>
        @elseif($place->boundArea == 1)
            <div class="contentSection col-xs-3">مرکز شهر</div>
        @endif
    </div>
@endif

@if($place->tabiat == 1 || $place->kooh == 1 || $place->darya == 1 || $place->kavir == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                محیط {{$placeKindName}}
            </span>
        </div>

        @if($place->kavir == 1)
            <div class="contentSection col-xs-3">کویر</div>
        @endif
        @if($place->darya == 1)
            <div class="contentSection col-xs-3">دریا</div>
        @endif
        @if($place->kooh == 1)
            <div class="contentSection col-xs-3">کوه</div>
        @endif
        @if($place->tabiat == 1)
            <div class="contentSection col-xs-3">طبیعت</div>
        @endif
    </div>
@endif

@if($place->modern == 1 || $place->sonnati == 1 || $place->ghadimi == 1 || $place->mamooli == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                معماری {{$placeKindName}}
            </span>
        </div>

        @if($place->modern == 1)
            <div class="contentSection col-xs-3">مدرن</div>
        @endif
        @if($place->sonnati == 1)
            <div class="contentSection col-xs-3">سنتی</div>
        @endif
        @if($place->ghadimi == 1)
            <div class="contentSection col-xs-3">قدیمی</div>
        @endif
        @if($place->mamooli == 1)
            <div class="contentSection col-xs-3">معمولی</div>
        @endif
    </div>
@endif

@if($place->breakfast == 1 || $place->lunch == 1 || $place->dinner == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                امکانات غذایی {{$placeKindName}}
            </span>
        </div>

        @if($place->dinner == 1)
            <div class="contentSection col-xs-3">شام رایگان</div>
        @endif
        @if($place->lunch == 1)
            <div class="contentSection col-xs-3">نهار رایگان</div>
        @endif
        @if($place->breakfast == 1)
            <div class="contentSection col-xs-3">صبحانه رایگان</div>
        @endif
    </div>
@endif

<div class="descriptionSections">
    <div class="titleSection">
        <span class="titleSectionSpan">
            امکانات {{$placeKindName}}
        </span>
    </div>

    @if($place->tahviye == 1)
        <div class="contentSection col-xs-3 pd-0">گرمایش و سرمایش در اتاق</div>
    @endif
    @if($place->safe_box == 1)
        <div class="contentSection col-xs-3">گاوصندوق در اتاق</div>
    @endif
    @if($place->maalool == 1)
        <div class="contentSection col-xs-3">امکانات ویژه توانیابان</div>
    @endif
    @if($place->anten == 1)
        <div class="contentSection col-xs-3">انتن‌دهی در اتاق</div>
    @endif
    @if($place->laundry == 1)
        <div class="contentSection col-xs-3">خدمات خشک‌‌شویی</div>
    @endif

    @if($place->confrenss_room == 1)
        <div class="contentSection col-xs-3">اتاق کنفرانس</div>
    @endif
    @if($place->game_net == 1)
        <div class="contentSection col-xs-3">گیم نت</div>
    @endif
    @if($place->roof_garden == 1)
        <div class="contentSection col-xs-3">روف گاردن</div>
    @endif
    @if($place->shop == 1)
        <div class="contentSection col-xs-3">فروشگاه</div>
    @endif
    @if($place->gasht == 1)
        <div class="contentSection col-xs-3">گشت روزانه</div>
    @endif
    @if($place->masazh == 1)
        <div class="contentSection col-xs-3">امکانات ماساژ</div>
    @endif
    @if($place->swite == 1)
        <div class="contentSection col-xs-3">سوئیت</div>
    @endif
    @if($place->restaurant == 1)
        <div class="contentSection col-xs-3">رستوران</div>
    @endif
    @if($place->internet == 1)
        <div class="contentSection col-xs-3">اینترنت در اتاق</div>
    @endif
    @if($place->pool == 1)
        <div class="contentSection col-xs-3">استخر</div>
    @endif
    @if($place->club == 1)
        <div class="contentSection col-xs-3">باشگاه ورزشی</div>
    @endif
    @if($place->parking == 1)
        <div class="contentSection col-xs-3">پارکینگ</div>
    @endif
</div>




{{--<div class="descriptionSections">--}}
    {{--<div class="titleSection">--}}
        {{--<span class="titleSectionSpan">--}}
            {{--درجه‌ی هتل--}}
        {{--</span>--}}
    {{--</div>--}}
    {{--<div class="contentSection col-xs-4">پنج ستاره</div>--}}
    {{--<div class="contentSection col-xs-4">پنج ستاره</div>--}}
    {{--<div class="contentSection col-xs-4">پنج ستاره</div>--}}
{{--</div>--}}