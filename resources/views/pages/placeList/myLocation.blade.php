<!doctype html>
<html lang="fa">
<head>
    @include('layouts.topHeader')
    <title>اطراف من</title>

    <style></style>
</head>
<body>
    @include('general.forAllPages')

    @include('layouts.header1')

    <style>
        .bodySec{
            direction: rtl;
            text-align: right;
            position: relative;
            display: flex;
            height: calc(100vh - 55px);
        }
        .mapSection{
            width: 75%;
            position: relative;
        }
        .mapSection.full{
            width: 100%;
        }
        .mapSection .mapDiv{
            width: 100%;
            height: 100%;
        }
        .mapSection .myLocationButton{
            cursor: pointer;
            position: absolute;
            bottom: 10px;
            left: 10px;
            z-index: 1;
            color: white;
            background: var(--koochita-light-green);
            border-radius: 50%;
            padding: 5px;
        }
        .listSectionPc{
            width: 25%;
            direction: rtl;
            text-align: revert;
        }

        .bText{
            font-size: 18px;
            font-weight: bold;
            margin: 5px 10px;
        }

        .filtersSec{
            display: flex;
            justify-content: space-evenly;
            padding-bottom: 5px;
            position: absolute;
            right: 10px;
            top: 70px;
            margin: 0;
        }
        .filtersSec .filKind{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            cursor: pointer;
        }
        .filtersSec .filKind .name{
            font-size: .3em;
        }


        .filtersSec .filKind .icon{
            font-size: 1em;
        }

        .filtersSec .filKind .icon.touristAttractions  {
            background: #ec008c;
        }
        .filtersSec .filKind .icon.hotelIcon {
            background: #00516f;
        }
        .filtersSec .filKind .icon.restaurantIcon {
            background: #fff200;
        }
        .filtersSec .filKind .icon.adventureIcon {
            background: #ed1c24;
        }
        .filtersSec .filKind .icon.boomIcon {
            background: #00aeef;
        }
    </style>

    <div class="bodySec">
        <div class="mapSection full">
            <div id="map" class="mapDiv"></div>
            <div class="myLocationButton" onclick="getMyLocation()">
                <img src="{{URL::asset('images/icons/myLocation.svg')}}">
            </div>
        </div>
        <style>
            .gm-control-active.gm-fullscreen-control{
                display: none;
            }
            .sideSection{
                background: white;
                box-shadow: 0px 0px 4px 1px #868686;
                padding: 10px;
                border-radius: 10px;
                display: flex;
                width: 300px;
            }
            .searchSec{
                position: absolute;
                right: 10px;
                top: 15px;
                align-items: center;
                justify-content: space-between;
            }
            .searchSec input{
                border: none;
                font-size: 12px;
                margin-left: 10px;
                width: 200px;
            }
            .searchSec .searchIcon{
                border: none;
                background: white;
                font-size: 20px;
                line-height: 20px;
                color: var(--koochita-blue);
                transform: rotate(90deg);
            }
            .searchSec .threeLineIcon{
                font-size: 20px;
                line-height: 20px;
                cursor: pointer;
                margin-left: 5px;
                color: #5f5f5f;
            }

        </style>
        <div class="sideSection searchSec">
            <div class="threeLineIcon"></div>
            <input type="text" placeholder="محل مورد نظر را جستجو کنید...">
            <button class="searchIcon"></button>
        </div>
        <div class="sideSection filtersSec">

        </div>

    </div>

    @include('layouts.placeFooter')
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0"></script>

    <script>
        var mainMap;
        let filterButtons = [
            {
                id: 1,
                icon: 'touristAttractions',
                mapIcon: '{{URL::asset('images/mapIcon/att.png')}}',
                name: 'جای دیدنی',
            },
            {
                id: 4,
                icon: 'hotelIcon',
                mapIcon: '{{URL::asset('images/mapIcon/hotel.png')}}',
                name: 'اقامتگاه',
            },
            {
                id: 3,
                icon: 'restaurantIcon',
                mapIcon: '{{URL::asset('images/mapIcon/res.png')}}',
                name: 'رستوران',
            },
            {
                id: 6,
                icon: 'adventureIcon',
                mapIcon: '{{URL::asset('images/mapIcon/adv.png')}}',
                name: 'طبیعت گردی',
            },
            {
                id: 12,
                icon: 'boomIcon',
                mapIcon: '{{URL::asset('images/mapIcon/boom.png')}}',
                name: 'بوم گردی',
            },
        ];

        function createFilterHtml(){
            var text = '';
            filterButtons.map(item => {
                text += `<div class="filKind" onclick="toggleFilter(${item.id})">
                            <div class="fullyCenterContent icon ${item.icon}"></div>
                            <div class="name">${item.name}</div>
                        </div>`;
            });
            $('.filtersSec').html(text);
        }

        createFilterHtml();

        function toggleFilter(_id){

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

            // new google.maps.Marker({
            //     position: new google.maps.LatLng(localShop.lat, localShop.lng)
            // }).setMap(mainMap);
        }

        function getMyLocation(){
            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition((position) => {
                    var coordination = position.coords;
                    // if(marker != 0)
                    //     marker.setMap(null);
                    // marker = new google.maps.Marker({
                    //     position:  new google.maps.LatLng(coordination.latitude, coordination.longitude),
                    //     map: mainMap,
                    // });

                    mainMap.setCenter({
                        lat : coordination.latitude,
                        lng : coordination.longitude
                    });
                    mainMap.setZoom(16);
                });
            else
                console.log("Geolocation is not supported by this browser.");
        }

        $(window).ready(() => {
            initMap();
        })
    </script>
</body>
</html>