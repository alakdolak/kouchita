
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
                                    <img id="mainMapHotelImg" src="{{URL::asset('_images/mapIcon/mhotel.png')}}" onclick="toggleHotelsInMainMap(1)">
                                    <img id="mainMapRestImg" src="{{URL::asset('_images/mapIcon/mrest.png')}}" onclick="toggleRestaurantsInMainMap(1)">
                                    <img id="mainMapFastImg" src="{{URL::asset('_images/mapIcon/mfast.png')}}" onclick="toggleFastFoodsInMainMap(1)">
                                    <img id="mainMapMusImg" src="{{URL::asset('_images/mapIcon/matr_mus.png')}}" onclick="toggleMuseumsInMainMap(1)">
                                    <img id="mainMapPlaImg" src="{{URL::asset('_images/mapIcon/matr_pla.png')}}" onclick="toggleHistoricalInMainMap(1)">
                                    <img id="mainMapShcImg" src="{{URL::asset('_images/mapIcon/matr_shc.png')}}" onclick="toggleShopCenterInMainMap(1)">
                                    <img id="mainMapFunImg" src="{{URL::asset('_images/mapIcon/matr_fun.png')}}" onclick="toggleFunCenterInMainMap(1)">
                                    <img id="mainMapAdvImg" src="{{URL::asset('_images/mapIcon/matr_adv.png')}}" onclick="toggleMajaraCenterInMainMap(1)">
                                    <img id="mainMapNatImg" src="{{URL::asset('_images/mapIcon/matr_nat.png')}}" onclick="toggleNaturalsInMainMap(1)">
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
    var iconBase = '{{URL::asset('_images/mapIcon/')}}';
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
    var smallMap;

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
        smallMap = new google.maps.Map(mapElementSmall, mapOptions);
        // Let's also add a marker while we're at it smal map
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(x, y),
            map: smallMap,
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
                nearPlacesMap = response;

                addMarkerToSmallMap(nearPlacesMap);
            }
        })
    }
    getNearby();

    function addMarkerToSmallMap(nearPlacesMap){
        var marker;
        for(var i = 0; i < nearPlacesMap.length; i++){

            if(i == 0) {
                var nearHotel = nearPlacesMap[i];
                for(j = 0; j < nearHotel.length; j++){
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(nearHotel[j].C, nearHotel[j].D),
                        map: smallMap,
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
                    if (nearRestuarant[i].kind_id == 1)
                        kindIcon = icons.rest;
                    else
                        kindIcon = icons.fastfood;
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(nearRestuarant[j].C, nearRestuarant[j].D),
                        map: smallMap,
                        title: nearRestuarant[j].name,
                        icon: {
                            url: kindIcon,
                            scaledSize: new google.maps.Size(35, 35)
                        }
                    });
                }

                //this function in similarLocation.blade.php file
                createSwiperContent(nearPlacesMap[i], 'restuarant');
            }
            else if(i == 2){
                var nearAmaken = nearPlacesMap[i];
                for(j = 0; j < nearAmaken.length; j++){

                    if (nearAmaken[j].mooze == 1)
                        kindIcon = icons.mus;
                    else if (nearAmaken[j].tarikhi == 1)
                        kindIcon = icons.pla;
                    else if (nearAmaken[j].tabiatgardi == 1)
                        kindIcon = icons.nat;
                    else if (nearAmaken[j].tafrihi == 1)
                        kindIcon = icons.fun;
                    else if (nearAmaken[j].markazkharid == 1)
                        kindIcon = icons.shc;
                    else
                        kindIcon = icons.pla;
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(nearAmaken[j].C, nearAmaken[j].D),
                        map: smallMap,
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
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(nearMajara[j].C, nearMajara[j].D),
                        map: smallMap,
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
        if (isHotelOn == value) {
            document.getElementById('mainMapHotelImg').src = "{{URL::asset('_images/mapIcon/mhoteloff.png')}}";
            isHotelOn = 0;
            mySetMap(isHotelOn, markersHotel);
        }
        else {
            document.getElementById('mainMapHotelImg').src = "{{URL::asset('_images/mapIcon/mhotel.png')}}";
            isHotelOn = 1;
            mySetMap(isHotelOn, markersHotel);
        }
    }

    function toggleRestaurantsInMainMap(value) {
        if (isRestaurantOn[0] == value) {
            document.getElementById('mainMapRestImg').src = "{{URL::asset('_images/mapIcon/mrestoff.png')}}";
            isRestaurantOn[0] = 0;
            mySetMap(isRestaurantOn[0], markersRest);
        }
        else {
            document.getElementById('mainMapRestImg').src = "{{URL::asset('_images/mapIcon/mrest.png')}}";
            isRestaurantOn[0] = 1;
            mySetMap(isRestaurantOn[0], markersRest);
        }
    }

    function toggleFastFoodsInMainMap(value) {
        if (isRestaurantOn[1] == value) {
            document.getElementById('mainMapFastImg').src = "{{URL::asset('_images/mapIcon/mfastoff.png')}}";
            isRestaurantOn[1] = 0;
            mySetMap(isRestaurantOn[1], markersFast);
        }
        else {
            document.getElementById('mainMapFastImg').src = "{{URL::asset('_images/mapIcon/mfast.png')}}";
            isRestaurantOn[1] = 1;
            mySetMap(isRestaurantOn[1], markersFast);
        }
    }

    function toggleMuseumsInMainMap(value) {
        if (isAmakenOn[0] == value) {
            document.getElementById('mainMapMusImg').src = "{{URL::asset('_images/mapIcon/matr_musoff.png')}}";
            isAmakenOn[0] = 0;
            mySetMap(isAmakenOn[0], markersMus);
        }
        else {
            document.getElementById('mainMapMusImg').src = "{{URL::asset('_images/mapIcon/matr_mus.png')}}";
            isAmakenOn[0] = 1;
            mySetMap(isAmakenOn[0], markersMus);
        }
    }

    function toggleHistoricalInMainMap(value) {
        if (isAmakenOn[1] == value) {
            document.getElementById('mainMapPlaImg').src = "{{URL::asset('_images/mapIcon/matr_plaoff.png')}}";
            isAmakenOn[1] = 0;
            mySetMap(isAmakenOn[1], markersPla);
        }
        else {
            document.getElementById('mainMapPlaImg').src = "{{URL::asset('_images/mapIcon/matr_pla.png')}}";
            isAmakenOn[1] = 1;
            mySetMap(isAmakenOn[1], markersPla);
        }
    }

    function toggleShopCenterInMainMap(value) {
        if (isAmakenOn[2] == value) {
            document.getElementById('mainMapShcImg').src = "{{URL::asset('_images/mapIcon/matr_shcoff.png')}}";
            isAmakenOn[2] = 0;
            mySetMap(isAmakenOn[2], markersShc);
        }
        else {
            document.getElementById('mainMapShcImg').src = "{{URL::asset('_images/mapIcon/matr_shc.png')}}";
            isAmakenOn[2] = 1;
            mySetMap(isAmakenOn[2], markersShc);
        }
    }

    function toggleFunCenterInMainMap(value) {
        if (isAmakenOn[3] == value) {
            document.getElementById('mainMapFunImg').src = "{{URL::asset('_images/mapIcon/matr_funoff.png')}}";
            isAmakenOn[3] = 0;
            mySetMap(isAmakenOn[3], markersFun);
        }
        else {
            document.getElementById('mainMapFunImg').src = "{{URL::asset('_images/mapIcon/matr_fun.png')}}";
            isAmakenOn[3] = 1;
            mySetMap(isAmakenOn[3], markersFun);
        }
    }

    function toggleMajaraCenterInMainMap(value) {
        if (isAmakenOn[5] == value) {
            document.getElementById('mainMapAdvImg').src = "{{URL::asset('_images/mapIcon/matr_advoff.png')}}";
            isAmakenOn[5] = 0;
            mySetMap(isAmakenOn[5], markersAdv);
        }
        else {
            document.getElementById('mainMapAdvImg').src = "{{URL::asset('_images/mapIcon/matr_adv.png')}}";
            isAmakenOn[5] = 1;
            mySetMap(isAmakenOn[5], markersAdv);
        }
    }

    function toggleNaturalsInMainMap(value) {
        if (isAmakenOn[4] == value) {
            document.getElementById('mainMapNatImg').src = "{{URL::asset('_images/mapIcon/matr_natoff.png')}}";
            isAmakenOn[4] = 0;
            mySetMap(isAmakenOn[4], markersNat);
        }
        else {
            document.getElementById('mainMapNatImg').src = "{{URL::asset('_images/mapIcon/matr_nat.png')}}";
            isAmakenOn[4] = 1;
            mySetMap(isAmakenOn[4], markersNat);
        }
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0&callback=init"></script>
