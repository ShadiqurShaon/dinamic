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

//Route::get('/', function () {
//
//
//    return view('home');
//});

// Auth::routes(['verify' => true]);
        Route::get('/','HomeController@index');
        Route::get('basic','HomeController@basic');
        Route::get('resource','HomeController@resource');
        Route::get('tools','HomeController@tools')->name('tools');


        Route::get('admin', 'Auth\LoginController@showLoginForm')->name('admin');
        Route::post('admin', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Admin

        Route::get('dashboard/superadmin','Dashboard\SuperadminController@index');
        Route::get('dashboard/admin','Dashboard\AdminController@index');
        Route::post('import', 'Dashboard\AdminController@import')->name('import');
        Route::get('export/{id}', 'Dashboard\AdminController@export')->name('export');
        Route::get('userManagement','Dashboard\SuperadminController@userManagement')->name('userManagement');
        Route::get('editUser/{id}','Dashboard\SuperadminController@editUser')->name('editUser');
        Route::post('updateUser','Dashboard\SuperadminController@updateUser')->name('updateUser');
        Route::get('adduser','Dashboard\SuperadminController@adduser')->name('adduser');

        Route::get('fileaddress/{id}','Dashboard\SuperadminController@fileaddress');

        //property
        Route::post('/change/favorite','HomeController@changeFavorite');
        Route::get('/property/result','HomeController@result');
        Route::get('propertyResult/{propertyId}','SearchController@propertyResult')->name('propertyResult');

        //pdf
        Route::get('printPdf/{propertyId}','PdfGenController@printPdf')->name('printPdf');

        

        Route::post('homeowner','HomeController@homeowner')->name('homeowner');

        Route::get('mortgageSetings','HomeController@mortgageSetings')->name('mortgageSetings');
        Route::post('mortgageSetings','HomeController@postSeringsMortgage')->name('mortgageSetings');


Route::get('/home', 'HomeController@index')->name('/home');
Route::post('search','SearchController@index')->name('search');
Route::get('learnMore','HomeController@learnMore');
Route::get('learnMore2','HomeController@learnMore2');
Route::get('learnMore3','HomeController@learnMore3');

Route::get('byesellresource','HomeController@byesellresource');
Route::get('longTermresource','HomeController@longTermresource');
Route::get('vacancyResource','HomeController@vacancyResource');



Route::get('get',function(){
	return view('welcome');
});


Route::get('/test',function() {

	return "i am returning";
})->middleware('role:admin','auth');
