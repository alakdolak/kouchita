<style>
    .alertDarkBack {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .8);
        backdrop-filter: blur(2px);
        position: fixed;
        top: 0;
        z-index: 1000;
        display: flex;
        justify-content: center;
        display: none;
    }
    .alertBox {
        background-color: white;
        z-index: 10000;
        position: fixed;
        top: 10%;
        direction: rtl;
        border-radius: 10px;
    }
    .alertTitle {
        padding: 10px;
        font-size: 1.2em;
        color: white;
        border-radius: 10px 10px 0 0;
    }
    .offerTitle {
        background-color: #f0ad4e;
    }
    .warningTitle {
        background-color: #761c19;
    }
    .alertDescriptionBox {
        padding: 10px 20px;
    }
    .alertDescription {
        padding: 5px 0 25px;
    }
    .alertBtn {
        width: 150px;
        line-height: 20px;
        padding: 6px 12px;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 5px;
        color: white;
    }
    .alertBtn:hover {
        opacity: 0.75;
    }
    .rightBtn {
        background-color: #761c19;
        margin-left: 15px;
    }
    .leftBtn {
        float: left;
        background-color: #4cadc9;
        margin-right: 15px;
    }

    {{--phone style--}}
    @media (max-width:766px) {
        .alertBox {
            width: 90%;
            top: 15%;
        }

        .alertBtn {
            width: 100px;
        }
    }

</style>
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




{{--notifications--}}
<style>
    .notifAlert {
        width: 250px;
        text-align: center;
        position: fixed;
        bottom: -10%;
        right: 1%;
        direction: rtl;
        z-index: 10000;
        border-radius: 10px 10px 0 0;
        box-shadow: 0px 0px 12px 3px grey;
        background-color: #0076ac;
        padding: 10px;
        font-size: 1.2em;
        color: white;
        transition: 1s;
    }
    .greenAlert{
        background-color: #0c5200;
    }
    .redAlert{
        background-color: #963019;
    }
    .topAlert{
        bottom: 0px;
    }
    .rightAlert{
        right: 1%;
        left: auto;
    }
    .leftAlert{
        right: auto;
        left: 1%;
    }
    {{--phone style of notif--}}
    @media (max-width:766px) {
        .notifAlert {
            position: fixed;
            bottom: 0%;
            right: 50%;
            transform: translate(50%);
            z-index: 9;
        }
        .topAlert{
            bottom: 11%;
        }
    }

</style>

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