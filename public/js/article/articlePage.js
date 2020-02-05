var srcHtmlComments = 0;

$(".login-button").click(function () {
    $(".dark").show();
    showLoginPrompt('{{Request::url()}}');
});

function hideElement(e) {
    $(".dark").hide(), $("#" + e).addClass("hidden")
}

function showElement(e) {
    $("#" + e).removeClass("hidden"), $(".dark").show()
}

function createCategoryList(){
    for(var i = 0; i < category.length; i++){
        var text = '<div class="gnColOFContentsCategory">\n' +
            '<div>\n' +
            '<div>\n' +
            '<span id="CategoryName_' + category[i]["id"] + '" class="gnTitleOfPlaces" onclick="searchInCategory(this)"  style="cursor: pointer">' + category[i]["name"] + '</span>\n' +
            '<span class="gnNumberOfPlaces">' + category[i]["postCount"] + '</span>\n' +
            '</div>\n';

        if(category[i]["subCategory"].length > 0)
            text +='<ul class="gnUl">\n';

        for(var j = 0; j < category[i]["subCategory"].length; j++){
            var sub = category[i]["subCategory"][j];
            text += '<li class="gnLi">\n' +
                '<span id="CategoryName_' + sub["id"] + '" onclick="searchInCategory(this)" style="cursor: pointer">' + sub["name"] + '</span>\n' +
                '<span class="gnNumberOfPlaces">' + sub["postCount"] + '</span>\n' +
                '</li>\n';
        }
        if(category[i]["subCategory"].length > 0)
            text += '</ul>\n';

        text +='</div>\n' +
            '</div>';

        if(i % 4 == 0 || i % 4 == 3)
            $("#rightCategory").append(text);
        else
            $("#leftCategory").append(text);
    }

    showPostCategoryInList();
}
createCategoryList();

function showPostCategoryInList(){
    for(var i = 0; i < post['category'].length; i++)
        $('#CategoryName_' + post['category'][i]['categoryId']).css('color', '#4dc7bc');
}

function searchInArticle(id){
    var text = $('#'+id).val();
    if(text.trim().length != 0){
        window.location.href = getLisPostUrl + '/content/' + text;
    }
}

function searchInCategory(element){
    var text = $(element).text();
    if(text.trim().length != 0)
        window.location.href = getLisPostUrl + '/category/' + text;
}

function checkLogin(){
    if (!hasLogin) {
        showLoginPrompt(requestUrl);
        return false;
    }
    else
        return true;
}

function likePost(_like, _id){
    if(!checkLogin())
        return;

    $.ajax({
        type: 'post',
        url: likeArticleUrl,
        data:{
            _token: _token,
            like: _like,
            id: _id
        },
        success: function(response){
            if(response == 'ok'){
                document.getElementById('likeDiv').style.color = '#666666';
                document.getElementById('disLikeDiv').style.color = '#666666';
                $('#likeDivIcon').removeClass('commentsLikeClickedIconFeedback');
                $('#disLikeDivIcon').removeClass('commentsDislikeClickedIconFeedback');

                if(_like == 1) {
                    document.getElementById('likeDiv').style.color = 'red';
                    $('#likeDivIcon').addClass('commentsLikeClickedIconFeedback');
                    likeCount++;
                    $('#countLike').text(likeCount)
                }
                else {
                    $('#disLikeDivIcon').addClass('commentsDislikeClickedIconFeedback');
                    document.getElementById('disLikeDiv').style.color = 'darkred';
                    disLikeCount++;
                    $('#countDisLike').text(disLikeCount);
                }

                if(uLike == 1) {
                    likeCount--;
                    $('#countLike').text(likeCount);
                }
                else if(uLike == 0) {
                    disLikeCount--;
                    $('#countDisLike').text(disLikeCount);
                }

                uLike = _like;

            }
        },
        error: function (response) {
            console.log(response)
        }
    })
}

function sendComment(_id, _ansTo, _element){
    if(!checkLogin())
        return;

    var txt = $(_element).prev().val();

    if(txt.trim().length != 0){
        $.ajax({
            type: 'post',
            url: commentStoreUrl,
            data:{
                _token: _token,
                id: _id,
                ansTo: _ansTo,
                txt: txt
            },
            success: function(response){
                if(response == 'ok')
                    window.location.reload();
            },
            error: function(err){
                console.log(err)
            }
        })
    }
}

function showPostsComments(_id){
    $('#commentDiv'+_id).toggle();
}

function likeComment(_id, _like, _element){
    if(!checkLogin())
        return;

    $.ajax({
        type: 'post',
        url: likeCommentUrl,
        data: {
            _token: _token,
            id: _id,
            like: _like
        },
        success: function (response){
            response = JSON.parse(response);
            if(response[0] == 'ok'){
                $('#commentLikeCount' + _id).text(response[1][0]['likeCount']);
                $('#commentDisLikeCount' + _id).text(response[1][0]['disLikeCount']);


                if(_like == 1){
                    $(_element).children().addClass('likeActionClickedBtn');
                    $(_element).next().children().removeClass('dislikeActionClickedBtn');
                }
                else{
                    $(_element).children().addClass('dislikeActionClickedBtn');
                    $(_element).prev().children().removeClass('likeActionClickedBtn');
                }
            }
        },
        error: function (err){
            // alert('error')
            console.log(err)
        }
    });
}

function replyToComments(_element){
    if(!checkLogin())
        return;

    $(_element).parent().next().toggle();
}

function createComment(srcId, comments){
    if(srcHtmlComments == 0)
        srcHtmlComments = $('#commentDiv0').html();

    $('#commentDiv' + srcId).html('');

    for(var i = 0; i < comments.length; i++){
        var t;
        var re;
        var text = srcHtmlComments;
        var fk = Object.keys(comments[i]);
        for (var x of fk) {
            t = '##' + x + '##';
            re = new RegExp(t, "g");

            if(x == 'ans'){
                if(comments[i][x] == null)
                    text = text.replace(re, 0);
                else
                    text = text.replace(re, comments[i][x].length);
            }
            text = text.replace(re, comments[i][x]);
        }

        t = '##authPic##';
        re = new RegExp(t, "g");
        text = text.replace(re, userPic);

        if(comments[i]['userLike'] == 1){
            t = '##showLike##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'likeActionClickedBtn');
        }
        else if(comments[i]['userLike'] == 0){
            t = '##showDisLike##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'dislikeActionClickedBtn');
        }

        var marginRight = '0px';
        if(srcId != 0)
            marginRight = '50px';
        t = '##mRight##';
        re = new RegExp(t, "g");
        text = text.replace(re, marginRight);

        if(comments[i]['ans'] != null && comments[i]['ans'].length != 0){
            t = '##haveAnsDisplay##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'block');
            $('#commentDiv' + srcId).append(text);
            createComment(comments[i]['id'], comments[i]['ans']);
        }
        else{
            t = '##haveAnsDisplay##';
            re = new RegExp(t, "g");
            text = text.replace(re, 'none');
            $('#commentDiv' + srcId).append(text);
        }
    }

}
createComment(0, comments);