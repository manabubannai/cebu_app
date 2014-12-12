<div class="search">
	{{ Form::open(array('method' => 'GET', 'class'=>'form-inline', 'role'=>'form')) }}

	{{ Form::select('cat', $categories, Input::old('cat', $catQuery), array('placeholder'=>'', 'class'=>'form-control')) }}

	{{-- Form::select('cat', ['' => '', 'ネット機器' => 'ネット機器', '配列で渡す' => '配列で渡す'], Input::old('cat', $catQuery),['class'=>'form-control']) --}}

	{{ Form::input('search', 'q', Input::old('q', $query), array('placeholder'=>'キーワードで検索', 'class'=>'form-control')) }}

	{{ Form::submit('検索する', array('class' => 'btn blue')) }}
	{{ link_to("/posts/create", '商品を出品する', array('class' => 'btn pink-button')) }}
	{{ Form::close() }}
</div>