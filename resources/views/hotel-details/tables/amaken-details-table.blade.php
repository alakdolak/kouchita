
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

@if($place->tarikhi == 1 || $place->mooze == 1 || $place->tafrihi == 1 || $place->tabiatgardi == 1 || $place->markazkharid == 1 || $place->baftetarikhi == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                کاربری
            </span>
        </div>
        @if($place->tarikhi == 1)
            <div class="contentSection col-xs-4">مکان تاریخی</div>
        @endif
        @if($place->tafrihi == 1)
            <div class="contentSection col-xs-4">مکان تفریحی</div>
        @endif
        @if($place->tabiatgardi == 1)
            <div class="contentSection col-xs-4">طبیعی</div>
        @endif
        @if($place->tejari == 1)
            <div class="contentSection col-xs-4">تجاری</div>
        @endif
        @if($place->mazhabi == 1)
            <div class="contentSection col-xs-4">مذهبی</div>
        @endif
        @if($place->sanati == 1)
            <div class="contentSection col-xs-4">صنعتی</div>
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
            <div class="contentSection col-xs-6">منطقه‌ی پرازدحام</div>
        @elseif($place->khalvat == 1)
            <div class="contentSection col-xs-6">منطقه‌ی کم‌ازدحام</div>
        @endif

        @if($place->boundArea == 3)
            <div class="contentSection col-xs-6">خارج شهر</div>
        @elseif($place->boundArea == 2)
            <div class="contentSection col-xs-6">حومه شهر</div>
        @elseif($place->boundArea == 1)
            <div class="contentSection col-xs-6">مرکز شهر</div>
        @endif
    </div>
@endif

@if($place->kooh == 1 || $place->darya == 1 || $place->kavir == 1 || $place->jangal == 1 || $place->shahri == 1 || $place->village == 1)
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
            <div class="contentSection col-xs-4">کوهستان</div>
        @endif
        @if($place->jangal == 1)
            <div class="contentSection col-xs-4">جنگل</div>
        @endif
        @if($place->shahri == 1)
            <div class="contentSection col-xs-4">شهری</div>
        @endif
        @if($place->village == 1)
            <div class="contentSection col-xs-4">روستایی</div>
        @endif
    </div>
@endif

@if($place->modern == 1 || $place->tarikhibana == 1 || $place->boomi == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                معماری
            </span>
        </div>

        @if($place->modern == 1)
            <div class="contentSection col-xs-4">مدرن</div>
        @endif
        @if($place->tarikhibana == 1)
            <div class="contentSection col-xs-4">بنای تاریخی</div>
        @endif
        @if($place->boomi == 1)
            <div class="contentSection col-xs-4">بومی</div>
        @endif
        @if($place->mazhabiArch == 1)
            <div class="contentSection col-xs-4">مذهبی</div>
        @endif
    </div>
@endif

@if($place->weather != 0)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                آب و هوا
            </span>
        </div>

        @if($place->weather == 1)
            <div class="contentSection col-xs-4">مرطوب و سرد</div>
        @elseif($place->weather == 2)
            <div class="contentSection col-xs-4">گرم و خشک</div>
        @elseif($place->weather == 3)
            <div class="contentSection col-xs-4">گرم و مرطوب</div>
        @elseif($place->weather == 4)
            <div class="contentSection col-xs-4">معتدل</div>
        @endif
    </div>
@endif
