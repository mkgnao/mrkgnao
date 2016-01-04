<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>mrkgnao</title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name=viewport content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.0.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.0.0/highlight.min.js"></script>
    <!-- Fonts -->
    <link href="/css/dr.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="/css/main.css" rel="stylesheet" type="text/css">

    <script class="js-allow-before-footer">

        var mediaQueryOpts = {
            mediaQueryDefinitions: [
                {
                    name: 'Breakpoint',
                    dimensionIndex: 1,
                    items: [
                        {name: 'xs', media: 'all'},
                        {name: 'sm', media: '(min-width: 384px)'},
                        {name: 'md', media: '(min-width: 576px)'},
                        {name: 'lg', media: '(min-width: 768px)'}
                    ]
                },
                {
                    name: 'Resolution',
                    dimensionIndex: 2,
                    items: [
                        {name: '1x',   media: 'all'},
                        {name: '1.5x', media: '(-webkit-min-device-pixel-ratio: 1.5), ' +
                        '(min-resolution: 144dpi)'},
                        {name: '2x',   media: '(-webkit-min-device-pixel-ratio: 2), ' +
                        '(min-resolution: 192dpi)'},
                    ]
                },
                {
                    name: 'Orientation',
                    dimensionIndex: 3,
                    items: [
                        {name: 'landscape', media: '(orientation: landscape)'},
                        {name: 'portrait',  media: '(orientation: portrait)'}
                    ]
                }
            ]
        };



    </script>
</head>
<body class="HolyGrail">
<header class="HolyGrail-header">
    <div class="Header Header--cozy" role="banner">
        <div class="Header-titles">
            <h1 class="Header-title">mrkgnao</h1>
            <h2 class="Header-subTitle">These heavy sands are language tide and wind have silted here...</h2>
        </div>
    </div>
</header>
<main class="HolyGrail-body">
    <article class="HolyGrail-content">
        <h1>mrkgnao</h1>
        @yield('content')
    </article>
    <nav class="HolyGrail-nav u-textCenter">
        <strong>n</strong>
    </nav>
    <aside class="HolyGrail-ads u-textCenter">
        <strong>a</strong>
    </aside>
</main>
<footer class="HolyGrail-footer">
    <div class="Footer">
        <div class="Footer-credits">
            copyright
        </div>
    </div>
</footer>


<!-- JavaScripts -->
<script src="/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>
