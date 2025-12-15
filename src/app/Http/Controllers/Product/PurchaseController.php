<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // ★ 決済処理にRequestを使用するため追記

class PurchaseController extends Controller
{
    // 商品購入画面（確認画面）
    public function index($id)
    {
        // ★本来はここで商品ID ($id) を使ってDBから商品データを取得する

        return view('products.purchase', ['product_id' => $id]);
    }

    // 決済処理
    public function pay(Request $request) // ★ Requestを受け取るように修正
    {
        // ★最低限のバリデーションを追加
        $request->validate([
            'payment_method' => 'required|string', // 支払い方法が必須
            // 'product_id' => 'required|exists:products,id', // 商品IDが必須・存在チェック
        ]);

        // 実際は決済処理を行う
        // ... (Stripe, PayPayなどのAPI連携処理) ...

        return redirect()->route('products.index')->with('status', '購入が完了しました。');
    }
}
