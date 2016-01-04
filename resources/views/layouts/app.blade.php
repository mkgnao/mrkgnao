<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>mkgnao</title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name=viewport content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description"
          content="A showcase of problems once hard or impossible to solve with CSS alone, now made trivially easy with Flexbox.">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">

    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
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
            <h1 class="Header-title">mkgnao</h1>
            <h2 class="Header-subTitle"></h2>
        </div>
        <div class="Header-actions">
        </div>

    </div>
</header>
<main class="HolyGrail-body">
    <article class="HolyGrail-content">
        <h1></h1>
        <p></p>
    </article>
    <nav class="HolyGrail-nav u-textCenter">
        <strong></strong>
    </nav>
    <aside class="HolyGrail-ads u-textCenter">
        <strong></strong>
    </aside>
</main>
<footer class="HolyGrail-footer">
    <div class="Footer">
        <div class="Footer-credits">
            <span class="Footer-credit">copyright</span>
        </div>
    </div>
</footer>
<script src="/js/main.js"></script>

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
    })

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
