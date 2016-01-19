<!-- BEGIN LAYOUTS/PARTIALS/MAINCONTENT -->
<div class="scrollable">
    <main class="HolyGrail-body">
        <article class="HolyGrail-content" class="u-textCenter">
            <div class="Container">
                <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                    <div class="Grid-cell">
                        <div class="center-title">THE CATEGORY</div>
                        <div class="center-tagline">The writing company.</div>
                    </div>
                </div>
            </div>
            <div class="Container">
                <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                    <div class="Grid-cell">
                        <a class="center-link" href="{!! url('/writers') !!}">writers</a>
                        <a class="center-link" href="{!! url('/projects') !!}">projects</a>
                        <a class="center-link" href="{!! url('/partners') !!}">partners</a>
                        <a class="center-link" href="{!! url('/contact') !!}">contact</a>
                    </div>
                </div>
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