@extends('layouts.guest')

@section('title', '初回プロフィール設定')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/profile-setup.css') }}">
@endsection

@section('content')
<div class="card">
    <h2 class="card-title">プロフィール設定</h2>
    
    <form method="POST" action="{{ route('profile.setup.store') }}" enctype="multipart/form-data" class="profile-setup-form">
        @csrf

        <div class="form-group image-upload-group">
            <label for="profile_image" class="form-label">プロフィール画像</label>
            <div class="image-preview">
                <p>画像をアップロード</p>
            </div>
            <input type="file" id="profile_image" name="profile_image" class="file-input">
        </div>

        <div class="form-group">
            <label for="name" class="form-label">ユーザー名</label>
            <input type="text" id="name" name="name" class="form-input" placeholder="ユーザー名" required>
        </div>

        <div class="form-group">
            <label for="postcode" class="form-label">郵便番号</label>
            <input type="text" id="postcode" name="postcode" class="form-input" placeholder="郵便番号" required>
        </div>

        <div class="form-group">
            <label for="address" class="form-label">住所</label>
            <input type="text" id="address" name="address" class="form-input" placeholder="住所" required>
        </div>

        <div class="form-group">
            <label for="building" class="form-label">建物名</label>
            <input type="text" id="building" name="building" class="form-input" placeholder="建物名 (任意)">
        </div>

        <button type="submit" class="submit-btn">設定を完了する</button>
    </form>
</div>
@endsection