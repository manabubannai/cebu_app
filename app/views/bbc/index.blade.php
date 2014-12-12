@extends('layouts.default')
@section('content')

<div class="container-fluid">
	<h1 class="text-center">みんなに聞こう｜質問掲示板</h1>
	@include('bbc/search')
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			@foreach($posts as $post)
				<div class="for-bg">
					<h2 class="no-space">
						{{ link_to("/bbc/{$post->id}", $post->title, array('class' => '')) }}
						<small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
					</h2>
					<br />
					<p>カテゴリー：{{ $post->bbccategory->name }}</p>
					<p>
						<?php $readmore = substr($post->content, 0, 120); ?>
						{{ $readmore }}
					</p>
					<p>{{ link_to("/bbc/{$post->id}", '続きを読む', array('class' => 'btn blue pull-right')) }}</p>
					<p>コメント数：{{ $post->comment_count }}</p>
					<hr />
				</div>
			@endforeach
		</div>

		<div class="col-xs-4">
			@include('side')
		</div>

		<div class="paginate col-xs-12 text-center m-b-30">
			{{ $posts->appends(Request::only('q'))->links() }}
		</div>

	</div>
</div>
@stop