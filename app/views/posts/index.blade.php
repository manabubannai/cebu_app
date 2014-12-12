@extends('layouts.default')
@section('content')

<div class="container-fluid">
	<h1 class="text-center">売ったり・買ったり｜クラシファイド一覧</h1>
	@include('posts/search')
</div>

<div class="container">
	<div class="row">
		<div class="sp-none col-md-4 category">
			@include('posts.category')
		</div>

		<div class="col-sm-12 col-md-8 top-classifieds">
			@include('posts.list')
		</div>

		<div class="paginate col-xs-12 text-center m-b-30">
			{{ $posts->appends(Request::only('q'))->appends(Request::only('cat'))->links() }}
		</div>

	</div>
</div>
@stop