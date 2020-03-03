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

    .arrowAfter:after{
        display: inline-block;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        font-family: "Shazde_Regular" !important;
        -ms-transform: rotate(-0.001deg);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        content: '\e04a';
        font-size: 16px;
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
</style>
<div class="container-fluid secHeadMain hideOnPhone">
    <div class="ui_container secHeadNavs">
        <div class="secHeadTabs arrowAfter">
            <span>
                {{$locationName['cityName']}}
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('cityPage', ['kind' => $locationName['kindState'], 'city' => $locationName['cityNameUrl'] ])}}" target="_blank" >{{$locationName['cityName']}}</a>
                @if(isset($locationName['state']))
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
                @if(isset($locationName['state']))
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
                @if(isset($locationName['state']))
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
                @if(isset($locationName['state']))
                    <a href="{{route('place.list', ['kindPlaceId' => 1, 'mode' => 'state', 'city' => $locationName['state']])}}">جاذبه های استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                ماجرا ها
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' =>  $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">ماجرا های {{$locationName['cityName']}}</a>
                @if(isset($locationName['state']))
                    <a href="{{route('place.list', ['kindPlaceId' => 6, 'mode' => 'state', 'city' => $locationName['state']])}}">ماجرا های استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs arrowAfter">
            <span>
                سوغات و صنایع دستی
            </span>
            <div class="secHeadTabsSubList">
                <a href="{{route('place.list', ['kindPlaceId' => 10, 'mode' =>  $locationName['kindState'], 'city' => $locationName['cityNameUrl']])}}">سوغات و صنایع دستی {{$locationName['cityName']}}</a>
                @if(isset($locationName['state']))
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
                @if(isset($locationName['state']))
                    <a href="{{route('place.list', ['kindPlaceId' => 11, 'mode' => 'state', 'state' => $locationName['state']])}}">غذاهای محلی استان {{$locationName['state']}}</a>
                @endif
            </div>
        </div>
        <div class="secHeadTabs ">
            <span>
                بوم گردی
            </span>
            <div class="secHeadTabsSubList"></div>
        </div>
    </div>
</div>