@extends('layouts.app') 

@section('title', 'プロフィール')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">
@endsection

@section('content')
<div class="main-content">
    
    {{-- 1. プロフィール情報エリア --}}
    <div class="user-info-container">
        
        {{-- プロフィール画像丸枠 --}}
        <div class="profile-image-box">
            {{-- 設定されたプロフィール画像を表示する想定 (ダミーの背景色を設定) --}}
            <div class="profile-image-dummy"></div> 
        </div>
        
        {{-- ユーザー名表示パーツ --}}
        <div class="username-display-box">
            {{-- DB連携後は @auth {{ Auth::user()->name }} @endauth などに置き換え --}}
            <p class="username-text">ユーザー名</p>
        </div>
        
        {{-- プロフィールを編集ボタン --}}
        {{-- ルートは profile.edit.blade.php へ遷移する想定 --}}
        <a href="{{ route('profile.edit') }}" class="profile-edit-btn">
            プロフィールを編集
        </a>
        
    </div>
    
    {{-- 2. タブと商品リストエリア --}}
    
    {{-- 2-1. コントロール要素 (コンテンツ切り替え用) --}}
    <input type="radio" id="tab-products-for-sale" name="profile-tabs" checked class="tab-radio">
    <input type="radio" id="tab-purchased-products" name="profile-tabs" class="tab-radio">
    
    {{-- 2-2. デザイン要素 (タブボタン) --}}
    {{-- ★タブボタンのデザインは一覧画面と共通のCSSを使い、コンテンツ幅を広げる設定をCSSで行います --}}
    <div class="tab-navigation-visual">
        <div class="tab-switch">
            <label for="tab-products-for-sale" class="tab-link tab-recommend">出品した商品</label>
            <label for="tab-purchased-products" class="tab-link tab-mylist">購入した商品</label>
        </div>
        <div class="tab-divider"></div>
    </div>
    
    {{-- 2-3. コンテンツ（商品リスト） --}}
    <div class="products-container">
        
        {{-- 出品した商品リスト (デフォルト表示) --}}
        <div id="products-for-sale-content" class="product-grid product-list">
            @for ($i = 0; $i < 8; $i++) 
                <div class="product-item-wrapper">
                    <a href="#" class="product-item">
                        <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                        <div class="product-name-box"><p class="product-name-text">商品名 (出品)</p></div>
                    </a>
                </div>
            @endfor
        </div>
        
        {{-- 購入した商品リスト --}}
        <div id="purchased-products-content" class="product-grid product-list">
            @for ($i = 0; $i < 8; $i++) 
                <div class="product-item-wrapper">
                    <a href="#" class="product-item">
                        <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                        <div class="product-name-box"><p class="product-name-text">商品名 (購入)</p></div>
                    </a>
                </div>
            @endfor
        </div>
        
    </div>
    
</div>
@endsection