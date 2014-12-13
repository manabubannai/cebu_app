<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*----------------------------------------------------------*/
// トップページ
/*----------------------------------------------------------*/
Route::resource('', 'PostController@top');


/*----------------------------------------------------------*/
// クラシファイド関連
/*----------------------------------------------------------*/
// 出品者へのお問い合わせフォーム
// これはリソースコントローラーよりも先時記述する必要がある。
Route::post('posts/{id}/contact', 'PostController@contact');

// postsにアクセスしたら、PostControllerを起動する
Route::resource('posts', 'PostController');

// contactsにアクセスしたら、ContactControllerを起動する
Route::resource('contacts', 'ContactController');

// categoryにアクセスしたら、CategoryControllerを起動する
Route::resource('category', 'CategoryController');

/*----------------------------------------------------------*/
// 会員登録関連
/*----------------------------------------------------------*/
// usersにアクセスしたら、UserControllerを起動する
Route::resource('users', 'UserController');

// ログインページを表示させるルーティング
Route::get('login', array('uses' => 'HomeController@showLogin'));

// ログインページのポスト機能のルーティング
Route::post('login', array('uses' => 'HomeController@doLogin'));

// ログアウト処理のルーティング
Route::get('logout', array('uses' => 'HomeController@doLogout'));

// ログインしていないユーザーは投稿ができないようにする
Route::get('posts/create', array(
	'before' => 'auth',
	function(){
		$cats = Category::get();

		// ログイン済のユーザーは投稿ページにリダイレクト
		return View::make('posts.create')
				->with('cats', $cats);
	}
));


/*----------------------------------------------------------*/
// 掲示板関連
/*----------------------------------------------------------*/
Route::resource('bbc', 'BbcpostsController');
Route::resource('comment', 'BbccommentsController');

/*----------------------------------------------------------*/
// 学校情報
/*----------------------------------------------------------*/
Route::resource('school', 'SchoolController');

/*----------------------------------------------------------*/
// コラム
/*----------------------------------------------------------*/
Route::resource('column', 'ColumnController');

