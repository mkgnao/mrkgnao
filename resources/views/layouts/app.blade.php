<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
    <link href="/css/dd.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/modal.css" rel="stylesheet" type="text/css">
    <link href="/css/twtable.css" rel="stylesheet" type="text/css">

    <script src="/js/main.js"></script>
    <script src="/js/classie.js"></script>

    <script>
        function addLoadEvent(func) {
            var oldonload = window.onload;
            if (typeof window.onload != 'function') {
                window.onload = func;
            } else {
                window.onload = function () {
                    if (oldonload) {
                        oldonload();
                    }
                    func();
                }
            }
        }
    </script>

    @if (!Auth::guest())
        <script>
            function hideModalLogout() {
                var e = document.getElementById("Modal-flex-container-logout");
                if (!e)
                    return;

                e.className = "Modal-flex-container-hidden";
            }

            function toggleModalLogout() {
                var e = document.getElementById("Modal-flex-container-logout");

                if (!e)
                    return;

                if (e.className == "Modal-flex-container-hidden")
                    e.className = "Modal-flex-container-shown";
                else
                    e.className = "Modal-flex-container-hidden";
            }

            function hideModalLogoutBodyClick(e) {
                if (e.target != document.getElementById("logoutModalLogout") &&
                        e.target != document.getElementById("logoutClick")) {
                    hideModalLogout();
                }
            }

            function hideModalLogout() {
                var e = document.getElementById("Modal-flex-container-logout");
                if (!e)
                    return;

                e.className = "Modal-flex-container-hidden";
            }

            function toggleModalLogout() {
                var e = document.getElementById("Modal-flex-container-logout");

                if (!e)
                    return;

                if (e.className == "Modal-flex-container-hidden")
                    e.className = "Modal-flex-container-shown";
                else
                    e.className = "Modal-flex-container-hidden";
            }

            function hideModalLogoutBodyClick(e) {
                if (e.target != document.getElementById("logoutModalLogout") &&
                        e.target != document.getElementById("logoutClick")) {
                    hideModalLogout();
                }
            }


            function loadMain() {
                logoutLink = document.getElementById("logoutClick");
                if (logoutLink)
                    logoutLink.addEventListener('click', toggleModalLogout);

                logoutModalStay = document.getElementById("logoutModalStay");
                if (logoutModalStay)
                    logoutModalStay.addEventListener('click', hideModalLogout);

                loginLink = document.getElementById("loginClick");
                if (loginLink)
                    loginLink.addEventListener('click', toggleModalLogin);

                loginModalStay = document.getElementById("loginModalStay");
                if (loginModalStay)
                    logoutModalStay.addEventListener('click', hideModalLogin);

                document.onkeydown = function (evt) {
                    evt = evt || window.event;
                    if (evt.keyCode == 27) {
                        hideModalLogout();
                    }
                };

                bodyTop = document.getElementById("bodyTop");
                if (bodyTop)
                    bodyTop.addEventListener('click', hideModalLogoutBodyClick);
            }

            addLoadEvent(loadMain);


            function scrollSmallHeader() {
                window.addEventListener('scroll', function(e){
                    var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                            shrinkOn = 300,
                            header = document.getElementById("HolyGrail-header");
                    if (distanceY > shrinkOn) {
                        header.className += "HolyGrail-header-sm";
                    } else {
                        header.className =
                                header.className.replace
                                ( /(?:^|\s)HolyGrail-header-sm(?!\S)/g , '' );
                    }
                });
            }

            addLoadEvent(scrollSmallHeader);

        </script>
    @else

    @endif

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

<body id="bodyTop" class="HolyGrail">
<header class="HolyGrail-header" id="HolyGrail-header">
    <div class="Header Header--cozy" role="banner">
        <div class="Header-titles">
            <h1 class="Header-title">
                <a href="{{ url('/') }}">schreibstube</a>
            </h1>
            <!--h2 class="Header-subTitle"></h2-->
        </div>
        <!-- -->

        <!-- -->
        <div class="Header-actions">
            @if (Auth::guest())
                @if ($view_name != "auth.login")
                    <a id="loginClick" class="Header-button Button Button--action Button--wide"
                       href="{{ url('/login') }}">
                        login
                    </a>
                @endif
            @else
                <dd>
                    <nav role="navigation">
                        <ul>
                            <li>
                                <a href="#">
                                    {{ strtolower(Auth::user()->name) }} <!--span class="smallTriangle">&#9660;</span-->
                                </a>
                                <div>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/main') }}">settings</a>
                                        </li>
                                        <li>
                                            &nbsp;
                                        </li>
                                        <li>
                                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/main') }}">tasks</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/people') }}">people</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/projects') }}">projects</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/company') }}">group</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/main') }}">billing</a>
                                        </li>
                                        <li>
                                            &nbsp;
                                        </li>
                                        <li><a id="logoutClick" href="#">logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </dd>
            @endif
        </div>
    </div>
</header>

<div class="scrollable">
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
        </aside>
    </main>

    <footer class="HolyGrail-footer">
        <div class="Footer">
            <div class="Footer-credits">
                <span class="Footer-credit">copyright © 2016 | contact@mkgnao.co</span>
            </div>
        </div>
    </footer>
</div>

<div id="Modal-flex-container-logout" class="Modal-flex-container-hidden">
    <div id="Modal-row">
        <div class="Modal-flex-item">
            <a id="logoutModalLogout" href="{{ url('/logout') }}"
               class="Modal-Button Modal-Button--action Modal-Button--wide">logout</a>
        </div>
        <div class="Modal-flex-item">
            <a id="logoutModalStay" href="#" class="Modal-Button Modal-Button--action Modal-Button--wide">stay</a>
        </div>
    </div>
</div>

<script src="/js/flexbox.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html-inspector/0.8.2/html-inspector.js"></script>

<script>
    HTMLInspector.rules.extend('unused-classes', function (config) {
        config.whitelist = config.whitelist.concat([
            /^icon/,
            /^wf-/,
            /^hljs-/,
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
