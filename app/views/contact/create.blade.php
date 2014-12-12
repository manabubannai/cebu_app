<h1 class="m-b-30"><i class="fa fa-envelope-o"></i> 出品者に連絡する</h1>

{{-- 投稿完了時にフラッシュメッセージを表示 --}}
@if(Session::has('success'))
	<div class="bg-info">
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

<?php
// return var_dump($user->email);
?>

{{ Form::open(array('class' => 'form', 'method' => 'post', 'action' => array('PostController@contact', $user->id))) }}
	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('contactName') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="contactName" class="">※名前</label>
		<input name="contactName" type="text" class="form-control">
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('email') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="email" class="">※メールアドレス</label>
		<input name="email" type="text" class="form-control">
	</div>

	<div class="form-group">
		{{-- バリデーションのエラー表示 --}}
		@foreach($errors->get('msg') as $message)
			<span class="bg-danger">{{ $message }}</span>
		@endforeach
		<label for="msg" class="">※本文</label>
		<textarea name="msg" type="text" rows="5" class="form-control"></textarea>
	</div>

	<div class="form-group">
		<button type="submit" class="btn blue">送信する</button>
	</div>

{{ Form::close() }}
