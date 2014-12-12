<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin(){
		$credentials = [
			'email'=>Input::get('email'),
			'password'=>Input::get('password')
		];

		$rules = [
			'email'=>'required',
			'password'=>'required'
		];

		$messages = array(
			'email.required' => 'メールアドレスを正しく入力してください。',
			'password.required' => 'パスワードを正しく入力してください。',
		);

		$validator = Validator::make($credentials, $rules, $messages);

		if ($validator->passes()) {
			if (Auth::attempt($credentials)) {
				return Redirect::intended('/')
					->with('success', 'ログインしました。');
			}else{
				return Redirect::back()
					->withErrors($validator)
					->withInput()
					->with('login_error', 'IDとパスワードが一致しません');
			}
		}else{
			return Redirect::back()
				->withErrors($validator)
				->withInput()
				->with('login_error', 'IDとパスワードが一致しません');
		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

}
