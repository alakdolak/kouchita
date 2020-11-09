@extends('pages.Business.businessLayout')

@section('head')

    <style>
        label{
            margin: 0px;
        }
        div[class^="col-"]{
            float: right;
            margin-bottom: 45px;
        }
        .form-control{
            border: none;
            box-shadow: none;
            border-bottom: solid 1px #cacaca;
            border-radius: 0;
        }
        textarea.form-control{
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .sectionPages{
            padding-bottom: 60px;
        }


        .createPageMainBody hr{
            width: 100%;
        }
        .descriptionText{
            margin-bottom: 10px;
            color: #646464;
            font-size: 12px;
        }
        .importantInput label{
            display: flex;
        }
        .importantInput label:after{
            content: '*';
            color: red;
            font-size: 18px;
            margin-right: 5px;
        }
        .createPageMainBody{

        }
        .createPageMainBody .bodd{
            padding: 10px;
        }
        .createPageMainBody .bodd .MainHeader{
            margin: 0px 0px 20px 0px;
            font-weight: bold;
            border-bottom: solid 1px #f7f7f7;
            padding: 10px 0px;
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .createPageMainBody .bodd .indicator{
            position: relative;
            display: flex;
            width: 300px;
            justify-content: space-between;
        }
        .createPageMainBody .bodd .indicator .squer{
            width: 50px;
            height: 50px;
            background: white;
            border: solid 1px gray;
            text-align: center;
            font-size: 9px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            padding: 10px;
        }
        .createPageMainBody .bodd .indicator .squer.selected, .line.selected{
            background: var(--koochita-blue) !important;
            border-color: var(--koochita-blue) !important;
            color: white !important;
        }

        .createPageMainBody .bodd .indicator .line{
            width: calc(50% - 73px);
            position: absolute;
            height: 7px;
            top: 22px;
            background: white;
            border-top: solid 1px gray;
            border-bottom: solid 1px gray;
        }
        .createPageMainBody .bodd .descInputSec{
            margin-bottom: 30px;
            font-size: 15px;
        }
        .shopMapInput{
            position: relative;
            height: 400px;
            width: 100%;
        }
        .myLocationButton{
            background: #ffbaba;
            border: none;
            margin-right: 10px;
            padding: 3px;
            border-radius: 50%;
            position: absolute;
            bottom: 10px;
            left: 10px;
        }
        .myLocationButton > img{
            width: 50px;
        }

        .submitSection{
            position: fixed;
            bottom: 0;
            width: 100%;
            right: 0;
        }
        .submitSection .row{
            background: #ffffffa6;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            width: 100%;
            margin: 0px;
        }
        .submitSection .row > button{
            margin: 0px 10px;
            border-radius: 0px;
            border: none;
            padding: 5px 15px;
        }
        .submitSection .nextButton{
            color: white;
            background: var(--koochita-green);
        }
        .submitSection .prevButton{
            font-weight: bold;
            background: white;
            padding-bottom: 3px;
        }
        .headerRowInput{
            font-size: 22px;
            font-weight: bold;
            display: flex;
            margin-bottom: 0 !important;
        }
        .timeSection{

        }
        .timeSection .timeRow{
            display: flex;
            margin: 15px 0px;
            align-items: center;
        }
        .timeSection .timeRow .text{
            margin-left: 10px;
            font-weight: bold;
            width: 120px;
        }
        .timeSection .timeRow .smTex{
            margin: 0px 5px;
            margin-right: 20px;
            font-size: 11px;
        }
        .checkboxDiv{
            display: flex;
            margin-right: 20px;
            align-items: center;
            font-size: 12px;
        }
        .checkboxDiv label{
            cursor: pointer;
            margin-left: 5px;
        }
        .checkboxDiv input{
            display: block;
            width: 20px;
            height: 20px;
        }

        .openCloseInputShow{
            margin: 0px 10px;
            background: #fcc156;
            padding: 5px;
            font-size: 10px;
            border: solid 1px gray;
            cursor: pointer;
        }
        .openCloseInputDiv input{
            display: none;
        }
        .openCloseInputDiv .openCloseInputShow:after{
            content: 'تعطیل هستم';
            padding: 5px;
            display: inline-flex;
            font-weight: normal;
        }
        .openCloseInputDiv .openCloseInputShow:before{
            content: 'باز هستم';
            padding: 5px;
            background: white;
            font-weight: bold;
            display: inline-flex;
        }

        .openCloseInputDiv.checked .openCloseInputShow{
            background: #ff6e6e;
        }
        .openCloseInputDiv.checked .openCloseInputShow:after{
            background: white;
            font-weight: bold;
            color: black;
        }
        .openCloseInputDiv.checked .openCloseInputShow:before{
            background: none;
            font-weight: normal;
            color: white;
        }
        .uploadPicSection{
            width: 100%;
            border: solid 2px #f1f1f1;
            display: flex;
            flex-wrap: wrap;
            padding: 10px;
        }
        .uploadPicSection .uploadPic{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px 0px;
            opacity: .3;
            flex-direction: column;
            cursor: pointer;
        }
        .uploadPicSection .uploadPic img{
            width: 120px;
            margin-bottom: 15px;
        }
        .uploadPicSection .uploadPic span{
            font-size: 18px;
        }

        .uploadFileCard{
            background: #f2f2f2;
            padding: 10px;
            margin: 10px;
            position: relative;
            border-radius: 15px
        }
        .uploadFileCard .img{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 15px;
        }
        .uploadFileCard .img img{
            width: 100%;
        }
        .uploadFileCard:hover .hoverInfos{
            display: flex;
        }
        .uploadFileCard .hoverInfos{
            position: absolute;
            top: 0px;
            right: 0px;
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
            background: #0000002e;
            border-radius: 15px;
            cursor: pointer;
        }
        .uploadFileCard .hoverInfos .cancelButton:before{
            font-size: 50px;
        }
        .uploadFileCard .hoverInfos .cancelButton{
            color: #ff3333;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 991px) {
            div[class^="col-md"]{
                /*float: unset;*/
                width: 100%;
            }
        }
        @media (max-width: 767px) {
            .createPageMainBody .bodd .MainHeader{
                flex-direction: column;
            }
            div[class^="col-sm"]{
                /*float: unset;*/
                width: 100%;
            }
        }
    </style>

    <link rel="stylesheet" href="{{URL::asset('packages/clockPicker/bootstrap-clockpicker.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('packages/clockPicker/jquery-clockpicker.min.css')}}">

    <script defer src="{{URL::asset('packages/clockPicker/jquery-clockpicker.min.js')}}"></script>
    <script defer src="{{URL::asset('packages/clockPicker/bootstrap-clockpicker.min.js')}}"></script>
@endsection


@section('body')
    <div class="grayBackGround createPageMainBody">
        <div class="container">
            <div class="bodySec bodd row">
                <div class="col-sm-12 MainHeader">
                    <div>ثبت اطلاعات مغازه</div>
                    <div class="indicator">
                        <div class="squer level3"> بارگذاری عکس </div>
                        <div class="line level3" style="right: 49px;"></div>
                        <div class="squer level2"> اطلاعات تکمیلی </div>
                        <div class="line level2" style="left: 49px;"></div>
                        <div class="squer level1 selected"> اطلاعات اولیه </div>
                    </div>
                </div>
                <div class="sectionPages section1">
                    <div class="descInputSec col-sm-12">
                        <div class="descriptionText">شما در اینجا می توانید اطلاعات مغازه خود را وارد نمایید.</div>
                        <div class="descriptionText">توجه نمایید پر کردن تمامی اطلاعات این بخش ضروری می باشد.</div>
                        <div style="color: red; margin-top: 5px;">موارد ستاره دار پر کردنشان اجباری است</div>
                    </div>
                    <div class="container" style="width: 100%;">
                        <div class="row">
                            <div class="col-sm-6 form-group importantInput">
                                <label for="shopName">نام مغازه</label>
                                <input type="text" class="form-control" id="shopName" placeholder="نام مغازه خود را وارد نمایید...">
                            </div>
                            <div class="col-sm-6 form-group importantInput">
                                <label for="shopCategory">نوع مغازه</label>
                                <select class="form-control" id="shopCategory">
                                    <option value="1">مواد غذایی</option>
                                    <option value="2">لباس فروشی</option>
                                    <option value="-1">دسته بندی موجود نیست</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group importantInput">
                                <label for="shopPhone">شماره تماس</label>
                                <input type="text" class="form-control" id="shopPhone" placeholder="021xxxxxxxx">
                            </div>
                            <div class="col-sm-6 form-group importantInput">
                                <label for="shopCity">شهر</label>
                                <input type="text" class="form-control" id="shopCity" placeholder="نام شهر خود را وارد نمایید...">
                            </div>
                            <div class="col-sm-12 form-group importantInput">
                                <label for="shopAddress">آدرس مغازه</label>
                                <input type="text" class="form-control" id="shopAddress" placeholder="آدرس مغازه خود را دقیق وارد نمایید...">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="shopInPlace">نام مکان مغازه</label>
                                <div class="descriptionText"> اگر مغازه شما داخل محل خاصی می باشد (مثلا پاساژ) ، نام محل را وارد نمایید.</div>
                                <input type="text" class="form-control" id="shopInPlace" placeholder="نام محل خاص را وارد نمایید...">
                            </div>
                            <div class="col-sm-12 form-group importantInput">
                                <label for="shopMap">
                                    محل روی نقشه
                                </label>
                                <div class="descriptionText">شما می توانید با کلیک روی نقشه محل مورد نظر را ثبت نمایید .</div>
                                <div class="shopMapInput">
                                    <div id="mapDiv" style="width: 100%; height: 100%"></div>
                                    <button class="myLocationButton" onclick="findMyLocation()">
                                        <img src="{{URL::asset('images/icons/myLocation.svg')}}">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sectionPages section2 hidden">
                    <div class="descriptionText">با پر کردن اطلاعات این بخش به مشتریان خود کمک کنید.</div>
                    <div class="container" style="width: 100%;">
                        <div class="row">
                            <div class="col-sm-12 headerRowInput">
                                ساعات کاری مغازه
                                <div class="checkboxDiv">
                                    <label for="allDay24">شبانه روزی هستم</label>
                                    <input type="checkbox" id="allDay24" onchange="iAm24Hour()">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="timeSection">
                                    <div id="inWeekDiv" class="timeRow">
                                        <div class="text">روز های هفته:</div>
                                        <div class="smTex">از ساعت </div>
                                        <div class="timePicker clockpicker">
                                            <input class="form-control" type="text" placeholder="انتخاب کنید">
                                        </div>
                                        <div class="smTex">تا ساعت </div>
                                        <div class="timePicker clockpicker">
                                            <input class="form-control" type="text" placeholder="انتخاب کنید">
                                        </div>
                                    </div>
                                    <div id="closedBeforeDayDiv" class="timeRow">
                                        <div class="text">روز های قبل تعطیلی: </div>
                                        <div style="display: flex; align-items: center;">
                                            <div class="smTex">از ساعت </div>
                                            <div class="timePicker clockpicker">
                                                <input class="form-control" type="text" placeholder="انتخاب کنید">
                                            </div>
                                            <div class="smTex">تا ساعت </div>
                                            <div class="timePicker clockpicker">
                                                <input class="form-control" type="text" placeholder="انتخاب کنید">
                                            </div>
                                        </div>

                                        <label class="openCloseInputDiv" for="closedLastDay">
                                            <input type="checkbox" id="closedLastDay" onchange="iAmClose(this)">
                                            <div class="openCloseInputShow"></div>
                                        </label>
                                    </div>
                                    <div id="closedDayDiv" class="timeRow">
                                        <div class="text">روز های تعطیلی: </div>

                                        <div style="display: flex; align-items: center;">
                                            <div class="smTex">از ساعت </div>
                                            <div class="timePicker clockpicker">
                                                <input class="form-control" type="text" placeholder="انتخاب کنید">
                                            </div>
                                            <div class="smTex">تا ساعت </div>
                                            <div class="timePicker clockpicker">
                                                <input class="form-control" type="text" placeholder="انتخاب کنید">
                                            </div>
                                        </div>
                                        <label class="openCloseInputDiv" for="closedDay">
                                            <input type="checkbox" id="closedDay" onchange="iAmClose(this)">
                                            <div class="openCloseInputShow"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-6 form-group">
                                <label for="shopWebSite">آدرس وب سایت</label>
                                <input type="text" class="form-control" id="shopWebSite" placeholder="اگر وب سایت دارید وارد نمایید...">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="shopInstagram">آدرس اینستاگرام</label>
                                <input type="text" class="form-control" id="shopInstagram" placeholder="اگر صفحه اینستاگرام دارید وارد نمایید...">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="shopDescription">توضیحات</label>
{{--                                <div class="descriptionText">شما در این قسمت می توانید در مورد مغازه ، شغل و یا نوع فعالیت خود توضیحاتی بنویسید.</div>--}}
                                <textarea class="autoResizeTextArea form-control"
                                          id="shopDescription"
                                          placeholder="شما در این قسمت می توانید در مورد مغازه ، شغل و یا نوع فعالیت خود توضیحاتی بنویسید."></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="sectionPages section3 hidden">
                    <div class="container" style="width: 100%;">
                        <div class="row">
                            <div class="col-sm-12 headerRowInput">
                                بارگذاری عکس
                            </div>
                            <div class="col-md-12">
                                <div class="descriptionText">در این بخش می توانید عکس هایی از مغازه و یا کسب کار خود قرار دهید تا مردم شما را بهتر بشناسند.</div>
                                <label id="uploadedSection" for="localShopPics" class="uploadPicSection">
                                    <div class="uploadPic">
                                        <img src="{{URL::asset('images/icons/uploadPic.png')}}">
                                        <span>
                                            عکس های خود را در اینجا قرار دهید و یا کلیک کنید
                                        </span>
                                    </div>
                                </label>
                                <script>
                                    var fileImages = [];
                                    function uploadFileWithClick(_input) {
                                        if(_input.files && _input.files[0]){
                                            var reader = new FileReader();
                                            reader.onload = e => {
                                                fileImages.push({
                                                    file: _input.files[0],
                                                    image: e.target.result
                                                });
                                                createNewImgUploadCard(fileImages.length-1);
                                            };
                                            reader.readAsDataURL(_input.files[0]);
                                        }
                                        $(_input).val('');
                                    }

                                    function createNewImgUploadCard(_index){
                                        if(_index == 0)
                                            $('#uploadedSection').empty();

                                        var file = fileImages[_index];

                                        var text = `<div class="uploadFileCard">
                                                        <div class="img">
                                                            <img src="${file.image}" class="resizeImgClass" onload="fitThisImg(this)">
                                                        </div>
                                                        <div class="hoverInfos">
                                                            <div class="cancelButton closeIconWithCircle" onclick="deleteThisUploadedImage(${_index})">
                                                                 حذف عکس
                                                            </div>
                                                        </div>
                                                    </div>`;
                                        $('#uploadedSection').append(text);
                                    }

                                    function deleteThisUploadedImage(_index){

                                    }
                                </script>
                                <input type="file" accept="image/*" id="localShopPics" style="display: none" onchange="uploadFileWithClick(this)">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="submitSection">
                    <div class="container">
                        <div class="row">
                            <button id="nextButton" class="nextButton" onclick="goToPage(1)">ثبت و ادامه</button>
                            <button id="prevButton" class="prevButton hidden" onclick="goToPage(-1)">بازگشت</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCdVEd4L2687AfirfAnUY1yXkx-7IsCER0"></script>

    <script>

        var currentPage = 1;
        var map;
        var marker = 0;

        function initMap(){
            var mapOptions = {
                zoom: 5,
                center: new google.maps.LatLng(32.42056639964595, 54.00537109375),

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
            var mapElementSmall = document.getElementById('mapDiv');
            map = new google.maps.Map(mapElementSmall, mapOptions);

            google.maps.event.addListener(map, 'click', event => getLat(event.latLng));
        }

        function getLat(location){
            if(marker != 0)
                marker.setMap(null);
            marker = new google.maps.Marker({
                position: location,
                map: map,
            });

        }

        initMap();

        function findMyLocation() {
            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition((position) => {
                    var coordination = position.coords;
                    if(marker != 0)
                        marker.setMap(null);
                    marker = new google.maps.Marker({
                        position:  new google.maps.LatLng(coordination.latitude, coordination.longitude),
                        map: map,
                    });
                    map.setCenter({
                        lat : coordination.latitude,
                        lng : coordination.longitude
                    });
                    map.setZoom(16);
                });
            else
                console.log("Geolocation is not supported by this browser.");
        }

        function goToPage(_kind){
            if(currentPage == 1 && _kind == -1)
                return;

            if(currentPage == 3 && _kind == 1){
                doStoreLocalShop();
                return;
            }

            $('.indicator .level'+currentPage).removeClass('selected');

            currentPage += _kind;

            for(var i = 1; i <= currentPage; i++)
                $('.indicator .level'+i).addClass('selected');

            if(currentPage == 1)
                $('#prevButton').addClass('hidden');
            else
                $('#prevButton').removeClass('hidden');

            $('.sectionPages').addClass('hidden');
            $('.sectionPages.section'+currentPage).removeClass('hidden');
        }

        function doStoreLocalShop(){
            alert('store');
        }

        $(window).ready(() => {
            $('.clockpicker').clockpicker({
                donetext: 'تایید',
                autoclose: true,
            });
            autosize($('.autoResizeTextArea'))
        });

        function iAm24Hour(){
            isCheked = $('#allDay24').prop('checked');
            if(isCheked){
                $('#inWeekDiv').addClass('hidden');
                $('#closedBeforeDayDiv').addClass('hidden');
            }
            else{
                $('#inWeekDiv').removeClass('hidden');
                $('#closedBeforeDayDiv').removeClass('hidden');
            }
        }

        function iAmClose(_element){
            var isCheked = $(_element).prop('checked');
            if(isCheked){
                $(_element).parent().addClass('checked');
                $(_element).parent().prev().addClass('hidden');
            }
            else{
                $(_element).parent().removeClass('checked');
                $(_element).parent().prev().removeClass('hidden');
            }
        }

    </script>

@endsection