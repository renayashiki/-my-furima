@extends('layouts.app')

@section('title', '住所の変更')

@section('styles')
    {{-- CSSファイルを products/address_edit.css に変更 --}}
    <link rel="stylesheet" href="{{ asset('css/products/address_edit.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content')
{{-- コンテナクラス名を変更 --}}
<div class="address-edit-container"> 
    
    {{-- ★タイトルを「住所の変更」に変更★ --}}
    <h1 class="page-title">住所の変更</h1>
    
    {{-- ルートは既存の address.update を利用 --}}
    <form method="POST" action="{{ route('address.update') }}" class="address-edit-form">
        @csrf
        @method('PATCH') {{-- 住所変更も更新処理のためPATCHを使用 --}}

        {{-- ★削除: 画像プレビューとファイル選択ボタン (side-by-side-container) は不要なので削除 --}}
        {{-- ★削除: ユーザー名 (form-group user-name-group) は不要なので削除 --}}

        <div class="form-group postcode-group">
            <label for="postcode" class="form-label visible-label">郵便番号</label>
            {{-- 既存データを value にセット (コメントアウト) --}}
            <input type="text" id="postcode" name="postcode" class="form-input" 
                   value="{{-- {{ Auth::user()->postcode ?? old('postcode') }} --}}"
                   required>
        </div>

        <div class="form-group address-group">
            <label for="address" class="form-label visible-label">住所</label>
            {{-- 既存データを value にセット (コメントアウト) --}}
            <input type="text" id="address" name="address" class="form-input" 
                   value="{{-- {{ Auth::user()->address ?? old('address') }} --}}"
                   required>
        </div>

        <div class="form-group building-group">
            <label for="building" class="form-label visible-label">建物名</label>
            {{-- 既存データを value にセット (コメントアウト) --}}
            <input type="text" id="building" name="building" class="form-input" 
                   value="{{-- {{ Auth::user()->building ?? old('building') }} --}}"
                   > 
        </div>

        <button type="submit" class="submit-btn">更新する</button>
    </form>
</div>
@endsection