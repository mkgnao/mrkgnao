<!-- BEGIN LAYOUTS/PARTIALS/APPFOOTER -->
<footer class="Site-footer">
    <div class="Footer">
        <div class="Footer-credits">
            <span class="Footer-credit">copyright © 2016 the category | <a class="Footer-credit" href="{{ url('/about') }}">about</a>
            @if (Auth::guest())
                | <a class="Footer-credit" href="{{ url('/login') }}">login</a>
            @endif
            </span>
        </div>
    </div>
</footer>
<!-- END LAYOUTS/PARTIALS/APPFOOTER -->