<!doctype html>
<html lang="fa" dir="rtl">
<head>
    @include('layouts.topHeader')
    <title>
        فستیوال
    </title>

    <link rel="stylesheet" href="{{URL::asset('css/pages/festival.css?v='.$fileVersions)}}">

    <style>
        section{
            background: #445565;
            min-height: 100vh;
            color: var(--light-gray);
        }

        .showFestivalPage .showFullPicModal .body .infoSec{
            width: 25%;
            background: #445565;
            border-radius: 30px 0px 0px 30px;
            padding: 15px;
            position: relative;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .liShButtons{
            position: absolute;
            bottom: 0px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            width: calc(100% - 30px);
            padding-bottom: 10px;
            background: #445565;
            border-radius: 0px 0px 0px 30px;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .liShButtons > div{
            width: 49%;
            text-align: center;
            padding: 10px 0px;
            border: solid;
            cursor: pointer;
            transition: .3s;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .liShButtons .likeButton{
            color: red;
            font-size: 30px;
            line-height: 19px;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .liShButtons .likeButton:hover{
            color: #445565;
            background: red;
            border-color: red;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .liShButtons .shareButton{
            color: var(--yellow);
            border-radius: 0px 0px 0px 30px;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .liShButtons .shareButton:hover{
            background: var(--yellow);
            border-color: var(--yellow);
            color: #445565;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .userInfo{
            display: flex;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: solid white 1px;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .userInfo .userPic{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .userInfo .username{
            color: white;
            font-size: 15px;
            margin-right: 10px;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .picInfo{
            overflow: auto;
            margin-bottom: 77px;
            height: calc(100% - 100px);
        }
        .showFestivalPage .showFullPicModal .body .infoSec .picInfo .inf{
            margin-top: 5px;
            margin-bottom: 18px;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .picInfo .inf .title{
            font-size: 11px;
        }
        .showFestivalPage .showFullPicModal .body .infoSec .picInfo .inf .text{
            color: white;
            padding-right: 10px;
            margin-top: 5px;
            font-size: 15px;
        }
    </style>
</head>
<body>

@include('general.forAllPages')

<header>
    <div class="container">
        <div class="logos">
            <a href="{{route('main')}}">
                <img src="{{URL::asset('images/camping/undp.svg')}}" style="height: 100%">
                <img src="{{URL::asset('images/icons/mainLogo.png')}}" style="height: 100%">
            </a>
        </div>
        <div class="buttons smallFont" style="margin-left: auto; margin-right: 10px;">
            #جشنواره ایران ما
        </div>
    </div>
</header>

<section class="showFestivalPage">
    <div class="container">
        <div class="smallFont header">
            <div>
                شما وارد قسمت آرای مردمی چشنواره ایران ما شده اید. در این قسمت می توانید به محتواهای مورد علاقه خود رای دهید.
            </div>
            <div style="color: var(--yellow)">
                توجه کنید هر کاربر تنها پنج حق رای دارد.
            </div>
        </div>

        <div class="tabSection">
            <div class="topTab">
                <div class="tab notTab">جشنواره</div>
                <div class="tab selected">عکس بخش اصلی</div>
                <div class="tab">عکس بخش فرعی</div>
                <div class="tab">فیلم بخش اصلی</div>
                <div class="tab">فیلم بخش فرعی</div>
            </div>
            <div class="botTab">
                <div class="right">
                    <div class="tab selected">تازه‌ترین‌ها</div>
                    <div class="tab">پر طرفدارترین ها</div>
                </div>
                <div class="left"> 3 رای از 5 رای</div>
            </div>
        </div>

        <div class="bodySection">
            @foreach($allPictures as $key => $item)
                <div class="userWorks">
                    <img src="{{$item->pic}}" onclick="openShowPictureModal({{$key}})" class="resizeImgClass" onload="fitThisImg(this)">
                    <div class="onPicture code" onclick="copyUrl(this, '{{route("festival.main")}}#{{$item->code}}')">#{{$item->code}}</div>
                    <div class="onPicture like empty-heart"></div>
                    <div class="onPicture likeCount">{{$item->like}}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="showImgModal" class="showFullPicModal hidden">
        <div class="iconClose" onclick="closeShowPictureModal()"></div>
        <div class="body">
            <div class="infoSec">
                <div class="userInfo">
                    <div class="userPic">
                        <img class="modalUserPic" src="#" style="height: 100%">
                    </div>
                    <a href="#" target="_blank" class="username modalUserName"></a>
                </div>
                <div class="picInfo">
                    <div class="inf">
                        <div class="title">نام اثر: </div>
                        <div class="text modalTitle"></div>
                    </div>
                    <div class="inf">
                        <div class="title">محل: </div>
                        <a href="#" target="_blank" class="text modalPlace"></a>
                    </div>
                    <div id="modalDescription" class="inf">
                        <div class="title">توضیحات عکس: </div>
                        <div class="text" style="font-size: 12px;"></div>
                    </div>
                </div>

                <div class="liShButtons">
                    <div class="likeButton empty-heart modalLike">0</div>
                    <div class="shareButton" onclick="copyUrl(this, window.location.href)">
                        اشتراک گذاری:
                        <span class="modalCode"></span>
                    </div>
                </div>
            </div>

            <div class="imgSec">
                <img id="modalPicture" src="#">
                <div class="nPButtons next leftArrowIcon" onclick="nextShowPicModal(-1)"></div>
                <div class="nPButtons prev leftArrowIcon" onclick="nextShowPicModal(1)"></div>
            </div>
        </div>
    </div>
</section>


<script>
    let nowShowPicIndex = 0;
    let allPics = {!! json_encode($allPictures) !!};

    function nextShowPicModal(_kind){
        openShowPictureModal(nowShowPicIndex+_kind);
    }

    function openShowPictureModal(_index){
        if(_index >= allPics.length)
            _index = 0;
        else if(_index < 0)
            _index = allPics.length - 1;

        let picc = allPics[_index];
        nowShowPicIndex = _index;

        window.location.hash = '#'+picc['code'];

        $('.modalUserPic').attr('src', picc['userPic']);
        $('.modalUserName').text(picc['username']);
        $('.modalUserName').attr('href', picc['userUrl']);
        $('.modalTitle').text(picc['title']);
        $('.modalPlace').attr('href', picc['placeUrl']);
        $('.modalPlace').text(picc['place']);
        $('.modalLike').text(picc['like']);
        $('.modalCode').text(picc['code']+'#');
        $('#modalPicture').attr('src', picc['pic']);
        if(picc['description'] != null){
            $('#modalDescription').show();
            $('#modalDescription').find('.text').text(picc['description']);
        }
        else{
            $('#modalDescription').hide();
            $('#modalDescription').find('.text').text('');
        }

        $('#showImgModal').removeClass('hidden');
    }

    function closeShowPictureModal(){
        window.location.hash = '';
        $('#showImgModal').addClass('hidden');
    }

    function copyUrl(_elems, _link){
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(_link).select();
        document.execCommand("copy");
        $temp.remove();

        let inputText = $(_elems).text();
        $(_elems).text('لینک کپی شد');
        setTimeout(() => $(_elems).text(inputText), 2000)

    }

    let urlHash = window.location.hash;
    if(urlHash.length != 0){
        allPics.map((item, index) => {
            console.log('#'+item.code, urlHash, index);
           if('#'+item.code == urlHash)
               openShowPictureModal(index);
        });
    }

</script>

</body>
</html>