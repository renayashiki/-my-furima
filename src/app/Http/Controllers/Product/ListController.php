<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class ListController extends Controller
{
    // 商品一覧画面
    public function index()
    {
        return view('products.index');
    }
}
