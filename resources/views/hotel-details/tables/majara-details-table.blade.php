
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

@foreach($features as $item)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                {{$item->name}}
            </span>
        </div>
        @foreach($item->subFeat as $item2)
            @if(in_array($item2->id, $place->features))
                <div class="contentSection col-xs-4">{{$item2->name}}</div>
            @endif
        @endforeach
    </div>
@endforeach
