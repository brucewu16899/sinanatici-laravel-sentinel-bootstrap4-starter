<?php

//use App\User;
//
//Route::get('/m',function() {
//    $user = User::whereEmail('sinan.atc@gmail.com')->first();
//    return new App\Mail\ForgotPasswordMail($user, 'asdasdasd');
//});

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['visitors']], function () {
    Route::get('/kayit-ol', 'RegistrationController@register')->name('register');
    Route::post('/kayit-ol', 'RegistrationController@postRegister')->name('register');
    Route::get('/giris-yap', 'LoginController@login')->name('login');
    Route::post('/giris-yap', 'LoginController@postLogin')->name('login');
    Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword')->name('forgotPassword');
    Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword')->name('forgotPassword');
    Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword')->name('resetPassword');
    Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword')->name('resetPassword');
    Route::get('/activation/{email}/{activationCode}', 'ActivationController@activate')->name('activateUser');
});

Route::group(['middleware' => ['auth']], function () {
    
    
});

Route::post('/get-cities', 'LocationController@getCities')->name('getCities');
Route::post('/logout', 'LogoutController@logout')->name('logout');
Route::get('/admin', 'AdminsController@index')->name('adminDashboard')->middleware('admins');


Route::get('/images/{filename}', function ($filename)
{
    $path = storage_path() . '/app/images/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('images');