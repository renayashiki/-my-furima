<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // ログインフォームの表示
    public function showLoginForm()
    {
        // 🚨 修正点: CSSパスをビューに渡す
        $css_path = 'auth/login.css';

        return view('auth.login', compact('css_path'));
    }

    // 処理はFortifyが担当するため、表示確認のためには一旦空でOK
    public function store(Request $request)
    {
        // 実際は Fortify が処理する
        return redirect()->route('products.index');
    }
}
