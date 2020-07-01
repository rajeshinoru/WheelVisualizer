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


Route::resource('ticket', 'Resource\TicketResource');
Route::resource('user', 'Resource\UserResource');
Route::resource('wheel', 'Resource\WheelResource');
Route::resource('car', 'Resource\CarResource');
Route::resource('brands', 'Resource\TireBrandsResource');
Route::resource('wheelproduct', 'Resource\WheelProductResource');
Route::post('wheelproduct/uploadcsv', 'Resource\WheelProductResource@uploadcsv');
Route::resource('tire', 'Resource\TireResource'); 
Route::post('tire/uploadcsv', 'Resource\TireResource@uploadcsv');
Route::resource('vehicle', 'VehicleController'); 
Route::post('vehicle/uploadcsv', 'VehicleController@uploadcsv');
Route::resource('user', 'Resource\UserResource');

Route::resource('feedback', 'FeedbackController');

Route::resource('enquiry', 'EnquiryController');

Route::resource('review', 'ReviewController');

Route::resource('post', 'PostController');

Route::get('orders', 'OrderController@index');

Route::get('order/update/{order}', 'OrderController@update');

Route::resource('metakeywords', 'MetaKeywordController');
Route::post('metakeywords/uploadcsv', 'MetaKeywordController@uploadcsv');

// Routes for Tires
Route::get('/tire/{id?}/model', 'Resource\TireResource@getTiresByModel')->name('tire.model');  


// Routes for Wheel Products
Route::get('/wheelproduct/{id?}/model', 'Resource\WheelProductResource@getProductsByModel')->name('wheelproduct.model');  


// Routes for Cars Images 
Route::get('/car/images/{id}', 'Resource\CarResource@getCarImages')->name('car.images'); 
Route::post('/car/images/{id}', 'Resource\CarResource@setCarImages')->name('car.images.store');
Route::patch('/car/images/{id}', 'Resource\CarResource@updateCarImages')->name('car.images.update');
Route::delete('/car/images/{id}', 'Resource\CarResource@destroyCarImages')->name('car.images.destroy');

// Route::get('/setting', 'SettingsController@index')->name('settings.index'); 
// Route::post('/setting/store', 'SettingsController@store')->name('settings.store'); 


Route::resource('cmspage','CMSPageController'); 
Route::get('cms/{category?}','SettingsController@index'); 
Route::post('cms/{category?}', 'SettingsController@store'); 


Route::get('/exportTable/{category?}', 'HomeController@exportTable'); 


Route::resource('slider','SliderController'); 