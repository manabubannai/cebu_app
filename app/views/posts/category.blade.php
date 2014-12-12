<h3>カテゴリー一覧</h3>
<ul>
	@foreach($cat_all as $cat)
		<li>
			{{ HTML::link('/category/' . $cat->id, $cat->name) }}
		<li>
	@endforeach
</ul>
