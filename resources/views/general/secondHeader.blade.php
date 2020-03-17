<style>
    .secHeadMain{
        direction: rtl;
        text-align: right;
        position: relative;
        padding: 0px 20px;
        background-color: #fcc156;
    }

    .secHeadTabs{
        margin-right: 20px;
        font-size: 13px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #16174f;
        font-weight: bold;
        position: relative;
        cursor: pointer;
        height: 40px;
    }

    .secHeadNavs{
        display: flex;
    }

    .secHeadTabsSubList{
        position: absolute;
        top: 40px;
        z-index: 10;
        display: none;
        flex-direction: column;
        min-width: 130px;
        background-color: #fcc156;
        border-radius: 0px 0px 10px 10px;
    }

    .secHeadTabs:hover .secHeadTabsSubList{
        display: flex;
    }

    .secHeadTabsSubList > a{
        color: black;
        padding: 10px 5px;
        font-size: 12px;
        text-align: center;
    }

    .secHeadTabsSubList > a:hover{
        background-color: #88070B;
        color: white;
    }

    .linkRoute{
        color: #16174f !important;
        font-size: 15px;
    }

    .spanMarginSecHead > span {
        margin: 0px 7px;
    }

    .secHeadTabsSubList > a:last-child {
        border-radius:  0 0 10px 10px;
    }

    @media (max-width: 889px) {
        .secHeadTabs{
            margin-right: 13px;
            font-size: 10px;
            font-weight: 800;
        }

    }
</style>
<div class="container-fluid secHeadMain hideOnPhone">
    <div class="ui_container secHeadNavs">
        <div class="secHeadTabs arrowAfter">
            <span>
                {{$locationName['cityName']}}
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('cityPage', ['kind' => $locationName['kindState'], 'city' => $locationName['cityNameUrl'] ])}}" target="_blank" >{{$locationName['cityName']}}</a>
                @if(isset($locationName['state']) && $locationName['kindState'] == 'city')
                    <a href="{{route('cityPage', ['kind' => 'state', 'city' => $locationName['state'] ])}}" target="_blank" >استان {{$locationName['state']}}</a>
                @endif
                <a href="{{url('/')}}">صفحه اصلی</a>
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                اقامتگاه ها
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 4, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">اقامتگاه های {{$locationName['cityName']}}</a>
                @if(isset($locationName['state']) && $locationName['kindState'] == 'city')
                    <a href="{{route('place.list', ['kindPlaceId' => 4, 'mode' => 'state', 'city' => $locationName['state']])}}">اقامتگاه های استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                رستوران ها
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' =>  $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">رستوران های {{$locationName['cityName']}}</a>
                @if(isset($locationName['state']) && $locationName['kindState'] == 'city')
                    <a href="{{route('place.list', ['kindPlaceId' => 3, 'mode' => 'state', 'city' => $locationName['state']])}}">رستوران های استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                جاذبه ها
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' =>  $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">جاذبه های {{$locationName['cityName']}}</a>
                @if(isset($locationName['state'])  && $locationName['kindState'] == 'city')
                    <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => 'state', 'city' => $locationName['state']])}}">جاذبه های استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                طبیعت گردی
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' =>  $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">طبیعت گردی های {{$locationName['cityName']}}</a>
                @if(isset($locationName['state']) && $locationName['kindState'] == 'city')
                    <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => 'state', 'city' => $locationName['state']])}}">طبیعت گردی های استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                سوغات و صنایع دستی
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 10, 'mode' =>  $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">سوغات و صنایع دستی {{$locationName['cityName']}}</a>
                @if(isset($locationName['state'])  && $locationName['kindState'] == 'city')
                    <a href="{{route('place.list', ['kindPlaceId' => 10, 'mode' => 'state', 'city' => $locationName['state']])}}">سوغات و صنایع دستی استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                غذاهای محلی
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">غذاهای محلی {{$locationName['cityName']}}</a>
                @if(isset($locationName['state']) && $locationName['kindState'] == 'city')
                    <a href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => 'state', 'state' => $locationName['state']])}}">غذاهای محلی استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs ">
            <a href="{{route('mainArticle')}}" style="color: #16174f">سفرنامه ها</a>
        </div>
    </div>
</div>
@if(isset($kindPlace))
    <div class="container-fluid secHeadMain hideOnPhone" style="background-color: unset; margin-top: 10px;">

        <div class="ui_container secHeadNavs spanMarginSecHead" style="font-size: 20px">
            <a class="linkRoute" href="{{url('/')}}" style="margin-right: 20px;">
                صفحه اصلی
            </a>
            @if($locationName['kindState'] != 'country')
                <span>
                ->
                </span>
                <a class="linkRoute" href="{{route('cityPage', ['kind' => 'state', 'city' => $locationName['state']])}}">
                   استان {{$locationName['state']}}
                </a>
            @endif

            @if($locationName['kindState'] == 'city')
                <span>
                ->
                </span>
                <a class="linkRoute" href="{{route('cityPage', ['kind' => 'city', 'city' => $locationName['cityNameUrl']])}}">
                    شهر {{$locationName['cityNameUrl']}}
                </a>
            @endif

            <span>
            ->
            </span>
            <a class="linkRoute" href="{{route('place.list', ['kindPlaceId' => $kindPlaceId, 'mode' => $locationName['kindState'], 'city' => $locationName['cityNameUrl'] ])}}">
                {{$kindPlace->title}}
                @if($mode != 'country')
                    @if($mode == 'state')
                        استان
                    @else
                        شهر
                    @endif
                    {{$city->name}}
                @else
                    ایران من
                @endif
            </a>

            @if($locationName['kindPage'] == 'place')
                <span>
                ->
                </span>
                <a class="linkRoute" href="{{Request::url()}}">
                    {{$place->name}}
                </a>
            @endif

        </div>

        @if($locationName['kindPage'] == 'place')
            {{--<div class="ui_container secHeadNavs" style="justify-content: center; margin-top: 30px;">--}}
                {{--<div style="background: red; width: 728px; height: 90px;"></div>--}}
            {{--</div>--}}
        @endif
</div>
@endif