<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // ログインフォームの表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 処理はFortifyが担当するため、表示確認のためには一旦空でOK
    public function store(Request $request)
    {
        // 実際は Fortify が処理する
        return redirect()->route('products.index');
    }
}
