<?php
Route::get('/', function () {
    $links = \App\Link::all();
    return view('welcome', ['links' => $links]);
});

// ①GETでアクセスした時に
// ②Linksモデル(Eloquent)のallメソッドを使って、取得した全てのデータを$linksに代入する
// ③view()を使って第一引数にテンプレートのキー名(welcome.blade.html)を指定して、第二引数で$linksのデータをlinksとして渡す。
