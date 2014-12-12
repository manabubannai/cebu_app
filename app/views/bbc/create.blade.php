@extends('layouts.default')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3">

		<h1>投稿ページ</h1>

		{{-- 投稿完了時にフラッシュメッセージを表示 --}}
		@if(Session::has('message'))
			<div class="bg-info">
				<p>{{ Session::get('message') }}</p>
			</div>
		@endif

		{{-- エラーメッセージの表示 --}}
		@foreach($errors->all() as $message)
			<p class="bg-danger">{{ $message }}</p>
		@endforeach

		{{ Form::open(['route' => 'bbc.store'], array('class' => 'form')) }}

			<div class="form-group">
				<label for="title" class="control-label">タイトル</label>
				<div class="">
					{{ Form::text('title', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<label for="cat_id" class="control-label">カテゴリー</label>
				<div class="">
					<select name="cat_id" type="text" class="form-control">
						<option></option>

						@foreach($cats as $cat)
							<option name="{{ $cat->name }}" value="{{ $cat->id }}">{{ $cat->name }}</option>
						@endforeach

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="content" class="control-label">本文</label>
				<div class="">
					{{ Form::textarea('content', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">投稿する</button>
			</div>

		{{ Form::close() }}

		</div>
	 </div>
</div>
@stop