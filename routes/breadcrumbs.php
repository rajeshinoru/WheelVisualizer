<?php

// Home
Breadcrumbs::for('adminhome', function ($trail) {
    $trail->push('Home', url('/admin/home'));
});


// Home > User
Breadcrumbs::for('adminuser', function ($trail) {
    $trail->parent('adminhome');
    $trail->push('Users', url('/admin/user'));
});

// Home > Wheel
Breadcrumbs::for('adminwheel', function ($trail) {
    $trail->parent('adminhome');
    $trail->push('Wheels', url('/admin/wheel'));
});

Breadcrumbs::for('adminwheelproduct', function ($trail) {
    $trail->parent('adminhome');
    $trail->push('Wheel Products', url('/admin/wheelproduct'));
});

// Home > Tire
Breadcrumbs::for('admintire', function ($trail) {
    $trail->parent('adminhome');
    $trail->push('Tires', url('/admin/tire'));
});
// Home > Tire > Tire models
Breadcrumbs::for('admintiremodels', function ($trail,$id) {
    $trail->parent('admintire');
    $trail->push('Tire Model',url('/admin/tire/'.$id.'/model'));
});

// Home > Car
Breadcrumbs::for('admincar', function ($trail) {
    $trail->parent('adminhome');
    $trail->push('Cars', url('/admin/car'));
});

// Home > Car > Car Images
Breadcrumbs::for('admincarimages', function ($trail,$vifId) {
    $trail->parent('admincar');
    $trail->push('Cars Images',url('/admin/car/images/'.$vifId));
});

// Setting
Breadcrumbs::for('adminsetting', function ($trail) {
    $trail->push('Settings', url('/admin/setting'));
});

//Home > Brands
Breadcrumbs::for('adminbrands', function ($trail) {
    $trail->parent('adminhome');
    $trail->push('Brands', url('/admin/brands'));
});