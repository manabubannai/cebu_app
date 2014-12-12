<div class="search">
	{{ Form::open(array('method' => 'GET', 'class'=>'form-inline', 'role'=>'form')) }}

	{{ Form::input('search', 'q', Input::old('q', $query), array('placeholder'=>'キーワードで検索', 'class'=>'form-control')) }}

	{{ Form::submit('検索する', array('class' => 'btn blue')) }}
	{{ link_to("/bbc/create", '質問を投稿する', array('class' => 'btn pink-button')) }}
	{{ Form::close() }}
</div>