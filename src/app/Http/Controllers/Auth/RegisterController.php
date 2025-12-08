<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // 会員登録フォームの表示
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // 処理はFortifyが担当するため、表示確認のためには一旦空でOK
    public function store(Request $request)
    {
        // 実際は Fortify が処理する
        return redirect()->route('verification.notice');
    }
}
