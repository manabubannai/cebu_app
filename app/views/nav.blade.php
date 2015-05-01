<header itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">

<div class="container-fluid gray navbar-fixed-top sp-none">
	<div class="container-new">
		<div class="row nav-header">
			<div class="col-xs-12 col-md-8">
				<p class="top10 sp-no-m-b">セブ島の売ったり・買ったり・探したり：PHIINO（フィーノ）</p>
			</div>
			<div class="col-xs-4 pull-right sp-none">
				{{-- <span>PHIINOとは？</span> --}}
				<span>{{ link_to("/posts/create", '商品を出品する', array('class' => 'btn pink-button pull-right')) }}</span>
			</div>
		</div>
	</div>
</div>

<!-- スマホ専用のナビバー -->
<nav class="navbar navbar-default pc-none navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="{{URL::to('/')}}">
			{{ HTML::image('images/logo/logo.png', 'logo', array('class' => 'sp-logo img-responsive')) }}
			</a>

		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{URL::to('/posts')}}">クラシファイド</a></li>
				<li><a href="{{URL::to('/bbc')}}">質問掲示板</a></li>
				<li><a href="http://phil-portal.com/philippines-ryugaku" target="new">学校情報</a></li>
				<li><a href="{{URL::to('/school')}}" target="new">コラム</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>


<!-- PC専用のナビバー -->
<div class="container nav-menu sp-none container-new">
	<div class="row">
		<div class="col-xs-4">
			<a href="{{URL::to('/')}}">
			{{ HTML::image('images/logo/logo.png', 'logo', array('class' => 'logo')) }}
			</a>
		</div>
		<div class="col-xs-2">
			<a href="{{URL::to('/posts')}}">
			{{ HTML::image('images/nav/classifieds.png', 'classifieds', array('class' => 'nav')) }}
			</a>
		</div>
		<div class="col-xs-2">
			<a href="{{URL::to('/bbc')}}">
			{{ HTML::image('images/nav/bulletin.png', 'bulletin', array('class' => 'nav')) }}
			</a>
		</div>
		<div class="col-xs-2">
			<a href="http://phil-portal.com/philippines-ryugaku" target="new">
			{{ HTML::image('images/nav/school.png', 'school', array('class' => 'nav')) }}
			</a>
		</div>
		<div class="col-xs-2">
			<a href="{{URL::to('/school')}}" target="new">
			{{ HTML::image('images/nav/column.png', 'column', array('class' => 'nav')) }}
			</a>
		</div>
	</div>
</div>

</header>

<main>