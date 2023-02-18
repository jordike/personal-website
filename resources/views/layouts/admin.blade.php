<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield("title") - Jordi Keijzers</title>

    <link rel="stylesheet" href="{{ asset("css/style.css") }}" />
    <link rel="shortcut icon" href="{{ asset("favicon.ico") }}" type="image/x-icon">
    @yield("styles")

</head>
<body>

    @include("components.header")

    <main role="main" class="pb-3">
        @yield("content")
    </main>

    @include("components.footer")

    @include("components.scripts")
    @yield("scripts")

</body>
</html>
