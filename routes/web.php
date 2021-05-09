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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Frontend\Account\LoginController@login')->name('login');

Route::get('login', 'Frontend\Account\LoginController@login')->name('login');
Route::get('logout', 'Frontend\Account\LoginController@logout')->name('logout');
Route::post('login-request', 'Frontend\Account\LoginController@loginRequest')->name('login-request');

Route::get('profile-form', 'Frontend\Account\UserProfileController@profileForm')->name('profile-form');
Route::get('finansial-setoran', 'Frontend\Account\UserFinancialController@inputForm')->name('finansial-setoran');
Route::get('finansial-pengambilan', 'Frontend\Account\UserFinancialController@outputForm')->name('finansial-pengambilan');
Route::resource('avatar', 'AvatarController');

Route::get('panel/login', function(){
    return redirect('/login');
});


