<!doctype html>
<html lang="fa">
<head>
    @include('layouts.topHeader')
    <title>اطراف من</title>
    <link rel="stylesheet" href="{{URL::asset('css/pages/myLocation.css?v='.$fileVersions)}}">

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