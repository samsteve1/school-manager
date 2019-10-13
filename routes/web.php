<?php

/**
 * Admin Routes
 */
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {

    // Class management
    Route::group(['prefix' => '/class'], function () {
        Route::get('/create', 'ClassController@create')->name('class.create');
        Route::get('/', 'ClassController@index')->name('class.index');
        Route::get('/teacher', 'ClassController@teacher')->name('class.teacher');
        Route::get('/{class}', 'ClassController@show')->name('class.show');
        Route::post('/create', 'ClassController@store')->name('class.store');
        Route::post('/{course}/teacher', 'ClassController@assignTeacher')->name('class.teacher.assign');
    });

    //  Session Management
    Route::group(['prefix' => '/session'], function () {
        Route::get('/create', 'SessionController@create')->name('session.create');
        Route::get('/', 'SessionController@index')->name('session.index');
        Route::post('/create', 'SessionController@store')->name('session.create');
    });

    //  student Management
    Route::group(['prefix' => '/student'], function () {
        Route::get('/', 'StudentController@index')->name('student.index');
        Route::get('/{student}', 'StudentController@show')->name('student.show');
    });




    //  Semester
    Route::get('/semester/{semester}', 'SemesterController@show')->name('semester.show');
});

/**
 * Student routes
 */
Route::group(['prefix' => '/students', 'middleware' => ['auth', 'role:student'], 'as' => 'student.', 'namespace' => 'Student'], function () {
    //  Classes management
    Route::get('/classes', 'StudentController@classes')->name('classes');
    Route::get('/classes/enroll', 'StudentController@enroll')->name('classes.enroll');
    Route::post('/classes/enroll', 'StudentController@enrollStore')->name('classes.enroll.store');
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
