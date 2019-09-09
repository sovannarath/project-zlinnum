<?php

use Illuminate\Support\Facades\Route;

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
Route::GET('test', function () {
    return view('test');
});

Route::GET('404', function () {
    return view('404');
})->name('404');

Route::GET('/', function () {
    return redirect(\route('dashboard'));
});
Route::get('sign-up','MasterLoginController@signup')->name('sign-up');
Route::post('sign-up','MasterLoginController@signup_post')->name('singup.post');
Route::POST('test-image', 'projectController@post_image')->name('test-image');
Route::prefix('admin')->group(function () {
    Route::GET('/', 'DashboardController@index')->name('dashboard');
    Route::GET('/user/{page?}', 'UserController@listUser')->name('all-user');
    Route::POST('search-user/', 'UserController@search')->name('user-search');
    Route::POST('change-role','UserController@change_role')->name('change-role');
    Route::POST('change-password-admin','user_request@change_password')->name('change-password-admin');
    Route::POST('change-status-user','user_request@change_status_user')->name('change-status-user');

    Route::GET('/add-project', 'projectController@add_project')->name('add-project');
    Route::POST('/add-project', 'projectController@store_project')->name('store-project');
    Route::POST('/update-project', 'projectController@update_project')->name('update-project');
    Route::GET('/project-listing', 'projectController@project_listing')->name('show-project');
    Route::get('/project-detail/{id}', 'projectController@detail')->name('project-detail');


    Route::get('/property-detail/{id}', 'PropertyController@detail')->name('property-detail');
    Route::POST('/add-property', 'PropertyController@store_property')->name('store-property');
    Route::POST('/update-property', 'PropertyController@update_property')->name('update-property');

    Route::POST('/delete-property/{id?}', 'PropertyController@delete')->name('delete-property');

    Route::POST('add-image', 'projectController@post_image')->name('add-image');
    Route::POST('update-image', 'projectController@update_image')->name('update-image');
    Route::POST('add-image-property', 'PropertyController@post_image')->name('add-image-property');
    Route::POST('update-image-property', 'PropertyController@update_image')->name('update-image-property');
    Route::POST('add-event', 'EventController@store_event')->name('store-event');

    Route::Get('/show-city', 'general@city')->name('get-city');
    Route::GET('/property-listing', 'PropertyController@index')->name('show-property');
    Route::GET('/new-event', 'EventController@add_event')->name('new-event');

    Route::GET('/event-listing', 'EventController@index')->name('show-event');
    Route::get('event-detail/{id?}','EventController@detail')->name('detail-event');
    Route::post('event-update','EventController@update')->name('update-event');
    Route::POST('/delete-event/{id?}', 'EventController@delete')->name('delete-event');
    Route::POST('/delete-banner/{id?}', 'slider@destroy')->name('delete-banner');
    Route::GET('/new-banner', function () {
        if(strtolower(\Illuminate\Support\Facades\Session::get('role'))=="user"){
            $no_permission = true;
        }else{
            $no_permission = false;
        }
        return view('template.new-banner',compact('no_permission'));

    })->name('new-banner');
    Route::post('store-banner','slider@store')->name('store-banner');
    Route::get('my-listing','MylistingController@index')->name('my-listing');
    Route::POST('search-user-project','MylistingController@search')->name('search-user-project');
    Route::GET('/list-banner','slider@index')->name('list-banner');
    Route::GET('profile', 'UserController@showProfile')->name('view-profile');
    Route::post('change-status-project', 'projectController@change_status')->name('change-status-project');
    Route::PUT('change-profile', 'UserController@change_profile')->name('change-profile');
    /*Route::POST('change-profile-image','UserController@change_profile_image')->name('change-profile-image');*/

});


/*Auth::routes();*/
Route::get('/user-login', 'MasterLoginController@login')->name('show-login');
Route::POST('/user-login', 'MasterLoginController@loginPost')->name('login.post');
Route::get('user-logout', 'MasterLoginController@logout')->name('logout');
Route::POST('user/upload-image', 'UserController@change_image')->name('upload-profile-image');

/*Route::post('auth-login','auth_test@login')->name('check-login');*/
