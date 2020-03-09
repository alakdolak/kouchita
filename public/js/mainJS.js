var currIdx, suggestions = [];

function redirect() {
    "" != $("#placeId").val() && (document.location.href = $("#placeId").val())
}

function search(e) {
    if (val = $("#placeName").val(), null == val || "" == val || val.length < 2) $("#result").empty(); else {
        if ($(".suggest").css("background-color", "transparent").css("padding", "0").css("border-radius", "0"), 13 == e.keyCode && -1 != currIdx) return $("#placeId").val(suggestions[currIdx].url), redirect();
        if (13 == e.keyCode && -1 == currIdx && suggestions.length > 0) return $("#placeId").val(suggestions[0].url), redirect();
        if (40 == e.keyCode) return currIdx + 1 < suggestions.length ? currIdx++ : currIdx = 0, void (currIdx >= 0 && currIdx < suggestions.length && $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px"));
        if (38 == e.keyCode) return currIdx - 1 >= 0 ? currIdx-- : currIdx = suggestions.length - 1, void (currIdx >= 0 && currIdx < suggestions.length && $("#suggest_" + currIdx).css("background-color", "#dcdcdc").css("padding", "10px").css("border-radius", "5px"));
        if ("ا" == val[0]) {
            for (val2 = "آ", i = 1; i < val.length; i++) val2 += val[i];
            $.ajax({
                type: "post",
                url: searchDir,
                data: {kindPlaceId: "{{$kindPlaceId}}", key: val, key2: val2},
                success: function (e) {
                    if (e = JSON.parse(e), newElement = "", 0 == e.length) $("#placeId").val(""), newElement = "موردی یافت نشد"; else {
                        for (suggestions = e, currIdx = -1, i = 0; i < e.length; i++) "state" == e[i].mode ? newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + e[i].url + '", "استان ' + e[i].targetName + "\")'>استان " + e[i].targetName + "</p>" : "city" == e[i].mode ? newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + e[i].url + '", "شهر ' + e[i].targetName + " در " + e[i].stateName + "\")'>شهر " + e[i].targetName + " در " + e[i].stateName + " </p>" : newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + e[i].url + '", "' + e[i].targetName + "\")'>" + e[i].targetName + " در " + e[i].cityName + " در " + e[i].stateName + "</p>";
                        $("#result").empty().append(newElement)
                    }
                }
            })
        } else $.ajax({
            type: "post",
            url: searchDir,
            data: {kindPlaceId: "{{$kindPlaceId}}", key: val},
            success: function (e) {
                if (e = JSON.parse(e), newElement = "", 0 == e.length) $("#placeId").val(""), newElement = "موردی یافت نشد"; else {
                    for (suggestions = e, currIdx = -1, i = 0; i < e.length; i++) "state" == e[i].mode ? newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + e[i].url + '", "استان ' + e[i].targetName + "\")'>استان " + e[i].targetName + "</p>" : "city" == e[i].mode ? newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + e[i].url + '", "شهر ' + e[i].targetName + " در " + e[i].stateName + "\")'>شهر " + e[i].targetName + " در " + e[i].stateName + " </p>" : newElement += "<p style='cursor: pointer' class='suggest' id='suggest_" + i + "' onclick='setInput(\"" + e[i].url + '", "' + e[i].targetName + "\")'>" + e[i].targetName + " در " + e[i].cityName + " در " + e[i].stateName + "</p>";
                    $("#result").empty().append(newElement)
                }
            }
        })
    }
}

function setInput(e, t) {
    $("#placeName").val(t), $("#placeId").val(e), $("#result").empty(), redirect()
}

function hideElement(e) {
    $(".dark").hide(), $("#" + e).addClass("hidden")
}

function showElement(e) {
    $("#" + e).removeClass("hidden"), $(".dark").show()
}

function getCities() {
    var e = $("#states2").val(), t = $("#states2 option:selected").attr("data-val");
    $.ajax({
        type: "post", url: "{{route('getCitiesDir')}}", data: {stateId: e}, success: function (e) {
            for (e = JSON.parse(e), newElement = "<option value='{{route('home') . '/majaraList/'}}" + t + "/state'> استان " + t + "</option>", i = 0; i < e.length; i++) newElement += "<option value='{{route('home') . '/majaraList/'}}" + e[i].name + "/city'>شهر " + e[i].name + "</option>";
            $("#cities").empty().append(newElement)
        }
    })
}

function showBookMarks(e) {
    $("#" + e).empty(), $.ajax({
        type: "post", url: getBookMarksPath, success: function (t) {
            for (t = JSON.parse(t), i = 0; i < t.length; i++) element = "<div>", element += "<a class='masthead-recent-card' target='_self' href='" + t[i].placeRedirect + "'>", element += "<div class='media-left'>", element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>", element += "</div>", element += "<div class='content-right'>", element += "<div class='poi-title'>" + t[i].placeName + "</div>", element += "<div class='rating'>", element += "<div class='ui_bubble_rating bubble_45'></div><br/>" + t[i].placeReviews + " مشاهده ", element += "</div>", element += "<div class='geo'>" + t[i].placeCity + "</div>", element += "</div>", element += "</a></div>", $("#" + e).append(element)
        }
    })
}

function getRecentlyViews(e) {
    $("#" + e).empty(), $.ajax({
        type: "post", url: getRecentlyPath, success: function (t) {
            for (t = JSON.parse(t), i = 0; i < t.length; i++) element = "<div>", element += "<a class='masthead-recent-card' style='text-align: right !important;' target='_self' href='" + t[i].placeRedirect + "'>", element += "<div class='media-left' style='padding: 0 12px !important; margin: 0 !important;'>", element += "<div class='thumbnail' style='background-image: url(" + t[i].placePic + ");'></div>", element += "</div>", element += "<div class='content-right'>", element += "<div class='poi-title'>" + t[i].placeName + "</div>", element += "<div class='rating'>", 5 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_50'></div>" : 4 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_40'></div>" : 3 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_30'></div>" : 2 == t[i].placeRate ? element += "<div class='ui_bubble_rating bubble_20'></div>" : element += "<div class='ui_bubble_rating bubble_10'></div>", element += "<br/>" + t[i].placeReviews + " نقد ", element += "</div>", element += "<div class='geo'>" + t[i].placeCity + "/ " + t[i].placeState + "</div>", element += "</div>", element += "</a></div>", $("#" + e).append(element)
        }
    })
}

$(document).ready(function () {
    $("#Settings").on({
        mouseenter: function () {
            $(".settingsDropDown").show()
        }, mouseleave: function () {
            $(".settingsDropDown").hide()
        }
    });
}),

$(".global-nav-actions").on("click", function (e) {
    e.stopPropagation()
});