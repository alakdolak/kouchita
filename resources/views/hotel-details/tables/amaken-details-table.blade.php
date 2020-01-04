
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

@if($place->tarikhi == 1 || $place->mooze == 1 || $place->tafrihi == 1 || $place->tabiatgardi == 1 || $place->markazkharid == 1 || $place->baftetarikhi == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                کاربری
            </span>
        </div>
        @if($place->tarikhi == 1)
            <div class="contentSection col-xs-3">مکان تاریخی</div>
        @endif
        @if($place->mooze == 1)
            <div class="contentSection col-xs-3">موزه</div>
        @endif
        @if($place->tafrihi == 1)
            <div class="contentSection col-xs-3">مکان تفریحی</div>
        @endif
        @if($place->tabiatgardi == 1)
            <div class="contentSection col-xs-3">طبیعت گردی</div>
        @endif
        @if($place->markazkharid == 1)
            <div class="contentSection col-xs-3">مرکز خرید</div>
        @endif
        @if($place->baftetarikhi == 1)
            <div class="contentSection col-xs-3">بافت تاریخی</div>
        @endif

    </div>
@endif

@if($place->boundArea > 0 || $place->shologh == 1 || $place->khalvat == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                محدوده قرارگیری
            </span>
        </div>
        @if($place->shologh == 1)
            <div class="contentSection col-xs-3">منطقه‌ی شلوغ</div>
        @elseif($place->khalvat == 1)
            <div class="contentSection col-xs-3">منطقه‌ی خلوت</div>
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
                محیط
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

@if($place->modern == 1 || $place->tarikhibana == 1 || $place->mamooli == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                معماری
            </span>
        </div>

        @if($place->modern == 1)
            <div class="contentSection col-xs-3">مدرن</div>
        @endif
        @if($place->tarikhibana == 1)
            <div class="contentSection col-xs-3">بنای تاریخی</div>
        @endif
        @if($place->mamooli == 1)
            <div class="contentSection col-xs-3">معمولی</div>
        @endif
    </div>
@endif
