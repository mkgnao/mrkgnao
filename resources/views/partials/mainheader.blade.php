<!-- BEGIN LAYOUTS/PARTIALS/MAINHEADER -->
<header class="HolyGrail-header" id="HolyGrail-header">
    <div class="Header Header--cozy" role="banner">
        <div class="Header-titles">
            <h1 class="Header-title">
            </h1>
            <!--h2 class="Header-subTitle"></h2-->
        </div>
        <div class="Header-actions">
            @if ($view_name == 'mdcontent')
                @include('partials.appfronttopnav')
            @elseif($view_name == '.u.p.main')
                @include('partials.maintopnav')
            @endif
        </div>
    </div>
</header>
<!-- END LAYOUTS/PARTIALS/MAINHEADER -->