<div id="followerModal" class="modalBlackBack fullCenter followerModal" style="z-index: 9999;">
    <div class="modalBody" style="width: 400px; border-radius: 10px;">
        <div onclick="closeMyModal('followerModal')" class="iconClose closeModal"></div>
        <div class="header">
            <div class="resultFollowersTab selected" onclick="openFromInPageFollower('resultFollowers')">
                <span class="followerNumber" style="font-weight: bold;"></span>
                <span>follower</span>
            </div>
            <div id="ifYouCanSeeFollowing" class="resultFollowingTab hidden" onclick="openFromInPageFollower('resultFollowing')">
                <span class="followingNumber" style="font-weight: bold;">{{$followingCount}}</span>
                <span>following</span>
            </div>
        </div>
        <div id="followerModalBody" class="body">
            <div id="resultFollowers"></div>
            <div id="resultFollowing"></div>
        </div>
    </div>
</div>

<script>
    let getUserFollowerInPage = 0;
    let followerUserId = {{auth()->check() ? auth()->user()->id : 0}};
    let followerPlaceHolder =   '<div class="peopleRow placeHolder">\n' +
                                '   <div class="pic placeHolderAnime"></div>\n' +
                                '   <div class="name placeHolderAnime resultLineAnim"></div>\n' +
                                '   <div class="buttonP placeHolderAnime resultLineAnim"></div>\n' +
                                '</div>';

    function openFromInPageFollower(_kind){
        openFollowerModal(_kind, getUserFollowerInPage);
    }

    function openFollowerModal(_kind, _forWho = 0){
        if(_forWho != 0)
            getUserFollowerInPage = _forWho;

        if(followerUserId == _forWho)
            $('#ifYouCanSeeFollowing').removeClass('hidden');
        else
            $('#ifYouCanSeeFollowing').addClass('hidden');

        $('#followerModalBody').children().addClass('hidden');
        $(`#${_kind}`).removeClass('hidden');

        $(`.${_kind}Tab`).parent().find('.selected').removeClass('selected');
        $(`.${_kind}Tab`).addClass('selected');
        $('#'+_kind).html(followerPlaceHolder+followerPlaceHolder);

        let sendKind = '';
        if(_kind == 'resultFollowing')
            sendKind = 'following';
        else
            sendKind = 'follower';

        openMyModal('followerModal');
        $.ajax({
            type: 'post',
            url: '{{route("profile.getFollower")}}',
            data: {
                _token: '{{csrf_token()}}',
                id: _forWho,
                kind: sendKind
            },
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok') {
                    if(_kind == 'resultFollowers')
                        $('.followerNumber').text(response.result.length);
                    createFollower(_kind, response.result)
                };
            },
            error: err => console.log(err)
        })
    }

    function createFollower(_Id, _follower){
        let text = '';
        if(_follower.length == 0) {
            text =  '<div class="emptyPeople">\n' +
                '   <img src="{{URL::asset('images/mainPics/noData.png')}}" >\n' +
                '   <span class="text">هیچ کاربری ثبت نشده است</span>\n' +
                '</div>';
        }
        else {
            _follower.map(item => {
                let followed = '';
                if (item.followed == 1)
                    followed = 'followed';

                text += '<div class="peopleRow">\n' +
                    '   <a href="' + item.url + '" class="pic">\n' +
                    '       <img src="' + item.pic + '" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">\n' +
                    '   </a>\n' +
                    '   <a href="' + item.url + '" class="name">' + item.username + '</a>\n';
                if (item.notMe == 1)
                    text += '   <div class="button ' + followed + '"  onclick="followUser(this, ' + item.userId + ')"></div>\n';
                text += '</div>';
            });
        }
        $('#'+_Id).html(text);
    }

</script>