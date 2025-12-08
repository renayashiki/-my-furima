@extends('layouts.guest', ['css_path' => 'auth/register.css'])

@section('title', '会員登録')

@section('content')
<div class="card">
    <h2 class="card-title">会員登録</h2>
    
    <form method="POST" action="{{ route('register.store') }}" class="register-form">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">ユーザー名</label>
            <input type="text" id="name" name="name" class="form-input" required autofocus>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" id="email" name="email" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" id="password" name="password" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">確認用パスワード</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
        </div>

        <button type="submit" class="submit-btn">登録する</button>
    </form>

    <p class="login-link-area">
        <a href="{{ route('login') }}" class="login-link">ログインはこちら</a>
    </p>
</div>
@endsection