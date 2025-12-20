@extends('layouts.app')

@section('title', '商品詳細')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products/detail.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="detail-container">
    {{-- 左側：商品画像エリア --}}
    <div class="detail-left">
        <div class="product-image-box">
            {{-- 【書き換え：商品画像URL】 --}}
            {{-- $product->image_path など、DBの画像パス変数に置き換えてください --}}
            @if(isset($product->image_url) && $product->image_url)
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="商品画像">
            @else
                <span>商品画像</span>
            @endif
        </div>
    </div>

    {{-- 右側：商品情報エリア --}}
    <div class="detail-right">
        <div class="product-header">
            {{-- 【書き換え：商品名】 $product->name --}}
            <h1 class="product-name">{{ $product->name ?? '商品名がここに入る' }}</h1>
            
            {{-- 【書き換え：ブランド名】 $product->brand->name --}}
            <p class="brand-name">{{ $product->brand ?? 'ブランド名' }}</p>
            
            {{-- 【書き換え：価格】 $product->price --}}
            <p class="product-price">¥{{ isset($product->price) ? number_format($product->price) : '47,000' }}(税込)</p>
        </div>

        {{-- アクション（お気に入り・コメント） --}}
        <div class="action-group">
            <div class="metric-item">
                <svg width="32" height="32" viewBox="0 0 45 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40.8591 3.49224C39.7485 2.38453 38.4299 1.50596 36.9788 0.906747C35.5276 0.307531 33.9723 -0.000587411 32.4017 8.40717e-07C30.8311 0.000589093 29.276 0.309872 27.8253 0.910176C26.3746 1.51048 25.0567 2.39003 23.947 3.49858L22.4984 4.96104L21.0618 3.50174L21.0525 3.49243C19.9424 2.38524 18.6246 1.50697 17.1742 0.907758C15.7239 0.30855 14.1694 0.000141912 12.5995 0.000141912C11.0297 0.000141912 9.47521 0.30855 8.02485 0.907758C6.5745 1.50697 5.25667 2.38524 4.14662 3.49243L3.50128 4.1361C1.25945 6.37215 0 9.40488 0 12.5671C0 15.7294 1.25945 18.7621 3.50128 20.9982L20.5335 37.9862L22.4569 39.9962L22.5027 39.9503L22.5525 40L24.3546 38.1035L41.5044 20.9979C43.7429 18.7601 45 15.728 45 12.5669C45 9.40571 43.7429 6.37365 41.5044 4.13582L40.8591 3.49224ZM39.3907 18.8902L22.5027 35.7349L5.61437 18.8902C3.933 17.2131 2.98842 14.9386 2.98842 12.5669C2.98842 10.1952 3.933 7.92068 5.61437 6.24364L6.25981 5.59996C7.94036 3.92376 10.2194 2.98169 12.5961 2.9808C14.9727 2.97991 17.2525 3.92027 18.9343 5.59521L22.4919 9.20825L26.0664 5.59996C26.8989 4.76957 27.8873 4.11087 28.9751 3.66146C30.0628 3.21206 31.2287 2.98075 32.4061 2.98075C33.5835 2.98075 34.7493 3.21206 35.8371 3.66146C36.9249 4.11087 37.9132 4.76957 38.7458 5.59996L39.3911 6.24354C41.07 7.92196 42.0127 10.1961 42.0127 12.5669C42.0126 14.9378 41.0697 17.2118 39.3907 18.8902Z" fill="#4B4646"/>
                </svg>
                {{-- 【書き換え：いいね数】 $product->favorites->count() --}}
                <span class="metric-count">{{ $product->favorites_count ?? '5' }}</span>
            </div>
            <div class="metric-item">
        <svg width="32" height="32" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M35 17.5C35 25.5 28.284 32 20 32C14.5 32 10.0 29.0 10.0 29.0L6.5 31.5C5.8 32.0 5.0 31.3 5.2 30.5L7.0 26.0C5.0 23.5 4 21 4 17.5C4 9.5 11.2 3 20 3C28.8 3 35 9.5 35 17.5Z" stroke="#4B4646" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
                {{-- 【書き換え：コメント合計数】 $product->comments->count() --}}
                <span class="metric-count">{{ $product->comments_count ?? '1' }}</span>
            </div>
        </div>

        <button class="buy-btn">購入手続きへ</button>

        <section class="description-section">
            <h2 class="section-title">商品説明</h2>
            <div class="description-content">
                {{-- 【書き換え：商品説明文】 $product->description --}}
                {{ $product->description ?? "カラー：グレー\n新品\n商品の状態は良好です。傷もありません。\n購入後、即発送いたします。" }}
            </div>
        </section>

        <section class="info-section">
            <h2 class="section-title">商品の情報</h2>
            <div class="info-row">
                <span class="info-label">カテゴリー</span>
                <div class="category-tags">
                    {{-- 【書き換え：カテゴリ名】 $product->category->name --}}
                    {{-- 複数ある場合は @foreach($product->categories as $category) で回します --}}
                    <span class="category-tag">洋服</span>
                    <span class="category-tag">メンズ</span>
                </div>
            </div>
            <div class="info-row">
                <span class="info-label">商品の状態</span>
                {{-- 【書き換え：状態】 $product->condition --}}
                <span class="condition-text">{{ $product->condition ?? '良好' }}</span>
            </div>
        </section>

        <section class="comment-section">
            {{-- 【書き換え：コメント合計数】 $product->comments_count --}}
            <h2 class="comment-count-title">コメント(1)</h2>
            
            {{-- 【書き換えアドバイス】 --}}
            {{-- 実際にはここから下の「user-info」と「comment-bubble」を --}}
            {{-- @foreach($product->comments as $comment) 〜 @endforeach で囲んでループさせます --}}
            <div class="user-info">
                <div class="user-icon-circle">
                    {{-- 【書き換え：ユーザーアイコン】 $comment->user->image_url --}}
                </div>
                {{-- 【書き換え：ユーザー名】 $comment->user->name --}}
                <span class="user-name">admin</span>
            </div>
            <div class="comment-bubble">
                {{-- 【書き換え：コメント内容】 $comment->content --}}
                こちらにコメントが入ります。
            </div>

            <div class="comment-post-area">
                <p class="comment-label">商品へのコメント</p>
                <textarea class="comment-textarea"></textarea>
                <button class="comment-submit-btn">コメントを送信する</button>
            </div>
        </section>
    </div>
</div>
@endsection