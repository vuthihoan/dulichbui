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
	return redirect('/home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register', 'Auth\RegisterController@create')->name('register');


Route::get('/alltrip','AllTripController@listAllTrip')->name('alltrip');

Route::get('/profile','UserpageController@getProfile')->name('profile');

Route::get('/create_new_trip','TripController@showFormCreateTrip')->name('form_create_trip');
Route::post('/create_new_trip','TripController@CreateTrip')->name('create_new_trip');

Route::get('/trip_home/plan/{trip_id}', 'TripPageController@showPage')->name('show_trip_plan');
Route::get('/trip_home/plan/{trip_id}/edit', 'TripPageController@editPlan')->name('edit_trip_plan');
Route::get('/list_join','UserpageController@listTripJoin')->name('list_join');
Route::get('/list_follow', 'UserpageController@listTripFolow')->name('list_follow');
Route::get('/list_my_create', 'UserpageController@listTripCreate')->name('list_my_create');



Route::get('comment','CommentController@get_comment')->name('get.comment');
Route::post('/comment/{id}','CommentController@post_comment')->name('post.comment');
Route::get('rep_comment','CommentController@get_rep_comment')->name('get.rep.comment');
Route::post('/rep_comment/{id}','CommentController@post_rep_comment')->name('post.rep.comment');


Route::get('demo', function () {
	return view('js_demo.demo');
});

Route::post('/test_json',function () {
	$comment_id = isset($_POST['s']) ? $_POST['s'] : 'xxx';
	// echo $comment_id; //tra ve object
	return json_encode($comment_id); //return json
});


Route::get('/upload', 'CommentController@uploadForm');
Route::post('/upload', 'CommentController@storeFiles');


Route::get('uploadfile', function(){
	return View::make('demo_comment');
});
// app/routes.php
Route::post('handle-form', function()
{
 $name = Input::file('book')->getClientOriginalName();
 Input::file('book')->move('/storage/directory', $name);
 return 'File was moved.';
});