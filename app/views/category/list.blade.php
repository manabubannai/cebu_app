@extends('layouts.default')
@section('content')

<div class="container-fluid">
	<h1 class="text-center">売ったり・買ったり｜クラシファイド一覧</h1>
	<h2 class="text-center">”{{ $categories->name }}” に属する商品一覧</h2>
	<br />
</div>

<div class="container">
	<div class="row">
		<div class="sp-none col-md-4">
			@include('posts.category')
		</div>

		<div class="col-sm-12 col-md-8 top-classifieds">

			{{ HTML::image('images/top/classifieds-title.jpg', 'classifieds-title', array('class' => 'classifieds-title')) }}
			@foreach($categories->posts as $post)
			<div class="for-bg">
				<div class="col-sm-5 col-md-5">
					<?php if ($post->image): ?>
						{{ HTML::image($post->image, $post->title, array('class' => 'img-responsive thumbnail')) }}
					<?php else: ?>
						{{ HTML::image('images/sample.jpg', 'a picture', array('class' => 'img-responsive')) }}
					<?php endif; ?>
					<div class="hover-text">{{ $post->category->name }}</div>
				</div>
				<div class="col-sm-7 col-md-7 classifieds-detail">
					<h3 class="no-space">{{ link_to("/posts/{$post->id}", $post->title) }}</h3>
					<p>
						<span class="space-right">
							投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}
						</span><br />
						<span class="space-right">
							料金：{{ $post->price }}
						</span>
						<span>
							地域：{{ $post->area }}
						</span><br />
						<span>
						{{ $post->read_more }}
						</span>
					</p>
					{{ link_to("/posts/{$post->id}", '詳細はこちら', array('class' => 'btn pink-button')) }}
				</div>
				<div class="m-b-30" style="clear: both;"></div>
			</div>
			@endforeach

		</div>

		<div class="paginate col-xs-12 text-center m-b-30">
			{{ $posts->appends(Request::only('q'))->appends(Request::only('cat'))->links() }}
		</div>

	</div>
</div>
@stop
