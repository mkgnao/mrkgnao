<!-- BEGIN LAYOUTS/PARTIALS/NOTGUESTTOP -->
@if (!Auth::guest())
    <script>
        mkgnaoNs.addLoadEvent(mkgnaoNs.loadMain);
    </script>
@endif
<!-- END LAYOUTS/PARTIALS/NOTGUESTTOP -->