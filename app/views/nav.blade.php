<div class="container-fluid gray">
	<div class="container">
		<div class="row nav-header">
			<div class="col-xs-8">フィリピン・セブでつながる広がるコミュニティサイト：PHIINO（フィーノ）</div>
			<div class="col-xs-4">
				<span>PHIINOとは？</span>
				<span>サイトマップ</span>
				<span>お問い合わせ</span>
			</div>
		</div>
	</div>
</div>

<div class="container nav-menu">
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
			<a href="{{URL::to('/school')}}">
			{{ HTML::image('images/nav/school.png', 'school', array('class' => 'nav')) }}
			</a>
		</div>
		<div class="col-xs-2">
			<a href="http://blog.phiino.com/">
			{{ HTML::image('images/nav/column.png', 'column', array('class' => 'nav')) }}
			</a>
		</div>
	</div>
</div>
