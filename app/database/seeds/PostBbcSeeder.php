<?php

class PostBbcSeeder extends Seeder{

	public function run(){
		$content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

		$commentdammy = 'コメントダミーです。ダミーコメントだよ。';

		for( $i = 1 ; $i <= 20 ; $i++) {
			$post = new Bbcpost;
			$post->title = "$i 番目の投稿";
			$post->content = $content;
			$post->cat_id = 1;
			$post->save();

			$maxComments = mt_rand(3, 15);
			for ($j=0; $j <= $maxComments; $j++) {
				$comment = new Bbccomment;
				$comment->commenter = '名無しさん';
				$comment->comment = $commentdammy;

				// モデル(Bbcpost.php)のBbccommentsメソッドを読み込み、post_idにデータを保存する
				$post->Bbccomments()->save($comment);
				$post->increment('comment_count');
			}
		}

		$cat = new Bbccategory;
		$cat->name = "旅行";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "留学";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "仕事";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "家族・結婚";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "料理・グルメ";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "美容";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "金融・税金";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "生活";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "仲間探し";
		$cat->save();

		$cat = new Bbccategory;
		$cat->name = "その他";
		$cat->save();

	}
}