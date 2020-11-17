
<div id="mapDivSample" style="display: none">

    <div id="mapMoreInfoPlace" class="mapMoreInfoPlace">
        <div class="iconFamily iconClose closeMapMoreInfo" onclick="$('#mapMoreInfoPlace').removeClass('showMapMoreInfo');"></div>
        <div class="imgMapMoreDiv">
            <a class="linkMapMore" target="_blank">
                <div>
                    <img id="mapMoreInfoImg" class="mapMoreInfoImg" src="#"  onload="fitThisImg(this)">
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
                    <span id="moreMapState"></span>
                </div>

                <div>
                    {{__('شهر')}}
                    <span id="moreMapCity"></span>
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
    let mapDivs = $('#mapDivSample').html();
    $('#mapDivSample').remove();

    let mainMap;
    let mapId;
    let mapData;
    let mapCenter;
    let forceCenter;
    let mapMarker = {
        amaken: [],
        hotels: [],
        restaurant: [],
        majara: [],
        boomgardy: [],
        moreInfo: [],
        selected: []
    };
    let mapIcon = {
        amaken: '{{URL::asset('images/mapIcon/att.png')}}',
        hotels: '{{URL::asset('images/mapIcon/hotel.png')}}',
        restaurant: '{{URL::asset('images/mapIcon/res.png')}}',
        majara: '{{URL::asset('images/mapIcon/adv.png')}}',
        boomgardy: '{{URL::asset('images/mapIcon/boom.png')}}',
        moreInfo: '{{URL::asset('images/mapIcon/info.png')}}',
    };

    function createMap(_id, _center, _data, _forceCenter = false) {
        mapId = _id;
        mapData = _data;
        mapCenter = _center;
        forceCenter = _forceCenter;
        $('#' + mapId).html(mapDivs);
        initMap();
    }

    function initMap() {
        var mapOptions = {
            center: new google.maps.LatLng(mapCenter['x'],  mapCenter['y']),
            zoom: 15,
            styles: window.googleMapStyle
        };

        var mapElementSmall = document.getElementById('mapSection');
        mainMap = new google.maps.Map(mapElementSmall, mapOptions);

        var bounds = new google.maps.LatLngBounds();
        let fk = Object.keys(mapData);
        for (let x of fk) {
            mapData[x].forEach(item => {
                let iconMap = null;
                if(mapIcon[x])
                    iconMap = {
                        url: mapIcon[x],
                        scaledSize: new google.maps.Size(30, 35), // scaled size
                    };

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(item['C'], item['D']),
                    icon: iconMap,
                    map: mainMap,
                    title: item['name'],
                    url: item['url'],
                    id: item['id']
                }).addListener('click', function () {
                        openMapMarkerDescription(x, this.id);
                    });
                mapMarker[x].push(marker);

                loc = new google.maps.LatLng(item['C'], item['D']);
                bounds.extend(loc);
            });
        }
        if(!forceCenter) {
            mainMap.fitBounds(bounds);
            mainMap.panToBounds(bounds);
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

        $('#mapMoreInfoPlace').addClass('showMapMoreInfo');
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

<script async src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0"></script>
