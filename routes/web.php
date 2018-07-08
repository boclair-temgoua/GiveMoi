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

        //Event Routes
        Route::resource('/event','EventsController');
    });
    Route::group(['namespace' => 'Info'], function (){

        //Conditions Routes
        Route::resource('/conditions','ConditionController');
    });


    //Color Route
    Route::resource('color','Partials\ColorController');
    //Abouts Route
    Route::resource('/about','AboutController');
    //Presentation Routes
    Route::resource('/presentation','PresentationController');
    //Testimonials Route
    Route::resource('/testimonial','TestimonialController');

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

    //Conditions utilisation Routes
    Route::get('/terms_conditions/','ConditionController@index');
    Route::get('register','PresentationController@index')->name('register');
    Route::get('presentation/{presentation}', 'PresentationController@presentation')->name('presentation');
    Route::get('testimonial','TestimonialController@index')->name('testimonial');
    Route::get('about','AboutController@index')->name('about');


    Route::get('topic/events','EventsController@index')->name('events');
    Route::get('topic/events/{event}', 'EventsController@event')->name('topic.events');
    Route::get('topics/{category}', 'EventsController@category')->name('topic.category');
    Route::get('topics/tag/{tag}', 'EventsController@tag')->name('topic.tag');




    Route::post('ajaxRequest', 'EventsController@ajaxRequest')->name('ajaxRequest');

    //Route::get('product/like/{id}', ['as' => 'product.like', 'uses' => 'LikeController@likeProduct']);
   // Route::get('event/like/{id}', ['as' => 'event.like', 'uses' => 'LikeController@likeEvent']);






    //Route::get('topic/events/tag/{tag}','BlogController@tag')->name('tag');
    //Route::get('to/category/{category}','BlogController@category')->name('category');


});
// API
Route::group(['namespace' =>'Api'],function (){

    Route::resource('/newsletter','NewsletterController');

    // Route Contact Us

    Route::get('contact', 'ContactController@create')->name('contact.create');
    Route::post('contact', 'ContactController@store')->name('contact.store');






    Route::get('invite', 'InviteController@invite')->name('invite');
    Route::post('invite', 'InviteController@process')->name('process');
    Route::get('account/add_info', 'InviteController@edit')->name('account.add_info');
    Route::post('account/add_info', 'InviteController@addinfo');
// {token} is a required parameter that will be exposed to us in the controller method
    Route::get('accept/{token}', 'InviteController@accept')->name('accept');


});


Route::post('like',[
    'uses' => 'CommentsController@postLikeComment',
    'as' => 'like'


]);










Route::group(['middleware' => 'web'], function () {


    Route::get('/profiles/users','MyaccountController@usersfollow');
    Route::post('/profiles/toggle','MyaccountController@toggle');

});

Route::resource('events','EventsController');

//Comments
Route::resource('comments', 'CommentsController');

// functionne bien
Route::get('/@{username}', [
    'as'    => '/',
    'uses'  => 'MyaccountController@viewProfile'
]);


Route::get('/@{username}/followers', [
    'as'    => '/',
    'uses'  => 'MyaccountController@viewfollowers'])->name('@{username}/followers');
Route::get('/@{username}/followings', [
    'as'    => '/',
    'uses'  => 'MyaccountController@viewfollowings'])->name('@{username}/followings');

Route::group(['prefix'=>'account'],function (){

/* *************************** Init Route **************/
    Route::get('/','MyaccountController@index');
    Route::get('home','MyaccountController@home')->name('myaccount.home');
    Route::get('profile', 'UsersController@edit')->name('myaccount.profile');
    Route::post('profile', 'UsersController@update');



/* **************************** end *********************/








    Route::resource('posts','PostsController');

});



Route::get('/site', function (){

    return view('site.test');
});




//Likes Route
Route::get('events/like/{id}', ['as' => 'events.like', 'uses' => 'LikeController@likeEvent']);






