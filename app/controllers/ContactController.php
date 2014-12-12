<?php

class ContactController extends \BaseController {

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$posts = $this->post->all();

		// PostIDを取得
		// $post = Post::find($id);
		return dd($posts);

		// 投稿者のauthor_idを取得
		$author_id =  Post::where('id', '6')->first();
		return dd($author_id->author_id);

		// author_idを使ってUsreテーブルを検索する
		// author_id = Usre id のものを取得
		// emailを出力する

		$data = Input::all();
		$rules = [
			'contactName' => 'required',
			'email' => 'required|email',
			'msg' => 'required',
		];

		$messages = array(
			'contactName.required' => '名前を入力してください。',
			'email.required' => 'メールアドレスを正しく入力してください。',
			'msg.required' => 'メッセージを入力してください。',
		);

		$validator = Validator::make($data, $rules, $messages);

		if ($validator->passes()) {
			Mail::send('contact.thanks',$data, function($message) {
				$message->to('manabu.bannai@gmail.com')
						->subject('メールの件名');
				});
			return View::make('contact.thanks');
		}else{
			return Redirect::to(URL::previous())->withErrors($validator)->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
