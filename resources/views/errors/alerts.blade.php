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
</style>

{{--phone style--}}
<style>
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



{{--notifications--}}
<div class="notifAlert">
    پست شما با موفقیت ثبت شد
</div>

<style>
    .notifAlert {
        width: 250px;
        text-align: center;
        position: fixed;
        bottom:0%;
        right: 1%;
        direction: rtl;
        z-index: 10000;
        border-radius: 10px 10px 0 0;
        box-shadow: 0px 0px 12px 3px grey;
        background-color: #0076ac;
        padding: 10px;
        font-size: 1.2em;
        color: white;
    }

</style>

{{--phone style of notif--}}
<style>
    @media (max-width:766px) {
        .notifAlert {
            position: fixed;
            bottom: 12%;
            right: 50%;
            transform: translate(50%);
            z-index: 0;
        }
    }
</style>