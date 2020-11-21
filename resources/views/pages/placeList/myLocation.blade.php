<!doctype html>
<html lang="fa">
<head>
    @include('layouts.topHeader')
    <title>اطراف من</title>
    <link rel="stylesheet" href="{{URL::asset('css/pages/myLocation.css?v='.$fileVersions)}}">

    <style>
        .mobileListSection{
            display: none;
        }

        @media (max-width: 767px) {
            .gapForMobileFooter{
                display: none;
            }
            .hideOnScreen.mobileHeader{
                display: none;
            }
            .bodySec{
                overflow: hidden;
                height: calc(100vh - 35px);
            }
            .gmnoprint{
                display: none;
            }
            .mapSection{
                width: 100%;
            }
            .bodySec .listSection{
                display: none;
            }
            .bodySec .mobileListSection{
                display: block;
                background: white;
                position: absolute;
                bottom: 20px;
                right: 0px;
                width: 100%;
                height: 75vh;
                height: 70px;
                z-index: 8;
                border-radius: 20px 20px 0px 0px;
                box-shadow: 0px 0px 4px 1px #c1c1c1;
            }
            .bodySec .mobileListSection.fullMobileList{
                border-radius: 0px;
            }
            .bodySec .mobileListSection .fingerTopListSec{
                width: 35px;
                height: 5px;
                background: #c5c5c5;
                border-radius: 20px;
                margin-top: 5px;
                margin-right: auto;
                margin-left: auto;
            }
            .bodySec .mobileListSection .nearName{
                text-align: center;
                font-size: 18px;
                margin-top: 10px;
                font-weight: bold;
            }
            .bodySec .mobileListSection .mobileListContent{
                overflow-y: auto;
                max-height: 100%;
                padding-bottom: 60px;
            }
            .bodySec .mobileListSection .mobileListContent .testSS{
                width: 100%;
                background: red;
                font-size: 20px;
                height: 20px;
                margin-bottom: 20px;
            }


            .searchSec input{
                width: 100%;
            }
            .sideSection{
                transition: .3s;
                height: 100px;
                width: 100%;
            }
            .sideSection.fullMobileList{
                background: white;
            }

            .sideSection > div{
                width: 96%;
                border-radius: 35px;
            }
            .sideSection .filtersSec{
                background: transparent;
                box-shadow: none;
                overflow-x: auto;
                border-radius: 0px;
                margin: 0;
                width: 100%;
                padding: 0;
                white-space: nowrap;
                display: block;
                padding-bottom: 5px
            }
            .sideSection .filtersSec::-webkit-scrollbar {
                display: none;
            }
            .sideSection .filtersSec .filKind{
                flex-direction: row-reverse;
                color: white;
                border-radius: 20px;
                padding: 5px;
                min-width: 85px;
                justify-content: space-around;
                margin-right: 10px;
                display: inline-flex;
            }
            .sideSection .filtersSec .filKind .icon{
                font-size: 12px;
                width: 20px;
                height: 20px;
                margin-bottom: 0px;
            }
            .sideSection .filtersSec .filKind .name{
                margin-left: 5px;
            }
            .sideSection .filtersSec .filKind.offFilter{
                background: white;
                color: #757575;
            }
            .filtersSec .filKind.amakenFilter {
                background: #ec008c;
            }
            .filtersSec .filKind.hotelFilter{
                background: #00516f;
            }
            .filtersSec .filKind.restaurantFilter{
                background: #e4d900;
            }
            .filtersSec .filKind.advantureFilter{
                background: #ed1c24;
            }
            .filtersSec .filKind.boomgardyFilter{
                background: #00aeef;
            }
        }
    </style>

</head>
<body>
    @include('general.forAllPages')

    @include('layouts.header1')

    <div class="bodySec">
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

        <div class="listSection">
            <div class="leftArrowIcon" onclick="$('.bodySec').toggleClass('fullMap');"></div>
            <div class="content">
                <div class="fullyCenterContent placeListLoading hidden">
                    <img alt="loading" data-src="{{URL::asset('images/loading.gif')}}" class="lazyload" style="width: 100px;" />
                </div>
                <div class="placeList"></div>
            </div>
        </div>
        <div id="mobileListSection" class="mobileListSection">
            <div class="topSecMobileList">
                <div class="fingerTopListSec"></div>
                <div class="nearName">اطراف من</div>
            </div>
            <div class="mobileListContent">
                @for($i = 0; $i < 100; $i++)
                    <div class="testSS">{{$i}}</div>
                 @endfor
            </div>
        </div>
        <div class="mapSection">
            <div id="map" class="mapDiv"></div>
        </div>
    </div>

    @include('layouts.placeFooter')
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0"></script>

    <script>
        var startTouchY = 0;
        var startMobileListHeight = $('#mobileListSection').height();
        $('.topSecMobileList').on('touchstart', e => {
            var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
            startTouchY = touch.pageY;
            startMobileListHeight = $('#mobileListSection').height();
        });
        $('.topSecMobileList').on('touchend', e => {
            var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
            var height = $('#mobileListSection').height();
            var windowHeight = $(window).height();
            var maxHeight = windowHeight - 155;
            var resultHeight;
            var changeBackGround = false;

            if(height > windowHeight/2) {
                if(height > startMobileListHeight)
                    changeBackGround = true;

                resultHeight = height > startMobileListHeight ? maxHeight : windowHeight / 2;
            }
            else
                resultHeight = height > startMobileListHeight ? windowHeight/2 : 75;

            if(changeBackGround){
                $('.sideSection').addClass('fullMobileList');
                $('#mobileListSection').addClass('fullMobileList');
            }
            else {
                $('.sideSection').removeClass('fullMobileList');
                $('#mobileListSection').removeClass('fullMobileList');
            }

            $('#mobileListSection').animate({ height: resultHeight}, 300);
        });
        $('.topSecMobileList').on('touchmove', e => {
            var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
            var maxHeight = $(window).height() - 155;
            var height = startMobileListHeight + startTouchY - touch.pageY;

            if(height > 75 && height < maxHeight)
                $('#mobileListSection').height(height);
            else if(height <= 75)
                $('#mobileListSection').height(75);
            else if(height >= maxHeight)
                $('#mobileListSection').height(maxHeight);
            else
                $('#mobileListSection').height(75);
        })
    </script>

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
                enName: 'amakenFilter',
                icon: 'touristAttractions',
                mapIcon: '{{URL::asset('images/mapIcon/att.png')}}',
                name: 'جای دیدنی',
            },
            3: {
                id: 3,
                enName: 'restaurantFilter',
                icon: 'restaurantIcon',
                mapIcon: '{{URL::asset('images/mapIcon/res.png')}}',
                name: 'رستوران',
            },
            4: {
                id: 4,
                enName: 'hotelFilter',
                icon: 'hotelIcon',
                mapIcon: '{{URL::asset('images/mapIcon/hotel.png')}}',
                name: 'اقامتگاه',
            },
            6: {
                id: 6,
                enName: 'advantureFilter',
                icon: 'adventureIcon',
                mapIcon: '{{URL::asset('images/mapIcon/adv.png')}}',
                name: 'طبیعت گردی',
            },
            12: {
                id: 12,
                enName: 'boomgardyFilter',
                icon: 'boomIcon',
                mapIcon: '{{URL::asset('images/mapIcon/boom.png')}}',
                name: 'بوم گردی',
            },
        };

        function createFilterHtml(){
            var text = '';
            for(var item in filterButtons){
                text += `<div class="filKind ${filterButtons[item].enName}" onclick="toggleFilter(${filterButtons[item].id}, this)">
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
                styles: window.googleMapStyle,
                gestureHandling: 'greedy',
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
            _lat = parseFloat(_lat);
            _lng = parseFloat(_lng);
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
            $('.bodySec').removeClass('fullMap');

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
                                    lat: item.C,
                                    lng: item.D,
                                    title: item.name,
                                    icon: {
                                        url: filterButtons[item.kindPlaceId].mapIcon,
                                        scaledSize: new google.maps.Size(30, 35), // scaled size
                                    },
                                });
                item.marker.addListener('click', function(){
                    setMarkerToMap(this.lat, this.lng)
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