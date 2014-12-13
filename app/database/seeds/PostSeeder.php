<?php

class PostSeeder extends Seeder{

	public function run(){
		$content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。';

		for( $i = 21 ; $i <= 40 ; $i++) {
			$post = new Post;
			$post->title = "$i 番目の投稿";
			$post->author_id = 1;
			$post->price = "1200";
			$post->cat_id = 1;
			$post->area = "セブ島";
			$post->read_more = substr($content, 0, 120);
			$post->content = $content;
			$post->save();
		}

		$post = new Post;
		$post->title = "Hoge番目の投稿";
		$post->author_id = 1;
		$post->price = "1200";
		$post->cat_id = 1;
		$post->area = "マクタン島";
		$post->read_more = substr($content, 0, 120);
		$post->content = $content;
		$post->save();

	// アドミンユーザーの追加
	$admin = new User;
	$admin->email = "mnbmnb0524@gmail.com";
	$admin->password = Hash::make("admin");
	$admin->phone = 1111;
	$admin->save();

	// カテゴリーを追加する
	$cat = new Category;
	$cat->name = "コンピューター／携帯電話";
	$cat->save();

	$cat = new Category;
	$cat->name = "ファッション／アクセサリー";
	$cat->save();

	$cat = new Category;
	$cat->name = "化粧品／ヘルスケア";
	$cat->save();

	$cat = new Category;
	$cat->name = "食品／飲料";
	$cat->save();

	$cat = new Category;
	$cat->name = "本／雑誌";
	$cat->save();

	$cat = new Category;
	$cat->name = "映画／DVD／音楽";
	$cat->save();

	$cat = new Category;
	$cat->name = "家具／キッチン";
	$cat->save();

	$cat = new Category;
	$cat->name = "家電／電化製品";
	$cat->save();

	$cat = new Category;
	$cat->name = "ゲーム／おもちゃ";
	$cat->save();

	$cat = new Category;
	$cat->name = "車／バイク／自転車";
	$cat->save();

	$cat = new Category;
	$cat->name = "賃貸一戸建て";
	$cat->save();

	$cat = new Category;
	$cat->name = "賃貸部屋（コンドミニアム）";
	$cat->save();

	$cat = new Category;
	$cat->name = "シェア（家・部屋）";
	$cat->save();

	$cat = new Category;
	$cat->name = "スポーツ／ダンス";
	$cat->save();

	$cat = new Category;
	$cat->name = "音楽／バンド";
	$cat->save();

	$cat = new Category;
	$cat->name = "趣味／愛好会";
	$cat->save();

	$cat = new Category;
	$cat->name = "パーティー";
	$cat->save();

	$cat = new Category;
	$cat->name = "ボランティア";
	$cat->save();

	$cat = new Category;
	$cat->name = "その他";
	$cat->save();

	}
}