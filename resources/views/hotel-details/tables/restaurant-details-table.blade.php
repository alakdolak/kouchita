
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

@if($place->food_irani == 1 || $place->food_mahali == 1 || $place->food_farangi == 1 || $place->coffeeshop == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                نوع غذا
            </span>
        </div>
        @if($place->food_irani == 1)
            <div class="contentSection col-xs-4">غذای ایرانی</div>
        @endif
        @if($place->food_mahali == 1)
            <div class="contentSection col-xs-4">غذای محلی</div>
        @endif
        @if($place->food_farangi == 1)
            <div class="contentSection col-xs-4">غذای فرنگی</div>
        @endif
        @if($place->coffeeshop == 1)
            <div class="contentSection col-xs-4">کافی شاپ</div>
        @endif

    </div>
@endif

@if($place->boundArea > 0 || $place->shologh == 1 || $place->khalvat == 1 || $place->tarikhi == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                محدوده قرارگیری
            </span>
        </div>
        @if($place->shologh == 1)
            <div class="contentSection col-xs-4">منطقه‌ی پرازدحام</div>
        @elseif($place->khalvat == 1)
            <div class="contentSection col-xs-4">منطقه‌ی کم‌ازدحام</div>
        @endif

        @if($place->boundArea == 3)
            <div class="contentSection col-xs-4">خارج شهر</div>
        @elseif($place->boundArea == 2)
            <div class="contentSection col-xs-4">حومه شهر</div>
        @elseif($place->boundArea == 1)
            <div class="contentSection col-xs-4">مرکز شهر</div>
        @endif

        @if($place->shologh == 1)
            <div class="contentSection col-xs-4">داخل بافت تاریخی</div>
        @endif
    </div>
@endif

@if($place->tabiat == 1 || $place->kooh == 1 || $place->darya == 1 || $place->kavir == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                محیط
            </span>
        </div>

        @if($place->kavir == 1)
            <div class="contentSection col-xs-4">کویر</div>
        @endif
        @if($place->darya == 1)
            <div class="contentSection col-xs-4">دریا</div>
        @endif
        @if($place->kooh == 1)
            <div class="contentSection col-xs-4">کوه</div>
        @endif
        @if($place->tabiat == 1)
            <div class="contentSection col-xs-4">طبیعت</div>
        @endif
    </div>
@endif

@if($place->modern == 1 || $place->sonnati == 1 || $place->mamooli == 1 || $place->ghadimi == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                معماری
            </span>
        </div>

        @if($place->modern == 1)
            <div class="contentSection col-xs-4">مدرن</div>
        @endif
        @if($place->sonnati == 1)
            <div class="contentSection col-xs-4">سنتی</div>
        @endif
        @if($place->mamooli == 1)
            <div class="contentSection col-xs-4">معمولی</div>
        @endif
        @if($place->ghadimi == 1)
            <div class="contentSection col-xs-4">قدیمی</div>
        @endif
    </div>
@endif
