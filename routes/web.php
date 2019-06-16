<?php
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> a945983c23d4ebee28a69908ffadec7c7645a7a2

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

<<<<<<< HEAD
Route::resource('Posts', 'PostsController');

Route::resource('Comments', 'CommentController');


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
=======



Route::get('article/{id?}', function ($id) {
    $nArticle[0] = DB::table('articles')->where('id', $id)->first();
    $nArticle[1] = DB::table('users')->where('id',  $nArticle[0]->user_id)->first();
    if (Auth::user()->email == $nArticle[1]->email) {
        $nArticle[0]->hit++;
        DB::table('articles')->where('id', $id)->update(['hit' => $nArticle[0]->hit]);
    }
    return view('articles/article')->with('Article', $nArticle[0])->with('User', $nArticle[1]);
>>>>>>> a945983c23d4ebee28a69908ffadec7c7645a7a2
});







Route::get('edit/{id?}/{content?}', function ($id, $content) {
    DB::table('articles')->where('id', $id)->update(['content' => $content]);
    return  redirect(route('articles.index'));
});
Route::get('delete/{id?}', function ($id) {
    DB::table('articles')->where('id', '=', $id)->delete();
    return redirect(route('articles.index'));
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
