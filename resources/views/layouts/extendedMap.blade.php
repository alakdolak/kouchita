
<span id="mapState" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in hidden" style="position: fixed; width: 90%; height: 90%; left: 5%; right: 5%; top: 5%; padding: 0;">
    <div id="mapState1" class="prv_map clickable" style='width:100%;height: 100%;position:absolute; !important;'></div>
    <div style="display: block; position:absolute; float: right; bottom: 8%; width: 90%; height: 9%;  margin-right: 4%;">
                <div  style="display: inline-block; position: static;  background-color: #30b4a6; width: 13%; height: 99%; cursor: pointer;" onclick="closeDiv('show')" >
                    <h1 style="display: inline-block; color: white; margin-right: 8%; font-size: 120%; margin-top: 13%;">همچنین ببینید</h1>
                    <img id="closeShow" src="{{ URL::asset('images') . '/' }}fast-forward.png" style="width: 20%; height: 45%; margin-left: 5%; float: left;transform: scaleX(1); margin-top: 11%;" >
                </div>
                <div id="show" style="direction: rtl; float: right; height:8%; width: 40%; display: inline-block ; position:fixed; padding-top: 0.5%; padding-bottom: 0.5%; background-color:ghostwhite;  ">
                        <center>
                            <img id="hotelImg" src="{{URL::asset('images') . '/'}}mhotel.png"
                                 style="cursor: pointer;width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleHotelsInExtendedMap(1)">
                            <img id="restImg" src="{{URL::asset('images') . '/'}}mrest.png"
                                 style="cursor: pointer;width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleRestaurantsInExtendedMap(1)">
                            <img id="fastImg" src="{{URL::asset('images') . '/'}}mfast.png"
                                 style="cursor: pointer; width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleFastFoodsInExtendedMap(1)">
                            <img id="musImg" src="{{URL::asset('images') . '/'}}matr_mus.png"
                                 style="cursor: pointer; width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleMuseumsInExtendedMap(1)">
                            <img id="plaImg" src="{{URL::asset('images') . '/'}}matr_pla.png"
                                 style="cursor: pointer; width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleHistoricalInExtendedMap(1)">
                            <img id="shcImg" src="{{URL::asset('images') . '/'}}matr_shc.png"
                                 style="cursor: pointer;width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleShopCenterInExtendedMap(1)">
                            <img id="funImg" src="{{URL::asset('images') . '/'}}matr_fun.png"
                                 style="cursor: pointer;width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleFunCenterInExtendedMap(1)">
                            <img id="advImg" src="{{URL::asset('images') . '/'}}matr_adv.png"
                                 style="cursor: pointer;width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleMajaraCenterInExtendedMap(1)">
                            <img id="natImg" src="{{URL::asset('images') . '/'}}matr_nat.png"
                                 style="cursor: pointer;width: 9% ;height: 100%; margin-right: 1%;"
                                 onclick="toggleNaturalsInExtendedMap(1)">
                    </center>
                </div>
</div>
    <div id="placeInfoInExtendedMap" style="display: none; position:absolute; bottom:60%; left:2%; background-color: white ; height: 30%; width:25%;">
        <div style="height: 15%; background-color: #30b4a6;" >
            <img src="{{ URL::asset('images/fast-forward.png')}}" style="width: 8%; height: 85%; float: left; margin: 1%;transform: scaleX(-1); cursor: pointer;" onclick="closeDiv('placeInfoInExtendedMap')">
        </div>
        <div style="margin-top: 7%; margin-right: 7%; height: 70%;">
             <img id="placeInfoPicInExtendedMap" src="{{URL::asset('_images/nopic').'/'}}blank.jpg" style="height: 55%; width: 30%;">
            <a  id="url" href="" style=" display: inline-block; margin-right: 5%; font-size: 120%;"></a>
            <div class="rating" style="display: block;margin-top: -15%; margin-right: 35%;">
                   <span id="rateNum" class="overallRating"> </span>
                   <div class="prw_rup prw_common_bubble_rating overallBubbleRating" style="display: inline;">
                         <span id="star" class="" style="font-size:20px;" property="ratingValue" content="" ></span>
                   </div>
                   <span id="rev" class=" autoResize" style="margin-right: 10%;font-size: 115%;"></span>
            </div>
            <h1 id="address" style="display: block; font-size: 125%; margin-top: 15%;"></h1>
        </div>
        <div style="height: 15%; background-color: #30b4a6; ">
            <h1 id="nearTitle" style="float: right; color: white; font-size: 135%; margin-top: 2%; margin-right: 3%;"> </h1>
            <img id="closeNearbyPlaces" src="{{ URL::asset('images') . '/' }}fast-forward.png" style="cursor: pointer; width: 8%; height: 85%; float: left; margin: 1%;transform: rotate(90deg); " onclick="closeDiv('nearbyInExtendedMap')" >
        </div>
        <div id="nearbyInExtendedMap" style="overflow-y: auto; width:100%; height: 175%; background-color: white; display: none;" ng-controller="nearPlaceRepeat as near">
            <div style="margin-right: 7%; height: 40%;" ng-repeat="itr in nearPlaces track by $index">
            <img id="itemNearbyPic_[[itr.id]]_[[itr.kind]]" ng-src="[[itr.pic]]" style="height: 50%; width: 30%;">
                <h1 id="nearname" style=" display: inline-block; margin-right: 5%; font-size: 120%;  margin-top: 7%">[[itr.name]]</h1>
                <div class="rating" style="display: block;margin-top: -15%; margin-right: 35%;">
                    <span id="nearrateNum" class="overallRating"> </span>
                    <div class="prw_rup prw_common_bubble_rating overallBubbleRating" style="display: inline;">
                        <span class="[[itr.ngClass]]" style="font-size:20px;" property="ratingValue" content="5" ></span>
                    </div>
                    <span class=" autoResize" style="margin-right: 10%;font-size: 115%;">[[itr.reviews]] نقد</span>
                    <h1 id="neardis" style="margin-top: 5%"> فاصله : [[itr.distance]] متر</h1>
                </div>
                <h1 id="nearaddress" style="display: inline-block; font-size: 125%; margin-top: 5%;">[[itr.address]]</h1>
                <hr>
        </div>
        </div>
    </div>
    <div class="ui_close_x" onclick="hideElement('mapState')"></div>
</span>