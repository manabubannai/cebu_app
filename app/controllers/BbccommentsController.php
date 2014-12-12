<?php

class BbccommentsController extends \BaseController {

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
		$rules = [
			'commenter' => 'required',
			'comment'=>'required',
		];

		$messages = array(
			'commenter.required' => 'タイトルを正しく入力してください。',
			'comment.required' => '本文を正しく入力してください。',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			$comment = new Bbccomment;
			$comment->commenter = Input::get('commenter');
			$comment->comment = Input::get('comment');
			$comment->post_id = Input::get('post_id');
			$comment->save();
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
