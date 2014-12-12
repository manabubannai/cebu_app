@extends('layouts.default')
@section('content')


<div class="container m-b-30">
	<div class="row">
		<div class="col-sm-12 col-md-8">
			<h1 class="single-post-title m-b-30 add-padding"><i class="fa fa-pencil"></i> {{ $post->title }}</h1>

			<div class="col-sm-12 col-md-6">
				<?php if ($post->image): ?>
					{{ HTML::image($post->image, $post->title, array('class' => 'img-responsive thumbnail')) }}
				<?php else: ?>
					{{ HTML::image('images/sample.jpg', 'a picture', array('class' => 'img-responsive')) }}
				<?php endif; ?>
			</div>

			<div class="col-sm-12 col-md-6">
				<p><i class="fa fa-check"></i> 投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</p>
				<p><i class="fa fa-check"></i> 料金：{{ $post->price }}</p>
				<p><i class="fa fa-check"></i> カテゴリー：{{ $post->Category->name }}</p>
				<p><i class="fa fa-check"></i> 地域：{{ $post->area }}</p>
			</div>

			<p class="clearfix">
				<pre class="white">{{ $post->content }}</pre>
			</p>

			{{-- コンテンツの投稿者には編集ボタンを表示する --}}
			@if(Auth::id() == $post->author_id)
				{{ link_to("/posts/{$post->id}/edit", '投稿を編集する') }}
			@endif
		</div>

		<div class="col-sm-12 col-md-4">
			@include('contact/create')
		</div>
	</div>
</div>
@stop