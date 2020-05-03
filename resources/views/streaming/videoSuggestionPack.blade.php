<link rel="stylesheet" href="{{URL::asset('css/streaming/suggestionStreaming.css')}}">

<div id="videoSuggestionSample" style="display: none">
    <div id="##id##" class="swiper-slide videoSuggestion">
        <a href="##url##" class="videoSugPicSection">
            <img src="##img##" class="resizeImgClass videoSugPic">
            <div class="overPicSug likeOverPic">
                <div style="display: flex; margin-left: 10px;">
                    <span class="likeOverPicNum">##dislike##</span>
                    <span class="DisLikeIcon likeOverPicIcon"></span>
                </div>
                <div style="display: flex;">
                    <span class="likeOverPicNum">##like##</span>
                    <span class="LikeIcon likeOverPicIcon"></span>
                </div>
            </div>
            <div class="overPicSug seenOverPic">
                <span>##see##</span>
                <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
            </div>
            <div class="playIconDiv">
                <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
            </div>
        </a>
        <div class="videoSugInfo">
            <div class="videoSugUserInfo">
                <a href="##url##" class="videoSugName">
                    ##name##
                </a>
            </div>

            <div class="videoSugUserPic">
                <div class="videoSugUserPicDiv">
                    <img src="##userPic##" alt="koochita" style="width: 100%; height: 100%;">
                </div>
                <div class="videoUserInfoName">
                    <div class="videoSugUserName">
                        ##username##
                    </div>
                    <div class="videoSugTime">
                        ##time##
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script !src="">

    let videoSample = $('#videoSuggestionSample').html();
    $('#videoSuggestionSample').remove();

    function createVideoSuggestionDiv(_pack, _destId){
        // _pack = {
        //     id : ,
        //     name: ,
        //     url : ,
        //     img : ,
        //     like : ,
        //     dislike: ,
        //     see : ,
        //     userPic : ,
        //     username : ,
        //     time : ,
        // }
        for(let i = 0; i < _pack.length; i++){
            let text = videoSample;
            let fk = Object.keys(_pack[i]);
            for (let x of fk) {
                t = '##' + x + '##';
                re = new RegExp(t, "g");
                text = text.replace(re, _pack[i][x]);
            }
            $('#' + _destId).append(text);
        }
    }
</script>