<!-- BEGIN LAYOUTS/PARTIALS/APPFOOTER -->
<footer class="Site-footer">
    <div class="Footer">
        <div class="Footer-right">
            @if (Auth::guest())
                <a class="InputAddOn-button-login" href="{{ url('/login') }}">&#10001;</a>
            @endif
        </div>
        <div class="Footer-credits">
            <span class="Footer-credit">copyright © 2016 the category | contact@thecategory.com | <a class="Footer-credit" href="{{ url('/about') }}">about</a></span>
        </div>
    </div>
</footer>
<!-- END LAYOUTS/PARTIALS/APPFOOTER -->