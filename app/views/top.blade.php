@extends('layouts.default')
@section('content')

<div class="container container-new top-1">
	<div class="row">
		<div class="col-xs-12 col-md-6 top50 pc-none">
			<a href="http://phil-portal.com/philippines-ryugaku/introduce-friends/"><img src="http://phil-portal.com/philippines-ryugaku/wp-content/uploads/2015/04/banner_main_03.jpg" alt="" class="  img-responsive"></a>
		</div>
		<div class="col-xs-12 col-md-6">
			<h2><i class="fa fa-newspaper-o"></i> セブのニュース・注目記事</h2>
			@include('get_rss')
		</div>
		<div class="col-xs-12 col-md-6 top50 sp-none">
			<a href="http://phil-portal.com/philippines-ryugaku/introduce-friends/"><img src="http://phil-portal.com/philippines-ryugaku/wp-content/uploads/2015/04/banner_main_03.jpg" alt="" class="  img-responsive"></a>
			{{-- HTML::image('images/top/start.png', 'start', array('class' => 'top-start  img-responsive')) --}}
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