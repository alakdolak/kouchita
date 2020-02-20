
$(document).ready(function() {

    $('#Settings').on({

        mouseenter: function() {
            $(".settingsDropDown").show();
        },
        mouseleave: function() {
            $(".settingsDropDown").hide();
        }
    });


    $('#nameTop').click(function(e) {

        if( $("#profile-drop").is(":hidden")){
            $("#profile-drop").show();
            $("#my-trips-not").hide();
            $("#alert").hide();
            $("#bookmarkmenu").hide()

        }else{
            $("#profile-drop").hide();
            $("#my-trips-not").hide();
            $("#alert").hide();
            $("#bookmarkmenu").hide()
        }
    });

    $('#memberTop').click(function(e) {

        if( $("#profile-drop").is(":hidden")){
            $("#profile-drop").show();
            $("#my-trips-not").hide();
            $("#bookmarkmenu").hide();
            $("#alert").hide();

        }else{
            $("#profile-drop").hide();
            $("#my-trips-not").hide();
            $("#bookmarkmenu").hide();
            $("#alert").hide();
        }
    });

    $('#bookmarkicon').click(function(e) {

        if( $("#bookmarkmenu").is(":hidden")){
            $("#bookmarkmenu").show();
            $("#my-trips-not").hide();
            $("#profile-drop").hide();
            $("#alert").hide();
            showBookMarks('bookMarksDiv');

        }else{
            $("#bookmarkmenu").hide();
            $("#my-trips-not").hide();
            $("#profile-drop").hide();
            $("#alert").hide();
        }
    });


    $('.notification-bell').click(function(e) {

        if( $("#alert").is(":hidden")){
            $("#alert").show();
            $("#my-trips-not").hide();
            $("#profile-drop").hide();
            $("#bookmarkmenu").hide()

        }else{
            $("#alert").hide();
            $("#my-trips-not").hide();
            $("#profile-drop").hide();
            $("#bookmarkmenu").hide()
        }
    });

    $('#close_span_search').click(function(e) {
        $('#searchspan').animate({height: '0vh'});
        $("#myCloseBtn").addClass('hidden');
    });

    $('#openSearch').click(function(e) {
        $("#myCloseBtn").removeClass('hidden');
        $('#searchspan').animate({height: '100vh'});
    });

});

function showBookMarks(containerId) {
    
    $("#" + containerId).empty();

    $.ajax({
        type: 'post',
        url: getBookMarksPath,
        success: function (response) {

            response = JSON.parse(response);

            for(i = 0; i < response.length; i++) {
                element = "<div>";
                element += "<a class='masthead-recent-card' target='_self' href='" + response[i].placeRedirect + "'>";
                element += "<div class='media-left'>";
                element += "<div class='thumbnail' style='background-image: url(" + response[i].placePic + ");'></div>";
                element += "</div>";
                element += "<div class='content-right' style='text-align: right'>";
                element += "<div class='poi-title'>" + response[i].placeName + "</div>";
                element += "<div class='rating'>";
                element += "<div class='ui_bubble_rating bubble_" + response[i].placeRate + "0'></div><br/>" + response[i].placeReviews + " مشاهده ";
                element += "</div>";
                element += "<div class='geo'>" + response[i].placeCity + "</div>";
                element += "</div>";
                element += "</a></div>";

                $("#" + containerId).append(element);
            }

        }
    });
}

function getRecentlyViews(containerId) {
    $("#" + containerId).empty();

    $.ajax({
        type: 'post',
        url: getRecentlyPath,
        success: function (response) {
            
            response = JSON.parse(response);

            for(i = 0; i < response.length; i++) {
                element = "<div>";
                element += "<a class='masthead-recent-card' style='text-align: right !important;' target='_self' href='" + response[i].placeRedirect + "'>";
                element += "<div class='media-left' style='padding: 0 12px !important; margin: 0 !important;'>";
                element += "<div class='thumbnail' style='background-image: url(" + response[i].placePic + ");'></div>";
                element += "</div>";
                element += "<div class='content-right'>";
                element += "<div class='poi-title'>" + response[i].placeName + "</div>";
                element += "<div class='rating'>";

                element += "<div class='ui_bubble_rating bubble_" + response[i].placeRate + "0'></div>";

                element += "<br/>" + response[i].placeReviews + " نقد ";
                element += "</div>";
                element += "<div class='geo'>" + response[i].placeCity + "/ " + response[i].placeState + "</div>";
                element += "</div>";
                element += "</a></div>";

                $("#" + containerId).append(element);
            }

        }
    });
}

function showRecentlyViews(element) {
    if( $("#my-trips-not").is(":hidden")){
        $("#alert").hide();
        $("#my-trips-not").show();
        $("#profile-drop").hide();
        $("#bookmarkmenu").hide();
        getRecentlyViews(element);
    }else{
        $("#alert").hide();
        $("#my-trips-not").hide();
        $("#profile-drop").hide();
        $("#bookmarkmenu").hide();
    }
}

/*****************************************************/

$('body').on("click", function () {

    $("#profile-drop").hide();
    $("#my-trips-not").hide();
    $("#alert").hide();
    $("#bookmarkmenu").hide();
});
$('.global-nav-actions').on("click", function (ev) {

    ev.stopPropagation();
});