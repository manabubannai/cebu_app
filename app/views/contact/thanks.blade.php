@extends('layouts.default')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2 class="text-center">{{ Input::get('contactName') }}さん、Phiinoをご利用いただきありがとうございました<(_ _)></h2>
			<p class="text-center">出品者からの連絡をお待ちください</p>
		</div>
	</div>
</div>

@stop