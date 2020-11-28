<link rel="stylesheet" href="{{URL::asset('css/pages/festival.css')}}">

<div id="mainFestivalContent" class="userProfileArticles festivalContent">
    <div id="mainFestivalContentList"></div>

    <div class="SpecfestivalContent hidden">
        <div class="userProfilePostsFiltrationContainer">
            <div id="subFestivalTopMenu" class="userProfilePostsFiltration questionSecTab"></div>
        </div>

        <div class="col-xs-12 notData emptyFestival hidden">
            <div class="pic">
                <img src="{{URL::asset('images/mainPics/noData.png')}}" style="width: 100%">
            </div>
            <div class="info">
                <div class="firstLine">
                    اینجا خالی است.هنوز در این بخش فستیوال شرکت نکرده اید...
                </div>
                <div class="sai" style="display: flex">
                    <a href="{{route('festival.uploadWorks')}}"
                       target="_blank"
                       class="butt"
                       style="font-size: 10px; margin-right: auto;">شرکت در فستیوال</a>
                </div>
            </div>
        </div>

        <div id="festivalContentPlaceHolder" class="hidden">
            <div class="profilePicturesRow kind2">
                <div class="profilePictureDiv placeHolderAnime" style="width: 33%; height: 150px"></div>
                <div class="profilePictureDiv placeHolderAnime" style="width: 33%; height: 150px"></div>
                <div class="profilePictureDiv placeHolderAnime" style="width: 33%; height: 150px"></div>
            </div>
        </div>

        <div id="festivalContentId" class="photosAndVideosMainDiv"></div>
    </div>
</div>

<div id="showFestivalImgModal" class="showFullPicModal hidden">
    <div class="iconClose" onclick="closeShowPictureModal()"></div>
    <div id="showImgModalBody" class="body">
        <div id="modalImgSection" class="imgSec">
            <img id="modalPicture" src="#">
            <video id="modalVideo" src="#" controls></video>
            <div class="nPButtons next leftArrowIcon" onclick="nextShowFestivalPicModal(-1)"></div>
            <div class="nPButtons prev leftArrowIcon" onclick="nextShowFestivalPicModal(1)"></div>
        </div>

        <div id="modalInfoSection" class="infoSec">
            <div class="userInfo">
                <div style="display: flex; align-items: center;">
                    <div class="userPic">
                        <img class="modalUserPic" src="#" style="height: 100%;">
                    </div>
                    <a href="#" target="_blank" class="username modalUserName"></a>
                </div>
                <div class="hideOnScreen showSLBInM">
                    <button class="modalLike empty-heartAfter" onclick="likeWorks(this)" code="0"></button>
                    <button class="codeButton" onclick="copyUrl(this)">
                        اشتراک گذاری:
                        <span class="modalCode"></span>
                    </button>
                </div>
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
                <div class="likeButton empty-heartAfter modalLike" onclick="likeWorks(this)" code="0"></div>
                <div class="shareButton" onclick="copyUrl(this)">
                    اشتراک گذاری:
                    <span class="modalCode"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var nowFestivalSection = 'main';
    var nowFestivalKind = 'photo';

    var festivalsInformations = [];
    var nowShowFestivalCode = 0;
    var thisFestivalContent = [];
    var nowShowFestivalPicIndex = 0;
    function getMainFestival(){
        $("#mainFestivalContentList").removeClass('hidden');
        $(".SpecfestivalContent").addClass('hidden');

        let sfpl = getSafaranmehPlaceHolderRow(); // component.safarnamehRow.blade.php
        $('#mainFestivalContentList').html(sfpl+sfpl);
        $.ajax({
            type: 'GET',
            url: '{{route("profile.getMainFestival")}}',
            success: response => {
                if(response.status == 'ok')
                    createMainFestivalContent(response.result);
            },
            error: err => console.log(err)
        })
    }

    function createMainFestivalContent(_result){
        let text = '';
        festivalsInformations = _result;
        _result.map(item => {
            text +=  `<div class="usersArticlesMainDiv">
                        <div class="articleImgMainDiv">
                            <div onClick="getFestivalMyWorks(${item.id})">
                                <img src="${item.pic}" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">
                            </div>
                        </div>
                        <div class="articleDetailsMainDiv">
                            <div class="articleTitleMainDiv">
                                <div onClick="getFestivalMyWorks(${item.id})" style="cursor: pointer;">${item.name}</div>
                            </div>
                            <div class="articleSummarizedContentMainDiv">
                                <span>${item.description}</span>
                            </div>
                            <a href="${item.pageUrl}" class="readSafarnamehButton"> صفحه ی فستیوال</a>
                        </div>
                    </div>`;
        });

        $('#mainFestivalContentList').html(text);
    }

    function getFestivalMyWorks(_id){
        var subMenus = '';
        festivalsInformations.map(fest => {
            if(fest.id == _id)
                fest.subs.map(sub => subMenus += `<span class="active" onclick="changeBookMarkShowKind('${item.name}', this)">${sub.name}</span>`);
        });
        $('#subFestivalTopMenu').html(subMenus);

        $("#mainFestivalContentList").addClass('hidden');
        $(".SpecfestivalContent").removeClass('hidden');

        // let selectedEleme = $('#mainFestivalContent').find('.questionSecTab .active')[0];
        // changeBookMarkShowKind(_id);

        getFestivalContents(_id);
    }

    function getFestivalContents(_id){
        $.ajax({
            type: 'GET',
            url: '{{route("festival.getMyWorks")}}',
            success: function(response){
                if(response.status == 'ok')
                    createFestivalPictures(response.result);
            },
            error: function (err) {
                console.log(err);
            }
        })

    }


    function changeBookMarkShowKind(_id, _elem){
        $(_elem).parent().find('.active').removeClass('active');
        $(_elem).addClass('active');

        nowFestivalSection = _sec;
        nowFestivalKind = _kind;

        $('#festivalContentPlaceHolder').removeClass('hidden');
        $('#mainFestivalContent').find('.notData').addClass('hidden');
        $('#festivalContentId').addClass('hidden');

    }

    function createFestivalPictures(_result){
        let addedPic = 0;
        let text = '';
        thisFestivalContent = _result;

        $('#festivalContentId').empty().removeClass('hidden');
        $('#festivalContentPlaceHolder').addClass('hidden');

        if (_result.length == 0)
            $('#mainFestivalContent').find('.notData').removeClass('hidden');
        else
            $('#mainFestivalContent').find('.notData').addClass('hidden');

        _result.map((item, index) => {
            if(addedPic == 0)
                text += '<div class="profilePicturesRow kind2">';

            text += '<div class="profilePictureDiv" style="width: 33%;" onclick="openFestivalPictureWithIndex('+index+')"> \n' +
                    '   <img src="' + item.thumbnail + '" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">\n' +
                    '</div>';
            addedPic++;

            if(addedPic == 3) {
                text += '</div>';
                addedPic = 0;
            }
        });

        $('#festivalContentId').html(text);
    }


    function nextShowFestivalPicModal(_kind){
        openFestivalPictureWithIndex(nowShowFestivalPicIndex+_kind);
    }

    function openFestivalPictureWithIndex(_index){
        nowShowFestivalPicIndex = _index;
        if(nowShowFestivalPicIndex < 0)
            nowShowFestivalPicIndex = thisFestivalContent.length-1;
        else if(nowShowFestivalPicIndex == thisFestivalContent.length)
            nowShowFestivalPicIndex = 0;

        openShowPictureModal(thisFestivalContent[nowShowFestivalPicIndex]);
    }

    function openShowPictureModal(_picture){
        $('#modalPicture').attr('src', '#');
        $('#modalVideo').attr('src', '#');

        if(_picture['isPic'] == 1){
            $('#modalVideo').hide();
            $('#modalPicture').show();
            $('#modalPicture').attr('src', _picture['pic']);
        }
        else{
            $('#modalVideo').show();
            $('#modalPicture').hide();
            $('#modalVideo').attr('src', _picture['video']);
        }

        $('.modalUserPic').attr('src', _picture['userPic']);
        $('.modalUserName').text(_picture['username']);
        $('.modalUserName').attr('href', _picture['userUrl']);
        $('.modalTitle').text(_picture['title']);
        $('.modalPlace').attr('href', _picture['placeUrl']);
        $('.modalPlace').text(_picture['place']);
        $('.modalLike').text(_picture['like']);
        $('.modalLike').attr('code', _picture['code']);
        $('.modalCode').text(_picture['code']+'#');
        if(_picture['description'] != null){
            $('#modalDescription').show();
            $('#modalDescription').find('.text').text(_picture['description']);
        }
        else{
            $('#modalDescription').hide();
            $('#modalDescription').find('.text').text('');
        }

        if(_picture['youLike'] == 1){
            $('.modalLike').removeClass('empty-heartAfter');
            $('.modalLike').addClass('HeartIconAfter');
        }
        else{
            $('.modalLike').removeClass('HeartIconAfter');
            $('.modalLike').addClass('empty-heartAfter');
        }

        nowShowFestivalCode = _picture.code;
        $('#showFestivalImgModal').removeClass('hidden');
    }

    function closeShowPictureModal(){
        $('#showFestivalImgModal').addClass('hidden');
    }

    function copyUrl(_elems){
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val("{{route('festival.main')}}?code="+nowShowFestivalCode).select();
        document.execCommand("copy");
        $temp.remove();

        let inputText = $(_elems).text();
        $(_elems).text('لینک کپی شد');
        setTimeout(() => $(_elems).text(inputText), 2000)

    }

</script>