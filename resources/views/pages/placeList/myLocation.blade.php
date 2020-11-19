<!doctype html>
<html lang="fa">
<head>
    @include('layouts.topHeader')
    <title>اطراف من</title>

    <style>
        .lds-ring{
            width: 20px;
            height: 20px;
        }
        .lds-ring div{
            border: 2px solid #d5d5d5;
            border-color: #d5d5d5 transparent transparent transparent;
            width: 20px;
            height: 20px;
            margin: 0px;
        }
        .gm-control-active.gm-fullscreen-control{
            display: none;
        }
        .searchSec{
            align-items: center;
            justify-content: space-between;
        }
        .searchSec input{
            border: none;
            font-size: 12px;
            margin-left: 10px;
            width: 200px;
        }
        .searchSec .searchButton{
            border: none;
            background: white;
            font-size: 20px;
            line-height: 20px;
            color: var(--koochita-blue);
            transform: rotate(90deg);
        }
        .searchSec .threeLineIcon{
            font-size: 20px;
            line-height: 20px;
            cursor: pointer;
            margin-left: 5px;
            color: #5f5f5f;
        }

        .bodySec{
            direction: rtl;
            text-align: right;
            position: relative;
            display: flex;
            height: calc(100vh - 55px);
        }
        .bodySec.fullMap .mapSection{
            width: 100%;
        }
        .mapSection{
            width: calc(100% - 320px);
            position: relative;
            transition: .3s;
        }
        .mapSection .mapDiv{
            width: 100%;
            height: 100%;
        }
        .bText{
            font-size: 18px;
            font-weight: bold;
            margin: 5px 10px;
        }

        .filtersSec{
            justify-content: space-evenly;
            padding-bottom: 5px;
        }
        .filtersSec .filKind{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            cursor: pointer;
        }
        .filtersSec .filKind .name{
            font-size: .3em;
        }
        .filtersSec .filKind .icon{
            font-size: .75em;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            margin-bottom: 5px;
        }

        .filtersSec .filKind .icon.touristAttractions  {
            background: #ec008c;
        }
        .filtersSec .filKind .icon.hotelIcon {
            background: #00516f;
        }
        .filtersSec .filKind .icon.restaurantIcon {
            background: #fff200;
        }
        .filtersSec .filKind .icon.adventureIcon {
            background: #ed1c24;
        }
        .filtersSec .filKind .icon.boomIcon {
            background: #00aeef;
        }

        .filtersSec .filKind.offFilter .icon{
            background: white;
            color: inherit;
        }

        .hideOnPhone.screenFooterStyle{
            display: none;
        }
        .bodySec .listSection{
            width: 320px;
            height: 100%;
            background: white;
            transition: .3s;
            position: relative;
        }
        .bodySec.fullMap .listSection{
            width: 0px;
        }
        .bodySec.fullMap .listSection .sideSection{
            position: absolute;
            z-index: 9;
        }
        .listSection .sideSection{
            direction: rtl;
            height: 140px;
        }
        .listSection .sideSection > div{
            background: white;
            box-shadow: 0px 0px 4px 1px #868686;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            width: 300px;
            margin: 10px;
            position: relative;
        }

        .bodySec.fullMap .listSection .leftArrowIcon{
            box-shadow: 0px 0px 4px 1px #868686;
        }
        .bodySec.fullMap .listSection .leftArrowIcon:before{
            transform: rotate(0deg);
        }
        .bodySec .listSection .leftArrowIcon:before{
            transform: rotate(180deg);
        }
        .bodySec .listSection .leftArrowIcon{
            position: absolute;
            width: 20px;
            height: 65px;
            left: -20px;
            z-index: 9;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 35%;
            border-radius: 10px 0px 0px 10px;
            box-shadow: none;
            cursor: pointer;
            font-size: 25px;
            overflow: hidden;
        }

        .bodySec .listSection .placeList{
            width: 100%;
            background: white;
            height: calc(100% - 140px);
            overflow: auto;
            direction: ltr;
            position: relative;
        }
        .bodySec.fullMap .listSection .content{
            overflow: hidden;
            direction: rtl;
        }
        .bodySec .listSection .content{
            overflow: hidden;
            width: 100%;
            height: 100%;
        }
        .placeList .placeCard{
            direction: rtl;
            margin: 10px 10px;
            background: white;
            display: flex;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: solid #efefef 1px;
        }
        .placeList .placeCard .img{
            width: 75px;
            height: 75px;
            overflow: hidden;
            border-radius: 10px;
        }
        .placeList .placeCard .info{
            margin-right: 10px;
            width: calc(100% - 80px);
        }
        .placeList .placeCard .info .name{
            font-size: 1em;
            color: black;
            cursor: pointer;
        }

        .placeList .placeCard .info .star{
            font-size: .8em;
            color: gray;
        }
        .placeList .placeCard .info .address{
            font-size: .7em;
            color: gray;
        }
        .placeListLoading{
            position: absolute;
            top: 150px;
            right: 0px;
            width: 100%;
            height: calc(100% - 140px);
            background: #0000008c;
            z-index: 9;
            overflow: hidden;
        }

        .placeSearchMapResults{
            background: white;
            position: absolute;
            width: 100%;
            top: 80%;
            z-index: 9;
            font-size: 11px;
            right: 0;
            border-radius: 0px 0px 10px 10px;
            transition: .3s;
            max-height: 0;
            overflow: hidden;
            padding: 0;
            box-shadow: none;
        }
        .placeSearchMapResults.showResult{
            box-shadow: 0px 4px 4px 1px #868686;
            padding: 13px;
            max-height: 300px;
            overflow: auto;
            z-index: 99;
        }
        .placeSearchMapResults .res{
            padding: 3px 5px;
            margin: 3px 0px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            border-radius: 15px;
            transition: .3s;
        }
        .placeSearchMapResults .res:hover{
            background: var(--koochita-light-green);
        }
        .placeSearchMapResults .res .name{
            margin-right: 8px;
        }
        .placeSearchMapResults .res .icon{

        }
        .placeSearchMapResults .defaults{
            font-weight: bold;
            border-bottom: solid 1px #d5d5d5;
        }
        .placeSearchMapResults .resSec{

        }

    </style>
</head>
<body>
    @include('general.forAllPages')

    @include('layouts.header1')

    <div class="bodySec">
        <div class="listSection">
            <div class="leftArrowIcon" onclick="$('.bodySec').toggleClass('fullMap');"></div>
            <div class="content">
                <div class="sideSection">
                    <div class="searchSec">
                        <div class="threeLineIcon" onclick="$('.bodySec').toggleClass('fullMap');"></div>
                        <input id="searchPlaceInput" type="text" placeholder="محل مورد نظر را جستجو کنید..." onkeyup="searchPlace(this)" onfocus="showSearchResultSec(true)" onfocusout="showSearchResultSec(false)">
                        <div id="resultMapSearch" class="placeSearchMapResults">
                            <div class="defaults">
                                <div class="res" onclick="getMyLocation()">
                                    <div class="icon">
                                        <img src="{{URL::asset('images/icons/myLocation.svg')}}" alt="myLocationIcon" style="width: 15px">
                                    </div>
                                    <div class="name">محل من</div>
                                </div>
                                <div class="res" onclick="chooseFromMap()">
                                    <div class="icon locationIcon"></div>
                                    <div class="name">انتخاب از روی نقشه</div>
                                </div>
                            </div>
                            <div class="resSec"></div>
                        </div>
                        <button class="searchButton">
                            <div class="searchIcon"></div>
                            <div class="lds-ring hidden"><div></div><div></div><div></div><div></div></div>
                        </button>
                    </div>
                    <div class="filtersSec"></div>
                </div>
                <div class="fullyCenterContent placeListLoading hidden">
                    <img alt="loading" data-src="{{URL::asset('images/loading.gif')}}" class="lazyload" style="width: 100px;" />
                </div>
                <div class="placeList"></div>
            </div>
        </div>
        <div class="mapSection">
            <div id="map" class="mapDiv"></div>
        </div>
    </div>

    @include('layouts.placeFooter')
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0"></script>

    <script>
        var dontShowfilters = [];
        var nearPlacesMapMarker = [];
        var nearPlaces = [];
        var markerLocation = {lat: 0, lng: 0};
        var searchPlaceResult = null;
        var searchPlaceAjax = null;
        var canChooseFromMap = false;
        var yourPosition = 0;
        var mainMap;
        let filterButtons = {
            1: {
                id: 1,
                icon: 'touristAttractions',
                mapIcon: '{{URL::asset('images/mapIcon/att.png')}}',
                name: 'جای دیدنی',
            },
            3: {
                id: 3,
                icon: 'restaurantIcon',
                mapIcon: '{{URL::asset('images/mapIcon/res.png')}}',
                name: 'رستوران',
            },
            4: {
                id: 4,
                icon: 'hotelIcon',
                mapIcon: '{{URL::asset('images/mapIcon/hotel.png')}}',
                name: 'اقامتگاه',
            },
            6: {
                id: 6,
                icon: 'adventureIcon',
                mapIcon: '{{URL::asset('images/mapIcon/adv.png')}}',
                name: 'طبیعت گردی',
            },
            12: {
                id: 12,
                icon: 'boomIcon',
                mapIcon: '{{URL::asset('images/mapIcon/boom.png')}}',
                name: 'بوم گردی',
            },
        };

        function createFilterHtml(){
            var text = '';
            for(var item in filterButtons){
                text += `<div class="filKind" onclick="toggleFilter(${filterButtons[item].id}, this)">
                            <div class="fullyCenterContent icon ${filterButtons[item].icon}"></div>
                            <div class="name">${filterButtons[item].name}</div>
                        </div>`;
            }
            $('.filtersSec').html(text);
        }

        createFilterHtml();

        function toggleFilter(_id, _element){
            $(_element).toggleClass('offFilter');
            if($(_element).hasClass('offFilter'))
                dontShowfilters.push(_id);
            else{
                var index = dontShowfilters.indexOf(_id);
                if(index != -1)
                    dontShowfilters.splice(index, 1);
            }
            togglePlaces();
        }

        function initMap(){
            var mapOptions = {
                center: new google.maps.LatLng(32.42056639964595, 54.00537109375),
                zoom: 5,
                styles: window.googleMapStyle
            };
            var mapElementSmall = document.getElementById('map');
            mainMap = new google.maps.Map(mapElementSmall, mapOptions);

            getMyLocation();
            google.maps.event.addListener(mainMap, 'click', event => {
                if(canChooseFromMap) {
                    setMarkerToMap(event.latLng.lat(), event.latLng.lng());
                }
            });

        }

        function setMarkerToMap(_lat, _lng){
            if(yourPosition != 0)
                yourPosition.setMap(null);
            yourPosition = new google.maps.Marker({
                position:  new google.maps.LatLng(_lat, _lng),
                map: mainMap,
            });

            mainMap.setCenter({
                lat : _lat,
                lng : _lng
            });
            mainMap.setZoom(16);
            canChooseFromMap = false;
            markerLocation = {lat: _lat, lng: _lng};
            getPlacesWithLocation();
        }

        function getMyLocation(){
            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition((position) => setMarkerToMap(position.coords.latitude, position.coords.longitude));
            else
                console.log("Geolocation is not supported by this browser.");
        }

        function showSearchResultSec(_kind){
            if(_kind)
                $('#resultMapSearch').addClass('showResult');
            else{
                setTimeout(() => {
                    $('#resultMapSearch').removeClass('showResult');
                }, 100);
            }
        }

        function chooseFromMap(){
            canChooseFromMap = true;
        }

        function searchPlace(_element){
            var value = _element.value;
            if(value.trim().length > 1){
                $('.searchButton').find('.searchIcon').addClass('hidden');
                $('.searchButton').find('.lds-ring').removeClass('hidden');
                if(searchPlaceAjax != null)
                    searchPlaceAjax.abort();

                searchPlaceAjax = $.ajax({
                    type: 'get',
                    url: `{{route('search.place')}}?value=${value}`,
                    success: response => {
                        if(response.status == 'ok')
                            createSearchResult(response.result);
                    },
                    error: err => {
                        console.error(err);
                    }
                })
            }
            else{
                $('.searchButton').find('.searchIcon').removeClass('hidden');
                $('.searchButton').find('.lds-ring').addClass('hidden');
                $('#resultMapSearch').find('.resSec').empty();
            }
        }

        function createSearchResult(_result){
            searchPlaceResult = _result;
            var text = '';
            _result.map(item => {
                text += `<div class="res" onclick="choosePlaceForMap(${item.id})">
                            <div class="icon ${filterButtons[item.kindPlaceId].icon}"></div>
                            <div class="name">${item.name}</div>
                        </div>`;
            });
            $('.searchButton').find('.searchIcon').removeClass('hidden');
            $('.searchButton').find('.lds-ring').addClass('hidden');

            $('#resultMapSearch').find('.resSec').html(text);
        }

        function choosePlaceForMap(_id){
            $('#resultMapSearch').find('.resSec').empty();
            $('#searchPlaceInput').val('');
            searchPlaceResult.map(item => {
                if(item.id == _id){
                    setMarkerToMap(item.C, item.D);
                }
            })
        }

        function getPlacesWithLocation(){
            $('.placeListLoading').removeClass('hidden');
            $.ajax({
                type: 'get',
                url: `{{route("getPlaces.location")}}?lat=${markerLocation.lat}&lng=${markerLocation.lng}`,
                success: response => {
                    if(response.status == 'ok')
                        createListElement(response.result);
                },
                error: err => {
                    console.error(err);
                }
            })
        }

        function createListElement(_result){
            var text = '';

            nearPlaces.map(place => place.marker.setMap(null));

            _result.map(item => {
                text += `<div id="listPlaceCard_${item.kindPlaceId}_${item.id}" class="placeCard">
                            <div class="fullyCenterContent img">
                                <img src="${item.pic}" class="resizeImgClass" onload="fitThisImg(this)">
                            </div>
                            <div class="info">
                                <div class="name" onclick="setMarkerToMap(${item.C}, ${item.D})">${item.name}</div>
                                <div class="star">
                                    <div class="ui_bubble_rating bubble_${item.rate}0"></div>
                                    |
                                    ${item.review} نقد
                                </div>
                                <div class="address">${item.address}</div>
                            </div>
                        </div>`;
                item.marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(item.C, item.D),
                                    map: mainMap,
                                    title: item.name,
                                    icon: {
                                        url: filterButtons[item.kindPlaceId].mapIcon,
                                        scaledSize: new google.maps.Size(30, 35), // scaled size
                                    },
                                });
            });

            nearPlaces = _result;

            $('.placeList').html(text);
            $('.placeListLoading').addClass('hidden');
            togglePlaces();
        }

        function togglePlaces(){
            nearPlaces.map(item =>{
                if(dontShowfilters.indexOf(item.kindPlaceId) == -1){
                    item.marker.setMap(mainMap);
                    $(`#listPlaceCard_${item.kindPlaceId}_${item.id}`).removeClass('hidden');
                }
                else{
                    item.marker.setMap(null);
                    $(`#listPlaceCard_${item.kindPlaceId}_${item.id}`).addClass('hidden');
                }
            })
        }


        $(window).ready(() => {
            initMap();
        })
    </script>
</body>
</html>