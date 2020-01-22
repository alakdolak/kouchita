
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

@if($place->kamp == 1 || $place->koohnavardi == 1 || $place->sahranavardi == 1 || $place->piknik == 1
    || $place->walking == 1 || $place->swimming == 1 || $place->rockClimbing == 1 || $place->stoneClimbing == 1
    || $place->valleyClimbing == 1 || $place->caveClimbing == 1 || $place->iceClimbing == 1 || $place->offRoad == 1
    || $place->boat == 1 || $place->rafting == 1 || $place->surfing == 1)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                مناسب برای
            </span>
        </div>

        @if($place->kamp == 1)
            <div class="contentSection col-xs-4">کمپ(چادرزدن)</div>
        @endif
        @if($place->koohnavardi == 1)
            <div class="contentSection col-xs-4">کوه نوردی</div>
        @endif
        @if($place->sahranavardi == 1)
            <div class="contentSection col-xs-4">صحرا‌نوردی</div>
        @endif
        @if($place->piknik == 1)
            <div class="contentSection col-xs-4">پیک نیک</div>
        @endif
        @if($place->walking == 1)
            <div class="contentSection col-xs-4">پیاده‌روی</div>
        @endif
        @if($place->swimming == 1)
            <div class="contentSection col-xs-4">شنا</div>
        @endif
        @if($place->rockClimbing == 1)
            <div class="contentSection col-xs-4">صخره‌نوردی</div>
        @endif
        @if($place->stoneClimbing == 1)
            <div class="contentSection col-xs-4">سنگ‌نوردی</div>
        @endif
        @if($place->valleyClimbing == 1)
            <div class="contentSection col-xs-4">دره‌نوردی</div>
        @endif
        @if($place->caveClimbing == 1)
            <div class="contentSection col-xs-4">غار‌نوردی</div>
        @endif
        @if($place->iceClimbing == 1)
            <div class="contentSection col-xs-4">یخ‌نوردی</div>
        @endif
        @if($place->offRoad == 1)
            <div class="contentSection col-xs-4">آفرود</div>
        @endif
        @if($place->boat == 1)
            <div class="contentSection col-xs-4">قایق‌سواری</div>
        @endif
        @if($place->surfing == 1)
            <div class="contentSection col-xs-4">موج سواری</div>
        @endif
        @if($place->rafting == 1)
            <div class="contentSection col-xs-12">رفتینگ</div>
        @endif
    </div>
@endif


@if($place->kooh == 1 || $place->darya == 1 || $place->daryache == 1 || $place->hayatevahsh == 1||
    $place->hefazat == 1 || $place->kavir == 1 || $place->raml == 1 || $place->jangal == 1 || $place->abshar == 1||
    $place->darre == 1 || $place->bekr == 1 || $place->dasht == 1 || $place->shahri == 1 || $place->talab == 1 ||
    $place->berke == 1 || $place->beach == 1 || $place->geoPark == 1 || $place->river == 1 || $place->cheshme == 1)

    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                ویژگی های محیطی
            </span>
        </div>

        @if($place->kooh == 1)
            <div class="contentSection col-xs-4">کوهستان</div>
        @endif
        @if($place->darya == 1)
            <div class="contentSection col-xs-4">دریا</div>
        @endif
        @if($place->daryache == 1)
            <div class="contentSection col-xs-4">دریاچه</div>
        @endif
        @if($place->abshar == 1)
            <div class="contentSection col-xs-4">آبشار</div>
        @endif
        @if($place->hayatevahsh == 1)
            <div class="contentSection col-xs-4">حیات‌وحش</div>
        @endif
        @if($place->kavir == 1)
            <div class="contentSection col-xs-4">کویر</div>
        @endif
        @if($place->raml == 1)
            <div class="contentSection col-xs-4">رمل</div>
        @endif
        @if($place->jangal == 1)
            <div class="contentSection col-xs-4">جنگل</div>
        @endif
        @if($place->darre == 1)
            <div class="contentSection col-xs-4">دره</div>
        @endif
        @if($place->bekr == 1)
            <div class="contentSection col-xs-4">بکر</div>
        @endif
        @if($place->dasht == 1)
            <div class="contentSection col-xs-4">دشت</div>
        @endif
        @if($place->shahri == 1)
            <div class="contentSection col-xs-4">شهری</div>
        @endif
        @if($place->berke == 1)
            <div class="contentSection col-xs-4">برکه</div>
        @endif
        @if($place->beach == 1)
            <div class="contentSection col-xs-4">ساحل</div>
        @endif
        @if($place->geoPark == 1)
            <div class="contentSection col-xs-4">ژئوپارک</div>
        @endif
        @if($place->river == 1)
            <div class="contentSection col-xs-4">رودخانه</div>
        @endif
        @if($place->cheshme == 1)
            <div class="contentSection col-xs-4">چشمه</div>
        @endif
        @if($place->talab == 1)
            <div class="contentSection col-xs-4">تالاب</div>
        @endif
        @if($place->hefazat == 1)
            <div class="contentSection col-xs-12">منطقه‌ی حفاظت شده</div>
        @endif
    </div>
@endif
