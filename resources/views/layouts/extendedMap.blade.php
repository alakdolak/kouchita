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
                <img id="hotelImg" src="{{URL::asset('images') . '/'}}mhotel.png" onclick="toggleHotelsInExtendedMap(1)">
                <img id="restImg" src="{{URL::asset('images') . '/'}}mrest.png" onclick="toggleRestaurantsInExtendedMap(1)">
                <img id="fastImg" src="{{URL::asset('images') . '/'}}mfast.png" onclick="toggleFastFoodsInExtendedMap(1)">
                <img id="musImg" src="{{URL::asset('images') . '/'}}matr_mus.png" onclick="toggleMuseumsInExtendedMap(1)">
                <img id="plaImg" src="{{URL::asset('images') . '/'}}matr_pla.png" onclick="toggleHistoricalInExtendedMap(1)">
                <img id="shcImg" src="{{URL::asset('images') . '/'}}matr_shc.png" onclick="toggleShopCenterInExtendedMap(1)">
                <img id="funImg" src="{{URL::asset('images') . '/'}}matr_fun.png" onclick="toggleFunCenterInExtendedMap(1)">
                <img id="advImg" src="{{URL::asset('images') . '/'}}matr_adv.png" onclick="toggleMajaraCenterInExtendedMap(1)">
                <img id="natImg" src="{{URL::asset('images') . '/'}}matr_nat.png" onclick="toggleNaturalsInExtendedMap(1)">
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