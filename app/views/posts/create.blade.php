@extends('layouts.default')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3">
			<h1>投稿ページ</h1>

			{{-- 投稿完了時にフラッシュメッセージを表示 --}}
			@if(Session::has('success'))
				<div class="bg-info">
					<p>{{ Session::get('success') }}</p>
				</div>
			@endif

			{{ Form::open(['route' => 'posts.store', 'files' => true], array('class' => 'form')) }}

				<div class="form-group">
					{{-- バリデーションのエラー表示 --}}
					@foreach($errors->get('title') as $message)
						<span class="bg-danger">{{ $message }}</span>
					@endforeach
					<label for="title" class="control-label">※タイトル（24文字以内）</label>
					<div class="">
						{{ Form::text('title', null, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group">
					{{-- バリデーションのエラー表示 --}}
					@foreach($errors->get('category') as $message)
						<span class="bg-danger">{{ $message }}</span>
					@endforeach
					<label for="category" class="control-label">※カテゴリー</label>
					<div class="">
						<select name="category" type="text" class="form-control">
							<option></option>

							@foreach($cats as $cat)
								<option name="{{ $cat->name }}" value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach

						</select>
					</div>
				</div>

				<div class="form-group">
					{{-- バリデーションのエラー表示 --}}
					@foreach($errors->get('area') as $message)
						<span class="bg-danger">{{ $message }}</span>
					@endforeach
					<label for="area" class="control-label">※地域</label>
					<div class="">
						<select name="area" type="text" class="form-control">
							<option></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					{{-- バリデーションのエラー表示 --}}
					@foreach($errors->get('content') as $message)
						<span class="bg-danger">{{ $message }}</span>
					@endforeach
					<label for="content" class="control-label">※本文</label>
					<div class="">
						{{ Form::textarea('content', null, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="price" class="control-label">料金</label>
					<div class="">
						{{ Form::text('price', null, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="image" class="control-label">画像</label>
					<div class="">
						<input name="image" type="file" class="form-control">
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