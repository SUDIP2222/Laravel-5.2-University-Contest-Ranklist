<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    // Home ---------------------------------------
    Route::get('/', ['middleware' => ['guest'], 'uses' => 'HomeController@index']);
    // pass reset ---------------------------------
    Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
    Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
    Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
    // Reg ----------------------------------------
    Route::get('/registration', ['uses' => 'AuthController@getRegistration', 'middleware' => ['guest']]);
    Route::post('/registration', ['uses' => 'AuthController@postRegistration', 'middleware' => ['guest']]);
    Route::get('register/verify/{confirmationCode}', ['as' => 'confirmation_path', 'uses' => 'AuthController@confirm']);
    //logout --------------------------------------
    Route::get('/logout', 'AuthController@getLogout');
    //login ---------------------------------------
    Route::get('/login', ['uses' => 'AuthController@getLogin', 'middleware' => ['guest']]);
    Route::post('/login', ['uses' => 'AuthController@postLogin', 'middleware' => ['guest']]);
    //test ----------------------------------------
    Route::group(['middleware' => ['auth']], function () {
        Route::get('home', 'HomeController@home');
        Route::get('user/profile', 'ProfileController@index');
        Route::get('contest/profile/{id}', 'ContestController@profile');
        Route::get('/edit-profile', 'ProfileController@edit');
        Route::patch('/edit-profile','ProfileController@update');
        Route::get('pdf', 'HomeController@pdf');
        Route::get('profilepdf/{id}', 'HomeController@profilepdf');
        Route::get('profile/addinfo', 'InformationController@create');
        Route::post('profile/addinfo', 'InformationController@store');
    });

    Route::group(['middleware' => ['auth','admin'],'prefix' => 'admin'], function () {
        //user -----------------------------------------
        Route::get('users', 'UserController@index');
        //Active ----------------------------------------
        Route::get('users/notification', 'UserController@notification');
        Route::get('users/notification/delete/{id}','UserController@deleteNotification');
        Route::get('users/notification/{id}', 'UserController@active');
        //------------------------------------------------
        Route::get('/users/{id}/edit','UserController@edit');
        Route::patch('/users/{id}','UserController@update');
        Route::get('/users/{id}','UserController@delete');

        //contest ---------------------------------------
        Route::get('contests', 'ContestController@index');
        Route::get('contests/create', 'ContestController@create');
        Route::post('contests', 'ContestController@store');
        Route::get('/contests/{id}/edit','ContestController@edit');
        Route::patch('/contests/{id}','ContestController@update');
        Route::get('/contests/{id}','ContestController@delete');

    });

