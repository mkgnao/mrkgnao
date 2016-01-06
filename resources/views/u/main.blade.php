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
        function twAdd(what) {
            console.log(what);
            var j = JSON.parse(what);
            var n = prettyPrint(j);
            console.log(n);
            var e = document.getElementById("twcontent");
            e.appendChild(n);

        }
        try {
            //twAdd(window.tw_account);
            //twAdd(window.tw_project_all);
        } catch (e) {
            console.log(e);
            if (window.tw_errors) {
                console.log(window.tw_errors);
            }
        }
    </script>

@endsection