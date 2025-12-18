@extends('layouts.app')

@section('title', '商品の出品')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products/create.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="create-container">
    <h1 class="page-title">商品の出品</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
        @csrf

        {{-- 商品画像 --}}
        <div class="form-group image-upload-section">
            <label class="section-label">商品画像</label>
            <div class="image-drop-box">
                <label class="image-select-btn">
                    画像を選択する
                    <input type="file" name="image" accept="image/*" hidden>
                </label>
            </div>
        </div>

        {{-- 商品の詳細 --}}
        <div class="section-wrapper">
            <h2 class="section-header-title">商品の詳細</h2>
            <div class="divider-line"></div>

            <div class="form-group">
                <label class="section-label">カテゴリー</label>
                <div class="category-tags">
                    @php
                        $categories = ['ファッション', '家電', 'インテリア', 'レディース', 'メンズ', 'コスメ', '本', 'ゲーム', 'スポーツ', 'キッチン', 'ハンドメイド', 'アクセサリー', 'おもちゃ', 'ベビー・キッズ'];
                    @endphp
                    @foreach($categories as $category)
                        <label class="category-tag">
                            <input type="checkbox" name="categories[]" value="{{ $category }}" hidden>
                            <span class="tag-text">{{ $category }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label class="section-label">商品の状態</label>
                <div class="custom-select-wrapper">
                    <input type="hidden" name="condition" id="condition_input" value="">
                    <div class="custom-select-box" id="conditionSelect">
                        <span class="selected-text">選択してください</span>
                        <span class="arrow-icon">▼</span>
                    </div>
                    {{-- 購入画面と同様のテロップ形式 --}}
                    <ul class="select-options-list" id="conditionOptions">
                        <li class="option-item" data-value="良好">良好</li>
                        <li class="option-item" data-value="目立った傷や汚れなし">目立った傷や汚れなし</li>
                        <li class="option-item" data-value="やや傷や汚れあり">やや傷や汚れあり</li>
                        <li class="option-item" data-value="状態が悪い">状態が悪い</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- 商品名と説明 --}}
        <div class="section-wrapper">
            <h2 class="section-header-title">商品名と説明</h2>
            <div class="divider-line"></div>

            <div class="form-group">
                <label class="section-label">商品名</label>
                <input type="text" name="name" class="input-text">
            </div>

            <div class="form-group">
                <label class="section-label">ブランド名</label>
                <input type="text" name="brand" class="input-text">
            </div>

            <div class="form-group">
                <label class="section-label">商品の説明</label>
                <textarea name="description" class="input-textarea"></textarea>
            </div>
        </div>

            <div class="form-group">
                <label class="section-label">販売価格</label>
                <div class="price-input-wrapper">
                    <span class="currency-symbol">¥</span>
                    <input type="text" name="price" class="input-text price-input">
                </div>
            </div>
        </div>

        <button type="submit" class="submit-btn">出品する</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const customSelect = document.getElementById('conditionSelect');
    const optionsList = document.getElementById('conditionOptions');
    const hiddenInput = document.getElementById('condition_input');
    const selectedText = customSelect.querySelector('.selected-text');

    customSelect.addEventListener('click', (e) => {
        optionsList.classList.toggle('active');
        e.stopPropagation();
    });

    document.querySelectorAll('.option-item').forEach(item => {
        item.addEventListener('click', () => {
            const text = item.textContent.trim();
            selectedText.textContent = text;
            selectedText.style.color = '#000';
            hiddenInput.value = item.dataset.value;
            optionsList.classList.remove('active');
        });
    });

    document.addEventListener('click', () => optionsList.classList.remove('active'));
});
</script>
@endsection