<?php

use Illuminate\Support\Facades\Route;

Route::prefix('business')->middleware(['BusinessShareData', 'shareData'])->group( function (){
    Route::get('/show/{id?}', 'MainBusinessController@showBusiness')->name('business.show');

    Route::middleware(['auth'])->group(function(){
        Route::get('/create', 'LocalShopController@createLocalShopPage')->name('business.create.page');

        Route::post('/store', 'LocalShopController@storeLocalShop')->name('business.store');

        Route::post('/store/pics', 'LocalShopController@storeLocalShopPics')->name('business.store.pics');

        Route::delete('/store/delete', 'LocalShopController@deleteLocalShopPics')->name('business.store.delete');
    });
});

