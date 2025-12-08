<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    // 商品詳細画面
    public function show($id)
    {
        // 実際は $id を使って商品データを取得する
        return view('products.detail', ['product_id' => $id]);
    }
}
