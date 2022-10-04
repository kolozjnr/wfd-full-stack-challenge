<?php
use App\Http\Controllers\User\UserController;
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
	return view('default');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Routes for Posts
Route::get('posts', 'PostsController@index');
Route::post('posts', 'PostsController@store');
Route::get('posts/create', 'PostsController@create');
Route::get('posts/{post}', 'PostsController@show');

//Routes for Referral
//This Routes are available to both admin and supervisor
Route::group(['middleware' => ['role:supervisor']], function(){
Route::get('referrals/upload', 'ReferralController@upload');
Route::post('referrals/upload', 'ReferralController@processUpload');
Route::get('referrals/create', 'ReferralController@create')->name('add-referral');
});
//This routes are available to all login users
Route::group(['middleware' => 'auth'], function(){
Route::get('referrals/{country?}/{city?}', 'ReferralController@index');
Route::post('referrals', 'ReferralController@store');
Route::get('show/{referral?}', 'ReferralController@show')->name('show');
Route::post('search', 'ReferralController@search')->name('Search');
Route::get('search', 'ReferralController@search')->name('Search');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
});
//Logged in Users
Route::get('my-posts', 'AuthorsController@posts')->name('my-posts');

//Admin
	Route::resource('user', 'User\UserController')->middleware(['auth', 'role:admin']);

//Routes for Authors
Route::get('authors', 'AuthorsController@index');
Route::get('authors/{author}', 'AuthorsController@show');
