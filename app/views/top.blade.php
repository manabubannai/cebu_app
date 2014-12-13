@extends('layouts.default')
@section('content')

<div class="container top-1">
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<h2><i class="fa fa-newspaper-o"></i> セブニュース一覧</h2>
			<div class="col-sm-8 col-md-8">
				@include('get_rss')
			</div>
			<div class="col-sm-4 col-md-4">
				<?php
					// サムネイル取得用のURL
					$items = simplexml_load_file('http://matome.naver.jp/feed/hot')->channel->item;
					$url = (string)$items[0]->children('media', true)->thumbnail->attributes()->url;
				?>
				<a href="<?php echo $items->link; ?>"><img src="<?php echo $url; ?>" class="img-responsive"></a>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			{{ HTML::image('images/top/start.png', 'start', array('class' => 'top-start')) }}
		</div>
	</div>
</div>
っっっっっっっっっっｈ
<div class="container">
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