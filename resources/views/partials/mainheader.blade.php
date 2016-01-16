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
            @if (Auth::guest())
                @if ($view_name != "auth.login")
                    <a id="loginClick" class="Header-button Button Button--action Button--wide"
                       href="{{ url('/login') }}">
                        login
                    </a>
                @endif
            @else
                @include('partials.maintopnav')
            @endif
        </div>
        <div class="Container">
            <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                <div class="Grid-cell">
                    about
                </div>
                <div class="Grid-cell">
                    writers
                </div>
                <div class="Grid-cell">
                    partners
                </div>
                <div class="Grid-cell">
                    projects
                </div>
                <div class="Grid-cell">
                    internships
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END LAYOUTS/PARTIALS/HEADERMAIN -->