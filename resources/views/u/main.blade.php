@extends('layouts.app')

@section('content')

    <div class="Container">

    @if ($tw != null)
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div id="tw">

                </div>
            </div>
        </div>
    @endif
</div>

    <script type="text/javascript">
        var tw = {{json_encode($tw)}};
        var node = prettyPrint(tw);
        var c = document.getElementById("tw");
        c.appendChild(node);
    </script>

@endsection