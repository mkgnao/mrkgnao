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
