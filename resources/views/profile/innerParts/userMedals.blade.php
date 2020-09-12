<style>
    .medalsSection{
        background: white;
        direction: rtl;
        text-align: right;
    }
    .medalsSection .rowTitle{
        font-size: 20px;
        border-bottom: solid 2px var(--koochita-blue);
        padding-bottom: 5px;
        margin: 10px 0px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    .medalsSection .rowTitle .link{
        font-size: 10px;
        cursor: pointer;
    }
    .medalsSection .medals{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .medalsSection .medals .medalCard{
        width: 170px;
        height: 240px;
        background: white;
        cursor: pointer;
        padding: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: solid 1px #d4d4d4;
        margin: 5px;
        border-radius: 10px;
        transition: transform 1s, box-shadow .1s;
    }
    .medalsSection .medals .medalCard.showBack{
        transform: rotateY(180deg);
        box-shadow: 0px 0px 5px 2px #d2d2d2;
    }
    .medalsSection .medals .medalCard:hover{
        box-shadow: 0px 0px 5px 2px #d2d2d2;
    }
    .medalsSection .medals .notTacken{
        text-align: center;
        padding: 10px 15px;
        background: var(--koochita-blue);
        color: white;
        border-radius: 30px;
    }
    .medalsSection .medals .medalCard .pic{
        width: 150px;
        height: 150px;
        display: flex;
        position: relative;
    }
    .medalsSection .medals .medalCard .frontCard .onPic{
        background-size: 150px 150px;
        height: 100%;
        background-repeat: no-repeat;
        background-position: right;
        z-index: 2;
        position: absolute;
    }
    .medalsSection .medals .medalCard .frontCard .onPic.blinking{
        animation: blinking 2s infinite;
    }
    .medalsSection .medals .medalCard .frontCard .offPic{
        background-size: 150px 150px;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-position: left;
    }
    .medalsSection .medals .medalCard .name{
        border-bottom: solid 1px gray;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        padding-bottom: 5px;
        padding-top: 10px;
        font-size: 18px;
    }
    .medalsSection .medals .medalCard .summery{
        font-size: 13px;
        color: var(--koochita-blue);
        text-align: center;
    }

    .medalsSection .medals .medalCard .backCard{
        transform: rotateY(180deg);
        text-align: center;
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .medalsSection .medals .medalCard .backCard .name{
        border: none;
        color: var(--koochita-red);
        font-size: 20px;
        font-weight: bold;
    }
    .medalsSection .medals .medalCard .backCard .pic{
        width: 65px;
        height: 65px;
        margin: 0px auto;
    }
    .medalsSection .medals .medalCard .backCard .text{
        font-size: 13px;
        margin-bottom: 32px;
    }
    .medalsSection .medals .medalCard .backCard .rate{
        border-top: solid 1px gray;
        padding-top: 5px;
        font-size: 18px;
        color: var(--koochita-blue);
        position: absolute;
        bottom: 0;
        width: 100%;
    }


    @keyframes blinking {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>

<div class="postsMainDivInSpecificMode medalsSection col-xs-12">

    <div id="notDataMedal"  style="display: none">
        <div class="col-xs-12 notData">
            <div class="pic">
                <img src="{{URL::asset('images/mainPics/noData.png')}}" style="width: 100%">
            </div>
            <div class="info">
                @if($myPage)
                    <div class="firstLine">
                        اینجا خالی است.هنوز پستی نگذاشتید...
                    </div>
                    <div class="sai">
                        جایی رو که دوست داری رو پیدا کن و
                        <button class="butt" onclick="openMainSearch(0) // in mainSearch.blade.php">نظرتو بگو</button>
                    </div>
                @else
                    <div class="firstLine">
                        اینجا خالی است. {{$user->username}} هنوز مدالی کسب نکرده...
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="rowTitle">
            مدال های کسب شده
            <a href="#" class="link">چگونه کسب درآمد کنیم؟</a>
        </div>
        <div id="takenMedal" class="medals"></div>
    </div>
    @if($myPage)
        <div class="col-md-12">
            <div class="rowTitle">با کمی تلاش کسب می شود</div>
            <div id="inProgressMedal" class="medals"></div>
        </div>
        <div class="col-md-12">
            <div class="rowTitle">همه مدال ها</div>
            <div id="allMedals" class="medals"></div>
        </div>
    @endif
</div>

<script>
    let notDataMedal = $('#notDataMedal').html();
    $('#notDataMedal').removeClass();

    function getMedals(){
        $.ajax({
            type: 'post',
            url: '{{route('profile.getUserMedals')}}',
            data: {
                _token: '{{csrf_token()}}',
                userId: userPageId
            },
            success: function(response){
                response = JSON.parse(response);
                @if($myPage)
                    createCard(response.allMedals, 'allMedals');
                    createCard(response.inProgressMedal, 'inProgressMedal');
                @endif
                if(response.takenMedal.length == 0)
                    $('#takenMedal').html(notDataMedal);
                else
                    createCard(response.takenMedal, 'takenMedal');
            }
        })
    }

    function createCard(_result, _id){
        let text = '';
        _result.map(item => {
            text += '<div class="medalCard" onclick="showBackCard(this)">\n' +
                    '                    <div class="frontCard">\n' +
                    '                        <div class="pic">\n' +
                    '                            <div class="onPic blinking" style="width: ' + item.percent + '%; background-image: url(' + item.onPic + ')"></div>\n' +
                    '                            <div class="offPic" style="background-image: url(' + item.offPic + ')"></div>\n' +
                    '                        </div>\n' +
                    '                        <div class="name">' + item.name + '</div>\n' +
                    '                        <div class="summery">' + item.sumText + '</div>\n' +
                    '                    </div>\n' +
                    '                    <div class="backCard hidden">\n' +
                    '                        <div class="pic">\n' +
                    '                            <img src="' + item.onPic + '" style="width: 100%;">\n' +
                    '                        </div>\n' +
                    '                        <div class="name">' + item.name + '</div>\n' +
                    '                        <div class="text">' + item.text + '</div>\n' +
                    '                        <div class="rate">\n' +
                    '                            <span style="color: var(--koochita-red);">' + item.take + '</span>\n' +
                    ' از                             ' + item.floor +
                    '                        </div>'+
                    '                    </div>\n' +
                    '                </div>';
        });

        $('#'+_id).html(text);
    }

    function filterMedals(_kind, _element){
        $(_element).parent().find('.active').removeClass('active');
        $(_element).addClass('active');
    }

    function showBackCard(_element){
        $(_element).toggleClass('showBack');
        setTimeout(function () {
            $(_element).find('.frontCard').toggleClass('hidden');
            $(_element).find('.backCard').toggleClass('hidden');
        }, 300)
    }
</script>
