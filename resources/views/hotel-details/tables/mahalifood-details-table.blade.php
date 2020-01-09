
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                نوع غذا
            </span>
        </div>
        <div class="contentSection col-xs-4">{{$place->kindName}}</div>

        <div class="contentSection col-xs-4">{{$place->hotOrCold}}</div>

        <div class="contentSection col-xs-4">{{$place->veg}}</div>

    </div>

