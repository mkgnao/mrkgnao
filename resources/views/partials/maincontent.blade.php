<!-- BEGIN LAYOUTS/PARTIALS/MAINCONTENT -->
<p class="scrollable">
    <main class="HolyGrail-body">
        <article class="HolyGrail-content" class="u-textCenter">


            <div class="center-links">

                <a class="center-link" href="{{ url('/writers') }}">writers</a>
                <a class="center-link" href="{{ url('/projects') }}">projects</a>
                <a class="center-link" href="{{ url('/partners') }}">partners</a>
                <a class="center-link" href="{{ url('/contact') }}">contact</a>

            </div>

            @yield('content')
        </article>
        <nav class="HolyGrail-nav u-textCenter">
        </nav>
        <aside class="HolyGrail-ads u-textCenter">
        </aside>
    </main>
</div>
<!-- END LAYOUTS/PARTIALS/MAINCONTENT -->