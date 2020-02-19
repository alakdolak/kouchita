<link rel="stylesheet" href="{{URL::asset('css/common/alertPage.css')}}">

<div class="alertDarkBack">
    <div class="alertBox">
        <div class="alertTitle warningTitle">
            آیا مطمین هستید
        </div>
        <div class="alertDescriptionBox">
            <div class="alertDescription">
                سلام. <br> من سیدامیرعباس میرمحدصادقی هستم
            </div>
            <div>
                <button class="alertBtn rightBtn">خیر</button>
                <button class="alertBtn leftBtn">بله</button>
            </div>
        </div>
    </div>

    <div class="alertBox ">
        <div class="alertTitle offerTitle">
            یک لحظه درنگ کنید
        </div>
        <div class="alertDescriptionBox">
            <div class="alertDescription">
                سلام. <br> من سیدامیرعباس میرمحدصادقی هستم <br> و می خواهم در اینجا به شما اخطار دهم که این کاری که انجام دادید ایراد دارد و لطف کنید و گند نزنید به همه فرآیندی که ما برای شما در نطر رفتیم
            </div>
            <div>
                <button class="alertBtn rightBtn">فعلا، نه</button>
                <button class="alertBtn leftBtn">بزن بریم</button>
            </div>
        </div>
    </div>
</div>

<div id="successNotifiAlert" class="notifAlert">
    پست شما با موفقیت ثبت شد
</div>

<script>
    function showSuccessNotifi(_msg, _side = 'right', _color = '#0076ac'){
        document.getElementById('successNotifiAlert').innerText = _msg;
        $('#successNotifiAlert').addClass('topAlert');

        if(_side == 'right')
            $('#successNotifiAlert').addClass('rightAlert');
        else
            $('#successNotifiAlert').addClass('leftAlert');


        if(_color == 'red')
            $('#successNotifiAlert').addClass('redAlert')
        else if(_color == 'green')
            $('#successNotifiAlert').addClass('greenAlert')

        setTimeout(function(){
            $('#successNotifiAlert').removeClass('topAlert');

            setTimeout(function () {
                $('#successNotifiAlert').removeClass('greenAlert');
                $('#successNotifiAlert').removeClass('redAlert');
                $('#successNotifiAlert').removeClass('leftAlert');
                $('#successNotifiAlert').removeClass('rightAlert');
            }, 1000);

        }, 5000);
    }
</script>