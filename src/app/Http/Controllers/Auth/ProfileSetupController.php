<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ProfileSetupController extends Controller
{
    // 初回プロフィール設定画面
    public function index()
    {
        return view('auth.profile-setup');
    }

    // ストア処理（表示確認のため、成功後のリダイレクト先だけ設定）
    public function store()
    {
        return redirect()->route('profile.index');
    }
}
