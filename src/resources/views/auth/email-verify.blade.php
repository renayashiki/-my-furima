@extends('layouts.guest')

@section('title', 'メール認証')

{{-- ★ CSSの読み込み方法を修正 ★ --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/email-verify.css') }}">
@endsection

@section('content')
<div class="message-container">
    <p class="verification-message">登録していたメールアドレスに認証メールを送付しました。<br>メール認証を完了してください。</p>

    {{-- ★認証リンクは、一時的に # を使用 ★ --}}
    <a href="#" class="verify-link-button">認証はこちらから</a>

    <form method="POST" action="{{ route('verification.resend') }}" class="resend-form">
        @csrf
        <button type="submit" class="resend-link">認証メールを再送する</button>
    </form>
</div>
@endsection