<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield("title") - Jordi Keijzers</title>

    <link rel="stylesheet" href="{{ asset("css/style.css") }}" />
    <link rel="shortcut icon" href="{{ asset("favicon.ico") }}" type="image/x-icon">
    @yield("styles")
    @stack("componentStyles")
    @auth
        @if (auth()->user()->isAdministrator())
            <link rel="stylesheet" href="{{ asset("css/components/AdminOffcanvas.css") }}">
        @endif
    @endauth

</head>
<body>

    @include("components.header")

    <main role="main">
        @yield("content")
    </main>

    @auth
        @if (auth()->user()->isAdministrator())
            <x-admin-offcanvas></x-admin-offcanvas>
        @endif
    @endauth

    @include("components.footer")

    @include("components.scripts")
    @stack("componentScripts")
    @yield("scripts")

</body>
</html>
