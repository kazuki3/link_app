<?php

namespace App\Http\Controllers;
use App\Link;  // Linkモデル使うよ
use App\Http\Requests\LinkRequest;  // LinkRequest使うよ

class LinkController extends Controller  // ボスであるContorollerクラスを使うよ
{
    public function submit(LinkRequest $request){
        $link = new Link();
        $link -> title = $request -> title;
        $link -> url = $request -> url;
        $link -> description = $request -> description;
        $link -> save();
        return redirect('/');
    }
}
