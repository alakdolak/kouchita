<style>
    .mapState {
        position: fixed;
        width: 90%;
        height: 90%;
        left: 5%;
        right: 5%;
        top: 5%;
        padding: 0;
    }
    #mapState1 {
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .extendedMapClose{
        left: 10px;
        top: 15px;
    }
    .extendedMapClose:before{
        font-size: 70px;
    }
</style>

<div id="mapState" class="modal fade">
    <div class="modal-dialog modal-lg mapState">

        <div id="extendedMapMoreInfoPlace" class="mapMoreInfoPlace">
            <div class="iconFamily iconClose closeMapMoreInfo" onclick="$('#extendedMapMoreInfoPlace').removeClass('showMapMoreInfo');"></div>
            <div class="imgMapMoreDiv">
                <a class="linkMapMore" target="_blank">
                    <div>
                        <img id="extendedMapMoreInfoImg" class="mapMoreInfoImg" src=""  onload="fitThisImg(this)">
                    </div>
                </a>

                @if(\auth()->check())
                    <div id="extendedMoreMapHeart" class="moreMapSaveButtonDiv" onclick="saveToTripList(this)" value="">
                        {{--fill-heart--}}
                        <span class="empty-heart"></span>
                    </div>
                @endif

            </div>
            <div class="contentMapMore">
                <a id="extendedMapMoreName" class="nameMapMore lessShowText linkMapMore" target="_blank"></a>
                <div class="rateMapMore">
                    <span id="extendedMapMoreRate" class=""></span>
                    <span id="extendedMapMoreReview" class="suggestionPackReviewCount"></span>
                    <span>{{__('نقد')}}</span>
                </div>
                <div class="mapMoreState">
                    <div>
                        {{__('استان')}}
                        <span id="extendedMoreMapState"></span>
                    </div>

                    <div>
                        {{__('شهر')}}
                        <span id="extendedMoreMapCity"></span>
                    </div>
                </div>
                <div class="mapMoreIcon">
                    <img id="extendedMapMoreIconImg" class="mapMoreIconImg" src=''>
                </div>
            </div>
        </div>

        <div id="mapState1" class="placeHolderAnime"></div>

        <div class="mapMenuList">
            <span class="mapIconsCommon boomgardyMapIcon" title="{{__('بوم گردی ها')}}" onclick="toggleIconInExtendedMap(this, 'boomgardy')">
                <span class="mapIconIcon boomIcon"></span>
            </span>
            <span class="mapIconsCommon hotelMapIcon" title="{{__('هتل ها')}}" onclick="toggleIconInExtendedMap(this, 'hotels')">
                <span class="mapIconIcon hotelIcon"></span>
            </span>
            <span class="mapIconsCommon amakenMapIcon" title="{{__('جاذبه ها')}}" onclick="toggleIconInExtendedMap(this, 'amaken')">
                <span class="mapIconIcon atraction"></span>
            </span>
            <span class="mapIconsCommon restaurantMapIcon" title="{{__('رستوران ها')}}" onclick="toggleIconInExtendedMap(this, 'restaurant')">
                <span class="mapIconIcon restaurantIcon"></span>
            </span>
            <span class="mapIconsCommon majaraMapIcon" title="{{__('طبیعت گردی ها')}}" onclick="toggleIconInExtendedMap(this, 'majara')">
                <span class="mapIconIcon majaraIcon"></span>
            </span>
            <span class="mapIconsCommon moreInfoMapIcon" title="{{__('اطلاعات بیشتر')}}" onclick="toggleIconInExtendedMap(this, 'moreInfo')">
                <span class="mapIconIcon moreInfoIcon">i</span>
            </span>
        </div>

        <div class="ui_close_x extendedMapClose" onclick="$('#mapState').modal('hide')"></div>
    </div>
</div>

<script>

    let showFirstTime = false;
    let extendedMainMap;
    let extendedMapId;
    let extendedMapData;
    let extendedMapMarker = {
        amaken: [],
        hotels: [],
        restaurant: [],
        majara: [],
        boomgardy: [],
        moreInfo: []
    };

    function showExtendedMap(){
        $('#mapState').modal('show');
    }

    function initExtendedMap(_data, _center) {
        extendedMapData = _data;
        var mapOptions = {
            center: new google.maps.LatLng(_center['x'],  _center['y']),
            zoom: 15,
            styles: googleMapStyle
        };

        var mapElementExtend = document.getElementById('mapState1');
        extendedMainMap = new google.maps.Map(mapElementExtend, mapOptions);

        let fk = Object.keys(extendedMapData);
        for (let x of fk) {
            extendedMapData[x].forEach(item => {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(item['C'], item['D']),
                    icon: {
                        url: mapIcon[x],
                        scaledSize: new google.maps.Size(30, 35), // scaled size
                    },
                    map: extendedMainMap,
                    title: item['name'],
                    url: item['url'],
                    id: item['id']
                }).addListener('click', function () {
                    openExtendedMapMarkerDescription(x, this.id);
                });
                mapMarker[x].push(marker);
            });
        }
    }

    function openExtendedMapMarkerDescription(_kind, _id){

        let place = null;
        extendedMapData[_kind].forEach(item => {
            if(item.id == _id)
                place = item;
        });

        $('#extendedMapMoreRate').removeClass();
        $('#extendedMapMoreRate').addClass('ui_bubble_rating bubble_' + place.rate + '0');

        $('#extendedMapMoreInfoImg').attr('src', place.pic);
        $('#extendedMapMoreName').text(place.name);
        $('.linkMapMore').attr('href', place.url);
        $('#extendedMapMoreReview').text(place.review);
        $('#extendedMapMoreIconImg').attr('src', mapIcon[_kind]);
        $('#extendedMoreMapCity').text(place.cityName);
        $('#extendedMoreMapState').text(place.stateName);
        $('#extendedMoreMapHeart').attr('value', place.id);

        $('#extendedMapMoreInfoPlace').addClass('showMapMoreInfo');
    }

    function toggleIconInExtendedMap(_element, _kind) {
        $(_element).toggleClass('offMapIcons');

        if($(_element).hasClass('offMapIcons'))
            setInExtendedMap(0, mapMarker[_kind]);
        else
            setInExtendedMap(1, mapMarker[_kind]);
    }

    function setInExtendedMap(isSet, marker) {
        if (isSet == 1) {
            for (var i = 0; i < marker.length; i++)
                marker[i]['j'].setMap(extendedMainMap)
        } else {
            for (var i = 0; i < marker.length; i++)
                marker[i]['j'].setMap(null)
        }
    }

    function getStatePlaces(){
        $.ajax({
            type: 'post',
            url: '{{route("getCityAllPlaces")}}',
            data: {
                _token: '{{csrf_token()}}',
                kind : 'state',
                id: '{{$state->id}}'
            },
            success: function(response){
                response = JSON.parse(response);
                let map = response.map;
                let allPlaces = response.allPlaces;

                let center = {
                    x: '{{$place->C}}',
                    y: '{{$place->D}}'
                };

                initExtendedMap(allPlaces, center);
            }
        })
    }

    getStatePlaces();
</script>
