<?php
	$rssdata = simplexml_load_file("http://philippines-ryugaku.info/feed/");

	// 読み込み件数を決定する
	$num_of_data = 5;

	//出力内容の初期化
	$outdata = "";

	//設定した読み込み件数分だけ取得を繰り返す
	for ($i=0; $i<$num_of_data; $i++){
		$entry = $rssdata->channel->item[$i]; //記事1個取得
		$date = date("Y年 n月 j日", strtotime($entry->pubDate));
		$title = $entry->title; //タイトル取得
		$link = $entry->link; //リンクURL取得

		//出力内容に日付けを入れる
		$outdata .= '<li>' . $date;

		//出力内容にリンク付きでタイトルを入れる
		$outdata .= '<a href="' . $link . '"><span class=sp-br>' . $title . '</span></a></li>';
	}

	echo '<ul class="nav-border">' . $outdata . '</ul>'; //実行結果を出力する
