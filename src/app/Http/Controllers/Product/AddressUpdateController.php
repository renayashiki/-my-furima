<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class AddressUpdateController extends Controller
{
    // 住所変更画面
    public function edit()
    {
        return view('products.address_edit');
    }

    // 更新処理
    public function update()
    {
        return redirect()->back()->with('success', '住所を更新しました。');
    }
}
