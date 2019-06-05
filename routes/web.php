<?php
Route::get('/', function () {
    $links = \App\Link::all();
    return view('welcome', ['links' => $links]);
});

// ①GETでアクセスした時に
// ②Linksモデル(Eloquent)のallメソッドを使って、取得した全てのデータを$linksに代入する
// ③view()を使って第一引数にテンプレートのキー名(welcome.blade.html)を指定して、第二引数で$linksのデータをlinksとして渡す。


Route::get('/submit', function () {
    return view('submit');
});

use Illuminate\Http\Request;

// ①POSTで/submitにアクセスする
Route::post('submit', function (Request $request) {
    // ②validateメソッドを使ってバリデーションを使う
    $data = $request->validate([
        'title' => 'required | max:255',
        'url' => 'required | url | max:255',
        'description' => 'required | max:255',
    ]);

    // ③Linkモデルを生成
    $link = new App\Link($data);
    $link -> save();

    // リダイレクトする
    return redirect('/');
});

// ①POSTで/submitにアクセスする。
// ②validateメソッドを使ってバリデーションを行う
// エラーが発生した場合、、セッションにエラーメッセージをフラッシュデータとして保存します。
// ③バリデーションの検証が通ったらLinkモデルを生成してフォームに投稿されたデータをDBに保存する。
// ④その後に/(root)にリダイレクトさせる。