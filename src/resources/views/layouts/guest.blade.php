<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'フリマアプリ')</title>

    {{-- リセットCSS（任意だが一般的） --}}
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">

    {{-- 未認証ページ共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common/guest-common.css') }}">

    {{-- 各ページ独自CSS --}}
    @yield('styles')
</head>
<body>
    @include('components.header-guest')

    <main class="main">
        @yield('content')
    </main>
</body>
</html>
