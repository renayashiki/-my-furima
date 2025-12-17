@extends('layouts.app')

@section('title', '支払い選択・購入')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products/purchase.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="purchase-container">
    <form method="POST" action="{{ route('purchase.pay') }}" class="purchase-form">
        @csrf

        {{-- 左側メインコンテンツ --}}
        <div class="left-content-wrapper">
            
            <div class="product-info-block">
                <div class="product-image-box">
                    <span class="product-image-text">商品画像</span>
                </div>
                <div class="product-details-box">
                    <p class="product-name">商品名</p>
                    <p class="product-price-large">¥ 47,000</p>
                </div>
            </div>
            
            <div class="divider-line product-divider"></div> 

            {{-- 支払い方法セクション --}}
            <div class="payment-method-block">
                <h2 class="block-title">支払い方法</h2> 
                
                <div class="custom-select-wrapper">
                    <input type="hidden" name="payment_method" id="payment_method_input" value="">

                    {{-- セレクト本体 --}}
                    <div class="custom-select-box" id="customSelect">
                        <span class="selected-text">選択してください</span>
                        <span class="arrow-icon">▼</span>
                    </div>

                    {{-- テロップ：1行目がセレクト本体に完全に重なる配置 --}}
                    <ul class="select-options-list" id="selectOptions">
                        <li class="option-item" data-value="credit_card">コンビニ払い</li>
                        <li class="option-item" data-value="convenience_store">カード支払い</li>
                    </ul>
                </div>
            </div>
            
            <div class="divider-line payment-divider"></div> 

            {{-- 配送先セクション --}}
            <div class="shipping-address-block">
                <h2 class="block-title">配送先</h2>
                <div class="address-display-container">
                    <p class="current-address-postcode">〒XXX-YYYY</p>
                    <p class="current-address-detail">ここに住所と建物名が入ります</p>
                    <a href="{{ route('address.edit') }}" class="address-change-btn">変更する</a>
                </div>
            </div>
            
            <div class="divider-line shipping-divider"></div> 
        </div> 

        {{-- 右側サマリー --}}
        <div class="right-summary-wrapper">
            <div class="summary-table-wrapper">
                <div class="summary-table">
                    <div class="table-row top-row">
                        <div class="table-cell label-cell cell-left">商品代金</div>
                        <div class="table-cell value-cell cell-right">¥ 47,000</div>
                    </div>
                    <div class="table-row bottom-row">
                        <div class="table-cell label-cell cell-left">支払い方法</div>
                        <div class="table-cell value-cell cell-right payment-value">選択してください</div>
                    </div>
                </div>
            </div>
            <button type="submit" class="purchase-btn">購入する</button>
        </div> 
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const customSelect = document.getElementById('customSelect');
    const optionsList = document.getElementById('selectOptions');
    const hiddenInput = document.getElementById('payment_method_input');
    const selectedText = customSelect.querySelector('.selected-text');
    const summaryPayment = document.querySelector('.payment-value');

    customSelect.addEventListener('click', (e) => {
        optionsList.classList.toggle('active');
        e.stopPropagation();
    });

    document.querySelectorAll('.option-item').forEach(item => {
        item.addEventListener('click', () => {
            const text = item.textContent.trim().replace('✔', '');
            selectedText.textContent = text;
            selectedText.style.color = '#000';
            hiddenInput.value = item.dataset.value;
            if(summaryPayment) summaryPayment.textContent = text;
            optionsList.classList.remove('active');
        });
    });

    document.addEventListener('click', () => optionsList.classList.remove('active'));
});
</script>
@endsection