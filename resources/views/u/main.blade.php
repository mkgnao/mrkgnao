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
        console.log(tw);
        var n = prettyPrint(tw);
        console.log(n);
        var c = document.getElementById("tw");
        c.appendChild(n);
    </script>

@endsection