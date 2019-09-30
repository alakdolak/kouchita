
var currIdx, suggestions = [];

function chooseState(e) {

    $.ajax({
        type: "post",
        url: getStates,
        success: function (t) {

            var newElement = "";
            t = JSON.parse(t);

            for (var i = 0; i < t.length; i++) {
                newElement += "<option value='" + homeURL + "/adab-list/" + t[i].name + "/" + e + "'>" + t[i].name + "</option>";
            }

            $("#states").empty().append(newElement);
            $("#statePane1").removeClass("hidden");
            $(".dark").show();
        }
    })
}


function chooseStateAmaken() {
    $.ajax({
        type: "post",
        url: getStates,
        success: function (t) {

            var newElement = "";
            t = JSON.parse(t);

            for (var i = 0; i < t.length; i++) {
                newElement += "<option value='" + homeURL + "/amakenList/" + t[i].name + "/state'>" + t[i].name + "</option>";
            }

            $("#states").empty().append(newElement);
            $("#statePane1").removeClass("hidden");
            $(".dark").show();
        }
    })
}

function getCities() {

    var e = $("#states2").val(), t = $("#states2 option:selected").attr("data-val");

    $.ajax({
        type: "post",
        url: getCitiesDir,
        data: {stateId: e},
        success: function (e) {

            var newElement = "<option value='" + homeURL + "/majaraList/" + t + "/state'> استان " + t + "</option>";
            e = JSON.parse(e);

            for (var i = 0; i < e.length; i++) {
                newElement += "<option value='" + homeURL +  "/majaraList/" + e[i].name + "/city'>شهر " + e[i].name + "</option>";
            }
            $("#cities").empty().append(newElement)
        }
    })
}

function chooseStateMajara() {
    $.ajax({
        type: "post",
        url: getStates,
        success: function (e) {
            e = JSON.parse(e);
            var newElement = "";

            for (var i = 0; i < e.length; i++) {
                newElement += "<option data-val='" + e[i].name + "' value='" + e[i].id + "'>" + e[i].name + "</option>";
            }

            if(e.length > 0) {
                $(".dark").show();
                $("#states2").empty().append(newElement);
                $("#statePane2").removeClass("hidden");
                getCities();
            }
        }
    })
}

function chooseGoyesh() {
    $.ajax({
        type: "post",
        url: getGoyesh,
        success: function (e) {
            e = JSON.parse(e);
            var newElement = "";
            for (var i = 0; i < e.length; i++) {
                newElement += "<option value='" + homeURL + "/estelahat/" + e[i].name + "'>" + e[i].name + "</option>";
            }
            $(".dark").show();
            $("#goyesh").empty().append(newElement);
            $("#goyeshPane").removeClass("hidden");
        }
    })
}

function showBookMarks(e) {
    $("#" + e).empty();
    $.ajax({
        type: "post",
        url: getBookMarksPath,
        success: function (t) {
            t = JSON.parse(t);
            for (var i = 0; i < t.length; i++) {
                var element = "<div>";
                element += "<a class='masthead-recent-card' target='_self' href='" + t[i].placeRedirect + "'>";
                element += "<div class='media-left'>";
                element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>";
                element += "</div>";
                element += "<div class='content-right'>";
                element += "<div class='poi-title'>" + t[i].placeName + "</div>";
                element += "<div class='rating'>";
                element += "<div class='ui_bubble_rating bubble_45'></div><br/>" + t[i].placeReviews + " مشاهده ";
                element += "</div>";
                element += "<div class='geo'>" + t[i].placeCity + "</div>";
                element += "</div>";
                element += "</a></div>";
                $("#" + e).append(element);
            }
        }
    })
}

function getRecentlyViews(e) {
    $("#" + e).empty();
    $.ajax({
        type: "post",
        url: getRecentlyPath,
        success: function (t) {
            t = JSON.parse(t);
            for (var i = 0; i < t.length; i++) {
                var element = "<div>";
                element += "<a class='masthead-recent-card' style='text-align: right !important;' target='_self' href='" + t[i].placeRedirect + "'>";
                element += "<div class='media-left' style='padding: 0 12px !important; margin: 0 !important;'>";
                element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>";
                element += "</div>";
                element += "<div class='content-right'>";
                element += "<div class='poi-title'>" + t[i].placeName + "</div>";
                element += "<div class='rating'>";
                element += (5 == t[i].placeRate) ? "<div class='ui_bubble_rating bubble_50'></div>" :
                    4 == t[i].placeRate ? "<div class='ui_bubble_rating bubble_40'></div>" :
                    3 == t[i].placeRate ? "<div class='ui_bubble_rating bubble_30'></div>" :
                    2 == t[i].placeRate ? "<div class='ui_bubble_rating bubble_20'></div>" :
                    "<div class='ui_bubble_rating bubble_10'></div>";
                element += "<br/>" + t[i].placeReviews + " نقد ", element += "</div>";
                element += "<div class='geo'>" + t[i].placeCity + "/ " + t[i].placeState + "</div>";
                element += "</div>";
                element += "</a></div>";
                $("#" + e).append(element);
            }
        }
    })
}

function showRecentlyViews(e) {
    $("#my-trips-not").is(":hidden") ? ($("#alert").hide(), $("#my-trips-not").show(), $("#profile-drop").hide(), $("#bookmarkmenu").hide(), getRecentlyViews(e)) : ($("#alert").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide())
}

$(".login-button").click(function () {
    $(".dark").show();
    showLoginPrompt(url);
});

$(document).ready(function () {

    $("#Settings").on({
        mouseenter: function () {
            $(".settingsDropDown").show()
        }, mouseleave: function () {
            $(".settingsDropDown").hide()
        }
    });

    $("#nameTop").click(function (e) {
        $("#profile-drop").is(":hidden") ? ($("#profile-drop").show(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide()) : ($("#profile-drop").hide(), $("#my-trips-not").hide(), $("#alert").hide(), $("#bookmarkmenu").hide())
    });

    $("#memberTop").click(function (e) {
        $("#profile-drop").is(":hidden") ? ($("#profile-drop").show(), $("#my-trips-not").hide(), $("#bookmarkmenu").hide(), $("#alert").hide()) : ($("#profile-drop").hide(), $("#my-trips-not").hide(), $("#bookmarkmenu").hide(), $("#alert").hide())
    });

    $("#bookmarkicon").click(function (e) {
        $("#bookmarkmenu").is(":hidden") ? ($("#bookmarkmenu").show(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#alert").hide(), showBookMarks("bookMarksDiv")) : ($("#bookmarkmenu").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#alert").hide())
    });

    $(".notification-bell").click(function (e) {
        $("#alert").is(":hidden") ? ($("#alert").show(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide()) : ($("#alert").hide(), $("#my-trips-not").hide(), $("#profile-drop").hide(), $("#bookmarkmenu").hide())
    });

    $("#close_span_search").click(function (e) {
        $("#searchspan").animate({height: "0vh"}), $("#myCloseBtn").addClass("hidden")
    });

    $("#openSearch").click(function (e) {
        $("#myCloseBtn").removeClass("hidden"), $("#searchspan").animate({height: "100vh"})
    })
});

$("body").on("click", function () {
    $("#profile-drop").hide();
    $("#my-trips-not").hide();
    $("#alert").hide();
    $("#bookmarkmenu").hide();
});

$(".global-nav-actions").on("click", function (e) {
    e.stopPropagation()
});