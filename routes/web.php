<?php
use Illuminate\Support\Facades\Auth;

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



Route::resource('Posts', 'PostsController');



/*
Route::get('article/{id?}', function ($id) {

    $nArticle = DB::table('articles')->where('id', $id)->first();
    $QueryUser = DB::table('users')->where('id',  $nArticle->user_id)->first();
    if (Auth::check()) {
        if (Auth::user()->email != $QueryUser->email &&  Auth::user()->name != 'root') {
            $nArticle->hit++;
            DB::table('articles')->where('id', $id)->update(['hit' => $nArticle->hit]);
        }
    } else {
        $nArticle->hit++;
        DB::table('articles')->where('id', $id)->update(['hit' => $nArticle->hit]);
    }

    $queryComment = DB::table('comments')->where('article_id', $nArticle->id)->get();
    return view('articles/article')->with('Article', $nArticle)->with('User', $QueryUser)->with('Comments', $queryComment)->with('CommentCount', 0);
});
*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('article/{id?}', 'ArticlesController@review')->where(['id' => '[0-9]+']);
    Route::get('delete/{id?}', 'ArticlesController@delete')->where(['id' => '[0-9]+']);
    Route::get('edit/{id?}/{content?}', 'ArticlesController@edit')->where(['id' => '[0-9]+', 'content=>[0-9]+']);
    Route::resource('Comments', 'CommentController');
    Route::resource('articles', 'ArticlesController');
    Route::get('create', 'ArticlesController@create');

    Route::get('CommentsEdit/{id?}/{content?}', 'CommentController@edit')->where(['id=>[0-9]+', 'content=>[0-9]+']);

    Route::get(
        'Comments/delete/{comment_id?}',
        'CommentController@delete'
    )->where(['comment_id=>[0-9]+']);
});


Route::get('articles/error', function () {
    return view('errors.loginError');
});




Event::listen('article.created', function ($article) {
    var_dump('이벤트를 받았습니다. 받은 데이터는 다음과 같습니다.');
    var_dump($article->toArray());
});
/* DB::listen(function ($query) {
    var_dump($query->sql);
});
 */
