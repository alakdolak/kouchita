<?php

use Illuminate\Support\Facades\Route;

Route::get('specificPost/{id}', ['as' => 'specificPost', 'uses' => 'PostController@specificPost']);

Route::get('gardeshname', function(){
    return view('gardeshname');
});

Route::get('gardeshname2/{page?}', 'PostController@gardeshname')->name('gardeshname');

Route::get('gardeshnameInner/{postId}', ['as' => 'gardeshnameInner', 'uses' => 'PostController@gardeshnameInner']);

Route::post('likePost', ['as' => 'likePost', 'uses' => 'PostController@likePost']);

Route::post('getPostComments', ['as' => 'getPostComments', 'uses' => 'PostController@getPostComments']);

Route::post('sendPostComment', ['as' => 'sendPostComment', 'uses' => 'PostController@sendPostComment']);

Route::get('buyHotel', function(){
    session()->forget(['orderId', 'reserveRequestId', 'expiryDateTime', 'remain']);
    if(auth()->check())
        return redirect(url('hotelPas'));
    else
        return view('pishHotel');
});

Route::get('hotelPas/{mode?}', function($mode = ''){
    $now = \Carbon\Carbon::now();
    if(session('expiryDateTime') == null){
        session()->forget(['orderId', 'reserveRequestId', 'expiryDateTime', 'remain']);
    }
    else{
        $expireTime = \Carbon\Carbon::createFromTimeString(session('expiryDateTime'));
        if($expireTime <= $now) {
            session()->forget(['orderId', 'reserveRequestId', 'expiryDateTime', 'remain']);
        }
        else {
            $now = $now->timestamp;
            $expireTime = $expireTime->timestamp;
            $remain = $expireTime - $now;
            session(['remain' => $remain]);
        }
    }
    return view('hotelPas1', compact('mode'));
});

Route::post('updateSession', function (){
    session()->forget(['reserve_room']);

    $rooms = json_encode(request()->all());

    session(['reserve_room' => $rooms]);
    session(['backURL' => request('backURL')]);
    session(['hotel_name' => request('hotel_name')]);
    return;
})->name('updateSession');

Route::post('searchPlaceHotelList2', 'HotelReservationController@searchPlaceHotelList2')->name('searchPlaceHotelList2');
Route::post('/makeSessionHotel', 'HotelReservationController@makeSessionHotel')->name('makeSessionHotel');
Route::post('sendReserveRequest', 'HotelReservationController@sendReserveRequest')->name('sendReserveRequest');
Route::post('GetReserveStatus', 'HotelReservationController@GetReserveStatus')->name('GetReserveStatus');
Route::get('paymentPage', function (){
    dd('صفحه ی پرداخت');
})->name('paymentPage');
Route::get('voucherHotel', function(){
    dd('صدور واچر') ;
})->name('voucherHotel');
Route::post('getHotelPassengerInfo', 'HotelReservationController@getHotelPassengerInfo')->name('getHotelPassengerInfo');
Route::post('getAccessTokenHotel', 'HotelReservationController@getAccessTokenHotel')->name('getAccessTokenHotel');
Route::post('checkUserNameAndPassHotelReserve', 'HotelReservationController@checkUserNameAndPassHotelReserve')->name('checkUserNameAndPassHotelReserve');

Route::post('getHotelWarning', 'HotelReservationController@getHotelWarning')->name('getHotelWarning');
Route::get('AlibabaInfo', 'HotelReservationController@AlibabaInfo')->name('AlibabaInfo');
Route::post('saveAlibabaInfo', 'HotelReservationController@saveAlibabaInfo')->name('saveAlibabaInfo');

//Route::post('getCityCodeApi', 'HomeController@getCityCodeApi');
//Route::get('getHotelDetailsApi', 'HomeController@getHotelDetailsApi');



Route::group(array('middleware' => ['throttle:30']), function () {

    Route::get('fillTable', function(){

        $ch = curl_init();

        $passengers = ['authToken' => 'bb9726149db593a2b098bb223ee1f520'];

        curl_setopt($ch, CURLOPT_URL, "https://api.blitbin.com/ext/countries");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $passengers);

//	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//			'Content-Type: application/json')
//	);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = json_decode(curl_exec($ch));

        curl_close ($ch);

        foreach ($content as $key => $value) {

            if($key == "countries") {
                foreach ($value as $k2 => $v2) {
                    $tmp = new \App\models\CountryCode();
                    foreach ($v2 as $k3 => $v3) {
                        if($k3 == "name")
                            $tmp->name = $v3;
                        else if($k3 == "name_en")
                            $tmp->nameEn = $v3;
                        else if($k3 == "code")
                            $tmp->code = $v3;
                    }
                    $tmp->save();
                }

            }

        }
    });

    Route::post('checkUserNameAndPass', ['as' => 'checkUserNameAndPass', 'uses' => 'HomeController@checkUserNameAndPass']);

    Route::get('pay/{forWhat}/{additionalId}', ['as' => 'pay', 'uses' => 'PayController@doPayment']);

    Route::post('getMinPrice', ['as' => 'getMinPrice', 'uses' => 'TicketController@getMinPrice']);

    Route::post('getProvidersOfSpecificFlight', ['as' => 'getProvidersOfSpecificFlight', 'uses' => 'TicketController@getProvidersOfSpecificFlight']);

    Route::post('sendJavaRequest', ['as' => 'sendJavaRequest', 'uses' => 'TicketController@sendJavaRequest']);

    Route::post('getMyPassengers', ['as' => 'getMyPassengers', 'uses' => 'TicketController@getMyPassengers']);

    Route::post('getMyTicketInfo', ['as' => 'getMyTicketInfo', 'uses' => 'TicketController@getMyTicketInfo']);

    Route::post('searchCountryCode', ['as' => 'searchCountryCode', 'uses' => 'TicketController@searchCountryCode']);

    Route::post('sendPassengersInfo/{ticketId}', ['as' => 'sendPassengersInfo', 'uses' => 'TicketController@sendPassengersInfo']);

    Route::post('checkInnerFlightCapacity', ['as' => 'checkInnerFlightCapacity', 'uses' => 'TicketController@checkInnerFlightCapacity']);

    Route::any('heyYou', array('as' => 'heyYou', 'uses' => 'HomeController@totalSearch'));

    Route::any('searchForStates', array('as' => 'searchForStates', 'uses' => 'HomeController@searchForStates'));

    Route::get('abbas', 'HomeController@abbas');

    Route::any('hotelList2/{city}/{mode}', array('as' => 'hotelList2', 'uses' => 'HotelReservationController@showHotelList2'));

    Route::post('notifyFlight/{code}', ['as' => 'notifyFlight', 'uses' => 'TicketController@notifyFlight']);

    Route::get('preBuyInnerFlight/{ticketId}/{adult}/{child}/{infant}/{ticketId2?}', ['as' => 'preBuyInnerFlight', 'uses' => 'TicketController@preBuyInnerFlight']);

    Route::get('buyInnerFlight/{mode}/{ticketId}/{adult}/{child}/{infant}/{ticketId2?}', ['as' => 'buyInnerFlight', 'uses' => 'TicketController@buyInnerFlight']);

    Route::get('testHotel', 'HomeController@testHotel');

    Route::get('tickets', array('as' => 'tickets', 'uses' => 'TicketController@tickets'));

    Route::get('getTickets/{mode}/{src}/{dest}/{adult}/{child}/{infant}/{additional}/{sDate}/{eDate?}/{back?}/{ticketId?}', array('as' => 'getTickets', 'uses' => 'TicketController@getTickets'));

    Route::post('getInnerFlightTicket', ['as' => 'getInnerFlightTicket', 'uses' => 'TicketController@getInnerFlightTicket']);

    Route::post('getTicketWarning', ['as' => 'getTicketWarning', 'uses' => 'TicketController@getTicketWarning']);

    Route::get('new', function () {
        return view('new');
    });

    Route::post('newPlaceForMap' ,array('as' => 'newPlaceForMap' , 'uses' =>'PlaceController@newPlaceForMap'));

    Route::post('getPlacePicture' ,array('as' => 'getPlacePicture' , 'uses' =>'PlaceController@getPlacePicture'));

    Route::get('video360' , array('as' => 'video360' , 'uses' => 'PlaceController@video360'));

});

Route::group(array('middleware' => ['throttle:30', 'auth', 'adminAccess']), function () {

    Route::post('uploadExcels', 'HomeController@uploadExcels');

    Route::post('doUploadExcels', 'HomeController@doUploadExcels');

    Route::get('fillState', 'HomeController@fillState');

    Route::get('fillCity', 'HomeController@fillCity');

    Route::get('fillAirLine', 'HomeController@fillAirLine');

    Route::get('fillTrain', 'HomeController@fillTrain');

    Route::get('updateHotelsFile', 'HomeController@updateHotelsFile');

    Route::get('updateAmakensFile', 'HomeController@updateAmakensFile');

    Route::any('updateBot', 'HomeController@updateBot');

    Route::get('export/{mode}', 'HomeController@export');

    Route::get('removeDuplicate/{key}', 'HomeController@removeDuplicate');

});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth', 'adminAccess']), function (){


    Route::get('test/{c}', array('as' => 'test', 'uses' => 'TestController@start'));

    Route::post('testMethod', array('as' => 'testMethod', 'uses' => 'TestController@methodTest'));

    Route::get('addMeta', 'MetaController@selectAddMeta')->name('addMeta');

    Route::get('addMeta/kind={kind}', 'MetaController@selectAddMeta');

    Route::get('addMeta/kind={kind}/id={id}', 'MetaController@addMeta');

    Route::post('changeMeta/kind={kind}/id={id}', 'MetaController@changeMeta');

    Route::any('seeActivities', array('as' => 'activities', 'uses' => 'ActivityController@showActivities'));

    Route::any('addActivity', array('as' => 'addActivity', 'uses' => 'ActivityController@addActivity'));

    Route::post('opOnActivity', array('as' => 'opOnActivity', 'uses' => 'ActivityController@opOnActivity'));

    Route::any('descriptions',  array('as' => 'descriptions', 'uses' => 'BlockController@showDescriptions'));

    Route::any('addDescription', array('as' => 'addDescription', 'uses' => 'BlockController@addDescription'));

    Route::post('opOnDescription', array('as' => 'opOnDescription', 'uses' => 'BlockController@opOnDescription'));

    Route::any('places', array('as' => 'places', 'uses' => 'PlaceController@showPlaces'));

    Route::any('addPlace', array('as' => 'addPlace', 'uses' => 'PlaceController@addPlace'));

    Route::post('opOnPlace', array('as' => 'opOnPlace', 'uses' => 'PlaceController@opOnPlace'));

    Route::any('medals', array('as' => 'medals', 'uses' => 'MedalController@showMedals'));

    Route::any('addMedal', array('as' => 'addMedal', 'uses' => 'MedalController@addMedal'));

    Route::post('opOnMedal', array('as' => 'opOnMedal', 'uses' => 'MedalController@opOnMedal'));

    Route::any('levels', array('as' => 'levels', 'uses' => 'LevelController@showLevels'));

    Route::any('addLevel', array('as' => 'addLevel', 'uses' => 'LevelController@addLevel'));

    Route::post('opOnLevel', array('as' => 'opOnLevel', 'uses' => 'LevelController@opOnLevel'));

    Route::get('defaultPics', array('as' => 'defaultPics', 'uses' => 'DefaultPicsController@showPics'));

    Route::any('addPic', array('as' => 'addPic', 'uses' => 'DefaultPicsController@addPic'));

    Route::post('opOnPic', array('as' => 'opOnPic', 'uses' => 'DefaultPicsController@opOnPic'));

    Route::any('ageSentences', array('as' => 'ageSentences', 'uses' => 'HomeController@ageSentences'));

    Route::any('goyeshTags', array('as' => 'goyeshTags', 'uses' => 'GoyeshTagController@tags'));

    Route::any('addGoyeshTag', array('as' => 'addGoyeshTag', 'uses' => 'GoyeshTagController@addTag'));

    Route::post('opOnGoyeshTag', array('as' => 'opOnGoyeshTag', 'uses' => 'GoyeshTagController@opOnTag'));

    Route::any('tags/{mode?}', array('as' => 'tags', 'uses' => 'TagController@tags'));

    Route::any('addTag/{mode}', array('as' => 'addTag', 'uses' => 'TagController@addTag'));

    Route::post('opOnTag/{mode}', array('as' => 'opOnTag', 'uses' => 'TagController@opOnTag'));

    Route::any('picItems/{mode?}', array('as' => 'picItems', 'uses' => 'PicItemsController@picItems'));

    Route::any('addPicItem/{mode}', array('as' => 'addPicItem', 'uses' => 'PicItemsController@addPicItem'));

    Route::post('opOnPicItem/{mode}', array('as' => 'opOnPicItem', 'uses' => 'PicItemsController@opOnPicItem'));

    Route::any('opinions/{mode?}', array('as' => 'opinions', 'uses' => 'OpinionController@opinions'));

    Route::any('addOpinion/{mode}', array('as' => 'addOpinion', 'uses' => 'OpinionController@addOpinion'));

    Route::post('opOnOpinion/{mode}', array('as' => 'opOnOpinion', 'uses' => 'OpinionController@opOnOpinion'));

    Route::any('questions/{mode?}', array('as' => 'questions', 'uses' => 'QuestionController@questions'));

    Route::any('addQuestion/{mode}', array('as' => 'addQuestion', 'uses' => 'QuestionController@addQuestion'));

    Route::post('opOnQuestion/{mode}', array('as' => 'opOnQuestion', 'uses' => 'QuestionController@opOnQuestion'));

    Route::any('placeStyles/{mode?}', array('as' => 'placeStyles', 'uses' => 'PlaceStyleController@placeStyles'));

    Route::post('opOnPlaceStyle/{mode}', array('as' => 'opOnPlaceStyle', 'uses' => 'PlaceStyleController@opOnPlaceStyle'));

    Route::any('reports/{mode?}', array('as' => 'reports', 'uses' => 'ReportController@reports'));

    Route::any('addReport/{mode}', array('as' => 'addReport', 'uses' => 'ReportController@addReport'));

    Route::post('opOnReport/{mode}', array('as' => 'opOnReport', 'uses' => 'ReportController@opOnReport'));

    Route::any('specialAdvice', array('as' => 'specialAdvice', 'uses' => 'HomeController@specialAdvice'));

    Route::post('findPlace', array('as' => 'findPlace', 'uses' => 'HomeController@findPlace'));

    Route::post('submitAdvice', array('as' => 'submitAdvice', 'uses' => 'HomeController@submitAdvice'));

});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth', 'controllerAccess']), function (){

    Route::post('removeReview', array('as' => 'removeReview', 'uses' => 'ContentController@removeReview'));

});

Route::group(array('middleware' => ['throttle:3,5', 'nothing']), function () {

    Route::post('login', array('as' => 'login', 'uses' => 'HomeController@mainDoLogin'));

    Route::post('login2', array('as' => 'login2', 'uses' => 'HomeController@doLogin'));

});

Route::group(array('middleware' => ['throttle:30', 'nothing']), function () {

    Route::post('getCities', array('as' => 'getCitiesDir', 'uses' => 'AjaxController@getCitiesDir'));

    Route::post('getAdviceMain', array('as' => 'getAdviceMain', 'uses' => 'PlaceController@getAdviceMain'));

    Route::post('getHotelsMain', array('as' => 'getHotelsMain', 'uses' => 'HotelController@getHotelsMain'));

    Route::post('getAmakensMain', array('as' => 'getAmakensMain', 'uses' => 'AmakenController@getAmakensMain'));

    Route::post('getFoodsMain', array('as' => 'getFoodsMain', 'uses' => 'PlaceController@getFoodsMain'));

    Route::post('getRestaurantsMain', array('as' => 'getRestaurantsMain', 'uses' => 'RestaurantController@getRestaurantsMain'));

    Route::post('getLastRecentlyMain', array('as' => 'getLastRecentlyMain', 'uses' => 'HotelController@getLastRecentlyMain'));

    Route::post('getPlacePic', array('as' => 'getPlacePic', 'uses' => 'AjaxController@getPlacePic'));

    Route::post('proSearch', array('as' => 'proSearch', 'uses' => 'AjaxController@proSearch'));

    Route::post('searchForCity', array('as' => 'searchForCity', 'uses' => 'AjaxController@searchForCity'));

    Route::post('searchForLine', array('as' => 'searchForLine', 'uses' => 'AjaxController@searchForLine'));

    //PDF creator
    Route::get('alaki/{tripId}', array('as' => 'alaki', 'uses' => 'HomeController@alaki'));

    Route::get('printPage/{tripId}', array('as' => 'printPage', 'uses' => 'HomeController@printPage'));

    Route::get('login', 'HomeController@login');

    Route::post('checkLogin', array('as' => 'checkLogin', 'uses' => 'HomeController@checkLogin'));

    Route::post('checkEmail', array('as' => 'checkEmail', 'uses' => 'HomeController@checkEmail'));

    Route::post('checkUserName', array('as' => 'checkUserName', 'uses' => 'HomeController@checkUserName'));

    Route::post('registerAndLogin', array('as' => 'registerAndLogin', 'uses' => 'HomeController@registerAndLogin'));

    Route::post('registerAndLogin2', array('as' => 'registerAndLogin2', 'uses' => 'HomeController@registerAndLogin2'));

    Route::post('retrievePasByEmail', array('as' => 'retrievePasByEmail', 'uses' => 'HomeController@retrievePasByEmail'));

    Route::post('retrievePasByPhone', array('as' => 'retrievePasByPhone', 'uses' => 'HomeController@retrievePasByPhone'));

    Route::post('checkPhoneNum', array('as' => 'checkPhoneNum', 'uses' => 'HomeController@checkPhoneNum'));

    Route::post('checkActivationCode', array('as' => 'checkActivationCode', 'uses' => 'HomeController@checkActivationCode'));

    Route::post('resendActivationCode', array('as' => 'resendActivationCode', 'uses' => 'HomeController@resendActivationCode'));

    Route::post('resendActivationCodeForget', array('as' => 'resendActivationCodeForget', 'uses' => 'HomeController@resendActivationCodeForget'));

    Route::post('checkReCaptcha', array('as' => 'checkReCaptcha', 'uses' => 'HomeController@checkReCaptcha'));

    Route::get('loginWithGoogle', array('as' => 'loginWithGoogle', 'uses' => 'HomeController@loginWithGoogle'));

    Route::get('logout', array('as' => 'logout', 'uses' => 'HomeController@logout'));

    Route::get('soon', array('as' => 'soon', 'uses' => 'HomeController@soon'));

});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::post('getTripStyles', array('as' => 'getTripStyles', 'uses' => 'TripStyleController@getTripStyles'));

    Route::post('updateTripStyles', array('as' => 'updateTripStyles', 'uses' => 'TripStyleController@updateTripStyles'));

    Route::any('tripStyles', array('as' => 'tripStyles', 'uses' => 'TripStyleController@tripStyles'));

    Route::any('addTripStyle', array('as' => 'addTripStyle', 'uses' => 'TripStyleController@addTripStyle'));

    Route::post('opOnTripStyle', array('as' => 'opOnTripStyle', 'uses' => 'TripStyleController@opOnTripStyle'));

});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::post('sendMyInvitationCode', array('as' => 'sendMyInvitationCode', 'uses' => 'ProfileController@sendMyInvitationCode'));

    Route::get('messages', array('as' => 'msgs', 'uses' => 'MessageController@showMessages'));

    Route::get('messagesErr/{err}', array('as' => 'msgsErr', 'uses' => 'MessageController@showMessages'));

    Route::post('opOnMsgs', array('as' => 'opOnMsgs', 'uses' => 'MessageController@opOnMsgs'));

    Route::post('sendMsg/{srcName?}', array('as' => 'sendMsg', 'uses' => 'MessageController@sendMsg'));

    Route::post('sendMsgAjax', array('as' => 'sendMsgAjax', 'uses' => 'MessageController@sendMsgAjax'));

    Route::post('sendReceiveReport', array('as' => 'sendReceiveReport', 'uses' => 'MessageController@sendReceiveReport'));

    Route::post('getReports', array('as' => 'getReportsDir', 'uses' => 'AjaxController@getReports'));

    Route::post('getReports2', array('as' => 'getReports', 'uses' => 'AjaxController@getReports2'));

    Route::post('getMessage', array('as' => 'getMessage', 'uses' => 'MessageController@getMessage'));

    Route::post('getListOfMsgs', array('as' => 'getListOfMsgsDir', 'uses' => 'MessageController@getListOfMsgs'));

    Route::post('sendReport', array('as' => 'sendReport', 'uses' => 'MessageController@sendReport'));

    Route::post('blockUser', array('as' => 'block', 'uses' => 'MessageController@blockUser'));

    Route::post('blockList', array('as' => 'getBlockListDir', 'uses' => 'MessageController@blockList'));

});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::get('badge', array('as' => 'badge', 'uses' => 'BadgeController@showBadges'));
});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth', 'operatorAccess']), function () {

    Route::get('getReports', array('as' => 'getReports', 'uses' => 'ReportController@getReports'));

    Route::get('getReports/{page}', array('as' => 'getReports2', 'uses' => 'ReportController@getReports'));
});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::post('deleteAccount', array('as' => 'deleteAccount', 'uses' => 'ProfileController@deleteAccount'));

    Route::get('profile', array('as' => 'profile', 'uses' => 'ProfileController@showProfile'));

    Route::get('accountInfo', array('as' => 'accountInfo', 'uses' => 'ProfileController@accountInfo'));

    Route::get('accountInfo/{status}', array('as' => 'accountInfo2', 'uses' => 'ProfileController@accountInfo2'));

    Route::post('searchInCities', array('as' => 'searchInCities', 'uses' => 'ProfileController@searchInCities'));

    Route::post('searchForMyContacts', array('as' => 'searchForMyContacts', 'uses' => 'AjaxController@searchForMyContacts'));

    Route::get('editPhoto', array('as' => 'editPhoto', 'uses' => 'ProfileController@editPhoto'));

    Route::post('doEditPhoto', array('as' => 'doEditPhoto', 'uses' => 'ProfileController@doEditPhoto'));

    Route::post('getDefaultPics', array('as' => 'defaultPics', 'uses' => 'ProfileController@getDefaultPics'));

    Route::post('submitPhoto', array('as' => 'submitPhoto', 'uses' => 'ProfileController@submitPhoto'));

    Route::post('updateProfile1', array('as' => 'updateProfile1', 'uses' => 'ProfileController@updateProfile1'));

    Route::post('checkAuthCode', array('as' => 'checkAuthCode', 'uses' => 'ProfileController@checkAuthCode'));

    Route::post('resendAuthCode', array('as' => 'resendAuthCode', 'uses' => 'ProfileController@resendAuthCode'));

    Route::post('updateProfile2', array('as' => 'updateProfile2', 'uses' => 'ProfileController@updateProfile2'));

    Route::post('updateProfile3', array('as' => 'changePas', 'uses' => 'ProfileController@updateProfile3'));
});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::get('myTrips', array('as' => 'myTrips', 'uses' => 'MyTripsController@myTrips'));

    Route::get('tripPlaces/{tripId}/{sortMode?}', array('as' => 'tripPlaces', 'uses' => 'MyTripsController@myTripsInner'));

    Route::post('addTripPlace', array('as' => 'addTripPlace', 'uses' => 'MyTripsController@addTripPlace'));

    Route::post('addTrip', array('as' => 'addTrip', 'uses' => 'MyTripsController@addTrip'));

    Route::post('editTrip', array('as' => 'editTrip', 'uses' => 'MyTripsController@editTrip'));

    Route::post('placeTrips', array('as' => 'placeTrips', 'uses' => 'MyTripsController@placeTrips'));

    Route::post('assignPlaceToTrip', array('as' => 'assignPlaceToTrip', 'uses' => 'MyTripsController@assignPlaceToTrip'));

    Route::post('changeDateTrip', array('as' => 'changeDateTrip', 'uses' => 'MyTripsController@changeDateTrip'));

    Route::post('deleteTrip', array('as' => 'deleteTrip', 'uses' => 'MyTripsController@deleteTrip'));

    Route::post('placeInfo', array('as' => 'placeInfo', 'uses' => 'MyTripsController@placeInfo'));

    Route::post('getNotes', array('as' => 'getNotes', 'uses' => 'MyTripsController@getNotes'));

    Route::post('addNote', array('as' => 'addNote', 'uses' => 'MyTripsController@addNote'));

    Route::post('assignDateToPlace', array('as' => 'assignDateToPlace', 'uses' => 'MyTripsController@assignDateToPlace'));

    Route::post('inviteFriend', array('as' => 'inviteFriend', 'uses' => 'MyTripsController@inviteFriend'));

    Route::get('recentlyView', array('as' => 'recentlyViewTotal', 'uses' => 'MyTripsController@recentlyViewTotal'));

    Route::post('getRecentlyViewElems', array('as' => 'getRecentlyViewElems', 'uses' => 'MyTripsController@getRecentlyViewElems'));

    Route::post('getBookmarkElems', array('as' => 'getBookmarkElems', 'uses' => 'MyTripsController@getBookmarkElems'));

    Route::get('bookmark', array('as' => 'bookmark', 'uses' => 'MyTripsController@bookmark'));

    Route::get('seeTrip/{tripId}', array('as' => 'seeTrip', 'uses' => 'MyTripsController@tripHistory'));

    Route::get('acceptTrip/{tripId}', array('as' => 'acceptTrip', 'uses' => 'MyTripsController@acceptTrip'));

    Route::get('rejectInvitation/{tripId}', array('as' => 'rejectInvitation', 'uses' => 'MyTripsController@rejectInvitation'));

    Route::post('getTripMembers', array('as' => 'getTripMembers', 'uses' => 'MyTripsController@getTripMembers'));

    Route::post('deleteMember', array('as' => 'deleteMember', 'uses' => 'MyTripsController@deleteMember'));

    Route::post('getMemberAccessLevel', array('as' => 'getMemberAccessLevel', 'uses' => 'MyTripsController@getMemberAccessLevel'));

    Route::post('changeAddPlace', array('as' => 'changeAddPlace', 'uses' => 'MyTripsController@changeAddPlace'));

    Route::post('changeAddFriend', array('as' => 'changeAddFriend', 'uses' => 'MyTripsController@changeAddFriend'));

    Route::post('changePlaceDate', array('as' => 'changePlaceDate', 'uses' => 'MyTripsController@changePlaceDate'));

    Route::post('changeTripDate', array('as' => 'changeTripDate', 'uses' => 'MyTripsController@changeTripDate'));

    Route::post('deletePlace', array('as' => 'deletePlace', 'uses' => 'MyTripsController@deletePlace'));

    Route::post('addComment', array('as' => 'addComment', 'uses' => 'MyTripsController@addComment'));
});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::get('travel', array('as' => 'travel', 'uses' => 'TravelController@showTravel'));

});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::post('getPlaceKinds', array('as' => 'getPlaceKinds', 'uses' => 'AjaxController@getPlaceKinds'));

    Route::post('searchPlace', array('as' => 'searchPlace', 'uses' => 'AjaxController@searchPlace'));

});

Route::group(array('middleware' => ['throttle:30', 'nothing']), function () {

    Route::get('adab-details/{placeId}/{placeName}/{mode?}', array('as' => 'adabDetails', 'uses' => 'AdabController@showAdabDetail'));

    Route::post('getStates', array('as' => 'getStates', 'uses' => 'AjaxController@getStates'));

    Route::post('getGoyesh', array('as' => 'getGoyesh', 'uses' => 'AjaxController@getGoyesh'));

    Route::get('majara-details/{placeId}/{placeName}/{mode?}', array('as' => 'majaraDetails', 'uses' => 'MajaraController@showMajaraDetail'));

    Route::get('hotel-details/{placeId}/{placeName}/{mode?}', array('as' => 'hotelDetails', 'uses' => 'HotelController@showHotelDetail'));

    Route::post('fillMyDivWithAdv', ['as' => 'fillMyDivWithAdv', 'uses' => 'PlaceController@fillMyDivWithAdv']);

    Route::post('getSimilarsHotel', array('as' => 'getSimilarsHotel', 'uses' => 'HotelController@getSimilarsHotel'));

    Route::post('getSimilarsAmaken', array('as' => 'getSimilarsAmaken', 'uses' => 'AmakenController@getSimilarsAmaken'));

    Route::post('getSimilarsRestaurant', array('as' => 'getSimilarsRestaurant', 'uses' => 'RestaurantController@getSimilarsRestaurant'));

    Route::post('getSimilarsMajara', array('as' => 'getSimilarsMajara', 'uses' => 'MajaraController@getSimilarsMajara'));

    Route::post('getLogPhotos', array('as' => 'getLogPhotos', 'uses' => 'PlaceController@getLogPhotos'));

    Route::post('getSlider1Photo', array('as' => 'getSlider1Photo', 'uses' => 'PlaceController@getSlider1Photo'));

    Route::post('getSlider2Photo', array('as' => 'getSlider2Photo', 'uses' => 'PlaceController@getSlider2Photo'));

    Route::post('getNearby', array('as' => 'getNearby', 'uses' => 'PlaceController@getNearby'));

    Route::get('restaurant-details/{placeId}/{placeName}/{mode?}', array('as' => 'restaurantDetails', 'uses' => 'RestaurantController@showRestaurantDetail'));

    Route::get('amaken-details/{placeId}/{placeName}/{mode?}', array('as' => 'amakenDetails', 'uses' => 'AmakenController@showAmakenDetail'));

    Route::post('getQuestions', array('as' => 'getQuestions', 'uses' => 'PlaceController@getQuestions'));

    Route::post('askQuestion', array('as' => 'askQuestion', 'uses' => 'PlaceController@askQuestion'));

    Route::post('getCommentsCount', array('as' => 'getCommentsCount', 'uses' => 'PlaceController@getCommentsCount'));

    Route::post('showAllAns', array('as' => 'showAllAns', 'uses' => 'PlaceController@showAllAns'));

    Route::post('getOpinionRate', array('as' => 'getOpinionRate', 'uses' => 'PlaceController@getOpinionRate'));

    Route::post('survey', array('as' => 'survey', 'uses' => 'PlaceController@survey'));

    Route::post('getSurvey', array('as' => 'getSurvey', 'uses' => 'PlaceController@getSurvey'));

    Route::post('getComment', array('as' => 'getComment', 'uses' => 'PlaceController@getComment'));

    Route::post('filterComments', array('as' => 'filterComments', 'uses' => 'PlaceController@filterComments'));

    Route::get('seeAllAns/{questionId}/{mode?}/{logId?}', array('as' => 'seeAllAns', 'uses' => 'PlaceController@seeAllAns'));

    Route::post('showUserBriefDetail', array('as' => 'showUserBriefDetail', 'uses' => 'PlaceController@showUserBriefDetail'));

    Route::post('report', array('as' => 'report', 'uses' => 'PlaceController@report'));

    Route::get('showReview/{logId}', array('as' => 'showReview', 'uses' => 'PlaceController@showReview'));

    Route::any('amakenList/{city}/{mode}', array('as' => 'amakenList', 'uses' => 'AmakenController@showAmakenList'));

    Route::any('majaraList/{city}/{mode}', array('as' => 'majaraList', 'uses' => 'MajaraController@showMajaraList'));

    Route::post('getMajaraListElems/{city}/{mode}', array('as' => 'getMajaraListElems', 'uses' => 'MajaraController@getMajaraListElems'));

    Route::any('restaurantList/{city}/{mode}', array('as' => 'restaurantList', 'uses' => 'RestaurantController@showRestaurantList'));

    Route::any('hotelList/{city}/{mode}', array('as' => 'hotelList', 'uses' => 'HotelController@showHotelList'));

    Route::post('getHotelListElems/{city}/{mode}/{kind?}', array('as' => 'getHotelListElems', 'uses' => 'HotelReservationController@getHotelListElems'));

    Route::post('getAmakenListElems/{city}/{mode}', array('as' => 'getAmakenListElems', 'uses' => 'AmakenController@getAmakenListElems'));

    Route::post('getRestaurantListElems/{city}/{mode}', array('as' => 'getRestaurantListElems', 'uses' => 'HotelController@getRestaurantListElems'));

    Route::post('getAdabListElems/{city}/{mode}', array('as' => 'getAdabListElems', 'uses' => 'AdabController@getAdabListElems'));

    Route::any('foodList/{city}/{mode}', array('as' => 'foodList', 'uses' => 'HotelController@showFoodList'));

    Route::any('adab-list/{city}/{mode?}', array('as' => 'adabList', 'uses' => 'AdabController@adabList'));

    Route::post('getPhotos', array('as' => 'getPhotos', 'uses' => 'PlaceController@getPhotos'));

    Route::post('getPhotoFilter', array('as' => 'getPhotoFilter', 'uses' => 'PlaceController@getPhotoFilter'));
});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::post('sendAns', array('as' => 'sendAns', 'uses' => 'PlaceController@sendAns'));

    Route::post('sendAns2', array('as' => 'sendAns2', 'uses' => 'PlaceController@sendAns2'));

    Route::post('sendReport2', array('as' => 'sendReport2', 'uses' => 'PlaceController@sendReport'));

    Route::post('addPhotoToPlace/{placeId}/{kindPlaceId}', array('as' => 'addPhotoToPlace', 'uses' => 'PlaceController@addPhotoToPlace'));

    Route::post('addPhotoToComment/{placeId}/{kindPlaceId}', array('as' => 'addPhotoToComment', 'uses' => 'PlaceController@addPhotoToComment'));

    Route::get('review/{placeId}/{kindPlaceId}/{mode?}', array('as' => 'review', 'uses' => 'PlaceController@writeReview'));

    Route::post('sendComment', array('as' => 'sendComment', 'uses' => 'PlaceController@sendComment'));

    Route::post('setPlaceRate', array('as' => 'setPlaceRate', 'uses' => 'PlaceController@setPlaceRate'));
});

Route::group(array('middleware' => ['throttle:30', 'nothing']), function () {

    Route::get('/', array('as' => 'home', 'uses' => 'PlaceController@showMainPage'));

    Route::get('main', array('as' => 'main', 'uses' => 'PlaceController@showMainPage'));

    Route::get('main/{mode}', array('as' => 'mainMode', 'uses' => 'PlaceController@showMainPage'));

    Route::get('showAllPlaces/{placeId1}/{kindPlaceId1}/{placeId2?}/{kindPlaceId2?}/{placeId3?}/{kindPlaceId3?}/{placeId4?}/{kindPlaceId4?}', array('as' => 'showAllPlaces4', 'uses' => 'PlaceController@showAllPlaces'));

    Route::post('getPlaceStyles', array('as' => 'getPlaceStyles', 'uses' => 'PlaceController@getPlaceStyles'));

    Route::post('getSrcCities', array('as' => 'getSrcCities', 'uses' => 'PlaceController@getSrcCities'));

    Route::post('getTags', array('as' => 'getTags', 'uses' => 'PlaceController@getTags'));

    Route::get('policies', array('as' => 'policies', 'uses' => 'HomeController@showPolicies'));

    Route::post('searchEstelah', array('as' => 'searchEstelah', 'uses' => 'AjaxController@searchEstelah'));

    Route::get('estelahat/{goyesh}', array('as' => 'estelahat', 'uses' => 'HomeController@estelahat'));

    Route::get('otherProfile/{username}/{mode?}', array('as' => 'otherProfile', 'uses' => 'ProfileController@showOtherProfile'));

    Route::get('otherBadge/{username}', array('as' => 'otherBadge', 'uses' => 'BadgeController@showOtherBadge'));

    Route::post('getActivities', array('as' => 'ajaxRequestToGetActivities', 'uses' => 'ActivityController@getActivities'));

    Route::post('getNumsActivities', array('as' => 'ajaxRequestToGetActivitiesNum', 'uses' => 'ActivityController@getNumsActivities'));

    Route::post('getRecentlyActivities', array('as' => 'recentlyViewed', 'uses' => 'ActivityController@getRecentlyActivities'));

    Route::post('getBookMarks', array('as' => 'getBookMarks', 'uses' => 'ActivityController@getBookMarks'));
});

Route::group(array('middleware' => ['throttle:30', 'nothing', 'auth']), function () {

    Route::post('bookMark', array('as' => 'bookMark', 'uses' => 'PlaceController@bookMark'));

    Route::post('getAlerts', array('as' => 'getAlerts', 'uses' => 'HomeController@getAlerts'));

    Route::post('getAlertsNum', array('as' => 'getAlertsNum', 'uses' => 'HomeController@getAlertsCount'));

    Route::post('opOnComment', array('as' => 'opOnComment', 'uses' => 'PlaceController@opOnComment'));

    Route::post('deleteUserPicFromComment', array('as' => 'deleteUserPicFromComment', 'uses' => 'PlaceController@deleteUserPicFromComment'));
});


Route::get('emailtest', 'HomeController@emailtest');
