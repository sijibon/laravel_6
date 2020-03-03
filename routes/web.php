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

Route::get('/','HelloController@index');

Route::get('contact/us', 'HelloController@contact')->name('contact');
Route::get('about/us','HelloController@about')->name('about');


//cetgory crud are here********
Route::get('add/cetegory','CetegoryController@addCetegory')->name('add.Cetegory');
Route::post('store/cetegory','CetegoryController@StoreCetegory')->name('store.cetegory');
Route::get('all/cetegories','CetegoryController@AllCetegories')->name('all.cetegories');
Route::get('view/cetegories/{id}', 'CetegoryController@ViewCetegories');
Route::get('delete/cetegories/{id}', 'CetegoryController@DeleteCetegories');
Route::get('edit/cetegories/{id}', 'CetegoryController@EditCetegories');
Route::post('update/cetegories/{id}', 'CetegoryController@UpdateCetegories');

//post crud are here

Route::get('write/post','PostController@writepost')->name('write.post');
Route::post('store/post','PostController@StorePost')->name('store.post');
Route::get('all/post','PostController@AllPost')->name('all.post');
Route::get('view/posts/{id}', 'PostController@ViewPost')->name('view.post');
Route::get('edit/posts/{id}', 'PostController@EditPosts');
Route::post('update/posts/{id}', 'PostController@UpdatePosts');
Route::get('delete/posts/{id}', 'PostController@DeletePosts');








