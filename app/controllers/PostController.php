<?php

class PostController extends \BaseController {

	public function top()
	{
		$posts = Post::orderBy('created_at')->paginate(10);

		return View::make('top')
			->with('posts', $posts);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// 検索フォーム
		$catQuery = Request::get('cat');
		$query = Request::get('q');

		// DBからカテゴリー名の一覧の取得
		$categories = Category::lists('name', 'id');

		$cat_all = Category::all();

		if ($catQuery || $query) {
			$posts = Post::where('cat_id', 'LIKE', '%'.$catQuery.'%')->orWhere('title', 'LIKE', '%'.$query.'%')
						->orderBy('created_at')
						->paginate(10);
		}else{
			$posts = Post::orderBy('created_at', 'DESC')->paginate(10);
		}

		return View::make('posts.index')
			->with('posts', $posts)
			->with('catQuery', $catQuery)
			->with('query', $query)
			->with('categories', $categories)
			->with('cat_all', $cat_all);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// routesのフィルターで管理
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'title' => 'required|max:24',
			'content'=>'required',
			'cat_id' => 'required',
			'area' => 'required',
		];

		$messages = array(
			'title.required' => 'タイトルを正しく入力してください。',
			'title.max' => 'タイトルが長過ぎます。',
			'content.required' => '本文を正しく入力してください。',
			'cat_id.required' => 'カテゴリーを選択してください。',
			'area.required' => '地域を選択してください。',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			$post = new Post;
			$post->author_id = Auth::id();
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->price = Input::get('price');
			$post->cat_id = Input::get('cat_id');
			$post->area = Input::get('area');
			$post->read_more = (strlen($post->content) > 180) ? substr($post->content, 0, 180) : $post->content;

			// 以下で画像のアップロード処理を行う
			if (Input::file('image')) {
				// getClientOriginalName()：アップロードしたファイルのオリジナル名を取得します
				$fileName = Input::file('image')->getClientOriginalName();
				// getRealPath()：アップロードしたファイルのパスを取得します。
				$image = Image::make(Input::file('image')->getRealPath());
				// Auth::user()->nameのフォルダがあるかどうかを確認し、ない場合は新規作成する
				File::exists(public_path() . '/images/' . Auth::user()->name) or File::makeDirectory(public_path() . '/images/' . Auth::user()->name);
				// 画像をサーバーに保存する
				$image->save(public_path() . '/images/' . Auth::user()->name . '/' . $fileName);
				//DBにファイルパスを保存する
				$post->image = 'images/'. $fileName;
			}

			$post->save();
			return Redirect::route('posts.create')
				->with('success', '投稿が完了しました。');
		}else{
			return Redirect::route('posts.create')
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
		// 個別記事の情報を取得
		$post = Post::find($id);

		// 記事の作成者情報を取得（お問い合わせフォームのaction先指定に利用する）
		$user = User::where('id', '=', $post->author_id)->first();

		return View::make('posts.single')
			->with('post', $post)
			->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		$posts = Post::orderBy('created_at')->paginate(10);

		// アクセスしてきたユーザーがコンテンツの投稿者かどうか確認する
		if (Auth::id() == $post->author_id) {
			return View::make('posts.edit')
				->with('post', $post);
		}else{
			echo '不正なアクセスです。';
		}

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'title' => 'required',
			'content'=>'required',
			'category' => 'required',
			'area' => 'required',
		);

		$messages = array(
			'title.required' => 'タイトルを正しく入力してください。',
			'content.required' => '本文を正しく入力してください。',
			'category.required' => 'カテゴリーを選択してください。',
			'area.required' => '地域を選択してください。',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->price = Input::get('price');
			$post->category = Input::get('category');
			$post->area = Input::get('area');
			$post->save();
			return Redirect::back()->with('success', '投稿が更新されました');
		}else{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}
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

	public function contact($id)
	{
		// 個別記事の情報を取得
		$post = Post::find($id);

		// author_id = Usre id のものを取得
		$user = User::where('id', '=', $post->author_id)->first();

		$data = Input::all();
		// $data = [ 'contactName' => Input::get('contactName') ];
		// $data = [ 'contactName' => Input::get('contactName') ];
		// $data = Input::only("contactName", "email", "msg");

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

			// contact.detailは出品者送信される内容
			Mail::send('contact.detail',$data, function($message) use($user) {
				$message->to($user->email) // 記事の作成者に連絡
						->bcc('manabu.bannai@gmail.com') //管理人に連絡
						->subject('メールの件名');
				});
			// ユーザーにはサンキューページを表示する
			return View::make('contact.thanks')->with('data', $data);

		}else{
			return Redirect::to(URL::previous())->withErrors($validator)->withInput();
		}

	}

}
