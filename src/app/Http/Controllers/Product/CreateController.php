<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    // 商品出品画面
    public function create()
    {
        return view('products.create');
    }

    // ストア処理
    public function store()
    {
        return redirect()->route('products.index');
    }
}
