@extends('layouts.app') 

@section('title', '商品一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('content')
<div class="main-content">
    
    <div class="content-wrapper">
        
        <div class="tab-navigation-area">
            <div class="tab-switch">
                
                {{-- おすすめタブ (初期チェック状態) --}}
                <input type="radio" id="tab-recommend" name="product-tabs" checked class="tab-radio">
                <label for="tab-recommend" class="tab-link tab-recommend">
                    おすすめ
                </label>
                
                {{-- マイリストタブ --}}
                <input type="radio" id="tab-mylist" name="product-tabs" class="tab-radio">
                <label for="tab-mylist" class="tab-link tab-mylist">
                    マイリスト
                </label>
            </div>
            <div class="tab-divider"></div>
        </div>
        
        <div class="products-container">
            
            {{-- おすすめ商品リスト --}}
            <div id="recommend-content" class="product-grid product-list">
                @for ($i = 0; $i < 8; $i++) 
                    <div class="product-item-wrapper">
                        <a href="#" class="product-item">
                            <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                            <div class="product-name-box"><p class="product-name-text">商品名</p></div>
                        </a>
                        <button class="favorite-btn"><i class="far fa-heart"></i></button>
                    </div>
                @endfor
            </div>
            
            {{-- マイリスト商品リスト --}}
            <div id="mylist-content" class="product-grid product-list">
                 @for ($i = 0; $i < 2; $i++) 
                    <div class="product-item-wrapper">
                        <a href="#" class="product-item">
                            <div class="product-image-box"><p class="product-image-text">商品画像</p></div>
                            <div class="product-name-box"><p class="product-name-text">商品名 (マイリスト)</p></div>
                        </a>
                        <button class="favorite-btn"><i class="far fa-heart"></i></button>
                    </div>
                @endfor
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection