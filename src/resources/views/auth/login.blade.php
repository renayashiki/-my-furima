@extends('layouts.app') 

@section('title', '商品一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('content')
<div class="main-content">
    
    {{-- 1. コントロール要素 (タブ切り替え用。CSSのみで制御するため、コンテンツとは分離) --}}
    <input type="radio" id="tab-recommend" name="product-tabs" checked class="tab-radio">
    <input type="radio" id="tab-mylist" name="product-tabs" class="tab-radio">
    
    {{-- 2. デザイン要素 (タブボタンを見本通りに配置) --}}
    <div class="tab-navigation-visual">
        <div class="tab-switch">
            <label for="tab-recommend" class="tab-link tab-recommend">おすすめ</label>
            <label for="tab-mylist" class="tab-link tab-mylist">マイリスト</label>
        </div>
        <div class="tab-divider"></div>
    </div>
    
    {{-- 3. コンテンツ（商品リスト） --}}
    <div class="products-container">
        
        <div id="recommend-content" class="product-grid product-list">
            @for ($i = 0; $i < 8; $i++) 
                <div class="product-item-wrapper">
                    <a href="#" class="product-item">
                        <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                        <div class="product-name-box"><p class="product-name-text">商品名</p></div>
                    </a>
                    {{-- ハートボタンは削除済み --}}
                </div>
            @endfor
        </div>
        
        <div id="mylist-content" class="product-grid product-list">
             @for ($i = 0; $i < 2; $i++) 
                <div class="product-item-wrapper">
                    <a href="#" class="product-item">
                        <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                        <div class="product-name-box"><p class="product-name-text">商品名 (マイリスト)</p></div>
                    </a>
                </div>
            @endfor
        </div>
        
    </div>
    
</div>
@endsection