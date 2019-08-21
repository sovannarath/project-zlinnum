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
Route::GET('test',function (){
    return view('test');
});

Route::GET('404',function (){
    return view('404');
})->name('404');

Route::GET('/', function () {
    return view('welcome');
});
Route::POST('test-image','projectController@post_image')->name('test-image');
Route::prefix('admin')->group(function (){
    Route::GET('/','DashboardController@index')->name('dashboard');
    Route::GET('/user/{page?}','UserController@listUser')->name('all-user');
    Route::POST('search-user/','UserController@search')->name('user-search');

    Route::GET('/add-project','projectController@add_project')->name('add-project');
    Route::POST('/add-project','projectController@store_project')->name('store-project');
    Route::POST('/update-project','projectController@update_project')->name('update-project');
    Route::GET('/project-listing','projectController@project_listing')->name('show-project');
    Route::get('/project-detail/{id}','projectController@detail')->name('project-detail');


    Route::get('/property-detail/{id}','PropertyController@detail')->name('property-detail');
    Route::POST('/add-property','PropertyController@store_property')->name('store-property');
    Route::POST('/delete-property/{id?}','PropertyController@delete')->name('delete-property');

    Route::POST('add-image','projectController@post_image')->name('add-image');
    Route::POST('update-image','projectController@update_image')->name('update-image');
    Route::POST('add-image-property','PropertyController@post_image')->name('add-image-property');

    Route::Get('/show-city','general@city')->name('get-city');
    Route::GET('/property-listing','PropertyController@index')->name('show-property');
    Route::GET('/new-event', function () {
        return view('template.new-event');
    })->name('new-event');
    Route::GET('/event-listing', function () {
        return view('template.event-listing');
    })->name('show-event');
    Route::GET('/new-banner', function () {
        return view('template.new-banner');
    })->name('new-banner');
    Route::GET('/list-banner', function () {
        return view('template.list-banner');
    })->name('list-banner');
    Route::GET('profile','UserController@showProfile')->name('view-profile');
    Route::post('change-status-project','projectController@change_status')->name('change-status-project');
    Route::PUT('change-profile','UserController@change_profile')->name('change-profile');
    /*Route::POST('change-profile-image','UserController@change_profile_image')->name('change-profile-image');*/

});



/*Auth::routes();*/
Route::get('/user-login','MasterLoginController@login')->name('show-login');
Route::POST('/user-login','MasterLoginController@loginPost')->name('login.post');
Route::get('user-logout','MasterLoginController@logout')->name('logout');
Route::POST('user/upload-image','UserController@change_image')->name('upload-profile-image');

/*Route::post('auth-login','auth_test@login')->name('check-login');*/
