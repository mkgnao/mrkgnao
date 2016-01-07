@extends('layouts.app')

@section('content')

    @yield('partials.topnav')

    <script>
        try {
            //console.log(mkgnaoNs);

            if (mkgnaoNs.tw_me) {
                mkgnaoNs.twAddJson(mkgnaoNs.tw_me, "twcontent");
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