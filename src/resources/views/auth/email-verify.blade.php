@extends('layouts.guest', ['css_path' => 'auth/email-verify.css'])

@section('title', 'メール認証')

@section('content')
<div class="message-container">
    <p class="verification-message">登録していたメールアドレスに認証メールを送付しました。<br>メール認証を完了してください。</p>

    <a href="{{ route('verification.verify', ['id' => 1, 'hash' => 'hash']) }}" class="verify-link-button">認証はこちらから</a>

    <form method="POST" action="{{ route('verification.resend') }}" class="resend-form">
        @csrf
        <button type="submit" class="resend-link">認証メールを再送する</button>
    </form>
</div>
@endsection