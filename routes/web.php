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

Route::get('send-mail', function () {
    $details = [
        'name' => $_GET['name'],
        'email' => $_GET['email'],
        'message' => $_GET['message']
    ];
    
    \Mail::to('crd@prangroup.com')->send(new \App\Mail\MyTestMail($details));
   
    return redirect('home/success');
});

Route::get('/home/success', 'Home@success');

Route::get('/', 'Home@index');
Route::get('/about', 'Home@about');
Route::post('/home/save_problem','Home@save_problem');

Route::get('/privacy', 'Home@index');
Route::get('/registration', 'Home@registration');

Auth::routes(['register' => false]);
  
Route::get('/admin', 'Admin@index')->middleware('auth');
Route::get('/settings', 'Admin@settings')->middleware('auth');
Route::post('/settings/update_settings','Admin@update_settings')->middleware('auth');

Route::get('/admin/manage_admins', 'Admin@manage_admins')->middleware('auth');
Route::get('/admin/add_admin', 'Admin@add_admin')->middleware('auth');
Route::post('/admin/save_admin','Admin@save_admin')->middleware('auth');
Route::get('/admin/edit_admin/{id}', 'Admin@edit_admin')->middleware('auth');
Route::post('/admin/update_admin','Admin@update_admin')->middleware('auth');
Route::get('/admin/delete_admin/{id}', 'Admin@delete_admin')->middleware('auth');

Route::get('/inventory/manage_categories', 'Inventory@manage_categories')->middleware('auth');
Route::get('/inventory/add_category', 'Inventory@add_category')->middleware('auth');
Route::post('/inventory/save_category', 'Inventory@save_category')->middleware('auth');
Route::get('/inventory/edit_category/{id}', 'Inventory@edit_category')->middleware('auth');
Route::post('/inventory/update_category', 'Inventory@update_category')->middleware('auth');
Route::get('/inventory/delete_category/{id}', 'Inventory@delete_category')->middleware('auth');

Route::get('/inventory/manage_products', 'Inventory@manage_products')->middleware('auth');
Route::get('/inventory/filter_products', 'Inventory@filter_products')->middleware('auth');
Route::get('/inventory/add_product', 'Inventory@add_product')->middleware('auth');
Route::post('/inventory/save_product', 'Inventory@save_product')->middleware('auth');
Route::get('/inventory/edit_product/{id}', 'Inventory@edit_product')->middleware('auth');
Route::post('/inventory/update_product', 'Inventory@update_product')->middleware('auth');
Route::get('/inventory/delete_product/{id}', 'Inventory@delete_product')->middleware('auth');

Route::get('/content', 'Content@index')->middleware('auth');
Route::get('/content/add_page', 'Content@add_page')->middleware('auth');
Route::post('/content/save_page', 'Content@save_page')->middleware('auth');
Route::get('/content/edit_page/{id}', 'Content@edit_page')->middleware('auth');
Route::post('/content/update_page', 'Content@update_page')->middleware('auth');
Route::get('/content/delete_page/{id}', 'Content@delete_page')->middleware('auth');

Route::get('/content/manage_sliders', 'Content@manage_sliders')->middleware('auth');
Route::get('/content/add_slider', 'Content@add_slider')->middleware('auth');
Route::post('/content/save_slider', 'Content@save_slider')->middleware('auth');
Route::get('/content/edit_slider/{id}', 'Content@edit_slider')->middleware('auth');
Route::get('/content/edit_slide/{id}', 'Content@edit_slide')->middleware('auth');
Route::post('/content/update_slide', 'Content@update_slide')->middleware('auth');
Route::get('/content/delete_slide/{id}', 'Content@delete_slide')->middleware('auth');
Route::get('/content/delete_slider/{id}', 'Content@delete_slider')->middleware('auth');

Route::get('/content/manage_offers', 'Content@manage_offers')->middleware('auth');
Route::get('/content/add_offer', 'Content@add_offer')->middleware('auth');
Route::post('/content/save_offer', 'Content@save_offer')->middleware('auth');
Route::get('/content/edit_offer/{id}', 'Content@edit_offer')->middleware('auth');
Route::post('/content/update_offer', 'Content@update_offer')->middleware('auth');
Route::get('/content/delete_offer/{id}', 'Content@delete_offer')->middleware('auth');

Route::get('/content/manage_image_galleries', 'Content@manage_image_galleries')->middleware('auth');
Route::get('/content/add_image_gallery', 'Content@add_image_gallery')->middleware('auth');
Route::post('/content/save_image_gallery', 'Content@save_image_gallery')->middleware('auth');
Route::get('/content/edit_album/{id}', 'Content@edit_album')->middleware('auth');
Route::get('/content/delete_image/{id}', 'Content@delete_image')->middleware('auth');
Route::get('/content/delete_album/{id}', 'Content@delete_album')->middleware('auth');

Route::get('/content/manage_video_galleries', 'Content@manage_video_galleries')->middleware('auth');
Route::get('/content/add_video_gallery', 'Content@add_video_gallery')->middleware('auth');
Route::post('/content/save_video_gallery', 'Content@save_video_gallery')->middleware('auth');
Route::get('/content/edit_video_album/{id}', 'Content@edit_video_album')->middleware('auth');
Route::get('/content/delete_video/{id}', 'Content@delete_video')->middleware('auth');
Route::get('/content/delete_video_album/{id}', 'Content@delete_video_album')->middleware('auth');

Route::get('/admin/manage_stores', 'Admin@manage_stores')->middleware('auth');
Route::get('/admin/add_store', 'Admin@add_store')->middleware('auth');
Route::post('/admin/save_store','Admin@save_store')->middleware('auth');
Route::get('/admin/edit_store/{id}', 'Admin@edit_store')->middleware('auth');
Route::post('/admin/update_store','Admin@update_store')->middleware('auth');
Route::get('/admin/delete_store/{id}', 'Admin@delete_store')->middleware('auth');


Route::get('/content/manage_problems', 'Content@manage_problems')->middleware('auth');
Route::post('/content/filter_problem','Content@filter_problem')->middleware('auth');
Route::get('/content/feature_problem_yes/{type}', 'Content@feature_problem_yes')->middleware('auth');
Route::get('/content/feature_problem_no/{type}', 'Content@feature_problem_no')->middleware('auth');
Route::get('/content/delete_problem/{id}', 'Content@delete_problem')->middleware('auth');
Route::get('/admin/manage_users', 'Admin@manage_users')->middleware('auth');
Route::get('/admin/delete_user/{id}', 'Admin@delete_user')->middleware('auth');
Route::get('/admin/manage_volunteers', 'Admin@manage_volunteers')->middleware('auth');
Route::get('/admin/delete_volunteer/{id}', 'Admin@delete_volunteer')->middleware('auth');