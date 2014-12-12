@extends('layouts.default')
@section('content')


<div class="container top-1">
	<div class="row col-xs-6 col-xs-offset-3">

		<h1 class="m-b-30">ログインページ</h1>

		{{-- ログイン時にフラッシュメッセージを表示 --}}
		@if(Session::has('success'))
			<div class="bg-info">
				<p>{{ Session::get('success') }}</p>
			</div>
		@endif

		{{-- 出品者にはログインを強制する --}}
		@if(Session::has('flash_error'))
			<div class="bg-info">
				<p>{{ Session::get('flash_error') }}</p>
			</div>
		@endif

		{{-- IDとパスワードが一致しません --}}
		@if(Session::has('login_error'))
			<div class="bg-danger">
				<p>{{ Session::get('login_error') }}</p>
			</div>
		@endif

		{{ Form::open(array('url' => 'login', 'class' => 'form')) }}

			<div class="form-group">
				{{-- バリデーションのエラー表示 --}}
				@foreach($errors->get('email') as $message)
					<span class="bg-danger">{{ $message }}</span>
				@endforeach
				<label for="email" class="">メールアドレス</label>
				{{ Form::text('email',Input::old('email'), array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{-- バリデーションのエラー表示 --}}
				@foreach($errors->get('password') as $message)
					<span class="bg-danger">{{ $message }}</span>
				@endforeach
				<label for="password" class="">パスワード</label>
				<input name="password" type="password" class="form-control">
			</div>

			<button type="submit" class="btn blue m-b-30">ログインする</button>

		{{ Form::close() }}

		<h2 class="m-b-30">会員登録がまだの方はこちら</h2>
		{{ link_to("/users/create", '会員登録する', array('class' => 'btn pink-button')) }}

	</div>
</div>
@stop