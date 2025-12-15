@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/profile/edit.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="profile-edit-container"> 
    
    <h1 class="page-title">プロフィール設定</h1>
    
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="profile-edit-form">
        @csrf
        @method('PATCH')

        <div class="side-by-side-container"> 
            
            <div class="image-preview" id="image-preview">
                {{-- @if (Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="プロフィール画像" class="current-profile-image">
                @endif --}}
            </div>
            
            <input type="file" id="profile_image" name="profile_image" class="file-input-hidden">
            <label for="profile_image" class="file-select-btn">画像を選択する</label>
            
        </div>

        <div class="form-group user-name-group">
            <label for="name" class="form-label visible-label">ユーザー名</label> 
            <input type="text" id="name" name="name" class="form-input" 
                   value="{{-- {{ Auth::user()->name ?? old('name') }} --}}" 
                   {{-- ★修正: placeholderを削除 --}}
                   required> 
        </div>

        <div class="form-group">
            <label for="postcode" class="form-label visible-label">郵便番号</label>
            <input type="text" id="postcode" name="postcode" class="form-input" 
                   value="{{-- {{ Auth::user()->postcode ?? old('postcode') }} --}}"
                   {{-- ★修正: placeholderを削除 --}}
                   required>
        </div>

        <div class="form-group">
            <label for="address" class="form-label visible-label">住所</label>
            <input type="text" id="address" name="address" class="form-input" 
                   value="{{-- {{ Auth::user()->address ?? old('address') }} --}}"
                   {{-- ★修正: placeholderを削除 --}}
                   required>
        </div>

        <div class="form-group">
            <label for="building" class="form-label visible-label">建物名</label>
            <input type="text" id="building" name="building" class="form-input" 
                   value="{{-- {{ Auth::user()->building ?? old('building') }} --}}"
                   {{-- ★修正: placeholderを削除 --}}
                   > 
        </div>

        <button type="submit" class="submit-btn">更新する</button>
    </form>
</div>
@endsection