let getPhoneBookMarks = false;

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

function openMobileFooterPopUps(_id){
    showLastPages();

    closeMyModalClass('footerModals');
    if(_id == 'profilePossibilities' && openCampingInMobileFooter == '')
        showCampingModal(); // in header1.blade.php
    else if(opnedMobileFooterId != _id) {
        opnedMobileFooterId = _id;
        openMyModal(_id);
    }
    else
        opnedMobileFooterId = null;
}

function mobileFooterProfileButton(_kind){
    let windowUrl = window.location;
    let url = windowUrl.origin + windowUrl.pathname;

    if(url == profileUrl || url == profileUrl+'/'+usrnme) {
        if (_kind == 'review')
            mobileChangeProfileTab($('#reviewProfileMoblieTab'), 'review'); // in mainProfile.blade.php
        else if (_kind == 'photo')
            mobileChangeProfileTab($('#photoProfileMoblieTab'), 'photo'); // in mainProfile.blade.php
        else if (_kind == 'safarnameh')
            mobileChangeProfileTab($('#safarnamehProfileMoblieTab'), 'safarnameh'); // in mainProfile.blade.php
        else if (_kind == 'medal')
            mobileChangeProfileTab($('#medalProfileMoblieTab'), 'medal'); // in mainProfile.blade.php
        else if (_kind == 'question')
            chooseFromMobileMenuTab('question', $('#myMenuMoreTabQuestion')); // in mainProfile.blade.php
        else if (_kind == 'bookMark')
            chooseFromMobileMenuTab('bookMark', $('#myMenuMoreTabBookMark')); // in mainProfile.blade.php
        else if (_kind == 'festival')
            chooseFromMobileMenuTab('festival', $('#myMenuMoreTabFestivalMark')); // in mainProfile.blade.php
        closeMyModalClass('footerModals');
    }
    else if(_kind == 'setting')
        window.location.href = userSettingPageUrl;
    else if(_kind == 'follower')
        openFollowerModal('resultFollowers', window.user.id); // in general.followerPopUp.blade.php
    else
        window.location.href = profileUrl+'#'+_kind;
}

function lp_selectMenu(id , element) {


    $('.lp_eachMenu').removeClass('lp_selectedMenu');
    $(element).addClass('lp_selectedMenu');
    $('.lp_others_content').addClass('hidden');
    $('#' + id).removeClass('hidden');

    if(id == 'lp_others_myTravel'){
        $('.newMyTripFooterButton').removeClass('hidden');
        $('.seeAllBookMarkFooter').addClass('hidden');
    }
    else if(id == 'lp_others_mark'){
        $('.newMyTripFooterButton').addClass('hidden');
        $('.seeAllBookMarkFooter').removeClass('hidden');
    }
    else{
        $('.newMyTripFooterButton').addClass('hidden');
        $('.seeAllBookMarkFooter').addClass('hidden');
    }
}

function closeMobileFooterPopUps(_id){
    $(`#${_id}`).modal('hide');
}

function createTripFromMobileFooter(){
    if(!checkLogin())
        return;
    createNewTrip();
}

function goToAddPlacePageInFooter(){
    if(!checkLogin())
        return;

    window.location.href = addPlaceByUserUrl;
}



