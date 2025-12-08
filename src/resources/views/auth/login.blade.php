@extends('layouts.guest', ['css_path' => 'auth/login.css'])

@section('title', 'ログイン')

@section('content')
<div class="card">
    <h2 class="card-title">ログイン</h2>

    <form method="POST" action="{{ route('login.store') }}" class="login-form">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-input" required autofocus>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" id="password" name="password" class="form-input" required>
        </div>

        <button type="submit" class="submit-btn">ログインする</button>
    </form>

    <p class="register-link-area">
        <a href="{{ route('register') }}" class="register-link">会員登録はこちら</a>
    </p>
</div>
@endsection