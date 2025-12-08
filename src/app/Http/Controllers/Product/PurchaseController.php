<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    // 商品購入画面（確認画面）
    public function index($id)
    {
        return view('products.purchase', ['product_id' => $id]);
    }

    // 決済処理
    public function pay()
    {
        // 実際は決済処理を行う
        return redirect()->route('products.index')->with('status', '購入が完了しました。');
    }
}
