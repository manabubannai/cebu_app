@extends('layouts.default')
@section('content')

<div class="container container-new top-1">
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<h2><i class="fa fa-newspaper-o"></i> セブニュース一覧</h2>
			@include('get_rss')
		</div>
		<div class="col-xs-12 col-md-6">
			{{ HTML::image('images/top/start.png', 'start', array('class' => 'top-start  img-responsive')) }}
		</div>
	</div>
</div>

<div class="container container-new">
	<div class="row">
		<div class="sp-none col-md-4">
			@include('side')
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