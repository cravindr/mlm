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

Route::get('/', 'UserController@index');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');
Route::get('forgotpassword', 'UserController@forgotPassword');
Route::post('forgotcheck', 'UserController@forgotcheck');
Route::post('resetcodecheck', 'UserController@resetCodeCheck');
Route::get('forgotverify', 'UserController@forgotVerify');
Route::get('forgotverifycheck', 'UserController@forgotVerifycheck');
Route::post('newpassupdate', 'UserController@ResetPasswordUpdate');

// Authendicated Route
Route::group(['middleware' => ['guest']], function () {
    Route::get('dashboard', 'DashboardController@index');

    Route::prefix('dashboard')->group(function () {
        //Tiles
        Route::post('gettiles', 'TilesController@GetTiles');
        Route::post('usersrecords', 'TilesController@UserWiseQuote');

        //Quote
        Route::get('purchaseorder', 'DashboardController@purchaseorder');
        Route::get('quote/print/{id}', 'DashboardController@QuotePrint');
        Route::post('quote/view', 'DashboardController@QuoteView');
        Route::get('quoteserverside', 'DashboardController@QuoteServerSide');

        //Purchase Order
        Route::get('quote', 'DashboardController@quote');
        Route::get('purchaseorderserverside', 'DashboardController@PurchaseOrderServerSide');

        //Profile
        Route::get('profile', 'DashboardController@EditProfile');
        Route::post('profileupdate', 'DashboardController@Update');
        Route::get('passwordchange', 'DashboardController@passwordchange');
        Route::post('passwordupdate', 'DashboardController@updatepassword');

        //Users
        Route::get('users', 'UserController@Users');
        Route::post('users/store', 'UserController@Store');
        Route::post('users/useredit', 'UserController@UserEdit');
        Route::post('users/update', 'UserController@Update');
        Route::post('users/delete', 'UserController@UserDelete');
        Route::get('userserverside', 'UserController@UsersServerSide');
    });
});
