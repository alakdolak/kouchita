<div class="row" style="font-size: 15px">

    @if($place->eatable == 0)

        @if($place->style != '0')
            <div class="col-sm-12" style="float: right;">
                <div class="row">
                    <div class="col-sm-4">{{$place->fragile}}</div>
                    <div class="col-sm-4">{{$place->style}}</div>
                    <div class="col-sm-4" style="color: #4dc7bc">سبک:</div>
                </div>
            </div>
        @endif
    @else
        <div class="col-sm-12" style="float: right;">
            <div class="row">
                <div class="col-sm-8">{{$place->taste}}</div>
                <div class="col-sm-4" style="color: #4dc7bc">مزه:</div>
            </div>
        </div>
    @endif

    <div class="col-sm-12" style="float: right;">
        <div class="row">
            <div class="col-sm-8">{{$place->size}}</div>
            <div class="col-sm-4" style="color: #4dc7bc">ابعاد:</div>
        </div>
    </div>
    <div class="col-sm-12" style="float: right;">
        <div class="row">
            <div class="col-sm-8">{{$place->weight}}</div>
            <div class="col-sm-4" style="color: #4dc7bc">وزن:</div>
        </div>
    </div>
    <div class="col-sm-12" style="float: right;">
        <div class="row">
            <div class="col-sm-8">{{$place->price}}</div>
            <div class="col-sm-4" style="color: #4dc7bc">کلاس قیمتی:</div>
        </div>
    </div>

    @if($place->eatable == 0)
        <div class="col-sm-12" style="float: right;">
            <div class="row">
                <div class="col-sm-8">{{$place->kind}}</div>
                <div class="col-sm-4" style="color: #4dc7bc">نوع:</div>
            </div>
        </div>
        <div class="col-sm-12" style="float: right;">
            <div class="row">
                <div class="col-sm-8">{{$place->material}}</div>
                <div class="col-sm-4" style="color: #4dc7bc">جنس:</div>
            </div>
        </div>
    @endif
</div>