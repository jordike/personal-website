<!DOCTYPE html>

<html lang="nl">
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

    <script src="{{ asset("lib/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("lib/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/theme.js") }}"></script>
    <script src="https://kit.fontawesome.com/dd6db61ad7.js" crossorigin="anonymous"></script>
    @yield("scripts")

</body>
</html>
