
<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/placeDetailsTable.css')}}">

    <div class="descriptionSections">
        <div class="row">
            <div class="col-xs-6" style="float: right">
                <div class="titleSection">
                    <span class="titleSectionSpan">
                        نوع غذا
                    </span>
                </div>
                <div class="contentSection col-xs-4">{{$place->kindName}}</div>
            </div>
            <div class="col-xs-6" style="float: right">
                <div class="titleSection">
                    <span class="titleSectionSpan">
                        نوع سرو
                    </span>
                </div>
                <div class="contentSection col-xs-4">{{$place->hotOrCold}}</div>
            </div>
        </div>



        <div class="titleSection">
            <span class="titleSectionSpan">
                مناسب برای
            </span>
        </div>
        <div class="contentSection col-xs-12">افراد گیاه خوار
            <span style="display: {{$place->vegetarian == 1 ? '' : 'none'}}; color: green;">هست</span>
            <span style="display: {{$place->vegetarian == 0 ? '' : 'none'}}; color: red">نیست</span>
        </div>
        <div class="contentSection col-xs-12">افراد وگان
            <span style="display: {{$place->vegan == 1 ? '' : 'none'}}; color: green;">هست</span>
            <span style="display: {{$place->vegan == 0 ? '' : 'none'}}; color: red">نیست</span>
        </div>
        <div class="contentSection col-xs-12">افراد دیابتی
            <span style="display: {{$place->diabet == 1 ? '' : 'none'}}; color: green;">هست</span>
            <span style="display: {{$place->diabet == 0 ? '' : 'none'}}; color: red">نیست</span>
        </div>

        <div class="titleSection">
            <span class="titleSectionSpan">
                کالری
            </span>
        </div>
        <div class="contentSection col-xs-12">
            <span style="float: right">
                : {{$place->name}}
            </span>
            <span style="float: right">
                {{$place->energy}}
            </span>
            <span style="float: right">
                 کالری در هر
            </span>
            <span style="float: right">
                {{$place->volume}}
            </span>
            <span style="float: right">
                {{$place->source}}
            </span>
        </div>

        @if($place->rice == 1)
            <div class="contentSection col-xs-12">
                 برنج: 20 کالری در 1 قاشق غذاخوری
            </div>
        @endif

        @if($place->bread == 1)
            <div class="contentSection col-xs-12">
                نان: 40 کالری به اندازه ی هر کف دست
            </div>
        @endif

    </div>

