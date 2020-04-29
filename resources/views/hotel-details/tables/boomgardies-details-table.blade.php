
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

<div class="descriptionSections">
    <div class="titleSection">
    <span class="titleSectionSpan">
        تعداد اتاق
    </span>
    </div>
    <div class="contentSection col-xs-3">
        واحد{{$place->room_num}}
    </div>
</div>

@foreach($features as $item)
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                {{$item->name}}
            </span>
        </div>
        @foreach($item->subFeat as $item2)
            @if(in_array($item2->id, $place->features))
                <div class="contentSection col-xs-6">{{$item2->name}}</div>
            @endif
        @endforeach
    </div>
@endforeach


<script>
    var checkFeatures = $('.descriptionSections');
    for(var i = 0; i < checkFeatures.length; i++){
        if(checkFeatures[i].children.length < 2)
            checkFeatures[i].remove();
    }
</script>