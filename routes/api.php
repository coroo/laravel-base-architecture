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
Route::group(['middleware' => ['auth:api', 'cors']], function () {
    Route::get('profile', 'Account\UserProfileController@show');
    Route::post('add-profile', 'Account\UserProfileController@add');
    Route::post('upload-avatar', 'Account\UserProfileController@uploadAvatar');

    Route::post('change-password', 'Auth\ChangePasswordController@changePassword');
    
    Route::get('families', 'Account\UserFamilyController@all');
    Route::get('family/{id}', 'Account\UserFamilyController@show');
    Route::post('add-family', 'Account\UserFamilyController@add');
    Route::post('update-family/{id}', 'Account\UserFamilyController@update');
    Route::get('delete-family/{id}', 'Account\UserFamilyController@delete');
    
    Route::get('educations', 'Account\UserEducationController@all');
    Route::get('education/{id}', 'Account\UserEducationController@show');
    Route::post('add-education', 'Account\UserEducationController@add');
    Route::post('update-education/{id}', 'Account\UserEducationController@update');
    Route::get('delete-education/{id}', 'Account\UserEducationController@delete');
    
    Route::get('jobs', 'Account\UserJobController@all');
    Route::get('job/{id}', 'Account\UserJobController@show');
    Route::post('add-job', 'Account\UserJobController@add');
    Route::post('update-job/{id}', 'Account\UserJobController@update');
    Route::get('delete-job/{id}', 'Account\UserJobController@delete');

    Route::get('achievements', 'Account\UserAchievementController@all');
    Route::get('achievement/{id}', 'Account\UserAchievementController@show');
    Route::post('add-achievement', 'Account\UserAchievementController@add');
    Route::post('update-achievement/{id}', 'Account\UserAchievementController@update');
    Route::get('delete-achievement/{id}', 'Account\UserAchievementController@delete');

    Route::get('syubahs', 'Master\MasterSyubahController@all');
    Route::get('syubah', 'Master\MasterSyubahController@show');
    Route::post('add-syubah', 'Master\MasterSyubahController@add');
    Route::post('update-syubah/{id}', 'Master\MasterSyubahController@update');

    Route::get('farahs', 'Master\MasterFarahController@all');
    Route::get('farah', 'Master\MasterFarahController@show');
    Route::post('add-farah', 'Master\MasterFarahController@add');
    Route::post('update-farah/{id}', 'Master\MasterFarahController@update');

    // export list
    Route::get('export-user', 'Export\ExportController@userList');

    // financial management
    Route::get('finansial', 'Account\UserFinancialController@all');
    Route::get('finansial/{id}', 'Account\UserFinancialController@show');
    Route::post('add-finansial', 'Account\UserFinancialController@add');
    Route::post('update-finansial/{id}', 'Account\UserFinancialController@update');
    Route::post('upload-bukti-transfer/{id}', 'Account\UserFinancialController@uploadBuktiTransfer');

});

Route::post('login', 'Auth\LoginController@login');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
