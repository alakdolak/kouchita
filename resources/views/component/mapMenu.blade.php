<link rel="stylesheet" href="{{URL::asset('css/component/map.css')}}">

<style>
    .moreMapSaveButtonDiv{
        position: absolute;
        top: 0px;
        font-size: 25px;
        right: 5px;
        cursor: pointer;
    }
    .moreMapSaveButtonDiv:hover .empty-heart{
        color: red;
    }
</style>

<div id="mapDivSample" style="display: none">
    <div id="mapMoreInfoPlace" class="mapMoreInfoPlace">
        <div class="iconFamily iconClose closeMapMoreInfo" onclick="$('#mapMoreInfoPlace').hide();"></div>
        <div class="imgMapMoreDiv">
            <a class="linkMapMore" target="_blank">
                <div>
                    <img id="mapMoreInfoImg" class="mapMoreInfoImg" src=""  onload="fitThisImg(this)">
                </div>
            </a>

            @if(\auth()->check())
                <div id="moreMapHeart" class="moreMapSaveButtonDiv" onclick="saveToTripList(this)" value="">
                    {{--fill-heart--}}
                    <span class="empty-heart"></span>
                </div>
            @endif

        </div>
        <div class="contentMapMore">
            <a id="mapMoreName" class="nameMapMore lessShowText linkMapMore" target="_blank"></a>
            <div class="rateMapMore">
                <span id="mapMoreRate" class=""></span>
                <span id="mapMoreReview" class="suggestionPackReviewCount"></span>
                <span>{{__('نقد')}}</span>
            </div>
            <div class="mapMoreState">
                <div>
                    {{__('استان')}}
                    <span id="moreMapCity"></span>
                </div>

                <div>
                    {{__('شهر')}}
                    <span id="moreMapState"></span>
                </div>
            </div>
            <div class="mapMoreIcon">
                <img id="mapMoreIconImg" class="mapMoreIconImg" src=''>
            </div>
        </div>
    </div>

    <div id="mapSection" style="width: 100%; height: 100%"></div>

    <div class="mapMenuList">
        <span class="mapIconsCommon boomgardyMapIcon" title="{{__('بوم گردی ها')}}" onclick="toggleIconInMap(this, 'boomgardy')">
            <span class="mapIconIcon boomIcon"></span>
        </span>
        <span class="mapIconsCommon hotelMapIcon" title="{{__('هتل ها')}}" onclick="toggleIconInMap(this, 'hotels')">
            <span class="mapIconIcon hotelIcon"></span>
        </span>
        <span class="mapIconsCommon amakenMapIcon" title="{{__('جاذبه ها')}}" onclick="toggleIconInMap(this, 'amaken')">
            <span class="mapIconIcon atraction"></span>
        </span>
        <span class="mapIconsCommon restaurantMapIcon" title="{{__('رستوران ها')}}" onclick="toggleIconInMap(this, 'restaurant')">
            <span class="mapIconIcon restaurantIcon"></span>
        </span>
        <span class="mapIconsCommon majaraMapIcon" title="{{__('طبیعت گردی ها')}}" onclick="toggleIconInMap(this, 'majara')">
            <span class="mapIconIcon majaraIcon"></span>
        </span>
        <span class="mapIconsCommon moreInfoMapIcon" title="{{__('اطلاعات بیشتر')}}" onclick="toggleIconInMap(this, 'moreInfo')">
            <span class="mapIconIcon moreInfoIcon">i</span>
        </span>
    </div>
</div>

<script>
    let mainMap;
    let mapId;
    let mapData;
    let mapCenter;
    let mapBound;
    let googleMapStyle = [
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ebe3cd"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#523735"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#f5f1e6"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#c9b2a6"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#dcd2be"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#ae9e90"
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "poi",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#93817c"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#a5b076"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#447530"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f1e6"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#fdfcf8"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f8c967"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#e9bc62"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e98d58"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#db8555"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#806b63"
                }
            ]
        },
        {
            "featureType": "transit",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#8f7d77"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#ebe3cd"
                }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#b9d3c2"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#92998d"
                }
            ]
        }
    ];
    let mapMarker = {
        amaken: [],
        hotels: [],
        restaurant: [],
        majara: [],
        boomgardy: [],
        moreInfo: []
    };
    let mapIcon = {
        amaken: '{{URL::asset('images/mapIcon/att.png')}}',
        hotels: '{{URL::asset('images/mapIcon/hotel.png')}}',
        restaurant: '{{URL::asset('images/mapIcon/res.png')}}',
        majara: '{{URL::asset('images/mapIcon/adv.png')}}',
        boomgardy: '{{URL::asset('images/mapIcon/boom.png')}}',
        moreInfo: '{{URL::asset('images/mapIcon/info.png')}}',
    };

    let mapDivs = $('#mapDivSample').html();
    $('#mapDivSample').remove();

    function createMap(_id, _center, _bounds, _data) {
        mapId = _id;
        mapData = _data;
        mapCenter = _center;
        mapBound = _bounds;
        $('#' + _id).html(mapDivs);
        initMap();
    }

    function initMap() {
        var mapOptions = {
            center: new google.maps.LatLng(mapCenter['x'],  mapCenter['y']),
            zoom: 5,
            styles: googleMapStyle
        };

        var mapElementSmall = document.getElementById('mapSection');
        mainMap = new google.maps.Map(mapElementSmall, mapOptions);

        if(mapBound.length > 0 && mapBound[0] != 0){
            var bounds = new google.maps.LatLngBounds({lat: mapBound['minLat'], lng: mapBound['minLng']}, {lat: mapBound['maxLat'], lng: mapBound['maxLng']});
            mainMap.fitBounds(bounds);
        }

        let fk = Object.keys(mapData);
        for (let x of fk) {
            mapData[x].forEach(item => {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(item['C'], item['D']),
                    icon: {
                        url: mapIcon[x],
                        scaledSize: new google.maps.Size(30, 35), // scaled size
                    },
                    map: mainMap,
                    title: item['name'],
                    url: item['url'],
                    id: item['id']
                }).addListener('click', function () {
                        openMapMarkerDescription(x, this.id);
                    });
                mapMarker[x].push(marker);
            });
        }
    }

    function openMapMarkerDescription(_kind, _id){

        let place = null;
        mapData[_kind].forEach(item => {
            if(item.id == _id)
                place = item;
        });

        $('#mapMoreRate').removeClass();
        $('#mapMoreRate').addClass('ui_bubble_rating bubble_' + place.rate + '0');

        $('#mapMoreInfoImg').attr('src', place.pic);
        $('#mapMoreName').text(place.name);
        $('.linkMapMore').attr('href', place.url);
        $('#mapMoreReview').text(place.review);
        $('#mapMoreIconImg').attr('src', mapIcon[_kind]);
        $('#moreMapCity').text(place.cityName);
        $('#moreMapState').text(place.stateName);
        $('#moreMapHeart').attr('value', place.id);

        $('#mapMoreInfoPlace').show();
    }

    function toggleIconInMap(_element, _kind) {
        $(_element).toggleClass('offMapIcons');

        if($(_element).hasClass('offMapIcons'))
            setInMap(0, mapMarker[_kind]);
        else
            setInMap(1, mapMarker[_kind]);
    }

    function setInMap(isSet, marker) {
        if (isSet == 1) {
            for (var i = 0; i < marker.length; i++)
                marker[i]['j'].setMap(mainMap)
        } else {
            for (var i = 0; i < marker.length; i++)
                marker[i]['j'].setMap(null)
        }

    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0"></script>
