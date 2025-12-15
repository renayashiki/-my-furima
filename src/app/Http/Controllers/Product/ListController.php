<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class ListController extends Controller
{
    // 商品一覧画面
    public function index()
    {
        // モデル作ったら、モデル名を一致させて、コメントアウト解除するとおすすめ/マイリスト表示ができる機能を実装できる
        // おすすめ商品データ
        // $recommended_items = Product::where('is_recommended', true)->get();

        // マイリスト商品データ (ユーザーがログインしていることを前提)
        // $mylist_items = Auth::user()->favorites; // 例: ユーザーのお気に入り商品

        return view('products.index', compact('recommended_items', 'mylist_items'));
    }
}
