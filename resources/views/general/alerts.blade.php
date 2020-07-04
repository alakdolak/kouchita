<link rel="stylesheet" href="{{URL::asset('css/common/alertPage.css')}}">

<div id="alertBoxDiv" class="alertDarkBack">
    <div class="alertBox">
        <div class="alertTitle warningTitle">
            درخواست شما با مشکل مواجه شد
        </div>
        <div class="alertDescriptionBox">
            <div id="alertBodyDiv" class="alertDescription"></div>
            <div>
                <button class="alertBtn leftBtn" onclick="closeErrorAlert()">متوجه شدم</button>
            </div>
        </div>
    </div>
</div>

<div id="warningBoxDiv" class="alertDarkBack">
    <div class="alertBox">
        <div class="alertTitle offerTitle">
            {{__('یک لحظه درنگ کنید')}}
        </div>
        <div class="alertDescriptionBox">
            <div id="warningBody" class="alertDescription"></div>
            <div style="display: flex; justify-content: center; align-items: center">
{{--                <button class="alertBtn rightBtn" onclick="closeWarning()">فعلا، نه</button>--}}
                <button class="alertBtn leftBtn" onclick="closeWarning()">{{__('بسیار خب')}}</button>
            </div>
        </div>
    </div>
</div>

<div id="successNotifiAlert" class="notifAlert"></div>

<script>
    function showSuccessNotifi(_msg, _side = 'right', _color = '#0076ac'){
        $('#successNotifiAlert').text(_msg);
        $('#successNotifiAlert').addClass('topAlert');

        $('#successNotifiAlert').css('background', _color);

        if(_side == 'right')
            $('#successNotifiAlert').addClass('rightAlert');
        else
            $('#successNotifiAlert').addClass('leftAlert');

        setTimeout(function(){
            $('#successNotifiAlert').removeClass('topAlert');
            setTimeout(function () {
                $('#successNotifiAlert').removeClass('leftAlert');
                $('#successNotifiAlert').removeClass('rightAlert');
            }, 1000);
        }, 5000);

    }


    function openWarning(_text){
        $('#warningBody').html(_text);
        $('#warningBoxDiv').css('display', 'flex');
    }

    function closeWarning(){
        $('#warningBoxDiv').css('display', 'none');
    }

    function openErrorAlert(_text){
        $('#alertBodyDiv').html(_text);
        $('#alertBoxDiv').css('display', 'flex');
    }
    function closeErrorAlert(){
        $('#alertBoxDiv').css('display', 'none');
    }
</script>