<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class ListController extends Controller
{
    // 商品一覧画面
    public function index()
    {
        // おすすめ商品データ
        $recommended_items = Product::where('is_recommended', true)->get();

        // マイリスト商品データ (ユーザーがログインしていることを前提)
        $mylist_items = Auth::user()->favorites; // 例: ユーザーのお気に入り商品

        return view('products.index', compact('recommended_items', 'mylist_items'));
    }
}
