
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/mapSection.css')}}' />

<div id="nearbyDiv" class="ppr_rup ppr_priv_location_detail_two_column">
    <div class="column_wrap is-mobile">
        <div id="nearbyMainContainer" class="content_column ui_column is-8">
            <div class="ppr_rup ppr_priv_location_nearby">
                <div class="nearbyContainer outerShell block_wrap">
                    <div class="ui_columns neighborhood position-relative">
                        <div id="map" class="ui_column is-12 mapTile prv_map clickable"></div>
                        <div class="clear-both"></div>
                        <div class="mapSetting">
                            <div onclick="showSetting(this)">
                                <h1>همچنین ببینید</h1>
                                <img class="closeShowMainMap" src="{{URL::asset('images/fast-forward.png')}}">
                            </div>
                            <div>
                                <center>
                                    <img id="mainMapHotelImg" src="{{URL::asset('images/mapIcon/mhotel.png')}}" title="اقامتگاه ها" onclick="toggleHotelsInMainMap(1)">
                                    <img id="mainMapRestImg" src="{{URL::asset('images/mapIcon/mrest.png')}}" title="" onclick="toggleRestaurantsInMainMap(1)">
                                    <img id="mainMapFastImg" src="{{URL::asset('images/mapIcon/mfast.png')}}" title="" onclick="toggleFastFoodsInMainMap(1)">
                                    {{--<img id="mainMapMusImg" src="{{URL::asset('images/mapIcon/matr_mus.png')}}" onclick="toggleMuseumsInMainMap(1)">--}}
                                    <img id="mainMapPlaImg" src="{{URL::asset('images/mapIcon/matr_pla.png')}}" title="" onclick="toggleAmakenInMainMap(1)">
                                    {{--<img id="mainMapShcImg" src="{{URL::asset('images/mapIcon/matr_shc.png')}}" onclick="toggleShopCenterInMainMap(1)">--}}
                                    {{--<img id="mainMapFunImg" src="{{URL::asset('images/mapIcon/matr_fun.png')}}" onclick="toggleFunCenterInMainMap(1)">--}}
                                    <img id="mainMapAdvImg" src="{{URL::asset('images/mapIcon/matr_adv.png')}}" title="" onclick="toggleMajaraCenterInMainMap(1)">
                                    {{--<img id="mainMapNatImg" src="{{URL::asset('images/mapIcon/matr_nat.png')}}" onclick="toggleNaturalsInMainMap(1)">--}}
                                </center>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function showSetting(element){
        $(element).next().toggle();
        $(element).children().last().toggleClass('disableSettingArrow');
    }
</script>

<script>
    var x = '{{$place->C}}';
    var y = '{{$place->D}}';
    var iconBase = '{{URL::asset('images/mapIcon/')}}';
    var icons = {
        hotel: iconBase + '/mhotel.png',
        pla: iconBase + '/matr_pla.png',
        mus: iconBase + '/matr_mus.png',
        shc: iconBase + '/matr_shc.png',
        nat: iconBase + '/matr_nat.png',
        fun: iconBase + '/matr_fun.png',
        adv: iconBase + '/matr_adv.png',
        vil: iconBase + '/matr_vil',
        fastfood: iconBase + '/mfast.png',
        rest: iconBase + '/mrest.png'
    };
    var nearPlacesMap = [];
    var x1 = [];
    var y1 = [];
    var placeName = [];
    var lengthPlace = [];
    var kind;
    var kindRest = [];
    var kindAmaken = [];
    var mainMap;
    var markersFastMainMap = [];
    var markersRestMainMap = [];
    var markersHotelMainMap = [];
    var markerAmakenMainMap = [];
    var markerMajaraMainMap = [];

    var isHotelOnMainMap = 1;
    var isAmakenOnMainMap = 1;
    var isMajaraOnMainMap = 1;
    var isRestaurantOnMainMap = [1, 1];

    function init() {
        var x = '{{$place->C}}';
        var y = '{{$place->D}}';
        var place_name = '{{ $place->name }}';
        var mapOptions = {
            zoom: 17,
            center: new google.maps.LatLng(x, y),
            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{
                "featureType": "landscape",
                "stylers": [{"hue": "#FFA800"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
            }, {
                "featureType": "road.highway",
                "stylers": [{"hue": "#53FF00"}, {"saturation": -73}, {"lightness": 40}, {"gamma": 1}]
            }, {
                "featureType": "road.arterial",
                "stylers": [{"hue": "#FBFF00"}, {"saturation": 0}, {"lightness": 0}, {"gamma": 1}]
            }, {
                "featureType": "road.local",
                "stylers": [{"hue": "#00FFFD"}, {"saturation": 0}, {"lightness": 30}, {"gamma": 1}]
            }, {
                "featureType": "water",
                "stylers": [{"hue": "#00BFFF"}, {"saturation": 6}, {"lightness": 8}, {"gamma": 1}]
            }]
        };
        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElementSmall = document.getElementById('map');
        // Create the Google Map using our element and options defined above
        mainMap = new google.maps.Map(mapElementSmall, mapOptions);
        // Let's also add a marker while we're at it smal map
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(x, y),
            map: mainMap,
            title: place_name
        });
    }

    function getNearby(){
        $.ajax({
            type: 'post',
            url: '{{route("getNearby")}}',
            data: {
                'placeId': placeId,
                'kindPlaceId' : kindPlaceId,
                'count' : 10,
            },
            success: function(response){
                response = JSON.parse(response);
                nearPlacesMap = response[0];

                createSwiperContent(response[1], 'article');
                addMarkerToMainMap(nearPlacesMap);
            }
        })
    }
    getNearby();

    function mySetMapMinMap(isSet, marker) {
        if (isSet == 1) {
            for (var i = 0; i < marker.length; i++) {
                marker[i].setMap(mainMap);
            }
        }
        else
            for (var i = 0; i < marker.length; i++) {
                marker[i].setMap(null);
            }
    }

    function addMarkerToMainMap(nearPlacesMap){
        var marker;
        for(var i = 0; i < nearPlacesMap.length; i++){

            if(i == 0) {
                var nearHotel = nearPlacesMap[i];
                for(j = 0; j < nearHotel.length; j++){
                    markersHotelMainMap[j] = new google.maps.Marker({
                        position: new google.maps.LatLng(nearHotel[j].C, nearHotel[j].D),
                        map: mainMap,
                        title: nearHotel[j].name,
                        icon: {
                            url: icons.hotel,
                            scaledSize: new google.maps.Size(35, 35)
                        }
                    });
                }
                //this function in similarLocation.blade.php file
                createSwiperContent(nearPlacesMap[i], 'hotel');
            }
            else if(i == 1) {
                var nearRestuarant = nearPlacesMap[i];
                for(j = 0; j < nearRestuarant.length; j++) {
                    if (nearRestuarant[j].kind_id == 1)
                        kindIcon = icons.rest;
                    else
                        kindIcon = icons.fastfood;
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(nearRestuarant[j].C, nearRestuarant[j].D),
                        map: mainMap,
                        title: nearRestuarant[j].name,
                        icon: {
                            url: kindIcon,
                            scaledSize: new google.maps.Size(35, 35)
                        }
                    });
                    if (nearRestuarant[j].kind_id == 1)
                        markersRestMainMap[markersRestMainMap.length] = marker;
                    else
                        markersFastMainMap[markersFastMainMap.length] = marker;

                }
                //this function in similarLocation.blade.php file
                createSwiperContent(nearPlacesMap[i], 'restuarant');
            }
            else if(i == 2){
                var nearAmaken = nearPlacesMap[i];
                for(j = 0; j < nearAmaken.length; j++){

                    // if (nearAmaken[j].mooze == 1)
                    //     kindIcon = icons.mus;
                    // else if (nearAmaken[j].tarikhi == 1)
                    //     kindIcon = icons.pla;
                    // else if (nearAmaken[j].tabiatgardi == 1)
                    //     kindIcon = icons.nat;
                    // else if (nearAmaken[j].tafrihi == 1)
                    //     kindIcon = icons.fun;
                    // else if (nearAmaken[j].markazkharid == 1)
                    //     kindIcon = icons.shc;
                    // else
                        kindIcon = icons.pla;
                    markerAmakenMainMap[j] = new google.maps.Marker({
                        position: new google.maps.LatLng(nearAmaken[j].C, nearAmaken[j].D),
                        map: mainMap,
                        title: nearAmaken[j].name,
                        icon: {
                            url: kindIcon,
                            scaledSize: new google.maps.Size(35, 35)
                        }
                    });
                }

                //this function in similarLocation.blade.php file
                createSwiperContent(nearPlacesMap[i], 'amaken');
            }
            else if(i == 3){
                var nearMajara = nearPlacesMap[i];
                for(j = 0; j < nearMajara.length; j++){
                    markerMajaraMainMap[j] = new google.maps.Marker({
                        position: new google.maps.LatLng(nearMajara[j].C, nearMajara[j].D),
                        map: mainMap,
                        title: nearMajara[j].name,
                        icon: {
                            url: icons.adv,
                            scaledSize: new google.maps.Size(35, 35)
                        }
                    });
                }

                //this function in similarLocation.blade.php file
                createSwiperContent(nearPlacesMap[i], 'majara');
            }

        }

        //this function in similarLocation.blade.php file
        initSwiper();
    }

    function toggleHotelsInMainMap(value) {
        if (isHotelOnMainMap == value) {
            document.getElementById('mainMapHotelImg').src = "{{URL::asset('images/mapIcon/mhoteloff.png')}}";
            isHotelOnMainMap = 0;
            mySetMapMinMap(isHotelOnMainMap, markersHotelMainMap);
        }
        else {
            document.getElementById('mainMapHotelImg').src = "{{URL::asset('images/mapIcon/mhotel.png')}}";
            isHotelOnMainMap = 1;
            mySetMapMinMap(isHotelOnMainMap, markersHotelMainMap);
        }
    }
    function toggleRestaurantsInMainMap(value) {
        if (isRestaurantOnMainMap[0] == value) {
            document.getElementById('mainMapRestImg').src = "{{URL::asset('images/mapIcon/mrestoff.png')}}";
            isRestaurantOnMainMap[0] = 0;
            mySetMapMinMap(isRestaurantOnMainMap[0], markersRestMainMap);
        }
        else {
            document.getElementById('mainMapRestImg').src = "{{URL::asset('images/mapIcon/mrest.png')}}";
            isRestaurantOnMainMap[0] = 1;
            mySetMapMinMap(isRestaurantOnMainMap[0], markersRestMainMap);
        }
    }
    function toggleFastFoodsInMainMap(value) {
        if (isRestaurantOnMainMap[1] == value) {
            document.getElementById('mainMapFastImg').src = "{{URL::asset('images/mapIcon/mfastoff.png')}}";
            isRestaurantOnMainMap[1] = 0;
            mySetMapMinMap(isRestaurantOnMainMap[1], markersFastMainMap);
        }
        else {
            document.getElementById('mainMapFastImg').src = "{{URL::asset('images/mapIcon/mfast.png')}}";
            isRestaurantOnMainMap[1] = 1;
            mySetMapMinMap(isRestaurantOnMainMap[1], markersFastMainMap);
        }
    }
    function toggleAmakenInMainMap(value){
        if (isAmakenOnMainMap == value) {
            document.getElementById('mainMapPlaImg').src = "{{URL::asset('images/mapIcon/matr_plaoff.png')}}";
            isAmakenOnMainMap = 0;
            mySetMapMinMap(isAmakenOnMainMap, markerAmakenMainMap);
        }
        else {
            document.getElementById('mainMapPlaImg').src = "{{URL::asset('images/mapIcon/matr_pla.png')}}";
            isAmakenOnMainMap = 1;
            mySetMapMinMap(isAmakenOnMainMap, markerAmakenMainMap);
        }
    }
    function toggleMajaraCenterInMainMap(value) {
        if (isMajaraOnMainMap == value) {
            document.getElementById('mainMapAdvImg').src = "{{URL::asset('images/mapIcon/matr_advoff.png')}}";
            isMajaraOnMainMap = 0;
            mySetMapMinMap(isMajaraOnMainMap, markerMajaraMainMap);
        }
        else {
            document.getElementById('mainMapAdvImg').src = "{{URL::asset('images/mapIcon/matr_adv.png')}}";
            isMajaraOnMainMap = 1;
            mySetMapMinMap(isMajaraOnMainMap, markerMajaraMainMap);
        }
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=init"></script>
