@extends('layouts.bodyPlace')

@section('title')
    <title>صفحه پیام ها</title>
@stop

@section('meta')

@stop

@section('header')
    @parent

    <style>
        body{
            min-width: 0px;
        }
        .Scroll{
            scrollbar-color: var(--koochita-green) #f1f1f1;
            scrollbar-width: thin;
        }
        ::-webkit-scrollbar {
            width: 7px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--koochita-green);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--koochita-dark-green);
        }
        footer{
            display: none;
        }
        .mainMsgBody{
            display: flex;
            background-position: center;
{{--            background-image: url("{{URL::asset('images/mainPics/msgBack.jpg')}}");--}}
            background-size: cover;
            padding: 2px 0px;
        }
        .msgBody{
            width: 75%;
            {{--background-image: url("{{URL::asset('images/mainPics/Asset-40.jpg')}}");--}}
            background-image: url("{{URL::asset('images/mainPics/msgBack.jpg')}}");
            background-size: cover;
            background-position: center;
            overflow: hidden;
            border-radius: 20px;
            height: calc(100vh - 65px);
            margin: 5px;
            margin-right: 20px;
            position: relative;
        }
        .sideContacts{
            position: relative;
            width: 25%;
            overflow: hidden;
            background: white;
            border-radius: 20px;
            height: calc(100vh - 65px);
            margin: 5px;
        }
        .userSideSection{
            height: calc(100% - 60px);
            overflow-y: auto;
            margin-top: 60px;
        }
        .userRow{
            cursor: pointer;
            display: flex;
            padding: 10px;
            border-bottom: solid #e0e0e0 1px;
        }
        .userRow.active{
            background-color: #fcc15675;
        }
        .userPic{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .userPic img{

        }
        .userInfo{
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 10px;
            width: calc(100% - 70px);
        }
        .userName{
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .userLastMsg{
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: gray;
        }
        .userLastMsg .newMsg {
            background: var(--koochita-blue);
            color: white;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }
        .userName .time{
            font-size: 12px;
        }
        .userSearchSec{
            position: absolute;
            background: var(--koochita-blue);
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 15px;
        }
        .userSearchSec .leftBigArrowIcon{
            color: white;
            font-size: 30px;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: solid;
            border-radius: 50%;
            cursor: pointer;
        }
        .userInfoMSg{
            display: flex;
            align-items: center;
            width: 100%;
            margin: 0;
            padding: 5px 10px;
        }
        .userInfoMSg .leftBigArrowIcon{
            color: var(--koochita-blue);
            font-size: 45px;
            line-height: 35px;
            width: 35px;
            display: none;
            align-items: center;
            justify-content: center;
            margin-right: 5px;
            border: solid;
            border-radius: 50%;
        }
        .msgHeader{
            z-index: 9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--koochita-yellow);
            position: relative;
            width: 100%;
        }
        .userSetting{
            margin-right: 20px;
            position: relative;
        }
        .userSetting .threeDotIconVertical{
            font-size: 35px;
            cursor: pointer;
        }
        .userSettingMenu{
            background: #f1f1f1;
            border-radius: 10px;
            position: absolute;
            width: 155px;
            right: 0;
            text-align: right;
            direction: rtl;
            transition: .3s;
            max-height: 0px;
            overflow: hidden;
        }
        .userSettingMenu.open{
            padding: 10px;
            max-height: 100px;
        }
        .userSettingMenu .nav{
            margin: 5px 0px;
            padding: 5px;
            cursor: pointer;
            border-radius: 10px;
            transition: .3s;
        }
        .userSettingMenu .nav:hover{
            background: var(--koochita-red);
            color: white;
        }
        .msgContent{
            padding: 10px 15px;
            height: calc(100% - 110px);
            overflow: auto;
        }
        .msgContent > div{
            max-width: 90%;
            width: fit-content;
            padding: 10px;
            margin: 3px 0px;
            border-radius: 15px;
            position: relative;
        }
        .msgContent .myText{
            margin-left: auto;
            text-align: right;
            background: #dcf8c6;
        }
        .msgContent .otherText{
            background: white;
        }
        .msgContent .otherText .time{
            text-align: right;
            color: gray;
            font-size: 13px;
            margin-top: 10px;
        }
        .msgContent .myText .time{
            text-align: left;
            color: gray;
            font-size: 13px;
            margin-top: 10px;
        }
        .msgContent .myText.corner{
            margin-top: 25px;
            border-radius: 15px 0px 15px 15px;
        }
        .msgContent .otherText.corner{
            margin-top: 25px;
            border-radius: 0px 15px 15px 15px;
        }
        .msgContent .otherText.corner:before{
            content: "";
            width: 10px;
            height: 15px;
            left: -10px;
            top: 0px;
            position: absolute;
            background-image: url("{{URL::asset('images/icons/whiteCorner.png')}}");
            background-position: center;
            background-size: cover;
        }
        .msgContent .myText.corner:before{
            content: "";
            width: 10px;
            height: 15px;
            right: -10px;
            top: 0px;
            position: absolute;
            background-image: url("{{URL::asset('images/icons/greenCorner2.png')}}");
            background-position: center;
            background-size: cover;
        }
        .msgContent .Date{
            color: white;
            margin: 0px auto;
            background: var(--koochita-blue);
            padding: 10px 20px;
            border-radius: 35px;
        }
        .msgContent .Date.fixed{
            position: fixed;
            top: 130px;
            left: 58%;
            z-index: 9;
        }
        .searchInp{
            display: flex;
            align-items: center;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            width: 85%;
            cursor: pointer;
        }
        .searchInp .searchIcon, .searchInp .iconClose{
            padding: 0px 5px;
            font-size: 25px;
            color: var(--koochita-blue);
        }
        .searchInp input {
            border: none;
            direction: rtl;
            text-align: right;
            width: 100%;
        }
        .msgFooter{
            width: 100%;
            min-height: 50px;
            background: var(--koochita-blue);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 10px 0px;
        }
        .inputMsgSec{
            display: flex;
            background: white;
            padding: 5px;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            width: 90%;
            margin-bottom: 10px;
        }
        .msgFooter .sendIcon{
            /*color: var(--koochita-blue);*/
            color: white;
            font-size: 35px;
            line-height: 25px;
            cursor: pointer;
            margin-bottom: 15px;
            transform: rotate(225deg);
        }
        .inputMsgSec textarea{
            border: none;
            font-size: 14px;
            width: 99%;
            resize: none;
            max-height: 150px;
            text-align: right;
            direction: rtl;
        }
        .showThis{
            display: block !important;
        }
        .hideThis{
            display: block;
        }
        @media (max-width: 1200px) {
            .msgBody{
                width: 70%;
            }
            .sideContacts{
                width: 30%;
            }
        }

        @media (max-width: 768px) {
            .showThis{
                display: block !important;
            }
            .hideThis{
                display: none !important;
            }
            html{
                overflow: hidden;
            }
            .sideContacts{
                width: 100%;
                height: 75vh;
                margin: 0px;
                border-radius: 0px;
            }
            .msgBody{
                display: none;
                width: 100%;
                margin: 0;
                border-radius: 0px;
                height: calc(100vh - 148px);
            }
            .userSideSection{
                height: calc(100% - 65px);
            }
            footer{
                display: flex;
            }
            .msgContent .Date.fixed{
                top: 146px;
                left: 38%;
            }
            .mainMsgBody{
                padding: 0;
            }
            .inputMsgSec textarea{
                max-height: 100px;
            }
            .userInfoMSg .leftBigArrowIcon {
                display: flex;
            }
            .userRow.active{
                background-color: inherit;
            }
            .msgHeader{
                background: var(--koochita-yellow);
            }
        }

    </style>

    <style>
        .adminSetting{
            display: none !important;
        }
    </style>
@stop

@section('main')
    <div class="mainMsgBody">
        <div id="sideListUser" class="sideContacts">
            <div class="userSearchSec">
                <a href="{{route('profile')}}" class="leftBigArrowIcon" title="بازگشت"></a>
                <div class="searchInp">
                    <input id="searchInUser" type="text" onkeydown="searchInUsers(this.value)">
                    <div class="searchIcon"></div>
                    <div class="iconClose" style="display: none" onclick="clearSearchBox()"></div>
                </div>
            </div>
            <div class="userSideSection Scroll">
               @for($i = 0; $i < 100; $i++)
                   <div class="userRow" onclick="showThisMsgs(this)">
                       <div class="userPic">
                           <img src="{{URL::asset(getUserPic(auth()->user()->id))}}" style="height: 100%">
                       </div>
                       <div class="userInfo">
                           <div class="userName">
                               <div>
                                   علی وثوقی
                               </div>
                               <div class="time">
                                   10:29
                               </div>
                           </div>
                           <div class="userLastMsg">
                               <div>
                                   این متن اخرین پیام است...
                               </div>
                               <div class="newMsg">
                                   10
                               </div>
                           </div>
                       </div>
                   </div>
               @endfor
           </div>
        </div>
        <div id="msgBody" class="msgBody">
            <div class="msgHeader">
                <div class="userInfoMSg">
                    <div class="leftBigArrowIcon" onclick="backToList()"></div>
                    <div class="userPic">
                        <img src="{{URL::asset(getUserPic(auth()->user()->id))}}" style="height: 100%">
                    </div>
                    <div style="margin-left: 10px">
                        علی وثوقی
                    </div>
                </div>
                <div class="userSetting">
                    <span class="threeDotIconVertical" onclick="$(this).next().toggleClass('open')"></span>
                    <div class="userSettingMenu">
                        <div class="nav">پاک کردن گفتگو ها</div>
                        <div class="nav">حذف کاربر</div>
                    </div>
                </div>
            </div>
            <div class="msgContent">

                <div class="Date"> 1399-05-12</div>

                <div class="myText corner">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                        می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
                        جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه
                        ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت
                        تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                        سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="myText">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText corner">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>

                <div class="Date"> 1399-05-14</div>

                <div class="myText corner">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="myText">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText corner">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>

                <div class="Date">امروز</div>

                <div class="myText corner">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="myText">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText corner">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>

                <div class="myText corner">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="myText">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText corner">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>

                <div class="myText corner">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="myText">
                    <div>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                        گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                        و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربر اساسا مورد استفاده قرار گیرد.
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText corner">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
                <div class="otherText">
                    <div>
                        لورم ایپسوم متن سا
                    </div>
                    <div class="time">
                        14:23
                    </div>
                </div>
            </div>
            <div class="msgFooter">
                <div class="sendIcon"></div>
                <div class="inputMsgSec">
                    <textarea id="msgText" rows="1" onkeyup="changeHeight()" placeholder="پیام خود را وارد کنید..."></textarea>
                </div>
            </div>
        </div>
    </div>

    <script>
        autosize($('textarea'));
        $('.searchInp').on('click', function(){
            $('#searchInUser').focus();
        });

        function searchInUsers(_value){
            if(_value.trim().length == 0){
                $('.searchInp').find('.searchIcon').show();
                $('.searchInp').find('.iconClose').hide();
            }
            else{
                $('.searchInp').find('.searchIcon').hide();
                $('.searchInp').find('.iconClose').show();
            }
        }

        function clearSearchBox(){
            $('#searchInUser').val('');
            $('.searchInp').find('.searchIcon').show();
            $('.searchInp').find('.iconClose').hide();
        }

        function changeHeight(){
            let height = $('.msgFooter').height();
            height += 70;
            if(height < 110)
                height = 110;
            $('.msgContent').css('height', 'calc(100% - ' + height + 'px)');
        }

        let lastTopIndex = -1;
        $('.msgContent').on('scroll', function(e){
            let date = $('.Date');
            date.map((index, item) => {
                if(lastTopIndex != index) {
                    let topIndex = $(item).position().top;
                    if (topIndex <= 60){
                        $('.Date.fixed').removeClass('fixed');
                        lastTopIndex = index;
                        $(item).addClass('fixed');
                    }
                }
            })
        })

        function showThisMsgs(_element){
            $('#msgBody').addClass('showThis');
            $('#sideListUser').addClass('hideThis');

            $('.userRow').removeClass('active');
            $(_element).addClass('active');
        }

        function backToList(){
            $('#msgBody').removeClass('showThis');
            $('#sideListUser').removeClass('hideThis');
        }
    </script>
@stop