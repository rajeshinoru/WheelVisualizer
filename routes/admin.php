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

// Routes for Cars Images 
Route::get('/car/images/{id}', 'Resource\CarResource@getCarImages')->name('car.images'); 
Route::post('/car/images/{id}', 'Resource\CarResource@setCarImages')->name('car.images.store');
Route::patch('/car/images/{id}', 'Resource\CarResource@updateCarImages')->name('car.images.update');
Route::delete('/car/images/{id}', 'Resource\CarResource@destroyCarImages')->name('car.images.destroy');

Route::get('/setting', 'SettingsController@index')->name('settings.index'); 
Route::post('/setting/store', 'SettingsController@store')->name('settings.store'); 