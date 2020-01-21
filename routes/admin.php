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
Route::resource('wheel', 'Resource\WheelResource');
Route::resource('car', 'Resource\CarResource');
Route::get('/car/images/{id}', 'Resource\CarResource@getCarImages')->name('car.images'); 

Route::get('/setting', 'SettingsController@index')->name('settings.index'); 
Route::post('/setting/store', 'SettingsController@store')->name('settings.store'); 