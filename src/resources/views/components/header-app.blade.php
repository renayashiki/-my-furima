<header class="header-app">
    <div class="header-inner">

        {{-- 未認証と同じ SVG ロゴをそのまま流用 --}}
        <h1 class="header-logo">
            <a href="{{ route('products.index') }}">
               @include('components.logo-svg')
            </a>
        </h1>

        <nav class="header-nav">
            <ul class="header-list">
                <li><a href="{{ route('products.create') }}" class="header-link">出品する</a></li>
                <li><a href="{{ route('profile.index') }}" class="header-link">マイページ</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-btn">ログアウト</button>
                    </form>
                </li>
            </ul>
        </nav>

    </div>
</header>
