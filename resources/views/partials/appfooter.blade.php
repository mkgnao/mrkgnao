<!-- BEGIN LAYOUTS/PARTIALS/APPFOOTER -->
<footer class="Site-footer">
    <div class="Footer">
        <div class="Footer-right">
            @if (Auth::guest())
                <a class="InputAddOn-button-login" href="{{ url('/login') }}">&#2711</a>
            @endif
        </div>
        <div class="Footer-credits">
            <span class="Footer-credit">copyright © 2016</span>
        </div>
    </div>
</footer>
<!-- END LAYOUTS/PARTIALS/APPFOOTER -->