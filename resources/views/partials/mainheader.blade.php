<!-- BEGIN LAYOUTS/PARTIALS/MAINHEADER -->
<header class="HolyGrail-header" id="HolyGrail-header">
    <div class="Header Header--cozy" role="banner">
        <div class="Header-titles">
            <h1 class="Header-title">
                <a href="{{ url('/') }}">the category</a>
            </h1>
            <!--h2 class="Header-subTitle"></h2-->
        </div>

        <div class="Header-actions">
            @if ($view_name == 'mdcontent')


                            <a class="InputAddOn-button-login" href="{{ url('/about') }}">about</a>
                            <a class="InputAddOn-button-login" href="{{ url('/writers') }}">writers</a>
                            <a class="InputAddOn-button-login" href="{{ url('/partners') }}">partners</a>
                            <a class="InputAddOn-button-login" href="{{ url('/projects') }}">projects</a>
                            <a class="InputAddOn-button-login" href="{{ url('/internships') }}">internships</a>

            @endif
        </div>
    </div>
</header>
<!-- END LAYOUTS/PARTIALS/MAINHEADER -->