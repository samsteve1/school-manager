<?php

/**
 * Admin Routes
 */
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {
    Route::get('/create-class', 'ClassController@create')->name('class.create');
    Route::post('/create-class', 'ClassController@store')->name('class.store');
});

/**
 * Account Routes
 */
Route::group(['prefix' => '/account', 'namespace' => 'Account', 'middleware' => 'auth', 'as' => 'account.'], function () {
    Route::get('/profile', 'ProfileController@index')->name('profile');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('account.index');
})->name('home')->middleware('auth');
