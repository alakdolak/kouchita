var selectedPlaceId = -1;
var selectedKindPlaceId = -1;
var currPage = 1;
var currPageQuestions = 1;
var selectedTag = "";
var roundRobinPhoto;
var roundRobinPhoto2;
var defaultSlideBarPic = -1;
var idxSlideBar;
var SliderFilter;
var selectedTrips;
var currHelpNo;
var noAns = false;

function salam() {
    alert('saldsa');
}

function saveToTrip() {

    if(!hasLogin) {
        showLoginPrompt(hotelDetailsInSaveToTripMode);
        return;
    }

    selectedPlaceId = placeId;
    selectedKindPlaceId = kindPlaceId;

    $.ajax({
        type: 'post',
        url: getPlaceTrips,
        data: {
            'placeId': placeId,
            'kindPlaceId': kindPlaceId
        },
        success: function (response) {

            selectedTrips = [];
            $("#tripsForPlace").empty();
            $('.dark').show();

            response = JSON.parse(response);
            newElement = "<div class='row'>";

            for(i = 0; i < response.length; i++) {

                newElement += "<div class='col-xs-3' style='cursor: pointer' onclick='addToSelectedTrips(\"" + response[i].id + "\")'>";

                if(response[i].select == "1") {
                    newElement += "<div id='trip_" + response[i].id + "' style='width: 150px; height: 150px; border: 2px solid #4DC7BC;cursor: pointer;' onclick='' class='trip-images ui_columns is-gapless is-multiline is-mobile'>";
                    selectedTrips[selectedTrips.length] = response[i].id;
                }
                else
                    newElement += "<div id='trip_" + response[i].id + "' style='width: 150px; height: 150px; border: 2px solid #a0a0a0;cursor: pointer;' onclick='' class='trip-images ui_columns is-gapless is-multiline is-mobile'>";

                if(response[i].placeCount > 0) {
                    tmp = "url('" + response[i].pic1 + "')";
                    newElement += "<div class='trip-image ui_column is-6' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                }
                else
                    newElement += "<div class='trip-image trip-image-empty ui_column is-6' style='background-color: #cfcfcf'></div>";

                if(response[i].placeCount > 1) {
                    tmp = "url('" + response[i].pic2 + "')";
                    newElement += "<div class='trip-image ui_column is-6' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                }
                else
                    newElement += "<div class='trip-image trip-image-empty ui_column is-6' style='background-color: #cfcfcf'></div>";

                if(response[i].placeCount > 1) {
                    tmp = "url('" + response[i].pic3 + "')";
                    newElement += "<div class='trip-image ui_column is-6' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                }
                else
                    newElement += "<div class='trip-image trip-image-empty ui_column is-6' style='background-color: #cfcfcf'></div>";

                if(response[i].placeCount > 1) {
                    tmp = "url('" + response[i].pic4 + "')";
                    newElement += "<div class='trip-image ui_column is-6' style='background: " + tmp + " repeat 0 0; background-size: 100% 100%'></div>";
                }
                else
                    newElement += "<div class='trip-image trip-image-empty ui_column is-6' style='background-color: #cfcfcf'></div>";

                newElement += "</div><div class='create-trip-text' style='font-size: 1.2em;'>" + response[i].name + "</div>";
                newElement += "</div>";
            }

            newElement += "<div class='col-xs-3'>";
            newElement += "<a onclick='showPopUp()' class='single-tile is-create-trip'>";
            newElement += "<div class='tile-content' style='font-size: 20px !important; text-align: center'>";
            newElement += "<span class='ui_icon plus'></span>";
            newElement += "<div class='create-trip-text'>ایجاد سفر</div>";
            newElement += "</div></a></div>";
            newElement += "</div>";

            $("#tripsForPlace").append(newElement);
            showElement('addPlaceToTripPrompt');

        }
    });
}

function showElement(element) {
    $(".pop-up").addClass('hidden');
    $("#" + element).removeClass('hidden');
}