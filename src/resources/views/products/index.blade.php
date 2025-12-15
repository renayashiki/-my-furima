@extends('layouts.app') 

@section('title', '商品一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('content')
<div class="main-content">
    
    {{-- 1. コントロール要素 (コンテンツ切り替え用。デザインから分離) --}}
    {{-- checked属性で、デフォルトは「おすすめ」が選択された状態になります --}}
    <input type="radio" id="tab-recommend" name="product-tabs" checked class="tab-radio">
    <input type="radio" id="tab-mylist" name="product-tabs" class="tab-radio">
    
    {{-- 2. デザイン要素 (タブボタン) --}}
    <div class="tab-navigation-visual">
        <div class="tab-switch">
            {{-- CSSハックのため、labelのfor属性とinputのid属性が一致していることを確認 --}}
            <label for="tab-recommend" class="tab-link tab-recommend">おすすめ</label>
            <label for="tab-mylist" class="tab-link tab-mylist">マイリスト</label>
        </div>
        <div class="tab-divider"></div>
    </div>
    
    {{-- 3. コンテンツ（商品リスト） --}}
    <div class="products-container">
        
        {{-- おすすめ商品リスト (デフォルト表示) --}}
        <div id="recommend-content" class="product-grid product-list">
            {{-- DB連携前のダミーデータ (8個) --}}
            @for ($i = 0; $i < 8; $i++) 
                <div class="product-item-wrapper">
                    <a href="#" class="product-item">
                        <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                        {{-- DBデータ挿入時に置き換える箇所 --}}
                        <div class="product-name-box"><p class="product-name-text">商品名</p></div>
                    </a>
                </div>
            @endfor
        </div>
        
        {{-- マイリスト商品リスト --}}
        <div id="mylist-content" class="product-grid product-list">
            {{-- DB連携前のダミーデータ (8個に統一) --}}
            @for ($i = 0; $i < 8; $i++) 
                <div class="product-item-wrapper">
                    <a href="#" class="product-item">
                        <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                        {{-- DBデータ挿入時に置き換える箇所 --}}
                        <div class="product-name-box"><p class="product-name-text">商品名 (マイリスト)</p></div>
                    </a>
                </div>
            @endfor
        </div>
        
    </div>
    
</div>
@endsection