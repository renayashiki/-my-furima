<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // ★ Requestを使用するために追記


class AddressUpdateController extends Controller
{
    // 住所変更画面
    public function edit()
    {
        // 既存データをViewに渡すロジックはまだ未実装ですが、今は表示のみ
        return view('products.address_edit');
    }

    // 更新処理

    public function update(Request $request) // ★ Requestを受け取るように修正
    {
        // ★最低限のバリデーションを追加
        // $request->validate([
        // 'postcode' => 'required|string|max:8', // 郵便番号は必須、最大8文字（ハイフン含む想定）
        // 'address' => 'required|string|max:255', // 住所は必須
        // 'building' => 'nullable|string|max:255', // 建物名は任意 (nullable)
        // ]);

        // ★データ更新ロジックは未実装（後で実装）
        /*
        // 例:
        $user = Auth::user();
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->building = $request->building;
        $user->save();
        */

        // 現在はバリデーションまで処理し、成功メッセージと共にリダイレクト
        return redirect()->back()->with('success', '住所を更新しました。');
    }
}
