@extends('layouts.app')

@section('title', '支払い選択・購入')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products/purchase.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="purchase-container">
    <form method="POST" action="{{ route('purchase.pay') }}" class="purchase-form">
        @csrf

        {{-- ===========================================
            左側エリア
        =========================================== --}}
        <div class="left-content-wrapper">
            
            {{-- 1. 商品情報ブロック --}}
            <div class="product-info-block">
                {{-- 商品画像 --}}
                <div class="product-image-box">
                    <span class="product-image-text">商品画像</span>
                </div>
                
                {{-- 商品名と価格 --}}
                <div class="product-details-box">
                    <p class="product-name">{{-- {{ $product->name }} --}}商品名</p>
                    <p class="product-price-large">¥ {{-- {{ number_format($product->price) }} --}}47,000</p>
                </div>
            </div>
            
            {{-- ★修正①: 商品情報と支払い方法の間の区切り線 --}}
            <div class="divider-line product-divider"></div> 

            {{-- 2. 支払い方法選択 --}}
            <div class="payment-method-block">
                <h2 class="block-title">支払い方法</h2> 
                
                <div class="input-container custom-select-wrapper">
                    <select id="payment_method" name="payment_method" class="payment-select-box">
                        <option value="" disabled selected>選択してください</option>
                        <option value="credit_card">カード支払い</option>
                        <option value="convenience_store">コンビニ支払い</option>
                    </select>
                </div>
            </div>
            
            {{-- ★修正①: 支払い方法と配送先の間の区切り線 --}}
            <div class="divider-line payment-divider"></div> 

            {{-- 3. 配送先情報 --}}
            <div class="shipping-address-block">
                <h2 class="block-title">配送先</h2>

                <div class="address-display-container">
                    <p class="current-address-postcode">
                        〒{{-- {{ Auth::user()->postcode }} --}}XXX-YYYY
                    </p>
                    <p class="current-address-detail">
                        {{-- {{ Auth::user()->address }} --}}ここに住所と建物名が入ります
                    </p>
                    
                    <a href="{{ route('address.edit') }}" class="address-change-btn">変更する</a>
                </div>
            </div>
            
            {{-- ★修正①: 配送先の下の区切り線 --}}
            <div class="divider-line shipping-divider"></div> 

        </div> 
        {{-- end left-content-wrapper --}}


        {{-- ===========================================
            右側エリア (購入サマリー)
        =========================================== --}}
        <div class="right-summary-wrapper">
            <div class="summary-table-wrapper">
                
                {{-- 支払い情報テーブル --}}
                <div class="summary-table">
                    {{-- 1行目: 商品代金 --}}
                    <div class="table-row top-row">
                        <div class="table-cell label-cell cell-left">商品代金</div>
                        <div class="table-cell value-cell cell-right">¥ {{-- {{ number_format($product->price) }} --}}47,000</div>
                    </div>
                    {{-- 2行目: 支払い方法 --}}
                    <div class="table-row bottom-row">
                        <div class="table-cell label-cell cell-left">支払い方法</div>
                        {{-- 支払い方法のダミー/既定値 --}}
                        <div class="table-cell value-cell cell-right payment-value">コンビニ払い</div>
                    </div>
                </div> {{-- end summary-table --}}
            </div> {{-- end summary-table-wrapper --}}
            
            {{-- 購入ボタン --}}
            <button type="submit" class="purchase-btn">購入する</button>

        </div> 
        {{-- end right-summary-wrapper --}}

    </form>
</div>
@endsection