<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<!-- カスタムCSS -->
	{{ HTML::style('css/style.css') }}

	<!-- font awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<title>{{ isset($title) ? $title : 'セブ島の総合情報サイト：PHIINO' }}</title>
</head>
<body>

@include('nav')

@yield('content')

@include('footer')

</body>
</html>