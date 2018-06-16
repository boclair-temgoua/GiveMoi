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

Route::get('/', function () {
    return view('site.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirmAccount');

//Logout User
Route::get('user/logout', 'Auth\LoginController@UserLogout')->name('user.logout');





Route::group(['namespace' => 'Admin','prefix'=>'admin'],function (){


    Route::get('/', 'DashboardController@index')->name('admin');
    //Links Route
    Route::resource('/link','LinkController');
    //Users Route
    Route::resource('/user','UsersregisterController');

    Route::group(['namespace' => 'Events'], function (){
        //Permissions Route
        Route::resource('/permissions','PermissionController');
        Route::resource('/roles','RoleController');
    });


    //Abouts Route
    Route::resource('/about','AboutController');
    //Presentation Routes
    Route::resource('/presentation','PresentationController');
    //Testimonials Route
    Route::resource('/testimonial','TestimonialController');
    //Event Routes
    Route::resource('/event','EventController');
    //Tags Route
    Route::resource('/tag','TagController');
    //Categories Routes
    Route::resource('/category','CategoryController');
    //Profiles Routes
    Route::resource('/administrators','Account\ProfileController');
    Route::get('/account', 'Account\AccountController@index')->name('admin.account');


    Route::group(['namespace' => 'Auth'], function (){
        // Admin Auth Routes
        Route::get('/admin-login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/admin-login', 'LoginController@login');
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
        // password reset
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::post('/password/reset', 'ResetPasswordController@reset');
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    });


});

//User

Route::group(['namespace' =>'User'],function (){


    Route::get('presentation','PresentationController@index');
    Route::get('presentation/{presentation}', 'PresentationController@presentation')->name('presentation');
    Route::get('testimonial','TestimonialController@index')->name('testimonial');
    Route::get('about','AboutController@index')->name('about');



});
// API
Route::group(['namespace' =>'Api'],function (){

    Route::resource('/newsletter','NewsletterController');
});


Route::resource('events','EventsController');
Route::group(['prefix'=>'myaccount'],function (){

    Route::get('/','MyaccountController@index');
    Route::get('home','MyaccountController@home')->name('myaccount.home');
    Route::get('profile', 'UsersController@edit')->name('myaccount.profile');
    Route::post('profile', 'UsersController@update');
    Route::post('profile', 'UsersController@destroy');





    Route::resource('posts','PostsController');




});



