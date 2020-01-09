<div class="row" style="font-size: 15px">

    @if($place->eatable == 0)
        @if($place->style != '0')
            <div class="col-sm-6" style="float: right;">
                <div class="row">
                    <div class="col-sm-6">{{$place->style}}</div>
                    <div class="col-sm-6" style="color: #4dc7bc">سبک:</div>
                </div>
            </div>
        @endif

        <div class="col-sm-6" style="float: right;">
            <div class="row">
                <div class="col-sm-12">{{$place->fragile}}</div>
                {{--<div class="col-sm-6" style="color: #4dc7bc">سبک:</div>--}}
            </div>
        </div>
    @endif

    <div class="col-sm-6" style="float: right;">
        <div class="row">
            <div class="col-sm-6">{{$place->size}}</div>
            <div class="col-sm-6" style="color: #4dc7bc">ابعاد:</div>
        </div>
    </div>
    <div class="col-sm-6" style="float: right;">
        <div class="row">
            <div class="col-sm-6">{{$place->weight}}</div>
            <div class="col-sm-6" style="color: #4dc7bc">وزن:</div>
        </div>
    </div>
    <div class="col-sm-6" style="float: right;">
        <div class="row">
            <div class="col-sm-6">{{$place->price}}</div>
            <div class="col-sm-6" style="color: #4dc7bc">کلاس قیمتی:</div>
        </div>
    </div>

    @if($place->eatable == 0)
        <div class="col-sm-12" style="float: right;">
            <div class="row">
                <div class="col-sm-6">{{$place->material}}</div>
                <div class="col-sm-12" style="color: #4dc7bc">جنس:</div>
            </div>
        </div>


        <div class="col-sm-12" style="float: right;">
            <div class="row">
                <div class="col-sm-6">{{$place->material}}</div>
                <div class="col-sm-6" style="color: #4dc7bc">نوع:</div>
            </div>
        </div>
    @endif
</div>