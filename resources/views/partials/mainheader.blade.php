<!-- BEGIN LAYOUTS/PARTIALS/HEADERMAIN -->
<header class="HolyGrail-header" id="HolyGrail-header">
    <div class="Header Header--cozy" role="banner">
        <div class="Header-titles">
            <h1 class="Header-title">
                <a href="{{ url('/') }}">the category</a>
            </h1>
            <!--h2 class="Header-subTitle"></h2-->
        </div>

        <div class="Header-actions">

        </div>

        @if ($view_name == "welcome")
        <div class="Container">
            <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                <div class="Grid-cell">
                    <a href="{{ url('/about') }}">about</a>
                </div>
                <div class="Grid-cell">
                    <a href="{{ url('/writers') }}">writers</a>
                </div>
                <div class="Grid-cell">
                    <a href="{{ url('/partners') }}">partners</a>
                </div>
                <div class="Grid-cell">
                    <a href="{{ url('/projects') }}">projects</a>
                </div>
                <div class="Grid-cell">
                    <a href="{{ url('/internships') }}">internships</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</header>
<!-- END LAYOUTS/PARTIALS/HEADERMAIN -->