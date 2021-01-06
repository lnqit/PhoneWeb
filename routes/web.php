<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();
// Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::group(array('prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth','admin']),function ()
{
	Route::resource('/','AdminController');
	Route::resource('cities','CityController');
	Route::resource('brands','BrandController');
    Route::resource('categories','CategoryController');
    Route::resource('colors','ColorController');
    Route::resource('products','ProductController');
    Route::resource('tags', 'TagController');
    Route::resource('posts', 'PostController');
    Route::resource('orders', 'OrdersController');
    Route::delete('ordersDelete', 'OrdersController@destroy')->name('ordersDelete');
    Route::delete('productsDelete', 'ProductController@destroy')->name('productsDelete');
    Route::delete('postsDelete', 'PostController@destroy')->name('postsDelete');
    Route::delete('tagsDelete', 'TagController@destroy')->name('tagsDelete');
    Route::delete('colorsDelete', 'ColorController@destroy')->name('colorsDelete');
    Route::delete('categoriesDelete', 'CategoryController@destroy')->name('categoriesDelete');
    Route::delete('brandsDelete', 'BrandController@destroy')->name('brandsDelete');
    Route::delete('CityDelete', 'CityController@destroy')->name('CityDelete');
    
    Route::get('post_in_tag/{id}','PostController@postsInTag')->name('show_post_in_tag');
    //route cho ajax
    Route::post('vote','PostController@storeVote')->name('vote_comment');
    Route::get('post-search','PostController@search')->name('post-search');

	
});

Route::group(array('prefix'=>'client', 'namespace'=>'Client'),function ()
{
    Route::resource('home','HomeController');
    Route::resource('cart', 'CartController');
    Route::resource('comment','CommentController');
    Route::get('search','HomeController@search')->name('search');
    Route::get('blog','HomeController@blog')->name('blog');
    Route::get('showBlog/{id}','HomeController@showBlog')->name('showBlog');
    Route::get('indexBrand/{id}','HomeController@indexBrand')->name('indexBrand');
    Route::get('indexCategory/{id}','HomeController@indexCategory')->name('indexCategory');
    Route::get('historyOrder','HomeController@historyOrder')->name('historyOrder');

});
Route::group(array('prefix'=>'users', 'namespace'=>'Client','middleware'=>['auth','user']),function ()
{
    Route::resource('comment','CommentController');
    Route::resource('cart', 'CartController');
});
Route::get('ckeditor', 'CkeditorController@index');
Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

