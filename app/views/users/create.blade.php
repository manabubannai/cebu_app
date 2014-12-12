@extends('layouts.default')
@section('content')

<div class="container top-1">
	<div class="row col-xs-6 col-xs-offset-3">

		<h1 class="m-b-30">会員登録ページ</h1>

		{{-- 会員登録完了時にフラッシュメッセージを表示 --}}
		@if(Session::has('success'))
			<div class="bg-info">
				<p>{{ Session::get('success') }}</p>
			</div>
		@endif

		{{ Form::open(['route' => 'users.store'], array('class' => 'form-horizontal')) }}

			<div class="form-group">
				{{-- バリデーションのエラー表示 --}}
				@foreach($errors->get('email') as $message)
					<span class="bg-danger">{{ $message }}</span>
				@endforeach
				<label for="email" class="">メールアドレス</label>
				<input name="email" type="email" class="form-control">
			</div>

			<div class="form-group">
				{{-- バリデーションのエラー表示 --}}
				@foreach($errors->get('password') as $message)
					<span class="bg-danger">{{ $message }}</span>
				@endforeach
				<label for="password" class="">パスワード</label>
				<input name="password" type="password" class="form-control">
			</div>

			<div class="form-group">
				{{-- バリデーションのエラー表示 --}}
				@foreach($errors->get('password_confirmation') as $message)
					<span class="bg-danger">{{ $message }}</span>
				@endforeach
				<label for="password_confirmation" class="">パスワードの確認</label>
				<input name="password_confirmation" type="password" class="form-control">
			</div>

			<div class="form-group">
				{{-- バリデーションのエラー表示 --}}
				@foreach($errors->get('phone') as $message)
					<span class="bg-danger">{{ $message }}</span>
				@endforeach
				<label for="phone" class="">電話番号</label>
				<input name="phone" type="phone" class="form-control">
			</div>

			<button type="submit" class="btn blue m-b-30">会員登録する</button>

		{{ Form::close() }}

	</div>
</div>
@stop