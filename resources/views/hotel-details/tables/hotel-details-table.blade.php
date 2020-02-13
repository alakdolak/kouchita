
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">


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

@foreach($features as $item)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                {{$item->name}}
            </span>
        </div>
        @foreach($item->subFeat as $item2)
            @if(in_array($item2->id, $place->features))
                <div class="contentSection col-xs-3">{{$item2->name}}</div>
            @endif
        @endforeach
    </div>
@endforeach