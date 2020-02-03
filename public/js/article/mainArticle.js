
var allPostSample = 0;

function getAllPost(page){
    $.ajax({
        type: 'post',
        url: getAllPostUrl,
        data: {
            page: page,
            _token: _token
        },
        success: function(response){
            createPostRow(response);
            createPagination(page);
        }
    })
}

function createPostRow(post){
    var post = JSON.parse(post);
    if(allPostSample == 0)
        allPostSample = $('#samplePost').html();

    $('#samplePost').html('');
    for(var i = 0; i < post.length; i++){
        var text = allPostSample;
        var fk = Object.keys(post[i]);
        for (var x of fk) {
            var t = '##' + x + '##';
            var re = new RegExp(t, "g");
            text = text.replace(re, post[i][x]);
        }

        $('#samplePost').append(text);
    }

}

function createPagination(page){

    var beforeMore = false;
    var afterMore = false;
    var text = '';
    $('#allPostPagination').html('');

    for(var i = 1; i <= totalPage; i++){
        text = '';
        if(page == i)
            text = "<span aria-current='page' class='page-numbers current' style='cursor: pointer'>" + i + "</span>";
        else if(Math.abs(i - page) <= 2)
            text = "<a class='page-numbers' onclick='getAllPost(" + i + ")' style='cursor: pointer'>" + i + "</a>\n";
        else if(i == 1)
            text = "<a class='page-numbers' onclick='getAllPost(" + i + ")' style='cursor: pointer'>" + i + "</a>\n";
        else if(!beforeMore && i < page){
            beforeMore = true;
            text = '<span class="page-numbers dots">&hellip;</span>';
        }
        else if(i == totalPage)
            text = "<a class='page-numbers' onclick='getAllPost(" + i + ")' style='cursor: pointer'>" + i + "</a>\n";
        else if(!afterMore && i > page){
            afterMore = true;
            text = '<span class="page-numbers dots">&hellip;</span>';
        }
        $('#allPostPagination').append(text);
    }


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