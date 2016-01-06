@extends('layouts.app')

@section('content')

    <div class="Container">

        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div id="twcontent">

                </div>
            </div>
        </div>
    </div>

    <script>
        try {
            console.log(mkgnaoNs);

            if (mkgnaoNs.tw_me) {
                mkgnaoNs.twAddJson(mkgnaoNs.tw_me, "twcontent");
            } else {
                var e = document.getElementById("twcontent");
                var n = document.createElement("<div id=\"notfound\">not on teamwork</div>")
                e.appendChild(n);
            }
        } catch (e) {
            console.log(e);
            if (window.tw_errors) {
                console.log(window.tw_errors);
            }
        }
    </script>

@endsection