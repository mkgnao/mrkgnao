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
                @include('partials.topnav')
            @endif
        </div>
    </div>
</header>