@extends('layouts.app', ['css_path' => 'products/index.css'])

@section('title', '商品一覧')

@section('content')
<div class="container">
    <form action="{{ route('products.index') }}" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="商品を検索" class="search-input">
        <button type="submit" class="search-btn">検索</button>
    </form>

    <div class="tab-switch">
        <a href="#" class="tab-link active">おすすめ</a>
        <a href="#" class="tab-link">マイリスト</a>
    </div>

    <div class="product-list">
        <a href="{{ route('products.show', ['id' => 1]) }}" class="product-item">
            <img src="..." alt="商品画像" class="product-image">
            <p class="product-price">¥10,000</p>
        </a>
        </div>
</div>
@endsection