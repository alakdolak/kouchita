<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/extendedMap.css')}}'/>

<span id="mapState" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in hidden">
    <div id="mapState1" class="prv_map clickable"></div>
    <div>
        <div onclick="closeDiv('show')">
            <h1>همچنین ببینید</h1>
            <img id="closeShow" src="{{ URL::asset('images') . '/' }}fast-forward.png">
        </div>
        <div id="show">
            <center>
                <img id="hotelImg" src="{{URL::asset('images/mapIcon/mhotel.png')}}" onclick="toggleHotelsInExtendedMap(1)">
                <img id="restImg" src="{{URL::asset('images/mapIcon/mrest.png')}}" onclick="toggleRestaurantsInExtendedMap(1)">
                <img id="fastImg" src="{{URL::asset('images/mapIcon/mfast.png')}}" onclick="toggleFastFoodsInExtendedMap(1)">
                <img id="musImg" src="{{URL::asset('images/mapIcon/matr_mus.png')}}" onclick="toggleMuseumsInExtendedMap(1)">
                <img id="plaImg" src="{{URL::asset('images/mapIcon/matr_pla.png')}}" onclick="toggleHistoricalInExtendedMap(1)">
                <img id="shcImg" src="{{URL::asset('images/mapIcon/matr_shc.png')}}" onclick="toggleShopCenterInExtendedMap(1)">
                <img id="funImg" src="{{URL::asset('images/mapIcon/matr_fun.png')}}" onclick="toggleFunCenterInExtendedMap(1)">
                <img id="advImg" src="{{URL::asset('images/mapIcon/matr_adv.png')}}" onclick="toggleMajaraCenterInExtendedMap(1)">
                <img id="natImg" src="{{URL::asset('images/mapIcon/matr_nat.png')}}" onclick="toggleNaturalsInExtendedMap(1)">
            </center>
        </div>
</div>
    <div id="placeInfoInExtendedMap">
        <div>
            <img src="{{ URL::asset('images/fast-forward.png')}}" onclick="closeDiv('placeInfoInExtendedMap')">
        </div>
        <div>
             <img id="placeInfoPicInExtendedMap" src="{{URL::asset('_images/nopic').'/'}}blank.jpg">
            <a id="url" href=""></a>
            <div class="rating">
                   <span id="rateNum" class="overallRating"> </span>
                   <div class="prw_rup prw_common_bubble_rating overallBubbleRating">
                         <span id="star" class="" property="ratingValue" content=""></span>
                   </div>
                   <span id="rev" class=" autoResize"></span>
            </div>
            <h1 id="address"></h1>
        </div>
        <div>
            <h1 id="nearTitle"> </h1>
            <img id="closeNearbyPlaces" src="{{ URL::asset('images') . '/' }}fast-forward.png" onclick="closeDiv('nearbyInExtendedMap')">
        </div>
        <div id="nearbyInExtendedMap" ng-controller="nearPlaceRepeat as near">
            <div ng-repeat="itr in nearPlaces track by $index">
            <img id="itemNearbyPic_[[itr.id]]_[[itr.kind]]" ng-src="[[itr.pic]]" class="itemNearbyPics">
            <h1 id="nearname">[[itr.name]]</h1>
            <div class="rating">
                <span id="nearrateNum" class="overallRating"> </span>
                <div class="prw_rup prw_common_bubble_rating overallBubbleRating">
                    <span class="[[itr.ngClass]]" style="font-size:20px;" property="ratingValue" content="5"></span>
                </div>
                <span class=" autoResize">[[itr.reviews]] نقد</span>
                <h1 id="neardis"> فاصله : [[itr.distance]] متر</h1>
            </div>
            <h1 id="nearaddress">[[itr.address]]</h1>
            <hr>
        </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('mapState')"></div>
</span>

<script>
    var markersHotel = [];
    var markersRest = [];
    var markersFast = [];
    var markersMus = [];
    var markersPla = [];
    var markersShc = [];
    var markersFun = [];
    var markersAdv = [];
    var markersNat = [];
    var iconBase = '{{URL::asset('images/mapIcon/')}}';
    var hotelMap = [];
    var amakenMap = [];
    var restMap = [];
    var majaraMap = [];
    var newHotelMap = [];
    var newRestMap = [];
    var newAmakenMap = [];
    var newMajaraMap = [];
    var isHotelOn = 1;
    var isRestaurantOn = [1, 1];
    var isAmakenOn = [1, 1, 1, 1, 1, 1];
    var map1;
    var kindIcon;
    var isMapAchieved = false;
    var newBounds = [];
    var newBound;
    var numOfNewHotel = 0;
    var numOfNewAmaken = 0;
    var numOfNewRest = 0;
    var numOfNewMajara = 0;
    var availableHotelIdMarker = [];
    var availableRestIdMarker = [];
    var availableAmakenlIdMarker = [];
    var availableMajaraIdMarker = [];
    var num = 0;
    var isItemClicked = false;
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

    function initBigMap() {
        var locations = [];
        var k;
        var icons = {
            hotel: {
                icon: iconBase + 'mhotel.png'
            },
            amaken1: {
                icon: iconBase + 'matr_pla.png'
            },
            amaken2: {
                icon: iconBase + 'matr_mus.png'
            },
            amaken3: {
                icon: iconBase + 'matr_shc.png'
            },
            amaken4: {
                icon: iconBase + 'matr_nat.png'
            },
            amaken5: {
                icon: iconBase + 'matr_fun.png'
            },
            fastfood: {
                icon: iconBase + 'mfast.png'
            },
            rest: {
                icon: iconBase + 'mrest.png'
            }
        };
        var mapOptions = {
            zoom: 14,
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
            }, {
                "featureType": "poi",
                "stylers": [{"hue": "#679714"}, {"saturation": 33.4}, {"lightness": -25.4}, {"gamma": 1}]
            }]
        };
        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');
        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);
        // Let's also add a marker while we're at it for big map
        {{--switch (kind) {--}}
            {{--case 4:--}}
                {{--k = 'hotel';--}}
                {{--break;--}}
            {{--case 1:--}}
                {{--if ('{{ $place->mooze }}' == 1)--}}
                    {{--k = 'amaken2';--}}
                {{--else if ('{{ $place->tarikhi }}' == 1)--}}
                    {{--k = 'amaken1';--}}
                {{--else if ('{{ $place->tabiatgardi }}' == 1)--}}
                    {{--k = 'amaken4';--}}
                {{--else if ('{{ $place->tafrihi }}' == 1)--}}
                    {{--k = 'amaken5';--}}
                {{--else if ('{{ $place->markazkharid }}' == 1)--}}
                    {{--k = 'amaken3';--}}
                {{--else--}}
                    {{--k = 'amaken1';--}}
                {{--break;--}}
            {{--case 3:--}}
                {{--if ('{{$place->kind_id}}' == 1)--}}
                    {{--k = 'rest';--}}
                {{--else--}}
                    {{--k = 'fastfood';--}}
                {{--break;--}}
        {{--}--}}
        locations[0] = {positions: new google.maps.LatLng(x, y), name: '{{ $place->name }}', type: k};
        for (j = 0; j < 3; j++) {
            var number = 0;
            for (i = lengthPlace[j]; i < lengthPlace[j + 1]; i++) {
                if (j == 0)
                    k = 'hotel';
                if (j == 2 && kindRest[number] == 1) {
                    k = 'rest';
                    number++;
                }
                else if (j == 2) {
                    k = 'fastfood';
                    number++;
                }
                if (j == 1) {
                    switch (kindAmaken[number]) {
                        case 1:
                            k = 'amaken2';
                            break;
                        case 2:
                            k = 'amaken1';
                            break;
                        case 3:
                            k = 'amaken4';
                            break;
                        case 4:
                            k = 'amaken5';
                            break;
                        case 5:
                            k = 'amaken3';
                            break;
                    }
                    number++;
                }
                locations[i + 1] = {
                    positions: new google.maps.LatLng(x1[i], y1[i]),
                    name: placeName[i],
                    type: k
                };
            }
            locations.forEach(function (location) {
                var marker = new google.maps.Marker({
                    position: location.positions,
                    icon: {
                        url: icons[location.type].icon,
                        scaledSize: new google.maps.Size(35, 35)
                    },
                    map: map,
                    title: location.name
                });
            });
        }
    }

    function showExtendedMap() {
        var windowWidth = $(window).width();
        if(windowWidth <= 767){
            window.location.href = 'geo:{{$place->C}},{{$place->D}}';
            {{--window.open("https://maps.google.com/maps?daddr={{$place->C}},{{$place->D}}&amp;ll=");--}}
            return;
        }


        if (!isMapAchieved) {
            $('.dark').show();
            showElement('mapState');//mapState
            isMapAchieved = true;
            init2();
        }
        else {
            $("#mapState").removeClass('hidden');
        }
    }

    function init2() {
        var mapOptions = {
            zoom: 18,
            center: new google.maps.LatLng(x, y),
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
            }, {
                "featureType": "poi",
                "stylers": [{"hue": "#679714"}, {"saturation": 33.4}, {"lightness": -25.4}, {"gamma": 1}]
            }
            ]
        };
        var mapElementSmall = document.getElementById('mapState1');
        map1 = new google.maps.Map(mapElementSmall, mapOptions);
        google.maps.event.addListenerOnce(map1, 'idle', function () {
            newBound = map1.getBounds();
            newBounds[0] = newBound.getNorthEast().lat();
            newBounds[1] = newBound.getNorthEast().lng();
            newBounds[2] = newBound.getSouthWest().lat();
            newBounds[3] = newBound.getSouthWest().lng();
            addNewPlace(newBounds);
            zoomChangeOrCenterChange();
        });
    }

    function toggleHotelsInExtendedMap(value) {
        if (isHotelOn == value) {
            document.getElementById('hotelImg').src = "{{URL::asset('images/mapIcon/mhoteloff.png')}}";
            isHotelOn = 0;
            mySetMap(isHotelOn, markersHotel);
        }
        else {
            document.getElementById('hotelImg').src = "{{URL::asset('images/mapIcon/mhotel.png')}}";
            isHotelOn = 1;
            mySetMap(isHotelOn, markersHotel);
        }
    }

    function toggleRestaurantsInExtendedMap(value) {
        if (isRestaurantOn[0] == value) {
            document.getElementById('restImg').src = "{{URL::asset('images/mapIcon/mrestoff.png')}}";
            isRestaurantOn[0] = 0;
            mySetMap(isRestaurantOn[0], markersRest);
        }
        else {
            document.getElementById('restImg').src = "{{URL::asset('images/mapIcon/mrest.png')}}";
            isRestaurantOn[0] = 1;
            mySetMap(isRestaurantOn[0], markersRest);
        }
    }

    function toggleFastFoodsInExtendedMap(value) {
        if (isRestaurantOn[1] == value) {
            document.getElementById('fastImg').src = "{{URL::asset('images/mapIcon/mfastoff.png')}}";
            isRestaurantOn[1] = 0;
            mySetMap(isRestaurantOn[1], markersFast);
        }
        else {
            document.getElementById('fastImg').src = "{{URL::asset('images/mapIcon/mfast.png')}}";
            isRestaurantOn[1] = 1;
            mySetMap(isRestaurantOn[1], markersFast);
        }
    }

    function toggleMuseumsInExtendedMap(value) {
        if (isAmakenOn[0] == value) {
            document.getElementById('musImg').src = "{{URL::asset('images/mapIcon/matr_musoff.png')}}";
            isAmakenOn[0] = 0;
            mySetMap(isAmakenOn[0], markersMus);
        }
        else {
            document.getElementById('musImg').src = "{{URL::asset('images/mapIcon/matr_mus.png')}}";
            isAmakenOn[0] = 1;
            mySetMap(isAmakenOn[0], markersMus);
        }
    }

    function toggleHistoricalInExtendedMap(value) {
        if (isAmakenOn[1] == value) {
            document.getElementById('plaImg').src = "{{URL::asset('images/mapIcon/matr_plaoff.png')}}";
            isAmakenOn[1] = 0;
            mySetMap(isAmakenOn[1], markersPla);
        }
        else {
            document.getElementById('plaImg').src = "{{URL::asset('images/mapIcon/matr_pla.png')}}";
            isAmakenOn[1] = 1;
            mySetMap(isAmakenOn[1], markersPla);
        }
    }

    function toggleShopCenterInExtendedMap(value) {
        if (isAmakenOn[2] == value) {
            document.getElementById('shcImg').src = "{{URL::asset('images/mapIcon/matr_shcoff.png')}}";
            isAmakenOn[2] = 0;
            mySetMap(isAmakenOn[2], markersShc);
        }
        else {
            document.getElementById('shcImg').src = "{{URL::asset('images/mapIcon/matr_shc.png')}}";
            isAmakenOn[2] = 1;
            mySetMap(isAmakenOn[2], markersShc);
        }
    }

    function toggleFunCenterInExtendedMap(value) {
        if (isAmakenOn[3] == value) {
            document.getElementById('funImg').src = "{{URL::asset('images/mapIcon/matr_funoff.png')}}";
            isAmakenOn[3] = 0;
            mySetMap(isAmakenOn[3], markersFun);
        }
        else {
            document.getElementById('funImg').src = "{{URL::asset('images/mapIcon/matr_fun.png')}}";
            isAmakenOn[3] = 1;
            mySetMap(isAmakenOn[3], markersFun);
        }
    }

    function toggleMajaraCenterInExtendedMap(value) {
        if (isAmakenOn[5] == value) {
            document.getElementById('advImg').src = "{{URL::asset('images/mapIcon/matr_advoff.png')}}";
            isAmakenOn[5] = 0;
            mySetMap(isAmakenOn[5], markersAdv);
        }
        else {
            document.getElementById('advImg').src = "{{URL::asset('images/mapIcon/matr_adv.png')}}";
            isAmakenOn[5] = 1;
            mySetMap(isAmakenOn[5], markersAdv);
        }
    }

    function toggleNaturalsInExtendedMap(value) {
        if (isAmakenOn[4] == value) {
            document.getElementById('natImg').src = "{{URL::asset('images/mapIcon/matr_natoff.png')}}";
            isAmakenOn[4] = 0;
            mySetMap(isAmakenOn[4], markersNat);
        }
        else {
            document.getElementById('natImg').src = "{{URL::asset('images/mapIcon/matr_nat.png')}}";
            isAmakenOn[4] = 1;
            mySetMap(isAmakenOn[4], markersNat);
        }
    }

    // bounds
    function zoomChangeOrCenterChange() {
        google.maps.event.addListener(map1, 'bounds_changed', function () {
            // map1.setOptions({draggable: false})
            newBound = map1.getBounds();
            newBounds[0] = newBound.getNorthEast().lat();
            newBounds[1] = newBound.getNorthEast().lng();
            newBounds[2] = newBound.getSouthWest().lat();
            newBounds[3] = newBound.getSouthWest().lng();
            addNewPlace(newBounds)
        });
    }

    function addNewPlace(newBounds) {
        var hotelId = JSON.stringify(availableHotelIdMarker);
        var restId = JSON.stringify(availableRestIdMarker);
        var amakenId = JSON.stringify(availableAmakenlIdMarker);
        var majaraId = JSON.stringify(availableMajaraIdMarker);
        $.ajax({
            type: 'post',
            url: '{{route('newPlaceForMap')}}',
            data: {
                'swLat': newBounds[2],
                'swLng': newBounds[3],
                'neLat': newBounds[0],
                'neLng': newBounds[1],
                'C': x,
                'D': y,
                'hotelId': hotelId,
                'restId': restId,
                'amakenId': amakenId,
                'majaraId': majaraId
            },
            success: function (response) {
                response = JSON.parse(response);
                newHotelMap = response.hotel;
                newRestMap = response.rest;
                newAmakenMap = response.amaken;
                newMajaraMap = response.majara;
                afterSuccess();
            }
        });
    }

    function afterSuccess() {
        for (i = 0; i < newHotelMap.length; i++) {
            hotelMap[hotelMap.length] = newHotelMap[i];
        }
        for (i = 0; i < newMajaraMap.length; i++) {
            majaraMap[majaraMap.length] = newMajaraMap[i];
        }
        for (i = 0; i < newRestMap.length; i++) {
            restMap[restMap.length] = newRestMap[i];
        }
        for (i = 0; i < newAmakenMap.length; i++) {
            amakenMap[amakenMap.length] = newAmakenMap[i];
        }
        addMarker();
    }

    function clickable(marker, name) {
        google.maps.event.addListener(marker, 'click', function () {
            document.getElementById('placeInfoInExtendedMap').style.display = 'inline';
            document.getElementById('url').innerHTML = name.name;
            document.getElementById('url').href = name.url;
            isItemClicked = true;
            if (name.first)
                getPic(name);
            else {
                $("#placeInfoPicInExtendedMap").attr('src', name.pic);
            }
            switch (name.rate) {
                case 1:
                    document.getElementById('star').className = "ui_bubble_rating bubble_10";
                    document.getElementById('star').content = '1';
                    document.getElementById('rateNum').innerHTML = '1';
                    break;
                case 2:
                    document.getElementById('star').className = "ui_bubble_rating bubble_20";
                    document.getElementById('star').content = '2';
                    document.getElementById('rateNum').innerHTML = '2';
                    break;
                case 3:
                    document.getElementById('star').className = "ui_bubble_rating bubble_30";
                    document.getElementById('star').content = '3';
                    document.getElementById('rateNum').innerHTML = '3';
                    break;
                case 4:
                    document.getElementById('star').className = "ui_bubble_rating bubble_40";
                    document.getElementById('star').content = '4';
                    document.getElementById('rateNum').innerHTML = '4';
                    break;
                case 5:
                    document.getElementById('star').className = "ui_bubble_rating bubble_50";
                    document.getElementById('star').content = '5';
                    document.getElementById('rateNum').innerHTML = '5';
                    break;
            }
            switch (name.kind) {
                case 4:
                    document.getElementById('nearTitle').innerHTML = 'سایر هتل ها';
                    break;
                case 3:
                    document.getElementById('nearTitle').innerHTML = 'سایر رستوران ها';
                    break;
                case 1:
                    document.getElementById('nearTitle').innerHTML = 'سایر اماکن ';
                    break;
            }
            document.getElementById('rev').innerHTML = name.reviews + "نقد";
            document.getElementById('address').innerHTML = "آدرس : " + name.address;
            var scope = angular.element(document.getElementById("nearbyInExtendedMap")).scope();
            scope.$apply(function () {
                scope.findNearPlaceForMap(name);
            });
        });
        var classRatingHover;
        switch (name.rate) {
            case 1:
                // classRatingHover.className = 'ui_bubble_rating bubble_10';
                classRatingHover = 'ui_bubble_rating bubble_10';
                // classRatingHover.content = '1';
                break;
            case 2:
                classRatingHover = 'ui_bubble_rating bubble_20';
                // classRatingHover.content = '2';
                break;
            case 3:
                classRatingHover = 'ui_bubble_rating bubble_30';
                // classRatingHover.content = '3';
                break;
            case 4:
                classRatingHover = 'ui_bubble_rating bubble_40';
                // classRatingHover.content = '4';
                break;
            case 5:
                classRatingHover = 'ui_bubble_rating bubble_50';
                // classRatingHover.content = '5';
                break;
        }
        var hoverContent = "<div id='myTotalPane'><img id='itemPicInExtendedMap' src=" + '{{URL::asset('images/loading.svg')}}' + " >" +
            "<a href='" + name.url + ">" + name.name + "</a>" +
            "<div class='rating'>" +
            "<span id='rateNum1' class='overallRating'> </span>" +
            "<div class='prw_rup prw_common_bubble_rating overallBubbleRating inline'>" +
            "<span id='star1' class='" + classRatingHover + " property='ratingValue' content='' ></span>" +
            "</div>" +
            "<span id='rev1' class='autoResize'>" + name.reviews + "نقد </span>" +
            "</div>" +
            "<h1 id='extendedMapDistanceHeader'>فاصله :" + name.distance * 1000 + "متر</h1>" +
            "<h1 id='address1'>" + name.address + "</h1>" +
            "</div>";
        var infowindow = new google.maps.InfoWindow({
            content: hoverContent,
            maxWidth: 350
        });
        google.maps.event.addListener(marker, 'mouseover', function () {
            if (name.first)
                getPic(name);
            else {
                $("#itemPicInExtendedMap").attr('src', name.pic);
            }
            infowindow.open(map1, marker);
        });
        google.maps.event.addListener(marker, 'mouseout', function () {
            infowindow.close(map1, marker);
        });
        google.maps.event.addListener(infowindow, 'domready', function () {
            var iwOuter = $('.gm-style-iw');
            var iwBackground = iwOuter.prev();
            // Removes background shadow DIV
            iwBackground.children(':nth-child(2)').css({'display': 'none'});
            // Removes white background DIV
            iwBackground.children(':nth-child(4)').css({'display': 'none'});
            // Moves the infowindow 115px to the right.
            iwOuter.parent().parent().css({left: '0px', 'overflow': 'none'});
            // Moves the shadow of the arrow 76px to the left margin.
            iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                return s + 'left: 76px !important;'
            });
            // Moves the arrow 76px to the left margin.
            iwBackground.children(':nth-child(3)').attr('style', function (i, s) {
                return s + 'left: 0px !important;'
            });
            // Changes the desired tail shadow color.
            iwBackground.children(':nth-child(3)').find('div').children().css({
                'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px',
                'z-index': '1'
            });
            // Reference to the div that groups the close button elements.
            var iwCloseBtn = iwOuter.next();
            // Apply the desired effect to the close button
            iwCloseBtn.css({display: 'none'});
            $("#myTotalPane").parent().attr('style', function (i, s) {
                return s + 'min-height: 152px !important; max-height: 200px !important;'
            })
        });
    }

    function getPic(name) {
        $.ajax({
            type: 'post',
            url: '{{route('getPlacePicture')}}',
            data: {
                'kindPlaceId': name.kind,
                'placeId': name.id
            },
            success: function (response) {
                $("#itemPicInExtendedMap").attr('src', response);
                $("#placeInfoPicInExtendedMap").attr('src', name.pic);
                name.first = false;
                name.pic = response;
            }
        });
    }

    function addMarker() {
        var marker;
        for (i = numOfNewHotel; i < hotelMap.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(hotelMap[i].C, hotelMap[i].D),
                map: map1,
                title: hotelMap[i].name,
                icon: {
                    url: icons.hotel,
                    scaledSize: new google.maps.Size(35, 35)
                }
            });
            var hotelDetail = {
{{--                url: '{{route('home') . '/hotel-details/'}}',--}}
                name: hotelMap[i].name
            };
            hotelDetail.url = hotelDetail.url + hotelMap[i].id + '/' + hotelMap[i].name;
            markersHotel[i] = marker;
            hotelMap[i].kind = 4;
            hotelMap[i].url = hotelDetail.url;
            hotelMap[i].first = true;
            hotelMap[i].pic = "{{URL::asset('images/loading.svg')}}";
            availableHotelIdMarker[i] = hotelMap[i].id;
            numOfNewHotel = hotelMap.length;
            clickable(markersHotel[i], hotelMap[i]);
        }
        for (i = numOfNewRest; i < restMap.length; i++) {
            if (restMap[i].kind_id == 1)
                kindIcon = icons.rest;
            else
                kindIcon = icons.fastfood;
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(restMap[i].C, restMap[i].D),
                map: map1,
                title: restMap[i].name,
                icon: {
                    url: kindIcon,
                    scaledSize: new google.maps.Size(35, 35)
                }
            });
            var restDetail = {
{{--                url: '{{route('home') . '/restaurant-details/'}}',--}}
                name: restMap[i].name
            };
            restDetail.url = restDetail.url + restMap[i].id + '/' + restMap[i].name;
            restMap[i].kind = 3;
            restMap[i].url = restDetail.url;
            restMap[i].first = true;
            restMap[i].pic = "{{URL::asset('images/loading.svg')}}";
            numOfNewRest = restMap.length;
            availableRestIdMarker[i] = restMap[i].id;
            clickable(marker, restMap[i]);
            if (restMap[i].kind_id == 1) {
                markersRest[markersRest.length] = marker;
            }
            else {
                markersFast[markersFast.length] = marker;
            }
        }
        for (i = numOfNewAmaken; i < amakenMap.length; i++) {
            if (amakenMap[i].mooze == 1)
                kindIcon = icons.mus;
            else if (amakenMap[i].tarikhi == 1)
                kindIcon = icons.pla;
            else if (amakenMap[i].tabiatgardi == 1)
                kindIcon = icons.nat;
            else if (amakenMap[i].tafrihi == 1)
                kindIcon = icons.fun;
            else if (amakenMap[i].markazkharid == 1)
                kindIcon = icons.shc;
            else
                kindIcon = icons.pla;
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(amakenMap[i].C, amakenMap[i].D),
                map: map1,
                title: amakenMap[i].name,
                icon: {
                    url: kindIcon,
                    scaledSize: new google.maps.Size(35, 35)
                }
            });
            var amakenDetail = {
{{--                url: '{{route('home') . '/amaken-details/'}}',--}}
                name: amakenMap[i].name
            };
            amakenDetail.url = amakenDetail.url + amakenMap[i].id + '/' + amakenMap[i].name;
            amakenMap[i].kind = 1;
            amakenMap[i].url = amakenDetail.url;
            amakenMap[i].first = true;
            numOfNewAmaken = amakenMap.length;
            availableAmakenlIdMarker[i] = amakenMap[i].id;
            amakenMap[i].pic = "{{URL::asset('images/loading.svg')}}";
            clickable(marker, amakenMap[i]);
            if (amakenMap[i].mooze == 1)
                markersMus[markersMus.length] = marker;
            else if (amakenMap[i].tarikhi == 1)
                markersPla[markersPla.length] = marker;
            else if (amakenMap[i].tabiatgardi == 1)
                markersNat[markersNat.length] = marker;
            else if (amakenMap[i].tafrihi == 1)
                markersFun[markersFun.length] = marker;
            else if (amakenMap[i].markazkharid == 1)
                markersShc[markersShc.length] = marker;
            else
                markersPla[markersPla.length] = marker;
        }
        for (i = numOfNewMajara; i < majaraMap.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(majaraMap[i].C, majaraMap[i].D),
                map: map1,
                title: majaraMap[i].name,
                icon: {
                    url: icons.adv,
                    scaledSize: new google.maps.Size(35, 35)
                }
            });
            var majaraDetail = {
{{--                url: '{{route('home') . '/hotel-details/'}}',--}}
                name: majaraMap[i].name
            };
            majaraDetail.url = majaraDetail.url + majaraMap[i].id + '/' + majaraMap[i].name;
            markersAdv[i] = marker;
            majaraMap[i].kind = 6;
            majaraMap[i].url = majaraDetail;
            majaraMap[i].first = true;
            majaraMap[i].pic = "{{URL::asset('images/loading.svg')}}";
            majaraMap[i].address = majaraMap[i].dastresi;
            numOfNewMajara = majaraMap.length;
            availableMajaraIdMarker[i] = majaraMap[i].id;
            clickable(markersAdv[i], majaraMap[i]);
        }

        mySetMap(isHotelOn, markersHotel);
        mySetMap(isRestaurantOn[0], markersRest);
        mySetMap(isRestaurantOn[1], markersFast);
        mySetMap(isAmakenOn[0], markersMus);
        mySetMap(isAmakenOn[1], markersPla);
        mySetMap(isAmakenOn[2], markersShc);
        mySetMap(isAmakenOn[3], markersFun);
        mySetMap(isAmakenOn[4], markersNat);
        mySetMap(isAmakenOn[5], majaraMap);
    }

    function mySetMap(isSet, marker) {
        if (isSet == 1) {
            for (var i = 0; i < marker.length; i++) {
                marker[i].setMap(map1);
            }
        }
        else
            for (var i = 0; i < marker.length; i++) {
                marker[i].setMap(null);
            }
    }

    function getJustPic(name) {
        $.ajax({
            type: 'post',
            url: '{{route('getPlacePicture')}}',
            data: {
                'kindPlaceId': name.kind,
                'placeId': name.id
            },
            success: function (response) {
                name.pic = response;
                name.first = false;
                $("#itemNearbyPic_" + name.id + "_" + name.kind).attr('src', response);
            }
        });
    }
</script>