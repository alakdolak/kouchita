
<div class="userProfilePhotosAndVideos">
    <div class="userProfilePostsSearchContainer">
        <div class="userProfilePostsFiltration">
            <span id="userPhotoAllTab" class="active" onclick="changeShowPic('all')">همه</span>
            <span id="userPhotoPicTab" onclick="changeShowPic('pic')">عکس</span>
            <span id="userPhotoVideoTab" onclick="changeShowPic('video')">فیلم</span>
            <span id="userPhoto360Tab" onclick="changeShowPic('video360')">فیلم 360</span>
        </div>
    </div>
    <div id="pictureSection" class="photosAndVideosMainDiv"></div>
</div>

<script>
    let nowShow;
    let allPics ;
    let lastPicRow = 0;
    let typesOfWidth = [
        [ 30, 20, 50 ],
        [ 20, 40, 40 ],
        [ 34, 33, 33 ],
        [ 25, 25, 50 ],
    ];
    let showKind = {
        'pic' : true,
        'video' : true,
        'video360' : true
    };

    function createPictureRow(){
        let addedPic = 0;
        let text = '';
        let nowWidths;
        let rand = [];
        for(let i = 0; i < nowShow.length; i++){
            if(addedPic == 0) {
                randThree = [0, 1, 2];
                rand = [];
                random = Math.floor(Math.random()*4);
                nowWidths = typesOfWidth[random];
                text += `<div class="profilePicturesRow kind${lastPicRow}">`;

                if(nowShow.length > 2) {
                    while (true) {
                        if (randThree.length == 0)
                            break;
                        let rr = Math.floor(Math.random() * randThree.length);
                        rand.push(randThree[rr]);
                        randThree.splice(rr, 1);
                    }
                }
                else if(nowShow.length == 2) {
                    rand = [0,1];
                    nowWidths = [50, 50]
                }
                else if(nowShow.length == 1) {
                    rand = [0];
                    nowWidths = [100]
                }
            }
            if(showKind[nowShow[i]["fileKind"]]) {
                text += '<div class="profilePictureDiv" style="width: ' + nowWidths[rand[addedPic]] + '%;" onclick="showThisPictures(' + i + ')"> \n' +
                    '   <img src="' + nowShow[i]["sidePic"] + '" class="resizeImgClass" style="width: 100%" onload="fitThisImg(this)">\n' +
                    '</div>';
                addedPic++;
            }

            if(addedPic == 3) {
                text += '</div>';
                addedPic = 0;
                lastPicRow++;
                if(lastPicRow == 4)
                    lastPicRow = 0;
            }
        }

        $('#pictureSection').html(text);
    }

    function getAllUserPicsAndVideo(){
        let data;
        if(userPageId == 0)
            data = {
                _token: '{{csrf_token()}}',
                sort: reviewSort
            };
        else
            data = {
                _token: '{{csrf_token()}}',
                userId: userPageId, // in mainProfile.blade.php
            };

        $.ajax({
            type: 'post',
            url: '{{route("profile.getUserPicsAndVideo")}}',
            data: data,
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok'){
                    allPics = response.result;
                    nowShow = allPics;
                    createPictureRow();
                }
            },
            error: function(err){
                console.log(err);
            }
        })
    }

    function showThisPictures(_index){
        createPhotoModal('آلبوم عکس', nowShow, _index); // in general.photoAlbumModal.blade.php
    }

    function changeShowPic(_kind){
        $('.userProfilePostsFiltration').find('.active').removeClass('active');
        showKind = {
            'pic' : false,
            'video' : false,
            'video360' : false
        };

        if(_kind == 'pic')
            showKind['pic'] = !showKind['pic'];
        else if(_kind == 'video')
            showKind['video'] = !showKind['video'];
        else if(_kind == 'video360')
            showKind['video360'] = !showKind['video360'];
        else if(_kind == 'all'){
            showKind = {
                'pic' : true,
                'video' : true,
                'video360' : true
            }
        }

        nowShow = [];
        if(showKind['pic'] && showKind['video'] && showKind['video360']) {
            $('#userPhotoAllTab').addClass('active');
            nowShow = allPics;
        }
        else{
            if(showKind['pic'])
                $('#userPhotoPicTab').addClass('active');
            if(showKind['video'])
                $('#userPhotoVideoTab').addClass('active');
            if(showKind['video360'])
                $('#userPhoto360Tab').addClass('active');

            allPics.forEach(item => {
                if(showKind[item.fileKind])
                    nowShow.push(item);
            })
        }

        createPictureRow();
    }
</script>