<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['BusinessShareData'])->group( function (){
    Route::get('/business', 'MainBusinessController@showBusiness')->name('business.show');
});

