@extends('layouts.default')
@section('content')

<div class="container container-new">
	<div class="row">
		<div class="col-xs-8">

			<h2>タイトル：{{ $post->title }}
				<small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
			</h2>
			<p>カテゴリー：{{ $post->bbccategory->name }}</p>
			<pre class="white">{{ $post->content }}</pre>

			<hr />

			@if(empty($post->bbccomments))
			<h3>コメント一覧</h3>
				@foreach($post->bbccomments as $single_comment)
					<h4>名前：{{ $single_comment->commenter }} <small>{{ $single_comment->created_at }}</small></h4>
					<p>{{ $single_comment->comment }}</p><br />
				@endforeach
			<hr />
			@endif

			<h3>コメントを投稿する</h3>
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

			{{ Form::open(['route' => 'comment.store'], array('class' => 'form')) }}

				<div class="form-group">
					<label for="commenter" class="control-label">名前</label>
					<div class="">
						{{ Form::text('commenter', null, array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="comment" class="control-label">コメント</label>
					<div class="">
						{{ Form::textarea('comment', null, array('class' => 'form-control')) }}
					</div>
				</div>

				{{ Form::hidden('post_id', $post->id) }}

				<div class="form-group">
					<button type="submit" class="btn blue">投稿する</button>
				</div>


			{{ Form::close() }}

		</div>

		<div class="col-xs-4">
			@include('side')
		</div>
	</div>
</div>

@stop