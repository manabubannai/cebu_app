<h3 class="cat-h3"><i class="fa fa-tags"></i> カテゴリー一覧</h3>
<ul>
	@foreach($cat_all as $cat)
		<li>
			{{ HTML::link('/category/' . $cat->id, $cat->name) }}
		<li>
	@endforeach
</ul>
