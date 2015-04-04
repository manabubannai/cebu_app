@extends('layouts.default')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>{{ Input::get('contactName') }}さん、ありがとうございました<(_ _)></h2>
			<p>出品者からの連絡をお待ちください</p>
		</div>
	</div>
</div>

@stop