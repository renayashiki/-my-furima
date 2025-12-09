@extends('layouts.guest')

@section('title', 'ログイン')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<div class="auth-content">
    <h1 class="content-title">ログイン</h1>

    <form method="POST" action="{{ route('login.store') }}" class="login-form" novalidate>
        @csrf

        <div class="form-group">
            <p class="form-label">メールアドレス</p>            
            <input type="email" id="email" name="email" class="form-input" required autofocus>
        </div>

        <div class="form-group">
            <p class="form-label">パスワード</p>
            <input type="password" id="password" name="password" class="form-input" required>
        </div>

        <button type="submit" class="submit-btn">ログインする</button>
    </form>

        <p class="register-link-area">
        <a href="{{ route('register') }}" class="register-link">会員登録はこちら</a>
    </p>
</div>
@endsection