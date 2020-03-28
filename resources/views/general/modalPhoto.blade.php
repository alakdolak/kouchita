<link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/modalPhotos.css')}}">
<style>
    .photoAlbumLikeSection{
        color: rgb(154, 160, 166);
        display: block;
        justify-content: center;
        align-items: center;
    }
    
    .photoAlbumTopLike{
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        cursor: pointer;
        padding: 0px;
    }
    .likePhotoAlbum{
        border-radius: 50px;
        background-color: #303134;
        float: right;
        padding: 0px 10px;
        color: #609beb;
    }
    .likePhotoAlbum:before{
        content: '\E1F9';
        font-family: Shazde_Regular2 !important;
        font-size: 35px;
        width: 35px;
    }
    .fullLikePhotoAlbum{
        color: red;
    }
    .fullLikePhotoAlbum:before{
        content: '\E057';
        font-family: Shazde_Regular2 !important;
        font-size: 35px;
        width: 35px;
    }
    .disLikePhotoAlbum{
        border-radius: 50px;
        background-color: #303134;
        margin-right: 11px;
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0px 10px;
        color: #609beb;
    }
    .disLikePhotoAlbum:before{
        content: '\E1F8';
        font-family: Shazde_Regular2 !important;
        font-size: 35px;
        width: 35px;
    }

    .fullDisLikePhotoAlbum{
        color: darkred;
    }
    .fullDisLikePhotoAlbum:before{
        content: '\E058';
        font-family: Shazde_Regular2 !important;
        font-size: 35px;
        width: 35px;
    }
</style>
<div class="modal showingPhotosModal" id="photoAlbumModal" role="dialog" style="display: none">
    <div class="modal-dialog" style="margin-top: 2%">
        <div class="modal-content" style="background-color: #141518; border: none;">
            <div id="showingPhotosMainDivHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div id="photoAlbumTitle" class="showingPhotosTitle"></div>
            </div>

            {{--<div class="commentWriterDetailsShow">--}}
                {{--<div class="circleBase type2 commentWriterPicShow">--}}
                    {{--<img id="photoAlbumUserPic" class="koochitaCircleLogo" src="" style="border-radius: 50%;">--}}
                {{--</div>--}}
                {{--<div class="commentWriterExperienceDetails" style="width: auto; padding: 0px;">--}}
                    {{--<b id="photoAlbumUserName" class="userProfileName"></b>--}}
                    {{--<div>--}}
                        {{--<div class="display-inline-block">در--}}
                        {{--<span class="commentWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>--}}
                        {{--</div>--}}
                        {{--<div>با--}}
                        {{--<span class="commentWriterExperienceParticipation">احتشام الدوله توفیقی</span>،--}}
                        {{--<span class="commentWriterExperienceParticipation">حمیدرضا عسگرزاده </span>و--}}
                        {{--<span class="commentWriterExperienceParticipation">علی اصر همتی</span>--}}
                        {{--</div>--}}
                        {{--<div id="photoAlbumUploadTime" style="color: #9aa0a6;"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div id="photoAlbumLikeSection" style="color: #9aa0a6; display: none">--}}
                    {{--<div class="photosFeedBackBtn" style="width: 15%">--}}
                        {{--<div class="feedBackBtn">--}}
                            {{--<div id="photoAlbumTopDisLike" class="col-xs-6 dislikeBox photoAlbumTopLike disLikePhotoAlbum">--}}
                                {{--<div id="photoAlbumDisLikeCount" style="font-size: 25px"></div>--}}
                            {{--</div>--}}
                            {{--<div id="photoAlbumTopLike" class="col-xs-6 likeBox photoAlbumTopLike likePhotoAlbum">--}}
                                {{--<div id="photoAlbumLikeCount" style="font-size: 25px"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="userInfoPhotoAlbum hideOnScreen">
                <div class="circleBase type2 commentWriterPicShow">
                    <img id="photoAlbumUserPicOnScreen" class="koochitaCircleLogo" src="" style="border-radius: 50%;">
                </div>
                <div class="commentWriterExperienceDetails" style="width: auto; padding: 0px;">
                    <b id="photoAlbumUserNameOnScreen" class="userProfileName"></b>
                    <div>
                        <div id="photoAlbumUploadTimeOnScreen" style="color: #9aa0a6;"></div>
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="display-flex">
                <div class="col-xs-12 col-sm-9 leftColPhotosModalMainDiv" style="display: flex; margin-bottom: 20px;">
                    <div id="leftColPhotosModalMainDiv" class="selectedPhotoShowingModal" style="position: relative;">
                        <div style="position: relative; width: 100%;">
                            <div style="max-height: 80vh; overflow: auto; width: 100%;">
                                <img id="mainPhotoAlbum" src="" alt="" style="width: 100%;">
                                <video id="mainVideoPhotoAlbum" src="" controls style="width: 100%; height: 100%;"></video>
                            </div>
                            <div style="position: absolute; bottom: -25px; right: 0px; margin-top: 7px; display: flex; justify-content: center;">
                                <div id="photoAlbumLikeSection" class="photoAlbumLikeSection" style="display:none;">
                                    <div>
                                        <div class="feedBackBtn" style="margin: 0px;">
                                            <div id="photoAlbumTopDisLike" class="dislikeBox photoAlbumTopLike disLikePhotoAlbum" style="border-radius: 50px; background-color: #303134;">
                                                <div id="photoAlbumDisLikeCount" style="font-size: 25px"></div>
                                            </div>
                                            <div id="photoAlbumTopLike" class="likeBox photoAlbumTopLike likePhotoAlbum" style="border-radius: 50px; background-color: #303134;">
                                                <div id="photoAlbumLikeCount" style="font-size: 25px"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="position: absolute; bottom: 0px; right: 0px; margin-top: 7px; display: flex; justify-content: center;">
                            <div id="photoAlbumLikeSection" class="photoAlbumLikeSection" style="display:none;">
                                <div>
                                    <div class="feedBackBtn" style="margin: 0px;">
                                        <div id="photoAlbumTopDisLike" class="dislikeBox photoAlbumTopLike disLikePhotoAlbum" style="border-radius: 50px; background-color: #303134;">
                                            <div id="photoAlbumDisLikeCount" style="font-size: 25px"></div>
                                        </div>
                                        <div id="photoAlbumTopLike" class="likeBox photoAlbumTopLike likePhotoAlbum" style="border-radius: 50px; background-color: #303134;">
                                            <div id="photoAlbumLikeCount" style="font-size: 25px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="rightColPhotosModalMainDiv" class="col-xs-12 col-sm-3 rightColPhotosModalMainDiv" style="max-height: 85vh;">
                    <div class="userInfoPhotoAlbum hideOnPhone">
                        <div class="circleBase type2 commentWriterPicShow">
                            <img id="photoAlbumUserPicOnPhone" class="koochitaCircleLogo" src="" style="border-radius: 50%;">
                        </div>
                        <div class="commentWriterExperienceDetails" style="width: auto; padding: 0px;">
                            <b id="photoAlbumUserNameOnPhone" class="userProfileName"></b>
                            <div>
                                <div id="photoAlbumUploadTimeOnPhone" style="color: #9aa0a6;"></div>
                            </div>
                        </div>
                    </div>

                    <div id="sidePhotoModal" style="padding: 0px 10px 0px 5px;">
                        <div id="sideAlbumPic##index##" class="rightColPhotosShowingModal" onclick="##picIndex##">
                            <img src="##sidePic##" alt="##alt##" class="mainAlbumPic">
                        </div>
                    </div>

                </div>
            </div>
            <div class="photosDescriptionShowingModal">
                <div id="photoAlbumDescription" style="display: block"></div>
            </div>
        </div>

    </div>
</div>

<script>
    var sidePics;
    var srcSidePic = 0;
    var choosenIndex;

    function createPhotoModal(_title, _pics){
        if(srcSidePic == 0)
            srcSidePic = $('#sidePhotoModal').html();

        $('#sidePhotoModal').html('');

        sidePics = _pics;
        $('#photoAlbumTitle').text(_title);

        for(i = 0; i < sidePics.length; i++){
                var t;
                var re;
                var text = srcSidePic;
                var fk = Object.keys(sidePics[i]);
                for (var x of fk) {
                    t = '##' + x + '##';
                    re = new RegExp(t, "g");
                    text = text.replace(re, sidePics[i][x]);
                }

                t = '##picIndex##';
                re = new RegExp(t, "g");
                text = text.replace(re, 'chooseAlbumMainPhoto(' + i + ')');

                t = '##index##';
                re = new RegExp(t, "g");
                text = text.replace(re, i);

                $('#sidePhotoModal').append(text);
            }
        $('#photoAlbumModal').modal('show');
        chooseAlbumMainPhoto(0);
    }

    function chooseAlbumMainPhoto(_index){
        var funcDislike;
        var funcLike;
        choosenIndex = _index;
        $('.chooseSidePhotoAlbum').removeClass('chooseSidePhotoAlbum');
        $('#photoAlbumDescription').text('');

        $('#photoAlbumUploadTimeOnScreen').text(sidePics[_index]['uploadTime']);
        $('#photoAlbumUploadTimeOnPhone').text(sidePics[_index]['uploadTime']);
        $('#photoAlbumUserNameOnScreen').text(sidePics[_index]['userName']);
        $('#photoAlbumUserNameOnPhone').text(sidePics[_index]['userName']);
        $('#photoAlbumUserPicOnScreen').attr('src', sidePics[_index]['userPic']);
        $('#photoAlbumUserPicOnPhone').attr('src', sidePics[_index]['userPic']);

        $('#sideAlbumPic' + _index).addClass('chooseSidePhotoAlbum');

        if(sidePics[_index]['video'] != undefined) {
            $('#mainPhotoAlbum').css('display', 'none');
            $('#mainVideoPhotoAlbum').css('display', 'block');

            $('#mainVideoPhotoAlbum').attr('src', sidePics[_index]['video']);
        }
        else{
            $('#mainPhotoAlbum').css('display', 'block');
            $('#mainVideoPhotoAlbum').css('display', 'none');

            $('#mainPhotoAlbum').attr('src', sidePics[_index]['mainPic']);
            $('#mainPhotoAlbum').attr('alt', sidePics[_index]['alt']);
            $('#mainVideoPhotoAlbum').attr('src', '');
        }

        if(sidePics[_index]['showInfo']) {
            $('#photoAlbumTopLike').removeClass('fullLikePhotoAlbum');
            $('#photoAlbumTopDisLike').removeClass('fullDisLikePhotoAlbum');

            $('#photoAlbumLikeSection').css('display', 'block');
            $('#photoAlbumDisLikeCount').text(sidePics[_index]['dislike']);
            $('#photoAlbumLikeCount').text(sidePics[_index]['like']);

            funcLike = sidePics[_index]['likeFunc'] + '(' + sidePics[_index]['id'] + ', 1)';
            funcDislike = sidePics[_index]['disLikeFunc'] + '(' + sidePics[_index]['id'] + ', -1)';

            $('#photoAlbumTopLike').attr('onclick', funcLike);
            $('#photoAlbumTopDisLike').attr('onclick', funcDislike);

            if(sidePics[_index]['userLike'] == 1)
                likePhotoAlbum(1);
            else if(sidePics[_index]['userLike'] == -1)
                likePhotoAlbum(-1);
        }
        else
            $('#photoAlbumLikeSection').css('display', 'none');

        // leftHeight = $('#leftColPhotosModalMainDiv').css('height');
        //
        // $('#rightColPhotosModalMainDiv').css('max-height', leftHeight);

        $('#photoAlbumDescription').text(sidePics[_index]['description']);
    }

    function likePhotoAlbum(_like){
        $('#photoAlbumTopLike').removeClass('fullLikePhotoAlbum');
        $('#photoAlbumTopDisLike').removeClass('fullDisLikePhotoAlbum');
        sidePics[choosenIndex]['userLike'] = _like;

        if(_like == 1)
            $('#photoAlbumTopLike').addClass('fullLikePhotoAlbum');
        else if(_like == -1)
            $('#photoAlbumTopDisLike').addClass('fullDisLikePhotoAlbum');
    }

    function setLikeNumberInPhotoAlbum(_count, _kind){

        if(_kind == 'like') {
            $('#photoAlbumLikeCount').text(_count);
            sidePics[choosenIndex]['like'] = _count;
        }
        else if(_kind == 'dislike'){
            $('#photoAlbumDisLikeCount').text(_count);
            sidePics[choosenIndex]['dislike'] = _count;
        }

    }
</script>
