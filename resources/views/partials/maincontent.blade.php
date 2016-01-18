<!-- BEGIN LAYOUTS/PARTIALS/MAINCONTENT -->
<div class="scrollable">
    <main class="HolyGrail-body">
        <article class="HolyGrail-content" class="u-textCenter">
            <div class="center-title">the category</div>

            <div><a class="center-links" href="{{ url('/writers') }}">writers</a></div>
            <div><a class="center-links" href="{{ url('/projects') }}">projects</a></div>
            <div><a class="center-links" href="{{ url('/partners') }}">partners</a></div>
            <div><a class="center-links" href="{{ url('/contact') }}">contact</a></div>

            @yield('content')
        </article>
        <nav class="HolyGrail-nav u-textCenter">
        </nav>
        <aside class="HolyGrail-ads u-textCenter">
        </aside>
    </main>
</div>
<!-- END LAYOUTS/PARTIALS/MAINCONTENT -->