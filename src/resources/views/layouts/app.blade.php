<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'フリマアプリ')</title>
    <link rel="stylesheet" href="{{ asset('css/' . $css_path) }}">
</head>
<body>
    @include('components.header-app')

    <main class="main">
        @yield('content')
    </main>
</body>
</html>