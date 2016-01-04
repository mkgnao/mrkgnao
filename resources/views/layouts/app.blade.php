<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Holy Grail Layout &mdash; Solved by Flexbox &mdash; Cleaner, hack-free CSS</title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name=viewport content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="A showcase of problems once hard or impossible to solve with CSS alone, now made trivially easy with Flexbox.">

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

    <script async src="https://www.google-analytics.com/analytics.js"></script>
    <script async id="twitter-wjs" src="https://platform.twitter.com/widgets.js"></script>

</head>

<body class="HolyGrail">
<header class="HolyGrail-header">
    <div class="Header Header--cozy" role="banner">
        <div class="Header-titles">
            <h1 class="Header-title"><a href="../../index.html">Solved <i>by</i> Flexbox</a></h1>
            <h2 class="Header-subTitle">Cleaner, hack-free CSS</h2>
        </div>
        <div class="Header-actions">
            <a class="Header-button Button Button--action Button--wide"
               data-social-network="Github"
               data-social-action="view-source"
               data-social-target="https://github.com/philipwalton/solved-by-flexbox"
               href="https://github.com/philipwalton/solved-by-flexbox">
                <span class="icon-github icon-large"></span>&nbsp; View Project Source
            </a>
            <a class="Header-button Button Button--wide"
               data-social-network="Twitter"
               data-social-action="tweet"
               data-social-target="http://philipwalton.github.com/solved-by-flexbox/demos/holy-grail/"
               href="https://twitter.com/intent/tweet?text=A%20showcase%20of%20traditionally%20hard%20CSS%20problems%2C%20easily%20solved%20using%20flexbox.&url=http://philipwalton.github.com/solved-by-flexbox/&via=philwalton">
                <span class="icon-twitter icon-large twitter-color"></span>&nbsp; Spread the Word
            </a>
        </div>

    </div>
</header>
<main class="HolyGrail-body">
    <article class="HolyGrail-content">
        <h1>Holy Grail Layout</h1>
        <p>The <a href="http://en.wikipedia.org/wiki/Holy_Grail_(web_design)">Holy Grail Layout</a> is a classic CSS problem with various solutions presented over time. If you’re unfamiliar with the history of the Holy Grail layout, this <a href="http://alistapart.com/article/holygrail">A List Apart article</a> offers a pretty good summary and links to a few of the more well-known solutions.</p>
        <p>At its core, the Holy Grail Layout is a page with a header, footer, and three columns. The center column contains the main content, and the left and right columns contain supplemental content like ads or navigation.</p>
        <p>Most CSS solutions to this problem aim to meet a few goals:</p>
        <ul>
            <li>They should have a fluid center with fixed-width sidebars.</li>
            <li>The center column (main content) should appear first in the HTML source.</li>
            <li>All columns should be the same height, regardless of which column is actually the tallest.</li>
            <li>They should require minimal markup.</li>
            <li>The footer should “stick” to the bottom of the page when content is sparse.</li>
        </ul>
        <p>Unfortunately, because of the nature of these goals and the original limitations of CSS, none of the classic solutions to this problem were ever able to satisfy all of them.</p>
        <p>With Flexbox, a complete solution is finally possible.</p>
        <h2>The HTML</h2>
<pre><code class="language-html"><span class="hljs-tag">&lt;<span class="hljs-title">body</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"HolyGrail"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">header</span>&gt;</span>…<span class="hljs-tag">&lt;/<span class="hljs-title">header</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"HolyGrail-body"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">main</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"HolyGrail-content"</span>&gt;</span>…<span class="hljs-tag">&lt;/<span class="hljs-title">main</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">nav</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"HolyGrail-nav"</span>&gt;</span>…<span class="hljs-tag">&lt;/<span class="hljs-title">nav</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">aside</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"HolyGrail-ads"</span>&gt;</span>…<span class="hljs-tag">&lt;/<span class="hljs-title">aside</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">footer</span>&gt;</span>…<span class="hljs-tag">&lt;/<span class="hljs-title">footer</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span>
    </code></pre>
        <h2>The CSS</h2>
        <p>Getting the center content row to stretch and the footer to stick to the bottom is solved with the same technique shown in the <a href="../sticky-footer/index.html">Sticky Footer</a> example. The only difference is the center row of the Holy Grail layout (<code>.HolyGrail-body</code>) needs to be <code>display:flex</code> in order to properly arrange its children.</p>
<pre><code class="language-css"><span class="hljs-class">.HolyGrail</span> <span class="hljs-rules">{
  <span class="hljs-rule"><span class="hljs-attribute">display</span>:<span class="hljs-value"> flex</span></span>;
  <span class="hljs-rule"><span class="hljs-attribute">min-height</span>:<span class="hljs-value"> <span class="hljs-number">100vh</span></span></span>;
  <span class="hljs-rule"><span class="hljs-attribute">flex-direction</span>:<span class="hljs-value"> column</span></span>;
}</span>

        <span class="hljs-class">.HolyGrail-body</span> <span class="hljs-rules">{
  <span class="hljs-rule"><span class="hljs-attribute">display</span>:<span class="hljs-value"> flex</span></span>;
  <span class="hljs-rule"><span class="hljs-attribute">flex</span>:<span class="hljs-value"> <span class="hljs-number">1</span></span></span>;
}</span>
    </code></pre>
        <p>Styling three equal-height columns with a fluid center and fixed-width sidebars is just as easy:</p>
<pre><code class="language-css"><span class="hljs-class">.HolyGrail-content</span> <span class="hljs-rules">{
  <span class="hljs-rule"><span class="hljs-attribute">flex</span>:<span class="hljs-value"> <span class="hljs-number">1</span></span></span>;
}</span>

        <span class="hljs-class">.HolyGrail-nav</span>, <span class="hljs-class">.HolyGrail-ads</span> <span class="hljs-rules">{
  <span class="hljs-comment">/* 12em is the width of the columns */</span>
  <span class="hljs-rule"><span class="hljs-attribute">flex</span>:<span class="hljs-value"> <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">12em</span></span></span>;
}</span>

        <span class="hljs-class">.HolyGrail-nav</span> <span class="hljs-rules">{
  <span class="hljs-comment">/* put the nav on the left */</span>
  <span class="hljs-rule"><span class="hljs-attribute">order</span>:<span class="hljs-value"> -<span class="hljs-number">1</span></span></span>;
}</span>
    </code></pre>
        <aside class="Notice"><strong>Note:</strong>&nbsp; the CSS required to make this demo work cross-browser is slightly different from the CSS shown in the examples above, which assume a fully spec-compliant browser. See the <a href="https://github.com/philipwalton/solved-by-flexbox/blob/master/assets/css/components/holy-grail.css">comments in the source</a> for more details.</aside>
        <h3>Being Responsive</h3>
        <p>The Holy Grail layout came from an era of Web design when pretty much everyone was browsing on a computer. But with the increasing number of mobile devices and the rising popularity of responsive design, the Holy Grail layout has gone mostly out of fashion.</p>
        <p>Either way, with Flexbox, creating a mobile-first and mobile-friendly version of the Holy Grail layout is easy. The gist is to simply make the center section <code>flex-direction:column</code> by default and then <code>flex-direction:row</code> for larger screens.</p>
        <p>Here’s a complete example that is responsive and mobile-first. You can also resize this browser window to see it in action.</p>
<pre><code class="language-css"><span class="hljs-class">.HolyGrail</span>,
        <span class="hljs-class">.HolyGrail-body</span> <span class="hljs-rules">{
  <span class="hljs-rule"><span class="hljs-attribute">display</span>:<span class="hljs-value"> flex</span></span>;
  <span class="hljs-rule"><span class="hljs-attribute">flex-direction</span>:<span class="hljs-value"> column</span></span>;
}</span>

        <span class="hljs-class">.HolyGrail-nav</span> <span class="hljs-rules">{
  <span class="hljs-rule"><span class="hljs-attribute">order</span>:<span class="hljs-value"> -<span class="hljs-number">1</span></span></span>;
}</span>

        <span class="hljs-at_rule">@<span class="hljs-keyword">media</span> (min-width: <span class="hljs-number">768px</span>) </span>{
        <span class="hljs-class">.HolyGrail-body</span> <span class="hljs-rules">{
    <span class="hljs-rule"><span class="hljs-attribute">flex-direction</span>:<span class="hljs-value"> row</span></span>;
    <span class="hljs-rule"><span class="hljs-attribute">flex</span>:<span class="hljs-value"> <span class="hljs-number">1</span></span></span>;
  }</span>
        <span class="hljs-class">.HolyGrail-content</span> <span class="hljs-rules">{
    <span class="hljs-rule"><span class="hljs-attribute">flex</span>:<span class="hljs-value"> <span class="hljs-number">1</span></span></span>;
  }</span>
        <span class="hljs-class">.HolyGrail-nav</span>, <span class="hljs-class">.HolyGrail-ads</span> <span class="hljs-rules">{
    <span class="hljs-comment">/* 12em is the width of the columns */</span>
    <span class="hljs-rule"><span class="hljs-attribute">flex</span>:<span class="hljs-value"> <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">12em</span></span></span>;
  }</span>
        }
    </code></pre>
        <p>View the full <a href="https://github.com/philipwalton/solved-by-flexbox/blob/master/assets/css/components/holy-grail.css">source</a> for the <code>HolyGrail</code> component used in this demo on Github.</p>

    </article>
    <nav class="HolyGrail-nav u-textCenter">
        <strong>Navigation</strong>
    </nav>
    <aside class="HolyGrail-ads u-textCenter">
        <strong>Advertisements</strong>
    </aside>
</main>
<footer class="HolyGrail-footer">
    <div class="Footer">
        <span class="Footer-social">
  <iframe class="github-btn" src="https://ghbtns.com/github-btn.html?user=philipwalton&repo=solved-by-flexbox&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="106px" height="20px"></iframe>
  <a href="https://twitter.com/philwalton" class="twitter-follow-button" data-show-count="true" data-lang="en">@philwalton</a>
  <a href="https://twitter.com/share" class="twitter-share-button" data-text="A showcase of traditionally hard CSS problems, easily solved using flexbox." data-url="http://philipwalton.github.io/solved-by-flexbox/" data-count="horizontal" data-via="philwalton" data-related="philwalton:Creator of Solved by Flexbox">Tweet</a>
</span>
        <div class="Footer-credits">
            <span class="Footer-credit">Created and maintained by <a href="http://philipwalton.com">Philip Walton</a>.</span>

            <span class="Footer-credit">Source code and examples released under the <a href="https://github.com/philipwalton/solved-by-flexbox/blob/master/LICENSE">MIT</a> license.</span>

            <span class="Footer-credit">Website and documentation licensed under <a href="https://creativecommons.org/licenses/by/4.0/">CC BY 4.0</a>.</span>
        </div>

    </div>
</footer>
<script src="/js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html-inspector/0.8.2/html-inspector.js"></script>
<script>
    HTMLInspector.rules.extend('unused-classes', function(config) {
        config.whitelist = config.whitelist.concat([
            /^icon/,
            /^wf-/,
            /^hljs-/,
            /^twitter-/
        ]);
        return config;
    })

    HTMLInspector.rules.extend('script-placement', function(config) {
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
