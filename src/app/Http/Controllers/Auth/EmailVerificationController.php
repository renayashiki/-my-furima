<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    // メール認証待ち画面を表示 (GET /email/verify)
    public function notice()
    {
        return view('auth.email-verify');
    }

    // メール認証リンクからの処理 (/email/verify/{id}/{hash})
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill(); // verified_at を更新

        // 認証後、初回プロフィール設定画面へ遷移
        return redirect()->route('profile.setup')->with('verified', true);
    }

    // メール再送処理 (POST /email/resend)
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', '確認メールを再送しました。');
    }
}
