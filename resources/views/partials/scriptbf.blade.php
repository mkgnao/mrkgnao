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