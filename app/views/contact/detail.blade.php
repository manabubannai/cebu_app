{{-- 以下が出品者に送信される情報 --}}

Phiinoで注文が入りました。<br />

名前：{{ Input::get('contactName') }}<br />
連絡先：{{ Input::get('email') }}<br />
メッセージ：{{ Input::get('msg') }}<br />