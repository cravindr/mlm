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



        //coupon
        Route::get('coupon', 'CouponController@index');
        Route::get('coupon/list', 'CouponController@list');
        Route::post('coupon/save', 'CouponController@save');
        Route::get('couponserverside', 'CouponController@CouponServerSide');
        Route::post('coupon/deactivate', 'CouponController@CouponDeactivate');
        Route::post('coupon/activate', 'CouponController@CouponActivate');
        Route::post('coupon/delete', 'CouponController@CouponDelete');
        Route::post('coupon/couponedit', 'CouponController@CouponEdit');
        Route::post('coupon/updatesave', 'CouponController@UpdateSave');




    });
});


