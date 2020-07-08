<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

<div class="row" style="font-size: 15px">

    @if($place->eatable == 0)
        <div class="descriptionSections">
            <div class="titleSection">
                <span class="titleSectionSpan">
                    {{__('سبک :')}}
                </span>
            </div>
            <div class="contentSection col-xs-4">{{$place->style}}</div>
            <div class="contentSection col-xs-4">{{$place->fragile}}</div>
        </div>
    @else
        <div class="descriptionSections">
            <div class="titleSection">
                <span class="titleSectionSpan">
                    {{__('مزه :')}}
                </span>
            </div>
            @foreach($place->taste as $test)
                <div class="contentSection col-xs-3">{{$test}}</div>
            @endforeach
        </div>
    @endif


    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                {{__('ابعاد :')}}
            </span>
        </div>
        <div class="contentSection col-xs-3">{{$place->size}}</div>
    </div>
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                {{__('وزن :')}}
            </span>
        </div>
        <div class="contentSection col-xs-3">{{$place->weight}}</div>
    </div>
    <div class="descriptionSections">
        <div class="titleSection">
            <span class="titleSectionSpan">
                {{__('کلاس قیمتی :')}}
            </span>
        </div>
        <div class="contentSection col-xs-3">{{$place->price}}</div>
    </div>

    @if($place->eatable == 0)
        <div class="descriptionSections">
            <div class="titleSection">
                <span class="titleSectionSpan">
                    {{__('نوع :')}}
                </span>
            </div>
            @foreach($place->kind as $kind)
                <div class="contentSection col-xs-3">{{$kind}}</div>
            @endforeach
        </div>
        <div class="descriptionSections">
            <div class="titleSection">
                <span class="titleSectionSpan">
                    {{__('جنس :')}}
                </span>
            </div>
            @if($place->material != null)
                <div class="contentSection col-xs-3">{{$place->material}}</div>
            @endif
        </div>

    @endif
</div>


<script>
    var checkFeatures = $('.descriptionSections');
    for(var i = 0; i < checkFeatures.length; i++){
        if(checkFeatures[i].children.length < 2)
            checkFeatures[i].remove();
    }
</script>