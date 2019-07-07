<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::get('/', 'HomeController@index')->name('frontend.home.index')->middleware('auth');
Route::get('/achar-vaga', 'VacancyController@index')->name('frontend.vacancy.index')->middleware('auth');

Route::group(['prefix' => 'administrativo', 'middleware' => ['auth']], function () {
    Route::get('/', 'Backend\HomeController@index')->name('backend.home.index');

    Route::group(['prefix' => 'carros', 'middleware' => 'auth'], function () {
        Route::get('/', 'Backend\CarController@index')->name('backend.cars.index');
        Route::get('/novo', 'Backend\CarController@create')->name('backend.cars.create');
        Route::post('/novo', 'Backend\CarController@store')->name('backend.cars.store');
        Route::get('/{id}/editar', 'Backend\CarController@edit')->name('backend.cars.edit');
        Route::put('/{id}/editar', 'Backend\CarController@update')->name('backend.cars.update');
        Route::delete('/{id}/deletar', 'Backend\CarController@destroy')->name('backend.cars.destroy');
    });

    Route::group(['prefix' => 'configuracoes', 'middleware' => 'role.admin'], function () {
        Route::get('/', 'Backend\ConfigurationController@index')->name('backend.configurations.index');
        Route::get('/{id}/editar', 'Backend\ConfigurationController@edit')->name('backend.configurations.edit');
        Route::put('/{id}/editar', 'Backend\ConfigurationController@update')->name('backend.configurations.update');
    });

    Route::group(['prefix' => 'controle-de-acesso', 'middleware' => 'role.admin'], function () {
        Route::get('/', 'Backend\AccessControlController@index')->name('backend.accesses.index');
    });

    Route::group(['prefix' => 'usuarios', 'middleware' => 'role.admin'], function () {
        Route::get('/', 'Backend\UserController@index')->name('backend.users.index');
        Route::get('/novo', 'Backend\UserController@create')->name('backend.users.create');
        Route::post('/novo', 'Backend\UserController@store')->name('backend.users.store');
        Route::get('/{id}/editar', 'Backend\UserController@edit')->name('backend.users.edit');
        Route::put('/{id}/editar', 'Backend\UserController@update')->name('backend.users.update');
        Route::delete('/{id}/deletar', 'Backend\UserController@destroy')->name('backend.users.destroy');
        Route::post('/alterar-senha', 'Backend\UserController@changePassword')->name('backend.users.change-password');
    });

    Route::group(['prefix' => 'vagas', 'middleware' => 'auth'], function () {
        Route::get('/', 'Backend\VacancyController@index')->name('backend.vacancies.index');
        Route::get('/novo', 'Backend\VacancyController@create')->name('backend.vacancies.create');
        Route::post('/novo', 'Backend\VacancyController@store')->name('backend.vacancies.store');
        Route::get('/{id}/editar', 'Backend\VacancyController@edit')->name('backend.vacancies.edit');
        Route::put('/{id}/editar', 'Backend\VacancyController@update')->name('backend.vacancies.update');
        Route::delete('/{id}/deletar', 'Backend\VacancyController@destroy')->name('backend.vacancies.destroy');
    });

    //datatables
    Route::prefix('datatable')->group(function () {
        Route::get('/accesses', 'Backend\AccessControlController@getAccessesToDataTable')
            ->name('backend.datatables.accesses')
            ->middleware('role.admin')
        ;
        Route::get('/cars', 'Backend\CarController@getCarsToDataTable')
            ->name('backend.datatables.cars')
            ->middleware('auth')
        ;
        Route::get('/users', 'Backend\UserController@getUsersToDataTable')
            ->name('backend.datatables.users')
            ->middleware('role.admin')
        ;
        Route::get('/vacancies', 'Backend\VacancyController@getVacanciesToDataTable')
            ->name('backend.datatables.vacancies')
            ->middleware('auth')
        ;
    });
});

Route::get('403', ['as' => '403', 'uses' => 'ErrorHandlerController@errorCode403']);

Route::get('404', ['as' => '404', 'uses' => 'ErrorHandlerController@errorCode404']);

Route::get('419', ['as' => '419', 'uses' => 'ErrorHandlerController@errorCode419']);

Route::get('500', ['as' => '500', 'uses' => 'ErrorHandlerController@errorCode500']);