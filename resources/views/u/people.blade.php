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

            if (mkgnaoNs.tw_people) {
                mkgnaoNs.twAddJson(mkgnaoNs.tw_people, "twcontent");
            } else {
                var e = document.getElementById("twcontent");
                var n = document.createElement("div");
                n.id = "twnotfound";
                n.innerHTML = "not on teamwork";
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