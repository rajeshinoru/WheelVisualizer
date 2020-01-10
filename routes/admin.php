<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    // dd($users);

    return view('admin.home');
})->name('home');



Route::get('/', function () {
    return view('admin.home');
})->name('home');


Route::resource('user', 'Resource\UserResource');


Route::get('/setting', 'SettingsController@index')->name('settings.index'); 
Route::post('/setting/store', 'SettingsController@store')->name('settings.store'); 