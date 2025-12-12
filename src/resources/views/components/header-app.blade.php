<header class="header-app">
    <div class="header-inner">

        {{-- 1. ロゴ --}}
        <h1 class="header-logo">
            <a href="{{ route('products.index') }}">
                @include('components.logo-svg')
            </a>
        </h1>

        {{-- 2. ★新規追加: 検索フォーム★ --}}
        <div class="header-search-container">
            <form action="{{ route('products.search') }}" method="GET" class="search-form">
                {{-- 見本には検索アイコンがないため、プレースホルダーのみ --}}
                <input type="text" name="keyword" placeholder="なにをお探しですか？" class="search-input">
            </form>
        </div>

        {{-- 3. ナビゲーション (右側ボタン) --}}
        <nav class="header-nav">
            <ul class="header-list">
                {{-- Figma見本画像に合わせて、並び順を「ログアウト」「マイページ」「出品」に変更 --}}
                
                {{-- ログアウトボタン (Figma: ログアウト) --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="header-link logout-btn">ログアウト</button>
                    </form>
                </li>
                
                {{-- マイページボタン (Figma: マイページ) --}}
                <li><a href="{{ route('profile.index') }}" class="header-link">マイページ</a></li>
                
                {{-- 出品ボタン (Figma: 出品) --}}
                <li><a href="{{ route('products.create') }}" class="header-link primary-btn">出品</a></li>
            </ul>
        </nav>

    </div>
</header>