{{ HTML::image('images/top/classifieds-title.jpg', 'classifieds-title', array('class' => 'classifieds-title sp-none')) }}
<h2 class="pc-noe text-center">クラシファイド最新情報<br />
<small>みんなで探そうより良いアイテム</small></h2>
@foreach($posts as $post)
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