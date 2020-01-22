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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
Auth::routes();*/
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::get('/home', 'HomeController@index')->name('home');

//---------------SOCIAL LINKER---------------------
Route::get('linker',['middleware' => 'auth','uses'=>'SocialLinkerController@create'])->name('linker');
Route::get('linker_list',['middleware' => 'auth','uses'=>'SocialLinkerController@index'])->name('linker_list');
Route::post('add_new_linker','SocialLinkerController@store')->name('add_new_linker');
Route::get('/get_linker_info/{id}','SocialLinkerController@edit')->middleware('auth');
Route::post('/update_linker_info','SocialLinkerController@update')->middleware('auth');
Route::get('/delete_linker/{id}','SocialLinkerController@destroy')->middleware('auth');

//------------------CONTACT-------------------------
Route::get('contact',['middleware' => 'auth','uses' =>'ContactController@create'])->name('contact');
Route::get('contact_list',['middleware' => 'auth','uses'=>'ContactController@index'])->name('contact_list');
Route::post('add_new_contact','ContactController@store')->name('add_new_contact');
Route::get('/get_contact_info/{id}','ContactController@edit')->middleware('auth');
Route::post('/update_contact_info','ContactController@update')->middleware('auth');
Route::get('/delete_contact/{id}','ContactController@destroy')->middleware('auth');


//----------------- ABOUT ------------------------------
Route::get('about',['middleware' => 'auth','uses'=>'AboutController@create'])->name('about');
Route::get('about_list',['middleware' => 'auth','uses'=>'AboutController@index'])->name('about_list');
Route::post('add_new_about','AboutController@store')->name('add_new_about');
Route::get('/get_about_info/{id}','AboutController@edit')->middleware('auth');
Route::post('/update_about_info','AboutController@update')->middleware('auth');
Route::get('/delete_about/{id}','AboutController@destroy')->middleware('auth');

//----------------- DESIGN ------------------------------
Route::get('design',['middleware' => 'auth','uses'=>'DesignController@create'])->name('design');
Route::get('design_list',['middleware' => 'auth','uses'=>'DesignController@index'])->name('design_list');
Route::post('add_new_design','DesignController@store')->name('add_new_design');
Route::get('/get_design_info/{id}','DesignController@edit')->middleware('auth');
Route::post('/update_design_info','DesignController@update')->middleware('auth');
Route::get('/delete_design/{id}','DesignController@destroy')->middleware('auth');

//-----------------------Category----------------------
Route::get('category',['middleware' => 'auth','uses'=>'CategoryController@create'])->name('category');
Route::get('category_list',['middleware' => 'auth','uses'=>'CategoryController@index'])->name('category_list');
Route::post('add_new_category','CategoryController@store')->name('add_new_category');
Route::get('/get_category_info/{id}','CategoryController@edit')->middleware('auth');
Route::post('/update_category_info','CategoryController@update')->middleware('auth');
Route::get('/delete_category/{id}','CategoryController@destroy')->middleware('auth');

//-----------------------Gallery----------------------
Route::get('gallery',['middleware' => 'auth','uses'=>'GalleryController@create'])->name('gallery');
Route::get('gallery_list',['middleware' => 'auth','uses'=>'GalleryController@index'])->name('gallery_list');
Route::post('add_new_gallery','GalleryController@store')->name('add_new_gallery');
Route::get('/get_gallery_info/{id}','GalleryController@edit')->middleware('auth');
Route::post('/update_gallery_info','GalleryController@update')->middleware('auth');
Route::get('/delete_gallery/{id}','GalleryController@destroy')->middleware('auth');


Route::get('delete_selected_image','GalleryController@delete_selected_image')->middleware('auth');

//Route::get('/test','GalleryController@test');
//Route::post('/projects.store_test','GalleryController@store_test')->name('projects.store_test');
Route::post('projects/media', 'GalleryController@test_crud')->name('projects.storeMedia');

//----------------- SLIDER ------------------------------
Route::get('slider',['middleware' => 'auth','uses'=>'SliderController@create'])->name('slider');
Route::get('slider_list',['middleware' => 'auth','uses'=>'SliderController@index'])->name('slider_list');
Route::post('add_new_slider','SliderController@store')->name('add_new_slider');
Route::get('/get_slider_info/{id}','SliderController@edit')->middleware('auth');
Route::post('/update_slider_info','SliderController@update')->middleware('auth');
Route::get('/delete_slider/{id}','SliderController@destroy')->middleware('auth');

//-----------------PHOTOGRAPHY SERVICE ------------------------------
Route::get('service',['middleware' => 'auth','uses'=>'ServiceController@create'])->name('service');
Route::get('service_list',['middleware' => 'auth','uses'=>'ServiceController@index'])->name('service_list');
Route::post('add_new_service','ServiceController@store')->name('add_new_service');
Route::get('/get_service_info/{id}','ServiceController@edit')->middleware('auth');
Route::post('/update_service_info','ServiceController@update')->middleware('auth');
Route::get('/delete_service/{id}','ServiceController@destroy')->middleware('auth');

Route::get('/check_validity/{id}','ServiceController@check_validity')->middleware('auth');
Route::post('/update_priority','ServiceController@update_priority')->middleware('auth');


//-----------------VIDEOGRAPHY SERVICE ------------------------------
Route::get('video_service',['middleware' => 'auth','uses'=>'VideoServiceController@create']);
Route::get('video_service_list',['middleware' => 'auth','uses'=>'VideoServiceController@index']);
Route::post('add_new_video_service','VideoServiceController@store')->middleware('auth');
Route::get('/get_video_service_info/{id}','VideoServiceController@edit')->middleware('auth');
Route::post('/update_video_service_info','VideoServiceController@update')->middleware('auth');
Route::get('/delete_video_service/{id}','VideoServiceController@destroy')->middleware('auth');

Route::get('/check_video_service_priority/{id}','VideoServiceController@check_video_service_priority')->middleware('auth');
Route::post('/update_video_service_priority','VideoServiceController@update_priority')->middleware('auth');

//----------------- BLOGS ------------------------------
Route::get('blog',['middleware' => 'auth','uses'=>'BlogController@create'])->name('blog');
Route::get('blog_list',['middleware' => 'auth','uses'=>'BlogController@index'])->name('blog_list');
Route::post('add_new_blog','BlogController@store')->name('add_new_blog');
Route::get('/get_blog_info/{id}','BlogController@edit')->middleware('auth');
Route::post('/update_blog_info','BlogController@update')->middleware('auth');
Route::get('/delete_blog/{id}','BlogController@destroy')->middleware('auth');

//----------------- PROFILE ------------------------------
Route::get('profile',['middleware' => 'auth','uses'=>'ProfileController@create'])->name('blog');
Route::get('profile_list',['middleware' => 'auth','uses'=>'ProfileController@index'])->name('blog_list');
Route::post('add_new_profile','ProfileController@store')->name('add_new_blog');
Route::get('/get_profile_info/{id}','ProfileController@edit')->middleware('auth');
Route::post('/update_profile_info','ProfileController@update')->middleware('auth');
Route::get('/delete_profile/{id}','ProfileController@destroy')->middleware('auth');

////----------------- VIDEOGRAPHY ------------------------------
Route::get('videography',['middleware' => 'auth','uses'=>'VideographyController@create'])->name('videography');
Route::get('videography_list',['middleware' => 'auth','uses'=>'VideographyController@index'])->name('videography_list');
Route::post('add_new_videography','VideographyController@store')->name('add_new_videography');
Route::get('/get_video_data/{id}','VideographyController@edit')->middleware('auth');
Route::post('/update_videography_info','VideographyController@update')->middleware('auth');
Route::get('/delete_videography/{id}','VideographyController@destroy')->middleware('auth');

//------------------------- WEB START -------------------------------
Route::group(['middleware' => ['auth']], function () {
    Route::get('/','WebController@home');
    Route::get('/get_instagram_api_value','WebController@insta_api');
    Route::get('/web_photography','WebController@photography');
    Route::get('/web_videography/{id}','WebController@videography');
    Route::get('/web_about','WebController@about');
    Route::get('/web_design','WebController@design');
    Route::get('/web_blog','WebController@blog');
    Route::get('/web_blog_details/{id}','WebController@blog_details');
    Route::get('/web_shop','WebController@shop');
    Route::get('/categorized_blog/{id}','WebController@categorized_blog');


    Route::get('/get_gallery/{id}','WebController@get_gallery');
    Route::get('/get_images/{id}','WebController@get_images');


});

