<?php

/**
 * Admin Routes
 */
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {

    // Class management
    Route::get('/class/create', 'ClassController@create')->name('class.create');
    Route::post('/class/create', 'ClassController@store')->name('class.store');
    Route::get('/class/teacher', 'ClassController@teacher')->name('class.teacher');
    Route::post('/class/{course}/teacher', 'ClassController@assignTeacher')->name('class.teacher.assign');

    //  Session Management
    Route::get('/session/create', 'SessionController@create')->name('session.create');
    Route::get('/session', 'SessionController@index')->name('session.index');
    Route::post('/session/create', 'SessionController@store')->name('session.create');

    //  Semester
    Route::get('/semester/{semester}', 'SemesterController@show')->name('semester.show');
});

/**
 * Account Routes
 */
Route::group(['prefix' => '/account', 'namespace' => 'Account', 'middleware' => 'auth', 'as' => 'account.'], function () {
    Route::get('/', 'AccountController@index')->name('index');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/password', 'PasswordChangeController@create')->name('password');
    Route::post('/password', 'PasswordChangeController@store')->name('password.store');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('account.index');
})->name('home')->middleware('auth');
