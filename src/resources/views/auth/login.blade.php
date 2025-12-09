@extends('layouts.guest')

@section('title', 'ログイン')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/guest-common.css') }}">
@endsection

@section('content')
<div class="auth-content">
    <h2 class="content-title">ログイン</h2>

    <form method="POST" action="{{ route('login.store') }}" class="login-form">
        @csrf

        <div class="form-group">
            <input type="email" id="email" name="email" class="form-input" placeholder="メールアドレス" required autofocus>
        </div>

        <div class="form-group">
            <input type="password" id="password" name="password" class="form-input" placeholder="パスワード" required>
        </div>

        <button type="submit" class="submit-btn">ログインする</button>
    </form>

    <p class="register-link-area">
        <a href="{{ route('register') }}" class="register-link">会員登録はこちら</a>
    </p>
</div>
@endsection