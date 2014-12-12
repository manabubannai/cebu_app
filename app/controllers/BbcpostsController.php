<?php

class BbcpostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Request::get('q');
		if ($query) {
			$posts = Bbcpost::Where('title', 'LIKE', '%'.$query.'%')
						->orderBy('created_at')
						->paginate(10);
		}else{
			$posts = Bbcpost::orderBy('created_at')->paginate(10);
		}
		return View::make('bbc.index')
				->with('posts', $posts)
				->with('query', $query);;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cats = Bbccategory::get();
		return View::make('bbc.create')
				->with('cats', $cats);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'title' => 'required',
			'content'=>'required',
			'cat_id' => 'required',
		];

		$messages = array(
			'title.required' => 'タイトルを正しく入力してください。',
			'content.required' => '本文を正しく入力してください。',
			'cat_id.required' => 'カテゴリーを選択してください。',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			$post = new Bbcpost;
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->cat_id = Input::get('cat_id');
			$post->save();
			return Redirect::back()
				->with('message', '投稿が完了しました。');
		}else{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
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
		$post = Bbcpost::find($id);
		return View::make('bbc.single')->with('post', $post);

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
