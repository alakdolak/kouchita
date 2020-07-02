
function likePhotographerPic(_id, _like){

    if(!checkLogin())
        return;

    $.ajax({
        type: 'post',
        url: likePhotographerPicRoute,
        data: {
            'id' : _id,
            'like' : _like
        },
        success: function(response){
            response = JSON.parse(response);
            if(response[0] == 'ok'){
                setLikeNumberInPhotoAlbum(response[1], 'like');
                setLikeNumberInPhotoAlbum(response[2], 'dislike');
                likePhotoAlbum(_like);
                for(i = 0; i < photographerPics.length; i++){
                    if(photographerPics[i]['id'] == _id){
                        photographerPics[i]['like'] = response[1];
                        photographerPics[i]['dislike'] = response[2];
                        photographerPics[i]['userLike'] = _like;
                        break;
                    }
                }
            }

        }
    })
}
