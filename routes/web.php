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

//Route::get('/', 'UserController@showMinProduct');

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/autocomplete', 'InsertProduct@index');
Route::post('/autocomplete/fetch', 'InsertProduct@fetch')->name('autocomplete.fetch');

Route::get('/index', 'Controller@index');
Route::post('/upload','Controller@upload');
Route::post('/index/search', 'InsertProduct@index')->name('index.search');




Route::get('/home', 'HomeController@index')->name('home');


Route::get('/profile','UserController@ShowDataProfile');
//Route::get('/profile/updatePro','UserController@ShowForUpdateProduct');
Route::get('/profile/updateUser','UserController@ShowForUpdateUser');


Route::get('/profile/{id}/editProduct','UserController@editProduct');
Route::post('/profile/{id}/update', 'UserController@updateProduct');
Route::get('/profile/{id}/editUser','UserController@editUser');
Route::get('/delete/{id}', 'UserController@destroyProduct' );

Route::post('/profile/{id}/updateUser', 'UserController@updateUser');


Route::get('/details', function () {
    return view('user.productDetails');
});
Route::get('/isadmin' , 'AdminController@isadmin');

Route::get('/isadmin' , 'AdminController@isadmin');

Route::group(['middleware' => 'AdminMiddleware'], function () {
    Route::get('/dashboard' , 'AdminController@showDashboard');
    Route::get('/adminadd', 'AdminController@getCatID');
    Route::post('/add' , 'AdminController@store');
    Route::get('/showFormCategory' , 'AdminController@showCatForm');
    Route::post('addCategory' , 'AdminController@insertCategory')->name('addcategory');
    Route::get('showCat','AdminController@getCatIDforshow');
    Route::get('showProductByCatId/{id}','AdminController@show');
    Route::get('/{id}/delete', 'AdminController@destroy' );
    Route::get('/showProductByCatId/{{$product->id}}/edit', 'AdminController@updateProduct' );
    Route::get('showproductforupdate', 'AdminController@showProductUpdate' );
    Route::get('/{id}/deleteUser', 'AdminController@deleteUserByAdmin' );
    Route::get('/showProductByCatId/{idd}/edit1', 'AdminController@edit1');
    Route::post('/showProductByCatId/{idd}/update', 'AdminController@updateProduct');
});

Route::post('/insertsearch','RatingController@insertsearch');
Route::get('/insertsearch', function () {
    return view('products');
});

Route::post('/dislike','RatingController@dislike');
Route::post('/like','RatingController@like');
/////////////////////////////////////
Route::get('/like', 'likedislikecontroller@index')->name('like');
Route::get('posts', 'likedislikecontroller@posts')->name('posts');
Route::post('ajaxRequest', 'likedislikecontroller@ajaxRequest')->name('ajaxRequest');
Route::get('create-chart/{type}','ChartController@makeChart');
Route::get('/mostsearched','InsertProduct@mostsearchedforpage');
Route::get('/','InsertProduct@mostsearchedforhome');
Route::get('/wishlist/{id}','WishlistController@addtowishlist');


//Route::get('/profile','UserController@ShowUserProfile');

