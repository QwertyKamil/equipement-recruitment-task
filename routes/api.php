<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function(){

    Route::post('login','Api\Auth\LoginController@login');

    Route::middleware('auth:api')->group(function() {
        Route::post('refresh','Api\Auth\LoginController@refresh');
    });
});

Route::middleware('auth:api')->group(function() {
    Route::prefix('equipment')->group(function(){
        Route::get('','Api\User\EquipmentController@getUsersEquipment');
        Route::get('available','Api\User\EquipmentController@getAvailableEquipment');
        Route::post('buy/chest/{chest}','Api\User\EquipmentController@buyChest');
        Route::post('buy/prize/{prize}','Api\User\EquipmentController@buyPrize');
        Route::post('buy/rune/{rune}','Api\User\EquipmentController@buyRune');
    });
});
