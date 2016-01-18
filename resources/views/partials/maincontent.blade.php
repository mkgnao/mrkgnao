<!-- BEGIN LAYOUTS/PARTIALS/MAINCONTENT -->
<p class="scrollable">
    <main class="HolyGrail-body">
        <article class="HolyGrail-content" class="u-textCenter">


            <div class="center-links">

                <p><a class="center-link" href="{{ url('/writers') }}">writers</a></p>
                <p><a class="center-link" href="{{ url('/projects') }}">projects</a></p>
                <p><a class="center-link" href="{{ url('/partners') }}">partners</a></p>
                <p><a class="center-link" href="{{ url('/contact') }}">contact</a></p>

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