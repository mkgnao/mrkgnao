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
            //console.log(mkgnaoNs);

            if (mkgnaoNs.tw_me) {
                mkgnaoNs.twAddJson(mkgnaoNs.tw_me, "twcontent");
            } else {
                var e = document.getElementById("twcontent");
                var n = document.createElement("div");
                n.id = "error";
                if (mkgnaoNs.tw_errors) {
                    n.innerHTML = console.log(mkgnaoNs.tw_errors);
                } else {
                    n.innerHTML = "oops";
                }
                e.appendChild(n);
            }
        } catch (e) {
            console.log(e);

        }
    </script>

@endsection