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

Route::prefix('v1')->group(function(){
    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('login', 'API\V1\AuthController@login');
        Route::post('signUp', 'API\V1\AuthController@signUp');
    
        Route::group([
            'middleware' => 'auth:api'
        ], function() {
            Route::get('logout', 'API\V1\AuthController@logout');
            Route::get('user', 'API\V1\AuthController@user');
            Route::group(['prefix' => 'order'], function () {
                Route::post('/', 'API\V1\OrderController@create');
                Route::put('update', 'API\V1\OrderController@update');
            });
        });
    });
    Route::get('customization', 'API\V1\CustomizationController@index');
});