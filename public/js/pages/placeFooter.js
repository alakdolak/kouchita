let bookMarkSample;
let getPhoneBookMarks = false;

bookMarkSample = $('#phoneBookMarks').html();
$('#phoneBookMarks').empty();

function showSafarnamehFooterSearch(_element, _kind){
    $(_element).parent().find('.selected').removeClass('selected');
    $(_element).addClass('selected');
    if(_kind == 'place'){
        $('#safarnamehPlaceSearchFooter').show();
        $('#safarnamehContentSearchFooter').hide();
    }
    else{
        $('#safarnamehPlaceSearchFooter').hide();
        $('#safarnamehContentSearchFooter').show();
    }
}

function showSafarnamehSubCategory(_id){
    $('.mainSafarnamehCategory').hide();
    $('.subSafarnamehCategory').show();
    $(`#subSafarnamehCategory_${_id}`).show();
    setTimeout(() => $(`#subSafarnamehCategory_${_id}`).addClass('show'), 10);
}

function backToSafarnamehCategoryFooter(_element){
    $(_element).parent().removeClass('show');
    setTimeout(() => {
        $(_element).parent().hide();
        $('.mainSafarnamehCategory').show();
        $('.subSafarnamehCategory').hide();
    }, 300);
}

function toggleEditInfoMenu(elm) {
    $(elm).children('div.glyphicon-chevron-down').toggleClass('display-none');
    $(elm).children('div.glyphicon-chevron-up').toggleClass('display-none');
    $(elm).next().toggleClass('display-none');
    $(elm).next().toggleClass('display-flex');
}

function lp_selectArticleFilter(id , element) {
    $('.lp_ar_eachFilters').removeClass('lp_ar_selectedMenu');
    $(element).addClass('lp_ar_selectedMenu');
    $('.lp_ar_contentOfFilters').addClass('hidden');
    $('#' + id).removeClass('hidden');
}

function showMorefooter() {
    $('.footMoreLessBtnText').toggleClass('hidden');
    $('#aboutShazde').toggleClass('aboutShazdeMoreLess');
}

function openLoginHelperSection(){
    $('.loginHelperSection').removeClass('hidden');
    $('html, body').css('overflow', 'hidden');
}

function closeLoginHelperSection() {
    $('.loginHelperSection').addClass('hidden');
    $('html, body').css('overflow-y', 'auto');
}




