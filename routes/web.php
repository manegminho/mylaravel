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
    return view('Main');
});


/* Route::get('/login', function () {
    return view('Login');
});
 */




/* Route::post('/regist', function () {
    return view('Action.Regist');
});
 */

//Route::GET('/regist',  'UserController@User')->name('registed');

//Route::resource('/User', 'UserController@User');
/*  Route::match(['get', 'post'],'/regist', function () {
    return view('Action.Regist');
})->name('registed'); */



/* Route::POST('/regist', function () {
    return view('LoginView.Signup');
})->name( 'regist'); */

/*
Route::get('param/{id?}/{arg?}',  'UserController@param');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
Route::get('bulletin', function () {
    return view('bulletin.bulletin');
});


Route::get('proctected', ['middleware' => 'auth', function () {
    //if절은 삭제한다ㅣ
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles', 'ArticlesController');

Route::get('create', 'ArticlesController@create');

Event::listen('article.created', function ($article) {
    var_dump('이벤트를 받았습니다. 받은 데이터는 다음과 같습니다.');
    var_dump($article->toArray());
});
/* DB::listen(function ($query) {
    var_dump($query->sql);
});
 */
