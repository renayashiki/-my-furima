<header class="header-app">
    <div class="header-inner">
        <h1 class="header-logo"><a href="{{ route('products.index') }}">COACHTECH</a></h1>
        <nav class="header-nav">
            <ul class="header-list">
                <li><a href="{{ route('products.create') }}" class="header-link">出品する</a></li>
                <li><a href="{{ route('profile.index') }}" class="header-link">マイページ</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="header-link logout-btn">ログアウト</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>