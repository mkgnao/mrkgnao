<!-- BEGIN LAYOUTS/PARTIALS/APPSCRIPTSEND -->

@if (!Auth::guest())
    <script>
        mkgnaoNs.addLoadEvent(mkgnaoNs.loadMain);
    </script>

    @include('partials.appscriptvars')

    <script>
        mkgnaoNs.addLoadEvent(mkgnaoNs.loadTw);
    </script>
@endif

{!! Html::script('js/flexbox.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/html-inspector/0.8.2/html-inspector.js') !!}

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
<!-- END LAYOUTS/PARTIALS/APPSCRIPTSEND -->