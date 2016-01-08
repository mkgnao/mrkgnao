<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>mkgnao</title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name=viewport content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="mkgnao">

    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/dr.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <script src="/js/main.js"></script>
    <script src="/js/prettyprint.js"></script>

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
                        {name: '1x', media: 'all'},
                        {
                            name: '1.5x', media: '(-webkit-min-device-pixel-ratio: 1.5), ' +
                        '(min-resolution: 144dpi)'
                        },
                        {
                            name: '2x', media: '(-webkit-min-device-pixel-ratio: 2), ' +
                        '(min-resolution: 192dpi)'
                        },
                    ]
                },
                {
                    name: 'Orientation',
                    dimensionIndex: 3,
                    items: [
                        {name: 'landscape', media: '(orientation: landscape)'},
                        {name: 'portrait', media: '(orientation: portrait)'}
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
            <div class="Header-title">
                <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                    <div class="Grid-cell">
                        <div class="center-title">
                            mkgnao
                        </div>
                        @if (!Auth::guest())
                            <h1 class="Header-title">{{ strtolower(Auth::user()->name) }}</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--h1 class="Header-title">
        </h1>
        <h2 class="Header-subTitle">
        </h2-->
    </div>
    <div class="Header-actions">
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                @if (Auth::guest())
                    @if ($view_name != "auth.login")
                        <a class="loginout" href="{{ url('/login') }}">login</a>
                        <!--div class="InputAddOn">
                                <button class="InputAddOn-button-login" onclick="location.href='{{ url('/login') }}'">
                                    login
                                </button>
                            </div-->
                    @endif
                    @if(false)
                        <div class="loginout">
                            <a class="loginout" href="{{ url('/register') }}">register</a>
                        </div>
                    @endif
                @else
                    <div class="InputAddOn">
                        <button class="InputAddOn-button-login" onclick="location.href='{{ url('/logout') }}'">
                            logout
                        </button>
                    </div>
                @endif
            </div>
        </div>
        @if (false)
            @include("partials.topnav")
        @endif
    </div>
    </div>
</header>
<main class="HolyGrail-body">
    @include('partials.scriptsend')

    <article class="HolyGrail-content" class="u-textCenter">

        @yield('content')

    </article>

    <article class="HolyGrail-content">
    </article>

    <nav class="HolyGrail-nav u-textCenter">
    </nav>
    <aside class="HolyGrail-ads u-textCenter">
        @if (!Auth::guest())
            <div class="InputAddOn">
                <button class="InputAddOn-button-login"
                        onclick="location.href='{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/main') }}'">
                    profile
                </button>
            </div>
            <div class="InputAddOn">
                <button class="InputAddOn-button-login"
                        onclick="location.href='{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/projects') }}'">
                    projects
                </button>
            </div>
            <div class="InputAddOn">
                <button class="InputAddOn-button-login"
                        onclick="location.href='{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/people') }}'">
                    people
                </button>
            </div>
            <div class="InputAddOn">
                <button class="InputAddOn-button-login"
                        onclick="location.href='{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/company') }}'">
                    organizations
                </button>
            </div>
            <div class="InputAddOn">
                <button class="InputAddOn-button-login">
                    tasks
                </button>
            </div>
            <div class="InputAddOn">
                <button class="InputAddOn-button-login">
                    billing
                </button>
            </div>
        @endif
    </aside>
</main>
<footer class="HolyGrail-footer">
    <div class="Footer">
        <div class="Footer-credits">
            <span class="Footer-credit">copyright © 2016 mkgnao | contact@mkgnao.co</span>
        </div>
    </div>
</footer>

<script src="/js/flexbox.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html-inspector/0.8.2/html-inspector.js"></script>

<script>
    HTMLInspector.rules.extend('unused-classes', function (config) {
        config.whitelist = config.whitelist.concat([
            /^icon/,
            /^wf-/,
            /^hljs-/,
            /^twitter-/
        ]);
        return config;
    });

    HTMLInspector.rules.extend('script-placement', function (config) {
        config.whitelist = config.whitelist.concat([
            '[async]',
            '.js-allow-before-footer'
        ]);
        return config;
    });

    HTMLInspector.inspect({excludeElements: ['svg', 'iframe']});
</script>

</body>
</html>
