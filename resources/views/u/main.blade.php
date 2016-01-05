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

    @include('scriptsend')

            <!--script>
        n = prettyPrint(window.tw);
        e = document.getElementById("twcontent");
        e.appendChild(n);
    </script-->

@endsection