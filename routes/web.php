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
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');



Route::group(['middleware' => 'web'], function () {


    Route::get('/profiles/users','MyaccountController@usersfollow');
    Route::post('/profiles/toggle','MyaccountController@toggle');

    //Logout User
    Route::get('user/logout', 'Auth\LoginController@UserLogout')->name('user.logout');


    //Comments
    Route::resource('comments', 'CommentsController');

});







Route::group(['namespace' => 'Admin','prefix'=>'admin'],function (){

    //Administrators Route
    Route::resource('/administrators','AdministratorsController');
    Route::delete('delete-multiple-administrator', ['as'=>'administrator.multiple-delete','uses'=>'AdministratorsController@deleteMultiple']);

    //Roles Route
    Route::resource('roles','RolesController');
    Route::delete('delete-multiple-role', ['as'=>'role.multiple-delete','uses'=>'RolesController@deleteMultiple']);

    //Permissions Route
    Route::resource('/permissions','PermissionsController');
    Route::delete('delete-multiple-permission', ['as'=>'permission.multiple-delete','uses'=>'PermissionsController@deleteMultiple']);



    //Users Route
    Route::resource('/user','UsersregisterController');

    Route::get('/', 'DashboardController@index')->name('admin');
    //Links Route
    Route::resource('/link','LinkController');



    Route::group(['namespace' => 'Events'], function (){

        //Event Routes
        Route::resource('/event','EventsController');
    });
    Route::group(['namespace' => 'Info'], function (){
        //Conditions Routes
        Route::resource('/conditions','ConditionController');
        Route::get('/unactive_condition/{id}','ConditionController@unactive_condition')->name('unactive_condition');
        Route::get('/active_condition/{id}','ConditionController@active_condition')->name('active_condition');
    });
    Route::group(['namespace' => 'Articles'], function (){
        //Conditions Routes
        Route::resource('/articles','ArticlesController');
    });


    Route::group(['namespace' => 'Partials'], function (){
        //Color Route
        Route::resource('color','ColorController');
        Route::get('/unactive_color/{id}','ColorController@unactive_color')->name('unactive_color');
        Route::get('/active_color/{id}','ColorController@active_color')->name('active_color');
        //Contact Route
        Route::get('/all-contact','ContactController@AllContact')->name('contact');
        Route::post('/delete-contact-message/{id}','ContactController@delete_contact')->name('delete.contact');
        Route::delete('delete-multiple-message-contact', ['as'=>'contact.multiple-delete','uses'=>'ContactController@deleteMultiple']);
    });

    //Abouts Route
    Route::resource('/about','AboutController');
    Route::get('/unactive_about/{id}','AboutController@unactive_about')->name('unactive_about');
    Route::get('/active_about/{id}','AboutController@active_about')->name('active_about');
    Route::delete('delete-multiple-about', ['as'=>'about.multiple-delete','uses'=>'AboutController@deleteMultiple']);
    //Presentation Routes
    Route::resource('/presentation','PresentationController');
    //Route::get('/presentation','PresentationController@all_presentation')->name('presentation.index');
    Route::get('/unactive_presentation/{id}','PresentationController@unactive_presentation')->name('unactive_presentation');
    Route::get('/active_presentation/{id}','PresentationController@active_presentation')->name('active_presentation');

    //Testimonials Route
    Route::resource('/testimonial','TestimonialController');
    Route::get('/unactive_testimonial/{id}','TestimonialController@unactive_testimonial')->name('unactive_testimonial');
    Route::get('/active_testimonial/{id}','TestimonialController@active_testimonial')->name('active_testimonial');
    Route::delete('delete-multiple-testimonial', ['as'=>'testimonial.multiple-delete','uses'=>'TestimonialController@deleteMultiple']);

    //Tags Route
    Route::resource('/tag','TagController');
    //Categories Routes
    Route::resource('/category','CategoryController');
    //Profiles Routes
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

    //Presentation Route
    Route::get('presentation/{presentation}', 'PresentationController@presentation')->name('presentation');



    Route::get('testimonial','TestimonialController@index')->name('testimonial');
    Route::get('about','AboutController@index')->name('about');


    //Events Route
    Route::get('topic/events','EventsController@index')->name('events');
    Route::get('topic/events/{event}', 'EventsController@event')->name('topic.events');
    Route::get('topics/{category}', 'EventsController@category')->name('topic.category');
    Route::get('topics/tag/{tag}', 'EventsController@tag')->name('topic.tag');


    //Articles Route
    Route::get('topic/articles','ArticlesController@index')->name('articles');
    Route::get('topic/articles/{article}', 'ArticlesController@article')->name('topic.articles');
    Route::get('topics/{category}', 'ArticlesController@category')->name('topic.category');
    Route::get('topics/tag/{tag}', 'ArticlesController@tag')->name('topic.tag');













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

    Route::get('/contact', 'ContactController@create')->name('contact');
    Route::post('/contact', 'ContactController@store')->name('contact.store');






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










//Events Route
Route::resource('events','EventsController');

//Articles Route
Route::resource('articles','ArticlesController');



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






