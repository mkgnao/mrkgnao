<!-- BEGIN LAYOUTS/PARTIALS/MAINCONTENT -->
<div class="scrollable">
    <main class="HolyGrail-body">
        <article class="HolyGrail-content" class="u-textCenter">
            <dd>
                <nav role="navigation">
                    <ul>
                        <li>
                            <a href="#" id="topMenu" class="maintopnavDiv-shown">
                                the category
                            </a>
                            <div id="maintopnavDiv-shown">
                                <ul>
                                    <li>
                                        <a class="InputAddOn-button-fronttopnav" href="{{ url('/writers') }}">writers</a>
                                    </li>
                                    <li>
                                        <a class="InputAddOn-button-fronttopnav" href="{{ url('/projects') }}">projects</a>
                                    </li>
                                    <li>
                                        <a class="InputAddOn-button-fronttopnav" href="{{ url('/partners') }}">partners</a>
                                    </li>
                                    <li>
                                        <a class="InputAddOn-button-fronttopnav" href="{{ url('/contact') }}">contact</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </dd>
            @yield('content')
        </article>
        <nav class="HolyGrail-nav u-textCenter">
        </nav>
        <aside class="HolyGrail-ads u-textCenter">
        </aside>
    </main>
</div>
<!-- END LAYOUTS/PARTIALS/MAINCONTENT -->