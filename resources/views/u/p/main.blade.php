@extends('layouts.app')

@section('content')

    <div class="Container">
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div id="twcontent" class="twcontent">

                </div>
            </div>
        </div>
    </div>

    <script>
        function loadTw() {
            try {
                //console.log(mkgnaoNs);

                if (mkgnaoNs.tw_me) {
                    mkgnaoNs.twAddJson(mkgnaoNs.tw_me, "twcontent");
                } else {
                    var e = document.getElementById("twcontent");
                    var n = document.createElement("div");
                    n.id = "error";
                    if (mkgnaoNs.tw_errors) {
                        console.log(mkgnaoNs.tw_errors);
                        n.innerHTML = mkgnaoNs.tw_errors;
                    } else {
                        n.innerHTML = "oops";
                    }
                    e.appendChild(n);
                }
            } catch (e) {
                console.log(e);

            }
        };

        addLoadEvent(loadTw);
    </script>

@endsection