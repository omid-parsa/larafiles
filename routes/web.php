<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'Frontend\HomeController@index')->name('home');


Route::group (['namespace'=>'Frontend'], function (){
    // users auth
    Route::get('login', 'userController@login')->name('frontend.login');
    Route::post('login', 'userController@dologin')->name('frontend.login.post');
    Route::get('register', 'userController@register')->name('frontend.register');
    Route::post('register', 'userController@doregister')->name('frontend.register.post');
    Route::get('logout', 'userController@logout')->name('user.logout');
    //user dashboard
    Route::get('dashboard','DashboardController@index')->name('frontend.dashboard');
    //subscribe
    Route::get('/plans', 'PlansController@index')->name('frontend.plans.index');
    Route::get('/subscribe/{plan_id}', 'SubscribeController@index')->name('frontend.subscribe.index');
    Route::post('/subscribe/{plan_id}', 'SubscribeController@register')->name('frontend.subscribe.register');
    //files
    Route::get('/file/{file_id}', 'FilesController@details')->name('frontend.files.details');
    Route::get('/package/{package_id}', 'PackagesController@details')->name('frontend.packages.details');
    Route::get('/file/download/{file_id}', 'FilesController@download')->name('frontend.files.download');
    Route::get('/access', 'FilesController@access')->name('frontend.files.access');
});

// to check is the user logged in and is an admin we used middleware that we created name admin
    Route::group (['prefix'=>'admin', 'namespace'=>'admin', 'middleware'=> 'admin'], function (){ // app.http/Controllers/userController call the controller in this address
    // Users
    Route::get('users', 'userController@index')->name('admin.users'); //  admin/users
    Route::get('users/create', 'userController@create')->name('admin.users.create'); //  admin/users
    Route::post('users/create', 'userController@store')->name('admin.users.store'); //  admin/users
    Route::get('users/delete/{user_id}', 'userController@delete')->name('admin.users.delete'); //  admin/users
    Route::get('users/edit/{user_id}', 'userController@edit')->name('admin.users.edit'); //  admin/users
    Route::post('users/edit/{user_id}', 'userController@update')->name('admin.users.update'); //  admin/users
    Route::get('users/packages/{user_id}', 'userController@packages')->name('admin.users.packages'); //  admin/users

    // Files
    Route::get('files', 'FilesController@index')->name('admin.files');
    Route::get('files/create', 'FilesController@create')->name('admin.files.create');
    Route::post('files/create', 'FilesController@store')->name('admin.files.store');
    Route::get('files/edit/{file_id}', 'FilesController@edit')->name('admin.files.edit');
    Route::post('files/edit/{file_id}', 'FilesController@update')->name('admin.files.update');

    //plans
    Route::get('plans', 'PlansController@index')->name('admin.plans');
    Route::get('plans/create', 'PlansController@create')->name('admin.plans.create');
    Route::post('plans/create', 'PlansController@store')->name('admin.plans.store');
    Route::get('plans/edit/{plan_id}', 'PlansController@edit')->name('admin.plans.edit');
    Route::post('plans/edit/{plan_id}', 'PlansController@update')->name('admin.plans.update');

    // Package
    Route::get('packages', 'packageController@index')->name('admin.packages'); //
    Route::get('packages/create', 'packageController@create')->name('admin.packages.create'); //
    Route::post('packages/create', 'packageController@store')->name('admin.packages.store'); //
    Route::get('packages/delete/{package_id}', 'packageController@delete')->name('admin.packages.delete'); //
    Route::get('packages/edit/{package_id}', 'packageController@edit')->name('admin.packages.edit'); //
    Route::post('packages/edit/{package_id}', 'PackageController@update')->name('admin.packages.update'); //
    Route::get('packages/select-files/{package_id}', 'packageController@selectFiles')->name('admin.packages.select-files'); //
    Route::post('packages/select-files/{package_id}', 'PackageController@selectFilesUpdate')->name('admin.packages.select-files-update'); //

    // payment
    Route::get('payments', 'PaymentController@index')->name('admin.payments'); //
//    Route::get('payments/create', 'PaymentController@create')->name('admin.payments.create'); //
//    Route::post('payments/create', 'PaymentController@store')->name('admin.payments.store'); //
    Route::get('payments/delete/{payment_id}', 'PaymentController@delete')->name('admin.payments.delete'); //
//    Route::get('payments/edit/{payment_id}', 'PaymentController@edit')->name('admin.payments.edit'); //
//    Route::post('payments/edit/{payment_id}', 'PpaymentController@update')->name('admin.payments.update'); //

    // Category
    Route::get('categories', 'CategoriesController@index')->name('admin.categories'); //
    Route::get('categories/create', 'CategoriesController@create')->name('admin.categories.create'); //
    Route::post('categories/create', 'CategoriesController@store')->name('admin.categories.store'); //
    Route::get('categories/delete/{_id}', 'CategoriesController@delete')->name('admin.categories.delete'); //
    Route::get('categories/edit/{category_id}', 'CategoriesController@edit')->name('admin.categories.edit'); //
    Route::post('categories/edit/{category_id}', 'CategoriesController@update')->name('admin.categories.update'); //


});

//