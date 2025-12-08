<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    // プロフィール編集画面
    public function edit()
    {
        return view('profile.edit');
    }

    // 更新処理
    public function update()
    {
        return redirect()->route('profile.index')->with('success', 'プロフィールを更新しました。');
    }
}
